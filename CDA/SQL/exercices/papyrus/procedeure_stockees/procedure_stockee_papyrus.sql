delimiter |

CREATE PROCEDURE Lst_fournis()
BEGIN	
	SELECT numfou AS "Code fournisseur"
	FROM fournis;
END | 

delimiter ;

-------------------------------------------

delimiter |

CREATE PROCEDURE Lst_Commandes( IN libelle VARCHAR(50))
	BEGIN
		SELECT  libart AS " Nom de produit", entcom.numcom AS "Numéro de commande", fournis.nomfou AS "Nom de fournisseur", (qtecde*priuni) AS "Sous-total"
		FROM produit
		JOIN ligcom ON produit.codart = ligcom.codart
		JOIN entcom ON ligcom.numcom = entcom.numcom
		JOIN fournis ON entcom.numfou = fournis.numfou
		WHERE obscom = "Commande urgente";
	END |
	
delimiter ; 


-------------------------------------------

