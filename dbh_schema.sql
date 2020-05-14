/*if you have foreign keys drop child first then parents*/


DROP TABLE IF EXISTS users_session;

DROP TABLE IF EXISTS users;

DROP TABLE IF EXISTS grps;




#_____________________________________________Table Schema________________________________________#
/* In case of Foreign Keys declare parent first then child */

#table to hold staff groups
CREATE TABLE grps (
id INT(10) AUTO_INCREMENT,
name VARCHAR(20) NOT NULL,
permissions TEXT NOT NULL,
PRIMARY KEY (id)
);


#for now permissions are made null
INSERT INTO grps (name,permissions)
VALUES ('Doctor','-');
INSERT INTO grps (name,permissions)
VALUES ('Nurse','-');
INSERT INTO grps (name,permissions)
VALUES ('Lab Staff','-');
INSERT INTO grps (name,permissions)
VALUES ('Admission Officer','-');

#table to hold users
CREATE TABLE users (                     
id INT(255) AUTO_INCREMENT,     
user_first VARCHAR(50) NOT NULL,
user_last VARCHAR(50) NOT NULL,
user_uid VARCHAR(50) UNIQUE NOT NULL,
user_pwd VARCHAR(255) NOT NULL,
user_joined DATETIME NOT NULL,
user_group INT(10) NOT NULL, 
user_imgstatus int(2) NOT NULL, 
user_email VARCHAR(50) NOT NULL,
user_mobile INT(20) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (user_group) REFERENCES grps(id)
);


#table to hold logged in users
CREATE TABLE users_session (
id INT(255) AUTO_INCREMENT,
user_id VARCHAR(50) UNIQUE NOT NULL,
hash VARCHAR(50) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (user_id) REFERENCES users(user_uid)
);