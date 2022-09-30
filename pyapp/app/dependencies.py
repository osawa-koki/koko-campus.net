import os

from fastapi import Header, HTTPException

from .config import settings
from .database import SessionLocal


def get_db():
    db = SessionLocal()
    try:
        yield db
    finally:
        db.close()


def get_token_header(x_token: str = Header()):
    if x_token != settings.PYAPI_SECRET_TOKEN:
        raise HTTPException(status_code=400, detail="X-Token header invalid")
