FROM golang:1.19
WORKDIR /app

COPY ./src/webServer .
COPY ./web/dynamic ./web
RUN go build -o webServer
RUN chmod +x webServer
CMD ./webServer
