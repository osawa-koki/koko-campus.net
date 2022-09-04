<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-10",
	"updated" => "2022-01-10"
);
head($obj);
?>
<h2>オブジェクト階層</h2>
あけましておめでとうございます。
<img src="../pics/年賀状.jpg" alt="年賀状の画像" />
<img src="../pics/年賀状2.png" alt="年賀状の画像" />
<p class="r"><a href="https://cc-www2.myjcom.jp/special/nenga/detail.php?id=nenga_tpl_k1_010.jpg">my j:com</a>より。</p>
突然ですけど、この年賀状って正しく届くと思いますか???<br />名前とか〇×はスルーして下さい。<br /><br /><br />う～ん、いきなり、市区町村から書き始めるのはどうでしょうか???<br />同じ都道府県内ならok!ですけど、違う都道府県に送るならng!ですよね、、、<br />しっかり最初から住所を書く必要があります。<br />まあ、でも「宇宙銀河系太陽系地球アジア圏日本関東圏埼玉県草加市〇〇〇町××-××」とまで正確に書く必要もないし、、、<br /><br />ということで、まずはオブジェクト階層について学びましょう♪<br />オブジェクトについては既に学びましたが覚えていますか?
<p class="r">忘れた方は<a href="vba基本操作">こちら</a>。</p>
オブジェクトって先ほどの住所の例と同様に階層構造をとります。<br />excelデータもオブジェクトですので、オブジェクト階層をとります。<br />ですので、A1セルって言ってもどのexcelアプリのどのブックのどのシートのA1セルなのか判定できないんです、、、<br />通常ならば良い感じに判定してくれますが、一応ここでオブジェクト階層について学んでおきましょう♪<br />excel-vbaでのオブジェクト階層は以下のようになっています。
<img src="../pics/オブジェクト階層.png" alt="オブジェクト階層" />
<h3>Application</h3>
excel全体を表すオブジェクトです。<br />vbaでの最上位に位置するオブジェクトです。<br />通常はApplicationオブジェクトであることは明白なので、これを省略します。<br />一応、Applicationオブジェクトの取得方法を紹介します。
<code class="vba">
	Application
</code>
<h3>Workbooks</h3>
ブックとは簡単に言えばエクセルファイルのことを言います。<br />Workbooksオブジェクトとは現在開かれている全てのブック(エクセルファイル)の集まりです。
<img src="../pics/workbooks.png" alt="workbooks" />
複数のexcelファイル(Workbooks)を開いてvbaの画面に移ってください。<br />各ブックごとに下位のオブジェクトが存在します。
<img src="../pics/workbooks.gif" alt="workbook" />
開かれているブックがひとつの場合は特に指定しなくてもok!ですが、複数のブックを開いている場合はどのブックのオブジェクトかを指定する必要があります。<br />vbaでブックを指定する場合は以下のように記述します。
<code class="vba">
	Application.Workbooks(ブック名)  '「Application」は省略可能
</code>
<table>
	<caption>ブック名</caption>
	<tbody>
		<tr>
			<th>インデックス番号</th>
			<td>何番目に開いたブックかで指定します。<br />開く順番によって変わってしまうため、これを用いることはほとんどありません。</td>
		</tr>
		<tr>
			<th>名前</th>
			<td>ブック名(ファイル名)で指定します。<br />拡張子を表示している場合は拡張子も含めて指定します。</td>
		</tr>
	</tbody>
</table>
実際のところ、複数のブックから特定のブックを指定することはあまりないです、、、<br />現在作業中のブックは以下のコードで取得します。
<code class="vba">
	Application.ActiveWorkbook
</code>
では実際に複数のブックを開いて現在作業中のブックを表示しましょう♪
<code class="vba">
	Sub where_am_i()
		MsgBox Application.ActiveWorkbook.Name  'MsgBoxでメッセージダイアログを表示|.Nameでファイル名を取得
	End Sub
</code>
<img class="no-max" src="../pics/active-workbook.gif" alt="active workbook" />
<p class="r">ごめんなさい、、、少し見ずらいですね、、、</p>
そのブックのファイル名がメッセージダイアログに表示されています。<br />「.Name」ではなく、「.Path」にすればそのファイルまでのパスを、「.FullName」にすればそのファイルまでのパス(ファイル名を含む)を表示します。
<h3>Worksheets</h3>
excel画面の下側に表示されているシートを指します。<br />1つのブックにひとつ、ないしは複数のシートが存在します。
<img class="no-max" src="../pics/worksheets.gif" alt="worksheet" />
vbaでは以下のように指定します。
<code class="vba">
	Application.Workbooksオブジェクト.Worksheets(シート名)
</code>
省略して以下のように記述することができます。<br />省略した場合は現在作業中のブック以下のシートが指定されます。
<code class="vba">
	Worksheets(シート名)
</code>
<table>
	<caption>シート名</caption>
	<tbody>
		<tr>
			<th>インデックス番号</th>
			<td>左から何番目のシートかを指定します。</td>
		</tr>
		<tr>
			<th>名前</th>
			<td>シート名を指定します。</td>
		</tr>
	</tbody>
</table>
<h2>ブックの操作</h2>
ブックの操作では以下の処理を学びます。
<ul>
	<li>ブックの参照</li>
	<li>ブックを開く</li>
	<li>ブックを閉じる</li>
	<li>ブックの追加</li>
	<li>ブックの保存</li>
</ul>
<h3>ブックの参照</h3>
以下のように記述します。
<code class="vba">
	Workbooks(ブック名).Activate
</code>
では下にあるブック(koko2)を参照して上にあるブック(koko1)の上に表示します。
<code class="vba">
	Sub lets_activate()
		Workbooks("koko2.xlsm").Activate
	End Sub
</code>
<img src="../pics/activate-workbooks.gif" alt="activate-workbooks" />
<h3>ブックを開く</h3>
ブックを開くには以下のコードを実行します。
<code class="vba">
	Workbooks.Open 開くファイルへのパス
</code>
パス指定には絶対パス指定と相対パス指定の両方が使用可能です。
<table>
	<caption>パス指定</caption>
	<tbody>
		<tr>
			<th>絶対パス指定</th>
			<td>ルートディレクトリから始まるパスを指定します。<br />windowsではC:\から始まるファイルパスです。</td>
		</tr>
		<tr>
			<th>相対パス指定</th>
			<td>自身のファイルを基準にしてパスを指定します。<br />現在いるディレクトリと同じ場合は「ファイル名」、ひとつ上にあるディレクトリにある場合は「../ファイル名」、ふたつ上のディレクトリのdirディレクトリ内にある場合は「../../dir/ファイル名」という感じで指定します。</td>
		</tr>
	</tbody>
</table>
では実際に「koko1.xlsm」からマクロを実行して、同一ディレクトリ内の「koko2.xlsm」ブックを開くプログラムを作りましょう♪
<code class="vba">
	Workbooks.Open "koko2.xlsm"
</code>
<img src="../pics/open-workbooks.gif" alt="open-workbooks" />
<h3>ブックを閉じる</h3>
ブックを閉じるには以下のコードを実行します。
<code class="vba">
	Workbooks(ブック名).Close
</code>
では、先ほど開いた「koko2.xlsm」ファイルを閉じましょう。
<code class="vba">
	Workbooks("koko2.xlsm").Close
</code>
<img src="../pics/close-workbooks.gif" alt="close-workbooks" />
<h3>ブックの追加</h3>
ブック(ファイル)を追加します。
<code class="vba">
	Workbooks.Add
</code>
<img src="../pics/add-workbooks.gif" alt="add-workbooks" />
<h3>ブックの保存</h3>
上書き保存と名前を付けて保存で処理が異なります。
<h4>上書き保存</h4>
<code class="vba">
	ブックオブジェクト.Save
</code>
<h4>名前を付けて保存</h4>
<code class="vba">
	ブックオブジェクト.SaveAs 保存するファイル名
</code>
<h2>シートの操作</h2>
シートの操作では以下の6つを学びます。
<ul>
	<li>シートの参照</li>
	<li>シートのコピー</li>
	<li>シートの移動</li>
	<li>シートの追加</li>
	<li>シートの削除</li>
	<li>シート名の変更</li>
</ul>
<h3>シートの参照</h3>
以下のコードで実行します。
<code class="vba">
	シートオブジェクト.Select
</code>
<code class="vba">
	Sub select_sheet()
		Worksheets("Sheet2").Select
	End Sub
</code>
<img src="../pics/select-worksheets.gif" alt="select-worksheets" />
<h3>シートのコピー</h3>
シートのコピーは以下のコードで実行します。
<code class="vba">
	シートオブジェクト.Copy コピー先
</code>
コピー先には以下の引数を指定可能です。
<table>
	<caption>シートのコピー先引数</caption>
	<tbody>
		<tr>
			<th>Before</th>
			<td>引数で指定したシートの前にコピーします。<br />第一引数です。</td>
		</tr>
		<tr>
			<th>Aefore</th>
			<td>引数で指定したシートの後にコピーします。<br />第二引数です。</td>
		</tr>
	</tbody>
</table>
<code class="vba">
	Sub copy_sheet()
		Worksheets("Sheet1").Copy , Worksheets(Worksheets.Count)  'シートの一番最後の後ろにコピー(第二引数なので「,」を忘れずに!)
	End Sub
</code>
<img src="../pics/copy-worksheets.gif" alt="copy-worksheets" />
<h3>シートの移動</h3>
シートの移動は以下のコードで実行します。
<code class="vba">
	シートオブジェクト.Move 移動先
</code>
移動先には以下の引数を指定可能です。
<table>
	<caption>シートの移動先引数</caption>
	<tbody>
		<tr>
			<th>Before</th>
			<td>引数で指定したシートの前に移動します。<br />第一引数です。</td>
		</tr>
		<tr>
			<th>Aefore</th>
			<td>引数で指定したシートの後に移動します。<br />第二引数です。</td>
		</tr>
	</tbody>
</table>
<code class="vba">
	Sub move_sheet()
		Worksheets("Sheet1").Move , Worksheets(Worksheets.Count)  'シートの一番最後の後ろにコピー(第二引数なので「,」を忘れずに!)
	End Sub
</code>
<img src="../pics/move-worksheets.gif" alt="move-worksheets" />
<h3>シートの追加</h3>
シートの追加は以下のコードで実行します。
<code class="vba">
	Worksheets.Add 追加先
</code>
追加先には以下の引数を指定可能です。
<table>
	<caption>シートの追加先引数</caption>
	<tbody>
		<tr>
			<th>Before</th>
			<td>引数で指定したシートの前に追加します。<br />第一引数です。</td>
		</tr>
		<tr>
			<th>Aefore</th>
			<td>引数で指定したシートの後に追加します。<br />第二引数です。</td>
		</tr>
	</tbody>
</table>
<code class="vba">
	Sub add_sheet()
		Worksheets.Add , Worksheets(Worksheets.Count)  'シートの一番最後の後ろにコピー(第二引数なので「,」を忘れずに!)
	End Sub
</code>
<img src="../pics/add-worksheets.gif" alt="add-worksheets" />
<h3>シートの削除</h3>
シートの削除は以下のコードで実行します。
<code class="vba">
	シートオブジェクト.Delete
</code>
<code class="vba">
	Sub delete_sheet()
		Worksheets("sheet2").Delete
	End Sub
</code>
<img src="../pics/delete-worksheets.gif" alt="delete-worksheets" />
確認画面を非表示にしたい場合は一時的に「Application.DisplayAlerts」を「False」に設定します。
<code class="vba">
	Sub delete_sheet()
		Application.DisplayAlerts = False  '確認を非表示に
		Worksheets("sheet2").Delete  '削除
		Application.DisplayAlerts = True  '元に戻す
	End Sub
</code>
<img src="../pics/delete2-worksheets.gif" alt="delete-worksheets" />
<h3>シート名の変更</h3>
シート名の変更は以下のコードで実行します。
<code class="vba">
	シートオブジェクト.Name = 設定する名前
</code>
ではシート名をA1セルに入っている値に設定しましょう♪<br />反復処理(for each)を用いて全てのシートを走査しています。<br />覚えていますか?
<code class="vba">
	Sub rename_sheet()
		Dim s As Worksheet  '「s」変数をワークシート型で宣言
		For Each s In Worksheets  'すべてのワークシートを走査
			s.Name = s.Range("A1").Value  'シート名をA1セルの値に設定
		Next
	End Sub
</code>
<img src="../pics/rename-worksheets.gif" alt="rename-worksheets" />
<h2>行・列の操作</h2>
行と列に関する操作では以下の4つを学びます。
<ul>
	<li>行・列の参照</li>
	<li>行・列の挿入</li>
	<li>行・列の削除</li>
	<li>行・列の表示・非表示</li>
</ul>
<h3>行・列の参照</h3>
行・列を参照するには以下のコードを実行します。
<code class="vba">
	行・列オブジェクト.Select
</code>
<table>
	<caption>行・列オブジェクトの取得</caption>
	<tbody>
		<tr>
			<th>Rows(n)</th>
			<td>n行目</td>
		</tr>
		<tr>
			<th>Rows("n:N")</th>
			<td>n行目～N行目</td>
		</tr>
		<tr>
			<th>Range("n1:N1,n2:N2")</th>
			<td>n1行目～N1行目とn2行目～N2行目</td>
		</tr>
		<tr>
			<th>Rows</th>
			<td>全ての行</td>
		</tr>
		<tr>
			<th>Columns(n)</th>
			<td>n列目<p class="r">数字でもアルファベットでもok!です。</p></td>
		</tr>
		<tr>
			<th>Columns("n:N")</th>
			<td>n列目～N列目<p class="r">アルファベットのみok!です。</p></td>
		</tr>
		<tr>
			<th>Range("n1:N1,n2:N2")</th>
			<td>n1列目～N1列目とn2列目～N2列目<p class="r">アルファベットのみok!です。</p></td>
		</tr>
		<tr>
			<th>Columns</th>
			<td>全ての列</td>
		</tr>
	</tbody>
</table>
<code class="vba">
	Sub select_rowcol()
		Columns("F:P").Select
	End Sub
</code>
<img src="../pics/select-rowcol.gif" alt="rows-columns" />
<h3>行・列の挿入</h3>
行列を挿入するには以下のコードを実行します。
<code class="vba">
	行・列オブジェクト.Insert シフト方向
</code>
<table>
	<caption>シフト方向</caption>
	<tbody>
		<tr>
			<th>xlFormatFromLeftOrAbove</th>
			<td>左ないしは上から書式を継承します。</td>
		</tr>
		<tr>
			<th>xlFormatFromRightOrBelow</th>
			<td>右ないしは下から書式を継承します。</td>
		</tr>
	</tbody>
</table>
<code class="vba">
	Sub insert_rowcol()
		Columns("D:F").Insert xlFormatFromRightOrBelow
	End Sub
</code>
<img src="../pics/insert-rowcol.gif" alt="rows-columns" />
<h3>行・列の削除</h3>
行列を挿入するには以下のコードを実行します。
<code class="vba">
	行・列オブジェクト.Delete
</code>
<code class="vba">
	Sub delete_rowcol()
		Columns("D:F").Delete
	End Sub
</code>
<img src="../pics/delete-rowcol.gif" alt="rows-columns" />
<h3>行・列の表示・非表示</h3>
行・列の表示・非表示を設定するには以下のコードを実行します。
<code class="vba">
	行・列オブジェクト.Hidden = True  '非表示
	行・列オブジェクト.Hidden = True  '表示
</code>
「Hidden」が「True」の場合は非表示、「False」の場合は表示になることに注意してください。
<code class="vba">
	Sub hidden_rowcol()
		Columns("D").Hidden = True
	End Sub

	Sub show_rowcol()
		Columns("D").Hidden = False
	End Sub
</code>
<img src="../pics/hidden-rowcol.gif" alt="rows-columns" />
<?php footer(); ?>