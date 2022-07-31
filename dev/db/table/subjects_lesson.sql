CREATE TABLE subjects_lesson(
    subject CHAR(4) CHECK (LENGTH(subject) = 4),
    subject_lesson CHAR(2) CHECK (LENGTH(subject_lesson) = 2),
    lesson_name VARCHAR(20) NOT NULL,
    status CHAR(1) DEFAULT '1',
    rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updt DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(subject, subject_lesson)
);