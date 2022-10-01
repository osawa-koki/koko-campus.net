<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>cookie</h2>
既にHTTPヘッダの授業で説明済みですが、もう一度簡単に説明します。<br />HTTP通信はステートレスで行われます。<br />ステートレスとは状態がないことを意味し、リクエストに対してレスポンスが返されてそこで通信は一度終了します。<br /><br />もう一度リクエストを行った場合は、サーバはクライアントをその前にそのクライアントに対して行った処理を識別できません。
<img src="../pics/cookie.png" alt="cookie" />
これを克服するために、クライアントからのリクエストに対して発行するレスポンスに「cookie」を発行させるコマンドを埋め込みます。<br /><br />これを受けてブラウザはサーバとの秘密の文字列(cookie)をHTTPヘッダにセットして、以降の当該サーバとの通信を行います。<br /><br />サーバはそのcookie情報を用いてクライアントを識別します。
<div class="separator"></div>
実際のところ、RESTと呼ばれるwebアーキテクチャはステートレスを採用しているため、cookieによって状態を疑似的に再現することは想定していません。<br /><br />したがって、cookieに関する規定も長い間設定されず、ベンダが独自に設定していたため複数の仕様が存在します。<br />代表的な仕様は以下の4つです。
<ul>
	<li>Netscape社による仕様</li>
	<li>RFC2019</li>
	<li>RFC2965</li>
	<li>RFC6265</li>
</ul>
現在使用されているcookieはnetscapeが独自に設定したものが多いため、このページでもこちらを想定して説明します。
<h2>cookie属性</h2>
HTTPヘッダに設定されるcookie関連ヘッダは2つあります。
<ul>
	<li>Set-Cookie</li>
	<li>Cookie</li>
</ul>
<table>
	<thead>
		<tr>
			<th width="50%">Set-Cookie</th>
			<th width="50%">Cookie</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>サーバからクライアントへのレスポンスにセットされます。<br />ブラウザにcookieをセットするように指示します。</td>
			<td>クライアントからサーバへのリクエストにセットされます。<br />ブラウザからサーバにcookieを送信する際に使用します。</td>
		</tr>
	</tbody>
</table>
<h2>Set-Cookie属性</h2>
サーバからクライアントへのレスポンスにセットされます。<br />ブラウザにcookieをセットするように指示します。<br /><br />cookieがセットされていない場合にのみセットされます。<br /><br />試しに、僕のプロフィール画面で確認してみましょう♪<br />cookieがセットされていない状態でのリクエストに対して設定され、cookieがセットされているリクエストに対しては設定されていません。<br /><br />cookieを削除してもう一度リクエストを送ると、再度「Set-Cookie」が設定されます。
<img class="no-max" src="../pics/set-cookie.gif" alt="Set-Cookie" />
<h3>Set-Cookie属性</h3>
「Set-Cookie」では以下の属性が設定可能です。
<table>
	<tbody>
		<tr>
			<th>NAME=VALUE</th>
			<td>cookieの名前と値が「=」で結ばれてセットされます。</td>
		</tr>
		<tr>
			<th>expires=DATE</th>
			<td>cookieの有効期限がセットされます。</td>
		</tr>
		<tr>
			<th>path=PATH</th>
			<td>cookieが送信されるパスを指定します。<br />全てを対象にする場合には「/」とします。</td>
		</tr>
		<tr>
			<th>domain</th>
			<td>cookieを送信するドメインを設定します。<br />セキュリティ上の観点から発行したドメインだけを指定するべきです。<br />何も設定しないと発行したドメインのみを対象とします。</td>
		</tr>
		<tr>
			<th>Secure</th>
			<td>HTTPS通信が行われている場合にのみ、cookieを送信します。</td>
		</tr>
		<tr>
			<th>HttpOnly</th>
			<td>JavaScriptでcookieを操作できないようにします。<br />外部JSファイルを読み込んでいる場合には、不正にcookieを盗まれない用にHttpOnlyをオンに設定するべきです。</td>
		</tr>
	</tbody>
</table>
<?php
$dsn = 'mysql:dbname=koko;host=localhost;charset=utf8';
$user = "root";
$pw_db = "";
$dbh = new PDO($dsn, $user, $pw_db);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM my_pokemon WHERE nickname='ぴかちゃん'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$dbh = null;
$rec = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($rec);
?>






<?php footer(); ?>