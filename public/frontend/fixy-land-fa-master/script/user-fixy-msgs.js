// JavaScript Document



//		copy input value to clipboard	
let copyText = document.getElementsByClassName("discount_input");
let btn_clicked = document.getElementsByClassName("discount_btn");

for(let i=0;i< btn_clicked.length ; i++){
	btn_clicked[i].onclick = function(){
		copyText[i].select();
		copyText[i].setSelectionRange(0, 99999);
		navigator.clipboard.writeText(copyText[i].value);
		alert("copied to clipboard!")	
	};		
}