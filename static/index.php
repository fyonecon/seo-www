<?php
/*
 * 引导页，不做正式页面
 * */
header( 'Content-Type:text/html;charset=utf-8');
header('HTTP/1.1 301 Moved Permanently');
header('Location: ../404.php?t=static');
exit;