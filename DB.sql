-- MySQL dump 10.16  Distrib 10.1.22-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u787190517_app
-- ------------------------------------------------------
-- Server version	10.1.22-MariaDB

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
-- Table structure for table `Pontos`
--

DROP TABLE IF EXISTS `Pontos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pontos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pontos`
--

/*!40000 ALTER TABLE `Pontos` DISABLE KEYS */;
/*!40000 ALTER TABLE `Pontos` ENABLE KEYS */;

--
-- Table structure for table `Ranking`
--

DROP TABLE IF EXISTS `Ranking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ranking` (
  `idUsuario` int(11) DEFAULT NULL,
  `pontuacao` int(10) unsigned NOT NULL,
  KEY `fk_usuario_Ranking` (`idUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ranking`
--

/*!40000 ALTER TABLE `Ranking` DISABLE KEYS */;
/*!40000 ALTER TABLE `Ranking` ENABLE KEYS */;

--
-- Table structure for table `UsuarioDTO`
--

DROP TABLE IF EXISTS `UsuarioDTO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UsuarioDTO` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UsuarioDTO`
--

/*!40000 ALTER TABLE `UsuarioDTO` DISABLE KEYS */;
INSERT INTO `UsuarioDTO` VALUES (1,'jan totoso','32154','janailson gostoso'),(2,'mile','1234','jamile '),(3,'JANAILSON ROCHA','JAN123','1234'),(4,'JANAILSON ROCHA DE SOUSA','JAN333','123456789'),(5,'jamile','mile','3221'),(6,'antonio carlos','TONY','1234'),(7,'JANAILSON ROCHA','JAN','1234'),(8,'JANAILSON ROCHA','sadf','sda'),(9,'tea','sda','sdgasd'),(10,'verme cinzento','verme','1234'),(11,'verme','1234','verme cinzento'),(12,'teste 01 01','888888',' teste01 01'),(13,'test','test','teste');
/*!40000 ALTER TABLE `UsuarioDTO` ENABLE KEYS */;

--
-- Dumping events for database 'u787190517_app'
--

--
-- Dumping routines for database 'u787190517_app'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-16 13:27:30
