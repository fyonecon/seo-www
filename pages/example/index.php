<?php

$title = '功能块-示例页-目录页'; // 必填
$keywords = ''; // 可选，为空时将使用默认
$description = ''; // 可选，为空时将使用默认

$index_path = dirname(dirname(dirname(__FILE__))); // 项目index的根目录

require $index_path.'/config/config.php';
require $index_path.'/common/function.php';
require $index_path.'/common/safe_check.php';

require $index_path . '/header/pages_example/head.php';
require $index_path . '/header/pages_example/nav.php';

?>

<!-- 开始-内容 -->
<div class="content-div">
    <!--其他-->
    <h2>功能块-示例页-目录页</h2>
    <h3>
        <a class="jump-a" href="./detail.php?info=example-nav_example-detail&id=aid2175-bid208-cid166617-html" target="_blank" title="查看详情url示例">查看详情url示例=id</a>
    </h3>
    <h3>
        <a class="jump-a" href="./?info=example-nav_example-index&page=1" target="_self" title="查看详情url示例">查看详情url示例=page</a>
    </h3>

</div>
<!-- 结束-内容 -->
<div class="clear"></div>

<script>


    function page_data_init(){
        console_log("页面功能已启动");
        console_log(app_token);

    }

</script>

<?php
require $index_path.'/config/must.php';
require $index_path.'/header/pages_example/foot.php';
require $index_path.'/common/safe_echo.php';
?>
