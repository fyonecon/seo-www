

<footer class="foot-box clear">

    <?php // 模板渲染-SEO

    function list_campus_class($api_url, $white_app_token){

        $res = request( // 请求数据
            $api_url.'app/list_campus_class',
            'post',
            [ // 参数
                'app_class'=> 'web',
                'user_token'=> $white_app_token,
                'campus_class_id'=>'all',
            ],
            true
        );
        if ($res['state'] == 1){
            $content = $res['content'];
            for ($m = 0; $m < count($content); $m++) {
                $info = $content[$m];
                // 其他
                $campus_m_class_id = $info['campus_class_id'];
                $campus_m_class_name = $info['campus_class_name'];
                $selected = "";
                if ($m == 0){

                    $html = <<<html_content

            <div class="area-tabs-item selected" data-campus_class_id="{$campus_m_class_id}">{$campus_m_class_name}</div>

html_content;
                    echo $html;

                }else{
                    $html = <<<html_content

            <div class="area-tabs-item" data-campus_class_id="{$campus_m_class_id}">{$campus_m_class_name}</div>

html_content;
                    echo $html;
                }

            }
        }else{
            echo '<div class="tpl-error-div">（request模板渲染无数据）</div>';
        }

    }
    //list_campus_class($api_url, $white_app_token);

    ?>

</footer>


<div class="loading-div flex-center select-none hide" id="loading-div">
    <div class="loading-hidden-bg"></div>
    <div class="loading-icon"></div>
</div>
<div id="back-top" class="back-top select-none hide animated">Top</div>
<div class="js-write-div"></div>

<script src="<?=$file_url?>static/js/page.js?<?=$head_time?>"></script>
<div class="that-page-url-div hide"><a class="that-page-url-a" href="<?=get_url()?>" title="本页链接：<?=get_url()?>">本页链接：<?=get_url()?></a></div>
<div class="js-write-div clear" id="js-write-div"></div>

</body>
</html>
