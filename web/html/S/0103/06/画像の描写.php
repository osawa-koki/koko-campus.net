<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-03-10",
	"updated" => "2022-03-10"
);
head($obj);
?>
<h2>line</h2>
単純な線を引きます。<br />以下のように書きます。
<code class="python">
	cv2.line(img, pt1, pt2, color, thickness)
</code>
<div class="scroll-600w">
	<table>
		<caption>lineメソッドの引数</caption>
		<tbody>
			<tr>
				<th>img</th>
				<td>元の画像を指定します。<br />正確には画像データを配列化したものです。</td>
			</tr>
			<tr>
				<th>pt1, pt2</th>
				<td>始点と終点を指定します。<br />タプル形式で「(10, 20)」のように記述します。</td>
			</tr>
			<tr>
				<th>color</th>
				<td>色をBGRで指定します。</td>
			</tr>
			<tr>
				<th>thickness</th>
				<td>線の太さを指定します。</td>
			</tr>
		</tbody>
	</table>
</div>
では、「500x500」の真っ白の画像にお絵かきをしてみましょう♪
<code class="python">
	img = cv2.imread("template.png")

	cv2.line(img, (200, 200), (300, 300), (255, 0, 0), 3)
	cv2.line(img, (50, 450), (450, 50), (0, 0, 255), 10)
	cv2.line(img, (30, 100), (400, 100), (0, 255, 255), 50)

	cv2.imshow("koko's lesson", img)
	cv2.waitKey(0)
	cv2.destroyAllWindows()
</code>
<img src="../pics/line.png" alt="line" />
<h2>rectangle</h2>
使用方法はlineメソッドと同様です。
<code class="python">
	cv2.rectangle(img, pt1, pt2, color, thickness)
</code>
<code class="python">
	img = cv2.imread("template.png")

	cv2.rectangle(img, (200, 200), (300, 300), (255, 0, 0), 3)
	cv2.rectangle(img, (50, 450), (450, 50), (0, 0, 255), 10)
	cv2.rectangle(img, (30, 100), (400, 100), (0, 255, 255), 50)

	cv2.imshow("koko's lesson", img)
	cv2.waitKey(0)
	cv2.destroyAllWindows()
</code>
<img src="../pics/rectangle.png" alt="rectangle" />
<h2>circle</h2>
円を書きます。<br />以下のように記述します。
<code class="python">
	cv2.circle(img, center, radius, color, thickness)
</code>
<div class="scroll-600w">
	<table>
		<caption>circleメソッドの引数</caption>
		<tbody>
			<tr>
				<th>center</th>
				<td>円の中心を指定します。<br />「(x座標, y座標)」で指定します。</td>
			</tr>
			<tr>
				<th>radius</th>
				<td>円の半径を指定します。</td>
			</tr>
		</tbody>
	</table>
</div>
それ以外の引数は既に説明した通りです。
<code class="python">
	img = cv2.imread("template.png")

	cv2.circle(img, (200, 200), 50, (255, 0, 0), 3)
	cv2.circle(img, (50, 450), 100, (0, 0, 255), 10)
	cv2.circle(img, (300, 100), 150, (0, 255, 255), 50)

	cv2.imshow("koko's lesson", img)
	cv2.waitKey(0)
	cv2.destroyAllWindows()
</code>
<img src="../pics/circle.png" alt="circle" />
<h2>polylines</h2>
折れ線を引きます。<br />以下のように書きます。
<code class="python">
	cv2.polylines(img, pts, isClosed, color, thickness)
</code>
isClosed引数に「True」を指定すると始点と終点を結び、「False」を設定するとそのまま空いた折れ線が描写されます。<br />また、ptsでは描写する折れ線を表す点のリスト・配列を指定します。
<code class="python">
	img = cv2.imread("template.png")

	pts1 = np.array(((50, 100), (50, 300), (300, 300)))
	pts2 = np.array(((350, 250), (450, 450), (350, 450), (400, 400)))
	cv2.polylines(img, [pts1, pts2], isClosed=True, color=(255, 0, 0), thickness=5)

	cv2.imshow("koko's lesson", img)
	cv2.waitKey(0)
	cv2.destroyAllWindows()
</code>
<img src="../pics/polylines.png" alt="polylines" />
pts1とpts2の括弧が大量にありますが、一番外側の括弧はarrayメソッドの引数を囲む括弧で、その一つ内側の括弧は複数の点をまとめるための括弧で、一番内側の括弧は各点のx座標とy座標をまとまる括弧です。<br /><br />配列・リスト形式でもタプル形式でもok!です。<br />したがって、上のコードは以下のように書き換えられます。
<code class="python">
	img = cv2.imread("template.png")

	pts1 = np.array([[50, 100], [50, 300], [300, 300]])
	pts2 = np.array([(350, 250), (450, 450), (350, 450), (400, 400)])
	cv2.polylines(img, [pts1, pts2], isClosed=True, color=(255, 0, 0), thickness=5)

	cv2.imshow("koko's lesson", img)
	cv2.waitKey(0)
	cv2.destroyAllWindows()
</code>
<h2>fillPoly</h2>
polylinesの内側を塗りつぶすバージョンです。
<code class="python">
	cv2.fillPoly(img, pts, color)
</code>
<code class="python">
	img = cv2.imread("template.png")

	pts1 = np.array([[50, 100], [50, 300], [300, 300]])
	pts2 = np.array([(350, 250), (450, 450), (350, 450), (400, 400)])
	cv2.fillPoly(img, [pts1, pts2], color=(255, 0, 0))

	cv2.imshow("koko's lesson", img)
	cv2.waitKey(0)
	cv2.destroyAllWindows()
</code>
<img src="../pics/fillPoly.png" alt="fillPoly" />
<h2>putText</h2>
文字列を描画します。
<code class="python">
	cv.putText(img, text, org, fontFace, fontScale, color, thickness)
</code>
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>text</th>
				<td>描写する文字列を指定します。</td>
			</tr>
			<tr>
				<th>org</th>
				<td>描写する文字列の位置(左下)を指定します。</td>
			</tr>
			<tr>
				<th>fontFace</th>
				<td>
					フォントの種類を指定します。
					<img src="../pics/fontFace.png" alt="fontFace" />
					<p>引用元は<a href="https://docs.opencv.org/3.4.0/d0/de1/group__core.html">こちら</a>。</p>
				</td>
			</tr>
			<tr>
				<th>fontScale</th>
				<td>フォントの縮尺(デフォルトの何倍か)を表します。</td>
			</tr>
		</tbody>
	</table>
</div>
<img src="../pics/putText.png" alt="putText" />
<h2>copy</h2>
上で説明したメソッドは全て元のimgデータを変更します。<br />したがって、元のデータもそのまま残す場合には他の変数に保存する場合には単純な代入では参照がコピーされてしまうため、ngです。
<code class="python">
	img = cv2.imread("template.png")

	img2 = img # imgをimg2に代入

	cv2.circle(img, (200, 200), 50, (255, 0, 0), 3)
	cv2.circle(img, (50, 450), 100, (0, 0, 255), 10)
	cv2.circle(img, (300, 100), 150, (0, 255, 255), 50)

	cv2.imshow("koko's lesson", img2) # img2を表示
	cv2.waitKey(0)
	cv2.destroyAllWindows()
</code>
<img src="../pics/単純代入.png" alt="画像データのコピー" />
img2も変更されていることが確認できます。<br />img2はimgを参照しているため、imgが変更されればimg2も変更されるからです。<br /><br />では、値そのものをコピーしてみましょう♪<br />以下のように書きます。
<code class="python">
	img2 = img.copy()
</code>
これで、新しいimgデータを生成できます。
<code class="python">
	img = cv2.imread("template.png")

	img2 = img.copy()

	cv2.circle(img, (200, 200), 50, (255, 0, 0), 3)
	cv2.circle(img, (50, 450), 100, (0, 0, 255), 10)
	cv2.circle(img, (300, 100), 150, (0, 255, 255), 50)

	cv2.imshow("koko's lesson", img2)
	cv2.waitKey(0)
	cv2.destroyAllWindows()
</code>
<img src="../pics/copy.png" alt="copy" />
<?php footer(); ?>