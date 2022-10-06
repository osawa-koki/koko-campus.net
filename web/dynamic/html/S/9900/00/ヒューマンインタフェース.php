<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-25",
	"updated" => "2022-03-25"
);
head($obj);
?>

<h2>インタフェース</h2>
インタフェースとは既に説明した通り、「何かと何かをつなぐもの」です。<br />人と人のインタフェースとして「言葉」や「表情」や「ジェスチャー」があるように、人とコンピュータをつなぐインタフェースにも幾つかの種類があります。
<h3>CUI</h3>
「Character based User Interface」の略で、文字によってコンピュータとやり取りをします。<br />プログラマが黒い画面にカチャカチャ打ち込んで、、、<br />って感じのアレです。
<img src="../pics/cui.gif" alt="CUI" />
<h3>GUI</h3>
「Graphical User Interface」の略で、マウス操作を中心としてコンピュータに命令を出します。<br />Windowsを用いていれば間違いなく、GUIを使用しています。
<img src="../pics/gui.gif" alt="GUI" />
<h2>GUI部品</h2>
主なGUIのツールとして以下のものがあります。
<ul>
	<li>テキストボックス</li>
	<li>ラジオボタン</li>
	<li>チェックボックス</li>
	<li>プルダウンメニュー</li>
</ul>
<h3>テキストボックス</h3>
キーボードから直接文字を入力します。
<div class="s-margin">
	<input type="text" />
</div>
<h3>ラジオボタン</h3>
複数の選択肢からひとつを選択させます。
<div class="s-margin">
	<label><input type="radio" name="sex" />男</label>
	<label><input type="radio" name="sex" />女</label>
	<label><input type="radio" name="sex" />その他</label>
</div>
<h3>チェックボックス</h3>
複数の選択肢の中から、任意の数の項目を選択させます。<br />選択しない、複数個選択することも可能です。
<div class="s-margin">
	<label><input type="checkbox" />ゴミ捨て</label>
	<label><input type="checkbox" />料理</label>
	<label><input type="checkbox" />選択</label>
</div>
<h3>プルダウンメニュー</h3>
<div class="s-margin">
	<select>
		<option>フシギバナ</option>
		<option>ヒトカゲ</option>
		<option>ゼニガメ</option>
	</select>
</div>
<h2>webデザイン</h2>
スタイルシートを用いてサイト全体を通じてデザインを統一性を持たせて複数種類のブラウザに対応したりするなど、webデザインにおいてはユーザビリティ(使いやすさ)が重要です。<br />単なるテキストデータであるhtmlファイルにcssファイルを読み込むことでwebページにデザインを導入します。
<h2>ユニバーサルデザイン</h2>
年齢・文化・障害の有無・能力の違いなどに関わらず、できる限り多くの人が快適に利用できることを目指す考え方です。<br /><br />アクセシビリティ(誰もが使いやすいこと)を向上させることで、情報バリアフリーを実現します。
<?php footer(); ?>