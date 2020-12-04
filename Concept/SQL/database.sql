
/*
-- Táblák létrehozása------------------------
CREATE TABLE product(											-- Termékek tábla
productID		INT	NOT NULL auto_increment,			-- auto ID megadás
productName VARCHAR(25) NOT NULL,							-- 25 karakteres terméknév
productPrice 	NUMERIC(10,2)   NOT NULL,					-- 10 karakteres ár, ebből 2 karakter tizedesjegy
priceUnit VARCHAR(5) NOT NULL,
shippingPrice NUMERIC(10,2)   NOT NULL,
shpriceUnit VARCHAR(5) NOT NULL,
quantity INT,												
photoLocation VARCHAR(30),										-- Quantity és photolocation lehet null
PRIMARY KEY (productID)
);

CREATE TABLE category (											-- Kategória tábla
catName VARCHAR(18) NOT NULL,									
PRIMARY KEY (catName)
);


CREATE TABLE CP(													-- Kategória-Termék kapcsolat
catName VARCHAR(18) NOT NULL,
productID INT NOT NULL,
PRIMARY KEY (catName, productID),
FOREIGN KEY (catName) REFERENCES category(catName),
FOREIGN KEY (productID) REFERENCES product(productID)
);


Create TABLE customer(											-- Vásárló tábla
customerID INT  NOT NULL auto_increment,
customerFirstName VARCHAR(35) NOT NULL,
customerLastName VARCHAR(35) NOT NULL,
login VARCHAR(25) NOT NULL,
customerPassword VARCHAR (200) NOT NULL, 
email VARCHAR(40),
phone VARCHAR(15),
PRIMARY KEY(customerID)
);

CREATE TABLE shippingAdress(									-- Szállítási cím tábla (adott vásárlónak több címe lehet)
adress VARCHAR (40) NOT NULL,
customerID INT NOT NULL,
PRIMARY KEY (customerID, adress),
FOREIGN KEY (customerID) REFERENCES customer(customerID)
);

CREATE TABLE cart(												-- Kosár Tábla
cartID INT  NOT NULL  auto_increment,
customerID INT NOT NULL,
productID INT NOT NULL,
cartQuantity INT NOT NULL,
PRIMARY KEY (cartID),
FOREIGN KEY (customerID) REFERENCES customer(customerID),
FOREIGN KEY (productID) REFERENCES product(productID)
);

CREATE TABLE purchased (										-- megvásárol termékek tábla, vásárlás után ide kerül a kosár tartalma
purchasedID INT  NOT NULL  auto_increment,
productID INT NOT NULL,
customerID INT NOT NULL,
purchasedQuantity INT NOT NULL,
PRIMARY KEY (purchasedID),
FOREIGN KEY (customerID) REFERENCES customer(customerID),
FOREIGN KEY (productID) REFERENCES product(productID)
);



-- Táblák feltöltése------------------------


INSERT INTO category VALUES ('Sport and Hobby');				-- Kategóra feltöltése
INSERT INTO category VALUES ('Electronics');
INSERT INTO category VALUES ('Household');
INSERT INTO category VALUES ('Fashion');
INSERT INTO category VALUES ('Beauty');
INSERT INTO category VALUES ('Office');
INSERT INTO category VALUES ('Toy');
INSERT INTO category VALUES ('Education');


INSERT INTO product (productName,productPrice,priceUnit,Quantity,photolocation) VALUES ('Running Shoes',19999,'Ft',13,"../images/shoes.jpg");		-- Termékek feltöltése (azért kell a paramétereket is leírni benne,
INSERT INTO product (productName,productPrice,priceUnit,Quantity,photolocation) VALUES ('Microcontroller',15490,'Ft',54,"../images/microcontroller.jpg");	-- mert az ID autoincrementen van)
INSERT INTO product (productName,productPrice,priceUnit,Quantity,photolocation) VALUES ('Drone',48490,'Ft',9,"../images/drone.jpg");
INSERT INTO product (productName,productPrice,priceUnit,Quantity,photolocation) VALUES ('Sledge',9999,'Ft',5,"../images/sledge.jpg");
INSERT INTO product (productName,productPrice,priceUnit,Quantity,photolocation) VALUES ('Jacket',59900,'Ft',14,"../images/jacket.jpg");
INSERT INTO product (productName,productPrice,priceUnit,Quantity,photolocation) VALUES ('Skijacket',120000,'Ft',21,"../images/skijacket.jpg");
INSERT INTO product (productName,productPrice,priceUnit,Quantity,photolocation) VALUES ('Trousers',14499,'Ft',37,"../images/trousers.jpg");
INSERT INTO product (productName,productPrice,priceUnit,Quantity,photolocation) VALUES ('TV',198990,'Ft',7,"../images/tv.jpg");
INSERT INTO product (productName,productPrice,priceUnit,Quantity,photolocation) VALUES ('Frigde',119999,'Ft',2,"../images/fridge.jpg");
INSERT INTO product (productName,productPrice,priceUnit,Quantity,photolocation) VALUES ('Lipstick',3990,'Ft',45,"../images/lipstick.jpg");
INSERT INTO product (productName,productPrice,priceUnit,Quantity,photolocation) VALUES ('Parfume',11990,'Ft',27,"../images/parfume.jpg");
INSERT INTO product (productName,productPrice,priceUnit,Quantity,photolocation) VALUES ('6 Piece Set of Plates',4990,'Ft',30,"../images/plates.jpg");
INSERT INTO product (productName,productPrice,priceUnit,Quantity,photolocation) VALUES ('Laptop',245990,'Ft',11,"../images/laptop.jpg");
INSERT INTO product (productName,productPrice,priceUnit,Quantity,photolocation) VALUES ('Exercise Book',499,'Ft',71,"../images/book.jpg");
INSERT INTO product (productName,productPrice,priceUnit,Quantity,photolocation) VALUES ('Pen',990,'Ft',123,"../images/pen.jpg");


INSERT INTO cp VALUES('Sport and Hobby',1);						-- Kategória-Termék kapcsolat tábla feltöltése
INSERT INTO cp VALUES('Fashion',1);
INSERT INTO cp VALUES('Electronics',2);
INSERT INTO cp VALUES('Electronics',3);
INSERT INTO cp VALUES('Sport and Hobby',3);
INSERT INTO cp VALUES('Toy',3);
INSERT INTO cp VALUES('Sport and Hobby',4);
INSERT INTO cp VALUES('Toy',4);
INSERT INTO cp VALUES('Fashion',5);
INSERT INTO cp VALUES('Fashion',6);
INSERT INTO cp VALUES('Sport and Hobby',6);
INSERT INTO cp VALUES('Fashion',7);
INSERT INTO cp VALUES('Electronics',8);
INSERT INTO cp VALUES('Household',8);
INSERT INTO cp VALUES('Electronics',9);
INSERT INTO cp VALUES('Household',9);
INSERT INTO cp VALUES('Beauty',10);
INSERT INTO cp VALUES('Beauty',11);
INSERT INTO cp VALUES('Household',12);
INSERT INTO cp VALUES('Electronics',13);
INSERT INTO cp VALUES('Office',13);
INSERT INTO cp VALUES('Education',13);
INSERT INTO cp VALUES('Education',14);
INSERT INTO cp VALUES('Office',14);
INSERT INTO cp VALUES('Office',15);
INSERT INTO cp VALUES('Education',15);


INSERT INTO customer (customerLastName,customerFirstName,login,customerPassword,email,phone) 
VALUES('Kiss','Pista', 'kisspistike','kiafeneazakispista2','kisspisti@email.kp','0623456789');	-- Próba vásárló


INSERT INTO shippingadress VALUES ('Budapest I. 1001 fő u. 1',1);		-- Próbavásárló két lakcíme
INSERT INTO shippingadress VALUES ('Miskolc 3500 ló u. 14',1);


*/
-- Próbalekérdezések/ táblák ellenőrzése------------------------
/*
SELECT *
FROM product;
SELECT *
FROM category;
SELECT *
FROM CP;
SELECT *
FROM customer;
SELECT *
FROM shippingAdress;
SELECT *
FROM cart;
SELECT *
FROM purchased;



SELECT p.productID, catName, productName, productPrice, priceUnit, photoLocation
FROM product p, cp
WHERE p.productID = cp.productID;

SELECT p.productID, catName, productName, productPrice, priceUnit, photoLocation
FROM product p, cp
WHERE p.productID = cp.productID AND cp.catName = 'Electronics';

SELECT p.productID, productName, productPrice, priceUnit, photoLocation
FROM product p, cp
GROUP BY productID;

SELECT *
FROM product p
WHERE p.productID = '11';

select * from customer where customerID = "1";*/

/*SELECT *
FROM cart;*/

-- Táblák törlése------------------------
/*
DROP TABLE purchased;
DROP TABLE cart;
DROP TABLE cp;
DROP TABLE shippingadress;
DROP TABLE category;
DROP TABLE customer;
DROP TABLE product;
*/