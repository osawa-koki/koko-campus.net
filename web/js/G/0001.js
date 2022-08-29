"use strict";

const ITEM_COUNT = 8;
const DIRECTION_COUNT= 8;
const CENTER_POINTS = [[27, 28], [36, 35]];

const CELL_STATE = {
	free: 0,
	white: 1,
	black: 2,
}

const env = {
	myself: CELL_STATE.white,
	my_chance: true,
}

const [board] = getElm(["board"]);
const cells = [];
const cellStatuses = new Array(ITEM_COUNT ** 2).fill(CELL_STATE.free);

// fx

const whereAmI = self => cells.indexOf(self);

const offsetToNext = [-9, -8, -7, -1, 1, 7, 8, 9];
const toTheEdge = index => [
	(ITEM_COUNT - 1) - (index % ITEM_COUNT),
	min([(ITEM_COUNT - 1) - (index % ITEM_COUNT), (ITEM_COUNT * (ITEM_COUNT - 1) + (index % ITEM_COUNT) - index / ITEM_COUNT)]), 
	(ITEM_COUNT * (ITEM_COUNT - 1) + (index % ITEM_COUNT) - index) / 8,
	min([index % ITEM_COUNT, (ITEM_COUNT * (ITEM_COUNT - 1) + (index % ITEM_COUNT) - index) / ITEM_COUNT]),
    index % 8,
    min([index % ITEM_COUNT, (index - (index % ITEM_COUNT)) / ITEM_COUNT]),
    (index - (index % ITEM_COUNT)) / ITEM_COUNT,
    min([(ITEM_COUNT - 1) - (index % ITEM_COUNT), (index - (index % ITEM_COUNT)) / ITEM_COUNT]),
]; 


function setter(index, state) {
	cells[index].classList.remove(...filter(a => a !== "cell", cells[index].classList));
	cells[index].classList.add((state === CELL_STATE.white) ? "white" : (state === CELL_STATE.black) ? "black" : "");
	cellStatuses[index] = state;
}

function areasToPutItem(index) {
	const puttableCells = [];
	const squareNumbers = toTheEdge(index);
	looper(offsetToNext, (offset, i) => {
		const possiblyToPut = [];
		const squareNumber = squareNumbers[i];
		const nextStatus = cellStatuses[index + offset];
		if (nextStatus === CELL_STATE.free || nextStatus === env.myself) return;
		possiblyToPut.push(index + offset);
		for (let tillEnd = 0; tillEnd < squareNumber - 1; tillEnd++) {
			const targetIndex = index + offset * 2 + offset * tillEnd;
			const targetState = cellStatuses[targetIndex];
			if (targetState === CELL_STATE.free) continue;
			if (targetState === env.myself) {
				push(possiblyToPut, puttableCells);
				break;
			}
			possiblyToPut.push(targetIndex);
		};
	});
	return puttableCells;
}

function likelyToPut(index) {
	if (cellStatuses[index] !== CELL_STATE.free) return false;
	const puttableCells = areasToPutItem(index);
	if (puttableCells.length === 0) return false;
	return puttableCells;
}

function likelyToPutFromThis() {
	if (!env.my_chance) return;
	Array.from(document.getElementsByClassName("likely")).map(element => (element !== this) ? element.classList.remove("likely") : null);
	const myPosition = whereAmI(this);
	const puttableCells = likelyToPut(myPosition);
	console.log(puttableCells);
	if (!puttableCells) return;
	if (!this.classList.contains("likely")) {
		this.classList.add("likely");
		return;
	}
	setter(myPosition, env.myself);
	botInit();
	setTimeout(() => {
		botSolver();
		setTimeout(() => {
			botEnd();
		}, 1000);
	}, 1000);
}


function botInit() {
	env.my_chance = false;
	yourSide.classList.add("solving");
}

function botSolver() {
	yourSide.classList.remove("solving")
	yourSide.classList.add("solved");
}

function botEnd() {
	env.my_chance = true;
	yourSide.classList.remove("solved");
}


const [yourSide, mySide, botImg] = getElm(["yourSide", "mySide", "botImg"]);
const BOT_IMAGES_RANGE = [20, 25];

(() => { // init
	botImg.src = `/?G/${random(...BOT_IMAGES_RANGE)}.png`;

	append(doNtimes(ITEM_COUNT ** 2, () => {
		const [cell] = mkElm(["div"]);
		cell.classList.add("cell");
		cell.addEventListener("click", likelyToPutFromThis);
		cells.push(cell);
		return cell;
	}), board);
	looper(CENTER_POINTS, (points, _) => {
		setter(points[0], CELL_STATE.white)
		setter(points[1], CELL_STATE.black)
	});
})();





