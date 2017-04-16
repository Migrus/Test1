CONNECT MAB_TRACK;

CREATE TABLE aca (
  Aca_ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  ACA_Name CHAR(50) NOT NULL,
  ACA_Bname CHAR(50) NOT NULL
);
CREATE TABLE aca_user (
  User_ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Aca_ID INT UNSIGNED NOT NULL,
  Fname CHAR(50) NOT NULL,
  Lname CHAR(50) NOT NULL,
  Type SET('CUSTOMER', 'ADMINISTRATOR') NOT NULL,
  FOREIGN KEY (Aca_ID) REFERENCES aca (Aca_ID)
);
CREATE TABLE aca_mab (
  Mac_ID BIGINT UNSIGNED NOT NULL,
  Valid_From DATETIME DEFAULT CURRENT_TIMESTAMP,
  Valid_Until DATETIME DEFAULT '1000-01-01 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  Aca_ID INT UNSIGNED NOT NULL,
  State SET('ACTIVE', 'PASSIVE') NOT NULL,
  PRIMARY KEY (Mac_ID,Valid_From,Valid_Until),
  FOREIGN KEY (Aca_ID) REFERENCES aca (Aca_ID)
);
CREATE TABLE aca_mab_metadata (
  Mac_ID BIGINT UNSIGNED NOT NULL,
  Note VARCHAR (1000) NOT NULL,
  Action INT(100) UNSIGNED NOT NULL,
  PRIMARY KEY (Mac_ID),
  FOREIGN KEY (Mac_ID) REFERENCES aca_mab (Mac_ID)
);
