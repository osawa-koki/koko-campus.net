<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-20",
	"updated" => "2022-02-20"
);
head($obj);
?>
<h2>プログラムの雛形</h2>
最初にjavaプログラムの雛形を紹介します。
<code class="java">
	package プロジェクト名;

	public class ファイル名 {
		public static void main(String[] args) {
			//プログラムへの入口
		}
	}
</code>
packageの後にプロジェクト名を指定し、classの後にファイル名(クラス名)を指定します。<br />パッケージやクラスについては後ほど詳しく説明します。
<div class="separator"></div>
これ以降は「package」の部分は省略してコードを説明します。
<h2>コーディング規則</h2>
実際にプログラムコードを書く際には以下の点に注意してください。
<ul>
	<li>全角文字の禁止</li>
	<li>大文字と小文字の区別</li>
	<li>自由記述形式</li>
</ul>
<h3>全角文字の禁止</h3>
コードは半角英数字を使用する必要があります。<br />文字列として全角文字を使用する際には「"(ダブルクォーテーション)」で囲んで「"ピカチュウ"」「"ポッチャマ"」のように表記します。
<h3>大文字と小文字の区別</h3>
javaプログラムでは大文字と小文字を区別します。<br />したがって、「class」を「CLASS」と書いたり「package」を「Package」と書くとエラーとなります。<br />また、プロジェクト名やクラス名も同様に大文字と小文字を区別するため注意してください。
<h3>自由記述形式</h3>
プログラムコード内では空白類似文字(スペース・タブ文字)を自由に使用することができます。<br />これはコードを見やすくするために使用されます。<br />具体的には「{}(ブレース)」を開けたら、その中全体にインデント(行頭の空白文字)を設けます。<br /><br />先ほどのコードにインデントを使用しないと以下のようになります。
<code class="java">
	public class ファイル名 {
	public static void main(String[] args) {
	//プログラムへの入口
	}
	}
</code>
なんだか、見づらいですね、、、<br />適切にインデントを使用して見やすいコードを書きましょう♪<br /><br />インデントにはソフトタブ(スペース)とハードタブの両方が用いられますが、ここではより一般的なハードタブ(タブ文字)を使用します。
<h2>コメントアウト</h2>
プログラムコード内にするメモ書きをコメントアウトと呼びます。<br />プログラム作成時にプログラムを修正する人に向けてプログラム内の処理を簡単に説明するために使用します。<br />コメントアウトは以下の2つの方法があります。
<ul>
	<li>// ～～～</li>
	<li>/* ～～～ */</li>
</ul>
<h3>// ～～～</h3>
単一行でのコメントアウトに使用します。<br />「//」以降がコメントアウトと認識されます。
<code class="java">
	public class ファイル名 {
		public static void main(String[] args) {
			//この部分は
			//コメントアウト
			//です♪
		}
	}
</code>
<h3>/* ～～～ */</h3>
複数行でのコメントアウトに使用します。<br />「/*」から「*/」に囲まれた部分がコメントアウトとなります。
<code class="java">
	public class ファイル名 {
		public static void main(String[] args) {
			/*
			この部分は
			コメントアウト
			です♪
			*/
		}
	}
</code>
<h2>命令文</h2>
プログラムでの処理は全て命令であり、プログラムは命令の集合であると言えます。<br />各命令文の最後には「;(セミコロン)」を置きます。<br /><br />例えば、最初に例示した「hello java」と表示するプログラムで「;」を付け忘れると以下のようなエラーが出力されます。
<code class="java">
	/* コンパイルエラー */

	public class koko {
		public static void main(String[] args) {
			System.out.println("hello java")
		}
	}

	/* &darr; コンソール &darr;
	Syntax error, insert ";" to complete BlockStatements
	*/
</code>
最初のうちは「;」の付け忘れでエラーとなることが多いので特に注意してください。
<h3>複合文ブロック</h3>
複数の命令文をまとめるには「{}(ブレース)」を使用します。<br />ブレースを使用した場合もブレース内の各命令文の最後には「;」を付けます。<br /><br />通常は後ほど説明する関数やクラスの範囲を指定する目的で使用しますが、特に意味もなく見やすさの観点から使用することもあります。<br />例えば、以下の例では「java」に関する出力と「rust」に関する出力をまとめるために構造上は意味もなくブレースで命令文をまとめています。
<code class="java">
	public class koko {
		public static void main(String[] args) {
			{
				System.out.println("hello java");
				System.out.println("i like java");
				System.out.println("i love java");
			}
			{
				System.out.println("hello rust");
				System.out.println("i like rust");
				System.out.println("i love rust");
			}
		}
	}

	/* &darr; コンソール &darr;
	hello java
	i like java
	i love java
	hello rust
	i like rust
	i love rust
	*/
</code>
<h2>標準入出力</h2>
コンソール画面に何かを出力したり、コンソール画面に入力した文字を取得したりします。
<h3>標準出力</h3>
コンソール画面に文字を表示します。<br />以下の関数を使用します。
<p>関数については後ほど詳しく説明するので、ここでは何らかの処理の集まりだと思ってください。</p>
<code class="java">
	System.out.print("文字列")
	/* or */
	System.out.println("文字列")
</code>
両者の違いは最後に自動的に改行文字を挿入するかです。<br />「print」の方は自動で改行されませんが、「println」は自動で改行されます。<br />結果を確認してみましょう♪
<code class="java">
	public class koko {
		public static void main(String[] args) {
			System.out.print("自動で");
			System.out.print("改行");
			System.out.print("されないよ♪");
		}
	}

	/* &darr; コンソール &darr;
	自動で改行されないよ♪
	*/
</code>
<code class="java">
	public class koko {
		public static void main(String[] args) {
			System.out.println("自動で");
			System.out.println("改行");
			System.out.println("されるよ♪");
		}
	}

	/* &darr; コンソール &darr;
	自動で
	改行
	されるよ♪
	*/
</code>
<div class="separator"></div>
また、文字列内で改行をしたい場合は「<span class="en">\</span>n」と書きます。<br />「<span class="en">\</span>(バックスラッシュ)」は環境によっては「<span class="ja">\</span>(円マーク)」で表示されることもあります。
<h3>標準入力</h3>
変数とモジュールのインポートを使用するため少し複雑です、、、<br />以下のように書きます。<br />具体的にどういう処理をしているのかは理解しなくてok!です。<br />こう書くんだな程度に覚えてください。
<code class="java">
	import java.util.Scanner; //最初に書く

	Scanner scan = new Scanner(System.in); //メインプログラム内
	String str = scan.nextLine(); //メインプログラム内
</code>
「str」という変数に入力した文字列が格納されます。<br />変数については後ほど説明しますが、データを一時的に保存するための箱だと思ってください。<br />「str」と書けば入力したデータを使用できます。<br /><br />では、ユーザが入力した文字を表示する簡単なプログラムを作成してみましょう♪
<code class="java">
	import java.util.Scanner;

	public class koko {
		public static void main(String[] args) {
			Scanner scan = new Scanner(System.in);
			String str = scan.nextLine();
			System.out.print("あなたは");
			System.out.print(str);
			System.out.print("と入力しました。");
		}
	}
</code>
<img src="../pics/標準入力" alt="java 標準入力" />
<?php footer(); ?>