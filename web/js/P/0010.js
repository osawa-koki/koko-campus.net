"use strict";

const [button, color, depth, canvas] = getElm(["button", "color", "depth", "canvas"]);
const [ctx, width, height] = [canvas.getContext("2d"), canvas.width, canvas.height];

const flatter = arg => {
	const answer = [];
	arg.forEach(e => {
		arg.forEach(f => {
			answer.push([e, f]);
		});
	});
	return answer;
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
	// 「3 * 3」の座標を取得
	const xys = [
		1 / 9 * size,
		4 / 9 * size,
		7 / 9 * size
	];
	flatter(xys).forEach(xy => {
		ctx.fillRect(
			xy[0] + x,
			xy[1] + y,
			size / 9,
			size / 9
		);
		setTimeout(() => {
			recFx(
				xy[0] + x - size / 9,
				xy[1] + y - size / 9,
				size / 3,
				n + 1
			);
		}, 300);
	});
}

function run() {
	button.removeEventListener("click", run);
	ctx.clearRect(0, 0, width, height);
	const size = 400;
	const start = (width - size) / 2;
	ctx.fillStyle = `hsl(${color.value}, 100%, 50%)`;
	ctx.fillRect(start, start, size, size);
	setTimeout(() => {
		ctx.fillStyle = "white";
		const sizeInside = size / 3;
		const startInside = start + sizeInside;
		ctx.fillRect(startInside, startInside, sizeInside, sizeInside);
		setTimeout(() => {
			recFx(start, start, size, 1);
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