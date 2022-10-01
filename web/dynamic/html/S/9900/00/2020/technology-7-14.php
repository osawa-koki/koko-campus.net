<?php

session_start();
session_regenerate_id(true);


require_once("common.php");
include_head("アルゴリズムとプログラミング", "基礎理論", "テクノロジ系", basename(__FILE__, ".php") .".css");
include "include.html";
including();


?>




<img class = "progress_img" src = "./pics/progress-55.png" alt = "進捗度画像">

</div>

<h1>ITパスポート試験</h1>

<div class = "all">
	<h2>アルゴリズムとプログラミング(テクノロジ系)---(13/23)</h2>
	<div class = "sec">
		<h4>アルゴリズム</h4>
		<p><strong>アルゴリズム</strong>とは、、、<br><strong>問題の解法</strong>のこと!!!</p>
		<p>例えば、「13・5・15・20・8」を大きい順に並べる方法がアルゴリズムですね♪</p>
		<p>数字を大きい順に並び変えるアルゴリズムを体験してみましょう♪</p>
		<div id = "algorithm_div">
			<input class = "input_3digits_only" value = "13"><input class = "input_3digits_only"value = "5"><input class = "input_3digits_only"value = "15"><input class = "input_3digits_only"value = "20"><input class = "input_3digits_only"value = "8">
		</div>
		<div id = "algorithming">並び変える!</div>
		<div id = "algorithm_show" class = "hidden">暫定一位===><span id = "temp_1st"></span></div>
		<div id = "algorithm_show_div">
			<input class = "algorythm_organized" readonly><input class = "algorythm_organized" readonly><input class = "algorythm_organized" readonly><input class = "algorythm_organized" readonly><input class = "algorythm_organized" readonly>
		</div>
	</div>
</div>





<?php
show_footer("technology-7-13", basename(__FILE__, ".php"), "technology-7-15");
?>
