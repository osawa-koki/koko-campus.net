package main

func bookmarkAPI(RR *RequestResponse) string {
	var answer string
	var success bool = false
	var errorMessage []string = []string{}
	r := RR.request

	UserID := RR.userID
	Subject := r.PostFormValue("subject")
	Lesson := r.PostFormValue("lesson")
	Page := r.PostFormValue("page")

	switch r.PostFormValue("method") {
	case "insert":
		var SQL SQLbuilder

		SQL.Add("SELECT subject")
		SQL.Add("FROM subjects s")
		SQL.Add("INNER JOIN subjects_lesson l ON s.subject = l.subject")
		SQL.Add("INNER JOIN subjects_page p ON s.subject = l.subject AND l.subject_lesson = p.subjects_page")
		SQL.Add("WHERE user_id = ? AND subject = ?")
		SQL.AddParam(UserID)
		SQL.AddParam(Subject)
		if Lesson != "" {
			SQL.Add("AND lesson = ?")
			SQL.AddParam(Lesson)
			if Lesson != "" {
				SQL.Add("AND page = ?")
				SQL.AddParam(Page)
			}
		}
		SQL.Add(";")

		if Exists(&SQL) {
			var SQL SQLbuilder

			SQL.Add("INSERT INTO bookmark(user_id, subject, lesson, page)")
			SQL.Add("VALUES(?, ?, ?, ?);")
			SQL.AddParam(UserID)
			SQL.AddParam(Subject)
			SQL.AddParam(Lesson)
			SQL.AddParam(Page)

			if Execute(&SQL) {
				success = true
			} else {
				errorMessage = append(errorMessage, "ブックマークの追加に失敗しました。")
			}
		} else {
			errorMessage = append(errorMessage, "指定した科目は存在しません。")
		}

		jsonStruct := struct {
			Success      bool
			ErrorMessage []string
		}{
			Success:      success,
			ErrorMessage: errorMessage,
		}
		answer = jsonEncode(jsonStruct)

	case "delete":
		var SQL SQLbuilder

		SQL.Add("DELETE FROM bookmark")
		SQL.Add("WHERE user_id = ? AND subject = ?")
		SQL.AddParam(UserID)
		SQL.AddParam(Subject)
		if Lesson != "" {
			SQL.Add("AND lesson = ?")
			SQL.AddParam(Lesson)
			if Lesson != "" {
				SQL.Add("AND page = ?")
				SQL.AddParam(Page)
			}
		}
		SQL.Add(";")

		if Execute(&SQL) {
			success = true
		} else {
			errorMessage = append(errorMessage, "ブックマークの削除に失敗しました。")
		}

		jsonStruct := struct {
			Success      bool
			ErrorMessage []string
		}{
			Success:      success,
			ErrorMessage: errorMessage,
		}
		answer = jsonEncode(jsonStruct)
	case "onSubject":
		var lessonData []map[string]string = []map[string]string{}

		var SQL SQLbuilder

		SQL.Add("SELECT subject_lesson, lesson_name")
		SQL.Add("FROM subjects_lesson")
		SQL.Add("WHERE subject = ?")
		SQL.AddParam(Subject)

		if Rows := SelectAll(&SQL); Rows != nil {
			success = true
			for Rows.Next() {
				var lessonMap = map[string]string{}
				var lesson string
				var lessonName string
				if err := Rows.Scan(&lesson, &lessonName); err == nil {
					lessonMap["lesson"] = lesson
					lessonMap["lessonName"] = lessonName
				}
				lessonData = append(lessonData, lessonMap)
			}
			// Rows.Close() -- 自動でクローズされる
		} else {
			Error("SQL構文エラー(bookmarkAPI)")
			errorMessage = append(errorMessage, "データの取得に失敗しました。")
		}

		jsonStruct := struct {
			Success      bool
			ErrorMessage []string
			Subject      string
			Lessons      []map[string]string
		}{
			Success:      success,
			ErrorMessage: errorMessage,
			Subject:      Subject,
			Lessons:      lessonData,
		}
		answer = jsonEncode(jsonStruct)
	case "onLesson":
		var pageData []map[string]string = []map[string]string{}

		var SQL SQLbuilder

		SQL.Add("SELECT subject_page, page_name")
		SQL.Add("FROM subjects_page")
		SQL.Add("WHERE subject = ? AND subject_lesson = ?;")
		SQL.AddParam(Subject)
		SQL.AddParam(Lesson)

		if Rows := SelectAll(&SQL); Rows != nil {
			success = true
			for Rows.Next() {
				var pageMap = map[string]string{}
				var page string
				var pageName string
				if err := Rows.Scan(&page, &pageName); err == nil {
					pageMap["page"] = page
					pageMap["pageName"] = pageName
				}
				pageData = append(pageData, pageMap)
			}
			// Rows.Close() -- 自動でクローズされる
		} else {
			Error("SQL構文エラー(bookmarkAPI)")
			errorMessage = append(errorMessage, "データの取得に失敗しました。")
		}

		jsonStruct := struct {
			Success      bool
			ErrorMessage []string
			Subject      string
			Lesson       string
			Pages        []map[string]string
		}{
			Success:      success,
			ErrorMessage: errorMessage,
			Subject:      Subject,
			Lesson:       Lesson,
			Pages:        pageData,
		}
		answer = jsonEncode(jsonStruct)

	}
	return answer
}
