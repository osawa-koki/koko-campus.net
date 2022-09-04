<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2021-12-28",
	"updated" => "2021-12-28"
);
head($obj);
?>
<h2>配列</h2>
pythonでは配列ではなくリストと呼びますが、ここでは他の言語に合わせて配列と呼びます。<br />配列とは同一の型のデータを複数格納するデータ型です。<br />配列内の要素は<span class="u">「0」から始まるインデックス番号</span>で指定されます。
<img src="../pics/配列.png" alt="配列の説明画像" />
<h2>配列の作成</h2>
配列は以下のように作成します。
<code class="python">
	変数 = ["要素1", "要素2", "要素3"]
</code>
<h2>配列の要素へのアクセス・配列の走査</h2>
配列内の要素にアクセスするには「配列名[インデックス番号]」で指定します。<br />インデックス番号は「0」から始まることに注意してください。
<code class="python">
	ary = ["ピチュー", "ピカチュウ", "ライチュウ"]
	print(ary[0])
	print(ary[1])
	print(ary[2])
</code>
<img class="max-350w" src="../pics/list.png" alt="配列の説明画像" />
配列は全ての要素をfor文を用いて取り出すこともできます。
<code class="python">
	ary = ["ピチュー", "ピカチュウ", "ライチュウ"]
	for k in ary :
		print(k)
</code>
<img class="max-350w" src="../pics/list.png" alt="配列の説明画像" />
<h2>配列の追加</h2>
配列に要素を追加する方法として以下の2つを覚えましょう♪
<ul>
	<li>insert</li>
	<li>append</li>
</ul>
<h3>insert</h3>
pythonで配列の任意の位置に要素を追加するには「insert」メソッドを使用します。<br />メソッドとはとあるオブジェクト専用の関数ですが、とりあえず「対象オブジェクト.関数名(引数)」で実行すると覚えてください。<br />対象オブジェクトとはここでは配列のことです。<br />insertメソッドは以下のように実行します。
<code class="python">
	対象の配列.insert(追加位置, 追加する要素)
</code>
追加位置よりも後ろにある要素はひとつ分後ろに押し出されます。
<code class="python">
	ary = ["python", "c", "java", "ruby", "php"]
	ary.insert(0, "fortran") #先頭に追加
	print(ary)
</code>
<img class="max-350w" src="../pics/insert.png" alt="insertメソッドの説明画像" />
<code class="python">
	ary = ["python", "c", "java", "ruby", "php"]
	ary.insert(2, "c++") #先頭から「3」番目に追加
	print(ary)
</code>
<img class="max-350w" src="../pics/insert2.png" alt="insertメソッドの説明画像" />
マイナス値を追加位置に指定することで後ろからの位置を指定することもできます。
<code class="python">
	ary = ["python", "c", "java", "ruby", "php"]
	ary.insert(-2, "c++") #後ろから「2」番目に追加
	print(ary)
</code>
<img class="max-350w" src="../pics/insert3.png" alt="insertメソッドの説明画像" />
<h3>append</h3>
配列の一番最後に要素を追加するためにメソッドです。<br />以下のように実行します。
<code class="python">
	ary = ["python", "c", "java", "ruby", "php"]
	ary.append("go") #配列の最後に追加
	print(ary)
</code>
<img class="max-350w" src="../pics/append.png" alt="appendメソッドの説明画像" />
<h2>index</h2>
あるデータに関して配列内を探索して一致する要素のインデックス番号を返します。<br />indexメソッドは以下のように記述します。<br />一致するデータが見つからなかった場合はエラーとなります。
<code class="python">
	ary = ["python", "c", "c++", "java", "ruby", "php"]
	idx = ary.index("c++")
	print(idx) #「2」と出力
</code>
腕試しとしてindexメソッドを使用しないで自分で関数を作ってみましょう♪<br />forループで配列内の要素を走査して一致した際のインデックス番号を返せばok!です。<br />僕はこう作りました。
<code class="python">
	def find_it(ary, target) :
		i = 0
		for k in ary :
			if k == target : #マッチしたら、、
				return i #そのインデックス番号を返して関数から抜け出す
			i = i + 1
		return -1 #見つからなかったら「-1」を返却
</code>
fint_it関数の第一引数に対象の配列、第二引数に探したいデータを与えると、戻り値に一致するデータのインデックス番号を返し、一致するデータがなかった場合は「-1」を返します。
<h2>要素の削除</h2>
配列の要素を削除するには以下のように記述します。
<code class="python">
	del 配列名[インデックス番号]
</code>
インデックス番号でしか削除できないので、先ほどのindexメソッドと併せて使用することが多いです。
<code class="python">
	ary = ["python", "c", "c++", "java", "ruby", "php"]
	idx = ary.index("java") #javaのインデックス番号を取得
	del ary[idx] #javaを削除
</code>
<img class="max-350w" src="../pics/del.png" alt="del文の説明画像" />
<h2>二次元配列</h2>
配列の中に配列を入れることもできます。<br />配列の中に配列を入れた場合二次元配列となり、いわゆるエクセルのような表のデータを管理することができます。<br />配列内の要素を指定するには「配列名[外側のインデックス番号][内側のインデックス番号]」と指定します。
<img src="../pics/多次元配列.png" alt="多次元配列の説明画像" />
ここでは簡単に掛け算九九の結果を二次元配列に保存してそれを表示してみましょう♪
<code class="python">
	kuku = [] #空の配列を作成(要素を追加するため)
	for i in range(1, 9 + 1): #外側のループ
		kuku2 = [] #空の配列を作成(要素を追加するため)
		for j in range(1, 9 + 1): #内側のループ
			kuku2.append(i * j) #九九の結果を内側の配列に追加
		kuku.append(kuku2) #内側の配列を外側の配列に追加
	for k in kuku :
		for l in k :
			print(str(l) + " ", end="")
		print("")
</code>
<img class="max-350w" src="../pics/二重ループ.png" alt="二次元配列の説明画像" />
<?php footer(); ?>