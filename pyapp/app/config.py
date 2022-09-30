from pydantic import BaseSettings, validator


class Settings(BaseSettings):

    DEBUG: bool

    DB_USER: str
    DB_PASSWORD: str
    DB_HOST: str
    DB_PYAPI_DATABASE_NAME: str
    SQLALCHEMY_DATABASE_URI: str | None = None

    PYAPI_SECRET_TOKEN: str

    @validator("DEBUG", pre=True)
    def str_to_bool(cls, v):
        return v.lower() == "on"

    @validator("SQLALCHEMY_DATABASE_URI", pre=True)
    def assemble_db_connection(cls, v: str | None, values: dict[str, any]) -> any:
        return "mysql+mysqlconnector://{}:{}@{}/{}".format(
            values["DB_USER"],
            values["DB_PASSWORD"],
            values["DB_HOST"],
            values["DB_PYAPI_DATABASE_NAME"],
        )

    class Config:
        case_sensitive = True


settings = Settings()
