<?php

/*
 * 检测客户端运行页面情况
 * */

// 返回404
function return_404($txt = 'Route Error Or Page Not Be Found.'){
    header("HTTP/1.1 404 Not Found");
    header("Status: 404 Not Found");
    header('Content-Type: text/html; charset=utf-8');

    echo '<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">';
    echo '<meta http-equiv="Refresh" content="6;url=https://www.cswendu.com" />';
    echo '<title>内容404 - '.$txt.'</title>';
    echo '<style>body{font-size: 18px;color: #555555;margin: 20px;background: #EEEEEE;font-weight: bold;text-align: center;letter-spacing: 2px;}</style>';

    exit($txt);
}
function back_404($txt = 'Route Error Or Page Not Be Found.'){
    return_404($txt);
}
function exit_404($txt = 'Route Error Or Page Not Be Found.'){
    return_404($txt);
}


// 获取IP
function get_real_ip(){

    $ip = FALSE;
    //客户端IP 或 NONE
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    }

    //多重代理服务器下的客户端真实IP地址（可能伪造）,如果没有使用代理，此字段为空
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }

        for ($i = 0; $i < count($ips); $i++) {
            if ($ips[$i] == '127.0.0.1' || $ips[$i] == 'localhost'){
                $ip = '127.0.0.1';
                break;
            }else{

                if (!function_exists('eregi')) { // 校验旧函数eregi()

                    $ip = $ips[$i];

                    break;
                }else{
                    $w_ip = eregi("^(10│172.16│192.168).", $ips[$i]);
                    if (!$w_ip) {
                        $ip = $ips[$i];
                        break;
                    }
                }

            }
        }
    }
    //客户端IP 或 (最后一个)代理服务器 IP
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

// get、post
function request($request_url='', $method='post', $request_data=[], $to_json=false){
    if (empty($request_url)) {
        $back = '{"state":0, "msg":"request_url is null", "content":""}';
    }else{

        if ($method == 'post'){

            $body = http_build_query($request_data);
            $options = [
                'http' => [
                    'method' => 'POST', // 注意要大写
                    'header' => 'Content-type:application/x-www-form-urlencoded',
                    'content' => $body,
                ],
            ];
            $context = stream_context_create($options);
            $data = @file_get_contents($request_url, false, $context);

            $back = $data;
        }else if ($method == 'get'){

            $body = http_build_query($request_data);
            $options = [
                'http' => [
                    'method' => 'GET', // 注意要大写
                    'header' => 'Content-type:application/x-www-form-urlencoded',
                ],
            ];
            $context = stream_context_create($options);
            $data = @file_get_contents($request_url.$body, false, $context);

            $back = $data;
        }else{
            $back = '{"state":0, "msg":"method error", "content":""}';
        }

    }

    if ($to_json == true){
        $res = json_decode($back, true);
    }else{
        $res = $back;
    }

    return $res;
}

// 获取当前访问的完整url
function get_url($port=false) {
    $url = 'http://';
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
        $url = 'https://';
    }

    if ($port == true){ // 带端口
        $url .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
    }else{
        $url .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }

    return $url;
}

// 操作系统
function os_info() {
    if (!empty($_SERVER['HTTP_USER_AGENT'])) {
        $os = $_SERVER['HTTP_USER_AGENT'];
        return $os;
    } else {
        return 'unknown-os';
    }
}

// 浏览器类型
function browser_info() {
    if (!empty($_SERVER['HTTP_USER_AGENT'])) {
        $br = $_SERVER['HTTP_USER_AGENT'];
        return $br;
    } else {
        return 'unknown-browser';
    }
}

// 浏览器语言
function lang_info() {
    if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $lang = substr($lang, 0, 5);
        if (preg_match('/zh-cn/i',$lang)) {
            $lang = '简体中文';
        } else if (preg_match('/zh/i',$lang)) {
            $lang = '繁体中文';
        } else {
            $lang = 'English';
        }
        return $lang;
    } else {
        return 'unknown-lang';
    }
}

// 判断是否是uc浏览器
function is_uc(){
    if(strpos($_SERVER['HTTP_USER_AGENT'],'UCBrowser') !== false || strpos($_SERVER['HTTP_USER_AGENT'],'UCWEB') !== false){
        return true;
    }else{
        return false;
    }
}


// 判断是否是qq浏览器
function is_qq(){
    if(strpos($_SERVER['HTTP_USER_AGENT'],'MQQBrowser')!==false){
        return true;
    }else{
        return false;
    }
}


// 将laravel查询数据后返回的stdClass Object格式转换成array
function json_to_array($object_data){
    return json_decode(json_encode($object_data),true);
}
// 将array转换成json
function array_to_json($array_data){
    return json_encode($array_data, JSON_UNESCAPED_UNICODE);
}
// 将string转换成array
function string_to_array($string_data){
    return json_decode($string_data, true);
}
// 万能转换，不需要知道数据格式就可以转换成array
function type_to_array($data){
    if (is_string($data)){
        $res = json_decode($data, true);
        $type = 'string';
    }else if (is_object($data)){
        $res = json_decode(json_encode($data),true);
        $type = 'object';
    }else if (is_array($data)){
        $res = $data;
        $type = 'array';
    }else{
        $res = [];
        $type = gettype($data);
    }

    return $res;
}


/*
 * php正则出url所有参数
 * 支持 ?、$、#
 * */
function get_url_key($url){
    $result = array();
    $mr     = preg_match_all('/(\?|&|#)(.+?)=([^&?#]*)/i', $url, $matchs);
    if ($mr !== false) {
        for ($i = 0; $i < $mr; $i++) {
            $result[$matchs[2][$i]] = $matchs[3][$i];
        }
    }
    return $result;
}

/*
 * 获取url键的参数
 * */
function get_url_value($url, $key){
    if (!$url){
        $url = get_url();
    }

    $array = get_url_key($url);

    if ($array){
        if(isset($array[$key])){
            $value = $array[$key];
        }else{ // 无匹配键
            $value = 'not-that-key';
        }
    }else{ // 有匹配键但是无参数
        $value = "";
    }

    return $value;
}


// 计算分页数字
// 总共数据total,首页first_page,上一页pre_page,当前页now_page，下一页next_page,尾页last_page
function cal_page($total = 0, $limit = 1, $now_page = 1, $url = '', $url_suffix = ''){
    $first_page = 1;
    $last_page = floor($total/$limit) + 1;
    $pre_page = '';
    $next_page = '';
    if ($now_page >= 1 || $now_page <= $last_page-2){
        $pre_page = $now_page - 1;
        $next_page = $now_page + 1;
    }
    if ($now_page <= 1 || $pre_page == $now_page){
        $pre_page = '';
    }
    if ($now_page >= $last_page || $next_page == $last_page){
        $next_page = '';
    }
    if ($total <= 1){
        $pre_page = '';
        $next_page = '';
        $last_page = '';
    }

    $total_div = '<a class="data-page-a data-page-total select-none">共'.$total.'条数据，共'.$last_page.'页</a>';
    $first_a = '<a class="data-page-a data-page-first click" target="_self" href="'.$url.$first_page.$url_suffix.'">首页</a>';
    $pre_a = '<a class="data-page-a data-page-pre click" target="_self" href="'.$url.$pre_page.$url_suffix.'">上一页</a>';
    $now_a = '<a class="data-page-a data-page-now click" target="_self" href="'.$url.$now_page.$url_suffix.'">第'.$now_page.'页</a>';
    $next_a = '<a class="data-page-a data-page-next click" target="_self" href="'.$url.$next_page.$url_suffix.'">下一页</a>';
    $last_a = '<a class="data-page-a data-page-last click" target="_self" href="'.$url.$last_page.$url_suffix.'">尾页</a>';

    if (!$pre_page){
        $pre_a = '';
    }
    if (!$next_page){
        $next_a = '';
    }
    if (!$last_page){
        $last_a = '';
    }

    $page_html = '<div class="page-html-div">'.$total_div.$first_a.$pre_a.$now_a.$next_a.$last_a.'<div class="clear"></div></div>';

    return [
        'total'=> $total,
        'first_page'=> $first_page,
        'pre_page'=> $pre_page,
        'now_page'=> $now_page,
        'next_page'=> $next_page,
        'last_page'=> $last_page,
        'page_html'=> $page_html,
    ];

}


// 通用分页：首页，2，3，[4]，5，6，尾页
// 计算分页
function calc_paging($href, $total, $limit, $now_page){
    $page_num = ceil($total / $limit) + 1; // 总页数
    $span = ''; // 最终渲染的分页
    $foot_len = 6; // 分页数的步长

    if ($page_num >= 1){
        // 计算页码标记
        $last_num = $page_num - 1; // 所有页数
        $first_page = $now_page - ceil($foot_len/2); if ($first_page<=0){$first_page=0;} // 可见的分页起始
        $last_page =  $now_page + ceil($foot_len/2); if ($last_page>=$last_num){$last_page=$last_num;} // 可见的分页最后
        // 制作首页
        $a_href = $href.'1';
        $span = '<span class="page-total" style="border-radius: 30px;">共'.$total.'条数据</span>'.PHP_EOL;
        $span = $span.'<a rel="start" href="'.$a_href.'" target="_self" title="首页：1"><span class="" data-page="">首页</span></a>'.PHP_EOL;
        // 制作分页
        for ($m=$first_page; $m<$last_page; $m++){
            $the_page = $m + 1;
            // 渲染当前选中
            $active = '';
            if ($the_page == $now_page){
                $active = 'active';
            }
            // 制作分页标号
            $a_href = $href.$the_page;
            $span = $span.'<a href="'.$a_href.'" target="_self" title=""><span class="'.$active.'" data-page="'.$the_page.'">'.$the_page.'</span></a>'.PHP_EOL;
        }
        // 制作尾页
        $a_href = $href.$last_num;
        $span = $span.'<a href="#" target="_self" title="..."><span class="" data-page="none">...</span></a>'.PHP_EOL;
        $span = $span.'<a href="'.$a_href.'" target="_self" title="尾页：'.$last_num.'"><span class="" data-page="">'.$last_num.'</span></a>'.PHP_EOL;

    }else{
        $a_href = $href.'1';
        $span = '<a rel="start" href="'.$a_href.'" target="_self" title="首页：1"><span class="" data-page="">首页</span></a>'.PHP_EOL;
    }

    return $span;
}


// 字符串包含字符串
function string_include_string($big_string, $min_string, $some=true){
    if (!$big_string || !$min_string){
        return false; // 不含
    }else{
        if ($some=true){ // 不区分大小写
            if(stripos($big_string,$min_string) !== false){
                return true; // 含
            }else{
                return false; // 不含
            }
        }else{ // 区分大小写
            if(strpos($big_string,$min_string) !== false){
                return true; // 含
            }else{
                return false; // 不含
            }
        }
    }
}


// 写入日志
function write_log($log_txt, $log_where='nil_where', $log_name='default_'){
    $func_path = dirname(dirname(__FILE__)); // 项目index的根目录
    $save_path = '/storage/safe-log/';

    $log_name = $log_name.date('Y-m-d');
    $log_file = $func_path.$save_path.$log_name.'.log';
    // 判断文件夹是否存在
    if (!is_dir($func_path.'/storage/')){
        mkdir ( $func_path.'/storage/', 0777);
    }
    if (!is_dir($func_path.$save_path)){
        mkdir ( $func_path.$save_path, 0755);
    }

    $log_content = "【where】{$log_where}。【txt】{$log_txt}"; // 内容

    $html_file = fopen($log_file, "a"); // a继续写入，w覆盖写入
    if (!$html_file) {
        exit('log无法写入到文件夹：'.$save_path);
    }else{
        fwrite($html_file, date("Y-m-d H:i:s ").var_export($log_content, true)."\r\n\n"); // 写入文件
        fclose($html_file); // 关闭文件
    }

}

// 压缩html，js不压缩
function compress_html_dom($html_dom){
    return preg_replace("~>\s+<~", "><",preg_replace("~>\s+\r\n~", ">", $html_dom));
}

// 压缩html整个页面，html、js都压缩
// 注意：js压缩后页面可能会报错
function compress_html_page($html_page){
    return ltrim(rtrim(preg_replace(array("/> *([^ ]*) *</","//","'/\*[^*]*\*/'","/\r\n/","/\n/","/\t/",'/>[ ]+</'),array(">\\1<",'','','','','','><'),$html_page)));
}

// 删除非法字符
function del_bad_chars($str){
    $str = strip_tags($str);
    $str = str_replace('\\','',$str);
    $str = str_replace('/','',$str);
    $str = str_replace('*','',$str);
    $str = str_replace('?','',$str);
    $str = str_replace(':','',$str);
    $str = str_replace('<','',$str);
    $str = str_replace('>','',$str);
    $str = str_replace('|','',$str);
    $str = str_replace('"','',$str);
    $str = str_replace(' ','',$str);
    return $str;
}