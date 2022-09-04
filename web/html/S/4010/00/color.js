"use strict";

new Vue({
	el: "#color",
	data: {
		r: 255,
		g: 0,
		b: 0
	},
	computed: {
		rr: function() {
			return `linear-gradient(to right, rgb(0, ${this.g}, ${this.b}), rgb(255, ${this.g}, ${this.b}))`;
		},
		gg: function() {
			return `linear-gradient(to right, rgb(${this.r}, 0, ${this.b}), rgb(${this.r}, 255, ${this.b}))`;
		},
		bb: function() {
			return `linear-gradient(to right, rgb(${this.r}, ${this.g}, 0), rgb(${this.r}, ${this.g}, 255))`;
		},
		now: function() {
			return `rgb(${this.r}, ${this.g}, ${this.b})`;
		},
		font_color: function() {
			if ((parseInt(this.r) + parseInt(this.g) + parseInt(this.b)) / 3 > 255 / 2) {
				return "black";
			} else {
				return "white";
			}
		}
	}
});