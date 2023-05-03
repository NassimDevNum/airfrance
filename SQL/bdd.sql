DROP DATABASE IF EXISTS airfrance;
CREATE DATABASE airfrance;
use airfrance;

CREATE TABLE pilotes (
    idpilote INT(6) AUTO_INCREMENT ,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    age INT(6) NOT NULL,
    PRIMARY KEY (idpilote)
);

CREATE TABLE avions (
    idavion INT(6) AUTO_INCREMENT ,
    immatriculation VARCHAR(30) NOT NULL,
    marque VARCHAR(30) NOT NULL,
    modele VARCHAR(30) NOT NULL,
    nb_places INT(6) NOT NULL,
    PRIMARY KEY (idavion)
);

CREATE TABLE vols (
    idvol INT(6) AUTO_INCREMENT,
    numero VARCHAR(30) NOT NULL,
    date_depart DATE NOT NULL,
    date_arrivee DATE NOT NULL,
    idavion INT(6) NOT NULL,
    idpilote INT(6) NOT NULL,
    idaeroport_depart INT(6) NOT NULL,
    idaeroport_arrivee INT(6) NOT NULL,
    PRIMARY KEY (idvol),
    FOREIGN KEY (idpilote) REFERENCES pilotes (idpilote),
    FOREIGN KEY (idavion) REFERENCES avions (idavion)
);

CREATE TABLE aeroports (
    idaeroport INT(6) AUTO_INCREMENT,
    nom VARCHAR(30) NOT NULL,
    ville VARCHAR(30) NOT NULL,
    pays VARCHAR(30) NOT NULL,
    PRIMARY KEY (idaeroport)
);

create table user(
	iduser int (3) not null auto_increment,
	nom varchar(50),
	prenom varchar(50),
	email varchar(50),
	mdp varchar(50),
	role enum("user", "admin"),
	primary key (iduser)
);

insert into user values (null, "delon", "alexi", "a@gmail.com", "123", "admin");

ALTER TABLE vols
ADD FOREIGN KEY (aeroport_depart) REFERENCES aeroports(idaeroport); 
ALTER TABLE vols
ADD FOREIGN KEY (aeroport_arrivee) REFERENCES aeroports(idaeroport); 