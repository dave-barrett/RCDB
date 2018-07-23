CREATE DATABASE dbPortal;

CREATE TABLE dbPortal.tblPortal (
  p_id INT NOT NULL AUTO_INCREMENT,
  p_globalmsg VARCHAR(255),
  p_globalmsg_start DATETIME,
  p_globalmsg_life INT(4),
  p_mods INT(5)
  PRIMARY KEY (p_id)
);

CREATE TABLE dbPortal.tblUsers (
  u_id INT NOT NULL AUTO_INCREMENT,
  u_firstname VARCHAR(75) NOT NULL,
  u_lastname VARCHAR(75),
  u_username VARCHAR(100),
  u_password VARCHAR(255),
  u_email VARCHAR(125),
  u_lastlogon DATETIME 
  u_loggedon INT(1),
  u_active INT(1),
  u_regdate DATETIME 
  u_accesscode VARCHAR(25),
  PRIMARY KEY (u_id)
);

