# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.35)
# Database: liquify
# Generation Time: 2017-11-03 12:00:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


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
  `postcode` int(11) DEFAULT NULL,
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
	(1,'Simonas','Mateika','simonas@firelita.lt','$2y$10$mnbqe3AyuZngeHoSn11uVuCtu/K.eKeWFBZwLnVs6HllGO9FcF83O','860905374','Zirmunu 32e-25','Vilnius',9228,'NcknMPW4fcbroVbhQ9GbptvdAsDMKPflL1q5dcaB8xdTDyvscH3Rfq0mds1D','2017-10-30 16:53:17','2017-11-01 18:31:32'),
	(2,'Test','Drive','test@drive.lt','$2y$10$zahODvxSqvPRK72QFLbk4eOSB8B/M6pXbmJSb1OYRVdgeOuGBAdRO','853242494','Sauletelkio al.11','Vilnius',0,'X8Bm917eDzau2u6dk9VtCyD5Myy0BrMsuHi0ttoOKajiTbn6ICWfA0kPlAql','2017-11-03 06:28:55','2017-11-03 06:30:12'),
	(3,'Lukas','Laurutis','lukas.laurutis@vgtu.lt','$2y$10$8N/ZBhQmwtgk5tX.bf0JjO9tKZ0cX4kVIYDgqGY5gzONCmH8I5QhK',NULL,'','',NULL,'snmlI1hQfXNB4ZyLBg0M3sJoCK3tFA26XIXlY8KGJUtwy8GwycEpHlLEFmua','2017-11-03 11:43:38','2017-11-03 11:43:38');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
