<?php

$title = '站内搜索'; // 必填
$keywords = ''; // 可选，为空时将使用默认
$description = ''; // 可选，为空时将使用默认

$index_path = dirname(dirname(dirname(__FILE__))); // 项目index的根目录

require $index_path.'/config/config.php';
require $index_path.'/depend/function.php';
require $index_path.'/depend/safe_check.php';


$keyword = '';
$_keyword = '';
if (isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    $keyword = strip_tags($keyword);

    // 检测违禁词
    $res_black = request( // 请求数据
        $api_url.'app/check_black_keyword',
        'post',
        [ // 参数
            'app_class'=> 'web',
            'user_token'=> $white_app_token,
            'string'=> $keyword,
        ],
        true
    );
    if ($res_black['state'] == 1){ // 含有违禁词
        $keyword = '';
        $_keyword = '#<span style="color: red;">（搜索关键词含有违禁词）</span>';
    }


}else{
    $keyword = '';
}
$page = '';
if (isset($_GET['page'])){
    $page = $_GET['page'];
    if ($page>=0 && $page<= 100000000){
        // ok
    }else{ // 排除其他超返回或非法参数的情况
        $page = 0;
    }
}else{
    $page = '';
}


// 渲染新标题
if ($keyword){
    $title = $keyword.'_'.$title;
}


// 搜索
$html_list_course = '';
$html_list_ask = '';
$html_list_news = '';
$html_list_file = '';
$page_html = '';
$res_search = request( // 请求数据
    $api_url.'app/home_search',
    'post',
    [ // 参数
        'app_class'=> 'web',
        'user_token'=> $white_app_token,
        'keyword'=> $keyword,
        'page'=> $page,
    ],
    true
);
//var_dump($res_search);
if ($res_search['state'] == 1){
    $content = $res_search['content'];

    // 课程
    $list_course = $content['course_res'];
//    var_dump($list_course);
    for ($c=0; $c<count($list_course); $c++){
        $c_info = $list_course[$c];

        $course_cover = $c_info['course_cover'];
        $course_name = $c_info['course_name'];
        $course_description = $c_info['course_description'];
        $course_slogan = $c_info['course_slogan'];
        $course_url = $c_info['course_url'];
        $course_ad_url = $c_info['course_ad_url'];

        $html_list_course = $html_list_course.'<div class="search-course-item"><a class="" target="_blank" href="'.$course_url.'&load=search" title="'.$course_name.'">
                            <img class="search-course_cover" src="'.$course_cover.'" alt="'.$course_name.'"/>
                            <div class="clear"></div>
                            <div class="search-course-txt">
                                <div class="search-course_name">'.$course_name.'</div>
                                <div class="search-course_description">'.$course_description.'</div>
                                <div class="search-course_logan">'.$course_slogan.'</div>
                            </div>
                        </a></div>';

    }

    // 问答
    $list_ask = $content['ask_res'];
    for ($a=0; $a<count($list_ask); $a++){
        $a_info = $list_ask[$a];

        $the_ask_question_id = $a_info['ask_question_id'];
        $the_ask_title = $a_info['ask_title'];
        $the_ask_description = $a_info['ask_description'];
        $the_ask_user_name = $a_info['ask_user_name'];

        $the_href = $web_url.'detail/detail-community.php?nav=ask&ask_question_id='.$the_ask_question_id;
        $html_list_ask = $html_list_ask.'<a '.$a_spider_state.'  class="search-item-a" href="'.$the_href.'" target="_blank" title="'.$the_ask_title.'"><div class="search-item" data-id="'.$the_ask_question_id.'">
                            <h1 class="search-title">'.$the_ask_title.'</h1>
                            <h3 class="search-desc">问题：'.$the_ask_description.'</h3>
                            <div class="search-i">提问：'.$the_ask_user_name.'</div>
                        </div></a>'.PHP_EOL;

    }

    // 新闻
    $list_news = $content['news_res'];
    for ($n=0; $n<count($list_news); $n++){
        $n_info = $list_news[$n];

        $the_news_info_id = $n_info['news_info_id'];
        $the_title = $n_info['title'];
        $the_summary = $n_info['summary'];
        $the_author = $n_info['author'];

        $the_href = $web_url.'detail/detail-information.php?nav=information&news_info_id='.$the_news_info_id;
        $html_list_news = $html_list_news.'<a '.$a_spider_state.'  class="search-item-a" href="'.$the_href.'" target="_blank" title="'.$the_title.'"><div class="search-item" data-id="'.$the_news_info_id.'">
                            <h1 class="search-title">'.$the_title.'</h1>
                            <h3 class="search-desc">前言：'.$the_summary.'</h3>
                            <div class="search-i">编辑：'.$the_author.'</div>
                        </div></a>'.PHP_EOL;

    }

    // 文件
    $list_file = $content['file_res'];
//    var_dump($list_file);
    for ($l=0; $l<count($list_file); $l++){
        $l_info = $list_file[$l];
//        var_dump($l_info);

        $the_file_upload_id = $l_info['file_upload_id'];
        $the_file_zh_name = $l_info['file_zh_name'];
        $the_file_size = $l_info['file_size']; $the_file_size = $the_file_size/1024/1024; $the_file_size = sprintf("%.2f", $the_file_size);
        $the_file_ext = $l_info['file_ext'];

        $the_href = $web_url.'detail/detail-download.php?nav=download&file_upload_id='.$the_file_upload_id;
        $html_list_file = $html_list_file.'<a '.$a_spider_state.'  class="search-item-a" href="'.$the_href.'" target="_blank" title="'.$the_file_zh_name.'"><div class="search-item" data-id="'.$the_file_upload_id.'">
                            <h1 class="search-title">'.$the_file_zh_name.'</h1>
                            <h3 class="search-desc">文件大小：'.$the_file_size.'MB</h3>
                            <div class="search-i">文件类型：'.$the_file_ext.'</div>
                        </div></a>'.PHP_EOL;

    }


    // 分页
    $paging = $res_search['paging'];

    $the_total = $paging['total'];
    $the_limit = $paging['limit'];
    $now_page = $paging['page'];
    $page_href = $web_url.'pages/search/?nav=search&keyword='.$keyword.'&page='; // 分页中的地址

    $page_html = '<div class="spage-number">'.calc_paging($page_href, $the_total, $the_limit, $now_page).'</div>';


}else{
    $html_list_ask = '（暂无内容）';
    $html_list_news = '（暂无内容）';
    $page_html = '';
}


require $index_path.'/header/pages_default/head.php';
require $index_path.'/header/pages_default/nav.php';

?>
<style>
    .search-item{
        width: 100%;
        padding: 20px 0px 20px 0px;
    }
    .search-item-a{
        display: block;
        border-bottom: 1px solid #d0d0d0;
    }
    .search-title{
        font-size: 18px;
        line-height: 32px;
        font-weight: 600;
        padding: 0;
        margin-bottom: 10px;
    }
    .search-desc{
        font-size: 15px;
        line-height: 22px;
        padding: 0;
        margin: 0;
    }
    .search-i{
        font-size: 15px;
        color: grey;
        margin-top: 10px;
    }
    .search-item-li{
        text-align: left;
    }
    .search-page_html{
        text-align: center;
        margin: 20px 0;
    }
    .search-item-input{
        text-align: left;
    }
    .search-input{
        width: calc(480px - 4px);
        height: 40px;
        border: 1px solid #66a8fc;
        opacity: 1;
        padding: 0 10px;
        font-size: 16px;
        border-radius: 5px;
    }
    .search-a{
        font-size: 18px;
        height: 40px;
        background: #66a8fc;
        border-radius: 5px;
        color: white;
        margin-left: 15px;
        border: none;
        width: 120px;
        text-align: center;
        letter-spacing: 2px;
    }
    .search-item-input{
        padding-bottom: 10px;
    }
    .search-list_course{
        padding-bottom: 20px;
        border-bottom: 2px solid #EEEEEE;
    }
    .search-course-item{
        width: 276px;
        min-height: calc(180px);
        background: #f5f5f5;
        float: left;
        margin-right: 20px;
        margin-top: 20px;
        overflow: hidden;
        border-radius: 5px;
    }
    .search-course-item:nth-child(3n){
        margin-right: 0px;
    }
    .search-course-item:hover{
        opacity: 0.8;
    }
    .search-course-txt{
        padding: 0px 5px 5px 5px;
    }
    .search-course_cover{
        float: left;
        display: block;
        width: 100%;
        height: 150px;
    }
    .search-course_name{
        height: 32px;
        line-height: 40px;
        font-size: 16px;
        font-weight: 600;
        overflow: hidden;
        letter-spacing: 1px;
    }
    .search-course_description{
        height: 25px;
        line-height: 25px;
        overflow: hidden;
        font-size: 14px;
        letter-spacing: 1px;
        color: #6F6F6F;
    }
    .search-course_logan{
        height: 25px;
        line-height: 25px;
        overflow: hidden;
        font-size: 14px;
        letter-spacing: 1px;
        color: #06D191;
    }
</style>
<!-- 开始-内容 -->
<div class="view-section clear information" id="view-main">
    <section class="center">
        <div class="width-1200-center">

            <div class="center-body">
                <h1 class="title">站内搜索 <?php if ($keyword){echo '：#'.$keyword;}else{echo '：#（默认搜索结果）'; echo $_keyword; } ?></h1>
                <div class="search-item-input">
                    <form action="<?=$web_url?>pages/search/?" method="get">
                        <input class="search-input float-left" name="nav" value="search" type="hidden" />
                        <input class="search-input float-left" name="keyword" value="<?=$keyword?>" placeholder="请输入关键词，20个字以内" maxlength="20" type="text" />
                        <input class="search-input float-left" name="page" value="" type="hidden" />
                        <input id="search-a" class="search-a search-btn click float-left" type="submit" value="立即搜索" />
                    </form>
                    <div class="clear"></div>
                </div>
                <div class="list list-information search-item-li">
                    <div class="search-list_course">
                        <?=$html_list_course?>
                        <div class="clear"></div>
                    </div>

                    <div class="search-list_file">
                        <?=$html_list_file?>
                    </div>
                    <div class="search-list_ask">
                        <?=$html_list_ask?>
                    </div>
                    <div class="search-list_news">
                        <?=$html_list_news?>
                    </div>
                    <div class="search-page_html">
                        <?=$page_html?>
                    </div>
                </div>

            </div>

            <div class="right">
                <?php
                require $index_path.'/parts/section_right.php';
                require $index_path.'/parts/seo_tags.php';
                require $index_path.'/parts/seo_links.php';
                ?>
            </div>

            <div class="clear"></div>
        </div>
    </section>

</div>
<!-- 结束-内容 -->
<div class="clear"></div>

<script>


    function page_data_init(){
        console_log("页面功能已启动");
        getHot();

    }

</script>

<?php
require $index_path.'/config/must.php';
require $index_path .'/header/pages_default/foot.php';
require $index_path.'/depend/safe_echo.php';
?>
