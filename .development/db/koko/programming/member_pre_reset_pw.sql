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