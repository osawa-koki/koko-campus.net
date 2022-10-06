from fastapi import APIRouter, HTTPException, Depends
from sqlalchemy.orm import Session

from ..cruds import note as cruds
from ..schemas import note as schemas
from ..dependencies import get_db, get_token_header
from ..config import settings

router = APIRouter(
    prefix=settings.BASE_PATH + "/note",
    tags=["note"],
    responses={404: {"description": "Not found"}},
)


@router.get("/", response_model=list[schemas.Note])
def read_notes(
    skip: int = 0,
    limit: int = 100,
    db: Session = Depends(get_db),
):
    return cruds.get_notes(db, skip=skip, limit=limit)


@router.get("/id/{id}", response_model=schemas.Note)
def read_note(
    id: int,
    db: Session = Depends(get_db),
):
    db_note = cruds.get_note(db, note_id=id)

    if db_note is None:
        raise HTTPException(status_code=404, detail="Note not found")

    return db_note


@router.get("/title/{title}", response_model=schemas.Note)
def read_note_by_title(
    title: str,
    db: Session = Depends(get_db),
):
    db_note = cruds.get_note_by_title(db, title=title)

    if db_note is None:
        raise HTTPException(status_code=404, detail="Note not found")

    return db_note


@router.post("/", response_model=schemas.Note)
def create_note(
    note: schemas.NoteCreate,
    db: Session = Depends(get_db),
):
    return cruds.create_note(db, note=note)


@router.put("/id/{id}", response_model=schemas.Note)
def update_note(
    id: int,
    note: schemas.NoteUpdate,
    db: Session = Depends(get_db),
):
    db_note = cruds.get_note(db, note_id=id)

    if db_note is None:
        raise HTTPException(status_code=404, detail="Note not found")

    return cruds.update_note(db, note_id=id, note=note)


@router.delete("/id/{id}")
def delete_note(
    id: int,
    db: Session = Depends(get_db),
):
    db_note = cruds.get_note(db, note_id=id)

    if db_note is None:
        raise HTTPException(status_code=404, detail="Note not found")

    return cruds.delete_note(db, note_id=id)


@router.delete("/", dependencies=[Depends(get_token_header)])
def delete_all_notes(
    db: Session = Depends(get_db),
):
    return cruds.delete_all_notes(db)
