package main

func MypageModel(digit string, userId string) *string {
	var answer *string

	var userName string
	var comment string

	var SQL SQLbuilder
	SQL.Add("SELECT name, comment FROM member")
	SQL.Add("WHERE user_id = ?;")
	SQL.AddParam(userId)
	Select(&SQL).Scan(&userName, &comment) // 例外処理はしない

	switch digit {
	case "00":
		ItmplStruct := struct {
			UserId   string
			UserName string
			Comment  string
			Contents []map[string]string
		}{
			UserId:   userId,
			UserName: userName,
			Comment:  comment,
			Contents: []map[string]string{
				{
					"URL":      "/M01",
					"Title":    "会員情報変更",
					"Contents": "パスワード・ニックネーム・メールアドレスを変更します。",
				},
				{
					"URL":      "/M10",
					"Title":    "お気に入り科目の変更",
					"Contents": "お気に入り科目を追加・変更・削除します。",
				},
			},
		}
		answer = MypageView(&ItmplStruct, digit)

	case "10":
		var SQL SQLbuilder

		// 教科一覧の取得
		var subjectsDataMap []map[string]string = []map[string]string{}
		SQL.Add("SELECT subject, subject_name FROM subjects;")
		if Rows := SelectAll(&SQL); Rows != nil {
			for Rows.Next() {
				var subj string
				var subjName string
				if err := Rows.Scan(&subj, &subjName); err == nil {
					subjectsDataMap = append(subjectsDataMap, map[string]string{
						"Subject":     subj,
						"SubjectName": subjName,
					})
				}
			}
			// Rows.Close() -- 自動でクローズされる
		} else {
			Error("SQL構文エラー(mypageModel)")
		}

		// 登録済みのお気に入り科目の取得
		var bookmarked []map[string]string = []map[string]string{}
		SQL.Add("SELECT b.subject, IFNULL(b.lesson, '') AS lesson, IFNULL(b.page, '') AS page,")
		SQL.Add("(SELECT subject_name FROM subjects WHERE subject = b.subject) AS subject_name,")
		SQL.Add("IFNULL((SELECT lesson_name FROM subjects_lesson WHERE subject = b.subject AND subject_lesson = b.lesson), '') AS lesson_name,")
		SQL.Add("IFNULL((SELECT page_name FROM subjects_page WHERE subject = b.subject AND subject_lesson = b.lesson AND subject_page = b.page), '') AS page_name")
		SQL.Add("FROM bookmark b")
		SQL.Add("WHERE user_id = ?;")
		SQL.AddParam(userId)
		if Rows := SelectAll(&SQL); Rows != nil {
			for Rows.Next() {
				var subject string
				var lesson string
				var page string
				var subjectName string
				var lessonName string
				var pageName string
				if err := Rows.Scan(&subject, &lesson, &page, &subjectName, &lessonName, &pageName); err == nil {
					bookmarked = append(bookmarked, map[string]string{
						"Subject":     subject,
						"Lesson":      lesson,
						"Page":        page,
						"SubjectName": subjectName,
						"LessonName":  lessonName,
						"PageName":    pageName,
					})
				}
			}
			// Rows.Close() -- 自動でクローズされる
		} else {
			Error("SQL構文エラー(mypageModel)")
		}

		ItmplStruct := struct {
			UserName     string
			Comment      string
			SubjectsData []map[string]string
			Bookmark     []map[string]string
		}{
			UserName:     userName,
			Comment:      comment,
			SubjectsData: subjectsDataMap,
			Bookmark:     bookmarked,
		}
		answer = MypageView(&ItmplStruct, digit)

	default:

	}

	return answer
}
