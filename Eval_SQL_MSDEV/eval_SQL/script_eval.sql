DROP DATABASE if EXISTS Eval;


CREATE DATABASE Eval;

USE Eval;

CREATE TABLE client(
	cli_num INTEGER PRIMARY KEY,
	cli_nom VARCHAR(50),
	cli_adresse VARCHAR(50),
	cli_tel VARCHAR(30)
);
	
CREATE TABLE commande(
	com_num INTEGER PRIMARY KEY,
	cli_num INTEGER,
	com_date DATETIME,
	com_obs VARCHAR(50),
	FOREIGN KEY (cli_num) REFERENCES client(cli_num)
);

CREATE TABLE produit(
	pro_num INTEGER PRIMARY KEY,
	pro_libelle VARCHAR(50),
	pro_description VARCHAR(50)
);

CREATE TABLE est_compose(
	com_num INTEGER,
	pro_num INTEGER,
	est_qte INTEGER,
	FOREIGN KEY (com_num) REFERENCES commande(com_num),
	FOREIGN KEY (pro_num) REFERENCES produit(pro_num)
);
	
