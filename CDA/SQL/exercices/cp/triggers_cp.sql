delimiter |

CREATE TRIGGER maj_total
AFTER INSERT OR UPDATE OR DELETE ON lignedecommande
FOR EACH ROW
BEGIN
	DECLARE 
		id_c INT;
	DECLARE 
		tot DOUBLE;
	SET 
		id_c = NEW.id_commande;
	SET
		tot = (SELECT SUM(prix*quantite) FROM lignedecommande WHERE id_commande = id_c);
	UPDATE commande SET total = tot WHERE id = id_c;
END

delimiter ;

------------------------------------------------------------

-- ****Non fonctionnel****
delimiter &&

CREATE OR REPLACE TRIGGER maj_total
AFTER INSERT OR UPDATE OR DELETE ON cp.lignedecommande
FOR EACH ROW
BEGIN

	DECLARE 
		id_c INT;
	DECLARE 
		tot DOUBLE;
	SET 
		id_c = NEW.id_commande;
	SET
		tot = (SELECT SUM(prix*quantite) FROM lignedecommande WHERE id_commande = id_c);
	UPDATE commande SET total = tot WHERE id = id_c;
		
END;&&

delimiter ;