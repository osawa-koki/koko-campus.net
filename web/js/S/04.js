"use strict";

(() => {
	const collapsers = Array.from(document.getElementById("subjectMainBox").getElementsByClassName("collapser"));
	collapsers.forEach(collapser => {
		const len = parseInt(collapser.dataset.count) || 1;
		console.log(len);
		let elm = collapser;
		for (let i = 0; i < len; i++) {
			elm = elm.nextElementSibling;
			elm.classList.add("hidden");
		}
		collapser.addEventListener("click", function() {
			const len = parseInt(this.dataset.count) || 1;
			if (this.classList.contains("open")) {
				this.classList.remove("open");
				let elm = this;
				for (let i = 0; i < len; i++) {
					elm = elm.nextElementSibling;
					elm.classList.add("hidden");
				}
			} else {
				this.classList.add("open");
				let elm = this;
				for (let i = 0; i < len; i++) {
					elm = elm.nextElementSibling;
					elm.classList.remove("hidden");
				}
			}
		});
	});
})();

