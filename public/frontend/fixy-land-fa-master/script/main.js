// JavaScript Document


//---------------------------------------header scripts----------------------------------------------
	
//		Hide Menu on Scroll down
		let prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
        let currentScrollPos = window.pageYOffset;
          if (prevScrollpos > currentScrollPos) {
            document.getElementById("header").style.top = "0";
          } else {
            document.getElementById("header").style.top = "-200px";
          }
          prevScrollpos = currentScrollPos;
        }
		
		

		$(document).ready(function(){		
//			daste-bandi-khadamat menu hidden and visible on mobile & tablet size (on click)
			$("#khadamat-p").click(function(){
				if ($(window).width() < 992){
					$("#sub-menu-responsive").toggleClass("d-none");
				}
			});
			
			
//			daste-bandi-khadamat menu hidden and visible on laptop size (on hover)
			$("#khadamat").hover(function(){
				if ($(window).width() > 992){
					$("#second-level-menu").toggleClass("d-none");
				}	
			});
			
			
//			daste-bandi-khadamat menu DiV visible on hover on laptop size
			$("#second-level-menu").hover(function(){
				$("#second-level-menu").toggleClass("d-none");
			});
			
			
			
//			submenu for each daste-bandi-khadamat menu items on tablet & mobile size (on click)
			let li_responsive_3 = $(".li-responsive-3");
			let li_responsive_submenu_3 = $(".li-responsive-submenu-3");
			for(let i = 0 ; i < li_responsive_3.length ; i++ ){
				$(li_responsive_3[i]).click(function(){
					$(li_responsive_submenu_3[i]).toggleClass("d-none");
				});
			}
			
	
			
//			submenu for each daste-bandi-khadamat menu items on laptop size (on hover)
			let sub_menu_1_li = $(".sub-menu-1-li");
			let sub_menu_show = $(".sub-menu-show");
			
			for(let i = 0 ; i < sub_menu_1_li.length ; i++){
				$(sub_menu_1_li[i]).hover(function(){
					$(sub_menu_show[i]).toggleClass("d-none");
					$(sub_menu_1_li[i]).toggleClass("sub-menu-hover-li");
				
				})	
				$(sub_menu_show[i]).hover(function(){
					$(sub_menu_show[i]).toggleClass("d-none");	
					$(sub_menu_1_li[i]).toggleClass("sub-menu-hover-li");
				});	
				

			}
			
			
			
//			submenu for each daste-bandi-khadamat menu items on laptop size (on click)			
			for(let i = 0 ; i < sub_menu_1_li.length ; i++){
			$(sub_menu_1_li[i]).click(function(){
			 	for(let j = 0 ; j < sub_menu_1_li.length ; j++){
					$(sub_menu_show[j]).addClass("d-none");
				}
				$(sub_menu_show[i]).removeClass("d-none");	
			})	
            }				
	
			
			
//			toggle carrot icon next to menus
			let li_responsive = $(".li-responsive");
			li_respan = true;	
			li_responsive.each(function(){
				$(this).click(function(){
				 $(this).find("i").toggleClass("li-responsive-toggle");
				 $(this).removeClass("nav-link-hover-white")
				 $(this).toggleClass("nav-link-hover-white2"); 
				})
			 })
					
			
			
//			Hamburger and Xmark icon toggle on tablet & mobile size
			$("#i-menu").click(function(){
					$("#i-menu").toggleClass("d-none");
				    $("#i-menu2").toggleClass("d-none");
			});

			$("#i-menu2").click(function(){
					$("#i-menu").toggleClass("d-none");
				    $("#i-menu2").toggleClass("d-none");
			});
			

//			change language
			let select_lang_div = $("#select_lang_div");
			let langs_div = $("#langs_div");
			$(select_lang_div).click(function(){
				$(langs_div).toggleClass("d-none");
			});
			
			$(select_lang_div).mouseover(function(){
				$(langs_div).removeClass("d-none");
			});
			$(select_lang_div).mouseout(function(){
				$(langs_div).addClass("d-none");
			});
			
			
			
		})

		
	



	
	
//--------------------------------------footer scripts---------------------------------------	
		$(document).ready(function(){
			let footer_list_title_i = $(".footer-list-title i");
			let footer_list = $(".footer-list");
			for(let i = 0 ; i < footer_list_title_i.length ; i++){
				$(footer_list_title_i[i]).click(function(){
					$(footer_list[i]).toggleClass("d-none");		
				})
				}
		})











