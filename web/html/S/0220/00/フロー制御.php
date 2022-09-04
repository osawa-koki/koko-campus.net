<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-20",
	"updated" => "2022-01-20"
);
head($obj);
?>
<h2>if(条件分岐)</h2>
書き方は他の言語と同じです。<br />以下のように書きます。
<code class="rust">
	fn main() {
		if 条件式 {
			//条件を満たした場合の処理
		} else {
			//条件を満たさなかった場合の処理
		}
	}
</code>
では、入力した数字が奇数か偶数かを判断する簡単なプログラムを作成してみましょう♪
<code class="rust">
	fn main() {
		let mut number = String::new(); //入力したデータを保存する用の変数をString型で作成
		std::io::stdin().read_line(&mut number).ok(); //入力したデータを取得
		let answer: i8 = number.trim().parse().ok().unwrap(); //入力されたデータを数字に変換
		if answer % 2 == 0 {
			println!("{}", "偶数!");
		} else {
			println!("{}", "奇数♪");
		}
	}
</code>
<img src="../pics/if.gif" alt="if" />
他の言語と異なる点は以下の2つです。
<ul>
	<li>式としての性質</li>
	<li>条件式の制限</li>
</ul>
<h3>式としての性質</h3>
ifは他の言語と異なり式であるため、以下のようなコードを実行可能です。
<code class="rust">
	fn main() {
		let mut number = String::new();
		std::io::stdin().read_line(&mut number).ok();
		let answer: i8 = number.trim().parse().ok().unwrap();
		let comment = if answer % 2 == 0 { //comment変数に、もし余りが0だったら、、、
			"偶数!" //「偶数!」を代入し、、、
		} else { //それ以外だったら
			"奇数♪" //「奇数♪」を代入
		}; //「;(セミコロン)」を忘れずに!!
		println!("{}", comment);
	}
</code>
<h3>条件式の制限</h3>
c/c++であれば、条件式は「0」か「0以外」かで判断しますが、rustでは条件式の結果は必ず真偽値である必要があります。<br />例えば以下のコードはエラーになります。
<code class="rust">
	fn main() {
		if 1 {
			println!("{}", "0以外です!");
		}
	}
</code>
<img src="../pics/if-真偽値エラー.png" alt="if 真偽値エラー" />
<h2>match(条件分岐)</h2>
他のプログラミング言語でいうswitchに似ています。<br />以下のように記述します。
<code class="rust">
	match 対象のデータ {
		比較対象1 => 比較対象1と一致した場合に返す値,
		比較対象2 => 比較対象2と一致した場合に返す値,
		比較対象3 => 比較対象3と一致した場合に返す値,
	}
</code>
注意点は以下の2つです。
<ul>
	<li>マッチの順番</li>
	<li>パターンの網羅性</li>
</ul>
<h3>マッチの順番</h3>
先にマッチしたものを返します。<br />例えば比較対象1と比較対象2のどちらにもマッチする場合には先に書かれている比較対象1にマッチした場合の値を返します。
<h3>パターンの網羅性</h3>
パターンは必ずどれかにマッチして値を返す必要があります。<br />言い換えれば比較対象は対象のデータがとるうる全てを網羅する必要があります。<br />通常は後ほど説明する列挙型と呼ばれる取り得る値が列挙(限定)されている際に使用するので全てを網羅することができるので問題ありませんが、例えば文字列のマッチをする際には注意が必要です。<br />文字列や数字に関しては、そのとりうる全ての選択肢を書くのは不可能なので「_(アンダースコア)」を使用してどれにもマッチしなかった場合の処理を規定します。<br />これは他の言語でいうdefaultに該当します。
<div class="separator"></div>
では拡張子からそのコードが採用しているプログラミング言語を返す関数を作成してみましょう♪
<code class="rust">
	fn guess_lang(lang: &amp;str) -> &amp;str {
		match lang { //
			".py" => "python",
			".go" => "go",
			".rs" => "rust",
			".php" => "php",
			".hs" => "haskell",
			".js" => "javascript",
			_ => "分かりません、、、",
		}
	}

	fn main() {
		let mut ext = String::new(); //コンソールから取得する文字列を格納する変数を宣言
		std::io::stdin().read_line(&amp;mut ext).expect("ダメ!!"); //コンソール画面から取得したデータを変数に代入
		println!("{}", guess_lang(&amp;ext.trim())); //変数から取得したデータを引数に戻り値を表示
	}
</code>
ユーザが入力した文字列は&amp;str型ではなくてString型に設定してあるため、「&amp;」を付けてこれを&amp;str型に変換します。<br />また、ユーザが入力したデータの最後には改行文字が挿入されるためこれをtrimメソッドで削除します。<br />僕はこれを知らなくて30分程度原因追及に費やしました、、、笑
<img src="../pics/match.gif" alt="match" />
<h2>while(反復処理)</h2>
書き方は他の言語と同様です。<br />以下のように書きます。
<code class="rust">
	while 条件式 {
		//反復処理
	}
</code>
では実際にカウントダウンしてみましょう♪
<code class="rust">
	use std::{thread, time::Duration}; //時間を扱うモジュールのインポート

	fn main() {
		let mut i = 5; //iは変更するよ♪
		while i > 0 {
			println!("{}", i);
			i = i - 1;
			thread::sleep(Duration::from_millis(1000)); //1秒停止
		}
		println!("ズドーン!!");
		thread::sleep(Duration::from_millis(100)); //0.1秒停止
		while i < 300 {
			print!("{}", "-");
			i = i + 1;
		}
	}
</code>
<img src="../pics/while-ズドーン.gif" alt="while" />
時間を扱うモジュールを使用してますが、これは無視してok!です。
<h2>loop(反復処理)</h2>
一連の処理をある条件を満たすまで繰り返します。<br />他の言語でいう、「while true」と「break;」に該当します。
<code class="rust">
	loop {
		//処理
	}
</code>
無限ループに陥るため、通常はifを用いてある条件を満たしたら「break;」で強制的にループを終了させます。
<code class="rust">
	fn main() {
		let mut i = 0;
		loop {
			if 10 &lt; i {
				break;
			}
			println!("{}", i);
			i = i + 1;
		}
	}
	/* &darr; コンソール &darr;
	0
	1
	2
	3
	4
	5
	6
	7
	8
	9
	10
	*/
</code>
<h2>for(反復処理)</h2>
配列などのコレクションを走査します。<br />以下のように書きます。
<code class="rust">
	for 各要素用の変数 in 配列.イテレータメソッド {
		//反復処理
	}
</code>
イテレータメソッドには以下の3つがあります。
<table>
	<caption>イテレータメソッド</caption>
	<tbody>
		<tr>
			<th>.iter()</th>
			<td>最も一般的なイテレータメソッドです。<br />「参照渡し &times; 不可変」です。</td>
		</tr>
		<tr>
			<th>.iter_mut()</th>
			<td>「参照渡し &times; 可変」のイテレータメソッドです。</td>
		</tr>
		<tr>
			<th>.into_iter()</th>
			<td>「値渡し」のイテレータメソッドです。</td>
		</tr>
	</tbody>
</table>
<p class="r">参考サイトは<a href="https://doc.rust-lang.org/std/iter/index.html">こちら</a>。</p>
通常は.iter()メソッドを使用すればok!です。<br />では配列をひとつずつ取り出すプログラムを作成しましょう♪
<code class="rust">
	fn main() {
		let ary = ["ピチュー", "ピカチュウ", "ライチュウ"];
		for e in ary.iter() {
			println!("{}", e);
		}
	}
	/* &dar; コンソール &darr;
	ピチュー
	ピカチュウ
	ライチュウ
	*/
</code>
<?php footer(); ?>