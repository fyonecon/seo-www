let createDivBottom=$('<div></div>');        //创建一个父div
	createDivBottom.addClass('fix_bottom');    //添加css样式
	createDivBottom.css({
	width: '0',
	position: 'fixed',
	bottom: 0,
	left: 0,
	background: 'rgba(0,0,0,0.6)',
	zIndex: 9999,
	overflow:'hidden',
	transition:'all 0.3s'
	})
let fix_bottom_center = $('<div></div>'); 		
	fix_bottom_center.addClass('fix_bottom_center');
	fix_bottom_center.css({
	width: '1000px',
	margin: '0 auto',
	padding: '15px 0',
	position:'relative'
	})
let fix_bottom_close = $('<div>X</div>');		//关闭按钮
	fix_bottom_close.addClass('fix_bottom_close');
let html = `
			
			<h1 class="fix_bottom_center_title">2022考研规划指导，免费测评限领一次！</h1>
			<div class="fix_bottom_body">
				<select name="" id="">
					<option value="">请选择学历</option>
					<option value="">在校本科</option>
					<option value="">在职本科</option>
					<option value="">在职大专</option>
					<option value="">其他学历</option>
				</select>
				<input type="text" id="fix_bottom_zhuanye" placeholder="请输入所学专业">
				<input type="text" id="fix_bottom_yuanxiao" placeholder="请输入目标院校">
				<input type="text" id="fix_bottom_xingming" placeholder="请输入您的姓名">
				<input type="text" id="fix_bottom_phone" placeholder="请输入您的手机号">
				<div class="fix_bottom_body_submit">免费获取</div>
			</div>
	`
fix_bottom_center.append(html)
createDivBottom.append(fix_bottom_center)
createDivBottom.append(fix_bottom_close)
$(document.body).append(createDivBottom); 
let fix_bottom_left_up = $('<div></div>'); 		//展开按钮
	fix_bottom_left_up.addClass('fix_bottom_left_up');
	fix_bottom_left_up.css({
	position:'fixed',
	left:'-20px',
	bottom:'50px',
	width:'250px',
	height:'64px',
	zIndex: 9999,
	transition:'all 0.3s',
	transformOrigin: '0% 0%',
	background:"url('http://oss.cswendu.com/pc.cswendu.com/fixed-img-for-js/fixed_bottom_left_up.png') no-repeat center center/contain"
	})
$(document.body).append(fix_bottom_left_up); 

//根据主机名，判断引用网址，分配不同的返回url和客服链接
let bottom_host = window.location.host
// let tel_phone = ''
let bottom_href = ''
let bottom_api = ''
// let home_url = ''
if(bottom_host=='cs.wendu.com'||bottom_host == 'hn.wendu.com'||bottom_host == 'www.cswendu.com'||bottom_host == 'm.cswendu.com'){
	// tel_phone = 'tel://15367826050'
	// bottom_href = 'tb.53kf.com/code/client/0e0881fb4bf9cb323abd9dff7089b4290/1'
	bottom_api = "https://api.cswendu.com/cswd/public/index.php/api/"
	// if(bottom_host == 'm.cswendu.com'){
	// 	home_url ='m.cswendu.com'
	// }else{
	// 	home_url = bottom_host+'/m'
	// }
}else if(bottom_host=='fujwendu.com'||bottom_host =='www.fujwendu.com'||bottom_host =='m.fujwendu.com'){
	// tel_phone = 'tel://18060898365'
	// bottom_href = 'tb.53kf.com/code/client/0e0881fb4bf9cb323abd9dff7089b4290/2'
	bottom_api = "http://api.fujwendu.com/cswd/public/index.php/api/"
	// home_url = "m.fujwendu.com/#/shouye"
}else{
	bottom_api = "https://api.cswendu.com/cswd/public/index.php/api/"
}


$(document).ready(function(){
	const postbottom_api = bottom_api + "app/get_app_token"; // 接口
	const map = new Map([ // 要提交数据
		["app_class",'pc'],
	    ["url", window.location.href],
	]);
	let body = "";
	for (let [k, v] of map) { body += k+"="+v+"&"; }
	fetch(postbottom_api, {
	    method: "post",
	    mode: "cors",       // same-origin/no-cors/cors
	    cache: "no-cache",
	    headers: {
	        "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
	    },
	    body: body,         // body示例格式："key1=val1&key2=val2"
	}).then(function (response){
	    if (response.status === 200){return response;}
	}).then(function (data) {
	    return data.text();
	}).then(function(text){ // 返回接口数据
	    // 统一格式校验
	    let back = null;
	    let res = null;
	    if (typeof text === "string"){
	        back = text;
	        res = JSON.parse(text);
	    }else if (typeof text === "object"){
	        back = JSON.stringify(text);
	        res = text;
	    }else {console.log("未知类型=" + typeof text)}
	    console.log("类型：\n" + typeof text + "\n数据：\n" + back);
	
	    // 解析与渲染数据 res
	    if (res.state === 0){
	        console.log(res.msg);
	        
	        // refresh_page(3000);
	    }else if (res.state === 1){
	        token = res.content.user_token;
			window.token = token;
	        
	        
	
	    }
		})
	
	
		$('.fix_bottom_close').css({
			position:'absolute',
			right:'5px',
			top:'5px',
			color:'white',
			fontSize:'26px',
			cursor:'pointer'
		})
	
		$('.fix_bottom_center_title').css({
			color: 'white',
			fontSize: '23px',
			textAlign:'center',
			margin:'0'
		})
		$('.fix_bottom_body').css({
			overflow: 'hidden'
		})
		$('.fix_bottom_body>select,.fix_bottom_body>input').css({
			float: 'left',
			width: '135px',
			fontSize: '14px',
			height: '35px',
			lineHeight: '35px',
			background: '#fff',
			color: '#afafaf',
			padding: '0 0 0 15px',
			border: '1px solid #e1e1e1',
			marginLeft: '8px',
			fontFamily: "microsoft yahei",
			borderRadius: '5px',
		})
		$('.fix_bottom_body_submit').css({
			float: 'left',
			width: '135px',
			fontSize: '14px',
			height: '35px',
			lineHeight: '35px',
			color:' white',
			background:' #12a7ee',
			marginLeft: '10px',
			borderRadius: '5px',
			textAlign:'center',
			overflow:'hidden'
		})
		
		$('.fix_bottom_left_up').on('click',function(){
			$('.fix_bottom').css({
				width:'100%'
			})
			$('.fix_bottom_left_up').css({
				transform:'rotate(-90deg)',
				height:'0'
			})
		})
		//关闭
		$('.fix_bottom_close').on('click',function(){
			$('.fix_bottom').css({
				width:'0'
			})
			$('.fix_bottom_left_up').css({
				transform:'rotate(0)',
				height:'64px'
			})
		})
		
		
		let name = ''
		let phone = ''
		let zhuanye = ''
		let yuanxiao = ''
		$('#fix_bottom_xingming').on("input propertychange", function(){
			name = $('#fix_bottom_xingming').val()
		});
		$('#fix_bottom_phone').on("input propertychange", function(){
			phone  = $('#fix_bottom_phone').val()
		});
		$('#fix_bottom_zhuanye').on("input propertychange", function(){
			zhuanye  = $('#fix_bottom_zhuanye').val()
		});
		$('#fix_bottom_yuanxiao').on("input propertychange", function(){
			yuanxiao  = $('#fix_bottom_yuanxiao').val()
		});
		
		$('.fix_bottom_body_submit').on('click',function(){
			
			if(name==''||name==null||name.length==0){
				alert('请输入您的姓名')
				return false;
			}else if(phone==''||phone==null||phone.length==0){
				
				alert('请填写您的联系电话')
				return false;
			}else{
				let isPhone = /^1(3|4|5|6|7|8|9)\d{9}$/;
				if(!isPhone.test(phone)){
					console.log(phone)
					alert('对不起，您的手机号格式不正确，请检查')
					return false;
				}else{
					// ajax
					let data = {
							app_class:'web',
							user_token:window.token,
							resource:'pc_ceping',
							user_info:"底部悬浮报名#@"+name+"#@"+zhuanye+"#@"+yuanxiao+"#@"+window.location.href,
							user_phone:phone
					}
					 $.ajax({
						type: 'POST',
						url: bottom_api+"app/user_phone_order",
						data: data,
						success: function(d){
							alert('报名成功')
						},
						error: function(e){
							
							alert('报名失败')
						}
					});
					
					
					
					
				}
			}
		})
		
		
		
		
		
});	