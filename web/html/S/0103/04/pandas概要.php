<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-03-10",
	"updated" => "2022-03-10"
);
head($obj);
?>
<h2>pandas</h2>
<div class="bg bg-logo-pandas">
	pandasとは二次元データを操作するためのpythonパッケージです。<br />データサイエンスの世界での必需品ともいえるパッケージで、ビッグデータの分析やAIの活用が着目されている現代において、是非マスターしておくべき技術です。<br /><br />似たような技術にexcelやデータベースがありますが、excelは高速な処理が不得意である点や一度の演算でデータセットが壊れてしまう点からデータサイエンスの世界ではあまり用いられません。<br />データベースはあくまでのデータの検索・抽出を目的としているため、大量のデータを演算するのには向いていません。<br /><br />やっぱり、pandasですね♪<br />もっと高速なものにはRライブラリやfortranライブラリがありますが、これらはかなり難しいので、、、<br />ということで、Let's&nbsp;study&nbsp;pandas!!
</div>
<h2>pandasのインストール</h2>
pandasはデフォルトではインストールされていないため、コマンドラインからpipを用いてインストールする必要があります。<br />以下のコマンドでpandasをインストールして下さい。
<code class="shell">
	pip install pandas
</code>
同時にデータの可視化を行う「matplotlib」「seaborn」や算術演算処理を専門とする「numpy」などのモジュールもインストールすることをオススメします。
<code class="shell">
	pip install matplotlib
	pip install seaborn
	pip install numpy
</code>
<h2>使用するデータセット</h2>
使用するデータセットとして<a href="https://www.data.jma.go.jp/risk/obsdl/index.php">気象庁のHP</a>からダウンロード可能な越谷市の過去40年分の平均気温・最高気温・最低気温を使用します。<br />以下のリンクから整理したデータをダウンロード可能です。
<a href="../data/temperature.csv" download="越谷市の天気.csv" class="link temperture">越谷市の過去40年分の気象データ</a>
本当は僕が住んでいる草加市の天気を使用したかったのですが、データが存在しませんでした、、、
<?php footer(); ?>