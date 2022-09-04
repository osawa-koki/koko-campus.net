<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-02",
	"updated" => "2022-02-02"
);
head($obj);
?>
<h2>式</h2>
式とは演算対象のデータと演算子の組み合わせのことを言います。<br />例えば「1 + 2」や「5 / 2」や「'りんご' || 'ジュース'」などが該当します。<br /><br />sqlでは以下の単純演算が可能です。
<table>
	<caption>単純演算</caption>
	<tbody>
		<tr>
			<th>+</th>
			<td>足し算です。<br />日付と数字に対しての演算は対象の日付を指定した日付分進めます。</td>
		</tr>
		<tr>
			<th>-</th>
			<td>引き算です。<br />日付同士の演算なら日付の差分を返し、日付と数字の演算なら対象の日付を指定した日数分戻します。</td>
		</tr>
		<tr>
			<th>*</th>
			<td>掛け算です。</td>
		</tr>
		<tr>
			<th>/</th>
			<td>割り算です。</td>
		</tr>
		<tr>
			<th>||</th>
			<td>文字列を連結します。</td>
		</tr>
	</tbody>
</table>
ではポケモンのステータスを計算して表示しましょう♪<br />statusテーブルにポケモンの種族値を含めたデータを追加しました。
<img src="../pics/ポケモン-ステータス.png" alt="ポケモンのステータス" />
HPのステータスは「(種族値×2＋個体値＋努力値÷4)×レベル÷100＋レベル＋10」で計算されます。<br />努力値と個体値は両方とも最大の「252」と「31」で計算します。<br />簡単にすれば「HP=2×種族値+204」で計算します。<br />HP以外はここでは保留とします。<br />では実際にポケモンの全ての最大ステータスを計算して表示してみましょう♪
<code class="sql">
	SELECT 図鑑番号,
		名前,
		HP * 2 + 204 AS HP最大値
	FROM status;
</code>
<img src="../pics/式.png" alt="式" />
式はINSERT文・UPDATE文でも使用できます。
<h2>CASE演算子</h2>
CASE演算子は式の結果に応じて、使用する値を設定することができます。
<code class="sql">
	CASE 式
		WHEN 値1 THEN 値1の時に使用する値
		WHEN 値2 THEN 値2の時に使用する値
		WHEN 値3 THEN 値3の時に使用する値
		...
		(ELSE デフォルトで使用する値)
	END;
</code>
また、値の代わりに条件式を設定することもできます。<br />上から順に条件は判定されます。
<code class="sql">
	CASE
		WHEN 条件式1 THEN 条件1の時に使用する値
		WHEN 条件式2 THEN 条件2の時に使用する値
		WHEN 条件式3 THEN 条件3の時に使用する値
		...
		(ELSE デフォルトで使用する値)
	END;
</code>
先ほど結果を使用して、HPが350以上なら「すばらしい♪♪♪」、300以上350未満なら「ok!」、350未満なら「これから!!!」って表示してみましょう♪
<code class="sql">
	SELECT 図鑑番号, 名前,
		CASE
			WHEN 350 &lt;= (HP * 2 + 204) THEN 'すばらしい♪♪♪'
			WHEN 300 &lt; (HP * 2 + 204) THEN 'ok!'
			ELSE 'これから!!!'
		END AS HPの判定
	FROM status;
</code>
<img src="../pics/case.png" alt="CASE句" />
<h2>関数</h2>
関数とはあるデータ(引数)に関して一定の処理を行ってその結果を戻り値として取得します。<br />プログラミング言語の関数とは若干異なるため、ここでは式の進化バージョンだと思ってください。<br />以下の関数を学びます。
<ul>
	<li>CHAR_LENGTH</li>
	<li>TRIM</li>
	<li>REPLACE</li>
	<li>UPPER</li>
	<li>LOWER</li>
	<li>ROUND</li>
	<li>TRUNCATE</li>
</ul>
関数は以下のように書きます。
<code class="sql">
	関数名 (引数1, 引数2, 引数3, ...)
</code>
<h2>CHAR_LENGTH</h2>
文字列の長さを返します。
<code class="sql">
	SELECT 図鑑番号, 名前,
		CHAR_LENGTH(名前) AS '名前の長さ'
	FROM pokemon
	WHERE 図鑑番号 &lt;= 151;
</code>
<img src="../pics/char_length.png" alt="CHAR_LENGTH" />
CHAR_LENGTH関数では文字列の長さを返すのに対して、LENGTH関数では文字列のバイト数を返します。
<h2>TRIM</h2>
文字列から余分な空白文字を削除します。<br />例えば、テーブル作成時にデータ型をCHAR型で設定した場合は固定長の文字列となりますが、入力した文字列の長さがこれに満たなかった場合は文字列の右側が空白で埋められます。<br />これを削除する際に使用します。<br /><br />また、LTRIMは左側の空白だけを削除、RTRIMは右側だけの空白を削除します。
<h2>REPLACE</h2>
文字列の一部を置換します。
<code class="sql">
	REPLACE (対象文字列, 置換前文字列, 置換後文字列)
</code>
これ以降はポケモンのデータを用いての説明が難しいのでデータベースからデータを抽出せずに、sqlで与えたデータの加工結果だけを表示します。
<code class="sql">
	SELECT
	REPLACE('あなたのこと嫌い', '嫌い', '好き') AS '恋文';
</code>
<img src="../pics/replace.png" alt="REPLACE" />
<h2>UPPER</h2>
引数で渡した文字列を大文字に変換します。
<code class="sql">
	SELECT
	UPPER('i love you') AS '恋文';
</code>
<img src="../pics/upper.png" alt="UPPER" />
<h2>LOWER</h2>
引数で渡した文字列を小文字に変換します。
<code class="sql">
	SELECT
	LOWER('I LOVE YOU') AS '恋文';
</code>
<img src="../pics/lower.png" alt="LOWER" />
<h2>ROUND</h2>
数字を指定して桁で四捨五入します。
<code class="sql">
	ROUND (対象の数字, 有効桁数)
</code>
有効桁数が負の値ならば整数、正の値ならば小数部分を指します。
<code class="sql">
	SELECT
	ROUND (1234567890, -5) AS '整数部分の四捨五入',
	ROUND (0.123456789, 5) AS '小数部分の四捨五入';
</code>
<img src="../pics/round.png" alt="ROUND" />
<h2>TRUNC</h2>
ROUND関数の切り捨てバージョンです。
<code class="sql">
	TRUNCATE (対象の数字, 有効桁数)
</code>
有効桁数が負の値ならば整数、正の値ならば小数部分を指します。
<code class="sql">
	SELECT
	TRUNCATE (1234567890, -5) AS '整数部分の四捨五入',
	TRUNCATE (0.123456789, 5) AS '小数部分の四捨五入';
</code>
<p>Oracle/PostgreSQLではTRUNC関数を使用します。</p>
<img src="../pics/truncate.png" alt="TRUNCATE" />
<?php footer(); ?>