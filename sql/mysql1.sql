-- MySQL dump 10.10
--
-- Host: 127.0.0.1    Database: search
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int unsigned auto_increment,
  `name` varchar(100),
  `price` int,
  `gramm` int,
  `picture` varchar(500),
  `category` varchar(500),
  UNIQUE `id` (`id`)
)/*! engine=MyISAM */;

--
-- Dumping data for table `menu`
--


/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
LOCK TABLES `menu` WRITE;
INSERT INTO `menu` VALUES (1,'Бутерброд с яйцом',250,100,'eggs1.png','Завтрак'),(2,'Блинчики с мёдом',120,90,'pankayk.png','Завтрак'),(3,'Домашняя овсяная каша',150,250,'kasha.png','Завтрак'),(4,'Скрамбл',260,100,'skrambl.png','Завтрак'),(5,'Авакадо Тост с лососем',410,120,'avakado.png','Завтрак'),(6,'Гранола c йогуртом',260,150,'granola.png','Завтрак'),(7,'Домашний йогурт с ягодным соусом',180,250,'iogurt.png','Завтрак'),(8,'Сырники',270,130,'sirniki.png','Завтрак'),(9,'Куриный супчик с домашней лапшой',300,240,'kurini_sup.png','Обед / Ужин'),(10,'Лосось с Птитином',620,270,'losos.png','Обед / Ужин'),(11,'Рис с курицей Тереяки',410,230,'tereaki.png','Обед / Ужин'),(12,'Суп крем тыквенный',290,300,'sup_tik.png','Обед / Ужин'),(13,'Стейк из вырезки говядины под перечным соусом',750,180,'staik.png','Обед / Ужин'),(14,'Бефстроганов с картофельным пюре по особому рецепту',510,350,'befstrog.png','Обед / Ужин'),(15,'Котлета по-киевски',410,310,'kotletakiev.png','Обед / Ужин'),(16,'Кальмар в сливочном соусе с булгуром',470,290,'kalmar.png','Обед / Ужин'),(17,'Торт \"Чизкейк\"',150,1,'chizcaick.png','Десерты'),(18,'Торт \"Манго\"',150,1,'mango_cake.png','Десерты'),(19,'Пирожное \"Тирамису\"',140,1,'tiramisu.png','Десерты'),(20,'Пирожное \"Наполеон\"',130,1,'napoleon.png','Десерты'),(21,'Пирожное \"Сочник\"',50,1,'si4nik.png','Десерты'),(22,'Яблочная шарлотка',120,1,'applesharlota.png','Десерты'),(23,'Торт \"Медовик\"',130,1,'medovik.png','Десерты'),(24,'Маффин с шоколадом',100,1,'maffin.png','Десерты'),(25,'TEALATTE',190,350,'tealatte.png','Напитки'),(26,'Малиновый чай с мёдом и мятой',290,600,'malintea.png','Напитки'),(27,'Сенча',250,600,'sencha.png','Напитки'),(28,'Молочный улун',250,600,'ulun.png','Напитки'),(29,'Латте',160,250,'latte.png','Напитки'),(30,'Гляссе',190,250,'glasse.png','Напитки'),(31,'Капучино',150,200,'capuchino.png','Напитки'),(32,'Грог',580,1000,'grog.png','Напитки');
UNLOCK TABLES;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

