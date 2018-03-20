-- MySQL dump 10.13  Distrib 5.5.57, for Win32 (AMD64)
--
-- Host: 209.99.16.19    Database: sergui
-- ------------------------------------------------------
-- Server version	5.5.30

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
-- Table structure for table `ASIGNATURA`
--

DROP TABLE IF EXISTS `ASIGNATURA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ASIGNATURA` (
  `id_asignatura` int(11) NOT NULL,
  `nombre_asig` varchar(45) NOT NULL,
  `sigla` varchar(45) NOT NULL,
  PRIMARY KEY (`id_asignatura`),
  UNIQUE KEY `id_asigatura_UNIQUE` (`id_asignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ASIGNATURA`
--

LOCK TABLES `ASIGNATURA` WRITE;
/*!40000 ALTER TABLE `ASIGNATURA` DISABLE KEYS */;
/*!40000 ALTER TABLE `ASIGNATURA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DICTA`
--

DROP TABLE IF EXISTS `DICTA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DICTA` (
  `id_asignatura` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  PRIMARY KEY (`id_asignatura`,`id_docente`),
  UNIQUE KEY `id_asignatura_UNIQUE` (`id_asignatura`),
  UNIQUE KEY `id_docente_UNIQUE` (`id_docente`),
  CONSTRAINT `fk_id_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `ASIGNATURA` (`id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_id_docente` FOREIGN KEY (`id_docente`) REFERENCES `DOCENTE` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DICTA`
--

LOCK TABLES `DICTA` WRITE;
/*!40000 ALTER TABLE `DICTA` DISABLE KEYS */;
/*!40000 ALTER TABLE `DICTA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DOCENTE`
--

DROP TABLE IF EXISTS `DOCENTE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DOCENTE` (
  `id_docente` int(11) NOT NULL,
  `num_celular` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ap_pat` varchar(45) NOT NULL,
  `ap_mat` varchar(45) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_docente`),
  UNIQUE KEY `id_docente_UNIQUE` (`id_docente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DOCENTE`
--

LOCK TABLES `DOCENTE` WRITE;
/*!40000 ALTER TABLE `DOCENTE` DISABLE KEYS */;
/*!40000 ALTER TABLE `DOCENTE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ENCARGADO`
--

DROP TABLE IF EXISTS `ENCARGADO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ENCARGADO` (
  `id_tutor` int(11) NOT NULL,
  `id_rude` int(20) NOT NULL,
  PRIMARY KEY (`id_tutor`,`id_rude`),
  UNIQUE KEY `id_tutor_UNIQUE` (`id_tutor`),
  UNIQUE KEY `id_rude_UNIQUE` (`id_rude`),
  CONSTRAINT `id_tutor` FOREIGN KEY (`id_tutor`) REFERENCES `TUTOR` (`id_tutor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_rude` FOREIGN KEY (`id_rude`) REFERENCES `ESTUDIANTE` (`id_rude`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ENCARGADO`
--

LOCK TABLES `ENCARGADO` WRITE;
/*!40000 ALTER TABLE `ENCARGADO` DISABLE KEYS */;
/*!40000 ALTER TABLE `ENCARGADO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ESTA`
--

DROP TABLE IF EXISTS `ESTA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ESTA` (
  `fk_id_rude` int(20) NOT NULL,
  `fk_id_grado` int(11) NOT NULL,
  PRIMARY KEY (`fk_id_rude`,`fk_id_grado`),
  UNIQUE KEY `fk_id_rude_UNIQUE` (`fk_id_rude`),
  UNIQUE KEY `fk_id__UNIQUE` (`fk_id_grado`),
  CONSTRAINT `id_rude_esta` FOREIGN KEY (`fk_id_rude`) REFERENCES `ESTUDIANTE` (`id_rude`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_grado` FOREIGN KEY (`fk_id_grado`) REFERENCES `GRADO` (`id_grado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ESTA`
--

LOCK TABLES `ESTA` WRITE;
/*!40000 ALTER TABLE `ESTA` DISABLE KEYS */;
/*!40000 ALTER TABLE `ESTA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ESTUDIANTE`
--

DROP TABLE IF EXISTS `ESTUDIANTE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ESTUDIANTE` (
  `id_rude` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ap_pat` varchar(45) NOT NULL,
  `ap_mat` varchar(45) NOT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `domicilio` varchar(200) DEFAULT 's/dir',
  `id_estado` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id_rude`),
  UNIQUE KEY `id_rude_UNIQUE` (`id_rude`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ESTUDIANTE`
--

LOCK TABLES `ESTUDIANTE` WRITE;
/*!40000 ALTER TABLE `ESTUDIANTE` DISABLE KEYS */;
/*!40000 ALTER TABLE `ESTUDIANTE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FALTAS`
--

DROP TABLE IF EXISTS `FALTAS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FALTAS` (
  `id_falta` int(11) NOT NULL,
  `nom_falta` varchar(45) NOT NULL,
  `grado_falta` varchar(45) NOT NULL,
  `id_kardex` int(11) NOT NULL,
  PRIMARY KEY (`id_falta`,`id_kardex`),
  UNIQUE KEY `id_falta_UNIQUE` (`id_falta`),
  UNIQUE KEY `id_kardex_UNIQUE` (`id_kardex`),
  CONSTRAINT `id_kardex` FOREIGN KEY (`id_kardex`) REFERENCES `KARDEX` (`id_kardex`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FALTAS`
--

LOCK TABLES `FALTAS` WRITE;
/*!40000 ALTER TABLE `FALTAS` DISABLE KEYS */;
/*!40000 ALTER TABLE `FALTAS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GRADO`
--

DROP TABLE IF EXISTS `GRADO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GRADO` (
  `id_grado` int(11) NOT NULL,
  `gestion` year(4) NOT NULL,
  `capacidad_curso` int(11) DEFAULT NULL,
  `paralelo` varchar(10) NOT NULL,
  `nro_inscritos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_grado`),
  UNIQUE KEY `id_grado_UNIQUE` (`id_grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GRADO`
--

LOCK TABLES `GRADO` WRITE;
/*!40000 ALTER TABLE `GRADO` DISABLE KEYS */;
/*!40000 ALTER TABLE `GRADO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `KARDEX`
--

DROP TABLE IF EXISTS `KARDEX`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `KARDEX` (
  `id_kardex` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom_estudiante` varchar(50) NOT NULL,
  `descripsion` varchar(200) DEFAULT NULL,
  `asignatura` varchar(45) NOT NULL,
  PRIMARY KEY (`id_kardex`),
  UNIQUE KEY `id_kardex_UNIQUE` (`id_kardex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `KARDEX`
--

LOCK TABLES `KARDEX` WRITE;
/*!40000 ALTER TABLE `KARDEX` DISABLE KEYS */;
/*!40000 ALTER TABLE `KARDEX` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `KARDEX_DOCENTE`
--

DROP TABLE IF EXISTS `KARDEX_DOCENTE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `KARDEX_DOCENTE` (
  `id_kardex` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `asesor` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_kardex`,`id_docente`),
  UNIQUE KEY `fk_id_kardex_kd_UNIQUE` (`id_kardex`),
  UNIQUE KEY `fk_id_docente_UNIQUE` (`id_docente`),
  CONSTRAINT `fk_id_kardex_kd` FOREIGN KEY (`id_kardex`) REFERENCES `KARDEX` (`id_kardex`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_docente` FOREIGN KEY (`id_docente`) REFERENCES `DOCENTE` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `KARDEX_DOCENTE`
--

LOCK TABLES `KARDEX_DOCENTE` WRITE;
/*!40000 ALTER TABLE `KARDEX_DOCENTE` DISABLE KEYS */;
/*!40000 ALTER TABLE `KARDEX_DOCENTE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TIENE`
--

DROP TABLE IF EXISTS `TIENE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TIENE` (
  `id_kardex` int(11) NOT NULL,
  `id_rude` int(20) NOT NULL,
  PRIMARY KEY (`id_kardex`,`id_rude`),
  UNIQUE KEY `id_kardex_UNIQUE` (`id_kardex`),
  UNIQUE KEY `id_rude_UNIQUE` (`id_rude`),
  CONSTRAINT `fk_id_rude` FOREIGN KEY (`id_rude`) REFERENCES `ESTUDIANTE` (`id_rude`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_id_kardex` FOREIGN KEY (`id_kardex`) REFERENCES `KARDEX` (`id_kardex`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TIENE`
--

LOCK TABLES `TIENE` WRITE;
/*!40000 ALTER TABLE `TIENE` DISABLE KEYS */;
/*!40000 ALTER TABLE `TIENE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TUTOR`
--

DROP TABLE IF EXISTS `TUTOR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TUTOR` (
  `id_tutor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `ap_pat` varchar(45) NOT NULL,
  `ap_mat` varchar(45) DEFAULT NULL,
  `num_celular` varchar(12) NOT NULL,
  `id_estado` tinyint(4) NOT NULL DEFAULT '1',
  `domicilio` varchar(200) DEFAULT 's/dir',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tutor`),
  UNIQUE KEY `id_tutor_UNIQUE` (`id_tutor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TUTOR`
--

LOCK TABLES `TUTOR` WRITE;
/*!40000 ALTER TABLE `TUTOR` DISABLE KEYS */;
/*!40000 ALTER TABLE `TUTOR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sergui'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-08 15:10:32
