"use strict";

const DEBUG_MODE = false;













const debug = {
	showIndex: function() {
		looper(cells, (cell, i) => {
			const [numberBox] = mkElm(["div"]);
			numberBox.classList.add("debugNumber");
			numberBox.textContent = i;
			cell.appendChild(numberBox);
		});
	},
};

if (DEBUG_MODE) {
	debug.showIndex();
}
