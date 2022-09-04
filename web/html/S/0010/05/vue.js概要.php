<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2021-12-20",
	"updated" => "2021-12-20"
);
head($obj);
?>
<!--
<(\/?)(.+?)>
&lt;$1$2&gt;
-->
<h2>vue.js概要</h2>
vue.jsとはEvan Youさんによって2014年2月にリリースされたjavascript用のフレームワークです。<br />Evanさんは、vue.jsについて「Angular(少し古いjavascriptフレームワーク)の本当に好きだった部分を抽出してシンプルに作成した」と述べています。<br /><br />2015年にはphpの超強力なフレームワークであるLaravelのフロントエンジンとして採用されたことで知名度が一気に増しました。<br /><br />現在では「任天堂・Adobe・LINE・GitLab・apple・google」などの超大手企業でも採用されています。
<p class="r">フレームワークって言葉を何回か用いましたが、これはjqueryなどが該当するライブラリの進化バージョンだと思えばok!です。</p>
ではvue.js公式ページを紹介しますね♪
<a id="link-to-vuejs" class="link" href="https://jp.vuejs.org/">vue.js</a>
このサイトで提供される情報は二次情報であり迅速性・正確性・網羅性が欠けていることがありますので、一次情報も見たいという方はこちらからお願いします。
<p class="r">このサイトでも迅速性・正確性・網羅性はできるだけ確保しつつも分かりやすく解説していますが、一次情報には絶対に勝てませんので、、、</p>
<h3>強み</h3>
vue.jsフレームワークの強みとして以下の点があげられます。
<ul>
	<li>簡単</li>
	<li>柔軟</li>
</ul>
<h4>簡単</h4>
いわゆる環境構築作業等(コンパイル・環境変数登録・etc...)が必要なく、ファイルをひとつだけ読み込むことで利用可能です。
<h4>柔軟</h4>
表示そのものである「view」、表示するデータ及びデータを操作する手続きをひとまとめにした「view model」、これらを管理するコントローラ「controller」からなり、このうちの「view」の部分を人に変わって自動で処理をしてくれるため、管理が容易になり、柔軟なwebサイトを構築することが可能になります。
<div class="separator"></div>
この2つがあれば採用するための十分な理由になりますね♪<br />では早速、vue.jsを始めましょう♪
<h2>インストール</h2>
vue.jsをインストールする方法は以下の4つあります。
<ul>
	<li>cdn</li>
	<li>npm</li>
	<li>自分でホスト</li>
	<li>公式のCLIの使用</li>
</ul>
特に理由がない限りは、「cdn」による方法をオススメします。<br />理由はhtml上に一行のコードを書くだけでok!だからです。<br /><br />以下のコードをhtml上に記載します。
<code class="html">
	&lt;script charset="UTF-8" type="text/javascript" src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js" defer&gt;&lt;/script&gt;
</code>
<!--
上の方法では、使用するバージョンを指定していますが、以下のコードを使用することで常に最新のコードを使用できます。
<p class="r">本番環境では思わぬバグの防止の観点からオススメできません。</p>
<code class="html">
	&lt;script charset="UTF-8" type="text/javascript" src="https://unpkg.com/vue@next"&gt;&lt;/script&gt;
</code>
-->
<h2>vue.jsの特徴</h2>
vue.jsの特徴として以下の2つがあります。
<ul>
	<li>データ駆動型</li>
	<li>コンポーネント管理</li>
</ul>
<h3>データ駆動型</h3>
通常のhtmlとjavascriptの関係は最初にhtmlを読み込んでDOMを作成してjavscriptでDOMを操作するといった感じですが、vue.jsでは最初にデータを作成してそれを元にDOMを構築します。<br />そのため、vue.jsではデータとDOMの関係が密であり、この関係を実現するためにデータバインディングという手法が用いられます。
<p class="r">DOMとは「document object model」の略で、html文書を実際にブラウザ上で表示するために作成されるオブジェクトです。</p>
<h3>コンポーネント管理</h3>
vue.jsでは「html・css・javascript」の3つを組み合わせて「コンポーネント」として管理します。<br />そのため保守性が高く管理が容易にできるため、システムの拡張も容易になります。
<?php footer(); ?>