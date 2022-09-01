from pydantic import BaseModel


class Emoji(BaseModel):
    input: str
    output: str
