<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"title" => "ディレクトリ管理",
	"made" => "2021-11-20",
	"updated" => "2021-11-20"
);
head($obj);
?>
<h2>ディレクトリとファイル</h2>
情報(データ)は全て<strong>ファイル</strong>として保存されますが、このファイルを効率的に管理するために<strong>ディレクトリ</strong>が用いられます。<br />以下でディレクトリとファイルについて説明します。
<br /><br />
<table class="exp">
	<thead>
		<tr>
			<td width="50%">ファイル</td>
			<td width="50%">ディレクトリ</td>
		</tr>
		</thead>
	<tbody>
		<tr>
			<td>いわゆる、データのことです。<br />linuxを構成するプログラムも画像も動画も文書も全てはファイルとして扱われます。</td>
			<td>ファイルをまとめて管理する入れ物のことです。<br />windowsやMacOSでは<strong>フォルダ</strong>と呼ばれていますが、linuxではディレクトリという名称が用いられることが多いため、ここでもディレクトリと呼びます。</td>
		</tr>
	</tbody>
</table>
<br />
linux(他の主要なOSも同様)でのディレクトリの構造は以下のようになっています。
<img src="../pics/ディレクトリ構造.png" alt="linuxのディレクトリ構造" />
ディレクトリが複数のディレクトリとファイルを保有して、下位のディレクトリもさらに下位のディレクトリやファイルを保有して、、、という構造(木構造)をとっています。
<h2>パス</h2>
パスとは「path(道のり)」の意味でディレクトリ内で特定のディレクトリ・ファイルを指定するためのストレージ内の住所です。<br /><br>一般にパスは各ディレクトリを「<strong>/(スラッシュ)</strong>」でで区切って表記します。
<p class="r">windowsでは「/(スラッシュ)」ではなく、「<span class="sublimetext">\</span>(バックスラッシュ)」、文字コードによっては「<span class="kyokasho">\(円マーク)</span>」が用いられます。</p>
<h3>パス指定</h3>
パスを指定する方法には以下の2つがあります。
<br /><br />
<table class="exp">
	<thead>
		<tr>
			<td width="50%">絶対パス指定</td>
			<td width="50%">相対パス指定</td>
		</tr>
		</thead>
	<tbody>
		<tr>
			<td><span class="u">ルートディレクトリを起点として</span>パスを指定します。</td>
			<td><span class="u">カレントディレクトリを起点として</span>パスを指定します。<br /><br />「.」はカレントディレクトリを表し、「..」は親ディレクトリを表します。<br />ひとつ上のディレクトリは「../」、2つ上のディレクトリは「../../」で表します。</td>
		</tr>
	</tbody>
</table>
<p class="r">現在自分が作業しているディレクトリを<strong>カレントディレクトリ(ワーキングディレクトリ)</strong>と呼びます。</p>
<h2>ディレクトリの種類</h2>
linuxでのディレクトリは一番上にあるディレクトリ(<strong>ルートディレクトリ</strong>)を頂点としたディレクトリ構造をとりますが、ここではルートディレクトリの下位にあるlinuxにおいて重要な役割を果たすディレクトリを紹介します。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>bin</th>
			<td>コマンド実行用のファイルを保存しています。<br />linuxの基礎となるコマンドを格納しています。</td>
		</tr>
		<tr>
			<th>sbin</th>
			<td>rootユーザ用ののコマンドを保存しているbinディレクトリです。</td>
		</tr>
		<tr>
			<th>dev</th>
			<td>デバイスファイルを格納するディレクトリです。</td>
		</tr>
		<tr>
			<th>etc</th>
			<td>設定ファイルを保存するディレクトリです。</td>
		</tr>
		<tr>
			<th>home</th>
			<td>ユーザごとに割り当てるホームディレクトリを格納するディレクトリです。</td>
		</tr>
		<tr>
			<th>temp</th>
			<td>一時的なファイルを保有するディレクトリです。</td>
		</tr>
		<tr>
			<th>usr</th>
			<td>アプリケーション用のファイルを保存するディレクトリです。</td>
		</tr>
		<tr>
			<th>var</th>
			<td>ログファイルやキャッシュファイルなどの一時的なファイルを保存するファイルです。</td>
		</tr>
	</tbody>
</table>
<br />
<h2>ディレクトリ操作コマンド</h2>
ディレクトリを操作するコマンドは以下のものがあります。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>pwd</th>
			<td>
				<div class="border-separator">カレントディレクトリを表示します。</div>
				「$ pwd」<br />->例) 「/home/ubuntu」と表示されます。
			</td>
		</tr>
		<tr>
			<th>cd</th>
			<td>
				<div class="border-separator">カレントディレクトリを変更します。</div>
				「$ cd /ubuntu」<br />->homeディレクトリからubuntuディレクトリに移動します。<br /><br />「$ cd ~」でホームディレクトリへ移動します。
				<p class="r">「~(チルダ)」はホームディレクトリを表します。</p>
				<p class="r">「$ cd」(引数なし)でcdコマンドを実行してもホームディレクトリへ移動できます。</p>
			</td>
		</tr>
		<tr>
			<th>ls</th>
			<td>
				<div class="border-separator">ディレクトリ内のファイルを表示します。</div>
				「$ ls」<br />->「bin   cdrom  etc   lib    lib64 ...」と表示されます。
			</td>
		</tr>
		<tr>
			<th>touch</th>
			<td>
				<div class="border-separator">ファイルを作成します。</div>
				「$ touch file1 file2」<br />->file1とfile2ファイルを作成します。
			</td>
		</tr>
		<tr>
			<th>mkdir</th>
			<td>
				<div class="border-separator">ディレクトリを作成します。</div>
				「$ mkdir dir1 dir2」<br />->dir1とdir2ディレクトリが作成されます。
				<p>オプション「-p」を付けて実行すると、その途中にあるディレクトも含めて作成します。</p>
			</td>
		</tr>
		<tr>
			<th>rm</th>
			<td>
				<div class="border-separator">ファイル(ディレクトリ)を削除します。</div>
				「$ rm file1 file2」<br />->file1とfile2ファイルを削除します。
				<P>オプションに「-r」を付けるとディレクトリ全体(ディレクトリの中のファイルを含む)を削除します。</p>
			</td>
		</tr>
		<tr>
			<th>rmdir</th>
			<td>
				<div class="border-separator"><span class="u">空の</span>ディレクトリを削除します。</div>
				「$ rmdir dir1 dir2」<br />->dir1とdir2ディレクトリを削除します。
				<P>中にファイルがあるディレクトリは削除できません。</p>
			</td>
		</tr>
		<tr>
			<th>cat</th>
			<td>
				<div class="border-separator">ファイルを表示します。</div>
				「$ cat file1」<br />->file1の中身を出力します。
				<P>引数を複数設定すると、それらのファイルを結合した内容を出力します。</p>
				<P>オプションに「-n」を付けると行番号を表示します。</p>
			</td>
		</tr>
		<tr>
			<th>rmdir</th>
			<td>
				<div class="border-separator"><span class="u">空の</span>ディレクトリを削除します。</div>
				「$ rmdir dir1 dir2」<br />->dir1とdir2ディレクトリを削除します。
				<P>中にファイルがあるディレクトリは削除できません。</p>
			</td>
		</tr>
		<tr>
			<th>cp</th>
			<td>
				<div class="border-separator">ファイルをコピーします。</div>
				「$ cp file1 file2」<br />->file1をfile2という名前でコピーします。
				<P>file2にディレクトリを指定した場合はそのディレクトリの中に同一名でコピーします。</p>
				<P>オプションで「-r」を付けるとディレクトリのコピーが可能になります。</p>
			</td>
		</tr>
		<tr>
			<th>mv</th>
			<td>
				<div class="border-separator">ファイルを移動します。</div>
				「$ move file1 file2 dir1」<br />->file1とfile2をdir2に移動します。
				<P>file2にディレクトリを指定した場合はそのディレクトリの中に同一名でコピーします。</p>
				<P>オプションで「-r」を付けるとディレクトリのコピーが可能になります。</p>
			</td>
		</tr>
	</tbody>
</table>
<h2>リンク</h2>
linuxでのリンクはその性質によって以下の2つに分類されます。
<br /><br />
<table class="exp">
	<thead>
		<tr>
			<td width="50%">ハードリンク</td>
			<td width="50%">シンボリックリンク</td>
		</tr>
		</thead>
	<tbody>
		<tr>
			<td>リンクというよりは、ファイルに別名をつける感じに近いです。<br />ハードリンクが削除されても名前が1つなくなっただけで元のファイルは削除されません。<br />ファイルが削除されるのはハードリンクが全て削除された時です。</td>
			<td>windowsでいうショートカットです。<br />あくまでもファイルへの参照機能を持つだけなので、シンボリックリンクが削除されてもファイルそのものは削除されません。<br />ファイルそのものを削除した際には、シンボリックリンクは壊れて機能しなくなります。</td>
		</tr>
		<tr>
			<td>「$ ln file1 file2」<br />->file1のシンボリックリンクであるfile2を作成します。</td>
			<td>「$ ln -s file1 file2」<br />->file1に対するシンボリックリンクであるfile2を作成します。</td>
		</tr>
	</tbody>
</table>
<h2>ファイル探索</h2>
ファイルを探索するには以下の2つのコマンドが用いられます。<br />
<ul>
	<li>find</li>
	<li>locate</li>
</ul>
<h3>findコマンド</h3>
findコマンドは「$ find 検索ディレクトリ 検索条件 アクション」から構成されます。<br /><br />具体的には以下のように実行します。
<code class="linux">
	$ find . -name file1.txt -print
</code>
<table class="exp2">
	<tbody>
		<tr>
			<td>検索ディレクトリ<br />「.」</td>
			<td>検索するディレクトリを指定します。<br />ここでは、「.」(カレントディレクトリ)から検索しています。</td>
		</tr>
		<tr>
			<td>検索条件<br />「-name file1.txt」</td>
			<td>
				「-name」でファイル名を条件に設定しています。<br />「-iname」とすると大文字小文字を区別しないで検索します。<br /><br />「-type」とするとファイルの種類で検索します。
				<br />
				<ul>
					<li>-type f(通常のファイル)</li>
					<li>-type d(ディレクトリ)</li>
					<li>-type l(シンボリックリンク)</li>
				</ul>
				<p class="r">複数の検索条件を設定する際には「-a」で結合して入力します。<br />「-type f -a -name file1.txt」</p>
			</td>
		</tr>
		<tr>
			<td>アクション<br />「-print」</td>
			<td>「-print」でパスを表示するアクションを指定しています。<br />アクションを指定しなかった場合は「-print」が実行されます。</td>
		</tr>
	</tbody>
</table>
<h3>locate</h3>
findコマンドがストレージをスキャンしてファイル検索を行うのに対して、<span class="u">locateコマンドでは専用のファイル名データベースを用いてファイルを検索するため高速な検索が可能です。</span><br /><br />locateコマンドは「$ locate オプション 検索パターン」から構成されます。
<code class="linux">
	$ locate -i file1.txt
</code>
<p class="r">locateコマンドはfindコマンドと異なりデータベース検索を行うため高速な検索が可能と説明しましたが、データベースに反映されていない最新のファイルは検索できないことに注意してください。</p>
次はlinuxで用いられるメモ帳(エディタ)である<strong>Vim</strong>について説明します。
<?php footer(); ?>