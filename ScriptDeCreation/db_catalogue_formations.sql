-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 10.0.1              
-- * Generator date: Jan 10 2017              
-- * Generation date: Tue May 16 16:05:37 2017 
-- * LUN file: D:\DATA\OnSaitJamais\db_catalogue_formations.lun 
-- * Schema: db_mld/1 
-- ********************************************* 


-- Database Section
-- ________________ 

DROP DATABASE IF EXISTS db_lessonCatalog;
CREATE DATABASE IF NOT EXISTS db_lessonCatalog CHARACTER SET 'latin1';
use db_lessonCatalog;

-- Tables Section
-- _____________ 

create table t_lesson (
     idLesson int not null auto_increment,
     lesLabel varchar(30) not null,
     lesStartDate date not null,
     lesDuration varchar(3) not null,
     lesLessonDate int not null,
     constraint ID_t_lesson_ID primary key (idLesson));

create table t_student (
     idUser int not null,
     constraint FKt_u_t_s_ID primary key (idUser));

create table t_former (
     idUser int not null,
     constraint FKt_u_t_f_ID primary key (idUser));

create table t_login (
     idLogin int not null auto_increment,
     idUser int not null,
     logPassword varchar(30) not null,
     constraint ID_t_login_ID primary key (idLogin),
     constraint FKreceive_ID unique (idUser));

create table t_register (
     idLesson int not null,
     idUser int not null,
     constraint ID_t_register_ID primary key (idUser, idLesson));

create table t_teached (
     idUser int not null,
     idLesson int not null,
     constraint ID_t_teached_ID primary key (idUser, idLesson));

create table t_users (
     idUser int not null auto_increment,
     useLastName varchar(30) not null,
     t_student int,
     t_former int,
     constraint ID_t_users_ID primary key (idUser));


-- Constraints Section
-- ___________________ 

-- Not implemented
-- alter table t_lesson add constraint ID_t_lesson_CHK
--     check(exists(select * from t_register
--                  where t_register.idLesson = idLesson)); 

alter table t_student add constraint FKt_u_t_s_FK
     foreign key (idUser)
     references t_users (idUser);

alter table t_former add constraint FKt_u_t_f_FK
     foreign key (idUser)
     references t_users (idUser);

alter table t_login add constraint FKreceive_FK
     foreign key (idUser)
     references t_users (idUser);

alter table t_register add constraint FKt_r_t_s
     foreign key (idUser)
     references t_student (idUser);

alter table t_register add constraint FKt_r_t_l_FK
     foreign key (idLesson)
     references t_lesson (idLesson);

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

create unique index ID_t_lesson_IND
     on t_lesson (idLesson);

create unique index FKt_u_t_s_IND
     on t_student (idUser);

create unique index FKt_u_t_f_IND
     on t_former (idUser);

create unique index ID_t_login_IND
     on t_login (idLogin);

create unique index FKreceive_IND
     on t_login (idUser);

create unique index ID_t_register_IND
     on t_register (idUser, idLesson);

create index FKt_r_t_l_IND
     on t_register (idLesson);

create unique index ID_t_teached_IND
     on t_teached (idUser, idLesson);

create index FKt_t_t_l_IND
     on t_teached (idLesson);

create unique index ID_t_users_IND
     on t_users (idUser);

