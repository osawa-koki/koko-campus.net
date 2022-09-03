"use strict";

const DEBUG_MODE = false;













const BOT_IMAGES_RANGE = [20, 25];

(() => {
	botImg.src = `/?G/${random(...BOT_IMAGES_RANGE)}.png`;
	append(doNtimes(ITEM_COUNT_V, () => {
		const [cell] = mkElm(["div"]);
		cell.classList.add("cell");
		//cell.addEventListener("click", likelyToPutFromThis);
		cells.push(cell);
		return cell;
	}), board);
	reset();
	//setDefaultSetting();
	//gameEnd(GAME_END_STATUS.init);
})();

const debug = {
	showIndex: function() {
		looper(cells, (cell, i) => cell.textContent = i);
	},
};

if (DEBUG_MODE) {
	debug.showIndex();
}
