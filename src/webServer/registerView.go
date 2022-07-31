package main

import (
	"fmt"
	"strings"
	"text/template"
)

func RegisterView(model *map[string]string, digit string) *string {
	if html, er := FileGetContents(fmt.Sprintf("html/R/%s.html", digit)); er == nil {
		writer := new(strings.Builder)
		if tmpl, er := template.New("register").Parse(html); er == nil {
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
