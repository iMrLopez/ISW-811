-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: propiedades
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
-- Dumping data for table `propiedads`
--

LOCK TABLES `propiedads` WRITE;
/*!40000 ALTER TABLE `propiedads` DISABLE KEYS */;
INSERT INTO `propiedads` VALUES (1,'Casa en Condominio con Vistas y Piscina, Escazu','Jaboncillo, Escazú (Costa Rica)',3,3,1,'2018-06-17 20:34:52','2018-06-17 20:34:52'),(2,'Se Alquila en Curridabat: Casa de 280 m2 con 3 Habitaciones, Pinares','Pinares/Lomas de Ayarco Norte, Curridabat (Costa Rica)',3,2,2,'2018-06-18 06:17:23','2018-06-18 06:17:23'),(3,'Venta de Nuevo Edificio de 4 Apartamentos en Comunidad Privada, Curridabat','Lomas de Ayarco Sur (Monte Ayarco), Curridabat (Costa Rica)',8,8,3,'2018-06-18 06:37:46','2018-06-18 06:37:46');
/*!40000 ALTER TABLE `propiedads` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Dumping data for table `propiedad_rasgo`
--

LOCK TABLES `propiedad_rasgo` WRITE;
/*!40000 ALTER TABLE `propiedad_rasgo` DISABLE KEYS */;
INSERT INTO `propiedad_rasgo` VALUES (2,'2018-06-17 20:34:52','2018-06-17 20:34:52',1,3),(3,'2018-06-17 20:34:52','2018-06-17 20:34:52',1,4),(4,'2018-06-17 20:34:52','2018-06-17 20:34:52',1,7),(5,'2018-06-17 20:34:52','2018-06-17 20:34:52',1,8),(6,'2018-06-18 06:17:23','2018-06-18 06:17:23',2,3),(7,'2018-06-18 06:17:23','2018-06-18 06:17:23',2,4),(8,'2018-06-18 06:37:46','2018-06-18 06:37:46',3,1),(9,'2018-06-18 06:37:46','2018-06-18 06:37:46',3,3);
/*!40000 ALTER TABLE `propiedad_rasgo` ENABLE KEYS */;
UNLOCK TABLES;


/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-18  8:54:52
