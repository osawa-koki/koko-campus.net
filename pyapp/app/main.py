from fastapi import FastAPI
from fastapi.staticfiles import StaticFiles

from .routers import emoji, note
from .config import settings

app = FastAPI()

if settings.DEBUG:
    app = FastAPI(
        openapi_url="/pyapi/openapi.json",
        docs_url="/pyapi/docs",
        redoc_url="/pyapi/redoc",
    )
else:
    app = FastAPI(docs_url=None, redoc_url=None)


app.mount("/static", StaticFiles(directory="static"), name="static")

app.include_router(emoji.router)
app.include_router(note.router)


@app.get("/")
async def root():
    return {"message": "Hello World"}
