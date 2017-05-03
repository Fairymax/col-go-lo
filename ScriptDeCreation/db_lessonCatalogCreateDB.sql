DROP DATABASE IF EXISTS db_lessoncatalog2;
CREATE DATABASE IF NOT EXISTS db_lessoncatalog2 CHARACTER SET 'latin1';
use db_lessoncatalog2;

#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: t_former
#------------------------------------------------------------

CREATE TABLE t_former(
        idFormer       int (11) Auto_increment  NOT NULL ,
        forLastname    Varchar (30) NOT NULL ,
        forFirstname   Varchar (30) NOT NULL ,
        forLocation    TinyText NOT NULL ,
        forEmail       Varchar (30) NOT NULL ,
        forPhoneNumber Varchar (30) ,
        forProfession  Varchar (50) ,
        forAVSNumber   Varchar (25) ,
        PRIMARY KEY (idFormer )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_lesson
#------------------------------------------------------------

CREATE TABLE t_lesson(
        idLesson      int (11) Auto_increment  NOT NULL ,
        lesLabel      Varchar (30) NOT NULL ,
        lesStartDate  Date NOT NULL ,
        lesDuration   Varchar (3) ,
        lesLessonDate Int ,
        PRIMARY KEY (idLesson )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_student
#------------------------------------------------------------

CREATE TABLE t_student(
        idStudent      int (11) Auto_increment  NOT NULL ,
        stuLastname    Varchar (30) NOT NULL ,
        stuFirstname   Varchar (30) NOT NULL ,
        stuLocation    TinyText NOT NULL ,
        stuEmail       Varchar (30) NOT NULL ,
        stuPhoneNumber Varchar (13) ,
        stuAVSNumber   Varchar (25) ,
        PRIMARY KEY (idStudent )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_login
#------------------------------------------------------------

CREATE TABLE t_login(
        login    Varchar (30) NOT NULL ,
        password Varchar (30) NOT NULL ,
        PRIMARY KEY (login )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_register
#------------------------------------------------------------

CREATE TABLE t_register(
        idStudent Int NOT NULL ,
        idLesson  Int NOT NULL ,
        PRIMARY KEY (idStudent ,idLesson )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_teached
#------------------------------------------------------------

CREATE TABLE t_teached(
        idLesson Int NOT NULL ,
        idFormer Int NOT NULL ,
        PRIMARY KEY (idLesson ,idFormer )
)ENGINE=InnoDB;

ALTER TABLE t_register ADD CONSTRAINT FK_t_register_idStudent FOREIGN KEY (idStudent) REFERENCES t_student(idStudent);
ALTER TABLE t_register ADD CONSTRAINT FK_t_register_idLesson FOREIGN KEY (idLesson) REFERENCES t_lesson(idLesson);
ALTER TABLE t_teached ADD CONSTRAINT FK_t_teached_idLesson FOREIGN KEY (idLesson) REFERENCES t_lesson(idLesson);
ALTER TABLE t_teached ADD CONSTRAINT FK_t_teached_idFormer FOREIGN KEY (idFormer) REFERENCES t_former(idFormer);

/*
Chargement des données
*/

LOAD DATA
INFILE 'D://DATA/P_GestProj2/CSV/t_former.csv'
INTO TABLE t_former
CHARACTER SET "latin1"
COLUMNS TERMINATED BY ';'
ENCLOSED BY '"'
ESCAPED BY '\t'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
SET idFormer=NULL;

LOAD DATA
INFILE 'D://DATA/P_GestProj2/CSV/t_lesson.csv'
INTO TABLE t_lesson
CHARACTER SET "latin1"
COLUMNS TERMINATED BY ';'
ENCLOSED BY '"'
ESCAPED BY '\t'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
SET idLesson=NULL;

LOAD DATA
INFILE 'D://DATA/P_GestProj2/CSV/t_student.csv'
INTO TABLE t_student
CHARACTER SET "latin1"
COLUMNS TERMINATED BY ';'
ENCLOSED BY '"'
ESCAPED BY '\t'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
SET idStudent=NULL;

LOAD DATA
INFILE 'D://DATA/P_GestProj2/CSV/t_register.csv'
INTO TABLE t_register
CHARACTER SET "latin1"
COLUMNS TERMINATED BY ';'
ENCLOSED BY '"'
ESCAPED BY '\t'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA
INFILE 'D://DATA/P_GestProj2/CSV/t_teached.csv'
INTO TABLE t_teached
CHARACTER SET "latin1"
COLUMNS TERMINATED BY ';'
ENCLOSED BY '"'
ESCAPED BY '\t'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;