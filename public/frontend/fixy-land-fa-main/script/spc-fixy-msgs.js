// JavaScript Document


$(document).ready(function () {
	let spc_msg_box1 = $(".spc-msg-box1");
	let spc_msg_box2 = $(".spc-msg-box2");

	for (let i = 0; i < spc_msg_box2.length; i++) {
		$(spc_msg_box2[i]).slideUp("fast");
	}


	for (let i = 0; i < spc_msg_box1.length; i++) {
		$(spc_msg_box1[i]).click(function () {
			$(spc_msg_box2[i]).slideToggle("fast");
		})
	}

});