<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-04-10",
	"updated" => "2022-04-10"
);
head($obj);
?>
<h2>列挙型</h2>
少し特殊なデータ型として列挙型とオブジェクト型があります。<br />まず、列挙型について説明します。<br /><br />列挙型とは複数の取り得る選択肢のうち、どれかひとつが実現する場合のデータ型です。<br />例えば、IPアドレスにはIPv4とIPv6と2種類ありますが、実際にはこのどちらかが採用されます。<br />また、曜日は「月」～「日」までありますが、こちらも実現するのはどれかひとつです。
<h3>列挙型の宣言</h3>
列挙型は以下のように宣言します。
<code class="vb-dot-net">
	アクセス修飾子 Enum 名前 As データ型 {
		メンバ1
		メンバ2
		メンバ3
	}
</code>
アクセス修飾子はデータ型は省略することができます。<br /><br />デフォルトではメンバ1から順に「0」「1」「2」...と連番の整数が振られます。<br /><br />メンバに対して「メンバ = 数字」とすることで、メンバに対する数字を明示的に設定することもできます。<br />この場合には、その次のメンバに対しては「+1」した数字が加算されます。<br /><br />では、Man(男性)を「1」、Woman(女性)を「2」、その他を「0」としたSex列挙型を宣言して使用してみましょう♪
<code class="vb-dot-net">
	Public Enum Sex
		Man = 1
		Woman
		Other = 0
	End Enum

	Sub Main()
		Dim d As Sex
		Dim s = Console.ReadLine()
		Select Case s
			Case "Man"
				d = Sex.Man
			Case "Woman"
				d = Sex.Woman
			Case Else
				d = Sex.Other
		End Select
		Console.WriteLine(d &amp; "は" & d.ToString() &amp; "です。")
	End Sub
</code>
<img src="../pics/列挙型.gif" alt="列挙型" />
<h2>オブジェクト型</h2>
何でも格納できる最強のデータ型です。<br />コンパイル時にデータ型のチェックを行わないため、Object型についてはコンパイルエラーは発生しません。<br />しかしながら、曖昧なデータ型の状態で処理を進めると実行時エラーの誘発など思わぬバグにつながる危険性があるため、原則として使用するべきではありません。<br />僕はコンパイラ時にデータ型をすべてチェックする強い静的型付け言語が好きなので、オブジェクト型はあまり好きではありません。<br />一応、参考までに紹介します。
<code class="vb-dot-net">
	Dim x As Object
	x = 100S
	Console.WriteLine(x.GetType())
	x = 100.00F
	Console.WriteLine(x.GetType())
	x = "100"
	Console.WriteLine(x.GetType())
	x = True
	Console.WriteLine(x.GetType())

	' ***** コンソール *****
	' System.Int16
	' System.Single
	' System.String
	' System.Boolean
	' ***** ******** ******
</code>
どんなデータ型の値を代入してもok!です。<br />一見すると便利ではありますが、当然コーディング時にデータ型をあいまいにしておくメリットはありません。<br />もう一度言いますが、保守性の観点やエラー回避の観点から使用は避けるべきです。
<?php footer(); ?>