<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-03-10",
	"updated" => "2022-03-10"
);
head($obj);
?>
<h2>輪郭の取得</h2>
2値画像から輪郭を取得する方法について説明します。<br />先ほどはcaptcha画像の数字の部分だけを白にしましたが、これでは小さすぎるため数字を認識する上では不十分です。<br />ということで、白の部分の輪郭を取得して数字を表す部分を広げてみましょう♪
<code class="python">
	contours, hierarchy = cv2.findContours(img, mode, method)
</code>
まずは引数について説明します。
<div class="scroll-600w">
	<table>
		<caption>findContours引数</caption>
		<tbody>
			<tr>
				<th>img</th>
				<td>対象となる画像を指定します。</td>
			</tr>
			<tr>
				<th>mode</th>
				<td>輪郭を検索する方法を指定します。</td>
			</tr>
			<tr>
				<th>method</th>
				<td>輪郭を近似する方法を指定します。</td>
			</tr>
		</tbody>
	</table>
</div>
戻り値は2つ返されます。
<table>
<caption>findContours戻り値</caption>
	<tbody>
		<tr>
			<th>contours</th>
			<td>抽出された輪郭を配列形式で返します。</td>
		</tr>
		<tr>
			<th>hierarchy</th>
			<td>階層構造を配列形式で返します。</td>
		</tr>
	</tbody>
</table>
モードとは入れ子になっている場合にどのように把握するかを指定します。
<div class="scroll-600w">
	<table>
		<caption>mode</caption>
		<tbody>
			<tr>
				<th>cv2.RETR_EXTERNAL</th>
				<td>子の階層にある輪郭はすべて無視します。</td>
			</tr>
			<tr>
				<th>cv2.RETR_LIST</th>
				<td>親子すべてを把握しますが、これらに階層を設けません。</td>
			</tr>
			<tr>
				<th>cv2.RETR_CCOMP</th>
				<td>全ての輪郭を検出し、2つのレベル(親・子)の階層に分類します。</td>
			</tr>
			<tr>
				<th>cv2.RETR_TREE</th>
				<td>全ての階層構造(親・子・孫・曾孫...)を保持します。</td>
			</tr>
		</tbody>
	</table>
</div>
また、methodでは以下のパラメタを使用可能です。
<div class="scroll-600w">
	<table>
		<caption>method</caption>
		<tbody>
			<tr>
				<th>cv2.CHAIN_APPROX_NONE</th>
				<td>輪郭線上のすべての点を検出するため、処理が重くなります。</td>
			</tr>
			<tr>
				<th>cv2.CHAIN_APPROX_SIMPLE</th>
				<td>輪郭線上の冗長な点を削除して、必要最小限の点を検出する方法です。</td>
			</tr>
		</tbody>
	</table>
</div>
入れ子状態を把握する際にはmodeを意識する必要がありますが、ここでは入れ子になっていないため無視します。<br />どれでも構いませんが、ここではもっとも一般的な「cv2.RETR_LIST」を使用します。<br />また、できるだけ処理を簡単にするためにmethodでは「cv2.CHAIN_APPROX_SIMPLE」を指定します。




<?php footer(); ?>