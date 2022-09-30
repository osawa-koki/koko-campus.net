from pydantic import BaseSettings, validator


class Settings(BaseSettings):

    DEBUG: bool

    BASE_PATH: str = ""

    DB_USER: str
    DB_PASSWORD: str
    DB_HOST: str
    DB_PYAPI_DATABASE_NAME: str
    SQLALCHEMY_DATABASE_URI: str | None = None

    PYAPI_SECRET_TOKEN: str

    @validator("DEBUG", pre=True)
    def str_to_bool(cls, v) -> bool:
        return v.lower() == "on"

    @validator("BASE_PATH")
    def base_path(cls, v: str, values: dict[str, any]) -> str:
        if values["DEBUG"]:
            return v
        return "/pyapi"

    @validator("SQLALCHEMY_DATABASE_URI")
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
