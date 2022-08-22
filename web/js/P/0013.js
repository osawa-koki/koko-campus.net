"use strict";

let interval;

const resultContainer = {
	"in": 0,
	"out": 0,
	"all": 0
};

const [button, svg, inN, outN, inPCT, outPCT, pai] = getElm(["button", "svg", "NofIN", "NofOUT", "PCTofIN", "PCTofOUT", "pai"]);

const groups = {};
const lines = [];

const main = () => {
	["lines", "needles"].forEach(group => {
		const gr = document.createElementNS("http://www.w3.org/2000/svg", "g");
		gr.classList.add(group);
		groups[group] = gr;
		svg.appendChild(gr);
	});
	(function() { // linesの処理...
		for (let i = 0; i <= 100; i = i + 10) {
			const line = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
			line.setAttribute("points", `0 ${i}, 100 ${i}`);
			groups["lines"].appendChild(line);
			lines.push(i);
		}
	})();
}

button.addEventListener("click", run);

function run() {
	button.removeEventListener("click", run);
	button.addEventListener("click", pause);
	button.textContent = "一時停止";
	interval = setInterval(() => {
		const needle = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
		const x = getRandom(100);
		const y = getRandom(100);
		const r = 5;
		let IsOn = false;
		let xx, yy;
		(function() { // yは三角関数を用いて算出
			const deg = getRandom(360);
			const dx = Math.cos(Math.PI / 180 * deg) * r;
			const dy = Math.sin(Math.PI / 180 * deg) * r;
			xx = x + dx;
			yy = y + dy;
			lines.forEach(line => {
				if (inRange(line, y, yy)) IsOn = true;
			});
			if (IsOn) {
				needle.style["stroke"] = "red";
				resultContainer.in++;
				inN.textContent = resultContainer.in;
			} else {
				needle.style["stroke"] = "blue";
				resultContainer.out++;
				outN.textContent = resultContainer.out;
			}
			PCTofIN.textContent = (resultContainer.in / resultContainer.all * 100).toFixed(5);
			PCTofOUT.textContent = (resultContainer.out / resultContainer.all * 100).toFixed(5);
		})();
		needle.setAttribute("points", `${x} ${y}, ${xx} ${yy}`);
		const c = Math.sqrt((x - 50) ** 2 + (y - 50) ** 2);
		resultContainer.all++;
		pai.textContent = resultContainer.all / resultContainer.in;
		groups["needles"].appendChild(needle);
	}, 5);
}
const pause = function() {
	button.addEventListener("click", run);
	button.removeEventListener("click", pause);
	button.textContent = "再開";
	clearInterval(interval);
}
const getRandom = n => Math.random() * n;
const inRange = (x, min, max) => ((x - min) * (x - max) <= 0);


main();
