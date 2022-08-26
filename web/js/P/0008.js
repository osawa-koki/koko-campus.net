"use strict";

new Vue({
	el: "#pythagorasTree",
	data: {
		canvas: null, // dummy
		ctx: null, // dummy
		canvasSize: 0, // dummy
		color: 0,
		size: 1000,
		count: 5,
		deg: 60,
		standing: 4000,
		boots: 1500,
		x_lock: false
	},
	mounted() {
		this.canvas = this.$refs.canvas;
		this.ctx = this.canvas.getContext("2d");
		this.canvasSize = this.canvas.width;
		this.run(false);
	},
	computed: {
		bg: function() {
			const base = this.standing / 100;
			return `linear-gradient(to right, transparent 0% ${base - 2}%, ${`hsl(${this.color}, 100%, 50%)`} ${base - 2}% ${base + 2}%, transparent ${base + 2}% 100%)`;
		},
		showSize: function() {
			return (this.size < 1600) ? "小":
				(this.size < 2400) ? "中" : "大";
		},
		hsl: function() {
			return `hsl(${this.color}, 100%, 50%)`;
		}
	},
	methods: {
		run: function(inLoop) {
			if (this.x_lock) return;
			this.x_lock = true;
			this.i = 0;
			this.del();
			this.ctx.fillStyle = `hsl(${this.color}, 100%, 50%)`;
			this.ctx.fillRect(
				this.standing - this.size / 2,
				this.canvasSize - this.size - this.boots,
				this.size,
				this.size
			);
			this.go(
				[this.standing - this.size / 2, this.canvasSize - this.size - this.boots],
				[this.standing + this.size / 2, this.canvasSize - this.size - this.boots],
				this.size,
				0,
				(inLoop) ? this.count - 1 : 0,
				1
			);
		},
		go: function(p1, p2, size, angle, n, i) {
			if (n === 0) {
				this.x_lock = false;
				return;
			}
			const h = (320 / (this.count + 1) * i + this.color) % 360;
			this.ctx.fillStyle = `hsl(${h}, 100%, 50%)`;
			(() => { // 左側
				const smalledSize = Math.cos(this.deg * Math.PI / 180) * size;
				const pointsLeft = this.left(p1[0], p1[1], smalledSize, angle);
				this.ctx.fillStyle = `hsl(${h}, 100%, 50%)`;
				this.ctx.beginPath();
				this.ctx.moveTo(pointsLeft[0][0], pointsLeft[0][1]);
				this.ctx.lineTo(pointsLeft[1][0], pointsLeft[1][1]);
				this.ctx.lineTo(pointsLeft[2][0], pointsLeft[2][1]);
				this.ctx.lineTo(pointsLeft[3][0], pointsLeft[3][1]);
				this.ctx.fill();
				setTimeout(() => {
					this.go(
						[pointsLeft[3][0], pointsLeft[3][1]],
						[pointsLeft[2][0], pointsLeft[2][1]],
						smalledSize,
						angle + this.deg,
						n - 1,
						i + 1
					);
				}, 300);
			})();
			(() => { // 右側
				const smalledSize = Math.sin(this.deg * Math.PI / 180) * size;
				const pointsRight = this.right(p2[0], p2[1], smalledSize, angle);
				this.ctx.fillStyle = `hsl(${h}, 100%, 50%)`;
				this.ctx.beginPath();
				this.ctx.moveTo(pointsRight[0][0], pointsRight[0][1]);
				this.ctx.lineTo(pointsRight[1][0], pointsRight[1][1]);
				this.ctx.lineTo(pointsRight[2][0], pointsRight[2][1]);
				this.ctx.lineTo(pointsRight[3][0], pointsRight[3][1]);
				this.ctx.fill();
				setTimeout(() => {
					this.go(
						[pointsRight[2][0], pointsRight[2][1]],
						[pointsRight[1][0], pointsRight[1][1]],
						smalledSize,
						angle - (90 - this.deg),
						n - 1,
						i + 1
					);
				}, 300);
			})();
		},
		left: function(x, y, size, angle) {
			// 反時計回りに
			return [
				[
					x,
					y
				],
				[
					x + Math.cos((angle + this.deg) * Math.PI / 180) * size,
					y - Math.sin((angle + this.deg) * Math.PI / 180) * size
				],
				[
					x + Math.cos((angle + this.deg + 45) * Math.PI / 180) * size * Math.sqrt(2),
					y - Math.sin((angle + this.deg + 45) * Math.PI / 180) * size * Math.sqrt(2)
				],
				[
					x + Math.cos((angle + this.deg + 90) * Math.PI / 180) * size,
					y - Math.sin((angle + this.deg + 90) * Math.PI / 180) * size
				],
			];
		},
		right: function(x, y, size, angle) {
			// 反時計回り
			return [
				[
					x,
					y
				],
				[
					x + Math.cos((angle + this.deg) * Math.PI / 180) * size,
					y - Math.sin((angle + this.deg) * Math.PI / 180) * size
				],
				[
					x + Math.cos((angle + this.deg + 45) * Math.PI / 180) * size * Math.sqrt(2),
					y - Math.sin((angle + this.deg + 45) * Math.PI / 180) * size * Math.sqrt(2)
				],
				[
					x + Math.cos((angle + this.deg + 90) * Math.PI / 180) * size,
					y - Math.sin((angle + this.deg + 90) * Math.PI / 180) * size
				],
			];
		},
		del: function() {
			this.ctx.clearRect(0, 0, this.canvasSize, this.canvasSize);
		}
	}
});