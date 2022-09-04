
'use strict';

//h1タグからそのしたのhidden divを表示
$(document).ready(function() {
	$('.hide_show').on("click", function() {
		$(this).next().toggleClass("hidden");
	});
});

$(function(){
	$('#gps').on("click", function(){
		navigator.geolocation.getCurrentPosition(gps_success, gps_fail);
	})
})

function gps_success(position) {
	let lat = position.coords.latitude;
	let lon = position.coords.longitude;
	document.getElementById("lat").textContent = lat;
	document.getElementById("lon").textContent = lon;
}

function gps_fail() {
	document.getElementById("gpa_fail").textContent = "位置情報の取得に失敗しました。";
}




