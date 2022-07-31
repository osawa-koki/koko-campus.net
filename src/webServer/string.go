package main

import (
	"regexp"
	"strings"
)

/*
正規表現の結果(キャプチャ)をマップ形式で返す関数
【引数1】正規表現
【引数1】対象文字列
【戻り値】マップ形式(キャプチャ名: 値)のデータ
*/
func RegexGetParam(regEx, target string) (paramsMap map[string]string) {
	compRegEx := regexp.MustCompile(regEx)
	match := compRegEx.FindStringSubmatch(target)

	paramsMap = make(map[string]string)
	for i, name := range compRegEx.SubexpNames() {
		if 0 < i && i <= len(match) {
			paramsMap[name] = match[i]
		}
	}
	return
}

/*
文字列が正規表現にマッチするか判定します。
【引数1】正規表現
【引数2】対象文字列
【戻り値】真偽値
*/
func preg_match(target string, regex string) bool {
	r := regexp.MustCompile(regex)
	return r.MatchString(target)
}

/*
文字列のn番目の文字を取得します。
【引数1】対象文字列
【引数2】n番目
【戻り値】文字
*/
func strIndex(s string, i int) string {
	strAry := strings.Split(s, "")
	if i < len(strAry) {
		return strAry[i]
	}
	return ""
}
