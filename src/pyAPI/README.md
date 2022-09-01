# pyAPI

- python >= 3.10


## 実行方法
```
pip install -r requirements.txt
uvicorn app.main:app --port 8888 --reload
```
もしくは、VSCodeの[デバッガーで実行](https://fastapi.tiangolo.com/ja/tutorial/debugging/)


## 開発環境

### フォーマッター
`src/pyAPI`フォルダーをWorkspaceに追加して開けば自動でフォーマッターの設定が反映されると思うけど、反映されない場合は[この記事](https://maku.blog/p/4oybku6/)を参考にして、Python用フォーマッターのblackをオンにしてほしい！

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


## 参考

### プロジェクト構成
- https://fastapi.tiangolo.com/tutorial/bigger-applications/
- https://note.com/yusugomori/n/n9f2c0422dfcd
