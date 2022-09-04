<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-03-08",
	"updated" => "2022-03-08"
);
head($obj);
?>
<h2>条件分岐(if)</h2>
条件を満たすか否かで実行する処理を分岐します。<br />以下のように書きます。
<code class="ruby">
	if 条件式
		条件式を満たした場合の処理
	else
		条件式を満たさなかった場合の処理
	end
</code>
また、複数の条件式を連鎖させることも可能です。<br />連鎖させる場合には「else if」を短縮して「elsif」と書きます。
<code class="ruby">
	if 条件式A
		条件式Aを満たした場合の処理
	elsif 条件式B
		条件式Aを満たさず、条件式Bを満たした場合の処理
	else
		条件式A・Bのいずれも満たさなかった場合の処理
	end
</code>
では、入力した数字を「3n+a」の形で表してみましょう♪<br />入力した数字は文字列として取得されるため、最初にこれを整数型へ変換します。
<code class="ruby">
	i = gets.to_i

	if i % 3 == 0 
		puts "3n"
	elsif i % 3 == 1
		puts "3n + 1"
	else
		puts "3n + 2"
	end
</code>
<img src="../pics/if.gif" alt="if" />
<h2>条件分岐(case)</h2>
ある値を複数の値を比較して処理を制御します。<br />以下のように書きます。
<code class="ruby">
	case 対象の値
	when 比較1
		比較1と「==」だった場合の処理
	when 比較2
		比較2と「==」だった場合の処理
	when 比較3
		比較3と「==」だった場合の処理
	else
		いずれにもマッチしなかった場合の処理
	end
</code>
では、入力した拡張子からプログラミング言語を表示するプログラムを作成しましょう♪
<code class="ruby">
	ext = gets.strip

	case ext
	when "rb"
		puts "ruby"
	when "hs"
		puts "haskell"
	when "rs"
		puts "rust"
	when "f"
		puts "fortran"
	when "pl"
		puts "perl"
	else
		puts "unknown"
	end
</code>
入力したデータに「.strip」メソッドを使用している理由は入力確定に押す「Enter」が文字列の最後に改行文字として付加されていて、これを除く必要があるからです。
<img src="../pics/case.gif" alt="case.gif" />
<div class="separator"></div>
また、caseは式としても使用することができるため、上のコードを以下のように書き換えることもできます。
<code class="ruby">
	ext = gets.strip

	answer = case ext
	when "rb"
		"ruby"
	when "hs"
		"haskell"
	when "rs"
		"rust"
	when "f"
		"fortran"
	when "pl"
		"perl"
	else
		"unknown"
	end
	puts answer
</code>
answer変数に代入するデータをcaseによって制御しています。
<h2>条件分岐(三項演算子)</h2>
条件式の真偽によって使用する値を変更します。<br />以下のように書きます。
<code class="ruby">
	条件式 ? 真の場合の値 : 偽の場合の値
</code>
では、これを用いて入力した数字が奇数か偶数かを表示するプログラムを作成しましょう♪
<code class="ruby">
	i = gets.to_i
	answer = i % 2 == 0 ? "偶数" : "奇数"
	puts answer
</code>
<img src="../pics/三項演算子.gif" alt="三項演算子" />
また、三項演算子を連鎖させることも可能です。<br />下のコードでは入力した数字が「3n + a」の形で表示します。
<code class="ruby">
	i = gets.to_i
	d = i % 3
	answer = d == 0 ? "3n" :
		d == 1 ? "3n + 1" : "3n + 2"
	puts answer
</code>
<h2>反復処理(while)</h2>
ある条件を満たす限りは処理を継続します。<br />以下のように書きます。
<code class="ruby">
	while 条件式
		# 処理...
		# 処理...
		# 処理...
	end
</code>
では、1から10まで表示するプログラムを作成しましょう♪
<code class="ruby">
	i = 1
	while i &lt;= 10
		puts i
		i = i + 1
	end

	# ***** コンソール *****
	# 1
	# 2
	# 3
	# 4
	# 5
	# 6
	# 7
	# 8
	# 9
	# 10
	# ***** ******** ******
</code>
<h2>反復処理(until)</h2>
whileの逆バージョンで、条件式が真になるまで処理を継続します。<br />言い換えれば、条件式が偽である限りは処理を続けます。<br /><br />先ほどのコードをuntilを用いて書き換えてみましょう♪
<code class="ruby">
	i = 1
	until 10 &lt; i
		puts i
		i = i + 1
	end

	# ***** コンソール *****
	# 1
	# 2
	# 3
	# 4
	# 5
	# 6
	# 7
	# 8
	# 9
	# 10
	# ***** ******** ******
</code>
<h2>反復処理(for)</h2>
配列(ハッシュ)の要素をひとつずつ取り出して処理をします。<br />以下のように書きます。
<code class="ruby">
	for 変数 in 配列
		# 処理...
		# 処理...
		# 処理...
	end
</code>
配列の各要素を変数に格納して反復処理が実行されます。<br />変数は当該反復処理内でのみ使用可能です。<br /><br />では、プログラミング言語を格納する配列をひとつずつ表示してみましょう♪
<code class="ruby">
	lang = [
		"ruby",
		"haskell",
		"rust",
		"go",
		"c/c++"
	]
	for e in lang
		puts e
	end

	# ***** コンソール *****
	# ruby
	# haskell
	# rust
	# go
	# c/c++
	# ***** ******** ******
</code>
<div class="separator"></div>
forの後の変数を2つ設定することでハッシュのキーとバリューをセットで取得できます。
<code class="ruby">
	lang = {
		"rb" =&gt; "ruby",
		"hs" =&gt; "haskell",
		"f" =&gt; "fortran",
		"rs" =&gt; "rust",
		"pl" =&gt; "perl"
	}
	for k, v in lang
		puts k + " -&gt; " + v
	end

	# ***** コンソール *****
	# rb -&gt; ruby
	# hs -&gt; haskell
	# f -&gt; fortran
	# rs -&gt; rust
	# pl -&gt; perl
	# ***** ******** ******
</code>
<h2>反復処理(loop)</h2>
処理を永遠に繰り返します。<br />無限ループに陥るため、反復処理内部で条件分岐を用いて強制的に反復処理から抜け出します。<br />反復処理から強制的に抜け出すには「break」を
用います。
<code class="ruby">
	loop do
		# 処理...
		if 条件式 # 条件を満たしたら、、、
			break # ループから抜け出す
		end
	end
</code>
では、1から10まで表示するプログラムをloopを用いて書いてみましょう♪
<code class="ruby">
	i = 1
	loop do
		if 10 &lt; i
			break
		end
		puts i
		i = i + 1
	end

	# ***** コンソール *****
	# 1
	# 2
	# 3
	# 4
	# 5
	# 6
	# 7
	# 8
	# 9
	# 10
	# ***** ******** ******
</code>
<?php footer(); ?>