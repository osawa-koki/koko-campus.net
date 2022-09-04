<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-21",
	"updated" => "2022-02-21"
);
head($obj);
?>
<h2>オーバーロード</h2>
ひとつのクラス内に同一名の引数のデータ型ないしは引数の種類が異なるメソッドを複数定義することを言います。<br /><br />この場合はメソッド実行時に与えられた引数を基に、それに合ったメソッドが実行されます。
<code class="java">
	public class koko {
		public static void main(String[] args) {
			pokemon pikachu;
			pikachu = new pokemon(25, "ピカチュウ");
			pikachu.i_am();
			System.out.println("----------");
			pikachu.i_am("は～～い♪");
			System.out.println("----------");
			pikachu.i_am("ぴか", "ぴっか!!");
			System.out.println("----------");
			pikachu.i_am(777);
			System.out.println("----------");
			
		}
	}
	class pokemon {
		int no;
		String name;
		public void i_am() {
			System.out.println("私の名前は" + this.name + "で図鑑番号は" + this.no + "です。");
			System.out.println("引数を受け取りませんでした。");
		}
		public void i_am(String arg) {
			System.out.println("私の名前は" + this.name + "で図鑑番号は" + this.no + "です。");
			System.out.println(arg);
			System.out.println("引数をひとつString型で受け取りました。");
		}
		public void i_am(String arg1, String arg2) {
			System.out.println("私の名前は" + this.name + "で図鑑番号は" + this.no + "です。");
			System.out.println(arg1);
			System.out.println(arg2);
			System.out.println("引数をふたつString型で受け取りました。");
		}
		public void i_am(int n) {
			System.out.println("私の名前は" + this.name + "で図鑑番号は" + this.no + "です。");
			System.out.println(n);
			System.out.println("引数をひとつint型で受け取りました。");
		}
		pokemon (int no, String name) {
			this.no = no;
			this.name = name;
		}
	}

	/* &darr; コンソール &darr;
	私の名前はピカチュウで図鑑番号は25です。
	引数を受け取りませんでした。
	----------
	私の名前はピカチュウで図鑑番号は25です。
	は～～い♪
	引数をひとつString型で受け取りました。
	----------
	私の名前はピカチュウで図鑑番号は25です。
	ぴか
	ぴっか!!
	引数をふたつString型で受け取りました。
	----------
	私の名前はピカチュウで図鑑番号は25です。
	777
	引数をひとつint型で受け取りました。
	----------
	*/
</code>
<h2>継承</h2>
あるクラスが他のクラスの性質(メンバ)を継承して再定義することなく使用することができる性質を継承と言います。
<img src="../pics/継承.png" alt="継承" />
継承元のクラスを「基本クラス・スーパークラス・親クラス」と呼び、継承するクラスを「派生クラス・サブクラス・子クラス」と呼びます。<br /><br />継承するには以下のように書きます。
<code class="java">
	class 子クラス extends 親クラス {
		...
	}
</code>
また、コンストラクタを継承する際には以下のように記述します。
<code class="java">
	class 子クラス extends 親クラス {
		子クラス (引数1, 引数2, 引数3) {
			super(親クラスコンストラクタの引数);
			//子クラスのコンストラクタ内の処理...
		}
	}
</code>
では、先ほどのpokemonクラスを継承したsub_pokeクラスを生成しましょう♪<br />sub_pokeクラスには新たにタイプ1(type1)プロパティとタイプ2(type2)プロパティを追加します。
<code class="java">
	public class koko {
		public static void main(String[] args) {
			sub_poke pikachu;
			pikachu = new sub_poke(25, "ピカチュウ", "でんき", "なし");
			pikachu.i_am();
			System.out.println("----------");
			pikachu.introduction();
		}
	}
	class pokemon {
		int no;
		String name;
		public void i_am() {
			System.out.println("私の名前は" + this.name + "で図鑑番号は" + this.no + "です。");
		}
		pokemon (int no, String name) {
			this.no = no;
			this.name = name;
		}
	}
	class sub_poke extends pokemon {
		sub_poke(int no, String name, String type1, String type2) {
			super(no, name);
			this.type1 = type1;
			this.type2 = type2;
		}
		String type1;
		String type2;
		public void introduction() {
			System.out.println("図鑑番号は " + this.no);
			System.out.println("名前は " + this.name);
			System.out.println("タイプ1は " + this.type1);
			System.out.println("タイプ2は " + this.type2);
		}
		
	}

	/* &darr; コンソール &darr;
	私の名前はピカチュウで図鑑番号は25です。
	----------
	図鑑番号は 25
	名前は ピカチュウ
	タイプ1は でんき
	タイプ2は なし
	*/
</code>
<p>もっとも、この場合はpokemonクラスに全てまとめるべきなのですが、、、<br />ここでは練習ということでスルー♪</p>
<h2>オーバーライド</h2>
親クラスが持つメンバを子クラスのメンバで上書きすることを言います。<br />親要素のメンバ名と子クラスのメンバ名が同一である場合に発生します。<br /><br />では、子クラスのメソッドであるintroductionメソッドをi_amメソッドに名前を変えてみましょう♪<br />これで、親クラスのi_amメソッドを子クラスのi_amメソッドで上書きできます。
<code class="java">
	public class koko {
		public static void main(String[] args) {
			sub_poke pikachu;
			pikachu = new sub_poke(25, "ピカチュウ", "でんき", "なし");
			pikachu.i_am();
		}
	}
	class pokemon {
		int no;
		String name;
		public void i_am() {
			System.out.println("私の名前は" + this.name + "で図鑑番号は" + this.no + "です。");
		}
		pokemon (int no, String name) {
			this.no = no;
			this.name = name;
		}
	}
	class sub_poke extends pokemon {
		sub_poke(int no, String name, String type1, String type2) {
			super(no, name);
			this.type1 = type1;
			this.type2 = type2;
		}
		String type1;
		String type2;
		public void i_am() { //オーバーライド!!
			System.out.println("図鑑番号は " + this.no);
			System.out.println("名前は " + this.name);
			System.out.println("タイプ1は " + this.type1);
			System.out.println("タイプ2は " + this.type2);
		}
		
	}

	/* &darr; コンソール &darr;
	図鑑番号は 25
	名前は ピカチュウ
	タイプ1は でんき
	タイプ2は なし
	*/
</code>
オーバーロードと今度しないように注意してください。<br />オーバーロードとは同一クラス内に引数のデータ型ないしは引数の数が異なる同一名称のメソッドを定義することです。<br /><br />また、メソッドのオーバーライドをするためにはメソッドの引数のデータ型と引数の数の両方が一致している必要があります。<br /><br />なぜだか分かりますか???<br /><br />理由は引数のデータ型ないしは引数の数が異なればオーバーロードが発生するからです。<br /><br />なんだかややこしいですね、、、
<h2>隠蔽</h2>
クラスはオブジェクトの設計図としての役割を持つことは既に学習しましたね♪<br />作成したクラスに対してその使い方を簡単に示すことでクラスの管理可能性を向上させます。<br /><br />使い方というよりは使ってok!なものと使っちゃダメなものを設定するだけですが、、、<br /><br />例えば、pokemonクラスではnoやnameプロパティに直接アクセスすることはありません。<br />これらをセットする際にはコンストラクタを通して行い、これらを取得するにはi_amメソッドから取得します。<br />したがって、noプロパティとnameプロパティはそのインスタンスの内部からのみアクセスできるように設定するべきで、外部のクラスからのアクセスを禁止した方がよさそうです。<br /><br />メンバに対するアクセス可否はアクセス修飾子を用いて実現します。
<table>
	<tbody>
		<tr>
			<th>public</th>
			<td>他のどのクラスからでもアクセスできます。</td>
		</tr>
		<tr>
			<th>protected</th>
			<td>サブクラス、ないしは同一のパッケージ内のクラスからのみアクセスできます。</td>
		</tr>
		<tr>
			<th>private</th>
			<td>同一のクラスからのみアクセスできます。</td>
		</tr>
		<tr>
			<th>なし</th>
			<td>同一パッケージのクラスからのみアクセスできます。</td>
		</tr>
	</tbody>
</table>
では、pokemonクラスを適切なアクセス修飾子を用いて書き換えてみましょう♪
<code class="java">
	/* コンパイルエラー */

	public class koko {
		public static void main(String[] args) {
			pokemon pikachu;
			pikachu = new pokemon(25, "ピカチュウ");
			pikachu.no = 999; //noプロパティに直接アクセスしちゃダメ!!
			pikachu.i_am();
		}
	}
	class pokemon {
		private int no;
		private String name;
		public void i_am() {
			System.out.println("私の名前は" + this.name + "で図鑑番号は" + this.no + "です。");
		}
		pokemon (int no, String name) {
			this.no = no;
			this.name = name;
		}
	}

	/* &darr; コンソール &darr;
	The field pokemon.no is not visible
	*/
</code>
直接アクセスしてはいけないnoプロパティに直接アクセスしているため、コンパイルエラーとなります。<br /><br />これで、pokemonクラスのプロパティに直接する必要がなくなりました。<br />コンストラクタの引数に渡して、それをi_amメソッドで取得するだけでok!になったので、クラス内部でどのような処理が行われているかを意識する必要がなくなりました。<br /><br />このように、クラスの内部の処理を外部から隠蔽することをカプセル化と呼びます。<br />大規模なシステムではコードの管理可能性を向上させるためによく用いられます。
<h2>多態性</h2>
同じ名前のメソッドを呼び出しても、インスタンスの種類によって異なる処理が実行される性質を言います。<br />ポリモフィズムとも呼ばれます。<br /><br />これは、ひとつの親クラスを継承して複数の子クラスを生成できる性質を利用します。<br /><br />例えば、Animalクラスを親クラスとしてPersonクラスとDogクラスを生成するとします。
<img src="../pics/多態性.png" alt="多態性" />
では、これらのクラスを定義してみましょう♪<br />プロパティは定義しません。<br />メソッドとして挨拶をするgreetメソッドを定義します。
<code class="java">
	class Animal {
		public void greet() {
			System.out.println("---");
		}
	}
	class Person extends Animal {
		public void greet() {
			System.out.println("こんにちは");
		}
	}
	class Dog extends Animal {
		public void greet() {
			System.out.println("ワンワン!!");
		}
	}
</code>
Animalクラスでは挨拶は存在しないので、greetメソッドではとりあえず「---」と出力します。<br />Personクラスでは「こんにちは」と出力するgreetメソッドでオーバーライドし、Dogクラスでは「ワンワン」と出力するgreetメソッドでオーバーライドします。<br /><br />次にPersonインスタンス(p)とDogインスタンス(d)を生成してみましょう♪
<code class="java">
	public class koko {
		public static void main(String[] args) {
			Animal p = new Person(); //PersonインスタンスをAnimal型として扱う
			Animal d = new Dog(); //DogインスタンスをAnimal型として扱う
		}
	}
</code>
変数pをAnimal型として宣言して、そこにPersonクラスを初期化したものを格納しています。<br />これはPersonクラスがAnimalクラスから派生したものであるから可能です。<br /><br />Animal型として宣言した変数にpokemonクラスを初期化したものを代入しようとするとエラーとなります。
<code class="java">
	/* コンパイルエラー */

	public class koko {
		public static void main(String[] args) {
			Animal pikachu = new pokemon(); //pokemonインスタンスをAnimal型として扱うことはできない、、、
		}
	}

	/* &darr; コンソール &darr;
	Type mismatch: cannot convert from pokemon to Animal
	*/
</code>
これは、pokemonクラスはAnimalクラスではないためです。<br /><br />また、AnimalインスタンスをPerson型やDog型として宣言された変数に代入することもできません。
<code class="java">
	public class koko {
		public static void main(String[] args) {
			Person p = new Animal();
			Dog d = new Animal();
		}
	}

	/* &darr; コンソール &darr;
	Type mismatch: cannot convert from Animal to Person
	Type mismatch: cannot convert from Animal to Dog
	*/
</code>
<div class="separator"></div>
では、実際に多態性を体験してみましょう♪<br />先ほどのコードで生成したPersonインスタンス(p)とDogインスタンス(d)でgreetメソッドを実行してみましょう♪
<code class="java">
	public class koko {
		public static void main(String[] args) {
			Animal p = new Person();
			Animal d = new Dog();
			p.greet();
			d.greet();
		}
	}
	class Animal {
		public void greet() {
			System.out.println("---");
		}
	}
	class Person extends Animal {
		public void greet() {
			System.out.println("こんにちは");
		}
	}
	class Dog extends Animal {
		public void greet() {
			System.out.println("ワンワン!!");
		}
	}

	/* &darr; コンソール &darr;
	こんにちは
	ワンワン!!
	*/
</code>
p変数もd変数も同じAnimalクラスから生成したAnimalインスタンスです。<br /><br />大切なのでもう一度言います。<br />p変数もd変数も同じAnimalクラスから生成したAnimalインスタンスです。<br /><br />しかし、greetメソッドによって実行される処理が変わります。<br /><br />このように、同じ名前のメソッドを呼び出しても、インスタンスの種類によって異なる処理が実行される性質を多態性(ポリモフィズム)と言います。
<h2>抽象クラス</h2>
継承することを目的とするクラスで、継承せずにそれ自体のインスタンスを生成することはできません。<br /><br />例えば、食べ物(food)クラスからラーメン(ramen)クラスとパスタ(pasta)クラスを生成する場合を想定してください。<br />ここで定義する食べ物クラスはあくまでもラーメンクラスとパスタクラスを生成するためにあります。<br />食べ物クラスからインスタンスを直接生成することはありません。<br /><br />このように継承することだけに定義するクラスは抽象クラスと呼ばれ、abstract修飾子を用いて定義します。
<code class="java">
	public class koko {
		public static void main(String[] args) {
			food xxx = new food(); //foodクラスから直接インスタンス生成不可
		}
	}
	abstract class food {
		int calorie;
	}
	class ramen extends food {
		String katasa;
	}
	class pasta extends food {
		String taste;
	}

	/* &darr; コンソール &darr;
	Cannot instantiate the type food
	*/
</code>
<h2>インターフェース</h2>
クラスに対してメソッドの実装忘れを防ぐための技術がインターフェースです。<br />特にクラスが含むべきメソッドが多くなるとその管理が困難になるため、インターフェースを使用してプログラムエラーを排除する目的で使用されます。
<h3>インターフェースの定義</h3>
インターフェースは以下のように定義します。
<code class="java">
	interface インターフェース名 {
		メソッド1();
		メソッド2();
		メソッド3();
	}
</code>
<h3>インターフェースの実装</h3>
クラスにインターフェースを実装するには以下のように記述します。
<code class="java">
	class クラス名 implements 実装するインターフェース {
		//クラスの中身
	}
</code>
<div class="separator"></div>
では、インターフェースを定義してクラスに実装してみましょう♪
<code class="java">
	public class koko {
		public static void main(String[] args) {
			k arg = new k();
			arg.method1();
			arg.method2();
			arg.method3();
		}
	}
	class k implements intf {
		public void method1() {
			System.out.println("メソッド1");
		}
		public void method2() {
			System.out.println("メソッド2");
		}
		public void method3() {
			System.out.println("メソッド3");
		}
	}
	interface intf {
		void method1();
		void method2();
		void method3();
	}

	/* &darr; コンソール &darr;
	メソッド1
	メソッド2
	メソッド3
	*/
</code>
intfインターフェースを実装しているクラスがintfインターフェースで規定されている全てのメソッドを定義していない場合はエラーとなります。
<code class="java">
	/*  コンパイルエラー */

	public class koko {
		public static void main(String[] args) {
			k arg = new k();
			arg.method1();
			arg.method2();
			arg.method3();
		}
	}
	class k implements intf {
		public void method1() {
			System.out.println("メソッド1");
		}
		public void method2() {
			System.out.println("メソッド2");
		}
	}
	interface intf {
		void method1();
		void method2();
		void method3();
	}

	/* &darr; コンソール &darr;
	The type k must implement the inherited abstract method intf.method3()
	*/
</code>
kクラスはintfインターフェースを実装しているからmethod3も定義してね♪<br />って怒られてしまいます。<br /><br />このようにクラスが実装するべきメソッドを規定するのがインターフェースです。<br /><br />利用しなくてもプログラムを十分かけますが、どのクラスがそのメソッドを定義するべきかを明確にすることで思わぬバグを防ぐことができます。
<?php footer(); ?>