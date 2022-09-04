<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-04-10",
	"updated" => "2022-04-10"
);
head($obj);
?>
<h2>標準入出力</h2>
入門編ではデスクトップアプリしか教えませんでした。<br />ということで、ここではコンソール画面の入出力方法を説明します。
<h3>標準出力</h3>
コンソール画面に表示します。<br />以下の関数(メソッド)を使用します。
<code class="vb-dot-net">
	Console.WriteLine(値)
	' or
	Console.Write(値)
</code>
ConsoleオブジェクトのWriteLineメソッド、またはWriteメソッドを使用します。<br />WriteLineメソッドでは自動で改行され、Writeメソッドでは改行文字が挿入されません。
<code class="vb-dot-net">
	Module Module1
		Sub Main()
			Console.WriteLine("自動で")
			Console.WriteLine("改行")
			Console.WriteLine("されるよ♪")
		End Sub
	End Module

	' ***** コンソール *****
	' 自動で
	' 改行
	' されるよ♪
	' ***** ******** ******
</code>
<code class="vb-dot-net">
	Module Module1
		Sub Main()
			Console.WriteLine("自動で")
			Console.WriteLine("改行")
			Console.WriteLine("されない、、、")
		End Sub
	End Module

	' ***** コンソール *****
	' 自動で改行されない、、、
	' ***** ******** ******
</code>
<h3>標準入力</h3>
以下のように書きます。
<code class="vb-dot-net">
	Console.ReadLine()
</code>
コンソール画面から取得した値を変数に格納する場合には以下のように書きます。
<code class="vb-dot-net">
	Dim s As String
	s = Console.ReadLine()
</code>
ということで、入力した文字を出力する簡単なプログラムを生成してみましょう♪<br />なんだか、中級編とは思えませんが、、、
<code class="vb-dot-net">
	Dim s As String
	s = Console.ReadLine()
	Console.WriteLine("あなたは「 " &amp; s &amp; " 」と入力しました。")
</code>
<img src="../pics/標準入出力.gif" alt="標準入出力" />
<h2>データ型</h2>
中級編では、より詳細にデータ型について学びましょう♪
<div class="scroll-600w">
	<table>
		<thead>
			<tr>
				<th>データ型</th>
				<th>サイズ</th>
				<th>値の範囲</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Boolean</td>
				<td>処理系依存</td>
				<td>True または False</td>
			</tr>
			<tr>
				<td>SByte</td>
				<td>1バイト</td>
				<td>-128 ～ 127(符号付き)</td>
			</tr>
			<tr>
				<td>Byte</td>
				<td>1バイト</td>
				<td>0 ～ 255(符号なし)</td>
			</tr>
			<tr>
				<td>Short</td>
				<td>2バイト</td>
				<td>-32,768 ～ 32,767(符号付き)</td>
			</tr>
			<tr>
				<td>UShort</td>
				<td>2バイト</td>
				<td>0 ～ 65,535(符号なし)</td>
			</tr>
			<tr>
				<td>Integer</td>
				<td>4バイト</td>
				<td>-2,147,483,648 ～ 2,147,483,647(符号付き)</td>
			</tr>
			<tr>
				<td>UInteger</td>
				<td>4バイト</td>
				<td>0 ～ 4,294,967,295(符号なし)</td>
			</tr>
			<tr>
				<td>Long</td>
				<td>8バイト</td>
				<td>-9,223,372,036,854,775,808 ～ 9,223,372,036,854,775,807(符号付き)</td>
			</tr>
			<tr>
				<td>ULong</td>
				<td>8バイト</td>
				<td>0 ～ 18,446,744,073,709,551,615(符号なし)</td>
			</tr>
			<tr>
				<td>Single</td>
				<td>4バイト</td>
				<td>
					-3.4028235E+38 ～ -1.401298E-45(負の値の場合)
					<div class="separator"></div>
					1.401298E-45 ～ 3.4028235E+38(正の値の場合)
				</td>
			</tr>
			<tr>
				<td>Double</td>
				<td>8バイト</td>
				<td>
					-1.79769313486231570E+308 から -4.94065645841246544E-324(負の値の場合)
					<div class="separator"></div>
					4.94065645841246544E-324 から 1.79769313486231570E+308 (正の値の場合)
				</td>
			</tr>
			<tr>
				<td>Decimal</td>
				<td>16バイト</td>
				<td>
					0 ～ +/-79,228,162,514,264,337,593,543,950,335(小数点なし)
					<div class="separator"></div>
					0 から +/-7.9228162514264337593543950335(小数点の右側に28 桁)
					<div class="separator"></div>
					0 以外の最小値は +/-0.0000000000000000000000000001(+/-1E-28) 
				</td>
			</tr>
			<tr>
				<td>Char</td>
				<td>2 バイト</td>
				<td>0 ～ 65535(符号なし)</td>
			</tr>
			<tr>
				<td>String</td>
				<td>処理系依存</td>
				<td>0 ～ 約20億のUnicode文字</td>
			</tr>
			<tr>
				<td>Date</td>
				<td>8 バイト</td>
				<td>0001年1月1日0:00:00(午前0時) ～ 9999年12月31日午後11:59:59</td>
			</tr>
			<tr>
				<td>構造体</td>
				<td>処理系依存</td>
				<td>各メンバによる</td>
			</tr>
			<tr>
				<td>オブジェクト</td>
				<td>4バイト(32ビット系)<br />8バイト(64ビット系)</td>
				<td>各要素による</td>
			</tr>
		</tbody>
	</table>
</div>
<h3>型のコンパイル時決定・型文字決定</h3>
vb.netではデータ型を明示的に示さずに、コンパイラに決定させる方法もあります。<br />可読性の観点から推奨されませんが、省略して書く人もいますので覚えておきましょう♪
<code class="vb-dot-net">
	Dim 変数 = 値
</code>
では、実際にコードを書いてみましょう♪
<code class="vb-dot-net">
	Module Module1
		Sub Main()
			Dim x = 10
			Dim y = 25
			Console.WriteLine(x + y)
		End Sub
	End Module

	' ***** コンソール *****
	' 35
	' ***** ******** ******
</code>
<h3>型文字</h3>
「100」「99.9」などの数字を扱う際にそのデータ型を明示的に指定することもできます。<br />これには<strong>型文字</strong>を使用します。<br /><br />一度、型宣言した変数に代入してそれを使用するって面倒くさいですもんね、、、<br /><br />型文字には以下のものがあります。
<table>
	<tbody>
		<tr>
			<th>S</th>
			<td>Short</td>
		</tr>
		<tr>
			<th>I</th>
			<td>Integer</td>
		</tr>
		<tr>
			<th>L</th>
			<td>Long</td>
		</tr>
		<tr>
			<th>US</th>
			<td>UShort</td>
		</tr>
		<tr>
			<th>UI</th>
			<td>UInteger</td>
		</tr>
		<tr>
			<th>UL</th>
			<td>ULong</td>
		</tr>
		<tr>
			<th>F</th>
			<td>Single</td>
		</tr>
		<tr>
			<th>R</th>
			<td>Double</td>
		</tr>
		<tr>
			<th>D</th>
			<td>Decimal</td>
		</tr>
	</tbody>
</table>
以下のように数字の後に続けて記述します。
<code class="vb-dot-net">
	100UI
	100L
	100.00F
</code>
<h2>データ型の確認</h2>
データ型を確認するにはGetTypeメソッドを使用します。<br />以下のように書きます。
<code class="vb-dot-net">
	値.GetType()
</code>
では、実際にデータの型を確認してみましょう♪
<code class="vb-dot-net">
	Console.writeLine(100S.GetType())
	Console.writeLine(100I.GetType())
	Console.writeLine(100L.GetType())
	Console.writeLine(100F.GetType())
	Console.writeLine(100R.GetType())
	Console.writeLine(100D.GetType())
	Console.writeLine(100US.GetType())
	Console.writeLine(100UI.GetType())
	Console.writeLine(100UL.GetType())

	' ***** コンソール *****
	' System.Int16
	' System.Int32
	' System.Int64
	' System.Single
	' System.Double
	' System.Decimal
	' System.UInt16
	' System.UInt32
	' System.UInt64
	' ***** ******** ******
</code>
<h2>定数</h2>
vb.netでは、値を再代入不可な変数を使用することができます。<br />もはや、不可変変数と呼びことがありますが、もはや「<strong>変</strong>」数とは呼ばないので、vb.netでは代わりに「<strong>固定数</strong>」と呼びます。<br /><br />固定数は以下のように宣言します。
<code class="vb-dot-net">
	Const 定数名 As データ型 = 値
</code>
定数に関しては宣言と代入(初期化)を必ず同時に行う必要があります。<br /><br />別々に行うとエラーとなります。
<code class="vb-dot-net">
	' コンパイラエラー

	Const x As String
	x = "Hi"

	' ***** コンソール *****
	' error BC30438: 定数には、値を指定しなければなりません。
	' ***** ******** ******
</code>
<h2>型変換の方法</h2>
ここでは、データ型を変換する方法を紹介します。
<h3>型変換関数</h3>
まずは、一般的なデータ型を変換する関数を紹介します。
<table>
	<tbody>
		<tr>
			<th>CBool</th>
			<td>真偽値型(Boolean)に変換</td>
		</tr>
		<tr>
			<th>CByte</th>
			<td>バイト型(Byte)に変換</td>
		</tr>
		<tr>
			<th>CShort</th>
			<td>整数型(Short)に変換</td>
		</tr>
		<tr>
			<th>CInt</th>
			<td>整数型(Integer)に変換</td>
		</tr>
		<tr>
			<th>CLong</th>
			<td>整数型(Long)に変換</td>
		</tr>
		<tr>
			<th>CSng</th>
			<td>単精度浮動小数点数型(Single)に変換</td>
		</tr>
		<tr>
			<th>CDbl</th>
			<td>倍精度浮動小数点数型(Double)に変換</td>
		</tr>
		<tr>
			<th>CDec</th>
			<td>Decimalに変換</td>
		</tr>
		<tr>
			<th>CChar</th>
			<td>文字型(Char)に変換</td>
		</tr>
		<tr>
			<th>CStr</th>
			<td>文字列型(String)に変換</td>
		</tr>
		<tr>
			<th>CDate</th>
			<td>日付型(Date)に変換</td>
		</tr>
		<tr>
			<th>CObj</th>
			<td>オブジェクト型(Object)に変換</td>
		</tr>
		<tr>
			<th>CType</th>
			<td>任意のデータ型に変換</td>
		</tr>
	</tbody>
</table>
例えば、以下のように引数に変換対象の値を渡します。
<code class="vb-dot-net">
	CSng(値)
	CStr(値)
	CDate(値)
</code>
また、万能なデータ型変換関数であるDirectCast関数を使用して以下のように書くこともできます。
<code class="vb-dot-net">
	DirectCast(対象の値, 変換先のデータ型)
</code>
<h3>型変換メソッド</h3>
また数字と文字列間で変換をする際には、ToStringメソッドやParseメソッドを使用することが多いです。
<h4>ToStringメソッド</h4>
数字を文字列型に変換します。
<code class="vb-dot-net">
	文字列.ToString()
</code>
例えば、数字型である「100」を文字列型である「"100"」に変換する場合には以下のように書きます。
<code class="vb-dot-net">
	"100".ToString()
</code>
このメソッドは非破壊的に動作するため、元の値は変更しません。<br />戻り値を使用する必要があります。
<code class="vb-dot-net">
	Dim x = 100
	Console.WriteLine(x.GetType())
	Dim y = x.ToString()
	Console.WriteLine(x.GetType())
	Console.WriteLine(y.GetType())

	' ***** コンソール *****
	' System.Int32
	' System.Int32
	' System.String
	' ***** ******** ******
</code>
<h4>Parseメソッド</h4>
ToStringメソッドとは逆に、文字列型のデータを数字型に変換します。<br /><br />以下のように書きます。
<code class="vb-dot-net">
	変換後のデータ型.Parse(数字)
</code>
例えば、Short型のデータをLong型に変換するには以下のように書きます。
<code class="vb-dot-net">
	Dim x = 100S
	Console.WriteLine(x.GetType())
	Dim y = Long.Parse(x)
	Console.WriteLine(y.GetType())

	' ***** コンソール *****
	' System.Int16
	' System.Int64
	' ***** ******** ******
</code>
<div class="separator"></div>
Parseメソッドでは変換に失敗した場合にエラーを飛ばすため、変換対象のデータが不明である場合には極力用いるべきではありません。<br />エラーハンドリングをするためには、代わりにTryParseメソッドを使用します。<br />以下のように書きます。
<code class="vb-dot-net">
	変換後のデータ型.TryParse(数字, 変数)
</code>
こちらは、戻り値では変換に成功した場合は「True」を、失敗した場合は「False」を返し、第二引数で渡した変数に変換後の値が代入されます。<br />戻り値として返される真偽値を使用して条件分岐を行い、エラーハンドリングを実行します。
<code class="vb-dot-net">
	Dim x = Console.ReadLine()
	Dim y As Integer
	Dim z = Integer.TryParse(x, y)
	If (z) Then
		Console.WriteLine("二倍したら" &amp; (y * 2).ToString() &amp; "です。")
	Else
		Console.WriteLine("数字を入力してください。")
	End If
</code>
<img src="../pics/tryparse.gif" alt="TryParseメソッド" />
<h4>Convertクラス</h4>
数字に変換するようのオブジェクトとしてConvertクラスがあります。<br />Convertクラス内の以下のメソッドを用いて数字型にデータを変換します。
<table>
	<tbody>
		<tr>
			<th>ToInt16</th>
			<td>Short型に変換</td>
		</tr>
		<tr>
			<th>ToUInt16</th>
			<td>Short型(符号なし)に変換</td>
		</tr>
		<tr>
			<th>ToInt32</th>
			<td>Integer型に変換</td>
		</tr>
		<tr>
			<th>ToUInt32</th>
			<td>Integer型(符号なし)に変換</td>
		</tr>
		<tr>
			<th>ToInt64</th>
			<td>Long型に変換</td>
		</tr>
		<tr>
			<th>ToUInt64</th>
			<td>Long型(符号なし)に変換</td>
		</tr>
		<tr>
			<th>ToSingle</th>
			<td>Single型に変換</td>
		</tr>
		<tr>
			<th>ToDouble</th>
			<td>Double型に変換</td>
		</tr>
		<tr>
			<th>ToDecimal</th>
			<td>Decimal型に変換</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>