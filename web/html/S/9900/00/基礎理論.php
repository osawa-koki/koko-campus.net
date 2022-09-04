<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-25",
	"updated" => "2022-03-25"
);
head($obj);
?>
<h2>2進数と10進数</h2>
みなさんは数字を表現するとき何進数を使用しますか???<br /><br /><span class="cancel">多くの人は</span>、みなさん、10進数を使っていると思います。<br /><br />10進数とは、0から9までの10個の数字を使って文字を表現する手法です。<br /><br />ですけど、コンピュータは10進数を取り扱えないんです、、、<br />コンピュータが取り扱えるのは0と1だけの(バイナリといいます)データだけです。<br />言い換えればコンピュータは2進数を採用しているといえます。<br />そこで、ここでは10進数と2進数を相互に変換(基数変換)できるようになりましょう♪
<p>コンピュータの仕事ですので人がする必要はありませんが、一応コンピュータの仕組みを知るということで、、、</p>
<h2>2進数から10進数へ</h2>
ちょっとした数学の問題です。<br /><br />11010(2進数)を10進数に変換できますか???
<div class="separator"></div>
答えは以下の通りです。
<table class="from2-style x">
	<tbody>
		<tr>
			<th>意味</th>
			<td>2<sup>4</sup></td>
			<td>2<sup>3</sup></td>
			<td>2<sup>2</sup></td>
			<td>2<sup>1</sup></td>
			<td>2<sup>0</sup></td>
		</tr>
		<tr>
			<th>重み</th>
			<td>16(2<sup>4</sup>)</td>
			<td>8(2<sup>3</sup>)</td>
			<td>4(2<sup>2</sup>)</td>
			<td>2(2<sup>1</sup>)</td>
			<td>1(2<sup>0</sup>)</td>
		</tr>
		<tr>
			<th>2進数</th>
			<td>1</td>
			<td>1</td>
			<td>0</td>
			<td>1</td>
			<td>0</td>
		</tr>
		<tr>
			<th>10進数</th>
			<td>16</td>
			<td>8</td>
			<td>(0)</td>
			<td>2</td>
			<td>(0)</td>
			<td><strong>26</strong></td>
		</tr>
	</tbody>
</table>
<strong>A. 26</strong>
<div class="separator"></div>
計算方法は、各桁の重み(2<sup>0</sup>, 2<sup>1</sup>, 2<sup>2</sup>, 2<sup>3</sup>...)に2進数で表した数字(0 or 1)をかけて、それの合計を求めます。
<div class="quote">
	<div>2進数 &rarr; 10進数</div>
	10進数 = (重み &times; 2進数) の合計
</div>
以下で2進数から10進数に計算する簡単なjsプログラムを作成しました。<br />2 &rarr; 10基数変換の練習として活用してください。
<input type="text" width="10" maxlength="20" id="input-from2">
<div id="from2-button" class="button">変換</div>
<div id="warn-from2"></div>
<div id="result-from2"></div>
<div class="scroll">
	<table id="from2-table" class="from2-style">
		<tr>
			<th>意味</th>
		</tr>
		<tr>
			<th>重み</th>
		</tr>
		<tr>
			<th>2進数</th>
		</tr>
		<tr>
			<th>10進数</th>
		</tr>
	</table>
</div>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const tbl = document.getElementById("from2-table"),
			warn = document.getElementById("warn-from2"),
			result = document.getElementById("result-from2"),
			tr = tbl.getElementsByTagName("tr"),
			input = document.getElementById("input-from2"),
			btn = document.getElementById("from2-button");
		function reset() {
			const ers = Array.from(tbl.getElementsByClassName("erase"));
			ers.forEach(e => {
				e.remove();
			});
			result.textContent = "";
		}
		input.addEventListener("keydown", function(e) {
			const k = e.keyCode,
				str = String.fromCharCode(k);
			warn.textContent = ([48, 49, 96, 97].includes(k)) ? "" : "0か1で入力してください。";
		});
		input.addEventListener("input", function() {
			this.value = this.value.replace(/[^01]+/g, "");
		});
		btn.addEventListener("click", () => {
			reset();
			const n = input.value.toString(),
				len = n.length,
				ns = n.split("").reverse();
			for (let i = 0; i < len; i++) {
				(() => {
					const html = `<td class="erase">2<sup>${i}</sup></td>`;
					tr[0].insertAdjacentHTML("beforeend", html);
				})();
				(() => {
					const html = `<td class="erase"><strong>${2 ** i}</strong>(2<sup>${i}</sup>)</td>`;
					tr[1].insertAdjacentHTML("beforeend", html);
				})();
				(() => {
					const html = `<td class="erase">${ns[i]}</td>`;
					tr[2].insertAdjacentHTML("beforeend", html);
				})();
				(() => {
					const html = `<td class="erase">${(2 ** i) * ns[i]}</td>`;
					tr[3].insertAdjacentHTML("beforeend", html);
				})();
			}
			const answer = parseInt(n, 2);
			(() => {
				for (let i = 0; i < 3; i++) {
					const elm = document.createElement("td");
					elm.classList.add("erase");
					tr[i].appendChild(elm);
				}
				const elm = document.createElement("td");
				elm.classList.add("bigger");
				elm.classList.add("erase");
				elm.textContent = answer;
				tr[3].appendChild(elm);
			})();
			result.textContent = "A. " + answer.toString();
		});
	})();
</script>
<h2>10進数から2進数へ</h2>
ちょっとした数学の問題です。<br /><br />26(10進数)を2進数に変換できますか???
<div class="separator"></div>
<table class="from10-style x">
	<caption>A. 11010</caption>
	<tbody>
		<tr>
			<td>2</td>
			<td>26</td>
			<td>余り</td>
		</tr>
		<tr>
			<td>2</td>
			<td>13</td>
			<td>0</td>
		</tr>
		<tr>
			<td>2</td>
			<td>6</td>
			<td>1</td>
		</tr>
		<tr>
			<td>2</td>
			<td>3</td>
			<td>0</td>
		</tr>
		<tr>
			<td></td>
			<td>1</td>
			<td>1</td>
		</tr>
	</tbody>
</table>
商が1になるまで2で割り算していき、商が1になったら余りを下から読んでいきます。(先頭は1)<br />以下で10進数から2進数に計算する簡単なjsプログラムを作成しました。<br />2 &rarr; 10基数変換の練習として活用してください。
<div class="separator"></div>
<input type="text" width="10" maxlength="20" id="input-from10">
<div id="from10-button" class="button">変換</div>
<div id="warn-from10"></div>
<div id="result-from10"></div>
<div id="from10-scroll">
	<table id="from10-table" class="from10-style x">
		<caption></caption>
		<tbody>
			<tr>
				<td>2</td>
				<td id="from10-n"></td>
				<td>余り</td>
			</tr>
		</tbody>
	</table>
</div>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const tbl = document.getElementById("from10-table"),
			tbd = tbl.getElementsByTagName("tbody")[0],
			ans = tbl.getElementsByTagName("caption")[0],
			num = document.getElementById("from10-n"),
			warn = document.getElementById("warn-from10"),
			result = document.getElementById("result-from10"),
			input = document.getElementById("input-from10"),
			btn = document.getElementById("from10-button");
		function reset() {
			const ers = Array.from(tbl.getElementsByClassName("erase"));
			ers.forEach(e => {
				e.remove();
			});
			result.textContent = "";
		}
		input.addEventListener("keydown", function(e) {
			//「e.keyCode」は非推奨に
			reset();
			const k = e.key;
			warn.textContent = (k.match(/[0-9]/)) ? "" : "数字で入力してください。";
		});
		input.addEventListener("input", function() {
			const v = this.value.replace(/\D/g, "");
			this.value = v;
			num.textContent = v;
		});
		btn.addEventListener("click", () => {
			reset();
			const n10 = parseInt(input.value),
				n2 = n10.toString(2),
				len = n2.length;
			let quotient, remainder, 
				n = n10;
			ans.textContent = n2;
			for (let i = 0; i < len - 2; i++) {
				const tr = document.createElement("tr"),
					td1 = document.createElement("td"),
					td2 = document.createElement("td"),
					td3 = document.createElement("td");
				tr.classList.add("erase");
				[td1, td2, td3].forEach(e => {
					tr.appendChild(e);
				});
				tbd.appendChild(tr);
				quotient = Math.floor(n / 2);
				remainder = n % 2;
				td1.textContent = 2;
				td2.textContent = quotient;
				td3.textContent = remainder;
				n = quotient;
			}
			const tr = document.createElement("tr"),
				td1 = document.createElement("td"),
				td2 = document.createElement("td"),
				td3 = document.createElement("td");
			td1.textContent = "";
			td2.textContent = Math.floor(n / 2);
			td3.textContent = quotient % 2;
			tr.classList.add("erase");
			[td1, td2, td3].forEach(e => {
				tr.appendChild(e);
			});
			tbd.appendChild(tr);
		});
	})();
</script>
<div class="sec">
<h2>補助単位</h2>
みなさん、キロとかメガとかテラとかいった単位を知っていますか???<br />これらは補助単位といって桁が大きい数値を簡単に表現できるようにしてくれます。<br /><br />例えば、、、<br />1000000000バイトって言ってもピンと来ませんよね、、、<br />ゼロを大量に並べられたのでは見ずらいですし、容量ももったいないです、、、<br />これを1Gって表現したらどうでしょうか???<br /><br />すごく美しいですよね!!!<br /><br />そこで、ここでは有名な補助単位について学びましょう♪
<table>
	<caption>大きいバージョン</caption>
	<tbody>
		<tr>
			<th>k(キロ)</th>
			<td>10<sup>3</sup>(1,000)</td>
		</tr>
		<tr>
			<th>M(メガ)</th>
			<td>10<sup>6</sup>(1,000,000)</td>
		</tr>
		<tr>
			<th>G(ギガ)</th>
			<td>10<sup>9</sup>(1,000,000,000)</td>
		</tr>
		<tr>
			<th>T(テラ)</th>
			<td>10<sup>12</sup>(1,000,000,000,000)</td>
		</tr>
	</tbody>
</table>
<table>
	<caption>小さいバージョン</caption>
	<tbody>
		<tr>
			<th>m(ミリ)</th>
			<td>10<sup>-3</sup>(0.001)</td>
		</tr>
		<tr>
			<th>μ(マイクロ)</th>
			<td>10<sup>-6</sup>(0.000,01)</td>
		</tr>
		<tr>
			<th>n(ナノ)</th>
			<td>10<sup>-9</sup>(0.000,000,01)</td>
		</tr>
		<tr>
			<th>p(ピコ)</th>
			<td>10<sup>-12</sup>(0.000,000,000,01)</td>
		</tr>
	</tbody>
</table>
<h2>集合論</h2>
柴犬・くじら・ひつじは動物で、チューリップ・まりも・芝は植物で、ミジンコは動物かつ植物でっと、、、<br />なんだか文章だと複雑ですね、、、<br />困っちゃいましたね、、、<br />どうしましょうか、、、
<img src="../pics/ベン図.png" alt="ベン図" />
じゃじゃーん♪<br /><br />ベン図の登場です!!!<br /><br />ベン図では集合に関して分かりやすく説明してくれます。<br />2つの円を書いて片方だけに含まれるもの、両方に含まれるもの、どちらにも含まれないものに分類します。
<h2>論理演算</h2>
ベン図(集合)で大切なのは論理演算です。<br /><br />論理演算とは「かつ」「または」「ない」といった演算によって集合に含まれる要素を限定します。<br />「動物または植物」といったらいわゆる、「生物」(動物 + 植物)が該当しますね。<br />ひつじ・ミドリムシ・まりも・etc...です。<br />「動物かつ植物」といったら、動物と植物の性質をあわせもつミドリムシが該当しますね♪<br /><br />代表的な論理演算には以下の3種類あります。
<ul>
	<li>論理和演算(または)</li>
	<li>論理積演算(かつ)</li>
	<li>否定演算(ない)</li>
	<li>排他的論理和演算</li>
</ul>
また、論理演算では「真(true)」と「偽(false)」を対象として扱います。<br />真の状態を「1」、偽の状態を「0」で表すこともあります。
<h2>真理値表</h2>
真理値表とは論理演算の結果を表にまとめたものを言います。
<h3>論理和演算</h3>
「または」による演算です。<br /><strong>いずれか</strong>が「真」の場合に「真」となり、両方とも「偽」の場合に「偽」となります。
<table class="logic">
	<caption>論理和演算の真理値表</caption>
	<thead>
		<tr>
			<th>A</th>
			<th>B</th>
			<th>A or B</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>1</td>
			<td>1</td>
		</tr>
		<tr>
			<td>1</td>
			<td>0</td>
			<td>1</td>
		</tr>
		<tr>
			<td>0</td>
			<td>1</td>
			<td>1</td>
		</tr>
		<tr>
			<td>0</td>
			<td>0</td>
			<td>0</td>
		</tr>
	</tbody>
</table>
「真」と「偽」で表すと以下のようになります。
<table class="logic">
	<caption>論理和演算の真理値表</caption>
	<thead>
		<tr>
			<th>A</th>
			<th>B</th>
			<th>A or B</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>真</td>
			<td>真</td>
			<td>真</td>
		</tr>
		<tr>
			<td>真</td>
			<td>偽</td>
			<td>真</td>
		</tr>
		<tr>
			<td>偽</td>
			<td>真</td>
			<td>真</td>
		</tr>
		<tr>
			<td>偽</td>
			<td>偽</td>
			<td>偽</td>
		</tr>
	</tbody>
</table>
<h3>倫理積演算</h3>
「かつ」による演算です。<br />両方とも「真」の場合に「真」となり、いずれかが「偽」の場合に「偽」となります。
<table class="logic">
	<caption>論理積演算の真理値表</caption>
	<thead>
		<tr>
			<th>A</th>
			<th>B</th>
			<th>A and B</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>1</td>
			<td>1</td>
		</tr>
		<tr>
			<td>1</td>
			<td>0</td>
			<td>0</td>
		</tr>
		<tr>
			<td>0</td>
			<td>1</td>
			<td>0</td>
		</tr>
		<tr>
			<td>0</td>
			<td>0</td>
			<td>0</td>
		</tr>
	</tbody>
</table>
「真」と「偽」で表すと以下のようになります。
<table class="logic">
	<caption>論理積演算の真理値表</caption>
	<thead>
		<tr>
			<th>A</th>
			<th>B</th>
			<th>A and B</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>真</td>
			<td>真</td>
			<td>真</td>
		</tr>
		<tr>
			<td>真</td>
			<td>偽</td>
			<td>偽</td>
		</tr>
		<tr>
			<td>偽</td>
			<td>真</td>
			<td>偽</td>
		</tr>
		<tr>
			<td>偽</td>
			<td>偽</td>
			<td>偽</td>
		</tr>
	</tbody>
</table>
<h3>否定演算</h3>
「ない」による演算です。<br />「真」と「偽」を入れ替えます。
<table class="logic">
	<caption>否定演算の真理値表</caption>
	<thead>
		<tr>
			<th>A</th>
			<th>not A</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>0</td>
		</tr>
		<tr>
			<td>0</td>
			<td>1</td>
		</tr>
	</tbody>
</table>
「真」と「偽」で表すと以下のようになります。
<table class="logic">
	<caption>否定演算の真理値表</caption>
	<thead>
		<tr>
			<th>A</th>
			<th>not A</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>真</td>
			<td>偽</td>
		</tr>
		<tr>
			<td>偽</td>
			<td>真</td>
		</tr>
	</tbody>
</table>
<h3>排他的論理和演算</h3>
少し複雑です。<br />どちらか一方だけが「真」の場合に「真」、両方とも「真」または両方とも「偽」の場合には「偽」となります。
<table class="logic">
	<caption>排他的論理和演算の真理値表</caption>
	<thead>
		<tr>
			<th>A</th>
			<th>B</th>
			<th>A xor B</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>1</td>
			<td>0</td>
		</tr>
		<tr>
			<td>1</td>
			<td>0</td>
			<td>1</td>
		</tr>
		<tr>
			<td>0</td>
			<td>1</td>
			<td>1</td>
		</tr>
		<tr>
			<td>0</td>
			<td>0</td>
			<td>0</td>
		</tr>
	</tbody>
</table>
「真」と「偽」で表すと以下のようになります。
<table class="logic">
	<caption>排他的論理和演算の真理値表</caption>
	<thead>
		<tr>
			<th>A</th>
			<th>B</th>
			<th>A xor B</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>真</td>
			<td>真</td>
			<td>偽</td>
		</tr>
		<tr>
			<td>真</td>
			<td>偽</td>
			<td>真</td>
		</tr>
		<tr>
			<td>偽</td>
			<td>真</td>
			<td>真</td>
		</tr>
		<tr>
			<td>偽</td>
			<td>偽</td>
			<td>偽</td>
		</tr>
	</tbody>
</table>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const tbl = Array.from(document.getElementsByClassName("logic"));
		tbl.forEach(e => {
			const td = Array.from(e.getElementsByTagName("tbody")[0].getElementsByTagName("td"));
			td.forEach(f => {
				const t = f.textContent;
				f.style.backgroundColor = (t.match(/[1真]/)) ? "rgba(255, 0, 0, 0.2)" : "rgba(0, 0, 255, 0.2)";
			});
		});
	})();
</script>
<?php footer(); ?>