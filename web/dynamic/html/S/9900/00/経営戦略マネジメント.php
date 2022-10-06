<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-25",
	"updated" => "2022-03-25"
);
head($obj);
?>
<h2>経営戦略手法</h2>
戦略とは、「目標達成のための具体的な手段を立てること」を言います。<br />これは主に軍事で使用されるイメージアありますが、経営でも用いられます。<br />ライバルとの勝負という点では両者は同じですからね、、、<br /><br />ここでは、良く用いられる経営戦略手法を紹介します。
<table>
	<tbody>
		<tr>
			<th>SWOT分析</th>
			<td>「企業内部」「企業外部」と「プラス要因」「マイナス要因」の２つに分解して評価します。</td>
		</tr>
		<tr>
			<th>3C分析</th>
			<td>顧客(Customer)・競合(Competitor)・自社(Company)の3つの視点から評価する。</td>
		</tr>
		<tr>
			<th>PPM分析</th>
			<td>「市場成長率」と「市場占有率」の2つの指標から商品・製品を評価します。</td>
		</tr>
		<tr>
			<th>コスト・エリア分析(基本戦略)</th>
			<td>販売価格・販売対象層の2つの指標から企業を評価します。</td>
		</tr>
		<tr>
			<th>競争戦略</th>
			<td>企業のその業界での立ち位置から経営戦略を選択します。</td>
		</tr>
	</tbody>
</table>
<h3>SWOT分析</h3>
最初に経営に与える影響事項を「企業内部」「企業外部」に分け、次にその影響の是非から「プラス要因」「マイナス要因」の２つに分解して評価します。<br /><br />孫氏の兵法の言葉を借りるならば「彼を知り己を知れば百戦して殆うからず」ってとこですかね、、、<br />自分と相手両方知りましょう!ってことです。
<img src="../pics/swot.png" alt="SWOT分析" />
<h3>3C分析</h3>
ビジネス環境を分析するための手法です。<br />顧客(Customer)・競合(Competitor)・自社(Company)の3つの視点から評価します。
<table>
	<caption>3C分析</caption>
	<tbody>
		<tr>
			<th>顧客<br />(<strong>C</strong>ustomer)</th>
			<td>顧客の視点からニーズを分析。<br />例) IT資格だけでなく、統計学の資格取得も目指したい。</td>
		</tr>
		<tr>
			<th>競合<br />(<strong>C</strong>ompetitor)</th>
			<td>競争相手について分析。<br />例) webサイトABCはより視覚的で分かりやすい教育サービスを展開している。</td>
		</tr>
		<tr>
			<th>自社<br />(<strong>C</strong>ompany)</th>
			<td>自社の特徴を分析。<br />例) koko-campusは営利組織ではなく趣味で運営されているため、より柔軟なサービス提供が可能</td>
		</tr>
	</tbody>
</table>
<h3>PPM(プロダクトポートポリオマネジメント)</h3>
製品・商品を市場占有率と市場成長率の2つの視点からそれぞれ「高」「低」に分解して、4つのグループに分類してそれぞれで戦略を練ります。
<table>
	<caption>PPM</caption>
	<tbody>
		<tr>
			<th colspan="2" rowspan="2"></th>
			<th colspan="2">市場成長率</th>
		</tr>
		<tr>
			<th>低</th>
			<th>高</th>
		</tr>
		<tr>
			<th width="15%" height="300px" rowspan="2" class="v-writing">市場占有率</th>
			<th width="5%">高</th>
			<td width="40%" height="150px"><strong>問題児</strong><br />(現状は稼げないが、今後のために資金投入が必要)</td>
			<td width="40%"><strong>花形</strong><br />(現状稼いでいて、かつ今後もその稼ぎが伸びると予想されるためさらなる資金投入が必要)</td>
		</tr>
		<tr>
			<th>低</th>
			<td height="150px"><strong>負け犬</strong><br />(撤退すべき)</td>
			<td><strong>金のなる木</strong><br />(たくさん稼いでくれる♪)</td>
		</tr>
	</tbody>
</table>
<h3>コスト・エリア分析(基本戦略)</h3>
場所と価格からその戦略を決定します。
<table>
	<caption>コスト・エリア分析</caption>
	<tbody>
		<tr>
			<th colspan="2" rowspan="2"></th>
			<th colspan="2">なにで勝負するか</th>
		</tr>
		<tr>
			<th>コストで勝負(低価格路線)</th>
			<th>差別化して勝負</th>
		</tr>
		<tr>
			<th width="15%" height="300px" rowspan="2" class="v-writing">ターゲット</th>
			<th width="5%">広</th>
			<td width="40%" height="150px"><strong>コスト・リーダーシップ戦略</strong><br />(安い商品を大勢を対象に販売)</td>
			<td width="40%"><strong>差別化戦略</strong><br />(特徴的な商品を大勢を対象に販売)</td>
		</tr>
		<tr>
			<th>狭</th>
			<td height="150px"><strong>コスト集中化戦略</strong><br />(安く・ピンポイントで層を決めて販売)</td>
			<td><strong>差別化集中戦略</strong><br />(特徴的な商品をピンポイントで層を決めて販売)</td>
		</tr>
	</tbody>
</table>
<h3>競争戦略</h3>
自社の業界に置ける立ち位置から戦略を決定します。<br />以下の立ち位置ととるべき戦略をセットで覚えましょう♪
<table>
	<caption>競争戦略</caption>
	<thead>
		<tr>
			<th>競争地位</th>
			<th>特徴</th>
			<th>とるべき戦略</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>リーダ</th>
			<td>業界1番手</td>
			<td>全市場を対象にシェアを拡大させる。</td>
		</tr>
		<tr>
			<th>チャレンジャ</th>
			<td>リーダに次ぐレベル</td>
			<td>リーダに対抗してシェア奪回を図る。</td>
		</tr>
		<tr>
			<th>フォロワ</th>
			<td>影響力が弱い</td>
			<td>リーダの真似をして、残りのシェア獲得を目指す。</td>
		</tr>
		<tr>
			<th>ニッチャ</th>
			<td>ユニーク(専門的)</td>
			<td>リーダ・フォロワが参入しにくい特定市場のシェアの獲得を目指す。</td>
		</tr>
	</tbody>
</table>
<h4>その他の経営戦略のための考え方</h4>
ここでは、経営戦略のための考え方を学習します。<br />単語と意味をセットで覚えましょう♪
<table>
	<tbody>
		<tr>
			<th>ベンチ<br />マーキング</th>
			<td>見習うべき相手の事例を指標として比較し、改善を図る。</td>
		</tr>
		<tr>
			<th>コア<br />コンピタス</th>
			<td>他社では真似できない、自社の<strong>核</strong>(コア)となる強みのこと。</td>
		</tr>
	</tbody>
</table>
<h4>企業の統合と提携</h4>
企業が業界内でのシェア・影響力を拡大させる方法は大きく2つあります。<br />企業の統合と企業提携です。<br /><br />ここでは、企業の統合と企業提携の特徴について学びましょう。
<table>
	<tbody>
		<tr>
			<th>企業の統合<br />(吸収・合併/M&amp;A)</th>
			<td>買収後は自由な活動が可能である一方、買収には多額の資金が必要になり買収後は買収した企業のプロセスを自社に合わせるよう改革する必要がある。</td>
		</tr>
		<tr>
			<th>企業提携<br />(アライアンス)</th>
			<td>現状を大きく変える必要がないが、活動は相手企業に左右される。</td>
		</tr>
	</tbody>
</table>
<h2>マーケティング</h2>
近年は、「営業」から「マーケティング」へと重点が変化しています。<br />作ったものを売るのではなく、売れるものを作るという考え方です。<br /><br />ここでは、マーケティングの手法について学びます。
<div class="scroll-600w">
	<table>
		<caption>主なマーケティングの手法</caption>
		<tbody>
			<tr>
				<th>マス<br />マーケティング</th>
				<td>すべての消費者のニーズを同一のモノと仮定して、マーケティングを行います。</td>
			</tr>
			<tr>
				<th>ワントゥワン<br />マーケティング</th>
				<td>顧客ひとりひとりに合わせてマーケティングを行います。</td>
			</tr>
			<tr>
				<th>ダイレクト<br />マーケティング</th>
				<td>メーカが流通業者を経由せずに消費者に直接販売します。</td>
			</tr>
			<tr>
				<th>セグメント<br />マーケティング</th>
				<td>市場を細分化して。それぞれに応じたマーケティングを行います。</td>
			</tr>
		</tbody>
	</table>
</div>
<h3>マーケティングにおける考え方</h3>
経営戦略と同じく、マーケティングにも戦略があります。<br />ここでは、マーケティング戦略について学びましょう♪
<table>
	<tbody>
		<tr>
			<th>マーケティングミックス(4Pと4C)</th>
			<td>マーケティングに関する事項を多角的に評価します。</td>
		</tr>
		<tr>
			<th>成長マトリクス</th>
			<td>「どの製品を」「どの市場に」の視点からマーケティングを決定します。</td>
		</tr>
		<tr>
			<th>プロダクトライフサイクル</th>
			<td>商品の寿命を把握して、それぞれの段階でマーケティングを決定します。</td>
		</tr>
		<tr>
			<th>イノベータ理論</th>
			<td>商品を購入する消費者を5つにグループ分けして、それぞれに合わせてマーケティングを決定します。</td>
		</tr>
	</tbody>
</table>
<h4>マーケティングミックス(4Pと4C)</h4>
<table>
	<thead>
		<tr>
			<th width="40%">4P(企業の視点)</th>
			<th width="20%"></th>
			<th width="40%">4C(顧客の視点)</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>製品<br />(<strong>P</strong>roduct)</td>
			<th>&harr;</th>
			<td>顧客価値 (<strong>C</strong>ustomer Value)</td>
		</tr>
		<tr>
			<td>価格<br />(<strong>P</strong>rice)</td>
			<th>&harr;</th>
			<td>顧客コスト (<strong>C</strong>ustomer cost)</td>
		</tr>
		<tr>
			<td>流通<br />(<strong>P</strong>lace)</td>
			<th>&harr;</th>
			<td>利便性 (<strong>C</strong>onvenience)</td>
		</tr>
		<tr>
			<td>販売活動<br />(<strong>P</strong>romotion)</td>
			<th>&harr;</th>
			<td>コミュニケーション (<strong>C</strong>ommunication)</td>
		</tr>
	</tbody>
</table>
<h4>成長マトリクス</h4>
「どの製品を」「どの市場に」の視点からマーケティングを決定します。<br />販売する製品を「既存製品」「新製品」の2つに分け、対象市場を「既存市場」と「新市場」に分類することで、4つの成長戦略を設定します。
<table>
	<caption>アンゾフの成長マトリクス</caption>
	<tbody>
		<tr>
			<th colspan="2" rowspan="2"></th>
			<th colspan="2">製品</th>
		</tr>
		<tr>
			<th>既存製品</th>
			<th>新製品</th>
		</tr>
		<tr>
			<th width="15%" height="300px" rowspan="2"><span class="writing_vertical">市場</span></th>
			<th width="5%" height="150px"><span class="writing_vertical">新市場</span></td></th>
			<td width="40%" height="150px"><strong>市場開拓</strong></td>
			<td width="40%"><strong>多角化戦略</strong></td>
		</tr>
		<tr>
			<th height="150px"><span class="writing_vertical">既存市場</span></th>
			<td height="150px"><strong>市場浸透戦略</strong></td>
			<td><strong>新製品開拓</strong></td>
		</tr>
	</tbody>
</table>		
<h4>プロダクトライフサイクル</h4>
「祇園精舎の鐘の声、諸行無常の響きあり。沙羅双樹の花の色、盛者必衰の理をあらはす。おごれる人も久しからず、ただ春の夜の夢のごとし。たけき者も遂にはほろびぬ、ひとへに風の前の塵に同じ。」<br /><br />「平家物語」の冒頭部分です。<br />何が言いたいかといいますと、ずっと売れ続ける製品なんてのは存在せず、製品にも壽命があるよね、、、ってことです。<br /><br />プロダクトライフサイクルでは製品の生涯を以下のように設定し、それぞれの段階でとるべきマーケティング戦略について規定しています。
<table id="ppl-table" class="x">
	<caption>プロダクトライフサイクルの4段階</caption>
	<tbody>
		<tr>
			<th>1.導入期</th>
			<td></td>
			<td>ブランド認知を高める。</td>
		</tr>
		<tr>
			<th>&darr;</th>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th>2.成長期</th>
			<td></td>
			<td>新規参入により(市場規模拡大)、市場競争が激化。</td>
		</tr>
		<tr>
			<th>&darr;</th>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th>3.成熟期</th>
			<td></td>
			<td>市場成長率は低くなり、利益確保を図る。</td>
		</tr>
		<tr>
			<th>&darr;</th>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th>4.衰退期</th>
			<td></td>
			<td>市場規模が縮小、撤退すべき。</td>
		</tr>
	</tbody>
</table>
<h4>イノベータ理論</h4>
イノベータ理論では商品を購入する消費者を、購入の早い順に5つに分類して説明します。
<table id="innovator-table" class="x">
	<caption>イノベータ理論</caption>
	<tbody>
		<tr>
			<th width="30%" height="80px" class="border">イノベータ</th>
			<td width="60%" class="border">冒険的な購入者(2.5%)</td>
			<td width="10%" height="120px" rowspan="2" class="v-writing">導入期</td>
		</tr>
		<tr>
			<th rowspan="2" height="80px" class="border">オピニオンリーダ</th>
			<td rowspan="2" class="border">早期に購入(13.5%)</td>
		</tr>
		<tr>
			<td height="140px" rowspan="3" class="v-writing">成長期</td>
		</tr>
		<tr>
			<th height="40px" colspan="2" id="chasm">キャズム</th>
		</tr>
		<tr>
			<th height="80px" class="border">アーリーマジョリティ</th>
			<td class="border">比較的慎重で、オピニオンリーダに続いて購入(34%)</td>
		</tr>
		<tr>
			<th height="80px" class="border">レイトマジョリティ</th>
			<td class="border">多くの人に続いて購入(34%)</td>
			<td height="80px" rowspan="2" class="v-writing">成熟期</td>
		</tr>
		<tr>
			<th height="80px" rowspan="2" class="border">ラガード</th>
			<td rowspan="2" class="border">保守的で新しいものへの関心が薄い人たちが購入(16%)</td>
		</tr>
	</tbody>
</table>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const t = document.getElementById("innovator-table"),
			e = t.getElementsByClassName("v-writing"),
			color = ["rgba(255, 0, 0, 0.3)", "rgba(0, 160, 0, 0.3)", "rgba(0, 0, 255, 0.3)"];
		let i;
		for (i = 0; i < e.length; i++) {
			e[i].style.backgroundColor = color[i];
		}
	})();
</script>
キャズム(オピニオンリーダとアーリーマジョリティの間の溝)を超えられるかどうかが重要です。
<h4>マーケティング用語</h4>
ここでは、マーケティング用語を説明しますね♪
<table>
	<caption>マーケティング用語</caption>
	<tbody>
		<tr>
			<th>オムニチャネル</th>
			<td>実店舗・ECサイトなどのすべてのチャネル(販売経路)をシームレスに(継ぎ目なく)統合することで、顧客に対する利便性を上げるという考え方です。</td>
		</tr>
		<tr>
			<th>RFM分析</th>
			<td><strong>最終購入日</strong>(<strong>R</strong>ecency)、<strong>購入頻度</strong>(<strong>F</strong>requency)、<strong>累計購入金額</strong>(<strong>M</strong>onetary)の3つの指標から顧客状況を判断することを言います。</td>
		</tr>
		<tr>
			<th>webマーケティング</th>
			<td>webを通して多数の消費者に対して、プロモーションを行います。</td>
		</tr>
	</tbody>
</table>
<h4>ビジネス戦略</h4>
皆さん、PDCAサイクルって意識してますか???<br />計画(<strong>P</strong>lan)して、実行(<strong>D</strong>o)して、評価(<strong>C</strong>heck)して、改善(<strong>A</strong>ction)してと、、、<br /><br />PDCAサイクルってビジネスにおいてすごく重要なんです!!!<br /><br />ですけど、PDCAサイクルの<strong>P</strong>(計画)と<strong>C</strong>(評価)って少し難しいですよね、、、<br />そこで、ここではPDCAサイクルのPとCによく使われる概念を紹介します。
<table>
	<tbody>
		<tr>
			<th>CSF<br />重要成功要因</th>
			<td>目標達成のために重要な意味を持つ要素のことを指します。</td>
		</tr>
		<tr>
			<th>KPI<br />重要業績評価指標</th>
			<td>目標達成に必要なことを<strong>定量的</strong>に表したものです。</td>
		</tr>
		<tr>
			<th>KGI<br />重要目標達成指標</th>
			<td>最終的に到達すべきゴールを<strong>定量的</strong>に表したものです。</td>
		</tr>
	</tbody>
</table>
<h4>BSC</h4>
バランスドスコアシートの略で、以下の4つの視点から業務を多角的に評価します。
<table>
	<tbody>
		<tr>
			<th>財務の視点</th>
			<td>例) 売上拡大・費用削減</td>
		</tr>
		<tr>
			<th>顧客の視点</th>
			<td>例) 顧客満足度・クレーム件数</td>
		</tr>
		<tr>
			<th>内部プロセスの視点</th>
			<td>例) 生産性・作業時間</td>
		</tr>
		<tr>
			<th>学習と成長の視点</th>
			<td>例) 資格の取得率</td>
		</tr>
	</tbody>
</table>
<h4>経営管理システム</h4>
経営管理を効率的に行うための経営管理システムに関する基本的な考え方について学びましょう♪
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>CRM<br /><strong>C</strong>ustomer(顧客)<strong>R</strong>elationship(関係)<strong>M</strong>anagement(管理)</th>
				<td>顧客情報を効率的に管理することで、顧客との関係を深めて顧客満足度を高めます。</td>
			</tr>
			<tr>
				<th>SCM<br />(<strong>S</strong>upply<strong>C</strong>hain<strong>M</strong>anagement)</th>
				<td>資材の調達・製品の生産・流通・販売の流れ(サプライチェーン)を効率的に管理して時間短縮・費用削減を図ります。<br />(企業を超えた価値の流れ)</td>
			</tr>
			<tr>
				<th>バリューチェーン<br />マネジメント</th>
				<td>部品の調達から販売までの流れを価値の連鎖(バリューチェーン)として捉えて、価値の効率的に管理します。<br />(1企業内の業務の流れ)</td>
			</tr>
		</tbody>
	</table>
</div>
<?php footer(); ?>