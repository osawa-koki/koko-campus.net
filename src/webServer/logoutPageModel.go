package main

type logoutPageModelStruct struct {
	Title   string
	Message string
}

/*
htmlレンダリング用の構造体を生成。
【引数】なし
【戻り値】モデル構造体
*/
func LogoutPageModel() logoutPageModelStruct {
	m := logoutPageModelStruct{
		Title:   "タイトル",
		Message: "お疲れさまでした。",
	}
	return m
}
