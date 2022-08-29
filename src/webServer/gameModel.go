package main

type gameStruct struct {
	Game        string
	Title       string
	PlayStyle   string
	Description string
	Suggestion  []map[string]string
	Iter        [programIterCount][]int
}

func gameModel(digit string, style string, DB_style string) *string {
	const toppageForGameDigit = "0000"
	var gameMap gameStruct = gameStruct{
		Game:        digit,
		Title:       "ゲーム一覧",
		PlayStyle:   DB_style,
		Description: "JavaScriptで動作する簡単なゲームです。",
		Suggestion:  []map[string]string{},
	}
	var answer *string

	var name string
	var description string

	var SQL SQLbuilder
	SQL.Add("SELECT game_name, description")
	SQL.Add("FROM games")
	SQL.Add("WHERE game = ?;")
	SQL.AddParam(digit)
	if err := Select(&SQL).Scan(&name, &description); digit != toppageForGameDigit && err == nil {
		gameMap.Title = name
		gameMap.Description = description
		answer = gameView(&gameMap, digit, style)
	} else {
		gameMap.Game = toppageForGameDigit
		var SQL SQLbuilder
		SQL.Add("SELECT game, game_name, play_style, description")
		SQL.Add("FROM games")
		SQL.Add("ORDER BY RAND()")
		SQL.Add("LIMIT 30;")
		if Rows := SelectAll(&SQL); Rows != nil {
			for Rows.Next() {
				var game string
				var name string
				var style string
				var description string
				if err := Rows.Scan(&game, &name, &style, &description); err == nil {
					var gmMap map[string]string = map[string]string{}
					gmMap["Game"] = game
					gmMap["Name"] = name
					gmMap["Style"] = style
					gmMap["Description"] = description
					gameMap.Suggestion = append(gameMap.Suggestion, gmMap)
				}
			}
		}
		answer = gameView(&gameMap, toppageForGameDigit, "")
	}

	return answer
}

func getGameName(digit string) (string, string) {
	var name string
	var playStyle string
	var SQL SQLbuilder
	SQL.Add("SELECT game_name, play_style FROM games")
	SQL.Add("WHERE game = ?;")
	SQL.AddParam(digit)
	if er := Select(&SQL).Scan(&name, &playStyle); digit == "0000" || er != nil {
		return "", ""
	}
	return name, playStyle
}
