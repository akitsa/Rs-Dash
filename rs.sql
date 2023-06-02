-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for rs_ojt
CREATE DATABASE IF NOT EXISTS `rs_ojt` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `rs_ojt`;

-- Dumping structure for table rs_ojt.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
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

-- Dumping data for table rs_ojt.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table rs_ojt.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rs_ojt.migrations: ~9 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_05_07_030746_create_tb_kat_news', 1),
	(6, '2023_05_07_030903_create_tb_news', 1),
	(7, '2023_05_07_032654_create_tb_galery_img', 1),
	(8, '2023_05_15_114553_create_tb_galery_vid', 1),
	(9, '2023_05_17_060251_create_tb_profile', 1);

-- Dumping structure for table rs_ojt.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rs_ojt.password_resets: ~0 rows (approximately)

-- Dumping structure for table rs_ojt.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rs_ojt.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table rs_ojt.tb_galery_img
CREATE TABLE IF NOT EXISTS `tb_galery_img` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `desc` varchar(50) NOT NULL,
  `status` enum('A','Na') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rs_ojt.tb_galery_img: ~4 rows (approximately)
INSERT INTO `tb_galery_img` (`id`, `title`, `foto`, `desc`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'depan rsi', 'http://localhost:8000/back/uploads/galeri/images/1684857341.jpg', 'foto di depan rumah sakit', 'A', '2023-05-23 08:55:41', '2023-05-23 08:55:41'),
	(2, 'foto staf', 'http://localhost:8000/back/uploads/galeri/images/1684857367.jpg', 'foto bersama staf', 'A', '2023-05-23 08:56:07', '2023-05-23 08:56:07'),
	(3, 'rawatjalan', 'http://localhost:8000/back/uploads/galeri/images/1684857414.jpg', 'rawat jalan rsi', 'A', '2023-05-23 08:56:54', '2023-05-23 08:56:54'),
	(4, 'penyerahan bantuan', 'http://localhost:8000/back/uploads/galeri/images/1684858311.jpg', 'penyerahan bantuan rsi', 'A', '2023-05-23 09:11:51', '2023-05-23 09:11:51'),
	(5, 'data1', 'http://localhost:8000/back/uploads/galeri/images/1684858348.jpg', 'penyerahan makan', 'A', '2023-05-23 09:12:28', '2023-05-23 09:12:28');

-- Dumping structure for table rs_ojt.tb_galery_vid
CREATE TABLE IF NOT EXISTS `tb_galery_vid` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `desc` varchar(255) NOT NULL,
  `status` enum('A','NA') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rs_ojt.tb_galery_vid: ~1 rows (approximately)
INSERT INTO `tb_galery_vid` (`id`, `title`, `video`, `desc`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'test video', 'http://localhost:8000/back/uploads/galeri/video/1684898446.mov', 'tes', 'A', '2023-05-23 20:20:46', '2023-05-23 20:20:46');

-- Dumping structure for table rs_ojt.tb_kat_news
CREATE TABLE IF NOT EXISTS `tb_kat_news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_kat` varchar(255) NOT NULL,
  `status_kat` enum('A','Na') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rs_ojt.tb_kat_news: ~0 rows (approximately)
INSERT INTO `tb_kat_news` (`id`, `nm_kat`, `status_kat`) VALUES
	(1, 'investigasi', 'A');

-- Dumping structure for table rs_ojt.tb_news
CREATE TABLE IF NOT EXISTS `tb_news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_kat_news` varchar(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `tooltip` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `status` enum('A','Na') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tb_news_id_kat_news_index` (`id_kat_news`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rs_ojt.tb_news: ~0 rows (approximately)
INSERT INTO `tb_news` (`id`, `id_kat_news`, `title`, `tooltip`, `url`, `foto`, `desc`, `status`, `created_at`, `updated_at`) VALUES
	(1, '1', 'berita hari senin', 'testes', 'www.com', NULL, '<p>tes<br />\r\ntes</p>\r\n\r\n<p>p</p>', 'A', '2023-05-23 08:40:35', '2023-05-23 08:40:35');

-- Dumping structure for table rs_ojt.tb_profile
CREATE TABLE IF NOT EXISTS `tb_profile` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_perusahaan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rs_ojt.tb_profile: ~1 rows (approximately)
INSERT INTO `tb_profile` (`id`, `nm_perusahaan`, `alamat`, `telp`, `email`) VALUES
	(1, 'pt coba', 'jl panda no 1', 82142421, 'bima@gmail.com');

-- Dumping structure for table rs_ojt.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','User') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table rs_ojt.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$WEJn1G/68dIQFPuXpRXUpeGQk51Fdx2sSKjXh3zjB9difagJCp87a', 'Admin', NULL, '2023-05-23 08:35:34', '2023-05-23 08:35:34');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
