DELIMITER //
CREATE PROCEDURE register(IN _user_id VARCHAR(16), IN _mail VARCHAR(50), IN _pw VARCHAR(128), IN _name VARCHAR(25))
BEGIN

	INSERT INTO member(user_id, mail, pw, name)
	VALUES(_user_id, _mail, _pw, _name);
	
	DELETE FROM pre_member
	WHERE mail = _mail;
END;
//