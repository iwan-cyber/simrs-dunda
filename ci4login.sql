-- --------------------------------------------------------
-- Host:                         localhost
-- Versi server:                 10.1.25-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win32
-- HeidiSQL Versi:               11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk ci4login
CREATE DATABASE IF NOT EXISTS `ci4login` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ci4login`;

-- membuang struktur untuk table ci4login.auth_activation_attempts
CREATE TABLE IF NOT EXISTS `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel ci4login.auth_activation_attempts: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_activation_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_activation_attempts` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.auth_groups
CREATE TABLE IF NOT EXISTS `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel ci4login.auth_groups: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_groups` DISABLE KEYS */;
INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Kelas Admin'),
	(2, 'user', 'Kelas User');
/*!40000 ALTER TABLE `auth_groups` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.auth_groups_permissions
CREATE TABLE IF NOT EXISTS `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT '0',
  `permission_id` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel ci4login.auth_groups_permissions: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_groups_permissions` DISABLE KEYS */;
INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
	(1, 1),
	(1, 2),
	(2, 2);
/*!40000 ALTER TABLE `auth_groups_permissions` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.auth_groups_users
CREATE TABLE IF NOT EXISTS `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT '0',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel ci4login.auth_groups_users: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_groups_users` DISABLE KEYS */;
INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
	(1, 10),
	(2, 11);
/*!40000 ALTER TABLE `auth_groups_users` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.auth_logins
CREATE TABLE IF NOT EXISTS `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel ci4login.auth_logins: ~93 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
	(1, '::1', 'ridwanmaksud9@gmail.com', 6, '2021-07-19 13:14:08', 0),
	(2, '::1', 'admin', NULL, '2021-07-19 13:22:03', 0),
	(3, '::1', 'admin', 6, '2021-07-19 13:23:17', 0),
	(4, '::1', 'admin', 6, '2021-07-19 13:25:03', 0),
	(5, '::1', 'admin', 6, '2021-07-19 13:26:55', 0),
	(6, '::1', 'ridwanmaksud9@gmail.com', 7, '2021-07-19 13:28:46', 0),
	(7, '::1', 'ridwanmaksud9@gmail.com', 7, '2021-07-19 13:30:33', 0),
	(8, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-19 14:01:17', 1),
	(9, '::1', 'cvncvn', NULL, '2021-07-19 14:11:25', 0),
	(10, '::1', 'xcvbxcvb', NULL, '2021-07-19 14:11:30', 0),
	(11, '::1', 'admin', NULL, '2021-07-19 14:11:52', 0),
	(12, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-19 14:12:07', 1),
	(13, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-19 14:19:29', 1),
	(14, '::1', 'dfgdfgdf', NULL, '2021-07-19 14:19:46', 0),
	(15, '::1', 'dfgdfgfd', NULL, '2021-07-19 14:19:51', 0),
	(16, '::1', 'dfgdf', NULL, '2021-07-19 14:19:57', 0),
	(17, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-19 14:25:34', 1),
	(18, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-19 14:35:00', 1),
	(19, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-20 10:18:56', 1),
	(20, '::1', 'admin', NULL, '2021-07-20 11:12:21', 0),
	(21, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-20 11:12:30', 1),
	(22, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-21 03:45:42', 1),
	(23, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-21 05:59:00', 1),
	(24, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-21 11:39:17', 1),
	(25, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-22 06:25:28', 1),
	(26, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-23 03:29:06', 1),
	(27, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-26 22:11:43', 1),
	(28, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-27 01:48:55', 1),
	(29, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-28 05:22:22', 1),
	(30, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-29 14:47:47', 1),
	(31, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-30 05:38:24', 1),
	(32, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-30 08:35:39', 1),
	(33, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-31 06:53:03', 1),
	(34, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-07-31 19:49:41', 1),
	(35, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 08:10:53', 1),
	(36, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 10:06:59', 1),
	(37, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 11:26:33', 1),
	(38, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 12:49:39', 1),
	(39, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 13:20:44', 1),
	(40, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 14:05:04', 1),
	(41, '::1', 'naila@gmail.com', 11, '2021-08-01 14:05:18', 1),
	(42, '::1', 'naila@gmail.com', 11, '2021-08-01 14:06:08', 1),
	(43, '::1', 'naila@gmail.com', 11, '2021-08-01 14:10:26', 1),
	(44, '::1', 'naila@gmail.com', 11, '2021-08-01 14:14:18', 1),
	(45, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 14:14:36', 1),
	(46, '::1', 'naila@gmail.com', 11, '2021-08-01 14:17:48', 1),
	(47, '::1', 'naila@gmail.com', 11, '2021-08-01 14:20:18', 1),
	(48, '::1', 'naila@gmail.com', 11, '2021-08-01 14:22:07', 1),
	(49, '::1', 'naila@gmail.com', 11, '2021-08-01 14:38:18', 1),
	(50, '::1', 'naila@gmail.com', 11, '2021-08-01 14:40:14', 1),
	(51, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 14:48:50', 1),
	(52, '::1', 'naila', NULL, '2021-08-01 14:49:57', 0),
	(53, '::1', 'naila@gmail.com', 11, '2021-08-01 14:50:07', 1),
	(54, '::1', 'ridwanmaksud9@gmail.com', NULL, '2021-08-01 15:05:04', 0),
	(55, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 15:05:12', 1),
	(56, '::1', 'naila@gmail.com', 11, '2021-08-01 15:05:41', 1),
	(57, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 15:10:06', 1),
	(58, '::1', 'naila@gmail.com', 11, '2021-08-01 15:12:59', 1),
	(59, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 15:13:12', 1),
	(60, '::1', 'naila@gmail.com', 11, '2021-08-01 15:16:50', 1),
	(61, '::1', 'naila@gmail.com', 11, '2021-08-01 15:17:55', 1),
	(62, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 15:19:57', 1),
	(63, '::1', 'naila@gmail.com', 11, '2021-08-01 15:23:58', 1),
	(64, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 15:25:14', 1),
	(65, '::1', 'naila@gmail.com', 11, '2021-08-01 15:25:37', 1),
	(66, '::1', 'naila', NULL, '2021-08-01 15:32:24', 0),
	(67, '::1', 'naila@gmail.com', 11, '2021-08-01 15:32:32', 1),
	(68, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 15:32:45', 1),
	(69, '::1', 'naila@gmail.com', 11, '2021-08-01 15:40:12', 1),
	(70, '::1', 'naila@gmail.com', 11, '2021-08-01 15:51:47', 1),
	(71, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 15:52:00', 1),
	(72, '::1', 'naila@gmail.com', 11, '2021-08-01 15:54:28', 1),
	(73, '::1', 'naila@gmail.com', 11, '2021-08-01 15:56:12', 1),
	(74, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 15:57:08', 1),
	(75, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 15:57:51', 1),
	(76, '::1', 'naila@gmail.com', 11, '2021-08-01 15:58:55', 1),
	(77, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 15:59:13', 1),
	(78, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 16:04:30', 1),
	(79, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 16:05:16', 1),
	(80, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 16:31:11', 1),
	(81, '::1', 'naila@gmail.com', 11, '2021-08-01 16:31:40', 1),
	(82, '::1', 'naila@gmail.com', 11, '2021-08-01 16:32:52', 1),
	(83, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 16:33:05', 1),
	(84, '::1', 'naila@gmail.com', 11, '2021-08-01 16:35:46', 1),
	(85, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 16:35:57', 1),
	(86, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 16:44:07', 1),
	(87, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 16:44:49', 1),
	(88, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 16:52:49', 1),
	(89, '::1', 'naila@gmail.com', 11, '2021-08-01 16:53:09', 1),
	(90, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 16:53:27', 1),
	(91, '::1', 'naila@gmail.com', 11, '2021-08-01 17:05:49', 1),
	(92, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 17:06:03', 1),
	(93, '::1', 'naila@gmail.com', 11, '2021-08-01 17:12:21', 1),
	(94, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 17:14:30', 1),
	(95, '::1', 'naila@gmail.com', 11, '2021-08-01 17:15:26', 1),
	(96, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 17:17:36', 1),
	(97, '::1', 'naila@gmail.com', 11, '2021-08-01 17:32:12', 1),
	(98, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-01 17:32:42', 1),
	(99, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-02 18:22:11', 1),
	(100, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-03 01:23:54', 1),
	(101, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-03 02:02:55', 1),
	(102, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-03 02:08:37', 1),
	(103, '::1', 'ridwanmaksud9@gmail.com', 10, '2021-08-03 11:02:47', 1);
/*!40000 ALTER TABLE `auth_logins` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.auth_permissions
CREATE TABLE IF NOT EXISTS `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel ci4login.auth_permissions: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_permissions` DISABLE KEYS */;
INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
	(1, 'manage-user', 'Pengaturan Semua User'),
	(2, 'manage-profile', 'Mengelola Profile User Sendiri');
/*!40000 ALTER TABLE `auth_permissions` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.auth_reset_attempts
CREATE TABLE IF NOT EXISTS `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel ci4login.auth_reset_attempts: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_reset_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_reset_attempts` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.auth_tokens
CREATE TABLE IF NOT EXISTS `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel ci4login.auth_tokens: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_tokens` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.auth_users_permissions
CREATE TABLE IF NOT EXISTS `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `permission_id` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel ci4login.auth_users_permissions: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_users_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_users_permissions` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel ci4login.migrations: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1626709800, 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.m_instalasi
CREATE TABLE IF NOT EXISTS `m_instalasi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `INSTALASI` varchar(250) DEFAULT NULL,
  `STATUS` enum('Y','N') DEFAULT 'Y' COMMENT 'Y= aktif; N= tidak aktif',
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`),
  KEY `STATUS` (`STATUS`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ci4login.m_instalasi: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `m_instalasi` DISABLE KEYS */;
INSERT INTO `m_instalasi` (`ID`, `INSTALASI`, `STATUS`) VALUES
	(1, 'Layanan Rawat Jalan', 'Y'),
	(2, 'Layanan Rawat Inap', 'Y'),
	(3, 'Layanan Penunjang', 'Y'),
	(4, 'Instalasi Gawat Darurat', 'Y');
/*!40000 ALTER TABLE `m_instalasi` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.m_kelompok_pegawai
CREATE TABLE IF NOT EXISTS `m_kelompok_pegawai` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `KELOMPOK_PEGAWAI` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ci4login.m_kelompok_pegawai: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `m_kelompok_pegawai` DISABLE KEYS */;
INSERT INTO `m_kelompok_pegawai` (`ID`, `KELOMPOK_PEGAWAI`) VALUES
	(1, 'Dokter Spesialis'),
	(2, 'Dokter Umum'),
	(3, 'Direktur'),
	(4, 'Perawat'),
	(5, 'Bidan');
/*!40000 ALTER TABLE `m_kelompok_pegawai` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.m_paket_layanan
CREATE TABLE IF NOT EXISTS `m_paket_layanan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_PAKET` varchar(250) DEFAULT NULL,
  `TARIF` int(11) DEFAULT '0',
  `IDPERBUB` int(11) DEFAULT NULL,
  `STATUS` enum('Y','N') DEFAULT 'Y' COMMENT 'Y= aktif; N= non aktif',
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`),
  KEY `STATUS` (`STATUS`),
  KEY `IDPERBUB` (`IDPERBUB`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ci4login.m_paket_layanan: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `m_paket_layanan` DISABLE KEYS */;
INSERT INTO `m_paket_layanan` (`ID`, `NAMA_PAKET`, `TARIF`, `IDPERBUB`, `STATUS`) VALUES
	(1, 'Layanan Konsultasi Dokter Spesialis', 50000, 0, 'Y'),
	(2, 'Layanan lainnya', 25000, 0, 'Y');
/*!40000 ALTER TABLE `m_paket_layanan` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.m_pasien
CREATE TABLE IF NOT EXISTS `m_pasien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NOMR` varchar(50) NOT NULL,
  `TITLE` varchar(50) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `TEMPAT` varchar(50) NOT NULL,
  `TGLLAHIR` varchar(50) NOT NULL,
  `JENISKELAMIN` varchar(50) NOT NULL,
  `ALAMAT` varchar(50) NOT NULL,
  `KELURAHAN` varchar(50) NOT NULL,
  `KDKECAMATAN` varchar(50) NOT NULL,
  `KOTA` varchar(50) NOT NULL,
  `KDPROVINSI` varchar(40) NOT NULL,
  `NOTELP` varchar(50) NOT NULL,
  `NOKTP` varchar(50) NOT NULL,
  `SUAMI_ORTU` varchar(50) NOT NULL,
  `PEKERJAAN` varchar(50) NOT NULL,
  `STATUS` varchar(50) NOT NULL,
  `AGAMA` varchar(50) NOT NULL,
  `PENDIDIKAN` varchar(50) NOT NULL,
  `KDCARABAYAR` varchar(50) NOT NULL,
  `NIP` varchar(50) NOT NULL,
  `TGLDAFTAR` varchar(50) NOT NULL,
  `ALAMAT_KTP` varchar(50) NOT NULL,
  `PARENT_NOMR` varchar(50) NOT NULL,
  `PENANGGUNGJAWAB_NAMA` varchar(50) NOT NULL,
  `PENANGGUNGJAWAB_HUBUNGAN` varchar(50) NOT NULL,
  `PENANGGUNGJAWAB_ALAMAT` varchar(50) NOT NULL,
  `PENANGGUNGJAWAB_PHONE` varchar(50) NOT NULL,
  `NOMR_LAMA` varchar(50) NOT NULL,
  `NO_KARTU` varchar(50) NOT NULL,
  `JNS_PASIEN` varchar(50) NOT NULL,
  `KDPROVIDER` varchar(50) NOT NULL,
  `NMPROVIDER` varchar(50) NOT NULL,
  `Kelas` varchar(50) NOT NULL,
  `DUKCAPIL` varchar(50) NOT NULL,
  `KEL` varchar(50) NOT NULL,
  `KEC` varchar(50) NOT NULL,
  `KAB` varchar(50) NOT NULL,
  `PROV` varchar(50) NOT NULL,
  `GOL_DARAH` varchar(50) NOT NULL,
  PRIMARY KEY (`id`,`NOMR`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ci4login.m_pasien: ~50 rows (lebih kurang)
/*!40000 ALTER TABLE `m_pasien` DISABLE KEYS */;
INSERT INTO `m_pasien` (`id`, `NOMR`, `TITLE`, `NAMA`, `TEMPAT`, `TGLLAHIR`, `JENISKELAMIN`, `ALAMAT`, `KELURAHAN`, `KDKECAMATAN`, `KOTA`, `KDPROVINSI`, `NOTELP`, `NOKTP`, `SUAMI_ORTU`, `PEKERJAAN`, `STATUS`, `AGAMA`, `PENDIDIKAN`, `KDCARABAYAR`, `NIP`, `TGLDAFTAR`, `ALAMAT_KTP`, `PARENT_NOMR`, `PENANGGUNGJAWAB_NAMA`, `PENANGGUNGJAWAB_HUBUNGAN`, `PENANGGUNGJAWAB_ALAMAT`, `PENANGGUNGJAWAB_PHONE`, `NOMR_LAMA`, `NO_KARTU`, `JNS_PASIEN`, `KDPROVIDER`, `NMPROVIDER`, `Kelas`, `DUKCAPIL`, `KEL`, `KEC`, `KAB`, `PROV`, `GOL_DARAH`) VALUES
	(1, '000000', 'AN', 'MOH IRSAD MANGOPA', 'GORONTALO', '2008-10-19', 'l', 'KAYU BULAN', '11', '795', '69', '8', '', '-', 'SADLEN MOPANGGA', '6', '0', '0', '3', '0', '', '2017-07-14', 'KAYU BULAN', '0', '0', '0', '0', '0', '', '0000195867347', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(2, '000001', 'NY', 'SULTIN', 'GORONTALO', '2014-04-01', 'P', 'HUNGGALUWA', '5558', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'HUNGGALUWA', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(3, '000002', 'TN', 'ABIDUN HABIBIE', 'GENTUMA', '1960-04-02', 'l', 'GENTUMA', '5', '808', '70', '8', '', '-', 'SAIRA PAKAYA, NY', '0', '1', '0', '3', '0', '', '2017-07-14', 'GENTUMA', '0', '0', '0', '0', '0', '', '3000096759655', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(4, '000003', 'NY', 'WIWIN SUNU', 'LIMBOTO', '1990-08-13', 'p', 'HUNGGALUWA', '11', '795', '69', '8', '', '-', 'SATRIA POLAPA', '8', '1', '0', '5', '0', '', '2017-07-14', 'HUNGGALUWA', '0', '0', '0', '0', '0', '', '0001075630724', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(5, '000006', 'NY', 'OKU MANYOE', '', '2014-03-01', 'p', 'TIBAWA', '7101', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'TIBAWA', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(6, '000013', 'NY', 'SUMIATY PAKAYA, NY', 'KWANDANG', '1983-08-17', 'P', 'MOLINGKAPOTO SELATAN', '4720', '808', '70', '8', '081355706750', '7501065708830003', 'ROSNI YUNUS', '2', '2', '0', '8', '1', 'pendaftaran', '2017-07-14', 'MOLINGKAPOTO SELATAN', '0', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(7, '000106', 'NY', 'MARYAM AYUBA', '', '2014-03-01', 'p', 'TELAGA', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Telaga', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(8, '000115', 'TN', 'GILANG BADARU', '', '2014-03-01', 'l', 'LIMBOTO', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Limboto', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(9, '000181', 'NY', 'DARWIYAH', '', '2014-03-01', 'p', 'PAGUYAMAN', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Paguyaman', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(10, '000230', 'TN', 'FARIS SAID', '', '2014-03-01', 'l', 'BONGOMEME', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Bongomeme', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(11, '000243', 'NY', 'FATIYAH TUNNISA TANAN', '', '2014-03-01', 'p', 'HUTABOHU', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'HUTABOHU', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(12, '000244', 'TN', 'HERMAN NASIM', '', '2014-03-01', 'l', 'PADENGO', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'PADENGO', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(13, '000262', 'NY', 'LISNA BAGU', '', '2014-03-01', 'p', 'KAYUMERAH', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Kayumerah', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(14, '000361', 'NY', 'RITA S TAPU ', 'KWANDANG', '1959-08-15', 'p', 'BULOTA/LIMBOTO', '11', '795', '69', '8', '', '-', 'SARIPA ALIWU', '2', '1', '0', '10', '0', '', '2017-07-14', 'BULOTA/LIMBOTO', '0', '0', '0', '0', '0', '', '0000139529981', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(15, '000419', 'NY', 'MOTI R. LAHAY', 'GORONTALO', '1964-06-02', 'p', 'PENTADIO TIMUR', '9', '801', '69', '8', '', '-', 'DAVID MOHAMAD', '0', '1', '0', '0', '0', '', '2017-07-14', 'PENTADIO TIMUR', '0', '0', '0', '0', '0', '', '0000065779558', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(16, '000466', 'TN', 'ZUBAIR H MANSJUR, BA', 'BUOL', '1946-07-09', 'l', 'HUNGGALUWA', '11', '795', '69', '8', '', '-', 'ALM DIAN SALEH', '34', '1', '0', '5', '0', '', '2017-07-14', 'HUNGGALUWA', '0', '0', '0', '0', '0', '', '0000140076281', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(17, '000486', 'NY', 'JUHRIANTI K.', '', '2014-03-01', 'p', 'YOSONEGORO', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Yosonegoro', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(18, '000495', 'TN', 'HARSONO ABD  HAMID, TN', 'GORONTALO', '1954-12-30', 'L', 'HEPUHULAWA/LIMBOTO', '3400', '795', '69', '8', '082293721261', '7501013012540001', 'SRYATI HANAFI', '', '2', '0', '10', '3', 'uci', '2017-07-14', 'HEPUHULAWA', '0', '', '', '', '', '', '0000158776716', '', '', '', '0', '0', '0', '0', '0', '0', 'tid'),
	(19, '000498', 'NY', 'ZAENAB SOLEMAN', 'TULADENGGI', '1939-07-17', 'p', 'TULADENGGI', '9', '801', '69', '8', '', '-', 'RAHMAT PATEDA, TN', '34', '1', '0', '5', '0', '', '2017-07-14', 'Tuladenggi', '0', '0', '0', '0', '0', '', '0000139473393', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(20, '000499', 'TN', 'DRS.HARSONO ABD.HAMID', '', '1954-12-30', 'l', 'HEPUHULAWA', '4672', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'HEPUHULAWA', '0', '0', '0', '0', '0', '', '0000158776716', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(21, '000602', 'TN', 'RUSTAM KUSO', '', '2014-03-01', 'l', 'KAYUBULAN', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Kayubulan', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(22, '000631', 'NY', 'RITA S TAPU', 'KWANDANG', '1959-08-15', 'p', 'LIMBOTO', '11', '795', '69', '8', '', '-', 'RARTISNO R KATILI, TN', '0', '1', '0', '5', '0', '', '2017-07-14', 'LIMBOTO', '0', '0', '0', '0', '0', '', '0000139529981', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(23, '000708', 'NY', 'RAHMIYATI HUNGGIO', '', '2014-03-01', 'p', 'ISIMU UTARA', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'isimu utara', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(24, '000723', 'NY', 'MEYKO SALAMA', '', '2014-03-01', 'p', 'HUNGGALUWA', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Hunggaluwa', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(25, '000865', 'NY', 'AGUSTINA DUHE', '', '2014-03-01', 'p', 'HUNGGALUWA', '9693', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Hunggaluwa', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(26, '000904', 'NY', 'SALMA TAIB', '', '2014-03-01', 'p', 'LIMBOTO', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'LIMBOTO', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(27, '000910', 'NY', 'MARYAM LABDUL', 'GORONTALO', '1955-08-30', 'p', 'HULAWA/TELAGA', '16', '800', '69', '8', '', '-', '', '2', '1', '0', '0', '0', '', '2017-07-14', 'HULAWA/TELAGA', '0', '0', '0', '0', '0', '', '0000139519451', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(28, '000924', 'TN', 'SUDIRO NURKAMIDEN', '', '2014-03-01', 'l', 'HUNGGALUWA', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'HUNGGALUWA', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(29, '000973', 'NY', 'SRI MARTIWI H. IMRAN', '', '2014-03-01', 'p', 'KOTA GTLO', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'KOTA GTLO', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(30, '000996', 'TN', 'BERUH SAINGO ALBERT', '', '2014-03-01', 'l', 'KAYUMERAH', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Kayumerah', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(31, '001011', 'TN', 'TN.ABDUL LATIF INTILI', '', '2014-03-01', 'l', 'BOLIHUANGGA', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Bolihuangga', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(32, '001035', 'TN', 'THOMAS LAHAY, TN', 'LIMBOTO', '1951-05-23', 'P', 'KAYUBULAN', '3403', '795', '69', '8', '081340803816', '7501012305510001', 'MURTIN LAIYA', '', '2', '0', '5', '3', 'ulan', '2017-07-14', 'KAYUBULAN', '0', '', '', '', '', '', '0000139481177', '', '', '', '0', '0', '0', '0', '0', '0', 'tid'),
	(33, '001053', 'NY', 'HAPISA AKUBA', '', '2014-03-01', 'p', 'PULUBALA', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Pulubala', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(34, '001054', 'NY', 'NURNANINGSIH GIASI', '', '2014-03-01', 'p', 'YOSONEGORO', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'YOSONEGORO', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(35, '001122', 'NY', 'RIANTI BADU', '', '2014-03-01', 'p', 'KAYUMERAH', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'KAYUMERAH', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(36, '001174', 'NY', 'IDA MOPUTI, NY', 'TELAGA', '1951-09-12', 'P', 'TULADENGGI', '3420', '801', '69', '8', '085340999938', '7501104912510001', 'HALWIN MOHAMAD', '', '2', '0', '5', '3', 'uci', '2017-07-14', 'TULADENGGI', '0', '', '', '', '', '', '0001827646795', '', '', '', '0', '0', '0', '0', '0', '0', 'tid'),
	(37, '001191', 'NY', 'FATMAH JUSUF', '', '2014-03-01', 'p', 'TUNGGULO', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'TUNGGULO', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(38, '001217', 'NY', 'RISKO YUSUF', '', '1954-05-27', 'p', 'BONGOMEME', '7231', '0', '0', '0', '', '-', '', '0', '1', '0', '0', '0', '', '2017-07-14', 'Bongomeme', '0', '0', '0', '0', '0', '', '0000955827235', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(39, '001252', 'NY', 'SALMA AHMAD, NY', 'GORONTALO', '1994-06-23', 'L', 'TAMAILA', '3474', '805', '69', '8', '085255580960', '7501136306940001', 'MAU JAYIU', '8', '2', '0', '3', '2', 'pendaftaran', '2017-07-14', 'TOLANGOHULA', '0', '', '', '', '', '', '0000958652087', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(40, '001302', 'NY', 'NUR J. RASJID', '', '2014-03-01', 'p', 'PULUBALA', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Pulubala', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(41, '001453', 'NY', 'ROSMA DEWI DUHE', '', '2014-03-01', 'p', 'HEPUHULAWA', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Hepuhulawa', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(42, '001455', 'NY', 'SALMA KADIR', '', '2014-03-01', 'p', 'GENTUMA', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Gentuma', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(43, '001476', 'NY', 'HASPRY JS BUHUNGO, NY', 'LIMBOTO', '1952-03-21', 'P', 'HUNGGALUWA', '3401', '795', '69', '8', '-', '7501016103520001', 'TITIN KAABA', '', '2', '0', '8', '3', 'naning', '2017-07-14', 'HUNGGALUWA', '0', '', '', '', '', '', '0000139508368', '', '', '', '0', '0', '0', '0', '0', '0', 'tid'),
	(44, '001509', 'TN', 'DENY HASAN', '', '2014-03-01', 'l', 'KAYUMERAH', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Kayumerah', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(45, '001557', 'TN', 'MUHAMAD SURIYANTO', '', '2014-03-01', 'l', 'HUNGGALUWA', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Hunggaluwa', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(46, '001572', 'TN', 'ROYKE R.KANTI', '', '2014-03-01', 'l', 'TENILO', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Tenilo', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(47, '001575', 'TN', 'MISDARI NANGILI', '', '2014-01-03', 'l', 'TENILO', '5657', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Tenilo', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0'),
	(48, '001583', 'NY', 'SULASTRI A  ISMAIL, NY', 'GORONTALO', '1953-08-15', 'P', 'KAYUBULAN', '3403', '795', '69', '8', '085240499481', '7501015508530001', 'NOVI', '', '2', '0', '5', '1', 'uci', '2017-07-14', 'KAYUBULAN', '0', '', '', '', '', '', '0000139376441', '', '', '', '0', '0', '0', '0', '0', '0', 'tid'),
	(49, '001612', 'TN', 'ARIPIN MANGENRE, TN', 'KAB. BARRU', '1969-08-17', 'L', 'BONGOMEME', '2007', '9', '5', '72', '085241127828', '7205091708690002', 'SITI MADU', '', '2', '0', '3', '1', 'uci', '2017-07-14', 'DUSUN II', '0', '', '', '', '', '', '', '', '', '', '0', '1', '2007', '9', '5', '72', 'tid'),
	(50, '001654', 'TN', 'SALEH MUKSID', '', '2014-03-01', 'l', 'PULUBALA', '0', '0', '0', '0', '', '-', '', '0', '0', '8', '0', '0', '', '2017-07-14', 'Pulubala', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0');
/*!40000 ALTER TABLE `m_pasien` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.m_pegawai
CREATE TABLE IF NOT EXISTS `m_pegawai` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NIK` varchar(50) DEFAULT NULL,
  `NAMA_PEGAWAI` varchar(250) DEFAULT NULL,
  `JENKEL` enum('L','P') DEFAULT NULL,
  `NIP` varchar(50) DEFAULT NULL,
  `STATUS_KEPEGAWAIAN` enum('PNS','PPPK','HONORER','KONTRAK') DEFAULT NULL COMMENT '''PNS'',''PPPK'',''HONORER'',''KONTRAK'',''',
  `IDKELOMPOK_PEGAWAI` int(11) DEFAULT NULL COMMENT 'join tabel m_kelompok_pegawai',
  `STATUS` enum('Y','N') DEFAULT 'Y' COMMENT 'Y= aktif; N=non aktif',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NIK` (`NIK`),
  KEY `STATUS` (`STATUS`),
  KEY `IDKELOMPOK_PEGAWAI` (`IDKELOMPOK_PEGAWAI`),
  KEY `STATUS_KEPEGAWAIAN` (`STATUS_KEPEGAWAIAN`),
  KEY `JENKEL` (`JENKEL`),
  KEY `NIP` (`NIP`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ci4login.m_pegawai: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `m_pegawai` DISABLE KEYS */;
INSERT INTO `m_pegawai` (`ID`, `NIK`, `NAMA_PEGAWAI`, `JENKEL`, `NIP`, `STATUS_KEPEGAWAIAN`, `IDKELOMPOK_PEGAWAI`, `STATUS`) VALUES
	(1, '750000', 'A.R. Mohammad', 'L', '5682222222', 'PNS', 1, 'Y'),
	(2, '4560000', 'dr. Iwan Yusuf', 'L', '7556562515', 'PNS', 2, 'Y');
/*!40000 ALTER TABLE `m_pegawai` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.m_pegawai_unitlayanan
CREATE TABLE IF NOT EXISTS `m_pegawai_unitlayanan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDPEGAWAI` int(11) DEFAULT NULL COMMENT 'join tabel m_pegawai',
  `IDUNITLAYANAN` int(11) DEFAULT NULL,
  `STATUS` enum('Y','N') DEFAULT 'Y' COMMENT 'Y= aktif; N=Non aktif',
  PRIMARY KEY (`ID`),
  KEY `STATUS` (`STATUS`),
  KEY `ID` (`ID`),
  KEY `IDUNIT` (`IDUNITLAYANAN`) USING BTREE,
  KEY `IDDOKTER` (`IDPEGAWAI`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ci4login.m_pegawai_unitlayanan: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `m_pegawai_unitlayanan` DISABLE KEYS */;
INSERT INTO `m_pegawai_unitlayanan` (`ID`, `IDPEGAWAI`, `IDUNITLAYANAN`, `STATUS`) VALUES
	(1, 1, 2, 'Y'),
	(2, 2, 9, 'Y');
/*!40000 ALTER TABLE `m_pegawai_unitlayanan` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.m_ppk
CREATE TABLE IF NOT EXISTS `m_ppk` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `KODE_PPK` varchar(50) NOT NULL,
  `NAMA_PPK` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `KODE_PPK` (`KODE_PPK`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ci4login.m_ppk: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `m_ppk` DISABLE KEYS */;
INSERT INTO `m_ppk` (`ID`, `KODE_PPK`, `NAMA_PPK`) VALUES
	(1, 'PKM-01', 'Puskesmas Limboto'),
	(2, 'PKM-02', 'Puskesmas Telaga'),
	(3, 'PKM-03', 'Puskesmas Limboto Barat'),
	(4, 'PKM-04', 'Puskesmas Talaga Jaya'),
	(5, 'PKM-05', 'Puskesmas Talaga Biru'),
	(6, 'PKM-6', 'Puskesmas TIlango');
/*!40000 ALTER TABLE `m_ppk` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.m_ruangan
CREATE TABLE IF NOT EXISTS `m_ruangan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RUANGAN` varchar(250) DEFAULT NULL,
  `IDUNITLAYANAN` int(11) DEFAULT NULL COMMENT 'join ke tabel m_unit_layanan',
  `STATUS` enum('Y','N') DEFAULT 'Y' COMMENT 'Y= aktif; N= tidak aktif',
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`),
  KEY `STATUS` (`STATUS`),
  KEY `IDUNITLAYANAN` (`IDUNITLAYANAN`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ci4login.m_ruangan: ~12 rows (lebih kurang)
/*!40000 ALTER TABLE `m_ruangan` DISABLE KEYS */;
INSERT INTO `m_ruangan` (`ID`, `RUANGAN`, `IDUNITLAYANAN`, `STATUS`) VALUES
	(1, 'Irina H Lantai 1', 2, 'Y'),
	(2, 'Irina F Lantai 1', 2, 'Y'),
	(3, 'Irina F Lantai 2', 2, 'Y'),
	(4, 'Irina E Lantai 1', 4, 'Y'),
	(5, 'Poliklinik Interna', 1, 'Y'),
	(6, 'Poliklinik Orthopedi', 1, 'Y'),
	(7, 'Poliklinik Syaraf', 1, 'Y'),
	(8, 'Poliklinik Kebidanan', 1, 'Y'),
	(9, 'Poliklinik Mata', 1, 'Y'),
	(10, 'Poliklinik Gigi', 1, 'Y'),
	(11, 'Poliklinik Kulit Kelamin', 1, 'Y'),
	(12, 'Poliklinik THT', 1, 'Y'),
	(13, 'Irdo', 9, 'Y');
/*!40000 ALTER TABLE `m_ruangan` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.m_smf
CREATE TABLE IF NOT EXISTS `m_smf` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SMF` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ci4login.m_smf: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `m_smf` DISABLE KEYS */;
INSERT INTO `m_smf` (`ID`, `SMF`) VALUES
	(1, 'Interna'),
	(2, 'Jiwa'),
	(3, 'Bedah');
/*!40000 ALTER TABLE `m_smf` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.m_unit_layanan
CREATE TABLE IF NOT EXISTS `m_unit_layanan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_UNIT_LAYANAN` varchar(250) DEFAULT NULL,
  `IDINSTALASI` int(11) DEFAULT NULL COMMENT 'join tabel m_isntalasi',
  `STATUS` enum('Y','N') DEFAULT 'Y' COMMENT 'Y=aktif, N=tidak aktif',
  PRIMARY KEY (`ID`),
  KEY `STATUS` (`STATUS`),
  KEY `ID` (`ID`),
  KEY `IDINSTALASI` (`IDINSTALASI`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ci4login.m_unit_layanan: ~11 rows (lebih kurang)
/*!40000 ALTER TABLE `m_unit_layanan` DISABLE KEYS */;
INSERT INTO `m_unit_layanan` (`ID`, `NAMA_UNIT_LAYANAN`, `IDINSTALASI`, `STATUS`) VALUES
	(1, 'Poliklinik', 1, 'Y'),
	(2, 'Perawatan Penyakit Dalam', 2, 'Y'),
	(3, 'Perawatan Anak', 2, 'Y'),
	(4, 'Perawatan Bedah', 2, 'Y'),
	(5, 'Perawatan Syaraf', 2, 'Y'),
	(7, 'Perawatan VIP', 2, 'Y'),
	(8, 'Perawatan Mata', 2, 'Y'),
	(9, 'IGD', 4, 'Y'),
	(10, 'Bedah', 4, 'Y'),
	(11, 'Non Bedah', 4, 'Y'),
	(12, 'Ponek', 4, 'Y');
/*!40000 ALTER TABLE `m_unit_layanan` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.pendaftaran
CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `NOPEN` varchar(50) NOT NULL DEFAULT 'N',
  `ID_PASIEN` varchar(50) NOT NULL DEFAULT 'N' COMMENT 'join tabel m_pasien',
  `NORM` varchar(50) DEFAULT NULL,
  `CITO` enum('Y','N') DEFAULT 'N',
  `RESIKO_JATUH` enum('Y','N') DEFAULT 'N',
  `TGL_PENDAFTARAN` date DEFAULT NULL,
  `JAM_PENDAFTARAN` time DEFAULT NULL,
  `ID_INSTALASI` int(11) DEFAULT NULL COMMENT 'join tabel m_instalasi',
  `ID_UNITLAYANAN` int(11) DEFAULT NULL COMMENT 'join tabel m_unit_layanan',
  `ID_RUANGAN` int(11) DEFAULT NULL COMMENT 'join tabel m_ruangan',
  `ID_SMF` int(11) DEFAULT NULL COMMENT 'join tabel m_smf',
  `ID_DOKTER` int(11) DEFAULT NULL COMMENT 'join tabel m_dokter',
  `ID_PAKET` int(11) DEFAULT NULL,
  `ID_PENJAMIN` int(11) DEFAULT NULL COMMENT 'join m_penjamin',
  `PJ_KATEGORI` varchar(50) DEFAULT NULL,
  `PJ_HUBUNGAN` varchar(50) DEFAULT NULL,
  `PJ_KELAMIN` varchar(50) DEFAULT NULL,
  `PJ_KERJAAN` varchar(50) DEFAULT NULL,
  `PJ_PENDIDIKAN` varchar(50) DEFAULT NULL,
  `PJ_ALAMAT` varchar(50) DEFAULT NULL,
  `PJ_NOTELP` varchar(50) DEFAULT NULL,
  `STATUS` int(11) DEFAULT '2' COMMENT '1= DITERIMA/TERLAYANI; 2=  ANTRI; 3=SELESAI; 4=BATAL',
  `JAM_STATUS` time DEFAULT NULL,
  `TGL_STATUS` date DEFAULT NULL,
  `STATUS_FINAL` varchar(20) DEFAULT NULL COMMENT 'Inap, Kontrol, Pulang',
  `JAM_STATUS_FINAL` time DEFAULT NULL,
  `TGL_STATUS_FINAL` date DEFAULT NULL,
  `USER_USESSION` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`NOPEN`),
  KEY `CITO` (`CITO`),
  KEY `RESIKO_JATUH` (`RESIKO_JATUH`),
  KEY `ID_INSTALASI` (`ID_INSTALASI`),
  KEY `ID_UNITLAYANAN` (`ID_UNITLAYANAN`),
  KEY `ID_RUANGAN` (`ID_RUANGAN`),
  KEY `ID_SMF` (`ID_SMF`),
  KEY `ID_DOKTER` (`ID_DOKTER`),
  KEY `STATUS` (`STATUS`),
  KEY `ID_PENJAMIN` (`ID_PENJAMIN`),
  KEY `PJ_KATEGORI` (`PJ_KATEGORI`),
  KEY `PJ_HUBUNGAN` (`PJ_HUBUNGAN`),
  KEY `PJ_KELAMIN` (`PJ_KELAMIN`),
  KEY `PJ_KERJAAN` (`PJ_KERJAAN`),
  KEY `PJ_PENDIDIKAN` (`PJ_PENDIDIKAN`),
  KEY `PJ_ALAMAT` (`PJ_ALAMAT`),
  KEY `PJ_NOTELP` (`PJ_NOTELP`),
  KEY `ID_PASIEN` (`ID_PASIEN`),
  KEY `NORM` (`NORM`),
  KEY `TGL_PENDAFTARAN` (`TGL_PENDAFTARAN`),
  KEY `JAM_PENDAFTARAN` (`JAM_PENDAFTARAN`),
  KEY `ID_PAKET` (`ID_PAKET`),
  KEY `JAM_STATUS` (`JAM_STATUS`),
  KEY `TGL_STATUS` (`TGL_STATUS`),
  KEY `USER_USESSION` (`USER_USESSION`),
  KEY `JAM_STATUS_SELESAI` (`JAM_STATUS_FINAL`) USING BTREE,
  KEY `TGL_STATUS_SELESAI` (`TGL_STATUS_FINAL`) USING BTREE,
  KEY `STATUS_FINAL` (`STATUS_FINAL`(1))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ci4login.pendaftaran: ~12 rows (lebih kurang)
/*!40000 ALTER TABLE `pendaftaran` DISABLE KEYS */;
INSERT INTO `pendaftaran` (`NOPEN`, `ID_PASIEN`, `NORM`, `CITO`, `RESIKO_JATUH`, `TGL_PENDAFTARAN`, `JAM_PENDAFTARAN`, `ID_INSTALASI`, `ID_UNITLAYANAN`, `ID_RUANGAN`, `ID_SMF`, `ID_DOKTER`, `ID_PAKET`, `ID_PENJAMIN`, `PJ_KATEGORI`, `PJ_HUBUNGAN`, `PJ_KELAMIN`, `PJ_KERJAAN`, `PJ_PENDIDIKAN`, `PJ_ALAMAT`, `PJ_NOTELP`, `STATUS`, `JAM_STATUS`, `TGL_STATUS`, `STATUS_FINAL`, `JAM_STATUS_FINAL`, `TGL_STATUS_FINAL`, `USER_USESSION`) VALUES
	('PDUNDA-0001/07/2021.RJ-U', '1', '000000', NULL, NULL, '2021-07-31', '08:36:27', 1, 1, 5, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '10:54:52', '2021-08-01', 'Kontrol', '00:20:21', '2021-08-01', NULL),
	('PDUNDA-0002/07/2021.RJ-U', '2', '000001', NULL, NULL, '2021-07-31', '08:37:23', 1, 1, 5, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '10:56:52', '2021-08-01', 'Inap', '00:20:21', '2021-08-01', NULL),
	('PDUNDA-0003/07/2021.RJ-U', '3', '000002', NULL, NULL, '2021-07-31', '11:25:31', 1, 1, 5, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '11:01:05', '2021-08-01', 'Kontrol', '00:20:21', '2021-08-01', NULL),
	('PDUNDA-0004/07/2021.RJ-U', '4', '000003', NULL, NULL, '2021-07-31', '11:26:28', 1, 1, 5, 1, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '11:49:59', '2021-08-01', 'Kontrol', '00:00:00', '0000-00-00', NULL),
	('PDUNDA-0005/07/2021.RJ-U', '5', '000006', NULL, NULL, '2021-08-01', '10:58:54', 1, 1, 5, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '11:49:59', '2021-08-01', 'Pulang', '00:20:21', '2021-08-01', NULL),
	('PDUNDA-0006/07/2021.RJ-U', '10', '000230', NULL, NULL, '2021-08-02', '18:34:20', 1, 1, 5, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '18:35:04', '2021-08-02', 'Kontrol', '00:20:21', '2021-08-02', NULL),
	('PDUNDA-0008/07/2021.RJ-U', '27', '000910', NULL, NULL, '2021-08-02', '18:37:53', 1, 1, 5, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '18:38:25', '2021-08-02', NULL, NULL, NULL, NULL),
	('PDUNDA-0009/07/2021.RJ-U', '27', '000910', 'Y', NULL, '2021-08-02', '20:23:10', 1, 1, 5, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '20:47:47', '2021-08-02', 'Kontrol', '00:20:21', '2021-08-02', NULL),
	('PDUNDA-0010/07/2021.RJ-U', '28', '000924', NULL, NULL, '2021-08-02', '20:25:58', 1, 1, 5, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '01:28:29', '2021-08-03', 'Kontrol', '00:20:21', '2021-08-03', NULL),
	('PDUNDA-0011/07/2021.RJ-U', '29', '000973', 'Y', 'Y', '2021-08-02', '20:27:28', 1, 1, 5, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '01:28:29', '2021-08-03', 'Kontrol', '00:20:21', '2021-08-03', NULL),
	('PDUNDA-0012/07/2021.RJ-U', '10', '000230', NULL, NULL, '2021-08-03', '02:26:51', 1, 1, 5, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '02:27:28', '2021-08-03', 'Pulang', '00:20:21', '2021-08-03', NULL),
	('PDUNDA-0031/07/2021.RJ-U', '1', '000000', NULL, NULL, '2021-08-03', '03:56:46', 2, 4, 4, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `pendaftaran` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.pendaftaran_bpjs
CREATE TABLE IF NOT EXISTS `pendaftaran_bpjs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOPEN` varchar(50) DEFAULT NULL COMMENT 'join tabel pendaftaran',
  `NOMR` varchar(50) DEFAULT NULL,
  `NOKARTU` varchar(50) DEFAULT NULL,
  `ID_KELASHAK` int(11) DEFAULT NULL COMMENT 'join tabel m_kelas',
  `ID_JENISPESERTA` int(11) DEFAULT NULL COMMENT 'join tabel m_jenispeserta',
  `NO_SEP` varchar(50) DEFAULT NULL,
  `NO_SKDP` varchar(50) DEFAULT NULL,
  `ID_PENJAMIN` int(11) DEFAULT NULL COMMENT 'join tabel m_penjamin Umum atau BPJS dan lainnya',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NOPEN` (`NOPEN`),
  KEY `ID_KELASHAK` (`ID_KELASHAK`),
  KEY `NO_SEP` (`NO_SEP`),
  KEY `NO_SKDP` (`NO_SKDP`),
  KEY `ID_JENISPESERTA` (`ID_JENISPESERTA`),
  KEY `NOMR` (`NOMR`),
  KEY `ID_PENJAMIN` (`ID_PENJAMIN`),
  KEY `NOKARTU` (`NOKARTU`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ci4login.pendaftaran_bpjs: ~8 rows (lebih kurang)
/*!40000 ALTER TABLE `pendaftaran_bpjs` DISABLE KEYS */;
INSERT INTO `pendaftaran_bpjs` (`ID`, `NOPEN`, `NOMR`, `NOKARTU`, `ID_KELASHAK`, `ID_JENISPESERTA`, `NO_SEP`, `NO_SKDP`, `ID_PENJAMIN`) VALUES
	(1, 'PDUNDA-0002/07/2021.RJ-U', '000001', '02522133', 3, 2, '7878787788', '765', 2),
	(2, 'PDUNDA-0004/07/2021.RJ-U', '000003', '2122221', 1, 1, '212122221212', '21', 2),
	(3, 'PDUNDA-0005/07/2021.RJ-U', '000006', '87878', 1, 2, '12122', '566', 2),
	(4, 'PDUNDA-0006/07/2021.RJ-U', '000230', '232', 1, 1, '73463463', '763', 2),
	(5, 'PDUNDA-0009/07/2021.RJ-U', '000910', '313', 1, 2, '998932993V00001', '2578', 2),
	(6, 'PDUNDA-0010/07/2021.RJ-U', '000924', '3434', 34, 345, '345', '2514', 2),
	(7, 'PDUNDA-0011/07/2021.RJ-U', '000973', '32342', 1, 1, '34343', '7778', 2),
	(8, 'PDUNDA-0031/07/2021.RJ-U', '000000', '343', 33, 4, '4343', '3477', 2);
/*!40000 ALTER TABLE `pendaftaran_bpjs` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.pendaftaran_non_bpjs
CREATE TABLE IF NOT EXISTS `pendaftaran_non_bpjs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOPEN` varchar(50) NOT NULL DEFAULT '0',
  `NOMR` varchar(20) NOT NULL DEFAULT '0',
  `NOKARTU` varchar(50) DEFAULT NULL,
  `NAMA_PENJAMIN` varchar(50) DEFAULT NULL,
  `ALAMAT_PENJAMIN` text,
  `TELP` varchar(50) DEFAULT NULL,
  `ID_PENJAMIN` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NOPEN` (`NOPEN`),
  KEY `NAMA_PENJAMIN` (`NAMA_PENJAMIN`),
  KEY `NO_KARTU` (`NOKARTU`) USING BTREE,
  KEY `NOMR` (`NOMR`),
  KEY `ID_PENJAMIN` (`ID_PENJAMIN`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ci4login.pendaftaran_non_bpjs: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `pendaftaran_non_bpjs` DISABLE KEYS */;
INSERT INTO `pendaftaran_non_bpjs` (`ID`, `NOPEN`, `NOMR`, `NOKARTU`, `NAMA_PENJAMIN`, `ALAMAT_PENJAMIN`, `TELP`, `ID_PENJAMIN`) VALUES
	(1, 'PDUNDA-0001/07/2021.RJ-U', '000000', '-', '-', '-', '-', 1),
	(2, 'PDUNDA-0003/07/2021.RJ-U', '000002', '-', '-', '-', '-', 1),
	(3, 'PDUNDA-0008/07/2021.RJ-U', '000910', '-', '-', '-', '-', 1),
	(4, 'PDUNDA-0012/07/2021.RJ-U', '000230', '-', '-', '-', '-', 1);
/*!40000 ALTER TABLE `pendaftaran_non_bpjs` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.pendaftaran_pasien_kontrol
CREATE TABLE IF NOT EXISTS `pendaftaran_pasien_kontrol` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SKDP` varchar(50) DEFAULT NULL,
  `NOMR` varchar(50) DEFAULT NULL,
  `TANGGAL_SURAT` date DEFAULT NULL,
  `TANGGAL_MULAI_KONTROL` date DEFAULT NULL,
  `ID_INSTALASI` int(11) DEFAULT NULL,
  `ID_RUANGAN` int(11) DEFAULT NULL,
  `ID_DOKTER` int(11) DEFAULT NULL,
  `SELESAI` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `SKDP` (`SKDP`),
  KEY `NOMR` (`NOMR`),
  KEY `TANGGAL_SURAT` (`TANGGAL_SURAT`),
  KEY `TANGGAL_MULAI_KONTROL` (`TANGGAL_MULAI_KONTROL`),
  KEY `ID_INSTALASI` (`ID_INSTALASI`),
  KEY `ID_RUANGAN` (`ID_RUANGAN`),
  KEY `ID_DOKTER` (`ID_DOKTER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ci4login.pendaftaran_pasien_kontrol: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `pendaftaran_pasien_kontrol` DISABLE KEYS */;
/*!40000 ALTER TABLE `pendaftaran_pasien_kontrol` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.pendaftaran_rujukan
CREATE TABLE IF NOT EXISTS `pendaftaran_rujukan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOPEN` varchar(50) DEFAULT NULL,
  `NOMR` varchar(50) DEFAULT NULL,
  `NOBPJS` varchar(50) DEFAULT NULL,
  `ID_PPK` int(11) DEFAULT NULL,
  `NORUJUKAN` varchar(50) DEFAULT NULL,
  `TGL_RUJUKAN` varchar(50) DEFAULT NULL,
  `DOKTER` varchar(50) DEFAULT NULL,
  `SMF_DOKTER` varchar(50) DEFAULT NULL,
  `DIAGNOSA` varchar(50) DEFAULT NULL,
  `ID_IDC10` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `NOPEN` (`NOPEN`),
  KEY `NORUJUKAN` (`NORUJUKAN`),
  KEY `NOMR` (`NOMR`),
  KEY `ID_PPK` (`ID_PPK`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ci4login.pendaftaran_rujukan: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `pendaftaran_rujukan` DISABLE KEYS */;
INSERT INTO `pendaftaran_rujukan` (`ID`, `NOPEN`, `NOMR`, `NOBPJS`, `ID_PPK`, `NORUJUKAN`, `TGL_RUJUKAN`, `DOKTER`, `SMF_DOKTER`, `DIAGNOSA`, `ID_IDC10`) VALUES
	(1, 'PDUNDA-0011/07/2021.RJ-U', '000973', '32342', NULL, '23232', '2021-08-03', 'dr. nurhija', 'umum', 'anemia', 2);
/*!40000 ALTER TABLE `pendaftaran_rujukan` ENABLE KEYS */;

-- membuang struktur untuk table ci4login.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel ci4login.users: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(10, 'ridwanmaksud9@gmail.com', 'mokaraja', 'Iwan Maksud', 'default.jpg', '$2y$10$au10co7vJ4In86uQa31hxe/LYtFDuvJy7uYGtSMeWg3CTW0yzeahC', NULL, NULL, NULL, '8a316e4044f76311335389515797c4cd', NULL, NULL, 1, 0, '2021-07-19 13:59:33', '2021-07-19 13:59:33', NULL),
	(11, 'naila@gmail.com', 'naila', 'Rinaya Annalila Maksud', 'default.jpg', '$2y$10$veQb1Bsen6oTTeHC/Phhaub9kzxRRP6p3lSM3frmM.FvYLGuvTW7G', NULL, NULL, NULL, '0db98fffe1a5970cb21b311a2178e36b', NULL, NULL, 1, 0, '2021-08-01 13:53:14', '2021-08-01 13:53:14', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
