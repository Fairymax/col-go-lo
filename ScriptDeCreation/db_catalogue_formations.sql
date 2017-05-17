-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 10.0.1              
-- * Generator date: Jan 10 2017              
-- * Generation date: Wed May 17 14:25:18 2017 
-- * LUN file: H:\Projet\P_GesProj2\Projet CatalogueCours\Depot GitHub\col-go-lo\ScriptDeCreation\db_lessonCatalog-MCD_MLD.lun 
-- * Schema: db_mld/1-1 
-- ********************************************* 


-- Database Section
-- ________________ 

DROP DATABASE IF EXISTS db_lessoncatalog;
CREATE DATABASE IF NOT EXISTS db_lessoncatalog CHARACTER SET 'latin1';
use db_lessoncatalog;


-- Tables Section
-- _____________ 

create table t_former (
     idUser int not null,
     constraint FKt_u_t_f_ID primary key (idUser));

create table t_lesson (
     idLesson int not null auto_increment,
     lesLabel varchar(30) not null,
     lesStartDate date not null,
     lesDuration varchar(3) not null,
     lesLessonDate int not null,
     constraint ID_t_lesson_ID primary key (idLesson));

create table t_login (
     idLogin varchar(30) not null,
     idUser int not null,
     logPassword Text not null,
     constraint ID_t_login_ID primary key (idLogin),
     constraint FKreceive_ID unique (idUser));

create table t_register (
     idLesson int not null,
     idUser int not null,
     constraint ID_t_register_ID primary key (idUser, idLesson));

create table t_student (
     idUser int not null,
     constraint FKt_u_t_s_ID primary key (idUser));

create table t_teached (
     idUser int not null,
     idLesson int not null,
     constraint ID_t_teached_ID primary key (idUser, idLesson));

create table t_users (
     idUser int not null auto_increment,
     useLastName varchar(30) not null,
     useFirstName varchar(30) not null,
     useLocation TinyText not null,
     useEmail TinyText not null,
     usePhoneNumber varchar(13) not null,
     useProfession varchar(50) not null,
     useAVSNumber varchar(25) not null,
     t_student int,
     t_former int,
     constraint ID_t_users_ID primary key (idUser));


-- Constraints Section
-- ___________________ 

alter table t_former add constraint FKt_u_t_f_FK
     foreign key (idUser)
     references t_users (idUser);

-- Not implemented
-- alter table t_lesson add constraint ID_t_lesson_CHK
--     check(exists(select * from t_register
--                  where t_register.idLesson = idLesson)); 

alter table t_login add constraint FKreceive_FK
     foreign key (idUser)
     references t_users (idUser);

alter table t_register add constraint FKt_r_t_s
     foreign key (idUser)
     references t_student (idUser);

alter table t_register add constraint FKt_r_t_l_FK
     foreign key (idLesson)
     references t_lesson (idLesson);

alter table t_student add constraint FKt_u_t_s_FK
     foreign key (idUser)
     references t_users (idUser);

alter table t_teached add constraint FKt_t_t_l_FK
     foreign key (idLesson)
     references t_lesson (idLesson);

alter table t_teached add constraint FKt_t_t_f
     foreign key (idUser)
     references t_former (idUser);

alter table t_users add constraint EXCL_t_users
     check((t_student is not null and t_former is null)
           or (t_student is null and t_former is not null)
           or (t_student is null and t_former is null)); 


-- Index Section
-- _____________ 

create unique index FKt_u_t_f_IND
     on t_former (idUser);

create unique index ID_t_lesson_IND
     on t_lesson (idLesson);

create unique index ID_t_login_IND
     on t_login (idLogin);

create unique index FKreceive_IND
     on t_login (idUser);

create unique index ID_t_register_IND
     on t_register (idUser, idLesson);

create index FKt_r_t_l_IND
     on t_register (idLesson);

create unique index FKt_u_t_s_IND
     on t_student (idUser);

create unique index ID_t_teached_IND
     on t_teached (idUser, idLesson);

create index FKt_t_t_l_IND
     on t_teached (idLesson);

create unique index ID_t_users_IND
     on t_users (idUser);


/*
Chargement des données
*/

/*
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
INFILE 'D://DATA/P_GestProj2/CSV/t_users.csv'
INTO TABLE t_users
CHARACTER SET "latin1"
COLUMNS TERMINATED BY ';'
ENCLOSED BY '"'
ESCAPED BY '\t'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES

LOAD DATA
INFILE 'D://DATA/P_GestProj2/CSV/t_login.csv'
INTO TABLE t_login
CHARACTER SET "latin1"
COLUMNS TERMINATED BY ';'
ENCLOSED BY '"'
ESCAPED BY '\t'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES

LOAD DATA
INFILE 'D://DATA/P_GestProj2/CSV/t_former.csv'
INTO TABLE t_former
CHARACTER SET "latin1"
COLUMNS TERMINATED BY ';'
ENCLOSED BY '"'
ESCAPED BY '\t'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES


LOAD DATA
INFILE 'D://DATA/P_GestProj2/CSV/t_student.csv'
INTO TABLE t_student
CHARACTER SET "latin1"
COLUMNS TERMINATED BY ';'
ENCLOSED BY '"'
ESCAPED BY '\t'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES

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
IGNORE 1 LINES;*/