"use strict";

// koko-code

window.addEventListener("load", function() {
	const code = Array.from(document.getElementsByTagName("code"));
	code.forEach(e => {
		let txt, min, a, i;
		const style = {
			"display" : "block",
			"position" : "relative",
			"font-size" : "15px",
			"font-family" : `"consolas", "Consolas", "code"`,
			"line-height" : "18px",
			"letter-spacing" : "1px",
			"margin" : "30px 0",
			"box-sizing" : "border-box",
			"width" : "100%",
			"max-width" : "800px",
			"border-width" : "1px 1px 1px 7px",
			"border-style" : "solid",
			"border-color" : "grey grey grey purple",
			"padding" : "50px 25px 25px 25px",
			"white-space" : "nowrap",
			"overflow" : "auto hidden",
			"z-index" : "1",
		};
		for (i in style) {
			e.style[i] = style[i];
		}
		txt = e.innerHTML.replace(/^\n/g, "").replace(/\n$/g, "").split("\n"); //最初と最後の改行文字を削除した後に、改行文字で区切って配列に変換
		min = Infinity;
		txt.forEach(j => {
			try {min = ((j.match(/\t/g ) || []).length < min) ? j.match(/\t/g).length : min} catch (error) {}; //最初のインデントの最小値を取得
		});
		min = (min === Infinity) ? 0 : min; //無限ループ防止
		for (let i = 0; i < txt.length; i++) {
			for (let j = 0; j < min; j++) {
				txt[i] = txt[i].replace("\t", ""); //全ての行から最小のインデント分のタブ文字を削除
			}
		}
		if (e.classList.contains("dummy")) { //中身を変更しない(code_cuterは不使用)
			e.innerHTML = txt.join("\n").replace(/\n/g, "<br />").replace(/\t/g, "&nbsp".repeat(4));
			e.classList.remove("dummy"); //左上に表示する際に邪魔にならないように削除

		} else { //中身を変更する(デフォルト)
			e.innerHTML = code_cuter(txt.join("\n")).replace(/\n/g, "<br />").replace(/\t/g, "&nbsp".repeat(4));
		}
		(function() {
			let i, elm, style, cn, nm;
			elm = document.createElement("span");
			style = {
				"position" : "absolute",
				"display" : "inline-block",
				"padding" : "5px 10px",
				"background-color" : "fuchsia",
				"top" : "0",
				"left" : "0",
				"color" : "white",
			};
			for (i in style) {
				elm.style[i] = style[i];
			}
			nm = {
				"cs" : "C#",
				"vb-net" : "vb.net",
				"-dot-" : "."
			},
			cn = e.className;
			for (i in nm) {
				cn = cn.replace(i, nm[i]);
			}
			elm.textContent = cn;
			e.appendChild(elm);
		})();
	});
	(function() {
		let fontface;
		fontface = new FontFace(
			"code",
			"url(https://koko-campus.org/font-family/consolas.ttf)",
			{style: "normal", weight: 500}
		);
		fontface.load()
		.then(function(loadedFace) {
			document.fonts.add(loadedFace);
			code.forEach(e => {
				e.style["font-family"] = "code";
			});
		})
		.catch(error => {
			code.forEach(e => {
				e.style["font-family"] = "consolas, consola, monospace";
			});
		});
	});
});
const code_cuter = (txt, cls) => {
	let k;
	for (k of z) {
		let r, cb;
		r = new RegExp(k["preg"], "gsm");
		cb = k["cbfx"];
		txt = txt.replace(r, cb);
	}
	return txt;
}
const z = [
	{
		"preg" : `[ \\t]\\/\\/.+?\\n|[ \\t]\\/\\/.+?$`,
		"cbfx" : function(m) {
			m = m.split("");
			m = m.map(cbm => {
				return `<span style='color: grey; font-size: 0.95rem;'>${cbm}</span>`;
			});
			return m.join("");
		},
	},
	{
		"preg" : `[ \\t]'[^']*?\n|[ \\t]'[^']*?$`,  //vb
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				m = m.split("");
				m = m.map(cbm => {
					return `<span style='color: grey; font-size: 0.95rem;'>${cbm}</span>`;
				});
				return m.join("");
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `^'[^']*?\n|^'[^']*?$`,  //vb
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				m = m.split("");
				m = m.map(cbm => {
					return `<span style='color: grey; font-size: 0.95rem;'>${cbm}</span>`;
				});
				return m.join("");
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `[ \\t]-{2,} .*?\n|[ \\t]-{2,} .*?$`, //hs
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				m = m.split("");
				m = m.map(cbm => {
					return `<span style='color: grey; font-size: 0.95rem;'>${cbm}</span>`;
				});
				return m.join("");
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `! .*?(\n|$)`, //fortran
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				m = m.split("");
				m = m.map(cbm => {
					return `<span style='color: grey; font-size: 0.95rem;'>${cbm}</span>`;
				});
				return m.join("");
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `\\/\\*.*?\\*\\/`,
		"cbfx" : function(m) {
			let check = true,
				temp = "";
			m = m.split("");
			m = m.map(cbm => {
				if (cbm === "&" && check) { //&エスケープ処理の開始
					check = false;
					temp += cbm;
					return;
				} else if (cbm === ";" && !check) { //&エスケープ処理の終了
					check = true;
					cbm = temp + cbm;
					temp = "";
				} else if (!check) { //&エスケープ処理の途中
					temp += cbm;
					return;
				}
				return `<span style='color: grey; font-size: 0.95rem;'>${cbm}</span>`;
			});
			return m.join("");
		},
	},
	{
		"preg" : `{-.*?-}`, //hs
		"cbfx" : function(m) {
			let check = true,
				temp = "";
			m = m.split("");
			m = m.map(cbm => {
				if (cbm === "&" && check) { //&エスケープ処理の開始
					check = false;
					temp += cbm;
					return;
				} else if (cbm === ";" && !check) { //&エスケープ処理の終了
					check = true;
					cbm = temp + cbm;
					temp = "";
				} else if (!check) { //&エスケープ処理の途中
					temp += cbm;
					return;
				}
				return `<span style='color: grey; font-size: 0.95rem;'>${cbm}</span>`;
			});
			return m.join("");
		},
	},
	{
		"preg" : `&lt;!--(.+)?--&gt;`,
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				let check = true,
					temp = "";
				m = m.split("");
				m = m.map(cbm => {
					if (cbm === "&" && check) { //&エスケープ処理の開始
						check = false;
						temp += cbm;
						return;
					} else if (cbm === ";" && !check) { //&エスケープ処理の終了
						check = true;
						cbm = temp + cbm;
						temp = "";
					} else if (!check) { //&エスケープ処理の途中
						temp += cbm;
						return;
					}
					return `<span style='color: grey; font-size: 0.95rem;'>${cbm}</span>`;
				});
				return m.join("");
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `# .+?\\n|# .+?$`, //py
		"cbfx" : function(m) {
			let check = true,
				temp = "";
			m = m.split("");
			m = m.map(cbm => {
				if (cbm === "&" && check) { //&エスケープ処理の開始
					check = false;
					temp += cbm;
					return;
				} else if (cbm === ";" && !check) { //&エスケープ処理の終了
					check = true;
					cbm = temp + cbm;
					temp = "";
				} else if (!check) { //&エスケープ処理の途中
					temp += cbm;
					return;
				}
				return `<span style='color: grey; font-size: 0.95rem;'>${cbm}</span>`;
			});
			return `${m.join("")}`;
		},
	},
	{
		"preg" : `=begin.*?=end`, //rb
		"cbfx" : function(m) {
			let check = true,
				temp = "";
			m = m.split("");
			m = m.map(cbm => {
				if (cbm === "&" && check) { //&エスケープ処理の開始
					check = false;
					temp += cbm;
					return;
				} else if (cbm === ";" && !check) { //&エスケープ処理の終了
					check = true;
					cbm = temp + cbm;
					temp = "";
				} else if (!check) { //&エスケープ処理の途中
					temp += cbm;
					return;
				}
				return `<span style='color: grey; font-size: 0.95rem;'>${cbm}</span>`;
			});
			return `${m.join("")}`;
		},
	},
	{
		"preg" : `(".*?")`,
		"cbfx" : function(m) {
			let check = true,
				temp = "";
			m = m.split("");
			m = m.map(cbm => {
				if (cbm === "&" && check) { //&エスケープ処理の開始
					check = false;
					temp += cbm;
					return;
				} else if (cbm === ";" && !check) { //&エスケープ処理の終了
					check = true;
					cbm = temp + cbm;
					temp = "";
				} else if (!check) { //&エスケープ処理の途中
					temp += cbm;
					return;
				}
				return `<span style='color: green;'>${cbm}</span>`;
			});
			return `${m.join("")}`;
		},
	},
	{
		"preg" : `function ([a-zA-Z0-9_]+)\\((.*?)\\)`, //json内である為、バックスラッシュに対してもエスケープ処理が必要
		"cbfx" : function(m, m1, m2) {
			let p;
			p = new Array;
			if (m2 !== "") {
				m2.replace(/ /, "").split(",").forEach(r => {
					p.push(`<span style='color: orange'>${r}</span>`);
				});
			}
			return `<span style='color: purple; font-style: italic;'>function</span> <span style='color: teal;'>${m1}</span>(${p.join(", ")})`;
		},
	},
	{
		"preg" : `def ([a-zA-Z0-9_]+)\\((.*?)\\)`, //json内である為、バックスラッシュに対してもエスケープ処理が必要
		"cbfx" : function(m, m1, m2) {
			let p;
			p = new Array;
			if (m2 !== "") {
				m2.replace(/ /, "").split(",").forEach(r => {
					p.push(`<span style='color: orange'>${r}</span>`);
				});
			}
			return `<span style='color: purple; font-style: italic;'>def</span> <span style='color: teal;'>${m1}</span>(${p.join(", ")})`;
		},
	},
	{
		"preg" : `fn ([a-zA-Z0-9_]+)\\((.*?)\\)`, //json内である為、バックスラッシュに対してもエスケープ処理が必要
		"cbfx" : function(m, m1, m2) {
			let p;
			p = new Array;
			if (m2 !== "") {
				m2.split(",").forEach(r => {
					p.push(`<span style='color: orange'>${r}</span>`);
				});
			}
			return `<span style='color: purple; font-style: italic;'>fn</span> <span style='color: teal;'>${m1}</span>(${p.join(", ")})`;
		},
	},
	{
		"preg" : `func ([a-zA-Z0-9_]+)\\((.*?)\\)`, //json内である為、バックスラッシュに対してもエスケープ処理が必要
		"cbfx" : function(m, m1, m2) {
			let p;
			p = new Array;
			if (m2 !== "") {
				m2.split(",").forEach(r => {
					p.push(`<span style='color: orange'>${r}</span>`);
				});
			}
			return `<span style='color: purple; font-style: italic;'>func</span> <span style='color: teal;'>${m1}</span>(${p.join(", ")})`;
		},
	},
	{
		"preg" : `(typedef|enum|struct) `,
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: purple;'>${m}</span> `;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `(if|else|elif|elsif|switch|for|while|mainloop|loop|end|case|when|until)([^\\w=]|$)`,
		"cbfx" : function(m, m1, m2) {
			if (!m.match(/<|>/)) {
				return `<span style='color: red;'>${m1}</span>${m2}`;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : ` (in|of|as) `,
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return ` <span style='color: orange;'>${m}</span> `;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `(return|Return|del) `,
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: orange;'>${m}</span> `;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `(class|package|import|from) `,
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: red;'>${m}</span> `;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `(public|private|protected) `,
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: orange;'>${m}</span> `;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `.(int|short|long|float|double|char|let|const|var|boolean|String) `,
		"cbfx" : function(m) {
			if (!m.match(/<|>/) && !m.charAt(0).match(/\w/)) {
				return `<span style='color: teal;'>${m}</span> `;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `^(int|short|long|float|double|char|let|const|var|boolean|String) `,
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: teal;'>${m}</span> `;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : ` (\\+|-|\\*|/|%|={1,3}|&lt;=?|&gt;=?|!==|!=|::|:=|-&gt;) `,
		"cbfx" : function(m, m1) {
			if (!m.match(/<|>/)) {
				return ` <span style='color: orange;'>${m1}</span> `;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `([a-zA-Z0-9_!]+?)\\((.*?)\\)`,
		"cbfx" : function(m, m1, m2) {
			if (!m1.match(/<|>/)) {
				return `<span style='color: blue;'>${m1}</span>(${m2})`;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `(&lt;\\/?)(\\w+)`,
		"cbfx" : function(m, m1, m2, m3) {
			if (!m.match(/<|>/)) {
				return `${m1}<span style='color: blue;'>${m2}</span>`;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `Dim|As`, //vb
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: purple;'>${m}</span>`;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : ` (Integer|String|Boolean|Single|Double)`, //vb
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return ` <span style='color: teal;'>${m}</span>`;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `End (\\w+)`, //vb
		"cbfx" : function(m, m1) {
			if (!m.match(/<|>/)) {
				return `<span style='color: red;'>End ${m1}</span>`;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `(With|Try|Catch|If|Select|For) `, //vb
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: red;'>${m}</span> `
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `(Sub|Class|Function|Namespace|Structure) `, //vb
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: red;'>${m}</span> `
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `Public|Private`, //vb, java
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: purple;'>${m}</span>`
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `((?:Select )?Case) ([^\\n]+)`, //vb
		"cbfx" : function(m, m1, m2) {
			if (!m.match(/<|>/)) {
				return `<span style='color: red;'>${m1}</span> <span style='color: orange;'>${m2}</span>`;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `Case Is`, //vb
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: red;'>${m}</span>`;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `Case Else`, //vb
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: red;'>${m}</span>`;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `(If|ElseIf) (.+?) (Then)`, //vb
		"cbfx" : function(m, m1, m2, m3) {
			if (!m.match(/<|>/)) {
				return `<span style='color: red;'>${m1}</span> <span style='color: orange;'>${m2}</span> <span style='color: blue;'>${m3}</span>`;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `Else`, //vb
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: red;'>${m}</span>`;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `(For|To|Next|Do|Until|While|Loop|In|Each)( |\\n)|(For|To|Next|Do|Until|While|Loop|In|Each)$`, //vb
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: blue;'>${m}</span> `;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `(program|end program|stop|PROGRAM|END PROGRAM|STOP)`, //fortran
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: red;'>${m}</span> `;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `(write|WRITE|read|READ)`, //fortran
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: blue;'>${m}</span> `;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `(implicit none)`, //fortran
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: orange;'>${m}</span> `;
			} else {
				return m;
			}
		},
	},
	{
		"preg" : `(INTEGER|INTEGER\\*8|REAL|DOUBLE PRECISION|COMPLEX|DOUBLE COMPLEX|LOGICAL|CHARACTER)`, //fortran
		"cbfx" : function(m) {
			if (!m.match(/<|>/)) {
				return `<span style='color: orange;'>${m}</span> `;
			} else {
				return m;
			}
		},
	},
];