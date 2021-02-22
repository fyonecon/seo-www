<?php

$title = '首页'; // 必填
$keywords = ''; // 可选，为空时将使用默认
$description = ''; // 可选，为空时将使用默认

$index_path = dirname(__FILE__); // 项目index的根目录

require $index_path.'/config/config.php';
require $index_path.'/common/function.php';
require $index_path.'/common/safe_check.php';

$title = $sys_home_title; // 重新取赋值

require $index_path.'/header/pages_default/head.php';
require $index_path.'/header/pages_default/nav.php';

?>

<style>
    .swiper-container {
        width: 100%;
        height: 100%;
    }
    .swiper-slide {
        font-size: 18px;
        /* background: paleturquoise; */
        /* Center slide text vertically */
    }
    .swiper-slide>img{
        width: 100%;
    }
</style>

<!--开始-模块页内容-->
<section class="view-section clear wendu-home" id="view-main">

    <div class="banner-div select-none">
        <div class="banner-slider-div home-banner">
            <div class="swiper-container homeBanner-swiper-container">
                <div class="swiper-wrapper homeBanner-swiper-wrapper">
                    <div class="swiper-slide"></div>
                    <div class="swiper-slide"><a href="" target="_blank" title="文都banner"></a></div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination homeBanner-swiper-pagination"></div>
            </div>
            <script>

            </script>
        </div>
        <!--<div class="banner-info-div width-1200-center hide"></div>-->

        <!---->
        <div class="show-imp-info select-text">
            <div class="show-imp-info-cell">
                <h4 class="show-imp-info-title">鹰飞集训营<span class="show-imp-info-span">全日制</span></h4>
                <ul class="ul-style">
                    <li class="show-imp-info-li click"><a href="<?=$web_url?>detail/detail-full-year.php?nav=training" title="集训营班" target="_blank">全年集训</a></li>
                    <li class="show-imp-info-li click"><a href="<?=$web_url?>detail/tg/bn-pc/index.html" title="集训营班" target="_blank">半年集训</a></li>
                    <li class="show-imp-info-li click"><a href="<?=$web_url?>detail/detail-full-year.php?nav=training" title="集训营班" target="_blank">秋季集训</a></li>
                    <li class="show-imp-info-li click"><a href="<?=$web_url?>detail/detail-full-year.php?nav=training" title="集训营班" target="_blank">冲刺集训</a></li>
                    <li class="show-imp-info-li click"><a href="<?=$web_url?>detail/tg/sj-pc/index.html" title="集训营班" target="_blank">暑假集训</a></li>
                    <li class="show-imp-info-li click"><a href="<?=$web_url?>detail/tg/hanjia/index.php?nav=training" title="集训营班" target="_blank">寒假集训</a></li>
                    <li class="show-imp-info-li click"><a href="<?=$web_url?>detail/tg/reexamination.php?nav=reexamination" title="集训营班" target="_blank">复试营</a></li>
                    <li class="show-imp-info-li click"><a href="<?=$web_url?>detail/tg/erzhan/index.php?nav=study-again" title="集训营班" target="_blank">二战集训营</a></li>

                    <li class="clear"></li>
                </ul>
            </div>
            <div class="show-imp-info-cell">
                <h4 class="show-imp-info-title">彩虹卡系列<span class="show-imp-info-span">周末辅导</span></h4>
                <ul class="ul-style">
                    <li class="show-imp-info-li click"><a href="<?=$web_url?>detail/tg/rainbow-card.php?nav=2021" title="2021考研" target="_blank">飞跃彩虹卡</a></li>
                    <li class="show-imp-info-li click"><a href="<?=$web_url?>detail/tg/rainbow-card.php?nav=2021" title="2021考研" target="_blank">绽放彩虹卡</a></li>
                    <li class="show-imp-info-li click"><a href="<?=$web_url?>detail/tg/rainbow-card.php?nav=2021" title="2021考研" target="_blank">魔力彩虹卡</a></li>
                    <li class="show-imp-info-li click"><a href="<?=$web_url?>detail/tg/rainbow-card.php?nav=2021" title="2021考研" target="_blank">菁英彩虹卡</a></li>

                    <li class="clear"></li>
                </ul>
            </div>
            <div class="show-imp-info-cell">
                <h4 class="show-imp-info-title">精品定制课<span class="show-imp-info-span">个性化</span></h4>
                <ul class="ul-style">
                    <li class="show-imp-info-li click"><a href="<?=$web_url?>detail/tg/oneto/?nav=reexamination" title="在职考研" target="_blank">考研1V1</a></li>
                    <li class="show-imp-info-li click"><a href="<?=$web_url?>detail/detail-onwork.php?nav=workindex" title="在职考研" target="_blank">在职考研</a></li>
                    <li class="show-imp-info-li click"><a href="<?=$kefu_url?>" title="在职考研" target="_blank">教育学定向</a></li>
                    <li class="show-imp-info-li click"><a href="<?=$kefu_url?>" title="在职考研" target="_blank">法律(非法学)定向</a></li>

                    <li class="clear"></li>
                </ul>
            </div>

        </div>

        <!---->
        <div class="show-imp-sub select-text">
            <div class="show-imp-sub-body">
                <div class="show-imp-sub-1">距离<span class="countdown-year">x年</span>考研还有</div>
                <div class="show-imp-sub-2"><span class="countdown-num">xxx</span>天</div>
                <div class="show-imp-sub-3">马上报名，奔向成功！</div>
            </div>
            <div class="show-imp-sub-4">
                <div class="input-border"></div>
                <i class="fa fa-user fa-1x input-fa-icon"></i>
                <input class="baoming-name baoming-input" type="text" maxlength="5" placeholder="您的称呼：" />
            </div>
            <div class="show-imp-sub-4">
                <div class="input-border"></div>
                <i class="fa fa-phone fa-1x input-fa-icon"></i>
                <input class="baoming-tel baoming-input" type="text" maxlength="11" placeholder="您的手机号：" />
            </div>
            <div class="show-imp-sub-5">
                <span class="zixun-btn click">立即咨询</span>
                <span class="baoming-btn click">我要报名</span>
            </div>
        </div>

    </div>

    <!---->
    <div class="change2020">
        <?php require $index_path.'/parts/section_home.php'?>
    </div>
    <!---->
    <div class="width-1200-center bg-white home-cell">
        <div class="hot-course-title flex-center">
            <h3 class="hot-course-title-txt">热报课程</h3>
        </div>

        <div class="course-div">
            <!---->
            <div class="course-item">
                <a href="<?=$web_url?>detail/detail-winter-vacation.php?nav=training" title="集训营" target="_blank">
                    <img src="<?=$img_url?>static/img/special-cover4.png" class="hot-course-cover" data-img_name="special-cover4.png" title="课程海报" alt="课程海报" />
                </a>
                <div class="clear"></div>
                <div class="hot-course-content">
                    <div class="hot-course-name">2021寒假集训营</div>
                    <div class="hot-course-description">特色：8天7晚，全程免费住宿</div>
                    <div class="hot-course-info">开营时间：2021/15-2021/1/12</div>
                    <span class="hot-course-ask click">免费咨询</span>
                </div>
            </div>
            <!---->
            <div class="course-item">
                <a href="<?=$web_url?>detail/detail-reexamination.php?nav=training" target="_blank">
                    <img src="<?=$img_url?>static/img/detail-teacher-img2.jpg" class="hot-course-cover" data-img_name="detail-teacher-img2.jpg" title="课程海报" alt="课程海报" />
                </a>

                <div class="clear"></div>
                <div class="hot-course-content">
                    <div class="hot-course-name">复试营</div>
                    <div class="hot-course-description">特色：备战复试，抢占调剂先机</div>
                    <div class="hot-course-info">开营时间：2021年2月-2021年4月</div>
                    <span class="hot-course-ask click">免费咨询</span>
                </div>
            </div>
            <!---->
            <div class="course-item">
                <a href="<?=$web_url?>detail/detail-rainbow-card.php?nav=training" target="_blank">
                    <img src="<?=$img_url?>static/img/special-cover3.png" class="hot-course-cover" data-img_name="special-cover3.png" title="课程海报" alt="课程海报" />
                </a>

                <div class="clear"></div>
                <div class="hot-course-content">
                    <div class="hot-course-name">2021高端彩虹卡</div>
                    <div class="hot-course-description">特色：一对一专业课辅导，名校定向</div>
                    <div class="hot-course-info">开课时间：滚动开班，18大校区同步</div>
                    <span class="hot-course-ask click">免费咨询</span>
                </div>
            </div>
            <!---->
            <div class="course-item">
                <a href="<?=$web_url?>detail/detail-rainbow-card.php?nav=training" target="_blank">
                    <img src="<?=$img_url?>static/img/detail-teacher-img1.jpg" class="hot-course-cover" data-img_name="detail-teacher-img1.jpg" title="课程海报" alt="课程海报" />
                </a>

                <div class="clear"></div>
                <div class="hot-course-content">
                    <div class="hot-course-name">2021全年集训营</div>
                    <div class="hot-course-description">特色：全日制教学，全程督学辅导</div>
                    <div class="hot-course-info">上课时间：2021年3月-2021年12月</div>
                    <span class="hot-course-ask click">免费咨询</span>
                </div>
            </div>

            <div class="clear"></div>
        </div>
        <div class="change2020">
            <div class=" width-1200-center bg-white xiaochengxu">
                <img src="<?=$img_url?>static/img/change2020/xcx.png" class="hot-course-cover" data-img_name="xcx.png" title="小程序" alt="小程序" />
            </div>
        </div>
    </div>
	
	<!-- new -->
	<div class="width-1200-center bg-white home-cell">
	    <h3 class="home-cell-title">
	        <a href="<?=$web_url?>pages/information/?nav=information" target="_blank" title="考研咨询，考研新闻">
	            <span class="home-cell-title-span">走进文都</span>
	        </a>
	    </h3>
	    <div class="home-cell-content" style="overflow: hidden;">
	        <div class="wendu-left">
	            <div class="wendu-1-content">
	
	                <!-- Swiper -->
	                <div class="swiper-container swiper-container-zoujin">
	                    <div class="swiper-wrapper swiper-wrapper-zoujin">
	                        <div class="swiper-slide swiper-slide-zoujin">
	                            <a href="<?=$web_url?>detail/detail-full-year.php?nav=2021" target="_blank">
	                                <img src="<?=$img_url?>static/img/home-news-left-top1.jpg"  data-img_name="home-news-left-top1.jpg" title="全年集训营" alt="全年集训营"/>
	                            </a>
	                        </div>
	                    </div>
	                    <!-- Add Pagination -->
	                    <div class="swiper-pagination swiper-pagination-zoujin"></div>
	                </div>
	                <!-- Swiper JS -->
	
	                <!-- Initialize Swiper -->
	                <script>
	                    
	                </script>
	
	            </div>
				<a class="wendu-2-content" target="_blank" href="<?=$web_url?>detail/tg/oneto/index.php?nav=2021&load=guanwang" >
					<img data-src="<?=$img_url?>static/img/home-news-left-c1.jpg"  data-img_name="home-news-left-c1.jpg" title="考研一对一" alt="考研一对一"/>
				</a>
				<a class="wendu-2-content"  target="_blank" href="<?=$web_url?>detail/tg/2022chk/index.html?load=guanwang">
					<img data-src="<?=$img_url?>static/img/home-news-left-c2.jpg"  data-img_name="home-news-left-c2.jpg" title="彩虹卡" alt="彩虹卡"/>
				</a>
	        </div>
	        
			<div class="new-wendu-right">
				<!-- 中间 -->
				<div class="new-wendu-center">
					<div class="top-news-one">
					</div>
					<!-- 第一部分 -->
					<div class="top1">
						<!-- <div class="wendu-news-li"><a href="" target="_blank" title="文都资讯"><span class="wendu-news-span">[考研资讯]</span>新闻标题新闻标题新闻标题新闻标题</a></div>
						<div class="wendu-news-li"><a href="" target="_blank" title="文都资讯"><span class="wendu-news-span">[考研资讯]</span>新闻标题新闻标题新闻标题新闻标题</a></div>
						<div class="wendu-news-li"><a href="" target="_blank" title="文都资讯"><span class="wendu-news-span">[考研资讯]</span>新闻标题</a></div>
						<div class="wendu-news-li"><a href="" target="_blank" title="文都资讯"><span class="wendu-news-span">[考研资讯]</span>新闻标题</a></div> -->
					</div>
					<!-- 第二部分 -->
					<div class="top2">
						<div class="top2-tab">
							<div class="top2-tab-item active" data-index="0">考研集训营</div>
							<div class="top2-tab-item " data-index="1">考研彩虹卡</div>
							<div class="top2-tab-item" data-index="2">考研1V1</div>
						</div>
						
						<div class="top2-body top2-body1 active">
							<div class="wendu-news-li"><a href="" target="_blank" title="文都资讯"><span class="wendu-news-span">考研资讯 |</span>新闻标题新闻标题新闻标题新闻标题</a></div>
							<div class="wendu-news-li"><a href="" target="_blank" title="文都资讯"><span class="wendu-news-span">考研资讯 |</span>新闻标题新闻标题新闻标题新闻标题</a></div>
							<div class="wendu-news-li"><a href="" target="_blank" title="文都资讯"><span class="wendu-news-span">考研资讯 |</span>新闻标题</a></div>
							<div class="wendu-news-li"><a href="" target="_blank" title="文都资讯"><span class="wendu-news-span">考研资讯 |</span>新闻标题</a></div>
						</div>
						<div class="top2-body top2-body2">
							<div class="wendu-news-li"><a href="" target="_blank" title="文都资讯"><span class="wendu-news-span">考研资讯 |</span>新闻标题新闻标题新闻标题新闻标题</a></div>
							<div class="wendu-news-li"><a href="" target="_blank" title="文都资讯"><span class="wendu-news-span">考研资讯 |</span>新闻标题新闻标题新闻标题新闻标题</a></div>
							<div class="wendu-news-li"><a href="" target="_blank" title="文都资讯"><span class="wendu-news-span">考研资讯 |</span>新闻标题</a></div>
							<div class="wendu-news-li"><a href="" target="_blank" title="文都资讯"><span class="wendu-news-span">考研资讯 |</span>新闻标题</a></div>
						</div>
						<div class="top2-body top2-body3">
							<div class="wendu-news-li"><a href="" target="_blank" title="文都资讯"><span class="wendu-news-span">考研资讯 |</span>新闻标题新闻标题新闻标题新闻标题</a></div>
							<div class="wendu-news-li"><a href="" target="_blank" title="文都资讯"><span class="wendu-news-span">考研资讯 |</span>新闻标题新闻标题新闻标题新闻标题</a></div>
							<div class="wendu-news-li"><a href="" target="_blank" title="文都资讯"><span class="wendu-news-span">考研资讯 |</span>新闻标题</a></div>
							<div class="wendu-news-li"><a href="" target="_blank" title="文都资讯"><span class="wendu-news-span">考研资讯 |</span>新闻标题</a></div>
						</div>
						
					</div>
					<!-- 第三部分 -->
					<div class="top3">
						<!-- 3-1 -->
						<div class="top3-item">
							<div class="top3-item-tab">
								<div class="top3-item-tab-item active" data-index="0">考研英语备考</div>
								<div class="top3-item-tab-item " data-index="1">考研英语资料</div>
							</div>
							<div class="top3-body top3-body1 active">
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
							</div>
							<div class="top3-body top3-body2">
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
							</div>
						</div>
						<!-- 3-2 -->
						<div class="top3-item">
							<div class="top3-item-tab">
								<div class="top3-item-tab-item active" data-index="2">考研数学备考</div>
								<div class="top3-item-tab-item " data-index="3">考研数学资料</div>
							</div>
							<div class="top3-body top3-body3 active">
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
							</div>
							<div class="top3-body top3-body4">
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
							</div>
						</div>
						<!-- 3-3 -->
						<div class="top3-item">
							<div class="top3-item-tab">
								<div class="top3-item-tab-item active" data-index="4">考研政治备考</div>
								<div class="top3-item-tab-item " data-index="5">考研政治资料</div>
							</div>
							<div class="top3-body top3-body5 active">
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
							</div>
							<div class="top3-body top3-body6">
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
							</div>
						</div>
						<!-- 3-4 -->
						<div class="top3-item">
							<div class="top3-item-tab">
								<div class="top3-item-tab-item active" data-index="6">四六级备考</div>
								<div class="top3-item-tab-item " data-index="7">专业课资料</div>
							</div>
							<div class="top3-body top3-body7 active">
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
							</div>
							<div class="top3-body top3-body8">
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
								<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="new-wendu-download">
					<!-- 标题 -->
					<div class="new-wendu-download-title">
						<div class="download-img">
							<img src="<?=$img_url?>static/img/download-img.png" alt="">
						</div>
						<a href="" target="_blank" class="download-title-word">考研资料下载</a>
					</div>
					<!-- 列表 -->
					<div class="new-wendu-download-body">
						<a href="" class="download-item" target="_blank">
							<i class="fa fa-file-pdf-o"></i>
							<span class="download-item-center">新闻标题新闻标题新闻标题新闻标题</span>
							<i class="fa fa-download"></i>
						</a>
						<a href="" class="download-item" target="_blank">
							<i class="fa fa-file-pdf-o"></i>
							<span class="download-item-center">新闻标题新闻标题新闻标题新闻标题</span>
							<i class="fa fa-download"></i>
						</a>
					</div>
				</div>
			</div>
			
	    </div>
	</div>
	
	<!--文都课程-->
	<div class="width-1200-center bg-white home-cell kc">
		<!-- 左侧 -->
	    <div class="kc-new-left">
			<h3 class="home-cell-title">
			    <a href="<?=$web_url?>pages/curriculum/?nav=curriculum" target="_blank" title="文都课程">
			        <span class="home-cell-title-span">文都课程</span>
			    </a>
			</h3>
			<div class="kc-left-b">
				<!-- Swiper -->
				<div class="swiper-container swiper-container-kecheng">
				    <div class="swiper-wrapper swiper-wrapper-kecheng">
				        <div class="swiper-slide swiper-slide-kecheng">
				            <a href="" class="" target="_blank" title="文都名师">
				            	<img data-src="<?=$img_url?>static/img/kc-left-b.jpg" alt="">
				            </a>
				        </div>
				    </div>
				    <!-- Add Pagination -->
				    <div class="swiper-pagination swiper-pagination-kecheng"></div>
				</div>
			</div>
			<!-- <a href="" class="kc-left-b" target="_blank" title="文都名师">
				<img data-src="<?=$img_url?>static/img/kc-left-b.jpg" alt="">
			</a> -->
		</div>
		<!-- 中间 -->
		<div class="kc-new-center">
			<div class="kc-center-tag-body">
				<div class="kc-center-tag active" data-index="0">鹰飞集训营</div>
				<div class="kc-center-tag" data-index="1">专业定向班</div>
				<div class="kc-center-tag " data-index="2">精品课程</div>
				<div class="kc-center-tag" data-index="3">助力营</div>
			</div>
			<div class="kc-center-item-body kc-center-item-body1 active" >
				<a class="kc-center-item" target="_blank" href="">
					<div class="kc-center-item-img">
						<img src="" alt="">
					</div>
					<h1 class="kc-center-item-title">全年集训营</h1>
					<p class="kc-center-item-title2">上课时间：2021年3月-2021年12月</p>
					<div class="kc-center-item-ask">
						<div class="kc-center-item-ask-img">
							<img data-src="<?=$img_url?>static/img/kc-center-item-ask-img.png" alt="">
						</div>
						<p>咨询</p>
					</div>
				</a>
			</div>
			<div class="kc-center-item-body kc-center-item-body2" >
				<a class="kc-center-item" target="_blank" href="">
					<div class="kc-center-item-img">
						<img src="" alt="">
					</div>
					<h1 class="kc-center-item-title">全年集训营</h1>
					<p class="kc-center-item-title2">上课时间：2021年3月-2021年12月</p>
					<div class="kc-center-item-ask">
						<div class="kc-center-item-ask-img">
							<img data-src="<?=$img_url?>static/img/kc-center-item-ask-img.png" alt="">
						</div>
						<p>咨询</p>
					</div>
				</a>
			</div>
			<div class="kc-center-item-body kc-center-item-body3 " >
				<a class="kc-center-item" target="_blank" href="">
					<div class="kc-center-item-img">
						<img src="" alt="">
					</div>
					<h1 class="kc-center-item-title">全年集训营</h1>
					<p class="kc-center-item-title2">上课时间：2021年3月-2021年12月</p>
					<div class="kc-center-item-ask">
						<div class="kc-center-item-ask-img">
							<img data-src="<?=$img_url?>static/img/kc-center-item-ask-img.png" alt="">
						</div>
						<p>咨询</p>
					</div>
				</a>
			</div>
			<div class="kc-center-item-body kc-center-item-body4 " >
				<a class="kc-center-item" target="_blank" href="">
					<div class="kc-center-item-img">
						<img src="" alt="">
					</div>
					<h1 class="kc-center-item-title">全年集训营</h1>
					<p class="kc-center-item-title2">上课时间：2021年3月-2021年12月</p>
					<div class="kc-center-item-ask">
						<div class="kc-center-item-ask-img">
							<img data-src="<?=$img_url?>static/img/kc-center-item-ask-img.png" alt="">
						</div>
						<p>咨询</p>
					</div>
				</a>
			</div>
		</div>
		<!-- 右边 -->
		<div class="kc-new-right">
			<div class="kc-new-right-tag">
				<div class="kc-new-right-tag-item active" data-index="0">考研政治</div>
				<div class="kc-new-right-tag-item" data-index="1">考研数学</div>
				<div class="kc-new-right-tag-item" data-index="2">考研英语</div>
			</div>
			<div class="kc-new-right-body kc-new-right-body1 active">
				<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
			</div>
			<div class="kc-new-right-body kc-new-right-body2">
				<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
			</div>
			<div class="kc-new-right-body kc-new-right-body3">
				<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
			</div>
		</div>
	</div>
	<!--流程-->
	<div class="width-1200-center bg-white home-cell">
	    <h3 class="home-cell-title"><span class="home-cell-title-span">考研流程</span></h3>
	    <div class="home-cell-content select-none">
	        <img src="<?=$img_url?>static/img/kaoyanliucheng.png" class="flow-img" data-img_name="kaoyanliucheng.png" title="考研流程" alt="考研流程"/>
	    </div>
	</div>
    <!--文都名师-->
    <div class="width-1200-center bg-white home-cell">
        <h3 class="home-cell-title">
            <a href="<?=$web_url?>pages/teacher/?nav=teacher" target="_blank" title="文都名师">
                <span class="home-cell-title-span">文都名师</span>
            </a>
        </h3>
        <div class="home-cell-content teacher-content clearfix">
            <div class="swiper-container teacher-swiper-container" style="padding: 0 20px;">
                <div class="swiper-wrapper teacher-swiper-wrapper">
                    <a href="#" class="swiper-slide"></a>
                    <a href="#" class="swiper-slide"></a>
                    <a href="#" class="swiper-slide"></a>
                    <a href="#" class="swiper-slide"></a>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination teacher-swiper-pagination"></div>
                <div class="swiper-button-next teacher-swiper-button-next"></div>
                <div class="swiper-button-prev teacher-swiper-button-prev"></div>
            </div>
        </div>
    </div>
    <!---->
	<!--考研社区-->
	<div class="width-1200-center bg-white home-cell">
	    <h3 class="home-cell-title">
	        <a href="<?=$web_url?>pages/ask/?nav=ask" target="_blank" title="考研社区，考研问答">
	            <span class="home-cell-title-span">考研社区</span>
	        </a>
	    </h3>
		<div class="sq-new-body">
			<!-- left -->
			<div class="sq-new-body-left">
				<div class="sq-new-body-left-item">
					<div class="sq-new-body-left-item-title">
						<a href="<?=$web_url?>pages/ask/?nav=ask" target="_blank" title="考研问答"> 
							考研问答
							<p>
								<img src="<?=$img_url?>static/img/sq-new-body-left-item-title.png" alt="">
							</p>
							
						</a>
					</div>
					<div class="sq-new-body-left-item-body sq-new-body-left-item-body1">
						<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
					</div>
				</div>
				<div class="sq-new-body-left-item">
					<div class="sq-new-body-left-item-title">
						<a href="<?=$web_url?>pages/information/?nav=information" target="_blank" title="考研经验"> 
							考研经验
							<p>
								<img src="<?=$img_url?>static/img/sq-new-body-left-item-title.png" alt="">
							</p>
							
						</a>
					</div>
					<div class="sq-new-body-left-item-body sq-new-body-left-item-body2">
						<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
					</div>
				</div>
				<div class="sq-new-body-left-item">
					<div class="sq-new-body-left-item-title">
						<a href="<?=$web_url?>pages/curriculum/?nav=curriculum" target="_blank" title="考研课程"> 
							考研课程
							<p>
								<img src="<?=$img_url?>static/img/sq-new-body-left-item-title.png" alt="">
							</p>
							
						</a>
					</div>
					<div class="sq-new-body-left-item-body sq-new-body-left-item-body3">
						<a href="" class="top3-body-li" target="_blank" title="文都资讯">新闻标题新闻标题新闻标题新闻标题</a>
					</div>
				</div>
			</div>
			<!-- right -->
			<div class="wendu-com-right">
			    <h1 class="title">QQ交流群 <i class="fa fa-qq"></i></h1>
			    <h3>湖南考研学习群 : <span>603615074</span></h3>
			    <h3>农大21考研学员群 : <span>6897178755</span></h3>
			    <h3>2021林科大官方群 : <span>1023382939</span></h3>
			    <h3>湖师大2021考研群: <span>1005752702</span></h3>
			    <div class="img">
			        <img src="<?=$img_url?>static/img/information-code.png" data-img_name="information-code.png" alt="文都考研二维码" title="文都考研二维码"/>
			    </div>
			</div>
		</div>
	</div>
    

    <!-- <div class="width-1200-center bg-white home-cell">
         <h3 class="home-cell-title"><span class="home-cell-title-span">课程讨论</span></h3>
         <div class="home-cell-content kcpj-body">


             <div class="clear"></div>
         </div>

     </div>
  -->




</section>
<!--结束-模块页内容-->


<!--开始-页面js-->
<script>

</script>
<script>
    // 页面数据入口，如有动态数据渲染，请以此函数为调用作为开始
    let pages = 1
    // let limit = 3
    let limit = 6
    let total = 4
    async function page_data_init(){
        console_log("开始渲染数据");
          all.loadScriptString(file_url+"/static/htmlDomJs/home.js")
          await getBanner()
          getCountDown()
          await getTeacherHot()
          getHotFile()
          getNewsType()
		
		
		//走进文都 - start
		//走进文都 banner
		 await get_news_left_banner()
		 //热门新闻
		getHotNews(21)
		//走进文都中间
			
		  getNewsList_top2(22,$('.top2-body1'),'集训营')
		  getNewsList_top2(21,$('.top2-body2'),'彩虹卡')
		  getNewsList_top2(27,$('.top2-body3'),'一对一')
		//走进文都底部 -英语
		  getNewsList_top3(24,$('.top3-body1'))
		  getFile_list(4,$('.top3-body2'))
		//走进文都底部 -数学
		  getNewsList_top3(25,$('.top3-body3'))
		  getFile_list(2,$('.top3-body4'))
		//走进文都底部 -政治
		  getNewsList_top3(26,$('.top3-body5'))
		  getFile_list(5,$('.top3-body6'))
		//走进文都底部 -四六级
		  getNewsList_top3(32,$('.top3-body7'))
		  getFile_list(6,$('.top3-body8'))
		//走进文都 - end
		//文都课程 - start
			await get_news_left_kecheng_banner()
		  getNewsList_top3(26,$('.kc-new-right-body1'),15)
		  getNewsList_top3(25,$('.kc-new-right-body2'),15)
		  getNewsList_top3(24,$('.kc-new-right-body3'),15)
		//文都课程 - 鹰飞集训营
		  get_list_course(4,$('.kc-center-item-body1'))
		  get_list_course(6,$('.kc-center-item-body2'))
		  get_list_course(7,$('.kc-center-item-body3'))
		  get_list_course(8,$('.kc-center-item-body4'))
		// 考研社区 - 考研问答
          getHotAsk($('.sq-new-body-left-item-body1'),13)
		  getNewsList_top3(27,$('.sq-new-body-left-item-body2'),13)
		  getNewsList_top3(21,$('.sq-new-body-left-item-body3'),13)
		
        let course_class_id =  await getCourseTypeForSpacial()
        // console.log('course_class_id'+course_class_id)
        await getList_Spacial(course_class_id)
        await lazyLoad()
    }
	
	
	
</script>
<!--结束-页面js-->


<?php
require $index_path.'/parts/seo_topic_url.php';
require $index_path.'/config/must.php';
require $index_path.'/header/pages_default/foot.php';
require $index_path.'/common/safe_echo.php';
?>



