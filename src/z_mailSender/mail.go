package main

import (
	"fmt"
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

func showMailSituation() {
	fmt.Println("SMTP_SERVER ---> " + os.Getenv("SMTP_SERVER"))
	fmt.Println("SMTP_PASSWORD ---> " + os.Getenv("SMTP_PASSWORD"))
}

func Error(er string) {
	fmt.Println("")
	fmt.Println("***** Error *****")
	fmt.Println(er)
	fmt.Println("***** ***** *****")
	fmt.Println("")
}

func MailSender(m *mailStruct) error {
	smtpSvr := os.Getenv("SMTP_SERVER") + ":" + os.Getenv("SMTP_PORT")
	auth := smtp.PlainAuth("", m.username, os.Getenv("SMTP_PASSWORD"), os.Getenv("SMTP_SERVER"))
	if err := smtp.SendMail(smtpSvr, auth, m.from, []string{m.to}, []byte(m.body())); err != nil {
		fmt.Println("ctrl -> failed to send mail")
		Error(err.Error())
		return err
	}
	fmt.Println("ctrl -> successed to send mail")
	return nil
}

