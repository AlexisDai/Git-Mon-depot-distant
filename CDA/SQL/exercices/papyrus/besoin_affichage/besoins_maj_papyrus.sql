USE Papyrus;


UPDATE vente
SET prix1 = prix1*1.04, prix2 = prix2*1.02
WHERE numfou = 9180

-------------------------------------------

USE Papyrus;


UPDATE vente
SET prix2 = prix1
WHERE prix2 = 0

-------------------------------------------

USE Papyrus;


UPDATE entcom
JOIN fournis ON entcom.numfou = fournis.numfou
SET obscom = '*****'
WHERE satisf < 5

-------------------------------------------

USE Papyrus;


DELETE FROM produit 
WHERE codart = 'I110'

-------------------------------------------

USE Papyrus;


DELETE FROM entcom
WHERE obscom = ""