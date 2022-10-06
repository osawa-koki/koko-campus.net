
'use strict';

//h1タグからそのしたのhidden divを表示
$(document).ready(function() {
	$('.hide_show').on("click", function() {
		$(this).next().toggleClass("hidden");
	});
});





let timer;
let x_lock_pert = 1;

$(function(){
	$('#start').on("click", function(){
		if (x_lock_pert == 1) {
			x_lock_pert = 0;
			let class_arrow = document.getElementsByClassName("arrow_after");
			for (let i = 0; i < class_arrow.length - 1; i++) {
			let id = class_arrow[i].style.height = "0px";
			}
			document.getElementById("arrow_after6").style.width = "0px";

			let class_name = document.getElementsByClassName("arrow_before");
			for (let i = 0; i < class_name.length; i++) {
			let id = class_name[i].classList.add("hidden");
			}
			let class_time = document.getElementsByClassName("time_class");
			for (let i = 0; i < class_time.length; i++) {
			let id = class_time[i].classList.add("hidden");
			}
			setTimeout(arrow0, 300);
		}
	})
})

function arrow0() {
	timer_func();
	$("#arrow_after0").animate({height: "120px"}, 3000, "linear", arrow12);
}


function arrow12() {
	$("#arrow_after1").animate({height: "150px"}, 4000, "linear", arrow3);
	$("#arrow_after2").animate({height: "150px"}, 2000, "linear", arrow46);
}


function arrow46() {
	$("#arrow_after6").animate({width: "160px"}, 0, "linear");
	$("#arrow_after4").animate({height: "150px"}, 6000, "linear", arrow5);
}


function arrow3() {
	$("#arrow_after3").animate({height: "150px"}, 3000, "linear");
}




function arrow5() {
	$("#arrow_after5").animate({height: "120px"}, 2000, "linear", arrow_finished);
}


function arrow_finished() {
	clearInterval(timer);
	let class_time = document.getElementsByClassName("time_class");
	for (let i = 0; i < class_time.length; i++) {
	let id = class_time[i].classList.remove("hidden");
	}
	countup = 0;
	x_lock_pert = 1;
	document.getElementById("after_pert").classList.remove("hidden");
}



function timer_func() {
	timer = setInterval(show_timer, 100);
}



let countup = 0;
function show_timer() {
	countup = parseFloat(countup) + 1;
	countup = Math.round(countup);
	let cp = countup / 10;
	cp = cp + "秒";
	$("#timer").text(cp);
}















