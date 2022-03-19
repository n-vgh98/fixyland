// JavaScript Document


// select and crop profile picture
var resize = $('#upload-demo').croppie({
	enableExif: true,
	enableOrientation: true,    
	viewport: { 
		width: 150,
		height: 150,
		type: 'square' //square
	},
	boundary: {
		width: 200,
		height: 200
	}
});


$('#image').on('change', function () { 
  var reader = new FileReader();
	reader.onload = function (e) {
	  resize.croppie('bind',{
		url: e.target.result
	  }).then(function(){
		console.log('jQuery bind complete');
	  });
	}
	reader.readAsDataURL(this.files[0]);
});


$('.btn-upload-image').on('click', function (ev) {
  resize.croppie('result', {
	type: 'canvas',
	size: 'viewport'
  }).then(function (img) {
	$.ajax({
	  url: "croppie.php",
	  type: "POST",
	  data: {"image":img},
	  success: function (data) {
		html = '<img src="' + img + '" />';
		$("#preview-crop-image").html(html);
	  }
	});
  });
});



//	copy website link to share 
let share_btn = document.getElementById("share_btn");
let copy_btn = document.getElementById("copy_link_btn");
share_btn.onclick = function(){
	copy_btn.innerText = "copy";	
};
copy_btn.onclick = function(){
	var r = document.createRange();
	r.selectNode(document.getElementById("web_link"));
	window.getSelection().removeAllRanges();
	window.getSelection().addRange(r);
	document.execCommand('copy');
	window.getSelection().removeAllRanges();
	copy_btn.innerText  = "copied";	
};