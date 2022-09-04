<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-04-28",
	"updated" => "2022-04-28"
);
head($obj);
?>
<h2>DateTime</h2>
現在の日付、時刻を扱うためにはDateTimeオブジェクトを使用します。<br />DateTimeオブジェクトを使用する際には、その下にある「Today」「Now」プロパティを呼び出します。
<table>
	<thead>
		<tr>
			<th width="50%">Today</th>
			<th width="50%">Now</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>日付を扱います。<br />時刻情報は全て「0」で設定されます。<br />時刻情報も扱いたい場合には「Now」プロパティを使用します。</td>
			<td>日付・時刻情報の両方を扱います。<br />時刻情報を絶対に使用しないという理由がない限りはこちらを使用します。</td>
		</tr>
	</tbody>
</table>
<code class="vb-dot-net">
	Dim dt = DateTime
	dt = DateTime.Today
</code>
<code class="vb-dot-net">
	Dim dt = DateTime
	dt = DateTime.Now
</code>
<h2>日付時刻表示メソッド</h2>
先ほど取得した日付と時刻を表示するには以下のメソッドを使用します。
<div class="scroll-600w">
	<table>
		<caption>日付を表示</caption>
		<tbody>
			<tr>
				<th>ToLongDateString</th>
				<td>長い形式で日付を表示します。</td>
			</tr>
			<tr>
				<th>ToShortDateString</th>
				<td>短い形式で日付を表示します。</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="scroll-600w">
	<table>
		<caption>時刻を表示</caption>
		<tbody>
			<tr>
				<th>ToLongTimeString</th>
				<td>長い形式で時刻を表示します。</td>
			</tr>
			<tr>
				<th>ToShortTimeString</th>
				<td>短い形式で時刻を表示します。</td>
			</tr>
		</tbody>
	</table>
</div>
<code class="vb-dot-net">
	Dim dt, tm As Datetime
	dt = Datetime.Today
	Console.WriteLine(dt.ToLongDateString())
	Console.WriteLine(dt.ToShortDateString())
	Console.WriteLine("***** ***** *****")
	tm = DateTime.Now
	Console.WriteLine(tm.ToLongTimeString())
	Console.WriteLine(tm.ToShortTimeString())
</code>
<img src="../pics/日付時刻の表示.gif" alt="日付時刻表示メソッド" />
<h2>DateTime要素の取得</h2>
次にDateTimeオブジェクトの各要素(年・月・日・時間・分・秒)を取得する方法を説明します。<br />といっても、全てDateTimeオブジェクトのプロパティであるため、特に説明は必要はありませんが、、、
<table>
	<tbody>
		<tr>
			<th>Year</th>
			<td>年</td>
		</tr>
		<tr>
			<th>Month</th>
			<td>月</td>
		</tr>
		<tr>
			<th>Day</th>
			<td>日</td>
		</tr>
		<tr>
			<th>Hour</th>
			<td>時間</td>
		</tr>
		<tr>
			<th>Minute</th>
			<td>分</td>
		</tr>
		<tr>
			<th>Second</th>
			<td>秒</td>
		</tr>
		<tr>
			<th>DayOfWeek</th>
			<td>曜日</td>
		</tr>
	</tbody>
</table>
<code class="vb-dot-net">
	dt = Datetime.Today
	Console.WriteLine("年 =&gt; " &amp; dt.Year)
	Console.WriteLine("月 =&gt; " &amp; dt.Month)
	Console.WriteLine("日 =&gt; " &amp; dt.Day)
	Console.WriteLine("***** ***** *****")
	tm = DateTime.Now
	Console.WriteLine("時間 =&gt; " &amp; tm.Hour)
	Console.WriteLine("  分 =&gt; " &amp; tm.Minute)
	Console.WriteLine("  秒 =&gt; " &amp; tm.Second)
</code>
<img src="../pics/DateTimeオブジェクトの各要素の取得.gif" alt="DateTimeオブジェクト" />
<div class="separator"></div>
曜日に関しては少し特殊です。<br />各曜日ごとに以下の整数が割り振られています。
<table>
	<tbody>
		<tr>
			<th>Sunday</th>
			<td>0</td>
		</tr>
		<tr>
			<th>Monday</th>
			<td>1</td>
		</tr>
		<tr>
			<th>Tuesday</th>
			<td>2</td>
		</tr>
		<tr>
			<th>Wednesday</th>
			<td>3</td>
		</tr>
		<tr>
			<th>Thursday</th>
			<td>4</td>
		</tr>
		<tr>
			<th>Friday</th>
			<td>5</td>
		</tr>
		<tr>
			<th>Saturday</th>
			<td>6</td>
		</tr>
	</tbody>
</table>
<code class="vb-dot-net">
	Dim dt As Datetime
	dt = Datetime.Today
	Console.WriteLine(dt.DayOfWeek)

	' ***** コンソール *****
	' 5
	' ----- -------- -----
	' 因みに実行時の今日は金曜日、
	' ゴールデンウイークの始まりです♪
	' ***** ******** *****
</code>
また、DayOfWeekは構造体になっていて、各曜日名がその値(整数値)を表します。
<code class="vb-dot-net">
	Console.WriteLine(DayOfWeek.Sunday)
	Console.WriteLine(DayOfWeek.Monday)
	Console.WriteLine(DayOfWeek.Tuesday)
	Console.WriteLine(DayOfWeek.Wednesday)
	Console.WriteLine(DayOfWeek.Thursday)
	Console.WriteLine(DayOfWeek.Friday)
	Console.WriteLine(DayOfWeek.Saturday)

	' ***** コンソール *****
	' 0
	' 1
	' 2
	' 3
	' 4
	' 5
	' 6
	' ***** ******** *****
</code>
<h2>任意の日時の作成</h2>
次は現在時刻ではなく、指定した日時のDateTimeオブジェクトを作成しましょう♪
<code class="vb-dot-net">
	New DateTime(年, 月, 日, 時, 分, 秒)
</code>
では、僕の誕生日の保持するDateTimeオブジェクトを作成してみましょう♪
<code class="vb-dot-net">
	Dim my_birthday As Datetime
	my_birthday = new DateTime(1998, 10, 25, 18, 20, 20)
	Console.WriteLine(my_birthday.ToLongDateString())
	Console.WriteLine(my_birthday.ToLongTimeString())

	' ***** コンソール *****
	' 1998年10月25日
	' 18:20:20
	' ***** ******** *****
</code>
時間は適当です。<br />噂によると、夕方に生まれたらしいです。<br />真偽は不明ですが、、、
<h2>ある月の日数を算出</h2>
ある月が何日あるかを取得したい機会があると思います。<br />閏年の関係etc...などで、、、<br /><br />以下の方法で取得可能です。
<code class="vb-dot-net">
	DateTime.DaysInMonth(年, 月)
</code>
それでは、直近の閏年の年をチェックしてみましょう♪
<code class="vb-dot-net">
	Console.WriteLine("2018 02 -&gt; " &amp; DateTime.DaysInMonth(2018, 2))
	Console.WriteLine("2019 02 -&gt; " &amp; DateTime.DaysInMonth(2019, 2))
	Console.WriteLine("2020 02 -&gt; " &amp; DateTime.DaysInMonth(2020, 2))
	Console.WriteLine("2021 02 -&gt; " &amp; DateTime.DaysInMonth(2021, 2))
	Console.WriteLine("2022 02 -&gt; " &amp; DateTime.DaysInMonth(2022, 2))

	' ***** コンソール *****
	' 2018 02 -&gt; 28
	' 2019 02 -&gt; 28
	' 2020 02 -&gt; 29
	' 2021 02 -&gt; 28
	' 2022 02 -&gt; 28
	' ***** ******** *****
</code>
<h2>日時の演算</h2>
日時の演算方法について説明します。
<h3>一定期間後(前)の日時を算出</h3>
「Add〇〇〇」というメソッドを使用します。
<code class="vb-dot-net">
	DateTimeオブジェクト.AddYears(年数)
	DateTimeオブジェクト.AddMonths(月数)
	DateTimeオブジェクト.AddDays(日数)
	DateTimeオブジェクト.AddHours(時間)
	DateTimeオブジェクト.AddMinutes(分数)
	DateTimeオブジェクト.AddSeconds(秒数)
</code>
引数を負数に設定することで、一定期間前の日時を算出可能です。
<code class="vb-dot-net">
	Dim dt As Datetime
	dt = Datetime.Now
	Console.WriteLine("現在時刻 => " & dt)
	Console.WriteLine("10時間後 => " & dt.AddHours(10))
	Console.WriteLine("50時間前 => " & dt.AddHours(-50))
	Console.WriteLine("100秒前 => " & dt.AddSeconds(-100))
	Console.WriteLine("500分後 => " & dt.AddSeconds(500))

	' ***** コンソール *****
	' 現在時刻 => 2022/04/29 23:10:35
	' 10時間後 => 2022/04/30 9:10:35
	' 50時間前 => 2022/04/27 21:10:35
	' 100秒前 => 2022/04/29 23:08:55
	' 500分後 => 2022/04/29 23:18:55
	' ***** ******** *****
</code>
<h3>日時の差分の取得</h3>
二点の日時の差分を算出するためには以下の2つの方法があります。
<ul>
	<li>Substract</li>
	<li>「-」演算子</li>
</ul>
<h4>Substract</h4>
以下のように書きます。
<code class="vb-dot-net">
	日時A.Substract(日時B)
</code>
では、僕の誕生日と今日の差分を計算してみましょう♪
<code class="vb-dot-net">
	Dim dt, my_birthday As Datetime
	dt = DateTime.Now
	my_birthday = new DateTime(1998, 10, 25, 18, 20, 20)
	Console.WriteLine(dt)
	Console.WriteLine(dt.Subtract(my_birthday))

	' ***** コンソール *****
	' 2022/04/29 23:45:00
	' 8587.05:24:40.1400858
	' ***** ******** *****
</code>
Substarctメソッドで取得される値はTimeSpanオブジェクトで、「d.hh:mm:ss:ff」という形式で表されます。<br /><br />僕が生まれてから、「8587.5日24時間4.01400858秒」経過したらしいです。<br /><br />TimeSpanオブジェクトでは年と月の情報は表されないため、必要な場合には自分で算出する必要があります。
<h4>「-」演算子</h4>
算術演算で使用される「-」演算子を使用して日時の差分を算出する方法もあります。
<code class="vb-dot-net">
	Dim dt, my_birthday As Datetime
	dt = DateTime.Now
	my_birthday = new DateTime(1998, 10, 25, 18, 20, 20)
	Console.WriteLine(dt)
	Console.WriteLine(dt - my_birthday)

	' ***** コンソール *****
	' 2022/04/29 23:52:20
	' 8587.05:32:00.6267126
	' ***** ******** *****
</code>
<h2>TimeSpan</h2>
日時の差分を算出する際に使用しましたね♪<br />期間情報を保持するオブジェクトです。<br /><br />以下のように書きます。
<code class="vb-dot-net">
	New TimeSpan(時間数, 分数, 秒数)
	New TimeSpan(日数, 時間数, 分数, 秒数[, ミリ秒数])
</code>
引数の数によってそれぞれの示す意味が異なるため注意が必要です。
<h2>文字列を日付に変換</h2>
文字列形式で表されたデータをDateTime型に変換するためには以下のメソッドを使用します。
<ul>
	<li>Parse</li>
	<li>TryParse</li>
</ul>
<h3>Parse</h3>
以下のように書きます。
<code class="vb-dot-net">
	DateTime.Parse(文字列)
</code>
<img src="../pics/DateTime.Parse.gif" alt="DateTime型 パース" />
しかしこの方法だと、DateTime型にパース出来ない値が入力された際にエラーとなってしまします。
<img src="../pics/DateTime.Parse-error.gif" alt="DateTime型 パース" />
ということで、パース失敗時にも適切に対応できるようにTryParseを使用してみましょう♪
<h3>TryParse</h3>
以下のように書きます。
<code class="vb-dot-net">
	DateTime.TryParse(文字列, DateTimeオブジェクト)
</code>
文字列として受け取った値をDateTime型にパースして、成功したらDateTimeオブジェクトに代入して戻り値としてTrueを返し、失敗したら戻り値としてFalseを返します。<br /><br />これを利用してエラー処理を行います。
<img src="../pics/DateTime.TryParse.gif" alt="DateTime型 パース" />
<?php footer(); ?>