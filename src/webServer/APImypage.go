package main

import (
	"io"
	"os"
)

type scheduleStruct struct {
	ScheduleId  string
	Title       string
	Importance  string
	Due         string
	Description string
	Progress    int
	Status      string
	Rgdt        string
	Updt        string
}

func mypageAPI(RR *RequestResponse) string {
	var answer string
	var success bool = false
	var errorMessage []string = []string{}

	r := RR.request
	userId := RR.userID

	switch r.PostFormValue("action") {
	case "changeIcon":
		const iconFileSizeLimit = 50 << 10
		r.ParseMultipartForm(iconFileSizeLimit)
		fhd := r.MultipartForm.File["icon"][0]
		if fhd.Size <= iconFileSizeLimit {
			if src, er := fhd.Open(); er == nil {
				defer src.Close()
				if dst, er := os.Create(getRootDIR() + "/img/M00/" + userId + ".png"); er == nil {
					defer dst.Close()
					io.Copy(dst, src)
					success = true
				}
			}
			if !success {
				errorMessage = append(errorMessage, "アイコン画像の登録に失敗しました。")
			}
		} else {
			errorMessage = append(errorMessage, "ファイルサイズが10KBを超えています。")
		}

		jsonStruct := struct {
			Success      bool
			ErrorMessage []string
		}{
			Success:      success,
			ErrorMessage: errorMessage,
		}
		answer = jsonEncode(jsonStruct)

	case "getSchedule":
		var enterCheck bool = true
		_sort := r.PostFormValue("sort")
		var sort string
		switch _sort {
		case "ByDue":
			sort = "due"
		case "ByImportance":
			sort = "importance"
		default:
			enterCheck = false
		}

		_order := r.PostFormValue("order")
		var order string
		switch _order {
		case "ascending":
			order = "asc"
		case "descending":
			order = "desc"
		default:
			enterCheck = false
		}
		start := r.PostFormValue("start")
		end := r.PostFormValue("end")
		limit := CInt(end) - CInt(start)
		var schedules []scheduleStruct = []scheduleStruct{}

		if enterCheck && IsNumber(start) && IsNumber(end) {
			var SQL SQLbuilder
			SQL.Add("SELECT schedule_id, title, importance, due, description, progress, status, rgdt, updt")
			SQL.Add("FROM schedule")
			SQL.Add("WHERE user_id = ?")
			SQL.Add("ORDER BY " + sort + " " + order)
			SQL.Add("LIMIT " + CStr(limit))
			SQL.Add("OFFSET " + start + ";")
			SQL.AddParam(userId)
			if Rows := SelectAll(&SQL); Rows != nil {
				success = true
				for Rows.Next() {
					var schedule scheduleStruct
					if err := Rows.Scan(&schedule.ScheduleId, &schedule.Title, &schedule.Importance, &schedule.Due, &schedule.Description, &schedule.Progress, &schedule.Status, &schedule.Rgdt, &schedule.Updt); err == nil {
						schedules = append(schedules, schedule)
						success = true
					} else {
						success = false
						Error(err.Error())
					}
				}
				if !success {
					errorMessage = append(errorMessage, "データの取得に失敗しました。")
				}
			}
		} else {
			errorMessage = append(errorMessage, "入力内容に誤りがあります。")
		}

		jsonStruct := struct {
			Success      bool
			ErrorMessage []string
			Schedule     []scheduleStruct
		}{
			Success:      success,
			ErrorMessage: errorMessage,
			Schedule:     schedules,
		}
		answer = jsonEncode(jsonStruct)
	case "bookmark":
		answer = bookmarkAPI(RR)

	}

	return answer
}
