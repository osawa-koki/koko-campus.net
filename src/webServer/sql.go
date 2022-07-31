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
		Error(err.Error())
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
単一行を取得する際に使用します。
【引数】SQLBuilder構造体
【戻り値】sql.Row型のデータ
*/
func Select(sqlStruct *SQLbuilder) *sql.Row {
	SQLLogger(sqlStruct)
	if db, err := connect(); err == nil {
		row := db.QueryRow(sqlStruct.sql, sqlStruct.data...)
		sqlStruct.Reset()
		db.Close()
		return row
	} else {
		Error(err.Error())
	}
	sqlStruct.Reset()
	return nil
}

/*
SELECT文を実行します。
複数行を取得する際に使用します。
【引数】SQLBuilder構造体
【戻り値】sql.Rows型のデータ
*/
func SelectAll(sqlStruct *SQLbuilder) *sql.Rows {
	SQLLogger(sqlStruct)
	if db, err := connect(); err == nil {
		if rows, er := db.Query(sqlStruct.sql, sqlStruct.data...); er == nil {
			sqlStruct.Reset()
			db.Close()
			return rows
		}
		db.Close()
	} else {
		Error(err.Error())
	}
	sqlStruct.Reset()
	return nil
}

/*
指定したSQL文の結果が存在するか否かを判定します。
【引数】SQLBuilder構造体
【戻り値】真偽値
*/
func Exists(sqlStruct *SQLbuilder) bool {
	SQLLogger(sqlStruct)
	var result string
	if er := Select(sqlStruct).Scan(&result); er == sql.ErrNoRows {
		sqlStruct.Reset()
		return false
	}
	sqlStruct.Reset()
	return true
}

/*
SELECT文以外のSQLを実行します。
【引数】SQLbuider構造体
【戻り値】真偽値(成功 or 失敗)
*/
func Execute(sqlStruct *SQLbuilder) bool {
	SQLLogger(sqlStruct)
	if db, er := connect(); er == nil {
		if _, er := db.Exec(sqlStruct.sql, sqlStruct.data...); er == nil {
			sqlStruct.Reset()
			db.Close()
			return true
		} else {
			Error("SQL Execute 失敗 ---> " + sqlStruct.sql + fmt.Sprintf("	【%s】", er.Error()))
		}
		db.Close()
	} else {
		Error(er.Error())
	}
	sqlStruct.Reset()
	return false
}
