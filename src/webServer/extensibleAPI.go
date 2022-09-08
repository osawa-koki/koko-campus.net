package main

func extensibleAPI(RR *RequestResponse) string {
	var answer string

	switch RR.request.PostFormValue("devolutionTo") {
	case "pyAPI":
		answer = pyAPI(RR)

	}

	return answer
}
