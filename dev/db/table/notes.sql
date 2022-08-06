CREATE TABLE notes(
    user_id CHAR(16) CHECK (8 <= LENGTH(user_id) AND LENGTH(user_id) <= 16),
    subject CHAR(4) CHECK (LENGTH(subject) = 4),
    subject_lesson CHAR(2) CHECK (LENGTH(subject_lesson) = 2),
    subject_page CHAR(2) NOT NULL,
    content VARCHAR(1000) NOT NULL,
    rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updt DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(user_id, subject, subject_lesson, subject_page)
);