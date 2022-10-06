<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-25",
	"updated" => "2022-03-25"
);
head($obj);
?>
<h2>アルゴリズム</h2>
アルゴリズムとは問題と解法のことを言います。<br />コンピュータって我々人間と異なりいい感じにってのが出来ないんです、、、<br /><br />きっちりと解き方をひとつずつ指示していく必要があります。<br /><br />例えば、以下の入力欄に数字を入力してください。<br />入力された数字を大きい順に並び替えるアルゴリズムを紹介します。
<div id="algo-box" class="algorythm-container">
	<input type="number" value="1" />
	<input type="number" value="6" />
	<input type="number" value="3" />
	<input type="number" value="9" />
	<input type="number" value="5" />
</div>
<div id="algo-button" class="button">開始</div>
<div id="algo-answer" class="algorythm-container"></div>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const algo = document.getElementById("algo-box"),
			bx = Array.from(algo.children),
			check = Array.from({length: 5}, () => true),
			btn = document.getElementById("algo-button"),
			ans = document.getElementById("algo-answer");
		let x_lock = 0;
		bx.forEach(e => {
			e.addEventListener("input", function() {
				const n = bx.indexOf(this),
					v = this.value,
					num = parseInt(v);
				this.value = v.substr(0, 3);
				if (0 < num && num <= 999) {
					check[n] = true;
					if (!check.includes(false)) {
						btn.classList.remove("cancel");
						x_lock = 0;
					} else {
						btn.classList.add("cancel");
					}
				} else {
					check[n] = false;
				}
			});
		});
		function recursive_do(n, m, mn, upto) {
			setTimeout(() => {
				try {
					bx[n - 1].style.backgroundColor = "";
				} catch {}
				if (n < upto) {
					const num = parseInt(bx[n].value);
					bx[n].style.backgroundColor = "yellow";
					if (m <= num) {
						m = num;
						if (bx[mn]) {
							bx[mn].style.color = "";
						}
						bx[n].style.color = "red";
						mn = n;
					}
					recursive_do(n + 1, m, mn, upto);
			} else {
				const rest = Array.from(document.getElementById("algo-box").children);
				if (rest.length) {
					ans.appendChild(bx[mn]);
					bx.splice(mn, 1);
					recursive_do(0, 0, false, upto - 1);
				} else {
					btn.textContent = "リセット";
					btn.classList.remove("cancel");
					x_lock = 2;
				}
				}
			}, 1000);
		}
		btn.addEventListener("click", () => {
			if (x_lock === 0) {
				x_lock = 1;
				btn.classList.add("cancel");
				bx.forEach(e => {
					e.disabled = true;
				});
				recursive_do(0, 0, false, bx.length);
			} else if (x_lock === 2) {
				const fined = Array.from(ans.children);
				fined.forEach(e => {
					bx.push(e);
					algo.appendChild(e);
					btn.textContent = "開始";
					btn.classList.remove("cancel");
					x_lock = 0;
				});
				bx.forEach(f => {
					f.disabled = false;
					f.style.color = "";
					f.value = Math.floor(Math.random() * 30);
				});
			}
		});
	})();
</script>
数字をひとつずつチェックしていき、過去の最大値よりもその中で一番大きい数字を保留していきます。<br />一周して最終的に一番大きい数字を取り出し、別の列の先頭に並べてもう一度数字をひとつずつチェックしていきます。<br />これを数字がなくなるまで繰り返します。
<h2>変数</h2>
プログラムを実行するにあたって必要となる一時的なデータを保存するための「箱」です。<br />先ほどの例では暫定的に一番大きい数字を変数に格納しました。<br /><br />あくまでもプログラム実行時に必要とされるデータを一時的に格納するため、プログラムの実行が完了した際には削除されます。<br />より高精度のプログラミング言語を使用している場合にはもっと柔軟に変数に格納されているデータを削除することがありますが、ここでは覚える必要がありません。
<code class="python">
	var = "python"
</code>
上はpythonというプログラミング言語での変数を使用したコード例です。<br />上では「var」という変数に「python」という文字列を格納しています。<br /><br />「=」って見ると「イコール」で等価を意味しそうですが、プログラミングの世界では右の値を左の変数に代入することを意味します。<br /><br />では、「var」変数に格納されたデータを表示してみましょう♪
<code class="python">
	var = "python"
	print(var)
</code>
上のコードを実行すると「python」と出力されます。
<img src="../pics/変数.gif" alt="変数" />
具体的な変数の仕様はプログラミング言語によって異なるためここでは覚える必要はありませんが、なんとなく変数ってのはプログラムを実行する際に必要となる一時的なデータを格納するものなんだな程度に覚えてください。
<h2>データ構造</h2>
プログラムの世界の巨匠であるニコラス・ウィルスは「プログラム = アルゴリズム + データ構造」という言葉を残しています。<br />アルゴリズムについては既に説明しましたね♪<br />解法のことです。<br /><br />データ構造とは変数などに格納するデータの構造を言います。<br />例えば、「ピカチュウ」「ポッチャマ」「ナエトル」などの同類のデータは配列としてひとめとめにして管理し、「日本」「埼玉」「東京」「草加」「春日部」「千代田」「足立」などのデータは階層構造をとるため木構造というデータ構造で管理すべきです。<br /><br />ここでは代表的なデータ構造を覚えましょう♪
<ul>
	<li>配列</li>
	<li>リスト</li>
	<li>キュー</li>
	<li>スタック</li>
	<li>木</li>
</ul>
<h3>配列</h3>
複数の似ているデータを一括で保存するためのデータ型です。<br />配列の中身は要素と呼ばれ、要素は「0」から始まるインデックス番号(添え字)で管理されます。
<img src="../pics/配列.png" alt="配列" />
最も一般的なデータ構造であると言えます。
<h3>リスト</h3>
配列に似ているデータ構造です。<br />配列との相違点は配列がインデックス番号で各要素を管理するのに対して、リストでは各要素の最後に次の要素の住所を示すポインタを格納します。
<img src="../pics/リスト.png" alt="リスト" />
ポインタを操作するだけで、リストの要素を追加・削除することが可能であるため、伸縮性を要する場合に用いられます。<br />尤も通常のプログラミング言語ではリストをサポートしておらず、配列だけのことが多いですが、、、
<h3>キュー</h3>
先入れ先出し(FIFO)の性質を持つデータ構造です。<br />字面通り、入れた順番にデータを取り出す必要があります。<br /><br />コンビニの飲み物を想像すると分かりやすいと思います。<br />従業員が後ろの大きな冷蔵庫から飲み物を補充して、客は前から取り出しますね♪
<br />
<div id="queue-div">
	<div class="queue-container">
		<input id="queue-input" type="text" maxlength="1" value="C" />
		<div id="queue-button" class="button">プッシュ</div>
	</div>
	<div id="queue-body">
		<div>A</div>
		<div>B</div>
	</div>
	<div class="queue-container">
		<input id="queue-input2" type="text" maxlength="1" disabled />
		<div id="queue-button2" class="button">ポップ</div>
	</div>
</div>
<br />
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const btn = document.getElementById("queue-button"),
			btn2 = document.getElementById("queue-button2"),
			bd = document.getElementById("queue-body"),
			input = document.getElementById("queue-input"),
			input2 = document.getElementById("queue-input2");
		let check1 = true;
		input.addEventListener("input", function() {
			if (this.value !== "") {
				check1 = false;
				btn.classList.add("cancel");
			} else {
				check1 = true;
				btn.classList.remove("cancel");
			}
		});
		btn.addEventListener("click", () => {
			if (check1) {
				const elm = document.createElement("div");
				elm.classList.add("item");
				elm.textContent = input.value;
				bd.appendChild(elm);
				input.value = "";
				check2 = true;
				btn2.classList.remove("cancel");
				const r = Math.floor(Math.random() * 25) + 65;
				input.value = String.fromCharCode(r);
			}
		});
		let check2 = true;
		btn2.addEventListener("click", () => {
			if (check2) {
				const elm = Array.from(bd.getElementsByTagName("div")),
					v = elm[0].textContent;
				elm[0].remove();
				input2.value = v;
				if (elm.length - 2 < 0) {
					check2 = false;
					btn2.classList.add("cancel")
				}
			}
		});
	})();
</script>
<h3>スタック</h3>
キューの逆バージョンです。<br />後入れ後出し(LIFO)呼ばれ、後から挿入したデータから先に取り出されます。<br /><br />飲食店では後入れ先出しに従って材料を補充すると賞味期限が近い古い商品から使えなくなるため、注意されることがあると思います。
<br />
<div id="stack-div">
	<div class="stack-container">
		<input id="stack-input" type="text" maxlength="1" value="C" />
		<div id="stack-button" class="button">プッシュ</div>
		<div id="stack-separator"></div>
		<div id="stack-button2" class="button">ポップ</div>
		<input id="stack-input2" type="text" maxlength="1" disabled />
	</div>
	<div id="stack-body">
		<div>A</div>
		<div>B</div>
	</div>
</div>
<br />
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const btn = document.getElementById("stack-button"),
			btn2 = document.getElementById("stack-button2"),
			bd = document.getElementById("stack-body"),
			input = document.getElementById("stack-input"),
			input2 = document.getElementById("stack-input2");
		let check1 = true;
		input.addEventListener("input", function() {
			if (this.value !== "") {
				check1 = false;
				btn.classList.add("cancel");
			} else {
				check1 = true;
				btn.classList.remove("cancel");
			}
		});
		btn.addEventListener("click", () => {
			if (check1) {
				const elm = document.createElement("div");
				elm.classList.add("item");
				elm.textContent = input.value;
				bd.appendChild(elm);
				input.value = "";
				check2 = true;
				btn2.classList.remove("cancel");
				const r = Math.floor(Math.random() * 25) + 65;
				input.value = String.fromCharCode(r);
			}
		});
		let check2 = true;
		btn2.addEventListener("click", () => {
			if (check2) {
				const elm = Array.from(bd.getElementsByTagName("div")),
					len = elm.length,
					v = elm[len - 1].textContent;
				elm[len - 1].remove();
				input2.value = v;
				if (elm.length - 2 < 0) {
					check2 = false;
					btn2.classList.add("cancel")
				}
			}
		});
	})();
</script>
<h3>木</h3>
階層構造をとるデータを格納するためのデータ構造です。<br />例えば、「日本」の中に「埼玉」「東京」があり、「埼玉」の中に「草加」「春日部」があり、「東京」の中に「足立」「千代田」があって、、、<br /><br />木構造はこのような場合に有効です。
<img src="../pics/木構造.png" alt="木構造" />
<h2>プログラミング</h2>
ITと言えばプログラミングですよね♪<br /><br />プログラミングとはプログラムを作成するためのコードを書くこと+&alpha;が該当します。<br /><br />プログラミングの実体は皆さんが想像できるような英語っぽいコードをカチャカチャ打ち込んで、、、って感じです。
<img src="../pics/プログラミング.gif" alt="プログラミング" />
これは上で紹介したスタック構造のデータをプッシュしたりポップしたりするプログラムのコードです。<br />よくわからないと思います。<br />分からなくてok!です。<br /><br />こんな感じで英語っぽいコードをプログラマが書きますが、コンピュータは我々が書いた英語っぽいコードを理解できません。<br />コンピュータが実行するには我々が書いたコードをコンピュータが理解できる状態に変換する必要があります。<br /><br />我々が書く英語っぽいコードを<strong>ソースコード(原始コード)</strong>と呼び、コンピュータが理解できる状態に変換されたものを<strong>バイナリコード</strong>と呼びます。<br />また、ソースコードは通常は我々が理解できる高級な言語であるため<strong>高級言語</strong>と呼び、バイナリコードはコンピュータが理解する低級な言語であるため<strong>低級言語</strong>と呼ぶことがあります。
<h3>高級言語</h3>
既に説明した通り、我々が理解できる英語っぽいコードで書くためのプログラミング言語です。<br />代表的な高級言語には以下のものがあります。
<table>
	<tbody>
		<tr>
			<th>Fortran</th>
			<td>最古の高級言語です。<br />次々と新しい言語が開発されている中で使用される機会は減少中ですが、科学演算分野やスパコンでは高速で動作するという魅力から未だに使用されることがあります。</td>
		</tr>
		<tr>
			<th>C/C++</th>
			<td>Theプログラミング言語です。<br />難しい反面、汎用的でかつ高速に動作します。<br />C++はC言語にオブジェクト指向を取り入れた拡張したものです。</td>
		</tr>
		<tr>
			<th>Java</th>
			<td>こちらもかなり人気なプログラミング言語です。<br />OSに依存しないで動作することを特徴とします。<br />強いオブジェクト指向言語であるため、大規模なシステム開発で好んで使用されます。</td>
		</tr>
		<tr>
			<th>PHP</th>
			<td>webサイト作成に特化したプログラミング言語です。<br />HTMLに簡単に組込みことができるという特徴があります。</td>
		</tr>
		<tr>
			<th>Ruby</th>
			<td>「まつもとゆきひろ」さんが開発したプログラミング言語です。<br />開発者が日本人ということもあり、日本で広く使用されているプログラミング言語です。<br />こちらもwebサイト作成に特化しています。</td>
		</tr>
		<tr>
			<th>python</th>
			<td>近年、AIなどの算術処理の高まりから注目されているプログラミング言語です。<br />汎用的な言語であるため、幅広い場面で使用されています。</td>
		</tr>
	</tbody>
</table>
<h3>低級言語</h3>
コンピュータ用の言語で、我々には理解できません。<br />とんでもない変わり者は理解できるかもしれませんけど、、、笑<br /><br />低級言語には「The低級言語」
である<strong>機械語(マシン語)</strong>と機械語とほぼ1対1の対応をとるコードに置き換えられた<strong>アセンブラ言語</strong>の2種類があります。
<h2>コンパイルとインタプリト</h2>
コンピュータが実行できるのは低級言語ですが、我々は直接低級言語でコードを書くことができません。<br />したがって、一度高級言語でコードを書いた後に低級言語に変換する必要があります。<br /><br />この変換する作業を<strong>コンパイル</strong>または<strong>インタプリト</strong>と言います。
<img src="../pics/コンパイル・インタプリト.png" alt="コンパイル インタプリト" />
<h3>コンパイル</h3>
高級言語を低級言語に<strong>一括</strong>で変換します。<br />日本語では<strong>翻訳</strong>と言われます。
<table>
	<thead>
		<tr>
			<th width="50%">長所</th>
			<th width="50%">短所</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>一度コンパイルしたらその後は実行速度が高速です。</td>
			<td>一括で変換するため、プログラム全体が完成していないと実行できません。</td>
		</tr>
	</tbody>
</table>
コンパイルして完成するコードを<strong>実行可能ファイル(目的プログラム)</strong>と言います。<br /><br />また、コンパイルをするプログラムを<strong>コンパイラ</strong>と言います。
<h3>インタプリト</h3>
高級言語を1命令ずつ解釈して実行します。<br />日本語では<strong>解釈</strong>と言われます。
<table>
	<thead>
		<tr>
			<th width="50%">長所</th>
			<th width="50%">短所</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>プログラム全体が完成していなくても、プログラムの一部だけを実行することができます。</td>
			<td>1命令ごとに解釈するため、処理が遅くなります。</td>
		</tr>
	</tbody>
</table>
高級言語を解釈して実行するプログラムを<strong>インタプリタ</strong>と言います。
<?php footer(); ?>