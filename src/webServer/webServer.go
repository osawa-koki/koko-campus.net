package main

import (
	"fmt"
	"net/http"
	"net/url"
	"os"
	"strings"
)

type RequestResponse struct {
	request  *http.Request
	response *http.ResponseWriter
	snd      string
	path     string
	Login    bool
	userID   string
	Name     string
}

func setResponseHeaders(w *http.ResponseWriter) {
	(*w).Header().Set("Server", "koko-campus Server")
	(*w).Header().Set("X-Powered-By", "kokoWebServer 1.0")
	(*w).Header().Set("Platform", "Linux / Ubuntu")
	(*w).Header().Set("myBirthday", "10/25")
}

func setResponseHeadersSecurity(w *http.ResponseWriter) {
	(*w).Header().Set("X-Frame-Options", "DENY")
}

func controller(w http.ResponseWriter, r *http.Request) {
	path, _ := url.QueryUnescape(fmt.Sprint((*r).URL))
	RR := RequestResponse{
		request: r,
		response: &w,
		snd: strIndex(path, 1),
		path: r.URL.Path,
		Login: false,
		userID: "",
		Name: "ゲスト",
	}

	setResponseHeaders(&w)
	switch RR.snd {
	case "R", "M":
		setResponseHeadersSecurity(&w)
	}

	if RR.snd == "?" {
		// セッションがいらないページ(静的ページ)
		// or
		// ログアウト
		switch strIndex(path, 2) {
		case "?": //「??」
			// ログアウト処理
			Logout(&RR)
		case "!": //「?!」
			// ログアウト後のリダイレクト先ページ
			LogoutPageController(&w)
		default:
			// その他(静的ページ)
			WebController(&w, path)
		}
	} else {
		// セッションが必要なページ
		RR.path = strings.ToUpper(RR.path) // 静的ページ以外は大文字小文字を区別しない
		sessionController(&RR)
	}
}

func main() {
	fmt.Println("")
	fmt.Println("***** webServer started... *****")
	fmt.Println("")
	http.HandleFunc("/", controller)
	if er := http.ListenAndServeTLS("", os.Getenv("TLS_CERT"), os.Getenv("TLS_PRIVKEY"), nil); er != nil {
		Error("ListenAndServeに失敗")
	}
}
