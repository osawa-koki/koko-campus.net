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
	removeChildren(resultContainer);
	const numbers = map(input => parseInt(input.value) || 0, itemBoxes);
	solver(numbers);
}


function solver(numbers, index = 0) {
	if (ITEM_COUNT ** 2 <= index) {
		resultPlacer(numbers);
		return true;
	}
	if (numbers[index] !== 0) {
		if (solver(numbers, index + 1)) return true;
		return false;
	}
	if (numbers[index] === 0) {
		for (let i = 1; i <= ITEM_COUNT; i++) {
			if (!validationCheck(numbers, index2rowcolumn(index), i)) continue;
			numbers[index] = i;
			if (solver(numbers, 0, index + 1)) return true;
		}
		numbers[index] = 0;
		return false;
	}
}

function resultPlacer(numbers) {
	const [box] = mkElm(["div"]);
	box.classList.add("sudokuBox");
	append(doNtimes(ITEM_COUNT ** 2, i => {
		const number = numbers[i];
		const [item] = mkElm(["div"]);
		item.textContent = number;
		return item;
	}), box);
	append([box], resultContainer);
}




