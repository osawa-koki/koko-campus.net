<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-02",
	"updated" => "2022-02-02"
);
head($obj);
?>
<h2>インデックス</h2>
インデックスとは、索引の意味で検索を高速化するために使用される技術です。<br />以下のように設定します。
<code class="sql">
	CREATE INDEX インデックス名 ON テーブル名 (カラム名);
</code>
これによってインデックスが設定されたカラムを使用した検索が高速化されますが、インデックスを乱用すると通常のsql文の実行に係るオーバヘッドが増加して実行効率の低下につながります。<br />インデックスは検索時により利用するカラムに対してのみ設定するべきです。
<div class="separator"></div>
インデックスを削除するには以下のように記述します。
<code class="sql">
	DROP INDEX インデックス名
	ON テーブル名;
</code>
<h2>ビュー</h2>
元のテーブルからの問合せを用いて作成する仮想的なテーブルを言います。<br />テーブル全体のデータのうち、良く用いる部分だけを切り取って作成した簡単なテーブルだと思えばok!です。
<p class="r">正確にはSELECT文をまとめて、ビューの呼び出し時に毎回SELECT文を実行するだけです。</p>
sql文を簡単に書くために使用されますが、実行効率が低下する危険性があります。<br />ビューの作成には以下のsql文を実行します。
<code class="sql">
	CREATE VIEW ビュー名
	AS SELECT文;
</code>
これ以降はテーブル全体からではなくて、FROMの対象を作成したビューに設定することでテーブルの一部から取得することが可能です。<br /><br />また、テーブル全体から機密情報だけを除いたビューを作成してセキュリティ向上目的で使用されることもあります。<br /><br />では、ほのおタイプのポケモンを格納するビューを作成してみましょう♪
<code class="sql">
	CREATE VIEW ほのお AS
	SELECT *
	FROM pokemon
	WHERE (タイプ1 = 'ほのお')
		OR (タイプ2 = 'ほのお');
</code>
これで、ほのおタイプを格納するビューが作成されました。<br />確認してみましょう♪
<code class="sql">
	SELECT *
	FROM ほのお;
</code>
<img src="../pics/ビュー(1).png" alt="ビュー" />
これを用いてほのおタイプ単体のポケモンを抽出してみましょう♪
<code class="sql">
	SELECT *
	FROM ほのお
	WHERE タイプ2 IS NULL;
</code>
<img src="../pics/ビュー(2).png" alt="ビュー" />
あくまでもビュー定義時に設定したSELECT文を展開しているだけです。<br />したがって、上のコードは以下のコードに展開されて実行されます。
<code class="sql">
	SELECT *
	FROM (
		SELECT *
		FROM pokemon
		WHERE (タイプ1 = 'ほのお')
			OR (タイプ2 = 'ほのお')) AS ダミー
	WHERE タイプ2 IS NULL;
</code>
<div class="separator"></div>
ビューを削除するには以下のように書きます。
<code class="sql">
	DROP VIEW ビュー名;
</code>
<?php footer(); ?>