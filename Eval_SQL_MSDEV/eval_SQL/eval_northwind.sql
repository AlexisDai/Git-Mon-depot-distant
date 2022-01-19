-- Exercie 1 (Liste des contacts français) --                           
                                          
SELECT CompanyName AS Société,ContactName AS contact,ContactTitle AS Fonction,Phone AS Téléphone
FROM customers                            
WHERE Country = 'France';                 
                                          
                                          
                                          
-- Exercie 2 (produits vendus par le fournisseur "Exotic Liquids") --                           
                                          
SELECT ProductName AS Produit,UnitPrice AS Prix
FROM products                             
WHERE SupplierID=1;                       
                                          
                                          
                                          
-- Exercice 3 (Nombre de produits vendus par les fournisseurs Français dans l'ordre décroissant) --                          
                                          
SELECT CompanyName AS Fournisseur,Quantity AS `Nbre produits`
FROM `order details`                      
JOIN suppliers ON suppliers.Country = 'France'
ORDER BY Quantity DESC                    
LIMIT 10;                                 
                                          
                                          
                                          
-- Exercie 4 (Liste des clients français ayant plus de 10 commandes) --                           
                                          
SELECT CompanyName AS client,Quantity AS `Nbre commandes`
FROM `order details`                      
JOIN customers ON customers.Country = 'France'
WHERE Quantity > 10                       
LIMIT 10;                                 
                                          
                                          
                                          
-- Exercie 5 (liste des clients ayant un chiffre d'affaires >30.000) --                
                                          
SELECT DISTINCT CompanyName AS `client` ,Country AS Pays,sum(UnitPrice*Quantity) AS CA FROM customers
JOIN orders ON customers.CustomerID = orders.CustomerID
JOIN `order details`ON orders.OrderID = `order details`.OrderID
GROUP BY `client`,Pays
HAVING CA > 30000
ORDER BY CA DESC;             
                                          
                                          
                                          
                                          
-- Exercice 6 (Liste des pays dont les clients ont passé commande de produits fournis par "Exotic Liquids") --                          
                                          
SELECT DISTINCT ShipCountry AS Pays FROM orders
JOIN `order details` ON orders.OrderID = `order details`.OrderID
JOIN products ON `order details`.ProductID = products.ProductID
JOIN suppliers ON products.SupplierID = suppliers.SupplierID
WHERE suppliers.SupplierID = 1            
ORDER BY ShipCountry ASC;                 
                                          
                                          
                                          
                                          
-- Exercice 7 (Montant des ventes de 1997) --                          
                                          
SELECT SUM(UnitPrice*Quantity) AS `Montant Ventes 97` FROM `order details`                   
JOIN orders ON `order details`.OrderID = orders.OrderID
WHERE YEAR(OrderDate)=1997;




-- Exercice 8 (Montant des ventes de 1997 mois par mois) --

SELECT MONTH(OrderDate) AS `Mois 97`,SUM(UnitPrice*Quantity) AS `Montant Ventes` FROM `order details`
JOIN orders ON `order details`.OrderID = orders.OrderID
WHERE YEAR(OrderDate) = 1997
GROUP BY MONTH(OrderDate);




-- Exercice 9 (Depuis quelle date le client "Du monde entier" n'a plus commandé ?) --

SELECT MAX(OrderDate) AS `Date de dernière commande` FROM orders
JOIN customers ON orders.CustomerID = customers.CustomerID
GROUP BY customers.CustomerID = 'DUMON' DESC
LIMIT 1;




-- Exercie 10 (Délai moyen de livraison en jours) -- 

SELECT round(avg(datediff(ShippedDate,OrderDate))) AS `Délai moyen de livraison en jours` FROM orders;

