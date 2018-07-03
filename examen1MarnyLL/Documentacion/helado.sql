-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: helados
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.31-MariaDB

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
-- Dumping data for table `helados`
--

LOCK TABLES `helados` WRITE;
/*!40000 ALTER TABLE `helados` DISABLE KEYS */;
INSERT INTO `helados` VALUES (1,'Soul Alma de Chocolate','Cono con helado de chocolate y salsa de chocolate en su interior, cobertura de chocolate y almendras',1400,'2018-06-25 08:26:23','2018-06-25 05:22:00'),(2,'M&M\'s Vainilla','Cono con helado de vainilla con mini M&M\'s',1500,'2018-06-25 08:26:23','2018-06-25 05:21:51'),(3,'Kaliloop','Divertido polo helado con combinación de 3 sorbetes: Lima-Limón, Fresa y Naranja',1000,'2018-06-25 08:26:23','2018-06-25 05:22:17'),(4,'Lemon Sorbet','Sorbete de sabor delicado, elaborado con zumo de los limones más aromáticos.',1600,'2018-06-25 08:26:23','2018-06-25 05:22:30');
/*!40000 ALTER TABLE `helados` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Dumping data for table `helado_caracteristica`
--

LOCK TABLES `helado_caracteristica` WRITE;
/*!40000 ALTER TABLE `helado_caracteristica` DISABLE KEYS */;
INSERT INTO `helado_caracteristica` VALUES (1,'2018-06-25 05:21:41','2018-06-25 05:21:41',2,1),(2,'2018-06-25 05:21:51','2018-06-25 05:21:51',2,1),(3,'2018-06-25 05:21:51','2018-06-25 05:21:51',2,5),(4,'2018-06-25 05:22:00','2018-06-25 05:22:00',1,1),(5,'2018-06-25 05:22:17','2018-06-25 05:22:17',3,2),(6,'2018-06-25 05:22:17','2018-06-25 05:22:17',3,3),(7,'2018-06-25 05:22:30','2018-06-25 05:22:30',4,2),(8,'2018-06-25 05:22:30','2018-06-25 05:22:30',4,3),(9,'2018-06-25 05:22:30','2018-06-25 05:22:30',4,4);
/*!40000 ALTER TABLE `helado_caracteristica` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Dumping data for table `votos`
--

LOCK TABLES `votos` WRITE;
/*!40000 ALTER TABLE `votos` DISABLE KEYS */;
INSERT INTO `votos` VALUES (1,1,1,'2018-06-25 05:22:38','2018-06-25 05:22:38'),(2,3,2,'2018-06-25 05:22:41','2018-06-25 05:22:41'),(3,3,3,'2018-06-25 05:22:44','2018-06-25 05:22:44'),(4,3,4,'2018-06-25 05:22:47','2018-06-25 05:22:47'),(5,3,4,'2018-06-25 05:22:50','2018-06-25 05:22:50'),(6,1,1,'2018-06-25 05:22:54','2018-06-25 05:22:54'),(7,3,1,'2018-06-25 05:22:57','2018-06-25 05:22:57');
/*!40000 ALTER TABLE `votos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-27 15:20:05
