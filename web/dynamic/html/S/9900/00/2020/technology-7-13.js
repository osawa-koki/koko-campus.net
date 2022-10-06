
'use strict';

//h1タグからそのしたのhidden divを表示
$(document).ready(function() {
	$('.hide_show').on("click", function() {
		$(this).next().toggleClass("hidden");
	});
});







let check_from2 = 0;


jQuery(document).on('keydown', '.input_binary_only', function(e){
  let k = e.keyCode;
  let str = String.fromCharCode(k);
  if (!(str.match(/[0-1]/) || (37 <= k && k <= 40) || k === 8 || k === 46)) {
  	$("#warn_from2").text("2進数(0か1)で入力してください。");
  	$("#from2_button").css("background-color", "lightgrey");
  	check_from2 = 0;
    return false;

  } else {
  	$("#warn_from2").text("");
  	$("#from2_button").css("background-color", "yellow");
  	check_from2 = 1;
  }
});
 
jQuery(document).on('keyup', '.input_binary_only', function(e){
  this.value = this.value.replace(/[^0-1]+/i, '');
});
 
jQuery(document).on('blur', '.input_binary_only',function(){
  this.value = this.value.replace(/[^0-1]+/i, '');
});





/* 正規表現 + 入力そのものの制限に変更(上)
$(document).ready(function() {
	$('#from2').on("change", function() {
		let num = $("#from2").val();
		num = parseInt(num);
		num = num.toString();
		let check = num.replace(/0/g, "").replace(/1/g, "");
		if (check == "") {
			$("#warn_from2").text("");
			$("#from2_button").css("background-color", "yellow");
			check_from2 = 1;
		} else {
			$("#warn_from2").text("2進数(0か1)で入力してください。");
			$("#from2_button").css("background-color", "lightgrey");
			check_from2 = 0;
		}
	})
})
*/




$(document).ready(function() {
	$('#from2_button').on("click", function() {
		if (check_from2 == 1) {
			$("#from2_table td").remove();
			func_from2_0();
		}
	})
})

function func_from2_0() {
	let num = $("#from2").val();
	num = parseInt(num);
	num = num.toString();
	let len = num.length;
	let reved = num.split("");
	reved = reved.reverse();

	for (let i = 0; i < len; i++) {
		func_from2_1(i);
		func_from2_2(i);
		func_from2_3(reved[i]);
		func_from2_4(i, reved[i]);
	}
	num = parseInt(num, 2);
	let result = "答え、   " + num;
	$("#result_from2").text(result);
}

function func_from2_1(arg) {
	let inserted = "<td>2<sup>" + arg + "</sup></td>";
	$("#from2_th0").after(inserted);
}



function func_from2_2(arg) {
	let inserted = "<td><strong>" + (2 ** arg) + "</strong>(2<sup>" + arg + "</sup>)</td>";
	$("#from2_th1").after(inserted);
}


function func_from2_3(arg) {
	let inserted = "<td>" + arg + "</td>";
	$("#from2_th2").after(inserted);
}



function func_from2_4(arg0, arg1) {
	let num = (2 ** arg0) * arg1;
	let inserted = "<td>" + num + "</td>";
	$("#from2_th3").after(inserted);
}







let check_from10 = 0;


$(document).on('keydown', '.input_number_only', function(e){
  let k = e.keyCode;
  let str = String.fromCharCode(k);
  if (!(str.match(/[0-9]/) || (37 <= k && k <= 40) || k === 8 || k === 46)) {
  	$("#warn_from10").text("正の整数(1.2.3.4.5...)を入力してください。");
  	$("#from10_button").css("background-color", "lightgrey");
  	check_from10 = 0;
    return false;
  } else {
  	$("#warn_from10").text("");
  	$("#from10_button").css("background-color", "yellow");
  	check_from10 = 1;
  }
});
 
$(document).on('keyup', '.input_number_only', function(e){
  this.value = this.value.replace(/[^0-9]+/i, '');
});
 
$(document).on('blur', '.input_number_only',function(){
  this.value = this.value.replace(/[^0-9]+/i, '');
});




let entered_num;
let quotient;
let remainder;
$(document).ready(function() {
	$('#from10_button').on("click", function() {
		if (check_from10 == 1) {
			func_from10();
		}
	})
})


function func_from10() {
	$(".gonna_be_deleted").remove();
	entered_num = parseInt($("#from10").val());
	let bin = entered_num.toString(2);
	let bin_length = bin.length;
	$("#from10_entered_number").text(entered_num);
	let result = "答え、   " + bin;
	$("#result_from10").text(result);
	for (let i = 0; i < bin_length - 2; i++) {
		let returned = $("<tr class = 'gonna_be_deleted'></tr>").appendTo("#from10_base_tb");
		quotient = Math.floor(entered_num / 2);
		remainder = entered_num % 2;
		$(returned).append("<td class = 'from10_cell_0'>2</td>");
		$(returned).append("<td class = 'from10_cell_1'>" + quotient + "</td>");
		$(returned).append("<td class = 'from10_cell_2'>" + remainder + "</td>");
		entered_num = quotient;
	}
	let returned_final = $("<tr class = 'gonna_be_deleted'></tr>").appendTo("#from10_base_tb");
	$(returned_final).append("<td class = 'from10_cell_0'></td>");
	$(returned_final).append("<td class = 'from10_cell_final'>" + Math.floor(entered_num / 2) + "</td>");//quotientは絶対に1になるハズ、、、
	$(returned_final).append("<td class = 'from10_cell_2'>" + (quotient % 2) + "</td>");
}




$(document).ready(function() {
	$('.venn_left').on("click", function() {
		reset_venn();
		$('#venn_left').css("fill", "orange");
	})
})


$(document).ready(function() {
	$('.venn_right').on("click", function() {
		reset_venn();
		$('#venn_right').css("fill", "lime");
	})
})


$(document).ready(function() {
	$('.venn_intersection').on("click", function() {
		reset_venn();
		$('#venn_intersection').css("fill", "red");
	})
})

function reset_venn() {
	$('#venn_left').css("fill", "#FFCC99").css("stroke-width", "0.258423");
	$('#venn_right').css("fill", "#99FFCC").css("stroke-width", "0.258423");
	$('#venn_intersection').css("fill", "#FFAAFF").css("stroke-width", "0.258423");
}






let y_axis_of_trigger;

$(window).on("load resize", function() {
	y_axis_of_trigger = $("#lets_show_logical_operation").offset().top;
})



$(window).scroll(function() {
	let scrolled = $(window).scrollTop();
	if (scrolled > y_axis_of_trigger) {
		$("#logical_operation_button_div").parent().removeClass("hidden");
	}
})






$(document).ready(function() {
	$('#logical_operation_button0').on("click", function() {
		$(".venn_left_word").css("fill", "blue");
		$(".venn_right_word").css("fill", "blue");
		$(".venn_intersection_word").css("fill", "blue");
		$(".venn_none_word").css("fill", "none");
		$("#answer_logical").text("動物または植物=>生物全部が対象です。");
	})
})

$(document).ready(function() {
	$('#logical_operation_button1').on("click", function() {
		$(".venn_left_word").css("fill", "none");
		$(".venn_right_word").css("fill", "none");
		$(".venn_intersection_word").css("fill", "blue");
		$(".venn_none_word").css("fill", "none");
		$("#answer_logical").text("動物かつ植物=>動物と植物の特徴を併せ持つミドリムシのみが対象です。");
	})
})

$(document).ready(function() {
	$('#logical_operation_button2').on("click", function() {
		$(".venn_left_word").css("fill", "none");
		$(".venn_right_word").css("fill", "blue");
		$(".venn_intersection_word").css("fill", "blue");
		$(".venn_none_word").css("fill", "blue");
		$("#answer_logical").text("動物ではない=>動物以外のすべてが対象です。");
	})
})

$(document).ready(function() {
	$('#logical_operation_button3').on("click", function() {
		$(".venn_left_word").css("fill", "blue");
		$(".venn_right_word").css("fill", "blue");
		$(".venn_intersection_word").css("fill", "none");
		$(".venn_none_word").css("fill", "none");
		$("#answer_logical").text("動物か植物のどちらか片方のみ=>動物と植物の特徴を併せ持つミドリムシは除かれます。(動物でも植物でもない消しゴム・宇宙人も対象外)");
	})
})









