<?php // 依赖

$title = '功能块-示例页-详情页'; // 必填
$keywords = ''; // 可选，为空时将使用默认
$description = ''; // 可选，为空时将使用默认

$index_path = dirname(dirname(dirname(__FILE__))); // 项目index的根目录

require $index_path.'/config/config.php';
require $index_path.'/common/function.php';
require $index_path.'/common/secret_id.php';
require $index_path.'/common/safe_check.php';
?>


<?php // 解析参数

// 获取本页数据
function get_detail($api_url, $app_class, $white_app_token){
    $id = get_url_value("", "id");
    if ($id){
        $secret = new Secret_id();
        $the_id = $secret->id_decode($id);

        if ($the_id){
            $res = request( // 请求数据
                $api_url.'app/list_campus_class',
                'post',
                [ // 参数
                    'app_class'=> $app_class,
                    'user_token'=> $white_app_token,
                    'campus_class_id'=>'all',
                ],
                true
            );
            if ($res['state'] == 1){
                $content = $res['content'];
                return type_to_array($content);
            }else{
                back_404("无对应页面数据，-3");
            }
        }else{
            back_404("无对应页面数据，-2");
        }
    }else{
        back_404("无对应页面数据， -1");
    }

}

//$content = get_detail($api_url, $app_class, $white_app_token);

//print_r($content);

?>


<?php // 依赖
require $index_path . '/header/pages_example/head.php';
require $index_path . '/header/pages_example/nav.php';
?>

<!-- 开始-内容 -->
<div class="content-div">

    <h2><?=$title?></h2>

    <article>
        example
    </article>

</div>
<!-- 结束-内容 -->

<script>


    function page_data_init(){
        console_log("页面功能已启动");


    }

</script>

<?php // 依赖
require $index_path.'/config/must.php';
require $index_path.'/header/pages_example/foot.php';
require $index_path.'/common/safe_echo.php';
?>
