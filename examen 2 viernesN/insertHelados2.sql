-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: helados2
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
-- Dumping data for table `helado_caracteristica`
--

LOCK TABLES `helado_caracteristica` WRITE;
/*!40000 ALTER TABLE `helado_caracteristica` DISABLE KEYS */;
INSERT INTO `helado_caracteristica` VALUES (1,'2018-08-17 11:48:56','2018-08-17 11:48:56',1,1),(2,'2018-08-17 11:55:12','2018-08-17 11:55:12',2,1),(3,'2018-08-17 11:55:12','2018-08-17 11:55:12',2,5),(4,'2018-08-17 11:55:51','2018-08-17 11:55:51',3,3),(5,'2018-08-17 11:55:51','2018-08-17 11:55:51',3,4),(6,'2018-08-17 11:59:12','2018-08-17 11:59:12',4,2),(7,'2018-08-17 11:59:12','2018-08-17 11:59:12',4,3),(8,'2018-08-17 11:59:12','2018-08-17 11:59:12',4,4);
/*!40000 ALTER TABLE `helado_caracteristica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `helados`
--

LOCK TABLES `helados` WRITE;
/*!40000 ALTER TABLE `helados` DISABLE KEYS */;
INSERT INTO `helados` VALUES (1,'soul alma de chocolate','Cono con helado de chocolate y salsa de chocolate en su interior, cobertura de chocolate y almendras',1400,'helados/4AG7Vs7vJfyvNMaVt8Anu5aHOyJ5A90mEo93TTfF.jpeg',1,'2018-08-17 11:48:56','2018-08-17 11:48:56'),(2,'m&m\'s vainilla','Cono con helado de vainilla con mini M&M\'s',1350,'helados/YEIHubDp30sJJeuDkK9fXPL0sTMxJkVleHgvt7yL.jpeg',2,'2018-08-17 11:55:12','2018-08-17 11:55:12'),(3,'kaliloop','Divertido polo helado con combinación de 3 sorbetes: Lima-Limón, Fresa y Naranja',1000,'helados/0dVj9uzOm07lB4StCTFuOKCX5m6GiKcCnwlqFlp7.gif',1,'2018-08-17 11:55:51','2018-08-17 11:55:51'),(4,'lemon sorbet','Sorbete de sabor delicado, elaborado con zumo de los limones más aromáticos.',1650,'helados/jRreuhQximwIH5itcyzV7tqkD8q956uP4MI8byDN.jpeg',2,'2018-08-17 11:59:12','2018-08-17 11:59:12');
/*!40000 ALTER TABLE `helados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Adminstrador 1','admin1@gmail.com','$2y$10$r65BBUaclhxL3N79LV9YK.ulaWEy1Yy5cs9Q1HW.1eRVKgYQgTfGG','1122334455',NULL,1,'2018-08-17 11:33:49','2018-08-17 11:33:49'),(2,'Cajero 1','cajero1@gmail.com','$2y$10$kca0m5qCXP.rs6wnnFzhCOGm3hmQDx8XHaDF2CGDMRxfjvF1NYmIG','2233445566',NULL,2,'2018-08-17 19:50:42','2018-08-17 19:50:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `votos`
--

LOCK TABLES `votos` WRITE;
/*!40000 ALTER TABLE `votos` DISABLE KEYS */;
INSERT INTO `votos` VALUES (1,3,4,'2018-08-17 12:02:30','2018-08-17 12:02:30'),(2,1,1,'2018-08-17 12:02:35','2018-08-17 12:02:35'),(3,1,2,'2018-08-17 12:02:41','2018-08-17 12:02:41'),(4,3,3,'2018-08-17 12:02:48','2018-08-17 12:02:48'),(5,3,4,'2018-08-17 12:02:56','2018-08-17 12:02:56'),(6,3,1,'2018-08-17 12:03:01','2018-08-17 12:03:01'),(7,3,1,'2018-08-17 12:03:06','2018-08-17 12:03:06');
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

-- Dump completed on 2018-08-17  8:56:20
