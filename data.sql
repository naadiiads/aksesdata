CREATE TABLE `customers` (
  `customerNumber` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`customerNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert  into `customers`(`customerNumber`,`customerName`,`phone`,`city`) values 
(103,'Atelier graphique','40.32.2555','Nantes'),
(112,'Signal Gift Stores','7025551838','Las Vegas'),
(114,'Australian Collectors, Co.','03 9520 4555','Melbourne');

CREATE TABLE `products` (
  `productCode` varchar(15) NOT NULL,
  `productName` varchar(70) NOT NULL,
  `quantityInStock` smallint(6) NOT NULL,
  `buyPrice` decimal(10,2) NOT NULL,
  PRIMARY KEY (`productCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert  into `products`(`productCode`,`productName`,`quantityInStock`,`buyPrice`) values 
('S10_1678','1969 Harley Davidson Ultimate Chopper',7933,'48.81'),
('S10_1949','1952 Alpine Renault 1300',7305,'98.58'),
('S10_2016','1996 Moto Guzzi 1100i',6625,'68.99');