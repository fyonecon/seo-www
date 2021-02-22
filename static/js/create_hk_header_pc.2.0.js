let header_html
let header_host = window.location.host
if(header_host=='fujwendu.com'||header_host =='www.fujwendu.com'||header_host =='m.fujwendu.com'){
	header_html = `
		<div class="hk_header">
			<div class="hk_header_center hk_clear">
				<a data-href="/home.php?route=nav&nav=home" class="hk_heaer_logo f_jump" target="_blank">
					<img src="http://oss.cswendu.com/pc.cswendu.com/fixed-img-for-js/logo_pc.png" alt="">
				</a>
				<div class="hk_header_item_body">
					<a data-href="/home.php?route=nav&nav=home" class="hk_header_item nav-home " target="_blank">
						首页
						
					</a>
					<a  class="hk_header_item nav-2021" data-href="/curriculum.php?route=nav&nav=2021">
						考研课程
					</a>
					<a  class="hk_header_item" data-href="/curriculum.php?route=nav&nav=2021">
						专业定向班
					</a>
					<a class="hk_header_item nav-all-teacher" data-href="/teacher.php?route=nav&nav=all-teacher">
						关于文都
					</a>
					<a data-href="/information.php?route=nav&nav=information" class="hk_header_item nav-information" target="_blank">考研资讯</a>
					<a data-href="/ask.php?route=nav&nav=ask" class="hk_header_item nav-ask" target="_blank">考研问答</a>
					<a data-href="/koubei.php?route=nav&nav=koubei" class="hk_header_item nav-koubei" target="_blank">学员评价</a>
					
				</div>
				<a data-href="/home.php?route=nav&amp;nav=home" class="hk_heaer_tel f_jump" target="_blank">
							<img src="http://oss.cswendu.com/pc.cswendu.com/fixed-img-for-js/tel_pc_fj.png" alt="">
				</a>
			</div>
		</div>
	`
	
}else{
	header_html = `
		<div class="hk_header">
			<div class="hk_header_center hk_clear">
				<a data-href="/home.php?route=nav&nav=home" class="hk_heaer_logo f_jump" target="_blank">
					<img src="http://oss.cswendu.com/pc.cswendu.com/fixed-img-for-js/logo_pc.png" alt="">
				</a>
				<div class="hk_header_item_body">
					<a data-href="/home.php?route=nav&nav=home" class="hk_header_item nav-home " target="_blank">
						首页
						
					</a>
					<a  class="hk_header_item nav-2021" data-href="/curriculum.php?route=nav&nav=2021">
						考研课程
						<div class="hk_header_item_slideDown">
							<h1 class="hk_header_slideDown_t1title" data-href="/curriculum.php?route=nav&nav=2021">考研课程</h1>
							<h1 class="hk_header_slideDown_t2title">鹰飞集训营</h1>
							<div class="hk_header_slideDown_t3">
								<span data-href="/detail/detail-full-year.php?route=nav&nav=2021" class="hk_header-slideDown_t3_item">全年集训营</span>
								<span data-href="/detail/tg/bn-pc/index.html?route=nav&nav=2021" class="hk_header-slideDown_t3_item">半年集训营</span>
								<span data-href="/detail/tg/sj-pc/index.html?route=nav&nav=2021" class="hk_header-slideDown_t3_item">暑假集训营</span>
								<span data-href="/detail/detail-full-year.php?route=nav&nav=2021" class="hk_header-slideDown_t3_item">秋季集训营</span>
								<span data-href="/detail/detail-full-year.php?route=nav&nav=2021" class="hk_header-slideDown_t3_item">冲刺集训营</span>
								<span data-href="/detail/tg/reexamination.php?route=nav&nav=2021" class="hk_header-slideDown_t3_item">2020复试营</span>
								<span data-href="/detail/tg/erzhan/index.php?route=nav&nav=2021" class="hk_header-slideDown_t3_item">二战集训营</span>
								<span data-href="/detail/tg/hanjia/index.php?route=nav&nav=2021" class="hk_header-slideDown_t3_item">寒假集训营</span>
								<span data-href="" class="hk_header-slideDown_t3_item"></span>
							</div>
							<h1 class="hk_header_slideDown_t2title">高端彩虹卡（周末辅导）</h1>
							<div class="hk_header_slideDown_t3">
								<span data-href="/detail/tg/rainbow-card.php?route=nav&nav=2021" class="hk_header-slideDown_t3_item">飞跃彩虹卡</span>
								<span data-href="/detail/tg/rainbow-card.php?route=nav&nav=2021" class="hk_header-slideDown_t3_item">绽放彩虹卡</span>
								<span data-href="/detail/tg/rainbow-card.php?route=nav&nav=2021" class="hk_header-slideDown_t3_item">魔力彩虹卡</span>
								<span data-href="/detail/tg/rainbow-card.php?route=nav&nav=2021" class="hk_header-slideDown_t3_item">菁英彩虹卡</span>
								<span data-href="/detail/tg/rainbow-card.php?route=nav&nav=2021" class="hk_header-slideDown_t3_item">199管综彩虹卡</span>
					
								<span data-href="" class="hk_header-slideDown_t3_item"></span>
							</div>
							<h1 class="hk_header_slideDown_t2title">一对多辅导</h1>
							<div class="hk_header_slideDown_t3">
								<span data-href="/detail/tg/oneto/index.php?route=nav&nav=2021" class="hk_header-slideDown_t3_item">公共课一对一</span>
								<span data-href="/detail/tg/oneto/index.php?route=nav&nav=2021" class="hk_header-slideDown_t3_item">专业课一对一</span>
								<span data-href="/detail/tg/oneto/index.php?route=nav&nav=2021" class="hk_header-slideDown_t3_item">考研一对三</span>
										
							</div>
							<h1 class="hk_header_slideDown_t2title">定制辅导</h1>
							<div class="hk_header_slideDown_t3">
								<span data-href="53" class="hk_header-slideDown_t3_item">题海班</span>
								<span data-href="53" class="hk_header-slideDown_t3_item">点题预测班</span>
								<span data-href="/detail/detail-onwork.php?route=nav&nav=workindex" class="hk_header-slideDown_t3_item">在职考研</span>
							</div>
						</div>
					</a>
					<a  class="hk_header_item" data-href="/curriculum.php?route=nav&nav=2021">
						专业定向班
						<div class="hk_header_item_slideDown">
							<h1 class="hk_header_slideDown_t1title">专业定向班</h1>
							<!-- <h1 class="hk_header_slideDown_t2title">鹰飞集训营</h1> -->
							<div class="hk_header_slideDown_t3">
								<span data-href="/detail/tg/jsj-pc/index.html" class="hk_header-slideDown_t3_item">计算机定向</span>
								<span data-href="/detail/tg/jr-pc/index.html" class="hk_header-slideDown_t3_item">金融专硕</span>
								<span data-href="/detail/tg/fashuo/index.html" class="hk_header-slideDown_t3_item">法律硕士</span>
								<span data-href="/detail/tg/xy_pc/index.php?route=nav&nav=2021" class="hk_header-slideDown_t3_item">西医综合</span>
								<span data-href="53" class="hk_header-slideDown_t3_item">中医综合</span>
								<span data-href="/detail/tg/ys_pc/index.html" class="hk_header-slideDown_t3_item">艺术硕士</span>
								<span data-href="/detail/tg/kjpx/index.html" class="hk_header-slideDown_t3_item">会计硕士</span>
								<span data-href="/detail/tg/mba/index.html" class="hk_header-slideDown_t3_item">MBA/MPA/MEM</span>
								<span data-href="/detail/tg/ty-pc/index.html" class="hk_header-slideDown_t3_item">体育学</span>
							</div>
							
						</div>
					</a>
					<a class="hk_header_item nav-all-teacher" data-href="/teacher.php?route=nav&nav=all-teacher">
						关于文都
						<div class="hk_header_item_slideDown">
							<h1 class="hk_header_slideDown_t1title">关于文都</h1>
							<!-- <h1 class="hk_header_slideDown_t2title">鹰飞集训营</h1> -->
							<div class="hk_header_slideDown_t3">
								<span data-href="/teacher.php?route=nav&nav=all-teacher" class="hk_header-slideDown_t3_item">文都师资</span>
								<span data-href="/footer-spacial/about-us.php?route=nav&nav=home" class="hk_header-slideDown_t3_item">文都品牌</span>
								<span data-href="" class="hk_header-slideDown_t3_item"></span>
							</div>
							
						</div>
					</a>
					<a data-href="/information.php?route=nav&nav=information" class="hk_header_item nav-information" target="_blank">考研资讯</a>
					<a data-href="/ask.php?route=nav&nav=ask" class="hk_header_item nav-ask" target="_blank">考研问答</a>
					<a data-href="/koubei.php?route=nav&nav=koubei" class="hk_header_item nav-koubei" target="_blank">学员评价</a>
					
				</div>
				<a data-href="/home.php?route=nav&amp;nav=home" class="hk_heaer_tel f_jump" target="_blank">
							<img src="http://oss.cswendu.com/pc.cswendu.com/fixed-img-for-js/tel_pc.png" alt="">
				</a>
			</div>
		</div>
	`
}

let header_style = `
<style>
				a{
					color:black;
				}
				.hk_header{
					width: 100%;
					height: 80px;
					background-color: white; 
				}
				.hk_header_center{
					width: 1200px;
					margin: 0 auto;
				}
				.hk_clear:after{
					content: "";
					display: block;
					height: 0;
					line-height: 0;
					clear: both;
				}
				.hk_clear{
					zoom: 1;
				}
				.hk_heaer_logo{
					float: left;
					margin-top: 10px;
				}
				.hk_heaer_logo>img{
					width: 100%;
				}
				.hk_header_item_body{
					float: left;
					margin-left:50px;
				}
				.hk_header_item{
					height: 80px;
					line-height: 80px;
					font-size: 18px;
					text-decoration: none;
					/* color: #448ddb; */
					margin: 0 20px;
					float: left;
					position: relative;
					cursor: pointer;
				}
				.hk_header_item:after{
					visibility: visible;
					position: absolute;
					display: block;
					content: "";
					left: 50%;
					bottom: 2px;
					width: 0;
					height: 8px;
					border-radius: 8px;
					background-color: #2f7fd4;
					transition: all 0.3s;
					transform: translateX(-50%);
				}
				.hk_header_item:hover{
					color: #448ddb;
				}
				.nav-item-title-active{
					color: #448ddb;
				}
				.hk_header_item.nav-item-title-active:after{
					width: 100%;
					
				}
				.hk_header_item:hover:after{
					width: 100%;
				}
				.hk_header_item_slideDown{
					z-index: 9999;
					position: absolute;
					top: 80px;
					left: 50%;
					transform: translateX(-50%);
					background-color:white;
					display: none;
					width: 414px;
					/* min-height: 212px; */
					border-radius: 20px;
					box-shadow: 0 0 10px 0 #D6D6D6;
					padding: 30px;
				}
				.hk_header_slideDown_t1title{
					font-size: 18px;
					color: #2f7fd4;
					font-weight: bold;
					height: 20px;
					line-height: 20px;
					cursor: pointer;
				}
				.hk_header_slideDown_t1title:hover{
					text-decoration: underline;
				}
				.hk_header_slideDown_t2title{
					font-size: 14px;
					color: #5ca5f2;
					position: relative;
					line-height: 16px;
					height: 16px;
					margin-left: 10px;
				}
				.hk_header_slideDown_t2title::after{
					visibility: visible;
					position: absolute;
					display: block;
					content: "";
					left:-10px;
					top: 0;
					width: 3px;
					height: 16px;
					background-color: #5ca5f2;
					
				}
				.hk_header_slideDown_t3{
					line-height: normal;
					display: flex;
					width: 100%;
					justify-content: space-between;
					flex-wrap: wrap;
				}
				.hk_header-slideDown_t3_item{
					color: #242526;
					font-size: 14px;
					width: 33.3%;
					text-align: center;
					margin-bottom: 5px;
				}
				.hk_header-slideDown_t3_item:hover{
					color:#5ca5f2 ;
					cursor: pointer;
				}
				.hk_heaer_tel {
				    float: left;
				    width: 170px;
				    margin-top: 20px;
				}
			</style>`
			
let first=$('body').children(":first")
$(header_html).insertBefore(first)
$(header_style).insertBefore(first)

$(document).ready(function(){
	
	$('.hk_header_item').hover(function(){
		
		// $(this).find('.hk_header_item_slideDown').stop(true,true).slideDown()
		$(this).find('.hk_header_item_slideDown').css({'display':'block'})
	},function(){
		// $(this).find('.hk_header_item_slideDown').stop(true,true).slideUp()
		$(this).find('.hk_header_item_slideDown').css({'display':'none'})
	})
	
	$('.hk_header_slideDown_t1title,.hk_header-slideDown_t3_item,.hk_header_item,.f_jump').on('click',function(){
		
		//根据主机名，判断引用网址，分配不同的返回url和客服链接
		let header_host = window.location.host
		let _href = ''
		let header_home_url = ''
		if(header_host == 'www.cswendu.com'||header_host == 'm.cswendu.com'){
			_href ="http://" + 'tb.53kf.com/code/client/0e0881fb4bf9cb323abd9dff7089b4290/1'
			header_home_url ="https://" + header_host
			
		}else if(header_host=='cs.wendu.com'||header_host == 'hn.wendu.com'){
			_href ="http://" + 'tb.53kf.com/code/client/0e0881fb4bf9cb323abd9dff7089b4290/1'
			header_home_url ="https://" + header_host + "/pc"
			
		}else if(header_host=='fujwendu.com'||header_host =='www.fujwendu.com'||header_host =='m.fujwendu.com'){
			_href = 'tb.53kf.com/code/client/0e0881fb4bf9cb323abd9dff7089b4290/2'
			header_home_url ="http://" + header_host
			
		}else{
			header_home_url ="https://" + 'cs.wendu.com' + "/pc"
			_href ="http://" + 'tb.53kf.com/code/client/0e0881fb4bf9cb323abd9dff7089b4290/1'
		}
		
		let header_url = $(this).attr('data-href')
		let true_url
		if(header_url === '53'){
			true_url = _href
		}else{
			true_url = header_home_url + header_url
		}
		window.open(true_url)
		console.log(true_url)
	})
})