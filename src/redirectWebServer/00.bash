go build -o redirectWebServer .
mv redirectWebServer ../../web/bin
cd ../../web/bin
chmod a+rxw redirectWebServer
nohup ./redirectWebServer&
cd ../../src/redirectWebServer