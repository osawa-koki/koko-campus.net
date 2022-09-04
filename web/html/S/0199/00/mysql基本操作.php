<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-02",
	"updated" => "2022-02-02"
);
head($obj);
?>
<h2>MySQLの開始</h2>
MySQLサーバを起動するには以下のコマンドを実行します。<br />また、このコマンドは管理者権限で実行する必要があります。<br />コマンドプロンプトを起動する際に右クリックで「管理者として実行」を選択してください。
<code class="shell">
	net start mysql80
</code>
「mysql」の後の「80」はバージョンを表しています。<br />ここでは「8.0」を使用しているため「80」と書いています。<br />真ん中の「.(ドット)」は不要です。
<img src="../pics/net-start-mysql.gif" alt="mysql" />

<h2>MySQLへログイン</h2>
では次は先ほど起動させたMySQLにログインしましょう♪<br />以下のコマンドでログインします。
<code class="shell">
	mysql --user=root --password
</code>
パスワードが求められますので、先ほど設定したパスワードを入力して下さい。
<img src="../pics/mysql-login.gif" alt="mysql" />
rootとは管理者のことを指します。<br />ここでは練習のためrootでログインしますが、本番環境では必要最小限の権限でログインしてください。<br />この画面からsqlを入力します。<br /><br />これ以降のsqlはこのモードで実行します。<br />試しに以下のsqlを実行してみましょう♪
<code class="sql">
	SHOW databases;
</code>
これはデータベース一覧を表示するsql文です。<br />デフォルトだと以下の画面が表示されると思います。
<img src="../pics/show-databases.gif" alt="show database" />
データベース一覧が表示されました。<br />こんな感じでsql文を実行します。
<h2>MySQLからログアウト</h2>
操作が完了したらMySQLからログアウトしましょう♪<br />以下のコマンドを実行します。
<code class="shell">
	exit;
</code>
最後の「;(セミコロン)」を忘れないで下さい。<br />これを忘れてEnterを押すと単に改行されてしまい、命令文として認識されません。
<img src="../pics/mysql-logout.gif" alt="mysql" />
「Bye」と表示されれば、ログアウトが完了しています。
<h2>MySQLの終了</h2>
では最後に起動しているMySQLサーバを停止させます。<br />以下のコマンドを実行します。
<code class="shell">
	net stop mysql80
</code>
<img src="../pics/net-stop-mysql.gif" alt="mysql" />
<?php footer(); ?>