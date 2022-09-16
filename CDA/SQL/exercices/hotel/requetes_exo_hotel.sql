--********************
--*******Lot 1********
--********************

USE hotel;

SELECT hotel.hot_nom AS "Nom de l'hôtel", hotel.hot_ville AS "Ville"
FROM hotel

----------------------------------------------------------------------


USE hotel;

SELECT cli_ville AS "Ville", cli_nom AS "Nom du client", cli_prenom AS "Prenom du client"
FROM client
WHERE cli_nom = "White"

----------------------------------------------------------------------

USE hotel;

SELECT sta_nom AS "Nom de la station", sta_altitude AS "Altitude"
FROM station
WHERE sta_altitude < 1000

----------------------------------------------------------------------

USE hotel;

SELECT cha_numero AS "Numero de chambre", cha_capacite AS "Capacité de la chambre"
FROM chambre
WHERE cha_capacite > 1

----------------------------------------------------------------------

USE hotel;

SELECT cli_nom AS "Nom du client", cli_ville AS "Ville de résidence"
FROM client
WHERE cli_ville != "Londre"

----------------------------------------------------------------------

USE hotel;

SELECT hot_nom AS "Nom de l'hôtel", hot_ville AS "Ville de l'hôtel", hot_categorie AS "Catégorie de l'hôtel"
FROM hotel
WHERE hot_ville = "Bretou" AND hot_categorie > 3


--********************
--*******Lot 2********
--********************

USE hotel;

SELECT sta_nom AS "Nom de la station", hot_nom AS "Nom de l'hôtel", hot_categorie AS "Categorie", hot_ville AS "Ville"
FROM station
JOIN hotel ON station.sta_id = hotel.hot_sta_id

-----------------------------------------------------------------------

USE hotel;

SELECT hot_nom AS "Nom", hot_categorie AS "Catégorie", hot_ville AS "Ville", cha_numero AS "Numéro de chambre"
FROM hotel
JOIN chambre ON hotel.hot_id = chambre.cha_hot_id

-----------------------------------------------------------------------

USE hotel;

SELECT hot_nom AS "Nom", hot_categorie AS "Catégorie", hot_ville AS "Ville", cha_numero AS "Numéro de chambre", cha_capacite AS "Capacité"
FROM hotel
JOIN chambre ON hotel.hot_id = chambre.cha_hot_id
WHERE cha_capacite > 1 AND hot_ville = "Bretou"


-----------------------------------------------------------------------

USE hotel;

SELECT res_date AS "Date de réservation", cli_nom AS "Nom du client", hot_nom AS "Nom de l'hôtel"
FROM reservation
JOIN client ON reservation.res_cli_id = client.cli_id
JOIN chambre ON reservation.res_cha_id = chambre.cha_id
JOIN hotel ON chambre.cha_hot_id = hotel.hot_id


-----------------------------------------------------------------------

USE hotel;

SELECT sta_nom AS "Nom de la station", hot_nom AS "Nom de l'hôtel", cha_numero AS "Numéro de chambre", cha_capacite AS "Capacaité"
FROM station
JOIN hotel ON station.sta_id = hotel.hot_sta_id
JOIN chambre ON hotel.hot_id = chambre.cha_hot_id


-----------------------------------------------------------------------

USE hotel;

SELECT cli_nom AS "nom du client", res_date_debut AS "Date de début", DATEDIFF(res_date_debut, res_date_fin) AS "Durée du séjour", hot_nom
FROM client
JOIN reservation ON client.cli_id = reservation.res_cli_id
JOIN chambre ON reservation.res_cha_id = chambre.cha_id
JOIN hotel ON chambre.cha_hot_id = hotel.hot_id



--********************
--*******Lot 3********
--********************


USE hotel;

SELECT COUNT(hot_id) AS "Nombre d'hôtels par station"
FROM hotel
JOIN station ON hotel.hot_sta_id = station.sta_id
GROUP BY hot_sta_id


-----------------------------------------------------------------------


USE hotel;

SELECT COUNT(cha_id) AS "Nombre de chambres par station"
FROM chambre
JOIN hotel ON chambre.cha_hot_id = hotel.hot_id
JOIN station ON hotel.hot_sta_id = station.sta_id
GROUP BY sta_id


-----------------------------------------------------------------------


USE hotel;

SELECT COUNT(cha_id) AS "Nombre de chambres par station"
FROM chambre
JOIN hotel ON chambre.cha_hot_id = hotel.hot_id
JOIN station ON hotel.hot_sta_id = station.sta_id
WHERE cha_capacite > 1
GROUP BY sta_id


-----------------------------------------------------------------------

USE hotel;

SELECT hot_nom AS "Nom de l'hôtel", cli_nom AS "Nom de client"
FROM hotel
JOIN chambre ON hotel.hot_id = chambre.cha_hot_id
JOIN reservation ON chambre.cha_id = reservation.res_cha_id
JOIN client ON reservation.res_cli_id = client.cli_id
WHERE cli_nom = "Squire"

----------------------------------------------------------------------


USE hotel;

SELECT AVG(DATEDIFF(res_date_debut, res_date_fin)) AS "Durée moyenne de réservation par station"
FROM reservation
JOIN chambre ON reservation.res_cha_id = chambre.cha_id
JOIN hotel ON chambre.cha_hot_id = hotel.hot_id
JOIN station ON hotel.hot_sta_id = station.sta_id
GROUP BY sta_id