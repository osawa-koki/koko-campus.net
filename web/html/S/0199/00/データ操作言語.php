<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-02",
	"updated" => "2022-02-02"
);
head($obj);
?>
<h2>データ操作言語</h2>
「data manipulation language」で、「DML」と略されます。<br />データの検索・更新・削除・追加を行うための言語です。<br /><br />最も基本的なsqlで、おそらく一番よくのでしっかりマスターしましょう♪<br /><br />具体的には以下の4つの文を学びます。
<ul>
	<li>INSERT(追加)</li>
	<li>SELECT(検索)</li>
	<li>UPDATE(更新)</li>
	<li>DELETE(削除)</li>
</ul>
<h2>INSERT文</h2>
では先ほど作成したテーブルにデータを追加しましょう♪<br />以下のsql文を実行します。
<code class="sql">
	INSERT INTO テーブル名
	VALUES (データ1, データ2, データ3, ...);
</code>
データはテーブル作成時に決定したカラムの順番に記載するか、以下のようにカラム名を指定して書きます。
<code class="sql">
	INSERT INTO テーブル名
		(カラム名, カラム名, カラム名, ...)
	VALUES (データ1, データ2, データ3, ...);
</code>
通常は順番を意識して順番に記載する方法が好まれます。<br />ここでも順番通りにINSERT文を書きます。<br /><br />では実際にポケモンを追加してみましょう♪
<code class="sql">
	INSERT INTO pokemon
	VALUES (1, 'フシギダネ', 'くさ', 'どく');

	INSERT INTO pokemon
	VALUES (6, 'リザードン', 'ほのお', 'ひこう');

	INSERT INTO pokemon
	VALUES (7, 'ゼニガメ', 'みず', 'なし');

	INSERT INTO pokemon
	VALUES (20, 'ラッタ', 'ノーマル', 'なし');

	INSERT INTO pokemon
	VALUES (25, 'ピカチュウ', 'でんき', 'なし');

	INSERT INTO pokemon
	VALUES (28, 'キュウコン', 'ほのお', 'なし');

	INSERT INTO pokemon
	VALUES (52, 'ニャース', 'ノーマル', 'なし');

	INSERT INTO pokemon
	VALUES (73, 'ドククラゲ', 'みず', 'どく');

	INSERT INTO pokemon
	VALUES (110, 'マタドガス', 'どく', 'なし');

	INSERT INTO pokemon
	VALUES (116, 'タッツー', 'みず', 'なし');
</code>
<img src="../pics/insert.png" alt="insert" />
<h2>SELECT文</h2>
ここからは第七世代までの802匹の全てのポケモンを挿入したデータベースを使用して説明をします。<br />僕はcsvファイルからまとめてインポートしましたが、この方法は後ほど説明しますのでここでは気にしなくてok!です。<br /><br />では、データベースから条件を満たすデータを抽出しましょう♪<br />以下のように書きます。
<code class="sql">
	SELECT カラム名
	FROM テーブル名
	(WHERE 条件);
</code>
<p class="r">WHERE句は省略可能です。</p>
<div class="separator"></div>
幾つかの例を紹介します。<br /><br />最初にタイプ1がほのおであるポケモンの名前を検索します。
<code class="sql">
	SELECT 名前
	FROM pokemon
	WHERE タイプ1 = 'ほのお';
</code>
<img src="../pics/select(1).png" alt="select" />
次はどくタイプのポケモンを検索しましょう♪<br />どくタイプである条件は、タイプ1がどく、<strong>または</strong>タイプ2がどくであることです。<br />または(論理和)は「OR」を使用します。<br /><br />また、名前だけではなくて、図鑑番号も取得しましょう♪
<code class="sql">
	SELECT 図鑑番号, 名前
	FROM pokemon
	WHERE タイプ1 = 'どく' OR タイプ2 = 'どく';
</code>
<img src="../pics/select(2).png" alt="select" />
今度はほのお・ひこうタイプのポケモンを取得しましょう♪<br />タイプ1がほのおで、<strong>かつ</strong>タイプ2がひこうであるポケモンの抽出です。<br />かつ(論理積)は「AND」を使用します。
<p class="r">正確にはタイプ1がひこう、タイプ2がほのおタイプのポケモンも含めるべきなのですがここでは省略します。</p>
<code class="sql">
	SELECT 図鑑番号, 名前
	FROM pokemon
	WHERE タイプ1 = 'ほのお' AND タイプ2 = 'ひこう';
</code>
<img src="../pics/select(3).png" alt="select" />
最後に全てのデータを取得してみましょう♪<br />全てのカラムは「*(アスタリスク)」で指定します。<br />また条件は課さないため、WHERE句は省略します。
<code class="sql">
	SELECT *
	FROM pokemon;
</code>
<img src="../pics/select(4).png" alt="select" />
<h2>UPDATE文</h2>
UPADTE文ではデータを更新します。
<code class="sql">
	UPADTE テーブル名
	SET カラム = セットする値
	(WHERE 条件);
</code>
<p class="r">WHERE句は省略可能ですが、省略すると全ての行が同じ値になってしますので通常は省略しません。</p>
ではほのおタイプを炎タイプに書き換えてみましょう♪
<code class="sql">
	UPDATE pokemon
	SET タイプ1 = '炎'
	WHERE タイプ1 = 'ほのお';

	UPDATE pokemon
	SET タイプ2 = '炎'
	WHERE タイプ2 = 'ほのお';
</code>
<img src="../pics/update.png" alt="update" />
<h2>DELETE文</h2>
指定した行を削除します。
<code class="sql">
	DELETE
	FROM テーブル名
	(WHERE 条件);
</code>
<p class="r">WHERE句は省略可能ですが、省略すると全ての行を削除してしまうので通常は省略しません。</p>
ではむしタイプのポケモンを削除しましょう♪
<code class="sql">
	DELETE
	FROM pokemon
	WHERE タイプ1 = 'むし' OR タイプ2 = 'むし';
</code>
<img src="../pics/delete.png" alt="delete" />
<?php footer(); ?>