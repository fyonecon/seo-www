	$(document).ready(function(){
		//根据主机名，判断引用网址，分配不同的返回url和客服链接
		let right_host = window.location.host
		let right_href = ''
		let TC_bg = "url('http://oss.cswendu.com/pc.cswendu.com/fixed-img-for-js/fix-center-bg5.png') no-repeat center center/contain"
		
		if(right_host=='cs.wendu.com'||right_host == 'hn.wendu.com'||right_host == 'www.cswendu.com'||right_host == 'm.cswendu.com'){
			
			right_href = 'tb.53kf.com/code/client/0e0881fb4bf9cb323abd9dff7089b4290/1'
		}else if(right_host=='fujwendu.com'||right_host =='www.fujwendu.com'||right_host =='m.fujwendu.com'){
			
			right_href = 'tb.53kf.com/code/client/0e0881fb4bf9cb323abd9dff7089b4290/2'
			
		}else{
			right_href = 'tb.53kf.com/code/client/0e0881fb4bf9cb323abd9dff7089b4290/1'
		}
		
		
		
		let createFixCenterDiv=$('<div></div>');        //创建一个父div
			createFixCenterDiv.addClass('fix-center-m-body')
			createFixCenterDiv.css({
			position:'fixed',
			left:'50%',
			top:'50%',
			transform:'translate3d(-50%,-50%,0)',
			cursor:'pointer',
			width:'80%',
			// paddingBottom:'44%',
			paddingBottom:'90%',
			zIndex:'9998',
			background:TC_bg
			})
			
			let createFixCenterhtml = `
						
						<div class="fix-center-x"></div>
						<div class="fix-center-btn"></div>
				`
		createFixCenterDiv.append(createFixCenterhtml)	
		if(right_host=='fujwendu.com'||right_host =='www.fujwendu.com'||right_host =='m.fujwendu.com'){
			
			
		}else{
			$(document.body).append(createFixCenterDiv); 
		}
		
		
		
		
		$('.fix-center-x').css({
			position: 'absolute',
			right: '10px',
			top: '10px',
			background: "url('http://oss.cswendu.com/pc.cswendu.com/fixed-img-for-js/close2.png') no-repeat center center/contain",
			width: '28px',
			zIndex: '9999',
			height: '28px',
			cursor: 'pointer'
		})
		$('.fix-center-btn').css({
			position: 'absolute',
			bottom: '20px',
			left: '50%',
			transform: 'translateX(-50%)',
			width: '80%',
			height: '40px',
			lineHeight: '40px',
			// backgroundColor:' #00B7EE',
			color: 'white',
			fontWeight: 'bold',
			textAlign: 'center',
			cursor: 'pointer'
		})
		
		
		$('.fix-center-x').on('click',function(event){
			event.stopPropagation();
			createFixCenterDiv.css({
				display:'none'
			})
			setTimeout(function () {
			 createFixCenterDiv.css({
			 	display:'block'
			 })
			}, 30000);
		})
		
		$('.fix-center-m-body').on('click',function(){
			// console.log(right_href)
			window.open('https://'+right_href)
			createFixCenterDiv.css({
				display:'none'
			})
			setTimeout(function () {
			 createFixCenterDiv.css({
			 	display:'block'
			 })
			}, 30000);
		})
		
		
	})	
		
		
		
		