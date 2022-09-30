import os

from fastapi import Header, HTTPException

from .database import SessionLocal


def get_db():
    db = SessionLocal()
    try:
        yield db
    finally:
        db.close()


def get_token_header(x_token: str = Header()):
    if x_token != os.getenv("PYAPI_SECRET_TOKEN"):
        raise HTTPException(status_code=400, detail="X-Token header invalid")
