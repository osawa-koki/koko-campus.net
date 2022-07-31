package main

import (
	"fmt"
	"strconv"
)

func getDataType(d any) string {
	return fmt.Sprintf("%T", d)
}

/*
任意の型のデータを文字列型のデータに変換
【引数】対象のデータ
【戻り値】文字列型に変換されたデータ(変換に失敗した場合には空文字列を返す)
*/
func CStr(d any) string {
	dataType := getDataType(d)
	switch {
	case preg_match("int", dataType):
		return strconv.Itoa(d.(int))
	case preg_match("float", dataType):
		return strconv.FormatFloat(d.(float64), 'f', 2, 64)
	case preg_match("bool", dataType):
		return strconv.FormatBool(d.(bool))
	default:
		return ""
	}
}

/*
任意の型のデータを整数型のデータに変換
【引数】対象のデータ
【戻り値】整数型に変換されたデータ(変換に失敗した場合には「0」を返す)
*/
func CInt(d any) int {
	dataType := getDataType(d)
	switch {
	case preg_match("float", dataType):
		return int(d.(float64))
	case preg_match("string", dataType):
		if result, er := strconv.Atoi(d.(string)); er == nil {
			return result
		}
		return 0
	case preg_match("bool", dataType):
		if d.(bool) {
			return 1
		}
		return 0
	default:
		return 0
	}
}

/*
任意の型のデータを浮動小数点数型のデータに変換
【引数】対象のデータ
【戻り値】浮動小数点数型に変換されたデータ(変換に失敗した場合には「0」を返す)
*/
func CFloat(d any) float64 {
	dataType := getDataType(d)
	switch {
	case preg_match("int", dataType):
		return float64(d.(int))
	case preg_match("string", dataType):
		if result, er := strconv.ParseFloat(d.(string), 64); er == nil {
			return result
		}
		return 0
	case preg_match("bool", dataType):
		if d.(bool) {
			return 1
		}
		return 0
	default:
		return 0
	}
}

/*
任意の型のデータを真偽値型のデータに変換
【引数】対象のデータ
【戻り値】真偽値に変換されたデータ(変換に失敗した場合には「false」を返す)
数字 => 正の数の場合は「true」、マイナスと負の場合は「false」
文字列 => 空文字の場合は「false」、それ以外は「true」
*/
func CBool(d any) bool {
	dataType := getDataType(d)
	switch {
	case preg_match("int", dataType):
		return 0 < d.(int)
	case preg_match("float", dataType):
		return 0 < d.(float64)
	case preg_match("string", dataType):
		if d != "" {
			return true
		}
		return false
	default:
		return false
	}
}