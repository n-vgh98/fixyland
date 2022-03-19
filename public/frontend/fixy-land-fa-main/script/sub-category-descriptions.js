// JavaScript Document


$(document).ready(function(){
	let sub_menu_hover2 = $(".sub-menu-hover2");
	let sub_menu_hover2_div = $(".sub-menu-hover2 div");
	let details = $(".details");

	for(let i = 0 ; i < sub_menu_hover2.length ; i++){
		$(sub_menu_hover2[i]).click(function(){	
			for(let j = 0 ; j < sub_menu_hover2.length ; j++){
				$(details[j]).addClass("d-none");
				$(sub_menu_hover2_div[j]).removeClass("darkYellow");
			}
			$(details[i]).removeClass("d-none");	
			$(sub_menu_hover2_div[i]).addClass("darkYellow");	

		})	
	}


})