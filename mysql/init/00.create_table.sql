
CREATE TABLE category(
  category CHAR(2) PRIMARY KEY CHECK (LENGTH(category) = 2),
  category_name VARCHAR(20) NOT NULL,
  importance INT NOT NULL,
  status CHAR(1) DEFAULT '1',
  description VARCHAR(300) NULL,
  rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
  updt DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE subjects_category(
  subject CHAR(4) CHECK (LENGTH(subject) = 4),
  category CHAR(2) CHECK (LENGTH(category) = 2),
  importance INT DEFAULT 5,
  status CHAR(1) DEFAULT '1',
  rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
  updt DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(subject, category)
);

CREATE TABLE subjects_lesson(
  subject CHAR(4) CHECK (LENGTH(subject) = 4),
  subject_lesson CHAR(2) CHECK (LENGTH(subject_lesson) = 2),
  lesson_name VARCHAR(20) NOT NULL,
  status CHAR(1) DEFAULT '1',
  rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
  updt DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(subject, subject_lesson)
);

CREATE TABLE subjects_shiken(
  subject CHAR(4) PRIMARY KEY CHECK (LENGTH(subject) = 4),
  shiken_type CHAR(1) NOT NULL,
  fst DATE NULL,
  snd DATE NULL,
  rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
  updt DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE subjects(
  subject CHAR(4) PRIMARY KEY CHECK (LENGTH(subject) = 4),
  subject_name VARCHAR(20) NOT NULL,
  status CHAR(1) DEFAULT '1',
  rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
  updt DATETIME DEFAULT CURRENT_TIMESTAMP
);

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

CREATE TABLE session_log(
  cookie CHAR(100) PRIMARY KEY,
  user_id CHAR(16) NULL,
  user_agent VARCHAR(30) NULL,
  x_forwarded_for VARCHAR(20) NULL,
  referer VARCHAR(50) NULL,
  sec_ch_ua_platform VARCHAR(30) NULL,
  rgdt datetime DEFAULT CURRENT_TIMESTAMP,
  updt datetime DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE bookmark(
  user_id CHAR(16) CHECK (8 <= LENGTH(user_id) AND LENGTH(user_id) <= 16),
  subject CHAR(4) NOT NULL,
  lesson CHAR(2) NULL,
  page CHAR(2) NULL,
  rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
  updt DATETIME DEFAULT CURRENT_TIMESTAMP
);

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

CREATE TABLE pre_member(
  mail VARCHAR(50) PRIMARY KEY,
  token CHAR(128) UNIQUE,
  rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
  updt DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE member(
  user_id CHAR(16) PRIMARY KEY CHECK (8 <= LENGTH(user_id) AND LENGTH(user_id) <= 16),
  mail VARCHAR(50) UNIQUE,
  pw VARCHAR(128),
  name VARCHAR(25) CHECK (3 <= LENGTH(name) AND LENGTH(name) <= 25),
  comment VARCHAR(300),
  rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
  updt DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE member_reset_pw (
	mail VARCHAR(100) PRIMARY KEY,
	token VARCHAR(128) NOT NULL,
	rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
  updt DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE notes(
  user_id CHAR(16) CHECK (8 <= LENGTH(user_id) AND LENGTH(user_id) <= 16),
  subject CHAR(4) CHECK (LENGTH(subject) = 4),
  subject_lesson CHAR(2) CHECK (LENGTH(subject_lesson) = 2),
  subject_page CHAR(2) NOT NULL,
  content VARCHAR(1000) NOT NULL,
  rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
  updt DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(user_id, subject, subject_lesson, subject_page)
);

CREATE TABLE programs(
	program CHAR(4) PRIMARY KEY,
	program_name VARCHAR(25) UNIQUE,
	description VARCHAR(300) DEFAULT '',
  importance INT DEFAULT 5,
  status CHAR(1) DEFAULT '1',
  rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
  updt DATETIME DEFAULT CURRENT_TIMESTAMP
);

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
