USE heroku_fac28c953799373;



CREATE TABLE IF NOT EXISTS  Users (
    user_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    email varchar(64) NOT NULL UNIQUE,
    first_name VARCHAR(16) NOT NULL,
    last_name VARCHAR(16) NOT NULL,
    user_name VARCHAR(64) NOT NULL,
    password VARCHAR(256) NOT NULL
);

CREATE TABLE IF NOT EXISTS Comments (
	comment_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
	creator_user_id BIGINT UNSIGNED NOT NULL,
    descript varchar(512),
     movie_title varchar(32),
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(creator_user_id) REFERENCES Users(user_id)
);
