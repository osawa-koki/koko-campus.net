
'use strict';








let ready_algorithm = 1;


// input_3digits_onlyクラスに属するinputタグは以下に属するキーのみ入力可能
// 0-9=>数字キー
// 37-k-40=>矢印キー
// 8=>バックスペースキー
// 9=>タブキー
// 46=>デリートキー
// 96-k-105=>テンキー
$(document).on('keydown', '.input_3digits_only', function(e){
	let k = e.keyCode;
	let str = String.fromCharCode(k);
	if (!((str.match(/[0-9]/) || (37 <= k && k <= 40) || k === 8 || k === 9 || k === 46) || (96 <= k && k <= 105))) {
		return false;
	} else if (($(this).val().toString().length) > 2) {
		return false;
	}
});


$(document).on('keyup', '.input_3digits_only', function(e){
	$(".input_3digits_only").each(function() {
		let check = $(this).val();
		if (check == "") {
			ready_algorithm = 0;
			return false;
		} else {
			ready_algorithm = 1;
		}
	});
	if (ready_algorithm == 1) {
		$("#algorithming").css("background-color", "yellow");
	} else {
		$("#algorithming").css("background-color", "darkgrey");
	}
});
 





$(document).ready(function() {
	$('#algorithming').on("click", function() {
		if (ready_algorithm == 1) {
			$('#algorithming').addClass("hidden");
			$('#algorithm_show').removeClass("hidden");
			$('#algorithm_show_div').removeClass("hidden");
			ready_algorithm = 0;
			algorithm_first();
		}
	})
})

let argorithm_over;
let biggest = 0;


function algorithm_first() {
	// 入力された5つの数値を代入する用の配列を作成
	let array_algorithm = new Array();

	// 入力された5つの数値を代入
	$(".input_3digits_only").each(function() {
		array_algorithm.push(parseInt($(this).val()));
	})

	// interval処理の開始
	let i = 0;
	let biggest_where;

	const interval_id = setInterval(() => {
		// まずは、すべてのinputタグの背景色を白に、
		$(".input_3digits_only").css("background-color", "white");

		// もし、過去の最大よりも大きければ背景色を赤にしてbiggestにその数を代入 + 暫定一位にその数を代入
		// そうでなければ、背景色は黄色でbiggestはそのまま
		if (array_algorithm[i] > biggest) {
			biggest = array_algorithm[i];
			$(".input_3digits_only").eq(i).css("background-color", "red");
			$("#temp_1st").text(array_algorithm[i]);
			biggest_where = i;
		} else {
			$(".input_3digits_only").eq(i).css("background-color", "lightgrey");
		}

		if (i > 4) {
			clearInterval(interval_id);
			array_algorithm.splice(biggest_where, 1);
			$(".input_3digits_only").eq(-1).css("display", "none");
			$(".algorythm_organized").eq(0).css("display", "inline");
			$(".algorythm_organized").eq(0).val(biggest);
			let j = 0;
			for (let element of array_algorithm) {
				$(".input_3digits_only").eq(j).val(element);
				j += 1;
			}
			algorithm_second(array_algorithm);
		}
		i += 1;
	}, 1000);
}


function algorithm_second(array_algorithm) {
	// interval処理の開始
	biggest = 0;
	let i = 0;
	let biggest_where;

	const interval_id = setInterval(() => {
		// まずは、すべてのinputタグの背景色を白に、
		$(".input_3digits_only").css("background-color", "white");

		// もし、過去の最大よりも大きければ背景色を赤にしてbiggestにその数を代入 + 暫定一位にその数を代入
		// そうでなければ、背景色は黄色でbiggestはそのまま
		if (array_algorithm[i] > biggest) {
			biggest = array_algorithm[i];
			$(".input_3digits_only").eq(i).css("background-color", "red");
			$("#temp_1st").text(array_algorithm[i]);
			biggest_where = i;
		} else {
			$(".input_3digits_only").eq(i).css("background-color", "lightgrey");
		}

		if (i > 3) {
			clearInterval(interval_id);
			array_algorithm.splice(biggest_where, 1);
			$(".input_3digits_only").eq(-2).css("display", "none");
			$(".algorythm_organized").eq(1).css("display", "inline");
			$(".algorythm_organized").eq(1).val(biggest);
			let j = 0;
			console.log(array_algorithm);
			for (let element of array_algorithm) {
				$(".input_3digits_only").eq(j).val(element);
				j += 1;
			}
			algorithm_third(array_algorithm);
		}
		i += 1;
	}, 1000);
}









function algorithm_third(array_algorithm) {
	// interval処理の開始
	biggest = 0;
	let i = 0;
	let biggest_where;

	const interval_id = setInterval(() => {
		// まずは、すべてのinputタグの背景色を白に、
		$(".input_3digits_only").css("background-color", "white");

		// もし、過去の最大よりも大きければ背景色を赤にしてbiggestにその数を代入 + 暫定一位にその数を代入
		// そうでなければ、背景色は黄色でbiggestはそのまま
		if (array_algorithm[i] > biggest) {
			biggest = array_algorithm[i];
			$(".input_3digits_only").eq(i).css("background-color", "red");
			$("#temp_1st").text(array_algorithm[i]);
			biggest_where = i;
		} else {
			$(".input_3digits_only").eq(i).css("background-color", "lightgrey");
		}

		if (i > 2) {
			clearInterval(interval_id);
			array_algorithm.splice(biggest_where, 1);
			$(".input_3digits_only").eq(-3).css("display", "none");
			$(".algorythm_organized").eq(2).css("display", "inline");
			$(".algorythm_organized").eq(2).val(biggest);
			let j = 0;
			for (let element of array_algorithm) {
				$(".input_3digits_only").eq(j).val(element);
				j += 1;
			}
			algorithm_forth(array_algorithm);
		}
		i += 1;
	}, 1000);
}



function algorithm_forth(array_algorithm) {
	// interval処理の開始
	biggest = 0;
	let i = 0;
	let biggest_where;

	const interval_id = setInterval(() => {
		// まずは、すべてのinputタグの背景色を白に、
		$(".input_3digits_only").css("background-color", "white");

		// もし、過去の最大よりも大きければ背景色を赤にしてbiggestにその数を代入 + 暫定一位にその数を代入
		// そうでなければ、背景色は黄色でbiggestはそのまま
		if (array_algorithm[i] > biggest) {
			biggest = array_algorithm[i];
			$(".input_3digits_only").eq(i).css("background-color", "red");
			$("#temp_1st").text(array_algorithm[i]);
			biggest_where = i;
		} else {
			$(".input_3digits_only").eq(i).css("background-color", "lightgrey");
		}

		if (i > 1) {
			clearInterval(interval_id);
			array_algorithm.splice(biggest_where, 1);
			$(".input_3digits_only").eq(-4).css("display", "none");
			$(".algorythm_organized").eq(3).css("display", "inline");
			$(".algorythm_organized").eq(3).val(biggest);
			let j = 0;
			console.log(array_algorithm);
			for (let element of array_algorithm) {
				$(".input_3digits_only").eq(j).val(element);
				j += 1;
			}
			algorithm_fifth(array_algorithm);
		}
		i += 1;
	}, 1000);
}


function algorithm_fifth(array_algorithm) {
	// interval処理の開始
	biggest = 0;
	let i = 0;
	let biggest_where;

	const interval_id = setInterval(() => {
		// まずは、すべてのinputタグの背景色を白に、
		$(".input_3digits_only").css("background-color", "white");

		// もし、過去の最大よりも大きければ背景色を赤にしてbiggestにその数を代入 + 暫定一位にその数を代入
		// そうでなければ、背景色は黄色でbiggestはそのまま
		if (array_algorithm[i] > biggest) {
			biggest = array_algorithm[i];
			$(".input_3digits_only").eq(i).css("background-color", "red");
			$("#temp_1st").text(array_algorithm[i]);
			biggest_where = i;
		} else {
			$(".input_3digits_only").eq(i).css("background-color", "lightgrey");
		}

		if (i > 0) {
			clearInterval(interval_id);
			array_algorithm.splice(biggest_where, 1);
			$(".input_3digits_only").eq(-5).css("display", "none");
			$(".algorythm_organized").eq(4).css("display", "inline");
			$(".algorythm_organized").eq(4).val(biggest);
			let j = 0;
			console.log(array_algorithm);
			for (let element of array_algorithm) {
				$(".input_3digits_only").eq(j).val(element);
				j += 1;
			}
		}
		i += 1;
	}, 1000);
}



















