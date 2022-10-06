"use strict";

const [button, color, depth, canvas] = getElm(["button", "color", "depth", "canvas"]);
const [ctx, width, height] = [canvas.getContext("2d"), canvas.width, canvas.height];

const draw = (x, y, size) => {
	const p1_x = x + size / 2; // 中央下
	const p1_y = y - Math.sin(-60 * Math.PI / 180) * size;
	const p2_x = x + size; // 右
	const p2_y = y;
	ctx.beginPath();
	ctx.moveTo(x, y);
	ctx.lineTo(p1_x, p1_y);
	ctx.lineTo(p2_x, p2_y);
	ctx.fill();
}

function recFx(x, y, size, n) {
	if (parseInt(depth.value) < n) {
		button.addEventListener("click", run);
		return;
	}
	if (n / 2 === 0) {
		ctx.fillStyle = `hsl(${color.value}, 100%, 50%)`;
	} else {
		ctx.fillStyle = "white";
	}
	const p1_x = Math.cos(240 * Math.PI / 180) * 1 / 4 * size + x; // 上
	const p1_y = y - Math.sin(240 * Math.PI / 180) * 1 / 4 * size;
	const p2_x = Math.cos(240 * Math.PI / 180) * 3 / 4 * size + x; // 左下
	const p2_y = y - Math.sin(240 * Math.PI / 180) * 3 / 4 * size;
	const p3_x = p2_x + size / 2; //右下
	const p3_y = p2_y;
	draw(p1_x, p1_y, size / 4);
	draw(p2_x, p2_y, size / 4);
	draw(p3_x, p3_y, size / 4);
	setTimeout(() => {
		recFx(x, y, size / 2, n + 1);
		recFx(
			Math.cos(240 * Math.PI / 180) * 1 / 2 * size + x,
			y - Math.sin(240 * Math.PI / 180) * 1 / 2 * size,
			size / 2,
			n + 1
		);
		recFx(
			Math.cos(-60 * Math.PI / 180) * 1 / 2 * size + x,
			y - Math.sin(-60 * Math.PI / 180) * 1 / 2 * size,
			size / 2,
			n + 1
		);
	}, 300);
}

function run() {
	this.removeEventListener("click", run);
	ctx.clearRect(0, 0, width, height);
	const [size, start] = [400, 70];
	(function() {
		ctx.fillStyle = `hsl(${color.value}, 100%, 50%)`;
		ctx.beginPath();
		ctx.moveTo(width / 2, start);
		const p2_x = Math.cos(240 * Math.PI / 180) * size + width / 2; // 180 + 60 = 240
		const p2_y = start - Math.sin(240 * Math.PI / 180) * size; // 180 + 60 = 240
		ctx.lineTo(p2_x, p2_y);
		ctx.lineTo(p2_x + size, p2_y);
		ctx.fill();
	})();
	setTimeout(() => {
		ctx.fillStyle = "white";
		const p1_x = Math.cos(240 * Math.PI / 180) * size / 2 + width / 2;
		const p1_y = start - Math.sin(240 * Math.PI / 180) * size / 2;
		const p2_x = Math.cos(-60 * Math.PI / 180) * size / 2 + p1_x; // 「x + size / 2」の方が簡単
		const p2_y = p1_y - Math.sin(-60 * Math.PI / 180) * size / 2;
		ctx.beginPath();
		ctx.moveTo(p1_x, p1_y);
		ctx.lineTo(p2_x, p2_y);
		ctx.lineTo(p1_x + size / 2, p1_y);
		ctx.fill();
		setTimeout(() => {
			recFx(width / 2, start, size, 1);
		}, 300);
	}, 300);
}

button.addEventListener("click", run);

color.addEventListener("input", colorSync);
function colorSync() {
	color.parentNode.nextElementSibling.style.backgroundColor = `hsl(${color.value}, 100%, 50%)`;
}
colorSync();

depth.addEventListener("input", function() {
	this.parentNode.nextElementSibling.textContent = this.value;
});