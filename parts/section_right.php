<?php

// 课程轮播
$html_course_slider = '';
$res_course_slider = request( // 请求数据
    $api_url.'app/list_course',
    'post',
    [ // 参数
        'app_class'=> 'web',
        'user_token'=> $white_app_token,
        'course_id'=> 'all',
        'course_class_id'=> 7, // 只取首页推荐的分类
    ],
    true
);
if ($res_course_slider['state'] == 1){
    $content = $res_course_slider['content'];
    $info = $content;
    // 其他
    for ($a=0; $a<count($content); $a++){
        $info = $content[$a];

        $the_course_id = $info['course_id'];
        $the_course_name = $info['course_name'];
        $the_course_cover = $info['course_cover'];
        $the_course_url = $info['course_url'];
        $the_course_description = $info['course_description'];

        $html_course_slider = $html_course_slider.'<div class="swiper-slide">
                <a href="'.$the_course_url.'" target="_blank" title="'.$the_course_name.'">
                    <img src="'.$the_course_cover.'" data-img_name="" alt="'.$the_course_description.'"/>
                </a>
            </div>'.PHP_EOL;

    }
}else{
    $html_course_slider = '<div class="swiper-slide">
                <a href="'.$web_url.'detail/detail-rainbow-card.php?nav=2021" target="_blank" title="文都热报课程">
                    <img src="'.$img_url.'static/img/information-right-top-banner1.jpg" data-img_name="information-right-top-banner1.jpg" alt="文都考研banner"/>
                </a>
            </div>';
}


?>
<!--侧栏-->
<!---->
<div class="hot-recommend">
    <h1>热报课程</h1>
</div>
<div class="right-top" style="margin-top: -17px;">
    <div class="swiper-container homeBanner-swiper-container">
        <div class="swiper-wrapper homeBanner-swiper-wrapper">
            <!---->
<!--            <div class="swiper-slide">-->
<!--                <a href="--><?//=$file_url?><!--detail/detail-rainbow-card.php?nav=2021" target="_blank" title="文都热报课程">-->
<!--                    <img src="--><?//=$img_url?><!--static/img/information-right-top-banner1.jpg" data-img_name="information-right-top-banner1.jpg" alt="文都考研banner"/>-->
<!--                </a>-->
<!--            </div>-->

            <?=$html_course_slider?>

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination homeBanner-swiper-pagination"></div>
    </div>

    <script>
        //banner轮播图
        function bannerSwiperInit(){
            var swiper = new Swiper('.homeBanner-swiper-container', {
                pagination: {
                    el: '.homeBanner-swiper-pagination',
                },
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
            });
        }
        bannerSwiperInit()
    </script>

</div>

<!---->
<div class="hot-recommend">
    <h1>热点资讯</h1>
    <div class="list hot-news-list">
        <!---->
<!--        <a href="--><?//=$web_url?><!--kaoyankecheng.php?route=nav&nav=kaoyankecheng" target="_blank" title="考研资讯" class="WordJustOneLine">研招统考预报名5个问题请关注</a>-->

    </div>
</div>

<!---->
<div class="hot-communication">
    <h1>研友交流群</h1>
    <div class="list">
        <a title="研友交流群" class="WordJustOneLine information-num">湖南考研22学习群  :<span>1137513945</span></a>
        <a title="研友交流群" class="WordJustOneLine information-num">农大21考研学员群:<span>897178755</span></a>
        <a title="研友交流群" class="WordJustOneLine information-num">2021林科大官方群:<span> 1023382939</span></a>
        <a title="研友交流群" class="WordJustOneLine information-num">湖师大2021考研群:<span>1005752702</span></a>
        <div class="code"><img src="<?=$img_url?>static/img/information-code.png" data-img_name="information-code.png" alt="文都考研二维码" title="文都考研二维码"/></div>
    </div>
</div>

<!---->
<div class="hot-recommend">
    <h1>官方微博</h1>
</div>
<div class="weibo-div">
	<iframe src="https://m.weibo.cn/u/2053542853" data-m_href="https://m.weibo.cn/u/2053542853" data-pc_href="https://weibo.com/u/2053542853" frameborder="0" scrolling="auto"  class="weibo-iframe"></iframe>
</div>


<script>
    //获取热门新闻
    function getHot(){
        let params = {
            method:'POST',
            url: "<?=$api_url?>"+"app/hot_news" ,
            data :{
                app_class:'web',
                user_token:window.token,
                page:1,
                limit:6
            },
            successfn:function(res){
                let jsonRes = $.parseJSON( res );
                console_log(jsonRes)
                let content = jsonRes.content
                getHotAddHot(content)

            }

        }
        all.sendAjax(params)
    }
    //热门新闻插入
    function getHotAddHot(content){
        $('.hot-news-list').html('')
        $.isArray(content)&&content.forEach((item,index)=>{
            let html = `<a href="<?=$web_url?>detail/detail-information.php?
            news_info_id=${item.news_info_id}" target="_blank" title="考研资讯" class="WordJustOneLine">${item.title}</a>`

            $('.hot-news-list').append(html)

        })
    }

</script>