/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 10.11.8-MariaDB : Database - db_simta
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_simta` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `db_simta`;

/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

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

/*Table structure for table `job_batches` */

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `job_batches` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1);

/*Table structure for table `mst_role` */

DROP TABLE IF EXISTS `mst_role`;

CREATE TABLE `mst_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `mst_role` */

insert  into `mst_role`(`id`,`name`,`is_active`,`update_by`,`last_update`) values 
(1,'ADMIN',1,1,'2024-05-31 08:48:54'),
(2,'DOSEN',1,1,'2024-05-31 08:49:03'),
(3,'MAHASISWA',1,1,'2024-05-31 08:49:13');

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('Cc3HcPMpjZXj6RjjLqe0wzu9wYSYz1Ry8PB4dJjM',5,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoicldXbEZTeGhLOHNnS0dvSjk4cllOUWhqaVl4QUczdUpsb2hrbTRjTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vc2ltdGEua2dkciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==',1718437252),
('DXxVIgFKd3v1srG783yvPmTCsbYVVwjomBW75VR0',3,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQmdtckdnMUhiZXNaeXlIMkUxUlVHQ0Y4VXphaE41Z3lUb1BiQ09rdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vc2ltdGEua2dkci9taHNsb2diaW1iaW5nYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=',1718430324),
('hTJRlBXZhF8J5AvQ7mhsgmGcn4ABgoqdviHnisEs',3,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMVluOHhkalkyNFhRTkY2QlBVOFdTOTExN1RSa3N2c1BEemozbDdSRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHBzOi8vc2ltdGEua2dkci9wZGZtaHNsb2diaW1iaW5nYW4/aWRfZG9zcGVtPTUmaWRfbWhzPTMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=',1718440560),
('jvacVDyeba41dp22cQ3EscbkpS3585bH9HELuOPW',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ21BVEc3WmdLU2tWcEFRV0t1OG1VSklNS1R0dW9ZTlNhR0xlVks0UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHBzOi8vc2ltdGEua2dkci9rbWFoYXNpc3dhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1718437403),
('KMemBEqnTrchXHpud4TITyGH4Hpc4tWlXy0649kx',3,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQktDRm42SHg5YnQwcGR4clhqR0JMZEY3Q2NMNzVMOWhZNGxHT1VORiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHBzOi8vc2ltdGEua2dkci9wZGZtaHNsb2diaW1iaW5nYW4/aWRfZG9zcGVtPTUmaWRfbWhzPTMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=',1718437716),
('mTLajOnRVETKx07SudfwwVr703SwGQuGRD2zte1v',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoibmhFZXdVTXBIVVVWRmZXczVBM3Nnd3JWYUxUVXJyM3pOQzIxb3pwVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vc2ltdGEua2dkci9sb2dvdXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1718440493),
('nNmUkq4XyNHaFxJO22o7FxnxnJrz24awBrdzYwFB',3,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ2FpamluZmlKcENnZHdTOGlaV3lnZTV0aThSV3g4MFBFWkhORVdSQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vc2ltdGEua2dkci9taHNsb2diaW1iaW5nYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=',1718440496),
('Rf6mxtyB1zgp9ys0aFASOiANZtJhOMY79DxxFhsj',3,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoibzN2Q3BDQjdPQ3JWckVtekdrT0MzdlN1cEF6Q3F3bG9PMFBPd0RHdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vc2ltdGEua2dkci9taHNsb2diaW1iaW5nYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=',1718443445);

/*Table structure for table `trx_ba_seminar` */

DROP TABLE IF EXISTS `trx_ba_seminar`;

CREATE TABLE `trx_ba_seminar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) DEFAULT NULL,
  `id_dospem` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `judul` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `trx_ba_seminar` */

insert  into `trx_ba_seminar`(`id`,`id_mhs`,`id_dospem`,`tanggal`,`judul`,`catatan`,`note`,`status`,`is_active`,`last_update`) values 
(1,3,5,'2024-06-10','test','tezt',NULL,2,1,'2024-06-15 12:49:34'),
(2,3,6,'2024-06-10','test','dospem2',NULL,1,1,'2024-06-15 12:15:50'),
(3,3,8,'2024-06-10','test','testd3',NULL,1,1,'2024-06-15 12:17:22'),
(4,3,9,'2024-06-10','testd4','tesgfhfh dose4',NULL,1,1,'2024-06-15 12:17:40'),
(5,3,10,'2024-06-10','terstd','gytgygy',NULL,1,1,'2024-06-15 12:17:57');

/*Table structure for table `trx_ba_sidang` */

DROP TABLE IF EXISTS `trx_ba_sidang`;

CREATE TABLE `trx_ba_sidang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) DEFAULT NULL,
  `id_dospem` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `judul` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `hasil` text DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `trx_ba_sidang` */

/*Table structure for table `trx_detail_log_bimbingan` */

DROP TABLE IF EXISTS `trx_detail_log_bimbingan`;

CREATE TABLE `trx_detail_log_bimbingan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_log` int(11) DEFAULT NULL,
  `id_dospem` int(11) DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `plant` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `trx_detail_log_bimbingan` */

insert  into `trx_detail_log_bimbingan`(`id`,`id_log`,`id_dospem`,`posisi`,`catatan`,`plant`,`status`,`is_active`,`last_update`,`update_by`) values 
(1,1,5,'Pembimbing 1','asdasdas','asdasdas',1,1,'2024-06-06 06:24:36',NULL),
(2,1,6,'Penguji 1','asdasdsa','asdasdas',1,1,'2024-06-06 06:24:36',NULL);

/*Table structure for table `trx_log_bimbingan` */

DROP TABLE IF EXISTS `trx_log_bimbingan`;

CREATE TABLE `trx_log_bimbingan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) DEFAULT NULL,
  `id_dospem` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `plant` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `trx_log_bimbingan` */

insert  into `trx_log_bimbingan`(`id`,`id_mhs`,`id_dospem`,`tanggal`,`catatan`,`plant`,`note`,`status`,`is_active`,`last_update`) values 
(1,3,5,'2024-04-02','test bimbingan 1','bimbingan 2 menjelaskan alur penelitian yang sudah diterapkan',NULL,2,1,'2024-06-15 12:47:02'),
(2,3,6,'2024-04-10','bimbingan sama dospem ke 2','test bimbingan',NULL,1,1,'2024-06-15 12:06:20'),
(3,3,5,'2024-04-15','test','test lagi','Tes reject',3,1,'2024-06-15 12:47:13'),
(4,3,6,'2024-04-17','test sm dopem 2','test dospem 2',NULL,1,1,'2024-06-15 12:07:14');

/*Table structure for table `trx_rb_bimbingan` */

DROP TABLE IF EXISTS `trx_rb_bimbingan`;

CREATE TABLE `trx_rb_bimbingan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) DEFAULT NULL,
  `id_dospem` int(11) DEFAULT NULL,
  `judul` text DEFAULT NULL,
  `nilai_sp1_1` int(11) DEFAULT NULL,
  `nilai_sp1_2` int(11) DEFAULT NULL,
  `nilai_sp1_3` int(11) DEFAULT NULL,
  `nilai_sp1_4` int(11) DEFAULT NULL,
  `nilai_sp1_5` int(11) DEFAULT NULL,
  `nilai_sp1_6` int(11) DEFAULT NULL,
  `nilai_sp2_1` int(11) DEFAULT NULL,
  `nilai_sp2_2` int(11) DEFAULT NULL,
  `nilai_sp2_3` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `trx_rb_bimbingan` */

/*Table structure for table `trx_rb_ujian` */

DROP TABLE IF EXISTS `trx_rb_ujian`;

CREATE TABLE `trx_rb_ujian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) DEFAULT NULL,
  `id_dospem` int(11) DEFAULT NULL,
  `judul` text DEFAULT NULL,
  `nilai_sp1_1` int(11) DEFAULT NULL,
  `nilai_sp1_2` int(11) DEFAULT NULL,
  `nilai_sp1_3` int(11) DEFAULT NULL,
  `nilai_sp1_4` int(11) DEFAULT NULL,
  `nilai_sp1_5` int(11) DEFAULT NULL,
  `nilai_sp1_6` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `trx_rb_ujian` */

/*Table structure for table `trx_setting_bimbingan` */

DROP TABLE IF EXISTS `trx_setting_bimbingan`;

CREATE TABLE `trx_setting_bimbingan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) DEFAULT NULL,
  `id_dospem_1` int(11) DEFAULT NULL,
  `id_dospem_2` int(11) DEFAULT NULL,
  `id_dospej_1` int(11) DEFAULT NULL,
  `id_dospej_2` int(11) DEFAULT NULL,
  `id_dospej_3` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `trx_setting_bimbingan` */

insert  into `trx_setting_bimbingan`(`id`,`id_mhs`,`id_dospem_1`,`id_dospem_2`,`id_dospej_1`,`id_dospej_2`,`id_dospej_3`,`is_active`,`last_update`,`update_by`) values 
(1,3,5,6,8,9,10,1,'2024-06-15 11:24:39',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `no_tlp` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `ttd` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_active` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`role_id`,`nik`,`name`,`no_tlp`,`email`,`email_verified_at`,`password`,`pass`,`photo`,`ttd`,`remember_token`,`created_at`,`updated_at`,`is_active`,`update_by`) values 
(1,1,'105101','Admin','081211159962','admin1@gmail.com','2024-06-02 08:12:05','$2y$12$2D.PkwdCSbs/k0vtQ9YTFuCv20ZBykawcBxrIp57xNpGa6Yf0OZIm','1','default.jpg','-',NULL,'2024-06-02 08:12:05','2024-06-02 08:12:05',1,1),
(2,1,'010101','Kang Dru1','0812111599621','te1s@name.com','2024-06-15 11:14:00','$2y$12$GQrKVfls/v2TZSd2fDIS3Oi2oCoGfGRO/K.Ln5iRYqHM1v3I.5hsW','1231','74119.png','-',NULL,'2024-06-15 11:14:00','2024-06-15 11:14:00',0,1),
(3,3,'105220001','MHS 1','087765443255','mhs1@gmail.com','2024-06-15 11:12:51','$2y$12$0oXqxVLgGut6szHV7JWyv.2BeuQ2R0p5pmijvoEyFXXbDAThPaLP2','123','default.jpg','-',NULL,'2024-06-15 11:12:51','2024-06-15 11:12:51',1,1),
(4,3,'105220002','MHS 2','082222555225552','mhs2@gmail.com','2024-06-15 11:21:17','$2y$12$TmOIS3Iwjbo3a1lUBsHGQu5.DXLum3Y3ZPe43HAnuplmb33zCGnKu','123','default.jpg','-',NULL,'2024-06-15 11:21:17','2024-06-15 11:21:17',1,1),
(5,2,'105201','DOSEN 1','089976654321','dosen1@gmail.com','2024-06-08 09:42:31','$2y$12$HaxtXQJJ9Rijj7ehKWi2tugnGKNXYX32wdYyWApzt9g0rbRXtGM0G','123','default.jpg','53409.jpeg',NULL,'2024-06-08 09:42:31','2024-06-08 09:42:31',1,1),
(6,2,'105202','DOSEN2','08997765432','dosen2@gmail.com','2024-06-09 15:11:12','$2y$12$aq84d6VwlVUI6pYua44QSOX2fBDSwVcEYpcI3wLswm39EKCflM2A6','123','default.jpg','-',NULL,'2024-06-09 15:11:12','2024-06-09 15:11:12',1,1),
(7,3,'556677','Tes name','089999','tes@name.com','2024-06-15 11:14:28','$2y$12$Jg3S2Q/XpEmqVI0EHAkQKuVxHxq9ovKo9dUgN2q2YSxRP7IORrmxO','1','default.jpg','-',NULL,'2024-06-15 11:14:28','2024-06-15 11:14:28',0,1),
(8,2,'105203','Dosen 3','098758856462','d3@gmail.com',NULL,'$2y$12$oJUctyyEZmaPF40eIvQikuFkw8xcS.UXCXum8RPw2O6FsolIPI7AC','123','default.jpg','-',NULL,NULL,NULL,1,1),
(9,2,'105204','Dosen 4','08654678878','d4@gmail.com',NULL,'$2y$12$BxU9rTG8mQVwwtCGku.jaenQscCzKUJ6fx1xQO2TVqJ2A6lT50Q9C','123','default.jpg','-',NULL,NULL,NULL,1,1),
(10,2,'105205','Dosen 5','098786756456','d5@gmail.com',NULL,'$2y$12$ppLfEqNCVc53mA15VapyfubgmBwBmFxWWExYbirfuglgz8Wg.1Q4G','123','default.jpg','-',NULL,NULL,NULL,1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
