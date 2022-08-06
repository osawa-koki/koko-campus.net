package main

import "net/http"

/*
htmlレンダリング用の構造体を生成。
【引数】なし
【戻り値】モデル構造体
*/
func backOfficeModel(digit string, r *http.Request) *string {
	var answer *string

	switch digit {
	case "00": // backOfficeトップ
	var backOfficeMap map[string]string
	answer = backOfficeView(&backOfficeMap, digit)

	}

	return answer
}