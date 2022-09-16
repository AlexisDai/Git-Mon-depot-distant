CREATE TRIGGER modif_reservation AFTER UPDATE ON reservation
    FOR EACH ROW
    BEGIN
        DECLARE reservation INT
        SET reservation = NEW.res_id
        delimiter |
            SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Un problème est survenu. Règle de gestion reservation !'|
        END IF|
        delimiter ;
	END;

----------------------------------------------

