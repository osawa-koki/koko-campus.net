<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-28",
	"updated" => "2022-02-28"
);
head($obj);
?>
<h2>条件分岐</h2>
条件を満たすかどうかによって実行する処理を制御します。<br />以下のように書きます。
<code class="fortran">
	If (条件式) Then
		! 条件式が真だった場合の処理...
	Else
		! 条件式が偽だった場合の処理...
	End If
</code>
これを連鎖させることもできます。
<code class="fortran">
	If (条件式A) Then
		! 条件式Aを満たした場合の処理...
	Else If (条件式B) Then
		! 条件式Aを満たさずに、
		! 条件式Bを満たした場合の処理...
	Else If (条件式C) Then
		! 条件式Aと条件式Bを満たさずに、
		! 条件式Cを満たした場合の処理...
	Else
		! 条件式A・条件式B・条件式Cのいずれも満たさなかった場合の処理...
	End If
</code>
では、入力した数字がプラスかマイナスかゼロかを判定するプログラムを作成しましょう♪
<code class="fortran">
	program hi
		implicit none
		INTEGER i

		read (*,*) i
		If (i < 0) Then
			write (*,*) 'マイナス'
		Else If (i == 0) Then
			write (*,*) 'ゼロ'
		Else
			write (*,*) 'プラス'
		End If

		stop
	end program
</code>
<img src="../pics/if.gif" alt="if文" />
<h2>反復処理</h2>









<h2>goto文</h2>








<?php footer(); ?>