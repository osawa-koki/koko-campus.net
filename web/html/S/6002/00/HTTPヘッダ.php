<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>ヘッダ</h2>
HTTPヘッダについて覚えていますか???<br />簡単に説明すると送信するデータに対する補足情報です。<br /><br />HTTPの基本性質の授業では以下のようなHTTPヘッダを確認しました。
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
なんだか色々な情報がやり取りされていますね♪<br /><br />全て覚える必要はありません。<br /><br />以下に列挙するものだけでok!です。
<ul>
	<li class="red">Cache-Control</li>
	<li>Connection</li>
	<li>Date</li>
	<li>Accept</li>
	<li>Accept-Charset</li>
	<li>Accept-Encoding</li>
	<li>Accept-Language</li>
	<li>Host</li>
	<li class="red">Set-Cookie</li>
	<li>Referer</li>
	<li>User-Agent</li>
	<li>Location</li>
	<li>Content-Type</li>
	<li>Expires</li>
	<li>Last-Modified</li>
</ul>
<img src="../pics/header.png" alt="HTTPヘッダ" />
赤く書いた「Cache-Control」と「Set-Cookie」は非常に大切です。<br />しかも、とっても複雑で理解しずらいです、、、<br /><br />がんばって覚えましょう♪
<h2>ヘッダの基本</h2>





<h2>Cache-Control</h2>
キャッシュに関する制御を指定します。<br />例えば、キャッシュして欲しくないページにはキャッシュをしないように指示したり、反対に画像などのキャッシュしてほしいデータにはキャッシュするように指示したり、、、<br /><br />「Cache-Control」ヘッダには以下のディレクティブ(コマンド/指示)を設定することができます。
<table>
	<caption>リクエスト</caption>
	<tbody>
		<tr>
			<th>no-cache</th>
			<td>サーバへキャッシュの確認を強制<br />「no」とあることから、キャッシュを禁止しているような感じがしますが、禁止ではなく「確認を強制」です。</td>
		</tr>
		<tr>
			<th>no-store</th>
			<td>キャッシュ禁止</td>
		</tr>
		<tr>
			<th>max-age</th>
			<td>キャッシュの有効期限を設定します。</td>
		</tr>
	</tbody>
</table>
<table>
	<caption>レスポンス</caption>
	<tbody>
		<tr>
			<th>public</th>
			<td>そのキャッシュを他のユーザに対しても使用を許可します。</td>
		</tr>
		<tr>
			<th>private</th>
			<td>特定のユーザに対してのみキャッシュを使用することを許可します。</td>
		</tr>
		<tr>
			<th>no-cache</th>
			<td>キャッシュを使用する際に有効性の確認を強制します。<br />「no」とありますが、キャッシュを禁止しているわけではないことに注意して下さい。</td>
		</tr>
		<tr>
			<th>max-age</th>
			<td>キャッシュの有効期限を設定します。</td>
		</tr>
	</tbody>
</table>
キャッシュに関しては非常に複雑ですが、これを使いこなせればUX(ユーザの満足度)向上に大いに貢献します。<br />最初のうちは、セキュリティのために必要な知識だけを取得して、ある程度の知識レベルまで到達したらUX向上のための知識を習得しましょう♪
<h2>Connection</h2>
現在の転送が完了した後も、ネットワークコネクションを維持するかを制御します。<br />通常はそのままコネクションを維持するため、「keep-alive」としますが、コネクションを終了するには「close」を指定します。
<h2>Date</h2>
HTTPメッセージを生成した日付時刻を表します。<br /><a href="https://datatracker.ietf.org/doc/html/rfc1123">RFC1123</a>によって指定された形式で日付時刻を表します。<br /><br />「Mon, 23 May 2022 12:00:00 GMT」という感じです。<br />「GMT」とは「Greenwich Mean Time」のことで世界の基準となる時間のことです。<br /><br />コンピュータの世界ではこれを採用しますが、なんだかイヤダナって方は「+0000」という感じで、タイムゾーンを指定した時刻表記も可能です。<br /><br />日本の場合は「JST」で「GST」に9時間たしたものですので「+0900」となります。<br />「Mon, 23 May 2022 21:00:00 +0900 (JST)」ですね♪
<h2>Accept</h2>
クライアントがサーバに対して、処理可能なデータのタイプを指定します。<br />データタイプは「タイプ/サブタイプ」と表現します。<br />タイプとサブタイプの種類には以下のものがあります。
<table>
	<thead>
		<tr>
			<th>タイプ</th>
			<th>サブタイプ</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>text</th>
			<td>
				<ul>
					<li>plain</li>
					<li>html</li>
					<li>css</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>application</th>
			<td>
				<ul>
					<li>xml</li>
					<li>xhtml+xml</li>
					<li>json</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>image</th>
			<td>
				<ul>
					<li>jpeg</li>
					<li>gif</li>
					<li>png</li>
					<li>svg+xml</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>video</th>
			<td>
				<ul>
					<li>mp4</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>font</th>
			<td>
				<ul>
					<li>ttf</li>
					<li>otf</li>
					<li>woff</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>
例えば、HTMLデータを受け付ける場合には「text/html」、jsonファイルを受け付ける場合には「application/json」、jpegファイルを受け付ける場合には「image.jpeg」となります。
<div class="separator"></div>
表示するデータタイプに優先度を設定する場合には、「q=0.8」にように「q=」の後に設定します。<br />指定できる数値は「0.0～1.0」の間で、「1.0」が最も強くなります。<br /><br />「;(セミコロン)」の後に表記します。<br /><br />「text/html;q=1.0, text/xml;q=0.7」といった感じです。
<h2>Accept-Charset</h2>
受け付ける文字コードを指定します。<br />一般的には「UTF-8」を指定しますが、古いサイトでは「SJIS」を使用していることが稀にあります。<br /><br />こちらも、「q=0.7」のように優先度を指定することが可能です。
<h2>Accept-Encoding</h2>
受け付けるコンテンツコーディングを指定します。<br />コンテンツコーディングとはデータを圧縮することを言い、以下の方法があります。
<ul>
	<li>gzip</li>
	<li>compress</li>
	<li>deflate</li>
	<li>identity</li>
</ul>
<img src="../pics/accept-encoding.gif" alt="Accept-Encoding" />
<h2>Accept-Language</h2>
受け付ける言語を指定します。
<img src="../pics/google-home.gif" alt="Accept-Language" />
例えば、上の画像を見てください。<br />「https://www.google.com/」にアクセスすると、日本語用のページが表示されますが、どうして僕が日本語用のページを欲しているって分かったのでしょうか???<br /><br />答えは、ヘッダに隠されています。
<img src="../pics/accept-language.gif" alt="Accept-Language" />
できれば「ja(日本語)」で、それが無かったら「en-US(アメリカ英語)」で、それもなかったら「en(イギリス英語)」でヨロッ!!!
<h2>Host</h2>
リクエストしたリソースのインターネットホストとポート番号を伝えます。<br />サーバ君、自分のことぐらい分かってよ、、、<br />って思う方もいるかと思いますが、仮想化技術などを用いて複数の論理サーバを一台の物理サーバで運用している場合などではサーバに対するアクセスが混同してしまいます。<br /><br />そのような場合に使用されます。
<h2>Set-Cookie</h2>
HTTP通信はステートレス(状態がない)ことが特徴にあげられます。<br />ステートレスとは、一度きりの通信であることを意味し、リクエストを送信してレスポンスを受信したら通信は終了することを言います。<br /><br />しかしながら、これでは不便な場合があります。<br />例えば、とあるECサイトで買い物をすることを想定してください。<br /><br />リクエストとしてIDとパスワードを送信します。<br />サーバをこれをデータベースからチェックして成功したら、マイページをレスポンスとして返します。<br /><br />これで終了です。<br /><br />ユーザがその画面から商品を買い物かごに追加するリクエストを送信する際には、サーバはユーザを特定できないため、もう一度IDとパスワードを送信する必要があります。<br /><br />ログインが完了した後に、他の処理をする際にも、もう一度、、、<br /><br />大変ですよね、、、
<img src="../pics/cookie.png" alt="cookie" />
この問題を克服する技術が「cookie」です。<br /><br />データにユーザを識別用のランダムな文字列をセットしてこれをもとにユーザを識別します。<br /><br />cookieは非常に重要ですので、また次のページで詳しく説明します。
<h2>Referer</h2>
正確には「Referrer」となるはずですが、「Referer」となっています。<br />ITの世界では同じ文字を二回重ねて書くのを嫌う傾向があるのでそれによるものなのでしょうか、、、<br /><br />リクエストが発生した元のリソースのURIを伝えます。<br />URL欄に直接打ち込んでリクエストをかけた場合や、ブックマークなどから直接リクエストを送信した場合には送られません。
<h2>User-Agent</h2>
ブラウザの情報を伝えます。<br />僕が現在使用しているブラウザの「User-Agent」を紹介しますね♪
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>chrome</th>
				<td>Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36</td>
			</tr>
			<tr>
				<th>edge</th>
				<td>Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36 Edg/101.0.1210.53</td>
			</tr>
			<tr>
				<th>firefox</th>
				<td>Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0</td>
			</tr>
		</tbody>
	</table>
</div>
「chrome」なのに「Mozilla」「Apple」「Safari」っていう文字列が入っているってどうして???<br />「edge」なのに「Mozilla」「Apple」「chrome」「Safari」って文字列が入っているのはどうして???<br /><br />罠???<br /><br />「chrome」と「edge」なんてほとんど同じですよ、、、<br /><br />本当に困りますよね、、、<br /><br />インターネットで色々調べてみて下さい。<br />プログラマの不平不満がたくさんでてきます。
<h2>Location</h2>
「3XX」系で別ページへリダイレクトさせる場合に、リダイレクト先を指定します。<br />ページ遷移を制御する上で「Location」ヘッダは必要不可欠ですので、是非マスターしましょう♪<br /><br />といっても、「Location: 遷移先URL」と書くだけですが、、、
<h2>Content-Type</h2>
サーバからクライアントに送信するデータの種類を示します。<br />データタイプには「Accept」で指定するデータタイプと同様に、「タイプ/サブタイプ」と指定します。<br /><br />「Accept」と異なる点は、使用する文字コードを「;(セミコロン)」で区切って表現することです。<br /><br />「text/html; charset=UTF-8」と言った感じです。<br />まあ、「Accept」でもこのように記述することも可能ですが、、、
<h2>Expires</h2>
リソースの有効期限を設定します。<br />キャッシュサーバ等でデータをキャッシュする際に、そのキャッシュ機能を制御します。<br /><br />「Cache-Control」の「max-age」ディレクティブとほとんど同様の働きをします。<br />両方が設定されている場合には「max-age」が優先されます。<br /><br />「Expires」についてはキャッシュのページでより詳細に説明します。
<h2>Last-Modified</h2>
リソースが最後に更新された日時を伝えます。<br />こちらもキャッシュ制御を行う際に使用されることが多いです。
<?php footer(); ?>