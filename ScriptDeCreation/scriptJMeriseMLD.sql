#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: t_Telephone
#------------------------------------------------------------

CREATE TABLE t_Telephone(
        idTelephone   int (11) Auto_increment  NOT NULL ,
        telModele     Varchar (25) NOT NULL ,
        telPrix       Varchar (6) NOT NULL ,
        telAutonomie  Varchar (10) NOT NULL ,
        telCpu        Varchar (10) NOT NULL ,
        telTaille     Varchar (25) NOT NULL ,
        telRam        Varchar (5) NOT NULL ,
        telDimension  Varchar (20) NOT NULL ,
        telResolution Varchar (20) NOT NULL ,
        telStockage   Varchar (8) NOT NULL ,
        telApnAvant   Varchar (8) NOT NULL ,
        telApnArriere Varchar (8) NOT NULL ,
        telEcran      Varchar (25) NOT NULL ,
        idOs          Int ,
        idFournisseur Int ,
        PRIMARY KEY (idTelephone )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_marque
#------------------------------------------------------------

CREATE TABLE t_marque(
        idMarque int (11) Auto_increment  NOT NULL ,
        marNom   Varchar (25) NOT NULL ,
        PRIMARY KEY (idMarque )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_Constructeur
#------------------------------------------------------------

CREATE TABLE t_Constructeur(
        idConstructeur int (11) Auto_increment  NOT NULL ,
        conNom         Varchar (20) NOT NULL ,
        idMarque       Int ,
        PRIMARY KEY (idConstructeur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_Os
#------------------------------------------------------------

CREATE TABLE t_Os(
        idOs  int (11) Auto_increment  NOT NULL ,
        osNom Varchar (25) NOT NULL ,
        PRIMARY KEY (idOs )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_Fournisseur
#------------------------------------------------------------

CREATE TABLE t_Fournisseur(
        idFournisseur int (11) Auto_increment  NOT NULL ,
        fouNom        Varchar (25) NOT NULL ,
        PRIMARY KEY (idFournisseur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: t_construire
#------------------------------------------------------------

CREATE TABLE t_construire(
        idMarque       Int NOT NULL ,
        idTelephone    Int NOT NULL ,
        idConstructeur Int NOT NULL ,
        PRIMARY KEY (idMarque ,idTelephone ,idConstructeur )
)ENGINE=InnoDB;

ALTER TABLE t_Telephone ADD CONSTRAINT FK_t_Telephone_idOs FOREIGN KEY (idOs) REFERENCES t_Os(idOs);
ALTER TABLE t_Telephone ADD CONSTRAINT FK_t_Telephone_idFournisseur FOREIGN KEY (idFournisseur) REFERENCES t_Fournisseur(idFournisseur);
ALTER TABLE t_Constructeur ADD CONSTRAINT FK_t_Constructeur_idMarque FOREIGN KEY (idMarque) REFERENCES t_marque(idMarque);
ALTER TABLE t_construire ADD CONSTRAINT FK_t_construire_idMarque FOREIGN KEY (idMarque) REFERENCES t_marque(idMarque);
ALTER TABLE t_construire ADD CONSTRAINT FK_t_construire_idTelephone FOREIGN KEY (idTelephone) REFERENCES t_Telephone(idTelephone);
ALTER TABLE t_construire ADD CONSTRAINT FK_t_construire_idConstructeur FOREIGN KEY (idConstructeur) REFERENCES t_Constructeur(idConstructeur);
