<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-03-08",
	"updated" => "2022-03-08"
);
head($obj);
?>
<h2>配列</h2>
既に説明した通り、配列とは複数のデータをまとめて格納するデータ型です。<br />配列内の各要素は「0」から始まるインデックス番号で管理されます。
<img src="../pics/配列.png" alt="配列" />
配列内の各要素へアクセスするには以下のように書きます。
<code class="ruby">
	配列[インデックス番号]
</code>
<code class="ruby">
	lang = [
		"ruby",
		"haskell",
		"fortran",
		"rust",
		"javascript"
	]
	puts lang[0]
	puts lang[2]
	puts lang[4]

	# ***** コンソール *****
	# ruby
	# fortran
	# javascript
	# ***** ******** ******
</code>
<h2>配列の走査</h2>
配列の各要素を取り出すにはforループを用います。
<code class="ruby">
	lang = [
		"ruby",
		"haskell",
		"fortran",
		"rust",
		"javascript"
	]
	for e in lang
		puts e
	end

	# ***** コンソール *****
	# ruby
	# haskell
	# fortran
	# rust
	# javascript
	# ***** ******** ******
</code>
<div class="separator"></div>
配列の走査にはforループで十分ですが、whileやuntilなどの他の反復処理構文を用いることも可能です。<br />配列の要素の数は「.size」で取得できます。
<code class="ruby">
	lang = [
		"ruby",
		"haskell",
		"fortran",
		"rust",
		"javascript"
	]
	i = 0
	while i &lt; lang.size
		puts lang[i]
		i = i + 1
	end

	# ***** コンソール *****
	# ruby
	# haskell
	# fortran
	# rust
	# javascript
	# ***** ******** ******
</code>
<code class="ruby">
	lang = [
		"ruby",
		"haskell",
		"fortran",
		"rust",
		"javascript"
	]
	i = 0
	until i == lang.size
		puts lang[i]
		i = i + 1
	end

	# ***** コンソール *****
	# ruby
	# haskell
	# fortran
	# rust
	# javascript
	# ***** ******** ******
</code>
<h2>配列の操作</h2>
先ほどは「走査」でしたが、ここでは「操作」について学びます。<br />具体的には以下の2つを学びます。
<ul>
	<li>要素の追加</li>
	<li>要素の削除</li>
</ul>
<h3>要素の追加</h3>
配列に要素を追加する方法は以下の3通りあります。
<ul>
	<li>push</li>
	<li>insert</li>
	<li>unshift</li>
</ul>
<h4>push</h4>
配列の最後に要素を追加します。<br />以下のように書きます。
<code class="ruby">
	配列.push(要素)
</code>
では、実際に配列に要素を追加してみましょう♪
<code class="ruby">
	lang = [
		"ruby",
		"haskell",
		"fortran",
		"rust",
		"javascript"
	]
	lang.push("scala")
	for e in lang
		puts e
	end

	# ***** コンソール *****
	# ruby
	# haskell
	# fortran
	# rust
	# javascript
	# scala
	# ***** ******** ******
</code>
<h4>insesrt</h4>
配列の任意の位置に要素を追加します。<br />以下のように書きます。
<code class="ruby">
	配列.insert(位置, 要素)
</code>
<code class="ruby">
	lang = [
		"ruby",
		"haskell",
		"fortran",
		"rust",
		"javascript"
	]
	lang.insert(2, "scala")
	for e in lang
		puts e
	end

	# ***** コンソール *****
	# ruby
	# haskell
	# scala
	# fortran
	# rust
	# javascript
	# ***** ******** ******
</code>
<h4>unshift</h4>
配列の先頭に要素を追加します。<br />以下のように書きます。
<code class="ruby">
	配列.unshift(要素)
</code>
<code class="ruby">
	lang = [
		"ruby",
		"haskell",
		"fortran",
		"rust",
		"javascript"
	]
	lang.unshift("scala")
	for e in lang
		puts e
	end

	# ***** コンソール *****
	# scala
	# ruby
	# haskell
	# fortran
	# rust
	# javascript
	# ***** ******** ******
</code>
<h3>要素の削除</h3>
配列の要素を削除する方法は以下の4通りあります。
<ul>
	<li>delete</li>
	<li>delete_at</li>
	<li>shift</li>
	<li>pop</li>
</ul>
<h4>delete</h4>
配列の要素自体を指定して削除します。
<code class="ruby">
	配列.delete(要素)
</code>
例えば、プログラミング言語を格納する配列から「javascript」を削除するには以下のように書きます。
<code class="ruby">
	lang = [
		"ruby",
		"haskell",
		"fortran",
		"rust",
		"javascript"
	]
	lang.delete("javascript")
	for e in lang
		puts e
	end

	# ***** コンソール *****
	# ruby
	# haskell
	# fortran
	# rust
	# ***** ******** ******
</code>
<h4>delete_at</h4>
任意の位置の要素を削除します。
<code class="ruby">
	配列.delete_at(位置)
</code>
では、インデックス番号が「2」である要素を削除しましょう♪
<code class="ruby">
	lang = [
		"ruby",
		"haskell",
		"fortran",
		"rust",
		"javascript"
	]
	lang.delete_at(2)
	for e in lang
		puts e
	end

	# ***** コンソール *****
	# ruby
	# haskell
	# rust
	# javascript
	# ***** ******** ******
</code>
<h4>shift</h4>
配列の先頭の要素を削除します。
<code class="ruby">
	配列.shift()
</code>
<code class="ruby">
	lang = [
		"ruby",
		"haskell",
		"fortran",
		"rust",
		"javascript"
	]
	lang.shift()
	for e in lang
		puts e
	end

	# ***** コンソール *****
	# haskell
	# fortran
	# rust
	# javascript
	# ***** ******** ******
</code>
<h4>pop</h4>
配列の最後の要素を削除します。
<code class="ruby">
	lang = [
		"ruby",
		"haskell",
		"fortran",
		"rust",
		"javascript"
	]
	lang.pop()
	for e in lang
		puts e
	end

	# ***** コンソール *****
	# ruby
	# haskell
	# fortran
	# rust
	# ***** ******** ******
</code>
<h2>ハッシュ</h2>
ハッシュとは配列に似ていますが、配列と異なり要素を「0」から始まるインデックス番号ではなく独自に設定する文字列で管理します。<br />他の言語では連想配列型と呼ばれることが多いです。
<img src="../pics/ハッシュ.png" alt="ハッシュ" />
配列内の各要素へアクセスするには以下のように書きます。
<code class="ruby">
	ハッシュ[キー]
</code>
では拡張子をキーとするハッシュを作成してそこからハッシュ内の各要素を表示してみましょう♪
<code class="ruby">
	lang = {
		"rb" =&gt; "ruby",
		"pl" =&gt; "perl",
		"hs" =&gt; "haskell",
		"rs" =&gt; "rust",
		"cpp" =&gt; "c/c++"
	}
	puts lang["rb"]
	puts lang["hs"]
	puts lang["cpp"]

	# ***** コンソール *****
	# ruby
	# haskell
	# c/c++
	# ***** ******** ******
</code>
<h2>ハッシュの走査</h2>
ハッシュの要素(キーとバリュー)をセットで取り出して処理するには以下のように書きます。
<code class="ruby">
	for 変数1, 変数2 in ハッシュ
		# 処理...
	end
</code>
ハッシュのキーが変数1に格納され、バリューが変数2に格納されます。<br />これらの変数は当該forループ内でのみ使用可能です。
<code class="ruby">
	lang = {
		"rb" =&gt; "ruby",
		"hs" =&gt; "haskell",
		"f" =&gt; "fortran",
		"rs" =&gt; "rust",
		"js" =&gt; "javascript"
	}
	for k, v in lang
		puts k + " -&gt; " + v
	end

	# ***** コンソール *****
	# rb -&gt; ruby
	# hs -&gt; haskell
	# f -&gt; fortran
	# rs -&gt; rust
	# js -&gt; javascript
	# ***** ******** ******
</code>
<a href="https://docs.ruby-lang.org/ja/1.9.3/class/Hash.html">ruby 1.9.3</a>から、ハッシュは要素の順番も保持されるようになりました。<br />しかしながら、ハッシュ内の要素はキーとバリューの関係で管理されるという性質上、ハッシュ内の要素を順番を意識するのは適切とは言えません。
<h2>ハッシュの操作</h2>
ハッシュでも「要素の追加」と「要素の削除」の2つを学びます。
<h3>要素の追加</h3>
以下のように書きます。
<code class="ruby">
	ハッシュ[キー] = バリュー
</code>
既に指定したキーがハッシュ内に存在する場合にはバリューを上書きします。
<code class="ruby">
	lang = {
		"rb" =&gt; "ruby",
		"hs" =&gt; "haskell",
		"f" =&gt; "fortran",
		"rs" =&gt; "rust",
		"js" =&gt; "javascript"
	}
	lang["pas"] = "pascal"
	for k, v in lang
		puts k + "-&gt; " + v
	end

	# ***** コンソール *****
	# rb -&gt; ruby
	# hs -&gt; haskell
	# f -&gt; fortran
	# rs -&gt; rust
	# js -&gt; javascript
	# pas -&gt; pascal
	# ***** ******** ******
</code>
<h3>要素の削除</h3>
ハッシュの要素を削除するには以下のように書きます。
<code class="ruby">
	ハッシュ.delete(キー)
</code>
では、「f」キーをもつ要素を削除してみましょう♪
<code class="ruby">
	lang = {
		"rb" =&gt; "ruby",
		"hs" =&gt; "haskell",
		"f" =&gt; "fortran",
		"rs" =&gt; "rust",
		"js" =&gt; "javascript"
	}
	lang.delete("f")
	for k, v in lang
		puts k + "-&gt; " + v
	end

	# ***** コンソール *****
	# rb -&gt; ruby
	# hs -&gt; haskell
	# rs -&gt; rust
	# js -&gt; javascript
	# ***** ******** ******
</code>
<?php footer(); ?>