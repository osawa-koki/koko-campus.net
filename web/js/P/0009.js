"use strict";

const [len, angle, shrink, depth] = getElm(["len", "angle", "shrink", "depth"]);
[len, angle, shrink, depth].map(elm => elm.addEventListener("input", sync));

function sync() {
	this.parentNode.nextElementSibling.textContent = this.value;
}

const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
const [width, height] = [canvas.width, canvas.height];

function tree(x, y, deg, n) {
	if (parseInt(depth.value) < n) return;
	const length = parseFloat(shrink.value) ** n * parseInt(len.value);
	(function() { // 右側
		const ang = (deg - parseInt(angle.value)) % 360,
			moved_x = x + Math.cos(ang * Math.PI / 180) * length,
			moved_y = (ang !== 90 && ang !== 270) ? y + Math.tan(ang * Math.PI / 180) * (x - moved_x) :
				(ang === 90) ? y - length : y + length; // tag90とtan270はダメ!!
		ctx.beginPath();
		ctx.moveTo(x, y);
		ctx.lineTo(moved_x, moved_y);
		ctx.closePath();
		ctx.stroke();
		setTimeout(() => {
			tree(moved_x, moved_y, ang, n + 1);
		}, 300);
	})();
	(function() { // 左側
		const ang = (deg + parseInt(angle.value)) % 360,
			moved_x = x + Math.cos(ang * Math.PI / 180) * length,
			moved_y = (ang !== 90 && ang !== 270) ? y + Math.tan(ang * Math.PI / 180) * (x - moved_x) :
				(ang === 90) ? y - length : y + length; // tag90とtan270はダメ!!
		ctx.beginPath();
		ctx.moveTo(x, y);
		ctx.lineTo(moved_x, moved_y);
		ctx.closePath();
		ctx.stroke();
		setTimeout(() => {
			tree(moved_x, moved_y, ang, n + 1);
		}, 300);
	})();
}

document.getElementById("button").addEventListener("click", () => {
	ctx.clearRect(0, 0, width, height);
	ctx.strokeStyle = "green";
	ctx.beginPath();
	ctx.moveTo(width / 2, height);
	ctx.lineTo(width / 2, (height - parseInt(len.value)) * 0.9);
	ctx.closePath();
    ctx.stroke();

	tree(
		parseInt(width / 2),
		parseInt((height - parseInt(len.value)) * 0.9),
		90,
		1
	);
});