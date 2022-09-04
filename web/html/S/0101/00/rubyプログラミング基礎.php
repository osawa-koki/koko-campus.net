<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-03-08",
	"updated" => "2022-03-08"
);
head($obj);
?>
<h2>命令文</h2>
プログラムで行われる処理は全て命令文として管理されます。<br />例えば、先ほどの「hello ruby」と表示するプログラムもひとつの命令文からなります。
<code class="ruby">
	puts "hello ruby"
</code>
命令文は1行にひとつの文を書くか、1行に複数の命令文を書く際には最後に「;(セミコロン)」を付けて表記します。
<code class="ruby">
	puts "hello ruby"
	puts "hello rust"
	puts "hello haskell"
</code>
<code class="ruby">
	puts "hello ruby"; puts "hello rust"; puts "hello haskell"
</code>
<img src="../pics/命令文.png" alt="命令文" />
通常は1行にひとつの命令文を書きます。
<h2>コメントアウト</h2>
コメントアウトとはプログラムコード中に書くメモ書きを言います。<br />プログラム実行時には無視されます。<br /><br />コメントアウトの書き方は2通りあります。
<ul>
	<li>単一行のコメントアウト</li>
	<li>複数行のコメントアウト</li>
</ul>
<h3>単一行のコメントアウト</h3>
「#」から行末までがコメントアウトとなります。
<code class="ruby">
	puts "hello ruby" # コメントアウト
</code>
<h2>複数行のコメントアウト</h2>
「=begin」と「=end」で囲まれた部分がコメントアウトとなります。
<code class="ruby">
	=begin
	この部分は
	コメントアウト
	です♪
	=end

	puts "hello ruby"
</code>
<h2>標準入出力</h2>
コンソール画面に表示、コンソール画面に入力された文字を取得します。
<h3>標準出力</h3>
コンソール画面に文字列を出力します。<br />以下のように書きます。
<code class="ruby">
	puts 文字列
</code>
これはputsをメソッドとして以下のように書くこともできます。
<code class="ruby">
	puts(文字列)
</code>
文字列内で改行する際には「<span class="en">\n</span>」と書きます。<br />「<span class="en">\</span>(バックスラッシュ)」は「<span class="ja">\</span>」
<h3>標準入力</h3>
コンソール画面から文字を受け取ります。
<code class="ruby">
	変数 = gets
</code>
変数とは後ほど詳しく説明しますが、プログラム実行にあたって必要となるデータを一時的に格納する箱だと思ってください。<br /><br />では、入力された文字列を受け取って表示してみましょう♪
<code class="ruby">
	str = gets
	puts "I Love " + str
</code>
<img src="../pics/標準入出力.gif" alt="標準入出力" />
ここでは入力された文字列をstr変数に格納してそれを「I Love 」に続けて表示しています。
<h2>変数</h2>
変数とは説明した通り、プログラムを実行するにあたって必要となる一時的なデータを格納するための箱です。
<h3>変数の宣言</h3>
変数を作成することを言います。<br />他の言語では変数を使用する前に変数を宣言する必要がありますが、rubyでは変数を宣言することなく使用できます。<br /><br />次に説明する変数の代入が行われた時点で変数を宣言も同時に行われます。
<h3>変数の代入</h3>
変数にデータを格納します。<br />プログラミング用語的には「代入」と言います。
<code class="ruby">
	変数 = データ
</code>
「=」は数学の世界では「同じ」を意味しますが、プログラミングの世界では右のデータを左の変数に代入することを意味します。<br /><br />例えばhi変数に「hello ruby」を代入するには以下のように書きます。
<code class="ruby">
	hi = "hello ruby" # hi変数に「hello ruby」を代入
</code>
既にデータが代入されている変数に新たなデータを代入すると上書きされます。
<code class="ruby">
	hi = "hello ruby" # hi変数に「hello ruby」を代入
	hi = "i love ruby" # hi変数を「i love ruby」に上書き
</code>
<h3>変数の参照</h3>
変数をそのまま書けば変数の中身を使用できます。<br />それでは、変数に代入したデータを表示してみましょう♪
<code class="ruby">
	hi = "hello ruby"
	puts hi

	# ***** コンソール *****
	# hello ruby
	# ***** ******** ******
</code>
<h2>ローカル変数とグローバル変数</h2>
変数はどこから参照可能かという観点から以下の2つに分類できます。
<ul>
	<li>ローカル変数</li>
	<li>グローバル変数</li>
</ul>
<h3>ローカル変数</h3>
局所的に参照できる変数です。<br />関数内で宣言された変数はその関数内でのみ、クラス内で宣言された変数はそのクラス内でのみ、あるファイル内で宣言された変数はそのファイル内でのみ、あるブロック内で宣言された変数はそのブロック内でのみ有効です。<br /><br />変数の参照可能な範囲は以下の4つから構成されます。
<ul>
	<li>関数(メソッド)</li>
	<li>クラス</li>
	<li>ブロック</li>
	<li>ファイル(トップレベル)</li>
</ul>
詳しくはそれぞれの授業で説明します。<br /><br />ある変数をローカル変数とするには変数名を半角英数字(小文字)と「_(アンダースコア)」で命名します。
<code class="ruby">
	var
	v_a_r
	_var
	var1
	var_1
</code>
<h3>グローバル変数</h3>
どこからでも参照できる変数を言います。<br /><br />ある変数をグローバル変数とするには変数名を「$」から始めます。
<code class="ruby">
	$var
	$v_a_r
	$_var
	$var1
	$var_1
</code>
<h2>定数</h2>
一度、データを代入したらデータを上書きすることがない場合に使用します。<br />他の言語では不可変変数と呼ぶこともあります。<br />変数に不可変ってなんだか痛くない頭痛みたいな表現ですけど、、、<br /><br />例えば、税率を「1.08」としてプログラム内で使用する場合に、いちいち「1.08」と書いていたら大変ですよね、、、<br />税率が「1.1」になった場合は全てを書き換える必要がでてきますし、、、<br /><br />かといって、変数として扱っていたら間違って他の値で上書きしてしまう危険性もあります、、、
<p>そうならないように注意すればいいだけの話ですが、、、</p>
そこで、定数を使用します。<br /><br />定数に上書きしようとすると警告を発します。<br /><br />定数は名前を英数字(大文字)を使用します。
<code class="ruby">
	Var
	VAR
	VAR_
</code>
<code class="ruby">
	HI = "hello ruby"
	HI = "i love ruby"
	puts HI

	# ***** コンソール *****
	# warning: already initialized constant HI
	# warning: previous definition of HI was here
	# i love ruby
	# ***** ******** ******
</code>
<?php footer(); ?>