package main

/*
セッションが必要なページ
(パスの2文字目が「?」ではない場合)
*/
func sessionController(RR *RequestResponse) {
	// cookieの設定
	if cookie, err := RR.request.Cookie(cookieName); err == nil && SessionValidationCheck(cookie.Value) { // cookieが有効であれば、処理を続行(存在 + 有効)
		// セッション有効期限のアップデート
		SessionValidationUpdate(cookie.Value)

		// cookieからuser_idを取得
		var SQL SQLbuilder
		var userID string
		SQL.Add("SELECT user_id FROM session_log")
		SQL.Add("WHERE cookie = ?")
		SQL.Add("	AND CURRENT_TIMESTAMP - INTERVAL 3 HOUR < updt")
		SQL.Add("	AND CURRENT_TIMESTAMP - INTERVAL 12 HOUR < rgdt;")
		SQL.AddParam(cookie.Value)
		if er := Select(&SQL).Scan(&userID); er == nil {
			RR.Login = true
			RR.userID = userID
		}

		loginController(RR)
	} else {
		setCookieANDredirect(RR)
	}
}
