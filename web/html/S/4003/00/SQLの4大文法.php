<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-05-10",
	"updated" => "2022-05-10"
);
head($obj);
?>
<h2>SQLの4大文法</h2>
SQLの基本的な処理は以下の4つのいずれかに該当します。<br />というか、データに対する処理が大別すると以下の4つに分類されます。
<ul>
	<li>選択(取得)</li>
	<li>挿入(追加)</li>
	<li>更新(変更)</li>
	<li>削除</li>
</ul>
SQL・データベースの学習ではまず第一にこれらの処理を学びます。
<div class="separator"></div>
ここからはポケモンのデータセットを使用してSQLを説明します。
<img src="../pics/使用するデータセット.gif" alt="データセット" />
<table>
	<tbody>
		<tr>
			<th>number</th>
			<td>図鑑番号</td>
		</tr>
		<tr>
			<th>name</th>
			<td>名前</td>
		</tr>
		<tr>
			<th>type1</th>
			<td>タイプ1</td>
		</tr>
		<tr>
			<th>type2</th>
			<td>タイプ2</td>
		</tr>
		<tr>
			<th>hp</th>
			<td>HPの種族値</td>
		</tr>
		<tr>
			<th>attack</th>
			<td>攻撃の種族値</td>
		</tr>
		<tr>
			<th>defence</th>
			<td>防御の種族値</td>
		</tr>
		<tr>
			<th>s_attack</th>
			<td>特攻の種族値</td>
		</tr>
		<tr>
			<th>s_defence</th>
			<td>特防の種族値</td>
		</tr>
		<tr>
			<th>speed</th>
			<td>素早さの種族値</td>
		</tr>
		<tr>
			<th>total</th>
			<td>種族値合計</td>
		</tr>
	</tbody>
</table>
種族値って何やって思いますよね、、、<br />簡単に説明すると各ポケモンに割り当てられたステータス算出のための隠れ値のことです。<br />例えば、ピカチュウであれば、素早さが高く、ミュウツーならば特攻が高く、カビゴンならばHPが高く設定されています。<br /><br />因みにポケモンが好きな人は、ステータスを算出するために使用される種族値・努力値・固定値・性格には常に意識を払っています。<br />どうでもいいですね、、、<br /><br />これらのデータはpokemonテーブルに格納されています。<br /><br />それでは、Let's start!!
<h2>選択(取得)</h2>
テーブルから指定した行を取得します。<br />以下のように書きます。
<code class="sql">
	SELECT 選択する列
	FROM 対象テーブル
	WHERE 条件
</code>
<div class="separator"></div>
よく使う条件として以下の6つがあります。
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
では、第一世代のポケモンの「図鑑番号」と「名前」一覧を取得しましょう♪<br />第一世代のポケモンとは図鑑番号が「151」までのポケモンが該当します。
<code class="sql">
	SELECT *
	FROM pokemon
	WHERE number &lt;= 151;
</code>
<img src="../pics/select-1.gif" alt="SELECT文" />
大成功です。<br /><br />次に第二世代のポケモンを取得しましょう♪<br />できますか???<br /><br />第二世代のポケモンとは図鑑番号が「152 ～ 251」までのポケモンが該当します。
<code class="sql">
	SELECT *
	FROM pokemon
	WHERE 151 &lt;= number &lt;= 251;
</code>
<img src="../pics/関係演算子-結合エラー.gif" alt="関係演算子 結合" />
これだとエラーになります。<br />関係演算子の結果を複数つなげる場合には論理演算子を使用する必要があります。<br /><br />論理演算子には以下の2種類あります。
<table>
	<thead>
		<tr>
			<th width="50%">AND</th>
			<th width="50%">OR</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>論理積演算子で、「かつ」を意味します。<br />論理積演算子の左右両方が成立する場合に条件を満たします。</td>
			<td>論理和演算子で、「または」を意味します。<br />論理和演算子の左右いずれかのが成立する場合に条件を満たします。</td>
		</tr>
	</tbody>
</table>
では、今回の例ではどのようにSQL文を書くべきでしょうか???
<code class="sql">
	SELECT *
	FROM pokemon
	WHERE 151 &lt;= number AND number &lt;= 251;
</code>
<img src="../pics/select-2(1).gif" alt="SELECT文" />
<img src="../pics/select-2(2).gif" alt="SELECT文" />
では、もっと複雑な第二世代の全てのほのおポケモンを取得してみましょう♪<br /><br />かなり複雑ですね、、、
<code class="sql">
	SELECT *
	FROM pokemon
	WHERE 151 &lt;= number AND number &lt;= 251
		AND type1 = 'ほのお' OR type2 = 'ほのお';
</code>
<img src="../pics/select-3(1).gif" alt="SELECT文" />
これだとダメです。<br />理由は、ANDの結合優先度とORの結合優先度を考慮していないためです。<br />論理演算子の結合優先度は同一であるため、全て左から結合していきます。<br /><br />なにが言いたいかというと、最後の「OR type2 = 'ほのお'」によってほのおタイプのポケモン全てが選択されてしまっています。<br /><br />これを防ぐためには括弧を用いて優先度を制御する必要があります。
<code class="sql">
	SELECT *
	FROM pokemon
	WHERE (151 &lt;= number AND number &lt;= 251)
		AND (type1 = 'ほのお' OR type2 = 'ほのお');
</code>
<img src="../pics/select-3(2).gif" alt="SELECT文" />
最初の括弧は省略可能ですが、見やすさの観点からつけています。<br /><br />これでok!です。
<h2>挿入(追加)</h2>
テーブルに行を追加します。<br />以下のように書きます。
<code class="sql">
	INSERT INTO 追加先テーブル
	(列1, 列2, 列3, ...)
	VALUES
	(データ1, データ2, データ3, ...)
</code>
テーブルの列の順番に挿入するデータを書く場合には列を省略して以下のように書くこともできます。
<code class="sql">
	INSERT INTO 追加先テーブル
	VALUES
	(データ1, データ2, データ3, ...)
</code>
この方法は列の配置を知っていないといけないため、原則として書くべきではありません。<br />後からSQLを修正する際にわざわざテーブルを確認する必要が発生します。<br /><br />では、我らが伝説のポケモン、ザシアンを追加しましょう♪
<img src="../pics/ザシアン.gif" alt="ザシアン" />
<p>画像データは<a href="https://yakkun.com/swsh/zukan/n888f">yakkun.com</a>より。</p>
<code class="sql">
	INSERT INTO pokemon
	(number, name, type1, type2, hp, attack, defence, s_attack, s_defence, speed, total)
	VALUES
	(888, 'ザシアン', 'フェアリー', 'はがね', 92, 170, 115, 80, 115, 148, 720);
</code>
<img src="../pics/insert.gif" alt="INSERT文" />
<div class="separator"></div>
追加したいデータが大量にある場合はINSERT文でひとつずつ追加していくのは大変ですよね、、、<br />このような場合にはCSVファイルから一括してインポートすることが可能です。<br /><br />具体的な方法については後ほど説明します。
<h2>更新(変更)</h2>
テーブル中のあるデータを更新・変更します。<br />以下のように書きます。
<code class="sql">
	UPDATE 対象テーブル
	SET 列 = データ
	WHERE 条件;
</code>
同時に複数の列のデータを更新する際には以下のように書きます。
<code class="sql">
	UPDATE 対象テーブル
	SET (列1, 列2, 列3, ...) = (データ1, データ2, データ3, ...)
	WHERE 条件;
</code>
更新文で特に注意をして欲しい点は必ずWHERE句で条件を設定することです。<br />これを設定しないとテーブルの全ての行の対象列データを対象としてデータを更新してしまいます。<br /><br />とっても大切なのでもう一度説明します。<br />更新文を実行する際には必ずWHERE句で条件を設定して下さい。<br /><br />では、僕はザシアンが大好きなんですけど、攻撃の種族値がカミツルギの「181」に負けているんですよね、、、<br />やっぱりナンバーワンを目指したいので秘密で変えちゃいましょう♪<br />同時に種族値全体も変更します。
<code class="sql">
	UPDATE pokemon
	SET attack = 182,
		total = 732
	WHERE name = 'ザシアン';
</code>
他のDBMSでは以下の記法(リスト記法)が使用可能なことが多いですが、SQL Serverでは使えませんので、注意してください。
<code class="sql">
	UPDATE pokemon
	SET (attack, total) = (182, 732)
	WHERE name = 'ザシアン';
</code>
<h2>削除</h2>
やっぱり、不正はよくありませんよね、、、<br />しかも、ザシアンは第八世代ですので、第七世代までを格納しているこのテーブルに入れるのは適当ではありません。<br /><br />ということで、ザシアンのデータを削除しましょう♪<br />削除するSQLは以下のようになります。
<code class="sql">
	DELETE 対象テーブル
	WHERE 条件;
</code>
WHERE句で条件を使用し忘れると、テーブル全てのデータが削除されてしまうので要注意です。<br /><br />大切なのでもう一度、WHERE句で条件を使用し忘れると、テーブル全てのデータが削除されてしまうので要注意です。<br /><br />では、ザシアンをデータを削除しましょう♪
<code class="sql">
	DELETE FROM pokemon
	WHERE name = 'ザシアン';
</code>
<img src="../pics/delete.gif" alt="DELETE句" />
<?php footer(); ?>
