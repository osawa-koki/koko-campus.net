<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-21",
	"updated" => "2022-02-21"
);
head($obj);
?>
<h2>ショートハンド</h2>
ショートハンドとはコードを簡単に書くための技法のことを言います。<br />特に覚えなくても書けますが、とっても便利でコードが綺麗になるので是非マスターすることをオススメします。<br /><br />ここまでこれた皆さんなら大丈夫です。<br />簡単に覚えられます♪
<h2>三項演算子</h2>
条件式の結果によって使用する値を変更します。<br />if文では実行する処理を制御しますが、三項演算子では使用する値だけを制御するために使用されます。<br />以下のように書きます。
<code class="java">
	(条件式) ? 真の場合に使用する値 : 偽の場合に使用する値
</code>
例えばnの値が偶数の場合は変数dataに「偶数」、奇数の場合は「奇数」を代入するコードを想定してください。<br />三項演算子を使用せずにifを用いて書くと以下のようになります。
<code class="java">
	public class koko {
		public static void main(String[] args) {
			int n = 10;
			String data;
			if (n % 2 == 0) {
				data = "偶数";
			} else {
				data = "奇数";
			}
			System.out.println(data);
		}
	}
</code>
三項演算子を使用すると以下のように書けます。
<code class="java">
	public class koko {
		public static void main(String[] args) {
			int n = 10;
			String data = (n % 2 == 0) ? "偶数": "奇数";
			System.out.println(data);
		}
	}
</code>
<h2>自己代入演算子</h2>
変数の値を「n」加算(減算)する場合に使用されます。<br />例えば、xの値に「3」を加える処理をする際に自己代入演算子を使用しないと以下のようになります。
<code class="java">
	x = x + 3;
</code>
う～～～ん、、、<br />xが二回でてきて美しくないですね。<br /><br />これは自己代入演算子を用いて以下のように書けます。
<code class="java">
	x += 3;
</code>
自己代入演算子には以下のものがあります。
<table>
	<tbody>
		<tr>
			<th>+=</th>
			<td>左辺の値に右辺の値を加えたものを左辺に代入します。</td>
		</tr>
		<tr>
			<th>-=</th>
			<td>左辺の値から右辺の値を引いたものを左辺に代入します。</td>
		</tr>
		<tr>
			<th>*=</th>
			<td>左辺の値に右辺の値をかけたものを左辺に代入します。</td>
		</tr>
		<tr>
			<th>/=</th>
			<td>左辺の値を右辺の値で割ったものを左辺に代入します。</td>
		</tr>
		<tr>
			<th>%=</th>
			<td>左辺の値を右辺の値で割った余りを左辺に代入します。</td>
		</tr>
	</tbody>
</table>
<h2>インクリメント・デクリメント</h2>
自己代入演算子のうちの加算と減算で、かつ右辺の値が「1」の場合はもっと簡単に書くことができます。
<h3>インクリメント</h3>
自己代入演算子のうちの「1」だけを加算する場合に使用します。<br />以下のように書きます。
<code class="java">
	i++;
</code>
これは以下のコードを同義です。
<code class="java">
	i = i + 1;
	/* or */
	i += 1;
</code>
<h3>デクリメント</h3>
自己代入演算子のうちの「1」だけを減算する場合に使用します。<br />以下のように書きます。
<code class="java">
	i--;
</code>
これは以下のコードを同義です。
<code class="java">
	i = i - 1;
	/* or */
	i -= 1;
</code>
<h2>連続変数宣言</h2>
変数の宣言と初期値の代入を同時に行えることは説明しましたね♪<br />さらにこれは複数の変数を「,(カンマ)」で区切ることで複数の変数の宣言と初期値の代入を同時に行うことができます。<br />例えば以下のコードがあったとします。
<code class="java">
	int one = 1;
	int two = 2;
	int three = 3;
</code>
これを連続変数宣言を使用すると以下のように書くことができます。
<code class="java">
	int one = 1,
		two = 2,
		three = 3;
</code>
<h2>最後に</h2>
お疲れ様です。<br />これでjava入門編-ver1は終了です。<br /><br />次に進むべき講座を幾つか紹介しますね♪
<div class="subjects-container">
	<a href="../../java中級/branch/branch" class="link-subject to-java中級"></a>
	<a href="../../vb入門/branch/branch" class="link-subject to-vb入門"></a>
	<a href="../../python入門/branch/branch" class="link-subject to-python入門"></a>
	<a href="../../c入門/branch/branch" class="link-subject to-c入門"></a>
</div>
<?php footer(); ?>