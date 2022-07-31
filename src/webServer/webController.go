package main

import (
	"fmt"
	"net/http"
	"strings"
)

// 静的ページ
func WebController(w *http.ResponseWriter, path string) {
	reg := `/\?(?P<Category>[\w\d]+)/(?P<Name>[\w\d\-_ぁ-んーァ-ヶー一-龠]+)\.(?P<Ext>\w+)`
	Params := RegexGetParam(reg, path)
	var (
		Category = Params["Category"]
		Name     = Params["Name"]
		Ext      = Params["Ext"]
	)
	var (
		contentType string
		Type        string = ""
	)
	switch strings.ToUpper(Ext) {
	case "CSS":
		contentType = "text/css"
		Type = "css"
	case "JS":
		contentType = "text/javascript"
		Type = "js"
	case "PNG", "GIF", "JPEG", "JPG":
		Type = "img"
		switch Params["Ext"] {
		case "PNG":
			contentType = "image/png"
		case "GIF":
			contentType = "image/gif"
		case "JPG", "JPEG":
			contentType = "image/jpeg"
		}
	case "MP4", "MPEG":
		Type = "video"
		switch Params["Ext"] {
		case "MP4":
			contentType = "video/mp4"
		case "MPEG":
			contentType = "video/mpeg"
		}
	}
	(*w).Header().Set("Content-Type", contentType)
	if contents, er := FileGetContents(fmt.Sprintf("%s/%s/%s.%s", Type, Category, Name, strings.ToLower(Ext))); er == nil && Type != "" {
		fmt.Fprint(*w, contents)
	} else {
		(*w).WriteHeader(http.StatusNotFound)
	}
}
