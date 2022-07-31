package main

func MypageController(RR *RequestResponse, digit string) *string {
	html := MypageModel(digit, (*RR).userID)
	return html
}
