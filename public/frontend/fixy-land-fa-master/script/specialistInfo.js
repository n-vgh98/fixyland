// JavaScript Document


$(document).ready(function(){
	$("#more-cm-btn").click(function(){
		$("#all-comments").toggleClass("d-none");
		if($("#all-comments").hasClass("d-none")){
			$("#more-cm-btn").html("مشاهده بیشتر <i class='fa-solid fa-plus'></i>");
		}else{
			$("#more-cm-btn").html("مشاهده کمتر <i class='fa-solid fa-minus'></i>");
		}
	})

 });

		