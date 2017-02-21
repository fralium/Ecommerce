#Create Table products
CREATE TABLE `ecommerce`.`products` ( `product_id` INT(100) NOT NULL AUTO_INCREMENT , `product_cat` INT(100) NOT NULL , `product_brand` INT(100) NOT NULL , `product_title` VARCHAR(255) NOT NULL , `product_price` INT(100) NOT NULL , `product_desc` TEXT NOT NULL , `product_image` TEXT NOT NULL , `product_keywords` TEXT NOT NULL , PRIMARY KEY (`product_id`)) ENGINE = InnoDB


#Create Table categories
CREATE TABLE `ecommerce`.`categories` ( `cat_id` INT(100) NOT NULL AUTO_INCREMENT , `cat_title` text(255) NOT NULL , PRIMARY KEY (`cat_id`)) ENGINE = InnoDB

#Create Table products
CREATE TABLE `ecommerce`.`brands` ( `brand_id` INT(100) NOT NULL AUTO_INCREMENT , `brand_title` text(255) NOT NULL , PRIMARY KEY (`brand_id`)) ENGINE = InnoDB

#Create Table cart
CREATE TABLE `ecommerce`.`cart` ( `p_id` INT(10) NOT NULL , `ip_add` VARCHAR(255) NOT NULL , `qty` INT(10) NOT NULL ) ENGINE = InnoDB; 


#Insert Table brand values
INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES (NULL, 'Lenovo'), (NULL, 'Sony'), (NULL, 'HP'), (NULL, 'DELL'), (NULL, 'Huawei'), (NULL, 'LG'), (NULL, 'Samsung'), (NULL, 'Apple')


#Insert Table categories values
INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES (NULL, 'Camera'), (NULL, 'TV'), (NULL, 'Tablet'), (NULL, 'Computer'), (NULL, 'Cellphone'), (NULL, 'Accessory')
