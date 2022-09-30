# pyAPI


## セットアップ
1. python >= 3.10をインストール

2. MySQLにデータベース（`DB_PYAPI_DATABASE_NAME`）を作成

3. 環境変数を設定
```
$ export DB_PYAPI_DATABASE_NAME=<fastAPI用のMySQLのDB名>
$ export PYAPI_SECRET_TOKEN=<適当な文字列>
```

4. 移動
```
$ cd pyapp
```

5. 仮想環境の作成
```
$ python -m venv venv
$ source venv/bin/activate
```

6. Pythonのパッケージ（ライブラリ）をインストール
```
$ pip install -r requirements.txt
```

7. DBマイグレーション
```
$ alembic upgrade head
```


## Webサーバーの起動方法

### ローカル環境
venv内で、
```
$ uvicorn app.main:app --port 8282 --reload
```
を実行。もしくは、[デバッガーで`run_debug.py`を実行](https://fastapi.tiangolo.com/ja/tutorial/debugging/)。

### 本番環境
```
$ nohup /home/koko-campus.net/pyapp/venv/bin/uvicorn app.main:app --port 8282 --reload &
```


## 開発環境

### フォーマッター
`src/pyAPI`フォルダーをWorkspaceに追加して開けば自動でフォーマッターの設定が反映されると思うけど、反映されない場合は[この記事](https://maku.blog/p/4oybku6/)を参考にして、Python用フォーマッターのblackをオンにしてほしい。

setting.json
```
{
  // Python コードを black でフォーマットする設定
  // （Python 拡張をインストールして pip install black しておく）
  "python.formatting.provider": "black",
  "[python]": {
    "editor.defaultFormatter": null, // Prettier を使わないようにする
    "editor.formatOnSave": true // ファイル保存時に自動フォーマット
  },

  // ...
}
```

### pytest
```
sh scripts/test.sh
```


## 参考

### プロジェクト構成
- [FastAPI ディレクトリ設計｜巣籠 悠輔｜note](https://note.com/yusugomori/n/n9f2c0422dfcd)
- [Bigger Applications - Multiple Files - FastAPI](https://fastapi.tiangolo.com/tutorial/bigger-applications/)
- [Project Generation - Template - FastAPI](https://fastapi.tiangolo.com/project-generation/)

### Alembic
- [FastAPI x MySQL on Docker ~ マイグレーション・API作成 ~](https://zenn.dev/yusugomori/articles/a3d5dc8baf9e386a58e5)
- [DBマイグレーションツールのAlembicの使い方](https://zenn.dev/shimakaze_soft/articles/4c0784d9a87751)
