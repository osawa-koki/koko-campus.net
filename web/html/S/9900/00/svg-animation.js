"use strict";

function $$(arg) {
	const tag = document.getElementById(arg).tagName.toLowerCase();
	if (tag === "path") {
		const obj = {
			"doc": document.getElementById(arg),
			"m": document.getElementById(arg).getAttribute("d"),
			"move": function(x, y, cb, speed = 100) {
				let count = 0;
				const dx = parseFloat(x) - this.x_b,
					dy = parseFloat(y) - this.y_b,
					interval_id = setInterval(() => {
						count++;
						const put = `m${(dx * count / speed + this.x_b) + "," + (dy * count / speed + this.y_b)} ${this.rest}`;
						this.doc.setAttribute("d", put);
						if (speed < count) {
							clearInterval(interval_id);
							if (typeof(cb) == "function") {
								cb();
							}
						}
					}, 10);
			}
		}
		obj["x_b"] = parseFloat(obj.m.match(/-?\d+\.*\d*(?=,)/));
		obj["y_b"] = parseFloat(obj.m.match(/,-?\d+\.*\d*/)[0].replace(",", ""));
		obj["rest"] = obj.m.replace(/m-?\d+\.?\d*,-?\d+\.?\d*/, "");
		return obj;
	} else if (tag === "circle" || tag === "ellipse") {
		const obj = {
			"doc": document.getElementById(arg),
			"x": document.getElementById(arg).getAttribute("x"),
		}
		return obj;
	} else if (tag === "rect") {
		const obj = {
			"doc": document.getElementById(arg),
			"x_b": document.getElementById(arg).getAttribute("x"),
			"y_b": document.getElementById(arg).getAttribute("y"),
			"move": function(x, y, cb, speed = 100) {
				let count = 0;
				const dx = parseFloat(x) - parseFloat(this.x_b),
					dy = parseFloat(y) - parseFloat(this.y_b),
					interval_id = setInterval(() => {
						count++;
						this.doc.setAttribute("x", (dx * count / speed + parseFloat(this.x_b)));
						this.doc.setAttribute("y", (dy * count / speed + parseFloat(this.y_b)));
						if (speed < count) {
							clearInterval(interval_id);
							if (typeof(cb) == "function") {
								cb();
							}
						}
					}, 10);
			}
		}
		return obj;
	} else if (tag === "g") {
		let xy;
		try {
			xy = document.getElementById(arg).getAttribute("transform").match(/-?\d+\.?\d*/g);
		} catch {
			xy = [0, 0];
		}
		const obj = {
			"doc": document.getElementById(arg),
			"x_b": xy[0],
			"y_b": xy[1],
			"move": function(x, y, cb, speed = 100) {
				let count = 0;
				const dx = parseFloat(x) - parseFloat(this.x_b),
					dy = parseFloat(y) - parseFloat(this.y_b),
					interval_id = setInterval(() => {
						count++;
						this.doc.setAttribute("transform", `translate(${dx * count / speed + parseFloat(this.x_b)}, ${dy * count / speed + parseFloat(this.y_b)})`)
						if (speed < count) {
							clearInterval(interval_id);
							if (typeof(cb) == "function") {
								cb();
							}
						}
					}, 10);
			}
		}
		return obj;
	}
}