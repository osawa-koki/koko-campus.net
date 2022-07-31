package main

/*
ここにある関数群については絶対にエラーが発生しないという確証のもと、原則として例外処理をしない。
*/

import (
	"fmt"
	"os"
	"strings"
)

// デバグ用ログ
func Logger(message string) {
	f, er := os.OpenFile(fmt.Sprintf(getRootDIR()+"/../../logFiles/%s.log", GetDate()), os.O_APPEND|os.O_CREATE|os.O_WRONLY, os.ModePerm)
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
	f, er := os.OpenFile(fmt.Sprintf(getRootDIR()+"/../logFiles/%s.error.log", GetDate()), os.O_APPEND|os.O_CREATE|os.O_WRONLY, os.ModePerm)
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

// デバグ用ログ
func SQLLogger(SQLstruct *SQLbuilder) {
	f, er := os.OpenFile(fmt.Sprintf(getRootDIR()+"/../logFiles/%s.SQL.log", GetDate()), os.O_APPEND|os.O_CREATE|os.O_WRONLY, os.ModePerm)
	wt := func(f *os.File, s string) {
		_, er := f.WriteString(s + "\n")
		if er != nil {
			f.Close()
			Error("0003")
			return
		}
	}
	if er == nil {
		wt(f, fmt.Sprintf("%s\t【%s】", GetDateTime(), CreateSQLfromSQLStruct(SQLstruct)))
	}
	f.Close()
}

/*
SQL構造体からSQL文を復元する関数。
【引数】SQLBuilder構造体
【戻り値】SQL文
*/
func CreateSQLfromSQLStruct(SQLstruct *SQLbuilder) string {
	var sql string = SQLstruct.sql
	for _, data := range SQLstruct.data {
		sql = strings.Replace(sql, "?", fmt.Sprintf("'%s'", data.(string)), 1)
	}
	return sql
}
