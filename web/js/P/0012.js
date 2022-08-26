"use strict";

const [n, k, canvas] = getElm(["n", "k", "canvas"]);
const [ctx, width, height] = [canvas.getContext("2d"), canvas.width, canvas.height];

function recFx() {
	const [kn, nn] = [n, k].map(e => parseInt(e.value));
	for (let i = 0; i < 360 * parseInt(kn); i = i + 0.3) {
		const th = i * Math.PI / 180;
		const x = Math.sin((kn * i / nn) * Math.PI / 180) * Math.cos(th);
		const y = Math.sin((kn * i / nn) * Math.PI / 180) * Math.sin(th);
		const zoom = 500 / 2 - 30;
		ctx.fillRect(x * zoom + width / 2, y * zoom + height / 2, 1, 1);
	}
}

document.getElementById("button").addEventListener("click", () => {
	ctx.clearRect(0, 0, width, height);
	ctx.fillStyle = "black";
	recFx();
});


function sync() {
	this.parentNode.nextElementSibling.textContent = this.value;
}
[n, k].map(e => e.addEventListener("input", sync));

