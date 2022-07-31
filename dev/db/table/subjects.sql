CREATE TABLE subjects(
    subject CHAR(4) PRIMARY KEY CHECK (LENGTH(subject) = 4),
    subject_name VARCHAR(20) NOT NULL,
    status CHAR(1) DEFAULT '1',
    rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updt DATETIME DEFAULT CURRENT_TIMESTAMP 
);