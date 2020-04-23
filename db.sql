CREATE TABLE users(
	id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	username varchar(15) NOT NULL,
	password varchar(50) NOT NULL,
	role varchar(15) NOT NULL,
	name varchar(50) NOT NULL,
	date_created datetime DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO users(username, password, role, name) value('admin', 'admin', 'admin', 'Administrator');

CREATE TABLE pricing(
	id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	from_time time NOT NULL,
	to_time time NOT NULL,
	field_name varchar(5) NOT NULL,
	field_type varchar(15) NOT NULL,
	field_group varchar(15) NOT NULL,
	price double NOT NULL
);
INSERT INTO pricing(from_time, to_time, field_name, field_type, field_group, price) 
value
 ('07:00:00', '17:00:00', 'A', 'small', 'S1', 5)
,('17:00:00', '22:00:00', 'A', 'small', 'S1', 10)
,('07:00:00', '17:00:00', 'B', 'small', 'S1', 5)
,('17:00:00', '22:00:00', 'B', 'small', 'S1', 10)
,('07:00:00', '17:00:00', 'C', 'small', 'S1', 5)
,('17:00:00', '22:00:00', 'C', 'small', 'S1', 10)
,('07:00:00', '17:00:00', 'D', 'small', 'S1', 5)
,('17:00:00', '22:00:00', 'D', 'small', 'S1', 10)
,('07:00:00', '17:00:00', 'E', 'big', 'S1', 10)
,('17:00:00', '22:00:00', 'E', 'big', 'S1', 20)
;

CREATE TABLE booking(
	id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	c_name varchar(25) NOT NULL,
	c_phone varchar(15) NOT NULL,
	the_date date DEFAULT CURRENT_DATE,
	from_time time NOT NULL,
	to_time time NOT NULL,
	field_name varchar(5) NOT NULL,
	field_type varchar(15) NOT NULL,
	field_group varchar(15) NOT NULL,
	price double NOT NULL,
	water double DEFAULT NULL,
	extra double DEFAULT NULL,
	remark text DEFAULT NULL,
	status varchar(15) DEFAULT NULL,
	date_created datetime DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO booking(c_name, c_phone, the_date, from_time, to_time, field_name, field_type, field_group, price)
value
 ('Kimheang', '1234567890', '2020-04-06', '07:00:00', '08:00:00', 'A', 'small', 'S1', 5)
,('Kimheang', '1234567890', '2020-04-06', '07:00:00', '08:00:00', 'B', 'small', 'S1', 5)
,('Kimheang', '1234567890', '2020-04-07', '18:00:00', '19:00:00', 'C', 'small', 'S1', 10)
,('Kimheang', '1234567890', '2020-04-08', '18:00:00', '19:00:00', 'E', 'big', 'S1', 20)
;