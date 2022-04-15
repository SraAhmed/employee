CREATE TABLE admin (
                        id INT(15) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                         email varchar(255) NOT NULL,
                         password varchar(75) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE employee (
`approval` TINYINT(1) NOT NULL DEFAULT '0',
`id` INT(15) NOT NULL AUTO_INCREMENT PRIMARY KEY,
fullName varchar(100) NOT NULL,
nameEng varchar(100) NOT NULL,
num int(11) NOT NULL,
operatorNum int(11) NULL,
state int(11) NOT NULL, 
section varchar(100) NOT NULL, 
noMobile int(11) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `admin` ADD UNIQUE(`email`); 
INSERT INTO `admin`(`email`, `password`) VALUES ('admin1@admin.com',1234); 