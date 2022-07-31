package main

import (
	"net/smtp"
	"os"
)

type mailStruct struct {
	from     string
	username string
	to       string
	subject  string
	message  string
}

func (m mailStruct) body() string {
	return "To: " + m.to + CRLF + "Subject: " + m.subject + CRLF + CRLF + m.message + CRLF
}

func MailSender(m *mailStruct) error {
	smtpSvr := os.Getenv("SMTP_SERVER") + ":" + os.Getenv("SMTP_PORT")
	auth := smtp.PlainAuth("", m.username, os.Getenv("SMTP_PASSWORD"), os.Getenv("SMTP_SERVER"))
	if err := smtp.SendMail(smtpSvr, auth, m.from, []string{m.to}, []byte(m.body())); err != nil {
		registerMailHistory(m, false)
		Error(err.Error())
		return err
	}
	registerMailHistory(m, true)
	return nil
}

func registerMailHistory(m *mailStruct, success bool) {
	var SQL SQLbuilder
	SQL.Add("INSERT INTO mail_history(mail, title, body, status)")
	SQL.Add("VALUES(?, ?, ?, ?);")
	SQL.AddParam(m.to)
	SQL.AddParam(m.subject)
	SQL.AddParam(m.message)
	SQL.AddParam(iif(success, "1", "0"))
	Execute(&SQL)
}
