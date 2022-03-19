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
		
		let form_control_register_specialist_div = $(".form-control-register-specialist-div div div");
		let form_control_register_specialist_div2 = $(".form-control-register-specialist-div2");
		let form_control_register_specialist_main = $(".form-control-register-specialist-div");
        let categories_input = $(".categories-input");

	$(document).ready(function(){

		let dastrasi_sari_grid = $(".dastrasi-sari-grid");
		let swiper_slide = $(".swiper-slide");
		


		for(let i = 0 ; i < swiper_slide.length ; i++){
			$(swiper_slide[i]).click(function(){	
				for(let j = 0 ; j < swiper_slide.length ; j++){
					$(dastrasi_sari_grid[j]).addClass("d-none");
					
                    $(swiper_slide[j]).removeClass("darkYellow");
				
				}
				$(dastrasi_sari_grid[i]).removeClass("d-none");	
                $(swiper_slide[i]).addClass("darkYellow");

			})	
		}
		
		
		
		
		
		
		for(let i = 0 ; i < form_control_register_specialist_div.length ; i++){
			$(form_control_register_specialist_div[i]).click( function(){
			 for(let j = 0 ; j < form_control_register_specialist_div2.length ; j++){
				 $(form_control_register_specialist_div2[j]).addClass("d-none");
			 }
				$(form_control_register_specialist_div2[i]).removeClass("d-none");
				$(form_control_register_specialist_main[0]).addClass("d-none");
		})
			
			
		}
		
//		for(let i = 0 ; i < categories_input.length ; i++){
//			
//			if($(categories_input[i]).prop('checked', true))
//			 // Checks it
//            $('#myCheckbox').prop('checked', false); // Unchecks it
//			
//			
//		}

		
		
		
		
//		change cities based on states
		let state = $("#state-register-specialist");
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
		
//		change work cities based on states		
		let work_state = $("#work_state-register-specialist");
		let work_cities = $(".work_cities");
		$(work_state).change(function(){
			let work_select_value = $(work_state).val();
			for(let i=0 ; i< work_cities.length ; i++){
				$(work_cities[i]).addClass("d-none");
				if((work_select_value) == i ){
					$(work_cities[i]).removeClass("d-none");
				}
			}	
		})
		
		
		

	});



		   function backToCategories() {
			   	$(document).ready(function(){
            for(let j = 0 ; j < form_control_register_specialist_div2.length ; j++){
				 $(form_control_register_specialist_div2[j]).addClass("d-none");
				
			 }
			$(form_control_register_specialist_main[0]).removeClass("d-none");
				});
            }
	
   
           function goInputDemo() {
			   	$(document).ready(function(){
                $("#input-demo1").toggleClass("d-none");
				$("#input-demo2").toggleClass("d-none");
					});
            }

			 function goInputDoc() {
			   	$(document).ready(function(){
                $("#input-doc1").toggleClass("d-none");
				$("#input-doc2").toggleClass("d-none");
					});
            }					  
		
   

//$('#myCheckbox').prop('checked', true); // Checks it
//$('#myCheckbox').prop('checked', false); // Unchecks it






