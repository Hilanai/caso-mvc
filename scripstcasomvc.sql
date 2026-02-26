CREATE DATABASE  IF NOT EXISTS `casoestudio` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `casoestudio`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: casoestudio
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ejercicios`
--

DROP TABLE IF EXISTS `ejercicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ejercicios` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `Identificacion` varchar(15) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Monto` decimal(18,2) NOT NULL,
  `TipoEjercicio` int(11) NOT NULL,
  PRIMARY KEY (`Consecutivo`),
  KEY `fk_ejercicios` (`TipoEjercicio`),
  CONSTRAINT `fk_ejercicios` FOREIGN KEY (`TipoEjercicio`) REFERENCES `tiposejercicio` (`TipoEjercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ejercicios`
--

LOCK TABLES `ejercicios` WRITE;
/*!40000 ALTER TABLE `ejercicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `ejercicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposejercicio`
--

DROP TABLE IF EXISTS `tiposejercicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tiposejercicio` (
  `TipoEjercicio` int(11) NOT NULL,
  `DescripcionTipoEjercicio` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`TipoEjercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposejercicio`
--

LOCK TABLES `tiposejercicio` WRITE;
/*!40000 ALTER TABLE `tiposejercicio` DISABLE KEYS */;
INSERT INTO `tiposejercicio` VALUES (1,'Ejercicios de resistencia (aeróbicos)'),(2,'Ejercicios de fortalecimiento'),(3,'Ejercicios de equilibrio'),(4,'Ejercicios de flexibilidad');
/*!40000 ALTER TABLE `tiposejercicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'casoestudio'
--

--
-- Dumping routines for database 'casoestudio'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;