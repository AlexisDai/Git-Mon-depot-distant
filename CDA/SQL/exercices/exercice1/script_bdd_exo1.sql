DROP DATABASE if EXISTS Exercice1;

CREATE DATABASE Exercice1;
USE Exercice1;


CREATE TABLE Personne(
	per_num 		INT AUTO_INCREMENT PRIMARY KEY,
	per_nom 		VARCHAR(255),
	per_prenom	VARCHAR(255),
	per_adresse VARCHAR(255),
	per_ville	VARCHAR(255) 
);


CREATE TABLE Groupe(
	gro_num 		INT AUTO_INCREMENT PRIMARY KEY,
	gro_libelle VARCHAR(255)
);


CREATE TABLE Appartient(
	per_num INT,
	gro_num INT,
	PRIMARY KEY (per_num, gro_num), 
	FOREIGN KEY (per_num) REFERENCES Personne(per_num),
	FOREIGN KEY (gro_num) REFERENCES Groupe(gro_num)
);