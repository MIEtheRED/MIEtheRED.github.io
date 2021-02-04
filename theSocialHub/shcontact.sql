#********************************************************************
#   Script to create shcontact database                                                                 
#   Name            Date             Descriptions                                                                 
#   Brandon         01/31/2021       Initial deployment
#
#	For The Social Hub   Github Repo...
#                                                 
#*********************************************************************


DROP DATABASE IF EXISTS shcontact;
CREATE DATABASE shcontact;
USE shcontact;

CREATE TABLE IF NOT EXISTS employee
(
	employeeID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	first_name VARCHAR(255) NOT NULL,
	last_name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS visitor
(
	visitorID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	visitor_name VARCHAR(255) NOT NULL,
	visitor_email VARCHAR(255) NOT NULL,
	visitor_msg VARCHAR(1000) NOT NULL,
	visit_date DATETIME NOT NULL,
	employeeID INT NOT NULL,
	FOREIGN KEY (employeeID) REFERENCES employee(employeeID)
);

# INSERT test data 

INSERT INTO employee
(first_name, last_name)
VALUES
('Buster', 'Bronco'),
('Amy', 'Schumer'),
('Brad', 'Pitt');

INSERT INTO visitor
(visitor_name, visitor_email,  visitor_msg, visit_date, employeeID)
VALUES
('a', 'c', 'hello', NOW(), 1),
('d', 'e', 'hello', NOW(), 2),
('g', 'h', 'hello', NOW(), 3);


# add application user

GRANT SELECT, INSERT, UPDATE, DELETE
ON shcontact.*
to sh_user
IDENTIFIED by 'Pa$$w0rd';



