"use strict";
(() => {

    function setVisibility(element, visibility){
        // 状態をチェックしてから、visibilityをセットする。
        // visibilityは、"hidden" or "show"
        if(visibility == "hidden" && !element.classList.contains("hidden")){
            element.classList.toggle("hidden");
            return false;
        }else if(visibility == "show" && element.classList.contains("hidden")){
            element.classList.toggle("hidden");
            return false;
        }else{
            return true;
        }
    }

    const pageInfo = location.href.match(/S(?<Subjects>\d{4})L(?<Lesson>\d{2})P(?<Page>\d{2})/).groups;
    const noteButton = document.getElementById("noteButton");
    const updateButton = document.getElementById("noteUpdateButton");
    const noteArea = document.getElementById("noteArea");
    let is_latest = true;


    // メモの表示・非表示
    noteButton.addEventListener("click", function(){
        noteArea.classList.toggle("hidden");
        updateButton.classList.toggle("hidden");
    });

    document.addEventListener("click", (e) => {
        if(!e.target.closest(".noteBoxContent")) {
            //noteBoxContent以外の場所をクリックした場合の処理
            setVisibility(noteArea, "hidden")
            setVisibility(updateButton, "hidden")
        }
    })


    // ノートの内容が変更されたら、is_latestをfalseにする
    noteArea.addEventListener("input", function(){
        is_latest = false;
    });


    // ノートが保存されていなかったら、ページを離れる前に警告を出す
    window.addEventListener('beforeunload', function(e){
        if(!is_latest){
            e.preventDefault();
            e.returnValue = '';
        }
    });


    // メモの内容の更新
    updateButton.addEventListener("click", function(){
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
                window.alert("update完了!");
                is_latest = true;
            } else {
                window.alert(response.ErrorMessage.join("\n"))
            }
        })
        .catch(() => {
            window.alert("通信に失敗しました。\n時間を開けて再度登録を行ってください。")
        });

    });

    
    // ページを読み込んだときに、メモの内容を取得して挿入する。
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
        } else {
            window.alert(response.ErrorMessage.join("\n"))
        }
    })
    .catch((ex) => {
        console.log(ex);
        window.alert("通信に失敗しました。\n時間を開けて再度登録を行ってください。")
    });
})();
