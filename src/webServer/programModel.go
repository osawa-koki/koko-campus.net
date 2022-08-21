package main

type programStruct struct {
	Program     string
	Title       string
	Description string
	Suggestion  []map[string]string
}

func programModel(digit string) *string {
	const toppageForProgramDigit = "0000"
	var programMap programStruct = programStruct{
		Program:     digit,
		Title:       "プログラム一覧",
		Description: "JavaScriptで書かれたブラウザ上で簡単に動作するプログラム一覧です。",
		Suggestion:  []map[string]string{},
	}
	var answer *string

	var name string
	var description string

	var SQL SQLbuilder
	SQL.Add("SELECT program_name, description")
	SQL.Add("FROM programs")
	SQL.Add("WHERE program = ?;")
	SQL.AddParam(digit)
	if err := Select(&SQL).Scan(&name, &description); digit != toppageForProgramDigit && err == nil {
		programMap.Title = name
		programMap.Description = description
		answer = programView(&programMap, digit)
	} else {
		programMap.Program = toppageForProgramDigit
		var SQL SQLbuilder
		SQL.Add("SELECT program, program_name, description")
		SQL.Add("FROM programs")
		SQL.Add("ORDER BY RAND()")
		SQL.Add("LIMIT 30;")
		if Rows := SelectAll(&SQL); Rows != nil {
			for Rows.Next() {
				var program string
				var name string
				var description string
				if err := Rows.Scan(&program, &name, &description); err == nil {
					var progMap map[string]string = map[string]string{}
					progMap["Program"] = program
					progMap["Name"] = name
					progMap["Description"] = description
					programMap.Suggestion = append(programMap.Suggestion, progMap)
				}
			}
		}
		answer = programView(&programMap, toppageForProgramDigit)
	}

	return answer
}

func getProgramName(digit string) string {
	var name string
	var SQL SQLbuilder
	SQL.Add("SELECT program_name FROM programs")
	SQL.Add("WHERE program = ?;")
	SQL.AddParam(digit)
	if er := Select(&SQL).Scan(&name); digit == "0000" || er != nil {
		return ""
	}
	return name
}
