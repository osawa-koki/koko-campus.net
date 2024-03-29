<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-03-01",
	"updated" => "2022-03-01"
);
head($obj);
?>
<h2>イベントハンドリング</h2>
イベントハンドリングとは、ユーザが何らかの文字を入力したりユーザがボタンを押したりしたら処理を実行する仕組みを言います。
<img src="../pics/イベントハンドリング.gif" alt="イベントハンドリング" />
<h2>command</h2>
では、実際にイベントハンドリングを実装してみましょう♪<br />ウィジェット生成時のcommandオプションに関数名を指定することで実現します。<br /><br />ここではボタンのクリック時に関数を実行します。
<code class="python">
	import tkinter as tk

	root = tk.Tk()
	root.title("koko's lesson")
	root.geometry("500x350+100+100")
	root.configure(bg="white")

	count = 0
	def clicked():
		global count
		count += 1
		print(count)

	button = tk.Button(root, command=clicked, text="クリック!", font=("consolas", 16, "bold"), fg="red", bg="yellow")
	button.pack(pady=30)

	root.mainloop()
</code>
<img src="../pics/イベントハンドリング(サンプル).gif" alt="イベントハンドリング" />
javascriptではこのように何らかのイベントに紐づけられて、そのイベントの発生で発火される関数をコールバック関数と呼ぶのでここでもコールバック関数と呼ぶことにします。
<h2>コールバック関数への引数</h2>
複数のウィジェットのイベントに紐づけられる関数で、それぞれで異なるデータを取得する際には引数を使用します。<br />しかし、以下のように書くことはできません。
<code class="python">
	button = tk.Button(root, command=clicked(1), text="クリック!", font=("consolas", 16, "bold"), fg="red", bg="yellow")
	button.pack(pady=30)
</code>
理由は関数は積極評価されるため、clicked関数が実行された結果がcommandに紐づけられてしまうからです。<br />pythonでは、関数名の後に括弧をつけることでその場で実行されてしまいます。<br /><br />イベント発生時に引数を渡して実行するためにはラムダ式を使用します。<br />ラムダ式とは無記名関数とも呼ばれ、名前のない関数です。<br />使用目的としては一度きりの処理の集まりを記述するほか、関数の実行のタイミングの調整に用いられます。<br />ラムダ式は以下のように記述します。
<code class="python">
	lambda 引数1, 引数2, ...: 式
</code>
これを用いてコールバック関数に引数を渡します。<br />具体的には以下のように書きます。
<code class="python">
	def clicked(arg):
		print(arg)

	button1 = tk.Button(root, command=lambda: clicked(1), text="ボタン1", font=("consolas", 16, "bold"), fg="red", bg="yellow")
	button1.pack(pady=30)

	button2 = tk.Button(root, command=lambda: clicked(2), text="ボタン2", font=("consolas", 16, "bold"), fg="red", bg="yellow")
	button2.pack(pady=30)
</code>
<img src="../pics/コールバック関数-ラムダ式.gif" alt="ラムダ式" />
<h2>ウィジェットの操作</h2>










<?php footer(); ?>