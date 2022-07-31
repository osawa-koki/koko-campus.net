package main

import "time"

// 日付だけを取得
func GetDate() string {
	n := time.Now()
	return n.Format("2006_01_02")
}
