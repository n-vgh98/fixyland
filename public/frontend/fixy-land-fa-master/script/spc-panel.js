
//toggle menu item
$(document).ready(function(){
	let Financial_list = $(".Financial-list");
	let Financial_sec = $("#Financial-sec");
	let angle_down = $("#angle-down");

	$(Financial_sec).click(function(){
		$(Financial_list[0]).toggleClass("d-none");
		$(angle_down).toggleClass("fa-angle-up");
	})


})
