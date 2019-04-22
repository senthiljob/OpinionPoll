-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: opinions
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `op_quest`
--

DROP TABLE IF EXISTS `op_quest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `op_quest` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(150) DEFAULT NULL,
  `options` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `op_quest`
--

LOCK TABLES `op_quest` WRITE;
/*!40000 ALTER TABLE `op_quest` DISABLE KEYS */;
INSERT INTO `op_quest` VALUES (1,'What is your favourite JavaScript Library?','{\"1\":\"JQuery\",\"2\":\"MooTools\",\"3\":\"YUI Library\",\"4\":\"Glow\"}'),(2,'Which javascript is more popuplar now?','{\"1\":\"Angular\",\"2\":\"Rue\",\"3\":\"React\",\"4\":\"Node\"}');
/*!40000 ALTER TABLE `op_quest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `op_response`
--

DROP TABLE IF EXISTS `op_response`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `op_response` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `op_question` int(11) DEFAULT NULL,
  `opinion` int(11) DEFAULT NULL,
  `op_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `op_response`
--

LOCK TABLES `op_response` WRITE;
/*!40000 ALTER TABLE `op_response` DISABLE KEYS */;
INSERT INTO `op_response` VALUES (1,1,1,'2019-09-20 00:00:00'),(2,1,3,'2019-04-22 10:39:43'),(3,2,3,'2019-04-22 10:39:44'),(4,1,4,'2019-04-22 10:40:16'),(5,2,2,'2019-04-22 10:40:17'),(6,1,3,'2019-04-22 11:35:05'),(7,2,3,'2019-04-22 11:35:05'),(8,1,2,'2019-04-22 11:40:46'),(9,2,2,'2019-04-22 11:40:46'),(10,1,2,'2019-04-22 11:48:39'),(11,2,2,'2019-04-22 11:48:39'),(12,1,2,'2019-04-22 11:48:54'),(13,2,2,'2019-04-22 11:48:54'),(14,1,2,'2019-04-22 11:49:27'),(15,2,2,'2019-04-22 11:49:27'),(16,1,2,'2019-04-22 11:51:51'),(17,2,2,'2019-04-22 11:51:51'),(18,1,3,'2019-04-22 12:21:50'),(19,2,1,'2019-04-22 12:21:51'),(20,1,4,'2019-04-22 12:22:13'),(21,2,4,'2019-04-22 12:22:13'),(22,1,3,'2019-04-22 12:23:40'),(23,2,1,'2019-04-22 12:23:40'),(24,1,2,'2019-04-22 12:25:43'),(25,2,3,'2019-04-22 12:25:43'),(26,1,2,'2019-04-22 12:30:58'),(27,2,2,'2019-04-22 12:30:58'),(28,1,1,'2019-04-22 12:31:43'),(29,2,1,'2019-04-22 12:31:43'),(30,1,1,'2019-04-22 12:31:49'),(31,2,3,'2019-04-22 12:31:49'),(32,1,4,'2019-04-22 12:34:35'),(33,2,2,'2019-04-22 12:34:35'),(34,1,3,'2019-04-22 12:58:03'),(35,2,2,'2019-04-22 12:58:04'),(36,1,1,'2019-04-22 13:11:02'),(37,2,3,'2019-04-22 13:11:02'),(38,1,1,'2019-04-22 13:11:06'),(39,2,1,'2019-04-22 13:11:06'),(40,2,1,'2019-04-22 13:14:30'),(41,2,4,'2019-04-22 13:14:38');
/*!40000 ALTER TABLE `op_response` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-22 16:55:06
