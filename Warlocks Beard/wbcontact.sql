#********************************************************************
#   Script to create wbcontact database                                                                 
#   Name            Date             Descriptions                                                                 
#   Brandon         01/22/2021       Initial deployment                                                 
#*********************************************************************


DROP DATABASE IF EXISTS wbcontact;
CREATE DATABASE wbcontact;
USE wbcontact;

CREATE TABLE IF NOT EXISTS employee
(
	employeeID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	first_name VARCHAR(255) NOT NULL,
	last_name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS visitor
(
	visitorID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	first_name VARCHAR(255) NOT NULL,
	last_name VARCHAR(255) NOT NULL,
	visitor_email VARCHAR(255) NOT NULL,
	visitor_phone VARCHAR(20) NOT NULL,
	visitor_message VARCHAR(1000),
	vist_date DATETIME NOT NULL,
	employeeID INT NOT NULL,
	FOREIGN KEY (employeeID) REFERENCES employee(employeeID)
);

# INSERT test data 

INSERT INTO employee
(first_name, last_name)
VALUES
('Buster', 'Bronco'),
('Amy', 'Schumer'),
('Brad', 'Pitt'),
('Camilla', 'Cabello'),
('David', 'Draiman'),
('Ernest', 'Hemmingway'),
('Frank', 'Sinatra'),
('Gucci', 'Mane'),
('Hello', 'Goodbye'),
('Inigo', 'Montoya'),
('Juice', 'Wrld'),
('Kanye', 'West'),
('Lemme', 'Kilmister'),
('Mega', 'Deth'),
('No', 'Doubt'),
('Ozzy', 'Osbourne'),
('Phil', 'Collins'),
('Quantum', 'Science'),
('Rage', 'ATM'),
('Simple', 'Plan');

INSERT INTO visitor
(first_name, last_name, visitor_email, visitor_phone, visitor_message, vist_date, employeeID)
VALUES
('a', 'b', 'c','2086028410', 'hello', NOW(), 1),
('d', 'e', 'f','2086028410', 'hello', NOW(), 2),
('g', 'h', 'i','2086028410', 'hello', NOW(), 3),
('j', 'k', 'l','2086028410', 'hello', NOW(), 4),
('m', 'n', 'o','2086028410', 'hello', NOW(), 5),
('p', 'q', 'r','2086028410', 'hello', NOW(), 6),
('s', 't', 'u','2086028410', 'hello', NOW(), 7),
('v', 'w', 'x','2086028410', 'hello', NOW(), 8),
('y', 'z', 'aa','2086028410', 'hello', NOW(), 9),
('bb', 'cc', 'dd','2086028410', 'hello', NOW(), 10),
('ee', 'ff', 'gg','2086028410', 'hello', NOW(), 11),
('hh', 'ii', 'jj','2086028410', 'hello', NOW(), 12),
('kk', 'll', 'mm','2086028410', 'hello', NOW(), 13),
('nn', 'oo', 'pp','2086028410', 'hello', NOW(), 14),
('qq', 'rr', 'ss','2086028410', 'hello', NOW(), 15),
('tt', 'uu', 'vv','2086028410', 'hello', NOW(), 16),
('ww', 'xx', 'yy','2086028410', 'hello', NOW(), 17),
('zz', 'aaa', 'bbb','2086028410', 'hello', NOW(), 18),
('ccc', 'ddd', 'eee','2086028410', 'hello', NOW(), 19),
('fff', 'ggg', 'hhh','2086028410', 'hello', NOW(), 20);



