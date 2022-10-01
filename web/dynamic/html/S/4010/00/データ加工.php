<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-10",
	"updated" => "2022-01-10"
);
head($obj);
?>
<h2>ソート</h2>
ソートとはデータをある規則に基づいて並び替えることです。<br />forループで対象のデータを走査して、自分で作ったアルゴリズムに基づいて並び替えるという力技も可能ですが、通常はexcelに標準搭載されている機能を用います。<br /><br />並び替えにはセルオブジェクト直下の「Sort」オブジェクトを使用します。<br />主に「Sort」オブジェクトの以下のプロパティ・メソッドを使用します。
<ul>
	<li>SortFields</li>
	<li>SetRange</li>
	<li>Header</li>
	<li>Apply</li>
</ul>
<img src="../pics/sortオブジェクト.png" alt="sortオブジェクト" />
最初にソート用のコードの雛形を紹介します。
<code class="vba">
	With シートオブジェクト.Sort
		.SortFields.Clear
		.SortFields.Add ソート設定
		.SetRange ソート範囲
		.Header = 見出しの有無
		.Apply
	End With
</code>
<h3>SortFields</h3>
ソートを実行する際の設定(どの列の、何を基準に、どういう並びで、、、)をまとめたオブジェクトです。<br />最初に「Clear」メソッドを用いて一旦初期化して、その後に「Add」メソッドを用いて設定を追加します。<br />「Add」メソッドでは以下の設定が可能です。
<table>
	<caption>「SortFields.Add」の引数</caption>
	<tbody>
		<tr>
			<th>Key</th>
			<td>並び替えの基準に設定する列を指定します。</td>
		</tr>
		<tr>
			<th>SortOn</th>
			<td>並び替えの基準を設定します。<br />通常は「xlSortOnValues」でセルの値を基準に並び替えを実行します。</td>
		</tr>
		<tr>
			<th>Order</th>
			<td>「xlAscending」を指定すれば昇順、「xlDescending」を指定すれば降順となります。</td>
		</tr>
	</tbody>
</table>
<p class="r">上の表は上から順に引数の順番となっていますが、「SortFields.Add」に関しては順番で引数を設定するのではなく、名前で引数を設定することをオススメします。</p>
<h3>SetRange</h3>
ソートする範囲を指定します。<br />通常はソート対象の範囲は変動するので、Range("C3:P10")のように固定して指定するのではなく、Range("C3").CurrentRegionのようにあるセルを基準にしたアクティブセル領域を設定します。
<h3>Header</h3>
ソート対象範囲の最初の行が見出しかどうかを指定します。<br />最初が見出しである場合は「xlYes」、最初からデータを格納している場合は「xlNo」と指定します。
<h3>Apply</h3>
以上で設定したソート設定に基づいてソートを実行します。
<div class="separator"></div>
初代のポケモンの図鑑番号と種族値(ステータス算出用の値)によって並び替えるプログラムを紹介します。<br />本当は関数化してもっと簡単に書けるのですが、まだ関数を説明していないので処理をコピペしています。
<code class="vba">
	Sub sort_by_no()  '図鑑番号によって並び替え
		With ActiveSheet.Sort
			.SortFields.Clear
			.SortFields.Add Range("A1"), xlSortOnValues, xlAscending  '図鑑番号は昇順(xlAscending)で
			.SetRange Range("A1").CurrentRegion
			.Header = xlYes
			.Apply
		End With
	End Sub

	Sub sort_by_hp()  'hp種族値によって並び替え
		With ActiveSheet.Sort
			.SortFields.Clear
			.SortFields.Add Range("C1"), xlSortOnValues, xlDescending  'hp種族値は降順(xlDescending)で
			.SetRange Range("A1").CurrentRegion
			.Header = xlYes
			.Apply
		End With
	End Sub

	Sub sort_by_speed()  'speed種族値によって並び替え
		With ActiveSheet.Sort
			.SortFields.Clear
			.SortFields.Add Range("H1"), xlSortOnValues, xlDescending  'speed種族値は降順(xlDescending)で
			.SetRange Range("A1").CurrentRegion
			.Header = xlYes
			.Apply
		End With
	End Sub
</code>
<img class="no-max" src="../pics/sort.gif" alt="sort" />
<h2>データの検索</h2>
条件を設定して、その条件に一致する値を持つセルオブジェクトを取得します。<br />最初にコードを紹介します。
<code class="vba">
	セルオブジェクト.Find 引数
</code>
<table>
	<caption>Findメソッドの引数</caption>
	<tbody>
		<tr>
			<th>What</th>
			<td>検索対象文字列を指定します。</td>
		</tr>
		<tr>
			<th>After</th>
			<td>検索開始位置を指定します。<br />正確にはここで指定したセルの次のセルから検索を開始するため、マクロで次の検索結果を表示するにはひとつ前の検索結果をこの引数に指定します。</td>
		</tr>
		<tr>
			<th>LookIn</th>
			<td>検索対象を指定します。<br />値を検索する場合は「xlValues」、数式を検索する場合は「xlFormulas」、コメントを検索する場合は「xlComments」を指定します。</td>
		</tr>
		<tr>
			<th>LookAt</th>
			<td>検索条件を指定します。<br />完全一致で検索する場合は「xlWhole」、部分一致で検索する場合は「xlPart」を指定します。</td>
		</tr>
		<tr>
			<th>SearchOrder</th>
			<td>検索方向を指定します。<br />行方向(縦方向)に検索する場合は「xlByRows」、列方向(横方向)に検索する場合は「xlByColumns」を指定します。</td>
		</tr>
		<tr>
			<th>SerchDirection</th>
			<td>検索方向を指定します。<br />次の値を検索する場合は「xlNext」、前の値を検索する場合は「xlPrevious」を指定します。</td>
		</tr>
	</tbody>
</table>
<p class="r">引数が多くて順番での管理では内容が煩雑になるため、順番ではなく名前付き引数で引数を指定することをオススメします。</p>
では先ほどの初代ポケモンの種族値表を用いて検索用マクロを作成しましょう♪<br />現在選択しているタイプセルの値を取得してそれと一致するタイプのポケモンを表示しましょう♪
<code class="vba">
	Sub find()
		Dim x As Range  '一致する場合に当該オブジェクトを格納するため
		Set x = Range("I1", Range("I1").End(xlDown)).Find(ActiveCell.Value, ActiveCell)
		If Not x Is Nothing Then  'x変数が空でなかったら(検索が成功すれば)
			MsgBox Cells(x.Row, 2).Value
			x.Select
		End If
	End Sub
</code>
<img src="../pics/find.gif" alt="find" />
マッチした最初のセルオブジェクトしか取得できないため、次の結果を取得するためにはより複雑な処理が必要になります。<br />ここでは説明しません。
<h2>データの置換</h2>
データの検索と似ています。<br />最初にコードの雛形を紹介します。
<code class="vba">
	セルオブジェクト.Replace 引数
</code>
<table>
	<caption>Replaceメソッドの引数</caption>
	<tbody>
		<tr>
			<th>What</th>
			<td>置換対象文字列を指定します。</td>
		</tr>
		<tr>
			<th>Replacement</th>
			<td>置換後文字列を指定します。</td>
		</tr>
		<tr>
			<th>LookAt</th>
			<td>検索条件を指定します。<br />完全一致で検索する場合は「xlWhole」、部分一致で検索する場合は「xlPart」を指定します。</td>
		</tr>
		<tr>
			<th>SearchOrder</th>
			<td>検索の方向を指定します。<br />行方向(縦方向)に検索する場合は「xlByRows」、列方向(横方向)に検索する場合は「xlByColumns」を指定します。</td>
		</tr>
	</tbody>
</table>
ではポケモン種族値表の「ほのお」タイプを漢字(炎)と一括で置換しましょう♪
<code class="vba">
	Sub replace()
		Range("I1", Range("I1").End(xlDown)).replace "ほのお", "炎"
	End Sub
</code>
<img src="../pics/replace.gif" alt="replace" />
<?php footer(); ?>