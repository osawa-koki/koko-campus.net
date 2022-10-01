<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-25",
	"updated" => "2022-03-25"
);
head($obj);
?>
<h2>ITパスポート試験</h2>
<a href="https://www3.jitec.ipa.go.jp/JitesCbt/html/about/about.html">公式ページ</a>では「ｉパスは、ITを利活用するすべての社会人・これから社会人となる学生が備えておくべき、ITに関する基礎的な知識が証明できる国家試験です。」と説明されています。<br /><br />ITの世界への第一歩として取得することをオススメします。<br />ITパスポート試験は一般的にITを「使う側」を想定した試験であるため、ITに携わる人(作る側)は上位に位置する基本情報技術者試験や応用情報技術者試験の受験が想定されます。<br />しかしながら、いきなりこれらの試験に合格するのは難しいのでそのための準備としてITパスポート試験を受験することをオススメします。<br /><br />インターネット上の記事を漁ると、「ITパスポート試験はいらない」や「ITパスポート試験は文系学生のための試験」と揶揄していることが多いですが、立派な国家試験です。<br />また、かなり体系的に構成されていることからITに関する基礎的な、かつ有効な知識を得ることができます。<br /><br />ということで、ITパスポート試験の勉強を始めましょう♪
<img src="../pics/体系.png" alt="情報処理技術者試験の体系" />
<div class="separator"></div>
一応、下にver1(2020年版)へのリンクを貼っておきます。<br />特に使用する必要はありません。
<a href="../ver2020/top" class="link ver1" target="_blank">ver1</a>
<h2>概要</h2>
<div class="scroll-600w">
	<table>
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
			<td><a href="https://www3.jitec.ipa.go.jp/JitesCbt/index.html">https://www3.jitec.ipa.go.jp/JitesCbt/index.html</a></td>
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
</div>
<h2>出題範囲</h2>
<div id="index-subs_box">
	<div>
		<div>ストラテジ系</div>
		<div>
			<div>企業と法務</div>
			<div class="subjects-box">
				<a>企業活動</a>
				<a>法務</a>
			</div>
			<div>経営戦略</div>
			<div class="subjects-box">
				<a>経営戦略マネジメント</a>
				<a>技術戦略マネジメント</a>
				<a>ビジネスインダストリ</a>
			</div>
			<div>システム開発</div>
			<div class="subjects-box">
				<a>システム戦略</a>
				<a>システム企画</a>
			</div>
		</div>
	</div>
	<div>
		<div>マネジメント系</div>
		<div>
			<div>開発技術</div>
			<div class="subjects-box">
				<a>システム開発技術</a>
				<a>ソフトウェア開発管理技術</a>
			</div>
			<div>プロジェクトマネジメント</div>
			<div class="subjects-box">
				<a>プロジェクトマネジメント</a>
			</div>
			<div>サービスマネジメント</div>
			<div class="subjects-box">
				<a>サービスマネジメント</a>
				<a>システム監査</a>
			</div>
		</div>
	</div>
	<div>
		<div>テクノロジ系</div>
		<div>
			<div>基礎理論</div>
			<div class="subjects-box">
				<a>基礎理論</a>
				<a>アルゴリズムとプログラミング</a>
			</div>
			<div>コンピュータシステム</div>
			<div class="subjects-box">
				<a>コンピュータ構成要素</a>
				<a>システム構成要素</a>
				<a>ハードウェア</a>
				<a>ソフトウェア</a>
			</div>
			<div>技術要素</div>
			<div class="subjects-box">
				<a>ヒューマンインタフェース</a>
				<a>マルチメディア</a>
				<a>データベース</a>
				<a>ネットワーク</a>
				<a>セキュリティ</a>
			</div>
		</div>
	</div>	
</div>
<script charset="UTF-8" type="text/javascript">
	const pr = document.getElementById("index-subs_box"),
		a = pr.getElementsByTagName("a"),
		b = pr.getElementsByClassName("subjects-box");
	Array.from(a).forEach(e => {
		const name = e.textContent;
		e.setAttribute("href", name);
		e.classList.add("x");
	});
	let i;
	for (i = 0; i < b.length; i++) {
		b[i].style.backgroundColor = `hsla(${i * 360 / b.length}, 100%, 50%, 0.2)`
	}
</script>
<?php footer(); ?>