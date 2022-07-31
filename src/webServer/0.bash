go build -o webServer .
mv webServer ../../web/bin
cd ../../web/bin
chmod a+rxw webServer
./webServer
cd ../../src/webServer