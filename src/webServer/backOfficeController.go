package main

import (
	"net/http"
)

type backOfficeStruct struct {
	Login bool
	Name  string
}

/*
バックオフィス
*/
func backOfficeController(RR *RequestResponse, digit string) *string {
	var answer *string

	var SQL SQLbuilder
	SQL.Add("SELECT user_id FROM admin")
	SQL.Add("WHERE user_id = ?;")
	SQL.AddParam(RR.userID)

	if RR.Login && Exists(&SQL) {
		// 管理者用の処理
		// model
		//   ↓
		// view
		//
		answer = backOfficeModel(digit, (*RR).request)
	} else {
		http.Redirect(*RR.response, RR.request, "/R03", http.StatusFound)
		tempAnswer := ""
		answer = &tempAnswer
	}

	return answer
}
