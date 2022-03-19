// JavaScript Document

 var input = document.querySelector("#phone");
	window.intlTelInput(input, {
		separateDialCode: true,
		excludeCountries: ["in", "il"],
		preferredCountries: ["om", "jp", "pk", "no"]
});
