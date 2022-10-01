<?php

session_start();
session_regenerate_id(true);

?>

<!DOCTYPE html>
<html lang = "ja">
<head>
	<meta charset = "UTF-8">
	<title>確認テスト---企業活動(ITパスポート)</title>
	<meta name = "description" content = "企業活動-企業と法務-ストラテジ系">
	<link rel = "stylesheet" href = "strategy-1-1-test.css">
</head>

<body>
<!-- ヘッダーメニューの作成 -->
<header class = "page_header wrapper">
	<h1><a href = "https://mr-campus.com"><img class = "logo" src = "../pics/header.png" alt = "mr-campus project"></a></h1>

	<nav>
		<ul class = "menu">
			<li><a href = "https://mr-campus.com">top</a></li>
			<li><a href = "./news/top">news</a></li>
			<li><a href = "./about/top">about</a></li>
			<li><a href = "./contact/top">contact</a></li>
		</ul>
	</nav>
</header>


<?php

if ($_SESSION["subjects"] == "") {
	$subjects_array = array();
} else {
	try {
		$subjects_array = explode(",", $_SESSION["subjects"]);
	} catch (Exception $e) {
	}
}

if ($_SESSION["passed"] == "") {
	$passed_array = array();
} else {
	try {
		$passed_array = explode(",", $_SESSION["passed"]);
	} catch (Exception $e) {
	}
}


# ログインしているかどうかで処理を分岐
if ($_SESSION["ok"] != 1) {
	$check = 3;
} else if (in_array("ITパスポート試験", $subjects_array)) {
	$check = 1;
} else if (in_array("ITパスポート試験", $passed_array)) {
	$check = 2;
} else {
	$check = 4;
}

print "<div id = 'login_status' class = 'container'>";

if ($check == 1 || $check == 2 || $check == 4) {
	?>

	<div class = "login_as">
		<p><strong><?php print $_SESSION["name"];?>さんとしてログイン中です♪</strong></p>
	</div>

	<?php
} else {
	?>

	<div class = "login_as">
		<p><strong>ゲスト様、ログインされていません。</strong></p>
		<p class = "paragraph">会員限定の便利な機能がたくさんあります♪<br>是非会員登録してくださいね♪<br>完全無料です!!!</p>
		<p>・会員登録は<a href = "../register">こちら</a>。</p>
		<p>・ログインは<a href = "../login">こちら</a>。</p>

	</div>
	<?php

}
print "</div>";

?>




<div class = "progress_container">
	<div class = "head_container">
		<h1 class = "get_it_center">ITパスポート試験</h1>
		<h1 class = "get_it_center">確認問題(企業活動)</h1>
	</div>
	<div class = "progress_div">
		<h1 id = "progress" class = "get_it_center"></h1>
	</div>
</div>



<div class = "question_box">


	<div class = "q_theme_box">
		<h1 id = "q_theme" class = "get_it_center">Let's Start!!!(Click me plz♪♪♪)</h1>
	</div><!-- q_themeの終了タグ -->




	<p id = "q_sentence" class = "font_size35 get_it_center"></p>




	<div id = "answer_container">
		<div class = "div_tf">
			<h1 id = "word_tf"></h1>
		</div>
		<p id = "comment"></p>
	</div>







	<table>
		<div class = "table1">
			<tr>
				<th id = "op1"><strong>A</strong></th>
				<td id = "op_1" class = "adjust"></td>
			</tr>
			<tr>
				<th></th>
				<td id = "cm1" class = "put_margin"></td>
			</tr>
		</div>
		<tr>
			<th id = "op2"><strong>B</strong></th>
			<td id = "op_2" class = "adjust"></td>
		</tr>
		<tr>
			<th></th>
			<td id = "cm2" class = "put_margin"></td>
		</tr>
		<tr>
			<th id = "op3"><strong>C</strong></th>
			<td id = "op_3" class = "adjust"></td>
		</tr>
		<tr>
			<th></th>
			<td id = "cm3" class = "put_margin"></td>
		</tr>
		<tr>
			<th id = "op4"><strong>D</strong></th>
			<td id = "op_4" class = "adjust"></td>
		</tr>
		<tr>
			<th></th>
			<td id = "cm4" class = "put_margin"></td>
		</tr>
	</table>




</div><!-- question_boxの終了タグ -->






<div class = "choise_div font_size35">
	<div id = "answer1" class = "get_it_center choise">
		<h3 class = "choise_h3">A</h3>
	</div>
	<div id = "answer2" class = "get_it_center choise">
		<h3 class = "choise_h3">B</h3>
	</div>
	<div id = "answer3" class = "get_it_center choise">
		<h3 class = "choise_h3">C</h3>
	</div>
	<div id = "answer4" class = "get_it_center choise">
		<h3 class = "choise_h3">D</h3>
	</div>


</div>
















<div class = "dont_show_me">

<p id = "now">0</p>
<p id = "answer"></p>
<p id = "state">0</p>


<p id = "qqq_1">Q.経営理念を説明したものはどれですか?</p>
<ol>
	<li id = "aaa_1">・企業活動の指針となる考え方であり、企業の存在意義について示したもの。</li>
	<li id = "bbb_1">・企業がその目的達成にために消費する資源のこと。</li>
	<li id = "ccc_1">・企業の将来の方向を示したビジョンを具現化するための意思決定計画。</li>
	<li id = "ddd_1">・企業が保有する他社ではまねできない中核となる技術。</li>
</ol>
<ol>
	<li id = "aaaaa_1">※正解、経営理念についての説明です。正解、経営理念についての説明です</li>
	<li id = "bbbbb_1">※経営資源についての説明です。</li>
	<li id = "ccccc_1">※経営計画についての説明です。</li>
	<li id = "ddddd_1">※コア・コンピタスについての説明です。</li>
</ol>	
<h1 id = "ttff_1">A</h1>
<p id = cmcm_1>経営理念とは企業活動の指針となる考え方であり、主に企業の存在価値を示したものです。</p>





<p id = "qqq_2">Q.現在担当している業務の実践を通じて教育を行う手法はどれか?</p>
<ol>
	<li id = "aaa_2">・e-ラーニング</li>
	<li id = "bbb_2">・OJT</li>
	<li id = "ccc_2">・OffJT</li>
	<li id = "ddd_2">・HRtech</li>
</ol>
<ol>
	<li id = "aaaaa_2">※ITを用いて学習すること。</li>
	<li id = "bbbbb_2">※正解、実際の業務に従事しながら教育をすること。</li>
	<li id = "ccccc_2">※実際の業務から外れて教育をすること。</li>
	<li id = "ddddd_2">※IT技術を人事管理に活用すること。</li>
</ol>	
<h1 id = "ttff_2">B</h1>
<p id = cmcm_2>OJTとは実際の業務を通じて仕事に必要な知識や技術を習得させます。</p>



<p id = "qqq_3">Q.経営幹部の役職のうち、情報システムを統括する最高責任者はどれか?</p>
<ol>
	<li id = "aaa_3">・CEO</li>
	<li id = "bbb_3">・CFO</li>
	<li id = "ccc_3">・COO</li>
	<li id = "ddd_3">・CIO</li>
</ol>
<ol>
	<li id = "aaaaa_3">※最高経営責任者のこと。</li>
	<li id = "bbbbb_3">※最高財務責任者のこと。</li>
	<li id = "ccccc_3">※最高執行責任者のこと。</li>
	<li id = "ddddd_3">※最高情報責任者のこと。</li>
</ol>	
<h1 id = "ttff_3">D</h1>
<p id = cmcm_3>Iがinformation、Eがexecutive、Fがfinancialの略であることを確認!</p>


<p id = "qqq_4">Q.損益計算書とは何か?</p>
<ol>
	<li id = "aaa_4">・一定期間における経営成績を表したもの。</li>
	<li id = "bbb_4">・一定期間における現金収支を表したもの。</li>
	<li id = "ccc_4">・ある時点における財政状態を表したもの。</li>
	<li id = "ddd_4">・純資産の部の変動額を表示したもの。</li>
</ol>
<ol>
	<li id = "aaaaa_4">※正解、損益計算書の説明です。</li>
	<li id = "bbbbb_4">※キャッシュフロー計算書の説明です。</li>
	<li id = "ccccc_4">※貸借対照表の説明です。</li>
	<li id = "ddddd_4">※株主資本等変動計算書の説明です。</li>
</ol>	
<h1 id = "ttff_4">A</h1>
<p id = cmcm_4>損益計算書は一定期間における経営成績、貸借対照表はある時点における財政状態を表示することを覚える!!</p>


<p id = "qqq_5">Q.貸借対照表で成立する等式はどれか?</p>
<ol>
	<li id = "aaa_5">・資産 = 負債 + 純資産</li>
	<li id = "bbb_5">・資本金 = 負債 + 資産</li>
	<li id = "ccc_5">・純資産 = 利益 + 資本金</li>
	<li id = "ddd_5">・資産 = 負債 + 利益</li>
</ol>
<ol>
	<li id = "aaaaa_5"></li>
	<li id = "bbbbb_5"></li>
	<li id = "ccccc_5"></li>
	<li id = "ddddd_5"></li>
</ol>	
<h1 id = "ttff_5">A</h1>
<p id = cmcm_5>貸借対照表等式(資産 = 負債 + 純資産)を覚えましょう♪</p>


<p id = "qqq_6">Q.貸借対照表で成立する等式はどれか?</p>
<ol>
	<li id = "aaa_6">・資産 = 負債 + 純資産</li>
	<li id = "bbb_6">・資本金 = 負債 + 資産</li>
	<li id = "ccc_6">・純資産 = 利益 + 資本金</li>
	<li id = "ddd_6">・資産 = 負債 + 利益</li>
</ol>
<ol>
	<li id = "aaaaa_6"></li>
	<li id = "bbbbb_6"></li>
	<li id = "ccccc_6"></li>
	<li id = "ddddd_6"></li>
</ol>	
<h1 id = "ttff_6">A</h1>
<p id = cmcm_6>貸借対照表等式(資産 = 負債 + 純資産)を覚えましょう








</div>






<script type="text/javascript" src = "./strategy-1-1-test.js"></script>
</body>
</html>







