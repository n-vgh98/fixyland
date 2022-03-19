// JavaScript Document


//------------------------------index-sec3 scripts-----------------------------------

		
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
		
		

	$(document).ready(function(){
		let sub_menu_hover2 = $(".sub-menu-hover2");
		let sub_menu_hover2_div = $(".sub-menu-hover2 div");
		let dastrasi_sari_grid = $(".dastrasi-sari-grid");
		let swiper_slide = $(".swiper-slide");

//		menu items for laptop size	
		for(let i = 0 ; i < sub_menu_hover2.length ; i++){
			$(sub_menu_hover2[i]).click(function(){	
				for(let j = 0 ; j < sub_menu_hover2.length ; j++){
					$(dastrasi_sari_grid[j]).addClass("d-none");
					$(sub_menu_hover2_div[j]).removeClass("darkYellow");
				}
				$(dastrasi_sari_grid[i]).removeClass("d-none");	
				$(sub_menu_hover2_div[i]).addClass("darkYellow");	
			})	
		}
		
		
		
//		menu items for mobile size
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
			
		
		
//		fixed-icon (move to top of the page)
		$(window).scroll(function(){
			if ($(window).scrollTop() > 350){
				$("#index_fixed_icon").removeClass("d-md-none");
				$("#index_fixed_icon").addClass("d-md-block");
			}else{
				$("#index_fixed_icon").removeClass("d-md-block");
				$("#index_fixed_icon").addClass("d-md-none");
			}
		})
		
		

	})
