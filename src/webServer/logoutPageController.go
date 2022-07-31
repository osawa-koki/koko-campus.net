package main

import (
	"fmt"
	"net/http"
	"text/template"
)

/*
セッションを終了(ログアウト)します。
【引数】RR構造体
【戻り値】なし
*/
func Logout(RR *RequestResponse) {
	cookie := &http.Cookie{
		Name:     cookieName,
		Value:    "thank you for visiting koko-campus website",
		Path:     "/",
		MaxAge:   -99999999,
		Secure:   true,
		HttpOnly: true,
	}
	http.SetCookie(*RR.response, cookie)
	http.Redirect(*RR.response, RR.request, "?!", http.StatusFound)
}

func LogoutPageController(w *http.ResponseWriter) {
	(*w).Header().Set("Content-Type", "text/html; charset=utf-8")
	m := LogoutPageModel()
	v := LogoutPageView()
	if tmpl, er := template.New("LogoutPage").Parse(v); er == nil {
		tmpl.Execute(*w, m)
	} else {
		fmt.Fprint(*w, "")
	}
}
