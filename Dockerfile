FROM golang:1.19
WORKDIR /app

COPY ./src/webServer .
RUN go mod download
COPY ./web/dynamic ./web
RUN go build -o webServer
RUN chmod +x webServer
CMD ./webServer
