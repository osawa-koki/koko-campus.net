<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2021-12-28",
	"updated" => "2021-12-28"
);
head($obj);
?>
<h2>オブジェクト</h2>
オブジェクト(Object)とは直訳すれば「モノ」になりますが、プログラミングの世界では複数のデータと複数の処理を密に結合してまとめ上げたものと思ってください。
<img src="../pics/オブジェクト.png" alt="オブジェクト" />
<h2>クラスとインスタンス</h2>
クラスとはオブジェクト指向の考え方において、オブジェクトの雛形となる部分です。<br />オブジェクトの設計図としての役割を持ち、クラスから実際にオブジェクトを作成することでこれを使用します。<br /><br />オブジェクトの設計図としてのオブジェクトをクラスオブジェクト、ないしは単にクラスと呼び、クラスから実際に作成されたオブジェクトをインスタンオブジェクト、ないしは単にインスタンスと呼びます。<br /><br />オブジェクトという名称はクラスオブジェクトを意味するのかインスタンスオブジェクトを意味するのか不明瞭であるため原則として使用しません。
<img src="../pics/クラス・インスタンス.png" alt="クラス インスタンス" />
たこ焼きってアウトラインは決まっていますよね、、、<img src="../pics/たこ焼き.png" alt="たこ焼き" class="絵文字 x" /><img src="../pics/たこ焼き.png" alt="たこ焼き" class="絵文字 x" /><img src="../pics/たこ焼き.png" alt="たこ焼き" class="絵文字 x" /><br />客によって変えるのはトッピングだとか具材だけですので、雛形を作成してそこから実際のたこ焼きを作ってしまえば楽ちんです。
<h2>メンバ</h2>
インスタンス内のプロパティやメソッドにアクセスするには「.(ドット)演算子」を使用します。<br />以下のように書きます。
<code class="python">
	インスタンス名.メンバ名
</code>
例えば、pikachuインスタンスのNameプロパティにアクセスするには以下のように書きます。
<code class="python">
	pikachu.Name
</code>
また、pikachuインスタンスのSayメソッドを実行するには以下のように書きます。
<code class="python">
	pikachu.Say()
</code>
<h2>クラスの定義</h2>
クラスは以下のように定義します。
<code class="python">
	class クラス名:
		def __init__(self, x, y, z):
			self.x = x
			self.y = y
			self.z = z
</code>
<h3>コンストラクタ</h3>
「__init__」関数はコンストラクタと呼ばれ、クラスからインスタンスが生成される際に実行される関数です。<br />関数名は必ず、「__init__」とします。<br /><br />クラスからインスタンスを生成する際の初期設定に必要なデータを引数として渡して、関数内で引数として受け取ったデータをプロパティとして登録します。<br /><br />第一引数にはインスタンス自身を指す変数を指定します。<br />名前はなんでもok!ですが、慣例として「self」とすることが多いです。<br /><br />では、「図鑑番号」「名前」「タイプ」「進化可能性」プロパティを格納するクラス定義してそこからピカチュウインスタンスを生成してみましょう♪
<code class="python">
	class pokemon: #pokemonクラスの定義
		def __init__(self, No, Name, Type, Shinka): #コンストラクタ
			self.No = No #Noプロパティの設定
			self.Name = Name #Nameプロパティの設定
			self.Type = Type #Typeプロパティの設定
			self.Shinka = Shinka #Shinkaプロパティの設定

	pikachu = pokemon(25, "ピカチュウ", ["でんき", "なし"], True) #pikachuインスタンスの生成

	print(pikachu.No)
	print(pikachu.Name)
	print(pikachu.Type)
	print(pikachu.Shinka)

	/* &darr; コンソール &darr;
	25
	ピカチュウ
	['でんき', 'なし']
	True
	*/
</code>
<h2>メソッド</h2>
今度はインスタンス専用の関数(メソッド)を定義してみましょう♪<br />メソッドは以下のように定義します。
<code class="python">
	class クラス名:
		def メソッド1(self, x, y, z):
			#メソッド1の処理
		def メソッド2(self, x, y, z):
			#メソッド2の処理
</code>
因みに、コンストラクタである「__init__」関数も少し特殊な働きをしますが、メソッドに該当します。<br />では、ポケモンの情報をいい感じに表示するSayメソッドと進化できるかを報告するTellメソッドを定義しましょう♪
<code class="python">
	class pokemon:
		def __init__(self, No, Name, Type, Shinka):
			self.No = No
			self.Name = Name
			self.Type = Type
			self.Shinka = Shinka
			self.Gobi = Name[:2] #語尾は名前の最初の2文字♪
		def Say(self): #pokemonクラスのSayメソッドの定義
			print("僕の名前は" + self.Name + "で、図鑑番号は" + str(self.No) + "だ" + self.Gobi)
		def Tell(self): #pokemonクラスのTellメソッドの定義
			if self.Shinka:
				print("進化できる" + self.Gobi)
			else:
				print("十分進化した" + self.Gobi)

	pikachu = pokemon(25, "ピカチュウ", ["でんき", "なし"], True) #pikachuインスタンスの生成

	pikachu.Say()
	pikachu.Tell()

	/* &darr; コンソール &darr;
	僕の名前はピカチュウで、図鑑番号は25だピカ
	進化できるピカ
	*/
</code>
<?php footer(); ?>