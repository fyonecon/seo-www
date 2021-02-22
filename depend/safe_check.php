<?php

/*
 * 页面最开始的安全校验
 * */

// 获取页面token
function get_app_token($api_url, $app_class, $_ip){
    $_os = os_info();
    $_browser_info = browser_info();
    $_lang_info = lang_info();
    $client_info = $_os.'#@'.$_browser_info.'#@'.$_lang_info.'#@'.$_ip;
    $request_data = [
        'app_class'=> $app_class,
        'url'=> get_url(),
        'real_ip'=> $_ip,
        'client_info'=> $client_info,
        'app_ip'=> $_ip,
    ];
    $res = request($api_url.'app/get_app_token', 'post', $request_data, false);
    $res = type_to_array($res);
//    var_dump($res);
    if (isset($res['state'])){
        if ($res['state'] == 0){
            $app_token = '';
        }else if ($res['state'] == 1){
            // 兼容处理新老接口异名
            if (isset($res['content']['user_token'])){
                $app_token = $res['content']['user_token'];
            }else{
                $app_token = $res['content']['app_token'];
            }
        }else if ($res['state'] == 403){
            back_404($res['msg']); // 主动拒绝访问网站
        }else{
            $app_token = [];
        }

        return $app_token;
    }else{
        return 'api-request-error';
    }

}

// 收集refer
function save_referer($api_url, $_ip){
    // PHP判断搜索引擎来路
    if (isset($_SERVER['HTTP_REFERER'])){
        $referer = $_SERVER['HTTP_REFERER'];
    }else{
        $referer = '';
    }
    $now_url = get_url();
    if (empty($referer)){
        $referer = $now_url;
    }

    $_os = os_info();
    $_browser_info = browser_info();
    $_lang_info = lang_info();
    $client_info = $_os.'#@'.$_browser_info.'#@'.$_lang_info.'#@'.$_ip;

    // 提交数据
    $request_url = $api_url.'enhance/save_referrer';
    $request_data = [
        'referrer_url'=> $referer,
        'now_url'=> $now_url,
        'ip'=> $_ip,
        'client_info'=> $client_info,
    ];
    $res_refer = request($request_url, 'post', $request_data, $to_json=false);
    if (!$res_refer){
        $res_refer = [];
    }

    return $res_refer;
}

// 检查PHP环境
function run_php($_ip){
    $php_version = substr(PHP_VERSION,0,3)*10;
    if ($php_version < 71){
        back_404("PHP版本需>=71，❄，{$_ip}");
    }
}

// 拦截网址中的非法参数
function check_uri_xss($_uri, $_ip){
    $black_scan = [
        'script', 'function', 'xss', 'print', 'concat', 'echo', 'func', 'ajax', 'include', 'eval', 'exist',
        'etc', 'win.ini', '../', '--', 'nslookup', 'window',
        //'%20', // 空格
        '%00', // 文件上传
        '%27', // '
        // '%3D', // =
        'write', 'acx', 'passwd', '?*', '**', '%%', '))', '()', '"', 'content', 'vars', 'template', 'shell', 'base64', 'decode', 'table', '%20AND%20',
        'java', 'register',
        'hex', 'unhex', 'md5', 'CHAR',
        'union', 'select',
        // '.txt', '.htm', '.xml'
        '.zip', '.rar', '.7z', '.gz',
        'myadmin', '.aspx', 'sqladmin', '.asp', 'uploads', 'wordpress', 'think', 'cache', 'manifest', '.top',

    ];

    for ($bk=0;$bk<count($black_scan);$bk++){
        $the_scan = $black_scan[$bk];
        $has_string = string_include_string($_uri, $the_scan);
        if ($has_string){
            write_log("非法url参数：{$the_scan}。IP：{$_ip}。URI：{$_uri}", 'safe_check#201', 'block_scan-'); // 记录日志
            echo '<meta name="robots" content="noindex, nofollow"/>';
            back_404("不符合参数白名单规则，🌊，{$_ip}，".base64_encode($the_scan));
        }
    }
}

// 拦截非法IP段
function check_bad_ip($_uri, $_ip, $the_os){
    $bad_ip_array = [ // 黑名单IP段或某些IP
        'localhost', '::1', // 本地IP，本地IP请用127.0.0.1
        '159.138.1', '159.138.2', '114.119.1', // 华为云数据中心
        '47.74.240', '42.120.161', '106.11.157', // 阿里云数据中心
        '54.36.14', // Ahrefs
        '144.76.9', // hetnzer数据中心
        '198.199.95', '192.241.2',// digitalocean数据中心

        //  拉黑IP
        '198.38.84.194', '101.133.219.187', '175.4.243.174', '175.126.168.164',
        '101.133.133.119', '47.103.95.189',

    ];

    for ($bi=0; $bi<count($bad_ip_array); $bi++){
        $the_bad_ip = $bad_ip_array[$bi];
        $has_ip = string_include_string($_ip, $the_bad_ip);
        if ($has_ip){
            write_log("拦截的IP字段。URI：{$_uri}。IP：{$_ip}。OS：{$the_os}", 'safe_check#116', 'bad_ip-'); // 记录日志
            echo '<meta name="robots" content="noindex, nofollow"/>';
            back_404("IP be Blocked，⛄，{$_ip}");
            break;
        }
    }
}


// ======================================================================


// 基本参数
$check_path = dirname(dirname(__FILE__)); // 项目index的根目录
$_ip = get_real_ip(); // 客户端IP
$_uri = get_url(false); // 页面的完整网址
$the_os = $_SERVER['HTTP_USER_AGENT']; // 客户端OS

// 在安全检测开始时收集refer
save_referer($api_url, $_ip);

// 手动拦截黑名单IP
check_bad_ip($_uri, $_ip, $the_os);

// 拦截非法参数，如扫描器的扫描
check_uri_xss($_uri, $_ip);

// PHP运行环境校验
run_php($_ip);

// 是否允许蜘蛛收录页面
if ($spider_state == false){
    echo '<meta name="robots" content="noindex, nofollow"/>';
}


// 将页面内容缓存化、静态化
$html_nav = '0nav_'; // 空nav
$nav_name = '';
if (isset($_GET['nav'])){ // 校验参数
    $_nav_name = $_GET['nav'];
    $nav_name = strip_tags($_nav_name);
    $nav_name = del_bad_chars($nav_name);
    if ($_nav_name != $nav_name){ // 非法nav
        $nav_name = '1nav_'.$nav_name;
        write_log("msg：nav参数不一致，疑似非法参数被过滤。IP：{$_ip}。name：{$html_url}。URI：{$_uri}。OS：{$the_os}。nav_name：{$nav_name}。", 'safe_check#181', 'nav_html-'); // 记录日志
    }
    $html_nav = substr($nav_name, 0, 20).'_';
}
if ($html_static_state == true){
    $html_url = $html_nav.md5(get_url()); // 页面完整链接，统一用md5命名文件名
    $save_path = '/storage/timeout-html/';
    //$class_path = $html_nav.'/';
    $class_path = '';
    $html_static_file = $check_path.$save_path.$class_path.$html_url.'.html';
    // 检查是否已经有该页面的静态html
    if (file_exists($html_static_file)){
        $html_size = filesize($html_static_file); // 获取文件大小
        if ($html_size > 2000){ // 文件完整时才能获取，否则再生成一遍
            $file_create_time = filectime($html_static_file); // 文件的创建时间
            if($file_create_time + $file_timeout > time()){ // 未过期
                // 直接输出静态文件内容
                echo file_get_contents($html_static_file);
                exit();
            }else{ // 过期
                unlink($html_static_file); // 删除过期的静态页文件
                $html_static_state = true;
            }
        }else{ // 重新生成
            // 判断文件夹是否存在，不存在则重新创建
            if (!is_dir($check_path.'/storage/')){
                mkdir ( $check_path.'/storage/', 0777);
            }
            if (!is_dir($check_path.$save_path)){
                mkdir ( $check_path.$save_path, 0777);
            }
            if (!is_dir($check_path.$save_path.$class_path)){
                mkdir ( $check_path.$save_path.$class_path, 0755);
            }

            write_log("msg：文件生成不完整。IP：{$_ip}。size：{$html_size}。name：{$html_url}。URI：{$_uri}。OS：{$the_os}", 'safe_check#166', 'make_html-'); // 记录日志

            $html_static_state = true;
        }
    }
}
if ($html_static_state == true){
    ob_start(); // 打开输出控制缓存
}


// 安全检测完毕时生成页面app_token参数
$app_token = get_app_token($api_url, $app_class, $_ip);

