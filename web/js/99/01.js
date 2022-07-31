"use strict";

window.addEventListener("load", () => {
	let gr;
	gr = Array.from(document.querySelectorAll("div.koko-graph"));
	gr.forEach(e => {
		let url;
		url = e.getElementsByClassName("url")[0].textContent;
		while(e.firstChild){
			e.removeChild(e.firstChild);
		}
		(function() {
			let xhr;
			xhr = new XMLHttpRequest();
			xhr.addEventListener("load", function() {
				create_gr(this.responseText, e);
			});
			xhr.open("GET", url);
			xhr.send();
		})();
	})
});

function create_gr(csv, pr) {
	let width, height, prpr, ppt, cnct;
	prpr = pr.parentNode;
	width = prpr.clientWidth * 0.9;
	height = width * 0.7;
	cnct = [[], []];
	let svg, g;
	g = new Array();
	(function() { //svgの作成
		let sp, k;
		svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
		sp = {
			"viewBox" : "0 0 100 70",
			"xmlns" : "http://www.w3.org/2000/svg",
		};
		for (k in sp) {
			svg.setAttribute(k, sp[k]);
		}
		sp = {
			"display" : "block",
			"margin" : "30px 0",
			"border" : "1px solid black"
		};
		for (k in sp) {
			svg.style[k] = sp[k];
		}
		pr.appendChild(svg);
	})();
	(function() {
		let sp, k;
		ppt = document.createElement("div");
		sp = {
			"display" : "flex",
			"width" : width,
			"flex-wrap" : "wrap",
			"margin" : "0 auto 50px auto",
		};
		for (k in sp) {
			ppt.style[k] = sp[k];
		}
		pr.appendChild(ppt);
	})();
	(function() {
		let i, n;
		for (i = 0; i < 5; i++) {
			n = document.createElementNS("http://www.w3.org/2000/svg", "g");
			g.push(n);
			svg.appendChild(n);
		}
	})();
	(function() {
		let i, k, l, sp, intv;
		sp = {
			"fill" : "none",
			"stroke" : "rgba(0, 0, 0, 0.1)",
			"stroke-width" : "0.1",
		};
		intv = 20;
		for (i = 0; i < intv; i++) {
			let h, v;
			h = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
			v = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
			for (k in sp) {
				h.style[k] = sp[k];
				v.style[k] = sp[k];
			}
			h.setAttribute("points", `0 ${i * 70 / intv}, 100 ${i * 70 / intv}`);
			v.setAttribute("points", `${i * 100 / intv} 0, ${i * 100 / intv} 70`);
			g[0].appendChild(h);
			g[0].appendChild(v);
		}
	})();
	let jandas, jandas_idx;
	(function() { //js版簡易pandasの作成
		let csv_temp, i, ar, ary, date, idx;
		jandas = new Object();
		jandas_idx = new Object();
		csv_temp = csv.split(/\n\r|\n|\r/);
		csv_temp = csv_temp.filter(e => e !== "");
		for (i = 0; i < csv_temp.length; i++) {
			csv_temp[i] = csv_temp[i].split(/,/);
		}
		const transpose = a => a[0].map((_, c) => a.map(r => r[c])); //2次元配列の行列を入れ替える
		csv_temp = transpose(csv_temp);
		idx = csv_temp.shift();
		jandas_idx[idx[0]] = idx.slice(1);
		for (i = 0; i < csv_temp.length; i++) {
			let ttl;
			ttl = csv_temp[i].shift();
			jandas[ttl] = new Array();
			csv_temp[i].forEach(k => {
				jandas[ttl].push(k);
			});
		}
	})();
	(function() {
		let max, k;
		max = -Infinity;
		for (k in jandas) {
			jandas[k].forEach(r => {
				r = parseInt(r);
				max = (max < r) ? r : max;
			})
		}
		for (k in jandas) {
			jandas[k] = jandas[k].map(j => j * 70 / max);
		}
	})();
	(function() {
		let k, count;
		count = 0;
		for (k in jandas) {
			let i, ttl, ary, lgt, pl, sp;
			pl = document.createElementNS("http://www.w3.org/2000/svg", "polyline");
			ary = new Array();
			lgt = jandas[k].length;
			for (i = 0; i < lgt; i++) {
				ary.push([i * 100 / lgt, 70 - jandas[k][i]]);
			}
			pl.setAttribute("points", ary.map(e => e.join(" ")).join(", "));
			sp = {
				"fill" : "none",
				"stroke" : `hsla(${count * 360 / Object.keys(jandas).length}, 100%, 50%, 1)`,
				"stroke-width" : "0.35",
				"cursor" : "pointer",
			};
			for (i in sp) {
				pl.style[i] = sp[i];
			}
			let sh_doc, obj;
			(function() {
				let kl, sp
				sh_doc = document.createElement("div");
				sp = {
					"color" : `hsla(${count * 360 / Object.keys(jandas).length}, 100%, 50%, 1)`,
					"display" : "inline-block",
					"margin" : "1px 10px",
					"padding" : "3px 10px",
					"cursor" : "pointer",
				};
				for (kl in sp) {
					sh_doc.style[kl] = sp[kl];
				}
				sh_doc.textContent = k;
				ppt.appendChild(sh_doc);
			})();
			obj = get_idx(pl, count, k, sh_doc);
			obj.ae();
			obj.re();
			obj.do();
			pl.addEventListener("mouseover", function() {
				this.style["stroke-width"] = 0.7;
			});
			pl.addEventListener("mouseleave", function() {
				this.style["stroke-width"] = 0.35;
			});
			g[1].appendChild(pl);
			count++;
		}
	})();
	(function() {
		//dateの追加
	})();
}
function get_idx(obj, num, name, sh_doc) {
	let answer;
	answer = {
		"doc" : obj,
		"idx" : num,
		"name" : name,
		"sh_doc" : sh_doc,
		"ae" : function() {
			obj.addEventListener("mouseover", () => { //thisの参照先を変更しないようにアロー関数を使用
				this.sh_doc.style["font-weight"] = "bold";
				this.sh_doc.style["border"] = "1px solid black";
			});
		},
		"re" : function() {
			obj.addEventListener("mouseleave", () => { //thisの参照先を変更しないようにアロー関数を使用
				this.sh_doc.style["font-weight"] = "normal";
				this.sh_doc.style["border"] = "none";
			});
		},
		"do" : function() {
			sh_doc.addEventListener("click", () => {
				let v;
				v = this.doc.parentNode.parentNode;
				Array.from(v.getElementsByTagName("g")[1].getElementsByTagName("polyline")).forEach(e => {
					e.style["stroke-width"] = 0.35;
				});
				Array.from(v.nextElementSibling.getElementsByTagName("div")).forEach(e => {
					e.style["font-weight"] = "normal";
					e.style["border"] = "none";
				});

				this.doc.style["stroke-width"] = 0.7;
				this.doc.parentNode.insertBefore(this.doc, this.doc.parentNode.firstChild)
				this.sh_doc.style["font-weight"] = "bold";
				this.sh_doc.style["border"] = "1px solid black";
			});
		}
	};
	return answer;
}