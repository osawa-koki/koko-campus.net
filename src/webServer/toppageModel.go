package main

type ToppageModelStruct struct {
	Subjects            []map[string][]map[string]string
	Program             []string
	News                []string
	Recommendation      []string
	QuestionaireId      string
	QuestionaireOptions []string
}

/*
htmlレンダリング用の構造体を生成、view関数に渡して生成されたhtmlをControllerへ返却します。
【引数】なし
【戻り値】html文字列
*/
func ToppageModel() *string {
	// 準固定ページであるため、例外処理は省略
	model := ToppageModelStruct{
		[]map[string][]map[string]string{},
		[]string{},
		[]string{},
		[]string{},
		"",
		[]string{},
	}

	model.Subjects = (func() []map[string][]map[string]string {
		var answer []map[string][]map[string]string

		var SQL SQLbuilder
		SQL.Add("SELECT category, category_name FROM category WHERE status = '1' ORDER BY importance asc;")
		if Rows := SelectAll(&SQL); Rows != nil {
			for Rows.Next() {
				var category string
				var categoryName string
				Rows.Scan(&category, &categoryName)

				var subjectsSlice []map[string]string
				var SQL SQLbuilder
				SQL.Add("SELECT sc.subject, s.subject_name FROM subjects_category sc")
				SQL.Add("INNER JOIN subjects s ON sc.subject = s.subject")
				SQL.Add("	AND s.status = '1' AND sc.status = '1' AND sc.category = ?")
				SQL.Add("ORDER BY sc.importance ASC, s.subject ASC;")
				SQL.AddParam(category)
				if Rows := SelectAll(&SQL); Rows != nil {
					for Rows.Next() {
						var subject string
						var subjectName string
						Rows.Scan(&subject, &subjectName)
						var subjectMap = map[string]string{
							"code": subject,
							"name": subjectName,
						}
						subjectsSlice = append(subjectsSlice, subjectMap)
					}
				}
				answer = append(answer, map[string][]map[string]string{categoryName: subjectsSlice})
			}
		}
		return answer
	})()

	answer := ToppageView(&model)
	return answer
}
