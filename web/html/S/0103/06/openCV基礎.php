<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-03-10",
	"updated" => "2022-03-10"
);
head($obj);
?>
<h2>画像のインポート</h2>
画像は以下のようにインポートします。
<code class="python">
	img = cv2.imread("ファイルへのパス.png")
	cv2.imshow("image", img)
	cv2.waitKey(0) # キーボードから文字が入力されるまで表示
	cv2.destroyAllWindows() # 画面全体を削除
</code>
これ以降はcaptchaを解析するプログラムを想定するため、以下の画像を使用します。
<img src="../pics/captcha.png" alt="captcha" />
ではこれを読み込んで表示してみましょう♪
<code class="python">
	img = cv2.imread("captcha.png")
	cv2.imshow("image", img)
	cv2.waitKey(0) # キーボードから文字が入力されるまで表示
	cv2.destroyAllWindows() # 画面全体を削除
</code>
<img src="../pics/単純表示.png" alt="画像の表示" />
<div class="separator"></div>
imgに格納されるデータは3次元配列のデータで、第一の配列は縦(y)を表し、第二の配列は横(x)を表し、第三の配列は色情報を表します。
<code class="python">
	img = cv2.imread("captcha.png")
	print(img[20][80])

	# ***** コンソール *****
	# [100 162  69]
	# ***** ******** ******
</code>
これは「80x20」の地点の色はBGRで「100, 162, 69」であることを意味します。
<h2>画像のリサイズ</h2>
先ほどの画像はかなり小さいので処理が見にくいですね、、、<br />これを拡大してみましょう♪<br />以下のように書きます。
<code class="python">
	cv2.resize(img, dsize=(横幅, 縦幅))
</code>
これはリサイズ後のサイズを絶対的に指定しますが、元のサイズからの比率で指定することもできます。
<code class="python">
	cv2.resize(img, dsize=None, fx=横の倍率, fy=縦の倍率)
</code>
この場合はdsize引数に「None」を指定する必要があります。<br /><br />また、リサイズに関して、「interpolation」引数でその処理の仕方を指定することもできます。
<div class="scroll-600w">
	<table>
		<caption>interpolation</caption>
		<tbody>
			<tr>
				<th>cv2.INTER_NEAREST</th>
				<td>最近傍補間</td>
			</tr>
			<tr>
				<th>cv2.INTER_LINEAR</th>
				<td>バイリニア補間</td>
			</tr>
			<tr>
				<th>cv2.INTER_CUBIC</th>
				<td>バイキュービック補間</td>
			</tr>
			<tr>
				<th>cv2.INTER_AREA</th>
				<td>ピクセル領域の関係を利用したリサンプリング</td>
			</tr>
			<tr>
				<th>cv2.INTER_LANCZOS4</th>
				<td>Lanczos 補間</td>
			</tr>
		</tbody>
	</table>
</div>
数学的な知識が必要なのでここでは理解しなくてok!です。<br />最も一般的な「cv2.INTER_NEAREST」を使用しましょう♪<br />では、先ほどの画像を「200x80」で表示してみましょう♪
<code class="python">
	img = cv2.imread("captcha.png")
	img = cv2.resize(img, dsize=(200, 80))
	cv2.imshow("image", img)
	cv2.waitKey(0)
	cv2.destroyAllWindows()
</code>
<img src="../pics/リサイズ(絶対).png" alt="画像のリサイズ" />
次は3倍にして表示してみましょう♪
<code class="python">
	img = cv2.imread("captcha.png")
	img = cv2.resize(img, dsize=None, fx=3, fy=3)
	cv2.imshow("image", img)
	cv2.waitKey(0)
	cv2.destroyAllWindows()
</code>
<img src="../pics/リサイズ(相対).png" alt="画像のリサイズ" />
<h2>色の認識変換</h2>
色は一般的にはRGB(Red, Green, Blue)で表されますが、それ以外にもBGRやHSVなどの表記も可能です。<br />openCVではimreadメソッドで画像ファイルを読み込む際にはBGRが採用されます。<br />後々、使用する時のためにこれを変更しましょう♪
<code class="python">
	cv2.cvtColor(img, モード)
</code>
<div class="scroll-600w">
	<table>
		<caption>ctvColorモード</caption>
		<tbody>
			<tr>
				<th>cv2.COLOR_BGR2RGB</th>
				<td>BGRからRGBへ</td>
			</tr>
			<tr>
				<th>cv2.COLOR_RGB2BGR</th>
				<td>RGBからBGRへ</td>
			</tr>
			<tr>
				<th>cv2.COLOR_BGR2HSV</th>
				<td>BGRからHSVへ</td>
			</tr>
			<tr>
				<th>cv2.COLOR_HSV2BGR</th>
				<td>BGRからHSVへ</td>
			</tr>
			<tr>
				<th>cv2.COLOR_BGR2GRAY</th>
				<td>モノクロへ</td>
			</tr>
		</tbody>
	</table>
</div>
では、色認識を変換してみましょう♪
<code class="python">
	img = cv2.imread("captcha.png")
	img = cv2.resize(img, dsize=None, fx=3, fy=3)
	img = cv2.cvtColor(img, cv2.COLOR_BGR2HSV)
	cv2.imshow("image", img)
	cv2.waitKey(0)
	cv2.destroyAllWindows()
</code>
<img src="../pics/COLOR_BGR2HSV.png" alt="色変換" />
これはあくまでもこの後の処理のためのもので、実際に表示する際にはBGRへ戻す必要があります。<br />pillow(PIL)などの他のライブラリと併用する際にこれらの調和のために使用されることが多いですが、HSVなどに変換すれば彩度や明度などの処理もできるようになるため、ここではとりあえずHSVに変換して使用します。
<h2>画像の2値化</h2>
画像の色をある条件で2色に設定します。<br />以下のように書きます。
<code class="python">
	cv2.inRange(img, (f1, f2, f3), (t1, t2, t3))
</code>
「f1 &lt; t1」「f2 &lt; t2」「f3 &lt; t3」全てを満たした場合に255(白)とし、それ以外は全て0(黒)とします。<br /><br />では、captcha画像の数字を表している部分とそれ以外の部分で2値化してみましょう♪<br />カラーピッカーを用いて良い感じに指定します。
<img src="../pics/カラーピッカー.gif" alt="カラーピッカー" />
また、色は全て「0 ～ 255」で指定する必要があることに注意してください。
<code class="python">
	img = cv2.imread("captcha.png")
	img = cv2.resize(img, dsize=None, fx=3, fy=3)
	img = cv2.cvtColor(img, cv2.COLOR_BGR2HSV_FULL)
	img = cv2.inRange(img, np.array([100*0.7, 60*2.5, 50*2.5]), np.array([180*0.7, 80*2.5, 60*2.5]))
	cv2.imshow("image", img)
	cv2.waitKey(0)
	cv2.destroyAllWindows()
</code>
「*0.7」「*2.5」とするのは、HSVでは「360, 100, 100」で指定することが多いからです。
<img src="../pics/2値化.png" alt="2値化" />
2値化の方法としてthresholdを使用する方法もありますが、inRangeを使用すればカバーできるためここでは説明しません。
<h2>画像の反転</h2>
先ほどは数字を表す部分を白で、それ以外を黒で表しました。<br />これを反転してみましょう♪<br />以下のように書きます。
<code class="python">
	img = cv2.bitwise_not(img)
</code>
では、実際の画像に適用してみましょう♪
<code class="python">
	img = cv2.imread("captcha.png")
	img = cv2.resize(img, dsize=None, fx=3, fy=3)
	img = cv2.cvtColor(img, cv2.COLOR_BGR2HSV_FULL)
	img = cv2.inRange(img, np.array([100*0.7, 60*2.5, 50*2.5]), np.array([180*0.7, 80*2.5, 60*2.5]))
	img = cv2.bitwise_not(img)
	cv2.imshow("image", img)
	cv2.waitKey(0)
	cv2.destroyAllWindows()
</code>
<img src="../pics/画像の反転.png" alt="bitwise_not 画像の反転" />
これは主に2値化された画像に対して使用します。
<div class="separator"></div>
とりあえず、このページはここで終了します。
<?php footer(); ?>