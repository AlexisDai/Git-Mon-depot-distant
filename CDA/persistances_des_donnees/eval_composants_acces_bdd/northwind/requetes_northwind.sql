-- *** Liste des contacts français *** 

SELECT CompanyName AS "Société", ContactName AS "Contact", ContactTitle AS "Fonction", Phone AS "Téléphone"
FROM customers
WHERE country = "France" 

---------------------------------------

-- *** Produits vendus par le fournisseur "Exotic Liquids" ***

SELECT ProductName AS "Produit", UnitPrice AS "Prix"
FROM products
JOIN suppliers ON products.SupplierID = suppliers.SupplierID
WHERE CompanyName = "Exotic Liquids"

---------------------------------------

-- *** Nombre de produits vendus par les fournisseurs Français dans l'ordre décroissant ***

SELECT CompanyName AS "Fournisseur", count(ProductID) AS "Nbre produits"
FROM suppliers
JOIN products ON suppliers.SupplierID = products.SupplierID
WHERE Country = "France"
GROUP BY CompanyName
ORDER BY COUNT(ProductID) DESC

---------------------------------------

-- *** Liste des clients Français ayant plus de 10 commandes *** 

SELECT CompanyName AS "Client", COUNT(OrderID) AS "Nbre commandes"
FROM customers
JOIN orders ON customers.CustomerID = orders.CustomerID
wHERE Country = "France"
GROUP BY CompanyName
HAVING COUNT(OrderID) > 10

--------------------------------------

-- *** Liste des clients ayant un chiffre d'affaires > 30.000 ***

SELECT CompanyName AS "Client", SUM(UnitPrice*Quantity) AS "CA", Country AS "Pays"
FROM customers
JOIN orders ON customers.CustomerID = orders.CustomerID
JOIN `order details` ON orders.OrderID = `order details`.OrderID
GROUP BY CompanyName
HAVING SUM(UnitPrice*Quantity) > 30000
ORDER BY SUM(UnitPrice*Quantity) DESC

--------------------------------------

-- *** Liste des pays dont les clients ont passé commande de produits fournis par "Exotic Liquids" ***

SELECT  DISTINCT customers.Country AS "Pays"
FROM customers
JOIN orders ON customers.CustomerID = orders.CustomerID
JOIN `order details` ON orders.OrderID = `order details`.OrderID
JOIN products ON `order details`.ProductID = products.ProductID
JOIN suppliers ON products.SupplierID = suppliers.SupplierID
WHERE suppliers.CompanyName = "Exotic Liquids"
ORDER BY customers.Country ASC

-------------------------------------

-- *** Montant des ventes de 1997 ***

SELECT SUM(Unitprice*Quantity) AS "Montant Ventes 97"
FROM `order details`
JOIN orders ON `order details`.OrderID = orders.OrderID
WHERE YEAR(OrderDate) = 1997

------------------------------------

-- *** Montant des ventes de 1997 mois par mois ***

SELECT MONTH(OrderDate) AS "Mois 97",SUM(Unitprice*Quantity) AS "Montant Ventes 97"
FROM `order details`
JOIN orders ON `order details`.OrderID = orders.OrderID
WHERE YEAR(OrderDate) = 1997
GROUP BY MONTH(OrderDate)

-----------------------------------

-- *** Depuis quelle date le client "Du monde entier" n'a plus commandé ***

SELECT max(OrderDate) AS "Date de dernière commande"
FROM orders
JOIN customers ON orders.CustomerID = customers.CustomerID
WHERE CompanyName = "Du monde entier"

-----------------------------------

-- *** Quel est le délai moyen de livraison en jours ***

SELECT ROUND(AVG(DATEDIFF(ShippedDate,OrderDate ))) AS "Délai moyen de livraison en jours"
FROM orders