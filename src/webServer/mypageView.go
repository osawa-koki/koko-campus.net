package main

import (
	"fmt"
	"strings"
	"text/template"
)

func MypageView(model any, digit string) *string {
	if html, er := FileGetContents(fmt.Sprintf("html/M/%s.html", digit)); er == nil {
		writer := new(strings.Builder)
		if tmpl, er := template.New("mypage").Parse(html); er == nil {
			tmpl.Execute(writer, model)
			answer := writer.String()
			return &answer
		} else {
			Error(er.Error())
		}
	} else {
		Error(er.Error())
	}
	answer := ""
	return &answer
}
