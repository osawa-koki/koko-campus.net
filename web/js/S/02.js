"use strict";

(() => {
	const imgs = Array.from(document.getElementById("subjectMainBox").getElementsByTagName("img"));
	const zoomedImgBox = document.getElementById("zoomedImgBox");
	imgs.forEach(e => {
		e.addEventListener("click", function() {
			zoomedImgBox.classList.add("on");
			const doc = document.createElement(e.tagName);
			doc.src = e.src;
			doc.classList.add("zoomed");
			doc.addEventListener("click", event => event.stopPropagation());
			zoomedImgBox.appendChild(doc);
		});
	});
	zoomedImgBox.addEventListener("click", function() {
		if (this.classList.contains("on")) {
			this.classList.remove("on");
			Array.from(document.getElementById("zoomedImgBox").getElementsByTagName("img")).forEach(e => {
				e.remove();
			});
		}
	});
})();
