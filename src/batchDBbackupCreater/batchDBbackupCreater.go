package main

import (
	"fmt"
)

func main() {
	var SQL SQLbuilder
	SQL.Add("SHOW TABLES FROM koko;")
	if Rows := SelectAll(&SQL); Rows != nil {
		for Rows.Next() {
			var table string
			if er := Rows.Scan(&table); er == nil {
				fileName := fmt.Sprintf("z___%s___%s", GetDate(), table)
				var SQL SQLbuilder
				SQL.Add("SELECT * FROM subjects INTO")
				SQL.Add(fmt.Sprintf("OUTFILE 'C:/webSite/DBbackup/%s.csv'", fileName)) // HARDCORD!
				SQL.Add("FIELDS TERMINATED BY ',' ENCLOSED BY '\"' ESCAPED BY '\"' LINES TERMINATED BY '\\r\\n';")
				Execute(&SQL)
			} else {
				fmt.Println(er.Error())
			}
		}
	}
	fmt.Println("fin")
}
