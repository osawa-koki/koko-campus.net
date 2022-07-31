package main

import (
	"regexp"
	"unicode/utf8"
)

func checkRegex(r string) func(a string) bool {
	return func(str string) bool {
		preg := regexp.MustCompile(r)
		return preg.MatchString(str)
	}
}

var checkMailPrx func(a string) bool = checkRegex(`^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$`)
var checkMail func(a string) bool = func(a string) bool {
	return checkMailPrx(a) && len(a) <= 50
}

var checkId func(a string) bool = checkRegex(`^[0-9a-zA-Z]{8,16}$`)
var checkPw func(a string) bool = checkRegex(`^[0-9a-zA-Z]{8,16}$`)

func between(a int, b int) func(c string) bool {
	return func(c string) bool {
		return a <= utf8.RuneCountInString(c) && utf8.RuneCountInString(c) <= b
	}
}

var IsNumber func(a string) bool = checkRegex(`^[0-9]+$`)
var IsAlphameric func(a string) bool = checkRegex(`^[a-zA-Z]+$`)
var IsHan func(a string) bool = checkRegex(`^[0-9a-zA-Z]+$`)
var IsEnJa func (a string) bool = checkRegex(`^[0-9a-zA-Zぁ-んーァ-ヶー一-龠]+$`)
var AorBorC func (a string) bool = checkRegex(`^A|B|C$`)


