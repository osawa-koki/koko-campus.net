<?php

session_start();
session_regenerate_id(true);


require_once("common.php");
include_head("システム企画", "システム開発", "ストラテジ系", basename(__FILE__, ".php") .".css");
include "include.html";
including();


?>



<img class = "progress_img" src = "./pics/progress-30.png" alt = "進捗度画像">

</div>

<h1>ITパスポート試験</h1>

<div class = "all">
	<h2>システム企画(ストラテジ系)---(7/23)</h2>
	<div class = "sec">
		<h4>共通フレーム2013</h4>
		<p>共通フレーム2013とは、、、<br>IPA(ITパスポート試験の主催法人ですね♪)が発行しているシステム開発における共通の枠組みを表したものです。</p>
		<p>IPAの共通フレーム2013の書籍ページでは、"「ソフトウェア、システム、サービスに関係する人々が”同じ言葉を話す”ことができるよう、共通の枠組みである「共通フレーム2013」を作成しました。"との説明があります。<br>IPAの共通フレーム2013の書籍ページは<a href = "https://www.ipa.go.jp/sec/publish/tn12-006.html">こちら</a>。</p>
		<p>簡単に言えばシステム開発をする際のルールみたいなモノです。</p>
		<p>共通フレーム2013のシステム開発プロセスは以下の手順を踏みます。</p>
		<table id = "common_frame" style = "width: 650px;">
			<caption>共通フレーム2013のシステム開発プロセスの手順</caption>
			<tbody>
				<tr>
					<th id = "common_frame0" width = "40%" height = "60px" colspan = "2" class = "this_sec">企画プロセス</th>
					<td width = "20%" height = "160px" rowspan = "3" style = "background-color: skyblue; padding: 0; text-align: center;" class = "circle"><span class = "vertical">今回学習します♪</span></td>
				</tr>
				<tr>
					<td height = "40px" colspan = "2" class = "arrow">&darr;</td>
				</tr>
				<tr>
					<th id = "common_frame1" height = "60px" colspan = "2" class = "this_sec">要件定義プロセス</th>
				</tr>
				<tr>
					<td height = "40px" colspan = "2" class = "arrow">&darr;</td>
					<td></td>
				</tr>
				<tr>
					<th width = "40%" height = "60px">システム開発プロセス</th>
					<th width = "40%" height = "60px">ソフトウェア実装プロセス</th>
					<td width = "20%" height = "260px" rowspan = "5" style = "background-color: lightgrey; padding: 0; text-align: center;" class = "circle"><span class = "vertical">次回以降学習します</span></td>
				</tr>
				<tr>
					<td height = "40px" colspan = "2" class = "arrow">&darr;</td>
				</tr>
				<tr>
					<th height = "60px" colspan = "2">運用プロセス</th>
				</tr>
				<tr>
					<td height = "40px" class = "arrow">&darr;</td>
					<td height = "40px" class = "arrow">&uarr;</td>
				</tr>
				<tr>
					<th height = "60px" colspan = "2">保守プロセス</th>
				</tr>
			</tbody>
		</table>
	</div>
	<div class = "sec">
		<h4 id = "process0">企画プロセス</h4>
		<p>経営の目的を鑑みて、<strong>何を作るか</strong>を決めます。</p>
		<p>この段階ではシステムに求められる事項を明確にして、さらにこのシステムを開発するための計画を策定します。</p>
		<p>システムに求められる事項を明確にするプロセスを<strong>システム化構想の立案</strong>、システムを開発するための計画を策定するプロセスを<strong>システム化計画の立案</strong>とさらに分解して考えます。</p>
		<table class = "normal_table">
			<tbody>
				<tr>
					<th width = "250px"><span style = "background-color: lightgreen; padding: 10px; border-radius: 15px; white-space: nowrap;">システム化構想の立案</span></th>
					<td style = "text-align: left; margin-left: 15px;"><div class = "balloon1-left"><p style = "font-size: 22px;">どんなシステムを作るか考えます。</p></div></td>
				</tr>
				<tr>
					<th width = "250px"><span style = "background-color: skyblue; padding: 10px; border-radius: 15px; white-space: nowrap;">システム化計画の立案</span></th>
					<td style = "text-align: left; margin-left: 15px;"><div class = "balloon2-left"><p style = "font-size: 22px;">前段階で立案されたシステム化構想を実現するための具体的な計画を立てます。</p></div></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class = "sec">
		<h4 id = "process1">要件定義プロセス</h4>
		<p>要件定義プロセスとは、、、<br>「定義された環境において、利用者及び他の利用者が必要とするサービスを提供できるシステムに対する要件を定義すること」 by共通フレーム2013</p>
		<p>具体的な手順としては<strong>1.利害関係者の識別</strong>と<strong>2.利害関係者要件の識別と定義</strong>に分けられます。</p>
		<p>2の利害関係者を識別した後の要件の定義では<strong>機能要件</strong>と<strong>非機能要件</strong>の2つを定義します。</p>
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
		<h4>調達</h4>
		<p>システムってそのものに形がなくて2者間でのイメージに乖離が生じやすいので、ファストフード店で「ハンバーガー1つ下さい♪」、「ハイヨッ!!」って感じではシステム開発を委託できないんです、、、</p>
		<p>そこで、ここではシステム開発を委託・受託する際の委託側と受託側の間のやり取りを説明しますね♪</p>
		<div class="line-bc"><!--①LINE会話全体を囲う-->

		  	<!--③右コメント始-->
		  	<div class = "mycomment">
		    	<p>
		    		<span class = "strong_bigger">RFI (情報提供依頼書)</span><br>IT企業のみなさん!<br>私、今アダプティブラーニングに対応したオンライン教育を実行するシステムを作ってくれる企業を探しています。<br>皆さんならどんな感じのシステムを作ってくれますか???
		    	</p>
		  	</div>
		  	<!--/③右コメント終-->
		  
		  	<!--②左コメント始-->
		  	<div class = "balloon6">
		    	<div class = "faceicon">
		      		<img src = "./pics/msg-line0.png" alt = "ベンダ0">
		    	</div>
		    	<div class = "chatting">
		      		<div class = "says">
		        		<p>
		        			ボクは、xxxxxxxxxxな感じのができるオン♪
		        		</p>
		      		</div>
		    	</div>
		  	</div>
		  	<!--②/左コメント終-->

		  	<!--②左コメント始-->
		  	<div class = "balloon6">
		    	<div class = "faceicon">
		      		<img src = "./pics/msg-line1.png" alt = "ベンダ1">
		    	</div>
		    	<div class = "chatting">
		      		<div class = "says">
		        		<p>
		        			私は、yyyyyyyyyyな感じのができるッピ♪
		        		</p>
		      		</div>
		    	</div>
		  	</div>
		  	<!--②/左コメント終-->

		  	<!--②左コメント始-->
		  	<div class = "balloon6">
		    	<div class = "faceicon">
		      		<img src = "./pics/msg-line2.png" alt = "ベンダ2">
		    	</div>
		    	<div class = "chatting">
		      		<div class = "says">
		        		<p>
		        			アタシは、zzzzzzzzzzな感じのができるギョ♪
		        		</p>
		      		</div>
		    	</div>
		  	</div>
		  	<!--②/左コメント終-->

		  	<div class="balloon4">
  				<p>トリちゃんのyyyなシステムが良さそう♥</p>
			</div>

		  	<!--③右コメント始-->
		  	<div class = "mycomment">
		    	<p>
		    		<span class = "strong_bigger">RFP (提案依頼書)</span><br>トリちゃんさん!!!<br>是非、アダプティブラーニングに対応したオンライン教育を実行するシステムを作ってくれませんか???<br>このシステムに必要な機能はoooooooooで、私たちが今使っているPC(pppppppppp)・ネットワーク環境(qqqqqqqqqq)で問題なく動作するようにしてほしいです。納期はyyyy/mm/ddで、etc...
		    	</p>
		  	</div>
		  	<!--/③右コメント終-->

		  	<!--②左コメント始-->
		  	<div class = "balloon6">
		    	<div class = "faceicon">
		      		<img src = "./pics/msg-line1.png" alt = "ベンダ1">
		    	</div>
		    	<div class = "chatting">
		      		<div class = "says">
		        		<p>
		        			<span class = "strong_bigger">提案書</span><br>任せてッピ♪<br>このシステムを作るのに必要な費用な〇〇〇円で、yyyy/mm/dd日までには完成するッピ♪詳細はこんな感じですッピ<br>↓↓↓↓↓<br>xxxxxxxxxxyyyyyyyyyyzzzzzzzzzz</p>
		        		</p>
		      		</div>
		    	</div>
		  	</div>
		  	<!--②/左コメント終-->

		</div><!--/①LINE会話終了-->
		<p>こんな感じです♪</p>
	</div>
</div>



<?php
show_footer("strategy-3-6", basename(__FILE__, ".php"), "management-4-8");
?>


