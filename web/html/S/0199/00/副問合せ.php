<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-02",
	"updated" => "2022-02-02"
);
head($obj);
?>
<h2>副問合せ</h2>
副問合せとはSELECT文を入れ子にすることを言います。<br />SELECT文で使用する条件にSELECT文の結果を使用する場合に使用します。<br /><br />SELECT文の中で使用されるSELECT文を副問合せ文、ないしはサブクエリ文と呼びます。<br /><br />また、副問合せ文は括弧で囲んで書きます。
<code class="sql">
	SELECT カラム名
	WHERE カラム = (SELECT ...);
</code>
すっごく複雑です、、、<br />分からなくなったら紙に書いて整理しながら進めましょう♪
<h2>副問合せの結果の型</h2>
副問合せが返すデータの型には以下の3種類あります。
<ul>
	<li>スカラ型</li>
	<li>一次元配列型(ベクタ型)</li>
	<li>二次元配列型(マトリックス型)</li>
</ul>
<h3>スカラ型</h3>
単一の値を指します。<br />例えば以下のクエリが返す結果が該当します。
<code class="sql">
	SELECT MAX(HP) FROM status;
</code>
<img src="../pics/スカラ型.png" alt="スカラ型" />
<h3>一次元配列型(ベクタ型)</h3>
スカラ型データを複数集めたデータ型です。<br />例えば、以下のクエリが返す結果が該当します。
<code class="sql">
	SELECT HP
	FROM status
	WHERE タイプ1 = 'ほのお'
		AND タイプ2 = 'ひこう';
</code>
<img src="../pics/ベクタ型.png" alt="ベクタ型" />
<div class="separator"></div>
あくまでも単一の列で複数の行のデータであることに注意してください。<br />単一の行で列が複数の場合はsqlでは一次元配列型とは認識されません。<br />例えば以下のクエリの結果は一次元配列型には該当しません。
<code class="sql">
	SELECT AVG(HP), AVG(防御), AVG(特防)
	FROM status
</code>
<img src="../pics/非ベクタ型.png" alt="ベクタ型" />
単一の行で列が複数の場合は次に説明する二次元配列型と認識されます。
<h3>二次元配列型(マトリックス型)</h3>
複数行×複数列からなるデータ型です。<br />例えば、以下のクエリが返す結果が該当します。
<code class="sql">
	SELECT 図鑑番号, 名前, HP
	FROM status
	WHERE タイプ1 = 'ほのお'
		AND タイプ2 = 'ひこう';
</code>
<img src="../pics/マトリックス型.png" alt="マトリックス型" />
<h2>副問合せ(スカラ型)</h2>
では、最初にHPの種族値が最大のポケモンと最低のポケモンの全てのデータを表示してみましょう♪
<code class="sql">
	SELECT *
	FROM status
	WHERE HP = (SELECT MAX(HP) FROM status);
</code>
<img src="../pics/副問合せ(スカラ型).png" alt="副問合せ" />
<h2>副問合せ(一次元配列型)</h2>
先ほどは副問合せの結果は単一の値でしたが、今度は副問合せの結果が複数の値を返す場合の処理を行いましょう♪<br /><br />式と関数の授業で説明したIN/ANY/ALL関数を使用します。<br />では、全てのほのおタイプのHP種族よりもHP種族値が高いみずタイプのポケモンを取得しましょう♪
<p class="r">ほのおタイプのポケモンのHP種族値の最大を求めて、これを条件に使用することもできます。</p>
<code class="sql">
	SELECT 図鑑番号, 名前, HP
	FROM status
	WHERE タイプ1 = 'みず'
		AND HP > ALL (SELECT HP
			FROM status
			WHERE タイプ1 = 'ほのお');
</code>
<img src="../pics/副問合せ(ベクタ型).png" alt="副問合せ" />
<h2>副問合せ(二次元配列型)</h2>
主にFROMの対象として使用します。<br />では先ほどの全てのほのおタイプのHP種族よりもHP種族値が高いみずタイプのポケモンの検索結果から名前が5文字のポケモンを取得しましょう♪
<code class="sql">
	SELECT 図鑑番号, 名前, HP
	FROM
		(SELECT 図鑑番号, 名前, HP
		FROM status
		WHERE タイプ1 = 'みず'
			AND HP > ALL (SELECT HP
				FROM status
				WHERE タイプ1 = 'ほのお')) AS ダミー
	WHERE 名前 LIKE '_____';
</code>
FROMの対象にサブクエリの結果を使用する場合にはASを用いて別名を付ける必要があります。<br />上の例ではダミーという名前を付けています。
<img src="../pics/副問合せ(マトリックス型).png" alt="副問合せ" />
<?php footer(); ?>