<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-03-10",
	"updated" => "2022-03-10"
);
head($obj);
?>
<h2>データセットのロード</h2>
では実際にデータファイルをロードしてみましょう♪<br />以下のように書きます。
<code class="python">
	import pandas as pd

	df = pd.read_csv("パス", sep=",")
</code>
一般的には「pandas」は「pd」と略してインポートすることが多いので、ここでも「pd」という名前でインポートします。<br /><br />次に、pdオブジェクトのread_csvメソッドを実行します。<br />第一引数にはファイルへのパスを指定します。<br /><br />sep引数には区切り文字を指定します。<br />ここでは「,(カンマ)」で区切ったcsvファイルを想定しているため、「sep=","」とします。<br /><br />では、越谷市の気象データファイルをロードしてみましょう♪
<code class="python">
	import pandas as pd

	df = pd.read_csv("temperature.csv", sep=",")
	print(df)
</code>
<img src="../pics/データセットの読み込み.gif" alt="データセットの読み込み" />
データセットの最初と最後の五件が表示されます。
<h2>データセットの概観の取得</h2>
データセットの概観を取得してみましょう♪<br />以下のプロパティ・メソッドを使用します。
<ul>
	<li>shape</li>
	<li>columns</li>
	<li>head()</li>
	<li>tail()</li>
</ul>
<h3>shape</h3>
行数と列数を取得します。
<code class="python">
	print(df.shape)

	# ***** コンソール *****
	# (15374, 4)
	# ***** ******** ******
</code>
<h3>columns</h3>
インデックスカラムを取得します。
<code class="python">
	print(df.columns)

	# ***** コンソール *****
	# Index(['date', 'avg', 'max', 'min'], dtype='object')
	# ***** ******** ******
</code>
date列はインデックスカラムに指定してあるため削除されていることが確認されます。<br />そのまま残す方法は後ほど説明します。
<h3>head()</h3>
先頭から引数で与えた数分の行を取得します。<br />引数を省略すると先頭から5行が取得されます。
<code class="python">
	print(df.head(3))

	# ***** コンソール *****
	# 0  1980-01-01  5.7  9.1  1.9
	# 1  1980-01-02  3.3  7.1 -2.1
	# 2  1980-01-03  5.5  9.5  2.6
	# ***** ******** ******
</code>
<h3>tail()</h3>
headメソッドの最後から取得するバージョンです。
<code class="python">
	print(df.tail())

	# ***** コンソール *****
	# 15369  2022-01-29  3.9   9.9 -0.3
	# 15370  2022-01-30  3.5   8.8 -2.2
	# 15371  2022-01-31  4.1   9.9 -0.5
	# 15372  2022-02-01  4.1  10.9 -2.0
	# 15373  2022-02-02  3.8  10.3 -1.8
	# ***** ******** ******
</code>
<h2>インデックス番号・ラベル</h2>
行を指定するための識別子として以下の2つがあります。
<ul>
	<li>インデックス番号</li>
	<li>インデックスラベル</li>
</ul>
<h3>インデックス番号</h3>
特に何も指定しない場合は、上から「0」から始まる整数が自動的に振られます。<br />この番号を用いて行を特定します。
<img src="../pics/インデックス番号.png" alt="インデックス番号" />
ここでは、インデックス番号を使用する方法を採用します。
<h3>インデックスラベル</h3>
インデックスラベルを設定する方法は以下の2通りあります。
<ul>
	<li>データロード時に設定</li>
	<li>データロード後に設定</li>
</ul>
<h4>データロード時に設定</h4>
データセットのロード時のindex_col引数にカラム名、ないしはカラム番号を指定します。<br />例えば、越谷市の気象データの日付(date)をインデックスラベルとして設定する場合には以下のように書きます。
<code class="python">
	df = pd.read_csv("temperature.csv", sep=",", index_col=0)
	# or
	df = pd.read_csv("temperature.csv", sep=",", index_col="date")
</code>
<h4>データロード後に設定</h4>
データセットのロード後にset_indexメソッドを実行してインデックスラベルを設定します。<br />この方法もカラム名とカラム番号のどちらでも設定できます。
<code class="python">
	df = pd.read_csv("temperature.csv", sep=",")
	df.set_index(0, inplace=True)
	# or
	df = pd.read_csv("temperature.csv", sep=",")
	df.set_index("date", inplace=True)
</code>
inplace引数に「True」を設定しているのは破壊的なメソッドを実行するためです。<br />通常のset_indexメソッドでは元のデータセットは変更せずに、インデックスラベルを設定した新たなデータセットを返すため、これを変数に代入する必要があります。<br />これでは不便なのでinplace引数に「True」を指定して破壊的なメソッドを実行しています。
<div class="separator"></div>
これで、インデックスラベルによって行を特定することが可能になりました。
<img src="../pics/インデックスラベル.png" alt="インデックスラベル" />
<div class="separator"></div>
また、データロード後にset_indexメソッドを用いて設定する方法ではdrop引数に「False」を指定することでインデックスラベルに設定した列をそのまま残すこともできます。
<h2>seriesのデータ型</h2>
pandasで扱うデータセットの各列のことをseriesと呼びますが、seriesが保有するデータ型は全て同じデータ型である必要があります。<br />pandasではデータロード時に自動的にデータ型を解釈しますが、不正なデータ型が混在していると適切にデータ型を解釈できません。
<h3>データ型の確認</h3>
seriesが保有するデータ型は同一である必要があり、データ型は自動で解釈されると説明しましたが、ここではそのデータ型を確認してみましょう♪
<code class="python">
	import pandas as pd

	df = pd.read_csv("temperature.csv", sep=",")
	print(df.dtypes)
	print("******************************")
	print(df.info())
</code>
<img src="../pics/series-データ型.png" alt="series データ型" />
<h2>データ型</h2>
pythonでのデータ型とpandasライブラリでのデータ型は若干異なります。
<table>
	<thead>
		<tr>
			<th>python</th>
			<th>pandas</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>string</td>
			<td>object</td>
		</tr>
		<tr>
			<td>int</td>
			<td>int64</td>
		</tr>
		<tr>
			<td>float</td>
			<td>float64</td>
		</tr>
		<tr>
			<td>datetime</td>
			<td>datetime64</td>
		</tr>
	</tbody>
</table>
<h3>seriesデータ型の変換</h3>













<?php footer(); ?>