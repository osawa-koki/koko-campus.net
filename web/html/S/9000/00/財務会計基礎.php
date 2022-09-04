<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-13",
	"updated" => "2022-01-13"
);
head($obj);
?>
<h2>会計</h2>
会計とは金銭に関わる取引(経済活動・経済事象)に関して認識・測定・記録・報告という行為を行うことを言います。<br />また、認識・測定・記録・報告の4つの行為を会計行為と呼び、これらは会計の構成要素とされます。<br />認識・測定・記録・報告について説明します。
<table>
	<caption>会計行為</caption>
	<tbody>
		<tr>
			<th>認識</th>
			<td>発生した経済活動・経済事象のうち、それが会計的に測定するべきかを識別することです。</td>
		</tr>
		<tr>
			<th>測定</th>
			<td>認識した経済活動・経済事象に関して、いくらでそれを把握するか(財務諸表への計上価額)を決定することです。</td>
		</tr>
		<tr>
			<th>記録</th>
			<td>認識・測定した経済活動・経済事象を適切に記録することを言います。<br />原則として複式簿記により記録します。</td>
		</tr>
		<tr>
			<th>報告</th>
			<td>記録された情報を会計期間ごとに利害関係者に伝達することを言います。</td>
		</tr>
	</tbody>
</table>
<img src="../pics/会計行為.png" alt="会計行為" />
<h2>会計の分類</h2>
会計は以下のように分類されます。
<img src="../pics/会計の分類.png" alt="会計の分類" />
<table>
	<caption>会計の分類</caption>
	<tbody>
		<tr>
			<th>マクロ会計</th>
			<td>社会全体に関する会計で、国民経済をひとつの会計主体とみなした会計を指します。<br />GDPなどの算定などが該当します。</td>
		</tr>
		<tr>
			<th>ミクロ会計</th>
			<td>
				国民経済を構成する個別の経済主体による会計を指します。<br />家計・企業会計・官庁会計などが該当し、さらに以下の2つに分類されます。
				<ul>
					<li>営利会計</li>
					<li>非営利会計</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>非営利会計</th>
			<td>
				営利目的でない経済主体に対する会計を指します。<br />主に以下の会計が該当します。
				<ul>
					<li>医療会計</li>
					<li>学校法人会計</li>
					<li>NPO会計</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>営利会計</th>
			<td>
				営利目的の経済主体に対する会計を指します。<br />営利会計はさらに以下の2つに分類されます。
				<ul>
					<li>財務会計</li>
					<li>管理会計</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>管理会計</th>
			<td>企業内部で使用することを目的とする会計で、内部報告会計とも呼ばれます。<br />経営層に報告することを目的とします。</td>
		</tr>
		<tr>
			<th>財務会計</th>
			<td>
				企業外部に報告することを目的とする会計で、外部報告会計とも呼ばれます。<br />利害関係者(債権者・株主)に報告することを目的とします。<br />以下の3つ(制度会計)と非制度会計からなります。
				<ul>
					<li>会社法会計</li>
					<li>金融商品取引法会計</li>
					<li>税務会計</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>非制度会計</th>
			<td>法律によって強制されない、企業が独自に行う財務会計を指します。<br />例えば物価変動会計・環境会計・社会責任会計などが該当し、IRを通じて利害関係者に報告します。</td>
		</tr>
		<tr>
			<th>制度会計</th>
			<td>
				法律によって強制されている会計を指します。<br />以下の3つの法律によって強制されます。
				<ul>
					<li>会社法</li>
					<li>金融商品取引法</li>
					<li>租税法</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>
<h2>トライアングル体制</h2>
制度会計を構成する「会社法会計」「金融商品取引法会計」「税務会計」の3つによって構成される会計制度を言います。
<img src="../pics/トライアングル体制.png" alt="トライアングル体制" />
税務会計に関しては財務会計では特に取り扱わず、財務会計では主に「会社法」と「金融商品取引法」の2つを対象とします。<br />といっても「会社法」による会計と「金融商品取引法」による会計はほとんど統一されているため、メインは「金融商品取引法会計」を学習します。
<h2>財務会計の機能</h2>
財務会計が実現する機能には大きく以下の2つがあります。
<ul>
	<li>利害調整機能</li>
	<li>情報提供機能</li>
</ul>
<h3>利害調整機能</h3>
利害調整機能とは会計情報に関して発生する利害関係者間の利害対立を調整する機能を言い、調整対象の利害関係者として以下の2パターンが想定されます。
<ul>
	<li>株主と経営者</li>
	<li>株主と債権者</li>
</ul>
<img src="../pics/利害関係.png" alt="会社間の利害関係" />
<h4>株主と経営者</h4>
株式会社は「所有と経営の分離」を前提としているため、会社に対する出資者である株主と会社を経営する立場である経営者間で利害関係が発生します。<br />具体的には株主が経営者にリスクを負って資金を貸している状況であるため、経営者は株主から借りた資金を適切に運用して利益をあげる義務が生じます。<br />この株主と経営者間の関係をプリンシパル・エージェント関係と呼びます。<br />経営者は株主から借りた資金の運用状況を財務諸表を通じて株主に報告します。<br />株主はその報告を受けて不満があるならば、株式を売却するか(エグジット)、株主総会において議決権を行使(ボイス)します。
<p class="r">貸しているという表現は適切ではないかもしれません、、、</p>
<img src="../pics/利害関係(株主-経営者).png" alt="プリンシパル-エージェント関係" />
<h4>株主と債権者</h4>
債権者は株主と同様に会社に資金を貸している立場ではありますが、配当や株価上昇益を受けることができません。<br />その代わりに債権者は利子としてリスクをほとんど負うことなく、利益をあげることができますが、会社の利益の大半を株主に配当として株主に配ってしまったら会社の財政基盤が脆弱となり、債権者が元利金を回収できない危険性が高まります。<br />そこで、剰余金(利益)の配当に関して財務会計を使用して分配可能額を算定して、それを限度額として配当を行うことで債権者と株主間の利害調整を行っています。
<img src="../pics/利害関係(株主-債権者).png" alt="分配可能額による利益調整" />
<div class="separator"></div>
利害調整機能は主に「会社法会計」によって実現されます。
<h3>情報提供機能</h3>
会計情報を適切に報告することで以下の2つを達成できます。
<ul>
	<li>投資者の意思決定に有用な情報の提供</li>
	<li>証券市場における公正な価格形成を実現</li>
</ul>
これによって投資者の証券投資を促進させることで、証券市場さらには社会全体の円滑な運営を確保ができるようになります。
<div class="separator"></div>
情報提供機能は主に「金融商品取引法会計」によって実現されます。<br />金融商品取引法ではこれを実現するための制度をディスクロージャー制度(企業内容開示制度)として整えています。
<h2>会社法と金融商品取引法</h2>
会社法会計と金融商品取引法会計においては以下のようにな相違点があります。
<div class="scroll-600w">
	<table>
		<thead>
			<tr>
				<th></th>
				<th>会社法会計</th>
				<th>金融商品取引法会計</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>目的</th>
				<td>利害調整機能</td>
				<td>情報提供機能</td>
			</tr>
			<tr>
				<th>主な報告対象</th>
				<td>現在の債権者・株主</td>
				<td>投資家</td>
			</tr>
			<tr>
				<th>重点</th>
				<td>分配可能額の算定</td>
				<td>適切な期間損益計算</td>
			</tr>
			<tr>
				<th>作成・開示書類</th>
				<td>
					計算書類
					<ul>
						<li>貸借対照表</li>
						<li>損益計算書</li>
						<li>株主資本等変動計算書</li>
						<li>個別注記表</li>
					</ul>
					<div class="separator"></div>
					連結計算書類
					<ul>
						<li>連結貸借対照表</li>
						<li>連結損益計算書</li>
						<li>連結株主資本等変動計算書</li>
						<li>連結注記表</li>
					</ul>
				</td>
				<td>
					財務書類
					<ul>
						<li>貸借対照表</li>
						<li>損益計算書</li>
						<li>キャッシュフロー計算書</li>
						<li>株主資本等変動計算書</li>
						<li>附属明細表</li>
					</ul>
					<div class="separator"></div>
					四半期財務書類
					<ul>
						<li>四半期貸借対照表</li>
						<li>四半期損益計算書</li>
						<li>四半期キャッシュフロー計算書</li>
					</ul>
					<div class="separator"></div>
					連結財務書類
					<ul>
						<li>連結貸借対照表</li>
						<li>連結損益計算書</li>
						<li>連結キャッシュフロー計算書</li>
						<li>連結株主資本等変動計算書</li>
						<li>連結附属明細表</li>
					</ul>
					<div class="separator"></div>
					四半期連結財務書類
					<ul>
						<li>四半期連結貸借対照表</li>
						<li>四半期連結損益計算書</li>
						<li>四半期連結キャッシュフロー計算書</li>
					</ul>
				</td>
			</tr>
			<tr>
				<th>遵守すべき法令等</th>
				<td>
					<ul>
						<li>会社法</li>
						<li>会社計算規則</li>
					</ul>
				</td>
				<td>
					<ul>
						<li>企業会計原則</li>
						<li>実務対応報告</li>
						<li>実務指針</li>
						<li>財務諸表等規則及びガイドライン</li>
					</ul>
				</td>
			</tr>
			<tr>
				<th>管轄庁</th>
				<td>法務省</td>
				<td>金融庁</td>
			</tr>
		</tbody>
	</table>
</div>
<?php footer(); ?>