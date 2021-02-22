<?php

$title = '页面404';
$keywords = '404';
$description = '404页面，请输入正确网址路径。';

$index_path = dirname(__FILE__); // 项目index的根目录

// 返回404状态
header("HTTP/1.1 404 Not Found");
header("Status: 404 Not Found");
header('Content-Type: text/html; charset=utf-8');
echo '<meta http-equiv="Refresh" content="10;url=https://www.baidu.com" />';

require_once $index_path.'/config/config.php';
require $index_path.'/common/function.php';
require_once $index_path.'/common/safe_check.php';

require $index_path.'/header/pages_default/head.php';
require $index_path.'/header/pages_default/nav.php';

?>

<!-- 开始-内容 -->
<div class="content-div" style="min-height: 500px;">
    <!--其他-->
    <h2>页面404，请输入正确网址。</h2>

</div>
<!-- 结束-内容 -->
<div class="clear"></div>

<?php

require $index_path.'/config/must.php';
require $index_path.'/header/pages_default/foot.php';
require_once $index_path.'/common/safe_echo.php';
?>
