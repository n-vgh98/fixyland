// JavaScript Document

$(document).ready(function(){
	$("#more-box-btn").click(function(){
		$("#more_box").toggleClass("d-none");
		if($("#more_box").hasClass("d-none")){
			$("#more-box-btn").html("<i class='fa-solid fa-plus'></i> more box");
		}else{
			$("#more-box-btn").html(" <i class='fa-solid fa-minus mt-2 me-1'></i> less box");
		}
	})

 });