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

	default:

	}

	return answer
}
