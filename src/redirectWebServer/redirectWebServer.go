package main

import (
	"fmt"
	"net/http"
)

func controller(w http.ResponseWriter, r *http.Request) {
	Logout(w, r)
}

func main() {
	fmt.Println("")
	fmt.Println("***** redirectWebServer started... *****")
	fmt.Println("")
	http.HandleFunc("/", controller)
	if er := http.ListenAndServe("", nil); er != nil {
		Error("ListenAndServeに失敗")
		fmt.Println(er.Error())
	}
}
