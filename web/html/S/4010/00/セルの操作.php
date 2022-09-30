<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-10",
	"updated" => "2022-01-10"
);
head($obj);
?>
<h2>セルの選択</h2>
もう既に学習しましたね♪<br />以下の2つを用いてセルを取得します。
<ul>
	<li>Range</li>
	<li>Cells</li>
</ul>
<p class="r">忘れた方は<a href="vba基本操作">こちら</a>。</p>
<h2>select</h2>
vbaで実際にセル・セル範囲を選択されている状態にします。<br />以下のように記述します。
<code class="vba">
	Range("C5").Select 'C5セルを選択
</code>
<img src="../pics/select-cell.gif" alt="select" />
セルの範囲を指定することもできます。
<code class="vba">
	Range("B2:E8").Select 'B2～E8セルを選択
</code>
<img src="../pics/select-cell2.gif" alt="select" />
<h2>アクティブセル領域</h2>
現在選択されているセル(アクティブセル)を含む、データの入っているセル領域を言います。<br />具体的にはアクティブセルの外側の空白で囲まれた部分です。<br />その判定は空白か否かで行うため、表の中に空白があると想定しない動作になる危険性があります。<br />通常利用だと「Ctrl」+「Shift」+「*」で選択できます。
<img src="../pics/アクティブ領域.gif" alt="アクティブ領域" />
vbaでアクティブセルを選択する際には以下のように記述します。
<code class="vba">
	Range(アクティブセル).CurrentRegion
</code>
<h2>endプロパティ</h2>
アクティブ領域内の端っこを選択します。<br />通常では「Ctrl」+「矢印」で選択します。<br />vbaでは以下のように記述します。
<div class="scroll-600">
	<table>
		<tbody>
			<tr>
				<th>xlUp</th>
				<td>アクティブセル領域の上の終端のセルを参照します。</td>
			</tr>
			<tr>
				<th>xlToRight</th>
				<td>アクティブセル領域の右の終端のセルを参照します。</td>
			</tr>
			<tr>
				<th>xlDown</th>
				<td>アクティブセル領域の下の終端のセルを参照します。</td>
			</tr>
			<tr>
				<th>xlToLeft</th>
				<td>アクティブセル領域の左の終端のセルを参照します。</td>
			</tr>
		</tbody>
	</table>
</div>
<img src="../pics/endプロパティ.gif" alt="endプロパティ" />
endプロパティを用いて通常は表の最終行を取得しますが、その方法には以下の2つの方法があります。
<ul>
	<li>上からアプローチ</li>
	<li>下からアプローチ</li>
</ul>
<h3>上からアプローチ</h3>
アクティブセル領域の下終端で取得します。<br />先ほどの方法です。
<code class="vba">
	Sub select_it()
		Range("A1").End(xlDown).select
	End Sub
</code>
<img src="../pics/get-last.gif" alt="endプロパティ" />
<p class="r">分かりやすさの観点から一度時間を止めています。</p>
途中で空白セルがあるとうまく動作しません。
<h3>下からアプローチ</h3>
セルの最終行から空白セルを飛ばして上に戻ってアクティブセル領域の最終行を取得します。<br />「Cells(Rows.Count, 1)」でセルの一番下を取得して、それを基準に上にチェックしていきます。
<code class="vba">
	Sub select_it()
		Cells(Rows.Count, 1).End(xlUp).select
	End Sub
</code>
<img src="../pics/get-last2.gif" alt="endプロパティ" />
<p class="r">分かりやすさの観点から一度時間を止めて、さらにセルの移動を可視化させています。</p>
途中に空白ではないセルがあるとうまく動作しません。
<h2>データの削除</h2>
セルに登録されているデータを削除します。<br />何を削除するかによって以下のメソッドに分類されます。
<ul>
	<li>Clear</li>
	<li>ClearContents</li>
	<li>ClearComments</li>
	<li>ClearFormats</li>
</ul>
<h3>Clear</h3>
セルに登録されている全てのデータを削除します。
<h3>ClearContents</h3>
セルに登録されている値と数式を削除します。
<h3>ClearFormats</h3>
セルに登録されている書式情報を削除します。
<h3>ClearComments</h3>
セルに登録されているコメントを削除します。
<h2>特殊セル参照</h2>
ある条件に一致するセルだけを参照します。<br />例えば、数式が登録されているセルや空白のセルを参照します。<br />以下のように記述します。
<code class="vba">
	オブジェクト.SpecialCells(タイプ)
</code>
タイプには以下の種類があります。
<div class="scroll-600">
	<table>
		<tbody>
			<tr>
				<th>xlCellTypeBlanks</th>
				<td>空白のセル</td>
			</tr>
			<tr>
				<th>xlCellTypeComments</th>
				<td>コメントが登録されているセル</td>
			</tr>
			<tr>
				<th>xlCellTypeConstants</th>
				<td>定数が登録されているセル</td>
			</tr>
			<tr>
				<th>xlCellTypeFormulas</th>
				<td>数式が登録されているセル</td>
			</tr>
			<tr>
				<th>xlCellTypeLastCell</th>
				<td>使用されている最後のセル</td>
			</tr>
		</tbody>
	</table>
</div>
では、虫食いになった掛け算九九の食われている部分だけを選択しましょう♪
<code class="vba">
	Sub select_it()
		Range("A1:I9").SpecialCells(xlCellTypeBlanks).Select
	End Sub
</code>
<img src="../pics/special-cells.gif" alt="special cells" />
<h2>セルの挿入</h2>
セルを挿入するには以下のように記述します。
<code class="vba">
	オブジェクト.Insert シフト方向 セルの書式の継承
</code>
<div class="scroll-600">
	<table>
		<caption>シフト方向</caption>
		<tbody>
			<tr>
				<th>xlShiftDown</th>
				<td>セルを挿入後、下にずらす</td>
			</tr>
			<tr>
				<th>xlShiftRight</th>
				<td>セルを挿入後、右にずらす</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="scroll-600">
	<table>
		<caption>セルの書式の継承</caption>
		<tbody>
			<tr>
				<th>xlFormatFromLeftOrAbove</th>
				<td>追加したセルの書式を左または上のセルから継承します</td>
			</tr>
			<tr>
				<th>xlFormatFromRightOrBelow</th>
				<td>追加したセルの書式を右または下のセルから継承します</td>
			</tr>
		</tbody>
	</table>
</div>
では5行目の4列から7行目にセルを追加しましょう♪
<code class="vba">
	Sub add_it
		Range("D5:F5").Insert(xlShiftDown)
	End Sub
</code>
<img src="../pics/insert.gif" alt="insert" />
<h2>セルの削除</h2>
セルを削除するには以下のように記述します。
<code class="vba">
	オブジェクト.Delete(シフト方向)
</code>
<div class="scroll-600">
	<table>
		<caption>シフト方向</caption>
		<tbody>
			<tr>
				<th>xlShiftUp</th>
				<td>セルを削除後、上にずらす</td>
			</tr>
			<tr>
				<th>xlShiftToLeft</th>
				<td>セルを削除、左にずらす</td>
			</tr>
		</tbody>
	</table>
</div>
では5行目の4列から7行目にセルを削除しましょう♪
<code class="vba">
	Sub Delete_it
		Range("D5:F5").Delete(xlShiftUp)
	End Sub
</code>
<img src="../pics/delete.gif" alt="delete" />
<h2>セルのコピー</h2>
セルをコピーします。<br />以下のように記述します。
<code class="vba">
	オブジェクト.Copy コピー先
</code>
<p>コピー先を省略した場合はクリップボードにデータがコピーされます。</p>
ではピカチュウをコピーしてみましょう♪
<code class="vba">
	Range("N8:X20").Copy Range("AF8")
</code>
<img src="../pics/copy.gif" alt="copy" />
<h2>セルのペースト</h2>
クリップボードに登録されているデータを貼り付けます。<br />以下のように記述します。
<code class="vba">
	ActiveSheet.Paste ペースト先
</code>
通常はコピーした内容を複数の場所に貼り付ける際に使用します。
<code class="vba">
	Range("F4:P16").Copy 'コピー先を省略してクリップボードにコピー
	With ActiveSheet '現在作業中のシートに対して、、、
		.Paste Range("Y4")
		.Paste Range("F21")
		.Paste Range("Y21")
	End With
</code>
<img src="../pics/paste.gif" alt="paste" />
ペースト後に貼り付け元のデータの周りが点滅しますが、これをキャンセルするには「オブジェクト.CutPasteMode = False」を実行します。
<h2>セルのカット</h2>
セルの内容を移動します。<br />以下のように記述します。
<code class="vba">
	移動させるオブジェクト.Cut 移動先
</code>
ではピカチュウ4匹を右に移動させましょう♪
<code class="vba">
	Range("F4:AL34").Cut Range("AQ4")
</code>
<img src="../pics/cut.gif" alt="cut" />
<?php footer(); ?>