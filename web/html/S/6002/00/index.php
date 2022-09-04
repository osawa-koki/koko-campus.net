<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>web</h2>
HTTPについて説明する前に、webについて簡単に説明します。<br />なんとなく使用しているweb、意味を説明できますか???<br /><br />まあ、簡単に説明すれば以下の3つの技術によって、情報を共有し合う複雑なネットワークのことを言います。
<ul>
	<li>HTTP</li>
	<li>URI</li>
	<li>HTML</li>
</ul>
どれも一度は目にしたことがある単語だと思います。<br /><br />それぞれの意義を説明します。
<table>
	<tbody>
		<tr>
			<th>HTTP</th>
			<td>情報を共有するための取り決め事(約束)です。</td>
		</tr>
		<tr>
			<th>URI</th>
			<td>情報の住所を表す識別子です。</td>
		</tr>
		<tr>
			<th>HTML</th>
			<td>情報を記述する方法(記法)です。</td>
		</tr>
	</tbody>
</table>
この3つから形成された情報共有ネットワークが「web」です。<br /><br />因みに、webって「蜘蛛の巣」って意味なんです。
<img src="../pics/web.gif" alt="web" />
蜘蛛の巣みたいに複雑に絡み合ったネットワークのことだと思ってください。<br /><br />似たような用語にインターネットがありますが、インターネットはより低い層でのネットワークことを言います。<br /><br />webはインターネットという技術を使用した情報交換技術ですので、HTTPについてより深く理解するにはインターネットに関する技術(TCP/IP)の知識が必要です。
<img src="../pics/webとインターネット.png" alt="webとインターネット" />
HTTPだけでは、情報を共有するネットワークは構築できません。<br />「+&alpha;」として「どのように情報を特定するか」「どのように情報を記述するか」を規格化する必要があります。<br /><br />それぞれ、「URI」と「HTML」が該当します。
<h3>URI</h3>
「Uniform Resorce Identifier」の略です。<br />「URL」だったら聞いたことがある人が多いと思います。<br /><br />URIはURLをカッコつけて呼んだものだと思ってok!です。<br />若干異なりますが、最初の理解としては許容範囲内です。<br /><br />URIはインターネット上の資源を特定するために使用されます。
<img src="../pics/uri.png" alt="URI" />
因みに、URIはHTTP専用の技術ではなく、ファイルを交換するためのプロトコルであるFTP、メールを送信するためのSMTPなどがあります。
<h3>HTML</h3>
「HyperText Markup Language」の略です。<br />ハイパーテキストとは、ハイパーなテキストのことです。<br /><br />単なる文字ではなく、画像やリンクなどを埋め込むことが可能なスゴイ文字のことです。
<img class="no-max" src="../pics/html.png" alt="HTML" />
単純な文字だけだと味気ないですからね、、、
<h3>HTTP</h3>
今回のメインテーマです。<br />「HyperText Transfer Protocol」の略で、HTML形式で書かれたデータを共有するための決まり事(規則)です。<br /><br />従来はHTMLの交換を目的としていましたが、現在ではCSS・JavaScriptファイル、画像・動画データ、XML形式やJSON形式のデータを交換する際にも使用されます。<br /><br />ブラウザ(safari・google chrome・microsoft edge・firefox・etc...)とサーバがやり取りをするためのルールです。
<div class="separator"></div>
こんな感じです。
<img src="../pics/http-html-uri.png" alt="HTTP URI HTML" />
<h2>HTTPのバージョン</h2>
HTTPは登場した頃からほとんど変わっていません。<br />今後も大幅に変わることはないでしょう。
<table>
	<tbody>
		<tr>
			<th>HTTP/0.9</th>
			<td>HTTPが正式な仕様書として作成される1990年以前のバージョンです。<br />現在使用されることはありません。</td>
		</tr>
		<tr>
			<th>HTTP/1.0</th>
			<td>
				1996年5月に策定された最初のHTTPの仕様書です。<br />25年以上前に策定された使用ですが、現在でも使用しているサーバもあります。
				<p><a href="http://ietf.org/rfc/rfc1945.txt">HTTP/1.0</a></p>
			</td>
		</tr>
		<tr>
			<th>HTTP/1.1</th>
			<td>
				現在最も主流なHTTPのバージョンです。<br />1.0バージョンに比べてコネクションの処理が簡素化され、より高速に動作します。
				<p><a href="http://ietf.org/rfc/rfc2068.txt">HTTP/1.1(RFC2068)</a></p>
				<p><a href="http://ietf.org/rfc/rfc2616.txt">HTTP/1.1(RFC2618)</a></p>
			</td>
		</tr>
		<tr>
			<th>HTTP/2.0</th>
			<td>テキスト形式ではなくバイナリ形式での通信をサポートしているため、より高速に動作します。</td>
		</tr>
		<tr>
			<th>HTTP/3.0</th>
			<td>To Be Continued...</td>
		</tr>
	</tbody>
</table>
mozillaが分かりやすく解説しているので、興味があれば参考にして下さい。
<a href="https://developer.mozilla.org/ja/docs/Web/HTTP/Basics_of_HTTP/Evolution_of_HTTP" class="link to-mozilla">MDN(HTTP)</a>
<h2>TCP/IP</h2>
「Transmission Control Protocol / Internet Protocol」の略で、インターネット技術を形成するプロトコルです。<br />HTTPとは直接関係のないプロトコルですが、HTTPはTCP/IP上で操作するという性質から若干の知識が必要です。
<h3>IP</h3>
いわゆるインターネットを形成するプロトコルです。<br />聞いたことがある人が大半だと思います。<br /><br />イントラネット(LAN)同士を結合して通信するためのプロトコルです。
<img src="../pics/ip.png" alt="IP" />
<h3>TCP</h3>
IPを使用した通信で、データが正しく送受信されていることを保証するためのプロトコルです。<br />具体的には、3ウェイハンドシェイクと呼ばれる仕組みを使用してデータの送信が正しく行われるようにします。
<img src="../pics/tcp.png" alt="TCP" />
この3ウェイハンドシェイクが成立しなければ、正しく通信が行えていないものとして通信をし直します。<br /><br />大量のデータの送受信を行うのに、毎回3ウェイハンドシェイクを行うとオーバーヘッドが大きくなるという問題があります。<br />HTTPでは、ひとつのページにCSS・JavaScript・画像ファイルなど、大量に送信するため、この問題が深刻となります。<br />そのため、パイプラインという技術を使用してひとつのTCPコネクションによって複数のデータの送受信が可能にしています。
<h2>fiddler</h2>
fiddlerとはPC上のHTTP通信を監視して、その情報を出力するためのプログラムです。<br />HTTPの勉強には実際に通信を監視してみるのが最適です。<br /><br />ということで、fiddlerをインストールしましょう♪
<a href="https://www.telerik.com/download/fiddler" class="link to-fiddler">fiddler</a>
適当なデータを入力してダウンロードを開始してください。<br /><br />ダウンロードが完了したらそのまま起動します。<br />デフォルトで使用する「8888」ポートが既に使用されていたら、他のランダムなポートを使用するかどうか聞かれますので、これは「はい」を選択して下さい。
<img class="no-max" src="../pics/fiddler-setup.gif" alt="fiddler" />
「Tool &rarr; Options」から「HTTPS」を選択して以下のように設定してください。
<img src="../pics/fiddler-http_setup.gif" alt="fiddler" />
これで、設定は完了ですと言いたいところですが、、、<br />これだと全ての通信を取得してしまうんです、、、<br /><br />HTMLで指定されているCSS・JavaScript・画像ファイルなど、全て表示してしまいます。
<img class="no-max" src="../pics/fiddler-unfiltered.gif" alt="fiddler" />
これだと見ずらいですので、HTMLだけを取得するようにフィルターを書けます。
<img class="no-max" src="../pics/fiddler-filtered.gif" alt="fiddler">
これで、ok!です。<br /><br />実際に、HTTP通信を監視する際には、対象の通信をクリックして「Inspectors」を選択して下さい。<br /><br />上がリクエストで、下がレスポンスです。<br /><br />HTTPの学習では取得するデータはそのまま(Row / 生)がいいので、これを選択します。
<img class="no-max" src="../pics/fiddler-inspectors.gif" alt="fiddler" />
<div class="separator"></div>
fiddlerのインストール後に何らかの不具合が発生した場合にはプロキシの設定が適切に行えていないことが想定されます。<br /><br />その場合には、まず「windowsキー」と「R」キーを同時に押して、「inetcpl.cpl」と入力して下さい。
<img src="../pics/inetcpl.gif" alt="inetcpl.cpl" />
プロキシの設定画面が表示されます。<br /><br />この画面で以下のように設定を「接続 &rarr; LANの設定 &rarr; LANにプロキシサーバーを使用する」からチェックを外して下さい。
<img src="../pics/inetcpl-reset.gif" alt="inetcpl.cpl" />
<?php footer(); ?>