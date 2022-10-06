<?php

session_start();
session_regenerate_id(true);


require_once("common.php");
include_head("システム戦略", "システム戦略", "ストラテジ系", basename(__FILE__, ".php") .".css");
include "include.html";
including();


?>



<img class = "progress_img" src = "./pics/progress-20.png" alt = "進捗度画像">

</div>

<h1>ITパスポート試験</h1>

<div class = "all">
	<h2>システム戦略(ストラテジ系)---(5/23)</h2>
	<div class = "sec">
		<h4>エンタープライズアーキテクチャ (EA)</h4>
		<p>組織全体の業務とシステムを体系化して、<strong>全体の最適化</strong>を図ります。<br>組織の設計・管理を目的とします。</p>
		<p><small>※各階層をタップすると詳細が表示されます。</small></p>
		<ol class = "pyramid" style = "margin-top: 30px; margin-bottom: 30px;">
		    <li id = "ba">BA</li>
		    <li id = "da">DA</li>
		    <li id = "aa">AA</li>
		    <li id = "ta">TA</li>
		</ol>
		<div id = "pyramid_div" class = "hidden">
			<table class = "normal_table" border = "1">
				<tbody>
					<tr>
						<th width = "30%" height = "80px" style = "font-size: 50px; color: red; font-weight: bold;" id = "ea0"></th>
						<th width = "70%" style = "font-size: 30px; text-decoration: underline;" id = "ea1"></th>
					</tr>
					<tr>
						<td colspan = "2"><span id = "ea2" style = "font-weight: bold;"></span><span id = "ea3"></span></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class = "sec">
		<h4>システム戦略手法</h4>
		<p>ITシステムを業務に効率的に取り入れるための手法を紹介します。</p>
		<table class = "normal_table" border = "1" style = "font-size: 15px;">
			<tbody>
				<tr>
					<th width = "10%">ERP</th>
					<td width = "25%"><strong>E</strong>nterprise <strong>R</strong>esourse <strong>P</strong>lanning</td>
					<td width = "65%"><strong>企業活動全般</strong>を統合的に管理するための手法。<br>私が大学で一番好きな講義がERPの授業でした。笑</td>
				</tr>
				<tr>
					<th>SFA</th>
					<td><strong>S</strong>ales <strong>F</strong>orse <strong>A</strong>utomation</td>
					<td><strong>営業活動</strong>を情報システムを用いて効率的に管理します。</td>
				</tr>
				<tr>
					<th>BYOD</th>
					<td><strong>B</strong>ring <strong>Y</strong>our <strong>O</strong>wn <strong>D</strong>evises</td>
					<td>従業員のスマホ・PCを仕事で利用すること。<br>便利かつ費用がかからないというメリットの裏にはセキュリティのリスクもあるので要注意です。</td>
				</tr>
				<tr>
					<th>テレワーク</th>
					<td colspan = "2">いわゆる在宅勤務ですね。ITパスポート試験のシラバス4.0で追加された用語です。<br>コロナで一躍有名になりましたね。</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class = "sec">
		<h4>モデリング技法</h4>
		<p>モデリングとは、、、<br><br>その前にモデルとは、、、<br>プラモデルから連想できるように、何かの模型のことです。何かしらの特徴を捉えて把握しやすくしたモノをモデルといいます。<br><br>モデリングとは対象(ここでは業務全般)の特徴を端的に捉えて分かりやすい形(ここでは図表)にすることを指します。</p>
		<p>モデリング手法にはいくつか種類があるのでここでは代表的なモデリング手法を学びましょう♪</p>
		<ul>
			<li><a href = "#dfd_sec">DFD (データフローダイアグラム)</a></li>
			<li><a href = "#er_sec">E-R図</a></li>
			<li><a href = "#class_fig_sec">クラス図 (UML)</a></li>
			<li><a href = "#use_case_sec">ユースケース図 (UML)</a></li>
		</ul>
	</div>
	<div class = "sec">
		<h4 id = "dfd_sec">DFD (データフローダイアグラム)</h4>
		<p>業務に関して、<strong>「データの流れ」</strong>に着目してモデリングします。</p>
		<p>以下ではこのwebサイト(mr-campus)の会員登録の流れを例にとって説明しますね♪<br><small>※タップすると詳細が表示されます。</small></p>
		<table id = "dfd_table" style = "margin-left: 5%;">
			<tbody>
				<tr>
					<td id = "dfd0" width = "10%" height = "80px" style = "border: 1px black solid;">ユーザ</td>
					<td id = "dfd1" width = "10%"><div id = "arr0" class = "arrow0"></div></td>
					<td id = "dfd2" width = "15%" colspan = "2" style = "border: 1px black solid; border-radius: 50%;">仮会員登録</td>
					<td width = "10%"></td>
					<td id = "dfd6" width = "15%" colspan = "2" style = "border: 1px black solid; border-radius: 50%;">登録確認</td>
					<td id = "dfd7" width = "10%"><div id = "arr1" class = "arrow1"></div></td>
					<td id = "dfd8" width = "10%" style = "border: 1px black solid;">本登録メール送信</td>
				</tr>
				<tr>
					<td height = "80px"></td>
					<td></td>
					<td id = "dfd3" colspan = "2"><div id = "arr2" class = "arrow2"></div></td>
					<td></td>
					<td id = "dfd5" colspan = "2"><div id = "arr3" class = "arrow3"></div></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td height = "80px"></td>
					<td></td>
					<td id = "dfd4" colspan = "5" style = "border: 1px black solid;">データベース</td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<div id = "dfd_div" class = "hidden" style = "margin-top: 100px; margin-bottom: 50px">
			<table class = "normal_table">
				<tbody>
					<tr>
						<th id = "dfd_show0" style = "border: 1px black solid;" width = "70%"></th>
						<td width = "30%"></td>
					</tr>
					<tr>
						<td height = "20px"></td>
						<td></td>
					</tr>
					<tr>
						<td id = "dfd_show1" style = "border: 1px black dotted; height: 100px" colspan = "2"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class = "sec">
		<h4 id = "er_sec">E-R図</h4>
		<p>データの構造に着目して<strong>実体(エンティティ)</strong>と実体(エンティティ)間の<strong>関連(リレーションシップ)</strong>の2つの要素で表現します。</p>
		<p>実体間の<strong>数の対応関係(多重度/カーディナリティ)</strong>を表します。</p>
		<table class = "normal_table" style = "width: 600px;">
			<tbody>
				<tr>
					<td width = "40%" height = "50px"><select id = "er0">
						<option value = 0>選択してください</option>
						<option value = 1>1</option>
						<option value = 2>多</option></select></td>
					<td width = "20%">対</td>
					<td width = "40%" height = "50px"><select id = "er1">
						<option value = 0>選択してください</option>
						<option value = 1>1</option>
						<option value = 2>多</option></select></td>
				</tr>
				<tr>
					<td colspan = "3" height = "30px">
				</tr>
				<tr>
					<td height = "50px" style = "border: 1px black solid;">A</td>
					<td><div><div id = "arw" class></div></div></td>
					<td style = "border: 1px black solid;">B</td>
				</tr>
			</tbody>
		</table>
		<p id = "er_show" style = "font-size: 30px; font-weight: bold; margin-top: 30px;"></p>
		<p id = "er_show0"></p>
	</div>
	<div class = "sec">
		<h4>UML (統一モデリング言語)</h4>
		<p>ハードウェアが目に見えるモノに対してソフトウェア(プログラム・システム)って目に見えないんですよね、、、<br>目に見えないと当然管理もしにくいのでソフトウェアの内部構造を何かしらのルールで記述して「目に見える化」しようとしたのがUMLです。<br>ここではクラス図とユースケース図を学びます。</p>
	</div>
	<div class = "sec">
		<h4 id = "class_fig_sec">クラス図 (UML)</h4>
		<p>オブジェクト指向(データとメソッドをまとめる)ためのUMLです。オブジェクト指向ってホントに理解するのが難しいのでここでは<strong>「データとメソッドをまとめる手法」</strong>とだけ覚えてください。私が今勉強しているオブジェクト指向に関する本は一冊で900ページ以上あるんです、、、泣</p>
		<p>クラス図とは複数の対象に共通する性質を書き出していきます。(因数分解みたいな感じです)</p>
		<p>以下で簡単なjsプログラムを組んでみました。<br>このプログラムは予め某人間とコメントボックスとオノマトペ部分をテンプレートとして準備します。次に、名前・好きな言葉・好きな行動を取得してそれぞれに挿入しています。<br>名前・好きな言葉・好きな行動を取得してから棒人間を作って、コメントボックスを作って、、、としていたら大変ですよね。このプログラムでは名前が何であれ、好きな言葉が何であれ、好きな行動が何であれ、某人間とコメントボックスとオノマトペ部分は共通しているのでこれをテンプレートとすることで簡単にコーディングできました。<br>これがオブジェクト指向という考え方です。</p>
		<p><small>※正確にいうとこれは関数(メソッドだけをまとめたもの)であっていわゆるオブジェクト指向ではないのですがITパスポート試験では同一視してOK!です。</small></p>
		<table class = "normal_table" id = "class_table">
			<tbody>
				<tr>
					<td width = "30%" height = "50px">名前</td>
					<td width = "70%"><input type = "text" id = "name" maxlength = "3" autocomplete = "off" value = "わたし"></td>
				</tr>
				<tr>
					<td height = "50px">好きな言葉</td>
					<td><input type = "text" id = "word" maxlength = "20" autocomplete = "off" value = "あいらぶゆ～"></td>
				</tr>
				<tr>
					<td height = "50px">好きな行動</td>
					<td><select id = "action" style = "width: 100%;">
						<option value = -1>選択してください</option>
						<option value = 0>歌う</option>
						<option value = 1>叫ぶ</option>
						<option value = 2>寝る</option></select></td>
				</tr>
			</tbody>
		</table>
		<div style = "display: flex;">
			<div id = "bar_man_div">
				<div id = "head"><p id = "name_show" style = "font-size: 10px;"></p></div>
				<div id = "body"></div>
				<div id = "right_arm"></div>
				<div id = "left_arm"></div>
				<div id = "right_foot"></div>
				<div id = "left_foot"></div>
			</div>
			<div style = "display: flex; flex-direction: column;">
				<div class="balloon2-left">
		  			<p id = "word_show"></p>
				</div>
				<div style = "display: flex;">
					<div id = "action0" style = "width: 30px; font-size: 30px; margin-top: 30px;"></div>
					<div id = "action1" style = "width: 60px; font-size: 60px; margin-top: 15px;"></div>
					<div id = "action2" style = "width: 90px; font-size: 90px; margin-top: 0px;"></div>
				</div>
			</div>
		</div>
	</div>
	<div class = "sec">
		<h4 id = "use_case_sec">ユースケース図 (UML)</h4>
		<p>あるシステムについての<strong>「使い方」</strong>を表現します。</p>
		<img src = "./pics/usecase.png" width = "400px" style = "margin-left: 100px;">
	</div>
	<div class = "sec">
		<h4>クラウドコンピューティング</h4>
		<p>ASP(アプリケーションソフトウェアのレンタルサービス)が進化したバージョン。<br>NIST(米国標準技術局)によるとどのレベルまでレンタルするかどうかで<strong>SaaS・PaaS・IaaS</strong>の3つに分類される。</p>
		<p><small>※タップすると詳細が表示されます。</small></p>
		<ol class = "pyramid_cloud" style = "margin-top: 30px; margin-bottom: 30px;">
		    <li id = "saas">SaaS</li>
		    <li id = "paas">PaaS</li>
		    <li id = "iaas">IaaS</li>
		</ol>
		<div id = "all_cloud">
			<div class = "cloud_stage" id = "application">アプリケーション</div>
			<div class = "cloud_stage" id = "platform">OS/ミドルウェア(プラットフォーム)</div>
			<div class = "cloud_stage" id = "infrastructure">仮想マシン(インフラ)</div>
			<div id = "user" class = "hide">ユーザが用意</div>
			<div id = "vendor" class = "hide">クラウド事業者が用意</div>
		</div>
		<p id = "cloud_show"></p>
	</div>
	<div class = "sec">
		<h4>SOA</h4>
		<p><strong>SOA</strong>とは、、、</p>
		<p><strong>S</strong>ervice <strong>O</strong>riented <strong>A</strong>rchitechture の略で、業務システム全般を業務のプロセスごとに分解した「サービス」の集合とみなす考え方です。</p>
		<p>例) このmr-campusシステムをひとつのオンライン教育システムとして見るのではなく、「勉強科目管理サービス + 勉強予定管理サービス + etc...」としてみなします。</p>
	</div>
	<div class = "sec">
		<h4>システムインテグレーション (SI)</h4>
		<p>システムインテグレーションとは、、、<br>システムと企画・立案・構築・運用・保守までの全工程を一括して請け負い提供するサービスのことです。</p>
	</div>
	<div class = "sec">
		<h4>データ利活用に関する用語</h4>
		<p>ここでは、近年はビッグデータ等に関する用語を説明しますね♪</p>
		<table class = "normal_table" border = "1">
			<tbody>
				<tr>
					<th width = "30%">データマイニング</th>
					<td width = "70%">大量のデータの中から規則性・法則性を導き出すこと。</td>
				</tr>
				<tr>
					<th>ビッグデータ</th>
					<td>とにかく大量のデータのこと。</td>
				</tr>
				<tr>
					<th>DX (デジタルトランスフォーメーション)</th>
					<td>ITによって世界をよりよくしていくこと。</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>






<?php
show_footer("strategy-2-5", basename(__FILE__, ".php"), "strategy-3-7");
?>

