<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-02",
	"updated" => "2022-02-02"
);
head($obj);
?>
<h2>WHERE句</h2>
「SELECT」「UPDATE」「DELETE」では条件式として「WHERE句」を設定できましたね♪<br />ここではWHERE句について学びます。<br />WHERE句で判定する条件には以下の6種類があります。
<table>
	<caption>WHERE句の条件式</caption>
	<tbody>
		<tr>
			<th>=</th>
			<td>左右の値が等しいという条件を課します。</td>
		</tr>
		<tr>
			<th>&lt;</th>
			<td>左辺は右辺よりも小さいという条件を課します。</td>
		</tr>
		<tr>
			<th>&gt;</th>
			<td>左辺は右辺よりも大きいという条件を課します。</td>
		</tr>
		<tr>
			<th>&lt;=</th>
			<td>左辺は右辺以下という条件を課します。</td>
		</tr>
		<tr>
			<th>&gt;</th>
			<td>左辺は右辺以上という条件を課します。</td>
		</tr>
		<tr>
			<th>&lt;&gt;</th>
			<td>左辺と右辺は等しくないという条件を課します。</td>
		</tr>
	</tbody>
</table>
<div class="separator"></div>
また、括弧を用いて条件の組み合わせを設定することもできます。
<code class="sql">
	WHERE (A &lt; B AND B &lt; C) OR X = Y
</code>
「A &lt; B」かつ「B &lt; C」を満たす、または「X = Y」となる行が該当します。
<div class="separator"></div>
ではWHERE句を用いてより詳細にデータを抽出してみましょう♪<br />図鑑番号が152以上251以下(第二世代)であるほのおタイプのポケモンを取得しましょう♪
<code class="sql">
	SELECT 図鑑番号, 名前
	FROM pokemon
	WHERE (152 &lt;= 図鑑番号 AND 図鑑番号 &lt;= 251)
		AND (タイプ1 = 'ほのお' OR タイプ2 = 'ほのお');
</code>
<img src="../pics/where.png" alt="WHERE" />
<h2>NULL</h2>
「ナル」と呼びます。<br />人によっては「ヌル」と発音しますが、正確には「ナル」です。<br /><br />NULLとはデータが存在しないことを示すデータ型です。<br />数字の「0」や空の文字列「''」とも異なります。<br />なんだかややこしい概念なのですが、本当に何もないデータだと思ってください。<br />NULLはデータの挿入時に当該データが欠けていた場合に使用されます。<br /><br />ポケモンデータの挿入時にタイプ2がない場合は「なし」としましたが、実際には「なし」タイプが存在するわけではないため、これをNULLとしましょう♪
<p class="r">データが欠けていた場合に自動的にNULLが設定されるようにすることもできますが、まだ学習していないためここでは無理やりNULLを挿入します。</p>
<code class="sql">
	INSERT INTO pokemon
	VALUES (1, 'フシギダネ', 'くさ', 'どく');

	INSERT INTO pokemon
	VALUES (6, 'リザードン', 'ほのお', 'ひこう');

	INSERT INTO pokemon
	VALUES (7, 'ゼニガメ', 'みず', NULL);

	INSERT INTO pokemon
	VALUES (20, 'ラッタ', 'ノーマル', NULL);

	INSERT INTO pokemon
	VALUES (25, 'ピカチュウ', 'でんき', NULL);

	INSERT INTO pokemon
	VALUES (28, 'キュウコン', 'ほのお', NULL);

	INSERT INTO pokemon
	VALUES (52, 'ニャース', 'ノーマル', NULL);

	INSERT INTO pokemon
	VALUES (73, 'ドククラゲ', 'みず', 'どく');

	INSERT INTO pokemon
	VALUES (110, 'マタドガス', 'どく', NULL);

	INSERT INTO pokemon
	VALUES (116, 'タッツー', 'みず', NULL);
</code>
こうすればok!です。<br />NULLの判定には「=」を使用しません。<br />「IS NULL」「IS NOT NULL」を使用します。
<code class="sql">
	WHERE XXX IS NULL

	WHERE YYY IS NOT NULL
</code>
では第三世代のポケモン(252～386)で単体タイプのポケモンを取得しましょう♪
<code class="sql">
	SELECT *
	FROM pokemon
	WHERE (252 <= 図鑑番号 AND 図鑑番号 <= 386)
		AND タイプ2 IS NULL;
</code>
<p class="r">条件式の括弧は省略可能ですが、見やすさの観点から省略していません。</p>
<img src="../pics/is-null.png" alt="IS NULL" />
次は第五世代のポケモン(494～649)で複数タイプのポケモンを取得しましょう♪
<code class="sql">
	SELECT *
	FROM pokemon
	WHERE (494 <= 図鑑番号 AND 図鑑番号 <= 649)
		AND タイプ2 IS NOT NULL;
</code>
<img src="../pics/is-not-null.png" alt="IS NOT NULL" />
<h2>LIKE演算子</h2>
文字列がある条件にマッチしているかどうかの判定にはLIKE演算子を使用します。
<code class="sql">
	WHERE 式 LIKE 'パターン文字列'
</code>
パターン文字列で使用可能な文字を紹介します。
<table>
	<caption>パターン文字</caption>
	<tbody>
		<tr>
			<th>%</th>
			<td>任意の0文字以上の文字列を表します。</td>
		</tr>
		<tr>
			<th>_(アンダースコア)</th>
			<td>任意の1文字を表します。</td>
		</tr>
	</tbody>
</table>
では名前に「ー」が含まれる第三世代(252～386)のひこうポケモンを取得しましょう♪<br />少し複雑ですね、、、
<code class="sql">
	SELECT *
	FROM pokemon
	WHERE (252 <= 図鑑番号 AND 図鑑番号 <= 386)
		AND (タイプ1 = 'ひこう' OR タイプ2 = 'ひこう')
		AND (名前 LIKE '%ー%');
</code>
<img src="../pics/like(1).png" alt="LIKE演算子">
では今度は第三世代まで(～386)のポケモンで名前が三文字のポケモンを取得してみましょう♪
<code class="sql">
	SELECT *
	FROM pokemon
	WHERE (図鑑番号 <= 386)
		AND (名前 LIKE '___'); /*_(アンダースコア)3つ*/
</code>
<img src="../pics/like(2).png" alt="LIKE演算子">
<h3>ESCAPE句</h3>
「%」や「_」を文字列として使用する場合にはESCAPE句を使用する必要があります。
<code class="sql">
	WHERE 式 LIKE '%100$%%' ESCAPE '$'
</code>
これでパターン文字列内の「$」の後の文字は単なる文字列として扱います。<br />「$」以外でもなんでもok!ですが、通常は「$」「@」のいずれかが使用されます。<br />上の例では「100%」が含まれる文字列という条件を課しています。
<h2>BETWEEN句</h2>
式がある範囲内にあればという条件を課します。
<code class="sql">
	式 BETWEEN 値1 AND 値2
</code>
「&lt;=」をANDで結合すれば実現でき、そちらの方が効率が高いため使用頻度は高くありません。
<h2>IN演算子</h2>
値が列挙した複数の値にマッチしたらという条件を課します。<br />複数の条件をORで結合することでも実現できますが、こちらの方が簡単に書けます。<br /><br />では、メインタイプが「じめん」「いわ」「はがね」のいずれかである第四世代(387～493)のポケモンを取得しましょう♪
<code class="sql">
	SELECT *
	FROM pokemon
	WHERE 図鑑番号 BETWEEN 387 AND 493
		AND タイプ1 IN ('じめん', 'いわ', 'はがね');
</code>
<img src="../pics/in.png" alt="IN演算子" />
「NOT IN」を使用することで含まないという条件を課します。<br /><br />では、メインタイプが「ほのお」「くさ」「みず」「でんき」のいずれでもない単体タイプの第四世代(387～493)のポケモンを取得しましょう♪
<code class="sql">
	SELECT *
	FROM pokemon
	WHERE 図鑑番号 BETWEEN 387 AND 493
		AND タイプ2 IS NULL
		AND タイプ1 NOT IN ('ほのお', 'くさ', 'みず', 'でんき');
</code>
<img src="../pics/not-in.png" alt="NOT IN演算子" />
<h2>ANY/ALL演算子</h2>
IN演算子の比較バージョンです。<br />後ほど学習する式や副問合せと組み合わせて使用します。
<code class="sql">
	WHERE 式 関係演算子 ANY (値1, 値2, 値3, ...)

	WHERE 式 関係演算子 ALL (値1, 値2, 値3, ...)
</code>
ANYを使用した場合は式が複数の値との比較演算のうちひとつでも真となれば、条件を満たします。<br /><br />ALLの場合は式が複数の値との比較演算のうちの全てが真となれば、条件を満たします。
<?php footer(); ?>