FROM ubuntu:22.04

RUN ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime
RUN apt update && apt install -y golang-go nginx mysql-server

# MySQL

RUN service mysql start &&  \
  mysql -u root -e "CREATE DATABASE koko;" && \
  mysql -u root -e "CREATE USER 'osawa'@'localhost' IDENTIFIED BY 'password';" && \
  mysql -u root -e "GRANT ALL PRIVILEGES ON *.* TO 'osawa'@'localhost'; FLUSH PRIVILEGES;"

ENV DB_HOST localhost
ENV DB_PORT 3306
ENV DB_USER osawa
ENV DB_PASSWORD password
ENV DB_DATABASE_NAME koko

ENV WWWROOT=/var/www/html/
ENV DOMAIN=koko-campus.net

# Go

WORKDIR /app

COPY ./src/webServer .
COPY ./web/dynamic ./web
RUN go build -o webServer
RUN chmod +x webServer
RUN ./webServer

# Nginx

COPY nginx.conf /etc/nginx/nginx.conf
COPY ./web/static /var/www/html/

RUN service nginx start
