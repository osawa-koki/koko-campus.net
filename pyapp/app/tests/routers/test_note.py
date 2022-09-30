import os
from fastapi.testclient import TestClient

from app.main import app
from app.config import settings

client = TestClient(app)


def test_valid_token():
    response = client.delete("/note/", headers={"x-token": settings.PYAPI_SECRET_TOKEN})
    assert response.status_code == 200


def test_invalid_token():
    response = client.delete("/note/", headers={"x-token": "invalid_token"})
    assert response.status_code == 400
    assert response.json() == {"detail": "X-Token header invalid"}
