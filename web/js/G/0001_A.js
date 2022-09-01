"use strict";

const DEBUG_MODE = false;

const [startButton, yourOnBlack, yourOnWhite] = getElm(["startButton", "yourOnBlack", "yourOnWhite"]);


function yourTurn() {
	if (env.finished()) return;
	const possiblePoints = takePossiblePoints(env.myself);
	if (possiblePoints.length === 0) {
		if (env.skipped) {
			gameEnd(GAME_END_STATUS.skipped);
		} else {
			env.skipped = true;
			skipped();
		}
		env.my_turn = false;
		return;
	}
	env.skipped = false;
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
	env.my_turn = false;
	setter(index, env.myself);
	setTimeout(() => {
		looper(puttableCells, cell => setter(cell, env.myself));
		botInit();
	}, TIME.fstPutSurroundFollows);
}


function botInit() {
	if (env.finished()) return;
	battlingField.classList.add("solving");
	setTimeout(() => {
		botSolver();
	}, TIME.thinkingTime);
}


function botSolver() {
	battlingField.classList.remove("solving")
	battlingField.classList.add("solved");
	setTimeout(() => {
		const possiblePoints = takePossiblePoints(env.you());
		if (possiblePoints.length === 0) {
			if (env.skipped) {
				gameEnd(GAME_END_STATUS.skipped);
			} else {
				env.skipped = true;
				skipped();
			}
			return;
		}
		env.skipped = false;
		const selected = botAlgo[setting.botIntelligence](possiblePoints);
		setter(selected.index, env.you());
		setTimeout(() => {
			looper(selected.puttablePoints, cell => setter(cell, env.you()));
			setTimeout(() => {
				botEnd();
				yourTurn();
			}, TIME.turnOut);
		}, TIME.fstPutSurroundFollows);
	}, TIME.comeUpWith);
}


const botAlgo = [
	(function(possiblePoints) {
		return possiblePoints[random(1, possiblePoints.length) - 1];
	}),
];

function botEnd() {
	env.my_turn = true;
	battlingField.classList.remove("solved");
}




const [intelligence, settingStatusOn, settingLogOn, settingLogOff, settingLogButtonOff] = getElm(["intelligence", "settingStatusOn", "settingLogOn", "settingLogOff", "settingLogButtonOff"])
const [onBoardAnnouncer, resultContainer] = getElm(["onBoardAnnouncer", "resultContainer"]);
const [setting2default, resetButton] = getElm(["setting2default", "resetButton"]);

const [battlingField, annouceBoard, botImg] = getElm(["battlingField", "annouceBoard", "botImg"]);
const BOT_IMAGES_RANGE = [20, 25];

looper([yourOnBlack, yourOnWhite], colorSelector => {
	colorSelector.addEventListener("click", function() {
		if (this === yourOnBlack) {
			yourOnBlack.classList.add("selected");
			yourOnWhite.classList.remove("selected");
		} else {
			yourOnWhite.classList.add("selected");
			yourOnBlack.classList.remove("selected");
		}
	});
});

startButton.addEventListener("click", function() {
	reset();
	importSetting();
	onBoardAnnouncer.classList.remove("on");
	if (env.you() === CELL_STATE.black) botInit();
});



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
	setDefaultSetting();
	gameEnd(GAME_END_STATUS.init);
})();


function setDefaultSetting() {
	yourOnBlack.click();
	intelligence.value = BOT_INTELLIGENCE;
	settingStatusOn.click();
	settingLogButtonOff.click();
	settingLogOff.click();
}

function importSetting() {
	env.myself = (yourOnBlack.classList.contains("selected")) ? CELL_STATE.black : CELL_STATE.white;
	env.my_turn = env.myself === CELL_STATE.black;
	setting.botIntelligence = parseInt(intelligence.value);
	setting.savelog = settingLogOff === false;
}

setting2default.addEventListener("click", function() {
	setDefaultSetting();
});

resetButton.addEventListener("click", function() {
	if (!window.confirm("ゲームをリセットしますか???")) return;
	gameEnd(GAME_END_STATUS.reset);
	reset();
	settingImg.classList.remove("on");
});


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
];

