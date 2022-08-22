"use strict";

let interval,
	g = [],
	inc = 0,
	outc = 0,
	both = 0,
	ary = [];


const [button, svg, inN, outN, inPCT, outPCT, pai] = getElm(["button", "svg", "NofIN", "NofOUT", "PCTofIN", "PCTofOUT", "pai"]);

const groups = {};

const main = () => {
	let gr;
	["lines", "circles", "points"].forEach(e => {
		gr = document.createElementNS("http://www.w3.org/2000/svg", "g");
		gr.id = `v1-svg_${e}`;
		g.push(gr);
		svg.appendChild(gr);
	});
	(function() { //g[0]の処理
		let l,
			sp,
			i;
		for (i = 0; i <= 100; i = i + 10) {
			l = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
			l.setAttribute("points", `0 ${i}, 100 ${i}`);
			g[0].appendChild(l);
			ary.push(i);
		}
	})();
}

button.addEventListener("click", run);

const run = function() {
	this.removeEventListener("click", run);
	this.addEventListener("click", pause);
	this.textContent = "一時停止";
	interval = setInterval(() => {
		let e = document.createElementNS("http://www.w3.org/2000/svg", "polyline"),
			x,
			y,
			r,
			dx,
			dy,
			xx,
			yy,
			c,
			a,
			deg,
			bool_check = false;
		x = get_random(100);
		y = get_random(100);
		r = 5;
		(function() { //yは三角関数を用いて算出
			deg = get_random(360);
			dx = Math.cos(Math.PI / 180 * deg) * r;
			dy = Math.sin(Math.PI / 180 * deg) * r;
			xx = x + dx;
			yy = y + dy;
			ary.forEach(e => {
				if (inRange(e, y, yy)) {
					bool_check = true;
				}
			});
			if (bool_check) {
				e.style["stroke"] = "red";
				inc++;
				ind.textContent = inc;
			} else {
				e.style["stroke"] = "blue";
				outc++;
				outd.textContent = outc;
			}
			in_ppn.textContent = (inc / both * 100).toFixed(5);
			out_ppn.textContent = (outc / both * 100).toFixed(5);
		})();
		e.setAttribute("points", `${x} ${y}, ${xx} ${yy}`);
		c = Math.sqrt((x - 50) ** 2 + (y - 50) ** 2);
		both++;
		a = both / inc;
		pai.textContent = a;
		g[2].appendChild(e);
	}, 5);
}
const pause = function() {
	this.addEventListener("click", run);
	this.removeEventListener("click", pause);
	this.textContent = "再開";
	clearInterval(interval);
}
const get_random = (x) => {
	return Math.random() * x;
}
const inRange = (x, min, max) => {
	return ((x - min) * (x - max) <= 0);
}
window.addEventListener("load", () => {
	main();
});