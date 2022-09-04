<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-03",
	"updated" => "2022-02-03"
);
head($obj);
?>
<h2>データ制御言語</h2>
「data control language」で、「DCL」と略されます。<br />データベースに対するアクセス制御を定義します。<br /><br />権限を与える「GRANT」や権限を剥奪する「REVOKE」が該当します。<br /><br />このページはデータ制御言語というタイトルですが、ユーザ管理全般について説明します。<br />データ制御言語の主な目的はユーザの管理ですので、、、
<h2>ユーザの管理</h2>
まずは、ユーザの管理方法について学びましょう♪<br />以下の3つを説明します。
<ul>
	<li>ユーザ一覧の表示</li>
	<li>ユーザの作成</li>
	<li>ユーザの削除</li>
</ul>
<h3>ユーザ一覧の表示</h3>
以下のsql文を実行します。
<code class="sql">
	SELECT user, host
	FROM mysql.user;
</code>
<img src="../pics/ユーザ一覧の表示.png" alt="ユーザ一覧の表示" />
<h3>ユーザの作成</h3>
以下のsql文を実行します。
<code class="sql">
	CREATE USER 'ユーザ名'@'ホスト名'
	IDENTIFIED BY 'パスワード';
</code>
<p class="r">ユーザ名とホスト名は名前に特殊文字を含まなければ「'(シングルクォーテーション)」で囲まなくてもok!です。</p>
ではkokoというユーザを追加してみましょう♪<br />パスワードは「koko0123」とします。
<code class="sql">
	CREATE USER 'koko'@'localhost'
	IDENTIFIED BY 'koko0123';
</code>
<img src="../pics/ユーザの追加.png" alt="ユーザの追加" />
<div class="separator"></div>
別のユーザでログインする場合には以下のコマンドでMySQLにログインします。
<code class="shell">
	mysql --user=ユーザ名 --password
</code>
<h3>ユーザの削除</h3>
以下のsql文を実行します。
<code class="sql">
	DROP user 'ユーザ名'@'ホスト名';
</code>
<h2>権限</h2>
あるユーザが何をしていいかについての設定を言います。<br />例えば、ユーザAはデータベースXを変更してok!で、ユーザBはデータベースXを参照するだけok!で、、、<br />って感じです。<br /><br />権限に関しては以下の3つを学びましょう♪
<ul>
	<li>権限の確認</li>
	<li>権限の付与</li>
	<li>権限の剥奪</li>
</ul>
<h3>権限の確認</h3>
以下のsql文でユーザに与えられた権限を確認できます。
<code class="sql">
	SHOW GRANTS FOR 'ユーザ名'@'ホスト名';
</code>
では先ほど作成したkokoユーザとしてログインして権限を確認してみましょう♪
<code class="sql">
	SHOW GRANTS FOR 'koko'@'localhost';
</code>
<img src="../pics/koko権限確認.png" alt="権限の確認" />
なんかサッパリしていますね、、、<br /><br />今度はroot権限でログインして確認してみましょう♪<br />先ほど作成したユーザからはroot権限を確認できません。<br />一度ログアウトしてrootとしてログインしてください。
<code class="sql">
	SHOW GRANTS FOR 'root'@'localhost';
</code>
<img src="../pics/root権限確認.png" alt="権限の確認" />
な～～～んかたくさんありますね、、、<br />rootは最強のユーザですから全てが許可されています。<br />
<h3>権限の付与</h3>
以下のsql文でユーザに権限を付与します。
<code class="sql">
	GRANT 権限 ON 範囲 TO ユーザ名;
</code>
権限とは「SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, ...」のことです。<br />全て付与する場合はALLとします。<br /><br />範囲とは全体レベル・データベースレベル・テーブルレベルの3種類あります。
<p class="r">カラムレベルについてはほとんど用いないため省略。</p>
<table>
	<caption>権限の範囲</caption>
	<tbody>
		<tr>
			<th>全体レベル</th>
			<td>*.*</td>
		</tr>
		<tr>
			<th>データベースレベル</th>
			<td>データベース名.*</td>
		</tr>
		<tr>
			<th>テーブルレベル</th>
			<td>データベース名.テーブル名</td>
		</tr>
	</tbody>
</table>
「*」は全てを意味するワイルドカードです。<br />全体レベルでしたら「全て.全て」という意味で、データベースレベルでしたら「データベース.全て」という意味です。
<div class="separator"></div>
では、kokoユーザに「越谷の天気」テーブルへのSELECTと、「kokoのポケモン」テーブルへの4操作(INSERT, UPADTE, DELETE, SELECT)権限を追加しましょう♪<br />両方ともkokoデータベースに属しています。
<code class="sql">
	GRANT INSERT ON koko.越谷の天気 TO koko@localhost;
	GRANT INSERT, UPDATE, DELETE, SELECT ON koko.kokoのポケモン TO koko@localhost;
</code>
<img src="../pics/権限の付与.png" alt="権限の付与" />
権限が付与されているのが確認できますね♪
<h3>権限の剥奪</h3>
ユーザから権限を剥奪するには以下のように書きます。
<code class="sql">
	REVOKE 権限 ON 範囲 FROM ユーザ名;
</code>
では、先ほど付与したkokoに対する権限のうち、「kokoのポケモン」テーブルへのDELETE権限を剥奪しましょう♪
<code class="sql">
	REVOKE DELETE ON koko.kokoのポケモン FROM koko@localhost;
</code>
<img src="../pics/権限の剥奪.png" alt="権限の剥奪" />
<div class="separator2"></div>
今までは最強のroot権限でログインしていましたが、これはセキュリティの観点から適切とは言えません。<br />ユーザにはその人が実行する処理に必要不可欠な権限のみを与えるべきです。
<h2>最後に</h2>
以上でSQL入門-ver1は終了です。<br />お疲れ様でした。<br /><br />さぁ、SQL-中級編へLet's GO!!!です♪
<a href="../../sql中級/branch" class="link-subject to-sql中級"></a>
<?php footer(); ?>