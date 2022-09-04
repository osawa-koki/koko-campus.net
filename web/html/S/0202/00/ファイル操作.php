<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-21",
	"updated" => "2022-02-21"
);
head($obj);
?>
<h2>ファイル操作</h2>
今まではコンソール画面から入出力する簡単なプログラムを作成していましたが、これでは実用的ではありませんよね、、、<br />一般的なプログラムはデータをストレージにファイルとして保存して永続化します。<br />ということでファイルを操作する方法を学びましょう♪<br /><br />ファイル操作では以下の2つの処理を学びます。
<ul>
	<li>ファイルの読み込み</li>
	<li>ファイルへの書き込み</li>
</ul>
<h2>ファイルの読み込み</h2>
最初に全体像を示します。
<code class="java">
/* 必要なモジュールをインポート */
import java.io.File;
import java.io.FileReader;
import java.io.FileNotFoundException;
import java.io.IOException;

/* メイン処理内 */
try {
	File file = new File("ファイルへのパス");
	FileReader filereader = new FileReader(file);
	int fs;
	while((fs = filereader.read()) != -1) {
		System.out.print((char)fs);
	}
	filereader.close();
} catch (FileNotFoundException e) {
	System.out.println(e);
} catch (IOException e) {
	System.out.println(e);
}
</code>
なんだか複雑ですね、、、<br />ひとつずつ解説していきますね♪
<h3>モジュールのインポート</h3>
ファイルの読み込みに必要なモジュールをインポートします。<br />具体的には以下の4つをインポートします。
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>java.io.File</th>
				<td>ファイル情報を取り扱うモジュールです。</td>
			</tr>
			<tr>
				<th>java.io.FileReader</th>
				<td>ファイルリーダーを扱うためのモジュールです。<br />ファイル情報を扱うモジュールと併用して用います。</td>
			</tr>
			<tr>
				<th>java.io.FileNotFoundException</th>
				<td>ファイルが見つからなかった場合のエラーを処理するためのモジュールです。</td>
			</tr>
			<tr>
				<th>java.io.IOException</th>
				<td>実行時のエラーを処理するためのモジュールです。</td>
			</tr>
		</tbody>
	</table>
</div>
<h3>例外処理</h3>
「try {～} catch (...) {～}」の部分は例外処理を規定しています。<br />tryに続く「{}(ブレース)」内の処理でエラーが発生した場合はcatchに続く「{}(ブレース)」の処理の実行を開始します。<br /><br />ここではファイルが存在しない場合に発生するエラーとその他の実行時に発生するエラーのふたつを想定しています。
<h3>ファイルストリームの取得</h3>
javaではファイルストリームという名称は用いられていませんが、、、<br />ファイルストリームの取得は以下の2つの手順からなります。
<ol>
	<li>ファイル型データの取得</li>
	<li>ファイルリーダーの取得</li>
</ol>
<h4>ファイル型データの取得</h4>
Fileクラスのコンストラクタにファイルへのパスを指定してファイル型データを取得します。<br />windowsではファイルのパスで、ディレクトリの区切りとして「<span class="en">\</span>」を使用しますが、これは文字列内でエスケープ文字として扱われるため、「<span class="en">\\</span>」と二回重ねてこれに対してエスケープ処理をする必要があります。
<h4>ファイルリーダーの取得</h4>
FileReaderクラスのコンストラクタに先ほど作成したFile型のデータを指定してファイルリーダーインスタンスを生成します。
<h3>ファイルリーダーから文字の読み込み</h3>
先ほど生成したFileReaderインスタンスのデータにReadメソッドを使用してデータを文字単位で取得します。<br />取得できるデータがなくなった場合は「-1」を返すため、これを利用してファイルの内容すべてを反復処理で取得します。<br /><br />これらのデータはバイト型で取得されるため、これを文字型に変換します。
<h3>ファイルリーダーのクローズ</h3>
ファイルを操作し終わったらそのファイルを閉じる必要があります。<br />ファイルを閉じるには以下のように記述します。
<code class="java">
	ファイルリーダー.close();
</code>
<h3>FileNotFoundException</h3>
指定したファイルが存在しなかった場合のエラーデータを取得するデータ型です。
<h3>IOException</h3>
実行時に発生するエラーデータを取得するデータ型です。
<div class="separator"></div>
では、実際に先ほどのプログラムを動かしてみましょう♪<br />読み込むファイルの内容は以下の通りです。
<code class="file-dot-txt">
	i like java
	i love java
</code>
<code class="java">
	import java.io.File;
	import java.io.FileNotFoundException;
	import java.io.FileReader;
	import java.io.IOException;

	public class koko {
		public static void main(String[] args) {
			try {
				File file = new File("C:\\file.txt");
				FileReader filereader = new FileReader(file);
	
				int ch;
				while((ch = filereader.read()) != -1){
				System.out.print((char)ch);
				}
				filereader.close();
			} catch (FileNotFoundException e) {
				System.out.println(e);
			} catch (IOException e) {
				System.out.println(e);
		}
		}
	}

	/* &darr; コンソール &darr;
	i like java
	i love java
	*/
</code>
<h2>ファイルへの書き込み</h2>
こちらも最初に全体像を紹介します。
<code class="java">
	import java.io.File;
	import java.io.FileWriter;
	import java.io.IOException;

	class WriteFile {
	public static void main(String args[]) {
		try {
			File file = new File("C:\\file.txt");
			FileWriter filewriter = new FileWriter(file);

			filewriter.write("java java!!");

			filewriter.close();
		} catch (IOException e) {
			System.out.println(e);
		}
		}
	}
</code>
ファイルの内容の読み取りと似ていますね♪
<h3>例外処理</h3>
「try {～} catch (...) {～}」の部分は例外処理を規定しています。<br />tryに続く「{}(ブレース)」内の処理でエラーが発生した場合はcatchに続く「{}(ブレース)」の処理の実行を開始します。<br /><br />ここでは実行時に発生するエラーだけを想定しています。<br />ファイルの読み取りと異なり、ファイルが存在しない場合は新たに生成するため、ファイルが存在しない場合のエラーは発生しません。
<h3>ファイルストリームの取得</h3>
javaではファイルストリームという名称は用いられていませんが、、、<br />ファイルストリームの取得は以下の2つの手順からなります。
<ol>
	<li>ファイル型データの取得</li>
	<li>ファイルライターの取得</li>
</ol>
<h4>ファイル型データの取得</h4>
Fileクラスのコンストラクタにファイルへのパスを指定してファイル型データを取得します。<br />windowsではファイルのパスで、ディレクトリの区切りとして「<span class="en">\</span>」を使用しますが、これは文字列内でエスケープ文字として扱われるため、「<span class="en">\\</span>」と二回重ねてこれに対してエスケープ処理をする必要があります。
<h4>ファイルライターの取得</h4>
ファイルリーダではなくてファイルライターになっただけです。<br />FileWriterクラスのコンストラクタに先ほど作成したFile型のデータを指定してファイルライターインスタンスを生成します。
<h3>ファイルライターで文字の書き込み</h3>
先ほど生成したFileWriterインスタンスのデータにWriteメソッドを使用してデータを文字列を書き込みます。<br />書き込み文字列を引数に渡しますが、これはバイト文字列ではなく、そのままの文字列で渡します。
<h3>ファイルライターのクローズ</h3>
ファイルを操作し終わったらそのファイルを閉じる必要があります。<br />ファイルを閉じるには以下のように記述します。
<code class="java">
	ファイルライター.close();
</code>
<h3>IOException</h3>
実行時に発生するエラーデータを取得するデータ型です。
<?php footer(); ?>