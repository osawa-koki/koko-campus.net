<?php

session_start();
session_regenerate_id(true);


require_once("common.php");
include_head("システム開発技術", "開発技術", "マネジメント系", basename(__FILE__, ".php") .".css");
include("include.html");
including();


?>



<img class = "progress_img" src = "./pics/progress-30.png" alt = "進捗度画像">

</div>

<h1>ITパスポート試験</h1>

<div class = "all">
	<h2>システム企画(ストラテジ系)---(8/23)</h2>
	<div class = "sec">
		<h4>機能要件・非機能要件</h4>
		<p>前回の授業でも学習しましたが、IPAのシラバスどおりに進めるとこの授業でも扱うことになるので、ここでは機能要件と非機能要件について復習しますね♪</p>
		<table class = "normal_table" border = "1">
			<thead>
				<tr>
					<th width = "40%" height="50px" class = "strong_bigger">機能要件</th>
					<td width = "20%"></td>
					<th width = "40%" class = "strong_bigger">非機能要件</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td height="50px">システムが実現すべきメインの機能</td>
					<td style = "text-align: center; padding: 0;">定義</td>
					<td>システムが持つべき付属的な要件</td>
				</tr>
				<tr>
					<td height="50px">例) 勉強状況を取得して整理して出力する。</td>
					<td style = "text-align: center; padding: 0;">例</td>
					<td>例) レイアウト・稼働率・使いやすさ</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class = "sec">
		<h4>設計工程</h4>
		<p>システムを作る際に、、、というよりかは何かモノを作る際には必ず「計画(設計)」工程を通過しますよね♪<br>システム・プログラムを作る際も必ずこの設計工程を踏みます。<br>このmr-campusプロジェクトも実際にプログラミングするよりもはるかに多くの時間を設計に費やしました。</p>
		<p>ここでは、システム開発の際に基調となる設計工程について学びましょう♪</p>
		<p><small>※タップすると詳細が表示されます。</small></p>
		<div style = "width: 300px; margin-left: 50px;">
			<div id = "plan0" class = "plan_class">外部設計</div>
			<div class = "plan_arrow">&darr;</div>
			<div id = "plan1" class = "plan_class">内部設計</div>
			<div class = "plan_arrow">&darr;</div>
			<div id = "plan2" class = "plan_class">プログラム設計</div>
			<div class = "plan_arrow">&darr;</div>
			<div id = "plan3" class = "plan_class">プログラミング</div>
		</div>
		<div id = "plan_show"></div>
	</div>
	<div class = "sec">
		<h4>テスト</h4>
		<p>さあ、システムが完成しました!!!<br>動かしてみましょう♪<br><br><br>..........<br><br><br>動かない、、、、、<br><br><br>なんてこと嫌ですよね、、、</p>
		<p>そうならないために、システム開発では小さな部品(モジュール)が完成したらそのモジュールが動くかどうかテストして、モジュール2つを組み合わせて動くかテストして、サブシステム(複数のモジュール集合)が動くかテストして、最終的にシステムが動くかどうかチェックします。<br>	</p>
		<p>ここではそれぞれの段階で行われるテストについて学びましょう♪</p>
		<table class = "normal_table" id = "test">
			<tbody>
				<tr>
					<th width = "40%" class = "border">単体テスト</th>
					<td width = "60%">モジュール(小さな部品)ごとにチェック</td>
				</tr>
				<tr>
					<th>&darr;</th>
					<td></td>
				</tr>
				<tr>
					<th class = "border">結合テスト</th>
					<td>モジュールを連結させて動くかチェック</td>
				</tr>
				<tr>
					<th>&darr;</th>
					<td></td>
				</tr>
				<tr>
					<th class = "border">システムテスト</th>
					<td>システム全体として動くかチェック</td>
				</tr>
				<tr>
					<th>&darr;</th>
					<td></td>
				</tr>
				<tr>
					<th class = "border">運用テスト</th>
					<td>実際の環境で動くかどうかチェック</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class = "sec">
		<h4>テストケースの設計技法</h4>
		<p>では実際にどのようにテストするかですよね、、、<br><br><br>テストの技法としては大きく<strong>「ブラックボックステスト」と「ホワイトボックステスト」</strong>に分けられます。</p>
		<div class = "test_case">
			<h4>ブラックボックステスト</h4>
			<p>システムをホワイトボックス(中身の見える箱)として扱い、内部論理を網羅的にテスト。</p>
		</div>
		<div class = "test_case">
			<h4>ホワイトボックステスト</h4>
			<p>システムをブラックボックス(中身の見えない箱)として扱い、入力に対する出力をテスト。</p>
		</div>
	</div>
	<div class = "sec">
		<h4>ファンクションポイント法</h4>
		<p>皆さんシステム開発ってどのくらいの費用・期間がかかると思いますか???<br><br><br>答えは、ピンキリです、、、笑、、、システムの規模によっては1日でできるものもあれば1年以上かかるものもあればと、、、<br><br><br>ここでは、システムの規模を見積もるために用いられるファンクションポイント法について説明します。</p>
		<p>ファンクションポイント法では<strong>機能の数</strong>と<strong>機能の複雑さ(重み付け)</strong>からシステムの規模を求めます。</p>
		<table id = "function_point_table" border = "1" style = "width: 500px;">
			<thead style = "text-decoration: underline;">
				<tr>
					<th wihth = "40%">想定される機能</th>
					<th wihth = "20%">機能の数</th>
					<th wihth = "20%">機能の複雑さ</th>
					<th wihth = "20%">計</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>データの受け取り</th>
					<td>3</td>
					<td>5</td>
					<td>15</td>
				</tr>
				<tr>
					<th>データの処理</th>
					<td>5</td>
					<td>7</td>
					<td>35</td>
				</tr>
				<tr>
					<th>データの出力</th>
					<td>8</td>
					<td>4</td>
					<td>32</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style = "background-color: pink;">82</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>


<?php
show_footer("strategy-3-7", basename(__FILE__, ".php"), "management-4-9");
?>

