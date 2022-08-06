CREATE TABLE program(
	program CHAR(4) PRIMARY KEY,
	name VARCHAR(25) UNIQUE,
	description VARCHAR(300) DEFAULT '',
    importance INT DEFAULT 5,
    status CHAR(1) DEFAULT '1',
    rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updt DATETIME DEFAULT CURRENT_TIMESTAMP
);