"use strict";

const ITEM_COUNT = 9;
const ITEM_COUNT_V = ITEM_COUNT ** 2;
const [board] = getElm(["board"]);
const cells = [];

const CELL_STATE = {
	free: 0,
	mine: 1,
	yours: 2,
};

const cellStatuses = new Array(ITEM_COUNT ** 2).fill(CELL_STATE.free);

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

const komas = {
	yours: [],
	mine: [],
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

const komaInstance = (koma, team, index) => ({
	koma: koma,
	belong: team,
	index: index,
	evoluted: false,
	documentObject: null,
});



function mover() {
	
}


function setter() {

}


function reset() {
	// 元のデータを全て削除
	for (const key in komaOrder) {
		const value = komaOrder[key];
		looper(value, v => {
			{ // your
				const [komaObj] = mkElm(["div"]);
				komaObj.classList.add("ofYours");
				komaObj.classList.add(komaName[key]);
				cells[v].appendChild(komaObj);
			}
			{ // me
				const [komaObj] = mkElm(["div"]);
				komaObj.classList.add("ofMine");
				komaObj.classList.add(komaName[key]);
				cells[ITEM_COUNT_V - v - 1].appendChild(komaObj);
			}
		});
	}
}


