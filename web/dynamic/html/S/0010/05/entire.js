"use strict";


let app;
window.addEventListener("load", () => {
	const url = decodeURI(window.location.href);
	if (url.match("vue.jsの基本")) {
		let app1 = new Vue({
			el: "#app1",
			data: {
				message: "hello world!",
				array: ["ゼニガメ", "チコリータ", "フシギバナ"]
			}
		});
		let app2 = new Vue({
			el: "#app2",
			data: {
				array: ["ゼニガメ", "チコリータ", "フシギバナ"]
			}
		});
		let app3 = new Vue({
			el: "#app3",
			data: {
				tf: true,
				answer: "「真」ですね♪"
			}
		})
	} else if (url.match("データの登録・更新")) {
		let app1 = new Vue({
			el: "#app1",
			data: {
				content: ""
			}
		});
		let app2 = new Vue({
			el: "#app2",
			data: {
				content: ""
			},
			methods: {
				clicked: function() {
					window.alert(this.content);
				}
			}
		});
		let app3 = new Vue({
			el: "#app3",
			data: {
				obj: {
					width: "150px",
					height: "100px",
					border: "1px solid black",
					borderRadius: "25px",
					backgroundColor: "red",
				}
			}
		});
		let app4 = new Vue({
			el: "#app4",
			data: {
				obj: [
					{id: 152, name: "チコリータ", type: "くさ"},
					{id: 183, name: "マリル", type: "みず"},
					{id: 202, name: "ソーナンス", type: "ノーマル"},
				]
			}
		});
	} else if (url.match("イベントリスナー")) {
		let app1 = new Vue({
			el: "#app1",
			data: {
				count: 0
			},
			methods: {
				click: function() {
					this.count++;
				}
			}
		});
		let count = 0;
		document.getElementById("button").addEventListener("click", () => {
			count++;
			document.getElementById("count").textContent = count;
		});
		let app2 = new Vue({
			el: "#app2",
			data: {
				content: ""
			}
		});
		let app3 = new Vue({
			el: "#app3",
			data: {
				content: ""
			},
			methods: {
				show_dialog: function(event) {
					window.alert(event.target.value);
				}
			}
		});
	} else if (url.match("算出プロパティ")) {
		let app1 = new Vue({
			el: "#app1",
			data: {
				r2: 50,
				bg_color: "red",
				bd_rad: "50%"
			},
			computed: {
				pai_r2: function() {
					return this.r2 * Math.PI;
				}
			}
		});
	}
});