"use strict";
(() => {

    const pageInfo = location.href.match(/S(?<Subjects>\d{4})L(?<Lesson>\d{2})P(?<Page>\d{2})/).groups;
    const star = document.getElementById("star");

    star.addEventListener("click", function () {
        const jsonStruct = {
            "program": "mypage",
            "action": "bookmark",
            "subject": pageInfo["Subjects"],
            "lesson": pageInfo["Lesson"],
            "page": pageInfo["Page"],
        };
        if (star.classList.contains("off")) {
            jsonStruct["method"] = "insert";
        } else {
            jsonStruct["method"] = "delete";
        }
        const url = "/A";
        const postData = URLencodeAssoc(jsonStruct);
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
                    if (star.classList.contains("off")) {
                        star.classList.remove("off");
                        star.style.transform = "rotate(-72deg)";
                    } else {
                        star.classList.add("off");
                        star.style.transform = "rotate(0deg)";
                    }
                } else {
                    window.alert(response.ErrorMessage.join("\n"))
                }
            })
            .catch(() => {
                window.alert("通信に失敗しました。\n時間を開けて再度登録を行ってください。")
            });
    });


    // お気に入りボタンの初期化
    const jsonStruct = {
        "program": "mypage",
        "action": "bookmark",
        "subject": pageInfo["Subjects"],
        "lesson": pageInfo["Lesson"],
        "page": pageInfo["Page"],
        "method": "checkExists",
    };
    const url = "/A";
    const postData = URLencodeAssoc(jsonStruct);
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
                if (response.Exists) {
                    star.classList.remove("off");
                    star.style.transform = "rotate(-72deg)";
                } else {
                    star.classList.add("off");
                    star.style.transform = "rotate(0deg)";
                }
            } else {
                window.alert(response.ErrorMessage.join("\n"))
            }
        })
        .catch(() => {
            window.alert("通信に失敗しました。\n時間を開けて再度登録を行ってください。")
        });



})();
