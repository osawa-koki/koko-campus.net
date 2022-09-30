
'use strict';

//h1タグからそのしたのhidden divを表示
$(document).ready(function() {
	$('.hide_show').on("click", function() {
		$(this).next().toggleClass("hidden");
	});
});


$(document).ready(function() {
	$('#plan0').on("click", function() {
		reset_plan();
		document.getElementById("plan_show").textContent = "外部から見える部分の設計(操作画面・操作方法等)を行います。";
		document.getElementById("plan0").style.color = "red";
	})
})

$(document).ready(function() {
	$('#plan1').on("click", function() {
		reset_plan();
		document.getElementById("plan_show").textContent = "内部(論理データ)の設計を行います。";
		document.getElementById("plan1").style.color = "red";
	})
})

$(document).ready(function() {
	$('#plan2').on("click", function() {
		reset_plan();
		document.getElementById("plan_show").textContent = "実際に処理を行う関数やプログラムの設計を行います。";
		document.getElementById("plan2").style.color = "red";
	})
})

$(document).ready(function() {
	$('#plan3').on("click", function() {
		reset_plan();
		document.getElementById("plan_show").textContent = "実際にプログラムを書いていきます。(コーディング/プログラミング)";
		document.getElementById("plan3").style.color = "red";
	})
})

function reset_plan() {
	document.getElementById("plan0").style.color = "black";
	document.getElementById("plan1").style.color = "black";
	document.getElementById("plan2").style.color = "black";
	document.getElementById("plan3").style.color = "black";
}




























