// JavaScript Document


$(document).ready(function(){
	$("#more-cm-btn").click(function(){
		$("#all-comments").toggleClass("d-none");
		if($("#all-comments").hasClass("d-none")){
			$("#more-cm-btn").html(" <i class='fa-solid fa-plus'></i> more comments");
		}else{
			$("#more-cm-btn").html("<i class='fa-solid fa-minus'></i> less coments");
		}
	})

 });

		