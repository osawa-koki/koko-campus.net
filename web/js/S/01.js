"use strict";

// ---> S/05.scss


const {Subject, Lesson, Page} = regexGrouping(window.location.pathname, /\/(S(?<Subject>\d+))?(L(?<Lesson>\d+))?(P(?<Page>\d+))?/);

if (Subject && Lesson && Page) {
	const url = "/A";
	const postData = URLencodeAssoc({
		"program" : "subjects",
		"action" : "getPages",
		"subject": Subject,
		"lesson": Lesson,
	});
	const data = {
		method: "POST",
		mode: "cors",
		headers: {
			"Accept": "application/json",
			"Content-Type": "application/x-www-form-urlencoded",
		}
	};
	data["body"] = postData;
	fetch(url, data)
	.then(response => response.json())
	.then(response => {
		if (response.Success) {
			const [box] = getElm(["subjectMenuBox"]);
			box.addEventListener("click", function() {
				if (!this.classList.contains("open")) {
					this.classList.add("withTransition");
					this.classList.add("open");
				}
			});
			box.addEventListener("transitionend", function() {
				this.classList.remove("withTransition");
				if (this.classList.contains("open")) {
					setTimeout(() => {
						this.classList.add("transitionFinished");
					}, 100);
				}
			});
			box.classList.add("active");
			const [mainBox, subBox] = mkElm(["div", "div"]);
			mainBox.classList.add("subjectMenuMainBox");
			subBox.classList.add("subjectMenuSubBox");
			response.Pages.forEach(page => {
				const {PageCode, PageName} = page;
				const [a] = mkElm(["a"]);
				a.classList.add("subjectsMenuComponents");
				a.href = `/S${Subject}L${Lesson}P${PageCode}`;
				a.textContent = PageName;
				if (Page === PageCode) {
					a.classList.add("this");
				}
				mainBox.appendChild(a);
			});
			mainBox.addEventListener("wheel", function(e) {
				if (fb) {
					e.preventDefault();
					if (e.wheelDelta < 0) {
						this.scrollLeft += 30;
					}
					if (0 < e.wheelDelta) {
						this.scrollLeft -= 30;
					}
				}
			});
			(() => {
				const [close, prev, next] = mkElm(["div", "div", "div"]);
				const items = [close, prev, next];
				let interval, count = 0;
				const oneTapLimit = 3;
				const oneTapScroll = 50;
				const prevDown = (function() {
					interval = setInterval(() => {
						mainBox.scrollLeft -= speedUp(count);
						count++;
					}, 30);
				});
				const prevUp = (function() {
					clearInterval(interval);
					if (count < oneTapLimit) {
						mainBox.scrollLeft -= oneTapScroll;
					}
					count = 0;
				});
				const nextDown = (function() {
					interval = setInterval(() => {
						mainBox.scrollLeft += speedUp(count);
						count++;
					}, 30);
				});
				const nextUp = (function() {
					clearInterval(interval);
					if (count < oneTapLimit) {
						mainBox.scrollLeft += oneTapScroll;
					}
					count = 0;
				});
				const speedUp = a => (oneTapLimit <= a) ? a / 5 + 5 : 0;
				const fx = [
					{
						"click": (function(e) {
							e.stopPropagation();
							this.parentNode.parentNode.classList.remove("open");
							this.parentNode.parentNode.classList.remove("transitionFinished");
						})
					},
					{
						"mousedown": prevDown,
						"mouseup": prevUp,
						"touchstart": prevDown,
						"touchend": prevUp,
						"dblclick": (function() {
							mainBox.scrollLeft = 0;
						})
					},
					{
						"mousedown": nextDown,
						"mouseup": nextUp,
						"touchstart": nextDown,
						"touchend": nextUp,
						"dblclick": (function() {
							mainBox.scrollLeft = 10000;
						})
					}
				];
				const classes = ["close", "prev", "next"];
				items.forEach((e, i) => {
					Object.keys(fx[i]).forEach(f => {
						e.addEventListener(f, fx[i][f]);
					});
					e.classList.add(classes[i]);
					subBox.appendChild(e);
				});
			})();
			box.appendChild(mainBox);
			box.appendChild(subBox);
		} else {
			window.alert(response.ErrorMessage.join("\n"))
		}
	})
	.catch(ex => {
		console.log(ex);
		window.alert("通信に失敗しました。\n時間を開けて再度登録を行ってください。")
	});
}



