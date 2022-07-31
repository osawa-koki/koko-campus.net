CREATE TABLE schedule(
	user_id VARCHAR(16),
	schedule_id CHAR(8),
	title VARCHAR(30) NOT NULL,
	importance CHAR(1) NOT NULL,
	due DATETIME NOT NULL,
	description VARCHAR(300) NULL,
	progress INT DEFAULT 0 CHECK(0 <= progress AND progress <= 100),
	status CHAR(1) DEFAULT '1',
    rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updt DATETIME DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(user_id, schedule_id)
);