
/*
* 开始-tab切换
* */
const parameter = "tab";
function url_location() { // 更新视图
    let location = getThisUrlParam("", parameter)*1;
    console_log("操作切换tab="+location);

    $(".tab-item").eq(location).addClass("tab-item-active").siblings(".tab-item").removeClass("tab-item-active");
    $(".tab-div").eq(location).removeClass("hide").siblings(".tab-div").addClass("hide");

}
function init_url_location() {
    if ($(".tab-item").length<=1){
        console_log("跳过tab自动渲染");
    }else {
        url_location();
    }
}
// 点击tab切换
$(document).on("click", ".tab-item", function () {
    let that = $(this);
    let index = that.index();

    if ($(".tab-item").length<=1){
        console_log("跳过url渲染");
    }else {
        window.location.hash = "#"+parameter+"="+index; // 更新url
        setTimeout(function () { // 更新视图
            init_url_location();
        }, 20);
    }
});
(function () {
    init_url_location(); // 初始化
})();
/*结束-切换*/


// document.getElementsByClassName("add-bookmark")[0].onclick = function(){
//     console_log("click2");
//     make_notice([{"msg": "“win平台：Crl+D；Mac平台：Command+D”即可加入收藏！"}], 5000);
// };


/*
* nav自动选中
* */
(function (){
    var nav_class = getThisUrlParam("", "nav");
    if (nav_class){
        $(".nav-" + nav_class).addClass("hk_header_item-active");
    }else {
        $(".nav-home").addClass("hk_header_item-active");
    }
})();


/*
*   页面载入后和滚动条运动调用点
* */
window.onload = function(){
    cal_nav();
    cal_back_top();

};
window.onscroll = function () {
    cal_nav();
    cal_back_top();

};


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
