# 情報共有サイト (koko-campus)

## 目的

* 誰でも簡単に学べるサイトの構築。
* シンプルで使いやすく、かつ一次情報を意識した情報の提供と、新しく実用的な情報の公開。
* システム構築を低レイヤで行うことで、セキュリティ上の問題を正しく理解し、自身の成長につなげる。

## 基礎知識・定義

ディレクトリ構成は以下の通りである。

```directory
webSite
  - dev (開発者が使用するデータを格納)
    - db (データベース関連のデータ)
      - programming (ストアドプロシージャを格納)
      - table (データベーステーブルを格納)
    - deployTool (デプロイ用スクリプトを格納)

  - logFiles (ログを出力)

  - src (各種ソースファイルを格納)
    - webServer (WEBサーバソースファイル)
    - redirectWebServer (リダイレクト用WEBサーバソースファイル)
    - pyAPI (pythonサーバソースファイル)
    - subProgram (その他特別目的プログラムソースファイル)
    - x_<プログラム名> (各モジュールテスト用ソースファイル)

  - standalone (プログラム・ゲーム等を独立してgithubで公開するためのファイルを管理)

  - web (HTML・CSS・JS・画像ファイル)
    - bin (コンパイルされたWEBサーバを配置)
    - css (CSSファイル)
    - html (HTMLファイル)
    - img (画像ファイル)
    - js (JSファイル)
```

本番環境へのアクセスはSSHを使用する。  
これは、FTP(SFTPを含む)やDBドライバプロトコルを使用しないことを意味し、それらを使用する場合にはSSH経由で使用する。  
FTPであればFTPS(FTP over SSH)を、DBアクセスならば「Standard TCP/IP over SSH」を使用する。  

次に定義を確認する。

> WEBディレクトリ
>> 「webSite/web」を指す。  
>> 配下にはHTML・CSS・JS・画像ファイルを格納する。  
>> 環境変数「WWWROOT」で指定する。  

---

> Goサーバ
>> Go言語によって構築されたWEBサーバをいう。  

---

> MVC
>> 「Model」「View」「Controller」によって処理する手法をいう。  
>> 「Model」ではデータ管理(DBアクセス)を行い、「View」ではHTMLの生成を行い、「Controller」ではその他必要な処理を行う。  
>> (ハンドラ) <-> Controller <-> Model <-> View  
>> といった感じで処理を行う。  
>> 教科やプログラム・ゲームなどの独立した処理ごとにMVCを有する。  
>> その他一般化された処理はハンドラで行う。

## 環境構築

主に、以下の4点を行う。

1. GoによるWEBサーバ構築
2. MySQLによるデータベース構築
3. PythonによるサブWEBサーバ構築
4. Nginxのインストール
5. その他開発用のソフトウェア準備  

## 環境変数の登録

「/etc/profile」に以下の内容を登録する。

```profile
export PATH=$PATH:/usr/local/go/bin

export DB_HOST=localhost
export DB_PORT=3306
export DB_USER=root
export DB_PASSWORD=pw1234
export DB_DATABASE_NAME=koko

export DOMAIN=koko-campus.net

export SMTP_SERVER=smtp20.gmoserver.jp
export SMTP_PORT=587
export SMTP_PASSWORD="fvFPqs#WsDTZM3Vxu5LSSY$vZ"
```

## GoによるWEBサーバ構築

以下のコマンドでGo言語コンパイラをインストールする。

```bash
# 古いバージョンのGoコンパイラをアンインストール
sudo rm -rf /usr/local/go

# Goコンパイラをダウンロード
wget https://go.dev/dl/go1.19.1.linux-amd64.tar.gz
# ファイルを解凍
sudo tar -C /usr/local -xzf go1.19.1.linux-amd64.tar.gz

ls /usr/local/go

export PATH=$PATH:/usr/local/go/bin
```

```bash
go version
# -> 1.19.1
// 原則として最新のバージョンを使用する。
```

Go言語を使用してWEBサーバを構築する。  
  
現在複雑な処理についてはpythonに処理を移譲する仕組みを構築中。(臼倉君担当)  
  
実行方法は、「webSite/src/webServer」ディレクトリまで移動し、以下のコマンドを実行する。

```cmd
go run .
```

ビルド・実行ファイルの移動・実行をまとめたバッチファイルを使用することも可能である。

```shell
// Windows
.\0

// UNIX系
./0.bash
```

本番環境ではバックグラウンド実行をするため、「webSite/src/webServer」ディレクトリから以下のコマンドを実行する。

```cmd
./00.bash
```

## MySQLによるデータベース構築

DBMSはMySQLを使用する。

```cmd
sudo apt install mysql-server

sudo mysql -uroot

SET GLOBAL validate_password.length=6;
SET GLOBAL validate_password.policy=LOW;

CREATE USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'pw1234';

mysql_secure_installation

mysql --version -> 8.0.28
// できるだけ最新のものを使用する。
```

パスワードは特に理由がない場合は「pw1234」とする。  
本番環境であっても、直接Dbへのアクセスは禁止し、SSH経由でのアクセスを要求しているため、そのまま「pw1234」をパスワードとして設定している。  

データベースは「koko」データベースをGoサーバ用に、「koko_pyapi」データベースをpythonサーバ用に作成する。  

```db
koko -> Goサーバ
koko_pyapi -> pythonサーバ
```

「webSite/src/setupDB」に、データベース初期化用のプログラムが存在するため、これを実行する。  

```cmd
go run .
```

DB情報が格納されているディレクトリまでのパスを尋ねられるため、「webSite/dev/db」までのパスを指定する。  
例) 「C:\ofMine\webSite\dev\db」

## PythonによるサブWEBサーバ構築

臼倉君による説明。


## Nginxのインストール

```bash
# Nginxのインストール
sudo apt install nginx

# Nginxの起動
sudo systemctl start nginx
```

「/etc/nginx/nginx.conf」ファイルのhttpディレクティブ内に以下の記載をします。

```nginx.conf
include <nginx.confへのパス>;
```

```bash
# Nginxの再起動
sudo systemctl restart nginx
```

## Windowsでの開発環境

[Nginx(Windows)](http://nginx.org/en/download.html)からバイナリディストリビューションをダウンロード、解凍して任意のフォルダに配置。  
そのディレクトリの「conf/nginx.conf」ファイルのhttpディレクティブ内でルートディレクトリに配置してある「nginx.debug.conf」をインクルード。  

```nginx.conf
http {
  include "C:\\webSite\\koko-campus.net\\nginx.debug.conf"
}

# 「\」はエスケープ処理する必要あり。
```

コマンドは以下の通り。

```cmd
# 実行
start nginx

# 停止
nginx -s stop

# 構成ファイルテスト
nginx -t

# リロード
nginx -s reload
```

## 証明書の発行

無料で使用できる「Let's Encrypt」を使用します。

```bash
sudo apt install certbot
sudo certbot certonly --standalone -d koko-campus.net
```

更新は以下の手順で♪

```bash
# 80番ポートを解放
lsof -i -P
kill -9 プロセス

sudo certbot renew

sudo systemctl restart nginx
```

## その他開発用のソフトウェア準備  

### Git・Github

Git・Githubを使用してソースを管理する。  
「<https://github.com/koko-campus/koko-campus.net>」  
  
ブランチは以下の構成をとる。  

```git
main
develop
feature
  - feature/〇〇〇
  - feature/〇〇〇
  - feature/〇〇〇
```

「feature/〇〇〇」にて機能を実装、完成後は「develop」にマージ、本番環境へ移行する際にはmainへとマージする。  

### Libre

教科を管理するテーブルをLibreのマクロを使用してSQLで出力が可能。  
  
「~\AppData\Roaming\LibreOffice\4\user\scripts\python」に、「src\DBtableManagementMacro\LibreOffice\python」にあるスクリプトをコピー。  
「scripts/python」は無ければ作成。  
  
「ツール - マクロの実行」から一括でSQL文を生成可能。
