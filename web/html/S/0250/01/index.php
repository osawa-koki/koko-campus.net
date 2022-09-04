<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-04-10",
	"updated" => "2022-04-10"
);
head($obj);
?>
<h2>visual basic中級</h2>
では、これからvisual basicの中級講座を開始します。<br />これからの説明は、visual basic入門の内容を前提としていますので、visual basic入門をまだ受け終えていない方はさきにそちらを受けて下さい。
<a href="../../vb入門/branch" class="link-subject to-vb入門" target="_blank"></a>
ここでは、より高度なvb.netプログラミングに関する知識を紹介します。<br />それでは、Let's start!!
<h2>オブジェクト指向</h2>
一応、復習ですが、オブジェクト指向はvb.netの基本ですのでもう一度復習します。<br /><br />オブジェクトとは、データ(変数)と処理(関数)をまとめたものを言い、それぞれプロパティ(フィールド)とメソッドと呼びます。
<img src="../pics/オブジェクト.png" alt="オブジェクト" />
プロパティとメソッドを合わせてオブジェクトとメンバと言い、メンバにアクセスするには「.(ドット)」演算子を使用します。
<code class="vb-dot-net">
	オブジェクト.メンバ
</code>
メンバがメソッドである場合には括弧を続けて、括弧内には引数を指定します。
<code class="vb-dot-net">
	オブジェクト.メソッド(引数)
</code>
<h3>クラスとインスタンス</h3>
オブジェクトには大きく以下の2つがあります。
<ul>
	<li>クラスオブジェクト</li>
	<li>インスタンスオブジェクト</li>
</ul>
オブジェクトという言葉では、どちらを意味するのか不明であるため原則として使用しません。<br />また、これ以降はクラスオブジェクトをクラス、インスタンスオブジェクトをインスタンスと省略して呼びます。
<h4>クラス</h4>
クラスとはオブジェクト指向の考え方において、オブジェクトの雛形となる部分です。<br />オブジェクトの設計図としての役割を持ち、クラスから実際にオブジェクトを作成することでこれを使用します。
<img src="../pics/クラス.png" alt="クラスオブジェクト" />
たこ焼きってアウトラインは決まっていますよね、、、<img src="../pics/たこ焼き.png" alt="たこ焼き" class="絵文字 x" /><img src="../pics/たこ焼き.png" alt="たこ焼き" class="絵文字 x" /><img src="../pics/たこ焼き.png" alt="たこ焼き" class="絵文字 x" /><br />客によって変えるのはトッピングだとか具材だけですので、雛形を作成してそこから実際のたこ焼きを作ってしまえば楽ちんです。
<h4>インスタンス</h4>
オブジェクトの雛形であるクラスから実際に生成されたオブジェクトをインスタンスを言います。
<img src="../pics/インスタンス.png" alt="インスタンスオブジェクト" />
<h2>アプリケーションの種類</h2>
入門講座ではそこまで詳しく説明しませんでしたが、アプリケーション・プログラムの種類はインプット・アウトプットの形態から以下の2つに分類できます。
<ul>
	<li>CUI</li>
	<li>GUI</li>
</ul>
<h3>CUIアプリケーション</h3>
「Character User Interface」の略で、文字によってプログラムの入出力を行います。<br /><strong>コンソールアプリ</strong>とも呼ばれます。
<img src="../pics/console-app.gif" alt="コンソールアプリ" />
高速で動作し、かつ簡単にコードをかける一方で、ユーザビリティに関しては低いという問題があります。
<div class="separator"></div>
「ファイル &gt; 新規作成 &gt; プロジェクト」から、対象言語を「visual basic」に限定し、その下から「コンソールアプリアプリケーション」を選択します。
<img src="../pics/create-console-app.gif" alt="コンソールアプリプロジェクトの作成" />
<h3>GUIアプリケーション</h3>
「Graphical User Interface」の略で、マウスによるカーソル操作によってプログラムの入出力を行います。<br /><strong>デスクトップアプリ</strong>とも呼ばれます。
<img src="../pics/desktop-app.gif" alt="デスクトップアプリ" />
動作は低速でコーディングも難しいですが、ユーザの操作が簡単であるという利点があります。
<div class="separator"></div>
「ファイル &gt; 新規作成 &gt; プロジェクト」から、対象言語を「visual basic」に限定し、その下から「WIndowsフォームアプリケーション」を選択します。
<img src="../pics/create-desktop-app.gif" alt="デスクトップアプリプロジェクトの作成" />
<div class="separator2"></div>
ここでは、その目的に応じてコンソールアプリとデスクトップアプリの両方を使用します。
<h2>vb.netコンパイラ</h2>
通常はvb.netプログラミングではvsなどのIDEを使用すると思うのですが、何らかの理由があってコマンドラインでコンパイルをしたいと言う人向けに、、、<br /><br />vb.netのコンパイラはwindowsであれば、デフォルトでインストールされています。<br />「<span class="en">C:\Windows\Microsoft.NET\Framework64\v4.0.30319</span>」フォルダ内にある「vbc.exe」がvb.netのコンパイラです。<br /><br />これを環境変数に登録すればok!です。<br /><br />以下のコマンドでファイルをコンパイル可能です。
<code class="shell">
	vbs ファイルのパス
</code>
「ファイル名.exe」という名前のファイルが生成されます。<br />試しに、以下のコードをコンパイルして実行してみましょう♪
<code class="vb-dot-net">
	Module Module1
		Sub Main()
			Console.WriteLine("それでは、")
			Console.WriteLine("vb.net中級編")
			Console.WriteLine("スタートです♪")
		End Sub
	End Module
</code>
<img src="../pics/vbc.gif" alt="vbcコンパイル" />
<?php footer(); ?>