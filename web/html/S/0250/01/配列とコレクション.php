<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-04-28",
	"updated" => "2022-04-28"
);
head($obj);
?>
<h2>配列の作成</h2>
通常の配列の作成方法の確認から行います。
<code class="vb-dot-net">
	Dim lang() As String = {
		"vb.net",
		"python",
		"c/c++",
		"rust",
		"haskell"
	}
</code>
<h3>二次元配列の生成</h3>
二次元配列とは配列の要素に配列を持つ配列を言います。
<img src="../pics/二次元配列.png" alt="二次元配列" />
二次元配列の生成は以下のように書きます。
<code class="vb-dot-net">
	Dim 配列名(,) As データ型 = New データ型(要素数1, 要素数2)
</code>
要素数は、初期化を行う場合には省略可能です。<br /><br />では、平仮名を行・列の位置を指定してみましょう♪
<code class="vb-dot-net">
	Dim ja(,) As String = New String(,) {
		{
			"あ", "い", "う", "え", "お"
		},
		{
			"か", "き", "く", "け", "こ"
		},
		{
			"さ", "し", "す", "せ", "そ"
		},
		{
			"た", "ち", "つ", "て", "と"
		},
		{
			"な", "に", "ぬ", "ね", "の"
		}
	}
	Do While True
		Dim ja1 As Integer = Console.ReadLine()
		Dim ja2 As Integer = Console.ReadLine()
		Console.Write(" ")
		Console.Write(ja1)
		Console.Write(" - ")
		Console.Write(ja2)
		Console.Write(" ---> ")
		Console.WriteLine(ja(ja1 - 1, ja2 - 1))
	Loop
</code>
<img src="../pics/二次元配列の要素の指定.gif" alt="二次元配列の要素の指定" />
他の言語では二次元配列は「配列の配列」という色が強く、「ary[列番号][行番号]」と書くことが多いですが、vb.netでは「ary(列番号, 行番号)」と書くことに注意です。<br /><br />もっとも、配列の要素に配列を格納するジャグ配列も作成可能ですが、まずはvb.netでの多次元配列の基本形である配列を説明します。
<h2>文字列の配列化</h2>
実際のところ、配列の要素が予め定まっていることはほとんどありません。<br />受け取ったデータから作成することがほとんどです。<br /><br />ということで、文字列を分割して配列を作成する方法を学びましょう♪<br /><br />以下の2つの方法があります。
<ul>
	<li>String.Split</li>
	<li>Regex.Split</li>
</ul>
<h3>String.Split</h3>
文字列の中のある文字で分割して配列を作成します。<br />以下のように書きます。
<code class="vb-dot-net">
	文字列.Split("区切り文字")
</code>
では、「,(カンマ)」で区切ったプログラミング言語一覧を配列に変換して、ひとつずつ取り出して表示してみましょう♪
<code class="vb-dot-net">
	Dim lang = "haskell,vb,python,f#,swift".Split(",")
	For Each element In lang
		Console.WriteLine(element)
	Next

	' ***** コンソール *****
	' haskell
	' vb
	' python
	' f#
	' swift
	' ***** ******** *****
</code>
今度はひらがなを一文字ずつ区切って配列を作成しましょう♪
<code class="vb-dot-net">
	Dim ja = "あいうえお".Split("")
	For Each element In ja
		Console.WriteLine(element)
	Next

	' ***** コンソール *****
	' あいうえお
	' ***** ******** *****
</code>
空文字で区切るということはできません。<br />javascriptではできるのですが、、、<br /><br />別の方法を考える必要があります。<br />ということで、正規表現を用いた文字列の配列化に進みましょう♪
<h3>Regex.Split</h3>
Regexとは「RegularExpression」の略で、「正規表現」を意味します。<br /><br />正規表現を用いて文字列を分割して配列を作成します。<br /><br />以下のように書きます。
<code class="vb-dot-net">
	Regex.Split("文字列", "区切り文字(正規表現)")
</code>
Regexクラスを使用するには最初にモジュールのインポートをする必要があります。
<code class="vb-dot-net">
	Imports System.Text.RegularExpressions
</code>
これを先頭に書けばok!です。
では、早速文字をひとつずつに分割して配列を生成しましょう♪
<code class="vb-dot-net">
	Dim ja = Regex.Split("あいうえお", ".*?")
	For Each element In ja
		Console.WriteLine(element)
	Next

	' ***** コンソール *****
	' あ
	' い
	' う
	' え
	' お
	' ***** ******** *****
</code>
このようにRegexクラスのSplitメソッドを使用することでより詳細な文字列の配列化を行うことが可能です。
<div class="separator"></div>
因みに、この方法だと先頭と最後に空文字の要素が入ってしまいます。<br />ということで、戻読みと先読みを取り入れて修正しましょう♪
<code class="vb-dot-net">
	Dim ja = Regex.Split("あいうえお", "(?&lt;=\w).*?(?=\w)")
	For Each element In ja
		Console.WriteLine(element)
	Next
</code>

<h2>配列の要素数の取得</h2>
配列の要素数を取得する方法には以下の2つの方法があります。
<ul>
	<li>Length</li>
	<li>GetLength</li>
</ul>
<h3>Length</h3>
配列のプロパティで、配列の要素数を表します。<br />主に一次元配列で使用されます。
<code class="vb-dot-net">
	Dim ja(,) As String = {
		{"あ", "い", "う", "え", "お"},
		{"か", "き", "く", "け", "こ"},
		{"さ", "し", "す", "せ", "そ"}
	}
	Console.WriteLine(ja.Length)
	
	' ***** コンソール *****
	' 15
	' ***** ******** *****
</code>
「3 &times; 5」の「15」という数字が取得されます。<br />Lengthプロパティは当該配列の全ての要素数を返します。<br /><br />これは深い配列の要素もすべて含めた数です。
<h3>GetLength</h3>
ある次元の配列の要素数を取得するメソッドです。<br /><br />以下のように書きます。
<code class="vb-dot-net">
	配列.GetLength(次元数)
</code>
(x, y, z, ...)という形式で配列の次元が表されますが、「GetLength(0)」は「x」を、「GetLength(1)」は「y」を、「GetLength(2)」は「z」を表します。
<code class="vb-dot-net">
	Dim ja(,) As String = {
		{"あ", "い", "う", "え", "お"},
		{"か", "き", "く", "け", "こ"},
		{"さ", "し", "す", "せ", "そ"}
	}
	Console.WriteLine(ja.GetLength(0))
	Console.WriteLine(ja.GetLength(1))
	
	' ***** コンソール *****
	' 3
	' 5
	' ***** ******** *****
</code>
配列のインデックス番号の最大値を求める方法もあります。
<code class="vb-dot-net">
	配列.GetUpperbound(次元数)
</code>
「GetLength」と値から「1」を引いた値を取得可能です。
<code class="vb-dot-net">
	Dim ja(,) As String = {
		{"あ", "い", "う", "え", "お"},
		{"か", "き", "く", "け", "こ"},
		{"さ", "し", "す", "せ", "そ"}
	}
	Console.WriteLine(ja.GetUpperBound(0))
	Console.WriteLine(ja.GetUpperBound(1))
	
	' ***** コンソール *****
	' 2
	' 4
	' ***** ******** *****
</code>
<div class="separator"></div>
因みに、配列の次元を求めるには配列オブジェクトのRankプロパティを参照します。
<code class="vb-dot-net">
	Dim ja(,) As String = {
		{"あ", "い", "う", "え", "お"},
		{"か", "き", "く", "け", "こ"},
		{"さ", "し", "す", "せ", "そ"}
	}
	Console.WriteLine(ja.Rank)

	' ***** コンソール *****
	' 2
	' ***** ******** *****
</code>
<!--
<h2>配列のサイズの動的な変更</h2>
配列はメモリ管理の性質上、宣言時に指定したサイズを変更できません。<br />「3」個分の配列を作成した後に、インデックス番号「10」を指定して値を代入することはできません。<br /><br />配列のサイズを変更する際には配列そのものを作成しなおす必要があります。<br /><br />配列の再作成は以下のように書きます。
<code class="vb-dot-net">
	配列 = New データ型(要素数)
</code>
では、配列のサイズを変更してみましょう♪
-->
<h2>ジャグ配列</h2>
配列の要素として別の配列を含む配列を言います。<br />他の言語ではこちらが一般的な配列とされていることもあります。<br />先ほどの配列は「x &times; y &times; z...」という形で、各配列ごとにサイズが異なるように設定することも可能です。
<img src="../pics/ジャグ配列.png" alt="ジャグ配列" />
要素を指定する際には「ary(インデックス番号1)(インデックス番号2)...」とします。
<code class="vb-dot-net">
Dim ja = New String(10)() {}
		ja(0) = Regex.Split("あいうえお", "(?<=\w).*?(?=\w)")
		ja(1) = Regex.Split("かきくけこ", "(?<=\w).*?(?=\w)")
		ja(2) = Regex.Split("さしすせそ", "(?<=\w).*?(?=\w)")
		ja(3) = Regex.Split("たちつてと", "(?<=\w).*?(?=\w)")
		ja(4) = Regex.Split("なにぬねの", "(?<=\w).*?(?=\w)")
		ja(5) = Regex.Split("はひふへほ", "(?<=\w).*?(?=\w)")
		ja(6) = Regex.Split("まみむめも", "(?<=\w).*?(?=\w)")
		ja(7) = Regex.Split("やゆよ", "(?<=\w).*?(?=\w)")
		ja(8) = Regex.Split("らりるれろ", "(?<=\w).*?(?=\w)")
		ja(9) = Regex.Split("わをん", "(?<=\w).*?(?=\w)")
		Console.WriteLine(ja(0)(0))
		Console.WriteLine(ja(5)(0))
		Console.WriteLine(ja(0)(2))

		' ***** コンソール *****
		' あ
		' は
		' う
		' ***** ******** *****
</code>
こんどは「For Each」文を使用して、全ての平仮名を走査してみましょう♪
<code class="vb-dot-net">
	Dim ja = New String(10)() {}
	ja(0) = Regex.Split("あいうえお", "(?<=\w).*?(?=\w)")
	ja(1) = Regex.Split("かきくけこ", "(?<=\w).*?(?=\w)")
	ja(2) = Regex.Split("さしすせそ", "(?<=\w).*?(?=\w)")
	ja(3) = Regex.Split("たちつてと", "(?<=\w).*?(?=\w)")
	ja(4) = Regex.Split("なにぬねの", "(?<=\w).*?(?=\w)")
	ja(5) = Regex.Split("はひふへほ", "(?<=\w).*?(?=\w)")
	ja(6) = Regex.Split("まみむめも", "(?<=\w).*?(?=\w)")
	ja(7) = Regex.Split("やゆよ", "(?<=\w).*?(?=\w)")
	ja(8) = Regex.Split("らりるれろ", "(?<=\w).*?(?=\w)")
	ja(9) = Regex.Split("わをん", "(?<=\w).*?(?=\w)")
	For Each element In ja
		For Each e In element
			Console.Write(e &amp; " ")
		Next
		Console.WriteLine("")
	Next
</code>
<img src="../pics/ジャグ配列-走査.gif" alt="ジャグ配列の走査" />
<h2>配列のメソッド</h2>
ここでは、配列専用のメソッドを紹介します。<br />vb.netでは配列関連メソッドは破壊的に動作するため、元の配列自体が変更されることに注意してください。<br />他の言語でも破壊的な動作をすることが多いですが、、、<br /><br />ここでは以下のメソッドを紹介します。
<ul>
	<li>Sort</li>
	<li>Reverse</li>
	<li>CopyTo</li>
	<li>Clone</li>
	<li>Clear</li>
</ul>
<h3>Sort</h3>
配列を昇順で並び替えます。
<code class="vb-dot-net">
	Dim lang = "haskell,vb,python,f#,swift".Split(",")
	Array.Sort(lang)
	For Each element In lang
		Console.WriteLine(element)
	Next

	' ***** コンソール *****
	' f#
	' haskell
	' python
	' swift
	' vb
	' ***** ******** *****
</code>
<h3>Reverse</h3>
配列を順番を逆転させます。
<code class="vb-dot-net">
	Dim lang = "haskell,vb,python,f#,swift".Split(",")
	Array.Reverse(lang)
	For Each element In lang
		Console.WriteLine(element)
	Next

	' ***** コンソール *****
	' swift
	' f#
	' python
	' vb
	' haskell
	' ***** ******** *****
</code>
<div class="separator"></div>
配列を降順で並び替える場合には、Sortメソッドで昇順に並び替えた後に、Reverseメソッドをこれを入れ替えます。
<code class="vb-dot-net">
	Dim lang = "haskell,vb,python,f#,swift".Split(",")
	Array.Sort(lang)
	Array.Reverse(lang)
	For Each element In lang
		Console.WriteLine(element)
	Next

	' ***** コンソール *****
	' vb
	' swift
	' python
	' haskell
	' f#
	' ***** ******** *****
</code>
<h3>CopyTo</h3>
配列をコピーします。<br /><br />「=」でいいや～んって思う方もいると思います。<br />ということで、「=」の問題点を最初に説明します。
<code class="vb-dot-net">
	Dim hi1() As String = {
		"こんにちは"
	}
	Console.WriteLine(hi1(0))
	Dim hi2() As String = hi1
	Console.WriteLine(hi2(0))

	' ***** コンソール *****
	' こんにちは
	' こんにちは
	' ***** ******** *****
</code>
当然ですね♪<br /><br />では、以下のコードを実行すると何が出力されるでしょうか???
<code class="vb-dot-net">
	Dim hi1() As String = {
		"こんにちは"
	}
	Console.WriteLine(hi1(0))
	Dim hi2() As String = hi1
	hi1(0) = "おはよう♪"
	Console.WriteLine(hi1(0))
	Console.WriteLine(hi2(0))

	' ***** コンソール *****
	' こんにちは
	' おはよう♪
	' おはよう♪
	' ***** ******** *****
</code>
配列を「=」で代入すると、配列に対する参照が代入されます。<br />したがって、代入元の変数と代入先の変数は同一の配列を共有し、どちらかが変更すればもう片方にも影響を与えます。
<img src="../pics/配列の参照性.png" alt="配列の参照性" />
<p>簡単のために、配列の要素数はひとつだけにしてあります。</p>
<div class="separator"></div>
これを防ぐために配列を参照ではなく、値でコピーをする方法が配列のCopyメソッドです。<br />もっとも、配列は比較的データサイズを大きいことが想定され、これをコピーするとメモリの浪費につながるため、原則として使用するべきではありません。<br /><br />ここでは実践的なコードのあるべき姿は度外視して、Copyメソッドを使用してみます。
<code class="vb-dot-net">
	配列.CopyTo(コピー先配列, インデックス番号)
</code>
<code class="vb-dot-net">
	Dim hi1() As String = {
		"こんにちは"
	}
	Console.WriteLine(hi1(0))
	Dim hi2(0) As String
	hi1.CopyTo(hi2, 0)
	hi1(0) = "おはよう♪"
	Console.WriteLine(hi1(0))
	Console.WriteLine(hi2(0))

	' ***** コンソール *****
	' こんにちは
	' おはよう♪
	' こんにちは
	' ***** ******** *****
</code>
完全なコピーならインデックス番号を「0」で設定しますが、途中に設定することで配列を合体させることも可能です。
<code class="vb-dot-net">
	Dim lang1() As String = {
		"haskell",
		"ocaml",
		"f#"
	}
	Dim lang2() As String = {
		"python",
		"vb.net",
		"fortran",
		"pascal",
		"java"
	}
	lang1.CopyTo(lang2, 2)
	For Each e In lang2
		Console.WriteLine(e)
	Next

	' ***** コンソール *****
	' python
	' vb.net
	' haskell
	' ocaml
	' f#
	' ***** ******** *****
</code>
コピー先配列に十分な空きスペースないとエラーになります。<br />これはコンパイル時ではなく、実行時にエラーとなるため注意してください。<br />とっても、vb.netはコンパイル時のチェックは甘いので常に気を付ける必要がありますが、、、
<h3>Clone</h3>
The「配列のコピー」メソッドです。<br />配列をコピーして新たに生成した配列を返します。<br /><br />以下のように書きます。
<code class="vb-dot-net">
	配列.Clone()
</code>
では、配列をCloneメソッドでコピーした後に元の配列を変更してコピー先に影響を与えないことを確認しましょう♪
<code class="vb-dot-net">
	Dim hi1() As String = {
		"こんにちは"
	}
	Console.WriteLine(hi1(0))
	Dim hi2() As String = hi1.Clone()
	hi1(0) = "おはよう♪"
	Console.WriteLine(hi1(0))
	Console.WriteLine(hi2(0))

	' ***** コンソール *****
	' こんにちは
	' おはよう♪
	' こんにちは
	' ***** ******** *****
</code>
「hi2(0)」の中身は「こんにちは」のままで、「おはよう♪」に変更されていないことが確認できますね♪
<h2>コレクション</h2>
配列と似ていて、複数のデータを包括して保持する複合的なデータ型ですが、配列と異なりサイズが変更可能であり、かつ各要素のデータは異なっていてもok!です。<br />ダメなケースもあります。<br /><br />使いやすそうですが、配列を走査しての各要素に一定の処理をする際に、データ型の変換をする必要がある点や、メモリ空間上は配列ではなくリストとしての色合いが強いという点から原則としては配列を使用するべきです。<br /><br />因みに、配列と比べた際のリストの欠点はインデックス番号による要素の指定が困難であることが挙げられます。
<img src="../pics/コレクションと配列.png" alt="配列とコレクション" />
コレクション型のデータとはSystem.Collections名前空間に属するクラス群を総称するもので、具体的には以下のデータ型があります。
<div class="scroll-600w">
	<table border="1">
		<tbody>
			<tr>
				<td>Collection<wbr>Extensions</td>
				<td>ジェネリックコレクションの拡張メソッドです。</td>
			</tr>
			<tr>
				<td>Comparer&lt;T&gt;</td>
				<td>IComparer&lt;T&gt;ジェネリックインターフェイスの実装のための基本クラスを提供します。</td>
			</tr>
			<tr>
				<td>Dictionary&lt;TKey,TValue&gt;.Key<wbr>Collection</td>
				<td>Dictionary&lt;TKey,TValue&gt;内のキーのコレクションを表します。このクラスは継承できません。</td>
			</tr>
			<tr>
				<td>Dictionary&lt;TKey,TValue&gt;.Value<wbr>Collection</td>
				<td>Dictionary&lt;TKey,TValue&gt;内の値のコレクションを表します。このクラスは継承できません。</td>
			</tr>
			<tr>
				<td>Dictionary&lt;TKey,TValue&gt;</td>
				<td>キーと値のコレクションを表します。</td>
			</tr>
			<tr>
				<td>Equality<wbr>Comparer&lt;T&gt;</td>
				<td>IEqualityComparer&lt;T&gt;ジェネリックインターフェイスの実装のための基本クラスを提供します。</td>
			</tr>
			<tr>
				<td>Hash<wbr>Set&lt;T&gt;</td>
				<td>値のセットを表します。</td>
			</tr>
			<tr>
				<td>Keyed<wbr>ByType<wbr>Collection&lt;TItem&gt;</td>
				<td>キーとして機能する型が項目であるコレクションを提供します。</td>
			</tr>
			<tr>
				<td>Key<wbr>Not<wbr>Found<wbr>Exception</td>
				<td>コレクション内の要素にアクセスするために指定したキーが、コレクション内のいずれのキーとも一致しない場合にスローされる例外。</td>
			</tr>
			<tr>
				<td>Key<wbr>Value<wbr>Pair</td>
				<td>KeyValuePair&lt;TKey,TValue&gt;構造体のインスタンスを作成します。</td>
			</tr>
			<tr>
				<td>Linked<wbr>List&lt;T&gt;</td>
				<td>ダブルリンクリストを表します。</td>
			</tr>
			<tr>
				<td>Linked<wbr>List<wbr>Node&lt;T&gt;</td>
				<td>LinkedList&lt;T&gt;のノードを表します。このクラスは継承できません。</td>
			</tr>
			<tr>
				<td>List&lt;T&gt;</td>
				<td>インデックスを使用してアクセスできる、厳密に型指定されたオブジェクトのリストを表します。リストの検索、並べ替え、および操作のためのメソッドを提供します。</td>
			</tr>
			<tr>
				<td>Priority<wbr>Queue&lt;TElement,TPriority&gt;.Unordered<wbr>Items<wbr>Collection</td>
				<td>並べ替え保証なしで、aPriorityQueue&lt;TElement,TPriority&gt;の内容を列挙します。</td>
			</tr>
			<tr>
				<td>Priority<wbr>Queue&lt;TElement,TPriority&gt;</td>
				<td>値と優先度を持つ項目のコレクションを表します。dequeueでは、優先度の値が最も低い項目が削除されます。</td>
			</tr>
			<tr>
				<td>Queue&lt;T&gt;</td>
				<td>オブジェクトの先入れ先出しコレクションを表します。</td>
			</tr>
			<tr>
				<td>Reference<wbr>Equality<wbr>Comparer</td>
				<td>2つのオブジェクトインスタンスを比較するときに、値の等価性(Equals(Object))ではなく参照の等価性(ReferenceEquals(Object,Object))を使用するIEqualityComparer&lt;T&gt;。</td>
			</tr>
			<tr>
				<td>Sorted<wbr>Dictionary&lt;TKey,TValue&gt;.Key<wbr>Collection</td>
				<td>SortedDictionary&lt;TKey,TValue&gt;内のキーのコレクションを表します。このクラスは継承できません。</td>
			</tr>
			<tr>
				<td>Sorted<wbr>Dictionary&lt;TKey,TValue&gt;.Value<wbr>Collection</td>
				<td>SortedDictionary&lt;TKey,TValue&gt;内の値のコレクションを表します。このクラスは継承できません。</td>
			</tr>
			<tr>
				<td>Sorted<wbr>Dictionary&lt;TKey,TValue&gt;</td>
				<td>キーに基づいて並べ替えられた、キーと値のペアのコレクションを表します。</td>
			</tr>
			<tr>
				<td>Sorted<wbr>List&lt;TKey,TValue&gt;</td>
				<td>関連付けられたIComparer&lt;T&gt;実装に基づいて、キーにより並べ替えられた、キーと値のペアのコレクションを表します。</td>
			</tr>
			<tr>
				<td>Sorted<wbr>Set&lt;T&gt;</td>
				<td>一定の並べ替え順序で管理されたオブジェクトのコレクションを表します。</td>
			</tr>
			<tr>
				<td>Stack&lt;T&gt;</td>
				<td>指定した同じ型のインスタンスの、後入れ先出し(LIFO)の可変サイズのコレクションを表します。</td>
			</tr>
			<tr>
				<td>Synchronized<wbr>Collection&lt;T&gt;</td>
				<td>ジェネリックパラメーターで指定された型のオブジェクトを要素として格納するスレッドセーフのコレクションを提供します。</td>
			</tr>
			<tr>
				<td>Synchronized<wbr>Keyed<wbr>Collection&lt;K,T&gt;</td>
				<td>ジェネリックパラメーターで指定した型のオブジェクトを格納し、キーによってグループ化される、スレッドセーフのコレクションを提供します。</td>
			</tr>
			<tr>
				<td>Synchronized<wbr>Read<wbr>Only<wbr>Collection&lt;T&gt;</td>
				<td>ジェネリックパラメーターで指定した型のオブジェクトを要素として格納する、スレッドセーフの読み取り専用コレクションを提供します。</td>
			</tr>
		</tbody>
	</table>
</div>
<p><a href="https://docs.microsoft.com/ja-jp/dotnet/api/system.collections.generic?view=net-6.0">MS公式ページ</a>より。</p>
ここでは、このうちの以下の2つのデータ型を紹介します。
<ul>
	<li>List</li>
	<li>Hashtable</li>
</ul>
<img src="../pics/System.Collections.png" alt="コレクション型" />
MS公式はコレクション型に関しては原則としてジェネリック型を使用するべきとの主張をしているので、ここでもジェネリック型を使用します。<br />ということで、以下の名前空間をインポートします。
<code class="vb-dot-net">
Imports System.Collections.Generic
</code>
<h2>List</h2>
The「リスト」です。<br />似たデータ型に「ArrayList」がありますが、List型はデータ型を指定することからより高速に動作します。<br />したがって、ArrayListよりも一般的に使用されます。<br /><br />List型のデータは以下のように宣言します。
<code class="vb-dot-net">
	New List(Of データ型)
</code>
また、リスト型のデータに要素を追加するには以下のように書きます。
<code class="vb-dot-net">
	List型.Add(要素)
	' or
	List型.AddRange(New データ型() {要素1, 要素2, 要素3, ...})
</code>
要素をひとつだけ追加する際にはAddメソッドを、複数同時に追加する際にはAddRangeメソッドを使用します。
<code class="vb-dot-net">
	Dim lang = New List (Of String)()
	lang.AddRange(New String() {
		"python",
		"haskell",
		"vb.net"
	})
	lang.Add("fortran")
	For Each e In lang
		Console.WriteLine(e)
	Next

	' ***** コンソール *****
	' python
	' haskell
	' vb.net
	' fortran
	' ***** ******** *****
</code>
<h3>Insert</h3>
挿入位置を指定して、要素を追加します。
<code class="vb-dot-net">
	List.Insert(挿入位置, 挿入する要素)
</code>
<code class="vb-dot-net">
	Dim lang = New List (Of String)()
	lang.AddRange(New String() {
		"haskell",
		"python",
		"vb.net",
		"fortran"
	})
	lang.Insert(2, "c/c++")
	For Each e In lang
		Console.WriteLine(e)
	Next

	' ***** コンソール *****
	' haskell
	' python
	' c/c++
	' vb.net
	' fortran
	' ***** ******** *****
</code>
<h3>並び替え</h3>
List型は配列と同様に、SortメソッドとReverseメソッドが使用可能です。
<code class="vb-dot-net">
	Dim lang = New List (Of String)()
	lang.AddRange(New String() {
		"python",
		"haskell",
		"vb.net",
		"fortran"
	})
	lang.Sort()
	lang.Reverse()
	For Each e In lang
		Console.WriteLine(e)
	Next

	' ***** コンソール *****
	' vb.net
	' python
	' haskell
	' fortran
	' ***** ******** *****
</code>
<h3>値の検索</h3>
IndexOfメソッドを使用して値のインデックス番号を取得することができます。<br />値が存在しない場合には、「-1」が返されます。
<code class="vb-dot-net">
	Dim lang = New List (Of String)()
	lang.AddRange(New String() {
		"haskell",
		"python",
		"vb.net",
		"fortran"
	})
	Console.WriteLine(lang.IndexOf("vb.net"))
	Console.WriteLine(lang.IndexOf("assembly"))

	' ***** コンソール *****
	' 2
	' -1
	' ***** ******** *****
</code>
<div class="separator"></div>
LastIndexOfメソッドを使用することで後ろから検索をかけることもできます。
<h3>値が含まれるか判定</h3>
Containsメソッドを使用することである値がコレクションに含まれるかを判定します。<br />IndexOfメソッドで「-1」か否かをチェックしてもok!ですが、、、
<code class="vb-dot-net">
	Dim lang = New List (Of String)()
	lang.AddRange(New String() {
		"haskell",
		"python",
		"vb.net",
		"fortran"
	})
	Do While True
		Dim s As String = Console.ReadLine()
		If lang.Contains(s) Then
			Console.WriteLine("あるよ♪")
		Else
			Console.WriteLine("ないです、、、")
		End If
	Loop
</code>
<img src="../pics/Collections.Contains.gif" alt="コレクション型 Containsメソッド" />
<h3>ToArray</h3>
List型のデータを配列型に変換します。<br />別にList型のままでもok!な気がしますが、配列型の方がなにかと都合がいい時もありますからね、、、<br />配列に格納する要素が確定するまでは暫定的にList型で保持して、確定したら配列型に変換することを目的としているのでしょうか???
<h3>Remove</h3>
List型の要素を指定して削除します。
<code class="vb-dot-net">
	List.Remove(削除する要素)
</code>
<code class="vb-dot-net">
	Dim lang = New List (Of String)()
	lang.AddRange(New String() {
		"haskell",
		"python",
		"vb.net",
		"fortran"
	})
	lang.Remove("python")
	For Each e In lang
		Console.WriteLine(e)
	Next

	' ***** コンソール *****
	' haskell
	' vb.net
	' fortran
	' ***** ******** *****
</code>
<h3>Clear</h3>
配列のClearメソッドと同様で、要素をすべて削除します。
<h3>Clone</h3>
配列のCloneメソッドと同様で、List型データをコピーします。









<h2>From</h2>




<?php footer(); ?>