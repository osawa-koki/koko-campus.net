"use strict";

// ---> S/05.scss

/*
MENUボックス用プログラム
*/

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
					}, 30);
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
			const [close] = mkElm(["div"]);
			close.addEventListener("click", function(event) {
				event.stopPropagation();
				this.parentNode.parentNode.classList.remove("open");
				this.parentNode.parentNode.classList.remove("transitionFinished");
			});
			close.classList.add("close");
			subBox.appendChild(close);
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



