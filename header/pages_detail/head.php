<?php

$head_path = dirname(dirname(dirname(__FILE__))); // 项目index的根目录
if (!isset($title) || !isset($keywords) || !isset($description)){
    exit('参数不全detail：title，keywords，description');
}
require_once $head_path.'/parts/seo_default_tkd.php'; // 导入seo关键词参数

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <?=$dns_prefetch?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?=$meta_spider_state?>
    <title><?=$title?$title:'（未知）' ?><?=$sys_name?></title>
    <meta name="keywords" content="<?=$keywords?$keywords:$sys_keywords ?>"/>
    <meta name="description" content="<?=$description?$description:$sys_description ?>"/>
    <meta name="author" content="" />
    <meta name="location" content="province=;ip=">
    <link rel="shortcut icon" href="<?=$file_url?>static/favicon.ico" type="image/x-icon"/>

    <link rel="canonical" href="<?=get_url()?>"/>
    <meta name="mobile-agent" content="format=html5;url=https://m.cswendu.com">
    <link rel="alternate" media="only screen and (max-width: 640px)" href="https://m.cswendu.com">
    <meta name="mobile-agent" content="format=[wml|xhtml|html5]; url=https://m.cswendu.com"/>
    <meta name="applicable-device" content="pc,mobile">

</head>
<body class=" body">

