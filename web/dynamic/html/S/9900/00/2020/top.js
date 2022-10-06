'use strict';


//h1タグからそのしたのhidden divを表示
$(document).ready(function() {
	$('h1').on("click", function() {
		$(this).next().toggleClass("hidden");
	});
});



$(document).ready(function() {
	$('.select').on("click", function() {
		$(this).next().toggleClass("hidden");
	});
});
























