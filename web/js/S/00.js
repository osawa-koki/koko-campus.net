"use strict";

const [objToPutBr, createIndex] = [
	(() => {
		const objToPutBr = document.querySelectorAll("ul:not(.x), ol:not(.x)");
		objToPutBr.forEach(e => {
			const [br1, br2, p] = [...mkElm(["br", "br"]), e.parentNode];
			p.insertBefore(br1, e);
			p.insertBefore(br2, e.nextSibling);
		});
		return 0;
	}),
	(() => {
		const [indexBox, partTitle, indexTitle, indexOlBox] = [
			document.getElementById("subjectIndexBox"),
			document.getElementsByTagName("h2"),
			...mkElm(["div", "ul"])
		];
		if (indexBox === null) return 1
		indexTitle.textContent = `目次`;
		indexTitle.classList.add("indexTitle");
		indexBox.appendChild(indexTitle);
		indexOlBox.classList.add("x");
		Array.from(partTitle).forEach(e => {
			const li = document.createElement("li");
			li.textContent = e.textContent;
			scrollObj(li, e).prepare();
			indexOlBox.appendChild(li);
		});
		indexBox.appendChild(indexOlBox);
		return 0;
	}),
	(() => {

	})
];

const scrollObj = (from, to) => ({
	"from" : from,
	"to" : to,
	"prepare" : function() {
		this.from.addEventListener("click", () => {
			const [f, t, gap] = [window.scrollY, window.pageYOffset + this.to.getBoundingClientRect().top, 50];
			const d = t - f;
			let [interval, count] = [null, 0];
			interval = setInterval(() => {
				scrollTo(0, count * d / gap + f - 100);
				if (gap <= count) {
					clearInterval(interval);
					this.to.style.color = "red";
					setTimeout(() => {
						this.to.style.color = "black";
					}, 1000);
				}
				count++;
			}, 10);
		});
	}
});

const rootFx = () => {
	[objToPutBr, createIndex].map(fx => {
		if (fx() === 0) {
			console.log(`completed!`);
			return
		}
	});
	return 0;
};

window.addEventListener("load", () => {
	if (eq(rootFx(), 0)) {
		console.log("rootFx completed!");
	}
});
