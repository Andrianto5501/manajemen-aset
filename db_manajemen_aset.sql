-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: 185.201.8.175    Database: manajemen_aset_satdir
-- ------------------------------------------------------
-- Server version	5.7.33-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nomor` varchar(11) DEFAULT NULL,
  `sub_nomor` varchar(11) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `no_aset` varchar(20) NOT NULL,
  `tercatat` varchar(255) DEFAULT NULL,
  `kode_lokasi` varchar(255) DEFAULT NULL,
  `kode_perkap` varchar(20) DEFAULT NULL,
  `kondisi_aset` varchar(255) DEFAULT NULL,
  `uraian_aset` text,
  `uraian_perkap` text,
  `kode_ruang` varchar(20) DEFAULT NULL,
  `kode_gedung` varchar(100) DEFAULT NULL,
  `catatan` text,
  `kondisi` text,
  `nominal_aset` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tanggal_pengadaan` varchar(255) DEFAULT NULL,
  `sumber_pengadaan` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `user_penginput` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barang_kode_barang_IDX` (`kode_barang`,`no_aset`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES (1,'20101','2010104','Paket','2010104001','1','3','006010300005609000KD','131111','Rusak','Tanah Bangunan Kantor Pemerintah','Tanah','RG001','GD001','KIB','Rusak','25.074.922.000','1657728072_6a720a1d638eca9ae620.jpg','2022-12-07','APBN','2010104001.png','Andrianto Superadmin','2022-03-21 09:55:27','2022-07-14 16:31:16',NULL),(2,'30103','3010304','Paket','3010304003','1','3','006010300005609000KD','131311','Rusak','Stationary Generating Set','Peralatan dan Mesin','RG001','GD002','KIB','Rusak','43697150','1657728242_3ea4fa47187e6be7825e.jpg','2022-12-07','APBN','3010304003.png','Andrianto Superadmin','2022-03-21 09:55:27','2022-07-14 16:33:38',NULL),(3,'30103','3010304','Paket','3010304003','2','3','006010300005609000KD','131311','Rusak','Stationary Generating Set','Peralatan dan Mesin','2',NULL,'KIB','Rusak','158494600','1657728289_29c7a5f9ab83094b142a.jpg','2022-12-07','APBN','3010304003.png','Super Admin 123','2022-03-21 09:55:27','2022-07-13 16:04:49',NULL),(4,'30201','3020101','Unit','3020101001','1','3','006010300005609000KD','131311','1','Sedan','Peralatan dan Mesin','1',NULL,'KIB','Baik','58600000','','','','3020101001.png',NULL,'2022-03-21 09:55:27','2022-07-14 04:08:19',NULL),(5,'30201','3020101','Unit','3020101003','1','3','006010300005609000KD','131311','1','Station Wagon','Peralatan dan Mesin','1',NULL,'KIB','Baik','128209000','','','','3020101003.png',NULL,'2022-03-21 09:55:27','2022-03-24 13:47:56',NULL),(6,'30201','3020102','Unit','3020102003','51','3','006010300005609000KD','131311','1','Mini Bus ( Penumpang 14 Orang Kebawah )','Peralatan dan Mesin','51',NULL,'KIB','Baik','167200000','','','','3020102003.png',NULL,'2022-03-21 09:55:27','2022-03-24 13:47:56',NULL),(7,'30201','3020102','Unit','3020102003','52','3','006010300005609000KD','131311','1','Mini Bus ( Penumpang 14 Orang Kebawah )','Peralatan dan Mesin','52',NULL,'KIB','Baik','306853500','','','','3020102003.png',NULL,'2022-03-21 09:55:27','2022-03-24 13:47:56',NULL),(8,'30201','3020102','Unit','3020102003','53','3','006010300005609000KD','131311','1','Mini Bus ( Penumpang 14 Orang Kebawah )','Peralatan dan Mesin','',NULL,'KIB','Baik','749082400','','','','3020102003.png',NULL,'2022-03-21 09:55:27','2022-03-24 13:47:56',NULL),(9,'30201','3020105','Unit','3020105020','5','3','006010300005609000KD','131311','1','Mobil Unit Tahanan','Peralatan dan Mesin','5',NULL,'KIB','Baik','268390000','','','','3020105020.png',NULL,'2022-03-21 09:55:27','2022-03-24 13:47:56',NULL),(10,'30303','3030308','Buah','3030308012','1','1','006010300005609000KD','131311','1','Termometer Standar','Peralatan dan Mesin','-17-',NULL,'DBR','Baik','2420000','','','','3030308012.png',NULL,'2022-03-21 09:55:27','2022-03-24 13:47:56',NULL),(11,'30501','3050104','Buah','3050104001','1','1','006010300005609000KD','131311','1','Lemari Besi/Metal','Peralatan dan Mesin','-34-',NULL,'DBR','Baik','37000','','','','3050104001.png',NULL,'2022-03-21 09:55:27','2022-07-13 23:03:15','2022-07-13 23:03:15'),(12,'30501','3050104','Buah','3050104001','2','1','006010300005609000KD','131311','1','Lemari Besi/Metal','Peralatan dan Mesin','-29-',NULL,'DBR','Baik','1905000','','','','3050104001.png',NULL,'2022-03-21 09:55:27','2022-03-24 13:47:56',NULL),(13,'30501','3050104','Buah','3050104002','1','1','006010300005609000KD','131311','1','Lemari Kayu','Peralatan dan Mesin','-41-',NULL,'DBR','Baik','73000','','','','3050104002.png',NULL,'2022-03-21 09:55:27','2022-03-24 13:47:56',NULL),(14,'30501','3050104','Buah','3050104002','11','1','006010300005609000KD','131311','1','Lemari Kayu','Peralatan dan Mesin','-08-',NULL,'DBR','Baik','19000','','','','3050104002.png',NULL,'2022-03-21 09:55:27','2022-03-24 13:47:56',NULL),(15,'30501','3050104','Buah','3050104002','12','1','006010300005609000KD','131311','1','Lemari Kayu','Peralatan dan Mesin','-11-',NULL,'DBR','Baik','19000','','','','3050104002.png',NULL,'2022-03-21 09:55:27','2022-07-13 23:08:49','2022-07-13 23:08:49');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER trigger_insert_history
AFTER INSERT
ON barang FOR EACH ROW
BEGIN 
	
	INSERT INTO barang_history (barangId,nomor,sub_nomor,satuan,kode_barang,no_aset,tercatat,kode_lokasi,kode_perkap,kondisi_aset,uraian_aset,uraian_perkap,kode_ruang,kode_gedung,catatan,kondisi,nominal_aset,foto,tanggal_pengadaan,sumber_pengadaan,qr_code,user_penginput)
	VALUES (new.id,new.nomor,new.sub_nomor,new.satuan,new.kode_barang,new.no_aset,new.tercatat,new.kode_lokasi,new.kode_perkap,new.kondisi_aset,new.uraian_aset,new.uraian_perkap,new.kode_ruang,new.kode_gedung,new.catatan,new.kondisi,new.nominal_aset,new.foto,new.tanggal_pengadaan,new.sumber_pengadaan,new.qr_code,new.user_penginput);
	
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER trigger_barang_history
AFTER UPDATE
ON barang FOR EACH ROW
BEGIN 
	
	INSERT INTO barang_history (barangId,nomor,sub_nomor,satuan,kode_barang,no_aset,tercatat,kode_lokasi,kode_perkap,kondisi_aset,uraian_aset,uraian_perkap,kode_ruang,kode_gedung,catatan,kondisi,nominal_aset,foto,tanggal_pengadaan,sumber_pengadaan,qr_code,user_penginput)
	VALUES (new.id,new.nomor,new.sub_nomor,new.satuan,new.kode_barang,new.no_aset,new.tercatat,new.kode_lokasi,new.kode_perkap,new.kondisi_aset,new.uraian_aset,new.uraian_perkap,new.kode_ruang,new.kode_gedung,new.catatan,new.kondisi,new.nominal_aset,new.foto,new.tanggal_pengadaan,new.sumber_pengadaan,new.qr_code,new.user_penginput);
	
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `barang_history`
--

DROP TABLE IF EXISTS `barang_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang_history` (
  `barangId` int(11) NOT NULL,
  `nomor` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `sub_nomor` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `satuan` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `kode_barang` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `no_aset` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `tercatat` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `kode_lokasi` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `kode_perkap` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `kondisi_aset` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `uraian_aset` text CHARACTER SET utf8,
  `uraian_perkap` text CHARACTER SET utf8,
  `kode_ruang` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `kode_gedung` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `catatan` text CHARACTER SET utf8,
  `kondisi` text CHARACTER SET utf8,
  `nominal_aset` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tanggal_pengadaan` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sumber_pengadaan` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `qr_code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_penginput` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `barang_history_barangId_IDX` (`barangId`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang_history`
--

LOCK TABLES `barang_history` WRITE;
/*!40000 ALTER TABLE `barang_history` DISABLE KEYS */;
INSERT INTO `barang_history` VALUES (1,'20101','2010104','Paket','2010104001','1','3','006010300005609000KD','131111','Rusak','Tanah Bangunan Kantor Pemerintah','Tanah','1',NULL,'KIB','Rusak','25.074.922.000','1653206278_26de76c7ac1877a42ae9.png','1969-12-31','APBN','2010104001.png','Super Admin','2022-07-13 15:58:32'),(2,'30103','3010304','Unit','3010304003','1','3','006010300005609000KD','131311','1','Stationary Generating Set','Peralatan dan Mesin','1',NULL,'KIB','Baik','43697150','','','','3010304003.png',NULL,'2022-07-13 15:58:32'),(3,'30103','3010304','Unit','3010304003','2','3','006010300005609000KD','131311','1','Stationary Generating Set','Peralatan dan Mesin','2',NULL,'KIB','Baik','158494600','','','','3010304003.png',NULL,'2022-07-13 15:58:32'),(4,'30201','3020101','Unit','3020101001','1','3','006010300005609000KD','131311','1','Sedan','Peralatan dan Mesin','1',NULL,'KIB','Baik','58600000','','','','3020101001.png',NULL,'2022-07-13 15:58:32'),(5,'30201','3020101','Unit','3020101003','1','3','006010300005609000KD','131311','1','Station Wagon','Peralatan dan Mesin','1',NULL,'KIB','Baik','128209000','','','','3020101003.png',NULL,'2022-07-13 15:58:32'),(6,'30201','3020102','Unit','3020102003','51','3','006010300005609000KD','131311','1','Mini Bus ( Penumpang 14 Orang Kebawah )','Peralatan dan Mesin','51',NULL,'KIB','Baik','167200000','','','','3020102003.png',NULL,'2022-07-13 15:58:32'),(7,'30201','3020102','Unit','3020102003','52','3','006010300005609000KD','131311','1','Mini Bus ( Penumpang 14 Orang Kebawah )','Peralatan dan Mesin','52',NULL,'KIB','Baik','306853500','','','','3020102003.png',NULL,'2022-07-13 15:58:32'),(8,'30201','3020102','Unit','3020102003','53','3','006010300005609000KD','131311','1','Mini Bus ( Penumpang 14 Orang Kebawah )','Peralatan dan Mesin','',NULL,'KIB','Baik','749082400','','','','3020102003.png',NULL,'2022-07-13 15:58:32'),(9,'30201','3020105','Unit','3020105020','5','3','006010300005609000KD','131311','1','Mobil Unit Tahanan','Peralatan dan Mesin','5',NULL,'KIB','Baik','268390000','','','','3020105020.png',NULL,'2022-07-13 15:58:32'),(10,'30303','3030308','Buah','3030308012','1','1','006010300005609000KD','131311','1','Termometer Standar','Peralatan dan Mesin','-17-',NULL,'DBR','Baik','2420000','','','','3030308012.png',NULL,'2022-07-13 15:58:32'),(11,'30501','3050104','Buah','3050104001','1','1','006010300005609000KD','131311','1','Lemari Besi/Metal','Peralatan dan Mesin','-34-',NULL,'DBR','Baik','37000','','','','3050104001.png',NULL,'2022-07-13 15:58:32'),(12,'30501','3050104','Buah','3050104001','2','1','006010300005609000KD','131311','1','Lemari Besi/Metal','Peralatan dan Mesin','-29-',NULL,'DBR','Baik','1905000','','','','3050104001.png',NULL,'2022-07-13 15:58:32'),(13,'30501','3050104','Buah','3050104002','1','1','006010300005609000KD','131311','1','Lemari Kayu','Peralatan dan Mesin','-41-',NULL,'DBR','Baik','73000','','','','3050104002.png',NULL,'2022-07-13 15:58:32'),(14,'30501','3050104','Buah','3050104002','11','1','006010300005609000KD','131311','1','Lemari Kayu','Peralatan dan Mesin','-08-',NULL,'DBR','Baik','19000','','','','3050104002.png',NULL,'2022-07-13 15:58:32'),(15,'30501','3050104','Buah','3050104002','12','1','006010300005609000KD','131311','1','Lemari Kayu','Peralatan dan Mesin','-11-',NULL,'DBR','Baik','19000','','','','3050104002.png',NULL,'2022-07-13 15:58:32'),(1,'20101','2010104','Paket','2010104001','1','3','006010300005609000KD','131111','Rusak','Tanah Bangunan Kantor Pemerintah','Tanah','1',NULL,'KIB','Rusak','25.074.922.000','1657728072_6a720a1d638eca9ae620.jpg','2022-12-07','APBN','2010104001.png','Super Admin 123','2022-07-13 16:01:12'),(2,'30103','3010304','Paket','3010304003','1','3','006010300005609000KD','131311','Rusak','Stationary Generating Set','Peralatan dan Mesin','1',NULL,'KIB','Rusak','43697150','1657728242_3ea4fa47187e6be7825e.jpg','2022-12-07','APBN','3010304003.png','Super Admin 123','2022-07-13 16:04:02'),(3,'30103','3010304','Paket','3010304003','2','3','006010300005609000KD','131311','Rusak','Stationary Generating Set','Peralatan dan Mesin','2',NULL,'KIB','Rusak','158494600','1657728289_29c7a5f9ab83094b142a.jpg','2022-12-07','APBN','3010304003.png','Super Admin 123','2022-07-13 16:04:49'),(11,'30501','3050104','Buah','3050104001','1','1','006010300005609000KD','131311','1','Lemari Besi/Metal','Peralatan dan Mesin','-34-',NULL,'DBR','Baik','37000','','','','3050104001.png',NULL,'2022-07-14 04:03:15'),(4,'30201','3020101','Unit','3020101001','1','3','006010300005609000KD','131311','1','Sedan','Peralatan dan Mesin','1',NULL,'KIB','Baik','58600000','','','','3020101001.png',NULL,'2022-07-14 04:08:19'),(15,'30501','3050104','Buah','3050104002','12','1','006010300005609000KD','131311','1','Lemari Kayu','Peralatan dan Mesin','-11-',NULL,'DBR','Baik','19000','','','','3050104002.png',NULL,'2022-07-14 04:08:49'),(1,'20101','2010104','Paket','2010104001','1','3','006010300005609000KD','131111','Rusak','Tanah Bangunan Kantor Pemerintah','Tanah','1',NULL,'KIB','Rusak','25.074.922.000','1657728072_6a720a1d638eca9ae620.jpg','2022-12-07','APBN','2010104001.png','Andrianto Superadmin','2022-07-14 15:57:57'),(1,'20101','2010104','Paket','2010104001','1','3','006010300005609000KD','131111','Rusak','Tanah Bangunan Kantor Pemerintah','Tanah','1',NULL,'KIB','Rusak','25.074.922.000','1657728072_6a720a1d638eca9ae620.jpg','2022-12-07','APBN','2010104001.png','Andrianto Superadmin','2022-07-14 16:00:24'),(1,'20101','2010104','Paket','2010104001','1','3','006010300005609000KD','131111','Rusak','Tanah Bangunan Kantor Pemerintah','Tanah','1','GD001','KIB','Rusak','25.074.922.000','1657728072_6a720a1d638eca9ae620.jpg','2022-12-07','APBN','2010104001.png','Andrianto Superadmin','2022-07-14 16:22:18'),(1,'20101','2010104','Paket','2010104001','1','3','006010300005609000KD','131111','Rusak','Tanah Bangunan Kantor Pemerintah','Tanah','1','GD003','KIB','Rusak','25.074.922.000','1657728072_6a720a1d638eca9ae620.jpg','2022-12-07','APBN','2010104001.png','Andrianto Superadmin','2022-07-14 16:22:33'),(1,'20101','2010104','Paket','2010104001','1','3','006010300005609000KD','131111','Rusak','Tanah Bangunan Kantor Pemerintah','Tanah','RG001','GD001','KIB','Rusak','25.074.922.000','1657728072_6a720a1d638eca9ae620.jpg','2022-12-07','APBN','2010104001.png','Andrianto Superadmin','2022-07-14 16:31:16'),(2,'30103','3010304','Paket','3010304003','1','3','006010300005609000KD','131311','Rusak','Stationary Generating Set','Peralatan dan Mesin','RG001','GD002','KIB','Rusak','43697150','1657728242_3ea4fa47187e6be7825e.jpg','2022-12-07','APBN','3010304003.png','Andrianto Superadmin','2022-07-14 16:33:38');
/*!40000 ALTER TABLE `barang_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gedung`
--

DROP TABLE IF EXISTS `gedung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gedung` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(12) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gedung`
--

LOCK TABLES `gedung` WRITE;
/*!40000 ALTER TABLE `gedung` DISABLE KEYS */;
INSERT INTO `gedung` VALUES (1,'GD001','Pusat Edit','Sumampir'),(2,'GD002','Cabang 1','Purwokerto'),(3,'GD003','Cabang 2 Editans','Banyumas Raya');
/*!40000 ALTER TABLE `gedung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (2,'2021-10-19-141824','App\\Database\\Migrations\\Gedung','default','App',1634661843,1),(3,'2021-10-19-171407','App\\Database\\Migrations\\Ruangan','default','App',1634663762,2),(5,'2021-10-20-073955','App\\Database\\Migrations\\Barang','default','App',1634715610,4),(6,'2021-10-24-131451','App\\Database\\Migrations\\Barang','default','App',1635081534,5),(7,'2021-10-25-130145','App\\Database\\Migrations\\Barang','default','App',1635168077,6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otentikasi`
--

DROP TABLE IF EXISTS `otentikasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `otentikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otentikasi`
--

LOCK TABLES `otentikasi` WRITE;
/*!40000 ALTER TABLE `otentikasi` DISABLE KEYS */;
INSERT INTO `otentikasi` VALUES (1,'SatDirPwt','$2y$10$2E/IwGsRYRUGsowoM.bY..zlTvpTMHOavBIxis16nFudXyMx/bxAe');
/*!40000 ALTER TABLE `otentikasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruangan`
--

DROP TABLE IF EXISTS `ruangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruangan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruangan`
--

LOCK TABLES `ruangan` WRITE;
/*!40000 ALTER TABLE `ruangan` DISABLE KEYS */;
INSERT INTO `ruangan` VALUES (1,'RG001','Ruang Administrasi Edit'),(4,'RG002','Ruang Sektetaris 1');
/*!40000 ALTER TABLE `ruangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone` varchar(16) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'01','Andrianto Superadmin','superadmin','$2y$10$xIw/.7dmiG5qBGPrBp59cuzOqUJiKKS6rTY./11j9JPN7dngJB4d.','super@gmail.com','Laki-laki','Purwokerto Barat','192192123123','1633885524_2c6dae6acb77a922a4a8.png',1,'2022-07-13 15:40:38',1),(23,'1234567891011121','Andrianto','andri','$2y$10$4WtU.6plUBwsgqGP3PNGOeVLCjYhXMtCIKyuGWyREHIfd1HFyMd5i','andri@gmail.com','Laki-laki','Purbalingga','12345678910','default.jpg',2,'2022-07-13 15:51:43',0),(24,'1234567890121314','Ahsan','ahsan','$2y$10$MrZFQKh5p4T.wf2d1ayJGuQbJDjeARHfDvIbrfAsDxElcppvtljnW','ahsan@gmail.com','Laki-laki','Brebes','12345678999','default.jpg',3,'2022-07-13 15:53:31',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'manajemen_aset_satdir'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-15 13:25:26
