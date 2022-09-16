USE hotel;

CREATE VIEW v_hotsta
AS
SELECT sta_nom AS "Nom de la station", hot_nom AS "Nom de l'hôtel", hot_categorie AS "Categorie", hot_ville AS "Ville"
FROM station
JOIN hotel ON station.sta_id = hotel.hot_sta_id

----------------------------------------------------------

USE hotel;

CREATE VIEW v_chahot
AS
SELECT hot_nom AS "Nom", hot_categorie AS "Catégorie", hot_ville AS "Ville", cha_numero AS "Numéro de chambre"
FROM hotel
JOIN chambre ON hotel.hot_id = chambre.cha_hot_id

----------------------------------------------------------

USE hotel;

CREATE VIEW v_rescli
AS
SELECT res_date AS "Date de réservation", cli_nom AS "Nom du client", hot_nom AS "Nom de l'hôtel"
FROM reservation
JOIN client ON reservation.res_cli_id = client.cli_id
JOIN chambre ON reservation.res_cha_id = chambre.cha_id
JOIN hotel ON chambre.cha_hot_id = hotel.hot_id

----------------------------------------------------------

USE hotel;

CREATE VIEW v_chahotsta
AS
SELECT sta_nom AS "Nom de la station", hot_nom AS "Nom de l'hôtel", cha_numero AS "Numéro de chambre", cha_capacite AS "Capacaité"
FROM station
JOIN hotel ON station.sta_id = hotel.hot_sta_id
JOIN chambre ON hotel.hot_id = chambre.cha_hot_id

----------------------------------------------------------

USE hotel;

CREATE VIEW v_resclihot
AS
SELECT cli_nom AS "nom du client", res_date_debut AS "Date de début", DATEDIFF(res_date_debut, res_date_fin) AS "Durée du séjour", hot_nom
FROM client
JOIN reservation ON client.cli_id = reservation.res_cli_id
JOIN chambre ON reservation.res_cha_id = chambre.cha_id
JOIN hotel ON chambre.cha_hot_id = hotel.hot_id