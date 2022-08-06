"use strict";
(() => {
    const pageInfo = location.href.match(/S(?<Subjects>\d{4})L(?<Lesson>\d{2})P(?<Page>\d{2})/).groups

    const updateButton = document.getElementById("noteUpdateButton");

    document.getElementById("noteButton").addEventListener("click", function(){
        document.getElementById("noteArea").classList.toggle("hidden");
        updateButton.classList.toggle("hidden");
    });

    updateButton.addEventListener("click", function(){
        const content = document.getElementById("noteArea").value;
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
            } else {
                window.alert(response.ErrorMessage.join("\n"))
            }
        })
        .catch(() => {
            window.alert("通信に失敗しました。\n時間を開けて再度登録を行ってください。")
        });

    });


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
            document.getElementById("noteArea").value = response.Content
        } else {
            window.alert(response.ErrorMessage.join("\n"))
        }
    })
    .catch((ex) => {
        console.log(ex);
        window.alert("通信に失敗しました。\n時間を開けて再度登録を行ってください。")
    });
})();
