
DELIMITER //
CREATE PROCEDURE pre_register(IN _mail VARCHAR(50), IN _token VARCHAR(128))
BEGIN
	SET @mail = _mail;
    SET @token = _token;

	SET @existCheck = EXISTS(
		SELECT mail
		FROM pre_member
		WHERE mail = @mail
	);

	INSERT INTO pre_member(mail, token)
	SELECT @mail, @token
	WHERE NOT @existCheck;

	UPDATE pre_member
	SET token = @token,
		updt = CURRENT_TIMESTAMP
	WHERE mail = @mail
		AND @existCheck;
END
//

DELIMITER //
CREATE PROCEDURE register(IN _user_id VARCHAR(16), IN _mail VARCHAR(50), IN _pw VARCHAR(128), IN _name VARCHAR(25))
BEGIN

	INSERT INTO member(user_id, mail, pw, name)
	VALUES(_user_id, _mail, _pw, _name);

	DELETE FROM pre_member
	WHERE mail = _mail;
END;
//

DELIMITER //
CREATE PROCEDURE member_pre_reset_pw(IN _mail VARCHAR(50), IN _token VARCHAR(128))
BEGIN
	SET @mail = _mail;
    SET @token = _token;

	SET @existCheck = EXISTS(
		SELECT mail
		FROM member_reset_pw
		WHERE mail = @mail
	);

	INSERT INTO member_reset_pw(mail, token)
	SELECT @mail, @token
	WHERE NOT @existCheck;

	UPDATE member_reset_pw
	SET token = @token,
		updt = CURRENT_TIMESTAMP
	WHERE mail = @mail
		AND @existCheck;
END
//

DELIMITER //
CREATE PROCEDURE member_reset_pw(IN _mail VARCHAR(50), IN _pw VARCHAR(128))
BEGIN
	SET @mail = _mail;
    SET @pw = _pw;

	UPDATE member
	SET pw = @pw
	WHERE mail = @mail;

	DELETE FROM member_reset_pw
	WHERE mail = @mail;
END
//

DELIMITER //
CREATE PROCEDURE update_notes(IN _user_id CHAR(16), IN _subject CHAR(4), IN _subject_lesson CHAR(2),  IN _subject_page CHAR(2), IN _content VARCHAR(1000))
BEGIN
	SET @existCheck = EXISTS(
		SELECT user_id
		FROM notes
		WHERE user_id=_user_id AND subject=_subject AND subject_lesson=_subject_lesson AND subject_page=_subject_page
	);

	INSERT INTO notes(user_id, subject, subject_lesson, subject_page, content)
	SELECT _user_id, _subject, _subject_lesson, _subject_page, _content
	WHERE NOT @existCheck;

	UPDATE notes
	SET content = _content
	WHERE @existCheck AND user_id=_user_id AND subject=_subject AND subject_lesson=_subject_lesson AND subject_page=_subject_page;
END
//
