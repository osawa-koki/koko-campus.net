<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"title" => "コマンド操作",
	"made" => "2021-11-20",
	"updated" => "2021-11-20"
);
head($obj);
?>
<h2>シェル</h2>
シェルの説明の前にlinuxという用語について簡単に説明しますね♪<br /><br />linuxとは一般的には以下の2つの総称です。<br />
<ul>
	<li>カーネル</li>
	<li>シェル</li>
</ul>
<br />
<table class="exp">
	<thead>
		<tr>
			<td width="50%">カーネル</td>
			<td width="50%">シェル</td>
		</tr>
		</thead>
	<tbody>
		<tr>
			<td>linuxの核(カーネル)の部分で、実際にコマンド(命令)を実行する部分ですが、ユーザは直接カーネルに指示は出せません。</td>
			<td>ユーザとカーネルの橋渡しをするソフトウェアです。</td>
		</tr>
	</tbody>
</table>
<img src="../pics/シェル.png" alt="カーネル・シェルの画像" />
ユーザはコマンドを実行するために一度、シェルに橋渡しをしてもらいます。<br /><br />シェルは当然ユーザからの要求を待っている訳ですが、これを<strong>プロンプト</strong>(Prompt/促す)と呼びます。
<h3>シェルの操作方法</h3>
シェルとはユーザが入力したコマンドをカーネルに渡して結果をユーザに返す機能を持つ、ユーザとカーネルの橋渡し役のソフトウェアのことでしたね。<br /><br />このシェルにユーザがコマンドを伝える方法には以下の2つがあります。
<br /><br />
<table class="exp">
	<thead>
		<tr>
			<td width="50%">対話型<br />(インタラクティブ)</td>
			<td width="50%">スクリプト型<br />(シェルスクリプト)</td>
		</tr>
		</thead>
	<tbody>
		<tr>
			<td>ユーザがコマンドごとにキーボードからシェルに伝える入力する方法です。</td>
			<td>予め実行するコマンドをファイルに記述して、そのファイルをシェルにまとめて実行してもらう方法です。</td>
		</tr>
	</tbody>
</table>
<h3>シェルの種類</h3>
シェルには幾つかの種類があります。<br />以下で代表的なものを紹介します。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>sh</th>
			<td>C言語の開発企業であるAT&Tベル研究所が開発したlinux最初のシェルで、開発者の名前からBシェルと呼ばれることもあります。<br /><br />かなり古いためシェルであるため、現在はあまり使用されませんが、シェルスクリプトを記述する際には現在でもよく用いられます。</td>
		</tr>
		<tr>
			<th>csh</th>
			<td>通称、Cシェルです。<br /><br />現在はほとんど用いられていませんが、対話型シェルで時々用いられます。</td>
		</tr>
		<tr>
			<th>tcsh</th>
			<td>cshの後継であり、主に対話型シェルで用いられます。</td>
		</tr>
		<tr>
			<th>bash</th>
			<td>shの進化バージョンです。<br /><br />linuxのデフォルトとなっており、現在における最も一般的なシェルです。</td>
		</tr>
		<tr>
			<th>zsh</th>
			<td>bashやtcshの後継を目指す新しいシェルです。<br /><br />2021年11月時点では、そこまで普及していません。</td>
		</tr>
	</tbody>
</table>
<br />
ここでは、もっとも一般的なシェルである<span class="u">bash</span>を想定して説明していきます。
<h2>プロンプト</h2>
プロンプトとはシェルがユーザのコマンド入力を待っている際に表示する文字列ですが、このプロンプトは以下の構造になっています。
<br /><br />
<table class="x center">
	<tbody>
		<tr>
			<td class="border-bottom">koko</td>
			<td class="padding-rl">@</td>
			<td class="border-bottom">x-host</td>
			<td> ~$</td>
		</tr>
		<tr>
			<td><small>ユーザ名</small></td>
			<td></td>
			<td><small>ホスト名</small></td>
			<td></td>
		</tr>
	</tbody>
</table>
<br />
以下では、プロンプトを表示する際に、単に「$」と表記します。
<h2>コマンドライン</h2>
プロンプト(「$」)の後に続くコマンド入力部分を言います。<br /><br />また、現在の文字の入力位置を<strong>カーソル</strong>と呼びます。<br /><br />ここでは、コマンドラインを編集するための技術(コマンド)を紹介します。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>カーソルの後退</th>
			<td>
				<ul class="x">
					<li>「ctrl」 + 「b」</li>
					<li>「&larr;」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>カーソルの前進</th>
			<td>
				<ul class="x">
					<li>「ctrl」 + 「f」</li>
					<li>「&rarr;」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>カーソルを行頭へ</th>
			<td>
				<ul class="x">
					<li>「ctrl」 + 「a」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>カーソルを行末へ</th>
			<td>
				<ul class="x">
					<li>「ctrl」 + 「e」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>カーソルを1単語分前に+へ</th>
			<td>
				<ul class="x">
					<li>「esc」 -> 「b」</li>
					<li>「alt」 + 「b」</li>
				</ul>
				<br />
				<small>※「->」は押しながらではなく、押してからの意味です。</small>
			</td>
		</tr>
		<tr>
			<th>カーソルを1単語分へ</th>
			<td>
				<ul class="x">
					<li>「esc」 -> 「f」</li>
					<li>「alt」 + 「f」</li>
				</ul>
				<br />
				<small>※「->」は押しながらではなく、押してからの意味です。</small>
			</td>
		</tr>
		<tr>
			<th>カーソル前1文字削除</th>
			<td>
				<ul class="x">
					<li>「backspace」</li>
					<li>「ctrl」 + 「h」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>カーソル先(上)1文字削除</th>
			<td>
				<ul class="x">
					<li>「delete」</li>
					<li>「ctrl」 + 「d」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>カーソル前1単語削除</th>
			<td>
				<ul class="x">
					<li>「ctrl」 + 「w」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>カーソル前を全て削除</th>
			<td>
				<ul class="x">
					<li>「ctrl」 + 「u」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>カーソル先を全て削除</th>
			<td>
				<ul class="x">
					<li>「ctrl」 + 「k」</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>
<h2>コマンドの実行</h2>
コマンドラインを編集するところまで学びましたね♪<br /><br />次は実際にコマンドラインからコマンドを実行してみましょう♪<br /><br />コマンド文は以下の構成になっています。
<br /><br />
<table class="x center border">
	<tbody>
		<tr>
			<td>$</td>
			<td>echo</td>
			<td>Hi!</td>
			<td>-e -n</td>
		</tr>
		<tr>
			<td class="padding-rl">プロンプト</td>
			<td class="padding-rl">コマンド</td>
			<td class="padding-rl">コマンドライン引数</td>
			<td class="padding-rl">オプション</td>
		</tr>
	</tbody>
</table>
<br />
次に実際に簡単なコマンドを入力してみましょう♪
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>echo</th>
			<td><div class="border-separator">コマンドの後ろの文字列を表示します。</div>「$ echo Hi!」<br />->「Hi!」と表示されます。</td>
		</tr>
		<tr>
			<th>date</th>
			<td><div class="border-separator">現在時刻を表示します。</div>「$ date」<br />->例)「Fri Nov 19 16:07:44 JST 2021」と表示されます。</td>
		</tr>
		<tr>
			<th>exit</th>
			<td><div class="border-separator">ログアウトします。</div>「$ exit」</td>
		</tr>
		<tr>
			<th>logout</th>
			<td><div class="border-separator">ログアウトします。<br />※exitと異なり、現在のシェルがログインシェルである場合にのみ用いられます。</div>「$ logout」</td>
		</tr>
	</tbody>
</table>
<h2>便利なコマンド操作機能</h2>
linuxはCLIですので、キーボードの入力が命です。<br /><br />これはタイピング速度やタイピング精度だけではなく、どんな機能を用いれば効率的かを知っておくことが大切です。<br /><br />ここでは、良く用いられるコマンド操作機能をっ紹介しますね♪
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>補完機能</th>
			<td>
				<div class="border-separator">コマンドを自動表示する機能です。<br />例えばdateコマンドを実行する際に「dat」まで入力したら「tab」を押すと「date」と自動表示されます。<br /><br />予測変換候補が複数ある際には利用できません。<br />例えば、「da」の時点で「tab」を押すとベルがなります。<br />これは「da」から始まるコマンドが「date」以外に「dash」があるためです。</div>
				<ul class="x">
					<li>「tab」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>コマンドを1つ戻す</th>
			<td>
				<ul class="x">
					<li>「ctrl」 + 「p」</li>
					<li>「&uarr;」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>コマンドを1つ進める</th>
			<td>
				<ul class="x">
					<li>「ctrl」 + 「n」</li>
					<li>「&darr;」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>インクリメンタルサーチ</th>
			<td>
				<div class="border-separator">「ctrl」 + 「r」を押すと、インクリメンタル検索モードに入りコマンド履歴を検索します。<br /><br />プロンプトには「(reverse-i-serch)`':」と表示されます。<br /><br />このインクリメンタルモードでは以下の機能が使用可能です。</div>
				<ul class="x">
					<li>「文字の入力」<br />->文字を含めて再検索</li>
					<li>「ctrl」 + 「r」<br />->1つ前の検索結果へ</li>
					<li>「enter」<br />->現在の実行結果を実行</li>
					<li>「esc」<br />->コマンドラインへ(検索結果は保持)</li>
					<li>「ctrl」 + 「g」<br />->コマンドラインへ(検索結果を破棄)</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>
<br />
次はlinuxでのディレクトリ管理について学びましょう♪
<?php footer(); ?>