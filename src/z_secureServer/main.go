package main

import (
	"fmt"
	"net/http"
)

func Handler(w http.ResponseWriter, r *http.Request) {
	w.WriteHeader(http.StatusOK)
	fmt.Fprint(w, "hello SSL/TLS")
}

func main() {
	http.HandleFunc("/", Handler)
	err := http.ListenAndServeTLS("", "debug.crt", "debug.key", nil)
	if err != nil {
		fmt.Printf("ERROR : %s", err)
	}
}
