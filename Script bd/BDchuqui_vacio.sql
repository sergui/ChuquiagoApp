/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.8-MariaDB : Database - bdchuquiago
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

/*Table structure for table `citacion` */

DROP TABLE IF EXISTS `citacion`;

CREATE TABLE `citacion` (
  `id_citacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `citacion` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `id_kardex` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_citacion`),
  KEY `id_kardex` (`id_kardex`),
  CONSTRAINT `citacion_ibfk_1` FOREIGN KEY (`id_kardex`) REFERENCES `kardex` (`id_kardex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `citacion` */

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

/*Table structure for table `docente` */

DROP TABLE IF EXISTS `docente`;

CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL AUTO_INCREMENT,
  `ci` varchar(20) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `paterno` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `materno` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `celular` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `id_user` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_docente`),
  UNIQUE KEY `ci_UNIQUE` (`ci`),
  UNIQUE KEY `id_user_UNIQUE` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `docente` */

insert  into `docente`(`id_docente`,`ci`,`nombre`,`paterno`,`materno`,`celular`,`estado`,`id_user`) values (1,'123456','Administrador','admin','admin','61173339',1,1);

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
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `paterno` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `materno` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sexo` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `domicilio` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL DEFAULT 's/dir',
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `id_user` bigint(4) DEFAULT NULL,
  PRIMARY KEY (`id_rude`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `estudiante` */

/*Table structure for table `faltas` */

DROP TABLE IF EXISTS `faltas`;

CREATE TABLE `faltas` (
  `id_falta` int(11) NOT NULL AUTO_INCREMENT,
  `tipoFalta` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_falta`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `faltas` */

insert  into `faltas`(`id_falta`,`tipoFalta`,`descripcion`,`estado`) values (1,'leves','Falto a clases.',1),(2,'leves','Llega tarde a clases (atrasado).',1),(3,'leves','No trae material de estudio.',1),(4,'leves','No presenta  tareas, trabajos de investigación y trabajos prácticos.',1),(5,'leves','No dio examen de la asignatura',1),(6,'leves','Indisciplina en clases',1),(7,'leves','Incumple con normas de limpieza',1),(8,'leves','Falta de respeto a sus compañeros',1),(9,'leves','Falta de respeto a sus docentes y otros',1),(10,'leves','Asistir a la unidad educativa sin el uniforme correspondiente',1),(11,'leves','Uso de celular sin autorización del docente en horario de clases',1),(12,'graves','Daños ocasionados al mobiliario o infraestructura',1),(13,'graves','Inasistencia a citaciones convocadas por la unidad educativa',1),(14,'graves','Inasistencia a clases por tres días o mas',1),(15,'graves','Inasistencia a desfiles cívicos, actos cívicos',1),(16,'graves','La participación o encubrimiento de actos delictivos',1),(17,'graves','La reincidencia voluntaria a faltas leves',1),(18,'graves','Portar objetos: cortantes, punzantes, armas de cualquier clase',1),(19,'muy graves','Daños ocasionados al mobiliario o infraestructura',1),(20,'muy graves','Inasistencia a citaciones convocadas por la unidad educativa',1),(21,'muy graves','Inasistencia a clases por tres días o mas',1),(22,'muy graves','Inasistencia a desfiles cívicos, actos cívicos',1),(23,'muy graves','La participación o encubrimiento de actos delictivos',1),(24,'muy graves','La reincidencia voluntaria a faltas leves',1),(25,'muy graves','Portar objetos: cortantes, punzantes, armas de cualquier clase',1);

/*Table structure for table `faltas_cometidas` */

DROP TABLE IF EXISTS `faltas_cometidas`;

CREATE TABLE `faltas_cometidas` (
  `id_fal_com` bigint(20) NOT NULL AUTO_INCREMENT,
  `obseracion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `contador` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `id_kardex` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_falta` int(11) NOT NULL,
  PRIMARY KEY (`id_fal_com`),
  KEY `id_kardex` (`id_kardex`),
  KEY `id_falta` (`id_falta`),
  CONSTRAINT `faltas_cometidas_ibfk_1` FOREIGN KEY (`id_kardex`) REFERENCES `kardex` (`id_kardex`),
  CONSTRAINT `faltas_cometidas_ibfk_2` FOREIGN KEY (`id_falta`) REFERENCES `faltas` (`id_falta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `faltas_cometidas` */

/*Table structure for table `kardex` */

DROP TABLE IF EXISTS `kardex`;

CREATE TABLE `kardex` (
  `id_kardex` bigint(20) NOT NULL AUTO_INCREMENT,
  `reset` tinyint(1) NOT NULL,
  `gestion` year(4) NOT NULL,
  `id_rude` int(20) NOT NULL,
  `estado` char(1) DEFAULT NULL COMMENT 'a= aprobado r= reprobado',
  `id_curso` int(11) NOT NULL,
  `id_asesor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kardex`),
  KEY `id_rude` (`id_rude`),
  KEY `id_curso` (`id_curso`),
  CONSTRAINT `id_rude` FOREIGN KEY (`id_rude`) REFERENCES `estudiante` (`id_rude`),
  CONSTRAINT `kardex_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `kardex` */

/*Table structure for table `modelo_citacion` */

DROP TABLE IF EXISTS `modelo_citacion`;

CREATE TABLE `modelo_citacion` (
  `id_citacion` int(11) NOT NULL AUTO_INCREMENT,
  `formato` varchar(400) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_citacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `modelo_citacion` */

/*Table structure for table `pfaltas` */

DROP TABLE IF EXISTS `pfaltas`;

CREATE TABLE `pfaltas` (
  `id_pfalta` int(11) NOT NULL AUTO_INCREMENT,
  `max_faltas` int(10) NOT NULL,
  PRIMARY KEY (`id_pfalta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `pfaltas` */

insert  into `pfaltas`(`id_pfalta`,`max_faltas`) values (1,3);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `roles` */

insert  into `roles`(`id_rol`,`nombre`,`estado`) values (1,'Administrador',1),(2,'Docente',1),(3,'Responsable',1),(4,'Estudiante',1),(5,'Secretaria(o)',1),(6,'Director(a)',1);

/*Table structure for table `tiene` */

DROP TABLE IF EXISTS `tiene`;

CREATE TABLE `tiene` (
  `id_curso` int(11) NOT NULL,
  `id_asignatura` bigint(20) NOT NULL,
  `id_docente` int(11) NOT NULL,
  PRIMARY KEY (`id_curso`,`id_asignatura`,`id_docente`),
  KEY `id_asignatura1` (`id_asignatura`),
  KEY `id_docente` (`id_docente`),
  CONSTRAINT `id_curso2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tiene_ibfk_1` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tiene_ibfk_2` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tiene` */

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

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_rol`),
  UNIQUE KEY `nombre_usuario_UNIQUE` (`nombre_usuario`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`nombre_usuario`,`password`,`estado`,`id_rol`) values (1,'admin','$2y$10$YI9C55vOApfscCBpGVn5iObXDmCfwyj6BFuJY66n3dDtkW3ATlSVK',1,1);

/* Procedure structure for procedure `listadelCurso` */

/*!50003 DROP PROCEDURE IF EXISTS  `listadelCurso` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `listadelCurso`(IN idc BIGINT)
BEGIN
  SELECT 
    CONCAT(
      e.nombre,
      ' ',
      e.paterno,
      ' ',
      e.materno
    ) AS nombre_completo,
    e.sexo,
    e.fecha_nac,
    e.id_rude 
  FROM
    estudiante e,
    curso c,
    kardex k 
  WHERE c.id_curso = k.id_curso 
    AND e.id_rude = k.id_rude 
    AND c.id_curso = idc ;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
