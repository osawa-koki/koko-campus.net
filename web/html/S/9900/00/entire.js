"use strict";

function scroll_to(doc, speed = 50, propotion = 4) {
	const scrolled = window.scrollY,
		height = window.innerHeight / propotion,
		between = doc.getBoundingClientRect().top + window.pageYOffset - scrolled - height;
	let count = 0;
	const interval_id = setInterval(() => {
		count++;
		scrollTo(0, between * count / speed + scrolled);
		if (speed < count) {
			clearInterval(interval_id);
		}
	}, 5)
}