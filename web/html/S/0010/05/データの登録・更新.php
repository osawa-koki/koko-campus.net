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
<h2>入力フォームとのバインド</h2>
ユーザが入力したデータを即座にかつ自動でhtml上に表示させます。<br />通常のjavascriptではinput要素に対してイベントリスナーを設定し、イベントが発動したらデータを取得してhtml上に表示するといった複雑な処理が必要とされましたが、vue.jsを用いれば簡単にこれを実現できます。<br /><br />具体的にはinputの属性に「v-model="変数名"」を設定します。
<p class="r">v-modelディレクティブについては後ほど詳しく説明します。</p>
<code class="html">
	&lt;div id="app"&gt;
		&lt;p&gt;入力した文字&rarr;{{content}}&lt;/p&gt;
		&lt;input type="text" v-model="content" /&gt;
	&lt;/div&gt;
</code>
<code class="javascript">
	let app = new Vue({
		el: "#app",
		data: {
			content: ""
		}
	});
</code>
javascript上で特に処理をしなくてもdataオブジェクト内で定義する必要があります。<br />こういった場合や後からデータを取得してvueオブジェクトに格納する場合にも予め定義する必要があります。
<div class="result">
	<div id="app1">
		<p class="x">入力した文字&rarr;{{content}}</p>
		<input type="text" v-model="content" />
	</div>
</div>
また、「v-model」の引数(「:」の後の文字)に「number」を指定するとデータを数字として取得できます。<br />この場合は「v-model:number="content"」となります。
<h2>イベント処理</h2>
ユーザがクリックしたり、何らかのデータを入力した際に関数を実行する際にはvueオブジェクト内のmethond内に定義します。<br />また、html上の要素の属性に「v-on:click="関数名"」を設定します。<br />先ほどのフォームと合わせてユーザが入力したデータをメッセージダイアログに表示してみましょう♪
<code class="html">
	&lt;div id="app"&gt;
	&lt;p class="x"&gt;入力した文字&rarr;{{content}}&lt;/p&gt;
	&lt;input type="text" v-model="content" /&gt;
	&lt;button v-on:click="clicked"&gt;クリック!!&lt;/button&gt;
	&lt;/div&gt;
</code>
<code class="javascript">
	let app = new Vue({
		el: "#app",
		data: {
			content: ""
		},
		methods: {
			clicked: function() {
				window.alert(this.content);
			}
		}
	});
</code>
<div class="result">
	<div id="app2">
		<p class="x">入力した文字&rarr;{{content}}</p>
		<input type="text" v-model="content" />
		<button v-on:click="clicked">クリック!!</button>
	</div>
</div>
methods内からdata内のデータにアクセスするには「this.キー」で指定します。<br />この際にアロー関数を用いるとthisの参照先がズレてしまうので、必ず「function」で関数を定義するようにして下さい。
<h2>属性に対するバインディング</h2>
マスタッシュ記法「{{}}」はあくまでもテキストコンテントに対して有効であって、html要素内の属性に対して用いることはできません。<br />以下のコードはコンパイルエラーとなります。
<code class="html">
	&lt;div id="app"&gt;
		&lt;input type="text" value="{{content}}" /&gt;
	&lt;/div&gt;
</code>
属性に対してのバインディングは「v-bind」を用いて実現します。<br />引数(「:」の後の文字)にはどの属性に対するバインディングかを指示します。<br />例えばvalue属性にバインドさせる際は「v-bind:value」とします。<br /><br />また、複数の属性をバインドさせる際には引数を用いてひとつずつバインドさせるのではなく、「v-bind」の値にオブジェクト型のデータを渡すことで一括して属性のバインドが行えます。
<div class="separator"></div>
「v-bind」に関しては以下の修飾子(「.」の後の文字)が使用できます。
<table>
	<tbody>
		<tr>
			<th>.prop</th>
			<td>属性ではなくDOMプロパティとしてバインドします。</td>
		</tr>
		<tr>
			<th>.camel</th>
			<td>ケバブケースの属性をキャメルケースに変換します。</td>
		</tr>
		<tr>
			<th>.sync</th>
			<td>双方向のバインディングを行います。</td>
		</tr>
	</tbody>
</table>
この授業はあくまでも「vue.js入門」ですのでここでの説明は省略します。<br />気になる方は「vue.js中級」で会いましょう♪
<h2>スタイル属性のバインディング</h2>
スタイル属性は通常、「style="color: red; background-color: blue;"」と言った感じに複数設定するので、バインディングの仕方も少し特殊です。<br />以下のように実現します。
<code class="html">
	&lt;p v-bind:style="{color: color, backgroundColor: bg_color}"&gt;&lt;/p&gt;
</code>
「;」ではなく「,」を使用することに注意してください。<br /><br />ではスタイルをオブジェクトを渡して一括でバインドしましょう♪
<code class="html">
	&lt;div id="app"&gt;
		&lt;div v-bind:style="obj"&gt;&lt;/div&gt;
	&lt;/div&gt;
</code>
<code class="javascript">
	let app = new Vue({
		el: "#app",
		data: {
			obj: {
				width: "150px",
				height: "100px",
				border: "1px solid black",
				borderRadius: "25px",
				backgroundColor: "red",
			}
		}
	});
</code>
<div class="result">
	<div id="app3">
		<div v-bind:style="obj"></div>
	</div>
</div>
<h2>クラスのバインディング</h2>
利用頻度は高くありませんが、vue.jsではクラスも簡単にバインディングすることができます。<br />書き方はスタイルのバインディングと同様です。
<code class="html">
	&lt;p v-bind:class="{main_class: main_class, sub_class: sub_class}"&gt;&lt;/p&gt;
</code>
<h2>配列・オブジェクトのバインディング</h2>
既に少し学習しています。<br />vue.jsで配列の要素を繰り返し処理する際には「v-for」ディレクティブを使用します。<br />前回は単なる配列の繰り返し処理をしたので、ここではオブジェクト型(連想配列型)を繰り返して処理しましょう♪
<code class="html">
	&lt;div id="app"&gt;
		&lt;ul&gt;
			&lt;li v-for="k in obj" v-bind:key="k.id"&gt;図鑑番号-{{k.id}}||名前-{{k.name}}||タイプ-{{type}}&lt;/li&gt;
		&lt;/ul&gt;
	&lt;/div&gt;
</code>
<code class="javascript">
	let app = new Vue({
		el: "#app",
		data: {
			obj: [
				{id: 152, name: "チコリータ", type: "くさ"},
				{id: 183, name: "マリル", type: "みず"},
				{id: 202, name: "ソーナンス", type: "ノーマル"},
			]
		}
	});
</code>
<div class="result">
	<div id="app4">
		<ul class="x">
			<li v-for="k in obj" v-bind:key="k.id">図鑑番号-{{k.id}}||名前-{{k.name}}||タイプ-{{k.type}}</li>
		</ul>
	</div>
</div>
「v-bind」ディレクティブの後の引数である「key」は配列での順番を指定するために必要とされます。
<p class="r">配列「key」は省略しても動作することが多いですが、思わぬバグの防止の観点から原則として付けるべきです。</p>
配列に関しては破壊的メソッド(配列から戻り値を求めることが目的ではなく、配列そのものの変更を目的とするメソッド)を使用することでhtml上のデータとvueオブジェクト内のデータを同期させます。<br />破壊的なメソッドには以下のものがあります。
<ul>
	<li>push</li>
	<li>pop</li>
	<li>shift</li>
	<li>unshift</li>
	<li>splice</li>
	<li>reverse</li>
</ul>
<p class="r">「map・forEach・filter」などの非破壊的メソッドでも同期させることは可能ですが、その性質上原則として破壊的なメソッドを使用すべきと言えます。</p>
これも「v-bind」ディレクティブを用いているためhtml上のデータとvueオブジェクト内のデータは同期されます。
<p>古いバージョンでは配列の要素だけを変更した場合には同期されませんでしたが、アップデートされて同期されるようになりました。</p>
では先ほどの例に関して、ソーナンスのタイプをノーマルにしていましたが、本当はエスパーであるためこれを変更しましょう♪<br />コンソール画面から「app.obj[2]["type"] = "エスパー";」を実行しましょう♪<br />html上のデータも更新されていることが分かると思います。
<img class="border" src="../pics/テキストバインディング6.png" alt="テキストバインディングの説明画像" />
<script charset = "UTF-8" type="text/javascript" src="https://koko-campus.org/cdn/vue.js/2.6.14-ops.js" defer></script>
<script charset = "UTF-8" type="text/javascript" src="entire.js" defer></script>
<?php footer(); ?>