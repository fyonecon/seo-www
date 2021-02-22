<?php

$title = '示例页-专题页1'; // 必填
$keywords = ''; // 可选，为空时将使用默认
$description = ''; // 可选，为空时将使用默认

$index_path = dirname(dirname(dirname(dirname(__FILE__)))); // 项目index的根目录

require $index_path.'/config/config.php';
require $index_path.'/depend/function.php';
require $index_path.'/depend/safe_check.php';

require $index_path.'/header/pages_topic/head.php';
require $index_path.'/header/pages_topic/nav.php';

?>

<!--开始-模块页内容-->
<section class="view-section clear">

    <!--其他-->
    <h2>示例页-专题页1</h2>

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
require $index_path.'/config/must.php';
require $index_path.'/header/pages_topic/foot.php';
require $index_path.'/depend/safe_echo.php';
?>
