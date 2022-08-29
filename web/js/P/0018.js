"use strict";

const ITEM_COUNT = 9;

const itemBoxes = [];

const [button, resultContainer] = getElm(["button", "resultContainer"]);

const rowcolumn2index = (row, column) => row * ITEM_COUNT + column;
const index2rowcolumn = index => [Math.floor(index / ITEM_COUNT), index % ITEM_COUNT];
const whereAmI_index = myself => itemBoxes.indexOf(myself);
const whereAmI_rowcolumn = myself => index2rowcolumn(whereAmI_index(myself));
const obtainObjectFromRowColumn = (row, column) => itemBoxes[rowcolumn2index(row, column)];
const obtainValueFromRowColumn = (row, column) => itemBoxes[rowcolumn2index(row, column)].value;
const obtainAllIndexesOfRow = row => fromAtoB(row * ITEM_COUNT, row * ITEM_COUNT + ITEM_COUNT - 1);
const obtainAllIndexesOfColumn = column => fromAtoB(column, ITEM_COUNT ** 2, ITEM_COUNT, false);
const obtainAllIndexesOfBlock = (row, column) => map(rowcolumn => rowcolumn2index(rowcolumn[0], rowcolumn[1]), mixupMesh(fromAtoB(Math.floor(row / 3) * 3, Math.floor(row / 3) * 3 + 2), fromAtoB(Math.floor(column / 3) * 3, Math.floor(column / 3) * 3 + 2)));

const validationCheck = (numbers, [row, column], number) => rowCheck(numbers, row, number) && columnCheck(numbers, column, number) && blockCheck(numbers, [row, column], number);
const rowCheck = (numbers, row, number, allowOne = false) => countSatisfy(obtainAllIndexesOfRow(row), index => numbers[index] == number) === ((allowOne) ? 1 : 0);
const columnCheck = (numbers, column, number, allowOne = false) => countSatisfy(obtainAllIndexesOfColumn(column), index => numbers[index] == number) === ((allowOne) ? 1 : 0);
const blockCheck = (numbers, [row, column], number, allowOne = false) => countSatisfy(obtainAllIndexesOfBlock(row, column), index => numbers[index] == number) === ((allowOne) ? 1 : 0);

const original = [];
const memoryProtecter = {
	MAX: 0,
	step: 1000,
	current: 0,
	locked: false,
	reset: function() {
		this.current = 0;
		this.locked = false;
		this.MAX += this.step;
	},
	stop: function() {
		return this.MAX < this.current;
	},
};

(() => { // init
	const items = doNtimes(ITEM_COUNT ** 2, () => {
		const [item] = mkElm(["input"]);
		item.type = "number";
		item.addEventListener("input", inputCheck);
		return item;
	});
	const [itemContainer] = getElm(["sudokuBox"]);
	append(items, itemContainer);
	push(items, itemBoxes);
})();

function inputCheck() {
	if (this.value === "0") {
		this.value = "";
		return;
	}
	this.value = this.value.slice(-1);
	looper(itemBoxes, element => element.classList.remove("warning"));
	const numbers = map(input => input.value || 0, itemBoxes);
	if (!allIndex(numbers, (number, i) => {
		const [row, column] = index2rowcolumn(i);
		if (number === 0) return true;
		let IsOk = true;
		if (!rowCheck(numbers, row, number, true)) {
			looper(obtainAllIndexesOfRow(row), item => itemBoxes[item].classList.add("warning"));
			IsOk = false;
		}
		if (!columnCheck(numbers, column, number, true)) {
			looper(obtainAllIndexesOfColumn(column), item => itemBoxes[item].classList.add("warning"));
			IsOk = false;
		}
		if (!blockCheck(numbers, [row, column], number, true)) {
			looper(obtainAllIndexesOfBlock(row, column), item => itemBoxes[item].classList.add("warning"));
			IsOk = false;
		}
		return IsOk;
	})) {
		button.classList.add("invalid");
		return;
	}
	button.classList.remove("invalid");
}


button.addEventListener("click", solverInit);

function solverInit() {
	if (this.classList.contains("invalid")) return;
	memoryProtecter.reset();
	removeChildren(resultContainer);
	const numbers = map(input => parseInt(input.value) || 0, itemBoxes);
	original.splice(0);
	push(numbers, original);
	solver(numbers);
}


function solver(numbers, index = 0) {
	memoryProtecter.current++;
	if (memoryProtecter.stop()) {
		if (!memoryProtecter.locked) {
			memoryProtecter.locked = true;
			pause(numbers, index); // オーバーフロー防止後の再開処理については未実装
		}
		return;
	};
	if (ITEM_COUNT ** 2 === index) return resultPlacer(numbers); // stop rec
	if (numbers[index] !== 0) return solver(numbers, index + 1);
	if (numbers[index] === 0) {
		for (let i = 1; i <= ITEM_COUNT; i++) {
			if (!validationCheck(numbers, index2rowcolumn(index), i)) continue;
			numbers[index] = i;
			solver(numbers, index + 1);
		}
		numbers[index] = 0;
		return;
	}
}

function resultPlacer(numbers) {
	const [boxOut, boxIn] = mkElm(["div", "div"]);
	boxOut.classList.add("sudokuContainer");
	boxIn.classList.add("sudokuBox");
	append(doNtimes(ITEM_COUNT ** 2, i => {
		const number = numbers[i];
		const [item] = mkElm(["div"]);
		item.textContent = number;
		if (number === original[i]) {
			item.classList.add("original");
		}
		return item;
	}), boxIn);
	boxOut.addEventListener("click", zoom);
	append([boxIn], boxOut);
	append([boxOut], resultContainer);
	return true;
}


// オーバーフロー防止後の再開処理については未実装
const tempRepo = {
	numbers: [],
	index: 0,
	reset: function() {
		this.numbers.splice(0);
		this.index = 0;
	},
};
function pause(numbers, index) {
	tempRepo.reset();
	push(map((a, i) => (i < index) ? a : 0, numbers), tempRepo.numbers);
	tempRepo.index = index;
	const [box, info, button] = mkElm(["div", "div", "div"]);
	box.classList.add("memoryProtecterAlert");
	info.textContent = "大量の計算によるオーバーフロー防止のため、処理を中断しました。";
	button.textContent = "RESTART";
	button.classList.add("restart");
	button.addEventListener("click", restart);
	//append([info, button], box);
	append([info], box);
	append([box], resultContainer);
}
function restart() {
	this.parentNode.remove();
	memoryProtecter.reset();
	const numbers = tempRepo.numbers.slice(0, tempRepo.numbers.length);
	const index = tempRepo.index;
	solver(numbers, index - 1);
}


function zoom(event) {
	event.stopPropagation();
	if (this.classList.contains("zoomed")) {
		this.classList.remove("zoomed");
		return;
	}
	this.classList.add("zoomed");
}



