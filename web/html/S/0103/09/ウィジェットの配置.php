<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-03-01",
	"updated" => "2022-03-01"
);
head($obj);
?>
<h2>配置メソッド</h2>
配置メソッドとは実際に生成したウィジェットインスタンスをroot上、ないしはFrame上に配置します。<br />配置メソッドには以下の3つがあります。
<ul>
	<li>pack</li>
	<li>grid</li>
	<li>place</li>
</ul>
これらはそれぞれ以下のような特徴も持ちます。
<table>
	<caption>配置メソッド</caption>
	<tbody>
		<tr>
			<th>pack</th>
			<td>一定の方向に対して要素を配置していきます。</td>
		</tr>
		<tr>
			<th>grid</th>
			<td>行と列を指定して格子状に画面をとらえて要素を配置してきます。</td>
		</tr>
		<tr>
			<th>place</th>
			<td>画面上の座標を指定してピンポイントで配置位置を指定します。</td>
		</tr>
	</tbody>
</table>
これ以降はこれらの動作結果を確認するために以下で紹介するFrameを配置していきます。
<code class="python">
	frame1 = tk.Frame(root, width=100, height=50, bg="orange")
	frame2 = tk.Frame(root, width=150, height=30, bg="blue")
	frame3 = tk.Frame(root, width=80, height=40, bg="red")
	frame4 = tk.Frame(root, width=120, height=60, bg="pink")
	frame5 = tk.Frame(root, width=90, height=55, bg="yellow")
	frame6 = tk.Frame(root, width=100, height=30, bg="green")
</code>
分かりやすさの観点から色付けとサイズをそれぞれ分けています。<br /><br />また、レベルでFrame名を付けていますが、これにつては後ほど説明するので無視してok!です。
<h2>pack</h2>
一定の方向に対して要素を配置していきます。<br />引数で何も指定しないと上から下へ要素が配置されていきます。<br />では、packメソッドを用いて先ほど生成したFrameを配置してみましょう♪
<code class="python">
	frame1.pack()
	frame2.pack()
	frame3.pack()
	frame4.pack()
	frame5.pack()
	frame6.pack()
</code>
<img src="../pics/packメソッド-デフォルト.png" alt="tkinter packメソッド" />
packメソッドの引数には以下の項目を指定できます。
<ul>
	<li>side</li>
	<li>expand</li>
	<li>anchor</li>
	<li>fill</li>
	<li>padx・pady</li>
	<li>ipadx・ipady</li>
	<li>before・after</li>
</ul>
<h3>side</h3>
要素の詰め込む方向を指定します。<br />以下の4方向を指定できます。
<table>
	<tbody>
		<tr>
			<th>tk.TOP</th>
			<td>デフォルトではこれが採用されています。<br />上から順に詰め込みます。</td>
		</tr>
		<tr>
			<th>tk.RIGHT</th>
			<td>ウィジェットを右から詰め込みます。</td>
		</tr>
		<tr>
			<th>tk.BOTTOM</th>
			<td>ウィジェットを下から詰め込みます。</td>
		</tr>
		<tr>
			<th>tk.LEFT</th>
			<td>ウィジェットを左から詰め込みます。</td>
		</tr>
	</tbody>
</table>
では右方向に詰め込んでみましょう♪
<code class="python">
	frame1.pack(side=tk.RIGHT)
	frame2.pack(side=tk.RIGHT)
	frame3.pack(side=tk.RIGHT)
	frame4.pack(side=tk.RIGHT)
	frame5.pack(side=tk.RIGHT)
	frame6.pack(side=tk.RIGHT)
</code>
<img src="../pics/packメソッド-side.png" alt="tkinter pack side" />
各要素に異なる方向を指定することも可能です。
<code class="python">
	frame1.pack(side=tk.RIGHT)
	frame2.pack(side=tk.BOTTOM)
	frame3.pack(side=tk.TOP)
	frame4.pack(side=tk.RIGHT)
	frame5.pack(side=tk.LEFT)
	frame6.pack(side=tk.RIGHT)
</code>
<img src="../pics/packメソッド-side(混合).png" alt="tkinter pack side" />
<div class="separator"></div>
ウィンドウサイズを変更するとそれに合わせて配置も動きます。<br /><br />また、要素が重なる場合は最初に配置されたものが上に配置されます。<br />これはpackメソッド以外も同じです。
<img src="../pics/packメソッド-リサイズ.gif" alt="tkinter pack side" />
<h3>expand</h3>
自身が配置されている場所に余白がある場合に、その余白を埋めるように自身の配置空間を拡大するかを指定します。<br />デフォルトでは「0(False)」に指定されていますが、「1(True)」に指定することで自身の配置空間を拡大します。<br />要素自体を拡大するのではなく、要素の配置空間を拡大することに注意してください。<br />難しければ、要素の配置位置を指定するかどうかに置き換えてもoK!です。<br /><br />どの方向に拡大するかは次に指定するanchorで設定します。
<h4>expand=False</h4>
最初にexpandを指定しない場合の配置を紹介します。<br />こんな感じです。<br />といっても、先ほどと同じです。
<img src="../pics/packメソッド-expand0.png" alt="tkinter pack expand" />
<h4>expand=True</h4>
次にframe3とframe5にexpandを設定します。
<code class="python">
	frame1.pack()
	frame2.pack()
	frame3.pack(expand=True, anchor=tk.E)
	frame4.pack()
	frame5.pack(expand=True, anchor=tk.W)
	frame6.pack()
</code>
frame3は右方向に、frame5は左方向に自身の配置空間を拡大しています。
<img src="../pics/packメソッド-expand1.png" alt="tkinter pack expand" />
<h3>anchor</h3>
自身の配置空間のうちの、どこに要素を配置するかを指定します。
<img src="../pics/anchor属性.png" alt="tkinter pack anchor" />
expandで自身の配置空間を拡大して、anchorで配置空間のどの方向に配置するかを指定することが多いです。
<code class="python">
	frame1.pack()
	frame2.pack()
	frame3.pack(anchor=tk.E)
	frame4.pack()
	frame5.pack(anchor=tk.W)
	frame6.pack(anchor=tk.S)
</code>
<img src="../pics/packメソッド-anchor.png" alt="tkinter pack anchor" />
frame6で下方向に配置することを指定しているのに下方向に配置されていませんね、、、<br />これはpackメソッドで上から配置されているら、自身の配置空間を拡大しないと下方向に指定しても意味がないからです。<br /><br />では、先ほどのコードを修正してみましょう♪
<code class="python">
	frame1.pack()
	frame2.pack()
	frame3.pack(anchor=tk.E)
	frame4.pack()
	frame5.pack(anchor=tk.W)
	frame6.pack(expand=True, anchor=tk.S)
</code>
<img src="../pics/packメソッド-expand_anchor.png" alt="tkinter pack anchor" />
<div class="separator"></div>
packメソッドのside属性で縦方向を指定した場合はanchor属性で縦方向を指定しても意味がないです。<br />同様にpackメソッドのside属性で横方向を指定した場合はanchor属性で横方向を指定しても意味がないです。<br /><br />このような場合に自身の配置空間を拡大するためにexpand属性が使用されます。
<h3>fill</h3>
自身の配置空間全体に自身を拡大して配置するかを指定します。<br />以下の4つを指定できます。
<table>
	<tbody>
		<tr>
			<th>tk.NONE</th>
			<td>要素のサイズを拡大しません。</td>
		</tr>
		<tr>
			<th>tk.X</th>
			<td>要素の横幅だけ自身の配置空間全体に広げて配置します。</td>
		</tr>
		<tr>
			<th>tk.Y</th>
			<td>要素の縦幅だけ自身の配置空間全体に広げて配置します。</td>
		</tr>
		<tr>
			<th>tk.BOTH</th>
			<td>要素の横幅・縦幅両方とも自身の配置空間全体に広げて配置します。</td>
		</tr>
	</tbody>
</table>
では、frame3を横方向に広げてframe6を両方向に広げて配置してみましょう♪
<code class="python">
	frame1.pack()
	frame2.pack()
	frame3.pack(fill=tk.X)
	frame4.pack()
	frame5.pack()
	frame6.pack(fill=tk.BOTH)
</code>
<img src="../pics/packメソッド-fill.png" alt="tkinter pack fill" />
frame3は指定通り横方向に広げて配置されていますが、frame6は横方向には広げて配置されていますが、縦方向には広げて配置されていません。<br />これも先ほどと同じ理由で、expandで自身の配置空間が拡大されていないためです。<br />では、frame6のexpand属性をTrueに設定して自身の配置空間と自身のサイズの両方を拡大して配置してみましょう♪
<code class="python">
	frame1.pack()
	frame2.pack()
	frame3.pack(fill=tk.X)
	frame4.pack()
	frame5.pack()
	frame6.pack(expand=True,fill=tk.BOTH)
</code>
<img src="../pics/packメソッド-expand_fill.png" alt="tkinter pack fill" />
<h3>padx・pady</h3>
自身の外側の余白を設定します。
<table>
	<tbody>
		<tr>
			<th>padx</th>
			<td>縦方向の外側の余白を指定します。<br />「(上, 下)」と指定することもできます。</td>
		</tr>
		<tr>
			<th>pady</th>
			<td>横方向の外側の余白を指定します。<br />「(左, 右)」と指定することもできます。</td>
		</tr>
	</tbody>
</table>
では、frame3の上方向の余白に「30」を下方向の余白に「10」を指定し、frame5の上下方向の余白に「10」を指定して配置してみましょう♪
<code class="python">
frame1.pack()
frame2.pack()
frame3.pack(pady=(30, 10))
frame4.pack()
frame5.pack(pady=10)
frame6.pack()
</code>
<img src="../pics/packメソッド-pady.png" alt="tkinter pack pady" />
この方法では上から順に詰め込んでいるため、padxを指定しても意味がありません。
<code class="python">
	frame1.pack()
	frame2.pack()
	frame3.pack(padx=(30, 10))
	frame4.pack()
	frame5.pack(padx=10)
	frame6.pack()
</code>
<img src="../pics/packメソッド-padx(無意味).png" alt="tkinter pack pady" />
<h3>ipadx・ipady</h3>
padxとpadyが外側の余白を指定するのに対してipadx・ipadyは内側の余白を指定します。<br />もっと簡単に説明すると要素のサイズを大きくします。<br /><br />今までのコードでは少しわかりにくいのでここでは新しいコードを使用して配置結果を紹介します。
<code class="python">
	frame1 = tk.Frame(root, width=100, height=50, bg="orange")
	frame2 = tk.Frame(root, width=100, height=50, bg="blue")
	frame3 = tk.Frame(root, width=100, height=50, bg="red")
	frame4 = tk.Frame(root, width=100, height=50, bg="pink")
	frame5 = tk.Frame(root, width=100, height=50, bg="yellow")
	frame6 = tk.Frame(root, width=100, height=50, bg="green")
</code>
全てのサイズを「100x50」に変更しました。<br />これにpackメソッドを使用して配置してみます。
<code class="python">
	frame1.pack()
	frame2.pack()
	frame3.pack()
	frame4.pack()
	frame5.pack()
	frame6.pack()
</code>
<img src="../pics/packメソッド-同一frameサイズ.png" alt="tkinter pack" />
では、これにipadxとipadyを指定してみます。
<code class="python">
	frame1.pack()
	frame2.pack()
	frame3.pack(ipadx=10, ipady=10)
	frame4.pack()
	frame5.pack()
	frame6.pack(ipadx=30)
</code>
<img src="../pics/packメソッド-ipadx・ipady.png" alt="tkinter pack ipadx ipady" />
<h3>before・after</h3>
packメソッドはデフォルトでは使用した順番に詰め込まれていきますが、before属性・after属性を指定することで詰め込む順番を指定することができます。
<table>
	<tbody>
		<tr>
			<th>before</th>
			<td>指定したウィジェットの前に詰め込みます。</td>
		</tr>
		<tr>
			<th>after</th>
			<td>指定したウィジェットの後に詰め込みます。</td>
		</tr>
	</tbody>
</table>
では、frame3をframe1の前に、frame5をframe1の後に配置してみましょう♪
<code class="python">
	frame1.pack()
	frame2.pack()
	frame3.pack(before=frame1)
	frame4.pack()
	frame5.pack(after=frame1)
	frame6.pack()
</code>
<img src="../pics/packメソッド-before・after.png" alt="tkinter pack before after" />
まだ配置されていないウィジェットをbeforeないしはafterで指定するとエラーとなります。
<code class="python">
	# エラー

	frame1.pack()
	frame2.pack()
	frame3.pack(before=frame6) #まだ、frame6はpackされていない、、、
	frame4.pack()
	frame5.pack()
	frame6.pack()

	# ***** コンソール *****
	# self.tk.call(
	# _tkinter.TclError: window '.!frame6' isn't packed
	# ***** ******** ******
</code>
<h2>grid</h2>
配置画面を行と列から管理して、配置位置を行と列で指定します。
<img src="../pics/grid-行と列.png" alt="tkinter grid" />
gridメソッドは以下の項目を指定できます。
<ul>
	<li>row・column</li>
	<li>sticky</li>
	<li>rowspan・columnspan</li>
	<li>padx・pady</li>
	<li>ipadx・ipady</li>
</ul>
<h3>row・column</h3>
行と列を指定します。
<table>
	<tbody>
		<tr>
			<th>row</th>
			<td>行を指定します。<br />行番号は「0」から始まることに注意して下さい。</td>
		</tr>
		<tr>
			<th>column</th>
			<td>列を指定します。<br />列番号は「0」から始まることに注意して下さい。</td>
		</tr>
	</tbody>
</table>
また、行の数と列の数は設定した行番号と列番号によって自動で認識されます。<br /><br />では、gridを用いて配置してみましょう♪<br />「2x3」で配置します。
<code class="python">
	frame1.grid(row=0, column=0)
	frame2.grid(row=0, column=1)
	frame3.grid(row=0, column=2)
	frame4.grid(row=1, column=0)
	frame5.grid(row=1, column=1)
	frame6.grid(row=1, column=2)
</code>
<img src="../pics/gridメソッド-デフォルト.png" alt="tkinter grid" />
各セルのサイズはその行・列で一番大きいウィジェットに合わせられます。
<h3>sticky</h3>
packメソッドのanchor属性と似ています。<br />セル(配置空間)内でその方向に寄せて配置するかを指定します。<br />指定可能な値はanchorと同じです。
<img src="../pics/sticky属性.png" alt="tkinter grid" />
一行目のウィジェットは全て左上に寄せて配置して、二行目のウィジェットは全て右下に寄せて配置してみましょう♪
<code class="python">
	frame1.grid(row=0, column=0, sticky=tk.NW)
	frame2.grid(row=0, column=1, sticky=tk.NW)
	frame3.grid(row=0, column=2, sticky=tk.NW)
	frame4.grid(row=1, column=0, sticky=tk.SE)
	frame5.grid(row=1, column=1, sticky=tk.SE)
	frame6.grid(row=1, column=2, sticky=tk.SE)
</code>
<img src="../pics/gridメソッド-sticky.png" alt="tkinter grid sticky" />
その行・列で最大のウィジェットはその方向に関しては指定しても意味ないですが、簡単のために一律で指定しています。
<h3>rowspan・columnspan</h3>
行方向、または列方向にセルを結合することができます。
<table>
	<tbody>
		<tr>
			<th>rowspan</th>
			<td>縦方向にセルを結合します。</td>
		</tr>
		<tr>
			<th>columnspan</th>
			<td>横方向にセルを結合します。</td>
		</tr>
	</tbody>
</table>
では、セルを結合して複雑にウィジェットを配置してみましょう♪
<code class="python">
	frame1.grid(row=0, column=0)
	frame2.grid(row=0, column=1)
	frame3.grid(row=0, column=2, rowspan=3)
	frame4.grid(row=1, column=0, columnspan=2)
	frame5.grid(row=2, column=0)
	frame6.grid(row=2, column=1)
</code>
<img src="../pics/gridメソッド-rowspan・columnspan.png" alt="tkinter grid rowspan columnspan" />
<div class="separator"></div>
sticky属性は「+」で複数設定することもできます。<br />この場合は指定した方向全体に拡大されるため、ウィジェットのサイズがセルの横方向・縦方向、または全体に拡大されて配置されます。<br />width・heightで指定したサイズは無視されます。
<code class="python">
	# 縦方向に拡大
	grid(sticky=tk.N + tk.S)

	# 横方向に拡大
	grid(sticky=tk.E + tk.W)

	# 全体に拡大
	grid(sticky=tk.NE + tk.SW)
	# or
	grid(sticky=tk.NW + tk.SE)
	# or
	grid(sticky=tk.N + tk.E + tk.S + tk.W)
</code>
では、frame3を全体に拡大して、それ以外は横方向に拡大して配置してみましょう♪
<code class="python">
	frame1.grid(row=0, column=0, sticky=tk.E + tk.W)
	frame2.grid(row=0, column=1, sticky=tk.E + tk.W)
	frame3.grid(row=0, column=2, rowspan=3, sticky=tk.NE + tk.SW)
	frame4.grid(row=1, column=0, columnspan=2, sticky=tk.E + tk.W)
	frame5.grid(row=2, column=0, sticky=tk.E + tk.W)
	frame6.grid(row=2, column=1, sticky=tk.E + tk.W)
</code>
<img src="../pics/gridメソッド-sticky(拡大・横).png" alt="tkinter grid sticky" />
次は、frame3を全体に拡大して、それ以外は縦方向に拡大して配置してみましょう♪
<code class="python">
	frame1.grid(row=0, column=0, sticky=tk.N + tk.S)
	frame2.grid(row=0, column=1, sticky=tk.N + tk.S)
	frame3.grid(row=0, column=2, rowspan=3, sticky=tk.NE + tk.SW)
	frame4.grid(row=1, column=0, columnspan=2, sticky=tk.N + tk.S)
	frame5.grid(row=2, column=0, sticky=tk.N + tk.S)
	frame6.grid(row=2, column=1, sticky=tk.N + tk.S)
</code>
<img src="../pics/gridメソッド-sticky(拡大・縦).png" alt="tkinter grid sticky" />
最後に全てを全体に拡大してみましょう♪
<code class="python">
	frame1.grid(row=0, column=0, sticky=tk.NE + tk.SW)
	frame2.grid(row=0, column=1, sticky=tk.NE + tk.SW)
	frame3.grid(row=0, column=2, rowspan=3, sticky=tk.NE + tk.SW)
	frame4.grid(row=1, column=0, columnspan=2, sticky=tk.NE + tk.SW)
	frame5.grid(row=2, column=0, sticky=tk.NE + tk.SW)
	frame6.grid(row=2, column=1, sticky=tk.NE + tk.SW)
</code>
<img src="../pics/gridメソッド-sticky(拡大・全体).png" alt="tkinter grid sticky" />
<h3>padx・pady</h3>
既にpackメソッドで説明済みです。<br />外側の余白を指定します。<br /><br />では、先ほどのコードを使用して、全てのウィジェットに縦横両方の余白を「10」で設定してみましょう♪
<code class="python">
	frame1.grid(row=0, column=0, sticky=tk.NE + tk.SW, padx=10, pady=10)
	frame2.grid(row=0, column=1, sticky=tk.NE + tk.SW, padx=10, pady=10)
	frame3.grid(row=0, column=2, rowspan=3, sticky=tk.NE + tk.SW, padx=10, pady=10)
	frame4.grid(row=1, column=0, columnspan=2, sticky=tk.NE + tk.SW, padx=10, pady=10)
	frame5.grid(row=2, column=0, sticky=tk.NE + tk.SW, padx=10, pady=10)
	frame6.grid(row=2, column=1, sticky=tk.NE + tk.SW, padx=10, pady=10)
</code>
<img src="../pics/gridメソッド-padx・pady.png" alt="tkinter grid padx pady" />
<h3>ipadx・ipady</h3>
既にpackメソッドで説明済みです。<br />外側の余白を指定します。<br /><br />では、先ほどのコードを使用してframe4の縦方向の余白に「30」を指定してみましょう♪
<code class="python">
	frame1.grid(row=0, column=0, sticky=tk.NE + tk.SW, padx=10, pady=10)
	frame2.grid(row=0, column=1, sticky=tk.NE + tk.SW, padx=10, pady=10)
	frame3.grid(row=0, column=2, rowspan=3, sticky=tk.NE + tk.SW, padx=10, pady=10)
	frame4.grid(row=1, column=0, columnspan=2, sticky=tk.NE + tk.SW, padx=10, pady=10, ipady=30)
	frame5.grid(row=2, column=0, sticky=tk.NE + tk.SW, padx=10, pady=10)
	frame6.grid(row=2, column=1, sticky=tk.NE + tk.SW, padx=10, pady=10)
</code>
<img src="../pics/gridメソッド-ipadx・ipady.png" alt="tkinter grid ipadx ipady" />
<h2>place</h2>
画面上の座標を指定してピンポイントで配置位置を指定します。<br />placeメソッドでは以下の項目を指定します。
<ul>
	<li>x・y</li>
	<li>anchor</li>
	<li>width・height</li>
	<li>relx・rely</li>
	<li>relwidth・relheight</li>
</ul>
また、これ以降は以下のウィジェットを使用して説明します。
<code class="python">
frame1 = tk.Frame(root, width=100, height=50, bg="orange")
frame2 = tk.Frame(root, width=150, height=30, bg="blue")
</code>
<h3>x・y</h3>
z座標とy座標をピンポイントで指定します。<br />次に説明するanchorを指定しない場合はウィジェットの左上の点を基準とします。
<code class="python">
	frame1.place(x=100, y=50)
	frame2.place(x=50, y=250)
</code>
<div class="separator"></div>
また、placeメソッドでx座標とy座標を指定すると画面サイズを変更してもそれに合わせて表示されない点に注意してください。
<img src="../pics/placeメソッド-リサイズ.gif" alt="tkinter place" />
<h3>anchor</h3>
x座標とy座標の基準点を指定します。<br />指定できる値はpackメソッドやgridメソッドと同様です。<br />デフォルトでは左上(tk.NW)が設定されています。
<img src="../pics/anchor属性.png" alt="tkinter place anchor" />
<code class="python">
	frame1.place(x=100, y=50, anchor=tk.CENTER)
	frame2.place(x=50, y=250, anchor=tk.W)
</code>
<img src="../pics/placeメソッド-anchor.png" alt="tkinter place anchor" />
<h3>width・height</h3>
横幅と縦幅を指定します。<br />ウィジェット生成時にも指定した場合はこれが採用されます。
<code class="python">
	frame1.place(x=100, y=50, width=200, height=200)
	frame2.place(x=50, y=250, width=70, height=70)
</code>
<img src="../pics/placeメソッド-width・height.png" alt="tkinter place width height" />
<h3>relx・rely</h3>
表示座標を絶対的な値ではなく、親要素の表示可能位置から相対的に指定します。<br />一番上(左)を「0」とし、一番下(右)を「1」として指定します。
<code class="python">
	frame1.place(relx=0.5, rely=0.5, anchor=tk.CENTER, width=200, height=200)
	frame2.place(relx=1, rely=1, anchor=tk.SE)
</code>
<img src="../pics/placeメソッド-relx・rely.png" alt="tkinter place relx rely" />
<div class="separator"></div>
この方法では相対的に指定しているため、画面サイズがリサイズされた際はそれに合わせて表示されます。
<img src="../pics/placeメソッド-リサイズ(rel_xy).gif" alt="tkinter place relx rely リサイズ" />
あくまでも画面サイズの変更に合わせて変化するのは表示位置だけで、サイズは変更されません。
<h3>relwidth・relheight</h3>
ウィジェットサイズを親要素のサイズを基準として相対的に指定します。<br />親要素のサイズを「1」とします。
<code class="python">
	frame1.place(relx=0.5, rely=0.5, anchor=tk.CENTER, relwidth=0.5, relheight=0.5)
	frame2.place(relx=1, rely=1, anchor=tk.SE, relwidth=0.2, relheight=0.2)
</code>
<img src="../pics/placeメソッド-relwidth・relheight.png" alt="tkinter place relwidth relheight" />
<div class="separator"></div>
この方法では、画面サイズを変更するとそれに合わせてウィジェットサイズも変更されます。<br />relx・relyと合わせることで画面サイズの変更でレイアウトが崩れることを防ぎます。
<img src="../pics/placeメソッド-リサイズ(rel_wh).gif" alt="tkinter place relx rely リサイズ" />
<?php footer(); ?>