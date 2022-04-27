
-- Suppression des users1/2/3 s'ils existent déjà.

DROP USER if EXISTS 'util1'@'%';
DROP USER if EXISTS 'util2'@'%';
DROP USER if EXISTS 'util3'@'%';



-- ****************User 1*************************
CREATE USER 'util1'@'%' IDENTIFIED BY '1234';       -- Création user.
GRANT ALL PRIVILEGES ON Papyrus.* TO 'util1'@'%';   -- On accorde des privilèges. 



-- ****************User 2*************************
CREATE USER 'util2'@'%' IDENTIFIED BY '5678';
GRANT SELECT ON Papyrus.* TO 'util2'@'%';



-- ****************User 3************************* 
CREATE USER 'util3'@'%' IDENTIFIED BY '9012';
GRANT SELECT ON Papyrus.fournis TO 'util3'@'%';
