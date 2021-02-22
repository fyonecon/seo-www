<?php

$title = '页面404'; // 必填
$keywords = '404'; // 可选，为空时将使用默认
$description = '404页面，请输入正确网址路径。'; // 可选，为空时将使用默认

$index_path = dirname(__FILE__); // 项目index的根目录

// 返回404状态
header("HTTP/1.1 404 Not Found");
header("Status: 404 Not Found");
header('Content-Type: text/html; charset=utf-8');
echo '<meta http-equiv="Refresh" content="10;url=https://www.baidu.com" />';

require $index_path.'/config/config.php';
require $index_path.'/depend/function.php';
require $index_path.'/depend/safe_check.php';

require $index_path.'/header/pages_default/head.php';
require $index_path.'/header/pages_default/nav.php';

?>

<!--开始-模块页内容-->
<section class="view-section clear">

    <div style="min-height: 500px;">
        <!--其他-->
        <h2>页面404，请输入正确网址。</h2>

    </div>

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
require $index_path.'/header/pages_default/foot.php';
require $index_path.'/depend/safe_echo.php';
?>
