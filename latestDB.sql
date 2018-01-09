-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: twotunics
-- ------------------------------------------------------
-- Server version	5.5.54-0ubuntu0.12.04.1

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
-- Table structure for table `access_level`
--

DROP TABLE IF EXISTS `access_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_level`
--

LOCK TABLES `access_level` WRITE;
/*!40000 ALTER TABLE `access_level` DISABLE KEYS */;
INSERT INTO `access_level` VALUES (1,'Charity Partner'),(2,'Fashion  Partner'),(3,'Administrator');
/*!40000 ALTER TABLE `access_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `charity_partner`
--

DROP TABLE IF EXISTS `charity_partner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `charity_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `charity_partner`
--

LOCK TABLES `charity_partner` WRITE;
/*!40000 ALTER TABLE `charity_partner` DISABLE KEYS */;
INSERT INTO `charity_partner` VALUES (1,'East Bay Orphanage','An Orphanage','924 Oak st','East Palo Alto','CA','','','','');
/*!40000 ALTER TABLE `charity_partner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donation`
--

DROP TABLE IF EXISTS `donation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) DEFAULT NULL,
  `quantity_given` int(11) DEFAULT NULL,
  `unit_genre_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `cost_per_unit` int(11) DEFAULT NULL,
  `fashion_partner_id` int(11) DEFAULT NULL,
  `date_donated` date DEFAULT NULL,
  `quantity_remaining` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `unit_genre_id_idxfk` (`unit_genre_id`),
  KEY `size_id_idxfk` (`size_id`),
  KEY `status_idxfk` (`status`),
  KEY `fashion_partner_id_idxfk` (`fashion_partner_id`),
  CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`unit_genre_id`) REFERENCES `unit_genre` (`id`),
  CONSTRAINT `donation_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`),
  CONSTRAINT `donation_ibfk_3` FOREIGN KEY (`status`) REFERENCES `donation_status` (`id`),
  CONSTRAINT `donation_ibfk_4` FOREIGN KEY (`fashion_partner_id`) REFERENCES `fashion_partner` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donation`
--

LOCK TABLES `donation` WRITE;
/*!40000 ALTER TABLE `donation` DISABLE KEYS */;
INSERT INTO `donation` VALUES (1,'Boys clothes from Gap',5,2,16,1,10,NULL,'2018-01-08',5),(2,'A donation from Old Navy',50,3,19,1,15,NULL,'2018-01-08',50),(3,'Womens Winter clothes',10,6,41,1,30,1,'2018-01-08',10),(4,'Mens Stylish Dress',12,3,20,1,20,1,'2018-01-08',12);
/*!40000 ALTER TABLE `donation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donation_status`
--

DROP TABLE IF EXISTS `donation_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donation_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donation_status`
--

LOCK TABLES `donation_status` WRITE;
/*!40000 ALTER TABLE `donation_status` DISABLE KEYS */;
INSERT INTO `donation_status` VALUES (1,'Available'),(2,'Reserved'),(3,'Accepted');
/*!40000 ALTER TABLE `donation_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fashion_partner`
--

DROP TABLE IF EXISTS `fashion_partner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fashion_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fashion_partner`
--

LOCK TABLES `fashion_partner` WRITE;
/*!40000 ALTER TABLE `fashion_partner` DISABLE KEYS */;
INSERT INTO `fashion_partner` VALUES (1,'Gap','The Gap Outlet Stores','123 Great Mall Parkway','San Jose','CA','95131','675-234 2345','bill@gap.com','Bill Andrews');
/*!40000 ALTER TABLE `fashion_partner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `need`
--

DROP TABLE IF EXISTS `need`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `need` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) DEFAULT NULL,
  `quantity_requested` int(11) DEFAULT NULL,
  `unit_genre_id` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `date_requested` date DEFAULT NULL,
  `charity_id` int(11) DEFAULT NULL,
  `quantity_still_required` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `unit_genre_id_idxfk_1` (`unit_genre_id`),
  KEY `charity_id_idxfk` (`charity_id`),
  CONSTRAINT `need_ibfk_1` FOREIGN KEY (`unit_genre_id`) REFERENCES `unit_genre` (`id`),
  CONSTRAINT `need_ibfk_2` FOREIGN KEY (`charity_id`) REFERENCES `charity_partner` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `need`
--

LOCK TABLES `need` WRITE;
/*!40000 ALTER TABLE `need` DISABLE KEYS */;
/*!40000 ALTER TABLE `need` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size`
--

LOCK TABLES `size` WRITE;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` VALUES (1,'3 mos','Infant & Toddler Sizes'),(2,'6 mos','Infant & Toddler Sizes'),(3,'12 mos','Infant & Toddler Sizes'),(4,'18 mos','Infant & Toddler Sizes'),(5,'24 mos','Infant & Toddler Sizes'),(6,'2T','Infant & Toddler Sizes'),(7,'3T','Infant & Toddler Sizes'),(8,'4T','Infant & Toddler Sizes'),(9,'2','Boy\'s Sizes'),(10,'3','Boy\'s Sizes'),(11,'4','Boy\'s Sizes'),(12,'5','Boy\'s Sizes'),(13,'6','Boy\'s Sizes'),(14,'7','Boy\'s Sizes'),(15,'8','Boy\'s Sizes'),(16,'10','Boy\'s Sizes'),(17,'12','Boy\'s Sizes'),(18,'XS','Men\'s Sizes'),(19,'S','Men\'s Sizes'),(20,'M','Men\'s Sizes'),(21,'L','Men\'s Sizes'),(22,'XL','Men\'s Sizes'),(23,'XXL','Men\'s Sizes'),(24,'3XL','Men\'s Sizes'),(25,'4XL','Men\'s Sizes'),(26,'2','Girl\'s Sizes'),(27,'3','Girl\'s Sizes'),(28,'4','Girl\'s Sizes'),(29,'5','Girl\'s Sizes'),(30,'6','Girl\'s Sizes'),(31,'7','Girl\'s Sizes'),(32,'8','Girl\'s Sizes'),(33,'10','Girl\'s Sizes'),(34,'12','Girl\'s Sizes'),(35,'0','Women\'s Sizes'),(36,'2','Women\'s Sizes'),(37,'4','Women\'s Sizes'),(38,'6','Women\'s Sizes'),(39,'8','Women\'s Sizes'),(40,'10','Women\'s Sizes'),(41,'12','Women\'s Sizes'),(42,'14','Women\'s Sizes'),(43,'14W','Women\'s Plus Sizes'),(44,'16W (1X)','Women\'s Plus Sizes'),(45,'18W (2X)','Women\'s Plus Sizes'),(46,'20W (2X)','Women\'s Plus Sizes'),(47,'22W (3X)','Women\'s Plus Sizes'),(48,'24W (3X)','Women\'s Plus Sizes'),(49,'26W (4X)','Women\'s Plus Sizes'),(50,'28W (4X)','Women\'s Plus Sizes'),(51,'30W (5X)','Women\'s Plus Sizes'),(52,'32W (5X)','Women\'s Plus Sizes'),(53,'0.5','Infant 0-24 Mos'),(54,'1',' Infant 0-24 Mos'),(55,'1.5','Infant 0-24 Mos'),(56,'2','Infant 0-24 Mos'),(57,'2.5','Infant 0-24 Mos'),(58,'3','Infant 0-24 Mos'),(59,'3.5','Infant 0-24 Mos'),(60,'4','Infant 0-24 Mos'),(61,'4.5','Infant 0-24 Mos'),(62,'5','Infant 0-24 Mos'),(63,'5.5','Infant 0-24 Mos'),(64,'6','Infant 0-24 Mos'),(65,'6.5','Infant 0-24 Mos'),(66,'7','Infant 0-24 Mos'),(67,'7.5','Toddler 2-4 Yrs'),(68,'8','Toddler 2-4 Yrs'),(69,'8.5','Toddler 2-4 Yrs'),(70,'9','Toddler 2-4 Yrs'),(71,'9.5','Toddler 2-4 Yrs'),(72,'10','Toddler 2-4 Yrs'),(73,'10.5','Toddler 2-4 Yrs'),(74,'11','Toddler 2-4 Yrs'),(75,'11.5','Toddler 2-4 Yrs'),(76,'12','Toddler 2-4 Yrs'),(77,'12.5','Youth 4-12 Yrs'),(78,'13','Youth 4-12 Yrs'),(79,'13.5','Youth 4-12 Yrs'),(80,'1','Youth 4-12 Yrs'),(81,'1.5','Youth 4-12 Yrs'),(82,'2','Youth 4-12 Yrs'),(83,'2.5','Youth 4-12 Yrs'),(84,'3','Youth 4-12 Yrs'),(85,'3.5','Youth 4-12 Yrs'),(86,'4','Youth 4-12 Yrs'),(87,'4.5','Youth 4-12 Yrs'),(88,'5','Youth 4-12 Yrs'),(89,'5.5','Youth 4-12 Yrs'),(90,'6','Youth 4-12 Yrs'),(91,'6.5','Youth 4-12 Yrs'),(92,'7','Youth 4-12 Yrs'),(93,'6','Men\'s/Women\'s'),(94,'7','Men\'s/Women\'s'),(95,'7.5','Men\'s/Women\'s'),(96,'8','Men\'s/Women\'s'),(97,'8.5','Men\'s/Women\'s'),(98,'9','Men\'s/Women\'s'),(99,'9.5','Men\'s/Women\'s'),(100,'10','Men\'s/Women\'s'),(101,'10.5','Men\'s/Women\'s'),(102,'11','Men\'s/Women\'s'),(103,'11.5','Men\'s/Women\'s'),(104,'12','Men\'s/Women\'s'),(105,'12.5','Men\'s/Women\'s'),(106,'13','Men\'s/Women\'s'),(107,'14','Men\'s/Women\'s');
/*!40000 ALTER TABLE `size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donation_id` int(11) DEFAULT NULL,
  `need_id` int(11) DEFAULT NULL,
  `date_initiated` date DEFAULT NULL,
  `number_of_units` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `donation_id_idxfk` (`donation_id`),
  KEY `need_id_idxfk` (`need_id`),
  CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`id`),
  CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`need_id`) REFERENCES `need` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit_genre`
--

DROP TABLE IF EXISTS `unit_genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unit_genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit_genre`
--

LOCK TABLES `unit_genre` WRITE;
/*!40000 ALTER TABLE `unit_genre` DISABLE KEYS */;
INSERT INTO `unit_genre` VALUES (1,'Male Clothing','Infant & Toddler Sizes'),(2,'Male Clothing','Boy\'s Sizes'),(3,'Male Clothing','Men\'s Sizes'),(4,'Female Clothlng','Infant & Toddler Sizes'),(5,'Female Clothing','Girl\'s Sizes'),(6,'Female Clothlng','Women\'s Sizes'),(7,'Female Clothing','Women\'s Plus Sizes'),(8,'Shoes','Infants 0-24 Mos.'),(9,'Shoes','Toddler 2-4 Yrs'),(10,'Shoes','Youth 4-12 Yrs '),(11,'Shoes','Men\'s/Wonen\'s');
/*!40000 ALTER TABLE `unit_genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `access_level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `access_level_idxfk` (`access_level`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`access_level`) REFERENCES `access_level` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'gseeto','gseeto','gareth.seeto@gmail.com','Gareth','Seeto',3),(2,'charity','charity','charity@gmail.com','Charity','Partner',1),(3,'fashion','fashion','fashion@gmail.com','Fashion','Partner',2),(4,'batman2','robin','batman@gmail.com','Bruce','Wayne',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_charity_assn`
--

DROP TABLE IF EXISTS `user_charity_assn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_charity_assn` (
  `user_id` int(11) NOT NULL,
  `charity_id` int(11) NOT NULL,
  KEY `user_id_idxfk` (`user_id`),
  KEY `charity_id_idxfk_1` (`charity_id`),
  CONSTRAINT `user_charity_assn_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `user_charity_assn_ibfk_2` FOREIGN KEY (`charity_id`) REFERENCES `charity_partner` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_charity_assn`
--

LOCK TABLES `user_charity_assn` WRITE;
/*!40000 ALTER TABLE `user_charity_assn` DISABLE KEYS */;
INSERT INTO `user_charity_assn` VALUES (2,1);
/*!40000 ALTER TABLE `user_charity_assn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_fashion_assn`
--

DROP TABLE IF EXISTS `user_fashion_assn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_fashion_assn` (
  `user_id` int(11) NOT NULL,
  `fashion_id` int(11) NOT NULL,
  KEY `user_id_idxfk_1` (`user_id`),
  KEY `fashion_id_idxfk` (`fashion_id`),
  CONSTRAINT `user_fashion_assn_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `user_fashion_assn_ibfk_2` FOREIGN KEY (`fashion_id`) REFERENCES `fashion_partner` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_fashion_assn`
--

LOCK TABLES `user_fashion_assn` WRITE;
/*!40000 ALTER TABLE `user_fashion_assn` DISABLE KEYS */;
INSERT INTO `user_fashion_assn` VALUES (3,1);
/*!40000 ALTER TABLE `user_fashion_assn` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-08 17:53:06
