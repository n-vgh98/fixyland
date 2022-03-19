// JavaScript Document


$(document).ready(function(){
	
//menu items selection on hover
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
	
	
	
//custom or automatic time selection
	$("select.aut-time-pick").change(function(){
		var selected_option = $(this).children("option:selected").val();
		if(selected_option == "custom"){
			$("#time-picker").removeClass("d-none");
		}else{$("#time-picker").addClass("d-none");}
	});
	
		
	
	
//	custom or automatic addrs selection	
	$(".saved_addr input[name=addr-radio]").change(function(){
		var selected_option = $('input[name=addr-radio]:checked').val()
		if(selected_option == "custom"){
			$("#add_new_addrs").removeClass("d-none");
		}else{$("#add_new_addrs").addClass("d-none");}
	});


})


//	upload picture
	var output_img = document.getElementById('output_img');
	output_img.classList.add("d-none");
	var remove_img_btn = document.getElementById('remove_img');
	remove_img_btn.classList.add("d-none");

	var loadFile = function(event) {
		output_img.src = URL.createObjectURL(event.target.files[0]);
		output_img.classList.remove("d-none");
		remove_img_btn.classList.remove("d-none");
		// free memory
		output_img.onload = function() {
			URL.revokeObjectURL(output_img.src) 
		}
	};

	function remove_picture(){
		output_img.src = "";
		remove_img_btn.classList.add("d-none");
		output_img.classList.add("d-none");
	}