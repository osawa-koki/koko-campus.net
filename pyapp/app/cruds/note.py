from sqlalchemy.orm import Session

from ..models import note as models
from ..schemas import note as schemas


def get_note(db: Session, note_id: int):
    return db.query(models.Note).filter(models.Note.id == note_id).first()


def get_note_by_title(db: Session, title: str):
    return db.query(models.Note).filter(models.Note.title == title).first()


def get_notes(db: Session, skip: int = 0, limit: int = 100):
    return db.query(models.Note).offset(skip).limit(limit).all()


def create_note(db: Session, note: schemas.NoteCreate):
    db_note = models.Note(title=note.title, content=note.content)
    db.add(db_note)
    db.commit()
    db.refresh(db_note)
    return db_note


def update_note(db: Session, note_id: int, note: schemas.NoteUpdate):
    db_note = get_note(db, note_id=note_id)
    db_note.title = note.title
    db_note.content = note.content
    db.commit()
    db.refresh(db_note)
    return db_note


def delete_note(db: Session, note_id: int):
    db_note = get_note(db, note_id=note_id)
    db.delete(db_note)
    db.commit()
    return db_note


def delete_all_notes(db: Session):
    db.query(models.Note).delete()
    db.commit()
    return
