# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.35)
# Database: liquify
# Generation Time: 2017-11-14 21:08:14 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `categoryname`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'Kolonėlės',1,'2017-10-31 20:10:54','2017-11-01 15:46:54'),
	(3,'Ausinės',1,'2017-11-01 19:41:58','2017-11-02 09:31:46');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productID` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;

INSERT INTO `images` (`id`, `name`, `productID`, `image`, `created_at`, `updated_at`)
VALUES
	(2,'B&O A2','1','storage/b_o_play_1643773_beoplay_a2_active_speaker_1300746.jpg','2017-11-01 15:49:23','2017-11-01 15:49:23'),
	(5,'Bang & Olufsen Beoplay H7','26','storage/bang-olufsen-beoplay-h7-binaural-head-band-brown-headset-142346-detail-59fa240aaebc1.jpg','2017-11-01 19:44:10','2017-11-01 19:44:10'),
	(6,'B&O H7','27','storage/bang-olufsen-beoplay-h7-binaural-head-band-brown-headset-142346-detail-59fa24a78f856.jpg','2017-11-01 19:46:47','2017-11-04 18:41:44'),
	(12,'B&O A1','24','storage/24_1509890745_59ff1ab92bb18.jpg','2017-11-05 14:05:45','2017-11-05 14:05:45'),
	(13,'B&O A9 White','25','storage/25_1509900202_59ff3faa25f81.jpg','2017-11-05 16:43:22','2017-11-05 16:43:22');

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2017_10_14_092726_create_product_table',1),
	(4,'2017_10_14_094626_create_categories_table',1),
	(5,'2017_10_23_132250_create_orders_table',1),
	(6,'2017_10_25_165818_create_supplier_table',1),
	(7,'2017_10_25_170130_create_ordered_items_table',1),
	(8,'2017_10_29_071959_create_permission_tables',1),
	(9,'2017_11_01_153124_add_table_images',2),
	(10,'2017_11_02_145149_create_shoppingcart_table',3),
	(13,'2017_11_06_145448_create_orders_table',4),
	(14,'2017_11_06_145456_create_ordered_items_table',4);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table model_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table model_has_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`)
VALUES
	(1,1,'App\\User'),
	(1,3,'App\\User');

/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ordered_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ordered_items`;

CREATE TABLE `ordered_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orderID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `ordered_items` WRITE;
/*!40000 ALTER TABLE `ordered_items` DISABLE KEYS */;

INSERT INTO `ordered_items` (`id`, `name`, `price`, `quantity`, `orderID`, `created_at`, `updated_at`)
VALUES
	(1,'B&O A1','180','1','2','2017-11-06 15:13:29','2017-11-06 15:13:29'),
	(2,'B&O A1','180','1','5','2017-11-06 15:23:56','2017-11-06 15:23:56'),
	(3,'B&O A2','100','1','5','2017-11-06 15:23:56','2017-11-06 15:23:56'),
	(4,'B&O A9 White','2000','2','6','2017-11-06 15:29:03','2017-11-06 15:29:03'),
	(5,'B&O H7','180','1','6','2017-11-06 15:29:03','2017-11-06 15:29:03'),
	(6,'B&O A2','100','2','7','2017-11-06 20:20:52','2017-11-06 20:20:52'),
	(7,'B&O A9 White','2000','1','7','2017-11-06 20:20:52','2017-11-06 20:20:52'),
	(8,'B&O A9 White','2000','1','8','2017-11-06 20:21:00','2017-11-06 20:21:00'),
	(9,'B&O H7','180','1','8','2017-11-06 20:21:00','2017-11-06 20:21:00'),
	(10,'B&O H7','180','1','9','2017-11-06 20:21:09','2017-11-06 20:21:09'),
	(11,'B&O A1','180','1','10','2017-11-07 08:15:43','2017-11-07 08:15:43'),
	(12,'B&O A1','180','3','11','2017-11-07 08:19:18','2017-11-07 08:19:18');

/*!40000 ALTER TABLE `ordered_items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL,
  `shipping` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `totalprice` int(11) NOT NULL,
  `shippingAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shippingCity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shippingPostcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shippingEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shippingTelephone` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`id`, `customerid`, `shipping`, `totalprice`, `shippingAddress`, `shippingCity`, `shippingPostcode`, `shippingEmail`, `shippingTelephone`, `status`, `created_at`, `updated_at`)
VALUES
	(5,2,'DPD',280,'Zirmunu 32e-25','Vilnius','LT-09228','simonas@firelita.lt',860905374,'1','2017-11-06 15:23:56','2017-11-06 15:23:56'),
	(6,1,'DPD',4180,'Zirmunu 32e-25','Vilnius','LT-09228','simonas@firelita.lt',860905374,'1','2017-11-06 15:29:03','2017-11-06 15:29:03'),
	(7,1,'DPD',2200,'Zirmunu 32e-25','Vilnius','LT-09228','simonas@firelita.lt',860905374,'1','2017-11-06 20:20:52','2017-11-06 20:20:52'),
	(8,1,'DPD',2180,'Zirmunu 32e-25','Vilnius','LT-09228','simonas@firelita.lt',860905374,'1','2017-11-06 20:21:00','2017-11-06 20:21:00'),
	(9,1,'DPD',180,'Zirmunu 32e-25','Vilnius','LT-09228','simonas@firelita.lt',860905374,'1','2017-11-06 20:21:09','2017-11-06 20:21:09'),
	(10,1,'DPD',180,'Zirmunu 32e-25','Vilnius','LT-09228','simonas@firelita.lt',860905374,'1','2017-11-07 08:15:43','2017-11-07 08:15:43'),
	(11,2,'DPD',540,'Sauletelkio al.11','Vilnius','09228','test@drive.lt',853242494,'1','2017-11-07 08:19:18','2017-11-07 08:19:18');

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES
	(1,'Administer roles & permissions','web','2017-10-31 13:52:41','2017-10-31 13:52:41');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `oldprice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `imageURL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoryID` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `name`, `price`, `oldprice`, `quantity`, `description`, `imageURL`, `categoryID`, `supplierID`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'B&O A2',100,129,20,'Excellent engineering and the unique True360 sound solution mean the sweet spot is everywhere. No need to worry about placing the A2 correctly, or sitting in just the right place. Just listen and enjoy.','storage/b_o_play_1643773_beoplay_a2_active_speaker_1300746.jpg',1,1,1,'2017-10-31 20:58:54','2017-11-02 14:44:31'),
	(24,'B&O A1',180,180,23,'You want to take your music everywhere, but most bluetooth speakers either look like garbage or don\'t sound any better than streaming directly from your phone. Addressing both of those common problems is the Beoplay A1 Speaker from Bang & Olufsen. B&O always take design seriously, and the A1 is no exception. It\'s built to last with a beautiful rounded aluminum grill and double-molded polymer base. It also packs great sound dispersion wherever you take it and is small enough to sit in the palm of your hand. It has a battery life that lasts up to 24 hours, and even has a built-in microphone for making calls, giving you the freedom to pull off a conference call poolside.','storage/24_1509890745_59ff1ab92bb18.jpg',1,1,1,'2017-11-01 16:40:59','2017-11-05 14:05:45'),
	(25,'B&O A9 White',2000,2000,5,'There are few more contentious topics in technology than fashion. For some it is a fundamental prerequisite in anything and everything they buy, for others it is a superfluous luxury symptomatic of an excuse for high prices and a lack of substance. Bang & Olufsen’s staggering BeoPlay A9 is unlikely to convince members of either camp to change sides, but they should at least be able to agree on one key aspect: there is no lack of substance here.','storage/25_1509900202_59ff3faa25f81.jpg',1,1,1,'2017-11-01 16:45:27','2017-11-05 16:43:22'),
	(27,'B&O H7',180,180,12,'Beoplay H7 features advanced battery technology with up to 20 hours of wireless playtime. The battery can be swapped in a snap or charged via USB. If the unthinkable should happen and the headphone runs out of power, simply plug in the cord to keep enjoying your music.\r\nIf you forget to turn the headphone off, Beoplay H7 also features an intelligent battery-saving function that automatically kicks in after 15 minutes and turns the power off.','storage/bang-olufsen-beoplay-h7-binaural-head-band-brown-headset-142346-detail-59fa24a78f856.jpg',3,1,1,'2017-11-01 19:46:47','2017-11-05 17:29:09');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`)
VALUES
	(1,1);

/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES
	(1,'Admin','web','2017-10-31 13:53:36','2017-10-31 13:53:36');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table suppliers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `suppliers`;

CREATE TABLE `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplierName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplierContact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplierTelephone` int(11) NOT NULL,
  `supplierEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplierStatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplierName` (`supplierName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;

INSERT INTO `suppliers` (`id`, `supplierName`, `supplierContact`, `address`, `supplierTelephone`, `supplierEmail`, `supplierStatus`, `created_at`, `updated_at`)
VALUES
	(1,'Avad','Jonas Antanavičius','Tuskluėnų 5c',860905374,'jonas@avad.lt','1','2017-10-31 13:59:19','2017-11-01 14:51:55');

/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `telephone`, `address`, `city`, `postcode`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Simonas Mateika','Mateika','simonas@firelita.lt','$2y$10$mnbqe3AyuZngeHoSn11uVuCtu/K.eKeWFBZwLnVs6HllGO9FcF83O','860905374','Zirmunu 32e-25','Vilnius','LT-09228','Upoli5UW8rbwWnEz3W0tDuig7QxWZcDGGDZN7BEhCkch21yxOJJOidJ2rFhW','2017-10-30 16:53:17','2017-11-06 15:11:27'),
	(2,'Test','Drive','test@drive.lt','$2y$10$zahODvxSqvPRK72QFLbk4eOSB8B/M6pXbmJSb1OYRVdgeOuGBAdRO','853242494','Sauletelkio al.11','Vilnius','','mFsqDybyvThXlypM1xXnadiNP15eOeAknnwKIxPrTGc6rDhKrXpa39FUYz4Z','2017-11-03 06:28:55','2017-11-07 08:19:48'),
	(3,'Lukas','Laurutis','lukas.laurutis@vgtu.lt','$2y$10$8N/ZBhQmwtgk5tX.bf0JjO9tKZ0cX4kVIYDgqGY5gzONCmH8I5QhK',NULL,'','',NULL,'snmlI1hQfXNB4ZyLBg0M3sJoCK3tFA26XIXlY8KGJUtwy8GwycEpHlLEFmua','2017-11-03 11:43:38','2017-11-03 11:43:38');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
