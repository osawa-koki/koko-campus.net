package main

func gameController(tmplMap *TmplMapStruct, RR *RequestResponse) *string {
	var answer *string

	regexPattern := gameParamsReceier(RR.path)
	style := regexPattern["Style"]
	digit := regexPattern["Digit"]

	name_DB, style_DB := getGameName(digit)

	if name_DB == "" { // 指定したゲームが存在しなければ、、、
		digit = "0000"
	} else if style_DB == "1" { // 一人用
		style = "A"
	} else { // 複数人用
		if style != "A" && style != "W" {
			style = "0"
		}
	}

	tmplMap.addCSS("G/00", "G/99", "G/"+digit)
	tmplMap.addJS("G/00", "G/99", "G/"+digit)

	answer = gameModel(digit, style, style_DB, iif(RR.Login, "/?M/" + RR.userID, "") + ".png")
	return answer
}

func gameParamsReceier(path string) map[string]string {
	reg := `/G(?P<Style>\w?)(?P<Digit>\d{4})`
	return RegexGetParam(reg, path)
}
