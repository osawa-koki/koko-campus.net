CREATE TABLE subjects_category(
    subject CHAR(4) CHECK (LENGTH(subject) = 4),
    category CHAR(2) CHECK (LENGTH(category) = 2),
    importance INT DEFAULT 5,
    status CHAR(1) DEFAULT '1',
    rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updt DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(subject, category)
);