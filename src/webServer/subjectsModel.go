package main

import (
	"fmt"
	"strconv"
)

type SubjectsModelStruct struct {
	URLcheck      bool
	Name          string
	Lesson        string
	Page          string
	PrevPage      string
	NextPage      string
	IsShiken      bool
	ShikenType    bool
	ShikenDateFst string
	ShikenDateSnd string
	ErrorMessage  []string
	ErrorType     int
	AltSuggestion map[string]string // URLマッチに失敗した場合の代替URLの提示に使用
	PathS         string
	PathL         string
	PathP         string
}

func (p *SubjectsModelStruct) putError(message string) {
	p.ErrorMessage = append(p.ErrorMessage, message)
}

/*
htmlレンダリング用の構造体を生成。
【引数】なし
【戻り値】モデル構造体
*/
func SubjectsModel(subjMap *map[string]string) *string {
	model := SubjectsModelStruct{
		URLcheck:      false,
		Name:          "**********",
		Lesson:        "**********",
		Page:          "**********",
		PrevPage:      "",
		NextPage:      "",
		IsShiken:      false,
		ShikenType:    false,
		ShikenDateFst: "",
		ShikenDateSnd: "",
		ErrorMessage:  []string{},
		ErrorType:     0,
		AltSuggestion: map[string]string{},
		PathS:         (*subjMap)["Subject"],
		PathL:         (*subjMap)["Lesson"],
		PathP:         (*subjMap)["Page"],
	}

	var name string

	// 指定した教科が存在しているかチェック
	var SQL SQLbuilder
	SQL.Add("SELECT subject_name FROM subjects WHERE subject = ?;")
	SQL.AddParam((*subjMap)["Subject"])
	if er := Select(&SQL).Scan(&name); er == nil {
		model.Name = name

		SQL.Add("SELECT shiken_type, DATE_FORMAT(fst, '%Y年%m月%d日') AS fst, DATE_FORMAT(snd, '%Y年%m月%d日') AS snd")
		SQL.Add("FROM subjects_shiken")
		SQL.Add("WHERE subject = ?;")
		SQL.AddParam((*subjMap)["Subject"])
		var shiken_type string
		var shiken_dtFst string
		var shiken_dtSnd string
		if er := Select(&SQL).Scan(shiken_type, shiken_dtFst, shiken_dtSnd); er == nil {
			// 試験タイプ教科
			model.IsShiken = true
			if shiken_type == "1" {
				model.ShikenDateFst = iif(shiken_dtFst != "", shiken_dtFst, "未定")
				model.ShikenDateSnd = iif(shiken_dtSnd != "", shiken_dtSnd, "未定")
			}
		}

		var lesson string // 簡単のため、パスの値を直接使用せずにデータベースから取得する
		var lessonName string

		var SQL SQLbuilder
		SQL.Add("SELECT subject_lesson, lesson_name")
		SQL.Add("FROM subjects_lesson")
		SQL.Add("WHERE subject = ? AND subject_lesson = ?;")
		SQL.AddParam((*subjMap)["Subject"])
		SQL.AddParam((*subjMap)["Lesson"])
		if er := Select(&SQL).Scan(&lesson, &lessonName); er == nil {
			model.Lesson = lessonName

			var page string
			var pageName string

			var SQL SQLbuilder
			SQL.Add("SELECT subject_page, page_name")
			SQL.Add("FROM subjects_page")
			SQL.Add("WHERE subject = ? AND subject_lesson = ? AND subject_page = ?;")
			SQL.AddParam((*subjMap)["Subject"])
			SQL.AddParam((*subjMap)["Lesson"])
			SQL.AddParam((*subjMap)["Page"])
			if er := Select(&SQL).Scan(&page, &pageName); er == nil {
				model.URLcheck = true
				model.Page = pageName

				// MaxPageの取得
				var maxPage int

				var SQL SQLbuilder
				SQL.Add("SELECT MAX(subject_page)")
				SQL.Add("FROM subjects_page")
				SQL.Add("WHERE subject = ? AND subject_lesson = ?;")
				SQL.AddParam((*subjMap)["Subject"])
				SQL.AddParam((*subjMap)["Lesson"])
				Select(&SQL).Scan(&maxPage)
				PageNum, _ := strconv.Atoi((*subjMap)["Page"])
				model.PrevPage, model.NextPage = calcPageNum(PageNum, maxPage)

				(*subjMap)["Page"] = pageName // ページの管理容易性のため、ページは数字ではなくタイトルで管理する
			} else {
				model.putError("ページを選択してください。")
				model.ErrorType = 2
				var SQL SQLbuilder
				SQL.Add("SELECT subject_page, page_name")
				SQL.Add("FROM subjects_page")
				SQL.Add("WHERE subject = ? AND subject_lesson = ? ORDER BY subject_page ASC;")
				SQL.AddParam((*subjMap)["Subject"])
				SQL.AddParam((*subjMap)["Lesson"])
				if Rows := SelectAll(&SQL); Rows != nil {
					for Rows.Next() {
						var page string
						var pageName string
						if err := Rows.Scan(&page, &pageName); err == nil {
							model.AltSuggestion[fmt.Sprintf("/S%sL%sP%s", (*subjMap)["Subject"], lesson, page)] = pageName
						} else {
							Error(er.Error())
						}
					}
				}
			}
		} else {
			model.putError("レッスンを選択してください。")
			model.ErrorType = 2
			var SQL SQLbuilder
			SQL.Add("SELECT subject_lesson, lesson_name")
			SQL.Add("FROM subjects_lesson")
			SQL.Add("WHERE subject = ? AND status = '1' ORDER BY subject_lesson ASC;")
			SQL.AddParam((*subjMap)["Subject"])
			if Rows := SelectAll(&SQL); Rows != nil {
				for Rows.Next() {
					var lesson string
					var lessonName string
					if err := Rows.Scan(&lesson, &lessonName); err == nil {
						model.AltSuggestion[fmt.Sprintf("/S%sL%s", (*subjMap)["Subject"], lesson)] = lessonName
					} else {
						Error(er.Error())
					}
				}
			}
		}
	} else {
		model.putError("教科を選択して下さい。")
		model.ErrorType = 1
		var SQL SQLbuilder
		SQL.Add("SELECT subject, subject_name")
		SQL.Add("FROM subjects")
		SQL.Add("WHERE status = '1'")
		SQL.Add("ORDER BY RAND()")
		SQL.Add("LIMIT 30;")
		if Rows := SelectAll(&SQL); Rows != nil {
			for Rows.Next() {
				var subj string
				var subjName string
				if err := Rows.Scan(&subj, &subjName); err == nil {
					model.AltSuggestion[fmt.Sprintf("/S%s", subj)] = fmt.Sprintf("/?S/%s.png", subj)
				}
			}
			// Rows.Close() -- 自動でクローズされる
		} else {
			Error("SQL構文エラー(subjectsModel)")
		}
	}

	return SubjectsView(&model, subjMap)
}
