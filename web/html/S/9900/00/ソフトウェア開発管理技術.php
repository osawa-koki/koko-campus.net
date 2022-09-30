<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-25",
	"updated" => "2022-03-25"
);
head($obj);
?>
<h2>システム開発モデル</h2>
システム開発する際に用いられる手法についてここでは学びましょう♪<br /><br />開発モデル・概要・長所・短所をセットで覚えましょう♪
<ul>
	<li>ウォーターフォールモデル</li>
	<li>スパイラルモデル</li>
	<li>プロトタイプモデル</li>
</ul>
<h3>ウォーターフォールモデル</h3>
滝(ウォーターフォール)のように後戻りをせず、各工程を順番に進めていきます。<br /><br />長所として、「計画が立てやすい」「進捗状況を把握しやすい」ことがあげられますが、端緒として「大きな変更に対応しずらい」ことが挙げられます。
<svg class="max-400w" version="1.1" viewBox="0 0 600 400" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
	<path d="m124.48 51.992v180.52h-50.446l83.406 144.45 83.4-144.45h-50.44v-180.52z" fill="blue" stop-color="black"/>
	<g fill="#fdffff" fill-opacity=".8" stroke="#000" stroke-width=".90067">
		<rect x="43.606" y="33.727" width="225.76" height="31.381" stop-color="black"/>
		<rect x="43.606" y="86.209" width="225.76" height="31.381" stop-color="black"/>
		<rect x="43.606" y="138.69" width="225.76" height="31.381" stop-color="black"/>
		<rect x="43.606" y="191.17" width="225.76" height="31.381" stop-color="black"/>
		<rect x="43.606" y="243.66" width="225.76" height="31.381" stop-color="black"/>
		<rect x="43.606" y="296.14" width="225.76" height="31.381" stop-color="black"/>
		<rect x="43.606" y="348.62" width="225.76" height="31.381" stop-color="black"/>
	</g>
	<g id="waterfall-txt" font-family="Consolas" font-size="20px">
		<text x="69.832" y="55.994" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">要件定義</text>
		<text x="69.91" y="107.48" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">外部設計(概要設計)</text>
		<text x="68.66" y="160.2" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">内部設計(詳細設計)</text>
		<text x="67.566" y="214.34" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">プログラム設計</text>
		<text x="67.566" y="267.06" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">プログラミング</text>
		<text x="68.972" y="318.8" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">テスト</text>
		<text x="69.988" y="371.95" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">運用・保守</text>
	</g>
	<image x="309.24" y="38.619" width="249.4" height="249.4" preserveAspectRatio="none" xlink:href="../pics/waterfall.png"/>
	<text x="327.96" y="321.29" font-family="Consolas" font-size="28px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">滝のように、、、</text>
</svg>
<h3>スパイラルモデル</h3>
計画・設計・プログラミング・テスト工程のサイクルを何度も繰り返します。<br /><br />長所としては、「変更に対応しやすい」「バグの発見・修正が容易」であることが挙げられる一方で、短所として「進捗度が把握しにくい」ことがあげられます。
<svg id="spiral-svg" class="max-400w" version="1.1" viewBox="0 0 600 400" xmlns="http://www.w3.org/2000/svg">
	<path d="m319.63 211.62c0.54 4.61 6.48 1.54 7.66-0.91 3.2-6.63-3.31-13.24-9.47-14.43-11.04-2.13-20.25 7.66-21.2 18.06-1.4 15.24 12.05 27.36 26.63 27.95 19.44 0.79 34.55-16.44 34.72-35.2 0.21-23.62-20.83-41.76-43.78-41.48-27.79 0.32-48.97 25.22-48.25 52.36 0.87 31.96 29.63 56.19 60.94 55 36.14-1.39 63.43-34.02 61.76-69.51-1.89-40.32-38.41-70.68-78.07-68.53-44.51 2.41-77.93 42.81-75.3 86.65 2.91 48.68 47.21 85.17 95.23 82.06 52.85-3.42 92.42-51.6 88.82-103.8-3.93-57.03-56.01-99.66-112.38-95.58-61.21 4.42-106.91 60.39-102.35 120.95 4.93 65.38 64.8 114.16 129.54 109.1 69.56-5.42 121.41-69.18 115.86-138.1-5.92-73.74-73.58-128.66-146.68-122.63-77.91 6.426-135.91 77.98-129.39 155.26 6.92 82.1 82.38 143.16 163.83 136.15 86.27-7.42 150.42-86.78 142.92-172.41-7.91-90.44-91.17-157.66-180.98-149.67-94.63 8.414-164.92 95.574-156.45 189.55 0.28 3.15 0.66 6.3 1.11 9.43" fill="none" stroke="#ffa000" stroke-width="3"/>
	<g>
		<rect x="116.64" y="125.97" width="145.34" height="48.013" fill="#fdffff" stop-color="black" stroke="#000" stroke-width=".98036"/>
		<text x="169.43" y="157.24" font-family="Consolas" font-size="20px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">計画</text>
	</g>
	<g>
		<rect x="367.94" y="123.97" width="145.34" height="48.013" fill="#fdffff" stop-color="black" stroke="#000" stroke-width=".98036"/>
		<text x="420.61" y="155.09" font-family="Consolas" font-size="20px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">設計</text>
	</g>
	<g>
		<rect x="367.94" y="251.95" width="145.34" height="48.013" fill="#fdffff" stop-color="black" stroke="#000" stroke-width=".98036"/>
		<text x="369.24" y="283.65" font-family="Consolas" font-size="20px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">プログラミング</text>
	</g>
	<g>
		<rect x="116.64" y="253.96" width="145.34" height="48.013" fill="#fdffff" stop-color="black" stroke="#000" stroke-width=".98036"/>
		<text x="159.78" y="284.76" font-family="Consolas" font-size="20px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">テスト</text>
	</g>
</svg>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const gs = document.getElementById("spiral-svg").getElementsByTagName("g");
		let count, last
		count = 0;
		setInterval(() => {
			const t = gs[count].getElementsByTagName("text")[0],
			r = gs[count].getElementsByTagName("rect")[0];
			try {
				last.getElementsByTagName("text")[0].style.fill = "black";
				last.getElementsByTagName("rect")[0].style.stroke = "black";
			} catch {}
			t.style.fill = "red";
			r.style.stroke = "red";
			last = gs[count];
			count = (count < gs.length - 1) ? count + 1 : 0;
		}, 1000);
	})();
</script>
<h3>プロトタイプモデル</h3>
早い段階で試作品(プロトタイプ)を作成して、ユーザの確認を得ながら開発を進めます。<br /><br />長所としては、「ユーザの要求を忠実に取り入れられる」ことが挙げられる一方で、短所として「期間やコストの見積もりが困難」であることがあげられます。
<svg class="max-400w" version="1.1" viewBox="0 0 600 400" xmlns="http://www.w3.org/2000/svg">
	<g class="prototype-arw" stroke="#000" stroke-width="5">
		<path d="m100.26 188.78a241.22 241.22 0 0 1 197.16-102.4 241.22 241.22 0 0 1 197.26 102.23" fill="#fdffff" fill-opacity=".8" stop-color="black"/>
		<path d="m110.99 133.51 42.5 36.92-53.23 18.35z" stop-color="black"/>
	</g>
	<g fill="blue" stroke="blue">
		<path d="m373.53 299.95v-59.63l51.64 29.81z" stop-color="black" stroke-width="4.0778"/>
		<rect x="168.56" y="263.98" width="231.41" height="12.301" stop-color="black" stroke-width="4.0777"/>
	</g>
	<g id="prototype-gs">
		<g>
			<rect x="13.864" y="236.04" width="182.07" height="67.318" fill="#fdffff" fill-opacity=".8" stop-color="black" stroke="#000" stroke-width="1.1476"/>
			<text x="76.79" y="279.93" font-family="Consolas" font-size="28px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">作成</text>
		</g>
		<g>
			<rect x="213.11" y="236.04" width="182.07" height="67.318" fill="#fdffff" fill-opacity=".8" stop-color="black" stroke="#000" stroke-width="1.1476"/>
			<text x="218.12" y="263.08" font-family="Consolas" font-size="28px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">プロトタイプ</text>
			<text x="246.75" y="294.42" font-family="Consolas" font-size="28px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">(試作品)</text>
		</g>
		<g>
			<rect x="412.35" y="237.83" width="182.07" height="67.318" fill="#fdffff" fill-opacity=".8" stop-color="black" stroke="#000" stroke-width="1.1476"/>
			<text x="433.82" y="281.5" font-family="Consolas" font-size="28px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">使用・評価</text>
		</g>
	</g>
</svg>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const gs = Array.from(document.getElementById("prototype-gs").children),
			arw = document.getElementById("prototype-arw");
		let count = 0,
			ary = [];
		setInterval(() => {
			const obj = Array.from(([0, 1, 2].includes(count)) ? gs[count].getElementsByTagName("text") : document.getElementsByClassName("prototype-arw"));
			ary.forEach(e => {
				e.style.fill = "black";
				if (e.tagName === "g") {
					e.style.stroke = "black";
				}
			});
			ary = [];
			obj.forEach(e => {
				e.style.fill = "red";
				if (e.tagName === "g") {
					e.style.stroke = "red";
				}
				ary.push(e);
			});
			count = (count < gs.length) ? count + 1 : 0;
		}, 1000);
	})();
</script>
<h2>システム開発手法</h2>
<table>
	<tr>
		<th>RAD</th>
		<td>短期間で(素早く)システムを開発します。</td>
	</tr>
	<tr>
		<th>アジャイル開発</th>
		<td>迅速かつ適応的にシステムを開発します。</td>
	</tr>
	<tr>
		<th>スクラム</th>
		<td>アジャイル開発の考え方のひとつです。<br />短期間で機能の実装と評価を繰り返しながら開発します。</td>
	</tr>
	<tr>
		<th>XP</th>
		<td>アジャイル開発手法のひとつです。<br />厳格さよりも柔軟性を重要視!!!</td>
	</tr>
	<tr>
		<th>テスト駆動開発</th>
		<td>XPの具体的な手法です。<br />最初にクリアすべきテストを作成して、そのテストをパスするようにプログラミングをします。</td>
	</tr>
	<tr>
		<th>ペアプログラミング</th>
		<td>XPの具体的な手法です。<br />2人1組(ペア)でプログラミングします。</td>
	</tr>
	<tr>
		<th>リファクタリング</th>
		<td>XPの具体的な手法です。<br />プログラムの動作は変えずに、内部構造のみ整理・改善します。</td>
	</tr>
</table>
<h2>共通フレーム2013</h2>
ここでは、開発プロセスにおける共通フレームについて説明します。<br /><br />簡単に言うと、どのような流れでシステム開発をするかについてですね。<br />今までにシステム企画やら要件定義やらテストやら学習したと思いますが、その総復習もかねて学びましょう♪
<svg class="max-500w" version="1.1" viewBox="0 0 600 700" xmlns="http://www.w3.org/2000/svg">
	<path d="m96.924 22.652 211.47 642.25 211.46-642.25" fill="none" stroke="#000" stroke-width="10"/>
	<g id="v-boxes">
		<g>
			<rect x="14.015" y="55.5" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="72.647" y="79.777" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">システム要件定義</text>
		</g>
		<g>
			<rect x="14.015" y="155.76" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="72.612" y="180" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">システム方式設計</text>
		</g>
		<g>
			<rect x="14.015" y="256.01" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="54.331" y="280.29" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">ソフトウェア要件定義</text>
		</g>
		<g>
			<rect x="14.015" y="356.27" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="54.295" y="380.51" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">ソフトウェア方式設計</text>
		</g>
		<g>
			<rect x="12.675" y="456.52" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="52.955" y="480.87" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">ソフトウェア詳細設計</text>
		</g>
		<g>
			<rect x="167.33" y="556.78" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="234.4" y="581.51" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">プログラミング</text>
		</g>
		<g>
			<rect x="323.31" y="456.52" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="355.36" y="480.83" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">ソフトウェア単体テスト</text>
		</g>
		<g>
			<rect x="324.64" y="356.27" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="356.69" y="380.62" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">ソフトウェア結合テスト</text>
		</g>
		<g>
			<rect x="324.64" y="256.01" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="329.69" y="280.43" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">ソフトウェア適格性確認テスト</text>
		</g>
		<g>
			<rect x="324.64" y="155.76" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="375.01" y="180.11" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">システム結合テスト</text>
		</g>
		<g>
			<rect x="324.64" y="55.505" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="348.01" y="79.923" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">システム適格性確認テスト</text>
		</g>
	</g>
	<g id="arws" fill="#0f0" stroke-linecap="round" stroke-linejoin="round" stroke-width="7.4632">
		<path d="m317 466v19l-29-9z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m317 366v19l-29-9z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m317 265v19l-29-9z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m317 165v19l-29-9z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m317 64.2v18.9l-29-9.4z" stop-color="#000000" style="paint-order:markers stroke fill"/>
	</g>
</svg>
<div id="v-model-button" class="button">次へ</div>
<div id="v-model-info" class="r-border"></div>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const bx = Array.from(document.getElementById("v-boxes").children),
			info = document.getElementById("v-model-info"),
			arws = Array.from(document.getElementById("arws").children);
		function reset() {
			bx.forEach(e => {
				e.getElementsByTagName("rect")[0].style.stroke = "aqua";
				e.getElementsByTagName("text")[0].style.fill = "black";
			});
			arws.forEach(e => {
				e.style.fill = "lime";
			});
			info.innerHTML = "";
		}
		reset();
		let count = 0,
			x_lock = false;
		const message = [
			"システム全体が実現すべき要件を確認します♪",
			"システム要件定義を満たすための設計を最上位レベル(ハードウェア・ソフトウェアレベル)で決定します♪",
			"ソフトウェアに必要な機能・セキュリティ・外部インターフェースを決定します♪",
			"ソフトウェア要件を達成する手段を「方式」まで分解します♪<br />(ソフトウェア構造やデータベース構造を明確に!)",
			"ソフトウェアを小さな部品(モジュール)まで分解していきます♪",
			"実際にソースコードを入力していきます♪",
			"ソフトウェア単体(モジュール)が動くかどうかチェックします♪<br />(ソフトウェア詳細設計通りかどうかチェック)",
			"モジュールの組み合わせ(結合されたソフトウェア)が動くかどうかチェックします♪<br />(ソフトウェア方式設計通りかどうかチェック)",
			"モジュールの組み合わせ(結合されたソフトウェア)が動くかどうかチェックします♪<br />(ソフトウェア要件定義を満たしているかどうかチェック)",
			"モジュールの組み合わせ(結合されたソフトウェア)をさらに組み合わせてシステムを完成させます♪<br />(システム方式設計を満たしているかどうかチェック)",
			"システム全体が想定通りに動くかどうかチェック♪<br />(システム要件定義を満たしているかどうかチェック)"
		];
		document.getElementById("v-model-button").addEventListener("click", () => {
			if (!x_lock) {
				x_lock = true;
				const r = bx[count].getElementsByTagName("rect")[0],
					t = bx[count].getElementsByTagName("text")[0];
				try {
					bx[count - 1].getElementsByTagName("rect")[0].style.stroke = "aqua";
					bx[count - 1].getElementsByTagName("text")[0].style.fill = "black";
				} catch {}
				r.style.stroke = "blue";
				t.style.fill = "red";
				if (6 <= count) {
					try {
						arws[count - 7].style.fill = "lime";
					} catch {}
					arws[count - 6].style.fill = "red";
				}
				if (count !== bx.length - 1) {
					setTimeout(() => {x_lock = false;}, 300);
				} else {
					setTimeout(() => {
						reset();
						count = 0;
						x_lock = false;
					}, 5000);
				}
				info.innerHTML = message[count];
				count++;
			}
		});
	})();
</script>
<h2>ソフトウェア開発のアプローチ方法</h2>
ソフトウェアを開発するにあたり、何大切にするかによってソフトウェア開発手法はプロセス中心アプローチとデータ中心アプローチの2つに分けられます。
<table>
	<thead>
		<tr>
			<th width="50%">プロセス中心アプローチ</th>
			<th width="50%">データ中心アプローチ</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>業務を実現するためのプロセスに着目します。</td>
			<td>業務で用いるデータに着目します。</td>
		</tr>
	</tbody>
</table>
<h3>オブジェクト指向</h3>
データとメソッドは密接な関係にあることが多いので、「完全なプロセス中心アプローチ」ないしは「完全なデータ中心アプローチ」を採用する機会はほとんどありません。<br /><br />代わりに最近では、データとメソッドをオブジェクトとしてひとまとめにして扱うオブジェクト指向という考え方が採用されることが増えています。<br />特にプログラマ不足が叫ばれる今日ではチームでの開発が容易なオブジェクト指向を採用することが多いです。<br /><br />オブジェクト指向が広まった背景には、プログラムの寿命の増加があります。<br />プログラムを寿命が増加するとプログラムを修正する機会が当然に増加します。<br />プログラムの修正のしやすさを保守性と呼びますが、オブジェクト指向でデータとメソッドをひとまとめにすることでプログラムを保守性が高まり、プログラムの寿命の増加に対応しやすくなります。
<?php footer(); ?>