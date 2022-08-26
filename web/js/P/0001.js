
const [n1, n2, n3, n4] = getElm(["n1", "n2", "n3", "n4"]);
const [button, info] = getElm(["button", "info"]);

n1.focus();
Array.from(document.getElementById("inputBox").getElementsByTagName("input")).forEach(input => {
	input.addEventListener("keydown", event => {
		input.value = "";
		info.textContent = (event.key.match(/\d/)) ? "" : "数字(0-9)を入力してください。";
	});
	input.addEventListener("keyup", event => {
		if (event.key === "-") {
			input.value = "";
		} else { // フォーカスを次に移動
			if (input !== n4) {
				input.nextElementSibling.focus();
			} else {
				document.getElementById("n1").focus();
			}
		}
		let ok = true;
		Array.from(document.getElementsByTagName("input")).forEach(event => {if (event.value === "") ok = false});
		if (ok) {
			button.addEventListener("click", push);
			button.classList.remove("pushed");
		}
	});
});

function push() {
	button.removeEventListener("click", push);
	button.classList.add("pushed");
	const list = Array.from(document.getElementsByTagName("input")).map(n => parseInt(n.value));
	const results = make10(list);
	const [resultTbody, calcTbody] = getElm(["resultTbody", "calcTbody"]);
	[resultTbody, calcTbody].forEach(tbody => removeChildren(tbody));
	results["all"].forEach(result => {
		const [tr, td1, td2, td3] = mkElm(["tr", "td", "td", "td"]);
		td1.textContent = pretifyOperant(result);
		td2.textContent = "=";
		td3.textContent = calculate(result);
		tr.appendChild(td1);
		tr.appendChild(td2);
		tr.appendChild(td3);
		calcTbody.appendChild(tr);
	});
	if (results["ok"].length === 0) {
		const [tr, td] = mkElm(["tr", "td"]);
		td.textContent = "10になる演算を見つけられませんでした。";
		td.setAttribute("colspan", "3");
		tr.appendChild(td);
		resultTbody.appendChild(tr);
	} else {
		results["ok"].forEach(result => {
			const [tr, td1, td2, td3] = mkElm(["tr", "td", "td", "td"]);
			td1.textContent = pretifyOperant(result);
			td2.textContent = "=";
			td3.textContent = calculate(result);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			resultTbody.appendChild(tr);
		});
	}
	document.getElementById("resultLength").textContent = `${results["ok"].length}件の演算`;
	document.getElementById("calcLength").textContent = `${results["all"].length}件の演算`;
}
function make10(list) {
	const answer = {
		"ok" : [],
		"all" : []
	};
	const numberPatterns = getAllPatterns(list);
	const operantPatterns = dupPermutation(["+", "-", "*", "/"], list.length - 1);
	const formulasWithoutBracket = putBetween(numberPatterns, operantPatterns);
	const formulas = Array.from(new Set(putBrackets(formulasWithoutBracket)));
	formulas.forEach(formula => {
		answer["all"].push(formula);
		if (calculate(formula) === 10) {
			answer["ok"].push(formula);
			ok = true;
		}
	});
	return answer;
}
function putBrackets(formulas) {
	// FIX ME!!!
	const answer = [];
	formulas.forEach(formula => {
		answer.push(formula);
		if (!formula.match(/^\d[\+\-]\d[\+\-]\d[\+\-]\d$/) && !formula.match(/^\d[\*\/]\d[\*\/]\d[\*\/]\d$/)) { // 4つ全て和算演算ないしは積商演算以外のケース
			if (formula.match(/^\d[\+\-]\d[\+\-]\d[\*\/]/)) { // 和差演算が2つ + 「×|÷」
				answer.push(formula.replace(/^\d[\+\-]\d[\+\-]\d/, `($&)`));
			} else if (formula.match(/[\*\/]\d[\+\-]\d[\+\-]\d$/)) { // 「×|÷」 + 和差演算が2つ
				answer.push(formula.replace(/\d[\+\-]\d[\+\-]\d$/, `($&)`));
			} else if ((formula.match(/\d[\+\-]\d/g) || []).length === 2) { // 「+|-」「*|/」「+|-」の順番の場合
				answer.push(formula.replace(/\d[\+\-]\d/, `($&)`));
			}
			if (formula.match(/^\d[\+\-]\d[\*\/]/)) { // 最初の演算子が和差演算である場合
				answer.push(formula.replace(/^\d[\+\-]\d/, `($&)`));
			} else if (formula.match(/[\*\/]\d[\+\-]\d$/)) { // 最後の演算子が和差演算である場合
				answer.push(formula.replace(/\d[\+\-]\d$/, `($&)`));
			}
			if (formula.match(/^\d[\*\/]\d[\+\-]\d[\*\/]\d$/)) { // 10puzzleの高難易度の問題ではこれが必要になる
				answer.push(formula.replace(/^\d[\*\/]\d[\+\-]\d/, `($&)`));
				answer.push(formula.replace(/\d[\+\-]\d[\*\/]\d$/, `($&)`));
			}
		}
	});
	return answer;
}
function putBetween(x, y) {
	const answer = [];
	for (let i = 0; i < x.length; i++) {
		for (let j = 0; j < y.length; j++) {
			answer.push(putBetween2(x[i], y[j]));
		}
	}
	return answer;
}
function putBetween2 (x, y) {
	const answer = [];
	for (let i = 0; i < x.length; i++) {
		if (i === x.length - 1) {
			answer.push(x[i]);
		} else {
			answer.push(x[i]);
			answer.push(y[i]);
		}
	}
	return answer.join("");
}

function dupPermutation (nums, k) {
	const answer = [];
	if (nums.length < k) {
		return [];
	}
	if (k === 1) {
		for (let i = 0; i < nums.length; i++) {
			answer[i] = [nums[i]];
		}
	} else {
		for (let i = 0; i < nums.length; i++) {
			const parts = nums.slice(0);
			parts.splice(i, 1);
			const row = dupPermutation(nums, k - 1);
			for (let j = 0; j < row.length; j++) {
				answer.push([nums[i]].concat(row[j]));
			}
		}
	}
	return answer;
}

function calculate(arg) {
	return Function(`"use strict"; return (` + arg + `)`)();
}

function getAllPatterns (nums) {
	const answer = [];
	if (nums.length === 1) {
		for (let i = 0; i < nums.length; i++) {
			answer[i] = [nums[i]];
		}
	} else {
		for (let i = 0; i < nums.length; i++) {
			const parts = nums.slice(0);
			parts.splice(i, 1)[0];
			const row = getAllPatterns(parts, nums.length - 1)
			for (let j = 0; j < row.length; j++) {
				answer.push([nums[i]].concat(row[j]));
			}
		}
	}
	return answer;
}
function pretifyOperant(x) {
	return x.replace(/\*/g, "×").replace(/\//g, "÷");
}

["resultBox", "calcBox"].forEach(box => {
	document.getElementById(box).addEventListener("scroll", function() {
		this.firstElementChild.style.top = `${this.scrollTop}px`;
		this.firstElementChild.nextElementSibling.style.bottom = `-${this.scrollTop}px`;
	});
});