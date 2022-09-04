using System;
using System.IO;
using System.Text.RegularExpressions;

internal class Program
{
	internal static int Main(string[] args)
	{
		Console.WriteLine("");
		Console.WriteLine(" ***** ***** ***** ***** ***** ***** ***** ");
		Console.WriteLine(" ***** *****  Regex  Replacer  ***** ***** ");
		Console.WriteLine(" ***** ***** ***** ***** ***** ***** ***** ");
		Console.WriteLine("");
		Console.WriteLine("");
		Console.WriteLine("");

		string? regex;
		while (true)
        {
			Console.WriteLine("\n正規表現を入力して下さい。\n");
			regex = Console.ReadLine();
			if (regex == null) continue;
			Console.WriteLine($"/{regex}/ で実行します。\nよろしいですか???\n\nY -> YES\nN -> NO");
			if (Console.ReadKey().Key == ConsoleKey.Y) break;
        }
		regex = regex.Trim();


		string? pattern;
		while (true)
		{
			Console.WriteLine("\n置換後文字列を入力して下さい。\n");
			pattern = Console.ReadLine();
			if (pattern == null) continue;
			Console.WriteLine($"\"{regex}\" で置換します。\nよろしいですか???\n\nY -> YES\nN -> NO");
			if (Console.ReadKey().Key == ConsoleKey.Y) break;
		}

		string? path;
		while (true)
		{
			Console.WriteLine("\n置換後文字列を入力して下さい。\n");
			path = Console.ReadLine();
			if (path == null) continue;
			Console.WriteLine($"「{path}」 を対象に置換を実行します。\nよろしいですか???\n\nY -> YES\nN -> NO");
			if (Console.ReadKey().Key == ConsoleKey.Y) break;
		}


		var files = Directory.GetFiles(path, "*", SearchOption.AllDirectories);

		foreach (var file in files)
        {
			var contents = File.ReadAllText(file);
			var afterReplaced = Regex.Replace(contents, regex, pattern);
			File.WriteAllText(file, afterReplaced);
		}

		return 0;
	}
}
