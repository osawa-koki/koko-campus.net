<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-21",
	"updated" => "2022-02-21"
);
head($obj);
?>
<h2>配列</h2>
同じデータ型の複数のデータをまとめて格納する複合的なデータ型です。<br />例えば、全てのポケモン名を変数に格納するのに以下のように記述したら大変ですよね、、、
<code class="java">
	string pokemon1 = "フシギダネ";
	string pokemon2 = "フシギソウ";
	string pokemon3 = "フシギバナ";
	string pokemon4 = "ヒトカゲ";
	string pokemon5 = "リザード";
</code>
これをまとめて管理するのが配列です。
<img src="../pics/配列.png" alt="配列" />
配列に格納されるデータのことを要素と呼び、配列内の各要素を指定するための数字をインデックス番号と呼びます。<br />インデックス番号は「1」からではなく、「0」から始まることに注意してください。
<h2>配列の作成</h2>
配列を作成するには以下のように書きます。
<code class="java">
	データ型[] 変数名;
	変数名 = new データ型[要素数];
</code>
これらをまとめて以下のように書くこともできます。
<code class="java">
	データ型[] 変数名 = new データ型[要素数];
</code>
<h3>配列の要素へのアクセス</h3>
配列内の要素へアクセスするには以下のように書きます。
<code class="java">
	配列[インデックス番号]
</code>
これを用いて配列を操作します。<br />例えば、配列の要素にデータを代入するには以下のように書きます。
<code class="java">
	配列[インデックス番号] = データ;
</code>
では、最初の5匹のポケモン名を格納するpokemon配列を生成してみましょう♪
<code class="java">
	public class koko {
		public static void main(String[] args) {
			String[] pokemon = new String[5];
			pokemon[0] = "フシギダネ";
			pokemon[1] = "フシギソウ";
			pokemon[2]= "フシギバナ";
			pokemon[3] = "ヒトカゲ";
			pokemon[4] = "リザード";
			System.out.println(pokemon[1]);
			System.out.println(pokemon[3]);
		}
	}

	/* &darr; コンソール &darr;
	フシギソウ
	ヒトカゲ
	*/
</code>
う～～～ん、、、<br />なんだか、綺麗ではありませんね、、、<br /><br />「{}(ブレース)」を用いてもっと簡単に書くこともできます。<br />以下のように書きます。
<code class="java">
	データ型[] 変数名 = {
		要素1,
		要素2,
		要素3
	}
</code>
これを用いて先ほどのコードを書き換えてみましょう♪
<code class="java">
	public class koko {
		public static void main(String[] args) {
			String[] pokemon = {
				"フシギダネ",
				"フシギソウ",
				"フシギバナ",
				"ヒトカゲ",
				"リザード"
			};
			System.out.println(pokemon[1]);
			System.out.println(pokemon[3]);
		}
	}

	/* &darr; コンソール &darr;
	フシギソウ
	ヒトカゲ
	*/
</code>
<h2>配列の走査</h2>
今までは、配列の要素に対して処理をする際はひとつずつインデックス番号を指定して実行しましたが、配列内の全ての要素に対してはこの方法は有効ではありません。<br />そこで、配列を走査して対応しましょう♪<br /><br />配列の要素をひとつずつ取り出して処理することを配列の走査と言います。<br />配列内の要素を指定するインデックス番号が整数であることから前回学んだforループを使用します。<br />また、「配列.length」で配列内の要素数を取得し、これを用いて反復処理の継続判定をします。
<code class="java">
	for (int i = 0; i &lt;= 配列.length; i++) {
		//配列[i]で要素を指定して処理...
	}
</code>
では、ポケモン配列を走査してみましょう♪
<code class="java">
	public class koko {
		public static void main(String[] args) {
			String[] pokemon = {
				"フシギダネ",
				"フシギソウ",
				"フシギバナ",
				"ヒトカゲ",
				"リザード"
			};
			for (int i = 0; i < pokemon.length; i++) {
				System.out.printf("図鑑番号%dのポケモンは%s\n", i + 1, pokemon[i]);
			}
		}
	}

	/* &darr; コンソール &darr;
	図鑑番号1のポケモンはフシギダネ
	図鑑番号2のポケモンはフシギソウ
	図鑑番号3のポケモンはフシギバナ
	図鑑番号4のポケモンはヒトカゲ
	図鑑番号5のポケモンはリザード
	*/
</code>
う～～～ん、、、<br />printfっていう教えていないコードが出現しましたね、、、<br />これは書式化文字列表示関数で、整数や文字列型などの異なるデータ型のデータを良い感じに表示するために使用します。<br /><br />c/c++ではよく使うのですが、javaでは深く理解する必要はありません。<br />ここでは、最初の文字列内の「%d」の部分に「i + 1」を、「%s」の部分に「pokemon[i]」を挿入して表示しています。
<?php footer(); ?>