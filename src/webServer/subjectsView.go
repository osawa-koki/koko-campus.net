package main

import (
	"fmt"
	"text/template"
	"strings"
)

func SubjectsView(model *SubjectsModelStruct, subjMap *map[string]string) *string {
	var answer string
	if model.URLcheck {
		tmplHTML, _ := FileGetContents("html/S/framework.html")
		if html, er := FileGetContents(fmt.Sprintf("html/S/%s/%s/%s.html", (*subjMap)["Subject"], (*subjMap)["Lesson"], (*subjMap)["Page"])); er == nil {
			html = strings.Replace(tmplHTML, "(((CONTENTS)))", html, 1)
			writer := new(strings.Builder)
			if tmpl, er := template.New("subject page").Parse(html); er == nil {
				tmpl.Execute(writer, model)
				answer = writer.String()
				return &answer
			} else {
				Error(er.Error())
			}
			Error("subjectHTML出力失敗")
		}
	}
	errorHTML, _ := FileGetContents("html/S/error.html")
	writer := new(strings.Builder)
	errorTmpl, _ := template.New("error page").Parse(errorHTML)
	errorTmpl.Execute(writer, model)
	answer = writer.String()
	return &answer
}
