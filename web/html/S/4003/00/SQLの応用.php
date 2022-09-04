<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-05-10",
	"updated" => "2022-05-10"
);
head($obj);
?>

<h2>SQL文応用</h2>
別に応用っていうほど高度な内容ではありませんが、、、<br />いわゆる4大文法の一歩先にあるということから応用とします。<br /><br />このページでは以下の内容を学習します。
<ul>
	<li>LIKE</li>
	<li>BETWEEN</li>
	<li>ORDER BY</li>
	<li>IN</li>
	<li>AS</li>
	<li>DISTINCT</li>
	<li>集計</li>
	<li>SELECT INTO</li>
</ul>
と、その前に簡単のために説明を省略した内容があるため、それを幾つか説明します。
<h2>条件式</h2>
先ほどは条件について説明する時にその条件を満たすか否かだけ説明しましたね♪<br />ここから先は複雑な条件を使用することがあると思いますので、より詳細に説明します。<br /><br />WHERE句で書いた条件とは条件式のことを指し、条件式とはその評価結果に「真(True)」か「偽(False)」のいずれかを返すものを言います。<br /><br />例えば、「1 = 1」は「真」で、「1 = 2」は「偽」となります。<br />また、「真 AND 偽」は「偽」で、「真 OR 偽」は「真」となります。<br /><br />ここから先に条件式を書く際にはその評価結果が真偽値(真 or 偽)を返すものだけを書くように注意してください。<br />したがって、「WHERE 'ピカチュウ'」は不適切な条件です。<br />「ピカチュウ」は真偽値ではありませんので、、、
<div class="separator"></div>
条件式の結果(真偽値)を逆転させるための演算子として「NOT」があります。<br />これを使用して否定を用いた演算を行います。
<h2>NULL</h2>
データが入っていないことを示します。<br />下の画像で「NULL」と表示されていて、背景が薄い黄色となっているセルがNULLです。
<img src="../pics/null-確認.gif" alt="NULL" />
NULLとは本当に空っぽを意味します。<br />本当に本当に空っぽです。<br />ホントにホントにホントにホントに空っぽです。<br />皆さんが今、想像した空っぽよりも空っぽです。<br /><br />まだ、皆さんはNULLの空っぽさ加減を理解できていません。<br />例えば、「あいうえお」という文字列がありますよね♪<br />これを後ろからひとつずつ削除していきます。
<ol>
	<li>あいうえお</li>
	<li>あいうえ</li>
	<li>あいう</li>
	<li>あい</li>
	<li>あ</li>
	<li></li>
</ol>
「6」のリストは空っぽっぽいですね<br /><br />いいえ、空っぽではありません。<br />何もない文字列があります。<br /><br />これはNULLではありません。<br /><br />NULLとはホントにホントにホントにホントに空っぽです。<br />これをまずは覚えてください。<br /><br />技術的な説明をすると、INSERTでデータを代入しなかった場合、NULLをそのまま代入した場合にNULLとなります。
<h2>三値理論</h2>
「Q. 10は5よりも大きいですか???」<br />「A. はい(真)」<br /><br />「Q. "ぴかちゅう"は"ザシアン"ですか???」<br />「A. いいえ(偽)」<br /><br />「Q. あなたは10年後も現在の仕事を続けていますか???」<br />「?????」<br /><br />どうでしょうか???<br /><br />この質問って「YES」or「NO」で答えられませんよね、、、<br /><br />全ては「YES」or「NO」で答えられるという理論を「二値理論」と言い、一般的なプログラミング言語ではこちらが採用されsqlています。<br />これは神の論理とも呼ばれ、神だったら全てを知っているという前提に基づいています。<br /><br />しかしながら、我々は神ではありません。<br />「知らない」こともあります。<br /><br />ということで、「YES」or「NO」だけで答える二値理論は不十分です。<br /><br />三値理論では「YES」「NO」に加えて「UNKNOWN(分からない)」も使用可能です。<br /><br />より現実っぽいですけど、これが厄介なんですよね、、、<br />データがなければそのそも結論が分かりません。<br />データベースには値が存在しないことを意味するNULLという概念があることは説明済みです。<br />したがって、NULLに対する演算は全てUNKNOWNとなります。<br /><br />言い換えれば、以下の条件式の評価結果は「偽」となります。
<code class="sql">
	WHERE NULL = NULL
</code>
NULLはNULLだよ!!!<br />結果は「真」だよ!!!<br /><br />って思うかもしれませんが、NULLをNULLと比較することはできません。<br /><br />NULLかどうかを判定するには以下の構文を使用する必要があります。
<code class="sql">
	値 IS NULL
</code>
これでok!です。<br /><br />反対に、NULLではないことを確認するためには以下の構文を使用します。
<code class="sql">
	値 IS NOT NULL
</code>
<div class="separator"></div>
では、単体タイプのポケモンを取得してみましょう♪
<code class="sql">
	SELECT *
	FROM pokemon
	WHERE type2 IS NULL;	
</code>
<img src="../pics/is-null.gif" alt="IS NULL" />
<h2>LIKE</h2>
文字列の完全一致なら「=」でチェック可能ですが、部分一致は「=」ではチェックできません。<br /><br />文字列の部分一致をチェックするには「LIKE」句を使用します。<br />また、LIKEを使用した文字列の部分一致検索をパターンマッチングと言います。<br /><br />パターンマッチングでは以下の2つの特殊文字が使用されます。
<table>
	<thead>
		<tr>
			<th width="50%">%(パーセント)</th>
			<th width="50%">_(アンダースコア)</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>任意の0文字以上の文字列を意味します。</td>
			<td>任意の1文字を意味します。</td>
		</tr>
	</tbody>
</table>
LIKE句は以下のように使用します。
<code class="sql">
	値 LIKE 'パターンマッチチェック対象'
</code>
では、名前が「ア」から始まるポケモンを取得しましょう♪
<code class="sql">
	SELECT * FROM pokemon
	WHERE name LIKE 'ア%';
</code>
<img src="../pics/like-1.gif" alt="LIKE句" />
次に名前が三文字のポケモンを取得しましょう♪
<code class="sql">
	SELECT * FROM pokemon
	WHERE name LIKE '___';
</code>
<img src="../pics/like-2.gif" alt="LIKE句" />
最後に名前から二番目に「ー」を含むポケモンを取得しましょう♪
<code class="sql">
	SELECT * FROM pokemon
	WHERE name LIKE '%ー_';
</code>
<img src="../pics/like-3.gif" alt="LIKE句" />
<h2>BETWEEN</h2>
値が「m ～ n」の間にある時に「真」となります。<br />「&lt;=」を複数組み合わせればok!ですが、こちらの方が見やすいです。<br /><br />どこかで聞いた話ですが、BETWEENよりも「&lt;=」を組み合わせた方が若干処理速度が速いらしいです。<br />ホントかどうかは分かりませんが、、、<br />別に気にしなくてok!なレベルですが、、、<br /><br />では、BETWEEN句を使用して第二世代のポケモンを取得しましょう♪
<code class="sql">
	SELECT * FROM pokemon
	WHERE number BETWEEN 152 AND 251;
</code>
<h2>ORDER BY</h2>
SELECT文で取得した結果をなんかしらの列のデータに基づいて並び替えます。<br /><br />以下のように書きます。
<code class="sql">
	ORDER BY 並び替えの基準となる列 並び順
</code>
並び順には以下の2つが指定可能です。
<table>
	<thead>
		<tr>
			<th width="50%">ASC</th>
			<th width="50%">DESC</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>昇順です。<br />(デフォルト)</td>
			<td>降順です。</td>
		</tr>
	</tbody>
</table>
では、種族値合計が高い順に並び替えて表示しましょう♪
<code class="sql">
	SELECT * FROM pokemon
	ORDER BY total DESC;
</code>
<img src="../pics/order-by-1.gif" alt="ORDER BY句" />
並び替え対象のデータが同一の場合に使用する二番目の並び替え対象の列を指定することもできます。<br />「,(カンマ)」で区切って書きます。<br /><br />では、「合計種族値 &rarr; 素早さ &rarr; HP」の順で並び替えましょう♪
<code class="sql">
	SELECT * FROM pokemon
	ORDER BY total DESC, speed DESC, hp DESC;
</code>
<img src="../pics/order-by-2.gif" alt="ORDER BY句" />
<h2>IN</h2>
ある要素が複数の選択肢に含まれているかどうかを条件とします。<br />「=」で設定した条件を「OR」でつなげて書いてもok!なのですがこれだと綺麗ではありません。<br /><br />ということで、IN句を使用して書いてみましょう♪<br />以下のように書きます。
<code class="sql">
	SELECT *
	FROM pokemon
	WHERE name IN ('ピチュー', 'ピカチュウ', 'ライチュウ');
</code>
<img src="../pics/in.gif" alt="IN句" />
このSQLをIN句を使用しないと以下のようになります。
<code class="sql">
	SELECT *
	FROM pokemon
	WHERE name = 'ピチュー' 
		OR name = 'ピカチュウ'
		OR name = 'ライチュウ';
</code>
ダサい!!!
<h2>AS</h2>
列・テーブルに別名を付けることができます。<br />「AS 別名」と書きます。<br /><br />では、列名に別名をつけてポケモンテーブルを見やすく表示しましょう♪
<code class="sql">
	SELECT
		number AS 図鑑番号,
		name AS 名前,
		type1 AS タイプ1,
		type2 AS タイプ2
	FROM pokemon AS pk;
</code>
<img src="../pics/as.gif" alt="AS句" />
<h2>DISTINCT</h2>
「重複のない」的な意味です。<br />調べたらニュアンスは若干違いましたが、、、<br /><br />DISTINCT句を使用すると、全く同じ行をひとつにまとめて表示してくれます。<br /><br />最初にDISTINCT句を使用しない例を紹介します。<br />タイプ一覧を表示してみましょう♪
<code class="sql">
	SELECT type1 FROM pokemon;
</code>
<img src="../pics/distinct-なし.gif" alt="DISTINCT句" />
これだとタイプが重複して表示されてしまいます、、、<br />では、DISTINCT句を使用してみましょう♪<br />SELECT句の後に付与します。
<code class="sql">
	SELECT DISTINCT type1 FROM pokemon;
</code>
<img src="../pics/distinct.gif" alt="DISTINCT句" />
こんな感じで使用します。<br /><br />DISTINCT句はSELECT対象の列に格納されているデータが全て完全一致している場合にのみ重複が削除されます。
<h2>集計</h2>
SELECT結果を集計した結果を表示します。<br />集計では以下の3つを覚えてください。
<ul>
	<li>集計関数</li>
	<li>GROUP BY</li>
	<li>HAVING</li>
</ul>
<h3>集計関数</h3>
集計関数には以下の5つがあります。
<table>
	<tbody>
		<tr>
			<th>SUM</th>
			<td>合計</td>
		</tr>
		<tr>
			<th>MAX</th>
			<td>最大値</td>
		</tr>
		<tr>
			<th>MIN</th>
			<td>最小値</td>
		</tr>
		<tr>
			<th>AVG</th>
			<td>平均値</td>
		</tr>
		<tr>
			<th>COUNT</th>
			<td>カウント</td>
		</tr>
	</tbody>
</table>
「COUNT」は性格には集計関数ではなく計数関数なのですが、ほとんど同じなので、、、<br />では、ほのおタイプのポケモンの総数をカウントしてみましょう♪
<code class="sql">
	SELECT COUNT(*) AS 炎タイプのポケモン数
	FROM pokemon
	WHERE 'ほのお' IN (type1, type2);
</code>
<img src="../pics/count-1.gif" alt="COUNT" />
集計関数をSELECT対象として使用する場合には、当該SELECT対象列は全て集計関数ないしは後ほど説明するGROU BYの対象である必要があります。<br /><br />集計してコンパクトにまとめられた行数と集計されていないそのままの行数は一致しないのでガチャガチャしちゃいますからね、、、
<h3>GROUP BY</h3>
何らかの条件でグループ化します。<br />これは先ほど説明した集計関数と一緒に使用されることが大半です。<br /><br />以下のように書きます。
<code class="sql">
	SELECT 対象列 * FROM 対象テーブル
	GROUP BY グループ化対象の列
</code>
では、タイプごとのポケモンを総数、合計種族値の平均を算出しましょう♪
<code class="sql">
	SELECT
		type1 AS タイプ,
		AVG(total) AS 平均種族値
	FROM pokemon
	GROUP BY type1;
</code>
<img src="../pics/group-by.gif" alt="GROUP BY" />
<h3>HAVING</h3>
「集計結果に対する絞り込み条件」を指定します。<br />WHERE句と混同する人が多いので注意してください。<br /><br />絞り込みのタイミングが異なります。
<img src="../pics/having-where.png" alt="HAVING句とWHERE句" />
では、合計種族値の平均が「450」以上のタイプを降順で表示しましょう♪
<code class="sql">
	SELECT
		type1 AS タイプ,
		AVG(total) AS 平均種族値
	FROM pokemon
	GROUP BY type1
	HAVING 450 &lt;= AVG(total)
	ORDER BY AVG(total) DESC;
</code>
<img src="../pics/having.gif" alt="HAVING句" />
やっぱり、ドラゴンタイプは強いですね♪<br /><br />ですが、これだと若干よくない点があるんです。<br />進化前のポケモンも含まれてしまっています。<br /><br />ということで、極端にステータスが低いポケモン(total &lt; 500)は進化前とみなして検索対象外としましょう♪<br />本当は進化前か最終進化形かの列があればいいんですが、、、
<code class="sql">
	SELECT
		type1 AS タイプ,
		AVG(total) AS 平均種族値
	FROM pokemon
	WHERE 500 &lt;= total
	GROUP BY type1
	HAVING 450 &lt;= AVG(total)
	ORDER BY AVG(total) DESC;
</code>
<img src="../pics/having_where-both.gif" alt="HAVING句 WHERE句" />
これだと、全てのタイプが対象が表示されます。<br />「500」以上だけを抽出した後にその平均が「450」以上であるものを選択しているので当然ですね♪<br /><br />進化前のポケモンが多いとそれが全体のステータスに影響を大きく及ぼしていることが分かります。<br />特に、むしタイプのポケモンはこれが顕著に表れています。
<h2>SELECT INTO</h2>
選択されたデータを他のテーブルにコピーします。<br />テーブルの列データも新たに生成されます。<br /><br />以下のように書きます。
<code class="sql">
	SELECT 列名
	INTO コピー先テーブル名
	FROM コピー元テーブル
	WHERE 条件式;
</code>
では、ほのおタイプのポケモンデータをfireテーブルにコピーしましょう♪
<code class="sql">
	SELECT *
	INTO fire
	FROM pokemon
	WHERE 'ほのお' IN (type1, type2);
</code>
<img src="../pics/select-into.gif" alt="SELECT INTO文" />
因みに、テーブルの列登録情報だけをコピーしたい場合は、WHERE句で絶対満たさない条件を設定します。<br />例えば、「1 = 2」とすれば絶対に「偽」となるため、コピーされるデータがなく、列の登録情報だけがコピーされます。<br /><br />では、pokemonテーブルに設定している「図鑑番号 INT」「名前 CHAR(10)」「タイプ1 CHAR(15)」「...」のテーブルの列データだけをコピーしましょう♪
<code class="sql">
	SELECT *
	INTO pokemon_template
	FROM pokemon
	WHERE 1 = 2;
</code>
<img src="../pics/select-into(template).gif" alt="SELECT INTO文" />
<?php footer(); ?>
