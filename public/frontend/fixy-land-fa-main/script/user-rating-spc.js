

//change bg color on select
$(document).ready(function(){
	let problem_box = $(".problem_box");
	let selected_box = $(".problem_box input")

	for(let i=0; i<selected_box.length;i++){
		$(selected_box[i]).click(function(){
			$(problem_box[i]).toggleClass("rating-btn-bg-green");
		})
	}
	
	
//change divs on rating	
let stars = $("#images img");
let forms = $(".forms-based-on-star");

for(let i=0; i< stars.length; i++){
	$(stars[i]).click(function(){

		for(let j=0; j<stars.length; j++){
			$(stars[j]).attr("src", "image/gray-star.png");
			$(forms[j]).addClass("d-none");
		}

		$(forms[i]).removeClass("d-none");
		
		switch(i) {
			case 4:
				for(let k=i; k<stars.length; k++){
					$(stars[k]).attr("src", "image/yellow-star.png");
				}
				
				break;
			case 3:
				for(let k=i; k<stars.length; k++){
					$(stars[k]).attr("src", "image/yellow-star.png");
				}
//				$(forms[i]).removeClass("d-none");
				break;
			case 2:
				for(let k=i; k<stars.length; k++){
					$(stars[k]).attr("src", "image/yellow-star.png");
				}
//				$(forms[i]).removeClass("d-none");
				break;
			case 1:
				for(let k=i; k<stars.length; k++){
					$(stars[k]).attr("src", "image/yellow-star.png");
				}
//				$(forms[i]).removeClass("d-none");
				break;
			case 0:
				for(let k=i; k<stars.length; k++){
					$(stars[k]).attr("src", "image/yellow-star.png");
				}
//				$(forms[i]).removeClass("d-none");
				break;
		}
	})
}

	
	
	
	
	
	
	
	
	
	
	
})