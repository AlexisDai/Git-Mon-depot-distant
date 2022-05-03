-- *** Procédure pour la dernière commande d'un client ***

delimiter |

CREATE PROCEDURE dernierecommande(IN nom VARCHAR(40))
BEGIN
	SELECT max(OrderDate) AS "Date de dernière commande"
	FROM orders
	JOIN customers ON orders.CustomerID = customers.CustomerID
	WHERE CompanyName = nom;
END |

delimiter ; 


----------------------------------------------------------

-- *** Procédure pour le délai moyen de livraison ***

delimiter |

CREATE PROCEDURE delaimoyen()

BEGIN
	SELECT ROUND(AVG(DATEDIFF(ShippedDate,OrderDate ))) AS "Délai moyen de livraison en jours"
	FROM orders;
END |

delimiter ;