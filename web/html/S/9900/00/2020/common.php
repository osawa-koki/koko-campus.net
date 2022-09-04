<?php




function including() {

	if ($_SESSION["subjects"] == "") {
		$subjects_array = array();
	} else {
		try {
			$subjects_array = explode(",", $_SESSION["subjects"]);
		} catch (Exception $e) {
		}
	}

	if ($_SESSION["passed"] == "") {
		$passed_array = array();
	} else {
		try {
			$passed_array = explode(",", $_SESSION["passed"]);
		} catch (Exception $e) {
		}
	}


	# ログインしているかどうかで処理を分岐
	if ($_SESSION["ok"] != 1) {
		$check = 3;
	} else if (in_array("ITパスポート試験", $subjects_array)) {
		$check = 1;
	} else if (in_array("ITパスポート試験", $passed_array)) {
		$check = 2;
	} else {
		$check = 4;
	}

	print "<div class = 'container'>";

	if ($check == 1 || $check == 2 || $check == 4) {
		

		print '<div class = "login_as">';
			print '<p><strong>' .$_SESSION["name"] .'さんとしてログイン中です♪</strong></p>';
		print '</div>';

		
	} else {
		

		print '<div class = "login_as">';
			print '<p><strong>ゲスト様、ログインされていません。</strong></p>';
			print '<p class = "paragraph">会員限定の便利な機能がたくさんあります♪<br>是非会員登録してくださいね♪<br>完全無料です!!!</p>';
			print '<p>・会員登録は<a href = "../../register">こちら</a>。</p>';
			print '<p>・ログインは<a href = "../../login">こちら</a>。</p>';

		print '</div>';
		

	}

}


function include_head ($small_theme, $middle_theme, $big_theme, $href) {
	echo '<!DOCTYPE html>';
	echo '<html lang = "ja">';
	echo '<head>';
		echo '<meta charset = "UTF-8">';
		echo '<title>' .$small_theme .'(ITパスポート)</title>';
		echo '<meta name = "description" content = "' .$small_theme .'-' .$middle_theme .'-' .$big_theme .'">';
		echo '<meta name = "viewport" content = "960px">';
		echo '<link rel = "stylesheet" href = "' .$href .'">';
		echo '<link rel = "stylesheet" href = "ip.css">';
		echo '<meta name="format-detection" content="telephone=no">';
	echo '</head>';
}






function show_footer ($back, $now, $next) {
	$js = $now .".js";
	$test = $now ."-test";
	?>

	<div class = "div_to_test">
		<div class = "get_it_center">
			<a class = "button_to_test" href = "<?php echo $test; ?>" target = "_blank">確認テストに挑戦♪♪♪<small>(別タブを開きます)</small></a>
		</div>
	</div>


	<p>お疲れ様でした♪<br>理解度はいかがでしょうか?<br><br>質問等あれば遠慮なく聞いてくださいね♪<br>問い合わせフォームは<a href = "https://koko-campus.org/contact/index">こちら</a>。</p>



	<div class = "button_container">

		<div class = "get_it_center">
			<a class = "button_back" href = "<?php echo $back; ?>">Get back</a>
		</div>

		<div class = "button_mid_container">
			<div class = "get_it_center">
				<a class = "button_to_top" href = "./top">ITパスポートトップへ</a>
			</div>
			<?php
			if ($_SESSION["ok"] == 1) {
			print "<div class = 'get_it_center'>";
				print '<a class = "button_to_mypage" href = "../../mypage">マイページへ</a>';
			print "</div>";
			}
			?>
		</div>

		<div class = "get_it_center">
			<a class = "button_next" href = "<?php echo $next; ?>">Go Next!</a>
		</div>

	</div>





	<script src = "jquery-3.6.0.min.js" defer></script>
	<script type="text/javascript" src = "<?php echo $js; ?>" defer></script>
	<script type="text/javascript" src = "ip.js" defer></script>


	</body>
	</html>



	<?php
}
	
?>


