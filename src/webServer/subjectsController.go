package main

func SubjectsController(subjMap *map[string]string, RR *RequestResponse) *string {
	html := SubjectsModel(subjMap, RR)
	return html
}
