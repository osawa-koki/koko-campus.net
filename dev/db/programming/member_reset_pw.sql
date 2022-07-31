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