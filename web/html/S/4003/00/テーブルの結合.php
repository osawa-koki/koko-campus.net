<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-05-10",
	"updated" => "2022-05-10"
);
head($obj);
?>
<h2>テーブルの結合</h2>
コッド博士による、リレーショナルモデルについての理解は十分ですか???<br />簡単に復習すると、全てはテーブルという二次元データに格納するという考え方です。<br /><br />また、保守性・パフォーマンスの観点からひとつのテーブルに全てのデータを格納するのではなく、できる限り整合性を保った状態でテーブルを分割した方がいいとのことでしたね♪<br /><br />今回は分割したテーブルを何らかのキーワードを基にもとに戻します。<br />これをテーブルの結合と言います。<br /><br />正規化の逆の行為ですね♪<br /><br />テーブルの結合(広義)には大きく2パターンあります。
<ul>
	<li>集合</li>
	<li>結合(狭義)</li>
</ul>
<h3>集合</h3>
テーブルを縦に結合することです。<br />例えば、第一世代のポケモンと第二世代のポケモンを別のテーブルで管理していると想定してください。<br />これをガッチャンコします。<br /><br />ガッチャンコする際には、両テーブルの列情報(列の数・データ型)が一致している必要があります。
<img src="../pics/ガチャガチャ-ガッチャンコ.png" alt="ガチャガチャ-ガッチャンコ" />
<h3>結合</h3>
狭い意味での結合です。<br />単に結合と言えばこちらを指すことが多いです。<br /><br />こちらは、ポケモンが覚えている技と技の詳細をガッチャンコさせるイメージです。
<img src="../pics/横ガッチャンコ.png" alt="横のガッチャンコ" />
<h2>集合</h2>
ガッチャンコ(縦バージョン)です。<br />格納しているデータタイプが同一のテーブルをガッチャンコします。<br /><br />集合演算には以下の3種類があります。
<ul>
	<li>和集合 (UNION)</li>
	<li>積集合 (INTERSECT)</li>
	<li>差集合 (EXCEPT)</li>
</ul>
<img src="../pics/集合演算の種類.png" alt="集合の種類" />
<p>画像は<a href="https://monozukuri-c.com/python-set-operation/">モノづくりC言語塾</a>より。</p>
画像の4つ目の対称差集合については覚えなくてもok!です。<br />というか、和集合以外はほとんど使用しないので和集合だけ覚えればok!です。<br /><br />オープンソースDBMSシェアのNo.1であるMySQLではUNIONのみ使用可能という事実から、和集合以外がほとんど使用しないことが理解できるでしょう。
<div class="separator"></div>
集合の説明をするために以下の2つのテーブルを作成しました。
<ul>
	<li>僕の好きなポケモン</li>
	<li>僕の元カノの好きなポケモン</li>
</ul>
中身は以下の通りです。
<img src="../pics/僕の好きなポケモン-僕の元カノの好きなポケモン.gif" alt="僕の好きなポケモン 僕の元カノの好きなポケモン" />
以下ではこの2つのテーブルを使用します。
<h3>和集合</h3>
以下のように書きます。
<code class="sql">
	SELECT文1
	UNION
	SELECT文2
</code>
通常のUNIONでは結果に重複があった場合にはそれを削除しますが、「UNION ALL」とすれば重複も含めて表示します。<br />パフォーマンスは重複を「UNION ALL」の方が高いです。<br />理由はわざわざ重複を探してこれを排除する手間がかからないからです。<br /><br />特に理由がない限りは「UNION ALL」を使用することを推奨します。<br /><br />では、僕の好きなポケモンと僕の元カノの好きなポケモンの和集合を表示してみましょう♪
<code class="sql">
	SELECT *
	FROM 僕の好きなポケモン
	UNION
	SELECT *
	FROM 僕の元カノの好きなポケモン;
</code>
<img src="../pics/union.gif" alt="UNION" />
ここで注意してほしいのは僕も僕の元カノも好きなピカチュウは表示されていないという点です。<br />UNIONでは重複行は削除されます。<br /><br />次に「UNION ALL」を使用してみましょう♪
<code class="sql">
	SELECT *
	FROM 僕の好きなポケモン
	UNION ALL
	SELECT *
	FROM 僕の元カノの好きなポケモン;
</code>
<img src="../pics/union-all.gif" alt="UNION ALL" />
こんな感じです。<br />そのまんまですので、特に難しくありませんね♪
<h3>積集合</h3>
では、僕も僕もの元カノも好きなポケモンを表示してみましょう♪<br />このためにはINTERSECTを使用します。<br /><br />使用方法はUNIONと同じです。
<code class="sql">
	SELECT *
	FROM 僕の好きなポケモン
	INTERSECT
	SELECT *
	FROM 僕の元カノの好きなポケモン;
</code>
<img src="../pics/intersect.gif" alt="INTERSECT" />
<h3>差集合</h3>
どちらか一方に属して、どちらか一方に属していない行を取得します。<br /><br />以下のように書きます。
<code class="sql">
	SELECT文1
	EXCEPT
	SELECT文2
</code>
「SELECT文1 - SELECT文2」となります。<br /><br />では、僕が好きなポケモンテーブルに属して僕の元カノの好きなポケモンテーブルに属していないポケモン、僕が元カノの好きなポケモンテーブルに属して僕の好きなポケモンテーブルに属していないポケモンを取得しましょう♪
<code class="sql">
	SELECT *
	FROM 僕の好きなポケモン
	EXCEPT
	SELECT *
	FROM 僕の元カノの好きなポケモン;

	SELECT *
	FROM 僕の元カノの好きなポケモン
	EXCEPT
	SELECT *
	FROM 僕の好きなポケモン;
</code>
<img src="../pics/except.gif" alt="EXCEPT" />
<h2>テーブルの結合</h2>
今度は横にテーブルを結合させましょう♪<br />「The テーブルの結合」です。<br /><br />まずは、使用するデータセットを紹介します。
<img src="../pics/テーブルの結合-データセット.gif" alt="テーブルの結合で使用するデータセット" />
テーブルを結合する際には、以下のように書きます。
<code class="sql">
	SELECT 列 FROM 左のテーブル
	JOIN 右のテーブル
		ON 結合・抽出条件
</code>
ここで、非常に厄介な内容に突入します。<br />テーブルの結合には以下の3種類があります。
<ul>
	<li>クロス結合</li>
	<li>内部結合</li>
	<li>外部結合</li>
</ul>
<h3>クラス結合</h3>
「うっかりJOIN」「クロスJOIN」と呼ばれます。<br />まず、用いることはありません。<br /><br />間違っちゃったパターンの結合です。<br /><br />左のテーブルと右のテーブルの各行をすべて組み合わせます。
<img src="../pics/うっかり結合.png" alt="うっかり結合" />
以下のように書きます。
<code class="sql">
	SELECT 列 FROM 左のテーブル
	CROSS JOIN 右のテーブル;
</code>
では、うっかり結合するとどうなるかを確認してみましょう♪
<code class="sql">
	SELECT * FROM my_pokemon
	CROSS JOIN waza;
</code>
<img src="../pics/cross-join.gif" alt="CROSS JOIN" />
まず、用いることはないので覚えなくても問題ありませんが、間違って「,(カンマ)」で区切ってもうっかり結合となりますので、よく注意してください。
<code class="sql">
	SELECT * FROM my_pokemon, waza;
</code>
<img src="../pics/comma-join.gif" alt="CROSS JOIN" />
<h3>内部結合</h3>
左のテーブルと右のテーブルで結合できない部分を除いて、結合できる行だけを合体させます。<br /><br />以下のように書きます。
<code class="sql">
	SELECT 列 FROM 左のテーブル
	INNER JOIN 右のテーブル
		ON 結合条件;
</code>
結合条件とは説明した通り、左のテーブルと右のテーブルを結合させる条件ですが、以下のように書きます。
<code class="sql">
	ON 左のテーブル.外部キー = 右のテーブル.主キー
</code>
外部キーとは外部のテーブルを呼び出す際に参照するために必要とされる列のことです。<br /><br />では、技を条件として左右のテーブルを結合させてみましょう♪
<code class="sql">
	SELECT * FROM my_pokemon
	INNER JOIN waza
		ON my_pokemon.waza = waza.waza;
</code>
<img src="../pics/inner-join.gif" alt="INNER JOIN" />
技がNULLである「なぞっち」と、技が左のテーブルに存在しない「こいっち」は対象外となっています。
<h3>外部結合</h3>
どっちかのデータ型が無くても空いた部分をNULLとして処理します。<br />左のテーブルに合わせる場合を「左外部結合」、右のテーブルに合わせる場合を「右外部結合」と言います。<br /><br />「LEFT」もしくは「RIGHT」をそれぞれ選択して下さい。<br /><br />一般的には左外部結合を使用します。
<h4>左外部結合</h4>
<code class="sql">
	SELECT * FROM my_pokemon
	LEFT OUTER JOIN waza
		ON my_pokemon.waza = waza.waza;
</code>
<img src="../pics/left-outer-join.gif" alt="LEFT OUTER JOIN" />
左のテーブル(my_pokemon)のデータは全て出力されていることを確認してください。<br />結合相手がいない「こいっち」のNULLと「なぞっち」の「***ビーム」の結合先データは全てNULLとなっています。
<h4>右外部結合</h4>
<code class="sql">
	SELECT * FROM my_pokemon
	RIGHT OUTER JOIN waza
		ON my_pokemon.waza = waza.waza;
</code>
<img src="../pics/right-outer-join.gif" alt="RIGHT OUTER JOIN" />
今度は右のテーブル(waza)のデータが全て出力されていることを確認してください。<br /><br />右のテーブルに含まれていない技を持っている「なぞっち」と「こいっち」は表示されていません。
<code class="sql">
	SELECT * FROM my_pokemon
	FULL OUTER JOIN waza
		ON my_pokemon.waza = waza.waza;
</code>
<img src="../pics/full-outer-join.gif" alt="FULL OUTER JOIN" />
<h4>完全外部結合</h4>
両方バージョンで、左右のテーブルにある全てのデータを出力させます。<br />結合先が無い場合にはNULLとして処理されます。
<div class="separator"></div>
テーブルの結合を行った場合に列を指定する際に、両テーブルのどっちの列を指定しているかが不明瞭になることが考えられます。<br />そのため、テーブル結合後の列指定では「テーブル名.列名」とします。<br /><br />また、結合時にON句で抽出条件を指定することもできます。<br />これを結合前抽出条件と言います。<br />この方法は意外と知られていませんが、とっても便利ですので、是非覚えてください。<br /><br />では、テーブルを結合した後に、ニックネームと技と技の威力だけを表示しましょう♪<br />但し、抽出するポケモンは第一世代のポケモンだけとします。
<code class="sql">
	SELECT
		my_pokemon.nickname,
		my_pokemon.waza,
		waza.power
	FROM my_pokemon
	INNER JOIN waza
		ON my_pokemon.waza = waza.waza
			AND my_pokemon.number &lt;= 151;
</code>
<img src="../pics/結合前抽出条件.gif" alt="結合前抽出条件" />
WHERE句で抽出条件を設定しても動作はしますが、不要なデータはできるだけ早く排除した方がパフォーマンスが向上するため、ON句を使用することをオススメします。<br /><br />一応、WHERE句で結合後抽出条件を設定する場合のSQLは以下のようになります。
<code class="sql">
	SELECT
		my_pokemon.nickname,
		my_pokemon.waza,
		waza.power
	FROM my_pokemon
	INNER JOIN waza
		ON my_pokemon.waza = waza.waza
	WHERE my_pokemon.number &lt;= 151;
</code>
<img src="../pics/結合後抽出条件.gif" alt="結合後抽出条件" />
<?php footer(); ?>