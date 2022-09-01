from sqlalchemy import Column, DateTime, Integer, String
from sqlalchemy.sql import func

from ..database import Base


class Note(Base):
    __tablename__ = "note"

    id = Column(Integer, primary_key=True, index=True)
    title = Column(String(32))
    content = Column(String(256))
    created_date = Column(DateTime(timezone=True), default=func.now())
    updated_date = Column(
        DateTime(timezone=True), default=func.now(), onupdate=func.now()
    )
