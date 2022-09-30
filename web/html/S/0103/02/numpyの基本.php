<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-03-05",
	"updated" => "2022-03-05"
);
head($obj);
?>
<h2>array</h2>
最も単純な配列を生成します。<br />以下のように書きます。
<code class="python">
	np.array([1, 2, 3, ...])
</code>
pythonではリストと呼ばれる配列に似たデータ型もありますが、算術演算目的ではこちらを使用します。<br /><br />これに対して演算を行うと全ての要素に対して演算が実行されます。
<code class="python">
	i = np.array([1, 2, 3])
	print(i * 3)

	# ***** コンソール *****
	# [3 6 9]
	# ***** ******** ******
</code>
<h2>arange</h2>
決まった範囲の配列を生成します。<br />以下のように書きます。
<code class="python">
	np.arange(from, to, step)
</code>
fromからtoまでをstep間隔で区切った配列を生成します。
<code class="python">
	i = np.arange(0, 10, 2)
	print(i)

	# ***** コンソール *****
	# [0 2 4 6 8]
	# ***** ******** ******
</code>
<h2>linspace</h2>
arangeの間隔ではなくて、何等分するかを指定するバージョンです。
<code class="python">
	i = np.linspace(from, to, divide)
</code>
<code class="python">
	i = np.linspace(0, 30, 3)
	print(i)

	# ***** コンソール *****
	# [ 0. 15. 30.]
	# ***** ******** ******
</code>
<h2>インデクシング</h2>
配列の要素を特定します。<br />これは通常の配列と同様です。
<code class="python">
	配列[インデックス番号]
</code>
<h2>スライシング</h2>
配列の一部を抽出します。<br />以下のように書きます。
<code class="python">
	配列[from:to:step]
</code>
<code class="python">
	i = np.arange(10)
	print(i[3:8:2])

	# ***** コンソール *****
	# [3 5 7]
	# ***** ******** ******
</code>
また、「::-1」とすることで配列を反転させることができます。
<code class="python">
	i = np.arange(10)
	print(i[::-1])

	# ***** コンソール *****
	# [9 8 7 6 5 4 3 2 1 0]
	# ***** ******** ******
</code>



<?php footer(); ?>