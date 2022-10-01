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
<h2>イベント駆動</h2>
イベント駆動とはリスナーがボタンをクリックしたり、フォームに文字を入力したり、画面をスクロールしたりした際に何らかの処理を実行するように設定します。<br />javascriptのaddEventListener、jqueryの$(セレクタ).onに該当します。<br />vue.jsなしではいちいち全てのドキュメントオブジェクトにイベントリスナーを設定してその処理を規定して、、、<br />面倒くさいですよね、、、<br />vue.jsでは「v-on:click="関数名"」で実行可能です。<br />非常に簡単ですね♪
<p class="r">引数(「:」の後の文字)としてはブラウザが使用可能なイベントを全て使用可能です。</p>
<p class="r">もっと簡単に「@click="関数名"」でも書くことができます。</p>
<code class="html">
	&lt;div id="app"&gt;
		&lt;p&gt;クリックを{{count}}回しました♪&lt;/p&gt;
		&lt;button @click="click"&gt;&lt;/button&gt;
	&lt;/div&gt;
</code>
<code class="javascript">
	let app = new Vue({
		el: "#app",
		data: {
			count: 0
		},
		methods: {
			click: function() {
				this.count++;
			}
		}
	});
</code>
<div class="result">
	<div id="app1">
		<p class="x">クリックを{{count}}回しました♪</p>
		<button @click="click">クリック</button>
	</div>
</div>
これ、プレーンのjavascriptで再現するとどうなるでしょうか???<br />書いてみましょう♪
<code class="html">
	&lt;p&gt;クリックを&lt;span id="count"&gt;0&lt;/span&gt;回しました♪&lt;/p&gt;
	&lt;button id="button"&gt;クリック&lt;/button&gt;
</code>
<code class="javascript">
	let count = 0;
	document.getElementById("button").addEventListener("click", () => {
		count++;
		document.getElementById("count").textContent = count;
	});
</code>
<div class="result">
	<p class="x">クリックを<span id="count">0</span>回しました♪</p>
	<button id="button">クリック</button>
</div>
意外と簡単に書けました♪<br />ですけど、これだとコードが分散してしまい保守性・管理容易性が損なわれてしまいます。<br />vue.jsの方が綺麗なコードになりますね♪
<h2>イベント修飾子</h2>
イベント修飾子(「.」の後の文字)としては以下のものが指定可能です。
<table>
	<caption>イベント修飾子(全般)</caption>
	<tbody>
		<tr>
			<th>.stop</th>
			<td>event.stopPropagation();を実行します。<br />バブリング(子要素をクリックした際にそれが親要素の伝播すること)を防ぎます。</td>
		</tr>
		<tr>
			<th>.prevent</th>
			<td>event.preventDefault();を実行します。<br />ユーザが発動したイベントに関してデフォルトでブラウザが発動させるイベントに妨害されないように設定します。</td>
		</tr>
		<tr>
			<th>.once</th>
			<td>一回のみイベントハンドラを実行します。</td>
		</tr>
		<tr>
			<th>.passive</th>
			<td>.preventと異なり、ブラウザのデフォルトイベントを中止しません。</td>
		</tr>
		<tr>
			<th>.capture</th>
			<td>キャプチャモードで実行します。<br /><a href="https://developer.mozilla.org/ja/docs/Web/API/EventTarget/addEventListener">MDN</a>は、「この型のイベントが DOM ツリーで下に位置する EventTarget に配信dispatchされる前に、登録された listener に配信されることを示します。」と説明しています。</td>
		</tr>
		<tr>
			<th>.self</th>
			<td>イベントの発動元(event.target)が自分自身である場合にのみ実行します。</td>
		</tr>
	</tbody>
</table>
<table>
	<caption>イベント修飾子(クリック)</caption>
	<tbody>
		<tr>
			<th>.left</th>
			<td>マウスの左クリックでのみイベントハンドラを実行します。</td>
		</tr>
		<tr>
			<th>.right</th>
			<td>マウスの右クリックでのみイベントハンドラを実行します。</td>
		</tr>
		<tr>
			<th>.middle</th>
			<td>マウスの中央ボタンのクリックでのみイベントハンドラを実行します。</td>
		</tr>
	</tbody>
</table>
<table>
	<caption>イベント修飾子(キー操作)</caption>
	<tbody>
		<tr>
			<th>.enter</th>
			<td>エンターキーが押された場合にイベントハンドラを実行します。</td>
		</tr>
		<tr>
			<th>.up</th>
			<td>上矢印キーが押された場合にイベントハンドラを実行します。</td>
		</tr>
		<tr>
			<th>.right</th>
			<td>右矢印キーが押された場合にイベントハンドラを実行します。</td>
		</tr>
		<tr>
			<th>.down</th>
			<td>下矢印キーが押された場合にイベントハンドラを実行します。</td>
		</tr>
		<tr>
			<th>.left</th>
			<td>左矢印キーが押された場合にイベントハンドラを実行します。</td>
		</tr>
		<tr>
			<th>.tab</th>
			<td>タブキーが押された場合にイベントハンドラを実行します。</td>
		</tr>
		<tr>
			<th>.delete</th>
			<td>deleteキーが押された場合にイベントハンドラを実行します。</td>
		</tr>
		<tr>
			<th>.esc</th>
			<td>エスケープキーが押された場合にイベントハンドラを実行します。</td>
		</tr>
	</tbody>
</table>
<table>
	<caption>イベント修飾子(キーシステム)</caption>
	<tbody>
		<tr>
			<th>.ctrl</th>
			<td>コントロールキーが押されている場合にイベントハンドラを実行します。</td>
		</tr>
		<tr>
			<th>.alt</th>
			<td>altキーが押されている場合にイベントハンドラを実行します。</td>
		</tr>
		<tr>
			<th>.shift</th>
			<td>シフトキーが押されている場合にイベントハンドラを実行します。</td>
		</tr>
	</tbody>
</table>
<h2>双方向バインディング</h2>
開発者ツールから直接htmlを変更しない限り通常はhtml上のデータが変わることはないため、vueオブジェクト内のデータの変更を検知してそれをhtml上に反映させればok!です。<br />しかしながら、ユーザが入力するフォームにおいてはhtml上のデータが変更するため、html上のデータとvueオブジェクト内のデータの同期は双方向で同期が実現する必要があります。<br />これを双方向バインディングと呼びます。<br />双方向バインディングを実現するには「v-model」ディレクティブを使用します。
<p class="r">既に学習しています。</p>
<code class="html">
	&lt;div id="app"&gt;
		&lt;p&gt;入力した文字→{{content}}&lt;/p&gt;
		&lt;input type="text" v-model="content" /&gt;
	&lt;/div&gt;
</code>
<code class="html">
	let app = new Vue({
		el: "#app",
		data: {
			content: ""
		}
	});
</code>
<div class="result">
	<div id="app2">
		<p class="x">入力した文字→{{content}}</p>
		<input type="text" v-model="content" />
	</div>
</div>
また、取得したデータを加工してhtml上に再現する場合はinput(change)イベントでイベントハンドラを実行します。
<p class="r">inputは文字が入力される都度、changeが入力された文字が確定された時にイベントハンドラが実行されます。</p>
<code class="html">
	&lt;div id="app"&gt;
		&lt;p&gt;入力した文字→{{content}}&lt;/p&gt;
		&lt;input type="text" v-model="content" @change="show_dialog" /&gt;
	&lt;/div&gt;
</code>
<code class="javascript">
	let app = new Vue({
		el: "#app",
		data: {
			content: ""
		},
		methods: {
			show_dialog: function(event) { //イベントオブジェクトを引数に渡す
				window.alert(event.target.value); //ユーザの入力データは「event.target.value」で取得
			}
		}
	});
</code>
<div class="result">
	<div id="app3">
		<p class="x">入力した文字→{{content}}</p>
		<input type="text" v-model="content" @change="show_dialog" />
	</div>
</div>
「v-model」ディレクティブで使用可能な修飾子を紹介します。
<table>
	<caption>v-model修飾子</caption>
	<tbody>
		<tr>
			<th>.lazy</th>
			<td>入力内容が確定した時点でイベントハンドラを実行します。<br />changeイベントと同じです。</td>
		</tr>
		<tr>
			<th>.number</th>
			<td>入力した内容を数字型として取得します。</td>
		</tr>
		<tr>
			<th>.trim</th>
			<td>入力したデータの余分な部分(先頭と最後の空白文字・改行)を取り除きます。</td>
		</tr>
	</tbody>
</table>
<script charset = "UTF-8" type="text/javascript" src="https://koko-campus.org/cdn/vue.js/2.6.14-ops.js" defer></script>
<script charset = "UTF-8" type="text/javascript" src="entire.js" defer></script>
<?php footer(); ?>