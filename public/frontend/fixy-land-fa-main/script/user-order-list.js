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



$(document).ready(function () {

    //	change divs based on swipper menu
    let user_order_list_menu_item = $(".user-order-list-menu-item");
    let swiper_slide = $(".swiper-slide");
    for (let i = 0; i < swiper_slide.length; i++) {
        $(swiper_slide[i]).click(function () {
            for (let j = 0; j < swiper_slide.length; j++) {
                $(user_order_list_menu_item[j]).addClass("d-none");
                $(swiper_slide[j]).removeClass("darkYellow");
            }
            $(user_order_list_menu_item[i]).removeClass("d-none");
            $(swiper_slide[i]).addClass("darkYellow");
        })
    }



    //	toggle running-job page and user-payment page
    let running_job = $("#running_job");
    let user_payment = $(".user_payment");
    let paying_btn = $(".paying_btn");
    let runing_job_back = $(".runing-job-back");
    for (let i = 0; i < paying_btn.length; i++) {
        let paying_btn_id = $("#paying_btn" + [i]);
        $(paying_btn_id).click(function () {
            $(running_job).addClass("d-none");
            $(user_payment[i]).removeClass("d-none");
        });
    }

    for (let i = 0; i < runing_job_back.length; i++) {
        $(runing_job_back).click(function () {
            $(running_job).removeClass("d-none");
            $(user_payment[i]).addClass("d-none");
        });
    }





    //	check if checkbox is checked - toggle button



    //	alert if checkbox is not checked
  


})



