package main

func SubjectsController(subjMap *map[string]string) *string {
	html := SubjectsModel(subjMap)
	return html
}
