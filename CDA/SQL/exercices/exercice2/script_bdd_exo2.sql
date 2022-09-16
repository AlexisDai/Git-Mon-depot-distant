DROP DATABASE if EXISTS Exercice2;

CREATE DATABASE Exercice2;
USE Exercice2;


CREATE TABLE Station(
	num_sta	INT AUTO_INCREMENT PRIMARY KEY,
	nom_sta 	VARCHAR(255) 
);


CREATE TABLE Hotel(
	num_hot	INT AUTO_INCREMENT PRIMARY KEY,
	cap_hot	INT,
	cat_hot	VARCHAR(255),
	nom_hot	VARCHAR(255),
	adr_hot	VARCHAR(255),
	num_sta 	INT, 
	FOREIGN KEY(num_sta) REFERENCES Station(num_sta)
);


CREATE TABLE Chambre(
	num_cha 			INT AUTO_INCREMENT PRIMARY KEY,
	cap_cha			INT,
	deg_con_cha		INT,
	exp_cha			VARCHAR(255),
	typ_cha			VARCHAR(255),
	num_hot			INT,
	FOREIGN KEY(num_hot) REFERENCES Hotel(num_hot)
);


CREATE TABLE CLIENT(
	num_cli		INT AUTO_INCREMENT PRIMARY KEY,
	adr_cli		VARCHAR(255),
	nom_cli		VARCHAR(255),
	pre_cli		VARCHAR(255)
);


CREATE TABLE Reservvation(
	num_cha		INT,
	num_cli		INT,
	dat_deb		DATE,
	dat_fin		DATE,
	dat_res		DATE,
	mon_arr		DECIMAL(19,4),
	pri_tot		DECIMAL(19,4),
	PRIMARY KEY(num_cha, num_cli),
	FOREIGN KEY(num_cha) REFERENCES Chambre(num_cha),
	FOREIGN KEY(num_cli) REFERENCES CLIENT(num_cli)
);
