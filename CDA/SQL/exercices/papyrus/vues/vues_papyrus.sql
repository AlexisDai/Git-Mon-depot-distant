USE Papyrus;

CREATE VIEW v_GlobalCde
AS
SELECT codart AS "Code produit", sum(qtecde) AS "QteTot", (qtecde*priuni) AS "Prixtot"
FROM ligcom
GROUP BY codart

----------------------------------------------------

USE Papyrus;         
                     
CREATE VIEW v_VentesI100
AS                   
SELECT * FROM vente  
WHERE codart = "I100"

----------------------------------------------------

CREATE VIEW v_VentesI100Grobrigan
AS 
SELECT * FROM v_VentesI100
WHERE numfou = 120