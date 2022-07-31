package main

import (
	"net/http"
)

type LoginStateStruct struct {
	Login bool
	Name  string
}

/*
ログインが必要なページ
*/
func loginController(RR *RequestResponse) {
	if (*RR).Login {
		pageController(RR)
	} else {
		http.Redirect(*RR.response, RR.request, "/R03", http.StatusFound)
	}
}
