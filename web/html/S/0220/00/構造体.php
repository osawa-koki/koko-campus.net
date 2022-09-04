<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-20",
	"updated" => "2022-01-20"
);
head($obj);
?>
<h2>構造体</h2>
他のプログラミング言語におけるオブジェクトに該当しますが、他の言語とは大分仕様が異なります。<br />他の言語における記述方法を大幅に簡素化した感じです。<br />書き方自体はjavascriptに似ています。<br /><br />また、rustにおける異なるデータ型のデータを格納するタプルと似ていますが、構造体はタプルの各データに名前を付けることが管理を容易にしています。
<h2>構造体の定義</h2>
以下のように定義します。
<code class="rust">
	struct 構造体の名前 {
		フィールド1: フィールド1のデータ型,
		フィールド2: フィールド2のデータ型,
		フィールド3: フィールド3のデータ型,
	}
</code>
公式ドキュメントには何も書かれていませんが、構造体の名前の最初の文字は大文字にした方がいいらしいです。<br />動作はしますが、コンパイル時に「warning: type `構造体の名前` should have an upper camel case name」と警告されます。<br />ではポケモンのデータに関する構造体を作成してみましょう♪<br />以下の5つのデータを格納します。
<ul>
	<li>図鑑番号</li>
	<li>名前</li>
	<li>タイプ1</li>
	<li>タイプ2</li>
	<li>進化可能性</li>
</ul>
<code class="rust">
	struct Pokemon {
		number: u8,
		name: String,
		type1: String,
		type2: String,
		shinka: bool,
	}
</code>
<h2>構造体インスタンスの生成</h2>
各フィールドに対して具体的な値を設定することで構造体のインスタンスを生成します。<br />では、ピカチュウのインスタンスを作成してみましょう♪
<code class="rust">
	let pika = Pokemon {
		number: 25,
		name: String::from("ピカチュウ"),
		type1: String::from("でんき"),
		type2: String::from("なし"),
		shinka: true,
	}
</code>
構造体インスタンスのデフォルトではイミュータブルであるため、後で変更することを想定する場合にはmut修飾子を付ける必要があります。
<h3>関数による構造体インスタンスの生成</h3>
次に構造体インスタンスを簡単に生成する関数を定義してみましょう♪<br />僕は電気タイプのポケモンが大好きなので、デフォルトでタイプ
を「でんき・なし」、進化前のポケモンが好きなのでデフォルトで「進化可能」に設定します。
<code class="rust">
	fn create_poke(number: u8, name: String) {
		Pokemon {
			number: number,
			name: name,
			type1: String::from("でんき"),
			type2: String::from("なし"),
			shinka: true,
		}
	}
</code>
<h3>フィールド初期化省略記法</h3>
先ほどのコードは「number」と「name」は関数の引数名と構造体インスタンス名が一致しているため、フィールド初期化省略記法を用いて以下のように書くこともできます。
<code class="rust">
	fn create_poke(number: u8, name: String) -&gt; Pokemon {
		Pokemon {
			number, //繰り返さなくてok!
			name, //繰り返さなくてok!
			type1: String::from("でんき"),
			type2: String::from("なし"),
			shinka: true,
		}
	}
</code>
<h3>構造体更新記法</h3>
明示的に設定されていないフィールドを自動的に他のインスタンスのフィールドを設定します。<br />以下のように記述します。
<code class="rust">
	let 変数 = 構造体名 {
		フィールド1: フィールド1の値,
		フィールド2: フィールド2の値,
		フィールド3: フィールド3の値,
		..継承する構造体インスタンス
	};
</code>
例えば、ピカチュウの「タイプ1」「タイプ2」「進化可能性」を継承してピチューを生成する場合には以下のように記述します。
<code class="rust">
	let pichu = Pokemon {
		number: 172,
		name: String::from("ピチュー"),
		..pika //残りはピカチュウから継承
	}
</code>
<h2>構造体のフィールドへのアクセス</h2>
他の言語と同様で、以下のように記述します。
<code class="rust">
	構造体インスタンス.フィールド名
</code>
では、ピカチュウ構造体インスタンスを生成してそのフィールドを出力してみましょう♪
<code class="rust">
	struct Pokemon {
		number: u8,
		name: String,
		type1: String,
		type2: String,
		shinka: bool,
	}

	fn main() {
		let pika = Pokemon {
			number: 25,
			name: String::from("ピカチュウ"),
			type1: String::from("でんき"),
			type2: String::from("なし"),
			shinka: true,
		};
		println!("図鑑番号は{}", pika.number);
		println!("名前は{}", pika.name);
		println!("タイプは{}と{}", pika.type1, pika.type2);
		println!("進化可能性は{}", pika.shinka);
	}
	/* &darr; コンソール &darr;
	図鑑番号は25
	名前はピカチュウ
	タイプはでんきとなし
	進化可能性はtrue
	*/
</code>
<h2>構造体インスタンスの一括出力</h2>
デバグ目的で構造体インスタンスの中身を一括で出力することもできます。<br />以下のように記述します。
<code class="rust">
	#[derive(Debug)] //プログラムの最初に記述!!

	fn main() {
		//処理...
		println!("{:?}", 構造体インスタンス); //「{:?}」とする!!
	}
</code>
これで構造体インスタンスの中身が一括で出力されます。<br />では先ほどの構造体更新記法を利用してピカチュウ構造体インスタンスの一部を継承したピチュー構造体インスタンスを生成して、これを一括で表示してみましょう♪
<code class="rust">
	#[derive(Debug)]

	struct pokemon {
		number: u8,
		name: String,
		type1: String,
		type2: String,
		shinka: bool,
	}

	fn main() {
		let pika = pokemon {
			number: 25,
			name: String::from("ピカチュウ"),
			type1: String::from("でんき"),
			type2: String::from("なし"),
			shinka: true,
		};
		let pichu = pokemon {
			number: 172,
			name: String::from("ピチュー"),
			..pika //他のフィールドはピカチュウから継承
		};
		println!("ピチュー{:?}", pichu);
	}
</code>
<h2>メソッドの定義</h2>
では次は構造体のフィールドを用いて何らかの処理をする関数(メソッド)を定義してみましょう♪<br />以下のように記述します。
<code class="rust">
	struct 構造体名 {
		//フィールド1
		//フィールド2
		//フィールド3
	}
	impl 構造体名 {
		fn メソッド名(&amp;self) -&gt; 戻り値の型 {
	        //メソッド内の処理
	    }
	}
</code>
pythonやjavascriptと異なり、プロパティ(フィールド)とは異なるブロックを用いてメソッドを定義します。<br />メソッド内の引数を「&amp;self」とするのは所有権を移転しない書込み専用だからです。<br />メソッドでフィールドの値を書き換える場合には「&amp;mut self」とし、所有権を取得する場合には「self」とします。
<p class="r">所有権については後ほど説明します。</p>
メソッド内で同一構造体内のフィールド(プロパティ)にアクセスするには「self.フィールド名」とします。<br /><br />では、実際にメソッドを定義してみましょう♪<br />ここでは四角形構造体を定義します。<br />フィールドは横幅と高さの2つをとり、メソッドでは「面積」「周りの長さ」「対角線の長さ」を算出します。
<code class="rust">
	struct Rect {
		w: u8, //横幅
		h: u8, //高さ
	}
	impl Rect {
		fn area(&amp;self) -&gt; u8 { //面積を求めるメソッド
			self.w * self.h //「横幅×高さ」を返却
		}
		fn mawari(&amp;self) -&gt; u8 { //周りの長さを求めるメソッド
			(self.w + self.h) * 2 //「(横幅+高さ)×2」を返却
		}
		fn taikaku(&amp;self) -&gt; f64 { //対角線の長さを求めるメソッド
			((self.w * self.w + self.h * self.h) as f64).sqrt() //三平方の定理!!
		}
	}

	fn main() {
		let shikaku = Rect{ //四角形構造体インスタンスを生成
			w: 3, //横幅は「10」
			h: 4, //高さは「7」
		};
		println!("面積は{}", shikaku.area());
		println!("周りの長さは{}", shikaku.mawari());
		println!("対角線の長さは{}", shikaku.taikaku());
	}
</code>
対角線の長さを算出する際に用いる平方根を計算するメソッドは「f64」型である必要があるため、明示的に型変換をします。
<?php footer(); ?>