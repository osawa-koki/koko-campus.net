package main

import (
	"bytes"
	"io/ioutil"
	"net/http"
)

func postRequest(url string, data []byte) string {
	req, err := http.NewRequest("POST", url, bytes.NewBuffer(data))
	if err != nil {
		panic("Error")
	}

	client := new(http.Client)
	resp, err := client.Do(req)
	if err != nil {
		panic("Error")
	}
	defer resp.Body.Close()

	byteArray, err := ioutil.ReadAll(resp.Body)
	if err != nil {
		panic("Error")
	}

	return string(byteArray)
}
