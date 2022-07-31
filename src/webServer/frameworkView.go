package main

import (
	"strings"
	"text/template"
)

type TmplMapStruct struct {
	Title string
	Login bool
	Name  string
	CSS   []string // 1階層のみ
	JS    []string // 1階層のみ
	JSFX  []string
}

func (p *TmplMapStruct) addCSS(s ...string) {
	(*p).CSS = append((*p).CSS, s...)
}
func (p *TmplMapStruct) addJS(s ...string) {
	(*p).JS = append((*p).JS, s...)
}

/*
対象のhtmlをhtmlフレームワークに埋め込みます。
pageControllerから呼び出すことを想定しています。
【引数1】埋め込むhtml
【引数2】テンプレートエンジンオイルで用いる基底構造体データ
【戻り値】フレームワークに指定したパスにあるhtmlを埋め込んだhtml文字列
*/
func generateFrameworkView(html string, tmplStruct TmplMapStruct) string {
	writer := new(strings.Builder)
	htmlFrame, _ := FileGetContents("html/framework.html") // ファイルが存在することが明確であるため、例外処理はスキップ
	if tmpl, er := template.New("framework").Parse(htmlFrame); er == nil {
		tmpl = tmpl.Funcs(template.FuncMap(templateEngineFx()))
		tmpl.Execute(writer, tmplStruct)
		answer := strings.Replace(writer.String(), "(((BODY)))", html, 1)
		return answer
	}
	Error("Frameworkレンダリングに失敗しました。")
	return ""
}
