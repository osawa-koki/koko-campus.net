<?php

session_start();
session_regenerate_id(true);


require_once("common.php");
include_head("プロジェクトマネジメント", "プロジェクトマネジメント", "マネジメント系", basename(__FILE__, ".php") .".css");
include "include.html";
including();


?>



<img class = "progress_img" src = "./pics/progress-40.png" alt = "進捗度画像">

</div>

<h1>ITパスポート試験</h1>

<div class = "all">
	<h2>プロジェクトマネジメント(マネジメント系)---(10/23)</h2>
	<div class = "sec">
		<h4>プロジェクト</h4>
		<p><strong>プロジェクト</strong>とは、、、</p>
		<p>ルーチンワーク(毎日行う定型的な業務)に対比される単語で、<strong>目標や期日が明確な一連の業務</strong>のことを指します。<br>このプロジェクトを成功させるために行われる活動が<strong>プロジェクトマネジメント</strong>(プロジェクトの管理)です。</p>
		<br>
		<p>プロジェクトマネージャ(プロジェクトの管理者/最高責任者)がプロジェクトを完成させるために意識すべき制約条件を覚えましょう♪</p>
		<table class = "normal_table" border = "1">
			<tbody>
				<tr>
					<th width = "100px">スコープ</th>
					<td width = "500px">プロジェクトが完成すべき内容の<strong>範囲</strong>こと。</td>
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
	</div>
	<div class = "sec">
		<h4>PMBOK</h4>
		<p><strong>PMBOK</strong>とは、、、</p>
		<p>プロジェクトマネジメントにおける国際標準。<br>プロジェクトマネジメントってPMBOK成立以前は各プロジェクトが独自に手法を開発して行っていたんですけど、PMBOKの成立によりプロジェクトマネジメントが体系化されました。内容としては(プロジェクト管理だけでなく全ての管理に共通することなんですけど、、、)<strong>PDCAサイクル</strong>の適切な回し方について書かれています。<br>それ以外に覚えておいてほしいことは、<strong>プロジェクト憲章</strong>です。<br>プロジェクト憲章とは、、、<br>プロジェクト立ち上げ時に作成されるプロジェクトの最終的な目標について書かれた憲章のことです。</p>
		<p>プロジェクト憲章作成後にプロジェクト憲章を基にして<strong>プロジェクト計画書</strong>が作成されます。</p>
	</div>
	<div class = "sec">
		<h4>WBS (Work Breakdown Structure)</h4>
		<p>みなさん、「How to eat an elephant」って知っていますか???<br><br><br>日本語に訳すと「ゾウの食べ方」になるんですけど、この文を見て皆さん「ゾウなんて絶対に食べられないゾウ」って思いませんでした???笑</p>
		<div style = "margin: 50px 0;"></div>
		<p>これはアメリカの諺なんですけど、この問いに対する答えは「One bite at a time」です。和訳すると「一口ずつ♪」ってことですね♪</p>
		<p>何が言いたいかというとプロジェクトを完成させるっていうと、何だか難しくかんじますよね、、、<br>だからプロジェクトを分割して、分割して、分割して、、、一口サイズにしてからとりかかろうね♪ってことです。</p>
		<p>心理学的にいうと「目標勾配」っていうらしいです。私1年に数回マラソン大会に参加するんですけど、確かに「残り何km」って看板を見ると頑張れます!!!<br>みなさん<strong>「困難は分割せよ!!」</strong>です。</p>
		<div style = "margin: 30px 0;"></div>
		<p>そうすれば、ゾウも食べられるんだゾウ!ってね♪</p>
	</div>
	<div class = "sec">
		<h4>PERT (アローダイアグラム)</h4>
		<p>上のWBSでプロジェクトを分割したのはいいんですけど、プロジェクトってその分割させた要素が依存関係にあることがあるんですよね、、、<br>作業Aが完成しないと作業Bを始められない、、、みたいな感じです。</p>
		<p>このような問題を適切に管理するためには<strong>PERT</strong>が有効です♪</p>
		<p>PERTについて理解するために簡単なゲームをしましょう♪</p>
		<ul><span class = "strong_bigger">ルール</span>
			<li>1から6まで進むのにかかる時間を求めましょう♪</li>
			<li>それぞれにかかる時間は図に記載されている通りです。<br>(単位は秒)</li>
			<li>矢印は作業の流れを示します。</li>
			<li>矢印でつながれている作業間は前後の作業の関係を表します。</li>
			<li>前の作業が終わらなければ次の作業には進めません。</li>
		</ul>
		<div id = "pert_div">
			<div id = "connected_point0" class = "connected_point_class">1</div>
			<div id = "connected_point1" class = "connected_point_class">2</div>
			<div id = "connected_point2" class = "connected_point_class">3</div>
			<div id = "connected_point3" class = "connected_point_class">4</div>
			<div id = "connected_point4" class = "connected_point_class">5</div>
			<div id = "connected_point5" class = "connected_point_class">6</div>
			<div id = "arrow_before0" class = "arrow_before"></div>
			<div id = "arrow_before1" class = "arrow_before"></div>
			<div id = "arrow_before2" class = "arrow_before"></div>
			<div id = "arrow_before3" class = "arrow_before"></div>
			<div id = "arrow_before4" class = "arrow_before"></div>
			<div id = "arrow_before5" class = "arrow_before"></div>
			<div id = "arrow_before6" class = "arrow_before"></div>
			<span id = "time0" class = "time_class">3</span>
			<span id = "time1" class = "time_class">4</span>
			<span id = "time2" class = "time_class">2</span>
			<span id = "time3" class = "time_class">3</span>
			<span id = "time4" class = "time_class">6</span>
			<span id = "time5" class = "time_class">2</span>
			<span id = "time6" class = "time_class">ダミー(0)</span>
			<div id = "start">始める♪</div>
			<div id = "timer"></div>
			<div id = "arrow_after0" class = "arrow_after"></div>
			<div id = "arrow_after1" class = "arrow_after"></div>
			<div id = "arrow_after2" class = "arrow_after"></div>
			<div id = "arrow_after3" class = "arrow_after"></div>
			<div id = "arrow_after4" class = "arrow_after"></div>
			<div id = "arrow_after5" class = "arrow_after"></div>
			<div id = "arrow_after6" class = "arrow_after"></div>
		</div>
		<div id = "after_pert" class = "hidden">
			<div style = "margin: 25px 0;"></div>
			<p><strong>答え、、、13秒。</strong></p>
			<div style = "margin: 25px 0;"></div>
			<p>どうして13秒になったか説明できますか???<br>作業3が作業2と作業4の終了を待っているとき作業2と作業4の両方が終わらないと先に進めないのです。<br>作業4まで5秒で終わっても作業2まで7秒かかっているため、結果的に作業3の開始は7秒後になってしまうのです。<br>同様のことが作業5でも起きています。</p>
			<h4 class = "sub_sec">クリティカルパス</h4>
			<p><strong>クリティカルパス</strong>とは、、、<br>作業時間が最大となる作業の流れのことです。一般的な言葉を用いればボトルネックですね♪<br>ここではクリティカルパスを求められるようにしましょう♪<br>それでは先ほどのゲームを用いて算出してみましょう♪</p>
			<table class = "normal_table" border = "1">
				<tbody>
					<tr>
						<td width = "150px">1-2-3-5-6</td>
						<td width = "200px"><strong>13</strong>(3+2+6+2)</td>
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
			<p>一番時間がかかる1-2-3-5-6の作業経路がクリティカルパスになります。</p>
		</div>
	</div>
	<div class = "sec">
		<h4>開発工数</h4>
		<p>ここではソフトウェア開発に関して<strong>人月(にんげつ)/人日(にんにち)</strong>を用います。<br>求め方は<strong>人数×時間</strong>です。</p>
		<table class = "normal_table" border = "1">
			<caption>24「人日」の場合</caption>
			<tbody>
				<tr>
					<th>1人で作業すれば、</th>
					<td>24日(24 ÷ 1)</td>
				</tr>
				<tr>
					<th>2人で作業すれば、</th>
					<td>12日(24 ÷ 2)</td>
				</tr>
				<tr>
					<th>3人で作業すれば、</th>
					<td>8日(24 ÷ 3)</td>
				</tr>
				<tr>
					<th>4人で作業すれば、</th>
					<td>6日(24 ÷ 4)</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class = "sec">
		<h4>リスク対策方法</h4>
		<p>皆さん<strong>VUCA</strong>って言葉は聞いたことありますか???<br><strong>Ｖ</strong>(Volatility：変動性<strong>Ｕ</strong>(Uncertainty：不確実性<strong>Ｃ</strong>(Complexity：複雑性)<strong>Ａ</strong>(Ambiguity：曖昧性)の略で、簡単に言えば「先行きが不透明で、将来の予測が困難な社会」のことを指します。<br>言い換えればリスクが大きいということですね♪<br>ここでは、リスクに対する対応方法を4つ紹介します。</p>
		<table class = "normal_table" border = "1">
			<tbody>
				<tr>
					<th width = "150px">リスク分散</th>
					<td>いわゆる保険ですね。1人ではリスクが大きくてもみんなで分ければ小さくなることを利用します。<br>統計学的に説明すれば、中心極限定理により標準偏差(リスク)が小さくなります。</td>
				</tr>
				<tr>
					<th>リスク回避</th>
					<td>リスクを伴う行為そのものを中止します。<br>例) 新型コロナの影響で株式市場から撤退する行為が該当します。</td>
				</tr>
				<tr>
					<th>リスク回避</th>
					<td>リスクの発生確率を引き下げる。<br>例) 地震に備えて耐震設備を強化する。</td>
				</tr>
				<tr>
					<th>リスク受容</th>
					<td>リスクを受け入れる。</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>






<?php
show_footer("management-4-9", basename(__FILE__, ".php"), "management-6-11");
?>
