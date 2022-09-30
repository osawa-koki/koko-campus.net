
'use strict';

//損益分岐分析qの回答表示と見やすく調整(getElementsByClassNameだとうまく動作しなかった、、、なぜだろう???)
document.getElementById("js_show_answer_break_even").onclick = function() {
	document.getElementById("revenue1").style.color = "blue";
	document.getElementById("revenue2").style.color = "blue";
	document.getElementById("revenue3").style.color = "blue";

	document.getElementById("fixed_cost1").style.color = "red";
	document.getElementById("fixed_cost2").style.color = "red";
	document.getElementById("fixed_cost3").style.color = "red";

	document.getElementById("variable_cost1").style.color = "green";
	document.getElementById("variable_cost2").style.color = "green";
	document.getElementById("variable_cost3").style.color = "green";

	document.getElementById("variable_rate1").style.color = "orange";
	document.getElementById("variable_rate2").style.color = "orange";
	document.getElementById("variable_rate3").style.color = "orange";
	document.getElementById("variable_rate4").style.color = "orange";
	document.getElementById("variable_rate5").style.color = "orange";
}


// 管理図を開いて完成させていない場合に発生させるイベントのy座標を獲得するためのグローバル変数
let its_not_completed_trigger;
let where_to_go;
let taught = 0;

let control_show_yesno = 0;
let its_completed0 = 0;
let its_completed1 = 0;


//h1タグからそのしたのhidden divを表示
$(document).ready(function() {
	$('.show_pic').on("click", function() {
		$(this).next().toggleClass("hidden");
		its_not_completed_trigger = $("#its_not_completed_trigger_tag").offset().top;//toggle(hidden)で表示・非表示を変更した場合も新たにトリガー座標を取得する必要あり!
		where_to_go = $("#control_show_yesno").offset().top;
	});
});


$(document).ready(function() {
	$(".histogram_data").on("click", function() {
		$(".histogram_data").css("fill", "#00ffff");
		$(this).css("fill", "blue");
	})
})


$(document).ready(function() {
	$("#control_show_yesno").on("click", function() {
		control_show_yesno = 1;
	})
})





/* xmlの名前空間を宣言していない単純な要素追加は不可
$(document).ready(function() {
	$("#secret0").on("click", function() {
		$("#control_layer1").append('\<path style="opacity:1;fill:#36c685;fill-opacity:1;stroke:#000000;stroke-width:0;stroke-miterlimit:4;stroke-dasharray:none" id="control_show0_0" d="M 470,420 89.737207,419.54483 280.26279,90.455174 Z" transform="matrix(0.01018848,-0.0124815,0.02629089,0.02493329,64.784674,70.034422)" />');
	})
})
*/




$(document).ready(function() {
	$("#secret0").on("click", function() {

		show_secret0();



		/*
		let obj = $("#control_layer1");

		// これはsecret0の吹き出し用(矢印部分)
		let doc_inserted = document.createElementNS('http://www.w3.org/2000/svg', "path");
		doc_inserted.setAttribute("opacity", 1);
		doc_inserted.setAttribute("fill", "#36c685");
		doc_inserted.setAttribute("fill-opacity", 1);
		doc_inserted.setAttribute("stroke", "#000000");
		doc_inserted.setAttribute("stroke-width", 0);
		doc_inserted.setAttribute("stroke-miterlimit", 4);
		doc_inserted.setAttribute("stroke-dasharray", "none");
		doc_inserted.setAttribute("d", "M 470,420 89.737207,419.54483 280.26279,90.455174 Z");
		doc_inserted.setAttribute("transform", "matrix(0.01018848,-0.0124815,0.02629089,0.02493329,64.784674,70.034422)");
		obj.append(doc_inserted);

		// これはsecret0の吹き出し用(body部分)
		obj = $("#control_layer1");
		doc_inserted = document.createElementNS('http://www.w3.org/2000/svg', "ellipse");
		doc_inserted.setAttribute("opacity", 1);
		doc_inserted.setAttribute("fill", "#36c685");
		doc_inserted.setAttribute("fill-opacity", 1);
		doc_inserted.setAttribute("stroke", "#000000");
		doc_inserted.setAttribute("stroke-width", 0);
		doc_inserted.setAttribute("stroke-miterlimit", 4);
		doc_inserted.setAttribute("stroke-dasharray", "none");
		doc_inserted.setAttribute("cx", "100.98275");
		doc_inserted.setAttribute("cy", "82.286247");
		doc_inserted.setAttribute("rx", "25.135416");
		doc_inserted.setAttribute("ry", "14.552083");
		obj.append(doc_inserted);
		*/
	})
})



function show_secret0() {
	$("#control_show0_0").css("fill", "#36c685");
	$("#control_show0_1").css("fill", "#36c685");
	$("#control_show0_5").css("fill", "#00ff00");
	$("#control_show0_3").text("片方に偏っている");
	$("#control_show0_4").text("からアウト!!!");

	its_completed0 = 1;

	if (its_completed1 == 1 && taught == 0) {
		$("#control_instruction").text("カンペキです♪");
		$("#control_instruction").css("color", "red");
	}
}


$(document).ready(function() {
	$("#secret1").on("click", function() {

		show_secret1();

	})
})


function show_secret1() {
	$("#control_show1_0").css("fill", "#ffaaaa");
	$("#control_show1_1").css("fill", "#ffaaaa");
	$("#control_show1_5").css("fill", "#ff5555");
	$("#control_show1_3").text("限界を超えている");
	$("#control_show1_4").text("からアウト!!!");

	its_completed1 = 1;

	if (its_completed0 == 1 && taught == 0) {
		$("#control_instruction").text("カンペキです♪");
		$("#control_instruction").css("color", "red");
	}
}




$(window).on("load resize", function() {
	its_not_completed_trigger = $("#its_not_completed_trigger_tag").offset().top;
	where_to_go = $("#control_show_yesno").offset().top;
})


$(window).scroll(function() {
	let scrolled = $(window).scrollTop();
	if ((scrolled > its_not_completed_trigger && control_show_yesno == 1) && (its_completed0 == 0 || its_completed1 == 0)) {
		
		if (its_completed0 == 0) {
			show_secret0();
		}
		if (its_completed1 == 0) {
			show_secret1();
		}
		$("html, body").animate({scrollTop:where_to_go}, 1000, "swing");
		console.log(where_to_go);
		$("#control_instruction").text("正解は以下の2つでした♪");

		its_completed0 = 1;
		its_completed1 = 1;
		taught = 1;

	}
})








$(document).ready(function() {
	$(".check_cell").on("click", function() {
		$(".check_cell").children().removeClass("its_all_checked");

		$(this).children().toggleClass("its_checked");

		let len = $(".its_checked").length;

		if (len == 16) {
			$(".check_cell").children().toggleClass("its_all_checked");
		}
	})
})








let on_progress = 0;

$(document).ready(function() {
	$("#scatter_plot0").on("click", function() {
		if (on_progress == 0) {
			on_progress = 1;

			for (let i = 0; i < 33; i++) {

				let ran_x = Math.floor(Math.random() * (100 - 30) + 30) + 1;
				let ran_y = (130 - ran_x) + random_norm(10);

				let doc = "#ellipse" + i;
				$(doc).animate({"cx": ran_x, "cy": ran_y}, 1500, "swing", lets_go_plus_plot);
			}

		}
	})
})



function lets_go_plus_plot() {

		document.getElementById('opacity_for_plus').setAttribute("transform", "rotate(-39.84232,58.350162,70.082765)");
		$("#opacity_for_plus").css("fill", "#ff2a2a");
		$("#opacity_for_plus").css("filter", "url(#filter898)").css("cx", 65).css("cy", 70).css("rx", 60).css("ry", 15);
		$(".circle").css("fill", "#ff2a2a");

		im_ok();
}


$(document).ready(function() {
	$("#scatter_plot2").on("click", function() {
		if (on_progress == 0) {
			on_progress = 1;

			for (let i = 0; i < 33; i++) {

				let ran_x = Math.floor(Math.random() * (100 - 30) + 30) + 1;
				let ran_y = (ran_x) + random_norm(10);

				let doc = "#ellipse" + i;
				$(doc).animate({"cx": ran_x, "cy": ran_y}, 1500, "swing", lets_go_minus_plot);
			}
		}
	})
})

function lets_go_minus_plot() {

	document.getElementById('opacity_for_plus').setAttribute("transform", "rotate(38.161305,68.563163,72.884815)");
	$("#opacity_for_plus").css("fill", "#0000ff");
	$("#opacity_for_plus").css("filter", "url(#filter898)").css("cx", 65).css("cy", 70).css("rx", 60).css("ry", 15);
	$(".circle").css("fill", "#0000ff");

	im_ok();
}



$(document).ready(function() {
	$("#scatter_plot1").on("click", function() {
		if (on_progress == 0) {
			on_progress = 1;

			for (let i = 0; i < 33; i++) {

				let ran_x = Math.floor(Math.random() * (100 - 30) + 30) + 1;
				let ran_y = Math.floor(Math.random() * (100 - 30) + 30) + 1;

				let doc = "#ellipse" + i;
				$(doc).animate({"cx": ran_x, "cy": ran_y}, 1500, "swing", lets_go_random_plot);
			}
		}
	})
})


function lets_go_random_plot() {

	document.getElementById('opacity_for_plus').setAttribute("transform", "matrix(0.23352533,0.83792173,-0.82574931,0.25378406,11.862424,7.289634)");
	$("#opacity_for_plus").css("fill", "#FFFF66").css("filter", "url(#filter860)").css("cx", 80).css("cy", -46).css("rx", 50).css("ry", 50);
	$(".circle").css("fill", "lime");

	im_ok();
}




$(document).ready(function() {
	$(".scatter_plot_class").on("click", function() {
		$(".scatter_plot_class").css("color", "black");
		$(this).css("color", "red");
	})
})





function random_norm(ran = 1) {
	let s, i;
	s = 0;
	for (i = 0; i < 10; i++) {
		s += Math.random();
	}
	return (s - 5) * ran;
}




function im_ok() {
	on_progress = 0;
}









$(document).ready(function() {
	$("#line70").on("click", function() {
		$(".data").css("fill", "#00ffff");
		make_it_colored(3);
	})
})
$(document).ready(function() {
	$("#line90").on("click", function() {
		$(".data").css("fill", "#00ffff");
		make_it_colored(8);
	})
})

function make_it_colored(arg) {
	let i;
	for (i = 0; i < arg; i++) {
		let item = "#data" + i;
		$(item).css("fill", "red");
	}
}




















let touched;

let x_lock_fish = 0;

$(document).ready(function() {
	$(".element_trigger").on("click", function() {
		if (x_lock_fish == 0) {
			x_lock_fish = 1;


			let name_of_id = $(this).attr("id");
			touched = name_of_id;
			name_of_id = name_of_id.split("_");
			let good_or_bad = name_of_id[2];

			switch (parseInt(name_of_id[1])) {
				case 1:
				make_rightline_colored(good_or_bad, "top");
				break;
				case 2:
				make_rightline_colored(good_or_bad, "bottom");
				break;
				case 3:
				make_centerline_colored(good_or_bad, "top");
				break;
				case 4:
				make_centerline_colored(good_or_bad, "bottom");
				break;
			}
		}
	})
})






function make_centerline_colored(good_or_bad, place) {
	let color;

	if (good_or_bad == "good") {
		color = "red";
	} else if (good_or_bad == "bad") {
		color = "blue";
	}
	$("#" + touched).css("fill", color);

	let which_line = "#line_left" + place + "_fish";

	$(which_line).css("stroke", color).css("stroke-width", 1.2);

	setTimeout(function () {make_main_centerline_colored(which_line, color)}, 500);
}


function make_main_centerline_colored(which_line, color) {
	$(which_line).css("stroke", "black").css("stroke-width", 0.7);
	$("#main_line_middle_fish").css("stroke", color).css("stroke-width", 1.2);
	setTimeout(function () {make_main_rightline_colored("#main_line_middle_fish", color)}, 500);
}





function make_rightline_colored(good_or_bad, place) {
	let color;

	if (good_or_bad == "good") {
		color = "red";
	} else if (good_or_bad == "bad") {
		color = "blue";
	}
	$("#" + touched).css("fill", color);

	let which_line = "#line_right" + place + "_fish";

	$(which_line).css("stroke", color).css("stroke-width", 1.2);

	setTimeout(function () {make_main_rightline_colored(which_line, color)}, 500);
}


function make_main_centerline_colored(which_line, color) {
	$(which_line).css("stroke", "black").css("stroke-width", 0.7);
	$("#main_line_middle_fish").css("stroke", color).css("stroke-width", 1.2);
	setTimeout(function () {make_main_rightline_colored("#main_line_middle_fish", color)}, 500);
}






function make_main_rightline_colored (which_line, color) {
	$(which_line).css("stroke", "black").css("stroke-width", 0.7);
	$("#main_line_right_fish").css("stroke", color).css("stroke-width", 1.2);
	setTimeout(function () {make_mainbox_colored(color)}, 500);
}



function make_mainbox_colored(color) {
	$("#main_line_right_fish").css("stroke", "black").css("stroke-width", 0.7);
	$("#main_box_fish").css("fill", color).css("fill-opacity", 1);
	setTimeout(function () {fish_completed(color)}, 500);
}

function fish_completed() {
	$("#main_box_fish").css("fill", "#000000").css("fill-opacity", 0.3);
	$("#" + touched).css("fill", "black");
	x_lock_fish = 0;
}
























