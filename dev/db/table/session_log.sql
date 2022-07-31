CREATE TABLE session_log(
    cookie CHAR(100) PRIMARY KEY,
    user_id CHAR(16) NULL,
    user_agent VARCHAR(30) NULL,
    x_forwarded_for VARCHAR(20) NULL,
    referer VARCHAR(50) NULL,
    sec_ch_ua_platform VARCHAR(30) NULL,
    rgdt datetime DEFAULT CURRENT_TIMESTAMP,
    updt datetime DEFAULT CURRENT_TIMESTAMP
)