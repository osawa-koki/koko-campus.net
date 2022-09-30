<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-05-10",
	"updated" => "2022-05-10"
);
head($obj);
?>
<h2>データベース</h2>
データベースとは字面通りデータの保存庫で、データの保存・管理を目的とした技術を言います。<br />狭義では実際に集めたデータを保存する記憶領域を指しますが、広義では記憶領域とそれを操作するプログラム(RDBMS)を総称してデータベースと呼びます。<br /><br />また、データベースはデータの整理方法によって複数の種類に分けられます。<br />代表的なものに以下のものがあります。
<ul>
	<li>関係DB</li>
	<li>構造型DB</li>
	<li>階層型DB</li>
	<li>OODB</li>
	<li>XML DB</li>
</ul>
SQL Serverは関係DBに該当します。<br />因みに、9割型のデータベースは関係DBに該当します。<br />最近はビッグデータが注目されてきて関係DB以外も勢いづいていますが、それでもまだまだです。
<h2>関係DB</h2>
データってただ単純に詰め込めばok!ってことではなく。使いやすいように整理する必要があります。<br />この整理方法のうちのひとつが、「関係」手法で、これを採用したデータベースが関係DBです。<br /><br />関係(リレーショナル)によるモデルは1970年にコッド博士が論文を公表して以来データベースモデルの事実上の標準となっています。<br /><br />関係DBの特徴は全てのデータを行と列からなる表によって管理するという点です。
<img src="../pics/関係dbの構造.png" alt="関係データベース" />
テーブルの行(横)のラインをフィールド、列(縦)のラインをカラムと呼ぶこともあります。<br /><br />大切なのは、関係DBでは大量のデータをひとつのテーブルに格納するのは大変なので、いい感じにテーブルを分割する点です。<br />ここが難しい点で、ただ単純にテーブルを分割すればok!というわけではなく、必要な時にはテーブルを同士を合体させられるように設計する必要があります。<br /><br />大切なのでもう一度説明します。<br />関係DBでは、パフォーマンスのためにデータを複数のテーブルに分割して格納します。<br />この際に、後でテーブルを合体させて取得・検索等の処理が行えるように適切な設計をする必要があります。<br /><br />「適切」ってなんやって思いますよね、、、<br /><br />「正規化」の部分で説明します。
<h2>SQL</h2>
SQLとは「Structed Query Language」の略で、構造化問合せ言語と訳されます。<br />「エスキューエル」と呼ぶことが多いですが、僕は呼びやすさの観点から「シークゥイル」と呼んでいます。<br />因みにこの呼び方は「SEQUEL」というSQLの前身言語の発音と合わせています。<br /><br />SQLはデータベースを操作するための言語です。<br />ユーザが、ないしはプログラムが直接データベースを操作することはせずに、RDBMSにSQLを発行してデータベースを操作してもらいます。
<h2>データベースの仕組み</h2>
データベースにはデータベースファイルとユーザの架け橋をしてくれるDBMS(RDBMS)と呼ばれるプログラムが存在します。<br />RDBMSはユーザが発行するSQLを受け取ってデータベースファイルを操作して、その結果をユーザに返します。
<img src="../pics/データベース.png" alt="データベースの画像" />
php・java・pythonなどのプログラムから直接SQLを送信する(埋込型SQL)こともできますが、ここではユーザがコマンドラインで直接操作するSQL(会話型SQL)だけを説明します。<br />会話型SQLを理解できたら埋込型SQLもほとんど同じですので、すぐに使えるようになりますよ♪
<h2>DBMS</h2>
「Database Management System」の略で、実際にデータベースを操作してくれるプログラムを指します。<br /><br />データベース操作に関しては一般にユーザがないしはプログラムが直接データベースを操作することはせずに、ユーザがDBMSへSQLと言われる命令文を出してそれを受け取ったDBMSが代わりにデータベースを操作します。<br /><br />DBMSには以下の種類があります。
<ul>
	<li>MySQL</li>
	<li>MariaDB</li>
	<li>SQL Server</li>
	<li>PostgreSQL</li>
	<li>SQLite</li>
</ul>
ほとんどのDBMSはANSIやISOによって標準化されていため処理は同じですが、種類によっては少し記述方法が異なる場合があります。
<?php footer(); ?>
