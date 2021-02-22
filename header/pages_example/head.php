<?php

$head_path = dirname(dirname(dirname(__FILE__))); // 项目index的根目录

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <?=$dns_prefetch?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="max-age=600" />
    <?=$meta_spider_state?>
    <title><?=isset($title)?$title:'未知标题' ?>_<?=isset($sys_name)?$sys_name:'（未知标语）' ?></title>
    <meta name="keywords" content="<?=isset($keywords)?$keywords:$sys_keywords ?>"/>
    <meta name="description" content="<?=isset($description)?$description:$sys_description ?>"/>
    <meta name="author" content="" />
    <meta name="location" content="ip=0">
    <link rel="shortcut icon" href="<?=$file_url?>static/favicon.ico" type="image/x-icon"/>

    <link rel="canonical" href="<?=get_url()?>"/>
    <meta name="mobile-agent" content="format=html5;url=https://m.cswendu.com">
    <link rel="alternate" media="only screen and (max-width: 640px)" href="https://m.cswendu.com">
    <meta name="mobile-agent" content="format=[wml|xhtml|html5]; url=https://m.cswendu.com"/>
    <meta name="applicable-device" content="pc,mobile">

</head>
<body class="body- body">
