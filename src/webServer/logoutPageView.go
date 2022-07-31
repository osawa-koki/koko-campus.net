package main

func LogoutPageView() string {
	if html, er := FileGetContents("html/logoutPage.html"); er == nil {
		return html
	}
	Error("ファイルが見つかりません。")
	return ""
}
