package main

import (
	"strings"
	"text/template"
)

func ToppageView(model *ToppageModelStruct) *string {
	if html, er := FileGetContents("html/T/toppage.html"); er == nil {
		writer := new(strings.Builder)
		if tmpl, er := template.New("toppage").Parse(html); er == nil {
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
