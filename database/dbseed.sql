/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.1.30-MariaDB : Database - detik
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2018_08_18_143927_create_news_table',1);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `model_type` varchar(191) NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `model_type` varchar(191) NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_id`,`model_type`) values (1,85,'App\\User'),(1,92,'App\\User');

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `redactional` text COLLATE utf8mb4_unicode_ci,
  `publish_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `news` */

insert  into `news`(`id`,`title`,`summary`,`detail`,`redactional`,`publish_date`,`created_at`,`updated_at`) values (4,'Kian Klop dengan Beto Goncalves, Stefano Lilipaly: Kami Punya Chemistry','<p>Stefano Lilipaly dan Beto Goncalves kian klop di lini depan timnas Indonesia U-23. Lilipaly merasa memiliki chemistry dengan pemain 37 tahun itu.</p>','<p><strong>Bekasi</strong>&nbsp;-&nbsp;<a href=\"https://www.detik.com/tag/stefano-lilipaly/\" target=\"_blank\" rel=\"noopener\">Stefano Lilipaly</a>&nbsp;dan&nbsp;<a href=\"https://www.detik.com/tag/beto-goncalves/\" target=\"_blank\" rel=\"noopener\">Beto Goncalves</a>&nbsp;kian klop di lini depan&nbsp;<a href=\"https://www.detik.com/tag/timnas-indonesia-u_23/\" target=\"_blank\" rel=\"noopener\">timnas Indonesia U-23</a>. Lilipaly merasa memiliki chemistry dengan pemain 37 tahun itu.<br /><br />Timnas Indonesia U-23 sukses mengalahkan Laos 3-0 laga lanjutan Grup A&nbsp;<a href=\"https://sport.detik.com/asian-games-2018\" target=\"_blank\" rel=\"noopener\">Asian Games 2018</a>. Tiga gol di Stadion Patriot Candrabhaga, Jumat (17/8/2018), dibukukan oleh Alberto Goncalves (dua gol) dan Ricky Fajrin.<br /><br />Gol kedua Indonesia merupakan hasil kerja sama antara Beto dengan Lilipaly. Pemain Bali United itu mengirimkan umpan dengan tumit, yang diselesaikan dengan tendangan Beto.</p>\r\n<p>Ini merupakan assist kedua Lilipaly kepada Beto. Pada laga sebelumnya, keduanya berkontribusi saat mengalahkan Taiwan 4-0.</p>','<p><strong>Bekasi</strong>&nbsp;-&nbsp;<a href=\"https://www.detik.com/tag/stefano-lilipaly/\" target=\"_blank\" rel=\"noopener\">Stefano Lilipaly</a>&nbsp;dan&nbsp;<a href=\"https://www.detik.com/tag/beto-goncalves/\" target=\"_blank\" rel=\"noopener\">Beto Goncalves</a>&nbsp;kian klop di lini depan&nbsp;<a href=\"https://www.detik.com/tag/timnas-indonesia-u_23/\" target=\"_blank\" rel=\"noopener\">timnas Indonesia U-23</a>. Lilipaly merasa memiliki chemistry dengan pemain 37 tahun itu.<br /><br />Timnas Indonesia U-23 sukses mengalahkan Laos 3-0 laga lanjutan Grup A&nbsp;<a href=\"https://sport.detik.com/asian-games-2018\" target=\"_blank\" rel=\"noopener\">Asian Games 2018</a>. Tiga gol di Stadion Patriot Candrabhaga, Jumat (17/8/2018), dibukukan oleh Alberto Goncalves (dua gol) dan Ricky Fajrin.<br /><br />Gol kedua Indonesia merupakan hasil kerja sama antara Beto dengan Lilipaly. Pemain Bali United itu mengirimkan umpan dengan tumit, yang diselesaikan dengan tendangan Beto.</p>\r\n<p>Ini merupakan assist kedua Lilipaly kepada Beto. Pada laga sebelumnya, keduanya berkontribusi saat mengalahkan Taiwan 4-0.</p>','2018-08-24','2018-08-19 00:11:14','2018-08-19 00:15:11');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `password_resets` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (1,'view_users','web','2017-07-17 07:30:12','2017-07-17 07:30:12'),(2,'add_users','web','2017-07-17 07:30:12','2017-07-17 07:30:12'),(3,'edit_users','web','2017-07-17 07:30:12','2017-07-17 07:30:12'),(4,'delete_users','web','2017-07-17 07:30:12','2017-07-17 07:30:12'),(5,'view_roles','web','2017-07-17 07:30:12','2017-07-17 07:30:12'),(6,'add_roles','web','2017-07-17 07:30:13','2017-07-17 07:30:13'),(7,'edit_roles','web','2017-07-17 07:30:13','2017-07-17 07:30:13'),(8,'delete_roles','web','2017-07-17 07:30:13','2017-07-17 07:30:13'),(126,'view_news','web','2018-08-18 14:43:23','2018-08-18 14:43:23'),(127,'add_news','web','2018-08-18 14:43:23','2018-08-18 14:43:23'),(128,'edit_news','web','2018-08-18 14:43:23','2018-08-18 14:43:23'),(129,'delete_news','web','2018-08-18 14:43:23','2018-08-18 14:43:23');

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(126,1),(127,1),(128,1),(129,1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (1,'Admin','web','2017-07-17 07:30:41','2017-07-17 07:30:41');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(1) DEFAULT NULL,
  `verified` tinyint(2) DEFAULT NULL,
  `email_token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_organizational_structures_id` int(10) DEFAULT NULL,
  `subfields_id` int(10) DEFAULT NULL,
  `company_id` int(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `last_logout` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`remember_token`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`name`,`email`,`password`,`remember_token`,`active`,`verified`,`email_token`,`m_organizational_structures_id`,`subfields_id`,`company_id`,`updated_at`,`created_at`,`last_login`,`last_logout`) values (92,'1010','Editor Berita','editor@detik.com','$2y$10$A7mSY5gHytB6S64RLooQrOl0LtNVEzVmbDFUC2n9cX3l6/DoIsDxa','kcEcUAJSwz9kKjwZCOpzt0KfIJLoxA6DFwz6PAzNBDoJY4zZH8S1K1ppIMHk',1,1,NULL,NULL,NULL,NULL,'2018-08-19 00:30:22','2018-01-22 16:24:59','2018-08-19 00:26:32','2018-08-19 00:30:22');

/*Table structure for table `visitlogs` */

DROP TABLE IF EXISTS `visitlogs`;

CREATE TABLE `visitlogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.0.0.0',
  `browser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_zone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `visitlogs` */

insert  into `visitlogs`(`id`,`ip`,`browser`,`os`,`user_id`,`user_name`,`country_code`,`country_name`,`region_name`,`city`,`zip_code`,`time_zone`,`latitude`,`longitude`,`hits`,`created_at`,`updated_at`) values (1,'::1','Chrome (63.0.3239.132)','Windows','0','Guest','','','','','','','0','0',70,'2018-02-02 11:52:34','2018-02-06 12:15:37');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
