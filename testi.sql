-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: testi
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ilmoitetut`
--

DROP TABLE IF EXISTS `ilmoitetut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ilmoitetut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yritysid` text,
  `K4` text,
  `K5` text,
  `K6` text,
  `K7` text,
  `K8` text,
  `K9` text,
  `K10` text,
  `K11` text,
  `K12` text,
  `K14` text,
  `K16` text,
  `K18` text,
  `K20` text,
  `K22` text,
  `K24` text,
  `K26` text,
  `K28` text,
  `K30` text,
  `9PV` text,
  `11GW` text,
  `12H` text,
  `13G` text,
  `15GX` text,
  `FIN` text,
  `EUR` text,
  `CADDY` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ilmoitetut`
--

LOCK TABLES `ilmoitetut` WRITE;
/*!40000 ALTER TABLE `ilmoitetut` DISABLE KEYS */;
INSERT INTO `ilmoitetut` VALUES (22,'8','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0'),(23,'1','0','2','0','02','0','0','0','0','0','0','0','0','0','5','0','0','0','0','0','0','0','0','0','0','0','0'),(24,'9','0','0','5','0','0','0','0','0','0','0','0','0','0','7','0','0','0','0','0','0','0','0','0','12','0','0');
/*!40000 ALTER TABLE `ilmoitetut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `toimitukset`
--

DROP TABLE IF EXISTS `toimitukset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `toimitukset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nimi` text,
  `tekija` text,
  `tasmaaika` int(11) DEFAULT NULL,
  `lisatieto` text,
  `tila` text,
  `osoite` text,
  `piilotettu` int(11) DEFAULT NULL,
  `yhteyshenkilo` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `toimitukset`
--

LOCK TABLES `toimitukset` WRITE;
/*!40000 ALTER TABLE `toimitukset` DISABLE KEYS */;
INSERT INTO `toimitukset` VALUES (1,'Yritys Oy','Jaska Jokunen',0,'Ei kiirettä','Aloitettu','Olematon 13, 04200 Kerava',0,'Aatami 0400000000 aatami@yritys.fi'),(2,'Firma Ab','Jaska Jokutoinen',1,'21.7.2018','Aloitettu','Katu 1, 00000 Norja',0,'eemeli 0100000000 eemeli@firma.se'),(3,'Käsiteltytapaus Oy','Jaska Jokumuu',0,'-','Valmis','Hattulantie 5, 01010 Binääri',1,'Toimari 0500000000 johtaja@valmis.fi'),(4,'Siivoamaton työmaa Ry','Jaska Jokunen',0,'Kelat ympäri pihaa','Aloitettu','Työmaa, 012345 Jossain',0,'Omistaja 0500000000 vladimir@roskaläjä.ru'),(5,'Testifirma Ltd','Testijäbä',0,'15.5.2019','Tuleva','Kauheakulma 15, 09300 Karsea',0,'Kokeilija 0900000000 pena@testifirma.ee'),(8,'Kokeilu','Joku Muu',1,'89.98.1900','Valmis','Aikakoneen tie 1, 00000 Menneisyys',1,'Testaus 023000000 testi@kokeilu.fi'),(9,'Jaskan Betoni','Kuljettaja',0,'30.4 klo 15 - 16','Tuleva','Nollakatu 0 Helsinki',0,'Jaska Jokunen');
/*!40000 ALTER TABLE `toimitukset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `toteutuneet`
--

DROP TABLE IF EXISTS `toteutuneet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `toteutuneet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `huomioitava` text,
  `K4` text,
  `K5` text,
  `K6` text,
  `K7` text,
  `K8` text,
  `K9` text,
  `K10` text,
  `K11` text,
  `K12` text,
  `K14` text,
  `K16` text,
  `K18` text,
  `K20` text,
  `K22` text,
  `K24` text,
  `K26` text,
  `K28` text,
  `K30` text,
  `9PV` text,
  `11GW` text,
  `12H` text,
  `13G` text,
  `15GX` text,
  `FIN` text,
  `EUR` text,
  `CADDY` text,
  `yritysid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `yritysid` (`yritysid`),
  CONSTRAINT `toteutuneet_ibfk_1` FOREIGN KEY (`yritysid`) REFERENCES `toimitukset` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `toteutuneet`
--

LOCK TABLES `toteutuneet` WRITE;
/*!40000 ALTER TABLE `toteutuneet` DISABLE KEYS */;
INSERT INTO `toteutuneet` VALUES (35,'','','','','','','','','','','','','','','','','','','','','','','','','','','',8),(37,'-','0','2','0','02','0','0','0','0','0','0','0','0','0','5','0','0','0','1','0','0','0','0','0','0','0','0',1),(38,'-','0','0','5','0','0','0','0','0','0','0','0','0','0','7','0','0','0','0','0','0','0','0','0','12','0','0',9);
/*!40000 ALTER TABLE `toteutuneet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-30 14:40:03
