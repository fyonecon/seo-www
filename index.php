<?php

$title = '首页'; // 必填
$keywords = ''; // 可选，为空时将使用默认
$description = ''; // 可选，为空时将使用默认

$index_path = dirname(__FILE__); // 项目index的根目录

require $index_path.'/config/config.php';
require $index_path.'/depend/function.php';
require $index_path.'/depend/safe_check.php';

$title = $sys_home_title; // 重新取赋值

require $index_path.'/header/pages_default/head.php';
require $index_path.'/header/pages_default/nav.php';

?>

<style>
    .swiper-container {
        width: 100%;
        height: 100%;
    }
    .swiper-slide {
        font-size: 18px;
        /* background: paleturquoise; */
        /* Center slide text vertically */
    }
    .swiper-slide>img{
        width: 100%;
    }
</style>

<!--开始-模块页内容-->
<section class="view-section clear">


</section>
<!--结束-模块页内容-->


<!--开始-页面js-->
<script>

    function page_data_init(){
        console_log("页面功能已启动");
        console_log(app_token);

    }

</script>
<!--结束-页面js-->


<?php
//require $index_path.'/parts/seo_topic_url.php';
require $index_path.'/config/must.php';
require $index_path.'/header/pages_default/foot.php';
require $index_path.'/depend/safe_echo.php';
?>



