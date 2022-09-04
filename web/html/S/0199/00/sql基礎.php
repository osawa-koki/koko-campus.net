<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-02",
	"updated" => "2022-02-02"
);
head($obj);
?>
<h2>sqlの種類</h2>
sqlはその性質から大きく以下の3つに分類されます。
<ul>
	<li>データ定義言語</li>
	<li>データ操作言語</li>
	<li>データ制御言語</li>
</ul>
<h3>データ定義言語</h3>
DDL(Data Definition Language)と略されます。<br />データベースのデータ構造を定義する言語で、以下の文が該当します。
<ul>
	<li>CREATE(表の作成)</li>
	<li>DROP(表の削除)</li>
</ul>
<h3>データ操作言語</h3>
DML(Data Manipulation Language)と略されます。<br />データの検索・更新・削除・追加を行うための言語で、以下の文が該当します。
<ul>
	<li>SELECT(検索)</li>
	<li>UPDATE(更新)</li>
	<li>DELETE(削除)</li>
	<li>INSERT(追加)</li>
</ul>
<h3>データ制御言語</h3>
DCL(Data Control Language)と略されます。<br />データベースへのアクセス制御を設定する言語で、以下の文が該当します。
<ul>
	<li>GRANT(権限付与)</li>
	<li>REVOKE(権限剥奪)</li>
</ul>
<h2>sqlの規則</h2>
sqlの書き方の規則に関しては以下の2つを覚えてください。
<ul>
	<li>大文字と小文字</li>
	<li>自由記述形式</li>
	<li>文字列表記</li>
</ul>
<h3>大文字と小文字</h3>
sqlは大文字と小文字を原則として区別しません。<br />したがって、以下のsqlは全て同じ命令文と認識されます。
<code class="sql">
	SHOW databases;

	show Databases;

	ShOw DataBases;

	show DATABASES;
</code>
<img src="../pics/sql-大文字と小文字.gif" alt="sqlの書き方" />
一般的には予約語は大文字で書き、それ以外の名前は小文字で書きます。<br />僕は予約語のうち、「DATABASE」と「TABLE」だけは小文字で、それ以外は大文字で書きます。<br />特に理由はありません。<br />なんとなくです。
<h3>自由記述形式</h3>
sqlでは各単語は空白類似文字(スペース・改行文字・タブ文字)で区切りますが、その空白類似文字の種類や空白類似文字の数は気にしません。<br />したがって、以下のsqlは全て同じ命令文と認識されます。
<code class="sql">
	SHOW database;

	SHOW    database;

	SHOW
	database;
</code>
<img src="../pics/sql-自由記述形式.gif" alt="sqlの書き方" />
<h3>文字列表記</h3>
sqlで文字列を表記するには「'(シングルクォーテーション)」ないしは「"(ダブルクォーテーション)」で囲んで表現します。<br />標準のsqlでは「'(シングルクォーテーション)」で囲むことになっているため、ここでも「'(シングルクォーテーション)」で囲んで表記します。
<code class="sql">
	INSERT INTO ポケモン
	VALUES (25, 'ピカチュウ', 'でんき', 'なし');
</code>
<h2>コメントアウト</h2>
sql文の中にコメントアウトを書くこともできます。<br />コメントアウトは「/*」と「*/」で囲みます。
<code class="sql">
	SHOW /*コメントアウト*/ databases;
</code>
<img src="../pics/sql-コメントアウト.gif" alt="sqlの書き方" />
コメントアウトは空白文字一文字として認識されるため、例えば以下のコードはエラーとなります。
<code class="sql">
	SH/*コメントアウト*/OW databases;
</code>
<div class="separator"></div>
「--(ハイフンふたつ)」以から行末までもコメントアウトとなりますが、見やすさの観点から原則として「/**/」で書くべきです。
<?php footer(); ?>