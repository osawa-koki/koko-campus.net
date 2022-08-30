"use strict";

const DEBUG_MODE = true;


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
	you: function() {
		return (this.myself === CELL_STATE.black) ? CELL_STATE.white : CELL_STATE.black;
	},
	my_turn: true,
	counter: 4,
	skipped: false,
	reset: function() {
		this.counter = 4;
	},
}

const [board] = getElm(["board"]);
const cells = [];
const cellStatuses = new Array(ITEM_COUNT ** 2).fill(CELL_STATE.free);

// fx

const whereAmI = self => cells.indexOf(self);

const offsetToNext = [1, 9, 8, 7, -1, -9, -8, -7];
const toTheEdge = index => [
	(ITEM_COUNT - 1) - (index % ITEM_COUNT),
	min([(ITEM_COUNT - 1) - (index % ITEM_COUNT), ((ITEM_COUNT * (ITEM_COUNT - 1) + (index % ITEM_COUNT) - index) / ITEM_COUNT)]), 
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

function areasToPutItem(index, state) {
	const puttableCells = [];
	const squareNumbers = toTheEdge(index);
	doNtimes(ITEM_COUNT, i => {
		const possiblyToPut = [];
		const offset = offsetToNext[i];
		const squareNumber = squareNumbers[i];
		const nextStatus = cellStatuses[index + offset];
		if (nextStatus === CELL_STATE.free || nextStatus === state) return;
		possiblyToPut.push(index + offset);
		for (let tillEnd = 0; tillEnd < squareNumber - 1; tillEnd++) {
			const targetIndex = index + offset * 2 + offset * tillEnd;
			const targetState = cellStatuses[targetIndex];
			if (targetState === CELL_STATE.free) continue;
			if (targetState === state) {
				push(possiblyToPut, puttableCells);
				break;
			}
			possiblyToPut.push(targetIndex);
		};
	});
	return puttableCells;
}

function likelyToPut(index, state) {
	if (cellStatuses[index] !== CELL_STATE.free) return false;
	const puttableCells = areasToPutItem(index, state);
	if (puttableCells.length === 0) return false;
	return puttableCells;
}

function likelyToPutFromThis() {
	if (!env.my_turn) return;
	Array.from(document.getElementsByClassName("likely")).map(element => (element !== this) ? element.classList.remove("likely") : null);
	const myPosition = whereAmI(this);
	const puttableCells = likelyToPut(myPosition, env.myself);
	if (!puttableCells) return;
	if (!this.classList.contains("likely")) {
		this.classList.add("likely");
		return;
	}
	setter(myPosition, env.myself);
	setTimeout(() => {
		looper(puttableCells, cell => setter(cell, env.myself));
		botInit();
		setTimeout(() => {
			botSolver();
			setTimeout(() => {
				botEnd();
			}, 1000);
		}, 1000);
	}, 100);
}


function botInit() {
	env.my_turn = false;
	yourSide.classList.add("solving");
}

function botSolver() {
	yourSide.classList.remove("solving")
	yourSide.classList.add("solved");
	setTimeout(() => {
		const turningCount = filter(numbers => numbers !== null, looper(fromAtoB(0, ITEM_COUNT ** 2, 1, false), point => {
			const puttablePoints = areasToPutItem(point, env.you());
			if (puttablePoints.length === 0) return null;
			return {index: point, puttablePoints: puttablePoints};
		}));
		const selected = turningCount[random(1, turningCount.length) - 1];
		setter(selected.index, env.you());
		console.log(" ##### ##### ##### ");
		console.log(turningCount);
		console.log(selected);
		setTimeout(() => {
			looper(selected.puttablePoints, cell => setter(cell, env.you()));
		}, 1000);
	}, 700);
}

function botEnd() {
	env.my_turn = true;
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
	reset();
})();


function reset() {
	looper(CENTER_POINTS, (points, _) => {
		setter(points[0], CELL_STATE.white)
		setter(points[1], CELL_STATE.black)
	});
}

const debug = {
	syncChecker: function() {
		doNtimes(ITEM_COUNT ** 2, i => {
			console.log(` ***** **(${i})** ***** `);
			console.log(` DOM -> ${cells[i].classList} `);
			console.log(` LIST -> ${cellStatuses[i]} `);
			console.log(" ***** ***** ***** ");
		});
	},
	showIndex: function() {
		looper(cells, (cell, i) => {
			cell.textContent = i;
		});
	},
};

if (DEBUG_MODE) {
	debug.showIndex();
}

