
'use strict';

//h1タグからそのしたのhidden divを表示
$(document).ready(function() {
	$('.hide_show').on("click", function() {
		$(this).next().toggleClass("hidden");
	});
});








$(function(){
	$('#model0').on("click", function(){
		reset_select_model()
		document.getElementById("model_chart0").classList.remove("hidden");
	})
})

$(function(){
	$('#model1').on("click", function(){
		reset_select_model()
		document.getElementById("model_chart1").classList.remove("hidden");
	})
})

$(function(){
	$('#model2').on("click", function(){
		reset_select_model()
		document.getElementById("model_chart2").classList.remove("hidden");
	})
})




function reset_select_model() {
	document.getElementById("model_chart0").classList.add("hidden");
	document.getElementById("model_chart1").classList.add("hidden");
	document.getElementById("model_chart2").classList.add("hidden");
}




function model0() {
	let count = document.getElementById("model0_count").textContent;

	if (parseFloat(count) < 6) {

	let variable_old = "model0_" + count;
	let variable_new = "model0_" + (parseFloat(count) + 1);

	document.getElementById(variable_old).style.color = "black";
	document.getElementById(variable_new).style.color = "red";

	}

	document.getElementById("model0_count").textContent = (parseFloat(count) + 1);

	if (parseFloat(count) >= 5 && parseFloat(count) < 30) {
		document.getElementById("model0_comment").textContent = "終了です。元の工程には後戻りしないのが、ウォーターフォール型開発の特徴です。";
	} else if (parseFloat(count) >= 30) {
		document.getElementById("model0_comment").textContent = "何回押しても戻れないんです、、、そう、滝のように、";
	}
}

$(function(){
	$('#model0_button').on("click", function(){
		model0();
	})
})


function model1() {
	let count = document.getElementById("model1_count").textContent;

	let divided_old = parseFloat(count) % 4;
	let divided_new = (parseFloat(count) + 1) % 4;

	let path_id_old = "spiral" + String(divided_old);
	let path_id_new = "spiral" + String(divided_new);

	document.getElementById(path_id_old).style.color = "black";
	document.getElementById(path_id_new).style.color = "red";

	document.getElementById("model1_count").textContent = (parseFloat(count) + 1);

	if (parseFloat(count) >= 3 && parseFloat(count) < 40) {
		document.getElementById("model1_comment").textContent = "スパイラル開発モデルではこのサイクルを何回も何回も回していきます。";
	} else if (parseFloat(count) >= 40 && parseFloat(count) <= 200) {
		document.getElementById("model1_comment").textContent = "10サイクルを回しました。素晴らしいです♪";
	} else if (parseFloat(count) >= 200 && parseFloat(count) < 400) {
		document.getElementById("model1_comment").textContent = "スパイラル開発サイクルを何度も回すのも良いですけど、勉強も再開しましょうね♪笑";
	} else if (parseFloat(count) >= 400) {
		document.getElementById("model1_comment").textContent = "スパイラル開発サイクルで目が回ってきちゃいました、、、笑";
	}
}

$(function(){
	$('#model1_button').on("click", function(){
		model1();
	})
})






function model2() {
	let count = document.getElementById("model2_count").textContent;

	let divided_old = parseFloat(count) % 2;
	let divided_new = (parseFloat(count) + 1) % 2;

	document.getElementById("model2_count").textContent = (parseFloat(count) + 1);

	if (divided_new == 1) {
		model2_normal();
	} else {
		model2_special();
		document.getElementById("model2_button").style.backgroundColor = "darkgrey";
	}

}

function model2_normal() {

	document.getElementById("prototype0").style.color = "black";
	document.getElementById("prototype1").style.color = "red";
	document.getElementById("x_lock_model2").textContent = 1;
}

function model2_special() {

	document.getElementById("prototype1").style.color = "black";
	document.getElementById("prototype2").style.color = "red";
	setTimeout("feedback0();", 300);

}

function feedback0() {
	document.getElementById("feedback").classList.remove("hidden");
	setTimeout("feedback1();", 1 * 700);
}

function feedback1() {
	document.getElementById("feedback").classList.add("hidden");
	setTimeout("feedback2();", 1 * 100);
}
function feedback2() {
	document.getElementById("prototype0").style.color = "red";
	document.getElementById("prototype2").style.color = "black";

	document.getElementById("model2_comment").textContent = "プロトタイプモデルではユーザのフィードバックを得て、それを活用してよりユーザの要求に合うシステムを開発します。";

	document.getElementById("model2_button").style.backgroundColor = "lightgreen";
	document.getElementById("x_lock_model2").textContent = 1;
}

$(function(){
	$('#model2_button').on("click", function(){
		let state = document.getElementById("x_lock_model2").textContent;
		state = parseFloat(state);
		if (state == 1) {
			document.getElementById("x_lock_model2").textContent = 0;
			model2();
		}
	})
})















var x_lock_v = 1;

function arrow00() {
	document.getElementById("common_frame10").style.backgroundColor = "#FFFF99";
	$("#arrow0").animate({width: "220px"}, 800, "swing");
	setTimeout("arrow01()", 1000);
}
function arrow01() {
	document.getElementById("common_frame0").style.backgroundColor = "#FFFF33";
	x_lock_v = 1;
}


function arrow10() {
	document.getElementById("common_frame9").style.backgroundColor = "#FFFF99";
	$("#arrow1").animate({width: "160px"}, 800, "swing");
	setTimeout("arrow11()", 1100);
}
function arrow11() {
	document.getElementById("common_frame1").style.backgroundColor = "#FFFF33";
	x_lock_v = 1;
}

function arrow20() {
	document.getElementById("common_frame8").style.backgroundColor = "#FFFF99";
	$("#arrow2").animate({width: "100px"}, 800, "swing");
	setTimeout("arrow21()", 1100);
}
function arrow21() {
	document.getElementById("common_frame2").style.backgroundColor = "#FFFF33";
	x_lock_v = 1;
}

function arrow30() {
	document.getElementById("common_frame7").style.backgroundColor = "#FFFF99";
	$("#arrow3").animate({width: "65px"}, 800, "swing");
	setTimeout("arrow31()", 1100);
}
function arrow31() {
	document.getElementById("common_frame3").style.backgroundColor = "#FFFF33";
	x_lock_v = 1;
}

function arrow40() {
	document.getElementById("common_frame6").style.backgroundColor = "#FFFF99";
	$("#arrow4").animate({width: "40px"}, 500, "swing");
	setTimeout("arrow41()", 800);
}
function arrow41() {
	document.getElementById("common_frame4").style.backgroundColor = "#FFFF33";
	x_lock_v = 1;
}

$(function(){
	$('#common_frame0').on("click", function() {
		if (x_lock_v == 1) {
			x_lock_v = 0;
			reset_v();
			document.getElementById("v_name_show").textContent = "システム要件定義";
			document.getElementById("v_comment_show").textContent = "システム全体が実現すべき要件を確認します♪";
			document.getElementById("common_frame0").style.color = "red";
			x_lock_v = 1;
		}
	})
})
$(function(){
	$('#common_frame1').on("click", function() {
		if (x_lock_v == 1) {
			x_lock_v = 0;
			reset_v();
			document.getElementById("v_name_show").textContent = "システム方式設計";
			document.getElementById("v_comment_show").textContent = "システム要件定義を満たすための設計を最上位レベル(ハードウェア・ソフトウェアレベル)で決定します♪";
			document.getElementById("common_frame1").style.color = "red";
			x_lock_v = 1;
		}
	})
})
$(function(){
	$('#common_frame2').on("click", function() {
		if (x_lock_v == 1) {
			x_lock_v = 0;
			reset_v();
			document.getElementById("v_name_show").textContent = "ソフトウェア要件定義";
			document.getElementById("v_comment_show").textContent = "ソフトウェアに必要な機能・セキュリティ・外部インターフェースを決定します♪";
			document.getElementById("common_frame2").style.color = "red";
			x_lock_v = 1;
		}
	})
})
$(function(){
	$('#common_frame3').on("click", function() {
		if (x_lock_v == 1) {
			x_lock_v = 0;
			reset_v();
			document.getElementById("v_name_show").textContent = "ソフトウェア方式設計";
			document.getElementById("v_comment_show").textContent = "ソフトウェア要件を達成する手段を「方式」まで分解します♪";
			document.getElementById("v_comment_show0").textContent = "(ソフトウェア構造やデータベース構造を明確に!)";
			document.getElementById("common_frame3").style.color = "red";
			x_lock_v = 1;
		}
	})
})
$(function(){
	$('#common_frame4').on("click", function() {
		if (x_lock_v == 1) {
			x_lock_v = 0;
			reset_v();
			document.getElementById("v_name_show").textContent = "ソフトウェア詳細設計";
			document.getElementById("v_comment_show").textContent = "ソフトウェアを小さな部品(モジュール)まで分解していきます♪";
			document.getElementById("common_frame4").style.color = "red";
			x_lock_v = 1;
		}

	})
})

$(function(){
	$('#common_frame5').on("click", function() {
		if (x_lock_v == 1) {
			x_lock_v = 0;
			reset_v();
			document.getElementById("v_name_show").textContent = "プログラミング";
			document.getElementById("v_comment_show").textContent = "実際にソースコードを入力していきます♪";
			document.getElementById("common_frame5").style.color = "red";
			x_lock_v = 1;
		}
	})
})

$(function(){
	$('#common_frame6').on("click", function() {
		if (x_lock_v == 1) {
			x_lock_v = 0;
			reset_v();
			document.getElementById("v_name_show").textContent = "ソフトウェア単体テスト";
			document.getElementById("v_comment_show").textContent = "ソフトウェア単体(モジュール)が動くかどうかチェックします♪";
			document.getElementById("v_comment_show0").textContent = "(ソフトウェア詳細設計通りかどうかチェック)";
			arrow40();
		}
	})
})
$(function(){
	$('#common_frame7').on("click", function() {
		if (x_lock_v == 1) {
			x_lock_v = 0;
			reset_v();
			document.getElementById("v_name_show").textContent = "ソフトウェア結合テスト";
			document.getElementById("v_comment_show").textContent = "モジュールの組み合わせ(結合されたソフトウェア)が動くかどうかチェックします♪";
			document.getElementById("v_comment_show0").textContent = "(ソフトウェア方式設計通りかどうかチェック)";
			arrow30();
		}
	})
})
$(function(){
	$('#common_frame8').on("click", function() {
		if (x_lock_v == 1) {
			x_lock_v = 0;
			reset_v();
			document.getElementById("v_name_show").textContent = "ソフトウェアテスト";
			document.getElementById("v_comment_show").textContent = "モジュールの組み合わせ(結合されたソフトウェア)が動くかどうかチェックします♪";
			document.getElementById("v_comment_show0").textContent = "(ソフトウェア要件定義を満たしているかどうかチェック)";
			arrow20();
		}
	})
})
$(function(){
	$('#common_frame9').on("click", function() {
		if (x_lock_v == 1) {
			x_lock_v = 0;
			reset_v();
			document.getElementById("v_name_show").textContent = "システム結合テスト";
			document.getElementById("v_comment_show").textContent = "モジュールの組み合わせ(結合されたソフトウェア)をさらに組み合わせてシステムを完成させます♪";
			document.getElementById("v_comment_show0").textContent = "(システム方式設計を満たしているかどうかチェック)";
			arrow10();
		}
	})
})
$(function(){
	$('#common_frame10').on("click", function() {
		if (x_lock_v == 1) {
			x_lock_v = 0;
			reset_v();
			document.getElementById("v_name_show").textContent = "システムテスト";
			document.getElementById("v_comment_show").textContent = "システム全体が想定通りに動くかどうかチェック♪";
			document.getElementById("v_comment_show0").textContent = "(システム要件定義を満たしているかどうかチェック)";
			arrow00();
		}
	})
})


function reset_v() {

	for (let i = 0; i < 11; i++) {
		let common_frame = "common_frame" + i;
		document.getElementById(common_frame).style.backgroundColor = "white";
		document.getElementById(common_frame).style.color = "black";
	}
	for (let j = 0; j < 5; j++) {
		let arrow = "arrow" + j;
		document.getElementById(arrow).style.width = "15px";
	}
	document.getElementById("v_comment_show0").textContent = "";
}













let x_lock_oop = 1;

$(function(){
	$('#cmd0').on("click", function(){
		if (x_lock_oop == 1) {
			x_lock_oop = 0;

			let power = document.getElementById("power").textContent;

			if (parseFloat(power) >= 5) {
				document.getElementById("game_comment").textContent = "パワーがMAXです!!!";
			} else {
				document.getElementById("game_comment").textContent = "パワーが増加しました!!!";
				document.getElementById("power").textContent = parseFloat(power) + 1;
			}
			x_lock_oop = 1;
		}
	})
})






function green0() {

	//関数の中身がいなくなっちゃいました泣
	green1();
}


function green1() {
	document.getElementById("green_attack").classList.remove("hidden");
	$("#green_attack").animate({left: "550px"}, 1000, "swing");
	setTimeout("green2()", 1300);
}

function green2() {
	document.getElementById("green_attack").style.left = "100px";
	document.getElementById("green_attack").classList.add("hidden");
	document.getElementById("game_comment").textContent = "普通の攻撃!!!";

	let hp = document.getElementById("hp").textContent;
	hp = parseFloat(hp) - 3;
	document.getElementById("hp").textContent = hp;
	if (hp <= 0) {
		mission_completed();
	}
	x_lock_oop = 1;
}


$(function(){
	$('#cmd1').on("click", function(){
		if (x_lock_oop == 1) {
			x_lock_oop = 0;
			green0();
		}
	})
})





function red0() {
	let power = document.getElementById("power").textContent;
	power = parseFloat(power);

	if (power != 0) {
		red1(power);
	} else {
		document.getElementById("game_comment").textContent = "はりきって攻撃するためのパワーが足りません(´;ω;｀)";
		x_lock_oop = 1;
	}

}


function red1(arg) {

	document.getElementById("red_attack").classList.remove("hidden");

	let height = 20 + (5 * arg);

	document.getElementById("red_attack").style.height = height + "px";

	let speed = 800 - (100 * arg);
	let time = speed + 300;


	$("#red_attack").animate({left: "550px"}, speed, "swing");
	setTimeout("red2()", time);
}

function red2() {
	let power = document.getElementById("power").textContent;
	power = parseFloat(power);

	document.getElementById("red_attack").style.left = "100px";
	document.getElementById("red_attack").classList.add("hidden");
	document.getElementById("game_comment").textContent = "はりきって攻撃!!!";

	let hp = document.getElementById("hp").textContent;
	hp = parseFloat(hp) - (power * 10);
	document.getElementById("hp").textContent = hp;

	document.getElementById("power").textContent = 0;

	if (hp <= 0) {
		mission_completed();
	}
	x_lock_oop = 1;
}


$(function(){
	$('#cmd2').on("click", function(){
		if (x_lock_oop == 1) {
			x_lock_oop = 0;
			red0();
		}
	})
})



function mission_completed() {
	document.getElementById("game_comment").textContent = "ミッションコンプリート♪";
	document.getElementById("game_comment").style.fontSize = "25px";
	document.getElementById("game_comment").style.color = "red";

	document.getElementById("cmd0").classList.add("hidden");
	document.getElementById("cmd1").classList.add("hidden");
	document.getElementById("cmd2").classList.add("hidden");

	document.getElementById("this_shows_after_completed").classList.remove("hidden");
}















function encapsulation0() {
	document.getElementById("encapsulation").classList.add("hidden");
	$("#mixing_man_div .right_arm").animate({height: "130%"}, 1000, "swing");
	$("#mixing_man_div .left_arm").animate({height: "130%"}, 1000, "swing");
	setTimeout("encapsulation1()", 1300);
}

function encapsulation1() {
	document.getElementById("exp_class").classList.remove("hidden");
	document.getElementById("label_class").classList.remove("hidden");
	document.getElementById("encapsulated").classList.remove("hidden");

	$("#mixing_man_div .right_arm").animate({height: "50%"}, 1000, "swing");
	$("#mixing_man_div .left_arm").animate({height: "50%"}, 1000, "swing");
}

$(function(){
	$('#encapsulation').on("click", function(){
		encapsulation0();
	})
})











