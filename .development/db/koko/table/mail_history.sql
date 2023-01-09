CREATE TABLE mail_history(
    mail VARCHAR(50) NOT NULL,
    title VARCHAR(100) NOT NULL,
    body VARCHAR(250) NOT NULL,
    status CHAR(1) DEFAULT '1',
    rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updt DATETIME DEFAULT CURRENT_TIMESTAMP
);