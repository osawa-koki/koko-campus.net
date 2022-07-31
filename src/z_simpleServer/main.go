package main

import (
	"fmt"
	"net/http"
)

func controller(w http.ResponseWriter, r *http.Request) {
	fmt.Fprint(w, "this is a test.")
}

func main() {
	http.HandleFunc("/", controller)
	if er := http.ListenAndServe("", nil); er != nil {
		fmt.Println("ListenAndServeに失敗")
		fmt.Println(er.Error())
	}
}
