	let createDiv=$('<div></div>');        //创建一个父div
	    createDiv.addClass('fixRightBox');    //添加css样式
		createDiv.css({
		background:"pink",
		color:"red",
		fontSize:"30px",
		position:'fixed',
		right:'30px',
		top:'45%',
		transform:'translateY(-50%)',
		cursor:'pointer',
		width:'214px',
		height:'653px',
		zIndex:'9999',
		opacity: '0.7',
		background:"url('http://oss.cswendu.com/pc.cswendu.com/fixed-img-for-js/spacial-fix-right-2.png') no-repeat center center/contain"
		})
		
		//根据主机名，判断引用网址，分配不同的返回url和客服链接
		let right_host = window.location.host
		// let tel_phone = ''
		let right_href = ''
		// let home_url = ''
		if(right_host=='cs.wendu.com'||right_host == 'hn.wendu.com'||right_host == 'www.cswendu.com'||right_host == 'm.cswendu.com'){
			// tel_phone = 'tel://15367826050'
			right_href = 'tb.53kf.com/code/client/0e0881fb4bf9cb323abd9dff7089b4290/1'
			// if(right_host == 'm.cswendu.com'){
			// 	home_url ='m.cswendu.com'
			// }else{
			// 	home_url = right_host+'/m'
			// }
		}else if(right_host=='fujwendu.com'||right_host =='www.fujwendu.com'||right_host =='m.fujwendu.com'){
			// tel_phone = 'tel://18060898365'
			right_href = 'tb.53kf.com/code/client/0e0881fb4bf9cb323abd9dff7089b4290/2'
			// home_url = "m.fujwendu.com/#/shouye"
		}else{
			right_href = 'tb.53kf.com/code/client/0e0881fb4bf9cb323abd9dff7089b4290/1'
		}
		
		
		
		createDiv.on('click',function(){
			window.open('https://'+right_href)
		})
		$(document.body).append(createDiv); 
		