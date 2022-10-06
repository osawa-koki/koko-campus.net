<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj=array(
	"made" => "2022-03-25",
	"updated" => "2022-03-25"
);
head($obj);
?>
<h2>プロジェクト</h2>
プロジェクトとは、ルーチンワーク(毎日行う定型的な業務)に対比される単語で、<strong>目標や期日が明確な一連の業務</strong>のことを指します。<br />このプロジェクトを成功させるために行われる活動が<strong>プロジェクトマネジメント</strong>(プロジェクトの管理)です。<br /><br />プロジェクトマネージャ(プロジェクトの管理者/最高責任者)がプロジェクトを完成させるために意識すべき制約条件を覚えましょう♪
<table>
	<tbody>
		<tr>
			<th>スコープ</th>
			<td>プロジェクトが完成すべき内容の<strong>範囲</strong>こと。</td>
		</tr>
		<tr>
			<th>タイム</th>
			<td>プロジェクトを完成させる<strong>期限</strong>のこと。</td>
		</tr>
		<tr>
			<th>コスト</th>
			<td>プロジェクトに費やせる<strong>費用</strong>のこと。</td>
		</tr>
	</tbody>
</table>
<h2>PMBOK</h2>
PMBOKとは、プロジェクトマネジメントにおける国際標準を言います。<br /><br />プロジェクトマネジメントってPMBOK成立以前は各プロジェクトが独自に手法を開発して行っていたんですけど、PMBOKの成立によりプロジェクトマネジメントが体系化されました。<br />内容としては、<strong>PDCAサイクル</strong>の適切な回し方について書かれています。<br />それ以外に覚えておいてほしいことは、<strong>プロジェクト憲章</strong>です。<br /><br />プロジェクト憲章とは、プロジェクト立ち上げ時に作成されるプロジェクトの最終的な目標について書かれた憲章のことです。<br />プロジェクト憲章作成後にプロジェクト憲章を基にして<strong>プロジェクト計画書</strong>が作成されます。
<h2>WBS(Work Breakdown Structure)</h2>
みなさん、「How to eat an elephant」って知っていますか???<br /><br /><br />日本語に訳すと「ゾウの食べ方」になるんですけど、この文を見て皆さん「ゾウなんて絶対に食べられないゾウ」って思いませんでした???笑
<div class="separator"></div>
これはアメリカの諺なんですけど、この問いに対する答えは「One bite at a time」です。<br />和訳すると「一口ずつ♪」ってことですね♪<br /><br />何が言いたいかというとプロジェクトを完成させるっていうと、何だか難しくかんじますよね、、、<br /><br />だからプロジェクトを分割して、分割して、分割して、、、<br /><br />一口サイズにしてからとりかかろうね♪ってことです。<br /><br />心理学的にいうと「目標勾配」っていうらしいです。<br />僕は年に数回マラソン大会に参加するんですけど、確かに「残り何km」って看板を見ると頑張れます!!!<br />みなさん<strong>「困難は分割せよ!!」</strong>です。<br /><br />そうすれば、ゾウも食べられるんだゾウ!ってね♪
<h2>PERT(アローダイアグラム)</h2>
上のWBSでプロジェクトを分割したのはいいんですけど、プロジェクトってその分割させた要素が依存関係にあることがあるんですよね、、、<br />作業Aが完成しないと作業Bを始められない、、、みたいな感じです。<br /><br />このような問題を適切に管理するためには<strong>PERT</strong>が有効です♪<br /><br />PERTについて理解するために簡単なゲームをしましょう♪
<ul>
	<strong>ルール</strong>
	<li>1から6まで進むのにかかる時間を求めましょう♪</li>
	<li>それぞれにかかる時間は図に記載されている通りです。<br />(単位は秒)</li>
	<li>矢印は作業の流れを示します。</li>
	<li>矢印でつながれている作業間は前後の作業の関係を表します。</li>
	<li>前の作業が終わらなければ次の作業には進めません。</li>
</ul>
<svg class="max-500w" version="1.1" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
	<g id="pert-arws" fill="red">
		<path d="M 295,65 305,65 300,145 Z" stop-color="black" stroke-width=".92174"/>
		<path d="m286.77 189.9-7.15-6.98-81.61 90.81z" stop-color="black" stroke-width="1.1379"/>
		<path d="m314.1 190.18 7.15-6.98 81.61 90.81z" stop-color="black" stroke-width="1.1379"/>
		<path d="m388.3 293.21v-10l-179.95 5z" stop-color="black" stroke-width="1.3822"/>
		<path d="m192.7 311.78 7.15-6.98 81.61 90.81z" stop-color="black" stroke-width="1.1379"/>
		<path d="m405.9 311.79-7.15-6.98-81.61 90.81z" stop-color="black" stroke-width="1.1379"/>
		<path d="m306.19 437.46h-10l5 80.03z" stop-color="black" stroke-width=".92174"/>
	</g>
	<g id="pert-point">
		<g>
			<circle cx="300" cy="40.658" r="19.997" fill="#fdffff" stop-color="black" stroke="#000" stroke-width="3"/>
			<text x="294.47" y="47.069" font-family="Consolas" font-size="20px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">1</text>
		</g>
		<g>
			<circle cx="300" cy="167.98" r="19.997" fill="#fdffff" stop-color="black" stroke="#000" stroke-width="3"/>
			<text x="294.36" y="174.45" font-family="Consolas" font-size="20px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">2</text>
		</g>
		<g>
			<circle cx="179.97" cy="289.96" r="19.997" fill="#fdffff" stop-color="black" stroke="#000" stroke-width="3"/>
			<text x="174.37" y="296.34" font-family="Consolas" font-size="20px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">3</text>
		</g>
		<g>
			<circle cx="418.62" cy="289.96" r="19.997" fill="#fdffff" stop-color="black" stroke="#000" stroke-width="3"/>
			<text x="413.17" y="296.34" font-family="Consolas" font-size="20px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">4</text>
		</g>
		<g>
			<circle cx="302" cy="413.28" r="19.997" fill="#fdffff" stop-color="black" stroke="#000" stroke-width="3"/>
			<text x="296.37" y="419.57" font-family="Consolas" font-size="20px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">5</text>
		</g>
		<g>
			<circle cx="300.67" cy="541.93" r="19.997" fill="#fdffff" stop-color="black" stroke="#000" stroke-width="3"/>
			<text x="295.07" y="548.22" font-family="Consolas" font-size="20px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">6</text>
		</g>
	</g>
	<g id="pert-time" fill="blue" font-family="Consolas" font-size="20px">
		<text x="314.28" y="113.12" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">3</text>
		<text x="213.39" y="217.99" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">4</text>
		<text x="375.9" y="220.59" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">2</text>
		<text x="211.28" y="364.22" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">3</text>
		<text x="374.84" y="366.22" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">6</text>
		<text x="316.74" y="483.11" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">2</text>
		<text x="282.21" y="271.38" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">(0)</text>
	</g>
	<text x="50" y="550" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve" font-size="25px"><tspan id="pert-time_show">0.00</tspan><tspan>s</tspan></text>
</svg>
<div id="pert-button" class="button">開始</div>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const button = document.getElementById("pert-button"),
			time = document.getElementById("pert-time"),
			arws = Array.from(document.getElementById("pert-arws").children),
			ts = document.getElementById("pert-time_show"),
			const ar = {
				1: [2, 3],
				2: [],
				3: [4, 6],
				4: [5],
				5: [],
				6: [7],
				7: []
			};
		class arw_move {
			constructor (n) {
				this.n = n;
				this.fixed = ;
				this.from = ;
				this.to = ;
			}
			move() {

			}
		}
		function move() {
			let count = 0;
			setInterval(() => {
				
			}, 10);
		}
		let start,
			x_lock = false;
		button.addEventListener("click", function() {
			if (!x_lock) {
				x_lock = true;
				this.classList.add("cancel");
				time.style.fill = "none";
			}
		});
	})();
</script>
答えは、「13秒」です。<br /><br />どうして13秒になったか説明できますか???<br /><br />作業3が作業2と作業4の終了を待っているとき作業2と作業4の両方が終わらないと先に進めないのです。<br />作業4まで5秒で終わっても作業2まで7秒かかっているため、結果的に作業3の開始は7秒後になってしまうのです。<br />同様のことが作業5でも起きています。
<h3>クリティカルパス</h3>
クリティカルパスとは、作業時間が最大となる作業の流れのことです。<br /><br />一般的な言葉を用いればボトルネックですね♪<br />ここではクリティカルパスを求められるようにしましょう♪<br />それでは先ほどのゲームを用いて算出してみましょう♪
<table>
	<tbody>
		<tr>
			<td>1-2-3-5-6</td>
			<td><strong>13</strong>(3+2+6+2)</td>
		</tr>
		<tr>
			<td>1-2-3-4-5-6</td>
			<td><strong>10</strong>(3+2+3+2)</td>
		</tr>
		<tr>
			<td>1-2-4-5-6</td>
			<td><strong>12</strong>(3+4+3+2)</td>
		</tr>
	</tbody>
</table>
一番時間がかかる1-2-3-5-6の作業経路がクリティカルパスになります。
<h2>開発工数</h2>
ここではソフトウェア開発に関して<strong>人月(にんげつ)/人日(にんにち)</strong>を用います。<br />求め方は<strong>人数 &times; 時間</strong>です。
<table>
	<caption>24「人日」の場合</caption>
	<tbody>
		<tr>
			<th>1人で作業すれば、</th>
			<td>24日(24 &divide; 1)</td>
		</tr>
		<tr>
			<th>2人で作業すれば、</th>
			<td>12日(24 &divide; 2)</td>
		</tr>
		<tr>
			<th>3人で作業すれば、</th>
			<td>8日(24 &divide; 3)</td>
		</tr>
		<tr>
			<th>4人で作業すれば、</th>
			<td>6日(24 &divide; 4)</td>
		</tr>
	</tbody>
</table>
<h2>リスク対策方法</h2>
皆さん<strong>VUCA</strong>って言葉は聞いたことありますか???<br /><br /><strong>V</strong>(Volatility: 変動性<strong>U</strong>(Uncertainty: 不確実性<strong>C</strong>(Complexity: 複雑性)<strong>A</strong>(Ambiguity: 曖昧性)の略で、簡単に言えば「先行きが不透明で、将来の予測が困難な社会」のことを指します。<br />言い換えればリスクが大きいということですね♪<br />ここでは、リスクに対する対応方法を4つ紹介します。
<table>
	<tbody>
		<tr>
			<th>リスク分散</th>
			<td>いわゆる保険ですね。<br />1人ではリスクが大きくてもみんなで分ければ小さくなることを利用します。<br />統計学的に説明すれば、中心極限定理により標準偏差(リスク)が小さくなります。</td>
		</tr>
		<tr>
			<th>リスク回避</th>
			<td>リスクを伴う行為そのものを中止します。<br />例) 新型コロナの影響で株式市場から撤退する行為が該当します。</td>
		</tr>
		<tr>
			<th>リスク回避</th>
			<td>リスクの発生確率を引き下げます。<br />例) 地震に備えて耐震設備を強化する行為が該当します。</td>
		</tr>
		<tr>
			<th>リスク受容</th>
			<td>リスクを受け入れる行為が該当します。</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>