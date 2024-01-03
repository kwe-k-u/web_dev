
DROP DATABASE IF EXISTS easygo_sample;
CREATE DATABASE easygo_sample;
USE easygo_sample;

CREATE TABLE users(
	user_id INT PRIMARY KEY AUTO_INCREMENT,
	user_name VARCHAR(50),
	user_email VARCHAR(50),
	user_pass VARCHAR(100),
	date_created DATETIME DEFAULT CURRENT_TIMESTAMP
);




DROP FUNCTION IF exists user_signup;
DELIMITER //
-- Creates a user account. Returns 0 if successfully and 1 if failed
CREATE FUNCTION user_signup(
	in_name VARCHAR(50),
	in_email VARCHAR(50),
	in_password VARCHAR(100)

) RETURNS TINYINT
BEGIN
	DECLARE temp VARCHAR(100);

	select user_id into temp from users where user_email = in_email;

	-- A user already exists with that email. Fail account creation
	if temp is not null then
	return 1;
	end if;
	INSERT INTO users(user_email,user_name,user_pass) VALUES (in_email,in_name,in_password);
	RETURN 0;
END//
DELIMITER ;


DROP FUNCTION IF exists login_user
DELIMITER //
-- Logs in a user. Returns the user id if successful or null if failed
CREATE FUNCTION login_user (
	in_email varchar(50),
	in_password varchar(100)
) RETURNS INT
BEGIN
	DECLARE result_id INT;
	SELECT user_id into result_id FROM users where user_email = in_email and user_pass = in_password;
	return result_id;

END //
DELIMITER ;



DROP PROCEDURE IF EXISTS get_users;
DELIMITER //
CREATE PROCEDURE get_users ()
begin
	select * from users;
end //
DELIMITER ;


-- Offset 1 as user id
SELECT user_signup("kweku","kweku@email","passwording hashes");