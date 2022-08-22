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
	button.removeEventListener("click", run);
	button.classList.add("off");
	setTimeout(() => {
		for (let i = 0; i < parseInt(limitInput.value); i++) {
			const cx = Math.random() * range * 2 - range;
			const cy = Math.random() * range * 2 - range;
			let [real, imag] = new Array(2).fill(2);
			const xys = [];
			for (let j = 0; j < infiniteJudge; j++) {
				let [_real, _imag] = [
					real ** 2 - imag ** 2 + cx,
					real * imag + cy
				];
				[real, imag] = [_real, _imag];
				xys.push([real, imag]);
				if (4 < (real ** 2 + imag ** 2)) break;
			}
			ctx.fillStyle = `rgba(255, 255, 255, ${0.5})`;
			xys.forEach(xy => {
				ctx.fillRect(canvasRender(xy[0]), canvasRender(xy[1]), 1, 1);
			});
		}
		button.addEventListener("click", run);
		button.classList.remove("off");
	}, 500);
}
function sync() {
	limitInput.parentNode.nextElementSibling.textContent = limitInput.value;
}
limitInput.addEventListener("input", sync);
sync();

