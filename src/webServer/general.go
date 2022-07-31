package main

import (
	"encoding/json"
	"errors"
	"fmt"
	"io/ioutil"
	"os"
	"time"
)

// 日付だけを取得
func GetDate() string {
	n := time.Now()
	return n.Format("2006-01-02")
}

// 日付時刻情報を取得
func GetDateTime() string {
	n := time.Now()
	return n.Format("2006-01-02 15:04:05")
}

func getRootDIR() string {
	return os.Getenv("WWWROOT")
}

/*
ファイルの中身を取得します。
【引数】ファイルのパス(「web」ディレクトリを起点に|最初の「/」は不要)
【戻り値】ファイルの中身, エラー
*/
func FileGetContents(path string) (string, error) {
	if bt, er := ioutil.ReadFile(getRootDIR() + "/" + path); er == nil {
		return string(bt), nil
	} else {
		Error(er.Error())
		return "", errors.New("file not exist")
	}
}

/*
データをファイルに保存します。
既にファイルが存在する場合は、新たに作成します。
【引数】ファイルパス(「web」ディレクトリを起点に|最初の「/」は不要)
【戻り値】成功か否か
*/
func FileSaveContents(path string, contents string) bool {
	if er := ioutil.WriteFile(path, []byte(contents), os.ModePerm); er == nil {
		return true
	} else {
		return false
	}
}

/*
バイトデータをファイルに保存します。
既にファイルが存在する場合は、新たに作成します。
【引数】ファイルパス(「web」ディレクトリを起点に|最初の「/」は不要)
【戻り値】成功か否か
*/
func FileSaveContentsByte(path string, contents []byte) bool {
	if er := ioutil.WriteFile(path, contents, os.ModePerm); er == nil {
		return true
	} else {
		fmt.Print(er.Error())
		return false
	}
}

/*
三項演算子
*/
func iif(expr bool, a string, b string) string {
	if expr {
		return a
	} else {
		return b
	}
}

/*
0埋め(2桁)
*/
func zPad2(i int) string {
	return fmt.Sprintf("%02d", i)
}

/*
0埋め(2桁)
*/
func zPad4(i int) string {
	return fmt.Sprintf("%04d", i)
}

/*

 */
func jsonEncode(intf any) string {
	var answer string
	if jsonByte, er := json.Marshal(intf); er == nil {
		answer = string(jsonByte)
	} else {
		answer = "{Success: false, ErrorMessage: \"jsonエンコードに失敗しました。\"}"
	}
	return answer
}
