package main

import (
	"fmt"
	"regexp"
)

func pageController(RR *RequestResponse) {
	w := RR.response
	var strHTML *string
	var urlCheck bool = false
	var isPage bool = true
	var APIdata string
	var tmplMap *TmplMapStruct = &TmplMapStruct{
		Title:  defaultTitle,
		Login:  RR.Login,
		Name:   RR.Name,
		CSS:    []string{"00/00", "00/01"},
		CSSLIB: []string{},
		JS:     []string{"00/01"},
		JSFX:   []string{"00/00", "00/30"},
		JSLIB:  []string{},
	}

	rex := regexp.MustCompile(`\d+`)
	digit := rex.FindString(RR.request.URL.Path)

	switch RR.fst {
	case "", "T", "0":
		urlCheck = true
		tmplMap.addCSS("T/00")
		tmplMap.addJS("T/00")
		tmplMap.Title = "トップページ"
		strHTML = ToppageController()
	case "S":
		urlCheck = true
		tmplMap.addCSS("S/00", "S/01", "S/02", "S/03", "S/04", "S/05", "S/07", "S/99")
		tmplMap.addJS("S/00", "S/01", "S/02", "S/04", "99/00")
		if RR.Login {
			tmplMap.addJS("S/06", "S/70")
			tmplMap.addCSS("S/06", "S/70")
		}
		SubjMap := RegexGetParam(`/(S(?P<Subject>\d+))?(L(?P<Lesson>\d+))?(P(?P<Page>\d+))?`, RR.path)
		tmplMap.addCSS("S/" + SubjMap["Subject"])
		strHTML = SubjectsController(&SubjMap, RR)
	case "R":
		urlCheck = true
		tmplMap.addCSS("R/00")
		tmplMap.addJS("R/00")
		tmplMap.Title = "新規会員登録・ログイン"
		strHTML = RegisterController(RR, digit)
	case "M": // Need To Login
		urlCheck = true
		tmplMap.addCSS("M/00", "M/"+digit)
		tmplMap.addJS("M/00", "M/"+digit)
		tmplMap.Title = "マイページ"
		strHTML = MypageController(RR, digit)
	case "P":
		urlCheck = true
		var name string = getProgramName(digit)
		if name != "" {
			tmplMap.Title = name
			tmplMap.addCSS("P/00", "P/"+digit)
			tmplMap.addJS("P/00", "P/"+digit)
		} else {
			tmplMap.Title = "プログラム一覧"
			tmplMap.addCSS("P/0000")
			tmplMap.addJS("P/0000")
		}
		strHTML = programController(digit)
	case "G":
		urlCheck = true
		strHTML = gameController(tmplMap, RR)
	case "A":
		isPage = false
		APIdata = API(RR)
	default:
		Logger(RR.fst)
	}
	if isPage {
		tmplMap.addJS("00/99")
		if urlCheck {
			html := generateFrameworkView(*strHTML, *tmplMap)
			fmt.Fprint(*w, html)
		} else {
			NotFountHTML, _ := FileGetContents("html/404.html")
			html := generateFrameworkView(NotFountHTML, *tmplMap)
			fmt.Fprint(*w, html)
		}
	} else {
		(*w).Header().Set("Content-Type", "application/json")
		fmt.Fprint(*w, APIdata)
	}
}
