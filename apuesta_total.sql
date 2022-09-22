-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: apuesta_total
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `bancos`
--

DROP TABLE IF EXISTS `bancos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bancos` (
  `id_banco` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_banco` varchar(30) NOT NULL,
  PRIMARY KEY (`id_banco`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bancos`
--

LOCK TABLES `bancos` WRITE;
/*!40000 ALTER TABLE `bancos` DISABLE KEYS */;
INSERT INTO `bancos` VALUES (1,'Banco de Comercio'),(2,'Banco de Crédito del Perú'),(3,'BBVA'),(4,'Interbank'),(5,'Scotiabank'),(6,'MiBanco');
/*!40000 ALTER TABLE `bancos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recarga`
--

DROP TABLE IF EXISTS `recarga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recarga` (
  `id_recarga` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `banco_recarga` varchar(20) NOT NULL,
  `n_operacion` varchar(20) NOT NULL,
  `fecha_voucher` datetime NOT NULL,
  `fecha_monto` datetime NOT NULL,
  `monto` float NOT NULL,
  `recarga_canal` varchar(10) NOT NULL,
  PRIMARY KEY (`id_recarga`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `recarga_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recarga`
--

LOCK TABLES `recarga` WRITE;
/*!40000 ALTER TABLE `recarga` DISABLE KEYS */;
INSERT INTO `recarga` VALUES (1,203450,'Scotiabank','100892','2022-09-12 09:34:54','2022-09-21 03:34:54',1100,'WhatsApp'),(2,203450,'BCP','1231','2022-09-20 20:09:00','2022-09-20 20:09:00',2000,'Telegram'),(3,203450,'Interbank','202801','2022-09-16 20:42:00','2022-09-19 00:42:00',100,'WhatsApp'),(7,203450,'Scotiabank','2415513','2022-09-21 09:53:00','2022-09-21 09:53:00',414,'Telegram'),(8,203451,'Interbank','1245136','2022-09-21 18:28:45','2022-09-21 18:28:45',500,'Telegram'),(9,203452,'Banco de la Nación','0912814','2022-09-21 18:29:13','2022-09-21 18:29:13',0,'Telegram'),(11,203451,'MiBanco','24124124','2022-09-21 11:42:00','2022-09-21 11:42:00',11000,'WhatsApp'),(12,203452,'Banco de Comercio','245135135','2022-09-21 15:17:00','2022-09-21 15:17:00',1112,'WhatsApp'),(13,203451,'Banco de Crédito del','236524624','2022-09-21 21:05:00','2022-09-21 00:06:00',200,'WhatsApp');
/*!40000 ALTER TABLE `recarga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `nombre_user` varchar(100) NOT NULL,
  `apellido_user` varchar(100) NOT NULL,
  `tipo_user` varchar(20) NOT NULL,
  `saldo_user` float NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (203450,'Juan','Perez','VIP',500),(203451,'Leonardo','Sanchez','Regular',1000),(203452,'Mario','Camino','Regular',0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-21 22:52:45
