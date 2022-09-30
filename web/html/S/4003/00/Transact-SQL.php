<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-05-10",
	"updated" => "2022-05-10"
);
head($obj);
?>
<h2>Transact-SQL</h2>
SQL Serverを開発しているマイクロソフト社が独自に拡張したSQLの仕様のことです。<br /><br />SQLを少しでも扱ったことのある人なら、一般的なプログラミング言語と大きく異なっていて、書きずらいと実感したことでしょう、、、<br />僕も最初はかなり困惑しました。<br /><br />これは一般的なプログラミング言語が手続き型言語に分類されるのに対して、SQLは非手続き型に該当するからです。<br /><br />簡単に違いを説明すると、手続き型言語とはコンピュータが実行する処理をステップバイステップで指示する言語です。<br />データXを変数Aに代入して、それを関数Fに渡してその戻り値を変数Bに代入して、、、<br />これをN回繰り返して、、、<br /><br />こんな感じです。<br /><br />これと異なり、SQLが属する非手続き型は処理の結果だけを示します。<br />したがって、その内部処理はDBMSに頼ることになります。<br />そのため、SQLはアルゴリズミチックではなくて、自然言語に近いものとなっています。<br /><br />このような性質からSQLを嫌うデータベースプログラマは多く存在します。<br />このようなプログラマのためにマイクロソフトが手続き型っぽくSQLを実行できるように拡張したものがTransact-SQLです。<br /><br />Transact-SQLをマスターするためには以下の3つを最初に抑える必要があります。
<ul>
	<li>順次実行</li>
	<li>条件分岐</li>
	<li>反復処理</li>
</ul>
これは一般的なプログラミング言語と同じですね♪<br />これでSQLを今までの感覚で使用できるようになります。
<h2>順次実行</h2>
当然と言えば当然ですが、プログラムは上から書いた順に実行されます。<br />したがって、データをやり取りするために一時的にデータを格納する技術が必要となります。<br /><br />これを変数という技術で対応します。
<h3>変数</h3>
最初に変数を宣言しましょう♪<br />以下のように書きます。
<code class="sql">
	DECLARE @変数名 データ型
</code>
宣言した変数にデータを代入するためには以下のように書きます。
<code class="sql">
	SET @変数名 = 値
</code>
では実際に変数を宣言した後に値を代入して、その中身を出力してみましょう♪
<code class="sql">
	DECLARE @var CHAR(15);
	SET @var = 'HI! I am SQL!!';
	PRINT @var;
</code>
PRINT文は引数に指定した変数や値を出力します。<br />結果は以下のようになります。
<img src="../pics/変数の代入.gif" alt="変数の代入" />
<div class="separator"></div>
変数にはSELECT文の結果を代入することもできます。
<code class="sql">
	SELECT @変数名 = カラム
	FROM テーブル
	WHERE 条件
</code>
では、図鑑番号が「25」のポケモンを変数に代入してみましょう♪
<code class="sql">
	DECLARE @pk CHAR(15);
	SELECT @pk = name
	FROM pokemon
	WHERE number = 25;

	PRINT @pk;
</code>
<img src="../pics/変数の代入-SELECT.gif" alt="SELECT文を使用した変数の代入" />
<h2>条件分岐</h2>
条件を満たすか否かで実行する処理を変更します。<br />条件分岐は以下のように書きます。
<code class="sql">
	IF (条件式) BEGIN
		-- 条件を満たす場合の処理
		-- 条件を満たす場合の処理
		-- 条件を満たす場合の処理
	END ELSE BEGIN
		-- 条件を満たさない場合の処理
		-- 条件を満たさない場合の処理
		-- 条件を満たさない場合の処理
	END
</code>
制御する文がひとつだけの場合には省略して以下のように書くこともできます。
<code class="sql">
	IF (条件式)
		-- 条件を満たす場合の処理
	ELSE
		-- 条件を満たさない場合の処理
</code>
では、図鑑番号からポケモンを取得してピカチュウか否かで処理を分岐させましょう♪
<code class="sql">
	DECLARE @pk CHAR(15);
	SELECT @pk = name
	FROM pokemon
	WHERE number = 15;

	IF @pk = 'ピカチュウ' BEGIN
		PRINT 'ピカピッカ♪'
	END ELSE BEGIN
		PRINT 'XXXXX'
	END
</code>
<img src="../pics/条件分岐.gif" alt="条件分岐" />
<h2>反復処理</h2>
ある一定回数処理を繰り返します。<br />一定回数とは条件式を満たす限りという意味です。<br />以下のように書きます。
<code class="sql">
	WHILE (条件式) BEGIN
		-- 反復処理
	END
</code>
<img src="../pics/反復処理.gif" alt="反復処理" />
<div class="separator"></div>
また、途中で「BREAK;」を使用することで反復処理から抜け出すことができます。<br />これは条件分岐とともに使用します。<br /><br />例えば、「ピカチュウ」が現れるまで図鑑番号を「1」からチェックしていくSQLを書いてみましょう♪
<code class="sql">
	DECLARE @i INT;
	DECLARE @pk CHAR(15);
	SET @i = 20;
	WHILE (1 = 1) BEGIN
		SELECT @pk = name FROM pokemon WHERE number = @i;
		PRINT CAST(@i AS CHAR(3)) + @pk;
		IF (@pk = 'ピカチュウ') BEGIN
			BREAK;
		END
		SET @i += 1;
	END
</code>
<img src="../pics/反復処理-BREAK.gif" alt="反復処理" />
<div class="separator"></div>
「BREAK;」ではなく、「CONTINUE;」を使用することで、そのループだけをスキップして次のループへ飛ばせることもできます。
<code class="sql">
	DECLARE @i INT;
	DECLARE @pk CHAR(15);
	SET @i = 20;
	WHILE (@i <= 30) BEGIN
		SET @i += 1;
		SELECT @pk = name FROM pokemon WHERE number = @i;
		IF (@pk = 'ピカチュウ') BEGIN
			PRINT '--- スキップ ---';
			CONTINUE;
		END
		PRINT CAST(@i AS CHAR(3)) + @pk;
	END
</code>
<img src="../pics/反復処理-CONTINUE.gif" alt="反復処理" />
<h2>ストアドプロシージャ</h2>
「Stored Procedure」の和訳で、保存された処理という意味になります。<br />「AP - DB」間でのSQL通信が大量に発生するとパフォーマンスに悪い影響を及ぼします。<br /><br />これを防ぐために予め一連の処理をDB側に保存しておいて、APが側からの指令によってこれを発火させます。
<img src="../pics/ストアドプロシージャの仕組み.png" alt="ストアドプロシージャ" />
ストアドプロシージャの使用する利点として以下の3つがあります。
<ul>
	<li>「AP - DB」間の通信が簡素に</li>
	<li>AP側のプログラムが簡素に</li>
	<li>DB側でのSQL実行時のパース処理が不要になるため、高速化</li>
</ul>
反対に欠点として以下の点があげられます。
<ul>
	<li>「DB」側のプログラムが複雑に</li>
</ul>
これは当然と言えば当然ですね♪<br /><br />欠点はあるものの、利点の方が影響が大きいとの理由からストアドプロシージャがかなり使用されます。<br />ということで、ストアドプロシージャについて学びましょう♪
<h3>ストアドプロシージャの定義</h3>
では、早速ストアドプロシージャを定義しましょう♪<br /><br />以下のように書きます。
<code class="sql">
	CREATE PROCEDURE ストアドプロシージャ名
		引数1 引数1のデータ型,
		引数2 引数2のデータ型,
		...
		AS BEGIN
			-- 処理
			-- 処理
		END
</code>
例えば、引数1に与えた文字列を引数2で指定した回数だけ出力するプロシージャを定義するには以下のようになります。
<code class="sql">
	CREATE PROCEDURE repeat_n_times
		@word CHAR(10),
		@n INT
		AS BEGIN
			DECLARE @i INT;
			SET @i = 0;
			WHILE (@i < @n) BEGIN
				PRINT @word;
				SET @i += 1;
			END
		END
</code>
このSQL文を実行してみましょう♪<br />特にエラーが発生せずに「Commands Completed Successfully」と出力されればストアドプロシージャの登録に成功しています。<br /><br />登録したストアドプロシージャはオブジェクトエクスプローラーから確認できます。<br />「データベース &gt; Programmability &gt; Stored Procedures」内に保存されています。
<img src="../pics/ストアドプロシージャの登録.gif" alt="ストアドプロシージャの登録" />
<div class="separator"></div>
因みに、プロシージャで受け取る変数を以下のように設定することで、引数が与えられなかった際にデフォルトで使用する値を設定できます。
<code class="sql">
	変数 データ型 = デフォルト値
</code>
<h3>ストアドプロシージャの実行</h3>
今度はストアドプロシージャを実行しましょう♪<br /><br />以下のSQL文で実行可能です。
<code class="sql">
	EXECUTE ストアドプロシージャ名 引数1, 引数2, ...
</code>
では、先ほど登録したストアドプロシージャを実行してみましょう♪
<code class="sql">
	EXECUTE repeat_n_times 'SQL ♪', 5;
</code>
<img src="../pics/ストアドプロシージャの実行.gif" alt="ストアドプロシージャの実行" />
<h3>ストアドプロシージャの更新</h3>
既にあるストアドプロシージャを更新するには以下のSQLを実行します。<br />といっても、「CREATE」を「ALTER」にするだけですが、、、
<code class="sql">
	ALTER PROCEDURE ストアドプロシージャ名
		引数1 引数1のデータ型,
		引数2 引数2のデータ型,
		...
		AS BEGIN
			-- 処理
			-- 処理
		END
</code>
後ほど説明しますが、ストアドプロシージャを一度削除してからもう一度削除してもok!です。
<h3>ストアドプロシージャの削除</h3>
ストアドプロシージャを削除するには以下のSQLを実行します。
<code class="sql">
	DROP PROCEDURE ストアドプロシージャ名;
</code>
<h2>ストアドファンクション</h2>
ストアドプロシージャの関数バージョンです。<br />主に、引数から戻り値を算出することを目的とします。<br /><br />戻り値のないストアドファンクションは作成できません。
<h3>ストアドファンクションの定義</h3>
ストアドファンクションを定義するには以下のSQLを実行します。
<code class="sql">
	CREATE FUNCTION ストアドファンクション名
		引数1 引数1のデータ型,
		引数2 引数2のデータ型,
		...
		RETURNS 戻り値のデータ型
		AS BEGIN
		-- 処理
		-- 処理
		RETURN 戻り値
	END
</code>
では、引数として渡された文字列に「♪」を付与した文字列を返すファンクションを定義しましょう♪
<code class="sql">
	CREATE FUNCTION put_musicalNotes (
		@word CHAR(10),
		@n INT = 3
	) RETURNS char(25)
		AS BEGIN
			RETURN @word + ' ' + REPLICATE('♪', @n);
		END
</code>
これは「データベース &gt; Programmability &gt; Functions &gt; Scalar-valued Functions」内に格納されます。
<img src="../pics/ストアドファンクションの定義.gif" alt="ストアドファンクションの定義" />
<div class="separator"></div>
因みに、REPLICATEという謎のものが出てきましたが、これも関数です。<br />最初から定義されている関数ですので、組込関数と呼ばれます。
<div class="separator"></div>
ストアドプロシージャは戻り値を返すこともできます。<br />戻り値は「RETURN」の後に返す値を書きます。
<code class="sql">
	RETURN 戻り値;
</code>
<h3>ストアドファンクションの使用</h3>
ストアドファンクションを使用するには以下のように書きます。
<code class="sql">
	dbo.ストアドファンクション名(引数1, 引数2, ...)
</code>
この実行結果が戻り値となります。<br /><br />「dbo.」ってなんやって思った方もいると思います。<br />これは、「Database Owner」の略で、データベースオーナーを意味します。<br />「sa」ユーザと呼ばれるSQL Serverの管理者権限アカウントでログインして作成した関数には「dbo」という接頭語が付与されます。<br /><br />これがないと組込み関数と区別できなくなりエラーとなるため、必ず付ける必要があります。<br /><br />では、先ほど作成したストアドファンクションを実行してみましょう♪
<code class="sql">
	PRINT dbo.put_musicalNotes('SQL', 5);
</code>
<img src="../pics/ストアドファンクションの実行.gif" alt="ストアドファンクションの実行" />
<h2>ストアドファンクションの更新</h2>
ストアドプロシージャと同様です。<br />「CREATE」を「ALTER」に変更すればok!です。
<code class="sql">
	ALTER FUNCTION ストアドファンクション名
		引数1 引数1のデータ型,
		引数2 引数2のデータ型,
		...
		RETURNS 戻り値のデータ型
		AS BEGIN
		-- 処理
		-- 処理
		RETURN 戻り値
	END
</code>
<h3>ストアドファンクションの削除</h3>
以下のSQLで削除可能です。
<code class="sql">
	DROP FUNCTION ストアドファンクション名;
</code>
<h2>テーブル値関数</h2>
先ほどのストアドファンクションが単一の値を戻り値とするスカラ値関数であったのに対して、テーブル値関数は二次元表のデータを返します。<br /><br />この場合に指定する戻り値のデータ型は「TABLE」とします。<br />例えば、ポケモンデータのうち、先頭のn件を返す関数を作成してみましょう♪<br />関数を使用せずに、pokemonテーブルをそのまま使用すればok!ですが、練習のため関数を使用します。
<code class="sql">
	CREATE FUNCTION get_pokemon (
		@n INT = 10
	)
	RETURNS @pk TABLE (
		number INT,
		name CHAR(15),
		type1 CHAR(10),
		type2 CHAR(10)
	)
	AS BEGIN
		INSERT @pk
		SELECT TOP (@n) number, name, type1, type2
		FROM pokemon
		RETURN;
	END
</code>
<img src="../pics/ストアドファンクション(TABLE)の定義.gif" alt="テーブル型のストアドファンクションの定義" />
変数は括弧で囲まないとエラーになります。<br />この理由は調べても分かりませんでした。<br /><br />また、変数をRETURNで指定するのではなく、関数の戻り値を指定する際に変数名を指定することで戻り値として指定しています。<br /><br />では、この関数を使用してみましょう♪<br />この関数の戻り値はテーブル型dすので、テーブルっぽく扱えます。<br />例えば、FROM句の対象にしたり、テーブル結合の対象として使用します。
<code class="sql">
	SELECT *
	FROM get_pokemon(10);
</code>
<img src="../pics/ストアドファンクション(TABLE)の実行.gif" alt="テーブル型のストアドファンクションの実行" />
<?php footer(); ?>
