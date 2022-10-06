<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-25",
	"updated" => "2022-03-25"
);
head($obj);
?>
<h2>エンタープライズアーキテクチャ(EA)</h2>
組織全体の業務とシステムを体系化して、<strong>全体の最適化</strong>を図ります。<br />組織の設計・管理を目的とします。
<svg id="ea-svg" class="max-500w" version="1.1" viewBox="0 0 600 400" xmlns="http://www.w3.org/2000/svg">
	<g>
		<path d="m290.34 366.48h-274.77l137.39-340z" fill="#00a000" fill-opacity=".2" stop-color="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8.0453" style="paint-order:markers stroke fill"/>
		<text x="125.98" y="343.95" font-family="Consolas" font-size="56px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">TA</text>
		<text x="241.47" y="343.16" font-family="Consolas" font-size="24px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">テクノロジアーキテクチャ</text>
	</g>
	<g>
		<path d="m258.02 286.48h-210.12l105.06-260z" fill="#00a000" fill-opacity=".2" stop-color="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.1523" style="paint-order:markers stroke fill"/>
		<text x="127.02" y="262.63" font-family="Consolas" font-size="56px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">AA</text>
		<text x="242.51" y="261.17" font-family="Consolas" font-size="24px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">アプリケーションアーキテクチャ</text>
	</g>
	<g>
		<path d="m225.69 206.48h-145.47l72.73-179.99z" fill="#00a000" fill-opacity=".2" stop-color="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="4.2593" style="paint-order:markers stroke fill"/>
		<text x="125.67" y="181.31" font-family="Consolas" font-size="56px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">DA</text>
		<text x="241.16" y="179.18" font-family="Consolas" font-size="24px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">データアーキテクチャ</text>
	</g>
	<g>
		<path d="m193.36 126.49h-80.82l40.41-100.01z" fill="#00a000" fill-opacity=".2" stop-color="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3663" style="paint-order:markers stroke fill"/>
		<text x="125" y="99.987" font-family="Consolas" font-size="56px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">BA</text>
		<text x="240.49" y="97.19" font-family="Consolas" font-size="24px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">ビジネスアーキテクチャ</text>
	</g>
</svg>
<div id="ea-info" class="r-border"></div>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const g = Array.from(document.getElementById("ea-svg").children),
			info = document.getElementById("ea-info"),
			message = [
				"技術要素(ハードウェア・ソフトウェア等)を体系化した層",
				"情報システム(アプリケーション)の構成を体系化した層",
				"情報の構成を体系化した層",
				"ビジネス・業務活動を体系化した層"
			];
		let last;
		g.forEach(e => {
			const t = e.getElementsByTagName("text");
			e.addEventListener("click", function() {
				const n = g.indexOf(this);
				try {
					last.getElementsByTagName("text")[0].style.fill = "";
					last.getElementsByTagName("text")[1].style.fill = "";
				} catch {}
				t[0].style.fill = "red";
				t[1].style.fill = "red";
				info.textContent = message[n];
				last = this;
			});
		});
	})();
</script>
<h2>システム戦略手法</h2>
ITシステムを業務に効率的に取り入れるための手法を紹介します。
<table>
	<tbody>
		<tr>
			<th>ERP</th>
			<td><strong>E</strong>nterprise <strong>R</strong>esourse <strong>P</strong>lanning</td>
			<td><strong>企業活動全般</strong>を統合的に管理するための手法です。<br />私が大学で一番好きな講義がERPの授業でした。笑</td>
		</tr>
		<tr>
			<th>SFA</th>
			<td><strong>S</strong>ales <strong>F</strong>orse <strong>A</strong>utomation</td>
			<td><strong>営業活動</strong>を情報システムを用いて効率的に管理します。</td>
		</tr>
		<tr>
			<th>BYOD</th>
			<td><strong>B</strong>ring <strong>Y</strong>our <strong>O</strong>wn <strong>D</strong>evises</td>
			<td>従業員のスマホ・PCを仕事で利用することを言います。<br />便利かつ費用がかからないというメリットの裏にはセキュリティのリスクもあるので要注意です。</td>
		</tr>
		<tr>
			<th>テレワーク</th>
			<td>----------</td>
			<td>いわゆる在宅勤務ですね。<br />ITパスポート試験のシラバス4.0で追加された用語です。<br />コロナで一躍有名になりましたね。</td>
		</tr>
	</tbody>
</table>
<h2>モデリング技法</h2>
モデリングについて説明する前にモデルについて説明します。<br /><br />モデルとは、プラモデルから連想できるように、何かの模型のことです。<br />何かしらの特徴を捉えて把握しやすくしたモノをモデルといいます。<br /><br />モデリングとは対象(ここでは業務全般)の特徴を端的に捉えて分かりやすい形(ここでは図表)にすることを指します。<br /><br />モデリング手法にはいくつか種類があるのでここでは代表的なモデリング手法を学びましょう♪
<ul>
	<li>DFD(データフローダイアグラム)</li>
	<li>E-R図</li>
	<li>クラス図(UML)</li>
	<li>ユースケース図(UML)</li>
</ul>
<h3>DFD(データフローダイアグラム)</h3>
業務に関して、<strong>「データの流れ」</strong>に着目してモデリングします。
<table id="dfd-table">
	<tbody>
		<tr>
			<th><img class="x" src="../pics/データフロー(dfd).png" alt="データフロー" /></th>
			<th>データフロー</th>
			<td>データの流れを表します。</td>
		</tr>
		<tr>
			<th><img class="x" src="../pics/プロセス(dfd).png" alt="プロセス" /></th>
			<th>プロセス</th>
			<td>データに対する処理機能を表します。</td>
		</tr>
		<tr>
			<th><img class="x" src="../pics/データストア(dfd).png" alt="データストア" /></th>
			<th>データストア</th>
			<td>データを集めた論理ファイルを表します。</td>
		</tr>
		<tr>
			<th><img class="x" src="../pics/外部実体(dfd).png" alt="外部実体" /></th>
			<th>外部実体</th>
			<td>データの発生源・吸収先・外部システムを表します。</td>
		</tr>
	</tbody>
</table>
<img src="../pics/dfd.png" alt="データフローダイアグラム" />
<h3>E-R図</h3>
データの構造に着目して<strong>実体(エンティティ)</strong>と実体(エンティティ)間の<strong>関連(リレーションシップ)</strong>の2つの要素で表現します。<br /><br />実体間の<strong>数の対応関係(多重度/カーディナリティ)</strong>を表します。
<table>
	<tbody>
		<tr>
			<td width="40%">
				<select class="er-select">
					<option value=0>選択してください</option>
					<option value=1>1</option>
					<option value=2>多</option>
				</select>
			</td>
			<th width="20%">対</th>
			<td width="40%">
				<select class="er-select">
					<option value=0>選択してください</option>
					<option value=1>1</option>
					<option value=2>多</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>A</th>
			<td id="er-img"></td>
			<th>B</th>
		</tr>
	</tbody>
</table>
<div id="er-info" class="r-border"></div>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const imgs = [
			"../pics/1対1.png",
			"../pics/1対多.png",
			"../pics/多対1.png",
			"../pics/多対多.png"
		],
			info = document.getElementById("er-info"),
			th = document.getElementById("er-img"),
			message = [
				"1つのエンティティAには1つのエンティティBが対応、同時に1つのエンティティBには1つのエンティティAが対応します。",
				"1つのエンティティAには複数のエンティティBが対応、同時に1つのエンティティBには1つのエンティティAが対応します。",
				"1つのエンティティBには複数のエンティティAが対応、同時に1つのエンティティAには1つのエンティティBが対応します。",
				"1つのエンティティAには複数のエンティティBが対応、同時に1つのエンティティBには複数のエンティティAが対応します。"
			];
		let ary = [],
			last;
		imgs.forEach(e => {
			const elm = document.createElement("img");
			elm.src = e;
			ary.push(elm);
		});
		const select = Array.from(document.getElementsByClassName("er-select"));
		select.forEach(e => {
			e.addEventListener("change", () => {
				const m = parseInt(select[0].value),
					n = parseInt(select[1].value);
					try {
						last.remove();
					} catch {}
				if (![m, n].includes(0)) {
					const index = (m === 1) ? (n === 1) ? 0 : 1 : (n === 1) ? 2 : 3,
						pic = ary[index];
					th.appendChild(pic);
					info.textContent = message[index];
					last = pic;
				}
			});
		});
	})();
</script>
<div class="sec">
<h3>UML(統一モデリング言語)</h3>
ハードウェアが目に見えるモノに対してソフトウェア(プログラム・システム)って目に見えないんですよね、、、<br />目に見えないと当然管理もしにくいのでソフトウェアの内部構造を何かしらのルールで記述して「目に見える化」しようとしたのがUMLです。<br />ここではクラス図とユースケース図を学びます。
<h4>クラス図(UML)</h4>
オブジェクト指向(データとメソッドをまとめる)ためのUMLです。<br /><br />オブジェクト指向ってホントに理解するのが難しいのでここでは<strong>「データとメソッドをまとめる手法」</strong>とだけ覚えてください。<br /><br />クラス図とは複数の対象に共通する性質を書き出していきます。(因数分解みたいな感じです)
<img src="../pics/クラス図(汎化).png" alt="クラス図" />
<h4>ユースケース図(UML)</h4>
あるシステムについての<strong>「使い方」</strong>を表現します。
<img src="../pics/ユースケース図.png" alt="ユースケース図" />
<h2>クラウドコンピューティング</h2>
ASP(アプリケーションソフトウェアのレンタルサービス)が進化したバージョンです。<br /><br />NIST(米国標準技術局)によるとどのレベルまでレンタルするかどうかで<strong>SaaS・PaaS・IaaS</strong>の3つに分類されます。
<img src="../pics/クラウドの分類.png" alt="クラウド" />
<h2>SOA</h2>
SOAとは、「<strong>S</strong>ervice <strong>O</strong>riented <strong>A</strong>rchitechture」の略で、業務システム全般を業務のプロセスごとに分解した「サービス」の集合とみなす考え方です。<br /><br />例えば、このkoko-campusシステムをひとつのオンライン教育システムとして見るのではなく、「勉強科目管理サービス + 勉強予定管理サービス + etc...」としてみなします。
<h2>システムインテグレーション(SI)</h2>
システムインテグレーションとは、システムと企画・立案・構築・運用・保守までの全工程を一括して請け負い提供するサービスのことです。
<h2>データ利活用に関する用語</h2>
ここでは、近年はビッグデータ等に関する用語を説明しますね♪
<table>
	<tbody>
		<tr>
			<th>データマイニング</th>
			<td>大量のデータの中から規則性・法則性を導き出すことを言います。
			</td>
		</tr>
		<tr>
			<th>ビッグデータ</th>
			<td>とにかく大量のデータのことを言います。</td>
		</tr>
		<tr>
			<th>DX(デジタルトランスフォーメーション)</th>
			<td>ITによって世界をよりよくしていくことを言います。</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>