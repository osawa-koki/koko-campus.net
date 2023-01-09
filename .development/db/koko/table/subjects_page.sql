CREATE TABLE subjects_page(
    subject CHAR(4) CHECK (LENGTH(subject) = 4),
    subject_lesson CHAR(2) CHECK (LENGTH(subject_lesson) = 2),
    subject_page CHAR(2) NOT NULL,
    page_name VARCHAR(20) NOT NULL,
    status CHAR(1) DEFAULT '1',
    rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updt DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(subject, subject_lesson, subject_page)
);