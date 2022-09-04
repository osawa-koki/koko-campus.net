<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-20",
	"updated" => "2022-01-20"
);
head($obj);
?>
<h2>main関数</h2>
rustもc/c++同様にmain関数がプログラムへのエントリーポイントとなります。<br />関数については後ほど詳しく説明しますが、fnで定義します。
<code class="rust">
	fn main() {
		//メインプログラム
	}
</code>
<h2>コメントアウト</h2>
rustプログラミングにおいてコメントアウトは「//」で書きます。
<code class="rust">
	fn main() {
		//コメントアウト!!
	}
</code>
コメントアウトが複数行に渡る場合には「/**/」を使用します。
<code class="rust">
	fn main() {
		/*
		はぁ、
		今日も
		疲れたな～
		*/
	}
</code>
<h2>標準出力</h2>
コンソール画面に文字を表示するための関数には以下の4種類あります。
<ul>
	<li>print!</li>
	<li>println!</li>
	<li>eprint!</li>
	<li>eprintln!</li>
</ul>
<h3>print!</h3>
コンソール画面に引数として文字列を表示します。<br />c/c++におけるprintfに似ています。<br />第一引数は書式文字列で第二引数以降に書式文字列に挿入する文字列を渡します。<br />書式文字列内のテンプレートリテラルには「{}」を使用します。
<code class="rust">
	fn main() {
		print!("私のニックネームは{}で、好きな言語は{}です。", "koko", "python"); //「私の名前はkokoで、好きな言語はpythonです。」と出力
	}
</code>
「{}」内に数字を指定して表示する引数の表示順序を指定することができます。
<p class="r">第二引数が「0」、第三引数が「1」、、、となります。</p>
<code class="rust">
	fn main() {
		print!("{3}{0}{2}{0}{1}{0}", "パジャマ", "黄", "青", "赤"); //「赤パジャマ青パジャマ黄パジャマ」と出力
	}
</code>
print!関数は自動的に改行されません。
<code class="rust">
	fn main() {
		print!("改行");
		print!("されません。");
	}
	/* &darr; コンソール &darr;
	改行されません。
	*/
</code>
文字列内で改行する場合には「\n」を使用します。<br />「\n」と表示するには「\\n」と書いてエスケープ処理します。
<code class="rust">
	fn main() {
		print!("改行\nするには\n\\nを使用するよ♪")
	}
	/* &darr; コンソール &darr;
	改行
	するには
	\nを使用するよ♪
	*/
</code>
<h3>println!</h3>
print!関数の自動的に改行されるバージョンです。
<code class="rust">
	fn main() {
		print!("改行");
		print!("される!!");
	}
	/* &darr; コンソール &darr;
	改行
	される!!
	*/
</code>
<h3>eprint!</h3>
print!関数の標準エラー出力バージョンです。
<h3>eprintln!</h3>
println!関数の標準エラー出力バージョンです。
<h2>標準入力</h2>
コンソール画面に入力された文字列を取得するためのコードは以下のようになります。
<code class="rust">
	fn main() {
		let mut word = String::new();
		std::io::stdin().read_line(&mut word).expect("ダメ!!");
		println!("入力された文字は {}", word);
	}
</code>
<img src="../pics/標準入力.gif" alt="標準入力" />
ひとつずつ説明します。
<h3>let mut word</h3>
変数を宣言しています。<br />変数の宣言にはlet修飾子を使用しますが、rustで通常の方法で宣言された変数は不可変(イミュータブル)であるため、これを後で代入する場合には「let mut」として可変(ミュータブル)宣言します。<br />「mut」はミュータブルの略です。<br />mut修飾子を付けずに、変数に値を再代入するとエラーを吐き出します。
<code class="rust">
	fn main() {
		let word = "ピチュー";
		word = "ピカチュウ";
		println!("{}", word);
	}
</code>
<img src="../pics/イミュータブル.png" alt="イミュータブル" />
不可変の変数に二回値を代入しちゃダメ!!って怒られちゃいました、、、<br />変数を変更する場合には必ずmut修飾子を付けてくださいね♪
<code class="rust">
	fn main() {
		let mut word = "ピチュー";
		word = "ピカチュウ";
		println!("{}", word);
	}
</code>
<img src="../pics/never-read-var.png" alt="無意味な変数" />
これで動きます。<br />ピチューって値は一度も使ってないけど大丈夫か???ってrustコンパイルちゃんに心配されちゃいましたけど、、、<br />rustちゃんは優秀ですね!!
<h3>String::new()</h3>
rustでは文字列型を表すのに「&amp;str」と「String」型があります。
<table>
	<caption>&amp;strとString</caption>
	<tbody>
		<tr>
			<th>&amp;str</th>
			<td>文字列スライスと呼ばれ、固定サイズで変更不可能なデータ型です。<br />これはUTF-8のバイトシーケンスへの参照を保持します。<br />String型に変換するにはto_stringメソッドを使用します。</td>
		</tr>
		<tr>
			<th>String</th>
			<td>伸張可能(可変)な文字列のデータ型です。<br />String型は&amp;strのデータをto_stringメソッドで変換するか、ないしはString型のデータを直接作成します。<br /></td>
		</tr>
	</tbody>
</table>
<p class="r">参考サイトは<a href="https://doc.rust-jp.rs/the-rust-programming-language-ja/1.6/book/strings.html">こちら</a>。</p>
非常にややこしいですね、、、<br />覚えておいてほしいのは、ユーザが入力するデータを保持するデータ型はString型である必要があることです。<br />例えばユーザが入力する文字列を格納する変数を空文字列("")で宣言して、これにユーザが入力した文字列を代入するとエラーとなります。<br />理由は空文字列は&amp;str型であるからです。
<code class="rust">
	fn main() {
		let mut word = ""; //空文字列で宣言(＆str型)
		std::io::stdin().read_line(&amp;mut word).ok();
		eprint!("入力された文字は {}", word);
	}
</code>
<img src="../pics/str-string_error.png" alt="str型とString型" />
解決策は以下の二通りあります。
<ul>
	<li>String型を宣言</li>
	<li>&amp;strをString型に変換</li>
</ul>
<h4>String型を宣言</h4>
<a href="https://doc.rust-jp.rs/book-ja/">公式ドキュメント</a>で採用されている方法です。<br />「String::new」として空のString型の文字列を作成します。<br />「::」は関連関数(メソッド)であり、newによって空のString型の新規文字列を作成しています。
<code class="rust">
	let mut word = String::new();
</code>
<h4>&amp;strをString型に変換</h4>
&amp;strのデータ型にto_stringメソッドを使用して、String型のデータに変換します。<br />少し無理やり感がありますが、以下のコードでもok!です。
<code class="rust">
	let mut word = "".to_string();
</code>
<h3>std::io::stdin()</h3>
コンソールの標準入力へのハンドルを表すデータを返します。<br />useでstd::io::stdin()の「std::」の部分を予め定義することもできます。<br />この場合は以下のコードになります。
<code class="rust">
	use std::io;
	fn main() {
		//省略
		io::stdin().read_line(&amp;mut word).ok();
		//省略
	}
</code>
<h3>.read_line(&amp;mut word)</h3>
std::io::stdin()で返されたコンソールの標準入力へのハンドルを表すデータに対して、これを取得して渡した引数に格納します。<br /><br />&amp;mutとする理由を説明します。<br />まず、&amp;を付ける理由は参照渡しするためです。<br />関数にはスコープが存在するので、引数に渡したデータを取得したい変数を関数内だけで書き換えても意味ないですよね、、、<br />変数に対する参照を渡して、これを関数内で書き換えてもらいます。<br /><br />mut修飾子を付ける理由は、rustは説明した通り変数はデフォルトで不可変(イミュータブル)であるためです。<br />関数内で変数に代入する必要があるため、これをミュータブル宣言しておきます。
<h3>.ok()</h3>
最悪省略してもプログラムは動作します。
<img src="../pics/unused-result.png" alt="unused Result" />
プログラマたるもの、エラーへの対応を怠ってはなりません。<br />思わぬバグの原因になりますのでね、、、<br />エラーへの対応方法は以下の二通りあります。
<ul>
	<li>.ok()</li>
	<li>.expect()</li>
</ul>
<h4>.ok()</h4>
エラーが発生しなければ、という条件を課します。<br />そのまま、「.ok()」を付けるだけでok!です。<br />okメソッドだけに、、、笑
<code class="rust">
	std::io::stdin().read_line(&amp;mut word).ok();
</code>
<h4>.expect()</h4>
エラーが発生した場合にプログラムを強制的にクラッシュさせます。<br /><a href="https://doc.rust-jp.rs/book-ja/ch02-00-guessing-game-tutorial.html">公式ドキュメント</a>ではこちらが採用されています。<br />引数にはエラー発生時の表示文字列を指定します。
<code class="rust">
	std::io::stdin().read_line(&amp;mut word).expect("ダメ!!")();
</code>
<?php footer(); ?>