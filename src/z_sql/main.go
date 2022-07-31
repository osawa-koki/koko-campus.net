package main

import (
	"database/sql"
	"errors"
	"fmt"
	"os"

	_ "github.com/go-sql-driver/mysql"
	"github.com/joho/godotenv"
)

func logger(s string) {
	fmt.Println(s)
}

func envInfo() {
	logger("DB_USER -> " + os.Getenv("DB_USER"))
	logger("DB_PASSWORD -> " + os.Getenv("DB_PASSWORD"))
	logger("DB_HOST -> " + os.Getenv("DB_HOST"))
	logger("DB_PORT -> " + os.Getenv("DB_PORT"))
	logger("DB_DATABASE_NAME -> " + os.Getenv("DB_DATABASE_NAME"))
}

func connect() (*sql.DB, error) {
	err := godotenv.Load()
	if err != nil {
		fmt.Println(err.Error())
	}

	user := os.Getenv("DB_USER")
	password := os.Getenv("DB_PASSWORD")
	host := os.Getenv("DB_HOST")
	port := os.Getenv("DB_PORT")
	database_name := os.Getenv("DB_DATABASE_NAME")

	dbconf := fmt.Sprintf("%s:%s@tcp(%s:%s)/%s?charset=utf8mb4", user, password, host, port, database_name)
	db, err := sql.Open("mysql", dbconf)
	if err != nil {
		fmt.Println(err.Error())
		return db, errors.New("db connection failed")
	}
	return db, nil
}

type SQLbuilder struct {
	sql  string
	data []any
}

func (p *SQLbuilder) Add(s string) {
	p.sql += s + " "
}
func (p *SQLbuilder) Reset() {
	p.sql = ""
	p.data = []any{}
}

/*
SELECT文以外のSQLを実行します。
【引数】SQLbuider構造体
【戻り値】真偽値(成功 or 失敗)
*/
func Execute(sqlStruct *SQLbuilder) bool {
	if db, er := connect(); er == nil {
		if _, er := db.Exec(sqlStruct.sql, sqlStruct.data...); er == nil {
			sqlStruct.Reset()
			return true
		} else {
			logger("SQL Execute 失敗 ---> " + sqlStruct.sql)
			logger(er.Error())
		}
		db.Close()
	} else {
		logger(er.Error())
	}
	sqlStruct.Reset()
	return false
}

func main() {
	envInfo()

	var errorChecker bool = false

	var SQL SQLbuilder

	SQL.Add("CREATE TABLE IF NOT EXISTS test_table (message VARCHAR(25));")
	if er := Execute(&SQL); !er {
		errorChecker = true
	}

	SQL.Reset()

	SQL.Add("INSERT INTO test_table(message)")
	SQL.Add("VALUES('hello world!');")
	if er := Execute(&SQL); !er {
		errorChecker = true
	}

	if errorChecker {
		logger("SQL実行失敗")
	} else {
		logger("SQL実行成功")
	}
}
