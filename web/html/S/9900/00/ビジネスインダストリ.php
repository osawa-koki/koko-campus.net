<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj=array(
	"made" => "2022-03-25",
	"updated" => "2022-03-25"
);
head($obj);
?>
<h2>GPS(全地球測位システム)</h2>
人工衛星を利用して現在位置を特定します。<br /><br />具体的な方法としては、人工衛星からの距離を「み・は・じ」で求めます。<br />(距離 = 速さ &times; 時間)
<p>速さは光速で一定であるため、時間を計測して求めます。</p>
おそらく皆さんが使用しているスマホにも搭載されています。
<div id="gps-button" class="button">GPS</div>
<table id="gps-table" class="hidden">
	<tbody>
		<tr>
			<th>緯度</th>
			<td id="lat"></td>
		</tr>
		<tr>
			<th>経度</th>
			<td id="lon"></td>
		</tr>
	</tbody>
</table>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const b = document.getElementById("gps-button"),
			lat = document.getElementById("lat"),
			lon = document.getElementById("lon");
		function gps_success(p) {
			const x = p.coords.latitude,
				y = p.coords.longitude;
			lat.textContent = x;
			lon.textContent = y;
		}
		function gps_fail() {
			lat.textContent = "計測不能";
			lon.textContent = "計測不能";
		}
		b.addEventListener("click", () => {
			document.getElementById("gps-table").classList.remove("hidden");
			navigator.geolocation.getCurrentPosition(gps_success, gps_fail);
		});
	})();
</script>
<h2>流通情報システム</h2>
身の回りに存在するITを活用した仕組みについて学びましょう♪
<table>
	<tbody>
		<tr>
			<th>POS<br />(販売時点情報)</th>
			<td>スーパーのレジで店員さんが「ピッ!」てやる機器ありますよね。<br />「ピッ!」ってした瞬間にいつ、何個売れたかが送信されて在庫管理に役立っているんです。<br />あれがPOSです♪</td>
		</tr>
		<tr>
			<th>IC<br />(集積回路)</th>
			<td>商品の納品・出荷を管理するためによく使われる機器です。<br />商品にICタグをつけて電波で無線通信を行うことで簡単な管理を実行します。</td>
		</tr>
		<tr>
			<th>RFID</th>
			<td>上で説明した、ICタグによる管理を実現するための技術です。<br />ICチップを使用して電波による無線通信を行います。</td>
		</tr>
		<tr>
			<th>NFC</th>
			<td>10cm程度の距離で無線通信を行うための技術です。<br />僕が使っている三井住友VISAカードも最近NFCに対応して、カードを挿入せずタッチするだけで良くなりました♪</td>
		</tr>
		<tr>
			<th>トレーサビリティ<br />(tracability)</th>
			<td>追跡(trace)が可能(able)であることを意味します。<br />工場で作ったものに不備があったときに、その製品がどこで販売されたのを把握して対処を迅速に行えるようにします。</td>
		</tr>
	</tbody>
</table>
<h2>人工知能(AI)</h2>
近年、注目を集めている技術です。ITの力をより発展させてヒトに近い処理を行わせます。<br />僕が高校生の時は機械学習が人工知能の主流だったんですけど、トロント大学が開発した深層学習の急成長を受けて最近は人工知能というと深層学習のことを指すことが多いです。<br /><br />ここでは、機械学習と深層学習について簡単に説明しますね♪
<table>
	<tbody>
		<tr>
			<th>機械学習</th>
			<td>大量のデータをコンピュータに与えてデータの特徴を学習させます。</td>
		</tr>
		<tr>
			<th>深層学習</th>
			<td>ヒトの脳を模倣したニューラルネットワークをコンピュータ上に再現してデータの特徴を学習さます。<br />深層学習は機械学習の一部です。</td>
		</tr>
	</tbody>
</table>
<h2>IT(インターネット)ビジネス用語</h2>
IT・インターネットの利用が急速に拡大している今日では、ビジネスの効率的実施にIT(インターネット)の活用は必要不可欠です。<br /><br />そこで、ここではビジネスで用いられるIT(インターネット)関連用語について学びましょう♪
<table>
	<tbody>
		<tr>
			<th>SEO</th>
			<td>検索エンジン最適化。<br />例) 「ITパスポート 簡単合格」と検索するとこのwebページが上位に現れるようにする。<br />具体的な方法が難しすぎるため、ここでは解説できません。<br />興味があれば「SEO対策」と検索してみてください。</td>
		</tr>
		<tr>
			<th>フィンテック(FinTech)</th>
			<td>金融(<strong>Fin</strong>ance)と技術(<strong>Tech</strong>nology)の造語です。<br />ITを用いて金融サービスを効率化します。</td>
		</tr>
		<tr>
			<th>暗号資産</th>
			<td>ITでその存在を確かなものにされた資産です。<br />日本の紙幣は光にあてると肖像画が浮かび上がる技術で偽造を防いでいますが暗号資産ではITの力(ハッシュ暗号アルゴリズムとファイナリティ)で偽造を防ぎ、かつIT上で再現されているため取引が容易で効率的というメリットがあります。</td>
		</tr>
	</tbody>
</table>
<h2>工業 &times; IT</h2>
今までは「経営 &times; IT」の話をしてきましたが、ここでは「工業 &times; IT」の説明をしますね♪<br />近年はグローバル化の影響を受けて競争が激化していますね、、、<br />何で競争するのかというと価格や質といった要素がメインなんですけど、それを効果的・効率的に管理する技術はやはりITなんですよね。<br />ITってすばらしい!!!<br /><br />以下では具体的な管理手法について説明します。
<table>
	<tbody>
		<tr>
			<th>MRP<br />(資材所要量計画)</th>
			<td>不要な在庫を抱えると廃棄や保管費の圧迫などの問題を引き起こします。<br />そこで必要な資材量と現在在庫量から発注量を管理しようとする考え方がMRPです。</td>
		</tr>
		<tr>
			<th>JIT</th>
			<td>無駄な在庫を無くすために何が必要ですか???<br /><br />答え、「<strong>必要なものを、必要な時に、必要な量だけ</strong>」生産します。<br />byトヨタ自動車</td>
		</tr>
		<tr>
			<th>かんばん方式</th>
			<td>JITの具体的な実現方法です。<br />「<strong>何を、いつ、どれだけ</strong>」必要なのかをかんばんに書いて生産してもらいます。</td>
		</tr>
		<tr>
			<th>リーン生産方式</th>
			<td>色々な<strong>ムダ</strong>を省いてトータルコストを削減します。<br />色々な無駄とは、、、<br />作りすぎのムダ・手待ちのムダ・加工のムダ・在庫のムダ・動作のムダ・etc...</td>
		</tr>
	</tbody>
</table>
<h2>エンジニアリングシステム</h2>
上では主に在庫管理にITを活用しましたが、ITはそれ以外の分野でも活用されています。<br />ここではその手法・考え方(エンジニアリングシステム)について学びましょう♪
<table>
	<tbody>
		<tr>
			<th>CAD</th>
			<td><strong>C</strong>omputer<strong>A</strong>ided<strong>D</strong>esign</td>
			<td>コンピュータで設計(<strong>D</strong>esign)を支援します。</td>
		</tr>
		<tr>
			<th>CAM</th>
			<td><strong>C</strong>omputer<strong>A</strong>ided<strong>M</strong>anufacturing</td>
			<td>コンピュータで製造(<strong>M</strong>anufacturing)を支援します。</td>
		</tr>
		<tr>
			<th>FA</th>
			<td><strong>F</strong>actory<strong>A</strong>utomation</td>
			<td>工場(<strong>F</strong>actory)における業務を自動化(<strong>A</strong>utomation)します。</td>
		</tr>
		<tr>
			<th>組み込み(エンベデッド)システム</th>
			<td>----------</td>
			<td>家電製品に内蔵されているその製品用のシステムを言います。</td>
		</tr>
		<tr>
			<th>IoT(モノのインターネット)</th>
			<td><strong>I</strong>nternet <strong>o</strong>f <strong>T</strong>hings</td>
			<td>家電・スマホ・機械・etc...(様々なモノ)をインターネットに接続してネットワーク経由で管理しようとする考え方です。</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>