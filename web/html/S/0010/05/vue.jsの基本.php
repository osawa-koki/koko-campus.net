<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2021-12-20",
	"updated" => "2021-12-20"
);
head($obj);
?>
<!--
<(\/?)(.+?)>
&lt;$1$2&gt;
-->
<h2>htmlの雛形</h2>
vue.jsを使用する際の雛形コードを下に提示します。
<code class="html">
	&lt;!DOCTYPE html&gt;
	&lt;html lang="ja" dir="ltr"&gt;
		&lt;head&gt;
			&lt;meta charset="utf-8"&gt;
			&lt;title&gt;&lt;/title&gt;
			&lt;link rel="stylesheet" href="style.css"&gt;
			&lt;meta name="viewport" content="width=device-width,initial-scale=1"&gt;
		&lt;/head&gt;
		&lt;body&gt;
			&lt;div id="app"&gt;
				&lt;!--ここにvue.js用のコードを記載します。--&gt;
			&lt;/div&gt;
			&lt;script charset = "UTF-8" type="text/javascript" src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js" defer&gt;&lt;/script&gt;
			&lt;script charset = "UTF-8" type="text/javascript" src="main.js" defer&gt;&lt;/script&gt;
		&lt;/body&gt;
	&lt;/html&gt;
</code>
このコードをブラウザで表示するとコンソール画面に「You are running a development build of Vue.Make sure to use the production build (*.prod.js) when deploying for production.」と表示されます。<br />この文字が表示されたらvue.jsファイルの読み込みに成功しています。
<h2>ディレクティブ</h2>
前回の授業でvue.jsではデータとDOMの関係が密であることを説明しましたね♪<br />覚えていますか???<br /><br />vue.jsではデータ・DOM間の関係を実現するためにディレクティブを用います。<br />ディレクティブっておそらく初めて聞く人が多いと思います。<br />ディレクティブは「v-〇〇〇」の形をとり、javascriptの式を値にとることでデータバインディングを実現します。<br />ディレクティブの仕組みは以下のようになっています。
<img src="../pics/ディレクティブ.png" alt="ディレクティブの説明画像" />
ディレクティブはjsにおける簡単な式であり、「v-bind」「v-for」など様々なjsにおける式を簡単にかつhtml上のデータと結合させて書くことができます。<br />ディレクティブの具体的な説明は後ほど行います。
<h2>vueオブジェクトの生成</h2>
実際にvue.jsでアプリケーションを作成する際にはvueクラスからvueインスタンスを生成する必要があります。<br />具体的には以下のコードを実行します。
<code class="javascript">
	let app = new Vue({
		el: "#app",
		//オプションの設定
	});
</code>
<p>変数名は任意の文字でok!ですが、appとする場合が多いのでここでもappとします。</p>
<h3>vueオブジェクトの中身</h3>
「el」ってなんや、、、「オプション」ってなんや、、、って感じですよね、、、<br />説明します。<br />vueオブジェクトは基本的には以下の構成になっています。
<table>
	<tbody>
		<tr>
			<th>el</th>
			<td>対象となるhtml要素を指定します。<br />idには先頭に「#」を付け、クラスには先頭に「.」を付けます。</td>
		</tr>
		<tr>
			<th>data</th>
			<td>データを格納します。<br />中は連想配列型であり、「キー: バリュー(値)」の形で記述します。<br />複数存在する場合には「,」で区切ります。</td>
		</tr>
		<tr>
			<th>computed</th>
			<td>使用方法は「data」とほとんど同じですが、こちらは関数によって算出されます。</td>
		</tr>
		<tr>
			<th>methods</th>
			<td>メソッド(関数)を格納します。</td>
		</tr>
	</tbody>
</table>
<p>vueライフサイクル(created・mounted・updated・etc...)は後ほど説明します。</p>
<h2>テキストバインディング</h2>
vue.jsのテキストバインディングではjs内のvueオブジェクト内のデータがDOMの中身と一心同体になります。<br />これはvue.js内で設定した変数が変わればhtml上の表示も自動で変更されることを意味します。
<img src="../pics/バインディング.png" alt="データバインディングの説明画像" />
<code class="html">
	&lt;div id="app"&gt;
		&lt;p&gt;{{message}}&lt;/p&gt;
	&lt;/div&gt;
</code>
「{{}}」はマスタッシュ記法と呼ばれ、テキストの一部を指定する際に用いられます。<br />この部分がvueオブジェクト内のデータと同期します。
<code class="javascript">
	let app = new Vue({
		el: "#app",
		data: {
			message: "hello world!"
		}
	});
</code>
elキーの値には対象の要素のセレクタを指定します。<br />ここではキーを「message」、値を「hello world!」とします。
<div class="result">
	<div id="app1">
		<p class="x">{{message}}</p>
	</div>
</div>
「hello world!」って表示されたら成功です♪<br /><br />ですけどこれでは単にvue.js内からhtmlを操作しただけなので、本当にvueオブジェクト内のデータとhtml上のデータが一心同体になっているかチェックしましょう♪<br /><br />vueオブジェクト内のデータに外部からアクセスするためには「変数名.data内のキー」でアクセスします。<br />先ほどの例では、「app.message」となります。
<p class="r">ある程度オブジェクト指向が理解できる方はここを「app.data.message」としてしまうことが多いので注意してください。</p>
この値をコンソール画面から変更してみましょう♪<br />「app.message = "こんにちは♪"」というコードを実行してみてください。<br />「p」要素内のテキストも変更されることが確認できます。
<img class="border" src="../pics/テキストバインディング1.png" alt="テキストバインディングの説明画像" />
<img class="border" src="../pics/テキストバインディング2.png" alt="テキストバインディングの説明画像" />
<img class="border" src="../pics/テキストバインディング3.png" alt="テキストバインディングの説明画像" />
html上のデータとvueオブジェクト内のデータが本当に一心同体になっていました♪<br /><br />また、このように自動でバインドしてくれるデータをリアクティブデータと言います。<br />vueオブジェクト内のdata内で定義した場合はリアクティブデータとなります。
<p class="r">vueオブジェクト外で宣言したデータでも参照渡しである以上リアクティブデータとして捉えられますが、原則としてvue.jsで用いるデータはvueオブジェクトのdataないで定義するべきです。</p>
<h2>繰り返し処理</h2>
vueオブジェクト内の配列を繰り返してhtml上に再現します。<br />これには「v-for」ディレクティブを用います。
<code class="html">
	&lt;div id="app"&gt;
		&lt;ol&gt;
			&lt;li v-for="item in array"&gt;{{item}}&lt;/li&gt;
		&lt;/ol&gt;
	&lt;/div&gt;
</code>
<code class="javascript">
	let app = new Vue({
		el: "#app",
		data: {
			array: ["ゼニガメ", "チコリータ", "フシギバナ"]
		}
	});
</code>
<div class="result">
	<div id="app2">
		<ol>
			<li v-for="item in array">{{item}}</li>
		</ol>
	</div>
</div>
ここでもhtml上のデータとvueオブジェクト内のデータが本当に一心同体になっているかチェックしましょう♪<br /><br />コンソール画面から「app.array」に「ピカチュウ」を追加してみましょう♪<br />「app.array.push("ピカチュウ")」でvueオブジェクト内のarrayに「ピカチュウ」を追加します。<br />html上のリストにもピカチュウが追加されるのが確認できます。
<img class="border" src="../pics/テキストバインディング4.png" alt="テキストバインディングの説明画像" />
<h2>条件分岐</h2>
「v-if」ディレクティブの値が「true」の場合のみ処理を実行します。
<code class="html">
	&lt;div id="app"&gt;
		&lt;p v-if="tf"&gt;{{answer}}&lt;/p&gt;
	&lt;/div&gt;
</code>
<code class="javascript">
	let app = new Vue({
		el: "#app",
		data: {
			tf: true,
			answer: "「真」ですね♪"
		}
	});
</code>
<div class="result">
	<div id="app3">
		<p class="x" v-if="tf">{{answer}}</p>
	</div>
</div>
コンソール画面で「tf」の値を「false」に変更すると、html上に表示されているテキストも削除されることから、ここでもhtml上のデータとvueオブジェクト内のデータが一心同体になっていることが確認できますね♪
<img class="border" src="../pics/テキストバインディング5.png" alt="テキストバインディングの説明画像" />
<div class="separator"></div>
一番大切なのはhtml上のデータとvueオブジェクト内のデータが一心同体になっていることです。<br />ではあの画像をもう一度貼りますね♪
<img src="../pics/バインディング.png" alt="バインディングの説明画像" />
<script charset = "UTF-8" type="text/javascript" src="https://koko-campus.org/cdn/vue.js/2.6.14-ops.js" defer></script>
<script charset = "UTF-8" type="text/javascript" src="entire.js" defer></script>
<?php footer(); ?>