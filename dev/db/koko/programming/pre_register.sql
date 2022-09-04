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