<?php

session_start();
session_regenerate_id(true);


require_once("common.php");
include_head("法務", "企業と法務", "ストラテジ系", "strategy-1-2.css");
include "include.html";
including();


?>

<img class = "progress_img" src = "./pics/progress-5.png" alt = "進捗度画像">

</div>

<h1>ITパスポート試験</h1>

<div class = "all">
	<h2>法務(ストラテジ系)---(2/23)</h2>
	<div class = "sec">
		<h4>知的財産権</h4>
		<p>知的財産権とは、、、<br>ひとことで言えば、形のないモノに対する所有権です♪</p>
		<p>知的財産権は大きく<strong>著作権</strong>と<strong>産業財産権</strong>に分けられ、さらに産業財産権は<strong>特許権</strong>・<strong>実用新案権</strong>・<strong>意匠権</strong>・<strong>商標権</strong>に分けられます。</p>
		<p>なんだかとっても難しいですね、、、泣<br>下にまとめてみたので頑張って覚えましょう♪</p>
		<div class = "right_table0">
		<h4 class = "hide_show">&lt;&lt;&lt;産業財産権&gt;&gt;&gt;</h4>
		<div class = "hidden">
			<div class = "right_table1" id = "copyright">
				<h5 class = "right_table1 hide_show">著作権</h5>
				<div class = "hidden">
					<h5 class = "right_table2"><a href = "#copyright_sec">著作権</a></h5>
				</div>
			</div>
			<div class = "right_table1" id = "industry_property_rights">
				<h5 class = "right_table1 hide_show">産業財産権</h5>
				<div class = "hidden">
					<h5 class = "right_table2"><a href = "#patent_right_sec">特許権</a></h5>
					<h5 class = "right_table2"><a href = "#utility_model_right_sec">実用新案権</a></h5>
					<h5 class = "right_table2"><a href = "#design_right_sec">意匠権</a></h5>
					<h5 class = "right_table2"><a href = "#trademark_sec">商標権</a></h5>
				</div>
			</div>
		</div>
		</div>
	</div>
	<div class = "sec">
		<h4 id = "copyright_sec">著作権</h4>
		<p>著作権とは文化的な創造物(著作物)に対して発生する、その作者(著作者)が有する権利のこと。</p>
		<p>以下の著作権の特徴4つを覚えましょう♪</p>
		<ul>
			<li>申請不要で、著作物が創作された瞬間に自然に権利が発生</li>
			<li>著作権の保護期間は個人の場合は死後70年間、法人・団体の場合は公表後70年間</li>
			<li>理論・アイデアそのものは著作権対象にはならない(論文・書籍化する必要あり)</li>
			<li>異なる2人が同じような著作物を創作したら、両方に著作権が発生</li>
		</ul>
		<h4 class = "sub_sec">ITに関連する著作権</h4>
		<p>ITパスポート試験ですのでIT(ソフトウェア)に関連する著作権についておさえましょう♪</p>
		<p>ここでは著作権の保護対象となるもの、保護対象とならないものについて勉強します。</p>
		<table class = "normal_table" border = 1 style = "text-align: left;">
			<caption>ソフトウェアの著作権</caption>
			<tbody>
				<tr>
					<th><strong>保護される</strong></th>
					<td>
						<ul>
							<li>プログラム</li>
							<li>データベース</li>
							<li>マニュアル</li>
						</ul>
					</td>
				</tr>
				<tr>
					<th><strong>保護されない</strong></th>
					<td>
						<ul>
							<li>プログラミング言語</li>
							<li>プロトコル</li>
							<li>アルゴリズム</li>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
		<h4 class = "sub_sec">著作権の帰属</h4>
		<p>簡単な問題です。</p>
		<p>・企業Aが企業BにソフトウェアXの開発を委託しました。ソフトウェアX著作権は企業Aか企業Bのどちらに帰属するでしょうか?<br>・kokoは「株式会社IT's」でソフトウェアYを創作しました。ソフトウェアYの著作権はkokoか「株式会社IT's」のどちらに帰属するでしょうか?</p>
		<p>なんだか、かなり複雑ですね、、、(´;ω;｀)<br>以下の表にまとめたのでここで覚えちゃいましょう♪</p>
		<table class = "normal_table" border = 1>
			<caption>ソフトウェア著作権の帰属</caption>
			<tbody>
				<tr>
					<th>複数の個人で開発</th>
					<td>原則として、<strong>全員</strong>が著作権を有する。</td>
				</tr>
				<tr>
					<th>法人で働く個人が開発</th>
					<td>原則として、<strong>法人</strong>が著作権を有する。<br>これを<strong>法人著作</strong>という。</td>
				</tr>
				<tr>
					<th>委託して開発</th>
					<td>原則的には、<strong>委託先</strong>が著作権を有する。</td>
				</tr>
				<tr>
					<th>派遣して開発</th>
					<td>原則として<strong>派遣先</strong>が著作権を有する。</td>
				</tr>
			</tbody>
		</table>
		<div class = "table_note"><small>※予め契約を結んでいれば著作権の帰属はその契約内容に従う。<br>※ソフトウェアについてはバックアップのためのコピーはOK!(著作権法違反とならない)</div>
		<p>ソフトウェアの著作権の帰属は理解できましたか?</p>
		<p>先ほどの問題の解答は1問目は企業B(委託先)、2問目は株式会社IT'sが正解です。</p></small>
		</div>
	</div>
	<div class = "sec">
		<h4>産業財産権</h4>
		<p>産業財産権ってなんでしたっけ???<br>覚えていますか?</p>
		<p>産業財産権とは、<strong>知的財産権</strong>のひとつで<strong>特許権</strong>・<strong>実用新案権</strong>・<strong>意匠権</strong>・<strong>商標権</strong>のことです♪</p>
		<p>具体的な意義とは、<strong>産業の発展</strong>のために保護されるように設定された権利です。</p>
		<h4 class = "sub_sec" id = "patent_right_sec">特許権</h4>
		<p>特許権は産業財産権として保護される創作物に対する権利のうち、かなり高度なもの(<strong>発明</strong>)に対して設定されます。</p>
		<h4 class = "sub_sec" id = "utility_model_right_sec">実用新案権</h4>
		<p>実用新案権は産業財産権として保護される創作物に対する権利のうち、発明ほど高度でないもの(<strong>考案</strong>)に対して設定されます。</p>
		<h4 class = "sub_sec" id = "design_right_sec">意匠権</h4>
		<p>意匠権は産業財産権として保護される創作物に対する権利のうち、デザイン・形・模様などに対して設定される権利です。</p>
		<h4 class = "sub_sec" id = "trademark_sec">商標権</h4>
		<p>商標権は産業財産権として保護される創作物に対する権利のうち、商品に使用される文字(いわゆる<strong>トレードマーク</strong>)に対して設定されます。</p>
		<h4 class = "sub_sec">産業財産権まとめ</h4>
		<table class = "normal_table" border = 1>
			<caption>産業財産権の内容</caption>
			<tbody>
				<tr>
					<th>特許権</th>
					<td><strong>発明</strong>(かなり高度なもの)</td>
				</tr>
				<tr>
					<th>実用新案権</th>
					<td><strong>考案</strong>(そこまで高度でないもの)</td>
				</tr>
				<tr>
					<th>意匠権</th>
					<td>デザイン・形・模様etc...</td>
				</tr>
				<tr>
					<th>商標権</th>
					<td>商品に使用される文字(<strong>トレードマーク</strong>)</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class = "sec">
		<h4>不正競争防止法</h4>
		<p>不正競争防止法とは、企業の活動にとって大切な秘密の情報を守り不正な競争を禁止する法律です。</p>
		<p>この法律は、企業の活動にとって大切な秘密の情報を<strong>営業秘密(トレードシークレット)</strong>として保護します。<br>営業秘密(トレードシークレット)として認定されるには以下の3つの要件を満たす必要があります。</p>
		<ul>
			<li>秘密として管理されており、</li>
			<li>事業活動に有益な情報で、</li>
			<li>公然と知られていないもの。</li>
		</ul>
	</div>
	<div class = "sec">
		<h4>諸法令</h4>
		<p>ITパスポート試験では法律などに関する知識も求められます。内容としては労働に関する法律(労働基準法)・雇用に関する法令(労働派遣法・請負契約・委任契約)・セキュリティ関連法規(個人情報保護法・不正アクセス禁止法)を勉強します。</p>
		<div class = "law_table0">
		<h4 class = "hide_show">&lt;&lt;&lt;ITパスポート試験で学ぶ諸法令&gt;&gt;&gt;</h4>
			<div class = "hidden">
				<div class = "law_table1" id = "about_labor">
					<h5 class = "law_table1 hide_show">労働に関する法律</h5>
					<div class = "hidden">
						<h5 class = "law_table2"><a href = "#labor_standards_acts">労働基準法</a></h5>
					</div>
				</div>
				<div class = "law_table1" id = "about_labor_contract">
					<h5 class = "law_table1 hide_show">雇用に関する法令</h5>
					<div class = "hidden">
						<h5 class = "law_table2"><a href = "#dispatch">労働派遣法</a></h5>
						<h5 class = "law_table2"><a href = "#contract">請負契約</a></h5>
						<h5 class = "law_table2"><a href = "#delegation_contract">委任契約</a></h5>
					</div>
				</div>
				<div class = "law_table1" id = "security_related_law">
					<h5 class = "law_table1 hide_show">セキュリティ関連法規</h5>
					<div class = "hidden">
						<h5 class = "law_table2"><a href = "#pipl">個人情報保護法</a></h5>
						<h5 class = "law_table2"><a href = "#uapl">不正アクセス禁止法</a></h5>
					</div>
				</div>
				<div class = "law_table1" id = "other_law">
					<h5 class = "law_table1 hide_show">その他経営に関する法規</h5>
					<div class = "hidden">
						<h5 class = "law_table2"><a href = "#pl_act">PL法</a></h5>
						<h5 class = "law_table2"><a href = "#mailing_act">特定電子メール法</a></h5>
					</div>
				</div>
			</div>
		</div>		
	</div>
	<div class = "sec">
		<h4 id = "labor_standards_acts">労働基準法(労働に関する法律)</h4>
		<p>労働者が雇用者を労働させるにあたって守るべきルールです。</p>
		<p>労働基準法では以下の内容が含まれています。</p>
		<ul>
			<li>労働時間は1週間で40時間、1日8時間。</li>
			<li>1日の労働時間が8時間を超える場合は1時間以上の休憩を与える。</li>
			<li>時間外の残業や休日出勤をさせる場合は労使協定を結ぶ必要あり。</li>
		</ul>
	</div>
	<div class = "sec">
		<h4>雇用に関する法令</h4>
		<p>雇用に関する法令に関しては「労働派遣法」と「請負契約」と「委任契約」の3つをおさえましょう♪</p>
		<h4 class = "sub_sec" id = "dispatch">労働派遣法</h4>
		<p>労働者の派遣とは「<strong>自分が雇用する労働者</strong>を、<strong>他人の指揮命令</strong>を受けて、その他人のために働かせる契約」のこと。</p>
		<img src = "./pics/dispatch.png" class = "law_img" alt = "派遣契約の画像">
		<h4 class = "sub_sec" id = "contract">請負契約</h4>
		<p>請負契約とは、請負業者が雇用している労働者を指揮しながら<strong>業務の完成</strong>を実行する契約。</p>
		<p>注文主が請負業者に<strong>仕事の完成</strong>を任せるだけで、注文主が請負業者の労働者に直接命令することはできない。<br><small>※注文主が請負業者の労働者に直接命令すると仮装請負となる。</small></p>
		<img src = "./pics/contract.png" class = "law_img" alt = "請負契約の画像">
		<h4 class = "sub_sec" id = "delegation_contract">委任契約</h4>
		<p>委任契約とは、委託企業が受託企業に一定の行為をすることを要求する契約。</p>
		<p>請負契約との違いは受託企業は<strong>ベストを尽くす</strong>だけでよく、<strong>業務の完成は必ずしも求められない。</strong></p>
		<p>お医者さんと患者さんが結ぶのが委任契約です。お医者さんとしては病気を絶対に治す契約なんて結べませんからね、、、<br><small>※正確には準委任契約とされます。</small></p>
	</div>
	<div class = "sec">
		<h4>セキュリティ関連法規</h4>
		<p>セキュリティに関する知識持っていますか?<br>皆さんが企業に勤めて顧客の情報を取り扱うようになったら絶対に求められる知識です。<br>ぜひここで、しっかり理解しましょう♪</p>
		<h4 class = "sub_sec" id = "pipl">個人情報保護法</h4>
		<p>個人情報とは個人に関する情報で、個人情報を取り扱う事業者は以下の事項を遵守する義務を帯びています。</p>
		<ul>
			<li>個人情報の利用目的を開示</li>
			<li>利用目的を超えた個人情報の利用は禁止</li>
			<li>本人の許可なくして第三者に個人情報の提供禁止</li>
		</ul>
		<p><small>このwebサイトのトップページで「このwebサイトでは個人情報はメールアドレスのみ取得し、・・・」と書いてありますが(<a href = "https://mr-campus.com">トップ</a>)、厳密にいえばメールアドレスは個人情報(個人に関する情報)とはみなされないため、個人情報に該当しないとされます。</small></p>
		<h4 class = "sub_sec" id = "uapl">不正アクセス禁止法</h4>
		<p><strong>「不正アクセス行為」</strong>と<strong>「不正アクセスを助長する行為」</strong>を禁止します。</p>
		<p>不正アクセス行為と不正アクセスを序要する行為とは以下の通りです。</p>
		<table class = "normal_table" border = 1>
			<caption>不正アクセス行為・不正アクセスを助長する行為</caption>
			<tbody>
				<tr>
					<th>不正アクセス行為</th>
					<td>アクセス制御機能をもつシステムに対し、アクセス権を持たないものがネットワーク経由で不正にシステムを動作させてシステムに侵入すること。</td>
				</tr>
				<tr>
					<th>不正アクセスを助長する行為</th>
					<td>他人のパスワード等を正当な利用者以外の人間に無断で提供する行為等</td>
				</tr>
			</tbody>
		</table>
		<p>不正アクセス禁止法では不正アクセス禁止行為だけでなく、不正アクセスを助長する行為も禁止していることを覚えてくださいね♪</p>
	</div>
	<div class = "sec">
		<h4>その他経営に関する法規</h4>
		<p>ここでは、経営に関して企業が意識すべき法令について学びます。</p>
		<h4 class = "sub_sec" id = "pl_act">PL法(製造物責任法)</h4>
		<p>企業が製品の欠陥によって、消費者に損害を与えた場合は原則として企業が消費者に対して損害賠償責任を帯びることを規定。<br>ソフトウェアの欠陥によりハードウェアが故障した場合は、ソフトウェアの作成企業はハードウェアの故障に関して賠償責任を負う。</p>
		<h4 class = "sub_sec" id = "mailing_act">特定電子メール法</h4>
		<p>不特定多数に対して広告メールを送信することを禁止する法律。<br>広告メールを送信する場合には、事前に許可を得てかつ広告メール送信者の名称を表示しなければならない。</p>
	</div>
	<div class = "sec">
		<h4>標準化</h4>
		<p>標準化って何か知っていますか?<br>IT・工業製品がそれぞれのメーカーが同時の規格で作られていたら大変ですよね、、、<br>例えば、この冷蔵庫のコンセントのタイプはAでこの冷蔵庫のタイプはBと、、、</p>
		<p>そこで、工業製品・IT製品の規格を統一しよう♪ってのが標準化です!!!</p>
		<p>この標準規格を設定する団体(標準化機構)をいくつか覚えましょう♪</p>
		<table class = "normal_table" border = 1>
			<caption>標準化機構</caption>
			<tbody>
				<tr>
					<th>ISO <small>(国際標準化機構)</small></th>
					<td>IT・電気分野<strong>以外</strong></td>
				</tr>
				<tr>
					<th>IEC <small>(国際電気標準化機構)</small></th>
					<td>電気分野全般の標準化</td>
				</tr>
				<tr>
					<th>IEEE <small>(電気電子学会)</small></th>
					<td><strong>電子機器</strong>の標準化</td>
				</tr>
				<tr>
					<th>JISC <small>(日本工業標準調査会)</small></th>
					<td>JIS(日本工業規格)の制定・改正</td>
				</tr>
				<tr>
					<th>W3C <small>(WWWコンソーシアム)</small></th>
					<td>インターネット関連の標準化</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>


<?php
show_footer("strategy-1-1", "strategy-1-2", "strategy-2-3");
?>

