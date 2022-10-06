<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-03-05",
	"updated" => "2022-03-05"
);
head($obj);
?>
<h2>numpy</h2>
<div class="bg bg-logo-numpy">
	numpyとは多次元配列を扱う数値計算用のライブラリで、機械学習などの高度な処理に使用されます。<br />また、二次元配列として表される画像などの処理にもよく使用され、openCVなどの画像処理ライブラリなどを使用する際には必ず必要となる知識です。<br /><br />ビッグデータ処理の必要性が高まっている現在においてかなり強力な技術であり、データサイエンスの世界では必須ともなっています。<br />また、現在人気急上昇中のpythonのライブラリであるため、汎用性も高いです。
</div>
<h2>numpyのインストール</h2>
コマンドラインで以下のコマンドを入力してください。
<code class="shell">
	pip install numpy
</code>
pythonファイルで使用する際には以下の文を最初に書きます。
<code class="python">
	import numpy as np
</code>
numpyモジュールは通常は「np」と省略して使用するため、ここでも省略してインポートします。
<?php footer(); ?>