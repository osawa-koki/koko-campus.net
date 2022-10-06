
'use strict';

//h1タグからそのしたのhidden divを表示
$(document).ready(function() {
	$('.hide_show').on("click", function() {
		$(this).next().toggleClass("hidden");
	});
});


$(function(){
	$('#ba').on("click", function(){
		show_pyramid()

		document.getElementById("ea0").textContent = "BA";
		document.getElementById("ea1").textContent = "ビジネスアーキテクチャ";
		document.getElementById("ea2").textContent = "ビジネス・業務活動";
		document.getElementById("ea3").textContent = "を体系化した層";

		document.getElementById("ba").style.color = "red";
		document.getElementById("ba").style.fontWeight = "bold";

		document.getElementById("da").style.color = "black";
		document.getElementById("da").style.fontWeight = "normal";
		document.getElementById("aa").style.color = "black";
		document.getElementById("aa").style.fontWeight = "normal";
		document.getElementById("ta").style.color = "black";
		document.getElementById("ta").style.fontWeight = "normal";
	})
})
$(function(){
	$('#da').on("click", function(){
		show_pyramid()

		document.getElementById("ea0").textContent = "DA";
		document.getElementById("ea1").textContent = "データアーキテクチャ";
		document.getElementById("ea2").textContent = "情報の構成";
		document.getElementById("ea3").textContent = "を体系化した層";

		document.getElementById("da").style.color = "red";
		document.getElementById("da").style.fontWeight = "bold";

		document.getElementById("ba").style.color = "black";
		document.getElementById("ba").style.fontWeight = "normal";
		document.getElementById("aa").style.color = "black";
		document.getElementById("aa").style.fontWeight = "normal";
		document.getElementById("ta").style.color = "black";
		document.getElementById("ta").style.fontWeight = "normal";
	})
})
$(function(){
	$('#aa').on("click", function(){
		show_pyramid()

		document.getElementById("ea0").textContent = "AA";
		document.getElementById("ea1").textContent = "アプリケーションアーキテクチャ";
		document.getElementById("ea2").textContent = "情報システム(アプリケーション)の構成";
		document.getElementById("ea3").textContent = "を体系化した層";

		document.getElementById("aa").style.color = "red";
		document.getElementById("aa").style.fontWeight = "bold";

		document.getElementById("ba").style.color = "black";
		document.getElementById("ba").style.fontWeight = "normal";
		document.getElementById("da").style.color = "black";
		document.getElementById("da").style.fontWeight = "normal";
		document.getElementById("ta").style.color = "black";
		document.getElementById("ta").style.fontWeight = "normal";
	})
})
$(function(){
	$('#ta').on("click", function(){
		show_pyramid()

		document.getElementById("ea0").textContent = "TA";
		document.getElementById("ea1").textContent = "テクノロジアーキテクチャ";
		document.getElementById("ea2").textContent = "技術要素(ハードウェア・ソフトウェア等)";
		document.getElementById("ea3").textContent = "を体系化した層";

		document.getElementById("ta").style.color = "red";
		document.getElementById("ta").style.fontWeight = "bold";

		document.getElementById("ba").style.color = "black";
		document.getElementById("ba").style.fontWeight = "normal";
		document.getElementById("da").style.color = "black";
		document.getElementById("da").style.fontWeight = "normal";
		document.getElementById("aa").style.color = "black";
		document.getElementById("aa").style.fontWeight = "normal";
	})
})
function show_pyramid() {
	document.getElementById("pyramid_div").classList.remove("hidden");
}







$(function(){
	$('#dfd0').on("click", function(){
		mark0_dfd("dfd0");

		document.getElementById("dfd_show0").textContent = "ユーザ";
		document.getElementById("dfd_show1").textContent = "ユーザが会員登録をしようと決意!!。";
		
	})
})
$(function(){
	$('#dfd2').on("click", function(){
		mark0_dfd("dfd2");

		document.getElementById("dfd_show0").textContent = "ユーザのフォーム入力";
		document.getElementById("dfd_show1").textContent = "ユーザが会員登録ページのフォームにメールアドレスを入力します。";

	})
})
$(function(){
	$('#dfd4').on("click", function(){
		mark0_dfd("dfd4");

		document.getElementById("dfd_show0").textContent = "データベース処理";
		document.getElementById("dfd_show1").textContent = "送信されたメールアドレスをデータベース内で検索します。";

	})
})
$(function(){
	$('#dfd6').on("click", function(){
		mark0_dfd("dfd6");

		document.getElementById("dfd_show0").textContent = "登録確認";
		document.getElementById("dfd_show1").textContent = "登録してあればログインページへのリンクを返し、存在していなければ次の処理に続きます。";
		
	})
})
$(function(){
	$('#dfd8').on("click", function(){
		mark0_dfd("dfd8");

		document.getElementById("dfd_show0").textContent = "本登録メールを送信";
		document.getElementById("dfd_show1").textContent = "登録されたメールアドレス宛に本登録用のurlを添付したメールを送信します。";

	})
})

$(function(){
	$('#arr0').on("click", function(){
		mark1_dfd("arr0", "arrow0");

		document.getElementById("dfd_show0").textContent = "会員登録ページへ";
		document.getElementById("dfd_show1").textContent = "ユーザが会員登録用のページを開きます。";

	})
})
$(function(){
	$('#arr1').on("click", function(){
		mark1_dfd("arr1", "arrow1");

		document.getElementById("dfd_show0").textContent = "登録用プログラムの実行";
		document.getElementById("dfd_show1").textContent = "未登録と判明したメールアドレスを本登録を実行するプログラムへ送信します。";
		
	})
})
$(function(){
	$('#arr2').on("click", function(){
		mark1_dfd("arr2", "arrow2");

		document.getElementById("dfd_show0").textContent = "登録済みかチェック";
		document.getElementById("dfd_show1").textContent = "ユーザが入力したメールアドレスが既に会員を管理しているデータベースに存在しているか問い合わせます。(SQL)";

	})
})
$(function(){
	$('#arr3').on("click", function(){
		mark1_dfd("arr3", "arrow3");

		document.getElementById("dfd_show0").textContent = "結果の送信";
		document.getElementById("dfd_show1").textContent = "メールアドレスがデータベースに存在しているかどうかの結果を返します。";

	})
})


function reset_dfd() {
	document.getElementById("dfd0").style.color = "black";
	document.getElementById("dfd2").style.color = "black";
	document.getElementById("dfd4").style.color = "black";
	document.getElementById("dfd6").style.color = "black";
	document.getElementById("dfd8").style.color = "black";

	document.getElementById("dfd0").style.fontWeight = "normal";
	document.getElementById("dfd2").style.fontWeight = "normal";
	document.getElementById("dfd4").style.fontWeight = "normal";
	document.getElementById("dfd6").style.fontWeight = "normal";
	document.getElementById("dfd8").style.fontWeight = "normal";

	document.getElementById("arr0").classList.remove("arrow00");
	document.getElementById("arr1").classList.remove("arrow11");
	document.getElementById("arr2").classList.remove("arrow22");
	document.getElementById("arr3").classList.remove("arrow33");
}
function mark0_dfd(arg) {
	reset_dfd();
	document.getElementById(arg).style.color = "red";
	document.getElementById(arg).style.fontWeight = "bold";
	document.getElementById("dfd_div").classList.remove("hidden");
}
function mark1_dfd(arg0, arg1) {
	reset_dfd();

	let last = arg1.slice(-1);
	let arg2 = arg1 + String(last);

	document.getElementById(arg0).classList.add(arg2);

	document.getElementById("dfd_div").classList.remove("hidden");
}




// e-r_chartの簡単なプログラム
$('#er0, #er1').change (function() {
	let er0 = $('#er0').val();
	let er1 = $('#er1').val();

	if (er0 == 1) {
		if (er1 == 1) {
			reset_er();
			document.getElementById("er_show").textContent = "1つのエンティティAには1つのエンティティBが対応、同時に1つのエンティティBには1つのエンティティAが対応します。";
			document.getElementById("er_show0").textContent = "例) 私(A)はmr-campus project(B)にのみ参加していて、mr-campus project(B)も参加者は私(A)だけである。(ちょっと悲しいです泣)";
			document.getElementById("arw").classList.add("arw0");
		} else if (er1 == 2) {
			reset_er();
			document.getElementById("er_show").textContent = "1つのエンティティAには複数のエンティティBが対応、同時に1つのエンティティBには1つのエンティティAが対応します。";
			document.getElementById("er_show0").textContent = "例) 私(A)はM大学(B)の学生だが、M大学(B)には私(A)以外の学生が多数在籍している。";
			document.getElementById("arw").classList.add("arw1");
		}
	} else if (er0 == 2) {
		if (er1 == 1) {
			reset_er();
			document.getElementById("er_show").textContent = "1つのエンティティBには複数のエンティティAが対応、同時に1つのエンティティAには1つのエンティティBが対応します。";
			document.getElementById("er_show0").textContent = "例) 私(B)はM大学(A)の学生だが、M大学(A)には私(B)以外の学生が多数在籍している。";
			document.getElementById("arw").classList.add("arw2");
		} else if (er1 == 2) {
			reset_er();
			document.getElementById("er_show").textContent = "1つのエンティティAには複数のエンティティBが対応、同時に1つのエンティティBには複数のエンティティAが対応します。";
			document.getElementById("er_show0").textContent = "例) 私(A)はバイト(B)を複数しているが、そのバイト(B)先も私(A)以外の従業員を複数名雇っている。";
			document.getElementById("arw").classList.add("arw3");
		}
	} else {
		reset_er();
	}
})

function reset_er() {
	document.getElementById("arw").classList.remove("arw0");
	document.getElementById("arw").classList.remove("arw1");
	document.getElementById("arw").classList.remove("arw2");
	document.getElementById("arw").classList.remove("arw3");

	document.getElementById("er_show").textContent = "";
}





$('#action').change (function() {
	let name = document.getElementById("name").value;
	let word = document.getElementById("word").value;
	let action = $('#action').val();

	document.getElementById("name_show").textContent = name;
	document.getElementById("word_show").textContent = word;

	if (action == 0) {
		document.getElementById("action0").textContent = "♪";
		document.getElementById("action1").textContent = "♪";
		document.getElementById("action2").textContent = "♪";
	} else if (action == 1) {
		document.getElementById("action0").textContent = "!";
		document.getElementById("action1").textContent = "!";
		document.getElementById("action2").textContent = "!";	
	} else if (action == 2) {
		document.getElementById("action0").textContent = "z";
		document.getElementById("action1").textContent = "z";
		document.getElementById("action2").textContent = "z";	
	} else {
		document.getElementById("name_show").textContent = "";
		document.getElementById("word_show").textContent = "";

		document.getElementById("action0").textContent = "";
		document.getElementById("action1").textContent = "";
		document.getElementById("action2").textContent = "";	
	}
})







$(function(){
	$('#saas').on("click", function(){
	start_cloud();
	reset_cloud();

	document.getElementById("cloud_show").textContent = "アプリケーションソフトウェアの機能を提供します。";

	document.getElementById("saas").style.color = "red";

	document.getElementById("application").style.color = "orange";
	document.getElementById("platform").style.color = "orange";
	document.getElementById("infrastructure").style.color = "orange";

	document.getElementById("user").style.textDecoration = "line-through";
	})
})
$(function(){
	$('#paas').on("click", function(){
	start_cloud();
	reset_cloud();

	document.getElementById("cloud_show").textContent = "アプリケーション実行環境(プラットフォーム)を提供します。";

	document.getElementById("paas").style.color = "red";

	document.getElementById("application").style.color = "green";
	document.getElementById("platform").style.color = "orange";
	document.getElementById("infrastructure").style.color = "orange";
	})
})
$(function(){
	$('#iaas').on("click", function(){
	start_cloud();
	reset_cloud();

	document.getElementById("cloud_show").textContent = "インフラ(ハードウェア・ネットワーク)を提供します。";

	document.getElementById("iaas").style.color = "red";

	document.getElementById("application").style.color = "green";
	document.getElementById("platform").style.color = "green";
	document.getElementById("infrastructure").style.color = "orange";
	})
})


function start_cloud() {
	document.getElementById("user").classList.remove("hide");
	document.getElementById("vendor").classList.remove("hide");
}



function reset_cloud() {
	document.getElementById("cloud_show").textContent = "";

	document.getElementById("application").style.color = "black";
	document.getElementById("platform").style.color = "black";
	document.getElementById("infrastructure").style.color = "black";

	document.getElementById("saas").style.color = "black";
	document.getElementById("paas").style.color = "black";
	document.getElementById("iaas").style.color = "black";

	document.getElementById("user").style.textDecoration = "none";
}






