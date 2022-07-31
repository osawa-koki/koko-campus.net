package main

import (
	"errors"
	"fmt"
	"io/ioutil"
	"os"
	"path/filepath"
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

func GetDIR() string {
	exe, _ := os.Executable()
	return filepath.Dir(exe)
}

/*
ファイルの中身を取得します。
【引数】ファイルのパス(「web」ディレクトリを起点に|最初の「/」は不要)
【戻り値】ファイルの中身, エラー
*/
func FileGetContents(path string) (string, error) {
	bt, er := ioutil.ReadFile(fmt.Sprintf("%s/../%s", GetDIR(), path))
	if er == nil {
		return string(bt), nil
	} else {
		return "", errors.New("file not exist")
	}
}

