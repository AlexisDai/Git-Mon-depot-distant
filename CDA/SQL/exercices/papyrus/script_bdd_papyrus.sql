DROP DATABASE if EXISTS Papyrus;

CREATE DATABASE Papyrus;

USE Papyrus;


CREATE TABLE fournis(
	numfou 	VARCHAR(25) PRIMARY KEY NOT NULL,
	nomfou 	VARCHAR(25) NOT NULL,
	ruefou 	VARCHAR(50) NOT NULL,
	posfou	CHAR(5) NOT NULL,
	vilfou	VARCHAR(30) NOT NULL,
	confou	VARCHAR(15) NOT NULL,
	satisf	TINYINT(3) DEFAULT NULL,
	CHECK (satisf >= 0 AND  satisf <= 10)
);


CREATE TABLE entcom(
	numcom 	INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	obscom	VARCHAR(50),
	datcom	DATE NOT NULL DEFAULT CURRENT_TIMESTAMP(),
	numfou	VARCHAR(25),
	FOREIGN KEY (numfou) REFERENCES fournis(numfou)
);

CREATE INDEX ind ON entcom(numfou);


CREATE TABLE produit(
	codart	CHAR(4) PRIMARY KEY NOT NULL,
	libart	VARCHAR(30) NOT NULL,
	stkale	INT(10) NOT NULL,
	stkphy	INT(10) NOT NULL,
	qteann	INT(10) NOT NULL,
	unimes	CHAR(5) NOT NULL
);


CREATE TABLE ligcom(
	numlig	TINYINT(3) PRIMARY KEY NOT NULL,
	qtecode INT(10) NOT NULL,
	priuni	VARCHAR(50) NOT NULL,
	qteliv	INT(10),
	derliv	DATETIME NOT NULL,
	numcom	INT(10) NOT NULL,
	codart	CHAR(4) NOT NULL,
	FOREIGN KEY (numcom) REFERENCES entcom(numcom),
	FOREIGN KEY (codart) REFERENCES produit(codart)
);


CREATE TABLE vente(
	delliv	SMALLINT(5) NOT NULL,
	qte1	INT(10) NOT NULL,
	prix1	VARCHAR(50) NOT NULL,
	qte2	INT(10),
	prix2	VARCHAR(50),
	qte3	INT(10),
	prix3	VARCHAR(50),
	numfou	VARCHAR(25) NOT NULL,
	codart	CHAR(4) NOT NULL,
	PRIMARY KEY (numfou, codart),
	FOREIGN KEY (numfou) REFERENCES fournis(numfou),
	FOREIGN KEY (codart) REFERENCES produit(codart)
);

