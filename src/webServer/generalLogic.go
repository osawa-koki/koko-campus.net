package main

import "strings"

/*
文字数をチェックします。
【引数1】文字列
【引数2】上限バイト数
【戻り値】真偽値(文字数が指定したバイト数以下かどうか)
*/
func byteCheck(str string, bt int) bool {
	return len(str) <= bt
}

/*
指定した文字列が上限となるバイト数を超えないように末尾を切り落とします。
範囲内の場合には何もしません。
【引数】対象文字列
【戻り値】加工後文字列
*/
func cutOffstring(str string, bt int) string {
	var result string = ""
	for _, e := range strings.Split(str, "") {
		if len(result)+len(e) <= bt {
			result += e
		}
	}
	return result
}
