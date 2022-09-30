from fastapi import FastAPI
from fastapi.staticfiles import StaticFiles

from .routers import emoji, note
from .config import settings

app = FastAPI()

if not settings.DEBUG:
    app = FastAPI(docs_url=None, redoc_url=None)

app.mount("/static", StaticFiles(directory="static"), name="static")

app.include_router(emoji.router)
app.include_router(note.router)


@app.get("/")
async def root():
    return {"message": "Hello World"}
