package main

import "net/http"

func subjectsAPI(r *http.Request) string {
	var answer string
	var success bool = false
	var errorMessage []string = []string{}

	switch r.PostFormValue("action") {
	case "getPages":
		Subject := r.PostFormValue("subject")
		Lesson := r.PostFormValue("lesson")
		if IsNumber(Subject) && IsNumber(Lesson) {
			var pages []map[string]string = []map[string]string{}
			var SQL SQLbuilder
			SQL.Add("SELECT subject_page, page_name")
			SQL.Add("FROM subjects_page")
			SQL.Add("WHERE subject = ? AND subject_lesson = ?")
			SQL.Add("ORDER BY subject_page ASC;")
			SQL.AddParam(Subject)
			SQL.AddParam(Lesson)
			if Rows := SelectAll(&SQL); Rows != nil {
				for Rows.Next() {
					var Code string
					var Name string
					if er := Rows.Scan(&Code, &Name); er == nil {
						PageMap := map[string]string{
							"PageCode": Code,
							"PageName": Name,
						}
						pages = append(pages, PageMap)
						success = true
					} else {
						Error(er.Error())
					}
				}
			}
			jsonStruct := struct {
				Success      bool
				ErrorMessage []string
				Pages        []map[string]string
			}{
				Success:      success,
				ErrorMessage: errorMessage,
				Pages:        pages,
			}
			answer = jsonEncode(jsonStruct)

		}

	}

	return answer
}
