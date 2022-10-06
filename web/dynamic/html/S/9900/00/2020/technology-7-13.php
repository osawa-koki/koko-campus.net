<?php

session_start();
session_regenerate_id(true);


require_once("common.php");
include_head("基礎理論", "基礎理論", "テクノロジ系", basename(__FILE__, ".php") .".css");
include "include.html";
including();


?>




<img class = "progress_img" src = "./pics/progress-50.png" alt = "進捗度画像">

</div>

<h1>ITパスポート試験</h1>

<div class = "all">
	<h2>基礎理論(テクノロジ系)---(12/23)</h2>
	<p>ITパスポート試験範囲も折り返し地点に来ましたね♪お疲れ様です。この調子でどんどん行きましょう♪</p>
	<div class = "sec">
		<h4>2進数と10進数</h4>
		<p>みなさんは数字を表現するとき何進数を使用しますか???<br><br><br><span style = "text-decoration: line-through;">多くの人は</span>、みなさん、10進数を使っていると思います。<br>10進数とは、0から9までの10個の数字を使って文字を表現する手法です。<br><br><br>ですけど、コンピュータは10進数を取り扱えないんです、、、<br>コンピュータが取り扱えるのは0と1だけの(バイナリといいます)データだけです。言い換えればコンピュータは2進数を採用しているといえます。<br>そこでここでは10進数と2進数を相互に変換(基数変換)できるようになりましょう♪</p>
		<h4 class = "sub_sec">2進数から10進数へ</h4>
		<p>ちょっとした数学の問題です。<br><br><br><strong>11010(2進数)</strong>を10進数に変換できますか???<br><br><br></p>
		<h6 class = "hide_show">&lt;&lt;&lt; 答え &gt;&gt;&gt;</h6>
		<div class = "hidden">
			<table id = "from2to10_table">
				<tbody>
					<tr>
						<th>意味</th>
						<td>2<sup>4</sup></td>
						<td>2<sup>3</sup></td>
						<td>2<sup>2</sup></td>
						<td>2<sup>1</sup></td>
						<td>2<sup>0</sup></td>
					</tr>
					<tr>
						<th>重み</th>
						<td><strong>16</strong>(2<sup>4</sup>)</td>
						<td><strong>8</strong>(2<sup>3</sup>)</td>
						<td><strong>4</strong>(2<sup>2</sup>)</td>
						<td><strong>2</strong>(2<sup>1</sup>)</td>
						<td><strong>1</strong>(2<sup>0</sup>)</td>
					</tr>
					<tr>
						<th>2進数</th>
						<td>1</td>
						<td>1</td>
						<td>0</td>
						<td>1</td>
						<td>0</td>
					</tr>
					<tr>
						<th>10進数</th>
						<td>16</td>
						<td>8</td>
						<td>(0)</td>
						<td>2</td>
						<td>(0)</td>
						<td><strong><span style = "color: red">26</span></strong></td>
					</tr>
				</tbody>
			</table>
			<div style = "height: 50px;"></div>
			<p><span style = "text-decoration: underline;">答え、26。</span></p>
		</div>
		<p>計算方法は、<strong>各桁の重み(2<sup>0</sup>, 2<sup>1</sup>, 2<sup>2</sup>, 2<sup>3</sup>...)に2進数で表した数字(0 or 1)をかけて、それの合計を求めます。</strong></p>
		<p><span class = "strong_bigger">10進数 = (重み × 2進数) の合計</span></p>
		<p>以下で2進数から10進数に計算する簡単なjsプログラムを作成しました。<br>2-10基数変換の練習として活用してください。</p>
		<div style = "height: 50px;"></div>
		<input type = "text" width = "10" maxlength = "20" id = "from2" class = "input_binary_only"><span id = "from2_button">10進数に変換!!!</span><br><br>
		<span id = "warn_from2"></span>
		<span id = "result_from2"></span>
		<div style = "height: 30px;"></div>
		<div id = "from2_div">
			<table id = "from2_table" border = "1">
				<tr>
					<th id = "from2_th0">意味</th>
				</tr>
				<tr>
					<th id = "from2_th1">重み</th>
				</tr>
				<tr>
					<th id = "from2_th2">2進数</th>
				</tr>
				<tr>
					<th id = "from2_th3">10進数</th>
				</tr>
			</table>
		</div>
		<h4 class = "sub_sec">10進数から2進数へ</h4>
		<p>ちょっとした数学の問題です。<br><br><br><strong>26(10進数)</strong>を2進数に変換できますか???<br><br><br></p>
		<h6 class = "hide_show">&lt;&lt;&lt; 答え &gt;&gt;&gt;</h6>
		<div class = "hidden">
			<div id = "from10to2_div">
				<span>2</span> <span class = "left_bottom_line">26</span> <span>余り</span><br>
				<span>2</span> <span class = "left_bottom_line">13</span> <span style = "color: orange">0</span><br>
				<span>2</span> <span class = "left_bottom_line">6</span> <span style = "color: orange">1</span><br>
				<span>2</span> <span class = "left_bottom_line">3</span> <span style = "color: orange">0</span><br>
				<span style = "color: white;">2</span> <span class = "left_bottom_noline">1</span> <span style = "color: orange">1</span><br>
			</div>
			<p><span style = "text-decoration: underline;">答え、11010。</span></p>
		</div>
		<p>商が1になるまで2で割り算していき、商が1になったら<strong>余りを下から</strong>読んでいきます。(<strong>先頭は1</strong>)</p>
		<p>以下で10進数から2進数に計算する簡単なjsプログラムを作成しました。<br>2-10基数変換の練習として活用してください。</p>
		<div style = "height: 50px;"></div>
		<input type = "text" width = "10" maxlength = "15" id = "from10" class = "input_number_only"><span id = "from10_button">2進数に変換!!!</span><br><br>
		<span id = "warn_from10"></span>
		<span id = "result_from10"></span>
		<div style = "height: 30px;"></div>
		<div id = "from10_div_base">
			<table id = "from10_table" cellspacing = "20px 10px">
				<tbody id = "from10_base_tb">
					<tr>
						<td class = "from10_cell_0">2</td>
						<td id = "from10_entered_number" class = "from10_cell_1"></td>
						<td class = "from10_cell_remainder">余り</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class = "sec">
		<h4>補助単位</h4>
		<p>みなさん、キロとかメガとかテラとかいった単位を知っていますか???<br>これらは補助単位といって桁が大きい数値を簡単に表現できるようにしてくれます。<br><br><br>例えば、、、<br>1000000000バイトって言ってもピンと来ませんよね、、、<br>ゼロを大量に並べられたのでは見ずらいですし、容量ももったいないです、、、<br>これを1Gって表現したらどうでしょうか???<br>すごく美しいですよね!!!<br><br><br>そこで、ここでは有名な補助単位について学びましょう♪</p>
		<table border = "1" class = "normal_table">
			<caption>大きいバージョン</caption>
			<tbody>
				<tr>
					<th>k (キロ)</th>
					<td>10<sup>3</sup>(1,000)</td>
				</tr>
				<tr>
					<th>M (メガ)</th>
					<td>10<sup>6</sup>(1,000,000)</td>
				</tr>
				<tr>
					<th>G (ギガ)</th>
					<td>10<sup>9</sup>(1,000,000,000)</td>
				</tr>
				<tr>
					<th>T (テラ)</th>
					<td>10<sup>12</sup>(1,000,000,000,000)</td>
				</tr>
			</tbody>
		</table>
		<table border = "1" class = "normal_table">
			<caption>小さいバージョン</caption>
			<tbody>
				<tr>
					<th>m (ミリ)</th>
					<td>10<sup>-3</sup>(0.001)</td>
				</tr>
				<tr>
					<th>μ (マイクロ)</th>
					<td>10<sup>-6</sup>(0.000,01)</td>
				</tr>
				<tr>
					<th>n (ナノ)</th>
					<td>10<sup>-9</sup>(0.000,000,01)</td>
				</tr>
				<tr>
					<th>p (ピコ)</th>
					<td>10<sup>-12</sup>(0.000,000,000,01)</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class = "sec">
		<h4>集合論</h4>
		<p>柴犬・くじら・ひつじは動物で、チューリップ・まりも・芝は植物で、ミジンコは動物かつ植物でっと、、、<br>なんだか文章だと複雑ですね、、、<br>困っちゃいましたね、、、<br>どうしましょうか、、、</p>
		<div class = "hidden">
			<div id = "logical_operation_button_div">
				<div id = "logical_operation_button0" class = "logical_operation_button">論理和<br>(または/or)</div>
				<div id = "logical_operation_button1" class = "logical_operation_button">論理積<br>(かつ/and)</div>
				<div id = "logical_operation_button2" class = "logical_operation_button">否定<br>(ない/not)</div>
				<div id = "logical_operation_button3" class = "logical_operation_button">排他的論理和<br>(xor)</div>
			</div>
			<p id = "answer_logical"></p>
		</div>
<svg
   	width="600"
   	height="400"
   	viewBox="0 0 158.75 105.83334"
   	version="1.1"
   	id="svg5"
   	xmlns="http://www.w3.org/2000/svg"
   	xmlns:svg="http://www.w3.org/2000/svg">
  	<g
     	id="layer1">
    	<ellipse
	      	style="opacity:1;fill:#FFCC99;stroke:#000000;stroke-width:0.258423"
	      	id="venn_left"
	      	class = "venn_left"
	       	cx="58"
	       	cy="51.166668"
	       	rx="39.870789"
	       	ry="29.870789" />
    	<ellipse
       		style="opacity:1;fill:#99FFCC;stroke:#000000;stroke-width:0.258423"
       		id="venn_right"
       		class = "venn_right"
       		cx="105"
       		cy="51.166668"
       		rx="39.870789"
       		ry="29.870789" />
    	<path
       		id="venn_intersection"
       		class = "venn_intersection"
       		style="opacity:1;fill:#FFAAFF;stroke:#000000;stroke-width:0.258423"
       		d="M 81.50252,26.900686 A 39.870787,29.870789 0 0 0 65.121089,51.024277 39.870787,29.870789 0 0 0 81.491667,75.141667 39.870787,29.870789 0 0 0 97.862756,51.024277 39.870787,29.870789 0 0 0 81.50252,26.900686 Z" />
    	<text
       		xml:space="preserve"
       		transform="matrix(0.26458333,0,0,0.26458333,12.722029,-4.3030393)"
       		id="text3094"
       		class = "venn_left venn_left_word"
       		style="font-size:22px;line-height:1.25;font-family:'Eras Light ITC';-inkscape-font-specification:'Eras Light ITC, Normal';font-variant-ligatures:none;white-space:pre;"><tspan
         	x="110"
         	y="152.06445">柴犬</tspan></text>
    	<text
       		xml:space="preserve"
       		transform="matrix(0.26458333,0,0,0.26458333,-5.2384826,-1.683798)"
       		id="text11158"
       		class = "venn_left venn_left_word"
       		style="font-size:22px;line-height:1.25;font-family:'Eras Light ITC';-inkscape-font-specification:'Eras Light ITC, Normal';font-variant-ligatures:none;white-space:pre;"><tspan
         	x="120"
         	y="202.06445"
         	id="tspan49728">クジラ</tspan></text>
    	<text
       		xml:space="preserve"
       		transform="matrix(0.26458333,0,0,0.26458333,-4.4901279,-5.4255713)"
       		id="text15718"
       		class = "venn_left venn_left_word"
       		style="font-size:22px;line-height:1.25;font-family:'Eras Light ITC';-inkscape-font-specification:'Eras Light ITC, Normal';font-variant-ligatures:none;white-space:pre;"><tspan
         	x="170"
         	y="272.06445"
         	id="tspan49730">ひつじ</tspan></text>
    	<text
       		xml:space="preserve"
       		transform="matrix(0.26458333,0,0,0.26458333,-4.3030393,2.80633)"
       		id="text31112"
       		class = "venn_intersection venn_intersection_word"
       		style="font-size:22px;line-height:1.25;font-family:'Eras Light ITC';-inkscape-font-specification:'Eras Light ITC, Normal';font-variant-ligatures:none;white-space:pre;"><tspan
         	x="270"
         	y="192.06445"
         	id="tspan49732">ミドリムシ</tspan></text>
    	<text
       		xml:space="preserve"
       		transform="matrix(0.26458333,0,0,0.26458333,-11.22532,-3.367596)"
       		id="text37302"
       		class = "venn_right venn_right_word"
       		style="font-size:22px;line-height:1.25;font-family:'Eras Light ITC';-inkscape-font-specification:'Eras Light ITC, Normal';font-variant-ligatures:none;white-space:pre;"><tspan
         	x="400"
         	y="152.06445"
         	id="tspan49734">チューリップ</tspan></text>
    	<text
       		xml:space="preserve"
       		transform="matrix(0.26458333,0,0,0.26458333,5.0513939,-2.80633)"
       		id="text42720"
       		class = "venn_right venn_right_word"
       		style="font-size:22px;line-height:1.25;font-family:'Eras Light ITC';-inkscape-font-specification:'Eras Light ITC, Normal';font-variant-ligatures:none;white-space:pre;"><tspan
         	x="400"
         	y="212.06445"
         	id="tspan49736">まりも</tspan></text>
    	<text
       		xml:space="preserve"
       		transform="matrix(0.26458333,0,0,0.26458333,8.9802559,0)"
       		id="text46664"
       		class = "venn_right venn_right_word"
       		style="font-size:22px;line-height:1.25;font-family:'Eras Light ITC';-inkscape-font-specification:'Eras Light ITC, Normal';font-variant-ligatures:none;white-space:pre;"><tspan
         	x="370"
         	y="262.06445"
         	id="tspan49738">芝</tspan></text>
    	<text
       		xml:space="preserve"
       		transform="matrix(0.26458333,0,0,0.26458333,8.9802559,0)"
       		id="text46"
       		class="venn_none venn_none_word"
       		style="font-size:22px;line-height:1.25;font-family:'Eras Light ITC';-inkscape-font-specification:'Eras Light ITC, Normal';font-variant-ligatures:none;white-space:pre;"><tspan
         	x="12"
         	y="315.06445"
         	id="tspan49738">宇宙人</tspan></text>
    	<text
       		xml:space="preserve"
       		transform="matrix(0.26458333,0,0,0.26458333,8.9802559,0)"
       		id="text46664"
       		class="venn_none venn_none_word"
       		style="font-size:22px;line-height:1.25;font-family:'Eras Light ITC';-inkscape-font-specification:'Eras Light ITC, Normal';font-variant-ligatures:none;white-space:pre;"><tspan
         	x="450"
         	y="350.06445"
         	id="tspan49738">消しゴム</tspan></text>
  	</g>
	 <text
	    xml:space="preserve"
	    transform="matrix(0.26458334,0,0,0.26458334,10.104625,1.4697637)"
	    id="text12468"
	    style="font-size:32px;line-height:1.25;font-family:'Eras Light ITC';-inkscape-font-specification:'Eras Light ITC, Normal';font-variant-ligatures:none;white-space:pre;"><tspan
	     x="141.65234"
	     y="70.285156"
	     id="tspan20094">動物</tspan></text>
	  <text
	    xml:space="preserve"
	    transform="matrix(0.26458334,0,0,0.26458334,3.4906888,-0.36744093)"
	    id="text16334"
	    style="font-size:32px;line-height:1.25;font-family:'Eras Light ITC';-inkscape-font-specification:'Eras Light ITC, Normal';font-variant-ligatures:none;white-space:pre;"><tspan
	    x="360.38086"
	    y="77.228516"
	    id="tspan20096">植物</tspan></text>
</svg>
		<p id = "lets_show_logical_operation">じゃじゃーん♪<br><br><br><strong>ベン図</strong>の登場です!!!<br><br><br>ベン図では集合に関して分かりやすく説明してくれます。<br>2つの円を書いて片方だけに含まれるもの、両方に含まれるもの、どちらにも含まれないものに分類します。</p>
		<p>このベン図を作成するのかなり難しかったので、みなさん是非たくさん活用してください。<br><br><br><span style = "text-decoration: line-through;">使い道ないですけど、、、泣<br></span>そこまで使用用途は広くないんですけど、、、笑</p>
	</div>
	<div class = "sec">
		<h4>論理演算</h4>
		<p>ベン図(集合)で大切なのは<strong>論理演算</strong>です。<br>論理演算とは「かつ」とか「または」といった演算によって集合に含まれる要素を限定します。<br>「動物または植物」といったらいわゆる、「生物」(動物 + 植物)が該当しますね。<br>ひつじ・ミドリムシ・まりもetc...です。<br>「動物かつ植物」といったら、動物と植物の性質をあわせもつミドリムシが該当しますね♪</p>
		<p>ここで、先ほどのベン図を見返してみましょう♪<br>論理演算ボタンが追加されているハズです。<br>ここで論理演算についてマスターしちゃいましょう♪</p>
	</div>
	<div class = "sec">
		<h4>真理値表</h4>
		<p>次は、論理演算についての表してみましょう♪</p>
		<table border = "1" class = "normal_table">
			<caption>1.論理和演算の真理値表</caption>
			<thead>
				<tr>
					<th>A</th>
					<th>B</th>
					<th>A or B</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>1</th>
					<th>1</th>
					<th>1</th>
				</tr>
				<tr>
					<th>1</th>
					<th>0</th>
					<th>1</th>
				</tr>
				<tr>
					<th>0</th>
					<th>1</th>
					<th>1</th>
				</tr>
				<tr>
					<th>0</th>
					<th>0</th>
					<th>0</th>
				</tr>
			</tbody>
		</table>
		<table border = "1" class = "normal_table">
			<caption>2.論理積演算の真理値表</caption>
			<thead>
				<tr>
					<th>A</th>
					<th>B</th>
					<th>A and B</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>1</th>
					<th>1</th>
					<th>1</th>
				</tr>
				<tr>
					<th>1</th>
					<th>0</th>
					<th>0</th>
				</tr>
				<tr>
					<th>0</th>
					<th>1</th>
					<th>0</th>
				</tr>
				<tr>
					<th>0</th>
					<th>0</th>
					<th>0</th>
				</tr>
			</tbody>
		</table>
		<table border = "1" class = "normal_table">
			<caption>3.否定演算の真理値表</caption>
			<thead>
				<tr>
					<th>A</th>
					<th>not A</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>1</th>
					<th>0</th>
				</tr>
				<tr>
					<th>0</th>
					<th>1</th>
				</tr>
			</tbody>
		</table>
		<table border = "1" class = "normal_table">
			<caption>4.排他的論理和演算の真理値表</caption>
			<thead>
				<tr>
					<th>A</th>
					<th>B</th>
					<th>A xor B</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>1</th>
					<th>1</th>
					<th>0</th>
				</tr>
				<tr>
					<th>1</th>
					<th>0</th>
					<th>1</th>
				</tr>
				<tr>
					<th>0</th>
					<th>1</th>
					<th>1</th>
				</tr>
				<tr>
					<th>0</th>
					<th>0</th>
					<th>0</th>
				</tr>
			</tbody>
		</table>
	</div>
</div>





<?php
show_footer("management-6-12", basename(__FILE__, ".php"), "technology-7-14");
?>
