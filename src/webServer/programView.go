package main

import (
	"fmt"
	"strings"
	"text/template"
)

func programView(model *programStruct, digit string) *string {
	var answer string
	if digit != "0000" {
		tmplHTML, _ := FileGetContents("html/P/framework.html")
		if html, er := FileGetContents(fmt.Sprintf("html/P/%s.html", digit)); er == nil {
			html = strings.Replace(tmplHTML, "(((CONTENTS)))", html, 1)
			writer := new(strings.Builder)
			if tmpl, er := template.New("program page").Parse(html); er == nil {
				tmpl.Execute(writer, model)
				answer = writer.String()
				return &answer
			} else {
				Error(er.Error())
			}
			Error("subjectHTML出力失敗")
		} else {
			fmt.Println(er.Error())
		}
	}
	errorHTML, _ := FileGetContents("html/P/0000.html")
	writer := new(strings.Builder)
	errorTmpl, _ := template.New("program top page").Parse(errorHTML)
	errorTmpl.Execute(writer, model)
	answer = writer.String()
	return &answer
}
