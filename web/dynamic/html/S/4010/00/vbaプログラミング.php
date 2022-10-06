<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-10",
	"updated" => "2022-01-10"
);
head($obj);
?>
<h2>変数</h2>
プログラムを実行する上で使用する一時的なデータを保存する箱です。<br />一度変数に値を代入すれば、その変数を使用してその値に簡単にアクセスできるようになります。<br />変数に関しては以下の3つの処理方法を学びます。
<ul>
	<li>変数の宣言</li>
	<li>変数の代入</li>
	<li>変数の参照</li>
	<li>変数のスコープ</li>
</ul>
<h3>変数の宣言</h3>
これから「〇〇〇」という名前で変数を使用するよ♪って宣言します。<br />以下のように宣言します。
<code class="vba">
	Dim 変数名 As データ型
</code>
複数の変数を宣言する場合には「,(カンマ)」で区切ります。
<code class="vba">
	Dim 変数1 As データ型, 変数2 As データ型, 変数3 As データ型
</code>
同じデータ型の変数を複数宣言する場合には以下のように記述します。
<code class="vba">
	Dim 変数1, 変数2, 変数3 As データ型
</code>
<h4>データ型</h4>
変数に入れるデータの種類です。<br />以下のデータ型があります。
<table>
	<tbody>
		<tr>
			<th>Integer</th>
			<td>整数を格納します。<br />「10」「25」「99」が該当します。</td>
		</tr>
		<tr>
			<th>Long</th>
			<td>大きめの整数を格納します。<br />「32,768」よりも大きい整数はこちらを使用します。</td>
		</tr>
		<tr>
			<th>Single</th>
			<td>「単精度浮動小数点数型」で、小さめの小数を格納します。</td>
		</tr>
		<tr>
			<th>Double</th>
			<td>「倍精度浮動小数点数型」で、大きめの小数を格納します。</td>
		</tr>
		<tr>
			<th>String</th>
			<td>「文字列型」です。<br />文字列を代入する際には「"(ダブルクォーテーション)」ないしは「'(シングルクォーテーション)」で囲みます。<br />「"ピカチュウ"」「"pika-pika"」などが該当します。</td>
		</tr>
		<tr>
			<th>Boolean</th>
			<td>「真偽値型」です。「true」か「False」を格納します。</td>
		</tr>
		<tr>
			<th>Date</th>
			<td>「日付型」です。<br />日付を格納します。</td>
		</tr>
		<tr>
			<th>オブジェクト型</th>
			<td>
				excelオブジェクトを格納するためのデータ型です。
				<ul>
					<li>Workbook</li>
					<li>Worksheet</li>
					<li>Range</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>
<code class="vba">
	Dim x As Integer  '「x」変数を整数型で宣言
	Dim y As Single, z As Double  '「y」変数を単精度浮動小数点数型、「z」変数を倍精度浮動小数点数型で宣言
</code>
<h4>変数の宣言の強制</h4>
想定しない動作を防ぐために変数の宣言を強制することをオススメします。<br />モジュールの先頭に「Option Explicit」と書けばok!です。<br />いちいち書くのは大変なのでモジュール作成時に自動で書かれるように設定しましょう♪<br />「ツール &gt; オプション &gt; 変数の宣言を強制する」にチェックを入れます。
<img src="../pics/option-explicit.gif" alt="変数の宣言を強制" />
これでモジュールを作成した時に自動で変数の宣言の強制がされます。
<h3>変数の代入</h3>
「変数 = 代入したいデータ」で実行します。
<code class="vba">
	Dim x As Integer  '「x」変数を整数型で宣言
	Dim y As String  '「y」変数を文字列型で宣言
	x = 10  '「x」変数に「10」を代入
	y = "ぴかちゅう"  '「y」変数に「ぴかちゅう」を代入
</code>
<h3>変数の参照</h3>
実際に変数に代入した値を使用します。<br />そのまま変数名を書けば使用できます。
<code class="vba">
	Sub pikachu()
		Dim x As String  '「x」変数を文字列型で宣言
		x = "ぴかちゅう"  '「x」変数に「ぴかちゅう」を代入
		Range("A1").value = x  'A1セルの値を「x」変数の値にセット
	End Sub
</code>
<img src="../pics/変数-ぴかちゅう.gif" alt="変数の説明画像" />
<h3>変数のスコープ</h3>
変数には参照できる範囲(有効範囲)があり、これをスコープと呼びます。<br />subプロシージャ内で宣言した変数はそのsubプロシージャ内でのみ有効です。
<h2>イミディエイトウィンドウ</h2>
これから複雑なプログラムを作成するにあたって、変数に代入されている値を簡単に出力されてチェックしたい場面があります。<br />いちいちテキトーなセルにその変数をセットして、、、ってのは大変ですからね、、、<br />ということで変数に代入されている値を簡単にチェックするためにイミディエイトウィンドウを使用しましょう♪
<h3>イミディエイトウィンドウの表示</h3>
デフォルトではvbeにイミディエイトウィンドウが表示されていないのでまずはこれを表示しましょう♪<br />「表示 &gt; イミディエイトウィンドウ」から表示します。<br />「Ctrl」+「G」でも表示できます。
<img src="../pics/イミディエイトウィンドウ.gif" alt="イミディエイトウィンドウの説明画像" />
<h3>イミディエイトウィンドウへの表示</h3>
では実際にイミディエイトウィンドウに変数を表示してみましょう♪<br />イミディエイトウィンドウに表示するには以下のように記述します。
<code class="vba">
	Debug.Print 表示したいデータ
</code>
では実際に変数を表示してみましょう♪
<code class="vba">
	Sub pikachu()
		Dim x As String  '「x」変数を文字列型で宣言
		x = "ぴかちゅう"  '「x」変数に「ぴかちゅう」を代入
		Debug.Print x  '「x」変数の値を表示
		int x
	End Sub
</code>
<img src="../pics/debug-print.gif" alt="デバグの説明画像" />
<h2>演算</h2>
プログラミングと言えばやっぱり演算ですよね♪<br />vbaでは以下の演算子を用いて演算を行います。
<table>
	<tbody>
		<tr>
			<th>+</th>
			<td>足し算です。</td>
		</tr>
		<tr>
			<th>-</th>
			<td>引き算です。</td>
		</tr>
		<tr>
			<th>*</th>
			<td>掛け算です。</td>
		</tr>
		<tr>
			<th>/</th>
			<td>割り算です。<br />「7 / 2」は「3.5」となります。</td>
		</tr>
		<tr>
			<th>\</th>
			<td>割り算の商(割り算の結果の整数部分)です。<br />「7 \ 2」は「3」となります。</td>
		</tr>
		<tr>
			<th>Mod</th>
			<td>割り算の余りです。<br />「7 Mod 2」は「1」となります。</td>
		</tr>
		<tr>
			<th>^</th>
			<td>べき乗です。<br />「2 ^ 4」は「16」になります。</td>
		</tr>
		<tr>
			<th>&amp;</th>
			<td>文字列同士を連結します。<br />「"ぴか" &amp; "ちゅう"」で「"ぴかちゅう"」となります。</td>
		</tr>
	</tbody>
</table>
<h2>条件分岐(if)</h2>
もし明日雨ならば傘を持っていき、雨ではないならば傘を持って行かない。という風に条件によってプログラムを制御します。<br />条件分岐にはif文を使用します。
<code class="vba">
	If 条件式 Then
		 '条件式を満たす場合の処理
	Else
		 '条件式を満たさない場合の処理
	End If
</code>
条件を満たした場合のみの処理を記述して、満たさない場合は何も処理をしない場合には「Else」は省略することができます。<br />また、複数の条件分岐を連ねる場合には「ElseIf」を用いて書きます。
<code class="vba">
	If 条件式1 Then
		 '条件式1を満たした場合の処理
	ElseIf 条件式2 Then
		 '条件式2を満たした場合の処理
	ElseIf 条件式3 Then
		 '条件式3を満たした場合の処理
	Else
		 '条件式のいずれも満たさなかった場合の処理
	End If
</code>
<h3>条件式</h3>
条件式には以下の6個の演算子を使用します。
<table>
	<tbody>
		<tr>
			<th>&lt;</th>
			<td>左が右よりも小さい場合に「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&lt;=</th>
			<td>左が右以下の場合に「真」、それ以外に「偽」となります。</td>
		</tr>
		<tr>
			<th>&gt;</th>
			<td>左が右よりも大きい場合に「真」、それ以外に「偽」となります。</td>
		</tr>
		<tr>
			<th>&gt;=</th>
			<td>左が右以上の場合に「真」、それ以外に「偽」となります。</td>
		</tr>
		<tr>
			<th>=</th>
			<td>左と右が等しい場合に「真」、それ以外に「偽」となります。</td>
		</tr>
		<tr>
			<th>&lt;&gt;</th>
			<td>左と右が等しくない場合に「真」、それ以外に「偽」となります。</td>
		</tr>
	</tbody>
</table>
また、複数の条件を組み合わせることもできます。
<table>
	<thead>
		<tr>
			<th>And</th>
			<th>Or</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>「かつ」を意味します。<br />左右の条件式の両方を満たす場合に「真」、それ以外は「偽」となります。</td>
			<td>「または」を意味します。<br />左右の条件式のいずれかを満たす場合に「真」、それ以外は「偽」となります。</td>
		</tr>
	</tbody>
</table>
<div class="separator"></div>
では実際にプログラミングしてみましょう♪<br />A1セルに書かれた数字が偶数ならば「2n」、奇数ならば「2n+1」とB1セルに表示します。
<code class="vba">
	Sub even_odd()
		If Range("A1").Value Mod 2 = 0 Then
			Range("B1").Value = "2n"
		Else
			Range("B1").Value = "2n+1"
		End If
	End Sub
</code>
<img src="../pics/if.gif" alt="if文" />
<h2>条件分岐(select)</h2>
if文以外ではselect文を用いて条件分岐を実現できます。<br />if文と違ってひとつの値を条件分岐で複数の処理に分ける際に使用します。<br />以下のように書きます。
<code class="vba">
	Select Case 対象の値
		Case 条件式1
			 '条件式1を満たした場合の処理
		Case 条件式2
			 '条件式2を満たした場合の処理
		Case 条件式3
			 '条件式3を満たした場合の処理
		Case Else
			 '条件式のいずれも満たさなかった場合の処理
	End Select
</code>
条件式内で対象の値は「Is」を用いて表します。<br />例えばA1セルの値を取得して、「正」「0」「負」を判定するプログラムを書いてみましょう♪
<code class="vba">
	Sub zero_plus_minus()
		Dim x As Integer, y As String  '「x」変数を整数型で、「y」変数を文字列型で宣言
		x = Range("A1").Value  '「x」変数にA1セルの値を代入
		Select Case x
			Case Is < 0
				y = "マイナス"  '「y」変数に「マイナス」を代入
			Case Is = 0
				y = "ゼロ"  '「y」変数に「ゼロ」を代入
			Case Is > 0
				y = "プラス"  '「y」変数に「プラス」を代入
		End Select
		Range("B1").Value = y  '「y」変数の値をB1セルにセット
	End Sub
</code>
<img src="../pics/select.gif" alt="select文" />
<h2>反復処理</h2>
反復処理とはある一定回数処理を繰り返すことで、これを実現するためには以下の文を使用します。
<ul>
	<li>for</li>
	<li>do until</li>
	<li>do while</li>
	<li>for each</li>
</ul>
たくさんありますね、、、<br />それぞれ使いべき場面が異なります。
<h3>for</h3>
ある一定回数処理を繰り返す際に用います。
<h3>do until</h3>
ある条件に一致するまで処理を繰り返します。
<h3>do while</h3>
ある条件に一致する限り、処理を繰り返します。
<h3>for each</h3>
反復可能なオブジェクトの集まりに対してひとつずつ処理を実行します。
<h2>反復処理(for)</h2>
指定した回数分、処理を繰り返します。<br />for文は以下のように記述します。
<code class="vba">
	Dim i As Integer  '「i」変数を整数型で宣言
	For i = スタート To フィニッシュ
		 '反復処理の内容
	Next i
</code>
Forの後の「i」はカウンタ変数と呼ばれ、繰り返す回数を制御するために使用されます。<br />「i」を整数型で宣言して、それを処理が終わるごとに「1」ずつ加算していき、フィニッシュに到達するまで処理を繰り返します。<br />ではfor文を用いて5行目までの1列目のセルに「n番目!!」と表示するプログラムを作りましょう♪
<code class="vba">
	Sub loop_loop()
		Dim i As Integer  '「i」変数を整数型で宣言
		For i = 1 To 5
			Cells(i, 1).Value = i & "番目!!"
		Next i
	End Sub
</code>
<img src="../pics/for.gif" alt="for文" />
<h3>ループの入れ子</h3>
ループの中にループを入れることもできます。<br />内側のループがn周するたびに外側のループが1周します。<br />これを用いて掛け算九九を表示するプログラムを作成しましょう♪
<code class="vba">
	Sub kuku()
		Dim i, j As Integer
		For i = 1 To 9  '外側のループ
			For j = 1 To 9  '内側のループ
				Cells(i, j).Value = i * j
			Next j
		Next i
	End Sub
</code>
<img src="../pics/掛け算九九.gif" alt="入れ子ループの説明画像" />
<h2>do until</h2>
条件に一致するまで処理を繰り返します。<br />以下のように記述します。
<code class="vba">
	Do Until 条件式
		 '条件式に一致するまで継続して実行する処理
	Loop
</code>
for文と異なり条件を満たす限りはループ処理を続けます。<br />文字が入っているセルの色を変更させるは予め何回ループさせればいいのか分からないのでforループでは実現できません。
<p class="r">テキトーに1000回ループさせて何も入っていないセルを見つけた時点で「Exit For」を用いて強制的にループから抜け出すこともできますが、美しくありません。</p>
<br />1列目のセルを1行目から走査して、値が入っている限り背景色を赤に設定して、値が入っていないセルに出会うまで繰り返すプログラムを作成しましょう♪
<code class="vba">
	Sub make_it_red()
		Dim i As Integer
		i = 1
		Do Until Cells(i, 1).Value = ""  '値が「""(空)」のセルに出会うまで
			Cells(i, 1).Interior.Color = RGB(255, 0, 0)  'セルの背景色を赤に設定
			i = i + 1  '「i」の値を「1」加算
		Loop
	End Sub
</code>
<img src="../pics/do-until.gif" alt="do until文" />
また、上のコードでは処理を一度実行してから条件を判定していますが、最初に条件を判定してから処理を実行する書き方もあります。
<code class="vba">
	Sub make_it_red()
		Dim i As Integer
		i = 1
		Do
			Cells(i, 1).Interior.Color = RGB(255, 0, 0)  'セルの背景色を赤に設定
			i = i + 1  '「i」の値を「1」加算
		Loop Until Cells(i, 1).Value = ""  '値が「""(空)」のセルに出会うまで
	End Sub
</code>
両者の違いは最低一回は処理がされるかどうかです。<br />何度も(1回以上)ループさせることを想定している場合、違いはありません。
<h2>do while</h2>
条件に一致し続ける限り、処理を繰り返します。<br />ほとんど、「do until」と同様の処理を実行可能です。<br />「do until」の逆のことを書けばok!です。
<code class="vba">
	Sub make_it_aqua()
		Dim i As Integer
		i = 1
		Do While Cells(i, 1).Value &lt;&gt; ""  '値が「""(空)」でない限り
			Cells(i, 1).Interior.Color = RGB(0, 255, 255)  'セルの背景色を水色に設定
			i = i + 1  '「i」の値を「1」加算
		Loop
	End Sub
</code>
<img src="../pics/do-while.gif" alt="do while文" />
「do while」も「do until」同様に条件式の判定を最初にする書き方ができます。
<code class="vba">
	Sub make_it_aqua()
		Dim i As Integer
		i = 1
		Do
			Cells(i, 1).Interior.Color = RGB(0, 255, 255)  'セルの背景色を水色に設定
			i = i + 1  '「i」の値を「1」加算
		Loop While Cells(i, 1).Value &lt;&gt; ""  '値が「""(空)」でない限り
	End Sub
</code>
<h2>for each</h2>
オブジェクトの集まりに対してひとつずつオブジェクトを取り出して処理を実行します。<br />以下のように記述します。
<code class="vba">
	Dim c As Range  '「c」変数をrange型のデータとして宣言
	For Each c In Range(セルの範囲)
		 '各セルに対する処理
	Next
</code>
例えば、Rangeでセルを指定する際に複数個のセルを選択して、その各セルに対して処理をする際に用いられます。<br />少し前に作成した掛け算九九に対して偶数と奇数で背景色を設定するプログラムを作成しましょう♪
<code class="vba">
	Sub kuku2()
		Dim c As Range  '「c」変数をrange型のデータとして宣言
		For Each c In Range("A1:9I")
			If c.Value Mod 2 = 0 Then
				c.Interior.Color = RGB(0, 255, 255)
			Else
				c.Interior.Color = RGB(255, 255, 0)
			End If
		Next
	End Sub
</code>
<img src="../pics/for-each.gif" alt="for each文" />
<?php footer(); ?>