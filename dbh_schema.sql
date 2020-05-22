/* Do not install MSSQL EXTENSIONS it will show errors*/
/*if you have foreign keys drop child first then parents*/


DROP TABLE IF EXISTS users_session;

DROP TABLE IF EXISTS users;

DROP TABLE IF EXISTS grps;

DROP TABLE IF EXISTS forces_patients;

DROP TABLE IF EXISTS family_patients;

DROP TABLE IF EXISTS visits;

DROP TABLE IF EXISTS lab_reports;

DROP TABLE IF EXISTS lab_tests_requests;

DROP TABLE IF EXISTS medical_report_info;

DROP TABLE IF EXISTS prescriptions;



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
INSERT INTO grps(name, permissions) 
VALUES('Administrator', '{"admin":1}');

#table to hold admitted users
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

#table to hold unadmitted users
CREATE TABLE unadmitted_users (                     
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


#table to hold the details of patients who are military personnel
 CREATE TABLE forces_patients (
    force_id VARCHAR(32) NOT NULL,
    `force` VARCHAR(32) NOT NULL,
    first_name VARCHAR(32) NOT NULL,
    last_name VARCHAR(32) NOT NULL,
    NIC VARCHAR(20) NOT NULL,
    gender VARCHAR(15) NOT NULL,
    regiment VARCHAR(32) NOT NULL,
    `rank` VARCHAR(32) NOT NULL,
    email VARCHAR(64) NOT NULL,
    date_of_birth VARCHAR(20) NOT NULL,
    height double NOT NULL,
    weight double NOT NULL,
    address VARCHAR(256) NOT NULL,
    mobile INT(11) NOT NULL,
    photo VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (NIC)
 ) ;


#table to hold the details of patients who are family members of a military personnel
CREATE TABLE family_patients (
    force_id VARCHAR(20) NOT NULL,
    `force` VARCHAR(32) NOT NULL,
    relation VARCHAR(32) NOT NULL,
    first_name VARCHAR(32) NOT NULL,
    last_name VARCHAR(32) NOT NULL,
    NIC VARCHAR(20) NOT NULL,
    gender VARCHAR(15) NOT NULL,
    email VARCHAR(32) NOT NULL,
    date_of_birth VARCHAR(20) NOT NULL,
    height float NOT NULL,
    weight float NOT NULL,
    address VARCHAR(100) NOT NULL,
    mobile INT(15) NOT NULL,
    photo VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (NIC)
 ); 


#table to hold visit details of patients for each visit
CREATE TABLE visits (
    id INT(255) AUTO_INCREMENT PRIMARY KEY,
    nic VARCHAR(16) NOT NULL ,
    doa DATE NOT NULL,
    reason MEDIUMTEXT DEFAULT NULL,
    history MEDIUMTEXT DEFAULT NULL,
    cm MEDIUMTEXT DEFAULT NULL,
    doctor VARCHAR(255) DEFAULT NULL,
    ward VARCHAR(255) DEFAULT NULL,
    details MEDIUMTEXT DEFAULT NULL,
    Prescription TEXT DEFAULT NULL,
    prescription_issued VARCHAR(255) DEFAULT NULL,
    Discharged VARCHAR(50) DEFAULT NULL,
    discharge_date DATE DEFAULT NULL,
    discharge_summary MEDIUMTEXT DEFAULT NULL
 );
 
 
 #table to hold details of lab reports
 CREATE TABLE lab_reports (
    id INT(255) AUTO_INCREMENT PRIMARY KEY,
    nic VARCHAR(20) NOT NULL,
    day DATE NOT NULL,
    testType VARCHAR(32) NOT NULL,
    image longblob NOT NULL
 );
 
 
 #table to hold details of lab test requests
 CREATE TABLE lab_tests_requests(
	nic VARCHAR(16) PRIMARY KEY,
    serializedGeneralLabTestRequest TEXT DEFAULT NULL,
    serializedBasicECGRequest TEXT DEFAULT NULL,
	serializedABPMonitoringRequest TEXT DEFAULT NULL,
    serializedHolterMonitoringRequest TEXT DEFAULT NULL,
    serializedHistopathologyRequest TEXT DEFAULT NULL,
    serializedImmunoassayRequest TEXT DEFAULT NULL,
    serializedXRayRequest TEXT DEFAULT NULL
);


#table to hold details of the medical report
CREATE TABLE medical_report_info(
	force_id VARCHAR(32) NOT NULL PRIMARY KEY,
    nic VARCHAR(32) NOT NULL,
    date DATE NOT NULL,
    serializedPersonalHistory TEXT NOT NULL,
    serializedHospitalTreatments TEXT NOT NULL,
    serializedOtherMedicalTreatments TEXT NOT NULL,
    otherInfo TEXT NOT NULL,
    summary TEXT NOT NULL,
    serializedEyes TEXT NOT NULL,
    serializedEarsNoseThroat TEXT NOT NULL,
    serializedUpperLimbsLocomotion TEXT NOT NULL,
    serializedPhysicalCapacityObject TEXT NOT NULL,
    serializedMentalCapacity TEXT NOT NULL,
    serializedForm10 TEXT NOT NULL,
    serializedSpecialistReportObject TEXT NOT NULL
    );
 
 
 #table to hold prescriptions
 CREATE TABLE prescriptions(
	id INT(255) AUTO_INCREMENT PRIMARY KEY,
	Prescription VARCHAR(255) NOT NULL,
    nic VARCHAR(15) NOT NULL,
    doa DATE NOT NULL,
    prescription_issued VARCHAR(15) NOT NULL
);
 
