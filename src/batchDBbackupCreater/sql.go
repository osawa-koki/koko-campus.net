package main

import (
	"database/sql"
	"errors"
	"fmt"
	"os"

	_ "github.com/go-sql-driver/mysql"
)

func connect() (*sql.DB, error) {
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
func (p *SQLbuilder) AddParam(s string) {
	p.data = append(p.data, s)
}
func (p *SQLbuilder) Reset() {
	p.sql = ""
	p.data = []any{}
}

/*
SELECT文を実行します。
複数行を取得する際に使用します。
【引数】SQLBuilder構造体
【戻り値】sql.Rows型のデータ
*/
func SelectAll(sqlStruct *SQLbuilder) *sql.Rows {
	if db, err := connect(); err == nil {
		if rows, er := db.Query(sqlStruct.sql, sqlStruct.data...); er == nil {
			sqlStruct.Reset()
			db.Close()
			return rows
		} else {
			fmt.Println(er.Error())
		}
		db.Close()
	}
	sqlStruct.Reset()
	return nil
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
			fmt.Println(er.Error())
		}
		db.Close()
	}
	sqlStruct.Reset()
	return false
}
