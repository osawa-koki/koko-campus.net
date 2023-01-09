CREATE TABLE category(
    category CHAR(2) PRIMARY KEY CHECK (LENGTH(category) = 2),
    category_name VARCHAR(20) NOT NULL,
    importance INT NOT NULL,
    status CHAR(1) DEFAULT '1',
    description VARCHAR(300) NULL,
    rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updt DATETIME DEFAULT CURRENT_TIMESTAMP
);