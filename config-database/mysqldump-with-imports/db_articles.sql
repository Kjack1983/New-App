-- MySQL dump 10.17  Distrib 10.3.22-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: db_articles
-- ------------------------------------------------------
-- Server version	10.3.22-MariaDB

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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `reference` varchar(255) NOT NULL,
  `archived` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (3,'article 2','the second record','2020-04-15 15:17:53','2020-04-21 07:19:02','dfsjhkflsdjlf231312',1),(4,'article 3','etsdaadas','2020-04-15 15:26:54','2020-04-17 10:53:05','dsadasdasjkldjas',0),(6,'article 5','fsdsdfsfds','2020-04-16 06:54:39','2020-04-17 15:23:45','dsa324242dfsfsd',1),(7,'What is Lorem Ipsum?','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s','2020-04-21 05:46:56','2020-04-21 05:46:56','DFSKLFJS223432',1),(8,'Why do we use it?','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using','2020-04-21 05:49:39','2020-04-21 05:49:39','KDFSJKLFGSDJLF23432423',0);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phinxlog`
--

LOCK TABLES `phinxlog` WRITE;
/*!40000 ALTER TABLE `phinxlog` DISABLE KEYS */;
INSERT INTO `phinxlog` VALUES (20200415125431,'CreateArticles','2020-04-15 09:55:18','2020-04-15 09:55:18',0),(20200415125749,'AddReferenceToArticles','2020-04-15 09:57:55','2020-04-15 09:57:55',0),(20200416063816,'AddArchivedToArticles','2020-04-16 03:39:20','2020-04-16 03:39:20',0);
/*!40000 ALTER TABLE `phinxlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `related_articles`
--

DROP TABLE IF EXISTS `related_articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `related_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `articles_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_related_articles_articles_idx` (`articles_id`),
  CONSTRAINT `fk_related_articles_articles` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `related_articles`
--

LOCK TABLES `related_articles` WRITE;
/*!40000 ALTER TABLE `related_articles` DISABLE KEYS */;
INSERT INTO `related_articles` VALUES (4,'Criminal test','this is the main criminal 3','2020-04-15 13:50:05','2020-04-20 10:22:47',3),(6,'related article 4','this is a related article 4','2020-04-15 13:59:06','2020-04-20 10:22:47',3),(7,'related article 5','this is a related article 5','2020-04-15 13:59:06','2020-04-17 06:01:24',4),(9,'new related article','this is my title','2020-04-17 15:13:10','2020-04-17 15:13:42',6),(10,'Last related Article','Lorum, Lorum, Lorum, Lorum, Lorum, Lorum, Lorum, Lorum, Lorum','2020-04-18 13:48:20','2020-04-18 13:48:20',6),(11,'related Article 5','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using','2020-04-21 05:50:49','2020-04-21 05:50:49',8),(12,'Test 1','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the','2020-04-21 05:52:20','2020-04-21 05:52:20',7);
/*!40000 ALTER TABLE `related_articles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-22  8:43:32
