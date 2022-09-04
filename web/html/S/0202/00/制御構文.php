<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-21",
	"updated" => "2022-02-21"
);
head($obj);
?>
<h2>制御構文</h2>
制御構文とはプログラムの処理の流れを切り替えるための構文です。<br />制御構文はその性質から以下の2つに分けられます。
<ul>
	<li>条件分岐</li>
	<li>反復処理</li>
</ul>
<table>
	<thead>
		<tr>
			<th width="50%">条件分岐</th>
			<th width="50%">反復処理</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>ある条件を満たすか否かで実行する処理を制御します。</td>
			<td>ある条件を満たす限り処理を繰り返します。</td>
		</tr>
		<tr>
			<td>
				<ul>
					<li>if</li>
					<li>switch</li>
				</ul>
			</td>
			<td>
				<ul>
					<li>for</li>
					<li>while</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>
<h2>条件分岐(if)</h2>
条件式が「true」か「false」かで処理を制御します。<br />if文は以下のように書きます。
<code class="java">
	if (条件式) {
		//条件式を満たす場合の処理...
	} else {
		//条件式を満たさない場合の処理...
	}
</code>
条件式には真偽値を算出する比較演算か比較演算の結果の論理演算を指定します。<br /><br />では入力した数字が偶数かどうかを判定しましょう♪<br /><br />最初にコンソール画面で入力された文字列を受け取る際には以下のように書くように説明したと思います。
<code class="java">
	import java.util.Scanner; //最初に書く

	Scanner scan = new Scanner(System.in); //メインプログラム内
	String str = scan.nextLine(); //メインプログラム内
</code>
これだと、入力した文字列は文字列型として取得されます。<br />文字列型として受け取ってそれを整数型に変換してもokですが、直接整数型として受け取る方法もあるので今回はそれを使用しましょう♪
<code class="java">
	import java.util.Scanner; //最初に書く

	Scanner scan = new Scanner(System.in); //メインプログラム内
	int i = scan.nextInt(); //メインプログラム内
</code>
また、「nextInt」の部分を「nextDouble」とするとdouble型で取得できます。<br /><br />では、コードを実際に書いてみましょう♪<br />偶数かどうかは「2」で割った余りが「0」かどうかで判定できます。
<code class="java">
	import java.util.Scanner;

	public class koko {
		public static void main(String[] args) {
			Scanner scan = new Scanner(System.in); //メインプログラム内
			int i = scan.nextInt();
			if (i % 2 == 0) {
				System.out.println("偶数♪");
			} else {
				System.out.println("奇数♪");
			}
		}
	}
</code>
<img src="../pics/if.gif" alt="if文" />
<h2>条件分岐(switch)</h2>
ある値を複数の値を比較してプログラムの流れを制御します。<br />条件分岐の「==」特化バージョンだと思ってください。<br />以下のように書きます。
<code class="java">
	switch (比較対象の値) {
		case 値1:
			値1に等しい場合の処理...
			break;
		case 値2:
			値2に等しい場合の処理...
			break;
		case 値3:
			値3に等しい場合の処理...
			break;
		default:
			いずれにも等しくない場合の処理...
	}
</code>
switch文は一度マッチするとそれ以降の処理を全て実行します。<br />これを防ぐために「break;」文を使用します。
<img src="../pics/switch-説明.png" alt="switch文" />
では、拡張子を入力したらそのプログラミング言語を表示するプログラムを作成しましょう♪
<code class="java">
	import java.util.Scanner;

	public class koko {
		public static void main(String[] args) {
			Scanner scan = new Scanner(System.in);
			String ext = scan.nextLine();
			String lang;
			switch (ext) {
				case "java":
					lang = "java";
					break;
				case "py":
					lang = "python";
					break;
				case "rs":
					lang = "rust";
					break;
				case "hs":
					lang = "haskell";
					break;
				default:
					lang = "unknown";
			}
			System.out.println(lang);
		}
	}
</code>
<img src="../pics/switch.gif" alt="switch文" />
<h2>反復処理(for)</h2>
主にn回同じ処理を繰り返すのに使用されます。<br />以下のように書きます。
<code class="java">
	for (int i = 0; i &lt; n; i++) {
		//反復処理...
	}
</code>
<img src="../pics/for-説明.png" alt="forループ" />
では、簡単な反復処理をするプログラムを作成してみましょう♪<br />「1」から「10」まで表示するプログラムです。
<code class="java">
	public class koko {
		public static void main(String[] args) {
			for (int i = 1; i &lt;= 5; i++) {
				System.out.println(i);
			}
		}
	}

	/* &darr; コンソール &darr;
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
今度はちょっとだけ難しいプログラムを作ってみましょう♪<br />入力した数の階乗を求めるプログラムです。
<div class="quote">
	<div>階乗</div>
	1からnまでの連続する整数の積のことを言います。<br />例えば、5の階乗は「5 &times; 4 &times; 3 &times; 2 &times; 1」で「120」となります。
</div>
それでは考えてみましょう♪
<code class="java">
	import java.util.Scanner;

	public class koko {
		public static void main(String[] args) {
			Scanner scan = new Scanner(System.in);
			int n = scan.nextInt();
			int answer = 1; //ここに結果を加算していく
			for (int i = 1; i &lt;= n; i++) {
				answer = answer * i; //今までの和に次の整数をかけて上書き
			}
			System.out.println(answer);
		}
	}
</code>
<img src="../pics/プログラム-階乗(for).gif" alt="forループ" />
<h2>反復処理(while)</h2>
for文がある一定回数処理を繰り返すことを想定しているのに対して、while文はある条件を満たす限り反復処理を繰り返します。<br />for文とwhile文には互換性があるため、for文で書かれた反復処理のコードをwhile文を用いて書き換えることもできますし、その逆も可能です。<br /><br />while文は以下のように書きます。
<code class="java">
	while (条件式) {
		//反復処理...
	}
</code>
では、階乗を求める先ほどのコードをwhile文を用いて書き換えてみましょう♪
<code class="java">
	import java.util.Scanner;

	public class koko {
		public static void main(String[] args) {
			Scanner scan = new Scanner(System.in);
			int n = scan.nextInt();
			int answer = 1; //ここに結果を加算していく
			int i = 1;
			while (i &lt;= n) {
				answer = answer * i; //今までの和に次の整数をかけて上書き
				i = i + 1; //i変数に「1」を加算
			}
			System.out.println(answer);
		}
	}
</code>
<img src="../pics/プログラム-階乗(while).gif" alt="whileループ" />
<h3>do ～ while</h3>
while文の絶対に一回は処理が実行されるバージョンです。<br />それ以外は通常のwhile文と同じです。
<code class="java">
	do {
		//反復処理...
	} while (条件式);
</code>
最後の「;」を忘れないでください。<br /><br />では、先ほどのコードをdo ～ while文で書き換えてみましょう♪
<code class="java">
	import java.util.Scanner;

	public class koko {
		public static void main(String[] args) {
			Scanner scan = new Scanner(System.in);
			int n = scan.nextInt();
			int answer = 1; //ここに結果を加算していく
			int i = 1;
			do {
				answer = answer * i; //今までの和に次の整数をかけて上書き
				i = i + 1; //i変数に「1」を加算
			} while (i &lt;= n);
			System.out.println(answer);
		}
	}
</code>
<img src="../pics/プログラム-階乗(do-while).gif" alt="whileループ" />
<h2>反復処理の中断</h2>
反復処理を中止するには以下の2つの文を使用します。
<ul>
	<li>continue;</li>
	<li>break;</li>
</ul>
<table>
	<thead>
		<tr>
			<th width="50%">continue;</th>
			<th width="50%">break;</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>ループ内の残りの処理をスキップして、次のループへ移動します。</td>
			<td>ループそのものから抜け出します。</td>
		</tr>
	</tbody>
</table>
<h3>continue;</h3>
<code class="java">
	public class koko {
		public static void main(String[] args) {
			for (int i = 0; i &lt;= 5; i++) {
				if (i == 3) {
					continue; //そのループ内の残りの処理をスキップ
				}
				System.out.println(i);
			}
		}
	}

	/* &darr; コンソール &darr;
	0
	1
	2
	4
	5
	*/
</code>
「3」だけがスキップされて表示されていません。
<h3>break;</h3>
<code class="java">
	public class koko {
		public static void main(String[] args) {
			for (int i = 0; i &lt;= 5; i++) {
				if (i == 3) {
					break; //ループから抜け出す
				}
				System.out.println(i);
			}
		}
	}

	/* &darr; コンソール &darr;
	0
	1
	2
	*/
</code>
「3」になった時点でループから抜け出すため、「3」以降の数字は表示されません。
<h2>ループの入れ子</h2>
ループ処理は入れ子にするすることもできます。<br />ループの入れ子とはループ処理ないでさらに別のループ処理をすることです。<br />こんな感じで書きます。
<code class="java">
	for (int i = 0; i &lt;= m; i++) {
		for (int j = 0; j &lt;= n; j++) {
			//反復処理...
		}
	}
</code>
外側のループ用のカウンタ変数と内側のループ用のカウンタ変数は別のものを用意して下さい。<br /><br />では、掛け算九九の結果を出力するプログラムを作成しましょう♪
<code class="java">
	public class koko {
		public static void main(String[] args) {
			for (int i = 1; i <= 9; i++) {
				for (int j = 1; j <= 9; j++) {
					System.out.printf("%02d ", i * j);
				}
				System.out.println("");
			}
		}
	}
</code>
<img src="../pics/プログラム-掛け算九九.gif" alt="ループの入れ子" />
「System.out.printf("%02d ", i * j);」の部分は「i &times; j」の結果を数字2桁(0埋め)で表示するように指定しています。
<?php footer(); ?>