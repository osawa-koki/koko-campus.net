package main

import (
	"crypto/rand"
	"fmt"
	"net/http"
	"regexp"
	"strings"
	"time"
)

const (
	cookieName                 = "userIdentifier"
	session_expiring_hour_updt = 5
	session_expiring_hour_rgdt = 24
	session_string_length      = 32
)

/*
セッションが不正だった場合に、cookieを新たにセットしてリダイレクトさせます。
【引数】R&R構造体
*/
func setCookieANDredirect(RR *RequestResponse) {
	cookieValue := CreateCookieValue()
	cookie := &http.Cookie{
		Name:     cookieName,
		Value:    cookieValue,
		Path:     "/",
		Secure:   true, // 一時的な対応
		HttpOnly: true,
	}
	if SessionAdd(cookieValue, RR.request) {
		http.SetCookie(*RR.response, cookie)
		http.Redirect(*RR.response, RR.request, fmt.Sprint(RR.request.URL), http.StatusFound)
	} else {
		Error("cookieの追加に失敗しました。")
		(*RR.response).WriteHeader(http.StatusInternalServerError)
	}
}

/*
cookie用のランダムな文字列を生成します。
【引数】なし
【戻り値】100桁のランダムな文字列
*/
func CreateCookieValue() string {
	const letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"

	// 乱数を生成
	b := make([]byte, session_string_length)
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

/*
User-Agentから使用しているブラウザを取得
【引数】user-Agentの値
【戻り値】ブラウザ名
*/
func GetUserAgentName(userAgent string) string {
	userAgent = strings.ToLower(userAgent)
	if r := regexp.MustCompile(`msie|trident`); r.MatchString(userAgent) {
		return "IE"
	}
	if r := regexp.MustCompile(`edg`); r.MatchString(userAgent) {
		return "edge"
	}
	if r := regexp.MustCompile(`chrome`); r.MatchString(userAgent) {
		return "chrome"
	}
	if r := regexp.MustCompile(`safari`); r.MatchString(userAgent) {
		return "safari"
	}
	if r := regexp.MustCompile(`firefox`); r.MatchString(userAgent) {
		return "firefox"
	}
	if r := regexp.MustCompile(`opera`); r.MatchString(userAgent) {
		return "opera"
	}
	return "unknown"
}

/*
cookieをセッション管理テーブルに追加します。
【引数】cookieの値
【戻り値】なし
*/
func SessionAdd(cookie string, r *http.Request) bool {
	const (
		cookieLimit             = 100
		userAgentLimit          = 30
		xForwardedForLimit      = 20
		refererLimit            = 50
		sec_ch_ua_platformLimit = 30
	)
	var (
		userAgent          = GetUserAgentName(r.Header.Get("User-Agent"))
		xForwardedFor      = r.Header.Get("X-Forwarded-For")
		referer            = r.Header.Get("Referer")
		sec_ch_ua_platform = r.Header.Get("sec-ch-ua-platform")
	)
	if byteCheck(cookie, cookieLimit) {
		var SQL SQLbuilder
		SQL.Add("INSERT INTO session_log(cookie, user_agent, x_forwarded_for, referer, sec_ch_ua_platform) VALUES(?,?,?,?,?);") // 重複の可能性は考慮していない
		SQL.AddParam(cookie)
		SQL.AddParam(cutOffstring(userAgent, userAgentLimit))
		SQL.AddParam(cutOffstring(xForwardedFor, xForwardedForLimit))
		SQL.AddParam(cutOffstring(referer, refererLimit))
		SQL.AddParam(cutOffstring(sec_ch_ua_platform, sec_ch_ua_platformLimit))
		if Execute(&SQL) {
			return true
		}
	}
	return false
}

/*
指定したcookieが有効か否か判定します。
【引数】cookieの値
【戻り値】有効の場合->true | 無効の場合->false
*/
func SessionValidationCheck(cookie string) bool {
	validationLimit_rgdt := time.Now().Add(-time.Hour * session_expiring_hour_rgdt)
	validationLimit_updt := time.Now().Add(-time.Hour * session_expiring_hour_updt)
	var SQL SQLbuilder
	SQL.Add("SELECT cookie FROM session_log WHERE cookie = ? AND ? < rgdt AND ? < updt;")
	SQL.AddParam(cookie)
	SQL.AddParam(validationLimit_rgdt.Format("2006-01-02 15:04:05"))
	SQL.AddParam(validationLimit_updt.Format("2006-01-02 15:04:05"))
	return Exists(&SQL)
}

/*
セッションの更新日を更新します。
【引数】cookieの値
【戻り値】なし
*/
func SessionValidationUpdate(cookie string) {
	now := GetDateTime()
	var SQL SQLbuilder
	SQL.Add("UPDATE session_log SET updt = ? WHERE cookie = ?;")
	SQL.AddParam(now)
	SQL.AddParam(cookie)
	Execute(&SQL)
}
