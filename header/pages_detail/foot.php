<?php

$foot_path = dirname(dirname(dirname(__FILE__))); // 项目index的根目录
$foot_date = date('Y/m');

$website_wendu = <<<EOL

            <div class="site-info-div" >
            
                <p>总部地址：<a class="click-a" href="https://www.amap.com/place/B02DB05PEH" title="地址" target="_blank">北京市海淀区中关村南大街17号韦伯时代中心C座北配楼</a>&nbsp;&nbsp;&nbsp;&nbsp;邮编：100048</p>
               
                <p><a href="http://www.beian.miit.gov.cn/" target="_blank" class="icp-a" title="ICP备案信息">京ICP备05001816号-1</a>&nbsp;&nbsp;&nbsp;&nbsp;版权©世纪文都教育科技集团股份有限公司&nbsp;&nbsp;&nbsp;&nbsp;2007/01-{$foot_date}</p>
				<p><a href="tel://400-606-9976">免费400电话：400-606-9976</a></p>
				<p><a href="{$web_url}pages/footer-spacial/about-us.php?nav=about-us" target="_blank" title="关于我们，关于文都">关于我们</a></p>
            </div>

EOL;

$website_cswendu = <<<EOL

            <div class="site-info-div">
                <div class="footer-tabs">
                    <a href="{$web_url}pages/footer-spacial/about-us.php?nav=about-us" target="_blank" title="关于我们">关于我们</a>
                    <a href="{$web_url}pages/footer-spacial/contact.php?nav=contact" target="_blank" title="联系方式">联系方式</a>
                    <a href="{$web_url}pages/footer-spacial/recruit.php?nav=recruit" target="_blank" title="招聘人才">招聘人才</a>
                    <a href="{$web_url}pages/footer-spacial/pay.php?nav=pay" target="_blank" title="支付方式">支付方式</a>
                </div>
                <p>地址：<a class="click-a" href="https://www.amap.com/place/B02DB05PEH" title="地址：湖南省长沙市天心区中南林业科技大学国际楼" target="_blank">湖南省长沙市天心区中南林业科技大学国际楼</a>&nbsp;&nbsp;&nbsp;&nbsp;邮编：100048</p>
                <p><a class="click-a" href="//m.cswendu.com" title="手机端湖南文都官网" target="_blank">湖南文都考研官网手机版</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="click-a" href="https://weibo.com/oilword?refer_flag=1005055014&is_hot=1" title="湖南文都考研微博" target="_blank">湖南文都考研微博</a></p>
                <p><a href="http://beian.miit.gov.cn" target="_blank" class="icp-a" title="湘ICP备19024874号-1，http://beian.miit.gov.cn">湘ICP备19024874号-1</a>&nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="//www.beian.gov.cn/" title="湘公网安备 43010302001147号"><img src="//www.cswendu.com/static/waba.png?20200715111900" title="公网安备logo" style="width: 18px;margin-right: 2px;"/>湘公网安备 43010302001147号</a>&nbsp;&nbsp;&nbsp;&nbsp;版权©长沙道信教育科技有限公司&nbsp;&nbsp;&nbsp;&nbsp;2007/01-{$foot_date}</p>
                <p>
                </p>
                <p><a href="tel://400-606-9976">免费400电话：400-606-9976</a></p>
            </div>

EOL;


$website_info = '';
$show_school_map = '';
if ($website_beian == 'cswendu'){
    $website_info = $website_cswendu;
    $show_school_map = 'show';
}else if ($website_beian == 'wendu'){
    $website_info = $website_wendu;
    $show_school_map = 'hide';
}else{
    $website_info = $website_cswendu;
    $show_school_map = 'show';
}


?>

<footer class="foot-box ">
    <div class="section-school <?=$show_school_map?> ">
        <?php require $foot_path.'/parts/section_bottom_school.php'; ?>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div class="width-1200-center ">
        <div class="padding-lr-15 wechat-parent">
            <!--自动匹配网址来选择底部信息-->
            <?=$website_info?>
            <div class="clear"></div>
        </div>
    </div>

</footer>

<div class="loading-div flex-center select-none hide" id="loading-div">
    <div class="loading-hidden-bg"></div>
    <div class="loading-icon"></div>
</div>
<ul id="hk-alert">
    <!-- <li class="alert-error"><i class="fa fa-exclamation-circle alert-icon"></i>对不起，请求失败</li>
    <li class="alert-default"><i class="fa fa-info-circle alert-icon"></i>对不起，请求失败</li>
    <li class="alert-success"><i class="fa fa-sign-language alert-icon"></i>对不起，请求失败</li> -->
</ul>

<ul id="hk-notification">
    <!-- <li class="notification-item">
        <h1><i class="fa fa-info-circle alert-icon"></i>标题</h1>
        <p>xxxxxx标题标题标题标题标题标题标题标题标题xxxxxx</p>
    </li> -->
</ul>

<div id="back-top" class="back-top select-none hide animated">Top</div>


<script>

    function area_tabs_item() {
        $(".area-line").addClass("hide");
        let tab = $(".area-tabs-item");
        for (let i=0; i<tab.length; i++){
            let has_selected = tab.eq(i).hasClass("selected");
            if (has_selected){
                let the_campus_class_id = tab.eq(i).data("campus_class_id");
                //
                $(".div-campus_class_id-"+the_campus_class_id).removeClass("hide");
                $(".div-campus_class_id-"+the_campus_class_id+":last").css({"border-left": "2px solid transparent"});
            }
        }
    }

    (function () {

        $(document).on("click", ".area-tabs-item", function () {
            let that = $(this);
            that.addClass("selected");
            that.siblings().removeClass("selected");

            area_tabs_item();
        });

        area_tabs_item();

        document.getElementById("loading-div").classList.remove("hide");
    })();

</script>


<script src="<?=$file_url?>static/js/page.js?<?=$head_time?>"></script>
<div class="that-page-url-div hide"><a class="that-page-url-a" href="<?=get_url()?>" title="<?=$title?>_链接：<?=get_url()?>" data-ip="<?=get_real_ip()?>">本页链接：<?=get_url()?></a></div>
<div class="js-write-div clear" id="js-write-div"></div>
<script src="<?=$file_url?>static/js/createFixCenter.js?<?=$head_time?>"></script>
<script src="<?=$file_url?>static/js/createFixRight.js?<?=$head_time?>"></script>

</body>
</html>
