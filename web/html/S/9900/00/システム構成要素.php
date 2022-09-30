<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-25",
	"updated" => "2022-03-25"
);
head($obj);
?>
<h2>処理形態</h2>
システムの処理形態は大きく以下の2つに分類できます。
<ul>
	<li>集中処理</li>
	<li>分散処理</li>
</ul>
<h3>集中処理</h3>
1台のコンピュータで全ての処理を行う形態です。<br />1台のコンピュータを管理するだけであるためセキュリティが強固である反面、システムの拡張が困難で、また障害発生時にその影響が広範囲に及ぶ問題があります。
<h3>分散処理</h3>
複数のコンピュータに処理を振り分けます。<br />複数のコンピュータを管理する必要があるためセキュリティが脆弱になりがちですが、システムの拡張が容易で、また障害発生時にはその影響を局所化できます。
<h2>冗長構成</h2>
システムの信頼性を確保するためにシステムの構成を二重化することがあります。<br />これを冗長化と呼びますが、冗長化の構成には以下の種類があります。
<h3>デュアルシステム</h3>
同一の処理を2つの系統で行い、これらを照合することで高い信頼性を保証します。<br />障害が発生しても、もう一方だけで処理を継続することができます。<br />問題点としてコストが高くなることがあげられます。
<h3>デュプレックスシステム</h3>
現用系と予備系の2種類を用意し、障害発生時には予備系が処理を引き継ぎます。<br />デュアルシステムよりはシステムの信頼性は高くありませんが、コストは低く抑えることができます。<br /><br />予備系の待機方法には以下の2通りあります。
<table>
	<thead>
		<tr>
			<th width="50%">ホット<br />スタンバイ</th>
			<th width="50%">コールド<br />スタンバイ</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>現用系と同じ状態で待機します。</td>
			<td>障害が発生してからセットアップします。</td>
		</tr>
	</tbody>
</table>
<h2>クライアントサーバシステム</h2>
処理を要求するクライアントと処理をしてその結果を返すサーバが連携しながら処理を実行するシステムを言います。
<img src="../pics/クライアントサーバシステム.png" alt="クライアントサーバシステム" />
<div class="separator"></div>
これに対して、クライアントとサーバという役割を設けずに、両者が対等な立場でやり取りを行うシステムを<strong>ピアツーピア</strong>システムと言います。
<h3>三層クライアントサーバシステム</h3>
クライアントサーバシステムの進化バージョンで、さらに細かく処理を分類します。
<table>
	<tbody>
		<tr>
			<th rowspan="2" class="v-writing">サーバ</th>
			<th>データ層</th>
			<td>データベースへのアクセスを担当します。</td>
		</tr>
		<tr>
			<th>ファンクション層</th>
			<td>プレゼンテーション層からのアクセスに応じて、データ層から取得し、データを加工してプレゼンテーション層に返します。</td>
		</tr>
		<tr>
			<th class="v-writing">サーバ</th>
			<th>プレゼンテーション層</th>
			<td>ユーザに表示する部分(ユーザインターフェース)を担当します。</td>
		</tr>
	</tbody>
</table>
<img src="../pics/3層クライアントサーバシステム.png" alt="3層クライアントサーバシステム" />
このようにクライアント側に必要最低限のユーザインターフェース機能だけを持たせたものを<strong>シンクライアント</strong>と呼びます。<br />シンクライアントの「シン」は「thin」で細いという意味です。<br /><br />シンクライアントを採用することで、クライアントが不要な機能を持たなくなるため、セキュリティが強固になります。
<h2>仮想化</h2>
あるコンピュータ上に仮想的なひとつの、ないしは複数のコンピュータを再現する技術です。<br />仮想的に再現されたコンピュータのことを<strong>仮想マシン(VM)</strong>と呼び、仮想マシンの再現方法には以下の3通りあります。
<ul>
	<li>ホスト型</li>
	<li>ハイパバイザ型</li>
	<li>コンテナ型</li>
</ul>
<h3>ホスト型</h3>
OS上に仮想化ソフトウェアをインストールし、その上で仮想化マシン用のOS(ゲストOS)を稼働させます。<br />利点として簡単に再現できることがあげられますが、欠点としてオーバーヘッドが大きいことがあげられます。<br />オーバーヘッドとは余計にかかる負荷のことを言います。
<img src="../pics/ホスト型.png" alt="ホスト型" />
<h3>ハイパバイザ型</h3>
ハードウェア上に仮想マシンを制御するプログラムであるハイパバイザを直接インストールし、その上でゲストOSを稼働します。<br />ホストOSを経由しなくて済むため、ホスト型に比べて小さいオーバーヘッドで済みます。
<img src="../pics/ハイパバイザ型.png" alt="ハイパバイザ型" />
<h3>コンテナ型</h3>
ゲストOSを起動せずにゲストOS用のアプリケーションを動作させます。
<img src="../pics/コンテナ型.png" alt="コンテナ型" />
<h2>VDI</h2>
「Virtual Desktop Infrastructure」の略で、PCを仮想PCとしてサーバ上で稼働させ、実際の端末上では画面表示とマウス・キーボード操作だけを行います。
<h2>RAID</h2>
「Redundant Array of Inexpensive Disks」の略で、複数個のハードウェアを組み合わせて信頼性や処理性能を向上させる技術を言います。<br />RAIDはその仕組みによって以下の種類に分類されます。
<h3>RAID 0</h3>
データを分割して複数のディスクに分散して書き込みます。<br />ストライピングと呼ばれます。<br /><br />これによってアクセス効率が高まり、システムの性能が向上します。
<h3>RAID 1</h3>
あるデータを2つのディスクに書き込みます。<br />ミラーリング・デュプレクシングと呼ばれます。<br /><br />システムの信頼性が向上します。
<h3>RAID 2</h3>
RAID 0のストライピングに加えて誤りを検知・修正するハミング符号を付すことでシステムの性能と信頼性を向上させます。
<h3>RAID 3</h3>
ストライピングに加えて、誤りを訂正するためのパリティを付します。<br />これによって、ディスク1台の故障であれば他のディスクからデータを復元できます。
<h3>RAID 4</h3>
RAID 3とほとんど同じです。<br />ストライピングに加えて、誤りを訂正するためのパリティを付します。<br />これによって、ディスク1台の故障であれば他のディスクからデータを復元できます。<br /><br />RAID 3と異なる点は、ブロック単位でストライピングをするため、より高速な処理が可能です。
<h3>RAID 5</h3>
RAID 3とRAID 4ではパリティを保存しているディスクに対してアクセスが集中するという問題があります。<br />RAID 5ではパリティを分散させることでこの問題を克服します。
<h2>利用形態</h2>
システムは利用形態(処理の手順)によって以下のように分類することができます。
<table>
	<tbody>
		<tr>
			<th>バッチ処理</th>
			<td>処理するデータを保存しておき、ある一定のタイミングで一括して処理します。</td>
		</tr>
		<tr>
			<th>リアルタイム処理</th>
			<td>処理要求発生の度に、その都度処理を実行します。</td>
		</tr>
	</tbody>
</table>
<h2>システムの性能評価</h2>
システムの性能を評価するための指標には以下のものがあります。
<table>
	<tbody>
		<tr>
			<th>スループット</th>
			<td>単位時間あたりに処理できる仕事の量で性能を評価します。</td>
		</tr>
		<tr>
			<th>レスポンスタイム</th>
			<td>システムに対する処理の要求から要求に対する応答までの時間を用いてシステムの性能を評価します。</td>
		</tr>
	</tbody>
</table>
<h2>システムの信頼性</h2>
システムの信頼性の尺度としてはよくRASが用いられます。<br />RASはそれぞれ、以下の略です。
<ul>
	<li>R: Reliability(信頼性)</li>
	<li>A: Availability(可用性)</li>
	<li>S: Serviceablity(保守性)</li>
</ul>
<table>
	<tbody>
		<tr>
			<th>信頼性</th>
			<td>システムの故障のしにくさを意味し、平均故障時間(MTBF)を用いて表します。</td>
		</tr>
		<tr>
			<th>可用性</th>
			<td>システムが利用できる可能性を意味し、稼働率を用いて表します。</td>
		</tr>
		<tr>
			<th>保守性</th>
			<td>システムの保守のしやすさを意味し、平均修理時間(MTTR)を用いて表します。</td>
		</tr>
	</tbody>
</table>
<h3>MTBF</h3>
「Mean Time Between Failures」の略で、故障から故障までの稼働している平均時間から算出します。
<div class="quote">
	<div>MTBF</div>
	= 稼働時間合計 &divide; 故障回数
</div>
<h3>MTTR</h3>
「Mean Time To Repair」の略で、故障してから修理されるまでの時間の平均値から算出します。
<div class="quote">
	<div>MTTR</div>
	= 修復時間の合計 &divide; 故障回数
</div>
<h3>稼働率</h3>
システムが正常に稼働している確率を表します。<br />以下の式から算出されます。
<div class="quote">
	<div>稼働率</div>
	= MTBF &divide; (MTBF + MTTR)
</div>
<?php footer(); ?>