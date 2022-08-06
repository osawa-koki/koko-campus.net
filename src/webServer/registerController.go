package main

import (
	"net/http"
)

func RegisterController(RR *RequestResponse, digit string) *string {
	var answer *string
	if RR.Login {
		http.Redirect(*(RR).response, RR.request, "/M00", http.StatusFound)
		tempAnswer := ""
		answer = &tempAnswer
	} else {
		answer = RegisterModel(digit, (*RR).request)
	}
	return answer
}
