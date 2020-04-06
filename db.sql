CREATE TABLE users(
	id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	username varchar(15) NOT NULL,
	password varchar(50) NOT NULL,
	role varchar(15) NOT NULL,
	name varchar(50) NOT NULL,
	date_created datetime DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users(username, password, role, name) value('admin', 'admin', 'admin', 'Administrator')