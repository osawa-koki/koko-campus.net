<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-05-10",
	"updated" => "2022-05-10"
);
head($obj);
?>
<h2>SQL Serverのインスタンス</h2>
非常にややここしいです。<br />また、オラクルDBにおけるインスタンスとかなり異なるため、オラクルDBを操作したことがある人は一度、知識をまっさらの状態に戻して説明を読んで下さい。<br /><br />まず、インスタンスとは接続対象となるデータベースサーバのことを言います。
<div class="quote">
	<div>サーバ</div>
	サーバというと、ハードウェアのサーバをイメージする人も多いと思いますが、それは誤りです。<br />サーバは「Server」の和訳であり、本来の意味は「奉仕する人・提供する人」です。<br />ここではデータベースに対するSQLを受けて何らかのデータを返すアプリケーション(ソフトウェア)というイメージを持ってください。
</div>
もっと簡単に説明すると、SQL ServerのインスタンスとはSQL Serverのサービス(常駐プログラム)そのもののことを指します。<br /><br />先ほどSSMSにログインする際に、Server nameを指定しましたね♪<br />「コンピュータ名\SQLEXPRESS」と設定したのを覚えていますか?<br /><br />このうち、「SQLEXPRESS」の部分がインスタンスに該当します。
<h3>インスタンスの種類</h3>
インスタンスは大きく以下の2種類に分類されます。
<ul>
	<li>既定のインスタンス</li>
	<li>名前付きインスタンス</li>
</ul>
<h4>既定のインスタンス</h4>
OSひとつにつき、ひとつだけ生成することができます。<br />一般的には専用のポート「1433」で動作するSQL Serverインスタンスと覚えてください。
<img class="no-max" src="../pics/既定のインスタンス.gif" alt="既定のインスタンス" />
既定のインスタンスにはサーバを「コンピュータ名」だけでアクセスできます。<br />僕の場合は「KOKO-VIVOBOOK15」だけでアクセス可能となります。<br />もしくは「localhost」としてもok!です。
<img class="no-max" src="../pics/既定のインスタンスの確認.gif" alt="既定のインスタンス" />
以下のSQL文でそれぞれ、サーバ名とサービス名(インスタンス名)を表示可能です。
<code class="sql">
	SELECT @@servername, @@servicename;
</code>
「@@servername」がサーバ名、「@@servicename」がサービス名(インスタンス名)となります。<br /><br />本当は、既定のインスタンスに対してアクセスした場合には「コンピュータ名」だけが表示されるハズなんですけど、バージョン2019からインスタンス名も同時に取得されます。<br /><br />僕のミスなのか仕様の変更なのか、、、<br /><br />まあ、とにかく既定のインスタンスとはデフォルトのSQL Serverなんだなと覚えて下さい。
<h4>名前付きインスタンス</h4>
ユーザがインストール時に同時に名前を付けたSQL Serverです。<br />こちらはひとつのOSに複数作成することが可能です。
<h2>ポートの設定</h2>
次にポートを設定しましょう♪<br />SQL Serverはデフォルトで「1433」番で設定することになっているため、これをSQL Server構成マネージャーから設定します。<br /><br />SQL Server構成マネージャーを開いて、「SQL Serverネットワークの構成 &gt; SQLEXPRESSのプロトコル」を選択して下さい。<br />右にいくつかの候補が表示されます。<br />名前付きパイプとTCP/IPが無効になっていると思います。<br />これを有効に設定します。<br /><br />右クリックして有効をクリックして下さい。<br /><br />次にTCP/IPをダブルクリックして下さい。<br />プロパティが表示されます。<br />IPアドレスタブの一番下にある「TCPポート」に「1433」を設定して「OK」をクリックして変更を確定します。<br /><br />以上です。
<img src="../pics/sqlexpressのプロトコル.gif" alt="SQL Serverポートの設定" />
<h2>データベースの作成</h2>
では、早速データベースを作成してみましょう♪<br /><br />左に表示されているデータベースを右クリックして「New databases」を選択します。<br />そのまま、データベース名を設定して完了です。<br /><br />ここでは「koko」というデータベースを作成します。<br />作成が完了したらデータベース一覧を表示して、実際にデータベースの作成に完了したか確認しましょう♪
<code class="sql">
	SELECT
		NAME,
		DATABASE_ID,
		CREATE_DATE
	FROM
		SYS.DATABASES;
</code>
<img class="no-max" src="../pics/データベースの作成.gif" alt="データベースの作成" />
<h3>使用するデータベースの選択</h3>
SQL文を実行する際に使用するデータベースを選択する必要がある時があります。<br />というか、選択する必要がある場合がほとんどです。<br /><br />使用するデータベースを選択するには以下のSQL文を実行します。
<code class="sql">
	USE データベース名;
</code>
他のDBMSと同じですね♪<br /><br />また、SSMSのGUI操作で指定することもできます。
<img src="../pics/データベースの選択.gif" alt="データベースの選択" />
因みにログイン時に選択されている「master」というデータベースはシステム全般に関わるデータを扱うためのデータベースです。<br />最初のうちは使用することはほとんどありません。
<h2>データ型</h2>
次にテーブルを作成しましょう♪<br />と、いきたいのですが、テーブルを作成する上でデータ型の知識は必須であるため、先にこちらを説明します。<br /><br />SQL Serverでのデータ型は大きく以下の4つに分類されます。
<ul>
	<li>真数</li>
	<li>概数</li>
	<li>日付・時刻</li>
	<li>文字列</li>
	<li>Unicode文字列</li>
	<li>バイナリ文字列</li>
	<li>その他のデータ型</li>
</ul>
<p>引用元は<a href="https://docs.microsoft.com/ja-jp/sql/t-sql/data-types/data-types-transact-sql?view=sql-server-ver15">こちら</a>。</p>
ひとつずつ確認しましょう♪
<h3>真数</h3>
真数とは誤差の出ない数値を言います。<br />浮動小数点数型では数値を符号部と仮数部と実数部で表すため、誤差が生じます。<br />真数とは数値をそのまま全部表現するため誤差が生じる可能性がありません。<br /><br />真数型はさらに以下の9つのデータ型の総称です。
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>bigint</th>
				<td>-2<sup>64</sup>(-9,223,372,036,854,755,808) ～ +2<sup>63</sup>-1(+,,223,372,036,854,775,807)</td>
			</tr>
			<tr>
				<th>bit</th>
				<td>「1」「0」or「NULL」</td>
			</tr>
			<tr>
				<th>decimal</th>
				<td>「-10<sup>38</sup>+1 ～ +10<sup>38</sup>-1」の範囲の固定長の有効桁数と小数点数以下桁数を持つ数値。</td>
			</tr>
			<tr>
				<th>int</th>
				<td>-2<sup>31</sup>(-2,147,483,648) ～ +2<sup>31</sup>-1(2,147,483,647)</td>
			</tr>
			<tr>
				<th>money</th>
				<td>-922,337,203,685,477.5808 ～ +922,337,203,685,477.5807</td>
			</tr>
			<tr>
				<th>numeric</th>
				<td>「-10<sup>38</sup>+1 ～ +10<sup>38</sup>-1」の範囲の固定長の有効桁数と小数点数以下桁数を持つ数値。</td>
			</tr>
			<tr>
				<th>smallint</th>
				<td>-2<sup>15</sup>(-32,768) ～ +2<sup>15</sup>-1(+32,767)</td>
			</tr>
			<tr>
				<th>smallmoney</th>
				<td>-214,748.3648 ～ +214,748.3647</td>
			</tr>
			<tr>
				<th>tinyint</th>
				<td>0 ～ +255</td>
			</tr>
		</tbody>
	</table>
</div>
真数型のデータはそのまま「10」「99.99」「-10.25」と表記します。
<h3>概数</h3>
浮動小数点数によって表される数値です。<br />誤差が生じる可能性があることに注意してください。<br /><br />概数型には以下の2つがあります。
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>float</th>
				<td>-1.79E+308 ～ -2.23E-308、0、2.23E-308 ～ 1.79E+308</td>
			</tr>
			<tr>
				<th>real</th>
				<td>-3.40E+38 ～ -1.18E-38、0、1.18E-38 ～ 3.40E+38</td>
			</tr>
		</tbody>
	</table>
</div>
概数型のデータはそのまま「10」「99.99」「-10.25」と表記します。<br />もっとも、概数型のデータはそのまま書くことが出来ないほど大きいデータになることが想定され、通常は演算の結果となるハズですが、、、
<h3>日付・時刻</h3>
日付を表すデータ型です。<br />日付型のデータは「'(シングルクォーテーション)」で囲って表記します。
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>date</th>
				<td>0001-01-01 ～ 9999-12-31</td>
			</tr>
			<tr>
				<th>datetime2</th>
				<td>
					0001-01-01 ～ 9999-12-31(日付)
					<div class="separator"></div>
					00:00:00.0000000 ～ 23:59:599999999(時間)
				</td>
			</tr>
			<tr>
				<th>datetime</th>
				<td>
					1753-01-01 ～ 9999-12-31(日付)
					<div class="separator"></div>
					00:00:00 ～ 23:59:59.997(時間)
				</td>
			</tr>
			<tr>
				<th>datetimeoffset</th>
				<td>
					0001-01-01 ～ 9999-12-31(日付)
					<div class="separator"></div>
					00:00:00.0000000 ～ 23:59:599999999(時間)
				</td>
			</tr>
			<tr>
				<th>smalldatetime</th>
				<td>
					1900-01-01 ～ 2079-06-06(時間)
					<div class="separator"></div>
					00:00:00 ～ 23:59:59
				</td>
			</tr>
			<tr>
				<th>time</th>
				<td>00:00:00.0000000 ～ 23:59:59.9999999</td>
			</tr>
		</tbody>
	</table>
</div>
<h3>文字列</h3>
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>char</th>
				<td>固定長の文字列。</td>
			</tr>
			<tr>
				<th>varchar</th>
				<td>可変長の文字列。</td>
			</tr>
			<tr>
				<th>text</th>
				<td>2<sup>31</sup>-1バイト以下の可変長の文字列。<br />廃止が決定されているため、原則として用いるべきではありません。</td>
			</tr>
		</tbody>
	</table>
</div>
<h3>Unicode文字列</h3>
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>nchar</th>
				<td>Unicodeの固定長の文字列。</td>
			</tr>
			<tr>
				<th>nvarchar</th>
				<td>Unicodeの可変長の文字列。</td>
			</tr>
			<tr>
				<th>ntext</th>
				<td>2<sup>30</sup>-1バイト以下のUnicodeの可変長の文字列。<br />廃止が決定されているため、原則として用いるべきではありません。</td>
			</tr>
		</tbody>
	</table>
</div>
<h3>バイナリ文字列</h3>
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>binary</th>
				<td>固定長のバイナリデータ。</td>
			</tr>
			<tr>
				<th>varbinary</th>
				<td>可変長のバイナリデータ。</td>
			</tr>
			<tr>
				<th>image</th>
				<td>2<sup>31</sup>-1バイト以下のバイナリデータ。<br />主に画像データに使用します。<br />廃止が決定されているため、原則として用いるべきではありません。</td>
			</tr>
		</tbody>
	</table>
</div>
<h3>その他のデータ型</h3>
その他のデータ型として以下のものがあります。<br />詳しくは後ほど説明します。
<ul>
	<li>cursor</li>
	<li>rowversion</li>
	<li>hierarchyid</li>
	<li>uniqueidentifier</li>
	<li>xml</li>
	<li>geometry</li>
	<li>geography</li>
	<li>table</li>
</ul>
<h2>テーブルの作成</h2>
データベース内のテーブルを右クリックして「new &gt; table」を選択します。<br />列名・データ型・NULL制約を設定してテーブルを作成します。
<img src="../pics/テーブルの作成.gif" alt="テーブルの作成" />
ここでは、ポケモンのステータスデータを扱うため、データ型は以下のように設定します。
<img src="../pics/テーブルのデータ型.gif" alt="テーブルのデータ型" />
また、この画面を右クリックするとプライマリーキーの設定等が可能です。
<img src="../pics/プライマリーキーの設定.gif" alt="プライマリーキーの設定" />
テーブルを保存するためには上に表示されているタブを右クリックして、「Save ***」をクリックします。<br />または、「Ctrl」+「S」でも可能です。
<img src="../pics/テーブルの保存.gif" alt="テーブルの保存" />
<div class="separator"></div>
では、試しに幾つかのSQL文を実行してみましょう♪
<code class="sql">
	USE koko;

	INSERT INTO pokemon
	VALUES
		(1, 'フシギダネ', 'くさ', 'どく', 45, 49, 49, 65, 65, 45, 318),
		(2, 'フシギソウ', 'くさ', 'どく', 60, 62, 63, 80, 80, 60, 405),
		(3, 'フシギバナ', 'くさ', 'どく', 80, 82, 83, 100, 100, 80, 525),
		(4, 'ヒトカゲ', 'ほのお', NULL, 39, 52, 43, 60, 50, 65, 309),
		(5, 'リザード', 'ほのお', NULL, 58, 64, 58, 80, 65, 80, 405);

	SELECT * FROM pokemon;
</code>
<img src="../pics/テーブルの作成-結果.gif" alt="テーブルの作成" />
<div class="separator"></div>
因みに、SQL文を用いてテーブルを作成することもできます。<br />当然と言えば、当然ですが、、、<br /><br />SQL文でテーブルを作成する際には以下のように書きます。
<code class="sql">
	CREATE TABLE テーブル名 (
		カラム名1 データ型 オプション,
		カラム名2 データ型 オプション,
		カラム名3 データ型 オプション
	);
</code>
もっと言えば、データベースもSQL文で作成することもできます。
<code class="sql">
	CREATE DATABASE データベース名
</code>
というか、GUIで実行する処理は全てSQL文でも可能ですが、、、<br />まあ、SQL Serverの強みのひとつとしてGUIで直感的な操作が可能なことが挙げられるので、一応GUIで操作しておきます。
<?php footer(); ?>