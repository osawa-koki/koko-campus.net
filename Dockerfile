FROM ubuntu:22.04

RUN ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime
RUN apt update && apt install -y golang-go nginx mysql-server
