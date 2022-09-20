package main

import (
	"fmt"
	"net/http"
	"net/url"
	"os"
	"strings"
)

type RequestResponse struct {
	request     *http.Request
	response    *http.ResponseWriter
	snd         string
	path        string
	Login       bool
	NeedToLogin bool
	userID      string
	Name        string
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
		request:     r,
		response:    &w,
		snd:         strIndex(path, 1),
		path:        r.URL.Path,
		Login:       false,
		NeedToLogin: false,
		userID:      "",
		Name:        "ゲスト",
	}

	setResponseHeaders(&w)
	switch RR.snd {
	case "R", "M": // [SEC] クリックジャッキング・XSS対策
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

		if (RR.snd == "M") {
			RR.NeedToLogin = true;
		}
		sessionController(&RR)
	}
}

func main() {
	fmt.Println("")
	fmt.Println("***** webServer started... *****")
	fmt.Println("")
	http.HandleFunc("/", controller)

	if os.Getenv("DEBUG") == "ON" {
		fmt.Println("DEBUG MODE")
		if er := http.ListenAndServe("", nil); er != nil {
			fmt.Println("failure on ListenAndServe")
			fmt.Println(er.Error())
		}
	} else {
		fmt.Println("OPERATION MODE")
		if er := http.ListenAndServeTLS("", os.Getenv("TLS_CERT"), os.Getenv("TLS_PRIVKEY"), nil); er != nil {
			fmt.Println("failure on ListenAndServe")
			fmt.Println(er.Error())
		} else {
			fmt.Println("success on ListenAndServe")
		}
	}
}
