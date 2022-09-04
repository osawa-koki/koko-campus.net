<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-28",
	"updated" => "2022-02-28"
);
head($obj);
?>
<h2>fortran</h2>
<div class="bg bg-logo-fortran入門">
	fortranとは1954年にIBMのジョン・バッカスによって開発された世界初のプログラミング言語です。<br />現在でのシェアは決して高くありませんが、数値計算分野では未だに広く使用されています。<br /><br />とにかく高い実行効率を誇り、スパコンに搭載される言語としても認識されています。<br /><br />java・python・julia・c/c++などのモダン??な言語は全てfortranを起源ともしているため、fortranを学ぶことでこれらの言語のさらなる理解に繋がるかもしれません。<br /><br />ということで、Let's&nbsp;study&nbsp;fortran!!
</div>
<h2>言語バージョン</h2>
fortranは開発された1954年以降も改良が加えられて、幾つかのバージョンが存在します。
<table>
	<tbody>
		<tr>
			<th>Fortran 66</th>
			<td>世界で初めてのプログラミング言語標準</td>
		</tr>
		<tr>
			<th>Fortran 77</th>
			<td>固定形式形式で、1990年以前での事実上の標準です。</td>
		</tr>
		<tr>
			<th>Fortran 90/95</th>
			<td>自由記述形式で、現在での事実上の標準です。</td>
		</tr>
		<tr>
			<th>Fortran 2003</th>
			<td>オブジェクト指向の概念が導入されています。</td>
		</tr>
		<tr>
			<th>Fortran 2008</th>
			<td>簡単なバージョンアップがされています。</td>
		</tr>
		<tr>
			<th>Fortran 2018</th>
			<td>簡単なバージョンアップがされています。</td>
		</tr>
	</tbody>
</table>
ここでは、現在での事実上の標準として認識されているFortran 90/95を想定して説明します。
<h2>コンパイラの取得</h2>
以下のリンクからfortranコンパイラのインストーラをダウンロードします。
<a href="https://jmeubank.github.io/tdm-gcc/download/" class="link to-tdm-gcc">fortranコンパイラ</a>
ダウンロードが完了したらそのまま起動します。<br />インストールの設定画面へ移ります。<br /><br />「32ビットと64ビット型」を選択し、gccのツリー画面を開いて「fortran」にチェックを入れます。
<img src="../pics/コンパイラ-インストール.gif" alt="gfortran" />
これで、fortranコンパイラのインストールは完了です。<br />正常にインストールが完了しているか確認するために以下のコマンドをコマンドプロンプトで実行してください。
<code class="shell">
	gfortran --version
</code>
バージョン名が表示されたらインストールに成功しています。
<img src="../pics/gfortran-version.gif" alt="gfortran --version" />
<h2>コンパイルの実行</h2>
では実際にfortranコードをコンパイルしてみましょう♪<br />以下のコマンドを実行します。
<code class="shell">
	gfortran ファイルへのパス -o 実行可能プログラム名
</code>
「-o」以降の実行可能プログラム名は省略可能です。<br />省略するとwindowsでは「a.exe」という名前の実行可能プログラムが生成されます。<br /><br />では試しにこんなピルしてみましょう♪<br />コンパイルするコードは以下の記載します。
<p>中身は無視してok!です。</p>
<code class="main-dot-f90">
	program hi
		WRITE (*,*) 'hello fortran'
		STOP
	end program hi
</code>
拡張子は慣例として「.f90」とします。<br />では、このコードをコンパイルしてみましょう♪
<code class="shell">
	gfortran main.f90 -o main
</code>
これで、「main.exe」という名前の実行可能プログラムが生成されます。<br />実行すると「hello fortran」と出力されます。
<img src="../pics/コードのコンパイルと実行.gif" alt="fortran コンパイル" />
<?php footer(); ?>