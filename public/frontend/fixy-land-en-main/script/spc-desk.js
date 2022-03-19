// JavaScript Document



//		swipper-start
		var swiper = new Swiper(".mySwiper", {
        slidesPerView: "auto",
        spaceBetween: 30,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
//		swipper-end
	




$(document).ready(function(){
	
	
//	swiper menu
	let user_order_list_menu_item = $(".user-order-list-menu-item");
	let swiper_slide = $(".swiper-slide");

	for(let i = 0 ; i < swiper_slide.length ; i++){
		$(swiper_slide[i]).click(function(){	
			for(let j = 0 ; j < swiper_slide.length ; j++){
				$(user_order_list_menu_item[j]).addClass("d-none");
				$(swiper_slide[j]).removeClass("darkYellow");
			}
			$(user_order_list_menu_item[i]).removeClass("d-none");	
			$(swiper_slide[i]).addClass("darkYellow");	
		})	
	}
	
	

//	پیشنهادات
//	short & long description 
	
	//	more info button
	let more_inf_btn = $(".more_inf_btn");	
	//	go back button
	let back_btn = $(".go-back-btn");
	
	let req_short_dsc = $(".req-short-dsc");
	let req_long_dsc = $(".req-long-dsc");
	
	for(let i=0;i<more_inf_btn.length;i++){
		$(more_inf_btn[i]).click(function(){
			$(req_short_dsc[0]).addClass("d-none");
			$(req_long_dsc[i]).removeClass("d-none");
		});
	}
	
	
	for(let i=0;i<back_btn.length;i++){
		$(back_btn[i]).click(function(){
			$(req_short_dsc[0]).removeClass("d-none");
			$(req_long_dsc[i]).addClass("d-none");
		});
	}
	
	
	
//	در دست اجرا
	//	more info button
	let job_more_inf_btn = $(".job_more_inf_btn");	
	let job_short_dsc = $(".job-short-dsc");
	let job_long_dsc = $(".job-long-dsc");
	
	for(let i=0; i<job_more_inf_btn.length; i++){
		$(job_more_inf_btn[i]).click(function(){
			$(job_short_dsc[0]).addClass("d-none");
			$(job_long_dsc[i]).removeClass("d-none");
		});
	}
	
	
	
//	 صفحه اتمام کار توسط متخصص
	let paying_btn = $("#paying_btn");
	let running_job = $("#running_job");
	let spc_req_money = $("#spc_req_money");
	$(paying_btn).click(function(){
		$(running_job).addClass("d-none");
		$(spc_req_money).removeClass("d-none");
	});
	
	
	
})




