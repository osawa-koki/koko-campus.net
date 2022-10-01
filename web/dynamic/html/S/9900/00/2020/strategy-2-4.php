<?php

session_start();
session_regenerate_id(true);


require_once("common.php");
include_head("技術戦略マネジメント", "経営戦略", "ストラテジ系", basename(__FILE__, ".php") .".css");
include "include.html";
including();



?>

<img class = "progress_img" src = "./pics/progress-15.png" alt = "進捗度画像">

</div>

<h1>ITパスポート試験</h1>

<div class = "all">
	<h2>技術戦略マネジメント(ストラテジ系)---(4/23)</h2>
	<div class = "sec">
		<h4>MOT(技術経営)</h4>
		<p>今までの企業経営って「技術部門」と「経営部門」の関係が薄くて、技術を伸ばす経営ができないことが多かったんですよね、、、<br>東芝の経営不振なんてのはその最たる例なんですけど、、、</p>
		<p>ってことで、企業が持つ「技術」を「経営」によって積極的に管理していこうという考え方がMOT(技術経営)です。<br>技術部門の研究開発(R&D)を経営によって効率的に管理することがメインです。</p>
	</div>
	<div class = "sec" id = "valley_of_death">
		<h4>技術開発戦略における障壁</h4>
		<p>製品を開発・市場に販売までの流れって大きく分けると「研究開発段階」「製品化段階」「事業化段階(産業化段階)」という流れを踏みます。<br>ここでそれぞれの段階を超える際に現れる障壁について学びましょう♪</p>
		<table class = "normal_table">
			<tbody>
				<tr>
					<th width = "60%" height = "30px">基礎研究</th>
					<td width = "5%"></td>
					<td width = "35%"></td>
				</tr>
				<tr>
					<td height = "30px" class = "arrow">&darr;</td>
					<td>&laquo;</td>
					<td>魔の川</td>
				</tr>
				<tr>
					<th height = "30px">応用研究</th>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td height = "30px" class = "arrow">&darr;</td>
					<td>&laquo;</td>
					<td>死の谷</td>
				</tr>
				<tr>
					<th height = "30px">製品化</th>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td height = "30px" class = "arrow">&darr;</td>
					<td>&laquo;</td>
					<td>ダーウィンの海</td>
				</tr>
				<tr>
					<th height = "30px">産業化</th>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class = "sec">
		<h4>イノベーションのジレンマ</h4>
		<p>イノベーションのジレンマとは、大企業が革新性を失い革新的な技術を有したベンチャー企業に敗れることを指します。<br>大企業が安定を求めて保守路線に走ること自体は特に問題はないんですけど、IT分野などは革新性が求められるので経営者はそのことを意識する必要があります。</p>
	</div>
	<div class = "sec">
		<h4>APIエコノミー</h4>
		<p>他の企業が提供するwebサービスを融合させてより価値のあるサービスを展開していく仕組みのことを言います。</p>
		<iframe id = "googlemap" src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.7302853082138!2d139.7530745656304!3d35.68364263744648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188c0d02d8064d%3A0xd11a5f0b379e6db7!2z55qH5bGF!5e0!3m2!1sja!2sjp!4v1629135542476!5m2!1sja!2sjp" width = "600" height = "450" style = "border:0;" allowfullscreen = "" loading = "lazy"></iframe>
		<p>ここではgoogle mapのapiを利用して皇居の地図を私のwebページに埋め込みました。<br>これがapiという機能で、apiエコノミーとはapiを用いてより良いものを作っていこうとする仕組みのことを指します。</p>
	</div>
</div>





<?php
show_footer("strategy-2-3", basename(__FILE__, ".php"), "strategy-2-5");
?>


