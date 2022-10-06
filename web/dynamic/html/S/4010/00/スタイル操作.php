<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-10",
	"updated" => "2022-01-10"
);
head($obj);
?>
<h2>セルの書式設定</h2>
ここではセル内の書式を設定する方法を学びます。<br />具体的には以下のプロパティを設定します。<br />excelオブジェクトについて説明する際に少し学習しましたが覚えていますか???
<ul>
	<li>文字サイズ</li>
	<li>フォントファミリー</li>
	<li>太字</li>
	<li>斜体</li>
	<li>下線</li>
	<li>文字色</li>
</ul>
全てRangeオブジェクト直下のFontオブジェクト直下のオブジェクトです。
<img src="../pics/fontオブジェクト.png" alt="fontオブジェクト" />
<div class="scroll-600w">
	<table>
		<caption>書式</caption>
		<tbody>
			<tr>
				<th>文字サイズ</th>
				<td>「セルオブジェクト.Font.Size = 文字サイズ」で指定します。</td>
			</tr>
			<tr>
				<th>フォントファミリー</th>
				<td>「セルオブジェクト.Font.Name = "フォントファミリー"」で指定します。</td>
			</tr>
			<tr>
				<th>太字</th>
				<td>「セルオブジェクト.Font.Bold = 真偽値」で指定します。<br />真偽値が「True」の時は太字、「False」の時は通常となります。</td>
			</tr>
			<tr>
				<th>斜体</th>
				<td>「セルオブジェクト.Font.Italic = 真偽値」で指定します。<br />真偽値が「True」の時は斜体、「False」の時は通常となります。</td>
			</tr>
			<tr>
				<th>下線</th>
				<td>「セルオブジェクト.Font.Underline = 真偽値」で指定します。<br />真偽値が「True」の時は下線あり、「False」の時は下線なしとなります。</td>
			</tr>
			<tr>
				<th>文字色</th>
				<td>「セルオブジェクト.Font.Color = rgb値」ないしは「セルオブジェクト.Font.ColorIndex = カラーインデックス値」で設定します。<p class="r">色の指定については後で説明します。</p></td>
			</tr>
		</tbody>
	</table>
</div>
<div class="separator"></div>
<h3>背景色</h3>
背景色はFontオブジェクトではなく、Interiorオブジェクトの「Color」もしくは「ColorIndex」プロパティで指定します。<br />「セルオブジェクト.Interior.Color = rgb値」ないしは「セルオブジェクト.Interior.ColorIndex = カラーインデックス値」で指定します。
<img src="../pics/interiorオブジェクト.png" alt="interiorオブジェクト" />
<h2>色の指定</h2>
excel-vbaで色を指定する方法は大きく2つあります。
<ul>
	<li>Colorプロパティ</li>
	<li>ColorIndexプロパティ</li>
</ul>
<h3>Colorプロパティ</h3>
rgb値で色を指定します。<br />rgb値とは「r:red(赤)」、「g:green(緑)」、「b:blue(青)」の3色の割合で色を表現する方法です。<br />「RGB(r値, g値, b値)」で指定します。
<div id="color" class="scroll-600w">
	<table class="x">
		<tbody>
			<tr>
				<td class="center" v-bind:style="{backgroundColor: now, color: font_color}" colspan="3">この色です♪</td>
			</tr>
			<tr>
				<th class="red">R</th>
				<td v-bind:style="{background: rr}"><input type="range" min="0" max="255" step="1" v-model="r" /></td>
				<td>({{r}})</td>
			</tr>
			<tr>
				<th class="green">G</th>
				<td v-bind:style="{background: gg}"><input type="range" min="0" max="255" step="1" v-model="g" /></td>
				<td>({{g}})</td>
			</tr>
			<tr>
				<th class="blue">B</th>
				<td v-bind:style="{background: bb}"><input type="range" min="0" max="255" step="1" v-model="b" /></td>
				<td>({{b}})</td>
			</tr>
			<tr>
				<td class="center border" colspan="3">RGB({{r}}, {{g}}, {{b}})</td>
			</tr>
		</tbody>
	</table>
</div>
<script charset="UTF-8" type="text/javascript" src="../../../cdn/vue.js/2.6.14-ops.js" defer></script>
<script charset="UTF-8" type="text/javascript" src="color.js" defer></script>
<h3>ColorIndexプロパティ</h3>
予めexcel-vbaに登録されている番号で指定します。<br />一応紹介しますが、原則としてrgb値による指定をするべきです。
<img src="../pics/show-colorindex.gif" alt="カラーインデックス" />
参考までに、、、<br />上のマクロのコードを以下に紹介します。
<code class="vba">
	Sub show_colorindex()
		Dim i, a, b As Integer
		i = 1
		For a = 1 To 13 Step 2  '「a」の値を2ずつ加算
			For b = 1 To 8
				Cells(a, b).Value = i
				Cells(a + 1, b).Interior.ColorIndex = i
				i = i + 1
			Next b
		Next a
	End Sub
</code>
forループのカウンタ変数「a」を「Step 2」で「2」ずつ加算しています。
<h2>罫線の設定</h2>
セルオブジェクトの以下のプロパティを設定します。
<ul>
	<li>Borders</li>
	<li>LineStyle</li>
	<li>Weight</li>
	<li>Color/ColorIndex</li>
</ul>
<h3>Borders</h3>
線を引く場所を指定します。
<code class="vba">
	セルオブジェクト.Borders 線の場所
</code>
<table>
	<caption>線の場所</caption>
	<tbody>
		<tr>
			<th>xlEdgeTop</th>
			<td>上</td>
		</tr>
		<tr>
			<th>xlEdgeRight</th>
			<td>右</td>
		</tr>
		<tr>
			<th>xlEdgeBottom</th>
			<td>下</td>
		</tr>
		<tr>
			<th>xlEdgeLeft</th>
			<td>左</td>
		</tr>
		<tr>
			<th>xlDiagonalDown</th>
			<td>左上～右下</td>
		</tr>
		<tr>
			<th>xlDiagonalUp</th>
			<td>左下～右上</td>
		</tr>
		<tr>
			<th>xlInsideHorizontal</th>
			<td>縦の内側</td>
		</tr>
		<tr>
			<th>xlInsideVertical</th>
			<td>横の内側</td>
		</tr>
	</tbody>
</table>
<h3>lineStyle</h3>
罫線の種類を指定します。
<code class="vba">
	セルオブジェクト.LineStyle = 線の種類
</code>
<table>
	<caption>線の種類</caption>
	<tbody>
		<tr>
			<th>xlContinuous</th>
			<td>実線</td>
		</tr>
		<tr>
			<th>xlDash</th>
			<td>破線</td>
		</tr>
		<tr>
			<th>xlDot</th>
			<td>点線</td>
		</tr>
		<tr>
			<th>xlDouble</th>
			<td>二重線</td>
		</tr>
	</tbody>
</table>
<h3>Weight</h3>
線の太さを指定します。
<code class="vba">
	セルオブジェクト.Weight = 線の太さ
</code>
<table>
	<caption>線の太さ</caption>
	<tbody>
		<tr>
			<th>xlHairline</th>
			<td>極細</td>
		</tr>
		<tr>
			<th>xlThin</th>
			<td>細線</td>
		</tr>
		<tr>
			<th>xlMedium</th>
			<td>普通</td>
		</tr>
		<tr>
			<th>xlThick</th>
			<td>太線</td>
		</tr>
	</tbody>
</table>
<h3>Color/ColorIndex</h3>
線の色を指定します。
<code class="vba">
	セルオブジェクト.Color = rgb値
	セルオブジェクト.ColorIndex = カラーインデックス
</code>
<h2>文字の配置の設定</h2>
セルの文字を左右中央どちらによせるかを指定します。
<code class="vba">
	セルオブジェクト.HorizontalAlignment = 寄せる方向
</code>
<table>
	<caption>寄せる方向</caption>
	<tbody>
		<tr>
			<th>xlLeft</th>
			<td>左寄せ</td>
		</tr>
		<tr>
			<th>xlCenter</th>
			<td>中央寄せ</td>
		</tr>
		<tr>
			<th>xlRight</th>
			<td>右寄せ</td>
		</tr>
		<tr>
			<th>xlJustify</th>
			<td>両端寄せ</td>
		</tr>
		<tr>
			<th>xlGeneral</th>
			<td>通常</td>
		</tr>
	</tbody>
</table>
<h2>表示形式の設定</h2>
セル内の値をどのように表示するかを設定します。<br />例えば「2022-01-10」を「2022年01月10日」と表示したり「2022/01/10」と表示したりします。
<code class="vba">
	セルオブジェクト.NumberFormatLocal = "書式化文字列"
</code>
書式化文字列を「"yyyy年mm月dd日"」とすれば「2022年01月10日」と表示され、「"yyyy/mm/dd"」とすれば「2022/01/10」と表示されます。<br />書式化文字列内では「yyyy」や「mm」や「dd」のように意味を持つ文字(特殊文字)を用いて表示の仕方を設定します。
<table>
	<caption>書式化文字列で用いる特殊文字(日付・時刻)</caption>
	<tbody>
		<tr>
			<th>yyyy</th>
			<td>西暦を4桁で表示します。</td>
		</tr>
		<tr>
			<th>yy</th>
			<td>西暦を下二桁で表示します。</td>
		</tr>
		<tr>
			<th>mmmm</th>
			<td>月を英語で表示します。</td>
		</tr>
		<tr>
			<th>mmm</th>
			<td>月を英語の短縮系で表示します。</td>
		</tr>
		<tr>
			<th>mm</th>
			<td>月を2桁で表示します。</td>
		</tr>
		<tr>
			<th>m</th>
			<td>m月を1桁(1～9月)と2桁(10～12月)で表示します。</td>
		</tr>
		<tr>
			<th>dd</th>
			<td>日付を2桁で表示します。</td>
		</tr>
		<tr>
			<th>d</th>
			<td>日付を1桁または2桁で表示します。</td>
		</tr>
		<tr>
			<th>hh</th>
			<td>時間を2桁で表示します。</td>
		</tr>
		<tr>
			<th>h</th>
			<td>時間を1桁または2桁で表示します。</td>
		</tr>
		<tr>
			<th>mm</th>
			<td>分を2桁で表示します。<p class="r">時刻を表す「h」「s」と一緒に用いる必要があります。</p></td>
		</tr>
		<tr>
			<th>m</th>
			<td>分を1桁または2桁で表示します。<p class="r">時刻を表す「h」「s」と一緒に用いる必要があります。</p></td>
		</tr>
		<tr>
			<th>ss</th>
			<td>秒を2桁で表示します。</td>
		</tr>
		<tr>
			<th>s</th>
			<td>秒を1桁または2桁で表示します。</td>
		</tr>
		<tr>
			<th>dddd</th>
			<td>曜日を英語で表示します。</td>
		</tr>
		<tr>
			<th>ddd</th>
			<td>曜日を英語の短縮系で表示します。</td>
		</tr>
		<tr>
			<th>aaaa</th>
			<td>曜日を日本語で表示します。</td>
		</tr>
		<tr>
			<th>aaa</th>
			<td>曜日を日本語の短縮系で表示します。</td>
		</tr>
		<tr>
			<th>ggg</th>
			<td>元号を表示します。</td>
		</tr>
		<tr>
			<th>gg</th>
			<td>元号の短縮系を表示します。</td>
		</tr>
		<tr>
			<th>g</th>
			<td>元号をアルファベットで表示します。</td>
		</tr>
	</tbody>
</table>
<table>
	<caption>書式化文字列で用いる特殊文字(数値)</caption>
	<tbody>
		<tr>
			<th>#</th>
			<td>数字の桁を表します。<br />後述する「,」や「.」とセットで用います。</td>
		</tr>
		<tr>
			<th>0</th>
			<td>数字の桁を表します。<br />「#」と異なり、その桁の数字が存在しない場合は「0」で埋めます。<br />例えば、「7」を「0000」表示すると「0007」となります。</td>
		</tr>
		<tr>
			<th>,</th>
			<td>桁区切りの「,」の位置を指定します。<br />「#,###」で三桁に区切って表示します。<br />例えば「1234567」を「#,###」表示すると「1,234,567」となります。</td>
		</tr>
		<tr>
			<th>.</th>
			<td>小数点の位置を表します。<br />例えば「7」を「#.00」表示すると「7.00」となります。</td>
		</tr>
		<tr>
			<th>%</th>
			<td>パーセントを用いて表示します。<br />例えば「0.05」を「%」表記すると「5%」となります。</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>