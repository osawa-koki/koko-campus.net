<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-25",
	"updated" => "2022-03-25"
);
head($obj);
?>
<h2>共通フレーム2013</h2>
共通フレーム2013とは、IPAが発行しているシステム開発における共通の枠組みを表したものです。<br /><br />IPAの共通フレーム2013の書籍ページでは、「ソフトウェア、システム、サービスに関係する人々が”同じ言葉を話す”ことができるよう、共通の枠組みである「共通フレーム2013」を作成しました。」との説明があります。
<p>IPAの共通フレーム2013の書籍ページは<a href="https://www.ipa.go.jp/sec/publish/tn12-006.html">こちら</a>。</p>
簡単に言えばシステム開発をする際のルールみたいなモノです。<br /><br />共通フレーム2013のシステム開発プロセスは以下の手順を踏みます。
<table id="cf-table" class="x" cellspacing="3">
	<caption>共通フレーム2013のシステム開発プロセスの手順</caption>
	<tbody>
		<tr>
			<th width="40%" height="60px" colspan="2">企画プロセス</th>
			<td width="20%" height="160px" rowspan="3" class="v-writing">今回学習します♪</td>
		</tr>
		<tr>
			<th height="40px" colspan="2">&darr;</th>
		</tr>
		<tr>
			<th height="60px" colspan="2">要件定義プロセス</th>
		</tr>
		<tr>
			<th height="40px" colspan="2">&darr;</th>
			<td></td>
		</tr>
		<tr>
			<th width="40%" height="60px">システム開発プロセス</th>
			<th width="40%" height="60px">ソフトウェア実装プロセス</th>
			<td width="20%" height="260px" rowspan="5" class="v-writing">次回以降学習します</td>
		</tr>
		<tr>
			<th height="40px" colspan="2">&darr;</th>
		</tr>
		<tr>
			<th height="60px" colspan="2">運用プロセス</th>
		</tr>
		<tr>
			<th height="40px">&darr;</th>
			<th height="40px">&uarr;</th>
		</tr>
		<tr>
			<th height="60px" colspan="2">保守プロセス</th>
		</tr>
	</tbody>
</table>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const c = Array.from(document.getElementById("cf-table").getElementsByClassName("v-writing"));
		c.forEach((e, i) => {
			e.style.backgroundColor = `hsla(${360 * i / c.length}, 100%, 50%, 0.3)`;
		});
	})();
</script>
<h2>企画プロセス</h2>
経営の目的を鑑みて、<strong>何を作るか</strong>を決めます。<br /><br />この段階ではシステムに求められる事項を明確にして、さらにこのシステムを開発するための計画を策定します。<br /><br />システムに求められる事項を明確にするプロセスを<strong>システム化構想の立案</strong>、システムを開発するための計画を策定するプロセスを<strong>システム化計画の立案</strong>とさらに分解して考えます。
<table>
	<thead>
		<tr>
			<th width="50%">システム化構想の立案</th>
			<th width="50%">システム化計画の立案</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>どんなシステムを作るか考えます。</td>
			<td>前段階で立案されたシステム化構想を実現するための具体的な計画を立てます。</td>
		</tr>
	</tbody>
</table>
<h2>要件定義プロセス</h2>
要件定義プロセスとは、定義された環境において、利用者及び他の利用者が必要とするサービスを提供できるシステムに対する要件を定義すること」と by共通フレーム2013では定義されています。<br /><br />具体的な手順としては<strong>1.利害関係者の識別</strong>と<strong>2.利害関係者要件の識別と定義</strong>に分けられます。<br /><br />2の利害関係者を識別した後の要件の定義では<strong>機能要件</strong>と<strong>非機能要件</strong>の2つを定義します。
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
			<td>例) 勉強状況を取得して整理して出力する。</td>
			<th>例</th>
			<td>例) レイアウト・稼働率・使いやすさ</td>
		</tr>
	</tbody>
</table>
<h4>調達</h4>
システムってそのものに形がなくて2者間でのイメージに乖離が生じやすいので、ファストフード店で「ハンバーガー1つ下さい♪」、「ハイヨッ!!」って感じではシステム開発を委託できないんです、、、<br /><br />そこで、ここではシステム開発を委託・受託する際の委託側と受託側の間のやり取りを説明しますね♪
<div id="line-bc">
	<div class="mycomment">
		<span class="strong-bigger">RFI (情報提供依頼書)</span><br />IT企業のみなさん!<br />私、今アダプティブラーニングに対応したオンライン教育を実行するシステムを作ってくれる企業を探しています。<br />皆さんならどんな感じのシステムを作ってくれますか???	
	</div>
	<div class="left-comment">
		<div class="faceicon">
			<img src="./pics/msg-line0.png" alt="ベンダ0">
		</div>
		<div class="chatting">
			<div class="says">ボクは、xxxxxxxxxxな感じのができるオン♪</div>
		</div>
	</div>
	<div class="left-comment">
		<div class="faceicon">
			<img src="./pics/msg-line1.png" alt="ベンダ1">
		</div>
		<div class="chatting">
			<div class="says">私は、yyyyyyyyyyな感じのができるッピ♪</div>
		</div>
	</div>
	<div class="left-comment">
		<div class="faceicon">
			<img src="./pics/msg-line2.png" alt="ベンダ2">
		</div>
		<div class="chatting">
			<div class="says">アタシは、zzzzzzzzzzな感じのができるギョ♪</div>
		</div>
	</div>
	<div class="right-imagine">
		トリちゃんのyyyなシステムが良さそう♥
	</div>
	<div class="mycomment">
		<span class="strong-bigger">RFP (提案依頼書)</span><br />トリちゃんさん!!!<br />是非、アダプティブラーニングに対応したオンライン教育を実行するシステムを作ってくれませんか???<br />このシステムに必要な機能はoooooooooで、私たちが今使っているPC(pppppppppp)・ネットワーク環境(qqqqqqqqqq)で問題なく動作するようにしてほしいです。納期はyyyy/mm/ddで、etc...
	</div>
	<div class="left-comment">
		<div class="faceicon">
			<img src="./pics/msg-line1.png" alt="ベンダ1">
		</div>
		<div class="chatting">
			<div class="says">
				<span class="strong-bigger">提案書</span><br />任せてッピ♪<br />このシステムを作るのに必要な費用な〇〇〇円で、yyyy/mm/dd日までには完成するッピ♪詳細はこんな感じですッピ<br />↓↓↓↓↓<br />xxxxxxxxxxyyyyyyyyyyzzzzzzzzzz
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		Array.from(document.getElementById("line-bc").getElementsByTagName("img")).forEach(e => {
			e.classList.add("x");
		});
	})();
</script>
こんな感じです♪
<?php footer(); ?>