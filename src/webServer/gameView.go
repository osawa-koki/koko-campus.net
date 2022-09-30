package main

import (
	"fmt"
	"strings"
	"text/template"
)

func gameView(model *gameStruct, digit string, style string) *string {
	var answer string
	if digit != "0000" && style != "0" {
		tmplHTML, _ := FileGetContents("html/G/framework.html")
		if html, er := FileGetContents(fmt.Sprintf("html/G/%s.html", digit)); er == nil {
			html = strings.Replace(tmplHTML, "(((CONTENTS)))", html, 1)
			writer := new(strings.Builder)
			if tmpl, er := template.New("game page").Parse(html); er == nil {
				tmpl.Execute(writer, model)
				answer = writer.String()
				return &answer
			} else {
				Error(er.Error())
			}
			Error("game HTML出力失敗")
		} else {
			fmt.Println(er.Error())
		}
	}
	errorHTML, _ := FileGetContents(fmt.Sprintf("html/G/%s.html", iif(digit == "0000", "0000", "9999")))
	writer := new(strings.Builder)
	errorTmpl, _ := template.New("game top page").Parse(errorHTML)
	errorTmpl.Execute(writer, model)
	answer = writer.String()
	return &answer
}
