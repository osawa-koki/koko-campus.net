# koko-campus.net

Goで実装した学習サイト公開用のプロジェクト。  

![成果物](./fruit.gif)  

システムの複雑化により、開発停止。  
既存のページ等は個別のリポジトリに分解して公開中。  

- [全般](https://github.com/osawa-koki/octo-campus)
- [情報処理安全確保支援士試験](https://github.com/osawa-koki/SC2022)
- [データベーススペシャリスト試験](https://github.com/osawa-koki/DB2023)

## 実行方法

以下の順でコマンドを実行。  

```shell
docker compose up db -d [--build]
docker compose up app -d [--build]
docker compose up web -d [--build]
```
