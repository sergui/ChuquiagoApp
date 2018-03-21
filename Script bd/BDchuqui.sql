/*
SQLyog Enterprise v12.09 (64 bit)
MySQL - 10.1.9-MariaDB : Database - bdchuquiago
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
  `id_asignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_asignatura` varchar(15) NOT NULL,
  `sigla` varchar(7) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_asignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `asignatura` */

/*Table structure for table `comete` */

DROP TABLE IF EXISTS `comete`;

CREATE TABLE `comete` (
  `id_asignatura` int(11) NOT NULL,
  `id_falta` int(11) NOT NULL,
  PRIMARY KEY (`id_asignatura`,`id_falta`),
  KEY `id_falta1` (`id_falta`),
  CONSTRAINT `id_asignatura3` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_falta1` FOREIGN KEY (`id_falta`) REFERENCES `faltas` (`id_falta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `comete` */

/*Table structure for table `curso` */

DROP TABLE IF EXISTS `curso`;

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `grado` varchar(20) NOT NULL,
  `paralelo` varbinary(8) NOT NULL,
  `id_asesor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `curso` */

/*Table structure for table `dicta` */

DROP TABLE IF EXISTS `dicta`;

CREATE TABLE `dicta` (
  `id_docente` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  PRIMARY KEY (`id_docente`,`id_asignatura`),
  KEY `id_asignatura2` (`id_asignatura`),
  CONSTRAINT `id_asignatura2` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_docente1` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `dicta` */

/*Table structure for table `docente` */

DROP TABLE IF EXISTS `docente`;

CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `paterno` varchar(45) NOT NULL,
  `materno` varchar(45) NOT NULL,
  `celular` varchar(12) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_user` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_docente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `docente` */

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

/*Table structure for table `estudiante` */

DROP TABLE IF EXISTS `estudiante`;

CREATE TABLE `estudiante` (
  `id_rude` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `paterno` varchar(45) CHARACTER SET latin1 NOT NULL,
  `materno` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `sexo` varchar(45) CHARACTER SET latin1 NOT NULL,
  `fecha_nac` date NOT NULL,
  `domicilio` varchar(200) CHARACTER SET latin1 NOT NULL DEFAULT 's/dir',
  `id_estado` tinyint(4) NOT NULL DEFAULT '1',
  `id_user` bigint(4) DEFAULT NULL,
  PRIMARY KEY (`id_rude`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `estudiante` */

/*Table structure for table `faltas` */

DROP TABLE IF EXISTS `faltas`;

CREATE TABLE `faltas` (
  `id_falta` int(11) NOT NULL AUTO_INCREMENT,
  `tipoFalta` varchar(200) NOT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  `fecha` date NOT NULL,
  `id_estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_falta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `faltas` */

/*Table structure for table `pertenece` */

DROP TABLE IF EXISTS `pertenece`;

CREATE TABLE `pertenece` (
  `id_rude` int(20) NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_rude`,`id_curso`),
  KEY `id_curso1` (`id_curso`),
  CONSTRAINT `id_curso1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_rude2` FOREIGN KEY (`id_rude`) REFERENCES `estudiante` (`id_rude`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pertenece` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `roles` */

/*Table structure for table `tiene` */

DROP TABLE IF EXISTS `tiene`;

CREATE TABLE `tiene` (
  `id_curso` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  PRIMARY KEY (`id_curso`,`id_asignatura`),
  KEY `id_asignatura1` (`id_asignatura`),
  CONSTRAINT `id_asignatura1` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_curso2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tiene` */

/*Table structure for table `tutor` */

DROP TABLE IF EXISTS `tutor`;

CREATE TABLE `tutor` (
  `id_tutor` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) CHARACTER SET latin1 NOT NULL,
  `paterno` varchar(45) CHARACTER SET latin1 NOT NULL,
  `materno` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `celular` varchar(12) CHARACTER SET latin1 NOT NULL,
  `telefono` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `domicilio` varchar(200) CHARACTER SET latin1 NOT NULL DEFAULT 's/dir',
  `id_estado` tinyint(4) NOT NULL DEFAULT '1',
  `id_user` binary(1) DEFAULT NULL,
  PRIMARY KEY (`id_tutor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tutor` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_rol`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
