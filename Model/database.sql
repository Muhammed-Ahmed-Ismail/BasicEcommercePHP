CREATE DATABASE IF NOT EXISTS Ecommerce_PHP_Project;
use Ecommerce_PHP_Project;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `e_mail` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`));
  CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `download_file_link` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`));
  CREATE TABLE IF NOT EXISTS `token` (
  `ID` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
    PRIMARY KEY(ID,token),
  FOREIGN KEY(ID)REFERENCES users(ID));
  CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `downloads_count` int NOT NULL DEFAULT 0,
    `product_id` int(11) NOT NULL,
    `ID`int(11) NOT NULL ,
  PRIMARY KEY (`order_id`),
FOREIGN KEY(`ID`) REFERENCES users(`ID`),
FOREIGN KEY (`product_id`) REFERENCES products(`product_id`));
insert into users (e_mail,user_password) values ("muhammed@123.com","ddeo");
insert into users (e_mail,user_password) values ("abdo@123.com","ddeo");
insert into users (e_mail,user_password) values ("ali@123.com","ddeo");
INSERT into products (download_file_link,file_name) VALUES("/home/download/abx.zip","abx.zip");
insert into orders (ID,product_id,order_date) VALUES (1,1,'2008-7-04');
insert into orders (ID,product_id,order_date) VALUES (2,1,'2008-7-04');
insert into orders (ID,product_id,order_date) VALUES (3,1,'2008-7-04');

