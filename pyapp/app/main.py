from fastapi import FastAPI
from fastapi.staticfiles import StaticFiles

from .routers import emoji, note
from .config import settings

app = FastAPI(
    openapi_url=settings.BASE_PATH + "/openapi.json",
    docs_url=settings.BASE_PATH + "/docs",
    redoc_url=settings.BASE_PATH + "/redoc",
)

app.mount("/static", StaticFiles(directory="static"), name="static")

app.include_router(emoji.router)
app.include_router(note.router)


@app.get(settings.BASE_PATH + "/")
async def root():
    return {"message": "Hello World"}
