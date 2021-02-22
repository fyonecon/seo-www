	let create_m_footer=$('<div></div>');        //创建一个父div
	    create_m_footer.addClass('footer');    //添加css样式
		create_m_footer.css({
		position: 'fixed',
		bottom: 0,
		left: 0,
		width: '100%',
		backgroundColor: '#ffffff',
		boxShadow: '0 0 20px 2px #666',
		height: '50px',
		zIndex: 100,
		display: 'flex',
		justifyContent: 'space-between',
		})
		
	let m_footer_html = `
		<div
		
		class="footer-item choose1">
			
			<p>一键拨号</p>
		</div>
		
		<div
		
		class="choose3 footer-item">
			
			<p class="iconfont icon-shouye">首页</p>
		</div>
		
		<div
		
		class="footer-item choose">
			
			<p>在线咨询</p>
		</div>
	`	
		
		create_m_footer.append( m_footer_html)
		
// 		create_m_footer.on('click',function(){
// 			window.open('https://tb.53kf.com/code/client/0e0881fb4bf9cb323abd9dff7089b4290/2'
// )
// 		})
		$(document.body).append(create_m_footer); 
		$(document).ready(function(){
			$('.footer-item').css({
				width: '40%'
			});
			$('.footer-item>p').css({
				margin: '5px',
				height: '40px',
				lineHeight: '40px',
				fontSize: '22px',
				textAlign: 'center',
				borderRadius: '10px',
			})
			$('.choose').css({
				color:'white'
			})
			$('.choose>p').css({
				background: '#ff733c'
			})
			$('.choose1').css({
				color:'white'
			})
			$('.choose1>p').css({
				background: '#d16ce2'
			})
			$('.choose3').css({
				color:'white',
				width: '20%'
			})
			$('.choose3>p').css({
				background: '#6eb9e5',
				borderRadius: '50%',
				width: '40px',
				fontSize: '16px',
				margin: '5px auto',
			})
			
			//根据主机名，判断引用网址，分配不同的返回url和客服链接
			let host = window.location.host
			let tel_phone = ''
			let _href = ''
			let home_url = ''
			if(host=='cs.wendu.com'||host == 'hn.wendu.com'||host == 'www.cswendu.com'||host == 'm.cswendu.com'){
				tel_phone = 'tel://15580806775'
				_href = 'tb.53kf.com/code/client/0e0881fb4bf9cb323abd9dff7089b4290/1'
				if(host == 'm.cswendu.com'){
					home_url ='m.cswendu.com'
				}else{
					home_url = host+'/m'
				}
			}else if(host=='fujwendu.com'||host =='www.fujwendu.com'||host =='m.fujwendu.com'){
				tel_phone = 'tel://18060898365'
				_href = 'tb.53kf.com/code/client/0e0881fb4bf9cb323abd9dff7089b4290/2'
				home_url = "m.fujwendu.com/#/shouye"
			}else{
				tel_phone = 'tel://15580806775'
				_href = 'tb.53kf.com/code/client/0e0881fb4bf9cb323abd9dff7089b4290/1'
				home_url ='m.cswendu.com'
			}
			
			$('.choose1').on('click',function(){
				window.location.href=tel_phone
			})
			$('.choose').on('click',function(){
				window.location.href='https://'+_href
				
			})
			$('.choose3').on('click',function(){
				window.location.href='http://'+home_url
			})
		})