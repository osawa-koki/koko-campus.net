from fastapi import FastAPI
from fastapi.staticfiles import StaticFiles

from .routers import emoji, note
from .config import settings


if settings.DEBUG:
    app = FastAPI()
else:
    app = FastAPI(root_path="/pyapi")

app.mount("/static", StaticFiles(directory="static"), name="static")

app.include_router(emoji.router)
app.include_router(note.router)


@app.get("/")
async def root():
    return {"message": "Hello World"}
