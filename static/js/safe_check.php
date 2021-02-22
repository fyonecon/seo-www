<?php

/*
 * 页面安全校验
 * */

// 获取页面token
function get_app_token($api_url, $app_class){
    $_ip = get_real_ip();
    $_os = os_info();
    $_browser_info = browser_info();
    $_lang_info = lang_info();
    $client_info = $_os.'#@'.$_browser_info.'#@'.$_lang_info.'#@'.$_ip;
    $request_data = [
        'app_class'=> $app_class,
        'url'=> get_url(),
        'real_ip'=> $_ip,
        'client_info'=> $client_info,
    ];
    $res = request($api_url.'app/get_app_token', 'post', $request_data, false);
    $res = type_to_array($res);

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
            $app_token = '';
        }

        return $app_token;
    }else{
        return 'api-request-error';
    }

}

// 收集refer
function save_referer($api_url){
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

    $_ip = get_real_ip();
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
    $res = request($request_url, 'post', $request_data, $to_json=false);
}

// 检查PHP环境
function run_php(){
    $php_version = substr(PHP_VERSION,0,3)*10;

    if ($php_version >= 71){
        return true;
    }else{
        return false;
    }
}

// ======================================================================

// 是否允许蜘蛛收录页面
$spider_state = false; // true收录，false不收录
if (!$spider_state){
    echo '<meta name="robots" content="noindex, nofollow"/>';
}

// PHP运行环境校验
if (run_php()){
    $app_token = get_app_token($api_url, $app_class);
//    save_referer($api_url);
}else{
    exit("PHP运行环境不符合条件，PHP版本不能低于7.1。");
}


