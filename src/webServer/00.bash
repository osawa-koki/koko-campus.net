go build -o webServer .
mv webServer ../../web/bin
cd ../../web/bin
chmod a+rxw webServer
nohup ./webServer&
cd ../../src/webServer