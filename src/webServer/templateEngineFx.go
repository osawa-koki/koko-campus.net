package main

import (
	"text/template"
	"net/url"
)

func templateEngineFx() template.FuncMap {
	return template.FuncMap{
		"URLdecode": func(s string) string {
			if answer, er := url.QueryUnescape(s); er == nil {
				return answer
			}
			return ""
		},
		"zPad2": zPad2,
		"zPad4": zPad4,
	}
}
