go build -o batchDBbackupCreater.exe .
move batchDBbackupCreater.exe ..\..\web\bin
cd ..\..\web\bin
.\batchDBbackupCreater.exe
cd ..\..\src\batchDBbackupCreater