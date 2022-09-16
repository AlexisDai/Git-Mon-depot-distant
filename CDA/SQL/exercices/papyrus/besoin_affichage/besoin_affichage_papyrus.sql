
USE Papyrus;

SELECT numcom as "Numéro de commande"
FROM entcom
WHERE numfou = 9120

------------------------------

USE Papyrus;

SELECT numfou AS "Code fournisseur"
FROM fournis

------------------------------

USE Papyrus;

SELECT COUNT(numcom) AS "Nombre de commandes passées", COUNT(distinct numfou) AS "Nombre de fournisseurs"
FROM entcom

------------------------------

USE Papyrus;

SELECT codart AS "Numéro de produit", libart AS "Libellé du produit",stkphy AS "Stock", stkale AS "Stock alerte", qteann AS "Quantité annuelle"
FROM produit
WHERE stkphy <= stkale AND qteann < 1000


------------------------------

USE Papyrus;

SELECT substr(posfou,1,2) AS "Département", nomfou AS "Nom fournisseur"
FROM fournis
WHERE SUBSTR(posfou,1,2) = 75 OR SUBSTR(posfou,1,2) = 78 OR SUBSTR(posfou,1,2) = 92 OR SUBSTR(posfou,1,2) = 77
ORDER BY SUBSTR(posfou,1,2) DESC, nomfou ASC 


-----------------------------


USE Papyrus;

SELECT numcom AS "Numéro de commandes"
FROM entcom
WHERE month(datcom) = 04 OR MONTH(datcom) = 03

------------------------------

USE Papyrus;

SELECT numcom AS "Numéro de commande", datcom AS "Date de commande"
FROM entcom
WHERE obscom != ""

------------------------------


USE Papyrus;

SELECT numcom AS "Numéro de commande", (qtecde*priuni) AS "Total de la commande"
FROM ligcom
GROUP BY numcom
ORDER BY (qtecde*priuni) DESC

------------------------------

USE Papyrus;

SELECT numcom AS "Numéro de commande", (qtecde*priuni) AS "Total de la commande"
FROM ligcom
WHERE (qtecde*priuni) > 10000 AND qtecde <= 1000
GROUP BY numcom
ORDER BY (qtecde*priuni) DESC

------------------------------

USE Papyrus;

SELECT nomfou AS "Nom fournisseur", numcom AS "Numéro de commande", datcom AS "Date de commande"
FROM fournis
JOIN entcom ON fournis.numfou = entcom.numfou
ORDER BY nomfou asc

------------------------------

USE Papyrus;

SELECT  libart AS " Nom de produit", entcom.numcom AS "Numéro de commande", fournis.nomfou AS "Nom de fournisseur", (qtecde*priuni) AS "Sous-total"
FROM produit
JOIN ligcom ON produit.codart = ligcom.codart
JOIN entcom ON ligcom.numcom = entcom.numcom
JOIN fournis ON entcom.numfou = fournis.numfou
WHERE obscom = "Commande urgente"

------------------------------

USE Papyrus;

SELECT DISTINCT nomfou AS "Nom de fournisseur"
FROM fournis
JOIN entcom ON fournis.numfou = entcom.numfou
WHERE numcom != ""
 
 --OU

 USE Papyrus;

SELECT DISTINCT nomfou AS "Nom de fournisseur"
FROM fournis
JOIN entcom ON fournis.numfou = entcom.numfou
JOIN ligcom ON entcom.numcom = ligcom.numcom
WHERE qtecde != 0


-----------------------------

USE Papyrus;

SELECT numcom AS "Numéro de commande", datcom AS "Date de commande"
FROM entcom
WHERE numfou = 120

-- OU

USE Papyrus;

SELECT numcom AS "Numéro de commande", datcom AS "Date de commande"
FROM entcom
JOIN fournis ON entcom.numfou = fournis.numfou
WHERE fournis.numfou = 120

-----------------------------

USE Papyrus;

SELECT libart AS "Libellé du produit", prix1 AS "Prix"
FROM produit
JOIN vente ON produit.codart = vente.codart
WHERE prix1 < (
	SELECT MIN(prix1) AS "mini"
	FROM vente
	WHERE codart LIKE 'r%'
	)
GROUP BY libart

-----------------------------

USE Papyrus;


SELECT nomfou AS "Nom de fournisseur", libart AS "Libellé de l'article"
FROM fournis
JOIN entcom ON fournis.numfou = entcom.numfou
JOIN ligcom ON entcom.numcom = ligcom.numcom
JOIN produit ON ligcom.codart = produit.codart
WHERE stkphy <= (SELECT SUM(stkale) FROM produit)*150
GROUP BY libart
ORDER BY libart ASC, nomfou asc


----------------------------



