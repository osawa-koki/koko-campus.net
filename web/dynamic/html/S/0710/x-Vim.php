<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"title" => "Vim",
	"made" => "2021-11-20",
	"updated" => "2021-11-20"
);
head($obj);
?>
<h2>Vim</h2>
linuxに標準で搭載されているエディタで、windowsでいうメモ帳に該当します。
<h2>バイナリファイル・テキストファイル</h2>
ファイルはその構成から大きく「テキストファイル」と「バイナリファイル」に分類されます。
<br /><br />
<table class="exp">
	<thead>
		<tr>
			<td width="50%">バイナリファイル</td>
			<td width="50%">テキストファイル</td>
		</tr>
		</thead>
	<tbody>
		<tr>
			<td>画像ファイルや音声ファイル・実行ファイルなどのテキスト以外のファイルです。<br />文字コードによってテキストに変換できないため、人が直接読むことができません。</td>
			<td>文字コードのルールによってテキストに変換可能なファイルです。<br />テキストであるため、人が読むことができます。</td>
		</tr>
	</tbody>
</table>
<br />
Vimエディタはこのテキストファイルを操作する目的で用いられます。
<h2>コマンドモード・インサートモード</h2>
Vimエディタには2つのモードが存在します。
<br /><br />
<table class="exp">
	<thead>
		<tr>
			<td width="50%">コマンドモード</td>
			<td width="50%">インサートモード</td>
		</tr>
		</thead>
	<tbody>
		<tr>
			<td>コマンドを実行するためのモードで、このモードでは実際にテキストを入力することはできません。</td>
			<td>実際にテキストを入力するためのモードで、このモードではコマンド分も文字列としてエディタに認識されてしまいます。</td>
		</tr>
	</tbody>
</table>
<br />
コマンドモードからインサートモードへは「i」もしくは「a」を押し、インサートモードからコマンドモードへは「esc」を押します。
<img src="../pics/Vim-コマンドモード・インサートモード.png" alt="Vimのコマンドモード・インサートモードの画像" />
<h2>Vimコマンド</h2>
<table class="exp">
	<tbody>
		<tr>
			<th>vimの起動</th>
			<td><div class="border-separator">vimエディタを起動します。</div>「$ vim」<br />(viでもok!)</td>
		</tr>
		<tr>
			<th>vimの終了</th>
			<td>
				<div class="border-separator">vimエディタを終了させるには「:q」と入力して「enter」を押します。</div>「$ :q &lt;enter&gt;」
				<p class="r">未編集の内容がある際には「:q」ではなく「:q!」と入力して「enter」を押します。</p>
			</td>
		</tr>
		<tr>
			<th>ファイルを開く</th>
			<td><div class="border-separator">既存のファイルを開くためのコマンドです。</div>「$ vim file1.txt」<br />->file1をvimエディタで開きます。</td>
		</tr>
		<tr>
			<th>ファイルを保存</th>
			<td>
				<div class="border-separator">ファイルを保存します。</div>「:w &lt;enter&gt;」
				<p>「$ :w file1.txt &lt;enter&gt;」とするとfile1.txtという名前で保存されます。</p>
			</td>
		</tr>
	</tbody>
</table>
<h2>Vimの編集・操作</h2>
<table class="exp">
	<tbody>
		<tr>
			<th>カーソルを左へ</th>
			<td>
				<ul class="x">
					<li>「h」</li>
					<li>「&larr;」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>カーソルを右へ</th>
			<td>
				<ul class="x">
					<li>「l」</li>
					<li>「&rarr;」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>カーソルを上へ</th>
			<td>
				<ul class="x">
					<li>「k」</li>
					<li>「&uarr;」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>カーソルを下へ</th>
			<td>
				<ul class="x">
					<li>「j」</li>
					<li>「&darr;」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>文字を削除</th>
			<td>
				<ul class="x">
					<li>「x」</li>
				</ul>
				<p class="r">「backspace」では削除できません。</p>
			</td>
		</tr>
		<tr>
			<th>１単語前に移動</th>
			<td>
				<ul class="x">
					<li>「b」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>１単語先に移動</th>
			<td>
				<ul class="x">
					<li>「w」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>１単語前に移動<br />(スペース区切り)</th>
			<td>
				<ul class="x">
					<li>「B」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>１単語先に移動<br />(スペース区切り)</th>
			<td>
				<ul class="x">
					<li>「W」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>行頭へ移動</th>
			<td>
				<ul class="x">
					<li>「0」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>行末へ移動</th>
			<td>
				<ul class="x">
					<li>「$」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>１行目に移動</th>
			<td>
				<ul class="x">
					<li>「gg」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>最後の行へ移動</th>
			<td>
				<ul class="x">
					<li>「G」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>n行目へ移動</th>
			<td>
				<ul class="x">
					<li>「nG」</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>
<h2>デリート・プット・ヤンク</h2>
デリート・ヤンク・プットは通常のエディタにおいてはそれぞれ以下の名称で知られています。
<br /><br />
<table border="1" class="x" id="delete-yank-put">
	<thead>
		<tr>
			<td>一般的なエディタ</td>
			<td>Vimエディタ</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>カット</td>
			<td>デリート(d)</td>
		</tr>
		<tr>
			<td>ペースト</td>
			<td>プット(p)</td>
		</tr>
		<tr>
			<td>コピー</td>
			<td>ヤンク(y)</td>
		</tr>
	</tbody>
</table>
<br />
<h3>デリート(d)</h3>
「x」コマンドと機能は似ていますが、デリート(d)コマンドでは削除する範囲を指定して実行します。<br /><br />削除範囲の指定には以下の方法があります。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>d0</th>
			<td>行頭までを削除</td>
		</tr>
		<tr>
			<th>d$</th>
			<td>行末までを削除</td>
		</tr>
		<tr>
			<th>dl</th>
			<td>１文字削除</td>
		</tr>
		<tr>
			<th>dw</th>
			<td>１単語を削除</td>
		</tr>
		<tr>
			<th>dgg</th>
			<td>最初の行までを削除</td>
		</tr>
		<tr>
			<th>dG</th>
			<td>最終行までを削除</td>
		</tr>
	</tbody>
</table>
<h3>プット(p)</h3>
デリートで削除したテキストをペーストします。<br /><br />ペースト先にカーソルを合わせて「p」を押します。
<h3>ヤンク(y)</h3>
デリートがテキストを削除してその内容をコピーするのに対して、ヤンクではテキストを削除せずに内容をコピーします。<br /><br />コマンドの実行方法はデリートコマンドの「d」を「y」に置き換えて実行します。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>y0</th>
			<td>行頭までを削除</td>
		</tr>
		<tr>
			<th>y$</th>
			<td>行末までを削除</td>
		</tr>
		<tr>
			<th>yl</th>
			<td>１文字削除</td>
		</tr>
		<tr>
			<th>yw</th>
			<td>１単語を削除</td>
		</tr>
		<tr>
			<th>ygg</th>
			<td>最初の行までを削除</td>
		</tr>
		<tr>
			<th>yG</th>
			<td>最終行までを削除</td>
		</tr>
	</tboyy>
</table>
<h2>アンドゥ・リドゥ</h2>
Vimエディタでは、コマンドの取り消し(アンドゥ)と再度実行(リドゥ)が可能です。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>アンドゥ</th>
			<td>
				<ul class="x">
					<li>「u」</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>リドゥ</th>
			<td>
				<ul class="x">
					<li>「ctrl」 + 「r」</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>
<h2>検索と置換</h2>
ファイル内のある文字列を検索する、ないしはある文字列を他の文字列に置き換えるコマンドについて説明します。
<h3>検索</h3>
ファイル内のある文字列を検索します。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>「?検索文字列」</th>
			<td>検索文字列を<strong>上方向に向かって</strong>検索します。</td>
		</tr>
		<tr>
			<th>「/検索文字列」</th>
			<td>検索文字列を<strong>下方向に向かって</strong>検索します。</td>
		</tr>
	</tbody>
</table>
<br />複数の検索結果が存在する場合には、「N」コマンドでひとつ前の検索結果へ、「n」コマンドでひとつ先の検索結果へ移動します。
<h3>置換</h3>
<code class="linux">
	%s/置換前文字列/置換先文字列
</code>
で文字列の置換が可能です。
<h3>正規表現</h3>
検索にせよ、置換にせよ、ピンポイントでの文字列の指定では不十分な場合があります。<br />このような場面では正規表現を使用します。<br /><br />例えば、「初めまして！私の名前はkokoで、誕生日は10月25日です。」という文字列の中から何月何日の部分だけを検索・置換する時には正規表現を用います。<br /><br />正規表現については<a href="../../正規表現入門/branch">正規表現入門ページ</a>を参照してください。
<?php footer(); ?>