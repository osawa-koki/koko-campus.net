<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-25",
	"updated" => "2022-03-25"
);
head($obj);
?>
<h2>機能要件・非機能要件</h2>
前回の授業でも学習しましたが、IPAのシラバスどおりに進めるとこの授業でも扱うことになるので、ここでは機能要件と非機能要件について復習しますね♪
<table>
	<thead>
		<tr>
			<th width="40%">機能要件</th>
			<th width="20%"></th>
			<th width="40%">非機能要件</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>システムが実現すべきメインの機能</td>
			<th>定義</th>
			<td>システムが持つべき付属的な要件</td>
		</tr>
		<tr>
			<td height="50px">例) 勉強状況を取得して整理して出力する。</td>
			<th>例</th>
			<td>例) レイアウト・稼働率・使いやすさ</td>
		</tr>
	</tbody>
</table>
<h2>設計工程</h2>
システムを作る際に、、、というよりかは何かモノを作る際には必ず「計画(設計)」工程を通過しますよね♪<br />システム・プログラムを作る際も必ずこの設計工程を踏みます。<br /><br />ここでは、システム開発の際に基調となる設計工程について学びましょう♪
<p>タップすると詳細が表示されます。</p>
<table id="design-table" class="x max-300w">
	<tbody>
		<tr>
			<th>外部設計</th>
		</tr>
		<tr>
			<td>&darr;</td>
		</tr>
		<tr>
			<th>内部設計</th>
		</tr>
		<tr>
			<td>&darr;</td>
		</tr>
		<tr>
			<th>プログラム設計</th>
		</tr>
		<tr>
			<td>&darr;</td>
		</tr>
		<tr>
			<th>プログラミング</th>
		</tr>
	</tbody>
</table>
<div id="design-info" class="r-border"></div>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const ary = Array.from(document.getElementById("design-table").getElementsByTagName("th")),
			info = document.getElementById("design-info"),
			message = [
				"外部から見える部分の設計(操作画面・操作方法等)を行います。",
				"内部(論理データ)の設計を行います。",
				"実際に処理を行う関数やプログラムの設計を行います。",
				"実際にプログラムを書いていきます。(コーディング/プログラミング)"
			];
		let last;
		ary.forEach(e => {
			e.addEventListener("click", function() {
				const n = ary.indexOf(this);
				try {
					last.style.color = "black";
				} catch {}
				info.textContent = message[n];
				this.style.color = "red";
				last = this;
			});
		});
	})();
</script>
<h2>テスト</h2>
さあ、システムが完成しました!!!<br />動かしてみましょう♪<br /><br />..........<br /><br />動かない、、、、、<br /><br />なんてこと嫌ですよね、、、<br /><br />そうならないために、システム開発では小さな部品(モジュール)が完成したらそのモジュールが動くかどうかテストして、モジュール2つを組み合わせて動くかテストして、サブシステム(複数のモジュール集合)が動くかテストして、最終的にシステムが動くかどうかチェックします。<br />	<br />ここではそれぞれの段階で行われるテストについて学びましょう♪
<table>
	<tbody>
		<tr>
			<th>単体テスト</th>
			<td>モジュール(小さな部品)ごとにチェック</td>
		</tr>
		<tr>
			<th>&darr;</th>
			<td></td>
		</tr>
		<tr>
			<th>結合テスト</th>
			<td>モジュールを連結させて動くかチェック</td>
		</tr>
		<tr>
			<th>&darr;</th>
			<td></td>
		</tr>
		<tr>
			<th>システムテスト</th>
			<td>システム全体として動くかチェック</td>
		</tr>
		<tr>
			<th>&darr;</th>
			<td></td>
		</tr>
		<tr>
			<th>運用テスト</th>
			<td>実際の環境で動くかどうかチェック</td>
		</tr>
	</tbody>
</table>
<h3>テストケースの設計技法</h3>
では実際にどのようにテストするかですよね、、、<br /><br />テストの技法としては大きく<strong>「ブラックボックステスト」と「ホワイトボックステスト」</strong>に分けられます。
<h4>ブラックボックステスト</h4>
システムをホワイトボックス(中身の見える箱)として扱い、内部論理を網羅的にテストします。
<h4>ホワイトボックステスト</h4>
システムをブラックボックス(中身の見えない箱)として扱い、入力に対する出力をテストします。
<h2>ファンクションポイント法</h2>
皆さんシステム開発ってどのくらいの費用・期間がかかると思いますか???<br /><br />答えは、ピンキリです、、、笑<br /><br />システムの規模によっては1日でできるものもあれば1年以上かかるものもあればと、、、<br /><br />ここでは、システムの規模を見積もるために用いられるファンクションポイント法について説明します。<br /><br />ファンクションポイント法では<strong>機能の数</strong>と<strong>機能の複雑さ(重み付け)</strong>からシステムの規模を求めます。
<table>
	<thead>
		<tr>
			<th wihth="40%">想定される機能</th>
			<th wihth="20%">機能の数</th>
			<th wihth="20%">機能の複雑さ</th>
			<th wihth="20%">計</th>
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
			<th>82</th>
		</tr>
	</tbody>
</table>
<?php footer(); ?>