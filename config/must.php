<?php
/*
 * 页面参数生成，面向js层
 * */
?>
<div class="hide">

<!--全局页面启动函数、统计、客服、第三方js等-->
<script>

    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?xxx;
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();

</script>

<script>

    var page_url = window.location.href;
    window.kf53 = "<?=$kefu_url?>";

</script>


</div>
<!--页面实时验证后的必要起始参数-->
<script>

    /*
    * 渲染层默认兼容到IE8+、Android4.2+、iOS9.3+等老浏览器版本
    * */
    var web_url = "<?=$web_url?>"; // 页面跳转主网址
    var file_url = "<?=$file_url?>"; // 静态文件主网址
    var img_url = "<?=$img_url?>"; // 图片主网址
    var api_url = "<?=$api_url?>"; // api主网址
    var app_class = "<?=$app_class?>"; // 网站类型
    var app_token = "<?=isset($app_token)?$app_token:''?>"; // 页面token
    var token = app_token;
    (function (){
        if (app_token && app_token!=="api-request-error"){

            var nav = getThisUrlParam("", "nav");

            var news_class_id = getThisUrlParam("", "news_class_id");
            var news_info_id = getThisUrlParam("", "news_info_id");
            var ask_question_tag_id = getThisUrlParam("", "ask_question_tag_id");
            var ask_question_id = getThisUrlParam("", "ask_question_id");
            var file_tag_id = getThisUrlParam("", "file_tag_id");
            var file_upload_id = getThisUrlParam("", "file_upload_id");

            var id_data = "";
            var catalog = "";
            var id = "";

            if (nav){
                if (news_class_id){id = news_class_id;catalog="list";}
                if (news_info_id){id = news_info_id;catalog="detail";}
                if (ask_question_tag_id){id = ask_question_tag_id;catalog="list";}
                if (ask_question_id){id = ask_question_id;catalog="detail";}
                if (file_tag_id){id = file_tag_id;catalog="list";}
                if (file_upload_id){id = file_upload_id;catalog="detail";}

                id_data = "catalog@" + catalog + "-nav@" + nav + "-id@" + id;
            }else {
                id_data = "";
            }

            var s_width = window.screen.width;
            if (s_width<640){ // 处理PC站向m站跳转
                var m_href = "//m.cswendu.com?id_data=" + id_data;
                window.location.replace(m_href);
            }else { // 其他
                try {
                    page_style_init(); // 初始化页面动态样式
                }catch (e) {
                    console.log("%c"+"page_style_init()为必须设置的函数", "color:coral;font-size:13px;");
                }
                try {
                    page_data_init(); // 登录校验完成后开始执行页面数据渲染
                }catch (e) {
                    console.log("%c"+"page_data_init()为必须设置的函数", "color:coral;font-size:13px;");
                }
                try {
                    all_page_run(); // 第三方代码
                }catch (e) {
                    console.log("%c"+"all_page_run()为必须设置的函数", "color:coral;font-size:13px;");
                }
            }

        }else {
            console.error("app_token=" + app_token);
            console.error("页面token生成失败，可能是后端接口不能正常返回数据。");
        }
    })();

</script>
