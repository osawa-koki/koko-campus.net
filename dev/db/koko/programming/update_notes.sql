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