<?php
// 网站地图
$title = '网站地图sitemap'; // 模块页标题，每个页面自定义
$keywords = '考研新闻,考研资讯,考研资料下载,考研问题咨询,四六级资料下载,考研培训班,考研集训营,考研线上课程,考研辅导'; // 可选，为空时将使用默认
$description = ''; // 可选，为空时将使用默认

$index_path = dirname(dirname(dirname(__FILE__))); // 项目index的根目录

require $index_path.'/config/config.php';
require $index_path.'/common/function.php';
require $index_path.'/common/safe_check.php';

$title = $sys_home_title.'全站分类导航_'.$title;

require $index_path.'/header/pages_default/head.php';
require $index_path.'/header/pages_default/nav.php';

?>

<style>
    .link-table{
        font-size: 16px;
        border: 1px solid #EEEEEE;
    }
    .link-tr{
        height: 50px;
    }
    .link-tr:nth-child(odd){
        background: #f5f5f5;
    }
    .link-tr:nth-child(even){

    }
    .link-th{
        width: 200px;
        text-align: left;
        font-weight: 700;
        padding: 0 10px;
    }
    .link-td{
        width: 150px;
        font-weight: 500;
        padding: 0 10px;
        text-align: left;
    }
    .link-a{

    }
    .hide{
        display: none !important;
    }
</style>

<!--开始-模块页内容-->
<div class="view-section clear information" id="view-main">
    <section class="center">
        <div class="width-1200-center">
            <div class="center-body">
                <h1 class="title"><?=$sys_home_title?>全站板块分类导航</h1>
                <table class="link-table" border="0">
                    <tr class="link-tr">
                        <th class="link-th">考研资讯、考研新闻</th>
                        <td class="link-td"><a class="link-a" href="<?=$web_url?>pages/information/?nav=information&news_class_id=22&article_tag=&page=" target="_blank" title="考研资讯">考研资讯</a></td>
                        <td class="link-td"><a class="link-a" href="<?=$web_url?>pages/information/?nav=information&news_class_id=24&article_tag=&page=" target="_blank" title="考研英语">考研英语</a></td>
                        <td class="link-td"><a class="link-a" href="<?=$web_url?>pages/information/?nav=information&news_class_id=25&article_tag=&page=" target="_blank" title="考研数学">考研数学</a></td>
                        <td class="link-td"><a class="link-a" href="<?=$web_url?>pages/information/?nav=information&news_class_id=26&article_tag=&page=" target="_blank" title="考研政治">考研政治</a></td>
                        <td class="link-td"><a class="link-a" href="<?=$web_url?>pages/information/?nav=information&news_class_id=27&article_tag=&page=" target="_blank" title="考研备考经验">考研备考经验</a></td>
                    </tr>
                    <tr class="link-tr">
                        <th class="link-th">考研社区、考研问答</th>
                        <td class="link-td"><a class="link-a" href="<?=$web_url?>pages/ask/?nav=ask&ask_question_tag_id=17" target="_blank" title="线上课程+辅导">线上课程+辅导</a></td>
                        <td class="link-td"><a class="link-a" href="<?=$web_url?>pages/ask/?nav=ask&ask_question_tag_id=11" target="_blank" title="在职考研">在职考研</a></td>
                        <td class="link-td"><a class="link-a" href="<?=$web_url?>pages/ask/?nav=ask&ask_question_tag_id=10" target="_blank" title="考研复试">考研复试</a></td>
                        <td class="link-td"><a class="link-a" href="<?=$web_url?>pages/ask/?nav=ask&ask_question_tag_id=8" target="_blank" title="考研备考">考研备考</a></td>
                        <td class="link-td"><a class="link-a" href="<?=$web_url?>pages/ask/?nav=ask&ask_question_tag_id=1" target="_blank" title="文都课程安排">文都课程安排</a></td>
                    </tr>
                    <tr class="link-tr">
                        <th class="link-th">考研资料下载</th>
                        <td class="link-td"><a class="link-a" href="<?=$web_url?>pages/download/?nav=download&file_tag_id=aid8874-bid338-cid231336-tag&page_file_upload=1" target="_blank" title="考研政治">考研政治</a></td>
                        <td class="link-td"><a class="link-a" href="<?=$web_url?>pages/download/?nav=download&file_tag_id=aid7047-bid312-cid218025-tag&page_file_upload=1" target="_blank" title="考研英语">考研英语</a></td>
                        <td class="link-td"><a class="link-a" href="<?=$web_url?>pages/download/?nav=download&file_tag_id=aid4002-bid234-cid179928-tag&page_file_upload=1" target="_blank" title="考研数学">考研数学</a></td>
                        <td class="link-td"><a class="link-a" href="<?=$web_url?>pages/download/?nav=download&file_tag_id=aid19836-bid585-cid353430-tag&page_file_upload=1" target="_blank" title="考研复试">考研复试</a></td>
                        <td class="link-td"><a class="link-a" href="<?=$web_url?>pages/download/?nav=download&file_tag_id=aid11919-bid416-cid269433-tag&page_file_upload=1" target="_blank" title="历年真题">历年真题</a></td>
                    </tr>
                    <tr class="link-tr">
                        <th class="link-th">四六级资料下载</th>
                        <td class="link-td"><a class="link-a" href="<?=$web_url?>pages/download/?nav=download&file_tag_id=aid26535-bid728-cid423657-tag&page_file_upload=1" target="_blank" title="四六级资料">四六级资料</a></td>
                        <td class="link-td"><a class="link-a" href="#" target="_blank" title=""></a></td>
                        <td class="link-td"><a class="link-a" href="#" target="_blank" title=""></a></td>
                        <td class="link-td"><a class="link-a" href="#" target="_blank" title=""></a></td>
                        <td class="link-td"><a class="link-a" href="#" target="_blank" title=""></a></td>
                    </tr>
                    <tr class="link-tr">
                        <th class="link-th">考研课程</th>
                        <td class="link-td"><a class="link-a" href="#" target="_blank" title=""></a></td>
                        <td class="link-td"><a class="link-a" href="#" target="_blank" title=""></a></td>
                        <td class="link-td"><a class="link-a" href="#" target="_blank" title=""></a></td>
                        <td class="link-td"><a class="link-a" href="#" target="_blank" title=""></a></td>
                        <td class="link-td"><a class="link-a" href="#" target="_blank" title=""></a></td>
                    </tr>
                    <tr class="link-tr">
                        <th class="link-th">考研专业定向班</th>
                        <td class="link-td"><a class="link-a" href="#" target="_blank" title=""></a></td>
                        <td class="link-td"><a class="link-a" href="#" target="_blank" title=""></a></td>
                        <td class="link-td"><a class="link-a" href="#" target="_blank" title=""></a></td>
                        <td class="link-td"><a class="link-a" href="#" target="_blank" title=""></a></td>
                        <td class="link-td"><a class="link-a" href="#" target="_blank" title=""></a></td>
                    </tr>


                </table>

                <p class="" style="font-size: 16px;">
                    <a href="<?=$web_url?>" target="_blank" title="文都考研官网">首页</a>

                    <a>
                        考研课程
                        <div>
                            <h1 class="hk_header_slideDown_t1title"><a href="<?=$web_url?>pages/curriculum/?nav=curriculum" title="考研课程">考研课程</a></h1>
                            <h1 class="hk_header_slideDown_t2title">鹰飞集训营</h1>
                            <div class="hk_header_slideDown_t3">
                                <a href="<?=$web_url?>detail/detail-full-year.php?nav=2021" class="hk_header-slideDown_t3_item" title="全年集训营">全年集训营</a>
                                <a href="<?=$web_url?>detail/tg/bn-pc/index.html?nav=2021" class="hk_header-slideDown_t3_item" title="半年集训营">半年集训营</a>
                                <a href="<?=$web_url?>detail/tg/sj-pc/index.html?nav=2021" class="hk_header-slideDown_t3_item" title="暑假集训营">暑假集训营</a>
                                <a href="<?=$web_url?>detail/detail-full-year.php?nav=2021" class="hk_header-slideDown_t3_item" title="秋季集训营">秋季集训营</a>
                                <a href="<?=$web_url?>detail/detail-full-year.php?nav=2021" class="hk_header-slideDown_t3_item" title="冲刺集训营">冲刺集训营</a>
                                <a href="<?=$web_url?>detail/tg/reexamination.php?nav=2021" class="hk_header-slideDown_t3_item" title="2020复试营">2020复试营</a>
                                <a href="<?=$web_url?>detail/tg/erzhan/index.php?nav=2021" class="hk_header-slideDown_t3_item" title="二战集训营">二战集训营</a>
                                <a href="<?=$web_url?>detail/tg/hanjia/index.php?nav=2021" class="hk_header-slideDown_t3_item" title="寒假集训营">寒假集训营</a>
                                <a href="" class="hk_header-slideDown_t3_item" title=""></a>
                            </div>
                            <h1 class="hk_header_slideDown_t2title">高端彩虹卡（周末辅导）</h1>
                            <div class="hk_header_slideDown_t3">
                                <a href="<?=$web_url?>detail/tg/rainbow-card.php?nav=2021" class="hk_header-slideDown_t3_item" title="飞跃彩虹卡">飞跃彩虹卡</a>
                                <a href="<?=$web_url?>detail/tg/rainbow-card.php?nav=2021" class="hk_header-slideDown_t3_item" title="绽放彩虹卡">绽放彩虹卡</a>
                                <a href="<?=$web_url?>detail/tg/rainbow-card.php?nav=2021" class="hk_header-slideDown_t3_item" title="魔力彩虹卡">魔力彩虹卡</a>
                                <a href="<?=$web_url?>detail/tg/rainbow-card.php?nav=2021" class="hk_header-slideDown_t3_item" title="菁英彩虹卡">菁英彩虹卡</a>
                                <a href="<?=$web_url?>detail/tg/rainbow-card.php?nav=2021" class="hk_header-slideDown_t3_item" title="199管综彩虹卡">199管综彩虹卡</a>

                                <a href="" class="hk_header-slideDown_t3_item" title=""></a>
                            </div>
                            <h1 class="hk_header_slideDown_t2title">一对多辅导</h1>
                            <div class="hk_header_slideDown_t3">
                                <a href="<?=$web_url?>detail/tg/oneto/index.php?nav=2021" class="hk_header-slideDown_t3_item" title="公共课一对一">公共课一对一</a>
                                <a href="<?=$web_url?>detail/tg/oneto/index.php?nav=2021" class="hk_header-slideDown_t3_item" title="专业课一对一">专业课一对一</a>
                                <a href="<?=$web_url?>detail/tg/oneto/index.php?nav=2021" class="hk_header-slideDown_t3_item" title="考研一对三">考研一对三</a>

                            </div>
                            <h1 class="hk_header_slideDown_t2title">定制辅导</h1>
                            <div class="hk_header_slideDown_t3">
                                <a href="<?=$kefu_url?>" class="hk_header-slideDown_t3_item" title="客服">题海班</a>
                                <a href="<?=$kefu_url?>" class="hk_header-slideDown_t3_item" title="客服">点题预测班</a>
                                <a href="<?=$web_url?>detail/detail-onwork.php?nav=workindex" class="hk_header-slideDown_t3_item" title="在职考研">在职考研</a>
                            </div>
                        </div>
                    </a>

                    <a>
                        专业定向班
                        <div>
                            <h1 class="hk_header_slideDown_t1title">专业定向班</h1>
                            <div class="hk_header_slideDown_t3">
                                <a href="<?=$web_url?>detail/tg/jsj-pc/index.html" class="hk_header-slideDown_t3_item" title="计算机定向">计算机定向</a>
                                <a href="<?=$web_url?>detail/tg/jr-pc/index.html" class="hk_header-slideDown_t3_item" title="金融专硕">金融专硕</a>
                                <a href="<?=$web_url?>detail/tg/fashuo/index.html" class="hk_header-slideDown_t3_item" title="法律硕士">法律硕士</a>
                                <a href="<?=$web_url?>detail/tg/xy_pc/index.php?nav=2021" class="hk_header-slideDown_t3_item" title="西医综合">西医综合</a>
                                <a href="<?=$kefu_url?>" class="hk_header-slideDown_t3_item" title="中医综合">中医综合</a>
                                <a href="<?=$web_url?>detail/tg/ys_pc/index.html" class="hk_header-slideDown_t3_item" title="艺术硕士">艺术硕士</a>
                                <a href="<?=$web_url?>detail/tg/kjpx/index.html" class="hk_header-slideDown_t3_item" title="会计硕士">会计硕士</a>
                                <a href="<?=$web_url?>detail/tg/mba/index.html" class="hk_header-slideDown_t3_item" title="MBA/MPA/MEM">MBA/MPA/MEM</a>
                                <a href="<?=$web_url?>detail/tg/ty-pc/index.html" class="hk_header-slideDown_t3_item" title="体育学">体育学</a>
                            </div>

                        </div>
                    </a>

                    <a href="<?=$web_url?>pages/teacher/?nav=teacher" target="_blank" title="文都名师">
                        关于文都
                        <div>
                            <h1 class="hk_header_slideDown_t1title">关于文都</h1>
                            <div class="hk_header_slideDown_t3">
                                <a href="<?=$web_url?>pages/teacher/?nav=teacher" class="hk_header-slideDown_t3_item" title="文都师资">文都师资</a>
                                <a href="<?=$web_url?>pages/footer-spacial/about-us.php?nav=about-us" class="hk_header-slideDown_t3_item" title="文都品牌">文都品牌</a>
                                <a href="" class="hk_header-slideDown_t3_item" title=""></a>
                            </div>

                        </div>
                    </a>

                    <a href="<?=$web_url?>pages/information/?nav=information" target="_blank" title="考研咨询，考研新闻">考研资讯</a>

                    <a href="<?=$web_url?>pages/ask/?nav=ask" target="_blank" title="考研社区，考研问答">考研问答</a>

                    <a href="<?=$web_url?>pages/download/?nav=download" target="_blank" title="资料下载，文件下载">
                        资料下载
                        <div>
                            <h1 class="hk_header_slideDown_t1title"><a href="<?=$web_url?>pages/download/?nav=download" title="考研资料下载">考研资料下载</a></h1>
                            <div class="hk_header_slideDown_t3">
                                <a href="<?=$web_url?>pages/download/?nav=download&file_tag_id=aid7047-bid312-cid218025-tag&page_file_upload=1" class="hk_header-slideDown_t3_item" title="考研英语资料">考研英语资料</a>
                                <a href="<?=$web_url?>pages/download/?nav=download&file_tag_id=aid8874-bid338-cid231336-tag&page_file_upload=1" class="hk_header-slideDown_t3_item" title="考研政治资料">考研政治资料</a>
                                <a href="<?=$web_url?>pages/download/?nav=download&file_tag_id=aid4002-bid234-cid179928-tag&page_file_upload=1" class="hk_header-slideDown_t3_item" title="考研数学资料">考研数学资料</a>
                            </div>

                        </div>
                    </a>

                </p>

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
<!--结束-模块页内容-->


<!--开始-页面js-->
<script>

    // 页面数据入口，如有动态数据渲染，请以此函数为调用作为开始
    function page_data_init(){
        //
        getHot();

    }

</script>
<!--结束-页面js-->


<?php
require $index_path.'/config/must.php';
require $index_path.'/header/pages_default/foot.php';
require $index_path.'/common/safe_echo.php';
?>
