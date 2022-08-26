"use strict";

const [button, limitInput, canvas] = getElm(["button", "calcTimes", "canvas"]);
const ctx = canvas.getContext("2d");
const [width, height] = [canvas.width, canvas.height];

const [range, lighter, infiniteJudge] = [2, 0.01, 500];

ctx.fillStyle = "black";
ctx.fillRect(0, 0, width, height);

const canvasRender = n => {
	const zoom = width / (range * 2);
	return parseInt(n * zoom + range * zoom);
}

button.addEventListener("click", run);
function run() {
	const obj = document.getElementById("waiter");
	button.removeEventListener("click", run);
	obj.classList.add("running");
	button.classList.add("running");
	ctx.fillStyle = `rgba(255, 255, 255, ${lighter})`;
	setTimeout(() => {
		for (let i = 0; i < parseInt(limitInput.value); i++) {
			const cx = Math.random() * range * 2 - range;
			const cy = Math.random() * range * 2 - range;
			let [real, imag] = new Array(2).fill(0);
			const xys = [];
			let check = false;
			for (let j = 0; j < infiniteJudge; j++) {
				let [_real, _imag] = [
					real ** 2 - imag ** 2 + cx,
					2 * real * imag + cy
				];
				[real, imag] = [_real, _imag];
				xys.push([real, imag]);
				if (4 < (real ** 2 + imag ** 2)) {
					check = true;
					break;
				}
			}
			if (!check) continue;
			xys.forEach(xy => {
				ctx.fillRect(canvasRender(xy[0]), canvasRender(xy[1]), 1, 1);
			});
		}
		button.addEventListener("click", run);
		button.classList.remove("running");
		obj.classList.remove("running");
	}, 500);
}
function sync() {
	limitInput.parentNode.nextElementSibling.textContent = limitInput.value;
}
limitInput.addEventListener("input", sync);
sync();

