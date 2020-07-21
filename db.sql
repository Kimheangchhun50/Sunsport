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
	-- water double DEFAULT NULL,
	-- extra double DEFAULT NULL,
	remark text DEFAULT NULL,
	status varchar(15) DEFAULT NULL,
	user_id int(11) DEFAULT 0,
	date_created datetime DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO booking(c_name, c_phone, the_date, from_time, to_time, field_name, field_type, field_group, price)
value

('Adam', '012246985', '2020-04-01', '18:00', '19:00', 'A', 'small', 'S1', 5)
,('Samnang', '012365479', '2020-04-01', '18:00', '19:00', 'B', 'small', 'S1', 5)
,('Sombath', '012563248', '2020-04-01', '19:00', '20:00', 'C', 'small', 'S1', 5)
,('Mongkul', '0962354678', '2020-04-01', '19:00', '20:00', 'D', 'small', 'S1', 5)

,('Vibol', '098263548', '2020-04-02', '19:00', '20:00', 'A', 'small', 'S1', 5)
,('Socheat', '089248763', '2020-04-02', '19:00', '20:00', 'B', 'small', 'S1', 5)
,('Vichet', '0235469871', '2020-04-02', '19:00', '20:00', 'C', 'small', 'S1', 5)
,('Bunrith', '015236478', '2020-04-02', '20:00', '21:00', 'A', 'small', 'S1', 5)

,('Vuthy', '095789654', '2020-04-04', '08:00', '09:00', 'A', 'small', 'S1', 5)
,('Mony', '012365478', '2020-04-04', '08:00', '09:00', 'B', 'small', 'S1', 5)
,('Rotha', '089456987', '2020-04-04', '08:00', '09:00', 'C', 'small', 'S1', 5)
,('Bunheng', '012478965', '2020-04-04', '10:00', '11:00', 'E', 'big', 'S1', 10)
,('Vireaksith', '023654792', '2020-04-04', '14:00', '15:00', 'A', 'small', 'S1', 5)
,('Giva', '012222345', '2020-04-04', '14:00', '15:00', 'C', 'small', 'S1', 5)
,('Malin', '023654789', '2020-04-04', '16:00', '17:00', 'A', 'small', 'S1', 5)

,('Viroth', '085330320', '2020-04-05', '10:00', '11:00', 'A', 'small', 'S1', 5)
,('Sovann', '012563214', '2020-04-05', '10:00', '11:00', 'B', 'small', 'S1', 5)
,('Monyvann', '069875432', '2020-04-05', '10:00', '11:00', 'C', 'small', 'S1', 5)
,('Sokchea', '0962546789', '2020-04-05', '10:00', '11:00', 'D', 'small', 'S1', 5)
,('Sievly', '017892354', '2020-04-05', '18:00', '19:00', 'C', 'small', 'S1', 5)
,('Vanda', '015348566', '2020-04-05', '18:00', '19:00', 'D', 'small', 'S1', 5)

,('Rathana', '0972589631', '2020-04-07', '18:00', '19:00', 'A', 'small', 'S1', 5)
,('Kimhong', '017456322', '2020-04-10', '18:00', '19:00', 'A', 'small', 'S1', 5)
,('Lyfong', '078255635', '2020-04-11', '18:00', '19:00', 'A', 'small', 'S1', 5)
,('David', '016325478', '2020-04-12', '20:00', '21:00', 'A', 'small', 'S1', 5)
,('Vichai', '012455589', '2020-04-13', '20:00', '21:00', 'A', 'small', 'S1', 5)
;

CREATE TABLE billing(
	id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	booking_id int(11) NOT NULL,
	billing_number int(11) NOT NULL,
	price double NOT NULL,
	water double DEFAULT NULL,
	extra double DEFAULT NULL,
	remark text DEFAULT NULL,
	user_id int(11) DEFAULT 0,
	date_created datetime DEFAULT CURRENT_TIMESTAMP
);