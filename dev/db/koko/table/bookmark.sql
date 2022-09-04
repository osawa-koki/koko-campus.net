CREATE TABLE bookmark(
    user_id CHAR(16) CHECK (8 <= LENGTH(user_id) AND LENGTH(user_id) <= 16),
    subject CHAR(4) NOT NULL,
    lesson CHAR(2) NULL,
    page CHAR(2) NULL,
    rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updt DATETIME DEFAULT CURRENT_TIMESTAMP
);