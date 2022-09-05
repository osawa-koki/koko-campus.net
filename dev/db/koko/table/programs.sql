CREATE TABLE programs(
	program CHAR(4) PRIMARY KEY,
	program_name VARCHAR(25) UNIQUE,
	description VARCHAR(300) DEFAULT '',
    importance INT DEFAULT 5,
    status CHAR(1) DEFAULT '1',
    rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updt DATETIME DEFAULT CURRENT_TIMESTAMP
);