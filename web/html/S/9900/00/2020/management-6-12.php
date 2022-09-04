<?php

session_start();
session_regenerate_id(true);


require_once("common.php");
include_head("システム監査", "サービスマネジメント", "マネジメント系", basename(__FILE__, ".php") .".css");
include "include.html";
including();


?>




<img class = "progress_img" src = "./pics/progress-50.png" alt = "進捗度画像">

</div>

<h1>ITパスポート試験</h1>

<div class = "all">
	<h2>システム監査(マネジメント系)---(12/23)</h2>
	<p>ITパスポート試験範囲も折り返し地点に来ましたね♪お疲れ様です。この調子でどんどん行きましょう♪</p>
	<div class = "sec">
		<h4>システム監査の概要</h4>
		<p><strong>監査</strong>とは、、、<br><br><br>ある人・企業がちゃんとやっているかチェックすることです。<br>ここでは、システム監査として企業がITを正しく使用しているかどうかチェックします!!</p>
		<p>監査では監査人が企業の活動について、「良いところは良いと、悪いところは悪いと」言わなければなりません。<br>ですけど、もし仮に監査人が監査される人ととても仲が良かったり、弱みを握られていたらどうなりますか?<br>「悪いところを悪いと」いうことができませんよね、、、<br>これだと監査の意味を為しません、、、<br>そこで、監査人には<strong>独立性</strong>というものが求められています。<br>以下では監査人がどのような独立性を維持するべきかについて説明しますね♪</p>
		<table class = "normal_table" border = "1">
			<tbody>
				<tr>
					<th width = "150px">外見上の独立性</th>
					<td>監査人は監査される人と身分上密接な利害関係を有してはいけません。</td>
				</tr>
				<tr>
					<th>精神上の独立性</th>
					<td>偏見・先入観を排除して<strong>公平かつ客観的に</strong>監査をしなければなりません。</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class = "sec">
		<h4>内部統制</h4>
		<p>企業内部において不正行為が行われないように適切な基準・手続き等を制定して企業活動を管理しようとする考え方を指します。</p>
		<p>以下では内部統制の4つの目的と6つの基本的要素を理解しましょう♪</p>
		<table class = "normal_table" border = "1">
			<caption><span style = "padding: 0 10px; background-color: yellow;">内部統制の4つの目的</span></caption>
			<tbody>
				<tr>
					<th width = "120px">業務の有効性及び効率性</th>
					<td>企業をちゃんと統制して良い経営をすることですね♪</td>
				</tr>
				<tr>
					<th>財務報告の信頼性</th>
					<td>財務報告は日々の取引の記録の積み重ねで成立しています。<br>財務報告が正しくあるために、企業内部の統制は必要府不可欠です。</td>
				</tr>
				<tr>
					<th>事業活動に関わる法令等の遵守</th>
					<td>当然ですけど、不法行為ダメ絶対です。<br>企業で不法行為が行われないようにするためには内部統制を適切に実施する必要があります。</td>
				</tr>
				<tr>
					<th>資産の保全</th>
					<td><span style = "text-decoration: underline;">Q.会社の資産って誰のモノですか?</span><br><span style = "text-decoration: underline;">A.株主のモノです。</span><br>株主から預かった資産を適切に管理するために内部統制は役立ちます。</td>
				</tr>
			</tbody>
		</table>
		<div style = "margin: 25px 0;"></div>
		<table class = "normal_table" border = "1">
			<caption><span style = "padding: 0 10px; background-color: lightgreen;">内部統制の6つの基本的要素</span></caption>
			<tbody>
				<tr>
					<th width = "120px">統制環境</th>
					<td>悪いことをしないという<strong>環境・企業風土</strong>のことです。</td>
				</tr>
				<tr>
					<th>リスクの評価と対応</th>
					<td>リスクをしっかりと把握してそれに対応します。</td>
				</tr>
				<tr>
					<th>統制活動</th>
					<td>特定の人・部署に大きな権限を与えすぎず、各人・各部署間で互いに監視しあうようにします。</td>
				</tr>
				<tr>
					<th>情報と伝達</th>
					<td>情報を適切に公開・伝達していきます。</td>
				</tr>
				<tr>
					<th>モニタリング</th>
					<td>内部統制が適切に機能しているかどうか、継続的にチェックします。</td>
				</tr>
				<tr>
					<th>ITへの対応</th>
					<td>情報システムの利用に際して、適切なセキュリティ対策措置を講じます。</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>



<?php
show_footer("management-6-11", basename(__FILE__, ".php"), "technology-7-13");
?>

