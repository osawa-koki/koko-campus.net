package main

import (
	"fmt"
	"net/http"
	"net/url"
	"strings"
)

type RequestResponse struct {
	request     *http.Request
	response    *http.ResponseWriter
	fst         string
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
		fst:         strIndex(path, 1),
		path:        r.URL.Path,
		Login:       false,
		NeedToLogin: false,
		userID:      "",
		Name:        "ゲスト",
	}

	setResponseHeaders(&w)
	switch RR.fst {
	case "R", "M": // [SEC] クリックジャッキング・XSS対策
		setResponseHeadersSecurity(&w)
	}

	RR.path = strings.ToUpper(RR.path) // 静的ページ以外は大文字小文字を区別しない

	if RR.fst == "M" {
		RR.NeedToLogin = true
	}
	sessionController(&RR)
}

func main() {
	fmt.Println("")
	fmt.Println("***** webServer started... *****")
	fmt.Println("")
	http.HandleFunc("/", controller)

	if er := http.ListenAndServe("0.0.0.0:8080", nil); er != nil {
		fmt.Println("failure on ListenAndServe")
		fmt.Println(er.Error())
	}
}
