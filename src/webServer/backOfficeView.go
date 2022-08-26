package main

import (
	"fmt"
	"strings"
	"text/template"
)

func backOfficeView(model *map[string]string, digit string) *string {
	if html, er := FileGetContents(fmt.Sprintf("html/B/%s.html", digit)); er == nil {
		writer := new(strings.Builder)
		if tmpl, er := template.New("backOffice").Parse(html); er == nil {
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
