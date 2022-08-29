CREATE TABLE games(
    game CHAR(4) PRIMARY KEY,
    game_name VARCHAR(100) UNIQUE,
    description VARCHAR(300) NULL,
    play_style CHAR(1) DEFAULT '1', -- 「1: 一人でのみ」「2: 一人 or 複数人」
    status CHAR(1) DEFAULT '1',
    importance INT DEFAULT 5,
    rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updt DATETIME DEFAULT CURRENT_TIMESTAMP
);