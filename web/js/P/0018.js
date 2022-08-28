"use strict";

const ITEM_COUNT = 9;

const itemBoxes = [];


const rowcolumn2index = (row, column) => row * ITEM_COUNT + column;
const index2rowcolumn = index => [index % ITEM_COUNT, Math.floor(index / ITEM_COUNT)];
const whereAmI_index = myself => itemBoxes.indexOf(myself);
const whereAmI_rowcolumn = myself => index2rowcolumn(whereAmI_index(myself));
const obtainObjectFromRowColumn = (row, column) => itemBoxes[rowcolumn2index(row, column)];
const obtainValueFromRowColumn = (row, column) => itemBoxes[rowcolumn2index(row, column)].value;
const obtainAllIndexesOfRow = row => fromAtoB(row * ITEM_COUNT, row * ITEM_COUNT + ITEM_COUNT - 1);
const obtainAllIndexesOfColumn = column => fromAtoB(column, ITEM_COUNT ** 2, ITEM_COUNT);
const obtainAllIndexesOfBlock = (row, column) => mixupMesh(fromAtoB(Math.floor(row / 3) * 3), fromAtoB(Math.floor(column / 3) * 3));

const validationCheck = (array_9x9, [row, column], i) => (rowCheck(array_9x9, row, i) && columnCheck(array_9x9, column, i) && blockCheck(array_9x9, [row, column], i));
const rowCheck = (array_9x9, row, i) => countSatisfy(obtainAllIndexesOfRow(row), index => array_9x9[index].value == i) === 1;
const columnCheck = (array_9x9, column, i) => countSatisfy(obtainAllIndexesOfColumn(column), index => array_9x9[index].value == i) === 1;
const blockCheck = (array_9x9, [row, column], i) => countSatisfy(obtainAllIndexesOfBlock(row, column), index => array_9x9[index].value == i) === 1;


(() => { // init
	const items = doNtimes(ITEM_COUNT ** 2, () => {
		const [item] = mkElm(["input"]);
		item.type = "number";
		item.maxLength = "1";
		item.addEventListener("input", inputCheck);
		return item;
	});
	const [itemContainer] = getElm(["sudokuBox"]);
	append(items, itemContainer);
	push(items, itemBoxes);
})();

function inputCheck() {
	const numbers = map(input => input.value || 0, itemBoxes);
	console.log(numbers);
	if (!validationCheck(numbers, index2rowcolumn(whereAmI_index(this)))) {
		console.log(this);
		return;
	}
	console.log("OK");
}


document.getElementById("button").addEventListener("click", function() {
	
})








