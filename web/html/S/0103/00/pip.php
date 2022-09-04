<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2021-12-28",
	"updated" => "2021-12-28"
);
head($obj);
?>
<h2>pypi</h2>
<p class="pypi-bg x">「ぱいぱい」と呼びます。<br />別に卑猥だなんて思ったことはないです、、、<br />pypiとは<a href="https://pypi.org/">python公式サイト</a>では「The Python Package Index (PyPI) is a repository of software for the Python programming language.」と説明されています。<br />みんなのモジュールの保管庫みたいな感じですね♪<br />これを使用すれば、第三者が作ってくれたpythonの機能(モジュール)を僕たちも使うことができます。<br />これを使用するにはpipというパッケージ管理ツールを使用します。</p>
<h2>pip</h2>
pythonのパッケージ(モジュール)を管理するツールです。<br />python3.4以降だと標準でインストールされています。<br />これを使用するにはシェルを使用します。<br />windowsでいうコマンドプロンプトですね♪<br /><br />まずはコマンドプロンプトを開きましょう♪<br />スタートメニューから「コマンドプロンプト」の入力してください。
<img src="../pics/cmd.png" alt="コマンドプロンプトの説明画像" />
<h2>list</h2>
インストールされているパッケージの一覧を表示します。<br />以下のコードを打ち込んでください。
<code class="shell">
	python -m pip list
</code>
<img src="../pics/pip-list.png" alt="pip listの説明画像" />
このコマンドを実行するとインストール済みのパッケージとそのバージョンが表示されます。<br />僕は既に幾つかのパッケージをインストールしてありますのでたくさん出てきますが、皆さんはデフォルトでインストールされているパッケージだけが表示されると思います。
<h2>install</h2>
ではパッケージをインストールしてみましょう♪<br />pipでパッケージをインストールするには以下のコマンドを実行します。
<code class="shell">
	pip install パッケージ名
</code>
ここでは試しに「pandas」というパッケージをインストールしてみましょう♪<br />ちなみにpandasとは2二次元配列のデータ処理を得意とするパッケージです。<br />エクセルのプログラマーバージョンだと思ってください。<br />AIとかRPAとかに興味ある方は間違いなく使うパッケージです。
<code class="shell">
	pip install pandas
</code>
<img src="../pics/pip-install.gif" alt="pip installの説明画像" />
もう一度以下のコマンドを実行してインストール済みパッケージ一覧を表示してください。<br />pandasが表示されていると思います。
<code class="shell">
	python -m pip list
</code>
<h2>upgrade</h2>
pipを用いてインストール済みのパッケージをアップデートできます。<br />以下のコマンドを実行します。
<code class="shell">
	pip install --upgrade パッケージ名
</code>
<h2>uninstall</h2>
pipを用いてインストール済みのパッケージをアンインストールします。<br />以下のコマンドを実行します。
<code class="shell">
	pip uninstall パッケージ名
</code>
本当にアンインストールするかの確認がされますので、本当に削除する場合には「Y」を、やっぱりやめる場合には「n」を入力します。
<h2>パッケージ</h2>
では、どんなパッケージがあるのかですよね、、、<br />当然目的によるのでこれをインストールした方がいいとは言えませんが、僕がよく使うパッケージを紹介しますね♪
<table>
	<tbody>
		<tr>
			<th>pandas</th>
			<td>僕が大好きなパッケージです。<br />エクセルのような表データを処理することを専門とします。</td>
		</tr>
		<tr>
			<th>matplotlib</th>
			<td>グラフを作成するためのパッケージです。</td>
		</tr>
		<tr>
			<th>numpy</th>
			<td>数的処理を得意とするパッケージです。</td>
		</tr>
		<tr>
			<th>scipy</th>
			<td>科学演算を得意とするパッケージです。</td>
		</tr>
		<tr>
			<th>requests</th>
			<td>http通信を簡単に実現するためのパッケージです。<br />webサイトから自動でデータを収集する(スクローリング)目的で用いられます。</td>
		</tr>
		<tr>
			<th>beautifulsoup</th>
			<td>requestsパッケージと併せて用いることが多いです。<br />取得したhtmlデータを解析します。</td>
		</tr>
		<tr>
			<th>reportlab</th>
			<td>pdfを編集するためのパッケージです。</td>
		</tr>
		<tr>
			<th>tensorflow</th>
			<td>機械学習用のパッケージです。</td>
		</tr>
		<tr>
			<th>scikit-learn</th>
			<td>機械学習用のパッケージです。</td>
		</tr>
		<tr>
			<th>pillow</th>
			<td>画像データを編集するためのパッケージです。</td>
		</tr>
	</tbody>
</table>
不必要なパッケージをインストールしてもストレージを圧迫するだけなので使うときに適時インストールすることをオススメします。
<div class="separator2"></div>
これで、python入門-ver1は終了です。<br />python中級編で会いましょう♪
<a href="../../python中級/branch" class="link-subject to-python中級"></a>
<?php footer(); ?>