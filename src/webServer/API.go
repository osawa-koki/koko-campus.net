package main

func API(RR *RequestResponse) string {
	var answer string
	r := RR.request
	if cookie, err := r.Cookie(cookieName); err == nil && SessionValidationCheck(cookie.Value) {
		switch r.PostFormValue("program") {
		case "register":
			answer = registerAPI(r)
		case "mypage":
			if RR.Login {
				answer = mypageAPI(RR)
			} else {
				answer = "{Success: false}"
			}
		case "subjects":
			answer = subjectsAPI(r)
		}
	}
	return answer
}
