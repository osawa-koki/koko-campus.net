package main

import "net/http"

/*
htmlレンダリング用の構造体を生成。
【引数】なし
【戻り値】モデル構造体
*/
func RegisterModel(digit string, r *http.Request) *string {
	var answer *string
	var mail = r.FormValue("mail")
	var token = r.FormValue("token")
	switch digit {
	case "00":
		answer = RegisterView(&map[string]string{}, digit)
	case "01":
		var registerMap map[string]string
		var SQL SQLbuilder
		SQL.Add("SELECT mail FROM pre_member")
		SQL.Add("WHERE mail = ?")
		SQL.Add("	AND token = ?")
		SQL.Add("	AND CURRENT_TIMESTAMP + INTERVAL - 10 MINUTE < updt")
		SQL.Add("	AND NOT EXISTS(")
		SQL.Add("		SELECT user_id FROM member")
		SQL.Add("		WHERE mail = ?")
		SQL.Add("	);")
		SQL.AddParam(mail)
		SQL.AddParam(token)
		SQL.AddParam(mail)
		if Exists(&SQL) {
			var SQL SQLbuilder
			SQL.Add("UPDATE pre_member")
			SQL.Add("SET updt = CURRENT_TIMESTAMP")
			SQL.Add("WHERE mail = ?;")
			SQL.AddParam(mail)
			Execute(&SQL)
			registerMap = map[string]string{
				"Mail": mail,
				"Token": token,
				"R01_Success": "true",
			}
		} else {
			registerMap = map[string]string{
				"ErrorMessage": "トークンが無効か、トークンの有効期限が切れています。もう一度仮会員登録をして下さい。",
				"R01_Success": "false",
			}
			digit = "00"
		}
		answer = RegisterView(&registerMap, digit)
	/* <<<<< DEPRICATED >>>>>
	case "02": // 既にログイン済み
		answer = RegisterView(&map[string]string{}, digit)
	*/
	case "03": // ログインが必要
		answer = RegisterView(&map[string]string{}, digit)
	case "10":
		answer = RegisterView(&map[string]string{}, digit)
	case "11":
		answer = RegisterView(&map[string]string{}, digit)
	case "12":
		var registerMap map[string]string
		var SQL SQLbuilder
		SQL.Add("SELECT mail FROM member_reset_pw")
		SQL.Add("WHERE mail = ?")
		SQL.Add("	AND token = ?")
		SQL.Add("	AND CURRENT_TIMESTAMP + INTERVAL - 10 MINUTE < updt;")
		SQL.AddParam(mail)
		SQL.AddParam(token)
		if Exists(&SQL) {
			var SQL SQLbuilder
			SQL.Add("UPDATE member_reset_pw")
			SQL.Add("SET updt = CURRENT_TIMESTAMP")
			SQL.Add("WHERE mail = ?;")
			SQL.AddParam(mail)
			Execute(&SQL)
			registerMap = map[string]string{
				"Mail": mail,
				"Token": token,
				"R12_Success": "true",
			}
		} else {
			registerMap = map[string]string{
				"ErrorMessage": "トークンが無効か、トークンの有効期限が切れています。もう一度パスワード再設定処理を行って下さい。",
				"R12_Success": "false",
			}
			digit = "11"
		}
		answer = RegisterView(&registerMap, digit)
	default:
		answer = RegisterView(&map[string]string{}, "00")
	}
	return answer
}
