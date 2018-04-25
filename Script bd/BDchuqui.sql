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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `asignatura` */

insert  into `asignatura`(`id_asignatura`,`nombre_asignatura`,`sigla`,`estado`) values (1,'MATEMATICAS','MAT',1),(2,'QUIMICA','QMC',1),(3,'BIOLOGIA','BIO',1),(4,'PSICOLOGIA','PSC',1),(5,'FISICA','FIS',1),(6,'LITERATURA','LIT',1),(7,'ARTES PLASTICAS','ART',1),(8,'MUSICA','MUS',1),(9,'FILISOFIA','FIL',1),(10,'EDUCACION CIVIC','CIV',1),(11,'HISTORIA','HIS',1),(12,'CIENCIAS NATURA','CNT',1),(13,'GEOGRAFIA','GEO',1),(14,'TECNICA VOCACIO','TEC',1),(15,'EDUCACION FISIC','EDU',1),(16,'IDIOMAS','IDI',1),(17,'RELIGION','REL',1),(18,'CIENCIAS SOCIAL','CSO',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `curso` */

insert  into `curso`(`id_curso`,`grado`,`paralelo`,`estado`) values (1,'1RO','A',1),(2,'1RO','B',1),(3,'1RO','C',1),(4,'1RO','D',1),(5,'1RO','E',1),(6,'2DO','A',1),(7,'2DO','B',1),(8,'2DO','C',1),(9,'2DO','D',1),(10,'2DO','E',1),(11,'3RO','A',1),(12,'3RO','B',1),(13,'3RO','C',1),(14,'3RO','D',1),(15,'3RO','E',1),(16,'4TO','A',1),(17,'4TO','B',1),(18,'4TO','C',1),(19,'4TO','D',1),(20,'4TO','E',1),(21,'5TO','A',1),(22,'5TO','B',1),(23,'5TO','C',1),(24,'5TO','D',1),(25,'5TO','E',1),(26,'6TO','A',1),(27,'6TO','B',1),(28,'6TO','C',1),(29,'6TO','D',1),(30,'6TO','E',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

/*Data for the table `docente` */

insert  into `docente`(`id_docente`,`ci`,`nombre`,`paterno`,`materno`,`celular`,`estado`,`id_user`) values (1,'123456','Administrador','admin','admin','61173339',1,1),(2,'10001','Carmen Mireya','Aramayo','Hering','0000000',1,3),(3,'10002','Eulalia Milenca','Cardenas','Cartagena','0000000',1,4),(4,'10003','Edgar','Garcia','Mena','0000000',1,5),(5,'10004','Claudia Paola','Gutierrez','Loza','0000000',1,6),(6,'10005','Julio Wilfredo','Huchani','Copaja','0000000',1,7),(7,'10006','Flora','Lopez','Laura','0000000',1,8),(8,'10007','Encarnacion','Villa','Leandro','0000000',1,9),(9,'10008','Isaac','Calcina','Quispe','0000000',1,10),(10,'10009','Luis Victor','Cameo','Borda','0000000',1,11),(11,'10010','Dora','Michel','Ramos','0000000',1,12),(12,'10011','Domitila','Choque','Mamani','0000000',1,13),(13,'10012','Edgar','Quispe','Quispe','0000000',1,14),(14,'10013','Martha Fabiana','Solorzano','Cruz','0000000',1,15),(15,'10014','Cupertina','Ticona','CastaÃ±o','0000000',1,16),(16,'10015','Gregorio','Vicente','Apaza','0000000',1,17),(17,'10016','Maribel','Mancachi','Salgado','0000000',1,18),(18,'10017','Embly','Mariaca','Alcocer','0000000',1,19),(19,'10018','Lidia','Mujica','Bautista','0000000',1,20),(20,'10019','Gladys','Pinaya','Alaya','0000000',1,21),(21,'10020','Sarah Tereza','Segales','Urquiola','0000000',1,22),(22,'10021','Vicenta Norha','Usnayo','Espejo','0000000',1,23),(23,'10022','Lily Zulema','Chavez','Gordillo','0000000',1,24),(24,'10023','Climaco','Gutierrez','Poma','0000000',1,25),(25,'10024','Gabriela Adelaida','Guzman','Ale','0000000',1,26),(26,'10025','Sandra Isabel','Laura','Aruquipa','0000000',1,27),(27,'10026','Kemper','Monroy','Aliaga','0000000',1,28),(28,'10027','Eloy','Ramos','Berdeja','0000000',1,29),(29,'10029','Jose Rosendo','Aliaga','Alcon','0000000',1,30),(30,'10030','Juan Fernando','Delgado','Medina','0000000',1,31),(31,'10031','Nayter','Bustillos','Chavez','0000000',1,32),(32,'10032','Feliciano','Galarza','Guzman','0000000',1,33),(33,'10033','Maria del Rosario','Jimenez','Vila','0000000',1,34),(34,'10034','Julio Cesar','Gutierrez','Velasquez','0000000',1,35),(35,'10035','Jaime','Rivera','Prudencio','0000000',1,36),(36,'10036','Rosmery','Valda','Tapia','0000000',1,37),(37,'10037','Esteban','Nina','Huallpa','0000000',1,38),(38,'10038','Aquilino','Quispe','Calderon','0000000',1,39),(39,'10039','Leonarda','Acarapi','Nina','0000000',1,40),(40,'10040','Pedro Arsenio','Alvarado','Cuevas','0000000',1,41),(41,'10041','Victoria','Mamani','Condori','0000000',1,42),(42,'10042','Ruben','Gutierrez','Castellanos','0000000',1,43),(43,'10043','Maria Elena','Patzy','Silva','0000000',1,44),(44,'10044','Raul','Salas','Fernandez','0000000',1,45),(45,'10045','Eliseo','Tapia','Espinoza','0000000',1,46),(46,'10046','Venancia','Caceres','Quispe','0000000',1,47),(47,'10047','Delia','Flores','Poma','0000000',1,48),(48,'10048','Francisca Virginia','Choque','Condori','0000000',1,49),(49,'10049','Roberto Guillermo','SiÃ±ani','Apaza','0000000',1,50);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `faltas` */

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
  PRIMARY KEY (`id_fal_com`),
  KEY `id_kardex` (`id_kardex`),
  CONSTRAINT `faltas_cometidas_ibfk_1` FOREIGN KEY (`id_kardex`) REFERENCES `kardex` (`id_kardex`)
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`nombre_usuario`,`password`,`estado`,`id_rol`) values (1,'admin','$2y$10$YI9C55vOApfscCBpGVn5iObXDmCfwyj6BFuJY66n3dDtkW3ATlSVK',1,1),(3,'Carmen','$2y$10$UnB7AFiPuDUbbeWl0oV1LeJTOoPiU6S6B2IDVCj55DJ7jVO8VxmAO',1,2),(4,'Eulalia','$2y$10$fEprLy2Mrn4reifPLlMFpuNX8yyUH4Vh59GRTDCUi4RJ9l/Ei1UHe',1,2),(5,'Edgar','$2y$10$L5X4RA7IA48c0e6osfOKDOrq46H1JRwh5pBTHHGMB7ptgWxzX/7Hy',1,2),(6,'Claudia','$2y$10$uwxicqiqAoAXyoUn1tmMnO8p77sUFGfeSCwNWl2SQVMEkfo0Sp2yC',1,2),(7,'Julio','$2y$10$QVVR.WF0xe94mGDoqdN9HOGtZG1KUSsb4OnOISUlsyS6wHsYsSePK',1,2),(8,'Flora','$2y$10$tDHU4K6n42wx66Z80Og2XeWh3ON8ytezAy03Q5GtgF0tsERZpjBQO',1,2),(9,'Leandro','$2y$10$NpZ/DlASZvDlMCNLpt.o4.T6GYRapJ3CVAQbA7P50ro0FIuKE5Gm6',1,2),(10,'Isaac','$2y$10$v0CwjyyvsM57M7dfytja8ejRtYZtHnaqnkudm/qT5JtL1dRw8DCCW',1,2),(11,'Luis','$2y$10$zOKd2RKSxAJAvYN1AS8Vp.amKONTOIMR6VhECcYCvq46/lg3jaUyO',1,2),(12,'Dora','$2y$10$WhwuqpFrS.oWlMc63WWs7.rc7HTRSL5vCf7wGsLNxS0UErUyVim5e',1,2),(13,'Domitila','$2y$10$o0IiQe95t1I.8jtQpleJF.kmOCHjmIDUPARajMrje7tPcWc91ZJeO',1,2),(14,'Edg','$2y$10$.K0bng5K/SQtOpwJKR6UF.9moRoZRjoIMRO4rDUjgQbnZfgNyPh2K',1,2),(15,'Martha','$2y$10$JH/Jx1QZnSzpdJckfjdFwuRjxWCNzTqIseDkicG6/i/FVEYszPCUe',1,2),(16,'Cupertina','$2y$10$OWUAncfVk.Q2fmLb6xXbl.SfvfdZabxKLutz/2ULY.d4CRwpM2dI6',1,2),(17,'Gregorio','$2y$10$MUFFu6SJtO5ZWkizl63.zevSpXE7rQFKw.1Z/V7HVD9ugIdk0j9Su',1,2),(18,'Maribel','$2y$10$PPFeWaoE6rzYJHFYLjnaTe93BVY74/gduvB8S6xyX3z4urrJvmyYe',1,2),(19,'Embly','$2y$10$Rxhe4QhERGKY8GYhnfZy2egPcUvTRCb/cVhytA5RR7iWToqzhbDg.',1,2),(20,'Lidia','$2y$10$lGFDigRl32mYtvLpYdHV5eoyLtz8yiTlJXTRacxnKeqsbgJyDX67C',1,2),(21,'Gladys','$2y$10$kwVTUYA.GM/2IKH6w2Fr0OWXnMa2.k.ZQgIqqHNOBgQmN4jQs8DDq',1,2),(22,'Sarah','$2y$10$qPr65IWXoUTxNDce6PdcIe21F1KEmhsqHDgNMpVl8dU9.374aP8jK',1,2),(23,'Vicenta','$2y$10$xnCbXYgK5XBb.A48OLT9cOgbKlsfztxOnHoxPgtaDm5ruXvVCGxsm',1,2),(24,'Lily','$2y$10$pkVkqIB7M6odNNUC.AurTuMaqqtChO135dcK5c6nUThP04OEl4WRK',1,2),(25,'Climaco','$2y$10$X7Uh0S8bHjaJHa0ouIyMB.L/RQr4j5mHs/8sZb71c4Calw4HaCXXi',1,2),(26,'Gabriela','$2y$10$NCmDLFeUa7uKrcRYQnLDvO9ORTtpzaas8MTslcUkNcIPqoDzdp5UW',1,2),(27,'Sandra','$2y$10$uTMkncWH0KybJyAeBLxOZuIVQRWEmne93SKYKHCZ/EoD/O/nYHVEu',1,2),(28,'Kemper','$2y$10$kV1osITK3Zdh7S7dL7lp2OefWrb/CWtrbpCHe7Kxo8sOLizDKYWtu',1,2),(29,'Eloy','$2y$10$.EcehJNuciAQmwRGAW6L6.X974EKj2uDvpL0/WAHrCjL4u3/od7y.',1,2),(30,'Jose','$2y$10$QMcxt8.WtVr5AxPBw7YBtujlrJfN0pD0HcKOyUlsALL/LXg3F.PN2',1,2),(31,'Juan','$2y$10$Tmp4MN4X.GMUR7WrTPrBpO2Iu9e3989WCaQRc1VDYUu2lKESyUKY.',1,2),(32,'Nayter','$2y$10$jwjZ1LRuMC7TRS0lXZD9uuO0/tDz/Ly8FwGlJK7Vtukhj/K8ySy.q',1,2),(33,'Feliciano','$2y$10$dFecyZOwc5Ztv4ISlDGMaOR/8zZDRJ955gXQva6E9zuUOHQZRVGoK',1,2),(34,'Maria','$2y$10$zRuGwdDlvMQLUHOzS1jMCeVKU.jPSGtmAC6d89Y9/BnBalHu9CvnS',1,2),(35,'Cesar','$2y$10$ceivsRcw.OgNMvN.rbhgn.j0dTemD0jBxSC/FUzEZ6zu1CgMhhUxC',1,2),(36,'Jaime','$2y$10$Q0P2FwU3i5aTddzBZTId4.LSSxGHHRtm1aXVi5qvqs.g/MG0WZ77O',1,2),(37,'Rosmery','$2y$10$sLATTzCzGVtFOGyghCSzseOETAwSAcClhYRCc6mA1NTpTv8pY6Upu',1,2),(38,'Esteban','$2y$10$zQ0jY1OxGun99yBCwENo0OrFgZBexB39fa4Mm/KXwWy3ZzpE9MjrK',1,2),(39,'Aquilino','$2y$10$Em/OTUHeC0/ly15nb/sYeuLu1uy4tuAtUsmA3opDEm7dtJ0QlhFEu',1,2),(40,'Leonarda','$2y$10$i5zyXI/vtu4sPsrSriR8/urjalWJxKnTt2kzvAylHj45uM.aXRfZG',1,2),(41,'Pedro','$2y$10$jzhgfONGj6l04zo8.xi1o.kZV1i4dbcl/30pXI6R/1B4WfuTXCYBS',1,2),(42,'Victoria','$2y$10$LiHmDu5FAwPsRmLDnoZxW.8bQS94zcr2Q//NS4X0907h5KxRjo9yO',1,2),(43,'Ruben','$2y$10$xWj8IEJkHN8H6fRauC4ULuaGwx3OmhPoMvuGY4iqW0qml0A1k2f5C',1,2),(44,'Elena','$2y$10$EkNJgSJ/dHfI4m1Em4SWced0I39Yhr/x9xrRLXn0mv9QJABntNoC.',1,2),(45,'Raul','$2y$10$G2fd9xf69vqPTaSF16xY5.G6eBZdpebH6NRUY6Y.ZQXsnm3SH9xmG',1,2),(46,'Eliseo','$2y$10$xL6JOQ2NTCJ91QOUg0D5jO2ASLeb2ZniqbiYKwMJpdklpxGFxtkWy',1,2),(47,'Venancia','$2y$10$P14s4CMcDkFn2vPoY6fcQu2lpG4YD1T/f9E0HJNAqSIP6mDmw21me',1,2),(48,'Delia','$2y$10$.VPqrzzKP11hFrVNWDMKGeOW8LbIFZZlZ870u94upXUwzhCHF1.QK',1,2),(49,'Francisca','$2y$10$q8fREJ9HJO.Pw3Ymr2zX8.tHx5wRaxKuRlX2AAwcqCOUTSNzBu.PG',1,2),(50,'Roberto','$2y$10$gR9qsVfLlSgtHiId2xVsPugMmxQzUKbyqcyTkCX2wIcQXsk.MCwkG',1,2);

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
