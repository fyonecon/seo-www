<?php
// 新闻“相关推荐”
$html_hot_news= '';
$res_hot_news = request( // 请求数据
    $api_url.'app/hot_news',
    'post',
    [ // 参数
        'app_class'=> 'web',
        'user_token'=> $white_app_token,
        'limit'=> 10,
        'that_id'=> $news_info_id,
    ],
    true
);
if ($res_hot_news['state'] == 1){
    $content = $res_hot_news['content'];
//     print_r($content);
    $info = $content;
    // 其他
    for ($ha=0; $ha<count($content); $ha++){
        $info = $content[$ha];

        $the_news_info_id = $info['news_info_id'];
        $the_title = $info['title'];
        $the_cover = $info['cover'];

        $the_href = $web_url.'detail/detail-information.php?nav=information&news_info_id='.$the_news_info_id;

        $html_hot_news = $html_hot_news.'<div class="article-hot-li"><a '.$a_spider_state.' href="'.$the_href.'" target="_self" title="'.$the_title.'">'.$the_title.'</a></div>';

    }
}else{
    $html_hot_news = '（无其他数据）';
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
        <?=$html_hot_news?>
    </div>
    <div class="clear"></div>
</div>