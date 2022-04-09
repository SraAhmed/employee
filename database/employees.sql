CREATE TABLE admin (
                         id int(15) NOT NULL,
                         email varchar(255) NOT NULL,
                         password varchar(75) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE employee (
id int(15) NOT NULL,
fullName varchar(100) NOT NULL,
nameEng varchar(100) NOT NULL,
  num int(11) NOT NULL,
 operatorNum int(11) NULL,
 state int(11) NOT NULL, 
   section varchar(100) NOT NULL, 
     noMobile int(11) NOT NULL  
     ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;