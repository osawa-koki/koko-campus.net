"use strict";
(() => {

    const pageInfo = location.href.match(/S(?<Subjects>\d{4})L(?<Lesson>\d{2})P(?<Page>\d{2})/).groups;;
    const previewButton = document.getElementById("notePreviewButton");
    const saveButton = document.getElementById("noteSaveButton");
    const saveButtonIcon = document.getElementById("noteSaveButtonIcon");
    const noteArea = document.getElementById("noteArea");
    
    const [OPEN, CLOSE] = [false, true]; // ノートのプレビュー状態
    let previewState = CLOSE;

    const [OLD, UPDATE, LATEST] = [0, 1, 2]; // ノートのセーブ状況
    const toClassName = ["gg-circle-red", "gg-spinner", "gg-circle-green"]
    let saveState = LATEST;
    
    let isAutoSave = true;
    const saveIntervalMSEC = 1000;

    function updatePreview(previewState){
        // メモの表示・非表示を切り替える
        // Args:
        // - previewState: OPEN or CLOSE
        
        function _set(ele, vis){
            if(ele.style.visibility != vis){
                ele.style.visibility = vis;
            }
        }

        if(previewState == CLOSE) {
            _set(saveButton, "hidden");
            _set(noteArea, "hidden");
            return false;
        } else if(previewState == OPEN){
            _set(saveButton, "visible");
            _set(noteArea, "visible");
            return false;
        } else{
            return true;
        }
    }


    function updateSave(saveState){
        // セーブ状況を表すアイコンを変更する
        // Args:
        // - saveState: OLD, UPDATE or LATEST

        const className = toClassName[saveState]
        if(!saveButtonIcon.classList.contains(className)){
            saveButtonIcon.className = className;
        }
    }


    function saveContent(){
        // メモの内容の更新する関数

        if(saveState != OLD){
            return
        }
        
        saveState = UPDATE;
        updateSave(saveState);

        const content = noteArea.value;
        const url = "/A";
        const postData = URLencodeAssoc({
            "program" : "subjects",
            "action" : "notes",
            "method": "update",
            "subject": pageInfo["Subjects"],
            "lesson": pageInfo["Lesson"],
            "page": pageInfo["Page"],
            "content": content
        });
        const data = {
            method: "POST",
            mode: "cors",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/x-www-form-urlencoded",
            }
        };
        data["body"] = postData;
        fetch(url, data)
        .then(response => response.json())
        .then(response => {
            if (response.Success) {
                // サーバでの処理成功時に実行する処理
                saveState = (saveState == UPDATE) ? LATEST : OLD; // 実行中にsaveStateの状況が変化していたらOLDにする
                isAutoSave = true;
            } else {
                window.alert(response.ErrorMessage.join("\n"))
                saveState = OLD;
                isAutoSave = false;
            }
        })
        .catch((e) => {
            window.alert("通信に失敗しました。\n時間を開けて再度登録を行ってください。\nメモ欄の上の赤いボタンを押すと、手動で保存を実行できます。")
            console.log(e)
            saveState = OLD;
            isAutoSave = false;
        })
        .finally(() => {
            updateSave(saveState);
        });
    }


    // previewButtonでメモを表示・非表示
    previewButton.addEventListener("click", function(){
        previewState = !previewState;
        updatePreview(previewState);
    });

    
    //noteBoxContent以外の場所をクリックしらメモを閉じる
    document.addEventListener("click", (e) => {
        if(!e.target.closest(".noteBoxContent")) {
            //noteBoxContent以外の場所をクリックした場合の処理
            previewState = CLOSE;
            updatePreview(previewState);
        }
    })


    // セーブボタンをクリックで保存
    saveButton.addEventListener("click", saveContent);


    // オートセーブ
    setInterval(function(){
        if(isAutoSave){
            saveContent();
        }
    }, saveIntervalMSEC);


    // ノートの内容が変更されたとき
    noteArea.addEventListener("input", function(){
        saveState = OLD;
        updateSave(saveState);
    });


    // ノートが保存されていなかったら、ページを離れる前に警告を出す
    window.addEventListener('beforeunload', function(e){
        if(saveState != LATEST){
            e.preventDefault();
            e.returnValue = 'ノートの内容が保存されていません！';
        }
    });

    
    // ページを読み込んだときの処理
    window.addEventListener('load', () => {

        updatePreview(previewState);
        updateSave(saveState);
        
        const url = "/A";
        const postData = URLencodeAssoc({
            "program" : "subjects",
            "action" : "notes",
            "method": "get",
            "subject": pageInfo["Subjects"],
            "lesson": pageInfo["Lesson"],
            "page": pageInfo["Page"],
        });
        const data = {
            method: "POST",
            mode: "cors",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/x-www-form-urlencoded",
            }
        };
        data["body"] = postData;
        fetch(url, data)
        .then(response => response.json())
        .then(response => {
            if (response.Success) {
                // サーバでの処理成功時に実行する処理
                noteArea.value = response.Content
                saveState = (saveState == UPDATE) ? LATEST : OLD; // 実行中にsaveStateの状況が変化していたらOLDにする 
                isAutoSave = true;
            } else {
                window.alert(response.ErrorMessage.join("\n"))
                saveState = OLD;
                isAutoSave = false;
            }
        })
        .catch((ex) => {
            console.log(ex);
            window.alert("通信に失敗しました。\n時間を開けて再度登録を行ってください。\nメモ欄の上の赤いボタンを押すと、手動で保存を実行できます。")
            saveState = OLD;
            isAutoSave = false;
        })
        .finally(() => {
            updateSave(saveState);
        });
    });
})();
