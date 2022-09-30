<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-25",
	"updated" => "2022-03-25"
);
head($obj);
?>

<h2>マルチメディア</h2>
テキストデータに加えて、音声・画像(静止画・動画)などの様々な形態のアナログ情報をディジタル化し、コンピュータ上で統合的に扱う技術を言います。
<h3>静止画像</h3>
静止画像を扱う規格には以下のものがあります。
<table>
	<tbody>
		<tr>
			<th>jpeg</th>
			<td>24ビットフルカラーで色を記録する、非不可逆圧縮方式の静止画像フォーマットです。</td>
		</tr>
		<tr>
			<th>gif</th>
			<td>256色まで扱うことができる静止画像フォーマットです。<br />可逆圧縮方式を採用しています。</td>
		</tr>
		<tr>
			<th>png</th>
			<td>48ビットフルカラーを表現可能な静止画像フォーマットです。<br />可逆圧縮方式です。</td>
		</tr>
		<tr>
			<th>bmp</th>
			<td>Windowsにおける標準的な静止画像フォーマットです。<br />圧縮しないため、データが大きくなりがちです。</td>
		</tr>
		<tr>
			<th>webp</th>
			<td>googleが近年開発した次世代静止画像フォーマットです。<br />上記のフォーマットの後継として期待されています。</td>
		</tr>
	</tbody>
</table>
<h3>動画像</h3>
動画像を扱う規格には以下のものがあります。
<table>
	<tbody>
		<tr>
			<th>mpeg-1</th>
			<td>数Mビット/秒の転送速度です。<br />ビデオCDに用いられています。</td>
		</tr>
		<tr>
			<th>mpeg-2</th>
			<td>数十ビット/秒の転送速度です。<br />DVD-Videoやディジタル放送で使用されています。</td>
		</tr>
		<tr>
			<th>mpeg-4</th>
			<td>数百ビット/秒の転送速度です。<br />動画配信・TV電話に使用されています。</td>
		</tr>
	</tbody>
</table>
<h3>音声</h3>
音を扱う規格には以下のものがあります。
<table>
	<tbody>
		<tr>
			<th>PCM</th>
			<td>音声を「サンプリング化 &rarr; 量子化 &rarr; 符号化」することでディジタル信号に変換します。</td>
		</tr>
		<tr>
			<th>MP3</th>
			<td>mpegのうち、音声部分に関する圧縮方式を言います。</td>
		</tr>
	</tbody>
</table>
<h2>情報の圧縮と伸張</h2>
あるファイルに関してデータ量を小さくするために圧縮することがあります。<br />主にネットワークを介してデータを送受信する際の負荷軽減として使用されます。<br /><br />代表的なデータの圧縮方法には以下の2通りあります。
<ul>
	<li>ZIP</li>
	<li>LZH</li>
</ul>
また、複数のファイルをひとつにまとめることを<strong>アーカイブ</strong>と呼び、アーカイブを実行するプログラムを<strong>アーカイバ</strong>と呼びます。
<h2>グラフィックス処理</h2>
コンピュータで色を表現する方法には以下の方法があります。
<ul>
	<li>RGB</li>
	<li>CMY</li>
	<li>HSL</li>
	<li>HSV</li>
</ul>
ここでは、光の三原色の基本となるRGBと、色の三原色の基本となるCMYについて説明します。
<table>
	<thead>
		<tr>
			<th width="50%">RGB</th>
			<th width="50%">CMY</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>光の三原色<br />(加法混色)</th>
			<th>色の三原色<br />(減法混色)</th>
		</tr>
		<tr>
			<td>
				<ul>
					<li>R: Red(赤)</li>
					<li>G: Green(緑)</li>
					<li>B: Blue(青)</li>
				</ul>
			</td>
			<td>
				<ul>
					<li>C: Cyan(シアン)</li>
					<li>M: Magenta(マゼンタ)</li>
					<li>Y: Yellow(黄色)</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td><img src="../pics/加法混色.png" alt="加法混色" /></td>
			<td><img src="../pics/減法混色.png" alt="減法混色" /></td>
		</tr>
		<tr>
			<td>ディスプレイ</td>
			<td>プリンタ</td>
		</tr>
	</tbody>
</table>
<p>混色の説明画像は<a href="https://www.dataplan.jp/blog/design/456">dataplan.jp</a>のHPに掲載されているものを使用しました。</p>
<h2>マルチメディア技術の応用</h2>
近年では、マルチメディア技術を応用した以下の技術に注目が集まっています。
<table>
	<tbody>
		<tr>
			<th>CG</th>
			<td>「Computer Graphics」の略で、コンピュータを用いて画像処理を行う技術を言います。</td>
		</tr>
		<tr>
			<th>VR</th>
			<td>「Virtual Reality」の略で、仮想現実と訳されます。<br />CGを用いて現実世界のイメージに似た仮想的な世界をコンピュータで再現する技術を言います。</td>
		</tr>
		<tr>
			<th>AR</th>
			<td>「Augmented Reality」の略で、拡張現実と訳されます。<br />現実世界の情報にコンピュータによる仮想的な情報を組み合わせる技術を言います。</td>
		</tr>
		<tr>
			<th>4K/8K</th>
			<td>
				次世代の映像規格で現行ハイビジョンを超える超高画質の映像です。<br />映像の高精細化だけでなく、次に示す4つの特徴により、従来実現出来なかった色彩豊かでなめらかな表現を可能にします。
				<ul>
					<li>広色域化</li>
					<li>画像の高速表示</li>
					<li>多階調表現</li>
					<li>輝度</li>
				</ul>
				<p>参考元は<a href="https://www.soumu.go.jp/menu_seisaku/ictseisaku/housou_suishin/4k8k_suishin/about.html">こちら</a>。</p>
			</td>
		</tr>
	</tbody>
</table>
<h2>web技術</h2>
ユーザが簡単に求める情報にアクセスできるようにする技術を紹介します。
<table>
	<tbody>
		<tr>
			<th>ハイパメディア</th>
			<td>webページ上のテキストやオブジェクト(図・画像・etc...)にクリックすると他のページへ遷移するハイパリンクを埋め込むことを可能にします。<br />これにより、ページ間の遷移が容易になります。</td>
		</tr>
		<tr>
			<th>ストリーミング</th>
			<td>データを全てダウンロードしてから再生するのではなく、ダウンロードしながら再生する仕組みを言います。<br />ユーザに不要な待ち時間を与えることがなくなります。</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>