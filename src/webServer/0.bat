go build -o webServer.exe .
move webServer.exe ..\..\web\bin
cd ..\..\web\bin
.\webServer.exe
cd ..\..\src\webServer