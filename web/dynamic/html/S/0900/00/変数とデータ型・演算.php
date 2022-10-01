<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-28",
	"updated" => "2022-02-28"
);
head($obj);
?>
<h2>変数</h2>
変数とはプログラムを実行する際に必要となる一時的なデータを保存するための箱を意味します。<br />変数の使用は以下の3ステップからなります。
<ol>
	<li>変数の宣言</li>
	<li>変数への代入</li>
	<li>変数の参照</li>
</ol>
<h3>変数の宣言</h3>
データを格納するための箱(変数)を用意します。<br />以下のように宣言します。
<code class="fortran">
	データ型 変数
</code>
変数を同時に複数宣言する場合には「,(カンマ)」で区切って表します。
<code class="fortran">
	データ型 変数1, 変数2, 変数3
</code>
データ型とはデータの種類を示すもので、例えば整数型・実数型・複素数型などがあります。<br />データ型については後ほど詳しく説明します。<br />とりあえずここでは整数型(INTEGER)を使用します。<br /><br />では、整数型の変数としてiとjを宣言してみましょう♪
<code class="fortran">
	INTEGER i, j
</code>
<h4>暗黙の型宣言</h4>
変数を使用するにはまず変数の宣言をする必要がありますが、fortranでは「i ～ n」から始まる変数は宣言をしなくても整数型として使用することができ、それ以外は実数型として扱うことができます。<br />したがって、先ほどのコードは省略可能です。<br /><br />これを無効化するには以下の文をプログラムの先頭に記述します。
<code class="fortran">
	implicit none
</code>
fortranでは思わぬバグを防ぐ観点から暗黙の型宣言を無効化することが推奨されています。
<div class="separator"></div>
また、変数の宣言は全てプログラムの先頭で行う必要があります。<br />プログラムで宣言以外の処理(実行)をした後に変数の宣言をすると以下のエラーが出力されます。
<code class="fortran">
	! コンパイルエラー
	Unexpected data declaration statement at (1)
</code>
<h3>変数への代入</h3>
変数にデータを代入するには「=」を使用します。<br />「=」は等価を意味するのではなく、右の値を左の変数に代入することを意味します。<br /><br />では、先ほど宣言した変数に値を代入してみましょう♪
<code class="fortran">
	INTEGER i, j
	i = 10
	j = 25
</code>
i変数に「10」を、j変数に「25」を代入しています。<br /><br />fortranは式の評価(計算)結果を代入することもできます。
<code class="fortran">
	INTEGER i
	i = 10 + 25
</code>
i変数には「35」が代入されます。
<h3>変数の参照</h3>
変数を使用するには変数をそのまま書けばok!です。<br />では、先ほど代入した変数をwrite文でコンソール画面に出力してみましょう♪
<code class="fortran">
	program hi
		implicit none
		i = 10
		j = 25
		write (*,*) i
		write (*,*) j
		stop
	end program

	! ***** コンソール *****
	! 10
	! 25
	! ***** ******** ******
</code>
<h2>データ型</h2>
fortranには以下のデータ型が存在します。
<div class="scroll-600w">
	<table>
		<caption>データ型</caption>
		<tbody>
			<tr>
				<th>INTEGER</th>
				<td>整数型です。<br />約±20億までの範囲であればこちらを使用します。</td>
			</tr>
			<tr>
				<th>INTEGER*8</th>
				<td>8バイト型の整数型です。<br />約±20億を超える場合はこちらを使用します。<br />約±100京の範囲を格納することができます。</td>
			</tr>
			<tr>
				<th>REAL</th>
				<td>単精度実数型です。<br />精度は約6桁で±10<sup>38</sup>の範囲内ならばこちらを使用します。</td>
			</tr>
			<tr>
				<th>DOUBLE PRECISION</th>
				<td>倍精度実数型です。<br />REAl型で表せない場合はこちらを使用します。<br />精度は約14桁で±10<sup>308</sup>まで表すことができます。</td>
			</tr>
			<tr>
				<th>COMPLEX</th>
				<td>複素数型です。<br />「(実数部, 虚数部)」と表します。</td>
			</tr>
			<tr>
				<th>DOUBLE COMPLEX</th>
				<td>COMPLEX型よりも大きいサイズのデータ型です。<br />COMPLEX型と同様に「(実数部, 虚数部)」と表します。</td>
			</tr>
			<tr>
				<th>LOGICAL</th>
				<td>論理型です。<br />「.TRUE.(真)」と「.FALSE.(偽)」の2種類あります。</td>
			</tr>
			<tr>
				<th>CHARACTER</th>
				<td>文字型です。<br />一文字だけ格納することができます。<br />「'(シングルクォーテーション)」で囲んで「'あ'」「'A'」というように表記します。</td>
			</tr>
		</tbody>
	</table>
</div>
<h2>演算</h2>
演算はその性質から大きく以下の3つに分類されます。
<ul>
	<li>算術演算</li>
	<li>関係演算</li>
	<li>論理演算</li>
</ul>
<h3>算術演算</h3>
数字同士の足す・引く・かける・割るといった演算です。
<table>
	<caption>算術演算</caption>
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
			<td>割り算です。</td>
		</tr>
		<tr>
			<th>**</th>
			<td>べき乗です。</td>
		</tr>
	</tbody>
</table>
<code class="fortran">
	program hi
		implicit none
		write (*,*) 5 + 2
		write (*,*) 5 - 2
		write (*,*) 5 * 2
		write (*,*) 5 / 2
		write (*,*) 5 ** 2
		stop
	end program

	! ***** コンソール *****
	! 7
	! 3
	! 10
	! 2
	! 25
	! ***** ******** ******
</code>
最後の「5 / 2」の結果が「2.5」ではなく、「2」となっていることに注意してください。<br />これは整数型同士の演算ですのでその結果も整数型になり、小数点以下が切り捨てられるからです。<br /><br />これを防ぐためには「5」を「5.0」と表記して実数型とする必要があります。
<code class="fortran">
	program hi
		implicit none
		write (*,*) 5 + 2
		write (*,*) 5 - 2
		write (*,*) 5 * 2
		write (*,*) 5.0 / 2
		stop
	end program

	! ***** コンソール *****
	! 7
	! 3
	! 10
	! 2.50000000
	! ***** ******** ******
</code>
もしくはデータ型を変換することで対応することも可能ですが、この方法は後ほど説明します。
<h3>関係演算</h3>
2つの値を比較して「true」ないしは「false」を返す演算です。<br />関係演算とも呼ばれます。<br />比較演算には以下の種類があります。
<table>
	<caption>関係演算</caption>
	<tbody>
		<tr>
			<th>&lt;</th>
			<td>「小なり」<br />右の数字が左の数字よりも(同じを含まない)大きければ「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&lt;=</th>
			<td>「小なりイコール」<br />右の数字が左の数字以上(同じを含む)であれば「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&gt;</th>
			<td>「大なり」<br />右の数字が左の数字よりも(同じを含まない)小さければ「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&gt;=</th>
			<td>「大なりイコール」<br />右の数字が左の数字以下(同じを含む)であれば「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>==</th>
			<td>「イコール(等価演算)」<br />左と右のデータが同じであれば「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>/=</th>
			<td>「ノットイコール(等価演算)」<br />「==」の結果を反転したものです。</td>
		</tr>
	</tbody>
</table>
<code class="fortran">
	program hi
		implicit none
		write (*,*) 5 == 2
		write (*,*) 5 /= 2
		write (*,*) 5 &lt;= 2
		write (*,*) 5 &gt;= 2
		stop
	end program

	! ***** コンソール *****
	! F
	! T
	! F
	! T
	! ***** ******** ******
</code>
<h3>論理演算</h3>
「かつ」と「または」による演算です。
<table>
	<caption>論理演算</caption>
	<thead>
		<tr>
			<th>かつ</th>
			<th>または</th>
		</tr>
		<tr>
			<th>.AND.</th>
			<th>.OR.</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>2つの条件式の両方が「真」の場合に「真」、どちらか一方でも「偽」の場合は「偽」となります。</td>
			<td>2つの条件式のいずれか一方でも「真」の場合に「真」、両方とも「偽」の場合は「偽」となります。</td>
		</tr>
	</tbody>
</table>
また、「.NOT.」演算子を用いれば「真」と「偽」を入れ替えることができます。
<code class="fortran">
	program hi
		implicit none
		LOGICAL t, f
		t = .TRUE.
		f = .FALSE.
		write (*,*) t .AND. t ! T
		write (*,*) t .AND. f ! F
		write (*,*) t .OR. t&nbsp; ! T
		write (*,*) t .OR. f&nbsp; ! T
		write (*,*) .NOT. t&nbsp;&nbsp; ! F
		write (*,*) .NOT. f&nbsp;&nbsp; ! T
		stop
	end program
</code>
<h2>精度の指定</h2>
fortranは数値演算に特化しているため、数値に関しても数字型(整数型・実数型・複素数型)を何バイトで表すかを指定できます。<br />最初に以下のコードを見てください。
<code class="fortran">
	program hi
		implicit none
		REAL x
		REAL y
		x = 10
		y = 3
		write (*,*) x / y
		stop
	end program

	! ***** コンソール *****
	! 3.33333325
	! ***** ******** ******
</code>
これは精度を指定していない状態ですので、小数点数以下何桁で表示されるかは処理系に依存します。<br /><br />では精度を指定してみましょう♪<br />精度の指定は以下のように行います。
<code class="fortran">
	データ型(kind=精度) 変数
</code>
REAl型ではデフォルトでは精度は「4」です。<br />これを「8」に設定してみましょう♪
<code class="fortran">
	program hi
		implicit none
		REAL(kind=8) x
		REAL(kind=8) y
		x = 10
		y = 3
		write (*,*) x / y
		stop
	end program

	! ***** コンソール *****
	! 3.3333333333333335
	! ***** ******** ******
</code>
通常は4バイトを単精度と呼び、8バイトを倍精度と呼びます。<br />したがって、上のコードはDOUBLE COMPLEX型で指定した場合と同じ動作をします。
<code class="fortran">
	program hi
		implicit none
		DOUBLE COMPLEX x
		DOUBLE COMPLEX y
		x = 10
		y = 3
		write (*,*) x / y
		stop
	end program

	! ***** コンソール *****
	! 3.3333333333333335
	! ***** ******** ******
</code>
さらに精度を高めてみましょう♪
<code class="fortran">
	program hi
		implicit none
		REAL(kind=16) x
		REAL(kind=16) y
		x = 10
		y = 3
		write (*,*) x / y
		stop
	end program

	! ***** コンソール *****
	! 3.33333333333333333333333333333333346
	! ***** ******** ******
</code>
<h2>型変換</h2>
fortranでのデータ型を変換する方法にはその性質から以下の2つに分類できます。
<ul>
	<li>暗黙の型変換</li>
	<li>明示的な型変換</li>
</ul>
<h3>暗黙の型変換</h3>
演算対象のデータ型が数字型同士で異なるデータ型である場合は、その演算結果は自動的に大きいデータ型に合わせられます。
<img src="../pics/データ型のサイズ.png" alt="データ型のサイズ" />
<code class="fortran">
	program hi
		implicit none
		REAL(kind=16) n ! 変数の宣言は実行文よりも前で

		write (*,*) 5 / 2
		write (*,*) 5.0 / 2
		write (*,*) 5 / 2.0

		write (*,*) '----------'

		n = 5
		write (*,*) n / 2
		write (*,*) n / 2.0

		stop
	end program

	! ***** コンソール *****
	! 2
	! 2.50000000
	! 2.50000000
	! ----------
	! 2.50000000000000000000000000000000000
	! 2.50000000000000000000000000000000000
	! ***** ******** ******
</code>
といってもこれでは不便な場合があります。<br />例えば、REAL型はINTEGER型よりも大きいと解釈されますが、整数部分の精度ではINTEGER型の方が大きい場合もあるからです。<br />このような問題を克服するためには次で説明する明示的な型変換をします。
<h3>明示的な型変換</h3>
<h4>INTEGER型への変換</h4>
以下のように書きます。
<code class="fortran">
	int(n, 精度)
</code>
<h4>REAL型への変換</h4>
以下のように書きます。
<code class="fortran">
	real(n, 精度)
</code>
<div class="separator"></div>
<code class="fortran">
	program hi
		implicit none

		write (*,*) real(5, 4) / 2
		write (*,*) real(5, 8) / 2
		write (*,*) real(5, 16) / 2

		stop
	end program

	! ***** コンソール *****
	! 2.50000000
	! 2.5000000000000000
	! 2.50000000000000000000000000000000000
	! ***** ******** ******
</code>
<div class="separator"></div>
倍精度実数型に変換するためには以下のように書くこともできます。
<code class="fortran">
	dble(n)
</code>
<code class="fortran">
	program hi
		implicit none

		write (*,*) real(5, 4) / 2
		write (*,*) real(5, 8) / 2
		write (*,*) dble(5) / 2
		write (*,*) real(5, 16) / 2

		stop
	end program

	! ***** コンソール *****
	! 2.50000000
	! 2.5000000000000000
	! 2.5000000000000000
	! 2.50000000000000000000000000000000000
	! ***** ******** ******
</code>
<?php footer(); ?>