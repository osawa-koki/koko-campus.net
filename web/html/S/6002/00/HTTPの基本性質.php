<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>クライアント・サーバ</h2>
HTTPに限らず、ネットワーク通信は1対1で行うことが基本です。<br />この仕組みをクライアント・サーバシステムと言います。<br /><br />サービス(処理)を要求する側をクライアント、要求を受けて処理を実行し、その結果を返す側をサーバと言います。
<img src="../pics/クライアント・サーバ.png" alt="クライアント・サーバ" />
サーバというと、ハードウェアのサーバを想像する方も多いと思いますが、それは誤りです。<br />「Server」は「奉仕する人」という意味で、何かのサービスを提供する人(プログラム)を指します。<br /><br />まあ、一般的にはハードウェアとしてのサーバを想像する人も多いので、使い分けですね♪
<div class="separator"></div>
HTTP通信もクライアントとサーバ間で行われます。<br /><br />HTTP通信ではブラウザ(safari・google chrome・firefox・microsoft edge)がクライアントとなり、サーバ(apache・nginx・cloudflare)がサーバとなります。
<h2>リクエストとレスポンス</h2>
クライアントがサーバに対して行う要求をリクエストといい、サーバがその要求を受けて実行した処理結果を返すことをレスポンスと言います。
<img src="../pics/リクエスト・レスポンス.png" alt="リクエスト・レスポンス" />
HTTPではリクエストとレスポンスが必ずセットになります。<br />ひとつのリクエストに必ずひとつのレスポンスが発生します。<br />ひとつのリクエストに複数のレスポンスが発生することは絶対にありません。
<h2>HTTP通信の概要</h2>
続いてHTTPで通信されるデータの概要を説明します。<br />リクエストとレスポンスに分けて説明しますが、大枠は同じです。
<div class="separator"></div>
僕が運営している<a href="../../../it-dictionary/index">IT辞書ページ</a>で、キーワードから検索する通信を調査します。
<img src="../pics/it-dict.gif" alt="IT Dict" />
fiddlerでは以下のHTTPリクエストが確認できました。
<img src="../pics/it-dict_req.gif" alt="IT Dict" />
<code class="http(request) dummy">
	POST https://koko-campus.org/it-dictionary/index?search HTTP/1.1
	Host: koko-campus.org
	Connection: keep-alive
	Content-Length: 41
	Pragma: no-cache
	Cache-Control: no-cache
	sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="101", "Google Chrome";v="101"
	sec-ch-ua-mobile: ?0
	sec-ch-ua-platform: "Windows"
	Upgrade-Insecure-Requests: 1
	Origin: https://koko-campus.org
	Content-Type: application/x-www-form-urlencoded
	User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36
	Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
	Sec-Fetch-Site: same-origin
	Sec-Fetch-Mode: navigate
	Sec-Fetch-User: ?1
	Sec-Fetch-Dest: document
	Referer: https://koko-campus.org/it-dictionary/index
	Accept-Encoding: gzip, deflate, br
	Accept-Language: ja,en-US;q=0.9,en;q=0.8
	Cookie: questionaire-id=AA0002; Happy-Halloween!=f0e922vujb1q3tc33qq4m8b4co

	keyword=keyword&category=all&importance=5
</code>
<h3>HTTPリクエスト</h3>
HTTPリクエストは以下の3つのパートからなります。
<ul>
	<li>リクエストライン</li>
	<li>ヘッダ</li>
	<li>(ボディ)</li>
</ul>
<h4>リクエストライン</h4>
HTTPのメソッド・バージョン・通信先を指定します。
<code class="http(request) dummy">
	<span class="red">POST https://koko-campus.org/it-dictionary/index?search HTTP/1.1</span>
	Host: koko-campus.org
	Connection: keep-alive
	Content-Length: 41
	Pragma: no-cache
	Cache-Control: no-cache
	sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="101", "Google Chrome";v="101"
	sec-ch-ua-mobile: ?0
	sec-ch-ua-platform: "Windows"
	Upgrade-Insecure-Requests: 1
	Origin: https://koko-campus.org
	Content-Type: application/x-www-form-urlencoded
	User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36
	Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
	Sec-Fetch-Site: same-origin
	Sec-Fetch-Mode: navigate
	Sec-Fetch-User: ?1
	Sec-Fetch-Dest: document
	Referer: https://koko-campus.org/it-dictionary/index
	Accept-Encoding: gzip, deflate, br
	Accept-Language: ja,en-US;q=0.9,en;q=0.8
	Cookie: questionaire-id=AA0002; Happy-Halloween!=f0e922vujb1q3tc33qq4m8b4co

	keyword=keyword&category=all&importance=5
</code>
<h4>ヘッダ</h4>
HTTP通信に関する補足情報を指定します。
<code class="http(request) dummy">
	POST https://koko-campus.org/it-dictionary/index?search HTTP/1.1
	<span class="red">Host: koko-campus.org
	Connection: keep-alive
	Content-Length: 41
	Pragma: no-cache
	Cache-Control: no-cache
	sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="101", "Google Chrome";v="101"
	sec-ch-ua-mobile: ?0
	sec-ch-ua-platform: "Windows"
	Upgrade-Insecure-Requests: 1
	Origin: https://koko-campus.org
	Content-Type: application/x-www-form-urlencoded
	User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36
	Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
	Sec-Fetch-Site: same-origin
	Sec-Fetch-Mode: navigate
	Sec-Fetch-User: ?1
	Sec-Fetch-Dest: document
	Referer: https://koko-campus.org/it-dictionary/index
	Accept-Encoding: gzip, deflate, br
	Accept-Language: ja,en-US;q=0.9,en;q=0.8
	Cookie: questionaire-id=AA0002; Happy-Halloween!=f0e922vujb1q3tc33qq4m8b4co</span>

	keyword=keyword&category=all&importance=5
</code>
ヘッダ部分は直接データとして表示されるわけではありませんが、処理に関する事項を記述するスペースであり、スルー出来ない部分です。<br /><br />特に、以下の内容に関してはしっかりと理解する必要があります。
<ul>
	<li>Cache-Control</li>
	<li>Content-Type</li>
	<li>Cookie</li>
</ul>
これらは後ほど詳しく説明します。
<h4>ボディ</h4>
実際に、送受信されるメインのデータです。<br />GETメソッドでは使用されず、POST用の領域だと思ってもok!です。<br /><br />下の例では、IT用語を検索する際のHTTPリクエストを表示していますが、キーとバリューが「=」で結ばれ、それらは「&amp;」で結合されています。
<code class="http(request) dummy">
	POST https://koko-campus.org/it-dictionary/index?search HTTP/1.1
	Host: koko-campus.org
	Connection: keep-alive
	Content-Length: 41
	Pragma: no-cache
	Cache-Control: no-cache
	sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="101", "Google Chrome";v="101"
	sec-ch-ua-mobile: ?0
	sec-ch-ua-platform: "Windows"
	Upgrade-Insecure-Requests: 1
	Origin: https://koko-campus.org
	Content-Type: application/x-www-form-urlencoded
	User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36
	Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
	Sec-Fetch-Site: same-origin
	Sec-Fetch-Mode: navigate
	Sec-Fetch-User: ?1
	Sec-Fetch-Dest: document
	Referer: https://koko-campus.org/it-dictionary/index
	Accept-Encoding: gzip, deflate, br
	Accept-Language: ja,en-US;q=0.9,en;q=0.8
	Cookie: questionaire-id=AA0002; Happy-Halloween!=f0e922vujb1q3tc33qq4m8b4co

	<span class="red">keyword=keyword&category=all&importance=5</span>
</code>
また、半角英数字以外は「%～～」と変換されます。<br />これをパーセントエンコード(URLエンコード)と言います。<br /><br />例えば、キーワードを「あいうえお」として検索をかけてみます。
<img src="../pics/url-encode.gif" alt="URLエンコード(パーセントエンコード)" />
「あいうえお」ではなく、「%E3%81%82%E3%81%84%E3%81%86%E3%81%88%E3%81%8A」となっているのが確認できます。<br />これがパーセントエンコードです。<br /><br />下にパーセントエンコードプログラムを作成したので、確認してみて下さい。
<textarea id="url-encode_from" class="url-encode" cols="30" rows="10"></textarea>
<div id="url-encode_button" class="button">URLエンコード</div>
<textarea id="url-encode_to" class="url-encode" cols="30" rows="10"></textarea>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const
			f = document.getElementById("url-encode_from"),
			t = document.getElementById("url-encode_to")
		;
		document.getElementById("url-encode_button").addEventListener("click", () => {
			t.value = encodeURI(f.value);
		});
	})();
</script>
<h3>HTTPレスポンス</h3>
HTTPレスポンスもHTTPリクエストとほとんど同様で、以下の3つのパートからなります。
<ul>
	<li>ステータスライン</li>
	<li>ヘッダ</li>
	<li>(ボディ)</li>
</ul>
<h4>ステータスライン</h4>
リクエストラインではなく、ステータスラインと呼ばれます。<br /><br />ステータスコードとはリクエストを受けて実行した処理の結果の状態を表します。<br /><br />「404 Not Found」を知っている方は多いと思いますが、それ以外にもたくさんあります。<br />詳しくは後ほど説明します。
<h4>ヘッダ</h4>
HTTPリクエストと同様で、通信に関する補足情報を伝えます。
<h4>ボディ</h4>
メインの部分です。<br />HTMLファイルを要求したならHTMLファイル、画像ファイルを要求したなら画像ファイル、CSSファイルを要求したならCSSファイルの部分となります。
<code class="http(response) dummy">
	HTTP/1.1 200 OK
	Server: nginx
	Date: Sun, 22 May 2022 11:52:25 GMT
	Content-Type: text/html; charset=UTF-8
	Connection: keep-alive
	Expires: Thu, 19 Nov 1981 08:52:00 GMT
	Cache-Control: no-store, no-cache, must-revalidate
	Pragma: no-cache
	X-XSS-Protection: 1; mode=block
	X-Content-Type-Options: nosniff
	Content-Length: 6039

		<span class="red">&lt;!DOCTYPE html&gt;
		&lt;html lang="ja"&gt;
		&lt;head&gt;
			&lt;meta charset="utf-8" /&gt;
			&lt;meta name="viewport" content="width=device-width,initial-scale=1" /&gt;
			&lt;meta name="format-detection" content="email=no,telephone=no,address=no" /&gt;
			&lt;meta name="keywords" content="http,koko-campus,ここキャンパス,ココキャンパス,ここ,ココ,koko" /&gt;
			&lt;meta name="author" content="koko" /&gt;
			&lt;title&gt;http&lt;/title&gt;</span>
</code>
見覚えのある方が大半だと思います。
<?php footer(); ?>