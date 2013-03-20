CREATE DATABASE menuk_6 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE menuk_6;

-- -----------------------------------------------------
-- Table `menuk_6`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `menuk_6`.`users` ;

CREATE  TABLE IF NOT EXISTS `menuk_6`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `location_id` INT NOT NULL ,
  `firstname` VARCHAR(45) NOT NULL ,
  `lastname` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  `token` VARCHAR(45) NULL ,
  `role` INT(4) NOT NULL DEFAULT 1 ,
  `session_id` VARCHAR(255) NULL ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

INSERT INTO `users` (`id`, `location_id`, `firstname`, `lastname`, `email`, `password`, `token`, `role`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Firsname', 'Lastname', 'example@mail.com', '2b7d8146d1e41d225f12d6b6cd23904cafc2bfd6', '', 100, '', NOW(), NOW());
-- PASSWORD: menuk

-- -----------------------------------------------------
-- Table `menuk_6`.`categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `menuk_6`.`categories` ;

CREATE  TABLE IF NOT EXISTS `menuk_6`.`categories` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `location_id` INT NOT NULL ,
  `parent_id` INT(11) NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  `description` TEXT NOT NULL ,
  `icon` varchar(255) NOT NULL ,
  `order_nr` INT(4) UNSIGNED NOT NULL ,
  `state` INT(1) UNSIGNED NOT NULL DEFAULT 1 ,
  `created_at` DATETIME NOT NULL COMMENT '	' ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


INSERT INTO `categories` (`id`, `location_id`, `parent_id`, `name`, `description`, `icon`, `order_nr`, `state`, `created_at`, `updated_at`) VALUES
(1, 0, 0, '{"NL":"Dranken","EN":"Beverages","DE":"Getr\\u00e4nke","FR":"Boissons"}', '{"NL":"","EN":"","DE":"","FR":""}', '', 0, 1, '2013-02-17 23:01:31', '2013-02-17 23:03:10'),
(2, 0, 0, '{"NL":"Voorgerechten","EN":"Appetizers","DE":"Vorspeise","FR":"Ap\\u00e9ritif"}', '{"NL":"","EN":"","DE":"","FR":""}', '', 0, 1, '2013-02-17 23:04:02', '2013-02-17 23:04:02'),
(3, 0, 0, '{"NL":"Desserts","EN":"Desserts","DE":"Desserts","FR":"Desserts"}', '{"NL":"","EN":"","DE":"","FR":""}', '', 0, 1, '2013-02-17 23:05:34', '2013-02-17 23:05:44'),
(4, 0, 1, '{"NL":"Alcoholische dranken","EN":"Alcoholic beverages","DE":"Alkoholische Getr\\u00e4nke","FR":"Boissons alcoolis\\u00e9es"}', '{"NL":"","EN":"","DE":"","FR":""}', '', 0, 1, '2013-02-17 23:07:59', '2013-02-17 23:07:59');


-- -----------------------------------------------------
-- Table `menuk_6`.`products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `menuk_6`.`products` ;

CREATE  TABLE IF NOT EXISTS `menuk_6`.`products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `location_id` INT NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  `description` TEXT NOT NULL ,
  `price` DECIMAL(10,2) NOT NULL ,
  `offer` INT(1) NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;

INSERT INTO `products` (`id`, `location_id`, `name`, `description`, `price`, `offer`, `created_at`, `updated_at`) VALUES
(1, 0, '{"NL":"Duitse biefstuk","EN":"","DE":"","FR":""}', '{"NL":"","EN":"","DE":"","FR":""}', 14.50, 0, '2013-02-17 23:11:57', '2013-02-17 23:11:57'),
(2, 0, '{"NL":"Brood met kruidenboter","EN":"","DE":"","FR":""}', '{"NL":"","EN":"","DE":"","FR":""}', 4.50, 0, '2013-02-17 23:12:47', '2013-02-17 23:12:47'),
(3, 0, '{"NL":"Tomatensoep","EN":"","DE":"","FR":""}', '{"NL":"","EN":"","DE":"","FR":""}', 7.50, 0, '2013-02-17 23:12:54', '2013-02-17 23:12:54'),
(4, 0, '{"NL":"Amstel bier 0.33 cl","EN":"","DE":"","FR":""}', '{"NL":"","EN":"","DE":"","FR":""}', 2.75, 0, '2013-02-17 23:13:18', '2013-02-17 23:13:18'),
(5, 0, '{"NL":"Amstel bier 0.5 cl","EN":"","DE":"","FR":""}', '{"NL":"","EN":"","DE":"","FR":""}', 3.50, 0, '2013-02-17 23:13:28', '2013-02-17 23:13:39'),
(6, 0, '{"NL":"Bananensplit","EN":"","DE":"","FR":""}', '{"NL":"","EN":"","DE":"","FR":""}', 6.80, 0, '2013-02-17 23:14:16', '2013-02-17 23:14:28'),
(7, 0, '{"NL":"IJsbergsla","EN":"","DE":"","FR":""}', '{"NL":"","EN":"","DE":"","FR":""}', 4.50, 0, '2013-02-17 23:15:47', '2013-02-17 23:15:47'),
(8, 0, '{"NL":"Rucola","EN":"","DE":"","FR":""}', '{"NL":"","EN":"","DE":"","FR":""}', 5.25, 0, '2013-02-17 23:16:01', '2013-02-17 23:16:01'),
(9, 0, '{"NL":"Rode huiswijn karaf","EN":"","DE":"","FR":""}', '{"NL":"","EN":"","DE":"","FR":""}', 6.95, 0, '2013-02-17 23:17:06', '2013-02-17 23:17:13');



-- -----------------------------------------------------
-- Table `menuk_6`.`categories_products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `menuk_6`.`categories_products` ;

CREATE  TABLE IF NOT EXISTS `menuk_6`.`categories_products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `category_id` INT(11) NOT NULL ,
  `product_id` INT(11) NOT NULL ,
  `order_nr` INT(4) UNSIGNED NOT NULL ,
  `state` INT(1) UNSIGNED NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`id`, `category_id`, `product_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

INSERT INTO `categories_products` (`id`, `category_id`, `product_id`, `order_nr`, `state`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 0, 0, NOW(), NOW()),
(2, 4, 5, 1, 0, NOW(), NOW()),
(3, 3, 6, 0, 0, NOW(), NOW()),
(4, 4, 9, 0, 0, NOW(), NOW()),
(5, 2, 3, 0, 0, NOW(), NOW()),
(6, 2, 2, 0, 0, NOW(), NOW()),
(7, 2, 7, 0, 0, NOW(), NOW()),
(8, 2, 8, 0, 0, NOW(), NOW());


-- -----------------------------------------------------
-- Table `menuk_6`.`location_opening_hours`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `location_opening_hours` (
  `location_id` int(11) NOT NULL,
  `monday` varchar(255) NOT NULL,
  `tuesday` varchar(255) NOT NULL,
  `wednesday` varchar(255) NOT NULL,
  `thursday` varchar(255) NOT NULL,
  `friday` varchar(255) NOT NULL,
  `saterday` varchar(255) NOT NULL,
  `sunday` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `location_opening_hours`
(`location_id`,`monday`,`tuesday`,`wednesday`,`thursday`,`friday`,`saterday`,`sunday`,`created_at`,`updated_at`) VALUES
(1,'Gesloten','13:00 - 22:00','13:00 - 22:00','13:00 - 22:00','13:00 - 22:00','13:00 - 22:00','13:00 - 22:00',NOW(),NOW());


CREATE TABLE IF NOT EXISTS `location_address` (
  `location_id` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `location_address`
(`location_id`,`street`,`postal_code`,`city`,`created_at`,`updated_at`) VALUES
(1,'Bakerstreet','1234 AB','Leeuwarden',NOW(),NOW());


CREATE TABLE IF NOT EXISTS `location_contact` (
  `location_id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `location_contact`
(`location_id`,`phone`,`fax`,`email`,`website`,`twitter`,`facebook`,`linkedin`,`created_at`,`updated_at`) VALUES
(1,'058 123 4567','058 123 4567','info@mail.com','http://www.website.com/','twitteraccount','facebookaccount','123456',NOW(),NOW());


CREATE  TABLE IF NOT EXISTS `location_about` (
  `location_id` INT NOT NULL,
  `about_text` TEXT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `location_about`
(`location_id`,`about_text`,`created_at`,`updated_at`) VALUES
(1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc et velit non orci porttitor elementum id eget ipsum. Pellentesque ullamcorper sapien massa, sit amet bibendum velit.',NOW(),NOW());


CREATE  TABLE IF NOT EXISTS `locations` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `template` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `offer_icon` varchar(255) NOT NULL,
  `info_icon` varchar(255) NOT NULL,
  `contact_icon` varchar(255) NOT NULL,
  `note` TEXT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `locations`
(`id`,`name`,`domain`,`template`,`theme`,`offer_icon`,`info_icon`,`contact_icon`,`created_at`,`updated_at`) VALUES
(1,'Hotel Leeuwarden','hotelleeuwarden','icons','linen','default.png','default.png','default.png',NOW(),NOW());

