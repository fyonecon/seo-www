<?php

// 获取自定义title,keywords,description
// 优先级：页面的tkd优先级 > 本页获取的seo_tkd优先级。因此，如需单独设置tkd，请在对应页面上部设置

$res_tkd = request( // 请求数据
    $api_url.'app/get_site_seo',
    'post',
    [ // 参数
        'app_class'=> 'web',
        'user_token'=> $white_app_token,
    ],
    true
);
if ($res_tkd['state'] == 1){
    $content = $res_tkd['content'];
//     print_r($content);
    $info = $content;
    // 其他
    $site_seo_title = $info['site_seo_title'];
    $site_seo_keywords = $info['site_seo_keywords'];
    $site_seo_description = $info['site_seo_description'];

    if ($site_seo_title){$sys_name = $site_seo_title;}
    if ($site_seo_keywords){$sys_keywords = $site_seo_keywords;}
    if ($site_seo_description){$sys_description = $site_seo_description;}

}
