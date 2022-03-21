// JavaScript Document


$(document).ready(function(){
	
	
//		change cities based on states
		let state = $("#state-register-customer");
		let cities = $(".cities");
		$(state).change(function(){
			let selected_state = $(this).children(":selected").attr("id");
			for(let i=0 ; i< cities.length ; i++){
				$(cities[i]).addClass("d-none");
				if((selected_state) == "state_" +i ){
					$(cities[i]).removeClass("d-none");
				}
			}	
		})	



	
})