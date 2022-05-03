delimiter &&

CREATE OR REPLACE TRIGGER interdiction AFTER INSERT ON `order details`
FOR EACH ROW
BEGIN
      DECLARE pays VARCHAR(15);
      SET pays = (SELECT suppliers.SupplierID
      				FROM orders
                  JOIN customers ON orders.CustomerID = customers.CustomerID
                  JOIN `order details` ON orders.OrderID = `order details`.OrderID
                  JOIN products ON `order details`.ProductID = products.ProductID
                  JOIN suppliers ON products.SupplierID = suppliers.SupplierID
                  WHERE suppliers.Country = customers.Country
                  AND `order details`.ProductID = NEW.ProductID AND `order details`.OrderID = NEW.OrderID);
      if pays IS NULL then
      SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Insertion impossible, le client et le fournisseur ne réside pas dans le même pays !';
      END if ;
END &&

delimiter ;
	