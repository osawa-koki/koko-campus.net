package main

import (
	"fmt"
	"io"
	"net/http"
)

func controller(w http.ResponseWriter, r *http.Request) {
	var answer string

	bodyByte, _ := io.ReadAll(r.Body)
	body := string(bodyByte)

	w.Header().Set("Content-Type", "text/plain")

	answer += "path -> " + r.URL.Path + "\n"
	answer += "query -> " + r.URL.RawQuery + "\n"
	answer += "body -> " + body + "\n"
	fmt.Fprint(w, answer)
}

func main() {
	http.HandleFunc("/", controller)
	if er := http.ListenAndServe(":8888", nil); er != nil {
		fmt.Println("ListenAndServeに失敗")
		fmt.Println(er.Error())
	}
}
