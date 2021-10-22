# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.23)
# Database: tripanca_paper_less
# Generation Time: 2019-03-21 06:12:04 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table aktiviti
# ------------------------------------------------------------

DROP TABLE IF EXISTS `aktiviti`;

CREATE TABLE `aktiviti` (
  `aktivitiId` int(11) NOT NULL AUTO_INCREMENT,
  `aktivitiNama` text,
  `aktivitiCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `aktivitiCreatedBy` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`aktivitiId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table ci_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`)
VALUES
	('cf41da628e7ce74b19057b29969fcd8ac116edde','::1',1553134031,X'5F5F63695F6C6173745F726567656E65726174657C693A313535333133343033313B7573657249647C733A313A2239223B757365724E616D657C733A353A226A6170616C223B757365724E616D614C656E676B61707C733A31303A22537570657261646D696E223B757365724469766973697C733A353A225375706572223B7573657244697669736949647C733A313A2231223B'),
	('2aff6f188d6d2307b627ec0b0c4552e4c9294f89','::1',1553138074,X'5F5F63695F6C6173745F726567656E65726174657C693A313535333133383037343B7573657249647C733A313A2239223B757365724E616D657C733A353A226A6170616C223B757365724E616D614C656E676B61707C733A31303A22537570657261646D696E223B757365724469766973697C733A353A225375706572223B7573657244697669736949647C733A313A2231223B'),
	('4ce479ebe046505f487c0f9e1a17bd9e27a656ec','::1',1553138394,X'5F5F63695F6C6173745F726567656E65726174657C693A313535333133383339343B7573657249647C733A313A2239223B757365724E616D657C733A353A226A6170616C223B757365724E616D614C656E676B61707C733A31303A22537570657261646D696E223B757365724469766973697C733A353A225375706572223B7573657244697669736949647C733A313A2231223B'),
	('fc7067cbfc1e7c4f20b885281673b0ff23adf9c9','::1',1553138972,X'5F5F63695F6C6173745F726567656E65726174657C693A313535333133383937323B7573657249647C733A313A2239223B757365724E616D657C733A353A226A6170616C223B757365724E616D614C656E676B61707C733A31303A22537570657261646D696E223B757365724469766973697C733A353A225375706572223B7573657244697669736949647C733A313A2231223B7374617475737C733A33323A22426572686173696C2055706C6F61642052657669736920496B6874697361722E223B5F5F63695F766172737C613A313A7B733A363A22737461747573223B733A333A226E6577223B7D'),
	('561b567a9d39ff62b6580efa9b5567b3315781f6','::1',1553139990,X'5F5F63695F6C6173745F726567656E65726174657C693A313535333133393939303B7573657249647C733A313A2239223B757365724E616D657C733A353A226A6170616C223B757365724E616D614C656E676B61707C733A31303A22537570657261646D696E223B757365724469766973697C733A353A225375706572223B7573657244697669736949647C733A313A2231223B'),
	('5e4c8040d137074821c4165fd4f3e6b12463152e','::1',1553140867,X'5F5F63695F6C6173745F726567656E65726174657C693A313535333134303836373B7573657249647C733A313A2239223B757365724E616D657C733A353A226A6170616C223B757365724E616D614C656E676B61707C733A31303A22537570657261646D696E223B757365724469766973697C733A353A225375706572223B7573657244697669736949647C733A313A2231223B7374617475737C733A32333A22426572686173696C2055706C6F6164205265766973692E223B5F5F63695F766172737C613A313A7B733A363A22737461747573223B733A333A226F6C64223B7D'),
	('ca8726a6cd2604a92284bbcfe909ffa4b8079315','::1',1553141189,X'5F5F63695F6C6173745F726567656E65726174657C693A313535333134313138393B7573657249647C733A313A2235223B757365724E616D657C733A343A226D656469223B757365724E616D614C656E676B61707C733A343A224D656469223B757365724469766973697C733A333A22485244223B7573657244697669736949647C733A313A2232223B'),
	('be6088be6c4325682b69d0b9fd7c4c0eed1e4a14','::1',1553141770,X'5F5F63695F6C6173745F726567656E65726174657C693A313535333134313437393B7573657249647C733A313A2235223B757365724E616D657C733A343A226D656469223B757365724E616D614C656E676B61707C733A343A224D656469223B757365724469766973697C733A333A22485244223B7573657244697669736949647C733A313A2232223B');

/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table divisi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `divisi`;

CREATE TABLE `divisi` (
  `divisiId` int(11) NOT NULL AUTO_INCREMENT,
  `divisiNama` varchar(100) DEFAULT NULL,
  `divisiParentId` int(11) DEFAULT NULL,
  `divisiCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `divisiCreatedBy` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`divisiId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `divisi` WRITE;
/*!40000 ALTER TABLE `divisi` DISABLE KEYS */;

INSERT INTO `divisi` (`divisiId`, `divisiNama`, `divisiParentId`, `divisiCreatedAt`, `divisiCreatedBy`)
VALUES
	(1,'Super',0,'2019-03-06 13:14:37',NULL),
	(2,'HRD',0,'2019-03-06 13:43:08',NULL),
	(3,'General Manager',NULL,'2019-03-07 08:56:04',NULL),
	(4,'Treasuri',NULL,'2019-03-07 08:56:24',NULL);

/*!40000 ALTER TABLE `divisi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table favorit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `favorit`;

CREATE TABLE `favorit` (
  `favoritId` int(11) NOT NULL AUTO_INCREMENT,
  `favoritJudul` varchar(100) DEFAULT NULL,
  `favoritUserId` int(11) DEFAULT NULL,
  `favoritCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`favoritId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table favoritdetail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `favoritdetail`;

CREATE TABLE `favoritdetail` (
  `favoritdetailId` int(11) NOT NULL AUTO_INCREMENT,
  `favoritId` int(11) DEFAULT NULL,
  `favoritdetailUserId` int(11) DEFAULT NULL,
  `favoritdetailUserLevel` int(11) DEFAULT NULL,
  PRIMARY KEY (`favoritdetailId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table kategori
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `kategoriId` int(11) NOT NULL AUTO_INCREMENT,
  `kategoriNama` varchar(100) DEFAULT NULL,
  `kategoriCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kategoriId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;

INSERT INTO `kategori` (`kategoriId`, `kategoriNama`, `kategoriCreatedAt`)
VALUES
	(1,'HRD','2019-03-04 10:28:55'),
	(3,'Accounting','2019-03-06 08:57:47'),
	(4,'Umum','2019-03-07 06:53:51');

/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `menuId` int(11) NOT NULL AUTO_INCREMENT,
  `menuNama` varchar(100) DEFAULT NULL,
  `menuParentId` int(11) DEFAULT NULL,
  `menuCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `menuCreatedBy` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`menuId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table notifikasi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifikasi`;

CREATE TABLE `notifikasi` (
  `notifikasiId` int(11) NOT NULL AUTO_INCREMENT,
  `notifikasiIsi` text,
  `notifikasiUser` int(11) DEFAULT NULL,
  `notifikasiStatus` char(2) DEFAULT '0',
  `notifikasiCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`notifikasiId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table paperlessdetail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `paperlessdetail`;

CREATE TABLE `paperlessdetail` (
  `pldetailId` int(11) NOT NULL AUTO_INCREMENT,
  `plmasterId` int(11) NOT NULL,
  `pldetailJenisFile` varchar(100) DEFAULT NULL,
  `pldetailNamaFile` varchar(100) DEFAULT NULL,
  `pldetailDeskripsi` text,
  `pldetailCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pldetailId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table paperlessmaster
# ------------------------------------------------------------

DROP TABLE IF EXISTS `paperlessmaster`;

CREATE TABLE `paperlessmaster` (
  `plmasterId` int(11) NOT NULL AUTO_INCREMENT,
  `subkategoriId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `plmasterTanggal` datetime DEFAULT NULL,
  `plmasterHost` varchar(100) DEFAULT NULL,
  `plmasterIP` varchar(30) DEFAULT NULL,
  `plmasterDeskripsi` text,
  `plmasterTujuan` enum('Arsip','Persetujuan') DEFAULT NULL,
  `plmasterStatusArsip` enum('Private','Public','Tag') DEFAULT NULL,
  `plmasterTagArsip` text,
  `plmasterPersetujuanUser` text,
  `plmasterKesimpulanPersetujuan` enum('OK','Belum') DEFAULT 'Belum',
  `plmasterFileIkhtisar` text,
  `plmasterCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`plmasterId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table paperlesspersetujuan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `paperlesspersetujuan`;

CREATE TABLE `paperlesspersetujuan` (
  `plpersetujuanId` int(11) NOT NULL AUTO_INCREMENT,
  `plmasterId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `plpersetujuanLevel` varchar(100) DEFAULT NULL,
  `plpersetujuanRespon` enum('Setuju','Tunggu','Tidak Setuju','Belum') DEFAULT 'Belum',
  `plpersetujuanTanggal` datetime DEFAULT NULL,
  `plpersetujuanKeterangan` text,
  `plpersetujuanCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`plpersetujuanId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table revisidetail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `revisidetail`;

CREATE TABLE `revisidetail` (
  `revisidetailId` int(11) NOT NULL AUTO_INCREMENT,
  `revisidetailFile` text,
  `revisidetailMasterId` int(11) DEFAULT NULL,
  `revisidetailCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `revisidetailCreatedBy` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`revisidetailId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table revisiikhtisar
# ------------------------------------------------------------

DROP TABLE IF EXISTS `revisiikhtisar`;

CREATE TABLE `revisiikhtisar` (
  `revisiikhtisarId` int(11) NOT NULL AUTO_INCREMENT,
  `revisiikhtisarFile` text,
  `revisiikhtisarMasterId` int(11) DEFAULT NULL,
  `revisiikhtisarCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `revisiikhtisarCreatedBy` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`revisiikhtisarId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `menuId` int(11) DEFAULT NULL,
  `roleUserId` int(11) DEFAULT NULL,
  `roleCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table subkategori
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subkategori`;

CREATE TABLE `subkategori` (
  `subkategoriId` int(11) NOT NULL AUTO_INCREMENT,
  `kategoriId` int(11) NOT NULL,
  `subkategoriNama` varchar(100) DEFAULT NULL,
  `subkategoriCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`subkategoriId`),
  KEY `kategori_reff` (`kategoriId`),
  CONSTRAINT `kategori_reff` FOREIGN KEY (`kategoriId`) REFERENCES `kategori` (`kategoriId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `subkategori` WRITE;
/*!40000 ALTER TABLE `subkategori` DISABLE KEYS */;

INSERT INTO `subkategori` (`subkategoriId`, `kategoriId`, `subkategoriNama`, `subkategoriCreatedAt`)
VALUES
	(1,1,'Lembur Karyawan (Biasa)','2019-03-04 10:40:06'),
	(3,1,'Uang Makan Mingguan','2019-03-06 07:17:54'),
	(4,1,'Lembur Karyawan (Hari Libur)','2019-03-06 09:00:08'),
	(5,4,'Pengumuman','2019-03-07 06:54:00');

/*!40000 ALTER TABLE `subkategori` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) DEFAULT NULL,
  `userPassword` varchar(255) DEFAULT NULL,
  `userNamaLengkap` varchar(255) DEFAULT NULL,
  `userDivisi` int(11) DEFAULT NULL,
  `userCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `userCreatedBy` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`userId`, `userName`, `userPassword`, `userNamaLengkap`, `userDivisi`, `userCreatedAt`, `userCreatedBy`)
VALUES
	(5,'medi','$2y$10$7hyDinfBWb2SnGf396hLX.QeSZhX80DTk5J5KqoGwikpl0952/ImG','Medi',2,'2019-02-21 15:28:17',NULL),
	(8,'tomi','$2y$10$7DFj4GWmOoYstio9IBQjfOGpbW/exEBW7jirngFOG1kKTkJv9cVzy','Tomi X',2,'2019-03-06 08:09:31',NULL),
	(9,'japal','$2y$10$QGGySYOoAqBDt1YKpgzCGuqjv6gBnzw5opNko6sgJk31SxkxFGC5m','Superadmin',1,'2019-03-06 08:11:46',NULL),
	(10,'wahid','$2y$10$RfFlESdQp06.OhcO30LQreNRLyhqw7EuJccBcnbJqvui6/sCppdJm','Wahid',3,'2019-03-07 08:57:36',NULL),
	(11,'dodi','$2y$10$hHFQGg/ADgs2o2EDaakfquKelaLRzTF0x1VVZrFm1YfQ8kbP96XEe','Dodi',2,'2019-03-07 08:57:54',NULL),
	(13,'cika','$2y$10$9u8a3.jWzgGtJgABtUULvOUKJ6tNCnqo/FdMKjx3SM6pLquwEQpyW','Cika',4,'2019-03-07 13:20:17',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
