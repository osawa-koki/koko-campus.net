






document.getElementById("q_theme").onclick = function() {
	let now = document.getElementById("now").textContent;
	let next = parseFloat(now) + 1;
	document.getElementById("now").textContent = next;

	let progress = Math.ceil(100 * now / 8);

	if (progress >= 100) {
		progress = 100;
	}
	
	let progress_show = progress + "%";
	document.getElementById("progress").textContent = progress_show;

	if (document.getElementById("state").textContent == 0) {
		document.getElementById("login_status").classList.add("hidden");
	}



	document.getElementById("comment").textContent = "";
	document.getElementById("cm1").textContent = "";
	document.getElementById("cm2").textContent = "";
	document.getElementById("cm3").textContent = "";
	document.getElementById("cm4").textContent = "";
	document.getElementById("word_tf").textContent = "";




	document.getElementById("state").textContent = 1;






	document.getElementById("q_theme").textContent = "touch me to skip this question♪";

	let qqq = "qqq_" + document.getElementById("now").textContent;
	let aaa = "aaa_" + document.getElementById("now").textContent;
	let bbb = "bbb_" + document.getElementById("now").textContent;
	let ccc = "ccc_" + document.getElementById("now").textContent;
	let ddd = "ddd_" + document.getElementById("now").textContent;


	document.getElementById("q_sentence").textContent = document.getElementById(qqq).textContent;

	document.getElementById("op_1").textContent = document.getElementById(aaa).textContent;
	document.getElementById("op_2").textContent = document.getElementById(bbb).textContent;
	document.getElementById("op_3").textContent = document.getElementById(ccc).textContent;
	document.getElementById("op_4").textContent = document.getElementById(ddd).textContent;

}





document.getElementById("answer1").onclick = function() {
	if (document.getElementById("state").textContent == 1) {

		let now = document.getElementById("now").textContent;

		document.getElementById("q_theme").textContent = "go next♪";

		let anan = "ttff_" + now;
		let cmcm = "cmcm_" + now;

		let aaa = "aaaaa_" + now;
		let bbb = "bbbbb_" + now;
		let ccc = "ccccc_" + now;
		let ddd = "ddddd_" + now;

		document.getElementById("comment").textContent = document.getElementById(cmcm).textContent;

		document.getElementById("cm1").textContent = document.getElementById(aaa).textContent;
		document.getElementById("cm2").textContent = document.getElementById(bbb).textContent;
		document.getElementById("cm3").textContent = document.getElementById(ccc).textContent;
		document.getElementById("cm4").textContent = document.getElementById(ddd).textContent;



		if (document.getElementById(anan).textContent == "A") {
			//Aオプションで正解だった場合
			document.getElementById("word_tf").textContent = "〇";
			document.getElementById("word_tf").style.color = "red";
		} else {
			document.getElementById("word_tf").textContent = "×";
			document.getElementById("word_tf").style.color = "blue";
			//Aオプションで不正解だった場合
		}

	document.getElementById("state").textContent = 2;
	}
	
}




document.getElementById("answer2").onclick = function() {
	if (document.getElementById("state").textContent == 1) {

		let now = document.getElementById("now").textContent;

		document.getElementById("q_theme").textContent = "go next♪";

		let anan = "ttff_" + now;
		let cmcm = "cmcm_" + now;

		let aaa = "aaaaa_" + now;
		let bbb = "bbbbb_" + now;
		let ccc = "ccccc_" + now;
		let ddd = "ddddd_" + now;

		document.getElementById("comment").textContent = document.getElementById(cmcm).textContent;

		document.getElementById("cm1").textContent = document.getElementById(aaa).textContent;
		document.getElementById("cm2").textContent = document.getElementById(bbb).textContent;
		document.getElementById("cm3").textContent = document.getElementById(ccc).textContent;
		document.getElementById("cm4").textContent = document.getElementById(ddd).textContent;



		if (document.getElementById(anan).textContent == "B") {
			//Aオプションで正解だった場合
			document.getElementById("word_tf").textContent = "〇";
			document.getElementById("word_tf").style.color = "red";
		} else {
			document.getElementById("word_tf").textContent = "×";
			document.getElementById("word_tf").style.color = "blue";
			//Aオプションで不正解だった場合
		}

	document.getElementById("state").textContent = 2;
	}
	
}


document.getElementById("answer3").onclick = function() {
	if (document.getElementById("state").textContent == 1) {

		let now = document.getElementById("now").textContent;

		document.getElementById("q_theme").textContent = "go next♪";

		let anan = "ttff_" + now;
		let cmcm = "cmcm_" + now;

		let aaa = "aaaaa_" + now;
		let bbb = "bbbbb_" + now;
		let ccc = "ccccc_" + now;
		let ddd = "ddddd_" + now;

		document.getElementById("comment").textContent = document.getElementById(cmcm).textContent;

		document.getElementById("cm1").textContent = document.getElementById(aaa).textContent;
		document.getElementById("cm2").textContent = document.getElementById(bbb).textContent;
		document.getElementById("cm3").textContent = document.getElementById(ccc).textContent;
		document.getElementById("cm4").textContent = document.getElementById(ddd).textContent;



		if (document.getElementById(anan).textContent == "C") {
			//Aオプションで正解だった場合
			document.getElementById("word_tf").textContent = "〇";
			document.getElementById("word_tf").style.color = "red";
		} else {
			document.getElementById("word_tf").textContent = "×";
			document.getElementById("word_tf").style.color = "blue";
			//Aオプションで不正解だった場合
		}

	document.getElementById("state").textContent = 2;
	}
	
}



document.getElementById("answer4").onclick = function() {
	if (document.getElementById("state").textContent == 1) {

		let now = document.getElementById("now").textContent;

		document.getElementById("q_theme").textContent = "go next♪";

		let anan = "ttff_" + now;
		let cmcm = "cmcm_" + now;

		let aaa = "aaaaa_" + now;
		let bbb = "bbbbb_" + now;
		let ccc = "ccccc_" + now;
		let ddd = "ddddd_" + now;

		document.getElementById("comment").textContent = document.getElementById(cmcm).textContent;

		document.getElementById("cm1").textContent = document.getElementById(aaa).textContent;
		document.getElementById("cm2").textContent = document.getElementById(bbb).textContent;
		document.getElementById("cm3").textContent = document.getElementById(ccc).textContent;
		document.getElementById("cm4").textContent = document.getElementById(ddd).textContent;



		if (document.getElementById(anan).textContent == "D") {
			//Aオプションで正解だった場合
			document.getElementById("word_tf").textContent = "〇";
			document.getElementById("word_tf").style.color = "red";
		} else {
			document.getElementById("word_tf").textContent = "×";
			document.getElementById("word_tf").style.color = "blue";
			//Aオプションで不正解だった場合
		}

	document.getElementById("state").textContent = 2;
	}
	
}




