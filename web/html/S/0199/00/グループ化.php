<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-02",
	"updated" => "2022-02-02"
);
head($obj);
?>
<h2>集計関数</h2>
テーブル全体に対して使用する関数です。<br />例えばある列のデータ全体の平均や合計を算出する際に使用します。<br />ここでは以下の関数を学びます。
<ul>
	<li>SUM</li>
	<li>AVG</li>
	<li>MIN</li>
	<li>MAX</li>
</ul>
ここでは気象庁が報告している天気を用いて説明します。<br />我らが大都会、「草加」のデータがなかったので「越谷」の天気を使用します。<br />1980年01月01日から2022年02月02日までの平均気温・最高気温・最低気温を操作します。<br /><br />とにかく大量のデータなんです、、、<br />これを見てください。<br />本番ではもっと大量のデータを扱うことになると思いますけど、、、
<img src="../pics/越谷の天気.gif" alt="越谷の天気" />
まずは最高気温の合計・平均・最高・最低を取得しましょう♪
<p class="r">合計を求めることには何の意味もありませんが、練習のためと思ってください。</p>
<code class="sql">
	SELECT
		SUM(平均気温) AS 合計,
		AVG(平均気温) AS 平均,
		MAX(平均気温) AS 最高,
		MIN(平均気温) AS 最低
	FROM 越谷の天気;
</code>
集計関数と括弧の間にスペースを入れるとエラーになります。
<img src="../pics/集計関数.png" alt="集計関数" />
ややこしいですけど、平均気温の「平均」「最高」「最低」です。
<div class="separator"></div>
因みにですけど、過去40年間で最も寒かった日と扱った日の気温は何度だったと思いますか???<br />確認してみましょう♪
<code class="sql">
	SELECT
		MAX(最高気温) AS 最高,
		MIN(最低気温) AS 最低
	FROM 越谷の天気;
</code>
<img src="../pics/最高・最低.png" alt="集計関数" />
ほんとに!?!?<br />いつなのでしょうか???
<code class="sql">
	SELECT *
	FROM 越谷の天気
	WHERE (最高気温 = 40)
		OR (最低気温 = -8);
</code>
<img src="../pics/最高・最低(日付).png" alt="集計関数" />
「-8°C」はつい最近ですね、、、<br />記憶にないです、、、
<h2>計数関数</h2>
データの件数を取得します。<br />集計関数に含めることもあります。<br />COUNT関数を使用します。<br />引数に「*」を使用した場合はNULLを含んだ件数を返し、引数に列名を使用した場合はNULLを除いた件数を返します。
<code class="sql">
	SELECT
		COUNT(*) AS 全体,
		COUNT(平均気温) AS データ件数,
		COUNT(*) - COUNT(平均気温) AS 欠損
	FROM 越谷の天気;
</code>
<img src="../pics/count.png" alt="計数関数" />
<h2>グループ化</h2>
グループ化とは集計前に指定した基準で検索結果を分類することを言います。<br />例えば、あるタイプのポケモンの種族値の平均や最高・最低、ポケモンの総数を求める際に使用します。<br />グループ化は以下のように書きます。
<code class="sql">
	SELECT カラム名(, 集計関数)
	FROM テーブル名
	GROUP BY 基準となるカラム;
</code>
グループ化では通常は集計関数を使用します。<br />基準となるカラムを設定してそれに対して集計関数を適用します。
<div class="separator"></div>
では、最初にタイプ1を基準にグループ化して、その総数を取得しましょう♪<br />使用するテーブルはポケモンに戻します。
<code class="sql">
	SELECT タイプ1, COUNT(名前) AS ポケモンの数
	FROM pokemon
	GROUP BY タイプ1;
</code>
<img src="../pics/グループ化(1).png" alt="グループ化" />
では、次はポケモンの種族値テーブルを使用して、各タイプのポケモンのHP種族値の平均を求めましょう♪
<code class="sql">
	SELECT タイプ1, AVG(HP) AS HPの平均
	FROM status
	GROUP BY タイプ1;
</code>
<img src="../pics/グループ化(2).png" alt="グループ化" />
<h2>グループ化での絞り込み</h2>
グループ化をした際に通常のWHERE句を用いて絞り込みを行うと、グループ化前のデータに対して絞り込みが行われます。<br />グループ化されたデータに対して絞り込みを行う場合にはHAVING句を使用します。
<div class="separator"></div>
では先ほどと同様にタイプ1を基準にグループ化して、WHERE句とHAVING句を使用した絞り込みの結果を確認しましょう♪<br /><br />最初にWHERE句を使用してHPの種族値が70以上という条件を課します。
<code class="sql">
	SELECT タイプ1, AVG(HP) AS HPの平均, COUNT(HP)
	FROM status
	WHERE 70 &lt;= HP
	GROUP BY タイプ1;
</code>
<img src="../pics/グループ化-where.png" alt="グループ化(WHERE)" />
この方法では最初にHP種族値が70未満のポケモン(フシギダネ・フシギソウ・ヒトカゲ・リザード・ゼニガメ・カメール・etc...)を除いてグループ化をしています。
<div class="separator"></div>
次にHAVING句を使用して絞り込みを行いましょう♪
<code class="sql">
	SELECT タイプ1, AVG(HP) AS HPの平均, COUNT(HP)
	FROM status
	GROUP BY タイプ1
	HAVING 70 &lt;= AVG(HP);
</code>
<img src="../pics/グループ化-having.png" alt="グループ化(HAVING)" />
この方法では全てのポケモンを対象にタイプ1を基準にグループ化した後に、HPの平均が70以上のタイプのみを表示しています。<br />したがって、進化前のHP種族値が低いポケモンが多いくさタイプやむしタイプは表示されていません。
<?php footer(); ?>