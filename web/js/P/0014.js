"use strict";

// define const values.
const [SVG_SIZE_MIN, SVG_SIZE_MAX] = [0, 300];
const [bezierFormulaBox] = getElm(["bezierFormulaBox"]);
const [leftButton, rightButton, gridWidth, gridDense, speed, interval] = getElm(["mainLeftButton", "mainRightButton", "gridWidth", "gridDense", "speed", "interval"]);
const [groupOfLines, groupOfBezier, groupOfExplanator, groupOfhandler] = getElm(["groupOfLines", "groupOfBezier", "groupOfExplanator", "groupOfhandler"]);
const [runningCircle, progressorRed, progressorRedCounter, progressorBlue, progressorRedLine, progressorBlueLine] = getElm(["runningCircle", "progressorRed", "progressorRedCounter", "progressorBlue", "progressorRedLine", "progressorBlueLine"]);
const [mainWindow, templateWindow, logWindow, mainRightBottomFrame] = getElm(["mainWindow", "templateWindow", "logWindow", "mainRightButtomFrame"]);
const bezier = document.createElementNS("http://www.w3.org/2000/svg", "path");

const handlers = {
	circles: [],
	polylines: [],
};
const progressors = {
	A: null,
	B: null,
}

// init
putLines();
putPath();
setDefault();
bezierSync();
currentImporter();

// set event handlers
leftButton.addEventListener("click", go);
gridWidth.addEventListener("input", putLines);
gridDense.addEventListener("input", setDense);
speed.addEventListener("input", () => speed.parentNode.nextElementSibling.textContent = `${parseFloat(this.value).toFixed(1)}秒`);
interval.addEventListener("input", () => interval.parentNode.nextElementSibling.textContent = (this.value <= 3) ? "低" : (this.value <= 7) ? "中" : "高");


function setDefault() {
	const cxcy = [50, 100, 250, 200]; // default bezier value.
	doNtimes(2, i => {
		const [circle] = mkElmSVG(["circle"]);
		const circleSettings = {
			"r" : 15,
			"cx" : cxcy[i * 2],
			"cy" : cxcy[i * 2 + 1],
		};
		for (const circleSetting in circleSettings) {
			circle.setAttribute(circleSetting, circleSettings[circleSetting]);
		}
		circle.addEventListener("mousedown", mousedown, false);
		const polyline = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
		groupOfhandler.appendChild(polyline);
		groupOfhandler.appendChild(circle);
		handlers.circles.push(circle);
		handlers.polylines.push(polyline);
	});
	manipuratorSync();
}
function setDense() {
	Array.from(groupOfLines.getElementsByTagName("line")).forEach(line => {
		line.style.stroke = `rgba(0, 0, 0, ${gridDense.value * 0.05})`;
	});
	document.getElementById("gridDenseShow").style.background100Color = `rgba(0, 0, 0, ${gridDense.value * 0.05})`;
}
function mousedown(event) {
	event.preventDefault();
	this.setAttribute("r", 20);
	this.style.fill = "red";
	this.addEventListener("mousemove", mousemove, false);
	this.parentNode.appendChild(this);
	this.addEventListener("mouseup", mouseup, false);
	this.addEventListener("mouseleave", mouseup, false);
	truncAndImport(false);
}
function mousemove(event) {
	event.preventDefault();
	this.setAttribute("cx", event.offsetX);
	this.setAttribute("cy", event.offsetY);
	manipuratorSync();
	if (event.offsetX < SVG_SIZE_MIN - 10 || SVG_SIZE_MAX + 10 < event.offsetX) {
		this.removeEventListener("mousemove", mousemove, false);
		this.removeEventListener("touchmove", mousemove, false);
		this.setAttribute("cx", (event.offsetX < SVG_SIZE_MIN) ? SVG_SIZE_MIN : SVG_SIZE_MAX);
		manipuratorSync();
	}
	mousemove_mouseup_common();
}
function mouseup(event) {
	event.preventDefault();
	this.removeEventListener("mousemove", mousemove, false);
	this.removeEventListener("touchmove", mousemove, false);
	this.setAttribute("r", 15);
	this.style.fill = "yellow";
	this.removeEventListener("mouseup", mouseup);
	this.removeEventListener("mouseleave", mouseup);
	if (event.offsetX < SVG_SIZE_MIN || SVG_SIZE_MAX < event.offsetX) {
		this.setAttribute("cx", (event.offsetX < SVG_SIZE_MIN) ? SVG_SIZE_MIN : SVG_SIZE_MAX);
	}
	manipuratorSync();
	putLogSVG();
}
function mousemove_mouseup_common() {
	bezierSync();
	const positions = obtainManipulatorPositions();
	bezierFormulaBox.textContent = `cubic-bezier(${round100(positions[1][0] / SVG_SIZE_MAX)}, ${round100((1 - (positions[1][1] / SVG_SIZE_MAX)))}, ${round100(positions[2][0] / SVG_SIZE_MAX)}, ${round100(1 - (positions[2][1] / SVG_SIZE_MAX))})`;
	currentImporter();
}
function manipuratorSync() {
	doNtimes(2, i => handlers.polylines[i].setAttribute("points", `${(i === 0) ? SVG_SIZE_MIN : SVG_SIZE_MAX} ${(i === 1) ? SVG_SIZE_MIN : SVG_SIZE_MAX}, ${handlers.circles[i].getAttribute("cx")} ${handlers.circles[i].getAttribute("cy")}`));
}
function putLines() {
	removeChildren(groupOfLines);
	const range = gridWidth.value;
	document.getElementById("gridWidthShow").textContent = `${range}等分`;
	for (let i = SVG_SIZE_MIN; i < SVG_SIZE_MAX; i = i + SVG_SIZE_MAX / range) {
		const [h, v] = mkElmSVG(["line", "line"]);
		h.setAttribute("x1", SVG_SIZE_MIN);
		h.setAttribute("x2", SVG_SIZE_MAX);
		["y1", "y2"].map(element => h.setAttribute(element, i));
		v.setAttribute("y1", SVG_SIZE_MIN);
		v.setAttribute("y2", SVG_SIZE_MAX);
		["x1", "x2"].map(element => v.setAttribute(element, i))
		append([h, v], groupOfLines);
		setDense();
	}
}
function putPath() {
	groupOfBezier.appendChild(bezier);
}
function bezierSync() {
	const pointsContainer = [];
	doNtimes(2, i => {
		const points = [];
		const circle = handlers.circles[i];
		points.push(circle.getAttribute("cx"));
		points.push(circle.getAttribute("cy"));
		pointsContainer.push(points.join(SPACE));
	});
	bezier.setAttribute("d", `m ${SVG_SIZE_MIN} ${SVG_SIZE_MAX} C ${pointsContainer.join(", ")}, ${SVG_SIZE_MAX} ${SVG_SIZE_MIN}`);
	return pointsContainer;
}
function go() {
	this.removeEventListener("click", go);
	this.addEventListener("click", pause);
	this.textContent = "一時停止";
	Array.from(groupOfhandler.getElementsByTagName("circle")).forEach(e => e.removeEventListener("mousedown", mousedown));
	bezierSync();
	recursiveInitiator(obtainManipulatorPositions());
}
function obtainManipulatorPositions() {
	const positions = [];
	positions.push([SVG_SIZE_MIN, SVG_SIZE_MAX]);
	positions.push([parseInt(handlers.circles[0].getAttribute("cx")), parseInt(handlers.circles[0].getAttribute("cy"))]);
	positions.push([parseInt(handlers.circles[1].getAttribute("cx")), parseInt(handlers.circles[1].getAttribute("cy"))]);
	positions.push([SVG_SIZE_MAX, SVG_SIZE_MIN])
	return positions
}
function pause() {
	clearInterval(stopwatchObject.intervalId);
	this.removeEventListener("click", pause);
	this.addEventListener("click", restart);
	this.textContent = "再実行"
}
function restart() {
	this.removeEventListener("click", restart);
	this.addEventListener("click", pause);
	this.textContent = "一時停止"
	recursiveInitiator(obtainManipulatorPositions(), false);
}

const stopwatchObject = {
	intervalId: null,
	counter: 0,
	reset: function() {this.counter = 0;}
};
function recursiveInitiator(points, tf = true) {
	const intervalValue = interval.value;
	const speedValue = speed.value * 1000;
	const span = 50 + (5 - intervalValue) * 5;
	const realSpeed = speedValue / span;
	if (tf) {
		const [polyline] = mkElmSVG(["polyline"]);
		polyline.setAttribute("points", points.map(j => j.join(",")).join(SPACE));
		groupOfExplanator.appendChild(polyline);
		doNtimes(points.length, () => {
			const [polyline] = mkElmSVG(["polyline"]);
			groupOfExplanator.appendChild(polyline);
		});
		runningCircle.classList.add("ok");
		runningCircle.setAttribute("cx", 0);
		runningCircle.setAttribute("cy", 300);
		stopwatchObject.reset();
	}
	stopwatchObject.intervalId = setInterval(() => {
		recursiveMain(points, stopwatchObject.counter / realSpeed);
		stopwatchObject.counter++;
		if(realSpeed < stopwatchObject.counter) stopInterval();
	}, span);
}
function stopInterval() {
	leftButton.removeEventListener("click", pause);
	leftButton.addEventListener("click", go);
	leftButton.textContent = "実行";
	Array.from(groupOfhandler.getElementsByTagName("circle")).forEach(circle => circle.addEventListener("mousedown", mousedown, false));
	truncAndImport();
}
function truncAndImport(tf = true) {
	clearInterval(stopwatchObject.intervalId);
	leftButton.removeEventListener("click", pause);
	leftButton.removeEventListener("click", restart);
	leftButton.addEventListener("click", go);
	leftButton.textContent = "実行";
	runningCircle.classList.remove("ok");
	runningCircle.setAttribute("cx", SVG_SIZE_MIN - 10);
	runningCircle.setAttribute("cy", SVG_SIZE_MAX + 10);
	const xx = (tf) ? SVG_SIZE_MAX : SVG_SIZE_MIN;
	const yy = (tf) ? SVG_SIZE_MIN : SVG_SIZE_MAX;
	progressorRed.setAttribute("d", `m -5 ${yy}, -10 -10 h-10 v20 h10 z`);
	progressorRedCounter.textContent = `${((SVG_SIZE_MAX - yy) / 3).toFixed(0)}%`;
	progressorRedLine.setAttribute("x2", xx);
	progressorRedLine.setAttribute("y1", yy);
	progressorRedLine.setAttribute("y2", yy);
	progressorBlue.setAttribute("d", `m ${xx} 305, -10 10 v10 h20 v-10 z`);
	progressorBlueLine.setAttribute("x1", xx);
	progressorBlueLine.setAttribute("x2", xx);
	progressorBlueLine.setAttribute("y2", yy);
}
function recursiveMain(points, proportion) {
	if (points.length === 1) return;
	const targetLine = groupOfExplanator.getElementsByTagName("polyline")[5 - points.length];
	const dComponents = [];
	doNtimes(points.length - 1, i => {
		const x = (points[i + 1][0] - points[i][0]) * proportion + points[i][0];
		const y = (points[i + 1][1] - points[i][1]) * proportion + points[i][1];
		dComponents.push([x, y]);
	});
	targetLine.setAttribute("points", dComponents.map(j => j.join(",")).join(" "));
	if (points.length === 2) {
		const xx = dComponents[0][0];
		const yy = dComponents[0][1];
		runningCircle.setAttribute("cx", xx);
		runningCircle.setAttribute("cy", yy);
		progressorRed.setAttribute("d", `m ${SVG_SIZE_MIN - 5} ${yy}, -10 -10 h-10 v20 h10 z`);
		progressorRedText.textContent = `${((SVG_SIZE_MAX - yy) / 3).toFixed(0)}%`;
		progressorRedLine.setAttribute("x2", xx);
		progressorRedLine.setAttribute("y1", yy);
		progressorRedLine.setAttribute("y2", yy);
		progressorBlue.setAttribute("d", `m ${xx} ${SVG_SIZE_MAX + 5}, -10 10 v10 h20 v-10 z`);
		progressorBlueLine.setAttribute("x1", xx);
		progressorBlueLine.setAttribute("x2", xx);
		progressorBlueLine.setAttribute("y2", yy);
	}
	recursiveMain(dComponents, proportion);
}


rightButton.addEventListener("click", doa);
///////////////////////
function syncIcon() {
	const dValue = bezier.getAttribute("d").match(/-?\d+\.?\d*/g);
	let xy = this.nextElementSibling.getElementsByClassName("v3-gr")[0];
	ers(xy);
	let e = document.createElementNS("http://www.w3.org/2000/svg", "path");
	e.setAttribute("d", `m ${SVG_SIZE_MIN} ${SVG_SIZE_MAX} C${dValue[2]} ${dValue[3]}, ${dValue[4]} ${dValue[5]}, ${SVG_SIZE_MAX} ${SVG_SIZE_MIN}`);
	e.style.fill = "none";
	e.style.stroke = "#ffffff";
	e.style.strokeWidth = "40";
	xy.insertBefore(e, xy.firstChild)
}
function ani(arg, obj = false) {
	try {
		let tt = (obj) ? arg : this;
		let bz = gbz(tt.getElementsByTagName("path")[0].getAttribute("d"));
		let an = Array.from(tt.nextElementSibling.getElementsByClassName("v3-ani"));
		an.forEach(s => {
			s.style.animationTimingFunction = (!s.classList.contains("v3-ani_li")) ? bz : "linear";
			s.classList.add("v3-aniani");
		});
	} catch(e) {}
}
function gbz(x) {
	let ds = x.match(/-?\d+\.?\d*/g);
	return `cubic-bezier(${round100(ds[2] / 300)}, ${round100((1 - (ds[3] / 300)))}, ${round100(ds[4] / 300)}, ${round100(1 - (ds[5] / 300))})`;
}
function rani() {
	this.classList.remove("v3-aniani");
}
function doa() {
	Array.from(document.getElementsByClassName("v3-ico")).forEach(e => {
		ani(e, true);
	});
}
window.addEventListener("load", () => {
	if (window.innerWidth < 1200) {
		document.getElementById("v3-width_judge").style.display = "none";
		document.getElementById("v3-announce").textContent = `横幅が1200px以上の端末で使用してください。現在使用している端末の横幅はは${window.innerWidth}pxです。`;
	}
	const ar = Array.from(document.getElementsByClassName("v3-ani"));
	document.getElementById("v3-s_sp").addEventListener("input", function() {
		ar.forEach(e => {
			e.style.animationDuration = this.value * 1.5 + "s";
		});
		this.parentNode.nextElementSibling.textContent = `${parseFloat(this.value).toFixed(1)}秒`;
	});
	document.getElementById("v3-s_ct").addEventListener("input", function() {
		ar.forEach(e => {
			e.style.animationIterationCount = this.value;
		});
		this.parentNode.nextElementSibling.textContent = `${this.value}回`;
	});
	document.getElementById("v3-s_cl").addEventListener("change", function() {
		ar.forEach(e => {
			e.style.background100Color = `hsla(${this.value}, 100%, 50%, 1)`;
		});
		this.parentNode.style.background100Color = `hsla(${this.value}, 100%, 50%, 1)`;
		this.parentNode.nextElementSibling.style.background100Color = `hsla(${this.value}, 100%, 50%, 1)`;
		setTimeout(() => {
			this.parentNode.style.background100Color = "transparent";
		}, 300);
	});
	document.getElementById("v3-s_cl").addEventListener("input", function() {
		this.parentNode.nextElementSibling.style.background100Color = `hsla(${this.value}, 100%, 50%, 1)`;
	});
	document.getElementById("v3-s_lr").addEventListener("change", function() {
		this.parentNode.nextElementSibling.textContent = (parseInt(this.value) === 1) ? "あり" : "なし";
		if (parseInt(this.value) === 1) {
			let x = document.getElementsByClassName("v3-ani_li-paused");
			x = Array.from(x);
			for (let i = 0; i < x.length; i++) {
				x[i].classList.add("v3-ani");
				x[i].classList.remove("v3-ani_li-paused");
			}
		} else {
			let x = document.getElementsByClassName("v3-ani_li");
			x = Array.from(x);
			for (let i = 0; i < x.length; i++) {
				x[i].classList.add("v3-ani_li-paused");
				x[i].classList.remove("v3-ani");
			}
		}
	});
});

// マウスアップ時の処理(ログ生成)
function putLogSVG() {
	const positions = bezierSync();
	const [svg, groupOfPaths, groupOfCircles, path] = mkElmSVG(["svg", "g", "g", "path"]);
	svg.setAttribute("viewBox", "-50 -50 400 400");
	path.setAttribute("d", `m ${SVG_SIZE_MIN} ${SVG_SIZE_MAX} C ${positions.join(", ")}, ${SVG_SIZE_MAX} ${SVG_SIZE_MIN}`);
	groupOfPaths.appendChild(path);
	const xy = [[SVG_SIZE_MIN, SVG_SIZE_MAX], [SVG_SIZE_MAX, SVG_SIZE_MIN]];
	doNtimes(2, i => {
		const [circle] = mkElmSVG(["circle"]);
		circle.setAttribute("r", 30);
		circle.setAttribute("cx", xy[i][0]);
		circle.setAttribute("cy", xy[i][1]);
		groupOfCircles.appendChild(circle);
	});
	append([groupOfPaths, groupOfCircles], svg);
	svg.addEventListener("click", logBack);
	logWindow.insertBefore(svg, logWindow.firstChild);
}

function logBack() {
	truncAndImport(false);
	const dAttr = this.getElementsByTagName("path")[0].getAttribute("d").match(/-?\d+\.?\d*/g).slice(2, 6); //マイナスも取得することを忘れずに!!
	const d = [dAttr.slice(0, 2), dAttr.slice(2, 4)];
	doNtimes(d.length, i => {
		handlers.circles[0].setAttribute("cx", d[i][0]);
		handlers.circles[1].setAttribute("cy", d[i][1]);
	});
	scrollUp(dAttr);
	manipuratorSync();
	bezierSync();
	const ary = obtainManipulatorPositions();
	document.getElementById("bezierFormulaBox").textContent = `cubic-bezier(${round100(ary[1][0] / 300)}, ${round100((1 - (ary[1][1] / 300)))}, ${round100(ary[2][0] / 300)}, ${round100(1 - (ary[2][1] / 300))})`;
	currentImporter();
}
function currentImporter() {
	const pointsContainer = [];
	for (let i = 0; i < 2; i++) {
		const points = [];
		const circle = handlers.circles[i];
		points.push(circle.getAttribute("cx"));
		points.push(circle.getAttribute("cy"));
		pointsContainer.push(points);
	}
	const demoGroup = document.getElementById("groupOfCurrentDemoSVG");
	removeChildren(demoGroup);
	const currentPath = document.createElementNS("http://www.w3.org/2000/svg", "path");
	currentPath.setAttribute("d", `m0 300 C ${pointsContainer.map(e => e.join(" ")).join(", ")}, 300 0`);
	demoGroup.appendChild(currentPath);
}
window.addEventListener("load", () => {
	document.getElementById("currentdemoSVG").addEventListener("click", ani);
	document.getElementById("currentDemoProgressorA").addEventListener("animationend", rani);
	document.getElementById("currentDemoProgressorB").addEventListener("animationend", rani);
});
window.addEventListener("load", () => {
	put_tmpl();
});
function put_tmpl() {
	const z = {
		"linear" : [[0.0, 0.0], [1.0, 1.0]],
		"ease" : [[0.25, 0.1], [0.25, 1.0]],
		"ease-in" : [[0.42, 0], [1.0, 1.0]],
		"ease-out" : [[0.0, 0.0], [0.58, 1.0]],
		"オススメ１" : [[0.2, 0.2], [0.3, 1]],
		"オススメ２" : [[0.1, 0.2], [0.8, 0.9]],
		"オススメ３" : [[0.5, 0.5], [0.1, 0.8]],
		"オススメ４" : [[0.0, 0.3], [1.0, 1.0]],
		"オススメ５" : [[0.2, 0.2], [0.3, 0.9]],
	};
	const p = document.getElementById("templateWindow");
	for (let k in z) {
		(function () {
			const pb = document.createElement("div");
			const pu = {
				"position" : "relative",
			}
			for (let k in pu) {
				pb.style[k] = pu[k];
			}
			const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
			svg.classList.add("x");
			let pp;
			pp = {
				"width" : 80,
				"heigth" : 80,
				"viewBox" : "-50 -50 400 400",
				"xmlns" : "http://www.w3.org/2000/svg",
			};
			for (let k in pp) {
				svg.setAttribute(k ,pp[k]);
			}
			(function () {
				let gp, gc, xy;
				gp = document.createElementNS("http://www.w3.org/2000/svg", "g");
				(function () {
					let kj, kp;
					kj = document.createElementNS("http://www.w3.org/2000/svg", "path");
					let mx = z[k].map(mp => mp.map(mk => mk * 300));
					kj.setAttribute("d", `m0 300 C ${mx[0][0]} ${300 - mx[0][1]}, ${mx[1][0]} ${300 - mx[1][1]}, 300 0`);
					const zp = {
						"fill" : "transparent",
						"stroke" : "black",
						"stroke-width" : "10",
					};
					for (let k in zp) {
						kj.style[k] = zp[k];
					}
					gp.appendChild(kj);
				})();
				gc = document.createElementNS("http://www.w3.org/2000/svg", "g");
				(function () {
					xy = [
						[0, 300],
						[300, 0],
					];
					for (let i = 0; i < 2; i++) {
						let x, px;
						x = document.createElementNS("http://www.w3.org/2000/svg", "circle");
						x.setAttribute("r", 20);
						x.setAttribute("cx", xy[i][0]);
						x.setAttribute("cy", xy[i][1]);
						gc.appendChild(x);
					}
				})();
				svg.appendChild(gp);
				svg.appendChild(gc);
			})();
			const txt = document.createElement("div");
			txt.textContent = k;
			const pr = {
				"position" : "absolute",
				"display" : "inline-block",
				"left" : "50%",
				"bottom" : "10%",
				"transform" : "translateX(-50%)",
				"text-align" : "center",
				"font-size" : "12px",
				"border" : "1px black solid",
				"border-radius" : "20px",
				"background100-color" : "rgba(255, 255, 255, 0.7)",
				"padding" : "1px 8px",
				"white-space" : "nowrap",
			};
			for (let k in pr) {
				txt.style[k] = pr[k];
			}
			pb.appendChild(svg);
			pb.appendChild(txt);
			pb.addEventListener("click", trnsfr);
			p.appendChild(pb);
		})();
	}
}
function scrollUp(d) {
	const positions = [d[0] / 300, 1 - d[1] / 300, d[2] / 300, 1 - d[3] / 300];
	const bezierPoints = calcBezier(positions);
	let count = 0;
	const scrolled = window.scrollY;
	const toWhere = window.pageYOffset + mainWindow.getBoundingClientRect().top;
	const needToScroll = toWhere - scrolled;
	function waitAndRun() {
		if (count < 100) {
			count++;
			scrollTo(0, scrolled + needToScroll * bezierPoints["y"][count]);
			setTimeout(waitAndRun, 15 * bezierPoints["x"][count]);
		}
	}
	waitAndRun();
}
function calcBezier(d, step = 100, percent = true) {
	const answer = {
		"x" : [],
		"y" : [],
	};
	function recCalcPositions(ary, ppn) {
		if (ary.length === 1) return;
		const list = [];
		for (let i = 0; i < ary.length - 1; i++) {
			const x = (ary[i + 1][0] - ary[i][0]) * ppn + ary[i][0];
			const y = (ary[i + 1][1] - ary[i][1]) * ppn + ary[i][1];
			list.push([x, y]);
		}
		if (ary.length === 2) {
			answer["x"].push(list[0][0] / (percent) ? 100 : 1);
			answer["y"].push(list[0][1] / (percent) ? 100 : 1);
		} else {
			recCalsPositions(list, ppn);
		}
	}
	const positions = [[0, 0], [d[0], d[1]], [d[2], d[3]], [100, 100]];
	for (let i = 0; i <= step; i++) {
		recCalcPositions(positions, i / step);
	}
	return answer;
}
