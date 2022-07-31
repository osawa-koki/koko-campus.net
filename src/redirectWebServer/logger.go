package main

/*
ここにある関数群については絶対にエラーが発生しないという確証のもと、原則として例外処理をしない。
*/

import (
	"fmt"
	"os"
)

// デバグ用ログ
func Logger(message string) {
	f, er := os.OpenFile(fmt.Sprintf(GetDIR()+"/../../logFiles/%s.log", GetDate()), os.O_APPEND|os.O_CREATE|os.O_WRONLY, os.ModePerm)
	wt := func(f *os.File, s string) {
		_, er := f.WriteString(s + "\n")
		if er != nil {
			f.Close()
			Error("ログファイルに書き込みできませんでした。")
			return
		}
	}
	if er == nil {
		wt(f, fmt.Sprintf("%s\t【%s】", GetDateTime(), message))
	}
	f.Close()
}

// デバグ用ログ
func Error(message string) {
	f, er := os.OpenFile(fmt.Sprintf(GetDIR()+"/../../logFiles/%s.error.log", GetDate()), os.O_APPEND|os.O_CREATE|os.O_WRONLY, os.ModePerm)
	wt := func(f *os.File, s string) {
		_, er := f.WriteString(s + "\n")
		if er != nil {
			f.Close()
			return
		}
	}
	if er == nil {
		wt(f, fmt.Sprintf("%s\t【%s】", GetDateTime(), message))
	}
	f.Close()
}
