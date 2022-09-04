<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-02",
	"updated" => "2022-02-02"
);
head($obj);
?>
<h2>AS句</h2>
SELECT文で取得する際に、カラム名やテーブル名に別名を付けることができます。
<code class="sql">
	SELECT カラム1 AS カラム1の別名, カラム2 AS カラム2の別名, ...
	FROM テーブル名
	(WHERE 条件);
</code>
では図鑑をnumber、名前をname、タイプをtypeとしてデータを全てのデータを取得しましょう♪
<code class="sql">
	SELECT 図鑑番号 AS number, 名前 AS name, タイプ1 AS type1, タイプ2 AS type2
	FROM pokemon;
</code>
<img src="../pics/as.png" alt="AS句" />
<h2>DISTINCT句</h2>
SELECT文にDISTINCT句を設定すると、DISTINCT句で設定されたカラムに対して重複を排除した状態で取得できます。
<code class="sql">
	SELECT DISTINCT カラム
	FROM テーブル名
</code>
では、ポケモンのタイプ一覧を取得しましょう♪<br />タイプ一覧を取得するのに重複した部分は不要なのでこれをDISTINCT句を使用して排除します。
<code class="sql">
	SELECT DISTINCT タイプ1
	FROM pokemon;
</code>
<img src="../pics/distinct.png" alt="DISTINCT句" />
<h2>ORDER BY句</h2>
結果を整理して表示します。
<code class="sql">
	SELECT カラム名
	FROM テーブル名
	ORDER BY カラム名 並び順
</code>
並び順には以下の2つが指定可能です。
<table>
	<caption>並び順</caption>
	<tbody>
		<tr>
			<th>ASC</th>
			<td>昇順で並び替えます。</td>
		</tr>
		<tr>
			<th>DESC</th>
			<td>降順で並び替えます。</td>
		</tr>
	</tbody>
</table>
<div class="separator"></div>
では実際に並び替えましょう♪<br />まずは昇順から、、、
<code class="sql">
	SELECT *
	FROM pokemon
	ORDER BY 名前 ASC;
</code>
<img src="../pics/order-by_asc.png" alt="ORDER BY句" />
次は降順で、、、
<code class="sql">
	SELECT *
	FROM pokemon
	ORDER BY 名前 DESC;
</code>
<img src="../pics/order-by_desc.png" alt="ORDER BY句" />
<h2>UNION演算子</h2>
複数の検索結果を合体させて表示します。<br />例えば、ポケモン全てをひとつのテーブルで管理すると膨大な量になってしまうので世代ごとに分けた際に、結果をまとめて表示する場合などに使用されます。
<code class="sql">
	SELECT ...
	UNION
	SELECT ...
</code>
第一世代・第二世代・第三世代のポケモンをそれぞれgen1・gen2・gen3テーブルに保存しました。<br />第一世代からはほのおタイプ単体、第二世代からはくさタイプ単体、第三世代からはみずタイプ単体のポケモンを取得しましょう♪
<code class="sql">
	SELECT *
		FROM gen1
		WHERE タイプ1 = 'ほのお' AND タイプ2 IS NULL
	UNION
	SELECT *
		FROM gen2
		WHERE タイプ1 = 'くさ' AND タイプ2 IS NULL
	UNION
	SELECT *
		FROM gen3
		WHERE タイプ1 = 'みず' AND タイプ2 IS NULL;
</code>
<img src="../pics/union.png" alt="UNION演算子" />
<p class="r">結合させて表示する結果の列の数は同じである必要があります。</p>
これで世代を指定する際に図鑑番号で指定しなくてもよくなりました♪<br />UNION演算子では重複している行をまとめて表示するのに対して、UNION ALL演算子を使用すれば重複している行もそのまま表示します。
<?php footer(); ?>