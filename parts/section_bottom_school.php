<?php
// 校区

?>
<style>
    .campus-title-div{
        padding: 40px 0;
        text-align: center;
    }
    .campus-title{
        font-size: 32px;
        line-height: 60px;
    }
    .campus-txt{
        font-size: 22px;
        line-height: 44px;
    }
</style>
<section class="section-map width-1200-center home-cell clear area-body ">
    <div class="campus-title-div">
        <div class="campus-title">湖南18大旗舰校区</div>
        <div class="campus-txt">同步课程，就近入学</div>
    </div>
    <div class="maps-content area-tabs clearfix">
        <?php // 模板渲染-SEO
        $res_campus_class = request( // 请求数据
            $api_url.'app/list_campus_class',
            'post',
            [ // 参数
                'app_class'=> $app_class,
                'user_token'=> $white_app_token,
                'campus_class_id'=>'all',
            ],
            true
        );
        if ($res_campus_class['state'] == 1){
            $content = $res_campus_class['content'];
            for ($m = 0; $m < count($content); $m++) {
                $info = $content[$m];
                // 其他
                $campus_m_class_id = $info['campus_class_id'];
                $campus_m_class_name = $info['campus_class_name'];
                $selected = "";
                if ($m == 0){
                    echo '<div class="area-tabs-item selected" data-campus_class_id="'.$campus_m_class_id.'">'.$campus_m_class_name.'</div>';
                }else{
                    echo '<div class="area-tabs-item" data-campus_class_id="'.$campus_m_class_id.'">'.$campus_m_class_name.'</div>'.PHP_EOL;
                }

            }
        }else{
            echo '<div class="tpl-error-div">（request模板渲染无数据）</div>';
        }
        ?>

    </div>

    <div class="maps-content area-detail-body">
        <?php // 模板渲染-SEO
        $res_campus = request( // 请求数据
            $api_url.'app/list_campus',
            'post',
            [ // 参数
                'app_class'=> $app_class,
                'user_token'=> $white_app_token,
                'campus_id'=>'all',
            ],
            true
        );
        if ($res_campus['state'] == 1){
            $content = $res_campus['content'];
            for ($n = 0; $n < count($content); $n++) {
                $info = $content[$n];
                // 其他
                $that_n_campus_class_id = $info['campus_class_id'];
                $that_n_campus_id = $info['campus_id'];
                $that_n_campus_name = $info['campus_name'];
                $that_n_campus_address = $info['campus_address'];
                $that_n_campus_address_url = $info['campus_address_url'];

                echo '<div class="area-line clearfix div-campus_class_id-'.$that_n_campus_class_id.'">
                                <div class="area-name">'.$that_n_campus_name.'：</div>
                                <div class="area-detail">'.$that_n_campus_address.'</div>
                            </div>'.PHP_EOL;

            }
        }else{
            echo '<div class="tpl-error-div">（request模板渲染无数据）</div>';
        }
        ?>
    </div>
    <div class="clear"></div>
</section>