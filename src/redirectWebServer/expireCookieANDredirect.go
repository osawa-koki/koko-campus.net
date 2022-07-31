package main

import (
	"net/http"
)

const (
	cookieName = "userIdentifier"
	domain     = "koko-campus.net"
)

func req2HTTPS(r *http.Request) string {
	return "https://" + domain + r.RequestURI
}

func Logout(w http.ResponseWriter, r *http.Request) {
	cookie := &http.Cookie{
		Name:     cookieName,
		Value:    "using SSL/TLS for your security!",
		Path:     "/",
		MaxAge:   -99999999,
		Secure:   false,
		HttpOnly: true,
	}
	http.SetCookie(w, cookie)
	http.Redirect(w, r, req2HTTPS(r), http.StatusFound)
}
