-- MySQL dump 10.10
--
-- Host: 127.0.0.1    Database: regist
-- ------------------------------------------------------
-- Server version	5.7.29

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned auto_increment,
  `name` varchar(50),
  `surname` varchar(50),
  `email` varchar(50),
  `pass` varchar(32),
  UNIQUE `id` (`id`)
)/*! engine=MyISAM */;

--
-- Dumping data for table `users`
--


/*!40000 ALTER TABLE `users` DISABLE KEYS */;
LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES (1,'Sia','Led','ledvanova2001@mail.ru','12345678'),(2,'Kail','Wild','wild001@mail.ru','5d279f05f08308900d7b84ac42f40a15'),(11,'qwe','qwer','qwe@mail.ru','00224cc3ba44e35814e337a2f78574d2'),(10,'Sias','sawaq','sawaq@mail.ru','414a32c45a880e266400796bb3a1ffc8'),(9,'gas','raslet','rg1982@mail.ru','b182930a351c1c5ec691ffa0aa5250ef'),(3,'cas','waq','fref2345@mail.ru','4071367d5a296e78742f658ccd0bb2e3');
UNLOCK TABLES;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Table structure for table `users1`
--

DROP TABLE IF EXISTS `users1`;
CREATE TABLE `users1` (
  `id` int(11) unsigned auto_increment,
  `name` varchar(50),
  `surname` varchar(50),
  `email` varchar(50),
  `pass` varchar(32),
  UNIQUE `id` (`id`)
)/*! engine=MyISAM */;

--
-- Dumping data for table `users1`
--


/*!40000 ALTER TABLE `users1` DISABLE KEYS */;
LOCK TABLES `users1` WRITE;
INSERT INTO `users1` VALUES (1,'Sia','Led','ledvanova2001@mail.ru','00224cc3ba44e35814e337a2f78574d2');
UNLOCK TABLES;
/*!40000 ALTER TABLE `users1` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

