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
<h2>算出プロパティ</h2>
算出プロパティはvueオブジェクト内のcomputed内に書きます。<br />性質としてはdataとmethods内の中間です。<br />dataと異なる点は関数の戻り値をデータとして扱う点で、methodsと異なる点は関数の目的が戻り値を求めることである点です。<br />では、実際に使用してみましょう♪<br />スライダーで指定した長さを直径をとる円を作成してボタンを押すと円周をダイアログに表示します。
<code class="html">
	&lt;div id="app"&gt;
		&lt;div v-bind:style="{width: r2 + 'px', height: r2 + 'px', backgroundColor: bg_color, borderRadius: bd_rad}"&gt;&lt;/div&gt;
		&lt;input type="range" min="50" max="300" value="50" v-model="r2" /&gt;
		&lt;p&gt;円周は{{pai_r2}}&lt;/p&gt;
	&lt;/div&gt;
</code>
<code class="javascript">
	let app = new Vue({
		el: "#app",
		data: {
			r2: 50,
			bg_color: "red",
			bd_rad: "50%"
		},
		computed: {
			pai_r2: function() {
				return this.r2 * Math.PI;
			}
		}
	});
</code>
<div class="result">
	<div id="app1">
		<div v-bind:style="{width: r2 + 'px', height: r2 + 'px', backgroundColor: bg_color, borderRadius: bd_rad}"></div>
		<input type="range" min="50" max="300" value="50" v-model="r2" />
		<p class="x">円周は{{pai_r2}}</p>
	</div>
</div>
<h3>算出プロパティの注意点</h3>
算出プロパティはあくまでもvueオブジェクト内のデータを計算して戻り値を求めることを目的としているため、算出プロパティ内のデータを直接変更することは原則としてしません。<br />そのため、算出プロパティ関数内でデータを上書きしている以下のコードはエラーを吐き出します。
<code class="javascript">
	let app = new Vue({
		el: "#app",
		data: {
			r: 50
		},
		computed: {
			calc: function() {
				r = r * 2 * Math.PI;
				return r;
			}
		}
	});
</code>
こういった破壊的な処理は原則としてmethods内での関数で実行しますが、一応セッター・ゲッターを用いて破壊的な処理を実行することもできます。
<p class="r">セッター・ゲッターについてはここでは説明しません。</p>
<h2>ウォッチャ</h2>
算出プロパティでは主にデータを加工してそれを戻り値として渡すことが目的でした。<br />そのため、算出プロパティ単体ではデータのバインディングがなされず、データバインディングを実現するためには何か他の手法をとる必要があります。<br />この手法のうちの一つにウォッチャがあります。<br />ウォッチャオブジェクト内の構成は以下のようになっています。
<code class="javascript">
	let app = new Vue({
		el: "#app",
		data: {
			//データの定義
		},
		computed: {
			//算出プロパティの定義
		},
		watch: {
			watched: {
				update: function(new_obj, old_obj) {
					//watchedが更新された場合の処理...
				},
				deep: true, //再帰的に(watch対象のオブジェクトの中身も含めて)監視
				immediate: true //最初に呼び出された場合も実行
			}
		}
	});
</code>
<script charset = "UTF-8" type="text/javascript" src="https://koko-campus.org/cdn/vue.js/2.6.14-ops.js" defer></script>
<script charset = "UTF-8" type="text/javascript" src="entire.js" defer></script>
<?php footer(); ?>