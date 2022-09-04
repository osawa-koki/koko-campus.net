<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-03-08",
	"updated" => "2022-03-08"
);
head($obj);
?>
<h2>ruby</h2>
<div class="bg bg-logo-ruby入門">
	rubyとはマッツこと、まつもとゆきひろさんによって開発された強いオブジェクト指向型のスクリプト言語です。<br />IPAのruby標準化検討ワーキンググループによって2012年に日本発のプログラミング言語として国際規格化されました。<br /><br />開発者が日本語ということで、日本語の文献がたくさん存在するため、初心者が勉強するのに適している言語です。<br />また、他の言語とも似ているためrubyを一通り学べば他の言語の理解も容易になります。<br /><br />また、ruby on railsと呼ばれる最強のwebアプリケーションフレームワークも存在するため、webサイト構築でも非常に役立ちます。
</div>
<h2>エディタ</h2>
では、実際にプログラムコードを書くためのアプリケーションをインストールしましょう♪<br />windowsにデフォルトで搭載されているメモ帳でもok!ですが、使いずらいためオススメしません。<br />代表的なディタには以下のものがあります。
<ul>
	<li><a href="https://atom.io">atom</a></li>
	<li><a href="https://code.visualstudio.com/">visual studio</a></li>
	<li><a href="https://www.sublimetext.com/">sublime text</a></li>
</ul>
僕はマイクロソフト社が提供しているvisual studio codeをオススメします。<br />個人であれば無料で使用でき、様々な言語に対応してたプラグインが存在するからです。
<a href="https://code.visualstudio.com/" class="link to-vs-code">visual studio code</a>
インストールが完了したらそのまま使用できます。<br />拡張機能から「rebornix.ruby」をインストールすることをオススメします。
<img src="../pics/ruby-拡張機能.png" alt="ruby 拡張機能" />
良い感じでプログラムコードを色付けしてくれ、コードに誤りがある場合にその詳細を表示してくれます。
<h2>rubyのインストール</h2>
rubyは以下のリンクからダウンロードして下さい。
<a href="https://rubyinstaller.org/" class="link rubyinstaller">ruby</a>
「download &gt; WITH DEVKIT」から最新版をダウンロードして下さい。<br />ダウンロードが完了したらそのまま起動します。<br />インストーラが起動しますので、特に変更することなく進めてください。<br />インストールが完了したら必要なコンポーネントのインストール画面が表示されます。
<img src="../pics/rubyinstaller.png" alt="rubyinstaller" />
「1」と入力してください。<br />必要なコンポーネントのインストールが実行されます。<br /><br />完了したらコマンドプロンプトを開いて、以下のコマンドを実行してください。
<p>スタートからコマンドプロンプトと検索したら表示されます。</p>
<code class="shell">
	ruby --version
</code>
<img src="../pics/ruby--version.png" alt="ruby --version" />
バージョンが表示されたら成功です。<br />「'ruby' is not recognized as an internal or external command, operable program or batch file.」と表示されたら、環境変数の設定が成功していない可能性があります。<br />スタート画面から「環境変数」と検索して「Path」を編集して先ほどインストールしたフォルダを登録してください。
<img src="../pics/環境変数.png" alt="環境変数" />
通常は「<span class="en">C:\Users\ユーザ名\Ruby31-x64\bin</span>」を指定すればok!です。<br />簡単に説明すれば、「ruby」と言えばこのフォルダにあるrubyプログラムを実行してね♪って登録します。
<h2>rubyコマンド</h2>
覚えるべきはひとつだけです。
<code class="shell">
	ruby 実行するファイル名
</code>
これで指定したファイルを実行します。<br />遠くにあるファイルを指定するのは大変なので通常は実行するファイルがあるフォルダに移動して実行します。<br />コマンドプロンプトでカレントディレクトリを変更するにはcdコマンドを使用しますが、エクスプローラーから対象のフォルダに移動してそこからコマンドプロンプトを開くことで当該フォルダをカレントディレクトリに設定した状態にすることができます。
<img src="../pics/カレントディレクトリ.gif" alt="カレントディレクトリ" />
試しに以下のファイルを実行してみましょう♪<br />中身は気にしなくてok!です。
<code class="ruby">
	puts "hello ruby"
</code>
「hello ruby」と表示する簡単なプログラムです。<br />ファイル名は任意ですが、拡張子は慣例として「.rb」とします。<br />ここでは「main.rb」とします。<br /><br />では、このrubyプログラムを実行してみましょう♪
<code class="shell">
	ruby main.rb
</code>
<img src="../pics/hello-ruby.gif" alt="hello ruby" />
<h2>irbコマンド</h2>
ファイルとしてrubyを実行するのではなく、対話型でrubyを実行します。<br />プログラムの動作をひとつずつチェックできるため、練習目的で使用します。
<img src="../pics/irb.gif" alt="irb" />
irbモードを終了するにはquitコマンドを実行します。<br />便利な機能ですが、プログラムの説明には向いていないのでここでは使用しません。
<?php footer(); ?>