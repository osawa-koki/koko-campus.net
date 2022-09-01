from fastapi import FastAPI
from fastapi.staticfiles import StaticFiles

from . import database
from .routers import emoji, note

database.Base.metadata.create_all(bind=database.engine)

app = FastAPI()

app.mount("/static", StaticFiles(directory="static"), name="static")

app.include_router(emoji.router)
app.include_router(note.router)


@app.get("/")
async def root():
    return {"message": "Hello World"}
