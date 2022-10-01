<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"title" => "linux入門トップ",
	"made" => "2021-11-20",
	"updated" => "2021-11-20"
);
head($obj);
?>
<h2>linuxとは</h2>
WindowsやMacOS・Andoroid・iOSなどのクライアントを動かすOSと異なり、主に<span class="u">サーバを動かすためのOS</span>です。<br /><br />ワークステーションでおなじみ?のUNIXというOSの親戚にあたります。<br /><br />また、linuxには様々な<strong>ディストリビューション</strong>と呼ばれる種類が存在します。<br /><br />linuxディストリビューションは大きく以下のように分けられます。<br /><br />
<table class="exp">
	<thead>
		<tr>
			<td width="50%">RedHat系統</td>
			<td width="50%">Debian系統</td>
		</tr>
		</thead>
	<tbody>
		<tr>
			<td>
				<ul class="normal">
					<li>RHEL</li>
					<li>CentOS</li>
					<li>Fedora</li>
				</ul>
			</td>
			<td>
				<ul class="normal">
					<li>Ubuntu</li>
					<li>Debian GNU/Linux</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>
<br />
この中でもRedHat系統のCentOSは世界中から強い支持を受けて多く利用されていましたが、2021にCentOS8のサポートを終了すると2020年に発表して以来、ユーザがDebian系統のUbuntuに流れています。<br /><br />また、<a href="https://www.portal.euromonitor.com/">EuromonitorPassport</a>のデータによると、linuxディストリビューションの50%以上をUbuntuが占めているとされています。(2021年11月時点)<br /><br />そのため、ここではUbuntuをベースにlinuxを説明していきますが、他のlinuxディストリビューションもほとんど同じですので自分の好みに合ったlinuxディストリビューションを選択してください。
<h2>GUIとCLI</h2>
GUIとCLIとはそれぞれ、「グラフィカルユーザインターフェース」と「コマンドラインインターフェース」の略で、コンピュータの入出力の方法を言います。<br /><br />それぞれの特徴は以下の通りです。<br /><br />
<table class="exp">
	<thead>
		<tr>
			<td width="50%">GUI</td>
			<td width="50%">CLI</td>
		</tr>
		</thead>
	<tbody>
		<tr>
			<td>WindowsやMacOS・Android・iOSが該当して、主にマウスの操作を使用してコンピュータを動かします。</td>
			<td>linuxはCLIに該当します。<br /><br />イメージとしては、黒い画面にキーボードでカチャカチャ文字を打ち込んで操作する感じです。</td>
		</tr>
		<tr>
			<td>簡単で分かりやすい反面、効率的な処理が困難です。</td>
			<td>使いこなすのが難しいですが、使いこなせればとても効率的に処理できます。</td>
		</tr>
	</tbody>
</table>
<br />
<h2>SSH</h2>
「Secure SHell」の略で、外部にあるコンピュータを遠隔で操作するためのプロトコルです。<br /><br />VPSをインターネット会社と利用契約した際に、そのサーバを動かすためにわざわざサーバを管理している建物まで行きませんよね、、、<br /><small>(そもそも建物の敷地内にすら入れてもらえません笑)</small><br /><br />そのため、VPSを契約してサーバを操作する際には、SSHというプロトコルを用いて自宅からサーバを操作することになります。
<h3>ターミナルエミュレータ</h3>
SSHを実現するクライアントサイドのアプリケーションです。<br /><br />次のページで説明するシェルに接続するために用いられます。<br /><br />ターミナルエミュレータには以下のものがあります。<br />
<ul>
	<li>TeraTerm(windows)</li>
	<li>PuTTY(windows)</li>
	<li>iTerm(MacOS)</li>
</ul>
<br />
ここではTeraTermの使い方を簡単に説明しますね♪
<h4>TeraTerm</h4>
寺西高氏によって開発されたSSHクライアントアプリケーションです。<br /><br />※<a href="https://ja.osdn.net/projects/ttssh2/releases/">こちら</a>からダウンロードが可能です。<br /><br />ダウンロード完了後、サーバにSSHで接続するためには、以下の情報が求められます。<br />
<ul>
	<li>ホスト(接続先のIPアドレス・アドレス)</li>
	<li>プロトコル(SSH)</li>
	<li>ポート番号(22)</li>
	<li>ユーザ名</li>
	<li>パスフレーズ</li>
</ul>
<br />
認証が完了すると黒い画面に以下のような文字が表示されます。<br /><small>※黒い画面だと難しいイメージを抱く人が多いと思うのでこのサイトでは、背景白で表示します。</small>
<code class="linux">
	Welcome to Ubuntu 20.04.2 LTS (GNU/Linux 5.4.0-80-generic x86_64)

	* Documentation:  https://help.ubuntu.com
	* Management:     https://landscape.canonical.com
	* Support:        https://ubuntu.com/advantage

	System information as of Fri Nov 19 16:01:46 JST 2021

	System load:  0.0                Processes:             98
	Usage of /:   21.8% of 20.60GB   Users logged in:       1
	Memory usage: 31%                IPv4 address for ens3: 12.34.56.78
	Swap usage:   0%

	* Super-optimized for small spaces - read how we shrank the memory
	footprint of MicroK8s to make it the smallest full K8s around.

	https://ubuntu.com/blog/microk8s-memory-optimisation

	105 updates can be installed immediately.
	1 of these updates is a security update.
	To see these additional updates run: apt list --upgradable


	*** System restart required ***

	koko-campus project [Virtual Private Server SERVICE]

	Last login: Fri Nov 19 14:59:45 2021 from 12.34.56.78
	To run a command as administrator (user "root"), use "sudo &lt;command&gt;".
	See "man sudo_root" for details.

	ubuntu@tk2-216-17609:~$
	ubuntu@tk2-216-17609:~$
</code>
この画面が表示されればSHHログイン成功です。<br /><br />次はlinuxを動かすための機能について学びましょう♪
<?php footer(); ?>