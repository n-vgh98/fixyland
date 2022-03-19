// JavaScript Document


$(document).ready(function(){
	
	
//		change cities based on states
		let state = $("#state-register-customer");
		let cities = $(".cities");
		$(state).change(function(){
			let select_value = $(state).val();
			for(let i=0 ; i< cities.length ; i++){
				$(cities[i]).addClass("d-none");
				if((select_value) == i ){
					$(cities[i]).removeClass("d-none");
				}
			}	
		})	



	
})