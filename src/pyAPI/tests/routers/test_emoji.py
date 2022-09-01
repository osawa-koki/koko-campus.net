from fastapi.testclient import TestClient

from app.main import app

client = TestClient(app)


def test_ok():

    data = [
        ("あ", "あ"),
        ("か", "🦟"),
        ("みかん", "🍊"),
        ("み かん", "み 🦟ん"),
        ("み　かん", "み　🦟ん"),
        (
            "ああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ",
            "ああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ",
        ),
    ]

    for inp, out in data:
        response = client.get("/emoji/", params={"q": inp})
        assert response.status_code == 200
        assert response.json() == {"input": inp, "output": out}


def test_validation_error():

    data = [
        ("", ""),
        ("あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ", " "),
        ("a", ""),
        ("あa", ""),
        ("🥺", ""),
    ]

    for inp, out in data:
        response = client.get("/emoji/", params={"q": inp})
        assert response.status_code == 422
