<?php

session_start();
session_regenerate_id(true);


require_once("common.php");
include_head("ソフトウェア開発技術", "開発技術", "マネジメント系", basename(__FILE__, ".php") .".css");
include "include.html";
including();


?>



<img class = "progress_img" src = "./pics/progress-35.png" alt = "進捗度画像">

</div>

<h1>ITパスポート試験</h1>

<div class = "all">
	<h2>システム企画(マネジメント系)---(8/23)</h2>
	<div class = "sec">
		<h4>システム開発モデル</h4>
		<p>システム開発する際に用いられる手法についてここでは学びましょう♪</p>
		<p>開発モデル・概要・長所・短所をセットで覚えましょう♪</p>
		<div id = "dev_model_div" style = "margin-left: 25px;">
			<div id = "model0" class = "dev_model">ウォーターフォールモデル</div>
			<div id = "model1" class = "dev_model">スパイラルモデル</div>
			<div id = "model2" class = "dev_model">プロトタイプモデル</div>
		</div>

		<p id = "name_of_model" class = "get_it_center"></p>




		<div id = "model_chart0" class = "hidden">
			<table class = "normal_table" style = "text-align: center;" style = "margin: 0 auto;">
				<tbody>
					<tr>
						<th width = "50%" height = "50px" id = "model0_0" style = "color: red;">要件定義</th>
						<td width = "50%" rowspan = "13" style = "position: relative;"><div class = "b_arrow"><span style="position: absolute;writing-mode: vertical-lr;font-size: 30px;margin-top: 10px;top: 40px;left: 78px;height: 400px;">まるで滝のように、、、</span></div></td>
					</tr>
					<tr>
						<td height = "30%">&darr;</td>
					</tr>
					<tr>
						<th height = "50px" id = "model0_1">外部設計(概要設計)</th>
						<td></td>
					</tr>
					<tr>
						<td height = "30%">&darr;</td>
					</tr>
					<tr>
						<th height = "50px" id = "model0_2">内部設計(詳細設計)</th>
						<td></td>
					</tr>
					<tr>
						<td height = "30%">&darr;</td>
					</tr>
					<tr>
						<th height = "50px" id = "model0_3">プログラム設計</th>
						<td></td>
					</tr>
					<tr>
						<td height = "30%">&darr;</td>
					</tr>
					<tr>
						<th height = "50px" id = "model0_4">プログラミング</th>
						<td></td>
					</tr>
					<tr>
						<td height = "30%">&darr;</td>
					</tr>
					<tr>
						<th height = "50px" id = "model0_5">テスト</th>
						<td></td>
					</tr>
					<tr>
						<td height = "30%">&darr;</td>
					</tr>
					<tr>
						<th height = "50px" id = "model0_6">運用・保守</th>
						<td></td>
					</tr>
				</tbody>
			</table>
			<div id = "model0_show_div">
				<div id = "model0_button">次へ♪</div>
				<div id = "model0_count" style = "display: none;">0</div>
				<p id = "model0_comment"></p>
			</div>
			<table class = "normal_table" id = "spiral_table" border = "1" style = "border-collapse: collapse; font-size: 20px;">
				<tbody>
					<tr>
						<th width = "10%">概要</th>
						<td>滝(ウォーターフォール)のように後戻りをせず、各工程を順番に進めていく。</td>
					</tr>
					<tr>
						<th>長所</th>
						<td>計画が立てやすい。<br>進捗状況を把握しやすい。</td>
					</tr>
					<tr>
						<th>短所</th>
						<td>大きな変更に対応しずらい。</td>
					</tr>
				</tbody>
			</table>
		</div>


		<div id = "model_chart1" class = "hidden">
			<div id = "swiral_dummy">
				<div class = "swirl-1">
					<div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
				</div>
				<p id = "spiral0" class = "spiral" style = "color: red;">計画</p>
				<p id = "spiral1" class = "spiral">設計</p>
				<p id = "spiral2" class = "spiral">プログラミング</p>
				<p id = "spiral3" class = "spiral">テスト</p>
			</div>
			<div id = "model1_show_div">
				<div id = "model1_button">次へ♪</div>
				<div id = "model1_count" style = "display: none;">0</div>
				<p id = "model1_comment"></p>
			</div>
			<table class = "normal_table" border = "1" style = "border-collapse: collapse; font-size: 20px;">
				<tbody>
					<tr>
						<th width = "10%">概要</th>
						<td>計画・設計・プログラミング・テスト工程のサイクルを何度も繰り返す。</td>
					</tr>
					<tr>
						<th>長所</th>
						<td>変更に対応しやすい。<br>バグの発見・修正が容易。</td>
					</tr>
					<tr>
						<th>短所</th>
						<td>進捗度が把握しにくい。</td>
					</tr>
				</tbody>
			</table>
		</div>



		<div id = "model_chart2" class = "hidden">
			<div id = "prototype_div">
				<table class = "normal_table" id = "prototype_table">
					<tbody>
						<tr>
							<td height = "100px" colspan = "5" style = "overflow: hidden; position: relative;"><div id = "half_circle"></div><div id = "feedback" class = "hidden">フィードバック!</div><div id = "triangle"></div></td>
						</tr>
						<tr>
							<td height = "30px" colspan = "5"></td>
						</tr>
						<tr>
							<th id = "prototype0" width = "25%" height = "30px" style = "color: red;">作成</th>
							<td width = "10%">&rarr;</td>
							<th id = "prototype1" width = "30%">プロトタイプ<br>(試作品)</th>
							<td width = "10%">&rarr;</td>
							<th id = "prototype2" width = "25%">使用・評価</th>
						</tr>
					</tbody>
				</table>
			</div>
			<div id = "model2_show_div">
				<div id = "model2_button">次へ♪</div>
				<div id = "model2_count" style = "display: none;">0</div><div id = "x_lock_model2" class = "hidden">1</div>
				<p id = "model2_comment"></p>
			</div>
			<table class = "normal_table" border = "1" style = "border-collapse: collapse; font-size: 20px;" id = "prototype_show_table">
				<tbody>
					<tr>
						<th width = "10%">概要</th>
						<td>早い段階で試作品(プロトタイプ)を作成して、ユーザの確認を得ながら開発を進める。</td>
					</tr>
					<tr>
						<th>長所</th>
						<td>ユーザの要求を忠実に取り入れられる。</td>
					</tr>
					<tr>
						<th>短所</th>
						<td>期間やコストの見積もりが困難。</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class = "sec">
		<h4>システム開発手法</h4>
		<table class = "normal_table" border = "1">
			<tr>
				<th width = "30%">RAD</th>
				<td width = "70%"><strong>短期間で(素早く)</strong>システムを開発します。</td>
			</tr>
			<tr>
				<th>アジャイル開発</th>
				<td><strong>迅速かつ適応的に</strong>システムを開発します。</td>
			</tr>
			<tr>
				<th>スクラム</th>
				<td>アジャイル開発の考え方のひとつ。<br>短期間で機能の実装と評価を繰り返しながら開発します。</td>
			</tr>
			<tr>
				<th>XP</th>
				<td>アジャイル開発手法のひとつ。<br>厳格さよりも<strong>柔軟性を重要視!!!</strong></td>
			</tr>
			<tr>
				<th>テスト駆動開発</th>
				<td>XPの具体的な手法。<br>最初にクリアすべきテストを作成して、そのテストをパスするようにプログラミングをします。</td>
			</tr>
			<tr>
				<th>ペアプログラミング</th>
				<td>XPの具体的な手法。<br><strong>2人1組(ペア)</strong>でプログラミングします。</td>
			</tr>
			<tr>
				<th>リファクタリング</th>
				<td>XPの具体的な手法。<br>プログラムの動作は変えずに、内部構造のみ整理・改善します。</td>
			</tr>
		</table>
	</div>
	<div class = "sec">
		<h4>共通フレーム2013</h4>
		<p>ここでは、開発プロセスにおける共通フレームについて説明します。簡単に言うと、どのような流れでシステム開発をするかについてですね。<br>今までにシステム企画やら要件定義やらテストやら学習したと思いますが、その総復習もかねて学びましょう♪</p>
		<div>
			<div>
				<div id = common_frame_div>
					<div id = "v_triangle"></div>
					<div id = "v_line0"></div>
					<div id = "v_line1"></div>
					<div id = "arrow0"></div>
					<div id = "arrow1"></div>
					<div id = "arrow2"></div>
					<div id = "arrow3"></div>
					<div id = "arrow4"></div>
					<div id = "common_frame0" class = "common_frame_class">システム要件定義</div>
					<div id = "common_frame1" class = "common_frame_class">システム方式設計</div>
					<div id = "common_frame2" class = "common_frame_class">ソフトウェア要件定義</div>
					<div id = "common_frame3" class = "common_frame_class">ソフトウェア方式設計</div>
					<div id = "common_frame4" class = "common_frame_class">ソフトウェア詳細設計</div>
					<div id = "common_frame5" class = "common_frame_class">プログラミング</div>
					<div id = "common_frame6" class = "common_frame_class">ソフトウェア単体テスト</div>
					<div id = "common_frame7" class = "common_frame_class">ソフトウェア結合テスト</div>
					<div id = "common_frame8" class = "common_frame_class">ソフトウェアテスト</div>
					<div id = "common_frame9" class = "common_frame_class">システム結合テスト</div>
					<div id = "common_frame10" class = "common_frame_class">システムテスト</div>
				</div>
			</div>
		</div>
		<div id = "v_name_show"></div>
		<div class = "balloon3-top"><p id = "v_comment_show"></p><br><p id = "v_comment_show0"></p></div>
	</div>
	<div class = "sec">
		<h4>ソフトウェア開発のアプローチ方法</h4>
		<p>ソフトウェアを開発するにあたり、<strong>何大切にするか</strong>によってソフトウェア開発手法は<strong>プロセス中心アプローチ</strong>と<strong>データ中心アプローチ</strong>の2つに分けられます。</p>
		<table class = "normal_table" border = "1">
			<tbody>
				<tr>
					<th width = "40%">プロセス中心アプローチ</th>
					<td width = "60%">業務を実現するための<strong>プロセス</strong>に着目します。</td>
				</tr>
				<tr>
					<th>データ中心アプローチ</th>
					<td>業務で用いる<strong>データ</strong>に着目します。</td>
				</tr>
			</tbody>
		</table>
		<p>プロセスかデータかどちらをより重視するべきなんでしょうね、、、<br><br><br></p>
		<p>答え、、、<br><span class = "strong_bigger">両方</span>です。</p>
		<p>はい、ちょっとズルいですね、、、笑<br>ですけど、あるんです。プロセスとデータ両方大切にする概念があるんですよ!!!これが<span class = "strong_bigger">オブジェクト指向</span>です。プログラミングの世界においてホントに奇跡的な方法です。<br>同時に、ホントに難しいです。<br>どれくらい難しいかといいますと、オブジェクト指向を開発したアラン・ケイさんはコンピュータ業界のノーベル賞といわれるチューリング賞を受賞するレベルで難しいです。</p>
		<p>これからオブジェクト指向について説明しますね♪<br>以下ではプロセスを<strong>メソッド</strong>として説明します。(意味は同じです)</p>
		<div style = "margin: 10px; background-color: skyblue; font-size: 15px; border: 2px black solid;">
			<p style = "padding: 25px;"><span class = "strong_bigger">オブジェクト指向とは、、、</span><br><br><br>オブジェクト指向プログラミングでは、データとデータに対する手続き(メソッド)としてひとつにまとめてクラス化します。(カプセル化)<br>実際に利用する際はクラスからインスタンスオブジェクトを生成してそれに対するメソッドを実行してインスタンスオブジェクト内のデータに対する処理を行います。</p>
		</div>
		<div style = "margin: 50px; font-size: 100px; text-align: center;">?</div>
		<p>って感じですよね、、、笑</p>
		<p style = "margin-bottom: 100px;">疲れちゃったんで、少しゲームでもしましょう♪</p>
		<ol><span class = "strong_bigger" style = "margin-top: 50px; padding: 15px;">ゲームのルール</span>
			<li>敵を倒しましょう♪</li>
			<li>敵のHPは100です。</li>
			<li>こちらの技は<span style = "color: skyblue;">「たくわえる」</span>・<span style = "color: lime";>「普通に攻撃」</span>・<span style = "color: red;">「はりきって攻撃」</span>の3つ</li>
			<li><span style = "color: skyblue;">「たくわえる」</span>とパワーが1アップする</li>
			<li><span style = "color: lime;">「普通に攻撃」</span>は相手に3のダメージ</li>
			<li><span style = "color: red;">「はりきって攻撃」</span>するとパワー×10のダメージ</li>
			<li><span style = "color: red;">「はりきって攻撃」</span>するとパワーは0に戻る</li>
			<li>パワーは最大5まで</li>
		</ol>


		<div id = "game_comment">それではゲーム開始です♪</div>

		<div id = "oop_entire">
			<div id = "bar_branch">
				<div id = "bar_man_div">
					<div class = "head"></div>
					<div class = "body"></div>
					<div class = "right_arm"></div>
					<div class = "left_arm"></div>
					<div class = "right_foot"></div>
					<div class = "left_foot"></div>
				</div>
			</div>
			<div id = "power_div"><span>パワー</span><span id = "power">0</span></div>

			<div id = "green_attack" style = "left: 100px;" class = "hidden"></div>
			<div id = "red_attack" style = "height: 20px; left: 100px;" class = "hidden"></div>

			<div id = "bad_branch">
				<div id = "bad_man_div">
					<div class = "head">敵</div>
					<div class = "body"></div>
					<div class = "right_arm"></div>
					<div class = "left_arm"></div>
					<div class = "right_foot"></div>
					<div class = "left_foot"></div>
				</div>
			</div>
			<div id = "left_hp_div"><span id = "hp">100</span>/100</div>
		</div>
		<div id = "cmd">
			<div id = "cmd0">たくわえる</div><div id = "cmd1">普通に攻撃</div><div id = "cmd2">はりきって攻撃</div>
		</div>

		<div id = "this_shows_after_completed" class = "hidden">

			<div style = "margin: 25px 0;"></div>

			<p>ゲームクリア、お疲れさまでした。<br>このゲームにオブジェクト指向の概念が含まれていたんですけど分かりましたか???<br><br><br>オブジェクト指向とは<strong><span class = "data">「データ」</span>+<span class = "method">「メソッド」</span></strong>でしたね!!!<br>このゲームでは、<strong><span class = "data">データ</span>としてパワー</strong>、<strong><span class = "method">メソッド</span>として「たくわえる」と「普通に攻撃」と「はりきって攻撃」</strong>を使用しました。ところで、皆さんこのゲームをどうやってクリアしましたか???<br>おそらく「たくわえる」と「はりきって攻撃」をメインに使ってクリアしたと思います。<br><small>(普通に攻撃だけでのクリアをかなり難しく設定しました。笑)</small><br>着目してほしいのは、<strong>たくわえる<span class = "method">(メソッド)</span>でパワー<span class = "data">(データ)</span>を1上昇させて、はりきって攻撃<span class = "method">(メソッド)</span>でパワー<span class = "data">(データ)</span>を取得して、かける10したダメージを与えて、その後にパワー<span class = "data">(データ)</span>を0にした点です。<br><br><br>メソッドとデータが密接な関係にありますよね!!!<br>棒人間のパワー<span class = "data">(データ)</span>・たくわえる・普通に攻撃・はりきって攻撃<span class = "method">メソッド</span>を組み合わせた<span class = "class">棒人間クラス</span>というものを作成(カプセル化)、することでデータとメソッドの密接な関係を可能にしているんです!!!</strong><br><br><br>これが<strong>オブジェクト指向</strong>という考え方です。<br>なんとなく理解できましたか???<br></p>

			<div class = "explanation">
				<div id = "explanation_chart">
					<div id = "exp_class" class = "hidden">
					</div>
					<span id = "label_class" class = "hidden">棒人間クラス</span>
					<div id = "exp_data">
						<ul style = "margin: 0 auto; list-style: none; font-size: 15px; margin-top: 25px; padding: 0;">
							<li>パワー</li>
						</ul>
					</div>
					<span id = "label_data">棒人間データ</span>
					<div id = "exp_method">
						<ul style = "margin: 0 auto; list-style: none; font-size: 15px; margin-top: 25px; padding: 0;">
							<li>たくわえる</li>
							<li>普通に攻撃</li>
							<li>はりきって攻撃</li>
						</ul>
					</div>
					<span id = "label_method">棒人間メソッド</span>
				</div>


					<div id = "encapsulated" class="ribbon3 hidden">
  						<h3>オブジェクト指向になりました♪</h3>
					</div>


				<div style = "position: static;">
					<div id = "mixing_man_div">
						<div class = "head"></div>
						<div class = "body"></div>
						<div class = "right_arm"></div>
						<div class = "left_arm"></div>
						<div class = "right_foot"></div>
						<div class = "left_foot"></div>
					</div>
					<div id = "encapsulation">カプセル化<br>(オブジェクト指向に!!!)</div>
				</div>
			</div>
		</div>
	</div>
</div>





<?php
show_footer("management-4-8", basename(__FILE__, ".php"), "management-5-10");
?>


