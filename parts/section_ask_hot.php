<?php

// 问答“相关推荐”
$html_hot_ask= '';
$res_hot_ask = request( // 请求数据
    $api_url.'app/hot_ask_question',
    'post',
    [ // 参数
        'app_class'=> 'web',
        'user_token'=> $white_app_token,
        'limit'=> 10,
        'that_id'=> $ask_question_id,
    ],
    true
);
if ($res_hot_ask['state'] == 1){
    $content = $res_hot_ask['content'];
//     print_r($content);
    $info = $content;
    // 其他
    for ($ha=0; $ha<count($content); $ha++){
        $info = $content[$ha];

        $the_ask_question_id = $info['ask_question_id'];
        $the_ask_user_name = $info['ask_user_name'];
        $the_ask_title = $info['ask_title'];
        $the_ask_description = $info['ask_description'];
        $the_cover = $info['ask_cover'];

        $the_href = $web_url.'detail/detail-community.php?nav=ask&ask_question_id='.$the_ask_question_id;

        $html_hot_ask = $html_hot_ask.'<div class="article-hot-li"><a '.$a_spider_state.'  href="'.$the_href.'" target="_self" title="'.$the_ask_title.'">'.$the_ask_title.'</a></div>';

    }
}else{
    $html_hot_ask = '（无其他数据）';
}


?>

<style>
    .tag-body{
        margin-top: 0 !important;
        border-top: 1px solid #d3d3d3;
        padding: 20px 0px;
    }
    .tag-top{
        padding: 0px !important;
    }
    .article-hot{

    }
    .article-hot-title{
        font-size: 22px;
        padding-bottom: 10px;
    }
    .article-hot-ul{
        padding-bottom: 10px;
        opacity: 0.8;
    }
    .article-hot-li{
        font-size: 16px;
        padding-bottom: 10px;
    }

</style>

<div class="article-hot">
    <h2 class="article-hot-title">相关推荐</h2>
    <div class="article-hot-ul">
        <?=$html_hot_ask?>
    </div>
    <div class="clear"></div>
</div>
