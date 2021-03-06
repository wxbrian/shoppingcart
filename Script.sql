DROP DATABASE IF EXISTS shoppingCart;

CREATE DATABASE shoppingCart;

CREATE TABLE shoppingCart.Stores
(StoreID INT NOT NULL AUTO_INCREMENT, 
StoreName VARCHAR(15) NOT NULL, 
StorePhone LONGTEXT NULL, 
StoreStreet CHAR(200) NOT NULL,
StoreNumber INT NOT NULL,
StoreZIP CHAR(15) NOT NULL,
StoreCity CHAR(30) NOT NULL,
StoreState CHAR(10) NOT NULL,
StoreCountry CHAR(20) NOT NULL,
StoreLat FLOAT(10,6) NOT NULL,
StoreLng FLOAT(10,6) NOT NULL,
PRIMARY KEY(StoreID));

CREATE TABLE shoppingCart.Users
(UserID INT NOT NULL AUTO_INCREMENT,
UserName CHAR(50) NOT NULL,
UserPassword CHAR(255) NOT NULL,
UserEmail CHAR(50) NOT NULL,
UserPhone CHAR(50) NOT NULL,
UserGender CHAR(1) NOT NULL,
UserDOB CHAR(20) NOT NULL,
UserStreet CHAR(200) NOT NULL,
UserNumber CHAR(10) NOT NULL,
UserZIP CHAR(15) NOT NULL,
UserCity CHAR(30) NOT NULL,
UserState CHAR(10) NOT NULL,
UserCountry CHAR(20) NOT NULL,
PRIMARY KEY(UserID));

CREATE TABLE shoppingCart.ProductCatalog
(id INT NOT NULL AUTO_INCREMENT,
name CHAR(50) NOT NULL, 
price DOUBLE NOT NULL, 
image CHAR(50) NOT NULL, 
PRIMARY KEY(id));

CREATE TABLE `shoppingcart`.`orders`
( `id` INT NOT NULL AUTO_INCREMENT ,
`totalValue` DOUBLE NOT NULL ,
`customer` INT NOT NULL,
`date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
PRIMARY KEY (`id`),
CONSTRAINT FK_PersonOrder FOREIGN KEY (customer)
REFERENCES Users(UserID)
);

CREATE TABLE `shoppingcart`.`orderItem`
( `id` INT NOT NULL AUTO_INCREMENT ,
`orderId` INT NOT NULL ,
`productId` INT NOT NULL ,
`value` DOUBLE NOT NULL ,
PRIMARY KEY (`id`),
CONSTRAINT FK_Order FOREIGN KEY (orderId)
REFERENCES Orders(id),
CONSTRAINT FK_Product FOREIGN KEY (productId)
REFERENCES ProductCatalog(id)
);


INSERT INTO shoppingCart.Stores (StoreName, StorePhone, StoreStreet, StoreNumber, StoreZIP, StoreCity, StoreState, StoreCountry, StoreLat, StoreLng) VALUES ('Store 1', '6479162956', 'Champagne Dr', 10, 'M3J 2C6', 'Toronto', 'ON', 'Canada', 43.767619, -79.471416);
INSERT INTO shoppingCart.Stores (StoreName, StorePhone, StoreStreet, StoreNumber, StoreZIP, StoreCity, StoreState, StoreCountry, StoreLat, StoreLng) VALUES ('Store 2', '6479162956', 'Yonge Street', 920, 'M4W 3C7', 'Toronto', 'ON', 'Canada', 43.648967, -79.377976);
INSERT INTO shoppingCart.Stores (StoreName, StorePhone, StoreStreet, StoreNumber, StoreZIP, StoreCity, StoreState, StoreCountry, StoreLat, StoreLng) VALUES ('Store 3', '6479162956', 'Princes` Blvd', 210, 'M6K 3C3', 'Toronto', 'ON', 'Canada', 43.633290, -79.422589);
INSERT INTO shoppingCart.Stores (StoreName, StorePhone, StoreStreet, StoreNumber, StoreZIP, StoreCity, StoreState, StoreCountry, StoreLat, StoreLng) VALUES ('Store 4', '6479162956', 'Queen St W', 232, 'M5V 1Z6', 'Toronto', 'ON', 'Canada', 43.650370, -79.390198);
INSERT INTO shoppingCart.Stores (StoreName, StorePhone, StoreStreet, StoreNumber, StoreZIP, StoreCity, StoreState, StoreCountry, StoreLat, StoreLng) VALUES ('Store 5', '6479162956', 'Lee Centre Dr', 38, 'M1H 3J7', 'Toronto', 'ON', 'Canada', 43.781934, -79.246629);

INSERT INTO shoppingCart.ProductCatalog (`name`, `price`, `image`) VALUES
('Intel Core i7-8700K Coffee Lake 6-Core 3.7 GHz', 414.99, 'corei7.jpg'),
('Corsair Crystal 570X RGB ATX Mid Tower Case', 179.99, 'corsair570xrgb.jpg'),
('Corsair Gaming Mouse SCIMITAR PRO RGB', 79.99, 'Corsair-Gaming-SCIMITAR-PRO-RGB.jpg'),
('G.SKILL TridentZ RGB Series 32GB DDR4', 439.99, 'gskill-tridentz-rgb.jpg'),
('AMD RYZEN 7 1700 8-Core 3.0 GHz Socket AM4 CPU', 299.99, 'ryzen7.jpg'),
('NZXT H700i Mid Tower Chassis Tempered Glass Case', 199.99, 'nzxth700i.jpg'),
('Razer Blackwidow Gaming  Mechanical Keyboard', 109.99, 'razer-blackwidow.jpg'),
('Samsung 850EVO BULK Solid State Drive', 108.45, 'samsung-850evo.jpg');
