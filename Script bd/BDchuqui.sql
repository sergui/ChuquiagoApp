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
) ENGINE=InnoDB AUTO_INCREMENT=266 DEFAULT CHARSET=utf8;

/*Data for the table `estudiante` */

insert  into `estudiante`(`id_rude`,`nombre`,`paterno`,`materno`,`sexo`,`fecha_nac`,`domicilio`,`estado`,`id_user`) values (1,'SUSANA','LEON ','MARCIA','F','2002-09-15','s/dir',1,NULL),(2,'CESAR','ARROYO','MAMANI','M','2002-09-16','s/dir',1,NULL),(3,'MISHEL ARACELY','BALBOA ','MAMANI','F','2002-09-17','s/dir',1,NULL),(4,'LEYDI LOYDA','CASILLA ','CHIAPANA ','F','2002-09-18','s/dir',1,NULL),(5,'LUIS ALEJANDRO','CONDORI ','ARENAS ','M','2002-09-19','s/dir',1,NULL),(6,'ARACELY ARLETH','CONDORI ','LOZA ','M','2002-09-20','s/dir',1,NULL),(7,'WILLAMS JHAMIL','GARCIA ','CUTIÑA ','F','2002-09-21','s/dir',1,NULL),(8,'RAUL','GAVINCHA ','URUÑO ','M','2002-09-22','s/dir',1,NULL),(9,'LITZY MELANI','GUTIERREZ ','QUISPE ','M','2002-09-23','s/dir',1,NULL),(10,'EDISON','MACHACA ','TOLA ','F','2002-09-24','s/dir',1,NULL),(11,'INTI YARI','MAMANI ','LIMACHI ','M','2002-09-25','s/dir',1,NULL),(12,'MARIBEL','PAREDEZ ','CHAMBI ','M','2002-09-26','s/dir',1,NULL),(13,'RUTH GABRIELA','POMA ','CALLE ','F','2002-09-27','s/dir',1,NULL),(14,'WILDER MARIO','QUISPE ','CONDE ','F','2002-09-28','s/dir',1,NULL),(15,'DAISY ALEXANDRA','RAFAEL ','SOTO ','F','2002-09-29','s/dir',1,NULL),(16,'BRITANY SCARLET','RAMOS ','YUJRA ','F','2002-09-30','s/dir',1,NULL),(17,'KEVIN ALEJANDRO','SALGUEIRO ','LIMACHI ','M','2002-10-01','s/dir',1,NULL),(18,'MAURICIO JUSTO','TAPIA ','HELGUERO ','M','2002-10-02','s/dir',1,NULL),(19,'ALISSON','TINTA ','TINTA ','F','2002-10-03','s/dir',1,NULL),(20,'FRANZ','TOLA ','ADUVIRI ','M','2002-10-04','s/dir',1,NULL),(21,'ERIKA','TOLA ','CALLE ','F','2002-10-05','s/dir',1,NULL),(22,'KEVIN OMAR','VARGAS ','MARIN ','M','2002-10-06','s/dir',1,NULL),(23,'ADRIANA','YUJRA ','CAMACHO ','F','2002-10-07','s/dir',1,NULL),(24,'BEIMAR YAMIL ','ROJAS ','PAUCARA ','M','2002-10-08','s/dir',1,NULL),(25,'DAYSSI EDELMIRA','SIÑANI ','','F','2002-09-15','s/dir',1,NULL),(26,'MAURO LUIS','ASISTIRI ','TICONA ','M','2002-09-16','s/dir',1,NULL),(27,'FLOR CAMILA','CADENA ','QUISBERT ','F','2002-09-17','s/dir',1,NULL),(28,'HELEN VANESSA','CHARCA ','MAMANI ','F','2002-09-18','s/dir',1,NULL),(29,'ARIEL','CHOQUE ','LUPA ','M','2002-09-19','s/dir',1,NULL),(30,'EDSON YHAMIL','CHUQUIMIA ','QUISPE ','M','2002-09-20','s/dir',1,NULL),(31,'MARIA CAROLINA','CHURATA ','CONDORI ','F','2002-09-21','s/dir',1,NULL),(32,'JHOHANA','COPA ','CALCINA ','F','2002-09-22','s/dir',1,NULL),(33,'JHERMY ELLISSON','CUENTAS',' RAMOS ','M','2002-09-23','s/dir',1,NULL),(34,'HEBERT','FUENTES',' MUÑOZ ','M','2002-09-24','s/dir',1,NULL),(35,'JHANNIRA','HUAYCHO ','FERNANDEZ ','F','2002-09-25','s/dir',1,NULL),(36,'YOBANA','KASA ','ARCANI ','F','2002-09-26','s/dir',1,NULL),(37,'ALINA JHANETH','LLANQUI',' MEQUI ','F','2002-09-27','s/dir',1,NULL),(38,'DAVID JUAN','MACHACA',' APAZA ','M','2002-09-28','s/dir',1,NULL),(39,'DAVID','MAMANI ','CAZAS ','M','2002-09-29','s/dir',1,NULL),(40,'YHAIR ALEXIS','MAMANI ','QUISPE ','M','2002-09-30','s/dir',1,NULL),(41,'CLAUDIA','MARIACA ','CHOQUE ','F','2002-10-01','s/dir',1,NULL),(42,'JEFFERSON ERNESTO','MENA ','FLORES ','M','2002-10-02','s/dir',1,NULL),(43,'ROGELIO','PAIRUMANI ','GUTIERREZ ','M','2002-10-03','s/dir',1,NULL),(44,'WILSON WILLIAM','PRADO ','MAMANI ','M','2002-10-04','s/dir',1,NULL),(45,'JUAN ESTEBAN','QUISPE ','FERNANDEZ ','M','2002-10-05','s/dir',1,NULL),(46,'FERNANDO','SULLCA ','CONDORI ','M','2002-10-06','s/dir',1,NULL),(47,'BRAYAN GERALD','SUNTURA ','MOLLO ','M','2002-10-07','s/dir',1,NULL),(48,'JUAN ARON','TOLA ','QUINTANILLA ','M','2002-10-08','s/dir',1,NULL),(49,'LINETH NATIVIDAD','VARGAS',' QUISPE ','F','2002-10-09','s/dir',1,NULL),(50,'JOSE MANUEL','MAMANI ','CACHI ','M','2002-10-10','s/dir',1,NULL),(51,'URIAS','APAZA ','NINA ','M','2002-10-11','s/dir',1,NULL),(52,'SEBASTIAN','APAZA',' EVER ','M','2002-09-15','s/dir',1,NULL),(53,'JHONNY','AJLLAHUANCA ','PAUCARA ','M','2002-09-16','s/dir',1,NULL),(54,'MARIA DEL CARMEN POLET','ALA ','VERA ','F','2002-09-17','s/dir',1,NULL),(55,'YESSICA','BLANCO',' MENDOZA ','F','2002-09-18','s/dir',1,NULL),(56,'EDSON DANIEL','CALSINA ','LAZO ','M','2002-09-19','s/dir',1,NULL),(57,'WENDY NAYELI','CHOCAMANI ','GUTIERREZ ','F','2002-09-20','s/dir',1,NULL),(58,'ADRIANA BELEN','COLQUE ','FLORES ','F','2002-09-21','s/dir',1,NULL),(59,'ANDY','CONDORI',' LARICO ','M','2002-09-22','s/dir',1,NULL),(60,'JOEL JORDAN','CONDORI ','MAMANI ','M','2002-09-23','s/dir',1,NULL),(61,' JHONNY IVAN','FERNANDEZ ','CHAMBI','M','2002-09-24','s/dir',1,NULL),(62,'JHOEL ERWIN','FERNANDEZ ','TICONA ','M','2002-09-25','s/dir',1,NULL),(63,'ALONDRA LUZ','GALLARDO ','TICONA ','F','2002-09-26','s/dir',1,NULL),(64,'DANIEL','GUTIERREZ ','ANGULO ','M','2002-09-27','s/dir',1,NULL),(65,'JHON FERNANDO','GUTIERREZ ','FERNANDEZ ','M','2002-09-28','s/dir',1,NULL),(66,'FRANCY ARIEL','MAMANI ','APANQUI ','M','2002-09-29','s/dir',1,NULL),(67,'ARIEL','MAMANI ','ARUQUIPA ','M','2002-09-30','s/dir',1,NULL),(68,'DANNER','MAMANI ','HUARANCA ','M','2002-10-01','s/dir',1,NULL),(69,'JHON MAYCOL','MERCADO ','MACHICADO ','M','2002-10-02','s/dir',1,NULL),(70,'SHARAY STEFFANY','QUISBERT ','GIRONDA ','F','2002-10-03','s/dir',1,NULL),(71,'MARY LUZ','QUISPE ','FLORES ','F','2002-10-04','s/dir',1,NULL),(72,'RONALD','ROCHA ','CONTRERAS ','M','2002-10-05','s/dir',1,NULL),(73,'PABLO AROLDO','TEJERINA ','RIVERO ','M','2002-10-06','s/dir',1,NULL),(74,'OLGINA','TICONA',' CONDORI ','F','2002-10-07','s/dir',1,NULL),(75,'NAYELI BETSABE','TICONA ','PORTUGAL ','F','2002-10-08','s/dir',1,NULL),(76,'ANDREA NOEMI','VERA ','LOPEZ ','F','2002-10-09','s/dir',1,NULL),(77,'NATALY GABRIELA','VILLCA',' CUTILE ','F','2002-10-10','s/dir',1,NULL),(78,'EMILI LUCIA','ACERO',' LAURA ','F','2002-09-15','s/dir',1,NULL),(79,'LUIS FERNANDO','APAZA ','MACUCHAPI ','M','2002-09-16','s/dir',1,NULL),(80,'JHOSELYN MARIELA','CALDERON ','RODRIGUEZ ','F','2002-09-17','s/dir',1,NULL),(81,'CRISTIAN','CANO ','MAMANI ','M','2002-09-18','s/dir',1,NULL),(82,'TANIA','CHOQUE',' MITA ','F','2002-09-19','s/dir',1,NULL),(83,'AYDEE','CRUZ ','CONDORI ','F','2002-09-20','s/dir',1,NULL),(84,'BETHZABE ALIZON','ENCINAS ','TORREZ ','F','2002-09-21','s/dir',1,NULL),(85,' RUDDY','ESPINOZA',' GOMEZ','M','2002-09-22','s/dir',1,NULL),(86,'JOSE CARLOS','FERNANDEZ',' QUISPE ','M','2002-09-23','s/dir',1,NULL),(87,'DARWIN GEORGE','HUALLPA ','RAMOS ','M','2002-09-24','s/dir',1,NULL),(88,'LEIDY LAURA','LIMACHI ','ROMERO ','F','2002-09-25','s/dir',1,NULL),(89,' IVAN','MAMANI ','QUISPE','M','2002-09-26','s/dir',1,NULL),(90,'BRAYAN','MAYTA ','VELASQUEZ ','M','2002-09-27','s/dir',1,NULL),(91,' ROLY','NINA ','LAURA','M','2002-09-28','s/dir',1,NULL),(92,'YERCO NELSON','QUISPE ','ARUQUIPA ','M','2002-09-29','s/dir',1,NULL),(93,' DEYSI VICTORIA','REDONDO ','CHOQUE','F','2002-09-30','s/dir',1,NULL),(94,' CRISTIAN OLIVER','RIOS ','GREGORIO','M','2002-10-01','s/dir',1,NULL),(95,' CARLOS DANIEL','SELAEZ',' FERNANDEZ','M','2002-10-02','s/dir',1,NULL),(96,'JONATAN','SILES ','VALDEZ ','M','2002-10-03','s/dir',1,NULL),(97,'ANAYELY','SILVA ','QUISPE ','F','2002-10-04','s/dir',1,NULL),(98,' MELANY DEYNA','SOZA ','NINA','F','2002-10-05','s/dir',1,NULL),(99,'JONATHAN','TICONA',' FLORES ','M','2002-10-06','s/dir',1,NULL),(100,'LAURA','VARGAS ','QUISPE ','F','2002-10-07','s/dir',1,NULL),(101,'LUZ ALBA','ZELADA ','PEREZ ','F','2002-10-08','s/dir',1,NULL),(102,'JUAN CARLOS','ROJAS',' ROJAS ','M','2002-10-09','s/dir',1,NULL),(103,' ARNOLD MIJAIL','ALA ','VALLEJOS','M','2002-09-15','s/dir',1,NULL),(104,' LUZ BRISEIDA','ARAPI',' AGUAYO','F','2002-09-16','s/dir',1,NULL),(105,' SANDRO','BARRERA ','QUISPE','M','2002-09-17','s/dir',1,NULL),(106,' ROCIO','CACHACA ','MARCA','F','2002-09-18','s/dir',1,NULL),(107,'VANESSA','CAMPOS ','ADUVIRI ','F','2002-09-19','s/dir',1,NULL),(108,'SHIRLEY DANIELA','CHOQUE ','ARUQUIPA ','F','2002-09-20','s/dir',1,NULL),(109,' YOHNS BEYMAR','COLQUE ','QUIQUISANI','M','2002-09-21','s/dir',1,NULL),(110,'CRISTIAN','CONDORI ','LEQUIPE ','M','2002-09-22','s/dir',1,NULL),(111,'SINDEL BELEN','ESCOBAR ','COPA ','F','2002-09-23','s/dir',1,NULL),(112,'CRISTIAN JOSE','HUAYNOCA',' ADUVIRI ','M','2002-09-24','s/dir',1,NULL),(113,'DILAN SAMUEL','LAURA ','QUISPE ','M','2002-09-25','s/dir',1,NULL),(114,'BORIS SEBASTIAN','MACHACA ','QUISPE ','M','2002-09-26','s/dir',1,NULL),(115,'VIDAL','MAMANI ','ARUQUIPA ','M','2002-09-27','s/dir',1,NULL),(116,'SANDRO DANIEL','MAMANI ','ZARATE ','M','2002-09-28','s/dir',1,NULL),(117,' ALEX','MAYTA',' HUANCA','M','2002-09-29','s/dir',1,NULL),(118,' DEYSI GISELA','PACO',' MEJIA','F','2002-09-30','s/dir',1,NULL),(119,'ESTEFANI YESICA','PACORICO',' TORREZ ','F','2002-10-01','s/dir',1,NULL),(120,' WILLIAM FERNANDO','RAMOS ','VILLCA','M','2002-10-02','s/dir',1,NULL),(121,'DARLING JASMINA','ROJAS ','FLORES ','F','2002-10-03','s/dir',1,NULL),(122,' LIZEYDA CLARA','RUIZ ','NINA','F','2002-10-04','s/dir',1,NULL),(123,' JHONATAN HENRY','SANCHEZ',' QUISBERT','M','2002-10-05','s/dir',1,NULL),(124,'MARCO ANTONIO','TICONA ','CHOQUE ','M','2002-10-06','s/dir',1,NULL),(125,'CARLOS DANIEL','TRUJILLO',' PEÑA ','M','2002-10-07','s/dir',1,NULL),(126,'YESSICA EULALIA','VALLE',' SALGADO ','F','2002-10-08','s/dir',1,NULL),(127,'NINET GABRIELA','ZARATE ','BUSTAMANTE ','F','2002-10-09','s/dir',1,NULL),(128,'SOLEDAD','QUISPE ','ERIKA ','F','2002-09-15','s/dir',1,NULL),(129,'NAYA CRISTINA','AGUAYO',' PALACIOS ','F','2002-09-16','s/dir',1,NULL),(130,'CRISTIAN GUSTAVO','ARRASCAITA',' CHOQUE ','M','2002-09-17','s/dir',1,NULL),(131,' YOSELIN','CABIÑA ','TAMBO','F','2002-09-18','s/dir',1,NULL),(132,'DANIELA ALEJANDRA','CAHUAYA',' RAMOS ','F','2002-09-19','s/dir',1,NULL),(133,'KEVIN','CHOQUE ','RAMOS ','M','2002-09-20','s/dir',1,NULL),(134,'JHOEL DHEYMAR','CHOQUE ','ROJAS ','M','2002-09-21','s/dir',1,NULL),(135,' MICHELL CRISTAL','CONDORI',' GUACHALLA','F','2002-09-22','s/dir',1,NULL),(136,'ANGELES MARELI','CONDORI ','PATZI ','F','2002-09-23','s/dir',1,NULL),(137,'JHOSELIN','CORI ','TORREZ ','F','2002-09-24','s/dir',1,NULL),(138,' ABRAHAM','CRUZ ','HILARI','M','2002-09-25','s/dir',1,NULL),(139,' JOSE LUIS','DIAZ',' MAMANI','M','2002-09-26','s/dir',1,NULL),(140,'ROBERTO CARLOS','ESCALANTE',' TANGARA ','M','2002-09-27','s/dir',1,NULL),(141,'NICOLLE MARGARITA','FERNANDEZ ','CALLISAYA ','F','2002-09-28','s/dir',1,NULL),(142,' JHAMILA MAGDALENA','HUALLPA ','RAMOS','F','2002-09-29','s/dir',1,NULL),(143,'LUIS FERNANDO','LIMACHI ','ACARAPI ','M','2002-09-30','s/dir',1,NULL),(144,' DEYVID BERNABE','LIMACHI ','MAMANI','M','2002-10-01','s/dir',1,NULL),(145,' LIMBER','MAMANI ','CALLOCOSI','M','2002-10-02','s/dir',1,NULL),(146,' ALAN','MAMANI ','LIMACHI','M','2002-10-03','s/dir',1,NULL),(147,'GARY EMANUEL','MAMANI ','TANCARA ','M','2002-10-04','s/dir',1,NULL),(148,'ANA ISABEL','MAYTA',' QUISPE ','F','2002-10-05','s/dir',1,NULL),(149,'CRISTHIAN ALVARO','NUÑEZ',' TICONA ','M','2002-10-06','s/dir',1,NULL),(150,'LUCY REYNA','PANKA ','LIMACHI ','F','2002-10-07','s/dir',1,NULL),(151,' GABRIEL','QUISPE ','CAZAS','M','2002-10-08','s/dir',1,NULL),(152,'CRISTHIAN JESUS','SALGADO ','QUISPE ','M','2002-10-09','s/dir',1,NULL),(153,'GABRIELA','TARQUI ','GUTIERREZ ','F','2002-10-10','s/dir',1,NULL),(154,'MIRIAM ROCIO','TARQUIOLA',' MAMANI ','F','2002-10-11','s/dir',1,NULL),(155,' CLARIBEL','TRUJILLO ','QUISPE','F','2002-10-12','s/dir',1,NULL),(156,' RODRIGO','LOZA ','BEYMAR','M','2002-09-27','s/dir',1,NULL),(157,'ANGEL','PATZY ','GABRIEL ','M','2002-09-28','s/dir',1,NULL),(158,'TOMI YAMEL','ACHO ','ACARAPI ','M','2002-09-29','s/dir',1,NULL),(159,'ABIGAIL MARIANA','ALARCON',' MAMANI ','F','2002-09-30','s/dir',1,NULL),(160,'LUIS MIGUEL','CHINO ','SARZURI ','M','2002-10-01','s/dir',1,NULL),(161,'ALIZON KAREN','CHUQUIMIA ','HUANCA ','F','2002-10-02','s/dir',1,NULL),(162,'NILDA PAMELA','CHURA ','CRUZ ','F','2002-10-03','s/dir',1,NULL),(163,'ALEM WILLIAMS','COLQUE ','MAMANI ','M','2002-10-04','s/dir',1,NULL),(164,'YESSICA','CRUZ ','MAGNANI ','F','2002-10-05','s/dir',1,NULL),(165,'VANESSA','FLORES',' ILLANES ','F','2002-10-06','s/dir',1,NULL),(166,'JHON ALEXANDER','GARCIA',' GUARACHI ','M','2002-10-07','s/dir',1,NULL),(167,'ERIKA','GOMEZ ','GUTIERREZ ','F','2002-10-08','s/dir',1,NULL),(168,'RENE ALVARO','HUANCA ','RAMOS ','M','2002-10-09','s/dir',1,NULL),(169,'KAY BRAYAN','LEAÑO ','HINOJOSA ','M','2002-10-10','s/dir',1,NULL),(170,'LUZ BELEN','LEAÑO ','HINOJOSA ','F','2002-10-11','s/dir',1,NULL),(171,'ANGELA ARACELY','MACHICADO',' MAMANI ','F','2002-10-12','s/dir',1,NULL),(172,'ESTEFANY','MACHICADO',' VILLCA ','F','2002-10-13','s/dir',1,NULL),(173,'NAYELI','MAMANI',' APAZA ','F','2002-10-14','s/dir',1,NULL),(174,' RUBEN ANGEL','MAMANI ','CHILLO','M','2002-10-15','s/dir',1,NULL),(175,'BRAYAN','MOLINA',' CHAPETON ','M','2002-10-16','s/dir',1,NULL),(176,' NEYSA CAMILA','ROCHA ','SILES','F','2002-10-17','s/dir',1,NULL),(177,'JESSICA','SULLCA',' CONDORI ','F','2002-10-18','s/dir',1,NULL),(178,'JERALDYNE MIKAELA','SUMA',' GUTIERREZ ','F','2002-10-19','s/dir',1,NULL),(179,'MICAELA','SUMI',' SOLARES ','F','2002-10-20','s/dir',1,NULL),(180,' JOSE ANTONIO','TAPIA ','MUCHIA','M','2002-10-21','s/dir',1,NULL),(181,'EDITH ESMERALDA','TORREZ ','LOPEZ ','F','2002-10-22','s/dir',1,NULL),(182,'KARLA MELANY','TRUJILLO ','PEÑA ','F','2002-10-23','s/dir',1,NULL),(183,'EDWIN LUIS','VARGAS ','MUAYHUA ','M','2002-10-24','s/dir',1,NULL),(184,' DAMARIS','FLORES',' NOHELY','F','2002-10-22','s/dir',1,NULL),(185,' MARIGEL PAOLA','CALLE',' MAMANI','F','2002-10-23','s/dir',1,NULL),(186,' BRAYAM ITAMAR','CALLEX ','CHIAPANA','M','2002-10-24','s/dir',1,NULL),(187,' ROXANA','CHOQUE ','CAHUAYA','F','2002-10-25','s/dir',1,NULL),(188,'MARCOS','CHOQUE',' GOMEZ ','M','2002-10-26','s/dir',1,NULL),(189,'CRISTHIAN','CRUZ',' ILLANES ','M','2002-10-27','s/dir',1,NULL),(190,' MAURICIO ISMAEL','FABIAN ','QUISBERTH','M','2002-10-28','s/dir',1,NULL),(191,' ELIANA LIDIA','FERNANDEZ ','TICONA','F','2002-10-29','s/dir',1,NULL),(192,' JORGE LUIS','FLORES ','RODRIGUEZ','M','2002-10-30','s/dir',1,NULL),(193,' ISRAEL','FLORES ','TINTA','M','2002-10-31','s/dir',1,NULL),(194,'EDDY SERGIO','HUANCA ','QUISPE ','M','2002-11-01','s/dir',1,NULL),(195,'GUADALUPE','LAURA ','BUSTILLOS ','F','2002-11-02','s/dir',1,NULL),(196,'JIMENA','LOPEZ',' PILLCO ','F','2002-11-03','s/dir',1,NULL),(197,'RONALD','LOPEZ ','PILLCO ','M','2002-11-04','s/dir',1,NULL),(198,'JESUSA','MAMANI ','CARLO ','F','2002-11-05','s/dir',1,NULL),(199,'SAMUEL','MARIN',' VILLCA ','M','2002-11-06','s/dir',1,NULL),(200,' LENDI PAMELA','MATHA ','POSTENCIO','F','2002-11-07','s/dir',1,NULL),(201,'EMILSEN MARIA','MEDINA ','MANO ','F','2002-11-08','s/dir',1,NULL),(202,'GABRIELA WENDY','MITA ','VELASCO ','F','2002-11-09','s/dir',1,NULL),(203,' NAYELY','MUJICA ','SURCO','F','2002-11-10','s/dir',1,NULL),(204,' MIRIAM','QUIQUISANI ','MAMANI','F','2002-11-11','s/dir',1,NULL),(205,'BEIMAR DAVID','QUISPE',' APAZA ','M','2002-11-12','s/dir',1,NULL),(206,' DIANA NAYDA','RUIZ ','NINA','F','2002-11-13','s/dir',1,NULL),(207,'JHAZMIN FERNANDA','RUIZ ','PATZY ','F','2002-11-14','s/dir',1,NULL),(208,' JOSUE ALVARO','SAIRE',' ALEJO','M','2002-11-15','s/dir',1,NULL),(209,'SANDRA GABRIELA','SIÑANI',' RIOS ','F','2002-11-16','s/dir',1,NULL),(210,' LUIS ALFREDO','TOLA ','GONZALES','M','2002-11-17','s/dir',1,NULL),(211,'DANIELA','VARGAS ','QUISPE ','F','2002-11-18','s/dir',1,NULL),(212,'JHONNY','YALARO',' CONDORI ','M','2002-11-19','s/dir',1,NULL),(213,'CARLA WENDY','ACARAPI ','APAZA ','F','2002-11-19','s/dir',1,NULL),(214,'ROSA GUADALUPE','APAZA',' MAMANI ','F','2002-11-20','s/dir',1,NULL),(215,'MARIELA DIANA','ARUQUIPA',' LIMA ','F','2002-11-21','s/dir',1,NULL),(216,'EVA','BUSTILLOS ','MAYTA ','F','2002-11-22','s/dir',1,NULL),(217,'KAREN NAYELI','CALLE ','PARIAPAZA ','F','2002-11-23','s/dir',1,NULL),(218,'ANDREA','CALLISAYA ','MITA ','F','2002-11-24','s/dir',1,NULL),(219,'JOEL','CAMPOS',' PINEDO ','M','2002-11-25','s/dir',1,NULL),(220,'ANAHI','CHIPANA ','LIFONSO ','F','2002-11-26','s/dir',1,NULL),(221,'JHELEN CIELO','COLQUE ','COCARICO ','F','2002-11-27','s/dir',1,NULL),(222,'MAYCOL GONZALO','CONDORI ','ACERO ','M','2002-11-28','s/dir',1,NULL),(223,'CRISTINA','EREDIA ','TAPIA ','F','2002-11-29','s/dir',1,NULL),(224,'RODRIGO','GAVINCHA',' URUÑO ','M','2002-11-30','s/dir',1,NULL),(225,'JESUS FELICIANO','MAMANI ','CHILLO ','M','2002-12-01','s/dir',1,NULL),(226,'WILSON WILDER','MAMANI ','FLORES ','M','2002-12-02','s/dir',1,NULL),(227,' JENNY','MAMANI ','MAMANI','F','2002-12-03','s/dir',1,NULL),(228,'KATHIA RAQUEL','MAMANI ','QUISPE ','F','2002-12-04','s/dir',1,NULL),(229,'TELMA ALEJANDRA','PAREDES ','MAMANI ','F','2002-12-05','s/dir',1,NULL),(230,' HUGO','QUISPE',' CHINO','M','2002-12-06','s/dir',1,NULL),(231,' LISETTE KAREN','QUISPE ','HUAYNOCA','F','2002-12-07','s/dir',1,NULL),(232,'ROLY YOLVIN','QUISPE',' LIMACO ','M','2002-12-08','s/dir',1,NULL),(233,'JESICA','QUISPE',' MACHACA ','F','2002-12-09','s/dir',1,NULL),(234,'JORGE RICARDO','QUISPE',' SULLCANI ','M','2002-12-10','s/dir',1,NULL),(235,'XIMENA','ROQUE ','TARQUI ','F','2002-12-11','s/dir',1,NULL),(236,' GUIDO','SARAVIA ','FLORES','M','2002-12-12','s/dir',1,NULL),(237,'BRAYAN','TOLA ','FERNANDEZ ','M','2002-12-13','s/dir',1,NULL),(238,'KATERINE ROSA','VALDEZ ','CONDORI ','F','2002-12-14','s/dir',1,NULL),(239,'SURIMANA','VALENCIA ','ALARCON ','F','2002-12-15','s/dir',1,NULL),(240,' ALEX RODRIGO','VERA ','CHOQUE','M','2002-12-16','s/dir',1,NULL),(241,'KARLA','YAPUCHURA',' CANAVIRI ','F','2002-12-17','s/dir',1,NULL),(242,'CRISELDA','FLORES ','TITO MIRIAN ','F','2002-12-18','s/dir',1,NULL),(243,' NANCY','MAMANI','','F','2002-12-18','s/dir',1,NULL),(244,' JHOSEP','ARUQUIPA',' SULLCANI','M','2002-12-18','s/dir',1,NULL),(245,'NOELIA','CALLE',' MAMANI ','F','2002-12-18','s/dir',1,NULL),(246,' MARIBEL FABIOLA','CASAS',' AMARU','F','2002-12-18','s/dir',1,NULL),(247,'DAVID','CASILLA',' CHIPANA ','M','2002-12-18','s/dir',1,NULL),(248,' DANIEL PEDRO','CHALLCO ','YUJRA','M','2002-12-18','s/dir',1,NULL),(249,'GIMBER','CONDORI ','CATUNTA ','M','2002-12-18','s/dir',1,NULL),(250,'MELANY KAREN','CRUZ ','CONDORI ','F','2002-12-18','s/dir',1,NULL),(251,'JACQUELIN','CRUZ',' ILLANES ','F','2002-12-18','s/dir',1,NULL),(252,'WILDER','CUMARA ','CRUZ ','M','2002-12-18','s/dir',1,NULL),(253,'LISETH','GOMEZ',' CHINO ','F','2002-12-18','s/dir',1,NULL),(254,' GABRIELA','GUAQUI ','IBAÑEZ','F','2002-12-18','s/dir',1,NULL),(255,' DELIA','LIMACHI ','MAMANI','F','2002-12-18','s/dir',1,NULL),(256,'VIDAL PERCY','MAMANI ','FLORES ','M','2002-12-18','s/dir',1,NULL),(257,' IVAN GABRIEL','MAMANI ','TANCARA','M','2002-12-18','s/dir',1,NULL),(258,' CINTHIA RAQUEL','QUILLA',' MAYTA','F','2002-12-18','s/dir',1,NULL),(259,' JACQUELINNE PAMELA','QUIROGA ','SIÑANI','F','2002-12-18','s/dir',1,NULL),(260,'VANESA MILENCA','QUISPE ','CALLE ','F','2002-12-18','s/dir',1,NULL),(261,'ESTEFANY YOSELIN','QUISPE ','ORUÑO ','F','2002-12-18','s/dir',1,NULL),(262,'ISRAEL','ROCHA ','SILES ','M','2002-12-18','s/dir',1,NULL),(263,' GABRIELA ROCIO','ROJAS',' PAUCARA','F','2002-12-18','s/dir',1,NULL),(264,'CRISTIAN OLIVER','SANDOVAL',' VILLCA ','M','2002-12-18','s/dir',1,NULL),(265,'WILSON WILFREDO','TAMBOT ','TARQUI ','M','2002-12-18','s/dir',1,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=266 DEFAULT CHARSET=utf8;

/*Data for the table `kardex` */

insert  into `kardex`(`id_kardex`,`reset`,`gestion`,`id_rude`,`estado`,`id_curso`,`id_asesor`) values (1,0,2018,1,'1',1,NULL),(2,0,2018,2,'1',1,NULL),(3,0,2018,3,'1',1,NULL),(4,0,2018,4,'1',1,NULL),(5,0,2018,5,'1',1,NULL),(6,0,2018,6,'1',1,NULL),(7,0,2018,7,'1',1,NULL),(8,0,2018,8,'1',1,NULL),(9,0,2018,9,'1',1,NULL),(10,0,2018,10,'1',1,NULL),(11,0,2018,11,'1',1,NULL),(12,0,2018,12,'1',1,NULL),(13,0,2018,13,'1',1,NULL),(14,0,2018,14,'1',1,NULL),(15,0,2018,15,'1',1,NULL),(16,0,2018,16,'1',1,NULL),(17,0,2018,17,'1',1,NULL),(18,0,2018,18,'1',1,NULL),(19,0,2018,19,'1',1,NULL),(20,0,2018,20,'1',1,NULL),(21,0,2018,21,'1',1,NULL),(22,0,2018,22,'1',1,NULL),(23,0,2018,23,'1',1,NULL),(24,0,2018,24,'1',1,NULL),(25,0,2018,25,'1',2,NULL),(26,0,2018,26,'1',2,NULL),(27,0,2018,27,'1',2,NULL),(28,0,2018,28,'1',2,NULL),(29,0,2018,29,'1',2,NULL),(30,0,2018,30,'1',2,NULL),(31,0,2018,31,'1',2,NULL),(32,0,2018,32,'1',2,NULL),(33,0,2018,33,'1',2,NULL),(34,0,2018,34,'1',2,NULL),(35,0,2018,35,'1',2,NULL),(36,0,2018,36,'1',2,NULL),(37,0,2018,37,'1',2,NULL),(38,0,2018,38,'1',2,NULL),(39,0,2018,39,'1',2,NULL),(40,0,2018,40,'1',2,NULL),(41,0,2018,41,'1',2,NULL),(42,0,2018,42,'1',2,NULL),(43,0,2018,43,'1',2,NULL),(44,0,2018,44,'1',2,NULL),(45,0,2018,45,'1',2,NULL),(46,0,2018,46,'1',2,NULL),(47,0,2018,47,'1',2,NULL),(48,0,2018,48,'1',2,NULL),(49,0,2018,49,'1',2,NULL),(50,0,2018,50,'1',2,NULL),(51,0,2018,51,'1',2,NULL),(52,0,2018,52,'1',3,NULL),(53,0,2018,53,'1',3,NULL),(54,0,2018,54,'1',3,NULL),(55,0,2018,55,'1',3,NULL),(56,0,2018,56,'1',3,NULL),(57,0,2018,57,'1',3,NULL),(58,0,2018,58,'1',3,NULL),(59,0,2018,59,'1',3,NULL),(60,0,2018,60,'1',3,NULL),(61,0,2018,61,'1',3,NULL),(62,0,2018,62,'1',3,NULL),(63,0,2018,63,'1',3,NULL),(64,0,2018,64,'1',3,NULL),(65,0,2018,65,'1',3,NULL),(66,0,2018,66,'1',3,NULL),(67,0,2018,67,'1',3,NULL),(68,0,2018,68,'1',3,NULL),(69,0,2018,69,'1',3,NULL),(70,0,2018,70,'1',3,NULL),(71,0,2018,71,'1',3,NULL),(72,0,2018,72,'1',3,NULL),(73,0,2018,73,'1',3,NULL),(74,0,2018,74,'1',3,NULL),(75,0,2018,75,'1',3,NULL),(76,0,2018,76,'1',3,NULL),(77,0,2018,77,'1',3,NULL),(78,0,2018,78,'1',4,NULL),(79,0,2018,79,'1',4,NULL),(80,0,2018,80,'1',4,NULL),(81,0,2018,81,'1',4,NULL),(82,0,2018,82,'1',4,NULL),(83,0,2018,83,'1',4,NULL),(84,0,2018,84,'1',4,NULL),(85,0,2018,85,'1',4,NULL),(86,0,2018,86,'1',4,NULL),(87,0,2018,87,'1',4,NULL),(88,0,2018,88,'1',4,NULL),(89,0,2018,89,'1',4,NULL),(90,0,2018,90,'1',4,NULL),(91,0,2018,91,'1',4,NULL),(92,0,2018,92,'1',4,NULL),(93,0,2018,93,'1',4,NULL),(94,0,2018,94,'1',4,NULL),(95,0,2018,95,'1',4,NULL),(96,0,2018,96,'1',4,NULL),(97,0,2018,97,'1',4,NULL),(98,0,2018,98,'1',4,NULL),(99,0,2018,99,'1',4,NULL),(100,0,2018,100,'1',4,NULL),(101,0,2018,101,'1',4,NULL),(102,0,2018,102,'1',4,NULL),(103,0,2018,103,'1',5,NULL),(104,0,2018,104,'1',5,NULL),(105,0,2018,105,'1',5,NULL),(106,0,2018,106,'1',5,NULL),(107,0,2018,107,'1',5,NULL),(108,0,2018,108,'1',5,NULL),(109,0,2018,109,'1',5,NULL),(110,0,2018,110,'1',5,NULL),(111,0,2018,111,'1',5,NULL),(112,0,2018,112,'1',5,NULL),(113,0,2018,113,'1',5,NULL),(114,0,2018,114,'1',5,NULL),(115,0,2018,115,'1',5,NULL),(116,0,2018,116,'1',5,NULL),(117,0,2018,117,'1',5,NULL),(118,0,2018,118,'1',5,NULL),(119,0,2018,119,'1',5,NULL),(120,0,2018,120,'1',5,NULL),(121,0,2018,121,'1',5,NULL),(122,0,2018,122,'1',5,NULL),(123,0,2018,123,'1',5,NULL),(124,0,2018,124,'1',5,NULL),(125,0,2018,125,'1',5,NULL),(126,0,2018,126,'1',5,NULL),(127,0,2018,127,'1',5,NULL),(128,0,2018,128,'1',6,NULL),(129,0,2018,129,'1',6,NULL),(130,0,2018,130,'1',6,NULL),(131,0,2018,131,'1',6,NULL),(132,0,2018,132,'1',6,NULL),(133,0,2018,133,'1',6,NULL),(134,0,2018,134,'1',6,NULL),(135,0,2018,135,'1',6,NULL),(136,0,2018,136,'1',6,NULL),(137,0,2018,137,'1',6,NULL),(138,0,2018,138,'1',6,NULL),(139,0,2018,139,'1',6,NULL),(140,0,2018,140,'1',6,NULL),(141,0,2018,141,'1',6,NULL),(142,0,2018,142,'1',6,NULL),(143,0,2018,143,'1',6,NULL),(144,0,2018,144,'1',6,NULL),(145,0,2018,145,'1',6,NULL),(146,0,2018,146,'1',6,NULL),(147,0,2018,147,'1',6,NULL),(148,0,2018,148,'1',6,NULL),(149,0,2018,149,'1',6,NULL),(150,0,2018,150,'1',6,NULL),(151,0,2018,151,'1',6,NULL),(152,0,2018,152,'1',6,NULL),(153,0,2018,153,'1',6,NULL),(154,0,2018,154,'1',6,NULL),(155,0,2018,155,'1',6,NULL),(156,0,2018,156,'1',14,NULL),(157,0,2018,157,'1',14,NULL),(158,0,2018,158,'1',14,NULL),(159,0,2018,159,'1',14,NULL),(160,0,2018,160,'1',14,NULL),(161,0,2018,161,'1',14,NULL),(162,0,2018,162,'1',14,NULL),(163,0,2018,163,'1',14,NULL),(164,0,2018,164,'1',14,NULL),(165,0,2018,165,'1',14,NULL),(166,0,2018,166,'1',14,NULL),(167,0,2018,167,'1',14,NULL),(168,0,2018,168,'1',14,NULL),(169,0,2018,169,'1',14,NULL),(170,0,2018,170,'1',14,NULL),(171,0,2018,171,'1',14,NULL),(172,0,2018,172,'1',14,NULL),(173,0,2018,173,'1',14,NULL),(174,0,2018,174,'1',14,NULL),(175,0,2018,175,'1',14,NULL),(176,0,2018,176,'1',14,NULL),(177,0,2018,177,'1',14,NULL),(178,0,2018,178,'1',14,NULL),(179,0,2018,179,'1',14,NULL),(180,0,2018,180,'1',14,NULL),(181,0,2018,181,'1',14,NULL),(182,0,2018,182,'1',14,NULL),(183,0,2018,183,'1',14,NULL),(184,0,2018,184,'1',18,NULL),(185,0,2018,185,'1',18,NULL),(186,0,2018,186,'1',18,NULL),(187,0,2018,187,'1',18,NULL),(188,0,2018,188,'1',18,NULL),(189,0,2018,189,'1',18,NULL),(190,0,2018,190,'1',18,NULL),(191,0,2018,191,'1',18,NULL),(192,0,2018,192,'1',18,NULL),(193,0,2018,193,'1',18,NULL),(194,0,2018,194,'1',18,NULL),(195,0,2018,195,'1',18,NULL),(196,0,2018,196,'1',18,NULL),(197,0,2018,197,'1',18,NULL),(198,0,2018,198,'1',18,NULL),(199,0,2018,199,'1',18,NULL),(200,0,2018,200,'1',18,NULL),(201,0,2018,201,'1',18,NULL),(202,0,2018,202,'1',18,NULL),(203,0,2018,203,'1',18,NULL),(204,0,2018,204,'1',18,NULL),(205,0,2018,205,'1',18,NULL),(206,0,2018,206,'1',18,NULL),(207,0,2018,207,'1',18,NULL),(208,0,2018,208,'1',18,NULL),(209,0,2018,209,'1',18,NULL),(210,0,2018,210,'1',18,NULL),(211,0,2018,211,'1',18,NULL),(212,0,2018,212,'1',18,NULL),(213,0,2018,213,'1',21,NULL),(214,0,2018,214,'1',21,NULL),(215,0,2018,215,'1',21,NULL),(216,0,2018,216,'1',21,NULL),(217,0,2018,217,'1',21,NULL),(218,0,2018,218,'1',21,NULL),(219,0,2018,219,'1',21,NULL),(220,0,2018,220,'1',21,NULL),(221,0,2018,221,'1',21,NULL),(222,0,2018,222,'1',21,NULL),(223,0,2018,223,'1',21,NULL),(224,0,2018,224,'1',21,NULL),(225,0,2018,225,'1',21,NULL),(226,0,2018,226,'1',21,NULL),(227,0,2018,227,'1',21,NULL),(228,0,2018,228,'1',21,NULL),(229,0,2018,229,'1',21,NULL),(230,0,2018,230,'1',21,NULL),(231,0,2018,231,'1',21,NULL),(232,0,2018,232,'1',21,NULL),(233,0,2018,233,'1',21,NULL),(234,0,2018,234,'1',21,NULL),(235,0,2018,235,'1',21,NULL),(236,0,2018,236,'1',21,NULL),(237,0,2018,237,'1',21,NULL),(238,0,2018,238,'1',21,NULL),(239,0,2018,239,'1',21,NULL),(240,0,2018,240,'1',21,NULL),(241,0,2018,241,'1',21,NULL),(242,0,2018,242,'1',21,NULL),(243,0,2018,243,'1',27,NULL),(244,0,2018,244,'1',27,NULL),(245,0,2018,245,'1',27,NULL),(246,0,2018,246,'1',27,NULL),(247,0,2018,247,'1',27,NULL),(248,0,2018,248,'1',27,NULL),(249,0,2018,249,'1',27,NULL),(250,0,2018,250,'1',27,NULL),(251,0,2018,251,'1',27,NULL),(252,0,2018,252,'1',27,NULL),(253,0,2018,253,'1',27,NULL),(254,0,2018,254,'1',27,NULL),(255,0,2018,255,'1',27,NULL),(256,0,2018,256,'1',27,NULL),(257,0,2018,257,'1',27,NULL),(258,0,2018,258,'1',27,NULL),(259,0,2018,259,'1',27,NULL),(260,0,2018,260,'1',27,NULL),(261,0,2018,261,'1',27,NULL),(262,0,2018,262,'1',27,NULL),(263,0,2018,263,'1',27,NULL),(264,0,2018,264,'1',27,NULL),(265,0,2018,265,'1',27,NULL);

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

insert  into `tiene`(`id_curso`,`id_asignatura`,`id_docente`) values (2,1,42),(6,1,42),(6,18,28),(7,18,28),(8,18,28),(21,18,28),(29,18,28);

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
