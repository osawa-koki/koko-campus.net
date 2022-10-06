<?php

session_start();
session_regenerate_id(true);


require_once("common.php");
include_head("サービスマネジメント", "サービスマネジメント", "マネジメント系", basename(__FILE__, ".php") .".css");
include "include.html";
including();


?>




<img class = "progress_img" src = "./pics/progress-45.png" alt = "進捗度画像">

</div>

<h1>ITパスポート試験</h1>

<div class = "all">
	<h2>サービスマネジメント(マネジメント系)---(11/23)</h2>
	<div class = "sec">
		<h4>ITIL</h4>
		<p><strong>ITIL</strong>とは、、、</p>
		<p><span style = "text-decoration: underline";>ITサービスマネジメントにおけるベストプラクティス(成功事例)をまとめた文書</span>のことです。</p>
		<p>簡単に言えば、何が良いITサービスであるかをまとめた文書ですね♪</p>
		<p>何回も説明しましたけど、ITILでもやはり<strong>PDCAサイクル</strong>を回すことの大切が説明されています。</p>
	</div>
	<div class = "sec">
		<h4>CMDS (Configration Management DtaBase)</h4>
		<p>みなさん、Excelのバージョンは最新版ですか? セキュリティソフトのアップデートは済んでいますか? PCの保証期限は切れていませんか? .....<br><br><br>ITサービスってシステムひとつで完結するものではなく、いくつもの部品が組み合わさっているんです!!<br>ですけど、その構成要素をひとつひとつ管理していたら大変ですよね、、、<br>そこでこれらの構成要素(ハードウェア・ソフトウェア)を一元的に管理しようとする考え方が<strong>構成管理</strong>で、構成管理に関する情報をまとめるデータベースが<strong>CMDB(構成管理データベース)</strong>です。</p>
	</div>
	<div class = "sec">
		<h4>ITサービスの品質管理・向上手法</h4>
		<p>ここではITサービスを提供するにあたって、有効となる手法・用語について説明しますね♪</p>
		<table class = "normal_table" border = "1">
			<tbody>
				<tr>
					<th width = "150px">サービスデスク</th>
					<td>インデント(サービス品質を低下させる事象/トラブル・障害)に関する問い合わせを対応するための一元化された窓口。</td>
				</tr>
				<tr>
					<th>インデント管理</th>
					<td>インデントの発生を受けて実行する、インデントの影響を抑えるための<strong>応急処置</strong>。</td>
				</tr>
				<tr>
					<th>問題管理</th>
					<td>インデントの発生を受けて実行する、<strong>インデントの根本原因を排除</strong>する行為。</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class = "sec">
		<h4>SLA (Service Level Agreement)</h4>
		<p>ITサービスを提供する側と受ける側との間で予めサービスのレベルについて定めて、その罰則等について合意契約を結んでおくという考え方です。<br>ITサービスって目に見えないものですから契約時はその内容について<strong>明確にかつ定量的に(数値で)</strong>表しておかないと、後々トラブルに発展してしまうのです、、、</p>
		<h4 class = "sub_sec">SLM (Service Level Management)</h4>
		<p>SLAで合意されたサービスレベルについて、それを維持管理しようとする考え方。</p>
	</div>
</div>




<?php
show_footer("management-5-10", basename(__FILE__, ".php"), "management-6-12");
?>

