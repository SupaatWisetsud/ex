CREATE DATABASE it_6008 CHARACTER SET utf8 COLLATE utf8_bin;

CREATE TABLE student (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    year VARCHAR(1) NOT NULL,
    branch VARCHAR(20) NOT NULL,
    grade VARCHAR(10) NOT NULL
);


CREATE TABLE user (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(250) NOT NULL
);

INSERT INTO student VALUES ("0001", "นาย กิติชัย ทองดี", "3", "com sci", "3.5"), ("0002", "นาง ชัยดี ดีงาม", "4", "IT", "2.5")