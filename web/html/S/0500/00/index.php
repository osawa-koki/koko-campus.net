<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>データベース理論</h2>
データベース理論編ではデータベースを実際に操作するのではなく、データベースの設計に関する内容を説明します。<br />データはもともとはWEBサーバやAPサーバで管理されることも多かったのですが、使用頻度と重要性の高さからデータベース別に管理されるようになったという経緯があります。<br />したがって、データベースの処理性能はシステムの処理性能に大きくかかわってきます。<br />実際に、コンピュータ・システムの仕事がデータの処理・保存である以上、データベースの重要性は明確でしょう。<br /><br />ということで、データベースの理論部分についてしっかりマスターしましょう♪
<h2>設計手順</h2>
データベースを設計するには以下の3つのステップを踏みます。
<ol>
	<li>概念設計</li>
	<li>論理設計</li>
	<li>物理設計</li>
</ol>
<h3>概念設計</h3>
この段階では、モノとモノの関係を明確にします。<br />データベースでの管理対象となるモノのことを「実体(エンティティ)」といいますが、この実体間の関係(リレーションシップ)をモデル化します。<br />モデリングの方法として「UMLのクラス図」や「E-R図」を用いることが多いです。
<h3>論理設計</h3>
データをどのように管理するかを明確にします。<br />関係(リレーション)モデルを採用することが多いです。<br />関係モデルとは行と列による二次元データで管理するデータモデルを言います。<br /><br />これ以外にも階層モデルやネットワークモデルがありますが、現在ではほとんど用いられていません。
<h3>物理設計</h3>
使用するハードウェアを選定します。<br />具体的には上記の設計で推測される必要な処理量から必要なスペックを求めます。<br /><br />また、ハードウェアだけでなく、データベース製品を選定することも物理設計に含まれます。
<h2>データベースの三層スキーマ</h2>
データベースを設計するにあたって、以下の3つのスキーマ(枠組み)を定める必要があります。
<table>
	<tbody>
		<tr>
			<th>外部スキーマ</th>
			<td>ユーザ・アプリケーションに提供する構造を定義します。</td>
		</tr>
		<tr>
			<th>概念スキーマ</th>
			<td>データの論理的な構造を定義したものです。<br />データ構造の理想的な形ですが、諸々の都合によりこれだけでは不十分です。</td>
		</tr>
		<tr>
			<th>内部スキーマ</th>
			<td>データの物理的な格納構造を定義したものです。<br />データファイルの構造やインデックスの構造などデータベースを実装する際に設定するより技術的な構造です。</td>
		</tr>
	</tbody>
</table>
既に説明した通り、概念スキーマが最も理想的なデータの構造です。<br />しかしながら、システムにデータベースを組み込む以上、環境を考える必要があります。<br /><br />例えば、概念スキーマだけにしたがって実装すると、ユーザに見せるべきではないデータを公開してしまうことになります。<br />また、アプリケーションを変更して、呼び出し方が変更された際にもこれに合わせた大規模改修が必要となります。<br /><br />ハードウェアに変更が生じた際には、データ全体を変える必要が生じます。<br /><br />こういった事態に対応するために、緩衝材として外部スキーマ・内部スキーマを定義します。
<h2>リレーショナルモデル</h2>
1970年にコッド博士が開発したデータベースのモデルです。<br /><a href="https://www.seas.upenn.edu/~zives/03f/cis550/codd.pdf">「A Relational Model of Data for Large Shared Data Banks」</a>という論文によって公表されました。<br /><br />全てのデータを二次元データとしてテーブルに形式で表し、それらを相互に関連付けることで効率的なデータベースの構築を実現しています。<br /><br />リレーショナルモデルはテーブルによって適切にデータを分割させることが可能であり、これがデータベースのパフォーマンス・保守性を向上させています。<br /><br />これが「正規化」という技術です。<br /><br />リレーショナルモデルではデータをテーブル単位で分割するため、「正規化」という考えを理解することがとっても大切です。<br />正規化の学習で躓く人も多いと思いますが、避けては通れない道です。<br /><br />ものすごく簡単に説明すると、ひとつのテーブルに大量のデータを格納すると検索効率が悪化するため、いい感じに分割して保存しようという考えです。<br />しかしながら、テキトーに分割していてはデータ間の関係を無視することにつながります。<br /><br />したがって、データをテーブルに分割するにしても何らかの仕組みが必要です。<br /><br />そこで、「主キー」と「外部キー」の理解が必要となります。<br /><br />また、どの程度テーブルを分割するのかというレベルの問題もあります。<br />これは正規化レベルと呼ばれ、「1 ～ 5」段階まであります。<br />高ければ高いほどデータの構成が整っているということになりますが、一般的には第三正規形まで理解すればok!です。
<?php footer(); ?>