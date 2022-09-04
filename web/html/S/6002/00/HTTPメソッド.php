<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>HTTPメソッド</h2>
HTTP通信のメソッドには以下の8つがあります。
<ol>
	<li>GET</li>
	<li>POST</li>
	<li>PUT</li>
	<li>HEAD</li>
	<li>DELETE</li>
	<li>OPTIONS</li>
	<li>TRACE</li>
</ol>
「GET」と「POST」の2つを理解すればとりあえずok!です。
<h2>GET</h2>
サーバ上のリソースを取得(GET)とするためのメソッドです。<br />クライアントからサーバに対して送信するデータはないため、ボディ部はありません。<br /><br />しかしながら、諸事情でサーバに対してデータを送信したい場合があります。<br />この場合にはクエリストリングを使用します。<br /><br />クエリストリングとはURLの「?」以降の文字列を言い、「キー1=バリュー1&amp;キー1=バリュー2&amp;キー3=バリュー3」の形で表現します。<br /><br />GETメソッドでデータを送信する際には以下の点に注意して下さい。
<ul>
	<li>重要な情報は送信しない</li>
	<li>大量のデータは送信できない</li>
</ul>
「https://～～～/login.cgi?name=koko&amp;id=koko1234&amp;pw=3210」のように平文でインターネット上を経由するため、絶対に個人情報等の重要な情報は扱わないでください。<br />絶対にです。<br /><br />GETメソッドで送信した情報は簡単に盗聴できてしましますので、、、<br /><br />また、RFC2616で規定はされていませんが、ブラウザによってはURLの長さに制限があることがあります。<br />例えば、IEでは2,048文字以上のURLは扱えません。<br /><br />chromeやsafariといった最新のブラウザでは制限がないことも多いですが、諸事情によって送信するデータが多い場合には、具体的には2000文字を超える場合にはGETメソッドではなく、POSTメソッドを使用するべきです。
<h2>POST</h2>
重要な情報を送信する際に使用します。<br />ボディ部のデータは暗号化の対象となるため、インターネット上でパケットが盗聴されても攻撃者にデータの内容が読まれる危険性はほとんどありません。<br /><br />「ほとんど」と表記したのは、暗号が解読される危険性が「ゼロ」ではないからです。<br />暗号化に使用する鍵が盗まれれば当然データが読まれてしまします。<br /><br />また、攻撃者が超高性能なコンピュータを使用していれば解読される危険性も高まります。<br />実際、暗号技術と復号技術はイタチごっこ状態で、10年前に暗号化されて通信された機密情報であれば、解読できてしまうというのは実情です。<br /><br />まあ、そんな細かいこと???は置いといて、POSTを使用していれば、データが安全と言えます。<br /><br />また、送信するデータに上限がありません。<br /><br />重要な、または大量のデータを送信する際にはPOSTメソッドを使用すると覚えてください。
<h2>確認してみよう♪</h2>
では、実際に2つのメソッドを確認してみましょう♪
<form id="method-form" method="get" action="HTTPメソッド">
	<table>
		<tbody>
			<tr>
				<th>メソッド</th>
				<td>
					<select id="method">
						<option value="get">GET</option>
						<option value="post">POST</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>key1</th>
				<td><input name="key1" type="text" /></td>
			</tr>
			<tr>
				<th>key2</th>
				<td><input name="key2" type="text" /></td>
			</tr>
			<tr>
				<th>key3</th>
				<td><input name="key3" type="text" /></td>
			</tr>
			<tr class="center">
				<td colspan="2"><input type="submit" value="確認"></td>
			</tr>
		</tbody>
	</table>
</form>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const f = document.getElementById("method-form");
		document.getElementById("method").addEventListener("change", function() {
			f.method = this.value;
		});
	})();
</script>
<h3>GET</h3>
では、GETメソッドでデータを送信してみましょう♪
<img class="max-300w" src="../pics/get-doit.gif" alt="GETメソッド" />
fiddlerで確認してみるとリクエストラインには「GET」が表示され、URLの後ろに「?」で送信されるデータが表示されているのが確認できます。
<img src="../pics/get-result.gif" alt="GETメソッド" />
また、ブラウザのURL表示欄には入力したデータがそのまま確認できます。
<img src="../pics/qstr-get.gif" alt="クエリストリング" />
<h3>POST</h3>
今度はPOSTメソッドでデータを送信してみましょう♪
<img class="max-300w" src="../pics/post-doit.gif" alt="POSTメソッド" />
fiddlerで確認してみるとリクエストラインには「POST」が表示され、リクエストヘッダに続く空の行の後にデータが表示されています。
<img src="../pics/post-result.gif" alt="POSTメソッド" />
<h2>GET vs POST</h2>
GETとPOSTの使い分けを簡単にまとめます。
<table>
	<thead>
		<tr>
			<th width="50%">GET</th>
			<th width="50%">POST</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<ul>
					<li>リンク(ブックマーク)として使用可能</li>
					<li>ユーザが直接操作可能</li>
				</ul>
			</td>
			<td>
				<ul>
					<li>暗号化が可能</li>
					<li>大量のデータを送信可能</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>
「GET &lt; POST」と考えている方も多いですが、実際はGETを使用するべき機会も多いです。<br />特にPOSTでは、ブラウザバック(戻るボタンで前のページに戻ること)をした際に想定した挙動が起きないことが多いです。
<img src="../pics/cache-miss.png" alt="キャッシュミス" />
こんな画面を見たことがある人も多いと思います。<br />POSTメソッドでデータの送受信を行うと適切なキャッシュ制御を行わないとこのような画面を表示させ、ユーザの意図しない挙動を呼び起こす可能性があります。<br /><br />これを回避するにはキャッシュ制御を適切に行う必要がありますが、そう簡単ではありません。<br /><br />大切な情報以外は、特に理由がない限りはGETメソッドでデータの送信を行うことをオススメします。<br /><br />少し技術的に説明すると、URLに入力情報が付与されないため、URLそのものからページを再現することができず、したがってブラウザバックやブラウザ更新時の挙動がユーザの意図と異なる可能性があります。<br /><br />実際には、キャッシュが利用されて再現されることが多いため、そこまでデメリットにはなりませんが、、、
<?php footer(); ?>