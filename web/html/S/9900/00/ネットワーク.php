<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-25",
	"updated" => "2022-03-25"
);
head($obj);
?>

<h2>LANとWAN</h2>
ネットワークはその性質からLANとWANに分類できます。
<table>
	<thead>
		<tr>
			<th width="50%">LAN</th>
			<th width="50%">WAN</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>「Local Area Network」の略で、企業や学校単位でのネットワークを言います。</td>
			<td>「Wide Area Network」の略で、LAN同士を相互に接続して世界全体のLANをつないだネットワークを言います。<br />通称、インターネットです。</td>
		</tr>
	</tbody>
</table>
<h3>LANの構築方法</h3>
LANの構築方法には無線と有線の2パターンあります。<br />特に無線LANは近年主流になっていますが、無線LANの最も有名な企画がWi-Fiです。
<h2>通信プロトコル</h2>
プロトコルとはコンピュータ間での通信を行う際の規約・規格を言います。<br />通信プロトコルはISOによって標準化されています。
<div class="scroll-600w">
	<table>
		<caption>OSI基本参照モデル</caption>
		<tbody>
			<tr>
				<th>7</th>
				<th>アプリケーション層</th>
				<td>アプリケーション同士でデータをやり取りする際の規格。</td>
			</tr>
			<tr>
				<th>6</th>
				<th>プレゼンテーション層</th>
				<td>圧縮形式や文字コードに関する規定。</td>
			</tr>
			<tr>
				<th>5</th>
				<th>セション層</th>
				<td>通信開始から通信終了までの規定。</td>
			</tr>
			<tr>
				<th>4</th>
				<th>トランスポート層</th>
				<td>通信の品質をコントロールするための規格。</td>
			</tr>
			<tr>
				<th>3</th>
				<th>ネットワーク層</th>
				<td>データも転送回路を選択するための規格。</td>
			</tr>
			<tr>
				<th>2</th>
				<th>データリンク層</th>
				<td>直接接続された機器同士の通信を実現するための規格。</td>
			</tr>
			<tr>
				<th>1</th>
				<th>物理層</th>
				<td>電気信号を交換するための規格。</td>
			</tr>
		</tbody>
	</table>
</div>
<h2>TCP/IP</h2>
インターネットで最も一般的に用いられているプロトコル体系です。<br />トランスポート層の「TCP」とネットワーク層の「IP」によって構成されています。
<table>
	<tbody>
		<tr>
			<th>TCP</th>
			<td>プログラム間で適切な品質の通信を実現するためのプロトコルです。<br />ポート番号を用いて各プログラムを管理します。</td>
		</tr>
		<tr>
			<th>IP</th>
			<td>端末から端末へデータを届けるための経路選択や中継を行うためのプロトコルです。<br />IPアドレスを用いて各端末を管理します。</td>
		</tr>
	</tbody>
</table>
<h3>インターネット関連プロトコル</h3>
インターネット(TCP/IP)に関して使用されるプロトコルを紹介します。
<table>
	<tbody>
		<tr>
			<th>HTTP</th>
			<td>「HyperText Transfer Protocol」の略で、webサーバとwebブラウザ間でWWWデータのやり取りを行うためのプロトコルです。</td>
		</tr>
		<tr>
			<th>FTP</th>
			<td>「File Transfer Protocol」の略で、ファイルの送受信を行うためのプロトコルです。</td>
		</tr>
		<tr>
			<th>SMTP</th>
			<td>「Simple Mail Transfer Protocol」の略で、電子メールを送信するためのプロトコルです。</td>
		</tr>
		<tr>
			<th>POP3</th>
			<td>「Post Officce Protocol3」の略で、電子メールを受信するためのプロトコルです。<br />メールはメールボックスからダウンロードされます。</td>
		</tr>
		<tr>
			<th>IMAP</th>
			<td>「Internat Message Access Protocol」の略で、電子メールを受信するためのプロトコルです。<br />メールはメールボックス上で管理されます。</td>
		</tr>
		<tr>
			<th>Telnet</th>
			<td>コンピュータを遠隔操作するためのプロトコルです。<br />内容が暗号化されていないため、仕様は非推奨です。</td>
		</tr>
		<tr>
			<th>SSH</th>
			<td>「Secure SHell」の略で、コンピュータを遠隔操作するためのプロトコルです。<br />内容が暗号化されて通信され、セキュリティ上安全であるため、Telnetの後継として使用されています。</td>
		</tr>
		<tr>
			<th>SNMP</th>
			<td>「Simple Network Management Protocol」の略で、ネットワーク機器を管理するためのプロトコルです。</td>
		</tr>
		<tr>
			<th>DHCP</th>
			<td>「Dynamic Host Configuration Protocol」の略で、IPアドレスの割り当てと回収を行うためのプロトコルです。</td>
		</tr>
		<tr>
			<th>NTP</th>
			<td>「Network Time Protocol」の略で、ネットワーク上の時間を同期させるためのプロトコルです。</td>
		</tr>
	</tbody>
</table>
<h2>IPアドレスとポート番号</h2>
TCP/IPではプログラムをホストを識別するためにIPアドレスをポート番号が使用されます。
<h3>IPアドレス</h3>
ネットワーク層でのホスト識別子として機能します。<br />以前は32ビットで指定するIPv4が使用されていましたが、アドレス空間が枯渇したことにより近年では128ビットで表すIPv6への移行が進んでいます。<br /><br />IPアドレスはネットワーク部とホスト部から構成され、IPアドレスのネットワーク部とホスト部を判別するために<strong>サブネットマスク</strong>が使用されます。
<div class="separator"></div>
ネットワーク上でのホストの識別子としてドメイン名も使用されます。<br />例えば、このサイトを管理しているサーバのIPアドレスは「<?php echo $_SERVER["REMOTE_ADDR"]; ?>」ですが、これでは分かりずらいですよね、、、<br />したがって、ドメイン名を使用します。<br />このサイトのドメイン名は「koko-campus.org」ですが、DNSというシステムを用いて「koko-campus.org」を「<?php echo $_SERVER["REMOTE_ADDR"]; ?>」に変換して使用しています。<br /><br />また、ドメイン名にスキームやパス名を加えたものをURLと呼びます。<br />このページのURLは「https://koko-campus.org/subjects/itパスポート試験/ver2022/ネットワーク」です。
<h3>ポート番号</h3>
ホスト上のプログラムを指定するための識別子です。<br />例えば、webサービス(HTTP)では「80」「443」が使用され、FTPでは「21」が使用されます。
<h2>電子メール</h2>
最近ではLINEやSlackなどのチャットアプリを使用することが増えてきていると思いますが、電子メールも未だに多く使用されています。<br />ということで、電子メールの仕様について学びましょう♪<br /><br />メールアドレスは以下のような構成です。
<img src="../pics/メールアドレス.png" alt="メールアドレス" />
<h3>メールアドレスの指定</h3>
また、メールアドレスの指定方法には以下の3通りあります。
<table>
	<tbody>
		<tr>
			<th>TO</th>
			<td>主な送信相手を指定します。</td>
		</tr>
		<tr>
			<th>CC</th>
			<td>主な送信先以外で、内容を通知する際に使用します。<br />CCで送信された場合は他の受信者からも見ることができます。</td>
		</tr>
		<tr>
			<th>BCC</th>
			<td>主な送信先以外で、内容を通知する際に使用します。<br />CCとの相違点は、送信された場合は他の受信者からも見ることができません。<br />最初の「B」は「Blind」を意味し、見えないという意味です。</td>
		</tr>
	</tbody>
</table>
<h3>メールの送信方法</h3>
メールを送信する際にはプロトコルに「SMTP」が使用され、受信される際には「POP3」または「IMAP」が使用されます。<br />POP3とIMAPは以下の違いがあります。
<table>
	<thead>
		<tr>
			<th width="50%">POP3</th>
			<th width="50%">IMAP</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>メールボックスからクライアント側に電子メールをダウンロードするためのプロトコルです。</td>
			<td>メールボックス上のメールを操作(閲覧・削除)するためのプロトコルです。</td>
		</tr>
	</tbody>
</table>
<h3>MIME</h3>
「Multipurpose Internet Mail Extensions」の略で、電子メールでバイナリデータをやり取りするための規格です。<br />MIMEのセキュリティを向上させたバージョンをS/MIMEと言います。
<h2>LAN</h2>
LANとWANの違いについてはすでに説明しましたね♪<br />LANとは1施設内だけで構成されたネットワークを言い、LANを組み合わせたものがWANです。<br /><br />WANに関しては、プロバイダがその役割を担っているため我々は詳細に理解する必要はありませんが、LANについては各企業・学校・家庭がそれぞれ構成するためこれに関する知識が必要になります。
<h3>LANの接続方法</h3>
LANの接続方法には以下の3通りあります。
<h4>バス型</h4>
<img src="../pics/バス型.png" alt="バス型" />
<h4>リング型</h4>
<img src="../pics/リング型.png" alt="リング型" />
<h4>スター型</h4>
<img src="../pics/スター型.png" alt="スター型" />
<h3>NICとMACアドレス</h3>
NICとは「Network Interface Card」の略で、コンピュータをネットワークに接続するための拡張装置です。<br />LANカードやLANボードとも呼ばれます。<br /><br />NICに付けられている識別子をMACアドレスと言い、LAN上でホストを識別する際に使用されます。
<h3>アクセスポイントとESSID</h3>
無線LANで用いられる中継機器のことを言い、アクセスポイントに接続する際に設定される識別子がESSIDです。
<h3>LAN間接続機器</h3>
ここではLANに関する機器を覚えましょう♪
<table>
	<tbody>
		<tr>
			<th>リピータ</th>
			<td>信号の増幅を行います。<br />有線LANを用いている際に、LAnケーブルの長さが約100mを超えるとリピータが必要となります。</td>
		</tr>
		<tr>
			<th>ブリッジ</th>
			<td>MACアドレスの情報からデータを必要な方向にだけ中継します。</td>
		</tr>
		<tr>
			<th>ルータ</th>
			<td>各機器のIPアドレスを基に、経路選択とデータ中継を行います。</td>
		</tr>
		<tr>
			<th>ゲートウェイ</th>
			<td>プロトコルの異なるネットワーク同士を接続します。</td>
		</tr>
	</tbody>
</table>
また、LAN内で多くの機器を相互接続するにはハブを用いて行います。<br />ハブには以下の種類があります。
<table>
	<tbody>
		<tr>
			<th>リピータハブ</th>
			<td>リピータと同じ役割を果たします。</td>
		</tr>
		<tr>
			<th>スイッチングハブ</th>
			<td>ブリッジと同じ役割を果たします。<br />レイヤ2スイッチとも呼ばれます。</td>
		</tr>
		<tr>
			<th>レイヤ3スイッチ</th>
			<td>ルータと同じ役割を果たします。</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>