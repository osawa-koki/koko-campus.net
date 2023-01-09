FROM ubuntu:22.04

RUN ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime
RUN apt update && apt install -y golang-go nginx mysql-server

RUN service mysql start && service mysql stop && \
  mysql -u root -e "CREATE DATABASE koko;"
  mysql -u root -e "CREATE USER 'osawa'@'localhost' IDENTIFIED BY 'password';" &
  mysql -u root -e "GRANT ALL PRIVILEGES ON *.* TO 'osawa'@'localhost'; FLUSH PRIVILEGES;"

RUN service nginx start
