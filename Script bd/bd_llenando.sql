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
  `id_asignatura` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre_asignatura` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `sigla` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estado` bigint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_asignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `asignatura` */

insert  into `asignatura`(`id_asignatura`,`nombre_asignatura`,`sigla`,`estado`) values (1,'matematicas','mat',1),(2,'lengua castellana originaria','org',1),(3,'biologia','bio',1),(4,'geografia','geo',1),(5,'fisica','fis',1),(6,'quimica','qmc',1),(7,'filosofia','fil',1),(8,'psicologia','psi',1),(9,'ciencias sociales','cso',1),(10,'educacion musical','mus',1),(11,'lengua extranjera','len',1),(12,'educacion fisica','edu',1),(13,'artes plasticas y visuales','art',1),(14,'tecnica tegnologica general','tec',1),(15,'valores espiritualidad y religiones','rel',1),(16,'computacion informatica','inf',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

/*Data for the table `docente` */

insert  into `docente`(`id_docente`,`ci`,`nombre`,`paterno`,`materno`,`celular`,`estado`,`id_user`) values (1,'123456','Administrador','admin','admin','61173339',1,1),(2,'10001','LEONARDA','ACARAPI',' NINA','1111111',1,2),(3,'10002','VICTORIA ','MAMANI ','CONDORI','1111111',1,3),(4,'10003','PATRICIA ','CUTIPA ','GARCIA','1111111',1,4),(5,'10004','VICENTA NORHA ','USNAYO',' ESPEJO','1111111',1,5),(6,'10005','LIDIA ','MUJICA ','BAUTISTA','1111111',1,6),(7,'10006','FLORENCIA','NINA ','MAYTA','1111111',1,7),(8,'10007','RUBEN ','GUTIERREZ ','CASTELLANOS','1111111',1,8),(9,'10008','ELISEO',' TAPIA ','ESPINOZA','1111111',1,9),(10,'10009','EMBLY ','MARIACA ','ALCOCER','1111111',1,10),(11,'10010','GLADYS ','PINAYA',' AYALA','1111111',1,11),(12,'10011','MARIBEL ','MANCACHI ','SALGADO','1111111',1,12),(13,'10012','DORA',' MICHEL ','RAMOS','1111111',1,13),(14,'10013','VICTOR ','CAMEO ','BORDA','1111111',1,14),(15,'10014','CUPERTINA',' TICONA ','CASTAÑO','1111111',1,15),(16,'10015','MARTHA FABIANA ','SOLORZANO ','CRUZ','1111111',1,16),(17,'10016','EULALIA MILENCA',' CARDENAS ','CARTAGENA','1111111',1,17),(18,'10017','ISAAC ','CALCINA ','QUISPE','1111111',1,18),(19,'10018','EDGAR',' QUISPE ','QUISPE','1111111',1,19),(20,'10019','DOMITILA ','CHOQUE ','MAMANI','1111111',1,20),(21,'10020','EFRAIN ','LAURA ','MAMANI','1111111',1,21),(22,'10021','CARMEN MIREYA ','ARAMAYO ','HERING','1111111',1,22),(23,'10022','MIRIAM',' MORALES ','CARI','1111111',1,23),(24,'10023','LILY ZULEMA',' CHAVEZ ','GORDILLO','1111111',1,24),(25,'10024','GABRIELA ADELAIDA ','GUZMAN ','ALE','1111111',1,25),(26,'10025','KEMPER ','MONROY ','ALIAGA','1111111',1,26),(27,'10026','ESTEBAN ','NINA',' HUALLPA','1111111',1,27),(28,'10027','JOSE ROSENDO',' ALIAGA ','ALCON','1111111',1,28),(29,'10028','ROSMERY ','VALDA ','TAPIA','1111111',1,29),(30,'10029','JULIO CESAR',' GUTIERREZ ','VELASQUEZ','1111111',1,30),(31,'10030','SANDRA ISABEL ','LAURA ','ARUQUIPA','1111111',1,31),(32,'10031','CLIMACO ','GUTIERREZ ','POMA','1111111',1,32),(33,'10032','ELOY ','RAMOS ','BERDEJA','1111111',1,33),(34,'10033','AQUILINO ','QUISPE ','CALDERON','1111111',1,34),(35,'10034','JUAN FERNANDO',' DELGADO ','MEDINA','1111111',1,35),(36,'10035','JAIME ','RIVERA ','PRUDENCIO','1111111',1,36),(37,'10036','MARIA DEL ROSARIO ','JIMENEZ ','VILA','1111111',1,37),(38,'10037','VIRGINIA ','GUZMAN ','CACHI','1111111',1,38),(39,'10038','JULIO WILFREDO ','HUCHANI ','COPAJA','1111111',1,39),(40,'10039','ENCARNACIÓN ','VILLA ','LEANDRO','1111111',1,40),(41,'10040','RUBEN ','ALARCON ','CORIA','1111111',1,41),(42,'10041','FELICIANO ','GALARZA ','GUZMAN','1111111',1,42),(43,'10042','DOLORES VENANCIA',' CACERES',' QUISPE','1111111',1,43),(44,'10043','FLORA ','LOPEZ ','LAURA','1111111',1,44),(45,'10044','URBANO',' LAIME ','AJACOPA','1111111',1,45);

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
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;

/*Data for the table `estudiante` */

insert  into `estudiante`(`id_rude`,`nombre`,`paterno`,`materno`,`sexo`,`fecha_nac`,`domicilio`,`estado`,`id_user`) values (1,' NOEMI','CAHUASIQUITA',NULL,'F','2002-09-15','s/dir',1,NULL),(2,'YHAIR ALEX','MARTINEZ ',NULL,'M','2002-09-16','s/dir',1,NULL),(3,'JOYCE NICOLE','APAZA ','QUISPE ','F','2002-09-17','s/dir',1,NULL),(4,'SHARI DANITZA','CACHI ','MAMANI ','F','2002-09-18','s/dir',1,NULL),(5,'BRIGIDA','CALLE ','LAYME ','F','2002-09-19','s/dir',1,NULL),(6,'NOEMY','CHOQUE ','MAMANI ','F','2002-09-20','s/dir',1,NULL),(7,'YONHZ BRAYAN','COLQUE',' QUIQUISANI ','M','2002-09-21','s/dir',1,NULL),(8,'CRISTIAN DEYBITH','CONDO ','INGALA ','M','2002-09-22','s/dir',1,NULL),(9,'YHOSELIN','CRUZ ','YUJRA ','F','2002-09-23','s/dir',1,NULL),(10,' ISRAEL HERIBERTO','FERNANDEZ ','QUISPE','M','2002-09-24','s/dir',1,NULL),(11,'DORIAN STANLY','GARCIA ','LOPEZ ','M','2002-09-25','s/dir',1,NULL),(12,'RAUL','GAVINCHA ','URUÑO ','M','2002-09-26','s/dir',1,NULL),(13,'JHONNY FREDDY','GUAMAN',' ESTRADA ','M','2002-09-27','s/dir',1,NULL),(14,'JOHANN MIGUEL','IQUISI ','BLANCO ','M','2002-09-28','s/dir',1,NULL),(15,'JUAN PEDRO','ISIDRO ','MAMANI ','F','2002-09-29','s/dir',1,NULL),(16,'DIEGO','JANCO ','ACHO ','M','2002-09-30','s/dir',1,NULL),(17,'JUAN PEDRO','LOPEZ',' MAMANI ','M','2002-10-01','s/dir',1,NULL),(18,'ADAI ZULEMA','MAMANI ','SANCHEZ ','F','2002-10-02','s/dir',1,NULL),(19,'ALEX JHOEL','ORUÑO ','BUSTILLOS ','M','2002-10-03','s/dir',1,NULL),(20,'MICHELLE JHOVANA','PARI ','MAMANI ','F','2002-10-04','s/dir',1,NULL),(21,'SARA ANAHI','POMA ','CATARI ','F','2002-10-05','s/dir',1,NULL),(22,' VIDAL','POMA ','LOPEZ','M','2002-10-06','s/dir',1,NULL),(23,'NINEL','QUISPE ','CHINO ','F','2002-10-07','s/dir',1,NULL),(24,'EMILY ROUSS','QUISPE ','ROSA ','F','2002-10-08','s/dir',1,NULL),(25,'BAYORI BRIYET','SARZURI ','MAMANI ','F','2002-10-09','s/dir',1,NULL),(26,'CAMILA ANGELES','YUJRA ','RAMOS ','F','2002-10-10','s/dir',1,NULL),(27,'MELISSA','CHIPANA ','BRENDA ','F','2002-10-02','s/dir',1,NULL),(28,'ALVARO JHOSMAR','AQUINO ','MAMANI ','M','2002-10-03','s/dir',1,NULL),(29,'FLOR MARIZA','CASTILLO ','MAMANI ','F','2002-10-04','s/dir',1,NULL),(30,'YAMIL RICARDO','CAVIÑA ','FLORES ','M','2002-10-05','s/dir',1,NULL),(31,'HELEN CLARA','CHAMBI ','MARTINEZ ','F','2002-10-06','s/dir',1,NULL),(32,'BELCAN JOSUE','CHAVEZ ','CHOQUE ','M','2002-10-07','s/dir',1,NULL),(33,'ERIKA','ESCALANTE ','TANGARA ','F','2002-10-08','s/dir',1,NULL),(34,'MONICA','ESCALANTE ','TANGARA ','F','2002-10-09','s/dir',1,NULL),(35,'HECTOR BENJAMIN','FABIAN ','QUISBERTH ','M','2002-10-10','s/dir',1,NULL),(36,'GARI','FUENTES ','MUÑOZ ','M','2002-10-11','s/dir',1,NULL),(37,'ALIZON NOELIA','HERRERA ','CALLISAYA ','F','2002-10-12','s/dir',1,NULL),(38,'KEVIN','LAURA ','CHIPANA ','M','2002-10-13','s/dir',1,NULL),(39,'ROSAURA','LAURA ','FLORES ','F','2002-10-14','s/dir',1,NULL),(40,'MICHELLE','MARINO ','SOTO ','F','2002-10-15','s/dir',1,NULL),(41,'YUREM CARLOS','MITA ','ZUÑAGUA ','M','2002-10-16','s/dir',1,NULL),(42,'LUIS FERNANDO','NINA ','ILLANES ','M','2002-10-17','s/dir',1,NULL),(43,'MAYDA NASHIRA','OLGUIN ','LAZARO ','F','2002-10-18','s/dir',1,NULL),(44,'ALEJANDRO','POMA ','MAMANI ','M','2002-10-19','s/dir',1,NULL),(45,'OSCAR RICARDO','POMA ','TICONA ','M','2002-10-20','s/dir',1,NULL),(46,'ERLAN DAVID','QUESO ','CHOQUE ','M','2002-10-21','s/dir',1,NULL),(47,'CARLOS DANIEL','SELAEZ ','FERNANDEZ ','M','2002-10-22','s/dir',1,NULL),(48,'SHOLY ZHANAMA','VILLAVICENCIO ','SAINZ ','F','2002-10-23','s/dir',1,NULL),(49,'ZURIMANA','YUPANQUI ','BUSTILLO ','F','2002-10-24','s/dir',1,NULL),(50,'NARDA BELEN','ZUAZO ','BARRIONUEVO ','F','2002-10-25','s/dir',1,NULL),(51,'ZALET ROSIO','ZUAZO ','BARRIONUEVO ','F','2002-10-26','s/dir',1,NULL),(52,'EVA SELENA','BARRIONUEVO ','SURCO ','F','2002-10-02','s/dir',1,NULL),(53,'THAIS ARIANE','CALLE ','SACAMA ','F','2002-10-03','s/dir',1,NULL),(54,'EVO ALAN','CALLISAYA ','CARRASCO ','M','2002-10-04','s/dir',1,NULL),(55,'VIDAL','CHOQUE ','ZAMORA ','M','2002-10-05','s/dir',1,NULL),(56,'ANGELICA','CHOQUEHUANCA ','GUASINAVE ','F','2002-10-06','s/dir',1,NULL),(57,'TIAGO LEONEL','CONDORI ','HUARITA ','M','2002-10-07','s/dir',1,NULL),(58,'JUANA','FERNANDEZ ','HINOJOSA ','F','2002-10-08','s/dir',1,NULL),(59,'EVER MANUEL','GARCIA ','CUTIÑA ','M','2002-10-09','s/dir',1,NULL),(60,'CAMILA DIANA','HUANCA ','BALTAZAR ','F','2002-10-10','s/dir',1,NULL),(61,'ANAHI PAMELA','HUANCA ','QUISPE ','F','2002-10-11','s/dir',1,NULL),(62,'JESUS','LAURA ','HUAYCHO ','M','2002-10-12','s/dir',1,NULL),(63,'GUSTAVO','LIMACHI ','ACARAPI ','M','2002-10-13','s/dir',1,NULL),(64,'JHOSELIN','LOZA ','MAMANI ','F','2002-10-14','s/dir',1,NULL),(65,'FRANCY ARIEL','MAMANI ','APANQUI ','M','2002-10-15','s/dir',1,NULL),(66,'CLAUDIA NATALIA','MARAZ ','MOLLERICON ','F','2002-10-16','s/dir',1,NULL),(67,'NAYELI ALICIA','MARCA ','CHINO ','F','2002-10-17','s/dir',1,NULL),(68,'HERBERT DOMINIC','PACO ','ANTEQUERA ','M','2002-10-18','s/dir',1,NULL),(69,'JHERALDIN DANIELA','PACOSILLO ','APAZA ','F','2002-10-19','s/dir',1,NULL),(70,'JACQUELINE','PEREZ ','MAYTA ','F','2002-10-20','s/dir',1,NULL),(71,'JOSUE RODRIGO','QUEA  ','YUJRA ','M','2002-10-21','s/dir',1,NULL),(72,'GABRIELA','ROCHA ','SILES ','F','2002-10-22','s/dir',1,NULL),(73,'ANDRES OMAR','SUMI ','GUZMAN ','M','2002-10-23','s/dir',1,NULL),(74,'MIGUEL ISAIAS','SURCI ','CUTTY ','M','2002-10-24','s/dir',1,NULL),(75,'MARIELA','TAPIA ','HELGUERO ','F','2002-10-25','s/dir',1,NULL),(76,'ANNAHY ANNETT','ALDUNATE ','REYNAGA ','F','2002-10-02','s/dir',1,NULL),(77,'MIGUEL ANGEL','APAZA ','APAZA ','M','2002-10-03','s/dir',1,NULL),(78,'URIAS','APAZA ','NINA ','M','2002-10-04','s/dir',1,NULL),(79,'JESSICA TATIANA','CAHUAYA ','CUMARA ','F','2002-10-05','s/dir',1,NULL),(80,'MAYRA VALERY','CHOQUE ','GUTIERREZ ','F','2002-10-06','s/dir',1,NULL),(81,'LIZVANIA','CHOQUE ','RAMIREZ ','F','2002-10-07','s/dir',1,NULL),(82,'MAYA KANTUTA','CONDORI ','APAZA ','F','2002-10-08','s/dir',1,NULL),(83,'WARA','CONDORI ','CATUNTA ','F','2002-10-09','s/dir',1,NULL),(84,'DARIO MILTON','CORINA ','LOPEZ ','M','2002-10-10','s/dir',1,NULL),(85,'JOSUE','ESCARZO ','CHOQUE ','M','2002-10-11','s/dir',1,NULL),(86,' NARDY','GUTIERREZ ','HUMEREZ','F','2002-10-12','s/dir',1,NULL),(87,'MILTON','MAMANI ','GONZALES ','M','2002-10-13','s/dir',1,NULL),(88,'NATALIA SILVIA','MEDINA ','CONDORI ','F','2002-10-14','s/dir',1,NULL),(89,'LESLY ESTEFANY','MIRANDA ','ZAMORA ','F','2002-10-15','s/dir',1,NULL),(90,'HUGO JHONATAN','PILLCO ','VILLALBA ','M','2002-10-16','s/dir',1,NULL),(91,'RESCHEL MISHEL','QUENTA ','PEREZ ','F','2002-10-17','s/dir',1,NULL),(92,'ROSALIA','QUISPE ','ARANCIBIA ','F','2002-10-18','s/dir',1,NULL),(93,'JESUS ANGEL','QUISPE ','BLANCO ','M','2002-10-19','s/dir',1,NULL),(94,'MIGUEL','QUISPE ','CAZAS ','M','2002-10-20','s/dir',1,NULL),(95,'JAVIER OSCAR','QUISPE ','QUINTANA ','M','2002-10-21','s/dir',1,NULL),(96,'CAROL ANDREA','ROQUE ','TARQUI ','F','2002-10-22','s/dir',1,NULL),(97,'MISHEL BRENDA','SALAS ','CARRILLO ','F','2002-10-23','s/dir',1,NULL),(98,'EDDY JHOSMAR','SALGADO ','POMA ','M','2002-10-24','s/dir',1,NULL),(99,'XIMENA','TOPOCO ','CEREZO ','F','2002-10-25','s/dir',1,NULL),(100,'KEVIN JHAMIL','VALERO ','CHAMBI ','M','2002-10-26','s/dir',1,NULL),(101,'JUAN JOSE','VASQUEZ ','BAUTISTA ','M','2002-10-27','s/dir',1,NULL),(102,'JOSE MIGUEL','ACARAPI ','PAUCARA ','M','2002-10-02','s/dir',1,NULL),(103,'NILO JOSUE','ARIZACA ','LAYMICUSI ','M','2002-10-03','s/dir',1,NULL),(104,'JOSUE GUSTAVO','BOSTENCIO ','QUISPE ','M','2002-10-04','s/dir',1,NULL),(105,'ALVARO FRANZ','CALLISAYA ','ALEJO ','M','2002-10-05','s/dir',1,NULL),(106,'NAYLA ADELA','CAYLLANTE ','PILLCO ','F','2002-10-06','s/dir',1,NULL),(107,'RICHARD','CHIPANA ','QUISPE ','M','2002-10-07','s/dir',1,NULL),(108,'ZINDEL KEYLA','CHOQUE ','CUSSI ','F','2002-10-08','s/dir',1,NULL),(109,'SELENE ','FERNANDEZ ','PARIGUANA ','F','2002-10-09','s/dir',1,NULL),(110,'HERNAN AUGUSTO','HUANCA ','SOLANO ','M','2002-10-10','s/dir',1,NULL),(111,'EVA LEYDI','HUARACHI ','ROJAS ','F','2002-10-11','s/dir',1,NULL),(112,'TAKESHY','MAMANI ','MAMANI ','M','2002-10-12','s/dir',1,NULL),(113,'JHAVELY CIELO','MAMANI ','MIRANDA ','F','2002-10-13','s/dir',1,NULL),(114,'JHOEL BRAYAN','MAMANI ','MOLLO ','M','2002-10-14','s/dir',1,NULL),(115,'MILENKA ISABEL','MEJIA ','COLQUE ','F','2002-10-15','s/dir',1,NULL),(116,'NAOMI ABIGAIL','MENDOZA ','SILVA ','F','2002-10-16','s/dir',1,NULL),(117,'WILDER','ORUÑO ','ORTEGA ','M','2002-10-17','s/dir',1,NULL),(118,'JUDITH VERONICA','POMA ','LIMACHI ','F','2002-10-18','s/dir',1,NULL),(119,'EDDY BRAYAN','QUISPE ','MAMANI ','M','2002-10-19','s/dir',1,NULL),(120,'ROSA ISELA','REDONDO ','CHOQUE ','F','2002-10-20','s/dir',1,NULL),(121,'MARCOS OLIVER','SIÑANI ','HURTADO ','M','2002-10-21','s/dir',1,NULL),(122,'RICHAR','TENORIO ','FERNANDEZ ','M','2002-10-22','s/dir',1,NULL),(123,'JONATHAN','TICONA ','FLORES ','M','2002-10-23','s/dir',1,NULL),(124,'BRANDON REMY','TRUJILLO ','MACHICADO ','M','2002-10-24','s/dir',1,NULL),(125,' NIUTON RICARDO','VILLCA ','CUTILE','M','2002-10-25','s/dir',1,NULL),(126,'DAYANA CRISTINA','YUCRA ','CHUQUIMIA ','F','2002-10-26','s/dir',1,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `kardex` */

insert  into `kardex`(`id_kardex`,`reset`,`gestion`,`id_rude`,`estado`,`id_curso`,`id_asesor`) values (1,0,2018,1,NULL,1,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`nombre_usuario`,`password`,`estado`,`id_rol`) values (1,'admin','$2y$10$YI9C55vOApfscCBpGVn5iObXDmCfwyj6BFuJY66n3dDtkW3ATlSVK',1,1),(2,'LEONARDA','10001',1,2),(3,'VICTORIA ','10002',1,2),(4,'PATRICIA ','10003',1,2),(5,'VICENTA  ','10004',1,2),(6,'LIDIA ','10005',1,2),(7,'FLORENCIA','10006',1,2),(8,'RUBEN ','10007',1,2),(9,'ELISEO','10008',1,2),(10,'EMBLY ','10009',1,2),(11,'GLADYS ','10010',1,2),(12,'MARIBEL ','10011',1,2),(13,'DORA','10012',1,2),(14,'VICTOR ','10013',1,2),(15,'CUPERTINA','10014',1,2),(16,'MARTHA ','10015',1,2),(17,'EULALIA ','10016',1,2),(18,'ISAAC ','10017',1,2),(19,'EDGAR','10018',1,2),(20,'DOMITILA ','10019',1,2),(21,'EFRAIN ','10020',1,2),(22,'CARMEN ','10021',1,2),(23,'MIRIAM','10022',1,2),(24,'LILY ','10023',1,2),(25,'GABRIELA ','10024',1,2),(26,'KEMPER ','10025',1,2),(27,'ESTEBAN ','10026',1,2),(28,'ROSENDO','10027',1,2),(29,'ROSMERY ','10028',1,2),(30,'CESAR','10029',1,2),(31,'SANDRA','10030',1,2),(32,'CLIMACO ','10031',1,2),(33,'ELOY ','10032',1,2),(34,'AQUILINO ','10033',1,2),(35,'JUAN ','10034',1,2),(36,'JAIME ','10035',1,2),(37,'MARIA ','10036',1,2),(38,'VIRGINIA ','10037',1,2),(39,'FILFREDO','10038',1,2),(40,'ENCARNACIÓN ','10039',1,2),(41,'ALARCON','10040',1,2),(42,'FELICIANO ','10041',1,2),(43,'DOLORES ','10042',1,2),(44,'FLORA ','10043',1,2),(45,'JOSE ','10044',1,2);

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
