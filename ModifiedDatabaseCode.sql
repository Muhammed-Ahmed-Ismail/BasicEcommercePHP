
CREATE DATABASE IF NOT EXISTS Ecommerce_PHP_Project;

use Ecommerce_PHP_Project;

CREATE TABLE IF NOT EXISTS `users`
(
    `ID`            int(11)      NOT NULL AUTO_INCREMENT,
    `e_mail`        varchar(50)  NOT NULL,
    `user_password` varchar(255) NOT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE IF NOT EXISTS `products`
(
    `product_id`         int(11)      NOT NULL AUTO_INCREMENT,
    `download_file_link` varchar(255) NOT NULL,
    `file_name`          varchar(255) NOT NULL,
    PRIMARY KEY (`product_id`)
);

CREATE TABLE token
(
    id               INT AUTO_INCREMENT PRIMARY KEY,
    selector         VARCHAR(255) NOT NULL,
    hashed_validator VARCHAR(255) NOT NULL,
    user_id          INT      NOT NULL,
    expiry           DATETIME NOT NULL,
    CONSTRAINT fk_user_id
        FOREIGN KEY (user_id)
            REFERENCES users (ID) ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS `orders`
(
    `order_id`        int(11) NOT NULL AUTO_INCREMENT,
    `order_date`      date    NOT NULL,
    `downloads_count` int     NOT NULL DEFAULT 0,
    `product_id`      int(11) NOT NULL,
    `ID`              int(11) NOT NULL,
    PRIMARY KEY (`order_id`),
    FOREIGN KEY (`ID`) REFERENCES users (`ID`),
    FOREIGN KEY (`product_id`) REFERENCES products (`product_id`)
);

select * from orders;
select * from products;
select * from token;
select * from users;

-- insert into users (e_mail, user_password)
-- values ('a', '1');
-- insert into users (e_mail, user_password)
-- values ('b', '2');
-- insert into users (e_mail, user_password)
-- values ('c', '3');
-- INSERT into products (download_file_link, file_name)
-- VALUES ('/home/download/abx.zip', 'abx.zip');
-- insert into orders (ID, product_id, order_date)
-- VALUES (1, 1, '2008-7-04');
-- insert into orders (ID, product_id, order_date)
-- VALUES (2, 1, '2008-7-04');
-- insert into orders (ID, product_id, order_date)
-- VALUES (3, 1, '2008-7-04');

