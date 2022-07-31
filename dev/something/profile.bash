# ここから追加

# go言語用のPATHの設定
export PATH=$PATH:/usr/local/go/bin


# データベース用環境変数
export DB_HOST=localhost
export DB_PORT=3306
export DB_USER=root
export DB_PASSWORD=pw1234
export DB_DATABASE_NAME=koko

# SSL/TLS証明書用の環境変数
export TLS_CERT=/etc/letsencrypt/live/koko-campus.net/cert.pem
export TLS_PRIVKEY=/etc/letsencrypt/live/koko-campus.net/privkey.pem

# webサーバ用の環境変数
export WWWROOT=/home/webSite/web
export DOMAIN=koko-campus.net

# メールサーバ用の環境変数
export SMTP_SERVER=mail15.onamae.ne.jp
export SMTP_PORT=587
export SMTP_PASSWORD="KbS3i\$YTgpD8LE?\$gnZEII!63Lno#nr484iE9hUDtT0&k7!bqx"

echo finished reading fst Env Setting Files