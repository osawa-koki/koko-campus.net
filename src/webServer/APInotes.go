package main

func notesAPI(RR *RequestResponse) string {
	var answer string
	var success bool = false
	var errorMessage []string = []string{}
	var content string
	r := RR.request

	UserID := RR.userID
	Subject := r.PostFormValue("subject")
	Lesson := r.PostFormValue("lesson")
	Page := r.PostFormValue("page")

	switch r.PostFormValue("method") {
	case "get":
		// レコードがあったら内容返す。なかったら何もから文字。
		var SQL SQLbuilder
		SQL.Add("SELECT content")
		SQL.Add("FROM notes")
		SQL.Add("WHERE user_id = ? AND subject = ? AND subject_lesson = ? AND subject_page = ?;")
		SQL.AddParam(UserID)
		SQL.AddParam(Subject)
		SQL.AddParam(Lesson)
		SQL.AddParam(Page)

		Select(&SQL).Scan(&content)
		success = true

		jsonStruct := struct {
			Success      bool
			ErrorMessage []string
			Content      string
		}{
			Success:      success,
			ErrorMessage: errorMessage,
			Content:      content,
		}
		answer = jsonEncode(jsonStruct)

	case "update":
		// レコードがあったら文字通りアップデート。なかったら作って、文字入れる。
		Content := r.PostFormValue("content")
		if byteCheck(Content, 1000) {
			var SQL SQLbuilder
			SQL.Add("CALL update_notes(?, ?, ?, ?, ?);")
			SQL.AddParam(UserID)
			SQL.AddParam(Subject)
			SQL.AddParam(Lesson)
			SQL.AddParam(Page)
			SQL.AddParam(Content)
			if Execute(&SQL) {
				success = true
			} else {
				errorMessage = append(errorMessage, "SQLの実行に失敗しました🥺")
			}
		} else {
			errorMessage = append(errorMessage, "500文字以下で入力してください。")
		}
		jsonStruct := struct {
			Success      bool
			ErrorMessage []string
		}{
			Success:      success,
			ErrorMessage: errorMessage,
		}
		answer = jsonEncode(jsonStruct)
	}
	return answer
}
