/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.19 : Database - bdchuquiago
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bdchuquiago` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bdchuquiago`;

/*Table structure for table `asignatura` */

DROP TABLE IF EXISTS `asignatura`;

CREATE TABLE `asignatura` (
  `id_asignatura` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre_asignatura` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `sigla` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estado` bigint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_asignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `asignatura` */

LOCK TABLES `asignatura` WRITE;

UNLOCK TABLES;

/*Table structure for table `citacion` */

DROP TABLE IF EXISTS `citacion`;

CREATE TABLE `citacion` (
  `id_citacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `citacion` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `id_kardex` int(11) NOT NULL,
  PRIMARY KEY (`id_citacion`),
  KEY `id_kar` (`id_kardex`),
  CONSTRAINT `id_kar` FOREIGN KEY (`id_kardex`) REFERENCES `kardex` (`id_kardex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `citacion` */

LOCK TABLES `citacion` WRITE;

UNLOCK TABLES;

/*Table structure for table `curso` */

DROP TABLE IF EXISTS `curso`;

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `grado` varchar(20) NOT NULL,
  `paralelo` varchar(8) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `curso` */

LOCK TABLES `curso` WRITE;

UNLOCK TABLES;

/*Table structure for table `dicta` */

DROP TABLE IF EXISTS `dicta`;

CREATE TABLE `dicta` (
  `id_docente` int(11) NOT NULL,
  `id_asignatura` bigint(11) NOT NULL,
  PRIMARY KEY (`id_docente`,`id_asignatura`),
  KEY `id_asignatura2` (`id_asignatura`),
  CONSTRAINT `dicta_ibfk_1` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_docente1` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `dicta` */

LOCK TABLES `dicta` WRITE;

UNLOCK TABLES;

/*Table structure for table `docente` */

DROP TABLE IF EXISTS `docente`;

CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `paterno` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `materno` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `celular` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `id_user` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_docente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `docente` */

LOCK TABLES `docente` WRITE;

UNLOCK TABLES;

/*Table structure for table `encargado` */

DROP TABLE IF EXISTS `encargado`;

CREATE TABLE `encargado` (
  `id_tutor` int(11) NOT NULL,
  `id_rude` int(20) NOT NULL,
  PRIMARY KEY (`id_tutor`,`id_rude`),
  KEY `id_rude1` (`id_rude`),
  CONSTRAINT `id_rude1` FOREIGN KEY (`id_rude`) REFERENCES `estudiante` (`id_rude`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_tutor1` FOREIGN KEY (`id_tutor`) REFERENCES `tutor` (`id_tutor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `encargado` */

LOCK TABLES `encargado` WRITE;

UNLOCK TABLES;

/*Table structure for table `estudiante` */

DROP TABLE IF EXISTS `estudiante`;

CREATE TABLE `estudiante` (
  `id_rude` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `paterno` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `materno` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sexo` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `domicilio` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL DEFAULT 's/dir',
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `id_user` bigint(4) DEFAULT NULL,
  PRIMARY KEY (`id_rude`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `estudiante` */

LOCK TABLES `estudiante` WRITE;

UNLOCK TABLES;

/*Table structure for table `faltas` */

DROP TABLE IF EXISTS `faltas`;

CREATE TABLE `faltas` (
  `id_falta` int(11) NOT NULL AUTO_INCREMENT,
  `tipoFalta` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_falta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `faltas` */

LOCK TABLES `faltas` WRITE;

UNLOCK TABLES;

/*Table structure for table `faltas_cometidas` */

DROP TABLE IF EXISTS `faltas_cometidas`;

CREATE TABLE `faltas_cometidas` (
  `id_fal_com` bigint(20) NOT NULL AUTO_INCREMENT,
  `obseracion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `contador` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `id_kardex` int(11) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  PRIMARY KEY (`id_fal_com`),
  KEY `id_kardex` (`id_kardex`),
  CONSTRAINT `id_kardex` FOREIGN KEY (`id_kardex`) REFERENCES `kardex` (`id_kardex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `faltas_cometidas` */

LOCK TABLES `faltas_cometidas` WRITE;

UNLOCK TABLES;

/*Table structure for table `kardes_curso` */

DROP TABLE IF EXISTS `kardes_curso`;

CREATE TABLE `kardes_curso` (
  `id_kardex` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `gestion` year(4) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish2_ci DEFAULT 'a' COMMENT 'se registrara al cambiar la gestion si esta aprobado a si esta reprobado r',
  `id_asesor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kardex`,`id_curso`),
  KEY `id_curso` (`id_curso`),
  CONSTRAINT `kardes_curso_ibfk_1` FOREIGN KEY (`id_kardex`) REFERENCES `kardex` (`id_kardex`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kardes_curso_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `kardes_curso` */

LOCK TABLES `kardes_curso` WRITE;

UNLOCK TABLES;

/*Table structure for table `kardex` */

DROP TABLE IF EXISTS `kardex`;

CREATE TABLE `kardex` (
  `id_kardex` int(11) NOT NULL,
  `reset` tinyint(1) NOT NULL,
  `gestion` year(4) NOT NULL,
  `id_rude` int(11) NOT NULL,
  PRIMARY KEY (`id_kardex`),
  KEY `id_rude` (`id_rude`),
  CONSTRAINT `id_rude` FOREIGN KEY (`id_rude`) REFERENCES `estudiante` (`id_rude`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `kardex` */

LOCK TABLES `kardex` WRITE;

UNLOCK TABLES;

/*Table structure for table `modelo_citacion` */

DROP TABLE IF EXISTS `modelo_citacion`;

CREATE TABLE `modelo_citacion` (
  `id_citacion` int(11) NOT NULL AUTO_INCREMENT,
  `formato` varchar(400) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_citacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `modelo_citacion` */

LOCK TABLES `modelo_citacion` WRITE;

UNLOCK TABLES;

/*Table structure for table `pfaltas` */

DROP TABLE IF EXISTS `pfaltas`;

CREATE TABLE `pfaltas` (
  `id_pfalta` int(11) NOT NULL AUTO_INCREMENT,
  `max_faltas` int(10) NOT NULL,
  PRIMARY KEY (`id_pfalta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pfaltas` */

LOCK TABLES `pfaltas` WRITE;

UNLOCK TABLES;

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `roles` */

LOCK TABLES `roles` WRITE;

UNLOCK TABLES;

/*Table structure for table `tiene` */

DROP TABLE IF EXISTS `tiene`;

CREATE TABLE `tiene` (
  `id_curso` int(11) NOT NULL,
  `id_asignatura` bigint(20) NOT NULL,
  PRIMARY KEY (`id_curso`,`id_asignatura`),
  KEY `id_asignatura1` (`id_asignatura`),
  CONSTRAINT `id_curso2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tiene_ibfk_1` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tiene` */

LOCK TABLES `tiene` WRITE;

UNLOCK TABLES;

/*Table structure for table `tutor` */

DROP TABLE IF EXISTS `tutor`;

CREATE TABLE `tutor` (
  `id_tutor` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `paterno` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `materno` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `celular` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `domicilio` varchar(200) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 's/dir',
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `id_user` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_tutor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `tutor` */

LOCK TABLES `tutor` WRITE;

UNLOCK TABLES;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_rol`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

LOCK TABLES `usuario` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
