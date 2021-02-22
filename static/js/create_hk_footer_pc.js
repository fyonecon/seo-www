//通用底部
let footer_html = `
	<div class="hk_footer">
		<div class="hk_footer_center">
			<p class="hk_footer_item">总部地址：北京市海淀区西三环北路72号世纪经贸大厦B座16层1608</p>
			<p class="hk_footer_item">邮编：100048</p>
			
			<p class="hk_footer_item">24小时咨询热线：15367824570</p>
			<p class="hk_footer_item"><img src="http://oss.cswendu.com/pc.cswendu.com/fixed-img-for-js/xba.png" alt="">京ICP备05001816号-1</p>
			<p class="hk_footer_item hk_footer_date"> 2007/01-2020/07</p>
		</div>
		
	</div>
`
let footer_style = `
<style>
	.hk_footer{
		margin-top: 100px;
		padding: 50px 0 ;
		overflow: hidden;
		background: url("https://cs.wendu.com/pc/static/img/footerBG.png") no-repeat center center;
	}
	.hk_footer .hk_footer_center{
		width: 900px ;
		margin: 0 auto;
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
	}
	.hk_footer .hk_footer_center .hk_footer_item{
		margin: 5px 10px;
		cursor: pointer;
	}
	.hk_footer .hk_footer_center .hk_footer_item img{
		float: left;
		width: 20px;
	}
</style>`
			
let last=$('body').children(":last")
$(footer_html).insertBefore(last)
$(footer_style).insertBefore(last)

$(document).ready(function(){
	let hk_footer_time = new Date()
	let hk_footer_html = `2007/01 - ${hk_footer_time.getFullYear()}/${hk_footer_time.getMonth()+1}`
	$('.hk_footer_date').text(hk_footer_html)
	
})