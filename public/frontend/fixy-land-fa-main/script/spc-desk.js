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
	let more_inf_btn_id = $("#more_inf_btn"+[i]);
	$(more_inf_btn_id).click(function(){
		for(let j=0;j<req_short_dsc.length;j++){
			$(req_short_dsc[j]).addClass("d-none");
		}
		$(req_long_dsc[i]).removeClass("d-none");
	});
}


for(let i=0;i<back_btn.length;i++){
	$(back_btn[i]).click(function(){
		for(let j=0;j<req_short_dsc.length;j++){
			$(req_short_dsc[j]).removeClass("d-none");
		}
		$(req_long_dsc[i]).addClass("d-none");
	});
}


//	پیشنهادات من
//	short & long description 

//	more info button
let mine_more_inf_btn = $(".mine_more_inf_btn");	
//	go back button
let mine_back_btn = $(".mine_go-back-btn");

let mine_req_short_dsc = $(".mine_req-short-dsc");
let mine_req_long_dsc = $(".mine_req-long-dsc");

for(let i=0;i<mine_more_inf_btn.length;i++){
	let mine_more_inf_btn_id = $("#mine_more_inf_btn"+[i]);
	$(mine_more_inf_btn_id).click(function(){
		for(let j=0;j<mine_req_short_dsc.length;j++){
			$(mine_req_short_dsc[j]).addClass("d-none");
		}
		$(mine_req_long_dsc[i]).removeClass("d-none");
	});
}

for(let i=0;i<mine_back_btn.length;i++){
	$(mine_back_btn[i]).click(function(){
		for(let j=0;j<mine_req_short_dsc.length;j++){
			$(mine_req_short_dsc[j]).removeClass("d-none");
		}
		$(mine_req_long_dsc[i]).addClass("d-none");
	});
}	




//	در دست اجرا
//	more info button
let job_more_inf_btn = $(".job_more_inf_btn");	
let job_short_dsc = $(".job-short-dsc");
let job_long_dsc = $(".job-long-dsc");

for(let i=0; i<job_more_inf_btn.length; i++){
	let job_more_inf_btn_id = $("#job_more_inf_btn"+[i]);
	$(job_more_inf_btn_id).click(function(){
		for(let j=0;j<job_short_dsc.length;j++){
			$(job_short_dsc[j]).addClass("d-none");
		}
		$(job_long_dsc[i]).removeClass("d-none");
	});
}


let runing_job_back = $(".runing-job-back");
for(let i=0; i<runing_job_back.length; i++){
	$(runing_job_back[i]).click(function(){
		for(let j=0;j<job_short_dsc.length;j++){
			$(job_short_dsc[j]).removeClass("d-none");
		}
		$(job_long_dsc[i]).addClass("d-none");
	});
}





//	 صفحه اتمام کار توسط متخصص
let paying_btn = $(".paying_btn");
let spc_req_money = $(".spc_req_money");
let running_job = $("#running_job");
//	let job_short_dsc_paying = $(".job-short-dsc");
//	let job_long_dsc_paying = $(".job-long-dsc");
let spc_req_money_back = $(".spc_req_money_back");

for (let i=0 ; i<paying_btn.length; i++){
	let paying_btn_id = $("#paying_btn"+[i]);
	$(paying_btn_id).click(function(){
		$(running_job).addClass("d-none");
		$(spc_req_money[i]).removeClass("d-none");
	});
}

for (let k=0 ; k<spc_req_money_back.length; k++){
	$(spc_req_money_back[k]).click(function(){
		$(running_job).removeClass("d-none");
		$(spc_req_money[k]).addClass("d-none");
	});
}





})




