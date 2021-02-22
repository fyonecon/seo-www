// $(window).scroll(function (event) {
// 	lazyLoad()
// 		var wScrollY = window.scrollY; // 当前滚动条位置  
// 		var wInnerH = window.innerHeight; // 设备窗口的高度（不会变）  
// 		var bScrollH = document.body.scrollHeight; // 滚动条总高度      
// 		if (wScrollY + wInnerH >= bScrollH) {
// 			console.log("触发底部");
// 			if(pages*limit<total){
// 				pages++
// 				// getkcpjList(pages,limit)
// 				// getHotAsk(pages,limit)
// 			}else{
// 				all.notification({
// 					type:'error',
// 					text:'我是有底线的~已经是最后一条啦',
// 					timeout:3000
// 				})
// 			}
			
// 		}
// 	});
	
	
	
	
	
	//获取专题页内容 - 并插入
	async function getCourseTypeForSpacial(){
		let course_class_id
		await all.jqPromiseAjax({
			url:api_url+"app/list_course_class",
			type:'POST',
			data:{
				app_class:'web',
				user_token:window.token,
				course_class_id:'all'
			},//ajax请求参数
		}).then(res=>{
			if(res.state===0){
				
			}else{
				$.isArray( res.content)&& res.content.forEach((item,index)=>{
					if(item.course_class_name =='热门课程（用于首页和推荐）'){
						 course_class_id = item.course_class_id
						// return course_class_id
					}			
				})
			}
		})
		return course_class_id
	}
	
	
	//插入专题页
	async function getList_Spacial(course_class_id){
		await all.jqPromiseAjax({
				url: api_url+"app/list_course" ,
				type:'POST',
				data :{
					app_class:'web',
					user_token:window.token,
					course_id:'all',
					course_class_id:course_class_id,
					page:1,
					limit:4
				},
			}).then(res=>{
				if(res.state===0){
					
				}else{
					let html = ''
					$.isArray(res.content)&&res.content.forEach((item,index)=>{
						html += ` 
							<div class="course-item">
								<a href="${item.course_ad_url}" target="_blank">
									<img data-src="${item.course_cover}" class="hot-course-cover"  title="${item.course_name}" alt="${item.course_name}" />
								</a>
								<div class="clear"></div>
								<div class="hot-course-content">
									<div class="hot-course-name">${item.course_name}</div>
									<div class="hot-course-description">${item.course_slogan}</div>
									<div class="hot-course-info">${item.course_description}</div>
									<a class="hot-course-ask click" target="_blank" href="${window.kf53}">免费咨询</a>
								</div>
							</div>`
					})
					$('.course-div').html('')
					$('.course-div').append(html)
				}
			})
		
	}
	//banner轮播图
	function bannerSwiperInit(){
		var swiper = new Swiper('.homeBanner-swiper-container', {
		  pagination: {
		    el: '.homeBanner-swiper-pagination',
		  },
		  loop: true,
		  autoplay: {
		    delay: 2500,
		    disableOnInteraction: false,
		  },
		});
	}
	//热门老师轮播图
	function hotTeacherSwiperInit(){
		var swiper = new Swiper('.teacher-swiper-container', {
		  slidesPerView: 4,
		  spaceBetween: 30,
		  pagination: {
		    el: '.teacher-swiper-pagination',
		    clickable: true,
		  },
		  navigation: {
		    nextEl: '.teacher-swiper-button-next',
		    prevEl: '.teacher-swiper-button-prev',
		  },
		});
	}
	//获取home-banner
	async function getBanner(){
		await all.jqPromiseAjax({
				url:api_url + 'app/get_array_cover_img',
				type:'POST',
				data:{
					app_class:'web',
					user_token:window.token,
					key:'home_slider',
				},//ajax请求参数
			}).then(res=>{
				if(res.state===0){
					$('.homeBanner-swiper-wrapper').html('');
				}else{
					let html = ''
					$.isArray(res.content)&&res.content.forEach((item,index)=>{
						let img_url = all.changeImgUrlForclear(item.img,"x4")
						html += `<div class="swiper-slide"><a href="${item.jump}" target="_blank" title="文都banner"><img data-src="${img_url}" alt="" class="banner_img"></a></div>`
						
					})
					$('.homeBanner-swiper-wrapper').html('');
					$('.homeBanner-swiper-wrapper').append(html)
					bannerSwiperInit()
				}
			})
	}
	//获取热门老师
	async function getTeacherHot(){
		await all.jqPromiseAjax({
				url:api_url + 'app/teacher_hot',
				type:'POST',
				data : {
					app_class:'web',
					user_token:window.token,
					teacher_id:'hot'
				},
			}).then(res=>{
				if(res.state===0){
					$('.teacher-content').html('')
				}else{
					let html = ''
					$.isArray(res.content)&&res.content.forEach((item,index)=>{
						html += `<a href="./detail/detail-teacher.php?nav=teacher&teacher_id=${item.teacher_id}" target="_blank" title="文都热门名师：${item.teacher_name}" class="teacher-item-div swiper-slide">
							<img data-src="${item.teacher_cover}" class="teacher-item-cover" data-img_name="" title="${item.teacher_name}" alt="名师封面照"/>
							<div class="clear"></div>
							<div class="teacher-item-name">${item.teacher_name}</div>
							<div class="teacher-item-txt">${item.teacher_grading}</div>
						</a>`
					})
					$('.teacher-swiper-wrapper').html('')
					$('.teacher-swiper-wrapper').append(html)
					hotTeacherSwiperInit()
				}
			})
	}
	
	//获取倒计时
	async function getCountDown(){
		await all.jqPromiseAjax({
				url:api_url + 'app/get_countdown_dom',
				type:'POST',
				data : {
					app_class:'web',
					user_token:window.token,
				},
			}).then(res=>{
				if(res.state===0){
					$('.teacher-content').html('')
				}else{
					$('.show-imp-sub-body').html(res.content)	
				}
			})
	}
	//获取新闻分类
	async function getNewsType(){
		await all.jqPromiseAjax({
				url: api_url+"app/list_news_class" ,
				type:'POST',
				data :{
					app_class:'web',
					user_token:window.token
				},
			}).then(res=>{
				if(res.state===0){
				}else{
					$.isArray(res.content)&&res.content.forEach((item,index)=>{
						 if(item.class_name=='头条'){
							getTopNews(item.news_class_id,item.class_name)
						}
					})
				}
			})
	}
	//获取头条新闻
	async function getTopNews(id,class_name){
		await all.jqPromiseAjax({
				url: api_url+"app/list_news" ,
				type:'POST',
				data :{
					app_class:'web',
					user_token:window.token,
					news_class_id:id
				},
			}).then(res=>{
				if(res.state===0){
				}else{
					if($.isArray(res.content)&&res.content.length!=0){
						let html = `
						<a href="./detail/detail-information.php?nav=information&news_info_id=${res.content[0].news_info_id}" target="_blank">
							<div class="news-title-ok select-none">今日头条<i class="fa fa-volume-up fa-left-padding"></i></div>
							<div class="news-title-show">${res.content[0].title}</div>
							<div class="clear"></div>
						</a>`
						$('.top-news-one').append(html)
					}
				}
			})
	}
	
	//首页报名
	$('.zixun-btn').click(function(){
		window.open(window.kf53)
	})
	$('.baoming-btn').click(function(){
		let name = $('.baoming-name').val()
		let phone = $('.baoming-tel').val()
		if(name==''||name==null||name.length==0){
			all.notification({
				type:'error',
				text:'请填写您的姓名',
				timeout:3000
			})
			return false;
		}else if(phone==''||phone==null||phone.length==0){
			all.notification({
				type:'error',
				text:'请填写您的联系电话',
				timeout:3000
			})
			return false;
		}else{
			let isPhone = /^1(3|4|5|6|7|8|9)\d{9}$/;
			if(!isPhone.test(phone)){
				all.notification({
					type:'error',
					text:'对不起，您的手机号格式不正确，请检查',
					timeout:3000
				})
				return false;
			}else{
				all.jqPromiseAjax({
						url:api_url+"app/user_phone_order",//ajax请求url
						type:'POST',
						data:{
							app_class:'web',
							user_token:window.token,
							resource:'pc_baoming',
							user_info:name+"#@首页报名",
							user_phone:phone
						},//ajax请求参数
					}).then(res=>{
						if(res.state==1){
							let params={
								type:'success',
								text:'恭喜您，报名成功',
								timeout:2000
							}
							all.message(params)	
						}
					})
			}
		}
	})
	
function lazyLoad(){
		// 获取window的引用:
		    var $window = $(window);
		    // 获取包含data-src属性的img，并以jQuery对象存入数组:
		    var lazyImgs = $.map($('img[data-src]').get(), function (i) {
		        return $(i);
		    });
			// console.log($('img[data-src]').get())
		    // 定义事件函数:
		    var onScroll = function() {
		        // 获取页面滚动的高度:  scrollTop()获取匹配元素相对滚动条顶部的偏移。
		        var wtop = $window.scrollTop();//页面滚动的高度就是窗口顶部与文档顶部之间的距离，也就是滚动条滚动的距离
		        // 判断是否还有未加载的img:
		        if (lazyImgs.length > 0) {
		            // 获取可视区域高度:
		            var wheight = $window.height();
					// console.log('wheight'+wheight)
		            // 存放待删除的索引:
		            var loadedIndex = [];
		            // 循环处理数组的每个img元素:
		            $.each(lazyImgs, function ( index,$i) {
		                // 判断是否在可视范围内:
		                if ($i.offset().top - wtop < wheight) {  //$.offset().top获取匹配元素距离文本文档顶的距离。
		                    // 设置src属性:
		                    $i.attr('src', $i.attr('data-src'));
		                    // 添加到待删除数组:
		                    loadedIndex.unshift(index);//从大到小排序，保证下边删除操作能顺利进行
		                }
		            });
		            // 删除已处理的对象:
					if(loadedIndex.length===lazyImgs.length){
						$.each(loadedIndex, function (index) {
						    lazyImgs.splice(index, 1);
						});
					}
		        }
		    };
		    // 绑定事件:
		    $window.scroll(onScroll);
		    // 手动触发一次:
		    onScroll();
	}
	
	// //走进文都 - 顶部 - 获取热门新闻
	// async function getHotNews(){
	// 	await all.jqPromiseAjax({
	// 		url: api_url+"app/hot_news" ,
	// 		type:'POST',
	// 		data :{
	// 			app_class:'web',
	// 			user_token:window.token,
	// 			page:1,
	// 			limit:6
	// 		},
	// 	}).then(res=>{
	// 		console.log(res)
	// 		if(res.state===0){
	// 		}else{
	// 			let html = ''
	// 			$.isArray(res.content)&&res.content.forEach((item,index)=>{
	// 				html+=`<div class="wendu-news-li">
	// 				<a href="${web_url}/detail/detail-information.php?nav=information&news_info_id=${item.news_info_id}" target="_blank" title="${item.title}">
	// 				<span class="wendu-news-span">[考研资讯]</span>
	// 				${item.title}
	// 				</a></div>`
	// 			})
	// 			$('.top1').append(html)
	// 		}
	// 	})
	// }
	//走进文都 - 顶部 - 获取热门新闻
	async function getHotNews(id){
		await all.jqPromiseAjax({
			url: api_url+"app/list_news" ,
			type:'POST',
			data :{
				app_class:'web',
				user_token:window.token,
				news_class_id:id,
				page:1,
				limit:6
			},
		}).then(res=>{
			console.log(res)
			if(res.state===0){
			}else{
				let html = ''
				$.isArray(res.content)&&res.content.forEach((item,index)=>{
					html+=`<div class="wendu-news-li">
					<a href="${web_url}/detail/detail-information.php?nav=information&news_info_id=${item.news_info_id}" target="_blank" title="${item.title}">
					<span class="wendu-news-span">[关于文都]</span>
					${item.title}
					</a></div>`
				})
				$('.top1').append(html)
			}
		})
	}
	
	//走进文都 - 中部 - 切换
	$('.top2-tab-item').click(function(index){
		let top2_tab_item_index = all.getItemDataAttr($(this),'index')
		$(this).addClass('active').siblings().removeClass('active')
		$($('.top2-body')[top2_tab_item_index]).addClass('active').siblings().removeClass('active')
	})
	//走进文都 - 底部 - 切换 - 4个模块
	$('.top3-item-tab-item').click(function(index){
		let top2_tab_item_index = all.getItemDataAttr($(this),'index')
		$(this).parent().children().removeClass('active')
		$(this).addClass('active')
		$($('.top3-body')[top2_tab_item_index]).addClass('active').siblings().removeClass('active')
		console.log($('.top3-body'))
		
	})
	//文都课程模块 - 右侧- 切换
	$('.kc-new-right-tag-item').click(function(index){
		let top2_tab_item_index = all.getItemDataAttr($(this),'index')
		$(this).addClass('active').siblings().removeClass('active')
		$($('.kc-new-right-body')[top2_tab_item_index]).addClass('active').siblings().removeClass('active')
	})
	// 文都课程模块 - 中部 切换
	$('.kc-center-tag').click(function(index){
		let top2_tab_item_index = all.getItemDataAttr($(this),'index')
		$(this).addClass('active').siblings().removeClass('active')
		$($('.kc-center-item-body')[top2_tab_item_index]).addClass('active').siblings().removeClass('active')
	})
	//获取新闻列表 - 通过 id
	async function getNewsList_top2(id,dom,tag){
		
		await all.jqPromiseAjax({
			url: api_url+"app/list_news" ,
			type:'POST',
			data :{
				app_class:'web',
				user_token:window.token,
				news_class_id:id,
				page:1,
				limit:8
			},
		}).then(res=>{
			if(res.state===0){
			}else{
				
				let html = ''
				$.isArray(res.content)&&res.content.forEach((item,index)=>{
					html += `<div class="wendu-news-li">
					<a href="${web_url}/detail/detail-information.php?nav=information&news_info_id=${item.news_info_id}" target="_blank" title="文都资讯">
					<span class="wendu-news-span">${tag} |</span>
					${item.title}</a>
					</div>`
				})
				dom.html('')
				dom.append(html)
			}
		})
	}
	async function getNewsList_top3(id,dom,limit=4){
		
		await all.jqPromiseAjax({
			url: api_url+"app/list_news" ,
			type:'POST',
			data :{
				app_class:'web',
				user_token:window.token,
				news_class_id:id,
				page:1,
				limit:limit
			},
		}).then(res=>{
			if(res.state===0){
			}else{
				let html = ''
				$.isArray(res.content)&&res.content.forEach((item,index)=>{
					html +=`<a href="${web_url}/detail/detail-information.php?nav=information&news_info_id=${item.news_info_id}" 
					class="top3-body-li" 
					target="_blank" 
					title="${item.title}">${item.title}</a>`
				})
				dom.html('')
				dom.append(html)
			}
		})
	}
	async function getFile_list(id,dom){
		await all.jqPromiseAjax({
			url: api_url+"app/list_file" ,
			type:'POST',
			data :{
				app_class:'web',
				user_token:window.token,
				file_upload_id:'all',
				file_tag_id:id,
				page:1,
				limit:4
			},
		}).then(res=>{
			if(res.state===0){
			}else{
				let html = ''
				$.isArray(res.content)&&res.content.forEach((item,index)=>{
					html +=`<a href="${web_url}/detail/detail-download.php?nav=download&file_upload_id=${item.file_upload_id}" 
					class="top3-body-li" 
					target="_blank" 
					title="${item.file_zh_name}">${item.file_zh_name}</a>`
				})
				dom.html('')
				dom.append(html)
			}
		})
	}
	
	//获取热门下载
	async function getHotFile(){
		await all.jqPromiseAjax({
			url: api_url+"app/hot_file" ,
			type:'POST',
			data :{
				app_class:'web',
				user_token:window.token,
				page:1,
				limit:20
			},
		}).then(res=>{
			if(res.state===0){
			}else{
				let html = ''
				$.isArray(res.content)&&res.content.forEach((item,index)=>{
					html += `<a href="${web_url}/detail/detail-download.php?nav=download&file_upload_id=${item.file_upload_id}" class="download-item" target="_blank" title="${item.file_zh_name}">
							<i class="fa fa-file-pdf-o"></i>
							<span class="download-item-center">${item.file_zh_name}</span>
							<i class="fa fa-download"></i>
						</a>`
				})
				$('.new-wendu-download-body').html('')
				$('.new-wendu-download-body').append(html)
			}
		})
	}
	//走进文都 - 左侧- banner
	async function get_news_left_banner(){
		await all.jqPromiseAjax({
				url:api_url + 'app/get_array_cover_img',
				type:'POST',
				data:{
					app_class:'web',
					user_token:window.token,
					key:'news_slider',
				},//ajax请求参数
			}).then(res=>{
				if(res.state===0){
				}else{
					let html = ''
					$.isArray(res.content)&&res.content.forEach((item,index)=>{
						let img_url = all.changeImgUrlForclear(item.img,"x4")
						html += `<div class="swiper-slide swiper-slide-zoujin" title="文都banner">
							<a href="${item.jump}" target="_blank">
								<img data-src="${img_url}"  data-img_name="home-news-left-top1.jpg" title="全年集训营" alt="全年集训营"/>
							</a>
						</div>`
					})
					$('.swiper-wrapper-zoujin').html('');
					$('.swiper-wrapper-zoujin').append(html)
					var swiper_zoujin = new Swiper('.swiper-container-zoujin', {
					    direction: 'vertical',
					    pagination: {
					        el: '.swiper-pagination-zoujin',
					        clickable: true,
						
					    },
					    autoplay: {
					        delay: 3000,
					        disableOnInteraction: false,
					    },
					    loop: true,
					});
				}
			})
	}
	//文都课程 - 左侧- banner
	async function get_news_left_kecheng_banner(){
		await all.jqPromiseAjax({
				url:api_url + 'app/get_array_cover_img',
				type:'POST',
				data:{
					app_class:'web',
					user_token:window.token,
					key:'course_slider',
				},//ajax请求参数
			}).then(res=>{
				if(res.state===0){
				}else{
					let html = ''
					$.isArray(res.content)&&res.content.forEach((item,index)=>{
						let img_url = all.changeImgUrlForclear(item.img,"x4")
						html += `<div class="swiper-slide swiper-slide-kecheng" title="文都banner">
							<a href="${item.jump}" class="" target="_blank" title="文都名师">
								<img data-src="${img_url}" alt="">
							</a>
						</div>`
					})
					$('.swiper-wrapper-kecheng').html('');
					$('.swiper-wrapper-kecheng').append(html)
					var swiper_kecheng = new Swiper('.swiper-container-kecheng', {
					    direction: 'vertical',
					    pagination: {
					        el: '.swiper-pagination-kecheng',
					        clickable: true,
						
					    },
					    autoplay: {
					        delay: 3000,
					        disableOnInteraction: false,
					    },
					    loop: true,
					});
				}
			})
	}
	//获取热门下载
	async function get_list_course(course_class_id,dom){
		await all.jqPromiseAjax({
			url: api_url+"app/list_course" ,
			type:'POST',
			data :{
				app_class:'web',
				user_token:window.token,
				course_id: 'all',
				course_class_id: course_class_id
			},
		}).then(res=>{
			if(res.state===0){
			}else{
				let html = ''
				$.isArray(res.content)&&res.content.forEach((item,index)=>{
					html += `<div class="kc-center-item" >
						<a target="_blank" href="${item.course_ad_url}" title="${item.course_name}">
							<div class="kc-center-item-img">
								<img data-src="${item.course_cover}" alt="${item.course_name}">
							</div>
							<h1 class="kc-center-item-title">${item.course_name}</h1>
							<p class="kc-center-item-title2">${item.course_slogan}</p>
						</a>	
						<div class="kc-center-item-ask">
							<div class="kc-center-item-ask-img">
								<img data-src="${img_url}/static/img/kc-center-item-ask-img.png" alt="">
							</div>
							<a target="_blank" href="${window.kf53}">咨询</a>
						</div>
				</div>`
				})
				dom.html('')
				dom.append(html)
			}
		})
	}
	
	//获取热门问答
	async function getHotAsk(dom,limit){
		await all.jqPromiseAjax({
			url: api_url+"app/hot_ask_question" ,
			type:'POST',
			data :{
				app_class:'web',
				user_token:window.token,
				page:1,
				limit:limit	
			},
		}).then(res=>{
			if(res.state===0){
			}else{
				let content = res.content
				let html = ''
				$.isArray(res.content)&&res.content.forEach((item,index)=>{
					html +=`<a href="${web_url}/detail/detail-community.php?nav=ask&ask_question_id=${item.ask_question_id}" 
					class="top3-body-li" target="_blank" title="${item.ask_title}">${item.ask_title}</a>`
				})
				dom.html('')
				dom.append(html)	
			}
		})
	}