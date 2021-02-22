
/*
*
* 共用函数，无所谓登不登录
*
* */


// 打印日志函数
const log = true;
function console_log(txt) {
    if (txt === 0 || txt === "0") {

    }else {
        if (!txt){
            txt = "空txt";
        }
    }
    log === true ? console.log(txt): "";
}

// cookie前缀
cookie_pre = "cswendu_";

var href_404 = "https://www.baidu.com";

// 删除加载动画
function del_loading_div(time=300) {
    $(".loading-div").fadeOut(time);
    setTimeout(function () {
        $(".loading-div").remove();

    }, time);
}
/*插入加载动画*/
function ajaxAnimate(){
	$('body').append(`<div class="loading-div flex-center select-none" id="loading-div">
    <div class="loading-hidden-bg"></div>
    <div class="loading-icon"></div>
</div>`)
}


// 返回首页
function back_home() {
    window.location.href = "home.php?user=home";
}


// 执行页面登录后的页面样式渲染//权限渲染
function page_style_init() {
	// console.log('bb')
    // 加载动画
    del_loading_div();
    // 渲染nav选中效果
    let that_nav = getThisUrlParam("", "nav");
    $(".nav-item-title").removeClass("nav-item-title-active");
    $(".detail-jump-item").removeClass("selected");
    if (that_nav === ""){
        //make_notice([{"msg": "网址参数错误(nav=?)"}], 60000);
    }else {
		
        $(".nav-"+that_nav).addClass("nav-item-title-active");
        $(".nav-"+that_nav).addClass("selected");
       
    }
	$('img').on('mousedown',function (e) {
	    e.preventDefault()
	})

}


function all_page_run(){

	// 渲染百度统计
	/*请求数据*/
	$.ajax({
		url: api_url+"app/get_array_cover_img",
		type: "POST",
		dataType: "json",
		async: true,
		data: { // 字典数据
			user_token: token,
			app_class: app_class,

			key: "baidu_tongji",
		},
		success: function(back, status){

			// 数据转换为json
			let data = "";
			let text = "";
			if(typeof back === "string"){
				data = JSON.parse(back);
				text = back;
			} else {
				data = back;
				text = JSON.stringify(back);
			}
			console_log("类型：" + typeof back + "\n数据：" + text +"\n状态：" + status + "。");

			// 解析json
			if (data.state === 0){
				console_log(data.msg);
			}else if (data.state === 1){
				console_log(data.msg);

				let script = data.value;
				$(".js-write-div").html(script);

			}else {
				let txt = data.msg+"("+ data.state +")";
				console_log(txt);
			}
		},
		error: function (xhr) {
			console.log(xhr);
		}
	});

}



// 刷新页面
function refresh_page(second_waiting) {
    var second = 0;
    var _second = second_waiting*1;
    if (_second){
        second = _second;
    }
    setTimeout(function () {
        window.location.reload();
    }, second);
}

// 返回上一级
function back_page(second_waiting){
    var second = 0;
    var _second = second_waiting*1;
    if (_second){
        second = _second;
    }
    setTimeout(function () {
        window.history.go(-1);
    }, second);
}


/**
 * 判断是否含有script非法字符]
 * @param  {[type]}  str [要判断的字符串]
 * @return {Boolean}     [true：含有，验证不通过；false:不含有，验证通过]
 */
function hasIllegalChar(str) {
    return new RegExp(".*?script[^>]*?.*?(<\/.*?script.*?>)*", "ig").test(str);
}

// 管理用户等级的功能显示
function user_level(level) {

    $(".level-"+level+"-not-do").remove();
}

function make_notice(_json, _show_time) {

    if (document.getElementsByClassName("kd-notice-div").length === 0) {
        $("body").append('<div class="kd-notice-div"><div class="kd-notice-content"></div></div>');
    }

    let json = _json;
    let show_time = _show_time?_show_time:3000; // ms

    for (let i=0; i<json.length; i++){
        let time = i*1500;
        setTimeout(function () {
            let clear = new Date().getTime(); // 微秒时间戳标记不同的div
            $(".kd-notice-content").before('<div class="kd-notice-cell clear-'+ clear +'">' +
                json[i]["msg"] +
                '<div class="kd-notice-close">X</div>' +
                '</div>');
            $(".clear-"+clear).animate({marginTop: 0}, 800, function () {
                setTimeout(function () {
                    $(".clear-"+clear).animate({marginTop: -($(".clear-"+clear).height()+16)}, 800, function () {
                        $(".clear-"+clear).remove();
                    });
                }, show_time);
            });
        }, time);
    }
}
$(document).on("click", ".kd-notice-close", function () {
    let that = $(this);
    that.parent().slideUp(300);
});


function cal_nav(){

    let ele = document.getElementsByClassName("nav-item-box")[0];
    // let ele = document.getElementById("nav-item-box-one");
	if(ele==null||ele==undefined||ele==""){
		return false;
	}
    let height = ele.offsetTop;
    let window_height = window.innerHeight;
    let scroll_height = $(window).scrollTop();

    // let load_height = window_height - Math.abs(scroll_height - height);
    let load_height = scroll_height - height - 80;

    if (load_height > 0){
        ele.classList.add('fixed-nav');
		ele.style.display = 'block'
    }else {
        ele.classList.remove('fixed-nav');
		ele.style.display = 'none'
    }

}

function cal_back_top() {
    let window_height = window.innerHeight;
    let scroll_height = $(window).scrollTop();
    let load_height = scroll_height - window_height + 300;
    if (load_height > 0){ // 滑过一个屏幕距离
        $(".back-top").removeClass("hide");
    }else {
        $(".back-top").addClass("hide");
    }
}
$(document).on("click", ".back-top", function () {
    $("html, body").animate({scrollTop: 0}, "fast");
});

	

let all = {
	numForMessage:0,
	numForNotification:0,
	noop:function(){},
	log(item){
		console.log(item)
	},
	throttle(func, wait) {//节流函数
	    let previous = 0;
	    return function() {
	        let now = Date.now();
	        let context = this;
	        let args = arguments;
	        if (now - previous > wait) {
	            func.apply(context, args);
	            previous = now;
	        }
	    }
	},
	loadScriptString(src){//页面插入script。src引用
		return new Promise((resolve) => {
			var script = document.createElement("script");  //创建一个script标签
			script.type = "text/javascript";
			try {
				script.src =src ;
			}
			catch (ex) {
				script.src =src ;
			}
			$(script).insertAfter(document.body);
			resolve(true)
		})
	},
	checkBaoMing(data){//报名验证
		let {name,phone,code=1} = data
		if(name==''||name==null||name.length==0){
			all.notification({
				type:'error',
				text:'请填写您的姓名',
				timeout:3000
			})
			// alert('请填写您的姓名')
			return false;
		}else if(phone==''||phone==null||phone.length==0){
			all.notification({
				type:'error',
				text:'请填写您的联系电话',
				timeout:3000
			})
			// alert('请填写您的联系电话')
			return false;
		}else{
			let isPhone = /^1(3|4|5|6|7|8|9)\d{9}$/;
			if(!isPhone.test(phone)){
				all.notification({
					type:'error',
					text:'对不起，您的手机号格式不正确，请检查',
					timeout:3000
				})
				// alert('对不起，您的手机号格式不正确，请检查')
				return false;
			}else{
				return true;
			}
		}	
	},
	jqPromiseAjax (params) {//jq ajax promise封装
	    return new Promise((resolve, reject) => {
	        $.ajax({
	            url: params.url,
	            type: params.type || 'get',
	            dataType: 'json',
	            headers: params.headers || {},
	            data: params.data || {},
	            success(res) {
	                resolve(res)
	            },
	            error(err) {
	                reject(err)
	            }
	        })
	    })
	},
	getBanner(datas){
		let params = {
			method:'POST',
			url:datas.url,
			text:{
				textWarn:'Banner请求成功，但暂无数据',
				textError:'Banner请求失败',
			},
			data : {
				app_class:'web',
				user_token:datas.token,
				key:datas.key
			},
			changeDomFn:function(content){
				datas.changeDomFn(content)
				
			},
			dealWithEmptyDom:function(){
				datas.dealWithEmptyDom(content)
			}
		}
		all.dealWithDomAfterAjax(params)
	}
	,
	dealWithDomAfterAjax({method='POST',text={textWarn:'请求成功'},url='',
	data={},changeDomFn = function(){},dealWithEmptyDom = function(){}}){
		let datas = data
		let params = {
			method:method,//ajax请求方法
			data:datas,//ajax请求参数
			url:url,//ajax请求url
			successfn:function(res){//ajax请求成功的回调
				let jsonRes = $.parseJSON( res );
				// all.log(jsonRes)
				if(jsonRes.state==0){
					let params={
						type:'warn',
						text:text.textWarn,//ajax请求成功，但无数据的提示
						timeout:2000
					}
					all.message(params)
					dealWithEmptyDom&&dealWithEmptyDom()
				}else if(jsonRes.state==1){
					// createTeacherHot(jsonRes.content)
					
					changeDomFn&&changeDomFn(jsonRes.content)//ajax请求成功DOM的操作方法
				}
			}
		}
		all.sendAjax(params)
	},
	//普通的ajax处理
	sendAjax({method='',url='',data={},successfn=function(e){console_log(e)},errorfn=function(e){console_log(e)}} = {} ) {
		 ajaxAnimate()
	  $.ajax({
	            type: method,
	            url: url,
	            data: data,
	            success: function(d){
					// console.log(d)
					 successfn&&successfn(d);
					 del_loading_div()
	            },
	            error: function(e){
					errorfn&&errorfn(e);
					del_loading_div(2000)
					setTimeout(function(){
						all.message({
							type:'error',
							text:'对不起，请求失败',
							timeout:4000
						})
					},1000)
					
	            }
	        });
	},
	//获取元素data - 自定义属性
	getItemDataAttr(item,DataName){
			return item.data(DataName);
	},
	//信息弹窗
	message({type='',text='这是个弹窗',timeout=2000} = {}){
			let i = all.numForMessage;	
			switch (type){
				case 'default':
					$('#hk-alert').append(
					`<li class="alert-default alert${i}"><i class="fa fa-info-circle alert-icon"></i>${text}</li>`
					)
					break;
				case 'error':
					$('#hk-alert').append(
					`<li class="alert-error alert${i}"><i class="fa fa-close  alert-icon"></i>${text}</li>`
					)
					break;
				case 'success':
					$('#hk-alert').append(
					`<li class="alert-success alert${i}"><i class="fa fa-sign-language alert-icon"></i>${text}</li>`
					)
					break;	
				case 'warn':
					$('#hk-alert').append(
					`<li class="alert-warn alert${i}"><i class="fa fa-exclamation-circle alert-icon"></i>${text}</li>`
					)
					break;	
				default:
					$('#hk-alert').append(
					`<li class="alert-default alert${i}"><i class="fa fa-info-circle alert-icon"></i>${text}</li>`
					)
				break;
			}
			setTimeout(function(){
				$('.alert'+i).fadeOut(300);
				setTimeout(function () {
				   $('.alert'+i).remove()
				}, 300);
			},timeout)
			all.numForMessage++
	},
	//警告弹窗
	notification({type='',text='这是个弹窗',timeout=2000} = {}){
			if($('body').find('#hk-notification').length===0){
				//如果没有hk_notification - 不是公用的php模板 - 自动添加
				let hk_notification = `
					<ul id="hk-notification"></ul>
				`
				let hk_notification_style = `<style>
						#hk-notification{
							position: fixed;
							z-index: 908080;
							right: 20px;
							top:70px;
						}
						#hk-notification .notification-item{
							margin-bottom: 20px;
							box-shadow: 0 2px 12px 0 rgba(0,0,0,.1);
							transition: opacity .3s,transform .3s,left .3s,right .3s,top .4s,bottom .3s;
							width: 330px;
							padding: 14px 26px 14px 13px;
							border-radius: 8px;
							box-sizing: border-box;
							border: 1px solid #ebeef5;
							background: white;
						}
						#hk-notification .notification-item h1{
							font-weight: 700;
							font-size: 16px;
							color: #303133;
							margin: 0;	
						}
						#hk-notification .notification-item h1 i{
							margin-right:8px;
						}
						#hk-notification .notification-item h1 .notification-error{
							color: #f56c6c;
						}
						#hk-notification .notification-item h1 .notification-default{
							color: #909399;
						}
						#hk-notification .notification-item h1 .notification-success{
							color: #67c23a;
						}
						#hk-notification .notification-item h1 .notification-warn{
							color: #e6a23c;
						}
						#hk-notification .notification-item p{
							font-size: 14px;
							line-height: 21px;
							margin: 6px 0 0 20px;
							color: #606266;
							text-align: justify;
						}
				</style>`
				let last=$('body').children(":last")
				$(hk_notification).insertBefore(last)
				$(hk_notification_style).insertBefore(last)
			}
			
			let i = all.numForNotification;	
			switch (type){
				case 'default':
					$('#hk-notification').append(
					// `<li class="alert-default alert${i}"><i class="fa fa-info-circle alert-icon"></i>${text}</li>`
					`<li class="notification-item notification${i}">
						<h1><i class="fa fa-info-circle notification-default"></i>提示</h1>
						<p>${text}</p>
					</li>`
					)
					break;
				case 'error':
					$('#hk-notification').append(
					// `<li class="alert-error alert${i}"><i class="fa fa-close  alert-icon"></i>${text}</li>`
					`<li class="notification-item notification${i}">
						<h1><i class="fa fa-close notification-error"></i>提示</h1>
						<p>${text}</p>
					</li>`
					)
					break;
				case 'success':
					$('#hk-notification').append(
					// `<li class="alert-success alert${i}"><i class="fa fa-sign-language alert-icon"></i>${text}</li>`
					`<li class="notification-item notification${i}">
						<h1><i class="fa fa-sign-language notification-success"></i>提示</h1>
						<p>${text}</p>
					</li>`
					)
					break;	
				case 'warn':
					$('#hk-notification').append(
					// `<li class="alert-warn alert${i}"><i class="fa fa-exclamation-circle alert-icon"></i>${text}</li>`
					`<li class="notification-item notification${i}">
						<h1><i class="fa fa-exclamation-circle notification-warn"></i>提示</h1>
						<p>${text}</p>
					</li>`
					)
					break;	
				default:
					$('#hk-notification').append(
					// `<li class="alert-default alert${i}"><i class="fa fa-info-circle alert-icon"></i>${text}</li>`
					`<li class="notification-item notification${i}">
						<h1><i class="fa fa-info-circle"></i>提示</h1>
						<p>${text}</p>
					</li>`
					)
				break;
			}
			setTimeout(function(){
				$('.notification'+i).fadeOut(800);
				setTimeout(function () {
				   $('.notification'+i).remove()
				}, 1200);
			},timeout)
			all.numForNotification++
	},
	//字符串转日期
	timestampToTime(timestamp) {
	        var date = new Date(timestamp * 1000);//时间戳为10位需*1000，时间戳为13位的话不需乘1000
	        Y = date.getFullYear() + '-';
	        M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
	        D = date.getDate() + ' ';
	        h = date.getHours() + ':';
	        m = date.getMinutes() + ':';
	        s = date.getSeconds();
	        return Y+M+D+h+m+s;
	},
	//取url中的参数值
	getQueryString(name) {
	  var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");//构造一个含有目标参数的正则表达式对象  
	  var r = window.location.search.substr(1).match(reg);//匹配目标参数   
	  if (r != null) return unescape(r[2]); return null;//返回参数值  
	},
	//专门针对后端返回时间格式处理时间20191119064333
	getTime(time){
		let year = time.slice(0,4)
		let mounth = time.slice(4,6)
		let date = time.slice(6,8)
		return [year,mounth,date]
	},
	//改变图片清晰度 针对后端返回的图片规格
	changeImgUrlForclear(url,clear){
		let img_url1 = url.substr(0,(url.lastIndexOf('.')-2))
		let img_url2 = url.substr(url.lastIndexOf('.'))
		let img_url = img_url1+clear+img_url2
		return img_url
	}
}
