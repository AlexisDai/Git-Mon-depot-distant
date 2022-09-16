DROP DATABASE IF EXISTS Evaluation;
CREATE DATABASE Evaluation;
USE Evaluation;


CREATE TABLE Client(
   N°_Client INT AUTO_INCREMENT,
   NomClient VARCHAR(255) ,
   PrenomClient VARCHAR(50) ,
   PRIMARY KEY(N°_Client)
);

CREATE TABLE Commande(
   N°_Commande INT AUTO_INCREMENT,
   DateCommande DATE,
   MontantCommande DECIMAL(19,4),
   N°_Client INT NOT NULL,
   PRIMARY KEY(N°_Commande),
   FOREIGN KEY(N°_Client) REFERENCES Client(N°_Client)
);

CREATE TABLE Article(
   N°_Article INT AUTO_INCREMENT,
   DesignationArticle VARCHAR(255) ,
   PUArticle DECIMAL(19,4),
   PRIMARY KEY(N°_Article)
);

CREATE TABLE SeComposeDe(
   N°_Commande INT,
   N°_Article INT,
   Qte INT,
   TauxTva DECIMAL(3,1)  ,
   PRIMARY KEY(N°_Commande, N°_Article),
   FOREIGN KEY(N°_Commande) REFERENCES Commande(N°_Commande),
   FOREIGN KEY(N°_Article) REFERENCES Article(N°_Article)
);
