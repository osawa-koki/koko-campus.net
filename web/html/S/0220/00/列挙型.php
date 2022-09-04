<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-20",
	"updated" => "2022-01-20"
);
head($obj);
?>
<h2>列挙型</h2>
構造体の簡素化バージョンだと思えばok!です。<br /><a href="https://doc.rust-jp.rs/book-ja/ch06-01-defining-an-enum.html">公式ドキュメント</a>によると構造体と比べた時の列挙型の利点として以下の2つがあげられています。
<ul>
	<li>列挙型の各列挙子にデータを直接紐づけるため、構造がシンプル</li>
	<li>異なる型のデータを各列挙子に紐付けることが可能</li>
</ul>
列挙型は異なる複数のデータ型を列挙し、実際にはそのうちのひとつだけが採用されます。<br />例えばIPアドレスはv4とv6の2種類がありますが、実際に採用されるのはそのどちらかです。<br />このような場合には構造体ではなく列挙型を使用することで簡単に管理することができます。
<h2>列挙型の定義</h2>
列挙型のデータは以下のように定義します。<br />構造体と同様に、列挙型名と列挙子の最初の文字は大文字が推奨されています。
<code class="rust">
	enum 列挙型名 {
		列挙子1,
		列挙子2,
		列挙子3,
	}
</code>
では、実際にipアドレスを格納する列挙型のデータを定義してみましょう♪
<code class="rust">
	enum Ip {
		V4,
		V6,
	}
</code>
<h2>列挙型インスタンスの生成</h2>
列挙型のインスタンスは以下のように生成します。
<code class="rust">
	let 変数 = 列挙型名::列挙子;
</code>
<h2>列挙型での値の保持</h2>
列挙型内の列挙子に対して値を紐づけるには以下のように定義・インスタンスの生成を行う必要があります。
<code class="rust">
	enum 列挙型名 {
		列挙子1(列挙子1のデータ型),
		列挙子2(列挙子2のデータ型),
		列挙子3(列挙子3のデータ型),
	}
	let 変数 = 列挙型名::列挙子(列挙子に紐づける値);
</code>
例えば「127.0.0.1」と「::1」と2つの種類のipアドレスの列挙型インスタンスを生成してみましょう♪
<code class="rust">
	#[derive(Debug)]

	enum Ip {
		V4(String),
		V6(String),
	}

	fn main() {
		let ip4 = Ip::V4(String::from("127.0.0.1"));
		let ip6 = Ip::V6(String::from("::1"));
		println!("{:?}", ip4);
		println!("{:?}", ip6);
	}
	/* &darr; コンソール &darr;
	V4("127.0.0.1")
	V6("::1")
	*/
</code>
<h2>メソッドの定義</h2>
列挙型でも構造体と同様にメソッドを定義することができます。<br />定義の仕方は構造体と同様です。
<code class="rust">
	enum 列挙型名 {
		列挙子1(列挙子1のデータ型),
		列挙子2(列挙子2のデータ型),
		列挙子3(列挙子3のデータ型),
	}

	impl 列挙型名 {
		fn メソッド名(&amp;self) {
			//メソッドの処理
		}
	}
</code>
では実際にメソッドを定義して実行してみましょう♪<br />ipアドレスを表示するだけの簡単なメソッドです。
<code class="rust">
	#[derive(Debug)]

	enum Ip {
		V4(String),
		V6(String),
	}

	impl Ip {
		fn print(&amp;self) {
			println!("IPアドレスは{:?}", &amp;self);
		}
	}

	fn main() {
		let ip4 = Ip::V4(String::from("127.0.0.1"));
		let ip6 = Ip::V6(String::from("::1"));
		ip4.print();
		ip6.print();
	}
	/* &darr; コンソール &darr;
	IPアドレスはV4("127.0.0.1")
	IPアドレスはV6("::1")
	*/
</code>
<h2>null型とenum型</h2>
他の言語に存在するデータが存在しないことを表すnull型でrustではenumを用いて表します。<br />具体的にはenumが複数の列挙子の中のいずれかのひとつのみを表すという性質を利用してnull型を疑似的に再現します。<br />具体的には以下のOption列挙型データを用いてrustではnull・非null判定を行います。
<code class="rust">
	enum Option&lt;T&gt; {
		Some(T),
		None,
	}
</code>
「T」とは全てのデータ型を包括するジェネリック型引数です。<br />簡単に言えば、どんなデータ型(u8, i8, i16, f64, String, bool, &str, etc...)でも「存在すれば(nullでなければ)」Option列挙型データはSomeとなり、データが「存在しない」ならばOption列挙型データはNoneとなります。<br />「Option&lt;T&gt;」から生成されたインスタンスはその「T」の型によって自動的に型が解釈されることはありません。<br />したがって以下のコードで生成されたOption列挙型のインスタンスのデータ型はすべてOption型になります。
<code class="rust">
	let x: Option&lt;i8&gt; = Some(10);
	let y: Option&lt;bool&gt; = Some(true);
	let z: Option&lt;&amp;str&gt; = Some("あいうえお");
</code>
変数「x」「y」「z」は全てOption型のデータです。<br />したがって以下の処理は同じ型同士の演算ではなくなるため、コンパイルエラーを発します。
<code class="rust">
	fn main() {
		let x: u8 = 10;
		let y: Option&lt;u8&gt; = Some(25);
		println!("{}", x + y);
	}
	/* &darr; コンソール &darr;
	no implementation for `u8 + Option<u8>`
	*/
</code>
上の演算を実行するにはOption&lt;u8&gt;から中身を取り出してから実行する必要があります。<br />エラーハンドリングの授業で詳しく説明しますが、Option列挙型のデータから中身を取り出すにはunwrapメソッドを使用します。
<code class="rust">
	fn main() {
		let x: u8 = 10;
		let y: Option&lt;u8&gt; = Some(25);
		println!("{}", x + y.unwrap());
	}
	/* &darr; コンソール &darr;
	35
	*/
</code>








<?php footer(); ?>