
'use strict';

// h1タグからそのしたのhidden divを表示
$(document).ready(function() {
	$('.hide_show').on("click", function() {
		$(this).next().toggleClass("hidden");
	});
});



// swotの簡単なプログラム
$('#environment, #plus_or_minus').change (function() {
	let en = $('#environment').val();
	let pm = $('#plus_or_minus').val();

	if (en == 1) {
		if (pm == 1) {
			$('#swot_spot').text("機会");
		} else if (pm == 2) {
			$('#swot_spot').text("脅威");
		}
	} else if (en == 2) {
		if (pm == 1) {
			$('#swot_spot').text("強み");
		} else if (pm == 2) {
			$('#swot_spot').text("弱み");
		}
	} else {
		$('#swot_spot').text("");
	}
})



