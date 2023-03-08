/*
SQLyog Professional v12.5.1 (32 bit)
MySQL - 10.4.27-MariaDB : Database - latsar
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`latsar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `latsar`;

/*Table structure for table `_pegawai` */

DROP TABLE IF EXISTS `_pegawai`;

CREATE TABLE `_pegawai` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `unit_kerja` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `_pegawai_nip_unique` (`nip`),
  UNIQUE KEY `_pegawai_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `_pegawai` */

insert  into `_pegawai`(`id`,`nip`,`nama`,`email`,`gender`,`jabatan`,`unit_kerja`,`pendidikan`,`created_at`,`updated_at`) values 
(1,'123321123','Tiara','user1@gmail.com','1','Staff','sosial','S1 Informatika','2023-02-23 15:53:48','2023-02-23 15:53:48'),
(3,'1234567654432','geee','dasarakunya@gmail.com','1','Staff','sosial','TI S1','2023-02-28 10:21:22','2023-02-28 10:21:22');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2019_12_14_000001_create_personal_access_tokens_table',1),
(2,'2021_11_01_052403_table_users',1),
(3,'2022_03_20_094634_tablel_leveluser',1),
(4,'2023_02_23_153955_create__pegawai_table',2),
(5,'2023_02_28_125251_table_usulan',3),
(6,'2023_02_28_125639_table_usulan',4),
(7,'2023_02_28_132209_table_kompetensi',5);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `table_kompetensi` */

DROP TABLE IF EXISTS `table_kompetensi`;

CREATE TABLE `table_kompetensi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` int(30) NOT NULL,
  `nama_pelatihan` varchar(255) NOT NULL,
  `jenis_pelatihan` varchar(255) NOT NULL,
  `waktu` time NOT NULL,
  `penyelenggara` varchar(255) NOT NULL,
  `jumlah_jam` varchar(255) NOT NULL,
  `no_sertifikat` varchar(255) NOT NULL,
  `file` varbinary(0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `table_kompetensi` */

insert  into `table_kompetensi`(`id`,`nip`,`nama_pelatihan`,`jenis_pelatihan`,`waktu`,`penyelenggara`,`jumlah_jam`,`no_sertifikat`,`file`,`created_at`,`updated_at`) values 
(1,2147483647,'BNSP','Web DEV','00:00:07','LSP UDINUS','31','09898','',NULL,NULL);

/*Table structure for table `table_leveluser` */

DROP TABLE IF EXISTS `table_leveluser`;

CREATE TABLE `table_leveluser` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `table_leveluser_level_unique` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `table_leveluser` */

insert  into `table_leveluser`(`id`,`level`,`created_at`,`updated_at`) values 
(1,'Super Admin','2023-02-23 14:27:46','2023-02-23 14:27:46'),
(2,'Admin','2023-02-23 14:27:46','2023-02-23 14:27:46'),
(3,'User','2023-02-23 14:27:46','2023-02-23 14:27:46');

/*Table structure for table `table_users` */

DROP TABLE IF EXISTS `table_users`;

CREATE TABLE `table_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `unit_kerja` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`nip`),
  UNIQUE KEY `table_users_username_unique` (`username`),
  UNIQUE KEY `table_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `table_users` */

insert  into `table_users`(`id`,`username`,`nama`,`nip`,`jabatan`,`unit_kerja`,`pendidikan`,`email`,`gender`,`level`,`password`,`created_at`,`updated_at`) values 
(1,'user1','user1','123321','staff','sosial','S1 Teknik Informatika','user1@gmail.com','1','1','$2y$10$d8TD1i5E7jRJep.iAGq35ewnUF1SUIR9W4x3h.1Aad9idMSDjsWRy','2023-02-23 14:27:52','2023-02-23 14:27:52'),
(4,'superadmin','superadmin','345543','kepala','sosial','S1 Teknik Informatika','superadmin@gmail.com','2','1','$2y$10$xsuf1UZ2QPrmw481mbPbPumUkImIHaXBBawyXiVk68uR8d9I/BlVW','2023-02-26 19:30:37','2023-02-26 19:30:37'),
(7,'Tiasaja','Tiara','1234567654432','Staff','sosial','S1 Teknik Informatika','tiara@gmail.com','2','1','$2y$10$JhMzHgYx0rb8Ts.LSnD9jOSpPKqKep9NP6BcztMKraSAXwQDzSr5.','2023-03-06 12:20:45','2023-03-06 12:20:45');

/*Table structure for table `table_usulan` */

DROP TABLE IF EXISTS `table_usulan`;

CREATE TABLE `table_usulan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usulan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `table_usulan` */

insert  into `table_usulan`(`id`,`usulan`,`created_at`,`updated_at`) values 
(1,'coba pengembangan langsung di lapangan','2023-02-28 12:57:48','2023-02-28 12:57:48'),
(2,'Sertifikasi di BNSP','2023-02-28 13:03:06','2023-02-28 13:03:06');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`firstname`,`lastname`,`email`,`email_verified_at`,`password`,`address`,`city`,`country`,`postal`,`about`,`remember_token`,`created_at`,`updated_at`) values 
(1,'admin','Admin','Admin','admin@argon.com',NULL,'$2y$10$r9f/g8IaRv3WQZDRBiLBH.Lu6EH5tfrWCoSU90c5CtHI5Os7VRvmG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(2,'superadmin',NULL,NULL,'superadmin@gmail.com',NULL,'$2y$10$rassIkl2IVjODs6O78/AXO/lHIg0ssZ2/nyM0FSbMqaPa9lPkrX0q',NULL,NULL,NULL,NULL,NULL,NULL,'2023-02-27 08:01:57','2023-02-27 08:01:57');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
