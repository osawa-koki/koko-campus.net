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

const TIME = {
	thinkingTime: 1000,
	comeUpWith: 700,
	fstPutSurroundFollows: 150,
	turnOut: 300,
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

const offsetToNext = [-9, -8, -7, -1, 1, 7, 8, 9];
const toTheEdge = index => [
	Math.min(index % ITEM_COUNT, (index - (index % ITEM_COUNT)) / ITEM_COUNT),
    (index - (index % ITEM_COUNT)) / ITEM_COUNT,
	Math.min((ITEM_COUNT - 1) - (index % ITEM_COUNT), (index - (index % ITEM_COUNT)) / ITEM_COUNT),
    index % 8,
	(ITEM_COUNT - 1) - (index % ITEM_COUNT),
	Math.min(index % ITEM_COUNT, (ITEM_COUNT * (ITEM_COUNT - 1) + (index % ITEM_COUNT) - index) / ITEM_COUNT),
	(ITEM_COUNT * (ITEM_COUNT - 1) + (index % ITEM_COUNT) - index) / 8,
	Math.min((ITEM_COUNT - 1) - (index % ITEM_COUNT), ((ITEM_COUNT * (ITEM_COUNT - 1) + (index % ITEM_COUNT) - index) / ITEM_COUNT)),
]; 


function setter(index, state) {
	cells[index].classList.remove(...filter(a => a !== "cell", cells[index].classList));
	cells[index].classList.add((state === CELL_STATE.white) ? "white" : (state === CELL_STATE.black) ? "black" : "");
	cellStatuses[index] = state;
}

function areasToPutItem(index, state) {
	if (cellStatuses[index] !== CELL_STATE.free) return [];
	const puttableCells = [];
	const squareNumbers = toTheEdge(index);
	doNtimes(DIRECTION_COUNT, i => {
		const possiblyToPut = [];
		const offset = offsetToNext[i];
		const squareNumber = squareNumbers[i];
		const nextStatus = cellStatuses[index + offset];
		if (nextStatus === CELL_STATE.free || nextStatus === state) return;
		possiblyToPut.push(index + offset);
		for (let tillEnd = 0; tillEnd < squareNumber - 1; tillEnd++) {
			const targetIndex = index + offset * 2 + offset * tillEnd;
			if (targetIndex < 0 || ITEM_COUNT ** 2 - 1 < targetIndex) break;
			const targetState = cellStatuses[targetIndex];
			if (targetState === CELL_STATE.free) break;
			if (DEBUG_MODE && state === env.you()) console.log(` TARGET | ${index} -> ${targetIndex} (${targetState})`);
			if (targetState === state) {
				push(possiblyToPut, puttableCells);
				if (DEBUG_MODE && state === env.you()) console.log(` TARGET_END | ${index} -> ${targetIndex} (${targetState})`);
				break;
			} else {
				possiblyToPut.push(targetIndex);
			}
		};
	});
	if (DEBUG_MODE && state === env.you()) console.log(" ##### ##### ##### ##### ##### ");
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
	const index = whereAmI(this);
	const puttableCells = likelyToPut(index, env.myself);

	if (!puttableCells) return;
	if (!this.classList.contains("likely")) {
		this.classList.add("likely");
		return;
	}
	setter(index, env.myself);
	setTimeout(() => {
		looper(puttableCells, cell => setter(cell, env.myself));
		botInit();
	}, TIME.fstPutSurroundFollows);
}


function botInit() {
	env.my_turn = false;
	yourSide.classList.add("solving");
	setTimeout(() => {
		botSolver();
	}, TIME.thinkingTime);
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
		if (turningCount.length === 0) {
			skipped();
			return;
		}
		const selected = turningCount[random(1, turningCount.length) - 1];
		setter(selected.index, env.you());
		setTimeout(() => {
			looper(selected.puttablePoints, cell => setter(cell, env.you()));
			setTimeout(() => {
				botEnd();
			}, TIME.turnOut);
		}, TIME.fstPutSurroundFollows);
	}, TIME.comeUpWith);
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
	autoSyncChecker: function() {
		doNtimes(ITEM_COUNT ** 2, i => {
			const object = cells[i];
			const state = cellStatuses[i];
			if (object.classList.contains("black") && state !== CELL_STATE.black) console.log(`WARNING : ${i} diff`);
			if (object.classList.contains("white") && state !== CELL_STATE.white) console.log(`WARNING : ${i} diff`);
		});
	},
};

if (DEBUG_MODE) {
	debug.showIndex();
}



const [settingImg, settingBox] = getElm(["settingImg", "settingBox"]);

settingImg.addEventListener("click", function() {
	if (this.classList.contains("on")) {
		this.classList.remove("on");
	} else {
		this.classList.add("on");

	}
});











const EVALUATE_FX_PARAMS = [
	 30, -12,  0, -1, -1,  0, -12,  30,
	-12, -15, -3, -3, -3, -3, -15, -12,
	  0,  -3,  0, -1, -1,  0,  -3,   0,
	 -1,  -3,  0, -1, -1, -1,  -3,  -1,
	 -1,  -3,  0, -1, -1, -1,  -3,  -1,
	  0,  -3,  0, -1, -1,  0,  -3,   0,
	-12, -15, -3, -3, -3, -3, -15, -12,
	 30, -12,  0, -1, -1,  0, -12,  30,
]


