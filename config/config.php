<?php

/*
 * 页面参数配置，面向PHP层
 * */

$this_host = $_SERVER['SERVER_NAME']; // 获取当前主域名

// 自动匹配主网址
if(strpos($this_host, 'cswendu.com') !== false){ // cswendu.com网站
    $this_domain = "https://{$this_host}/";
}else if (strpos($this_host, '.wendu.com') !== false){ // *.wendu.com网站
    $this_domain = "https://{$this_host}/pc/";
}else if (strpos($this_host, '127.0.0.1') !== false){ // 本地127.0.0.1
    $this_domain = "http://{$this_host}/cswendu.com/seo.www.cswendu.com/";
//    $this_domain = '/git-wendu2/seo.www.cswendu.com/';

}else{ // 默认
    $this_domain = "//{$this_host}/";
}

$web_url    = "{$this_domain}"; // 页面跳转主地址
$file_url   = "{$this_domain}"; // 静态文件
$img_url    = "{$this_domain}"; // 图片地址

$api_url    = 'https://api.cswendu.com/cswd/public/index.php/api/gen2/'; // api，若能内网访问，优先用内网地址。http://172.16.165.212、https://api.cswendu.com
$kefu_url   = 'xxx'; // 客服

$app_class  = 'seo_www'; // 接口来源/种类
$white_app_token = 'xxx'; // 白名单app_token，不能对外暴露，直径内部使用

$head_time  = date('Y'); // 静态清除缓存用
$foot_time  = date('Y'); // 静态清除缓存用

$show_php_error = false; // 是否显示PHP页面错误和敬告（不直接修改php.ini文件也能展示php文件报错和警告）。true展示，false不展示，线上版本请默认为false。

$spider_state        = true; // 全局页面是否被蜘蛛收录。true收录，false不收录
$html_static_state   = true; // 页面是否开启静态化，true开启，false关闭
$file_timeout        = 2*3600; // 静态页面文件过期时间，默认0.25h更新一次，单位：s
// $file_timeout        = 1; // 静态页面文件过期时间，默认0.25h更新一次，单位：s
$compress_html_state = true; // 是否开启html页面压缩，true开启，false关闭。静态化开启则此参数有效。
$meta_spider_state = ''; // 局部页面是否允许蜘蛛收录该页面
$a_spider_state = ''; // 局部页面是否允许蜘蛛收录该链接

$sys_home_title     = 'xxx官网'; // 默认标题
$sys_name           = 'xxx'; // 系统默认标题的后缀
$sys_keywords       = ''; // 系统默认关键词
$sys_description    = ''; // 系统默认描述

// 不同网站对应不同公共参数
if (in_array($this_host, ['cswendu.com', 'www.cswendu.com', 'm.cswendu.com'])){
    $logo_img_name = 'logo-hunan.png'; // 根据域名设置logo图片选哪张
    $website_beian = 'cswendu'; // 根据域名设置底部选哪个备案
    $app_class = 'seo_cswendu';
    $meta_spider_state = '';
    $a_spider_state = ''; //
}else if (in_array($this_host, ['cs.wendu.com', 'hn.wendu.com'])){
    $logo_img_name = 'logo.png';
    $website_beian = 'wendu';
    $app_class = 'seo_wendu';
    $meta_spider_state = '<meta name="robots" content="nofollow" />'.PHP_EOL;
    $a_spider_state = ' rel="nofollow" ';
}else{
    $logo_img_name = 'logo.png?site=other';
    $website_beian = 'wendu';
    $app_class = 'seo_other';
    $meta_spider_state = '<meta name="robots" content="nofollow" />'.PHP_EOL;
    $a_spider_state = ' rel="nofollow" ';
}

// 生成dns-prefetch
$dns_prefetch = '
    <link rel="dns-prefetch" href="'.$web_url.'" />
    <link rel="dns-prefetch" href=//img.cswendu.com" />
    <link rel="dns-prefetch" href=//oss.cswendu.com" />
    ';

// 展示PHP的exception和notice
// 不直接修改php.ini文件也能展示php文件报错和警告
if ($show_php_error == true){
    ini_set("display_errors", "On"); // 打开错误提示
    ini_set("error_reporting",E_ALL); // 显示所有错误
}