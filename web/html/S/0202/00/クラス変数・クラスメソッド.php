<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-21",
	"updated" => "2022-02-21"
);
head($obj);
?>
<h2>static修飾子</h2>
今まで用いてきたプロパティは各インスタンスごとに生成されるものでした。<br />これをインスタンスプロパティないしは、単にプロパティと呼びます。<br /><br />static修飾子を用いてクラス内のプロパティを定義するとそのプロパティはクラスプロパティとなります。<br />クラスプロパティとは、あるクラスから生成されたインスタンス全てが共有するプロパティで、クラス変数とも呼ばれます。<br /><br />クラス変数のメソッドバージョンはクラスメソッドとなります。
<h2>クラス変数へのアクセス</h2>
クラス変数はそのクラスから生成したインスタンスからではなく、クラスから直接アクセスすることもできます。
<code class="java">
	public class koko {
		public static void main(String[] args) {
			pokemon pikachu = new pokemon(25, "ピカチュウ");
			System.out.println(pokemon.count);
			System.out.println(pikachu.count);
		}
	}
	class pokemon {
		int no;
		String name;
		static int count = 0;  //クラス変数
		pokemon (int no, String name) {
			this.no = no;
			this.name = name;
		}
	}

	/* &darr; コンソール &darr;
	0
	0
	*/
</code>
クラス変数はプロパティ宣言時に初期値を設定することが多いです。<br />またクラス変数は、インスタンスからではなくクラスから直接アクセスすることが多いので、これ以降もクラスから直接アクセスする方法を採用します。
<h2>クラス変数の使用</h2>
では、countクラス変数をpokemonインスタンスが生成される度に「1」加算されるようにコンストラクタを設定しましょう♪
<code class="java">
public class koko {
	public static void main(String[] args) {
		System.out.println(pokemon.count);
		pokemon pikachu = new pokemon(25, "ピカチュウ");
		System.out.println(pokemon.count);
		pokemon chikorita = new pokemon(152, "チコリータ");
		System.out.println(pokemon.count);
		pokemon mew = new pokemon(151, "ミュウ");
		System.out.println(pokemon.count);
	}
}
class pokemon {
	int no;
	String name;
	static int count = 0;  //クラス変数
	pokemon (int no, String name) {
		this.no = no;
		this.name = name;
		this.count = this.count + 1; //インスタンスが生成されるたびに「1」を追加
	}
}
</code>
こんな感じで使用します。
<h2>クラスメソッド</h2>
もう既に学習しましたね♪<br />「the メソッド」です。<br />他の言語では関数と呼ぶことが多いです。<br /><br />主な目的は引数から戻り値を求めることで、他のプロパティを参照することはせず、またクラスからインスタンスを生成した呼び出すこともしません。<br /><br />メソッドの授業で説明した階乗を算出するメソッドのコードを再掲しますね♪
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
これは、kokoクラスからインスタンスを生成することはしません。<br />javaはクラスベースの言語ですので単独の関数を定義できません。<br /><br />したがって、このようにクラスのメソッドとして定義する必要があります。
<?php footer(); ?>