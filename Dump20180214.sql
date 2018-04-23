-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: hotel
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(45) DEFAULT NULL,
  `admin_pass` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin@gmail.com','123456');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `available_room`
--

DROP TABLE IF EXISTS `available_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `available_room` (
  `room_id` int(20) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(20) NOT NULL,
  `availabel_room` int(20) NOT NULL,
  `create_user` varchar(50) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `available_room`
--

LOCK TABLES `available_room` WRITE;
/*!40000 ALTER TABLE `available_room` DISABLE KEYS */;
INSERT INTO `available_room` VALUES (28,54,79,'admin','2017-12-16 21:33:40'),(29,55,90,'admin','2017-12-16 21:33:40'),(30,0,120,'44','2017-12-18 13:33:27'),(31,0,120,'44','2017-12-18 13:33:42'),(32,0,120,'44','2017-12-18 13:34:36'),(33,0,120,'44','2017-12-18 13:38:52'),(34,0,120,'44','2017-12-18 13:38:58'),(35,0,120,'44','2017-12-18 13:39:00'),(36,0,22,'44','2018-01-05 07:26:07'),(37,62,20,'admin','2018-02-05 17:16:15');
/*!40000 ALTER TABLE `available_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel_details`
--

DROP TABLE IF EXISTS `hotel_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel_details` (
  `hotel_id` int(20) NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(100) NOT NULL,
  `hotel_pic` varchar(100) NOT NULL,
  `create_user` varchar(50) NOT NULL,
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hotel_details` varchar(200) NOT NULL,
  `isverified` varchar(45) NOT NULL,
  `hotel_price` bigint(100) NOT NULL,
  `availabel_room` int(20) NOT NULL,
  `temple_distance` text,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel_details`
--

LOCK TABLES `hotel_details` WRITE;
/*!40000 ALTER TABLE `hotel_details` DISABLE KEYS */;
INSERT INTO `hotel_details` VALUES (54,'taj mahraj','download_(1)__17122017_065340__.jpg','admin','2017-12-16 21:33:40','nice','0',780000,79,'33 km'),(55,'taj mahraj','download_(2)__17122017_074057__.jpg','admin','2017-12-16 21:33:40','nice hotel ','',9000000000,90,NULL),(56,'ram','download_(1)__17122017_083539__.jpg','44','2017-12-17 07:35:39','gd','0',10000,50,NULL),(57,'Taj HOtel','sidebar_04__18122017_143852__.png','44','2017-12-18 13:26:43','ssds','0',0,120,NULL),(62,'New hotel','1__05022018_181615__.jpg','admin','2018-02-05 17:16:15','sdsdsds','0',2000,20,'2 km'),(64,'sdsds','Screenshot_from_2017-07-24_17-16-45__05022018_183842__.png','44','2018-02-05 17:38:42','dsdsdsd','0',222,22,'sssds');
/*!40000 ALTER TABLE `hotel_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(45) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(45) NOT NULL,
  `customer_address` varchar(45) DEFAULT NULL,
  `customer_mobile` varchar(45) NOT NULL,
  `city` varchar(45) DEFAULT NULL,
  `pincode` varchar(45) DEFAULT NULL,
  `amount_pay` float NOT NULL,
  `created_At` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_id` varchar(45) DEFAULT NULL,
  `checkin` varchar(45) DEFAULT NULL,
  `checkout` varchar(45) DEFAULT NULL,
  `adults` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (7,'ntXwq','dfdfd','dfdfd','sdsd','65231212','sdsdsd','21321',234000,'2018-02-02 17:24:22','pay_9X5M0u9i7si9Xc','02/02/2018','02/02/2018','4 Room + 8 Guests'),(8,'ZsfJK','fdf','fdfdfd','sdsds','7289059869','dsdsds','21514',234000,'2018-02-02 17:42:06','pay_9X5ejRoFNFgnMf','02/02/2018','02/02/2018','4 Room + 8 Guests'),(9,'Mh92b','fdf','fdfdfd','sdsds','7289059869','dsdsds','21514',234000,'2018-02-02 17:43:06','pay_9X5ejRoFNFgnMf','02/02/2018','02/02/2018','4 Room + 8 Guests'),(10,'5A6L7','dfdf','sdsds@df.com','ddfdfd','22302130','ffdfdfd','555',234000,'2018-02-02 18:06:09','pay_9X6498C6sxfEvi','02/02/2018','02/02/2018','4 Room + 8 Guests'),(11,'SeUDV','dssds','sdsdsd','dsds','544554','sdsds','544545',234000,'2018-02-02 18:07:54','pay_9X65z8PepVvC5L','02/02/2018','02/02/2018','4 Room + 8 Guests'),(12,'EUWkw','dssds','sdsdsd','dsds','544554','sdsds','544545',234000,'2018-02-02 18:08:54','pay_9X66y2CNJky6Yt','02/02/2018','02/02/2018','4 Room + 8 Guests'),(13,'biztl','ddf','sdsd','sdsds','554545','sdsds','5445',234000,'2018-02-02 18:11:17','pay_9X69ZMn9pmKiRh','02/02/2018','02/02/2018','4 Room + 8 Guests'),(14,'dWkeN','ddf','sdsd','sdsds','554545','sdsds','5445',234000,'2018-02-02 18:12:18','pay_9X6AAPiNEyiPJd','02/02/2018','02/02/2018','4 Room + 8 Guests'),(15,'Jupwy','vbbv','ggf','ghgh','5656565','hgh','225545',234000,'2018-02-02 18:14:17','pay_9X6CjxyDLXD8ei','02/02/2018','02/02/2018','4 Room + 8 Guests'),(16,'QruPE','ddsds','dsdsds','sdsds','851545','dsdsds','55454',234000,'2018-02-02 18:45:04','pay_9X6jEwG3urm6YW','02/02/2018','02/02/2018','4 Room + 8 Guests'),(17,'fjMSL','ddsds','dsdsds','sdsds','851545','dsdsds','55454',234000,'2018-02-02 18:46:04','pay_9X6kGJGZbC5cSa','02/02/2018','02/02/2018','4 Room + 8 Guests'),(18,'g6tph','DFFDF','dfdfd@f.com','DDDF','7289059869','DFDF','545454',2700000000,'2018-02-02 19:00:38','pay_9X6zgSZN8Ne9HC','02/03/2018','02/17/2018','3Room+6Guests'),(19,'qvEU2','sdsdsds','sdsds@df.com','dds','12121212','ssdsds','5545',2700000000,'2018-02-02 19:13:08','pay_9X7CuRNoDNJZTc','02/03/2018','02/03/2018','1Room+2Guests'),(20,'ovdMq','sdss','ashish@gmail.com','sdsdsds','7848545','sdsd','3232',2700000000,'2018-02-05 18:04:05','pay_9YHdJUiNmIBcyV','02/05/2018','02/05/2018','1Room+1Guests'),(21,'0wDsc','sdsds','asasd@dfdf.com','sdsds','8741441','sdsds','2232',3000,'2018-02-05 19:09:19','pay_9YIkFFnPR326Or','02/06/2018','02/06/2018','5Room+10Guests'),(22,'xuEcV','sdsds','asasd@dfdf.com','sdsds','8741441','sdsds','2232',3000,'2018-02-05 19:10:22','pay_9YIkP9y1LrxA5l','02/06/2018','02/06/2018','5Room+10Guests'),(23,'gjZh0','sdsds','asasd@dfdf.com','sdsds','8741441','sdsds','2232',3000,'2018-02-05 19:11:33','pay_9YImbVmN8VPPpO','02/06/2018','02/06/2018','5Room+10Guests'),(24,'gzD6H','sdsds','asasd@dfdf.com','sdsds','8741441','sdsds','2232',3000,'2018-02-05 19:12:44','pay_9YInqouucPQJm1','02/06/2018','02/06/2018','5Room+10Guests'),(25,'x7Fi5','sdsds','asasd@dfdf.com','sdsds','8741441','sdsds','2232',3000,'2018-02-05 19:14:16','pay_9YIpSzaxFXBIDj','02/06/2018','02/06/2018','5Room+10Guests'),(26,'fircT','fdfdf','ddff@ff.om','','7275956021','ddff','',2700000000,'2018-02-09 09:24:57','pay_9ZivQHBjEQUqnQ','02/01/2018','02/23/2018','1Room+2Guests'),(27,'JQUrA','fdfdf','ddff@ff.om','','7275956021','ddff','',2700000000,'2018-02-09 09:25:58','pay_9ZivjGSicjHM8w','02/01/2018','02/23/2018','1Room+2Guests');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `total_price`
--

DROP TABLE IF EXISTS `total_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `total_price` (
  `price_id` int(20) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(20) NOT NULL,
  `hotel_price` bigint(100) NOT NULL,
  `create_user` varchar(20) NOT NULL,
  PRIMARY KEY (`price_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `total_price`
--

LOCK TABLES `total_price` WRITE;
/*!40000 ALTER TABLE `total_price` DISABLE KEYS */;
INSERT INTO `total_price` VALUES (5,54,780000,'admin'),(6,55,9000000000,'admin'),(9,56,10000,'44'),(10,57,0,'44'),(11,58,222,'44'),(12,59,222,'44'),(13,60,222,'44'),(14,61,222,'44'),(15,62,2000,'admin'),(16,63,0,'44'),(17,64,222,'44');
/*!40000 ALTER TABLE `total_price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `country` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `isverified` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone_UNIQUE` (`phone`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (44,'anshulika','verma','7289059869','anshulika.v21@gmail.com','123','12/06/2017','India','Delhi','Delhi','1');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-14 23:12:06
