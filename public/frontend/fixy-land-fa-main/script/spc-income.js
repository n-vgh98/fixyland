// JavaScript Document

$(document).ready(function(){
	$("#more-box-btn").click(function(){
		$("#more_box").toggleClass("d-none");
		if($("#more_box").hasClass("d-none")){
			$("#more-box-btn").html("مشاهده بیشتر <i class='fa-solid fa-plus'></i>");
		}else{
			$("#more-box-btn").html("مشاهده کمتر <i class='fa-solid fa-minus'></i>");
		}
	})

 });