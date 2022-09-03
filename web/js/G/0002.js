"use strict";

const ITEM_COUNT = 9;
const ITEM_COUNT_V = ITEM_COUNT ** 2;

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
});



function mover() {
	
}


function reset() {

}



(() => { // init

})();