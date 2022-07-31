package main

import (
	"crypto/rand"
	"fmt"
	"net/http"
	"os"
)

func CreateRandStr(length int) string {
	const letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"

	// 乱数を生成
	b := make([]byte, length)
	if _, err := rand.Read(b); err != nil {
		return ""
	}

	// letters からランダムに取り出して文字列を生成
	var result string
	for _, v := range b {
		result += string(letters[int(v)%len(letters)])
	}
	return result
}

func sendPreRegisterMail(mail string, token string) bool {
	ms := mailStruct{
		"register@koko-campus.org",
		"register@koko-campus.org",
		mail,
		"【koko-campus】仮登録メール",
		fmt.Sprintf("【koko-campus】に登録していただきありがとうございます。\r\n以下のURLをクリックして会員登録を完了させて下さい。\r\n%s\r\n\r\n※このURLの有効期限は10分です。", "https://"+os.Getenv("DOMAIN")+fmt.Sprintf("/R01?mail=%s&token=%s", mail, token)),
	}
	if er := MailSender(&ms); er != nil {
		return false
	}
	return true
}

func sendResetPwMail(mail string, token string) bool {
	ms := mailStruct{
		"register@koko-campus.org",
		"register@koko-campus.org",
		mail,
		"【koko-campus】パスワード再設定",
		fmt.Sprintf("【koko-campus】" + CRLF + "パスワードを再設定するには、以下のURLをクリックして下さい。" + CRLF + CRLF + "https://" + os.Getenv("DOMAIN") + fmt.Sprintf("/R12?mail=%s&token=%s", mail, token) + CRLF + CRLF + "※パスワード再設定の手続きをしていない場合は、このメールを無視してください。"),
	}
	if er := MailSender(&ms); er != nil {
		return false
	}
	return true
}

func registerAPI(r *http.Request) string {
	var answer string
	var success bool = false
	var errorMessage []string = []string{}

	cookie, _ := r.Cookie(cookieName) // cookieは絶対存在する確証があるため、例外処理は飛ばす

	switch r.PostFormValue("action") {
	case "pre":
		token := CreateRandStr(32)
		mail := r.PostFormValue("mail")

		// メールアドレスが既に登録されていないか確認
		var SQL SQLbuilder
		SQL.Add("SELECT mail FROM member WHERE mail = ?;")
		SQL.AddParam(mail)

		if !Exists(&SQL) {
			var SQL1 SQLbuilder
			SQL1.Add("SELECT mail FROM pre_member WHERE mail = ? AND NOW() - INTERVAL 1 MINUTE < updt;")
			SQL1.AddParam(mail)

			var SQL2 SQLbuilder
			SQL2.Add("CALL pre_register(?, ?);")
			SQL2.AddParam(mail)
			SQL2.AddParam(token)

			if checkMail(mail) && !Exists(&SQL1) && Execute(&SQL2) && sendPreRegisterMail(mail, token) {
				success = true
			} else {
				errorMessage = append(errorMessage, "処理の実行中に例外が発生しました。")
			}
		} else {
			errorMessage = append(errorMessage, fmt.Sprintf("メールアドレス【%s】は既に登録されています。", mail))
		}

	case "main":
		mail := r.PostFormValue("mail")
		pw := r.PostFormValue("pw")
		userId := r.PostFormValue("userId")
		name := r.PostFormValue("name")
		token := r.PostFormValue("token")

		var SQL0 SQLbuilder
		SQL0.Add("SELECT mail FROM pre_member")
		SQL0.Add("WHERE mail = ?")
		SQL0.Add("	AND token = ?")
		SQL0.Add("	AND CURRENT_TIMESTAMP + INTERVAL - 10 MINUTE < updt")
		SQL0.Add("	AND NOT EXISTS(")
		SQL0.Add("		SELECT user_id FROM member")
		SQL0.Add("		WHERE mail = ? OR user_id = ?")
		SQL0.Add("	)")
		SQL0.AddParam(mail)
		SQL0.AddParam(token)
		SQL0.AddParam(mail)
		SQL0.AddParam(userId)

		var SQL1 SQLbuilder
		SQL1.Add("CALL register(?, ?, ?, ?);")
		SQL1.AddParam(userId)
		SQL1.AddParam(mail)
		SQL1.AddParam(pw)
		SQL1.AddParam(name)

		if between(3, 10)(name) && checkId(userId) && checkPw(pw) && Exists(&SQL0) && Execute(&SQL1) {
			success = true

			var SQL SQLbuilder
			SQL.Add("UPDATE session_log")
			SQL.Add("SET user_id = ?")
			SQL.Add("WHERE cookie = ?;")
			SQL.AddParam(userId)
			SQL.AddParam(cookie.Value)
			Execute(&SQL)

		} else {
			errorMessage = append(errorMessage, "処理中に例外が発生しました。\nお手数をおかけしますが、時間をあけてもう一度登録をお願いします。")
		}

	case "checkUserId":
		userId := r.PostFormValue("userId")

		var SQL SQLbuilder
		SQL.Add("SELECT user_id FROM member")
		SQL.Add("WHERE user_id = ?;")
		SQL.AddParam(userId)

		if !Exists(&SQL) {
			success = true
		} else {
			success = false
		}

	case "login":
		var SQL SQLbuilder
		SQL.Add("SELECT user_id, pw FROM member")
		SQL.Add("WHERE mail = ? OR user_id = ?;")
		SQL.AddParam(r.PostFormValue("mail"))
		SQL.AddParam(r.PostFormValue("mail"))

		var userId string
		var pw string

		if er := Select(&SQL).Scan(&userId, &pw); er == nil {
			if pw == r.PostFormValue("pw") {
				success = true
				var SQL SQLbuilder
				SQL.Add("UPDATE session_log")
				SQL.Add("SET user_id = ?")
				SQL.Add("WHERE cookie = ?;")
				SQL.AddParam(userId)
				SQL.AddParam(cookie.Value)
				Execute(&SQL)
			} else {
				errorMessage = append(errorMessage, "パスワードが一致しません。")
			}
		} else {
			errorMessage = append(errorMessage, "入力したメールアドレス(ユーザID)は登録されていません。")
		}

	case "pre-reset":
		mail := r.PostFormValue("mail")

		var SQL SQLbuilder
		SQL.Add("SELECT user_id FROM member")
		SQL.Add("WHERE mail = ?;")
		SQL.AddParam(mail)

		if Exists(&SQL) {
			var SQL SQLbuilder
			SQL.Add("SELECT mail FROM member_reset_pw")
			SQL.Add("WHERE mail = ? AND NOW() - INTERVAL 1 MINUTE < updt;")
			SQL.AddParam(mail)

			if !Exists(&SQL) {
				token := CreateRandStr(32)

				var SQL SQLbuilder
				SQL.Add("CALL member_pre_reset_pw(?, ?);")
				SQL.AddParam(mail)
				SQL.AddParam(token)

				if Execute(&SQL) && sendResetPwMail(mail, token) {
					success = true
				} else {
					errorMessage = append(errorMessage, "処理中に例外が発生しました。")
				}
			} else {
				errorMessage = append(errorMessage, "メールの再送処理は最低、1分間隔をあける必要があります。")
			}
		} else {
			errorMessage = append(errorMessage, "入力したメールアドレスは登録されていません。")
		}

	case "reset":
		mail := r.PostFormValue("mail")
		pw := r.PostFormValue("pw")
		token := r.PostFormValue("token")

		var SQL SQLbuilder
		SQL.Add("SELECT mail FROM member_reset_pw")
		SQL.Add("WHERE mail = ?")
		SQL.Add("	AND token = ?")
		SQL.Add("	AND NOW() - INTERVAL 10 MINUTE < updt;")
		SQL.AddParam(mail)
		SQL.AddParam(token)

		if checkPw(pw) && Exists(&SQL) {
			success = true

			var SQL SQLbuilder
			SQL.Add("CALL member_reset_pw(?, ?);")
			SQL.AddParam(mail)
			SQL.AddParam(pw)
			Execute(&SQL)

			var userId string
			SQL.Reset()
			SQL.Add("SELECT user_id")
			SQL.Add("FROM member")
			SQL.Add("WHERE mail = ?;")
			SQL.AddParam(mail)
			Select(&SQL).Scan(&userId) // 例外処理はしない

			SQL.Reset()
			SQL.Add("UPDATE session_log")
			SQL.Add("SET user_id = ?")
			SQL.Add("WHERE cookie = ?;")
			SQL.AddParam(userId)
			SQL.AddParam(cookie.Value)
			Execute(&SQL)
		} else {
			errorMessage = append(errorMessage, "パスワード再設定処理中に例外が発生しました。\n時間をあけてからもう一度お試しください。")
		}

	}

	jsonStruct := struct {
		Success      bool
		ErrorMessage []string
	}{
		Success:      success,
		ErrorMessage: errorMessage,
	}
	answer = jsonEncode(jsonStruct)

	return answer
}
