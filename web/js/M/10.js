(() => {
	Array.from(document.getElementById("bookmarkedBox").querySelectorAll("svg.star")).forEach(star => {
		star.addEventListener("click", function() {
			const jsonStruct = {
				"program" : "mypage",
				"action" : "bookmark",
				"subject" : this.dataset.subject,
				"lesson" : this.dataset.lesson,
				"page" : this.dataset.page,
			};
			if (star.classList.contains("off")) {
				jsonStruct["method"] = "insert";
			} else {
				jsonStruct["method"] = "delete";
			}
			const url = "/A";
			const postData = URLencodeAssoc(jsonStruct);
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
					if (star.classList.contains("off")) {
						star.classList.remove("off");
					} else {
						star.classList.add("off");
					}
				} else {
					window.alert(response.ErrorMessage.join("\n"))
				}
			})
			.catch(() => {
				window.alert("通信に失敗しました。\n時間を開けて再度登録を行ってください。")
			});
		});
	});

	const SLPtab = document.getElementById("SLPtab");
	const [S, L, P] = getElm(["SLPtabSubject", "SLPtabLesson", "SLPtabPage"]);
	const [bS, bL, bP] = getElm(["bookmarkOnSubject", "bookmarkOnLesson", "bookmarkOnPage"]);
	const reseter = () => {
		[bS, bL, bP].forEach(e => e.classList.remove("on"));
	};
	S.addEventListener("click", function() {
		reseter();
		bS.classList.add("on");
	});
	L.addEventListener("click", function() {
		reseter();
		bL.classList.add("on");
	});
	P.addEventListener("click", function() {
		reseter();
		bP.classList.add("on");
	});
	const [eS, eL, eP] = [bS, bL, bP].map(e => Array.from(e.getElementsByTagName("div")));
	const [cS, cL, cP] = getElm(["bookmarkingSubject", "bookmarkingLesson", "bookmarkingPage"]);
	eS.forEach(e => {
		e.addEventListener("click", function() {
			document.getElementById("currentBookmarkingBox").classList.remove("hidden");
			cS.textContent = this.textContent;
			cS.dataset.subject = this.dataset.subject;
			[cL.textContent, cP.textContent] = new Array(2).fill("*****");
			[cL.dataset.lesson, cP.dataset.page] = new Array(2).fill("");
			if (sb) {
				L.click();
			}
			const jsonStruct = {
				"program" : "mypage",
				"action" : "bookmark",
				"method" : "onSubject",
				"subject" : this.dataset.subject,
			};
			const url = "/A";
			const postData = URLencodeAssoc(jsonStruct);
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
					eraser(bL);
					eraser(bP);
					response.Lessons.forEach(lessonMap => {
						const elm = document.createElement("div");
						elm.dataset.subject = response.Subject;
						elm.dataset.lesson = lessonMap.lesson;
						elm.textContent = lessonMap.lessonName;
						elm.addEventListener("click", function() {
							cL.textContent = this.textContent;
							cL.dataset.lesson = this.dataset.lesson;
							if (sb) {
								P.click();
							}
							const jsonStruct = {
								"program" : "mypage",
								"action" : "bookmark",
								"method" : "onLesson",
								"subject" : this.dataset.subject,
								"lesson" : this.dataset.lesson,
							};
							const url = "/A";
							const postData = URLencodeAssoc(jsonStruct);
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
									eraser(bP);
									response.Pages.forEach(pageMap => {
										const elm = document.createElement("div");
										elm.dataset.subject = response.Subject;
										elm.dataset.lesson = response.Lesson;
										elm.dataset.page = pageMap.page;
										elm.textContent = pageMap.pageName;
										bP.appendChild(elm);
									})
								} else {
									window.alert(response.ErrorMessage.join("\n"))
								}
							})
							.catch(ex => {
								console.log(ex);
								window.alert("通信に失敗しました。\n時間を開けて再度登録を行ってください。")
							});
						});
						bL.appendChild(elm);
					})
				} else {
					window.alert(response.ErrorMessage.join("\n"))
				}
			})
			.catch(ex => {
				console.log(ex);
				window.alert("通信に失敗しました。\n時間を開けて再度登録を行ってください。")
			});
		});
	});

})();

