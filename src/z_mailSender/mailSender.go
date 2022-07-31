package main

const (
	CR   = "\r"
	LF   = "\n"
	CRLF = "\r\n"
)

func main() {
	showMailSituation()
	m := mailStruct{
		from:     "register@koko-campus.org",
		username: "register@koko-campus.org",
		to:       "n.fu.n.fu.1415@icloud.com",
		subject:  "SUBJECT",
		message:  "MESSAGE",
	}
	MailSender(&m)
}
