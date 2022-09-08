package main

import (
	"io"
	"net/http"
)

func pyAPI(RR *RequestResponse) string {
	var answer string

	var request = RR.request

	bodyByte, _ := io.ReadAll(request.Body)

	answer = postRequest(createPath2pyAPI(request), bodyByte)

	return answer
}

const (
	pyAPIdomain = "http://localhost:8888/"
)

func createPath2pyAPI(request *http.Request) string {
	return pyAPIdomain + request.URL.Path + "?" + request.URL.RawQuery
}
