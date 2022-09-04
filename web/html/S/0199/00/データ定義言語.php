<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-02",
	"updated" => "2022-02-02"
);
head($obj);
?>
<h2>データ定義言語</h2>
DDL(Data Definition Language)と略されます。<br />データベースのデータ構造を定義する言語です。<br />データベース・テーブル・行・列のの作成・表示・削除を行うsqlが該当します。<br />sqlでデータを操作するためにはデータを格納する部分が必要なので、まずはデータ定義言語から学びましょう♪
<h2>データベースの操作</h2>
データベースの操作に関しては以下の4つを学びます。
<ul>
	<li>データベース一覧の表示</li>
	<li>データベースの作成</li>
	<li>データベースの削除</li>
	<li>データベースの選択</li>
</ul>
<h3>データベース一覧の表示</h3>
既に使用済みのsqlです。<br />以下のsqlを使用します。
<code class="sql">
	SHOW databases;
</code>
これでデータベース一覧が表示されます。
<img src="../pics/show-databases.png" alt="show databases" />
デフォルトのデータベースが表示されます。<br />これらに関しては無視してok!です。
<h3>データベースの作成</h3>
次はデータベースを作成しましょう♪<br />以下のsql文を実行します。
<code class="sql">
	CREATE database データベース名;
</code>
では「koko」という名前のデータベースを作成しましょう♪
<code class="sql">
	CREATE database koko;
</code>
<img src="../pics/create-database.gif" alt="create database" />
<div class="separator"></div>
通常はひとつのシステムにつき、ひとつのデータベースを作成します。<br />データが大量に存在する場合には、データベースを複数作成するのではなく、データベースに含まれるテーブルを複数作成してそれらを連結させて複雑なデータを管理します。
<h3>データベースの削除</h3>
今度は作成したデータベースを削除してみましょう♪<br />以下のsql文を実行します。
<code class="sql">
	DROP database データベース名;
</code>
では先ほど作成した「koko」データベースを削除してみましょう♪
<code class="sql">
	DROP database koko;
</code>
<img src="../pics/drop-database.gif" alt="drop database" />
<h3>データベースの選択</h3>
テーブルの操作を行うには、どのデータベースかを指定する必要があります。<br />作業中のデータベースを設定・変更するには以下のsqlを実行します。
<code class="sql">
	USE データベース名;
</code>
これで現在作業中のデータベースが設定・変更されます。<br />また、現在作業中のデータベースを確認するためには以下のsqlを実行します。
<code class="sql">
	SELECT database();
</code>
<img src="../pics/use.gif" alt="use" />
<h2>データ型</h2>
次にテーブルの作成と行きたいところなのですが、、、<br />最初にデータ型について説明します。<br />データベースに保存するデータには「型」が存在します。<br /><br />例えば日付であったり、数字であったり、文字列であったり、、、<br /><br />まずは、このデータ型について覚えましょう♪
<p class="r">いきなり全てを覚える必要はありません。<br />こんなものがあるんだな程度に覚えてください。</p>
<table>
	<caption>データ型</caption>
	<tbody>
		<tr>
			<th>INTEGER</th>
			<td>整数を表すデータ型です。</td>
		</tr>
		<tr>
			<th>FLOAT</th>
			<td>浮動小数点数を表すデータ型です。<br />通常はこれを用いればok!です。</td>
		</tr>
		<tr>
			<th>DOUBLE</th>
			<td>倍精度浮動小数点数を表すデータ型です。<br />小数点以下7桁を超える場合はこちらを使用します。</td>
		</tr>
		<tr>
			<th>DECIMAL</th>
			<td>小数を表すデータ型です。<br />「-999.99 ～ 999.99」の範囲ならこれを使用します。</td>
		</tr>
		<tr>
			<th>CHAR</th>
			<td>固定長の文字列型です。<br />入力される文字列の長さが予め分かっている場合に使用します。<br />サイズ(文字数)は「CHAR(10)」のように括弧の中で指定します。</td>
		</tr>
		<tr>
			<th>VARCHAR</th>
			<td>可変長の文字列型です。<br />入力される文字列の長さが分からない場合に使用します。<br />サイズ(文字数)は「VARCHAR(10)」のように括弧の中で指定します。</td>
		</tr>
		<tr>
			<th>DATETIME</th>
			<td>日付と時間を表すデータ型です。</td>
		</tr>
		<tr>
			<th>DATE</th>
			<td>日付を表すデータ型です。</td>
		</tr>
		<tr>
			<th>TIME</th>
			<td>時間を表すデータ型です。</td>
		</tr>
	</tbody>
</table>
<h2>テーブルの操作</h2>
では今度はテーブルを操作してみましょう♪<br />以下の4つを学びます。
<ul>
	<li>テーブル一覧の表示</li>
	<li>テーブルの作成</li>
	<li>テーブルの構造の表示</li>
	<li>テーブルの削除</li>
</ul>
<h3>テーブル一覧の表示</h3>
テーブル一覧の表示はデータベースと同様に「SHOW」を使用します。
<code class="sql">
	SHOW tables;
</code>
<p class="r">これを実行するには予め「USE」で現在作業中のデータベースを設定する必要があります。</p>
では先ほど作成した「koko」データベースのテーブル一覧を表示しましょう♪
<code class="sql">
	USE koko;
	SHOW tables;
</code>
<img src="../pics/show-tables.gif" alt="show tables" />
まだテーブルを作成していないため、何も表示されません。
<h3>テーブルの作成</h3>
ではテーブルを作成してみましょう♪<br />テーブルを作成するには以下のように記述します。
<code class="sql">
	CREATE table テーブル名 (
		カラム名 データ型,
		カラム名 データ型,
		カラム名 データ型
	);
</code>
カラムにオプションやプライマリーキーを設定する場合には以下のsql文を実行します。
<code class="sql">
	CREATE table テーブル名 (
		カラム名 データ型 オプション,
		カラム名 データ型 オプション,
		カラム名 データ型 オプション,
		PRIMARY KEY (カラム名)
	);
</code>
オプションでは連番設定やナル制約などを設定することができます。<br />オプションについてはここでは詳しく説明しませんが、「AUTO_INCREMENT」を設定すると自動的に「1」から始まる連番が振られます。<br /><br />「PRIMARY KEY」とは重複が許されない一意(オンリーワン)である必要がある列に設定します。<br />例えばidは重複が許されないため、通常はidに設定します。
<div class="separator"></div>
では、実際にテーブルを作成してみましょう♪<br />ここではポケモンの情報を格納する「pokemon」テーブルを作成します。<br />カラムは以下の4つ設定します。
<table>
	<tbody>
		<tr>
			<th>図鑑番号</th>
			<td>INT</td>
		</tr>
		<tr>
			<th>名前</th>
			<td>CHAR</td>
		</tr>
		<tr>
			<th>タイプ1</th>
			<td>CHAR</td>
		</tr>
		<tr>
			<th>タイプ2</th>
			<td>CHAR</td>
		</tr>
	</tbody>
</table>
<code class="sql">
	CREATE table pokemon (
		図鑑番号 INTEGER,
		名前 CHAR(10),
		タイプ1 CHAR(10),
		タイプ2 CHAR(10),
		PRIMARY KEY (図鑑番号)
	);
</code>
<img src="../pics/create-table.gif" alt="create table" />
<h3>テーブルの構造の表示</h3>
作成したテーブルの構造を表示するには以下のsql文を実行します。
<code class="sql">
	DESCRIBE テーブル名;
</code>
作成したテーブルの詳細情報が表示されます。
<img src="../pics/describe-table.gif" alt="describe table" />
<h3>テーブルの削除</h3>
テーブルを削除するには以下のsql文を実行します。
<code class="sql">
	DROP テーブル名;
</code>
<img src="../pics/drop-table.gif" alt="drop table" />
<?php footer(); ?>