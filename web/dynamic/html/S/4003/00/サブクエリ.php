<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-05-10",
	"updated" => "2022-05-10"
);
head($obj);
?>
<h2>サブクエリ</h2>
「副問い合わせ」とも言います。<br />SELECT文の実行結果を別のSELECT文で使用することで、もっと簡単に説明すると、SELECT文をネスト(入れ子)にすることを言います。<br /><br />これを習得することで複雑なデータ処理が可能になりますが、乱用は厳禁です。<br />理由は入れ子が複数連なると、コードが見づらくなるからです。<br /><br />できるのであれば、他の手法を使用して、サブクエリ以外を使用できない、または使用するとコードが冗長化する場合にのみ使用しましょう♪
<div class="separator"></div>
最初に使用するデータセットを紹介します。
<img src="../pics/サブクエリ-データセット.gif" alt="サブクエリで使用するデータセット" />
<div class="separator"></div>
最初に簡単にサブクエリの書き方を紹介します。<br />サブクエリとなるSELECT文全体を括弧で囲むだけです。
<code class="sql">
	SELECT *
	FROM
		(
			SELECT *
			FROM table
			WHERE condition
		) AS 別名
	WHERE condition;
</code>
今回はFROM句の対象としてサブクエリの結果を使用しましたが、これに限定されているわけではなく、他の使用方法もあります。<br /><br />また、サブクエリの結果にはAS句を使用して別名をつける必要があります。
<h2>データ構造の種類</h2>
サブクエリの結果として取得されるデータの構造として以下の3つがあります。<br />これをしっかり抑えましょう♪
<ul>
	<li>スカラ型</li>
	<li>ベクタ型</li>
	<li>マトリックス型</li>
</ul>
それぞれ、以下のような構造です。
<table>
	<tbody>
		<tr>
			<th>スカラ型</th>
			<td>単一の値。</td>
		</tr>
		<tr>
			<th>ベクタ型</th>
			<td>一次元に並んだ値。<br />横に並んだ行ベクタと縦に並んだ列ベクタに分けることができますが、ここでは縦に並んだ列ベクタを想定します。</td>
		</tr>
		<tr>
			<th>マトリックス型</th>
			<td>二次元に並んだ値。<br />一般的な表と呼ばれるものが該当します。</td>
		</tr>
	</tbody>
</table>
<img src="../pics/scalar-vector-matrix.svg" alt="スカラ ベクタ マトリックス" />
<p>画像は<a href="https://www.mathsisfun.com/algebra/scalar-vector-matrix.html">mathsisfun.com</a>より。</p>
サブクエリを使用する際にはサブクエリが返すデータの構造がどれであるのかをまず最初に確認しましょう♪
<h2>サブクエリ(スカラ)</h2>
では、早速サブクエリを使用したSQLを実行してみましょう♪<br />最初はスカラ型のデータを返すサブクエリを実行します。<br /><br />1年生の平均点よりも高い点数を取得した人を表示します。
<code class="sql">
	SELECT *
	FROM test_score
	WHERE (
		SELECT AVG(score) AS score
		FROM test_score
		WHERE grade = 1
	) &lt; score
	AND grade &lt;&gt; 1;
</code>
<img src="../pics/サブクエリ-スカラ.gif" alt="サブクエリ(スカラ)" />
これを実現しようとすると以下のSQLを書く人が多いと思います。
<code class="sql">
	SELECT *
	FROM test_score
	WHERE AVG(score) &lt; score
		AND grade &lt;&gt; 1;
</code>
<img src="../pics/サブクエリ-スカラ(失敗).gif" alt="サブクエリ(スカラ)" />
これは、集計関数を使用する際にはガチャガチャ状態になってしまうため、集計関数以外の値を同時に使用することはできないためです。<br /><br />このような場合にはサブクエリを使用する必要があります。
<h2>サブクエリ(ベクタ)</h2>
今度はベクタ型です。<br />一般的にはANY/ALL句と合わせて使用します。<br /><br />これらは、複数の値との関係演算の際に使用されます。<br /><br />以下のように書きます。
<code class="sql">
	値 関係演算子 ANY(値1, 値2, ...)
	-- or
	値 関係演算子 ALL(値1, 値2, ...)
</code>
ANYはその後の複数の値との関係演算のうち、ひとつでも満たせば「真」となり、ALLは全て満たした場合に「真」となります。<br /><br />では、一年生のいずれかの点数よりも高い点数をとった人を取得しましょう♪
<code class="sql">
	SELECT *
	FROM test_score
	WHERE score &gt; ANY(
		SELECT score
		FROM test_score
		WHERE grade = 1
	)
	AND grade &lt;&gt; 1;
</code>
<img src="../pics/any.gif" alt="ANY" />
次は、一年生全員よりも高い点数を取った人を表示しましょう♪
<code class="sql">
	SELECT *
	FROM test_score
	WHERE score &gt; ALL(
		SELECT score
		FROM test_score
		WHERE grade = 1
	)
	AND grade &lt;&gt; 1;
</code>
<img src="../pics/all.gif" alt="ALL" />
これらは、最大値・最小値を求めてそれと比較してもok!ですが、、、<br />というかその方がパフォーマンスはいいです、、、
<h2>サブクエリ(マトリックス)</h2>
最後にマトリックスを返すサブクエリ使用しましょう♪<br />サブクエリで表を取得して、その表からさらに検索を行う感じです。<br /><br />使用するデータセットを追加します。
<img src="../pics/サブクエリ-データセット2.gif" alt="サブクエリで使用するデータセット" />
では、サブクエリでテーブル2つの集合を取得して、それを操作します。
<code class="sql">
	SELECT *
	FROM (
		SELECT 't_group1' AS gr, *
		FROM test_score
		UNION ALL
		SELECT 't_group2' AS gr, *
		FROM test_score2
	) AS subq
	WHERE grade = 3;
</code>
<img src="../pics/サブクエリ-マトリックス.gif" alt="サブクエリ(マトリックス)" />
<h2>EXISTS</h2>
EXISTS句は理解が困難かもしれません。<br />簡単に説明すると、テーブルを結合させる必要はないが、外部のテーブルの結果が必要な場合に使用します。<br />その性質上、ほとんどサブクエリと同じ機能を持ちますが、多くのプログラマは両者を分けて扱うことを好みます。<br /><br />具体的には以下の2つのパターンに分類できます。
<ul>
	<li>存在確認</li>
	<li>相関サブクエリ</li>
</ul>
これらは共に条件として設定するため、「WHERE EXISTS」の形で使用することが多いです。
<h3>存在確認</h3>
外部のテーブルでのある条件を満たした場合に外側のSQL文が実行されます。<br />例えば、技テーブルに威力100以上の技が登録されていたら、そのポケモン全てを表示します。
<code class="sql">
	SELECT *
	FROM my_pokemon
	WHERE EXISTS(
		SELECT *
		FROM waza
		WHERE my_pokemon.waza = waza.waza
			AND 100 &lt;= waza.power
	);
</code>
<img src="../pics/存在確認(あり).gif" alt="EXISTS句(存在確認)" />
これは「ボルテッカー(120)」と「ストーンエッジ(100)」が登録されているため、表示されます。<br /><br />これを250以上の技に変更すると、条件を満たさなくなるため、表示されません。
<code class="sql">
	SELECT *
	FROM my_pokemon
	WHERE EXISTS(
		SELECT *
		FROM waza
		WHERE my_pokemon.waza = waza.waza
			AND 250 &lt;= waza.power
	);
</code>
<img src="../pics/存在確認(なし).gif" alt="EXISTS句(存在確認)" />
<h3>相関サブクエリ</h3>
外部のテーブルでのある条件を満たす行を取得します。<br /><br />ほとんどテーブルの結合と同じですが、外側(呼び出し元)のクエリでは内側(呼び出し先)の列を選択できません。<br />あくまでも、条件を外部のテーブルに委ねる場合に使用されます。
<code class="sql">
	SELECT *
	FROM my_pokemon
	WHERE EXISTS(
		SELECT *
		FROM waza
		WHERE my_pokemon.waza = waza.waza
			AND 100 &lt;= waza.power
	);
</code>
<img src="../pics/相関サブクエリ.gif" alt="相関サブクエリ" />
<?php footer(); ?>