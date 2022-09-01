"use strict";


const ITEM_COUNT = 8;
const DIRECTION_COUNT= 8;
const CENTER_POINTS_COUNT = 4;
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

const GAME_END_STATUS = {
	init: 0,
	normal: 1,
	skipped: 2,
	reset: 3,
};


const setting = {
	botIntelligence: null,
	status: null,
	savelog: null,
}

const env = {
	myself: null,
	you: function() {
		return (this.myself === CELL_STATE.black) ? CELL_STATE.white : CELL_STATE.black;
	},
	my_turn: true,
	counter: CENTER_POINTS_COUNT,
	skipped: false,
	reset: function() {
		this.counter = CENTER_POINTS_COUNT;
	},
	finished: function() {
		if (0 < countSatisfy(cellStatuses, cellStatus => cellStatus === CELL_STATE.free)) return false;
		gameEnd(GAME_END_STATUS.normal);
	},
}


const [board] = getElm(["board"]);
const cells = [];
const cellStatuses = new Array(ITEM_COUNT ** 2).fill(CELL_STATE.free);



const [intelligence, settingStatusOn, settingLogOn, settingLogOff, settingLogButtonOff] = getElm(["intelligence", "settingStatusOn", "settingLogOn", "settingLogOff", "settingLogButtonOff"])
const [onBoardAnnouncer, resultContainer] = getElm(["onBoardAnnouncer", "resultContainer"]);
const [setting2default, resetButton] = getElm(["setting2default", "resetButton"]);

const [battlingField, annouceBoard, botImg, botProgressor] = getElm(["battlingField", "annouceBoard", "botImg", "botProgressor"]);

// fx

const whereAmI = self => cells.indexOf(self);

const offsetToNext = [-9, -8, -7, -1, 1, 7, 8, 9];
const toTheEdge = index => [
	Math.min(index % ITEM_COUNT, (index - (index % ITEM_COUNT)) / ITEM_COUNT),
    (index - (index % ITEM_COUNT)) / ITEM_COUNT,
	Math.min((ITEM_COUNT - 1) - (index % ITEM_COUNT), (index - (index % ITEM_COUNT)) / ITEM_COUNT),
    index % ITEM_COUNT,
	(ITEM_COUNT - 1) - (index % ITEM_COUNT),
	Math.min(index % ITEM_COUNT, (ITEM_COUNT * (ITEM_COUNT - 1) + (index % ITEM_COUNT) - index) / ITEM_COUNT),
	(ITEM_COUNT * (ITEM_COUNT - 1) + (index % ITEM_COUNT) - index) / ITEM_COUNT,
	Math.min((ITEM_COUNT - 1) - (index % ITEM_COUNT), ((ITEM_COUNT * (ITEM_COUNT - 1) + (index % ITEM_COUNT) - index) / ITEM_COUNT)),
]; 


function setter(index, state) {
	cells[index].classList.remove(...filter(a => a !== "cell", cells[index].classList));
	cells[index].classList.add((state === CELL_STATE.white) ? "white" : (state === CELL_STATE.black) ? "black" : "");
	cellStatuses[index] = state;
	env.skipped = false;
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

function takePossiblePoints(state) {
	return filter(numbers => numbers !== null, looper(fromAtoB(0, ITEM_COUNT ** 2, 1, false), point => {
		const puttablePoints = areasToPutItem(point, state);
		if (puttablePoints.length === 0) return null;
		return {index: point, puttablePoints: puttablePoints};
	}));
}


function reset() {
	doNtimes(ITEM_COUNT ** 2, i => {
		cellStatuses[i] = CELL_STATE.free;
		cells[i].classList.remove(...filter(a => a !== "cell", cells[i].classList));
	});
	looper(CENTER_POINTS, (points, _) => {
		setter(points[0], CELL_STATE.white)
		setter(points[1], CELL_STATE.black)
	});
	botProgressor.style.background = "";
}



function gameEnd(index) {
	// 0 :-> 初期状態
	// 1 :-> ゲーム終了 (通常)
	// 2 :-> ゲーム終了 (skipped)
	// 3 :-> ゲームリセット
	onBoardAnnouncer.classList.add("on");
	removeChildren(resultContainer);
	[
		(function() {
			const [title] = mkElm(["div"]);
			title.textContent = "Welcome to reversi program!!!";
			title.classList.add("title");
			const text = [
				"一回目のクリックで置けるマスの場合には白くなり、二回目のクリックで実際に駒を置きます。",
				"左下の歯車ボタンから各種設定が可能です。",
				"",
				"規定値では以下の設定となっています。",
				"あなたの色 -> 黒 (先攻)",
				`ボットの強さ -> 普通 (${BOT_INTELLIGENCE + 1} / 5)`,
			];
			append([title], resultContainer);
			appendText(text, resultContainer);
		}),
		(function(skiiped) {
			const [text, textBox] = [
				document.createTextNode(""),
				document.createElement("div"),
			];
			textBox.classList.add("GAMESET");
			append([text], textBox);
			append([textBox], resultContainer);
			const GAME_SET = "GAME SET".split("");
			const promiseController = new Promise(resolve => {
				const intervalId = setInterval(() => {
					if (GAME_SET.length === 0) {
						clearInterval(intervalId);
						resolve(); // RESOLVE!!!
						return;
					}
					text.nodeValue += GAME_SET.shift();
				}, 100);
			});
			promiseController.then(() => {
				const [blackWhiteBox, blackBox, whiteBox] = mkElm(["div", "div", "div"]);
				blackWhiteBox.classList.add("blackWhiteBox");
				blackBox.classList.add("blackBox");
				whiteBox.classList.add("whiteBox");
				const blackWhiteOrder = (env.myself === CELL_STATE.black) ? [blackBox, whiteBox] : [whiteBox, blackBox];
				append(blackWhiteOrder, blackWhiteBox);
				append([blackWhiteBox], resultContainer);
				const [myCount, yourCount] = [
					countSatisfy(cellStatuses, cellStatus => cellStatus === env.myself),
					countSatisfy(cellStatuses, cellStatus => cellStatus === env.you()),
				];
				let counter = 0;
				const promiseController = new Promise(resolve => {
					const intervalId = setInterval(() => {
						counter++;
						if (myCount < counter && yourCount && counter) {
							clearInterval(intervalId);
							setTimeout(() => {
								resolve((myCount === yourCount) ? 0 : (yourCount < myCount) ? 1 : 2); // RESOLVE!!!
							}, 300);
						}
						if (counter < myCount) {
							const [div] = mkElm(["div"]);
							blackWhiteOrder[0].appendChild(div);
						}
						if (counter < yourCount) {
							const [div] = mkElm(["div"]);
							blackWhiteOrder[1].appendChild(div);
						}
					}, 300);
				});
				promiseController.then(result => {
					const [resultTextBox] = mkElm(["div"]);
					resultTextBox.classList.add("resultTextBox");
					resultTextBox.textContent = (result === 0) ? "DRAW" : (result === 1) ? "WIN!!!" : "LOSE...";
					append([resultTextBox], resultContainer);
				});
			});
		}),
		(function() {}), // DUMMY...
		(function() {
			const text = [
				"ゲームがリセットされました。",
				"下記スタートボタンから新しいゲームを開始できます。",
			];
			appendText(text, resultContainer);
		}),
	][(index === GAME_END_STATUS.skipped) ? index - 1 : index]((index === GAME_END_STATUS.skipped) ? true : false);
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


const logbackButtons = Array.from(document.querySelectorAll("input[name=logbackButtonSelector]"));
settingLogOff.addEventListener("change", function() {
	looper(logbackButtons, input => input.disabled = true);
	settingLogButtonOff.checked = true;
});
settingLogOn.addEventListener("change", function() {
	looper(logbackButtons, input => input.disabled = false);
});


