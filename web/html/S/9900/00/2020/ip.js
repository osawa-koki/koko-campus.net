

$(document).ready(function() {
	$('#menu_img').on("click", function() {
		$("#navigator").toggleClass("nav_hidden");
	});
});

$(document).ready(function() {
	$('.select').on("click", function() {
		$(this).next().toggleClass("hidden");
	});
});