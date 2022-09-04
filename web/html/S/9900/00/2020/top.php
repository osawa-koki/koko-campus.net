<?php

session_start();
session_regenerate_id(true);

?>

<!DOCTYPE html>
<html lang = "ja">
<head>
	<meta charset = "UTF-8">
	<title>ITパスポート試験について</title>
	<meta name = "description" content = "ITパスポート試験の概要">
	<link rel = "stylesheet" href = "top.css">
</head>

<body>


<?php
require_once("common.php");
including();
?>



<div style = "text-align: center;">
	<div class="ribbon9">
	  	<h3>ITパスポート試験</h3>
	</div>
</div>



<!-- ここから本文の始まり -->

<div class = "text">
	<h1>&lt;&lt;&lt;ITパスポート試験の概要&gt;&gt;&gt;</h1>

		<table class = "hidden" border = 1>
			<tr>
				<th>難易度</th>
				<td>易しい</td>
			</tr>
			<tr>
				<th>勉強時間</th>
				<td>50時間程度</td>
			</tr>
			<tr>
				<th>資格区分</th>
				<td>国家試験</td>
			</tr>
			<tr>
				<th>ホームページ</th>
				<td><a href = "https://www3.jitec.ipa.go.jp/JitesCbt/index.html">https://www3.jitec.ipa.go.jp/JitesCbt/index.html</a></td>
			</tr>
			<tr>
				<th>テスト方式</th>
				<td>CBT(各テストセンターのコンピュータで行う)</td>
			</tr>
			<tr>
				<th>試験日</th>
				<td>随時</td>
			</tr>
			<tr>
				<th>合格率</th>
				<td>50%前後</td>
			</tr>
		</table>



	<h1>&lt;&lt;&lt;ITパスポート試験の出題範囲&gt;&gt;&gt;</h1>


	<div class = "hidden">
		<p>クリックしたらその下の分類が表示されます。青くなっている文字をクリックするとそのページへ遷移します。</p>
		<div class = "str_sub1">
		<h2 class = "select">ストラテジ系</h2>
			<div class = "hidden">
				<div class = "str_sub2">
				<h4 class = "select">-企業と法務</h4>
					<div class = "hidden">
						<h6><a href = "strategy-1-1">-企業活動</a></h6>
						<h6><a href = "strategy-1-2">-法務</a></h6>
					</div>
				</div>
				<div class = "str_sub2">
				<h4 class = "select">-経営戦略</h4>
					<div class = "hidden">
						<h6><a href = "strategy-2-3">-経営戦略マネジメント</a></h6>
						<h6><a href = "strategy-2-4">-技術戦略マネジメント</a></h6>
						<h6><a href = "strategy-2-5">-ビジネスインダストリ</a></h6>
					</div>
				</div>
				<div class = "str_sub2">
				<h4 class = "select">-システム開発</h4>
					<div class = "hidden">
						<h6><a href = "strategy-3-6">-システム戦略</a></h6>
						<h6><a href = "strategy-3-7">-システム企画</a></h6>
					</div>
				</div>
			</div>
		</div>


		<div class = "man_sub1">
		<h2 class = "select">マネジメント系</h2>
			<div class = "hidden">
				<div class = "man_sub2">
				<h4 class = "select">-開発技術</h4>
					<div class = "hidden">
						<h6><a href = "management-4-8">-システム開発技術</a></h6>
						<h6><a href = "management-4-9">-ソフトウェア開発管理技術</a></h6>
					</div>
				</div>
				<div class = "man_sub2">
				<h4 class = "select">-プロジェクトマネジメント</h4>
					<div class = "hidden">
						<h6><a href = "management-5-10">-プロジェクトマネジメント</a></h6>
					</div>
				</div>
				<div class = "man_sub2">
				<h4 class = "select">-サービスマネジメント</h4>
					<div class = "hidden">
						<h6><a href = "management-6-11">-サービスマネジメント</a></h6>
						<h6><a href = "management-6-12">-システム監査</a></h6>
					</div>
				</div>
			</div>
		</div>


		<div class = "tec_sub1">
		<h2 class = "select">テクノロジ系</h2>
			<div class = "hidden">
				<div class = "tec_sub2">
				<h4 class = "select">-基礎理論</h4>
					<div class = "hidden">
						<h6><a href = "technology-7-13">-基礎理論</a></h6>
						<h6><a href = "technology-7-14">-アルゴリズムとプログラミング</a></h6>
					</div>
				</div>
				<div class = "tec_sub2">
				<h4 class = "select">-コンピュータシステム</h4>
					<div class = "hidden">
						<h6><a href = "technology-8-15">-コンピュータ構成要素</a></h6>
						<h6><a href = "technology-8-16">-システム構成要素</a></h6>
						<h6><a href = "technology-8-17">-ハードウェア</a></h6>
						<h6><a href = "technology-8-18">-ソフトウェア</a></h6>
					</div>
				</div>
				<div class = "tec_sub2">
				<h4 class = "select">-技術要素</h4>
					<div class = "hidden">
						<h6><a href = "technology-9-19">-ヒューマンインタフェース</a></h6>
						<h6><a href = "technology-9-20">-マルチメディア</a></h6>
						<h6><a href = "technology-9-21">-データベース</a></h6>
						<h6><a href = "technology-9-22">-ネットワーク</a></h6>
						<h6><a href = "technology-9-23">-セキュリティ</a></h6>
					</div>
				</div>
			</div>
		</div>



		<p>※<a href = "https://www.ipa.go.jp">情報処理推進機構HP</a>のITパスポートページの試験内容・出題範囲より引用(リンク先は<a href = "https://www3.jitec.ipa.go.jp/JitesCbt/html/about/range.html">こちら</a>)<br>※2021年8月10日時点</p>
		<p>シラバスは<a href = "syllabus5.pdf">こちら</a>。</p>

	</div>



	<h1>&lt;&lt;&lt;webサイト管理者からのコメント&gt;&gt;&gt;</h1>

	<div class = "hidden">

		<p>こんにちは♪このwebサイトの管理者のkokoです♪<br>このページを訪ねてくれてありがとうございます。</p>
		<p>いきなりですけど、、、「ITパスポート」とインターネットで検索してみると「ITパスポート いらない」 「ITパスポート 必要ない」などITパスポート試験の資格としての価値に疑問を投げかける内容がちらほら、、、</p>
		<p>kokoの意見としても実際のところ、ITパスポート試験はITに関する知識の保有を客観的にアピールすることはできないかも、、、と考えています。ITパスポート試験用のwebサイトを作成しておいてですけどね、、、笑</p>
		<p>ではなぜこのwebサイトを作成したのかですよね、、、<br>kokoがこのwebサイトを作成して皆さんのITパスポート試験合格を手助けしようと思った理由は2つあります。</p>
		<p>1つ目はITパスポート試験合格はITの世界へ踏み出す貴重な第一歩になると信じているからです!!!<br>ある朝目覚めて、いきなりプログラミングしよう!、システム開発をしよう!なんてならないですよね、、、<br>ITってとってもワクワクする技術なんです!!!ですけどITに関して難しい印象を抱いてITの世界に踏み出せない人って少なくないと思うんですよね、、、<br>そんな方たちのITの世界への第一歩を後押ししたいと思ったわけです♪</p>
		<p>2つ目は「IT×教育」な挑戦をkoko自身がしたかったからです。もともと人に何かを教えるのが大好きで塾の講師をしたりオンラインスクールの講師をしたりと、、、同時にITが大好きで株価予測プログラムやチャットボットを自作したりなど、、、教育とIT両方同時に達成しよう!!!と立ち上げのがこのmr-campus projectです。</p>
		<p>以上です。ゆっくりしていってくださいね♪</p>

	</div>

<div class = "button_area">
<div>
<a href = "strategy-1-1" class = "button">Get Started!!!</a>
</div>
</div>

<?php

if ($_SESSION['ok'] == 1) {
	?>
	<div class = "go_mypage">
	<button onclick = "location.href = '../mypage'">マイページへ戻る</button>
	</div>
	<?php
}


?>
</div>




<script src = "jquery-3.6.0.min.js" defer></script>
<script charset = "UTF-8" type="text/javascript" src = "top.js" defer></script>




</body>
</html>