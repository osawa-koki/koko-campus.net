<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-03",
	"updated" => "2022-02-03"
);
head($obj);
?>
<h2>インポート・エクスポート</h2>
これまでは、データベースにデータを挿入するためにはINSERTメソッドでひとつずつ行っていましたね。<br />しかしながら、これでは不便な場合があります。<br /><br />例えばエクセルで管理していたデータを一括してデータベースに移行する場合などや、データベースで管理していたデータを他のデータベースに移行する場合などにINSERTメソッドを用いるのは実用的ではありません。<br /><br />ここでは、こういった大量のデータを一括してインポート・エクスポートする方法を学びます。
<h2>csvファイル</h2>
「Comma Separated Value」ないしは「Character Separated Value」の略で、カンマで、ないしは他の特殊文字で区切られたファイルのことを言います。<br />例えば以下のようなファイルです。
<code class="csvファイル">
	2022-02-01, python, 2
	2022-02-02, javascript, 3
	2022-02-03, rust, 1
</code>
上はIT関連の勉強の記録です。<br />行は改行文字で、列はカンマで区切っています。<br /><br />データベースのテーブルに格納されているデータは実体としてはcsvファイルのような行と列のデータになります。<br />似たようなファイルにエクセルで使用するxlsxファイルがありますが、こちらはセルの色や書体などのその他の情報を含んでいるため使用できません。<br />エクセルファイルをデータベースに移行する場合には一度csvファイルへエクスポートしてから使用する必要があります。<br /><br />データベースのデータを外部とやり取りする際にはcsvファイルとして行う必要があります。
<h2>インポートモード</h2>
セキュリティの観点から通常のMySQLへのログインではcsvファイルのインポートができなくなりました。
<p class="r">公式サイトの説明は<a href="https://dev.mysql.com/doc/refman/5.6/ja/load-data-local-security.html">こちら</a>。</p>
ファイルをインポートするためにはインポートモードでログインをする必要があります。<br /><br />以下のいずれかの方法でログインします。
<code class="shell">
	mysql --user=root --password --enable-local-infile
</code>
<code class="shell">
	mysql --user=root --password --local_infile=1
</code>
これでログインすればインポートモードがオンになっています。
<div class="separator"></div>
ログイン後に以下のいずれかのコマンドを実行します。
<code class="sql">
	SET PERSIST local_infile=1;
</code>
<code class="sql">
	SET GLOBAL local_infile=1;
</code>
「1」の部分は「on」でもok!です。<br />これで完了です。
<h2>インポート</h2>
では、実際にファイルをインポートしてみましょう♪<br />以下のsql文を実行します。
<code class="dummy sql">
	LOAD DATA LOCAL INFILE "ファイルへのパス"
	INTO TABLE テーブル名
	FIELDS TERMINATED BY ','
	LINES TERMINATED BY '\r\n'
	OPTIONALLY ENCLOSED BY '"'
	SET カラム = nullif(カラム,"");
</code>
ひとつずつ説明していきます。
<h3>LOAD DATA LOCAL INFILE</h3>
読み込むファイルへのパスを指定します。<br />パスに全角文字を含めることはできません。<br />また、windows環境下では「\(バックスラッシュ/円マーク)」は「/(スラッシュ)」にします。
<h3>INTO TABLE</h3>
挿入先のテーブルを指定します。<br />予め、インポートするデータ構造にあったテーブルを作成しておく必要があります。
<h3>FIELDS TERMINATED BY</h3>
行(横方向)の区切り文字を指定します。<br />通常は「,(カンマ)」です。<br />それ以外にも「\t(タブ文字)」や「&nbsp;(スペース)」を指定することもあります。
<h3>LINES TERMINATED BY</h3>
列(縦方向)の区切り文字を指定します。<br />windowsのデフォルトは「\r\n(キャリッジリターンラインフィールド)」、UNIXのデフォルトは「\n(ラインフィールド)」、MacOSのデフォルトは「\r(キャリッジリターン)」です。<br />エディタで変更することもできます。
<h3>OPTIONALLY ENCLOSED BY</h3>
省略可能です。<br />各データの囲み文字を指定します。<br /><br />例えば「10,000」というデータをそのまま書くと、数字の途中にある「,(カンマ)」がcsvファイルの区切り文字として扱われてしまうので、データを「"(ダブルクォーテーション)」などで区切ることでこれを防ぎます。
<h3>SET</h3>
これも省略可能です。<br />インポートしたcsvファイルに欠損があった場合は通常は「""(空白文字)」で埋められます。<br /><br />これをNULLとして処理するように設定します。
<div class="separator"></div>
では、初代の技マシン一覧が格納されたcsvファイルをインポートしてみます。<br />今回インポートしたファイルのダウンロードは<a href="技マシン(初代).csv" download="技マシン(初代).csv">こちら</a>。<br /><br />最初にインポートするテーブルを作成します。
<code class="sql">
	CREATE table 技マシン (
		番号 INTEGER,
		名前 VARCHAR(10),
		タイプ VARCHAR(5),
		形態 VARCHAR(5),
		威力 INTEGER,
		命中率 INTEGER,
		PP INTEGER,
		PRIMARY KEY (番号)
	);
</code>
次に実際にファイルをデータベースにインポートします。
<code class="sql">
	LOAD DATA LOCAL INFILE "C:/waza.csv"
	INTO TABLE 技マシン
	FIELDS TERMINATED BY ','
	LINES TERMINATED BY '\r\n'
	SET 威力 = nullif(威力,"");
</code>
<img src="../pics/インポート.png" alt="インポート" />
では結果を確認してみましょう♪
<img src="../pics/技マシンのインポート.png" alt="インポート" />
完璧ですね♪
<h3>インポートの注意点</h3>
インポートするファイルに関して以下の点に注意してください。
<ul>
	<li>文字コードはutf-8に</li>
	<li>パスは半角英数字のみ</li>
</ul>
<h2>エクスポートモード</h2>
今度は逆にデータベースに格納されているデータをcsvファイルにエクスポートしたいのですが、エクスポート先のディレクトリはセキュリティ上の観点からデフォルトでは制限されています。<br />最初にエクスポートが許可されているディレクトリを確認しましょう♪<br />以下のコマンドを実行します。
<code class="sql">
	SELECT @@secure_file_priv;
</code>
<img src="../pics/secure_file_priv.png" alt="secure_file_priv" />
ここに表示されているディレクトリにエクスポートするのであれば、特に設定なくエクスポートできます。<br />新たにエクスポートできるディレクトリを追加するには「C:\ProgramData\MySQL\MySQL Server 8.0\my.ini」ファイルを編集します。
<p class="r">「8.0」の部分はバージョンによって変わります。<br />また、インストール時に設定を変更した場合はパスが異なります。</p>
<img src="../pics/my-ini.png" alt="my.ini" />
このファイルに以下のテキストを付け加えます。
<code class="my-dot-ini">
	secure-file-priv = ""
</code>
<img src="../pics/my-ini(書き換え).png" alt="my.ini" />
どこにでもエクスポートしてok!って意味です。<br />具体的にパスを書いてエクスポート先ディレクトリを設定してもok!です。
<div class="separator"></div>
この設定はセキュリティの観点からオススメできません。<br />原則としてデフォルトで許可されているディレクトリに出力するべきです。
<h2>エクスポート</h2>
では、実際にエクスポートしてみましょう♪<br />通常のSELECT文の後に以下のsql文を付け加えます。
<code class="sql">
	INTO OUTFILE '出力ファイルパス'
	FIELDS TERMINATED BY ','
	LINES TERMINATED BY '\r\n'
	OPTIONALLY ENCLOSED BY '"';
</code>
INTO OUTFILEで出力先のファイルのパスを指定します。<br />それ以外はファイルのインポート時の設定と同じです。
<div class="separator"></div>
では、先ほどインポートした技マシンデータから命中率が100である技をSELECT文で検索して、その結果を出力しましょう♪
<code class="sql">
	SELECT *
	FROM 技マシン
	WHERE 命中率 = 100
	INTO OUTFILE 'C:/ProgramData/MySQL/MySQL Server 8.0/Uploads/absolutely-hit.csv'
	FIELDS TERMINATED BY ','
	LINES TERMINATED BY '\r\n';
</code>
<img src="../pics/エクスポート(失敗).png" alt="エクスポート" />
NULLの値が「\N」として出力されていますね、、、<br />これを防ぐためにはSELECT文でNULLを判定して空白文字等に置き換える処理をする必要があります。<br />NULLの可能性があるのは威力ですので、これがNULLなら「''(空文字)」の置換します。
<code class="dummy sql">
	SELECT 番号, 名前, タイプ, 形態, IFNULL(威力, ''), 命中率, PP
	FROM 技マシン
	WHERE 命中率 = 100
	INTO OUTFILE 'C:/ProgramData/MySQL/MySQL Server 8.0/Uploads/absolutely-hit.csv'
	FIELDS TERMINATED BY ','
	LINES TERMINATED BY '\r\n';
</code>
<img src="../pics/エクスポート(成功).png" alt="エクスポート" />
これでうまくエクスポートできましたね♪
<h2>xlsxからcsvへ</h2>
余談ですが、、、<br />エクセルのデータをcsvにエクスポートする方法を紹介します。<br /><br />「ファイル &gt; エクスポート &gt; ファイルの種類の変更 &gt; CSV」を選択します。
<img src="../pics/xlsx-to-csv.gif" alt="エクセルのcsvエクスポート" />
<h3>注意点</h3>
エクセルで使用される文字コードが「ANSI」であるのに対してMySQLでは「UTF-8」を使用するため、csvエクスポート後に文字コードを「UTF-8」に変更する必要があります。
<?php footer(); ?>