<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-20",
	"updated" => "2022-01-20"
);
head($obj);
?>
<h2>rust</h2>
<div class="bg-logo-rust入門">
	rustとは2006年に開発された新しいプログラミング言語で、主に基盤となるシステムプログラミングにおいて使用されます。<br />「システムプログラミングと言えばc/c++!!」という暗黙の了解を打ち破った新時代の言語です。<br /><br />rustはc/c++のメモリ管理の困難さから生じるセキュリティを克服した言語で、現在ではmicrosoftが開発しているwindowsやgoogleが開発しているandroidでも採用されています。<br />2009年からはfirefoxを運営しているmozillaが公式にプロジェクトへの参加を決定してさらに知名度を高めました。<br />これからシェアは急激に伸びると予想される言語ですので、システムプログラミングに興味がある人は是非学びましょう♪<br /><br />高速かつ安全ですが、構造がかなり複雑で難しいのでプログラミング初心者にはオススメできません。
</div>
<h2>rustの特徴</h2>
c/c++同様にシステムプログラミングである一方で、c/c++でプログラマを悩ませていたメモリ管理を「所有権」「移転」「借用」を用いて簡単に実現します。<br />また、型安全であり、未定義の動作に対して適切なエラーを吐き出してくれるため、セキュリティ面でも安全です。このように、c/c++比べてセキュリティ・管理容易性が大幅に向上していながら、c/c++と同様な、もしくは、それ以上の実行効率を持ちます。
<img class="no-max" src="../pics/型安全・型不安全.png" alt="rustの特徴" />
<h2>rustのインストール</h2>
インストール方法は以下の2通りあります。
<ul>
	<li><a href="https://www.rust-lang.org/ja/tools/install">rust-lang.org</a>からインストール</li>
	<li><a href="https://rustup.rs">rustup</a>からインストール</li>
</ul>
どちらでもok!ですが、ここではrust-lang.orgからインストールする方法を紹介します。<br />ページに飛んだら自分のOSのビットに合ったインストーラをダウンロードします。<br />windowsの方はOSのビット数は以下の方法で確認してください。
<img class="no-max" src="../pics/OSビット数.gif" alt="OSビット数" />
システムの種類に部分に記載されています。<br /><br />ダウンロードが完了したらインストーラを起動します。<br />こんな画面が表示されると思います。
<img src="../pics/rustup.png" alt="rustup" />
「1」と入力して「enter」を押してください。<br />インストールが実行されます。<br />インストールが完了したら、正しくインストールが完了しているか、コマンドプロンプト(シェル)で以下のコマンドを実行して確認してください。
<code class="shell">
	cargo --version
</code>
<code class="shell">
	rustc --version
</code>
<code class="shell">
	rustdoc --version
</code>
<img src="../pics/rust-インストール確認.gif" alt="rust" />
バージョン名が表示されたら、インストール成功です。<br />おめでとうございます。
<div class="separator"></div>
エラーが表示される場合は環境変数にパスが通っていない可能性があります。<br />環境変数の設定画面からパスが通っているかどうか確認してください。
<img class="no-max" src="../pics/環境変数.png" alt="環境変数" />
rustの開発環境において、全てのツールは「~/.cargo/bin」ディレクトリにインストールされるため、ここへのパスを通してください。
<h2>rustコマンド</h2>
先ほどは以下の3つのコマンドのバージョンを確認して、rustのインストールが成功していることを確認しました。
<ul>
	<li>cargo</li>
	<li>rustc</li>
	<li>rustdoc</li>
</ul>
これらのコマンドの簡単な説明をします。
<table>
	<caption>rustコマンド</caption>
	<tbody>
		<tr>
			<th>cargo</th>
			<td>rustのコンパイルとパッケージツールです。<br />通常はcargoを用いてプロジェクトを作成、コンパイル・ビルドと実行をし、さらにはコードの依存関係の管理をします。</td>
		</tr>
		<tr>
			<th>rustc</th>
			<td>rustの単純コンパイルコマンドです。<br />通常はcargoコマンドを使用するため、ほとんど使用する機会はありません。</td>
		</tr>
		<tr>
			<th>rustdoc</th>
			<td>rustのドキュメンテーションツールで、コードのコメントアウトを整形してhtml出力します。<br />これに関してもcargoコマンドで実行することが可能なので、ほとんど使用する機会はありません。</td>
		</tr>
	</tbody>
</table>
<h2>プロジェクト作成</h2>
コマンドプロンプトで「.cargo」ディレクトリまで移動してそこにプロジェクトを管理するディレクトリを作成しましょう♪
<p class="r">どこにプロジェクトを保存してもいいのですが、通常は「.cargo」ディレクトリに専用のディレクトリを作成して、そこ保存します。</p>
とりあえず、全てのプロジェクトを管理する包括的なディレクトリ名を「project」として、その中に「koko-project」という名前のrustプロジェクトを作成してみましょう♪<br />プロジェクトの作成は以下のコマンドを実行します。
<code class="shell">
	cargo new プロジェクト名 --bin
</code>
<img src="../pics/プロジェクト作成.gif" alt="rustプロジェクト作成" />
<div class="separator"></div>
そういえば、、、<br />エクスプローラーからコマンドプロンプトを開けば、そこのディレクトリをカレントディレクトリをした状態になるんですね!!<br />知りませんでした、、、<br />あまり使う機会もなさそうですけど、、、
<img src="../pics/cd-gui.gif" alt="cdコマンド" />
<div class="separator"></div>
これで、「.cargo」ディレクトリ内に「project」ディレクトリがあり、さらに「project」ディレクトリ内に「koko-project」という名前のrustプロジェクトが作成されました。
<img src="../pics/プロジェクト作成-確認.gif" alt="rustプロジェクト作成" />
その中にある「src」ディレクトリがプログラムコードを管理するためのディレクトリです。<br />中には「main.rs」ファイルがあり、「Hello, world!」と出力するテスト用のプログラムが書かれています。
<div class="separator"></div>
作成されたディレクトリには以下の3つのファイルが作成されます。
<ul>
	<li>.gitignore</li>
	<li>Cargo.lock</li>
	<li>Cargo.toml</li>
</ul>
<h3>.gitignore</h3>
gitの管理に含めないファイルを指定するためのファイルです。<br />「git」+「ignore(無視する)」で「gitignore」です。
<h3>Cargo.lock</h3>
依存関係に関する正確な情報を記述するためのファイルです。
<img src="../pics/cargo.lock.png" alt="Cargo.lock" />
cargoによって自動で管理されるため、プログラマが変更することはありません。
<h3>Cargo.toml</h3>
簡単な依存関係を記述すためのファイルです。<br />プログラマが記述することを想定していますが、こちらもほとんど変更することはありません。
<img src="../pics/cargo.toml.png" alt="Cargo.toml" />
<h2>コンパイルと実行</h2>
rustファイルをコンパイル・実行する方法は大きく3つあります。
<ul>
	<li>rustc</li>
	<li>cargo run</li>
	<li>cargo build</li>
</ul>
<h3>rustc</h3>
コンパイルと実行を別々に行う方法です。<br />この方法は依存関係を考慮したコンパイル・ビルドができないため、ほとんど用いませんが、一応参考までに説明します。<br /><br />rustファイルを単純コンパイルするには以下のコマンドを実行します。
<code class="shell">
	rustc 対象のファイル
</code>
これを実行するとカレントディレクトリに実行可能プログラムが生成されます。<br />windowsなら「main.exe」、linux・unix系なら「main」が追加されています。<br />これを実行すれば「Hello World!」と表示されます。
<img src="../pics/rustc.gif" alt="rustc" />
<p class="r">この方法はそもそも「cargo new」コマンドで作成したプロジェクトに対して用いることを想定していません。</p>
<h3>cargo build</h3>
依存関係にあるプログラムを考慮してコンパイル・ビルドを実行します。<br />以下のコマンドを「cargo new」コマンドで作成したディレクトリで実行します。
<code class="shell">
	cargo build
</code>
この方法では実行可能プログラムは「target/debug」ディレクトリに生成されます。
<img src="../pics/cargo-build.gif" alt="cargo build" />
<h3>cargo run</h3>
非常に簡単にrustファイルのコンパイルと実行をするコマンドです。<br />以下のコマンドを「cargo new」コマンドで作成したディレクトリで実行します。
<code class="shell">
	cargo run
</code>
コードをビルド後に実行してくれます。<br />もう一度、同じように「cargo run」を実行してみてください。<br />今度はコンパイラがソースコードに変更がないことを察知してビルドせずに実行してくれます。<br /><br />この方法では実行可能プログラムは「cargo build」同様に、「target/debug」ディレクトリに生成されます。
<img src="../pics/cargo-run.gif" alt="cargo run" />
<?php footer(); ?>