<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-21",
	"updated" => "2022-02-21"
);
head($obj);
?>
<h2>メソッド</h2>
メソッドとは一連の処理を集めたものを言います。<br />他の言語では関数という名称が用いられることもありますが、javaはクラスベースでプログラムが実行されるため、関数の代わりにメソッドという名称が用いられます。
<p>クラスについては後ほど説明します。</p>
一般的にメソッドというと、あるデータ(引数)を与えてそのデータに一定の処理をしてその結果を返すものを意味しますが、あるデータを与えずに処理だけを実行するものやデータを返さないものもあります。
<img src="../pics/メソッド.png" alt="メソッド" />
<h2>引数と戻り値</h2>
メソッドに処理をお願いするデータのことを引数と呼び、メソッドがメソッドの呼び出し元に返すデータを戻り値と言います。<br /><br />また、関数に渡す変数を実引数と呼び、関数内で受け取る引数を仮引数と呼びます。<br />両者を合わせて引数と呼ぶこともあります。
<img src="../pics/引数と戻り値.png" alt="引数と戻り値" />
引数は「,(カンマ)」で区切って複数指定することができますが、戻り値は単一の値のみ指定できます。<br />複数の値を返却する場合は配列形式や後ほど説明するインスタンス形式で複数の値をひとつにまとめて返却する必要があります。<br /><br />引数を複数指定する場合にはその順番を意識する必要があります。<br />最初の引数を第一引数、次の引数を第二引数、、、と呼びます。
<h2>メソッドの定義</h2>
メソッドはクラス内に以下のように記述します。
<code class="java">
	private static 戻り値のデータ型 関数名(引数) {
		//関数内の処理...
		//関数内の処理...
		//関数内の処理...
		return 戻り値;
	}
</code>
例えば、引数と戻り値をint型でとり、引数の階乗を計算して返すfactorialメソッドは以下のように定義できます。
<code class="java">
	private static int factorial(int n) {
		int answer = 1;
		for (int i = 1; i &lt;= n; i++) {
			answer = answer * i;
		}
		return answer;
	}
</code>
<div class="separator"></div>
因みに、javaプログラムコードの雛形として紹介したコードの以下の部分も実はメソッドだったんです♪
<code class="java">
	public static void main(String[] args) {
		//メインの処理...
		//メインの処理...
		//メインの処理...
	}
</code>
これはmainメソッドと呼ばれるメソッドと定義しています。<br />mainメソッドは他のメソッドとは若干異なり、外部から呼び出すことは原則としてしません。<br />javaプログラムで一番最初に実行される部分です。<br /><br />また、戻り値を返さないメソッドの戻り値のデータ型の部分は「void」と書きます。<br />main関数は特に戻り値を返すことがないので、戻り値のデータ型に「void」を指定しています。
<h2>メソッドの呼び出し</h2>
メソッドを呼び出すには以下のように書きます。
<code class="java">
	メソッド名(引数);
</code>
これが実行されると戻り値が返されます。<br />では、先ほどの階乗を算出するfactorialメソッドを呼び出してその結果を出力してみましょう♪
<code class="java">
	public class koko {
		private static int factorial(int n) { //階乗を返すメソッドの定義
			int answer = 1;
			for (int i = 1; i &lt;= n; i++) {
				answer = answer * i;
			}
			return answer; //戻り値を返却
		}
		public static void main(String[] args) {
			int x, y, z;
			x = factorial(3); //引数に「3」を設定してfactorialメソッドを実行
			y = factorial(5); //引数に「5」を設定してfactorialメソッドを実行
			z = factorial(10); //引数に「10」を設定してfactorialメソッドを実行
			System.out.println(x);
			System.out.println(y);
			System.out.println(z);
		}
	}

	/* &darr; コンソール &darr;
	6
	120
	3628800
	*/
</code>
<div class="separator"></div>
では今度は少し複雑なメソッドを定義して実行してみましょう♪<br /><br />他の言語では「**」を用いて累乗を計算することができるのですが、javaではこれができないので累乗を計算するpowerメソッドを定義します。<br />第一引数にベースとなる整数(n)、第二引数に指数(exp)を指定して、戻り値として「n<sup>exp</sup>」を返します。
<code class="java">
	public class koko {
		private static int power(int n, int exp) {
			int answer = n; //「n &times; n &times; n &times; ...」の最初の「n &times;」の部分を準備
			for (int i = 1; i < exp; i++) {
				answer = answer * n;
			}
			return answer;
		}
		public static void main(String[] args) {
			int x, y, z;
			x = power(2, 2);
			y = power(2, 5);
			z = power(3, 3);
			System.out.println(x);
			System.out.println(y);
			System.out.println(z);
		}
	}

	/* &darr; コンソール &darr;
	4
	32
	27
	*/
</code>
<h2>変数のスコープ</h2>
スコープとは有効範囲のことを言います。<br />メソッド内で宣言された変数にはスコープが設けられ、そのメソッド外からアクセスすることができません。
<code class="java">
	/* コンパイルエラー */

	public class koko {
		private static void can_i_access() {
			System.out.println(n); //nはここからアクセスできない、、、
		}
		public static void main(String[] args) {
			int n = 10; //n変数はmainメソッド内でのみ有効
			can_i_access();
		}
	}

	/* &darr; コンソール &darr;
	n cannot be resolved to a variable
	*/
</code>
また、実引数には実引数が属するメソッドのスコープが存在し、仮引数には仮引数が属するメソッドのスコープが存在するため、引数として受け取った変数の値をメソッド内で変更しても呼び出し元の値は変更されません。
<code class="java">
	public class koko {
		private static void change(int n) {
			n = 100; //changeメソッド内で引数の値を変更
		}
		public static void main(String[] args) {
			int n = 25;
			change(n); //changeメソッドにn変数を渡して実行
			System.out.print(n);
		}
	}

	/* &darr; コンソール &darr;
	25
	*/
</code>
changeメソッド内でnの値を「100」に変更していますが、呼び出し元のデータは変更されていないことが確認できます。<br /><br />これはスコープでも説明できますが、特に引数の値渡しという言葉で説明されます。<br />変数の値渡しとは、変数そのものをメソッドに渡すのではなく、変数の値のコピーをメソッドに渡すことを言います。<br />変数の値のコピーをメソッド内でそれだけ変更しても元のデータには影響を与えませんよね、、、
<?php footer(); ?>