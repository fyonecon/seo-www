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

    <link href="<?=$file_url?>static/css/common.css?<?=$head_time?>" rel="stylesheet"/>
    <link href="<?=$file_url?>static/css/all.css?<?=$head_time?>" rel="stylesheet"/>
    <link href="<?=$file_url?>static/css/style.css?<?=$head_time?>" rel="stylesheet"/>

    <script src="<?=$file_url?>static/js/jquery-1.11.3.min.js" type="text/javascript"></script>

    <script src="<?=$file_url?>static/js/common.js?<?=$head_time?>" type="text/javascript"></script>
    <script src="<?=$file_url?>static/js/check.js?<?=$head_time?>" type="text/javascript"></script>
    <script src="<?=$file_url?>static/js/all.js?<?=$head_time?>" type="text/javascript"></script>
    <script src="<?=$file_url?>static/js/md5.js" type="text/javascript"></script>
    <script src="<?=$file_url?>static/js/qrcode.js?<?=$head_time?>" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="<?=$file_url?>static/pl/jc_date/jcDate.css" media="all" />
    <script type="text/javascript" src="<?=$file_url?>static/pl/jc_date/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?=$file_url?>static/pl/jc_date/jQuery-jcDate.js" charset="utf-8"></script>

    <link href="<?=$file_url?>static/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="<?=$file_url?>static/css/animate.min.css" rel="stylesheet"/>

    <script src="<?=$file_url?>static/plugins/swiper/swiper.min.js"></script>
    <link href="<?=$file_url?>static/plugins/swiper/swiper.min.css?<?=$head_time?>" rel="stylesheet">
    <link href="<?=$file_url?>static/css/detail.less?<?=$head_time?>" rel="stylesheet/less">
    <script src="<?=$file_url?>static/js/less.js"></script>
    <script src="<?=$file_url?>static/js/jquery.sPage.js"></script>
    <link href="<?=$file_url?>static/css/jquery.sPage.css" rel="stylesheet">

</head>
<body class="body- body">
