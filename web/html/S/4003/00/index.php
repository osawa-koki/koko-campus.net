<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-05-10",
	"updated" => "2022-05-10"
);
head($obj);
?>
<h2>SQL Server</h2>
SQL Serverとはマイクロソフト社が1989年に開発したデータベースサーバで、主にWindows上で動作するデータベースサーバとして知られています。<br />データベースサーバと言えば、Oracleというイメージを持っている人も多いと思いますが、SQL Sevrverは大規模なシステムでも採用されることも多くあり、有名な例だと「NASDAQ」で採用されていることが挙げられます。<br /><br />利点としてはGUIで操作しやすいこと、開発元が同じであるWindowsと相性がいいことがあげられます。<br />また、マイクロソフトが展開している.NET FrameworkではSQL Serverを想定しているため、.NET Frameworkを使用したWebアプリを開発する際にはSQL Serverを使用することとなります。
<div class="separator"></div>
データベースサーバのシェアを紹介します。
<img src="../pics/シェア.jpg" alt="データベースサーバのシェア" />
<p><a href="https://news.mynavi.jp/techplus/article/20191203-931852/">マイナビテック</a>より。</p>
「オラクル」「MySQL」「SQL Server」の三強という感じです。<br />実際のところ、機能・性能はほとんど変わりませんが、SQL Serverは.NET Frameworkで使用する場合に使用されるという印象が強いです。
<h2>SQL Serverのインストール</h2>
では、早速インストールをしましょう♪<br />以下のリンクからインストーラをダウンロードして下さい。
<a href="https://www.microsoft.com/ja-jp/sql-server/sql-server-downloads?rtc=1" class="link to-sql_server">SQL Server</a>
Express版を選択してください。
<img src="../pics/sql-server_express-install.gif" alt="SQL Server" />
ダウンロードが完了したらインストーラを起動して、インストールを開始します。<br />特に設定は必要ありません。<br /><br />バージョンの設定では「基本」を選択して下さい。
<img src="../pics/インストール.gif" alt="インストール" />
<h2>SSMSのインストール</h2>
SQL Serverのインストールが完了したら次はSQL Server Management Studio(SSMS)をインストールします。<br />SSMSとはSQL Serverを管理することを目的とする開発環境です。<br />SQL Serverを用いて開発をする際の必需品ですので、とりあえずインストールしましょう♪<br /><br />以下のリンクからインストーラをダウンロード可能です。
<a href="https://docs.microsoft.com/ja-jp/sql/ssms/download-sql-server-management-studio-ssms?view=sql-server-ver15">SQL Server Management Studio</a>
「SQL Server Management Studio (SSMS) **.**.** の無料ダウンロード」と書いてあるところからダウンロードして下さい。<br />ダウンロードが完了したらそのまま起動してインストールを実行してください。<br /><br />インストールが完了したらパソコンを再起動するようにお願いされます。<br />斜に構えずに再起動してください。<br /><br />再起動が終わったら、SSMSを起動してください。<br />スタートメニューで「SSMS」と検索したら表示されます。<br /><br />SSMSを起動したら以下の画面が表示されると思います。
<img src="../pics/ssms.gif" alt="SSMS" />
そのまま「Connect」を押せばok!ですが、一応それぞれの意味について説明します。
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>Server type</th>
				<td>サーバの種類(使用用途)を指定します。<br />「Database Engine」を選択して下さい。</td>
			</tr>
			<tr>
				<th>Server name</th>
				<td>サーバの名前を指定します。<br />「コンピュータ名\SQLEXPRESS」とします。<br />コンピュータ名は「設定 &gt; システム &gt; バージョン情報」のデバイス名の部分に記載されています。</td>
			</tr>
			<tr>
				<th>Authentication</th>
				<td>
					データベースサーバにアクセスするには認証が必要ですが、大きく2通りあります。
					<ul>
						<li>windows認証</li>
						<li>SQL認証</li>
					</ul>
					<div class="separator"></div>
					windows認証ではwindows(OS)にログインしているユーザとしてデータベースにアクセスします。<br />windowsを開発しているマイクロソフトが提供しているデータベースサーバであるからこそ実現可能な技術です。<br /><br />通常はwindows(OS)での権限とデータベース用の権限は同一であるので、windwos認証を使用します。
					<div class="separator"></div>
					例外的にwindows(OS)とデータベースアクセス用の権限が異なっている場合には通常のSQLを用いて認証を行います。
				</td>
			</tr>
		</tbody>
	</table>
</div>
ログインに成功したら試しにSQLを実行してみましょう♪<br /><br />左上の「New Query」を押すとSQLを書くフィールドが表示されます。<br />ここにSQLを書きます。<br /><br />今回はデータベース名を表示するSQLを実行してみましょう♪<br />以下のように書きます。
<code class="sql">
	SELECT
		NAME,
		DATABASE_ID,
		CREATE_DATE
	FROM
		SYS.DATABASES;
</code>
<img class="no-max" src="../pics/クエリの発行.gif" alt="クエリの発行" />
これでデータベース一覧が表示されました。<br /><br />今度はSQLを2つ同時に実行してみましょう♪<br />「使用するデータベースの選択」+「テーブル一覧の表示」を実行します。<br /><br />先ほど表示したデータベースの中に「master」があったので、このデータベースに属するテーブル一覧を表示します。
<code class="sql">
	USE master;
	SELECT * FROM sys.objects;
</code>
<img class="no-max" src="../pics/クエリの発行(2).gif" alt="クエリの発行" />
<h2>sqlcmd</h2>
sqlcmdとはコマンドプロンプトからSQLを実行するためのコマンドです。<br />コマンドプロジェクトを起動して以下のコマンドを実行することでsqlcmdモードに入ることができます。
<code class="shell">
	sqlcmd
</code>
<img src="../pics/sqlcmd.gif" alt="sqlcmd" />
「1&gt;」と表示されますが、この部分にSQLを書きます。<br />SQL文を実行する際には「go」と書きます。
<code class="sql">
	 -- SQL文
	 -- SQL文
	 -- SQL文
	go
</code>
sqlcmdモードから離脱するには以下のコマンドを実行します。
<code class="sql">
	exit
</code>
<img src="../pics/sqlcmd-exit.gif" alt="sqlcmd" />
<div class="separator"></div>
試しに、先ほど実行したようにデータベース一覧を表示するSQLを実行してみましょう♪
<code class="sql">
	SELECT
		NAME,
		DATABASE_ID,
		CREATE_DATE
	FROM
		SYS.DATABASES;
	go
</code>
<img src="../pics/sqlcmd-実行.png" alt="sqlcmd" />
<h2>SQL Server構成マネージャー</h2>
SQL Server構成マネージャーとは<a href="https://docs.microsoft.com/ja-jp/sql/relational-databases/sql-server-configuration-manager?view=sql-server-ver15">公式ページ</a>によると、「SQL Serverに関連付けられているサービスを管理し、SQL Serverで使用されるネットワークプロトコルを構成し、SQL Serverクライアントコンピューターからネットワーク接続構成を管理するためのツール」と説明されています。<br /><br />簡単に説明すれば、SQL Serverの通信設定担当アプリです。<br />SQL Serverに何らかの理由でアクセスできない不具合が発生した場合はこのツールを利用して原因を追求・修正します。<br /><br />まずは、スタートメニューを開いて「SQL Server」と検索してください。<br />「SQL Server 20** 構成マネージャー」と表示されますので、これを起動して下さい。<br /><br />左側に表示されている「SQL Serverのサービス」を選択して「SQL Server(SQLEXPRESS)」が実行中になっているかを確認して下さい。
<img src="../pics/sql-server-configuration-management.gif" alt="SQL Server構成マネージャー" />
「状態」が「実行中」になっていればok!です。<br />僕のプログラムだと「状態」ではなく「都道府県」となっていますが、これは「状態」を意味する「state」が「都道府県」と誤訳されたものだと考えられます。笑笑<br /><br />これが実行中になっているにも関わらず、SQL Serverが正常に動作しない場合はPCを一度再起動するか、「SQL Server(SQLEXPRESS)」を右クリックして一度停止させてからもう一度実行させて下さい。<br />再起動でも良さそうですが、僕のPCだとそれだとたまにバグるので「一時停止 &rarr; 再開」をするようにしています。<br />これで動作するハズです。
<h2>サービス</h2>
特にSQL Serverに関連する事項ではありませんが、windowsに関する重要な内容ですのでここで説明します。<br /><br />サービスとはwindows OSにおいてバックグラウンドで操作するプログラムを言います。<br />バックグラウンドで動作する性質上、ユーザがそのプログラムの実行を認識することはありません。<br /><br />SQL Serverもサービスに該当するため、実行中かどうかをユーザが判断することはほとんどありません。<br />これを確認するには専用のプログラムから行う必要があります。<br /><br />先ほどはSQL Server構成マネージャーから行いましたが、windwowsで動作している性質上、サービスからも確認できます。<br />ということで、サービスをチェックしましょう♪<br /><br />スタートメニューから「サービス」と検索して下さい。
<img class="no-max" src="../pics/サービス.gif" alt="サービス" />
こんな感じでサービスが表示されます。<br /><br />ここから「一時停止 &rarr; 再開」で再起動ができます。
<?php footer(); ?>