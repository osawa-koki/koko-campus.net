"use strict";

const ITEM_COUNT = 9;
const ITEM_COUNT_V = ITEM_COUNT ** 2;
const [board] = getElm(["board"]);

const team = {
	free: 0,
	me: 1,
	you: 2,
};


const cells = new Array(ITEM_COUNT_V).fill(null);
const cellStatuses = new Array(ITEM_COUNT_V).fill(team.free);

const env = {
	my_turn: null,
};

const koma = {
	walker: 0,
	flyer: 1,
	corner: 2,
	flaver: 3,
	horser: 4,
	silver: 5,
	golder: 6,
	kinger: 7,
};

const komaName = {
	0: "walker",
	1: "flyer",
	2: "corner",
	3: "flaver",
	4: "horser",
	5: "silver",
	6: "golder",
	7: "kinger",
};


const komaOrder = {};
komaOrder[koma.walker] = fromAtoB(18, 26);
komaOrder[koma.flyer] = [10];
komaOrder[koma.corner] = [16];
komaOrder[koma.flaver] = [0, 8];
komaOrder[koma.horser] = [1, 7];
komaOrder[koma.silver] = [2, 6];
komaOrder[koma.golder] = [3, 5];
komaOrder[koma.kinger] = [4];

//const komas = new Array(reducer(Object.keys(komaOrder), a => komaOrder[a].length, (a, b) => a + b) * 2).fill(null);
const komas = [];

// DEPRICATED
const makeKomaInstance = (komaType, team, index, doc) => ({
	komaType: komaType,
	team: team,
	index: index,
	evoluted: false,
	doc: doc,
});


const index2coordinate = index => [index % ITEM_COUNT, Math.floor(index / ITEM_COUNT)];
const coordinate2index = ([x, y]) => y * ITEM_COUNT + x;

const isInRange = index => 0 <= index && index <= ITEM_COUNT_V - 1;
const obtainMyObject = doc => finder(komas, komaObj => komaObj.doc === doc);
const whereAmI = obj => obtainMyObject(obj).index;

function mover() {
	
}


function setter() {

}


function likelyToPutFromThis() {
	removeClassifiedItems("touched");
	removeClassifiedItems("movable");
	const komaInstance = obtainMyObject(this);
	if (komaInstance.team !== team.me) return;
	const movablePoints = findMovable(komaInstance);
	this.classList.add("touched");
	looper(movablePoints, movablePoint => cells[movablePoint].classList.add("movable"));
}


function findMovable(komaInstance) {
	console.log(komaInstance);
	const {komaType: komaType, team: belong, index: index, doc: doc} = komaInstance;
	if (komaType === koma.walker) {
		const coordinate = index2coordinate(index);
		const next = [coordinate[0], ((belong === team.you) ? add : minus)(coordinate[1], 1)];
		if (cellStatuses[coordinate2index(next)] === belong) return [];
		if (!isInRange(coordinate2index(next))) return [];
		return [coordinate2index(next)];
	}
}


function reset() {
	looper(komas, koma => koma.doc.remove());
	komas.splice(0);
	for (const komaType in komaOrder) {
		const value = komaOrder[komaType];
		looper(value, v => {
			{ // your
				const [komaObj] = mkElm(["div"]);
				komaObj.classList.add("koma");
				komaObj.classList.add("ofYours");
				komaObj.classList.add(komaName[komaType]);
				cells[v].appendChild(komaObj);
				komaObj.addEventListener("click", likelyToPutFromThis);
				const instance = makeKomaInstance(parseInt(komaType), team.you, v, komaObj);
				komas.push(instance);
			}
			{ // me
				const [komaObj] = mkElm(["div"]);
				komaObj.classList.add("koma");
				komaObj.classList.add("ofMine");
				komaObj.classList.add(komaName[komaType]);
				cells[ITEM_COUNT_V - v - 1].appendChild(komaObj);
				komaObj.addEventListener("click", likelyToPutFromThis);
				const instance = makeKomaInstance(parseInt(komaType), team.me, ITEM_COUNT_V - v - 1, komaObj);
				komas.push(instance);
			}
		});
	}
}

const BOT_IMAGES_RANGE = [20, 25];

(() => {
	botImg.src = `/?G/${random(...BOT_IMAGES_RANGE)}.png`;
	append(doNtimes(ITEM_COUNT_V, i => {
		const [cell] = mkElm(["div"]);
		cell.classList.add("cell");
		cells[i] = cell;
		return cell;
	}), board);
	reset();
	//setDefaultSetting();
	//gameEnd(GAME_END_STATUS.init);
})();


