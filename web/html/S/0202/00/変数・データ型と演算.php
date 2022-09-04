<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-20",
	"updated" => "2022-02-20"
);
head($obj);
?>
<h2>変数</h2>
変数とはプログラムを実行する際に使用する一時的なデータを保存するための箱です。<br />変数を使用するには以下の3つの手順を踏む必要があります。
<ol>
	<li>変数の宣言</li>
	<li>変数の代入</li>
	<li>変数の参照</li>
</ol>
<h3>変数の宣言</h3>
変数という箱を作成することを言います。<br />箱って言っても何を入れるかによって中に入れるモノの大きさによって用意するサイズを変更する必要がありますよね、、、<br /><br />中に入れるモノの種類のことをデータ型と言い、変数の宣言時にこれを指定する必要があります。
<code class="java">
	データ型 変数名;
</code>
データ型については後ほど説明するので、とりあえずここでは整数データを入れる「int」型で「i」変数を宣言してみましょう♪
<code class="java">
	int i;
</code>
これで「i」という変数を整数用に作成することができました。<br /><br />複数の変数を連続して宣言する場合には「,(カンマ)」で区切ります。
<h3>変数の代入</h3>
では、次は宣言した変数に実際に値を代入してみましょう♪<br />以下のように書きます。
<code class="java">
	変数 = 値;
</code>
では、先ほど作成した整数専用の「i」変数に「10」を代入してみましょう♪
<code class="java">
	int i;
	i = 10;
</code>
「i」変数は整数専用で作成しているため、整数以外の値を代入するとエラーとなります。
<code class="java">
	/* コンパイルエラー */

	int i;
	i = "ピカチュウ";

	/* &darr; コンソール &darr;
	Type mismatch: cannot convert from String to int
	*/
</code>
<div class="separator"></div>
変数の宣言と変数の代入を同時に行うこともできます。
<code class="java">
	int i = 10;
</code>
<h3>変数の参照</h3>
では、変数に代入した値を使用してみましょう♪<br />変数名をそのまま書けば使用できます。
<code class="java">
	変数名
</code>
では、先ほど「10」を代入した「i」変数に「15」を加算して結果を出力してみましょう♪
<code class="java">
	public class koko {
		public static void main(String[] args) {
			int i;
			i = 10;
			System.out.println(i + 15);
		}
	}

	/* &darr; コンソール &darr;
	25
	*/
</code>
<h2>データ型</h2>
では、今度はデータ型について学びましょう♪<br />先ほどは整数を表すint型を使用しましたが、javaでは以下のようなデータ型があります。
<table>
	<caption>データ型</caption>
	<tbody>
		<tr>
			<th>char</th>
			<td>文字型で、文字を1文字だけ格納します。<br />「'(シングルクォーテーション)」で囲んで、「'A'」「'あ'」と書きます。<br />文字列(2文字以上)を格納するにはstring型を使用します。</td>
		</tr>
		<tr>
			<th>String</th>
			<td>文字列型で、1文字以上の文字の連続を格納します。<br /><strong>S</strong>trong型と最初の「S」が大文字であることに注意してください。<br />「"(ダブルクォーテーション)」で囲んで、「"ピカチュウ"」「"ポッチャマ"」と書きます。</td>
		</tr>
		<tr>
			<th>boolean</th>
			<td>真偽値型で、「true(真)」か「false(偽)」のいずれかを格納します。<br />「true」「false」とそのまま表記します。</td>
		</tr>
		<tr>
			<th>int</th>
			<td>整数型です。<br />「10」「25」「-99」とそのまま表記します。<br />文字列型として扱うには「"10"」「"25"」「""99"」と書きます。<br />約±2<sup>31</sup>までの値を格納できます。</td>
		</tr>
		<tr>
			<th>short</th>
			<td>整数型です。<br />int型より小さい、約±2<sup>15</sup>までの値を格納できます。<br />「10」「25」「-99」とそのまま表記します。<br />文字列型として扱うには「"10"」「"25"」と書きます。</td>
		</tr>
		<tr>
			<th>long</th>
			<td>整数型です。<br />int型よりも大きい、約±2<sup>63</sup>までの値を格納できます。<br />「10」「25」「-99」とそのまま表記します。<br />文字列型として扱うには「"10"」「"25"」と書きます。</td>
		</tr>
		<tr>
			<th>float</th>
			<td>単精度浮動小数点数型です。<br />32ビットで小数を表します。<br />「10.25」「-99.99」とそのまま表記します。</td>
		</tr>
		<tr>
			<th>double</th>
			<td>倍精度浮動小数点数型です。<br />64ビットで小数を表します。<br />「10.25」「-99.99」とそのまま表記します。</td>
		</tr>
	</tbody>
</table>
では、様々なデータ型の変数を作成してみましょう♪
<code class="java">
	public class koko {
		public static void main(String[] args) {
			int i = 10;
			System.out.println(i);
			double j = 99.99;
			System.out.println(j);
			boolean t = true;
			System.out.println(t);
			String s = "ピカチュウ";
			System.out.println(s);
		}
	}

	/* &darr; コンソール &darr;
	10
	99.99
	true
	ピカチュウ
	*/
</code>


<h2>演算</h2>
演算はその性質から以下の3つに分類されます。
<ul>
	<li>算術演算</li>
	<li>比較演算</li>
	<li>論理演算</li>
</ul>
<h3>算術演算</h3>
<table>
	<caption>算術演算</caption>
	<tbody>
		<tr>
			<th>+</th>
			<td>足し算です。<br />「10 + 25」は「35」、「9 + 9」は「18」となります。<br />文字列を結合する際にも用いられます。<br />「"ばなな" + "ジュース"」で「"ばななジュース"」となります。</td>
		</tr>
		<tr>
			<th>-</th>
			<td>引き算です。<br />「25 - 10」は「15」、「10 - 25」は「-15」となります。</td>
		</tr>
		<tr>
			<th>*</th>
			<td>掛け算です。<br />「5 * 2」は「10」、「-2 * 10」は「-20」となります。</td>
		</tr>
		<tr>
			<th>/</th>
			<td>割り算です。<br />「5 / 2」は「2.5」、「7 / 2」は「3.5」となります。</td>
		</tr>
		<tr>
			<th>%</th>
			<td>割り算の余りを求めます。<br />「5 % 2」は「1」、「10 % 7」は「3」となります。</td>
		</tr>
	</tbody>
</table>
では、算術演算の結果を確認してみましょう♪
<code class="java">
	public class koko {
		public static void main(String[] args) {
			System.out.println(10 + 3); //13
			System.out.println(10 - 3); //7
			System.out.println(10 * 3); //30
			System.out.println(10 / 3); //3
			System.out.println(10 % 3); //1
		}
	}
</code>
<h3>比較演算</h3>
boolean型(真偽値型)を求めるための演算です。<br />左の値と右の値を比較して「真」か「偽」かを判断します。
<table>
	<caption>関係演算</caption>
	<tbody>
		<tr>
			<th>&lt;</th>
			<td>「小なり」<br />右の数字が左の数字よりも(同じを含まない)大きければ「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&lt;=</th>
			<td>「小なりイコール」<br />右の数字が左の数字以上(同じを含む)であれば「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&gt;</th>
			<td>「大なり」<br />右の数字が左の数字よりも(同じを含まない)小さければ「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&gt;=</th>
			<td>「大なりイコール」<br />右の数字が左の数字以下(同じを含む)であれば「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>==</th>
			<td>「イコール(等価演算)」<br />左と右のデータが同じであれば「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>!=</th>
			<td>「ノットイコール(等価演算)」<br />「==」の結果を反転したものです。</td>
		</tr>
	</tbody>
</table>
では、比較演算の結果を確認してみましょう♪
<code class="java">
	public class koko {
		public static void main(String[] args) {
			System.out.println(5 &lt; 10);&nbsp;&nbsp; //true
			System.out.println(10 &lt; 10);&nbsp; //false
			System.out.println(10 &lt;= 5);&nbsp; //false
			System.out.println(10 &lt;= 10); //true
			System.out.println(10 == 10); //true
			System.out.println(10 != 10); //false
		}
	}
</code>
<h3>論理演算</h3>
真偽値型同士の演算で、真偽値型を算出します。<br />日本語で言うならば「かつ」と「または」による演算です。
<table>
	<caption>論理演算</caption>
	<thead>
		<tr>
			<th>かつ</th>
			<th>または</th>
		</tr>
		<tr>
			<th>&amp;&amp;</th>
			<th>||</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>2つの条件式の両方が「真」の場合に「真」、どちらか一方でも「偽」の場合は「偽」となります。</td>
			<td>2つの条件式のいずれか一方でも「真」の場合に「真」、両方とも「偽」の場合は「偽」となります。</td>
		</tr>
	</tbody>
</table>
また、「!」演算子を用いれば「真」と「偽」を入れ替えることができます。<br /><br />では、論理演算の結果を確認してみましょう♪
<code class="java">
	public class koko {
		public static void main(String[] args) {
			System.out.println(true &amp;&amp; true);&nbsp;&nbsp; //true
			System.out.println(true &amp;&amp; false);&nbsp //false
			System.out.println(true || true);&nbsp;&nbsp; //true
			System.out.println(true || false);&nbsp //true
			System.out.println(!true);&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp //false
			System.out.println(!false);&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; //true
		}
	}
</code>
<h2>データ型の変換(数字型同士)</h2>
データ型で数字を扱う以下の5つのデータ型を数字型と呼びことにします。
<p>正式な名称ではありません。</p>
<ul>
	<li>short</li>
	<li>int</li>
	<li>long</li>
	<li>float</li>
	<li>double</li>
</ul>
これらは全て数字を意味するのですが、それぞれサイズが異なります。<br />例えば、整数は小数でも表現できるため、「10」をdouble型として扱うことができますが、逆に「99.99」をint型として扱うことはできません。<br /><br />このように数字型にはサイズがあります。
<img src="../pics/データ型のサイズ.png" alt="データ型のサイズ" />
<h3>暗黙の型変換</h3>
数字型同士の演算でデータ型が異なる値を演算した場合は、自動で大きい方のデータ型に変換されます。<br />これを暗黙の型変換と呼びます。<br />例えば、int型とdouble型の演算ではその結果はdouble型となり、short型とint型の演算ではその結果はint型となります。<br /><br />例えば、以下のコードを見てください。<br />以下の演算はint型とdouble型の演算ですので、その結果は自動的にdouble型に変換されます。
<code class="java">
	public class koko {
		public static void main(String[] args) {
			int i = 10;
			double j = 3;
			System.out.println(i / j);
		}
	}

	/* &darr; コンソール &darr;
	3.3333333333333335
	*/
</code>
<p>最後が「5」で終わっていますが、これは誤差です。</p>
次に変数「j」もint型で宣言してみましょう♪<br />どうなるでしょうか???
<code class="java">
	public class koko {
		public static void main(String[] args) {
			int i = 10;
			int j = 3;
			System.out.println(i / j);
		}
	}

	/* &darr; コンソール &darr;
	3
	*/
</code>
両方ともint型ですので、結果もint型となっています。<br />したがって、int型で表せない小数点以下は切り捨てられています。
<h3>明示的な型変換</h3>
ということで、暗黙の型変換では限界があることが分かりましたね♪<br />では、今度はこれを明示的に型変換してみましょう♪<br /><br />以下のように書きます。
<code class="java">
	(データ型)値
</code>
これで値は指定したデータ型に変換されます。<br />これを用いて先ほどのコードを書き直してみましょう♪
<code class="java">
	public class koko {
		public static void main(String[] args) {
			int i = 10;
			int j = 3;
			System.out.println(i / (double)j);
		}
	}

	/* &darr; コンソール &darr;
	3.3333333333333335
	*/
</code>
どちらか片方をdouble型に変換すれば後は暗黙の型変換がなされるためok!です。
<h2>データ型の変換(整数型と文字列型)</h2>
先ほどは数字型内でのデータ型の変換をしましたが、次は整数型と文字列型を変換してみましょう♪<br />整数型以外はほとんど使用しないため、ここでは省略します。
<h3>文字列型 -&gt; 整数型</h3>
文字列型の値を整数型(int型)に変換するには以下のように書きます。
<code class="java">
	Integer.parseInt("文字列");
</code>
<code class="java">
	public class koko {
		public static void main(String[] args) {
			String s1, s2;
			s1 = "10";
			s2 = "25";
			System.out.println(s1 + s2); //文字列型の結合
			System.out.println(Integer.parseInt(s1) + Integer.parseInt(s2)); //整数型の加算演算
		}
	}

	/* &darr; コンソール &darr;
	1025
	35
	*/
</code>
<h3>整数型 -&gt; 文字列型</h3>
整数型の値を文字列型に変換するには以下のように書きます。
<code class="java">
	Integer.valueOf(整数).toString();
</code>
<code class="java">
	public class koko {
		public static void main(String[] args) {
			int i, j;
			i = 10;
			j = 25;
			System.out.println(i + j);
			System.out.println(Integer.valueOf(i).toString() + Integer.valueOf(j).toString());
		}
	}

	/* &darr; コンソール &darr;
	35
	1025
	*/
</code>
<?php footer(); ?>