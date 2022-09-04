<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-20",
	"updated" => "2022-01-20"
);
head($obj);
?>
<h2>エラーハンドリング</h2>
rustは次世代システムプログラミング言語として安全であることが要求され、そのためにはデータ処理の際のエラー対応(エラーハンドリング)が求められます。<br />処理できないデータを取得した場合は、強制的にプログラムを終了させてバグから生じるセキュリティ上の脆弱性を克服します。
<h2>panic!</h2>
もっとも一般的なエラーハンドリング技術です。<br />以下のように記述します。
<code class="rust">
	panic!("強制終了時のメッセージ");
</code>
例えば、ユーザが入力した一つ目の数字を二つ目の数字で割るプログラムを想定してください。<br />二つ目の数字が「0」であった場合は、これはダメです。<br />「0」で割ることは数学でもっともしてはいけない処理第一位ですから、、、<br />ということでこれに関するエラーハンドリングを実施しましょう♪
<code class="rust">
	fn main() {
		let mut x = String::new();
		let mut y = String::new();
		std::io::stdin().read_line(&mut x).ok();
		std::io::stdin().read_line(&mut y).ok();
		let x: i8 = x.trim().parse().ok().unwrap();
		let y: i8 = y.trim().parse().ok().unwrap();
		if y == 0 {
			panic!("ゼロで割っちゃダメ!!");
		}
		println!("{}", x as f64 / y as f64);
	}
</code>
<img src="../pics/panic.gif" alt="panic" />
<h2>Option型</h2>
既に列挙型の授業で学習しました。<br />Option型とはデータが存在しない可能性があることを処理するための列挙型のデータです。<br />rustではnull型が存在しないため、これを用いてnull・非null判定を行います。<br />もう一度Option列挙型のデータの構造を紹介します。
<code class="rust">
	enum Option&lt;T&gt; {
		Some(T),
		None,
	}
</code>
「T」は全てのデータ型を包括するジェネリック引数であり、データが存在しない(null)の場合を除いてOptionの値はSome(T)となります。<br />この中身が存在するかどうかの判定にifやmatchなどの単純な条件分岐を用いて、値が存在しない場合にはパニックをおこさせることも可能ですが、一般的にはunwrapを使用することでこれを簡単に実現します。<br />unwrapメソッドはOptionの中身がNone(存在しない)場合には強制的にパニックを起こします。<br />これによってOption型を用いて簡単に他の言語でいうnull・非null判定とそれに伴うエラーハンドリングを実現します。
<h3>?によるアンパック</h3>
Option型からデータを取り出す際にはmatchやunwrap以外に「?」を用いることもできます。<br />Option型のデータの後ろに「?」を付けることで対象のOption型のデータがSome(存在する)ならばOptionの値はその値となり、存在しなければNoneとなります。<br />通常は複数のOption型のデータを連鎖させる際に用います。
<h2>Result型</h2>
Option型が値が存在するかどうか(null・非null)を反転するのに対して、Result型は値がエラーかどうかを判定します。<br />例えば文字列型を数字型に変換する場合は必ず成功するとは限りません。<br />「"10"」や「"25"」という文字列であれば「10」「25」と数字に変換できますが、「"ピチュー"」「"ピカチュウ"」は数字に変換することはできません。<br />したがって、parseメソッドのような成功するか分からないメソッドではResultを返します。<br /><br />Result型のデータにおいて要素Tが見つかった場合はOk&lt;T&gt;となり、要素Eとともにエラーが見つかった場合はErr&lt;E&gt;となります。
<?php footer(); ?>