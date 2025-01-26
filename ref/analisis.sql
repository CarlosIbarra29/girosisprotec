-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: siaf
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
-- Table structure for table `afianzadoras`
--

DROP TABLE IF EXISTS `afianzadoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afianzadoras` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_afianzadora` varchar(255) DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_afianzadoras_users1_idx` (`iduserCreated`),
  KEY `fk_afianzadoras_users2_idx` (`iduserUpdated`),
  KEY `fk_afianzadoras_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_afianzadoras_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_afianzadoras_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_afianzadoras_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afianzadoras`
--

LOCK TABLES `afianzadoras` WRITE;
/*!40000 ALTER TABLE `afianzadoras` DISABLE KEYS */;
INSERT INTO `afianzadoras` VALUES (1,'Chubb Fianzas Monterrey',1,'2023-01-03 04:17:56','2023-01-03 04:31:55',1,1),(2,'Afianzadora CBL Fiducia',1,'2023-01-03 04:32:08','2023-01-03 04:32:08',1,1);
/*!40000 ALTER TABLE `afianzadoras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agencia_unidad`
--

DROP TABLE IF EXISTS `agencia_unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agencia_unidad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_proveedor` bigint(20) NOT NULL,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puesto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_delete` int(11) NOT NULL DEFAULT 0,
  `iduserCreated` bigint(19) unsigned DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agencia_unidad`
--

LOCK TABLES `agencia_unidad` WRITE;
/*!40000 ALTER TABLE `agencia_unidad` DISABLE KEYS */;
INSERT INTO `agencia_unidad` VALUES (1,1,'FORD','Prueba1','Vendedor','Coacalco','5566778899','ferherrera-dcf4485@hotmail.com',0,1,1,'2022-07-02 01:28:33','2022-07-02 01:59:46');
/*!40000 ALTER TABLE `agencia_unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area_personal`
--

DROP TABLE IF EXISTS `area_personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area_personal` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_area` varchar(45) DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_area_personal_users1_idx` (`iduserCreated`),
  KEY `fk_area_personal_users2_idx` (`iduserUpdated`),
  KEY `fk_area_personal_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_area_personal_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_area_personal_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_area_personal_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area_personal`
--

LOCK TABLES `area_personal` WRITE;
/*!40000 ALTER TABLE `area_personal` DISABLE KEYS */;
INSERT INTO `area_personal` VALUES (1,'Finanzas',1,NULL,NULL,1,1),(2,'Operaciones',1,NULL,NULL,1,1);
/*!40000 ALTER TABLE `area_personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aseguradora_unidad`
--

DROP TABLE IF EXISTS `aseguradora_unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aseguradora_unidad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_aseguradora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colonia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_aseguradora_unidad_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_aseguradora_unidad_users1_idx` (`iduserCreated`),
  KEY `fk_aseguradora_unidad_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_aseguradora_unidad_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_aseguradora_unidad_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_aseguradora_unidad_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aseguradora_unidad`
--

LOCK TABLES `aseguradora_unidad` WRITE;
/*!40000 ALTER TABLE `aseguradora_unidad` DISABLE KEYS */;
INSERT INTO `aseguradora_unidad` VALUES (1,'Afirme',NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL),(2,'Qualitas',NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL),(3,'Banorte',NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL),(4,'MAPFRE',NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL),(7,'Prueba1',NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,'2022-05-02 20:20:42','2022-05-02 17:29:47'),(8,'Fer1',NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,'2022-06-17 02:09:38','2022-06-16 21:19:47'),(9,'BBVA','Fernando Herrera','admi@admin.com',NULL,'Higueras','Coacalco',55712,1,1,1,'2022-06-30 01:15:35','2022-06-29 20:29:55');
/*!40000 ALTER TABLE `aseguradora_unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rfc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razon_social` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle_numero` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colonia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_postal` int(10) unsigned NOT NULL,
  `id_municipio` int(10) unsigned NOT NULL,
  `id_estado` int(10) unsigned NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `motivo_desactivar` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `client_rfc_unique` (`rfc`),
  KEY `client_id_municipio_foreign` (`id_municipio`),
  KEY `client_id_estado_foreign` (`id_estado`),
  KEY `fk_client_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_client_users1_idx` (`iduserCreated`),
  KEY `fk_client_users2_idx` (`iduserUpdated`),
  CONSTRAINT `client_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `client_id_municipio_foreign` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`),
  CONSTRAINT `fk_client_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_client_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_client_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (2,'CGDGDFV4356','Prueba 2','PRUEBA 1','dos','dos',55712,1,1,1,NULL,'2022-06-04 01:34:18','2022-06-04 01:34:18',1,1),(4,'CGDGDFV43563','Prueba 3','PRUEBA 3','dos','dos',557122,4,3,1,NULL,'2022-06-04 03:47:16','2022-06-27 20:45:39',1,1),(11,'FFF','File','File1','dos','dos',557123,1,1,2,'Cliente dado de baja','2022-08-05 00:27:29','2022-12-06 01:34:49',1,1),(13,'CGDGDFV4356e435','Prueba 2','naranjos','dos','dos',55712,1,1,1,NULL,'2022-12-05 23:19:18','2022-12-05 23:19:18',1,1);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente_documento`
--

DROP TABLE IF EXISTS `cliente_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(10) unsigned NOT NULL,
  `cliente_tipo_documento_id` int(11) NOT NULL,
  `documento` mediumtext DEFAULT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cliente_documento_cliente_tipo_documento1_idx` (`cliente_tipo_documento_id`),
  KEY `fk_cliente_documento_users1_idx` (`iduserCreated`),
  KEY `fk_cliente_documento_users2_idx` (`iduserUpdated`),
  KEY `fk_cliente_documento_client1_idx` (`id_cliente`),
  CONSTRAINT `fk_cliente_documento_client1` FOREIGN KEY (`id_cliente`) REFERENCES `client` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_documento_cliente_tipo_documento1` FOREIGN KEY (`cliente_tipo_documento_id`) REFERENCES `cliente_tipo_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_documento_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_documento_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente_documento`
--

LOCK TABLES `cliente_documento` WRITE;
/*!40000 ALTER TABLE `cliente_documento` DISABLE KEYS */;
INSERT INTO `cliente_documento` VALUES (1,11,1,'BiidjiGkjLfDnKVFLsWE9AEyrt1AICNmLkCR8Y3j.pdf','application/pdf','2022-08-05 00:06:55','2022-08-05 00:06:55',1,1),(3,11,2,'xrReTENzeSzDo4SsdYTqidddYjBE60FgHpiWtcVe.pdf','application/pdf','2022-08-05 00:27:29','2022-08-05 00:27:29',1,1);
/*!40000 ALTER TABLE `cliente_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente_tipo_documento`
--

DROP TABLE IF EXISTS `cliente_tipo_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_tipo_documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cliente_tipo_documento_users1_idx` (`iduserCreated`),
  KEY `fk_cliente_tipo_documento_users2_idx` (`iduserUpdated`),
  KEY `fk_cliente_tipo_documento_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_cliente_tipo_documento_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_tipo_documento_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_tipo_documento_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente_tipo_documento`
--

LOCK TABLES `cliente_tipo_documento` WRITE;
/*!40000 ALTER TABLE `cliente_tipo_documento` DISABLE KEYS */;
INSERT INTO `cliente_tipo_documento` VALUES (1,'INE',1,'2022-08-04 23:10:16','2022-08-04 23:14:15',1,1),(2,'Acta de Nacimiento',1,'2022-08-04 23:17:11','2022-08-04 23:24:11',1,1),(3,'Licencia Conducir',1,'2022-08-08 20:57:46','2022-08-08 20:57:46',1,1);
/*!40000 ALTER TABLE `cliente_tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complemento_unidad`
--

DROP TABLE IF EXISTS `complemento_unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `complemento_unidad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_unidad` int(10) unsigned NOT NULL,
  `kilometraje` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marca_bateria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marca_llantas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vestiduras` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llantas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pintura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llanta_refaccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gato` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `herramientas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `espejo_retrovisor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `funciona_motor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llaves_vehiculo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `radio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bocinas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aire_acondicionado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birlos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tapetes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senalizaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elaboro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conteo_niv` int(11) DEFAULT NULL,
  `conteo_year` int(11) DEFAULT NULL,
  `rango_km` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registro_repuve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `num_gps` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_complemento_unidad_unidad1_idx` (`id_unidad`),
  KEY `fk_complemento_unidad_users1_idx` (`iduserCreated`),
  KEY `fk_complemento_unidad_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_complemento_unidad_unidad1` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_complemento_unidad_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_complemento_unidad_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complemento_unidad`
--

LOCK TABLES `complemento_unidad` WRITE;
/*!40000 ALTER TABLE `complemento_unidad` DISABLE KEYS */;
INSERT INTO `complemento_unidad` VALUES (4,1,'21','DE origen','Brigstone','16',NULL,NULL,NULL,NULL,'Si','Si','Si','No','No','No','Si','Si','Si','No','No','No','admin','fer',NULL,NULL,NULL,NULL,'2022-05-01','2022-06-11',NULL,NULL,'2022-08-04 21:43:28',0,0),(5,2,'2111','DE origen','Brigstone',NULL,NULL,NULL,NULL,NULL,'No','No','No','No','No','No','No','No','No','No','No','No','admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-06-24 20:30:03',0,0),(6,3,'1','Nueva',NULL,NULL,NULL,NULL,NULL,NULL,'No','No','No','No','No','No','No','No','No','No','No','No','admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-06-24 20:33:12',0,0),(10,9,'1','1',NULL,NULL,NULL,NULL,NULL,NULL,'No','No','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-04 22:06:28',1,1),(11,66,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-06 00:31:30','2022-09-06 21:11:17',1,1),(12,67,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-09-05 22:11:39','2022-09-05 17:11:39',1,1),(13,68,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-09-05 22:13:10','2022-09-05 17:13:10',1,1),(14,69,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-09-05 22:14:33','2022-09-06 21:09:28',1,1),(15,70,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-09-05 22:17:18','2022-09-06 20:21:04',1,1),(16,38,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-09-06 15:36:50',1,1),(17,61,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-09-06 21:10:18',1,1),(18,65,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-09-06 21:11:39',1,1),(19,78,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-09-19 17:35:16',1,1),(20,80,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'247464',NULL,'2022-11-11 22:57:01',1,1),(21,81,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-24 21:57:30','2022-11-24 15:57:30',1,1),(22,82,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-24 22:04:13','2022-11-24 21:20:57',1,1),(23,83,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-24 22:06:07','2022-11-24 16:06:07',1,1),(24,84,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-24 22:08:17','2022-11-24 16:08:17',1,1),(25,51,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-24 16:12:22',1,1),(26,97,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-02-27 16:11:22',1,1),(27,100,'21','DE origen','Brigstone','16','1.4',NULL,'21',NULL,'Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','ADMIN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'247464',NULL,'2023-09-13 22:36:31',1,1),(28,77,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','ADMIN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-10-05 16:48:35',1,1);
/*!40000 ALTER TABLE `complemento_unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conversations` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user1_id` bigint(19) unsigned NOT NULL,
  `user2_id` bigint(19) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_conversations_users1_idx` (`user1_id`),
  KEY `fk_conversations_users2_idx` (`user2_id`),
  KEY `fk_conversations_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_conversations_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_conversations_users1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_conversations_users2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conversations`
--

LOCK TABLES `conversations` WRITE;
/*!40000 ALTER TABLE `conversations` DISABLE KEYS */;
INSERT INTO `conversations` VALUES (1,1,10,'Fernando','2023-10-04 23:07:06','2023-10-04 23:07:06',1);
/*!40000 ALTER TABLE `conversations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos_licitaciones`
--

DROP TABLE IF EXISTS `documentos_licitaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentos_licitaciones` (
  `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,
  `id_licitacion` bigint(19) unsigned NOT NULL,
  `tipo_documento` bigint(19) unsigned NOT NULL,
  `documento` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_documentos_licitaciones_tipo_documentos_licitaciones1_idx` (`tipo_documento`),
  KEY `fk_documentos_licitaciones_licitaciones1_idx` (`id_licitacion`),
  KEY `fk_documentos_licitaciones_users1_idx` (`iduserCreated`),
  KEY `fk_documentos_licitaciones_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_documentos_licitaciones_licitaciones1` FOREIGN KEY (`id_licitacion`) REFERENCES `licitaciones` (`id`),
  CONSTRAINT `fk_documentos_licitaciones_tipo_documentos_licitaciones1` FOREIGN KEY (`tipo_documento`) REFERENCES `tipo_documentos_licitaciones` (`id`),
  CONSTRAINT `fk_documentos_licitaciones_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentos_licitaciones_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos_licitaciones`
--

LOCK TABLES `documentos_licitaciones` WRITE;
/*!40000 ALTER TABLE `documentos_licitaciones` DISABLE KEYS */;
INSERT INTO `documentos_licitaciones` VALUES (5,2,1,'Esquema_Can__+(002).pdf',1,1,'2022-05-12 00:03:44','2022-05-12 00:03:44'),(6,4,1,'emisor (1).xlsx',1,1,'2022-05-12 23:28:32','2022-05-12 23:28:32'),(8,23,1,'zsqiNQ8uxI1g5I7BBy90MIkyG81ep4oYXZyRefq1.docx',1,1,'2023-06-05 11:22:11','2023-06-05 11:22:11');
/*!40000 ALTER TABLE `documentos_licitaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ejecutivo_contrato`
--

DROP TABLE IF EXISTS `ejecutivo_contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ejecutivo_contrato` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `users_id` bigint(19) unsigned NOT NULL,
  `proyectos_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ejecutivo_contrato_users1_idx` (`iduserCreated`),
  KEY `fk_ejecutivo_contrato_users2_idx` (`iduserUpdated`),
  KEY `fk_ejecutivo_contrato_users3_idx` (`users_id`),
  KEY `fk_ejecutivo_contrato_proyectos1_idx` (`proyectos_id`),
  CONSTRAINT `fk_ejecutivo_contrato_proyectos1` FOREIGN KEY (`proyectos_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ejecutivo_contrato_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ejecutivo_contrato_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ejecutivo_contrato_users3` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ejecutivo_contrato`
--

LOCK TABLES `ejecutivo_contrato` WRITE;
/*!40000 ALTER TABLE `ejecutivo_contrato` DISABLE KEYS */;
/*!40000 ALTER TABLE `ejecutivo_contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emisores`
--

DROP TABLE IF EXISTS `emisores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emisores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dom_fiscal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_emisores_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_emisores_users1_idx` (`iduserCreated`),
  KEY `fk_emisores_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_emisores_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_emisores_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_emisores_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emisores`
--

LOCK TABLES `emisores` WRITE;
/*!40000 ALTER TABLE `emisores` DISABLE KEYS */;
INSERT INTO `emisores` VALUES (1,'Jet Van Car Rental, S.A. de C.V.','JCR040721NU2','PENSILVANIA 131-1, COL NAPOLES, DEL BENITO JUAREZ, CIUDAD DE MEXICO',1,1,1,'2022-05-06 20:44:20','2022-05-06 15:56:05'),(2,'Jet Van Morelos','CGDGDFV4356',NULL,1,1,1,'2022-05-06 20:56:19','2022-06-17 21:42:50'),(3,'Forza Arrendadora Automotriz, S.A. de C.V.','FAA0910096F0','Vicente Guerrero No 2404, Ocotepec, Cuernavaca, Morelos',1,1,1,'2022-05-06 20:56:41','2022-05-06 15:56:41'),(4,'CARS & CARS ROMAN S.A. DE C.V.',NULL,NULL,1,1,1,'2022-05-06 20:56:51','2022-05-06 15:56:51'),(5,'Rin Automotriz, S.A. de C.V.','RAU160609DU7','AVENIDA AGUASCALIENTES NORTE 780, TROJES DE ALONSO, AGUASCALIENTES, AGUASCALIENTES, MEXICO',1,1,1,'2022-05-06 20:57:07','2022-05-06 15:57:07'),(6,'Prueba',NULL,NULL,1,1,1,'2022-05-06 21:01:28','2022-06-17 21:48:08');
/*!40000 ALTER TABLE `emisores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id_estado` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado_nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id_estado`),
  UNIQUE KEY `estado_estado_nombre_unique` (`estado_nombre`),
  KEY `fk_estado_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_estado_users1_idx` (`iduserCreated`),
  KEY `fk_estado_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_estado_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estado_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estado_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Aguascalientes',1,'2022-06-21 02:27:09','2022-08-23 01:55:27',1,1),(2,'Baja California',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(3,'Baja California Sur',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(4,'Campeche',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(5,'Choahuila de Zaragoz',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(6,'Colima',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(7,'Chiapas',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(8,'Chihuahua',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(9,'Ciudad de Mexico',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(10,'Durango',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(11,'Guanajuato',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(12,'Guerrero',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(13,'Hidalgo',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(14,'Jalisco',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(15,'Mexico',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(16,'Michoacan de Ocampo',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(17,'Morelos',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(18,'Nayarit',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(19,'Nuevo Leon',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(20,'Oaxaca',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(21,'Puebla',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(22,'Queretaro',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(23,'Quintana Roo',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(24,'San Luis Potosi',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(25,'Sinaloa',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(26,'Sonora',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(27,'Tabasco',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(28,'Tamaulipas',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(29,'Tlaxcala',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(30,'Veracruz',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(31,'Yucatan',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(32,'Zacatecas',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1);
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foto_unidad`
--

DROP TABLE IF EXISTS `foto_unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foto_unidad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_unidad` int(10) unsigned NOT NULL,
  `foto` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_foto_unidad_unidad1_idx` (`id_unidad`),
  KEY `fk_foto_unidad_users1_idx` (`iduserCreated`),
  KEY `fk_foto_unidad_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_foto_unidad_unidad1` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_foto_unidad_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_foto_unidad_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto_unidad`
--

LOCK TABLES `foto_unidad` WRITE;
/*!40000 ALTER TABLE `foto_unidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `foto_unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuente_proyecto`
--

DROP TABLE IF EXISTS `fuente_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuente_proyecto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fuente_proyecto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fuente_proyecto_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_fuente_proyecto_users1_idx` (`iduserCreated`),
  KEY `fk_fuente_proyecto_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_fuente_proyecto_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_fuente_proyecto_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_fuente_proyecto_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuente_proyecto`
--

LOCK TABLES `fuente_proyecto` WRITE;
/*!40000 ALTER TABLE `fuente_proyecto` DISABLE KEYS */;
INSERT INTO `fuente_proyecto` VALUES (1,'LICITACION',1,1,1,'2022-05-06 22:03:37','2022-05-06 17:03:37'),(2,'DIRECTA',1,1,1,'2022-05-06 22:04:13','2022-05-06 17:04:13'),(3,'ADHESION',1,1,1,'2022-05-06 22:04:19','2022-05-06 17:04:19'),(4,'ADHESION SAT',1,1,1,'2022-05-06 22:04:31','2022-05-06 17:04:31'),(5,'ADHESION OTROS',1,1,1,'2022-05-06 22:04:46','2022-05-06 17:04:46'),(6,'PRIVADO',1,1,1,'2022-05-06 22:04:52','2022-05-06 17:04:52'),(8,'Prueba1',1,1,1,'2022-06-21 01:41:38','2022-06-20 20:52:43');
/*!40000 ALTER TABLE `fuente_proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_estatus`
--

DROP TABLE IF EXISTS `licitacion_estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_estatus` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `iduserCreated` bigint(19) unsigned DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned DEFAULT NULL,
  `estatus` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_estatus_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_estatus_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_licitacion_estatus_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_estatus_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_estatus`
--

LOCK TABLES `licitacion_estatus` WRITE;
/*!40000 ALTER TABLE `licitacion_estatus` DISABLE KEYS */;
INSERT INTO `licitacion_estatus` VALUES (1,1,1,'Sin Contrato','2022-07-06 01:10:48','2022-07-06 01:10:48'),(2,1,1,'Con Contrato','2022-07-06 01:10:48','2022-07-06 01:10:48');
/*!40000 ALTER TABLE `licitacion_estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_folio`
--

DROP TABLE IF EXISTS `licitacion_folio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_folio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `folio` bigint(20) NOT NULL,
  `anio` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_folio`
--

LOCK TABLES `licitacion_folio` WRITE;
/*!40000 ALTER TABLE `licitacion_folio` DISABLE KEYS */;
INSERT INTO `licitacion_folio` VALUES (1,1,2022,'2022-07-12 22:13:11','2022-07-12 22:13:11'),(2,2,2022,'2022-07-14 23:18:04','2022-07-14 23:18:04'),(3,3,2022,'2022-07-14 23:19:01','2022-07-14 23:19:01'),(4,4,2022,'2022-07-15 01:17:31','2022-07-15 01:17:31'),(5,5,2022,'2022-07-15 04:20:04','2022-07-15 04:20:04'),(6,6,2022,'2022-07-21 00:54:01','2022-07-21 00:54:01'),(7,7,2022,'2022-07-28 02:14:47','2022-07-28 02:14:47'),(8,8,2022,'2022-07-28 21:34:39','2022-07-28 21:34:39'),(9,9,2022,'2022-11-12 05:40:08','2022-11-12 05:40:08'),(10,10,2023,'2023-01-02 20:52:29','2023-01-02 20:52:29'),(11,11,2023,'2023-01-26 03:54:21','2023-01-26 03:54:21'),(12,12,2023,'2023-01-26 03:55:00','2023-01-26 03:55:00'),(13,13,2023,'2023-01-26 03:55:19','2023-01-26 03:55:19'),(14,14,2023,'2023-01-26 03:55:41','2023-01-26 03:55:41'),(15,15,2023,'2023-01-26 04:00:33','2023-01-26 04:00:33'),(16,16,2023,'2023-03-29 01:24:25','2023-03-29 01:24:25'),(17,17,2023,'2023-05-08 22:12:31','2023-05-08 22:12:31');
/*!40000 ALTER TABLE `licitacion_folio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_gestor_documentos`
--

DROP TABLE IF EXISTS `licitacion_gestor_documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_gestor_documentos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `licitacion_gestor_tipo_documento_id` bigint(20) NOT NULL,
  `documento` mediumtext DEFAULT NULL,
  `mine_type` mediumtext DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `comentario` mediumtext DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `month` varchar(45) DEFAULT NULL,
  `day` varchar(45) DEFAULT NULL,
  `licitacion_gestor_documentos_year_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_gestor_documentos_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_gestor_documentos_users2_idx` (`iduserUpdated`),
  KEY `fk_licitacion_gestor_documentos_licitacion_gestor_tipo_docu_idx` (`licitacion_gestor_tipo_documento_id`),
  KEY `fk_licitacion_gestor_documentos_licitacion_gestor_documento_idx` (`licitacion_gestor_documentos_year_id`),
  CONSTRAINT `fk_licitacion_gestor_documentos_licitacion_gestor_documentos_1` FOREIGN KEY (`licitacion_gestor_documentos_year_id`) REFERENCES `licitacion_gestor_documentos_year` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_gestor_documentos_licitacion_gestor_tipo_docume1` FOREIGN KEY (`licitacion_gestor_tipo_documento_id`) REFERENCES `licitacion_gestor_tipo_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_gestor_documentos_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_gestor_documentos_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_gestor_documentos`
--

LOCK TABLES `licitacion_gestor_documentos` WRITE;
/*!40000 ALTER TABLE `licitacion_gestor_documentos` DISABLE KEYS */;
INSERT INTO `licitacion_gestor_documentos` VALUES (1,1,'xXMFUfVuDbxXWauFq5goD7D4y1oGEVtgZEYWYadK.docx','application/vnd.openxmlformats-officedocument.wordprocessingml.document',NULL,'ninguno','2023-01-20 18:00:00',NULL,NULL,0,'2023-01-24 00:00:35','2023-01-24 00:00:35',1,1),(2,2,'bTSfT5YLoyTXazpr1EwnswXYFrlHjXR1InvBq3PJ.docx','application/vnd.openxmlformats-officedocument.wordprocessingml.document',NULL,'ninguno','2022-12-30 18:00:00',NULL,NULL,0,'2023-01-24 04:41:47','2023-01-24 04:41:47',1,1),(3,3,'KpiloBizTkZRLII1Ij9tRyspsIxyYZgJDTIKk6F5.docx','application/vnd.openxmlformats-officedocument.wordprocessingml.document',NULL,'ninguno','2022-12-26 23:05:00',NULL,NULL,0,'2023-01-24 05:05:32','2023-01-24 05:05:32',1,1),(4,4,'ZbniADU3pSttfAfsVMzMjuKqbeuXvbl7h69Arikq.docx','application/vnd.openxmlformats-officedocument.wordprocessingml.document',NULL,'ninguno','2023-02-03 23:08:00',NULL,NULL,0,'2023-01-24 05:08:24','2023-01-24 05:08:24',1,1);
/*!40000 ALTER TABLE `licitacion_gestor_documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_gestor_documentos_year`
--

DROP TABLE IF EXISTS `licitacion_gestor_documentos_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_gestor_documentos_year` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `year` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `year_UNIQUE` (`year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_gestor_documentos_year`
--

LOCK TABLES `licitacion_gestor_documentos_year` WRITE;
/*!40000 ALTER TABLE `licitacion_gestor_documentos_year` DISABLE KEYS */;
/*!40000 ALTER TABLE `licitacion_gestor_documentos_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_gestor_tipo_documento`
--

DROP TABLE IF EXISTS `licitacion_gestor_tipo_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_gestor_tipo_documento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `informacion` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_gestor_tipo_documento_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_gestor_tipo_documento_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_licitacion_gestor_tipo_documento_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_gestor_tipo_documento_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_gestor_tipo_documento`
--

LOCK TABLES `licitacion_gestor_tipo_documento` WRITE;
/*!40000 ALTER TABLE `licitacion_gestor_tipo_documento` DISABLE KEYS */;
INSERT INTO `licitacion_gestor_tipo_documento` VALUES (1,'legal',NULL,NULL,1,1),(2,'administrativa',NULL,NULL,1,1),(3,'fiscal',NULL,NULL,1,1),(4,'financiera',NULL,NULL,1,1);
/*!40000 ALTER TABLE `licitacion_gestor_tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_informacion_administrativa`
--

DROP TABLE IF EXISTS `licitacion_informacion_administrativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_informacion_administrativa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `informacion` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_informacion_administrativa_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_informacion_administrativa_users2_idx` (`iduserUpdated`),
  KEY `fk_licitacion_informacion_administrativa_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_licitacion_informacion_administrativa_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_informacion_administrativa_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_informacion_administrativa_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_informacion_administrativa`
--

LOCK TABLES `licitacion_informacion_administrativa` WRITE;
/*!40000 ALTER TABLE `licitacion_informacion_administrativa` DISABLE KEYS */;
/*!40000 ALTER TABLE `licitacion_informacion_administrativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_informacion_financiera`
--

DROP TABLE IF EXISTS `licitacion_informacion_financiera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_informacion_financiera` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `informacion` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_informacion_financiera_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_informacion_financiera_users2_idx` (`iduserUpdated`),
  KEY `fk_licitacion_informacion_financiera_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_licitacion_informacion_financiera_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_informacion_financiera_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_informacion_financiera_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_informacion_financiera`
--

LOCK TABLES `licitacion_informacion_financiera` WRITE;
/*!40000 ALTER TABLE `licitacion_informacion_financiera` DISABLE KEYS */;
/*!40000 ALTER TABLE `licitacion_informacion_financiera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_informacion_fiscal`
--

DROP TABLE IF EXISTS `licitacion_informacion_fiscal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_informacion_fiscal` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `informacion` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_informacion_fiscal_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_informacion_fiscal_users2_idx` (`iduserUpdated`),
  KEY `fk_licitacion_informacion_fiscal_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_licitacion_informacion_fiscal_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_informacion_fiscal_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_informacion_fiscal_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_informacion_fiscal`
--

LOCK TABLES `licitacion_informacion_fiscal` WRITE;
/*!40000 ALTER TABLE `licitacion_informacion_fiscal` DISABLE KEYS */;
/*!40000 ALTER TABLE `licitacion_informacion_fiscal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_informacion_legal`
--

DROP TABLE IF EXISTS `licitacion_informacion_legal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_informacion_legal` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `informacion` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_informacion_legal_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_informacion_legal_users2_idx` (`iduserUpdated`),
  KEY `fk_licitacion_informacion_legal_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_licitacion_informacion_legal_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_informacion_legal_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_informacion_legal_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_informacion_legal`
--

LOCK TABLES `licitacion_informacion_legal` WRITE;
/*!40000 ALTER TABLE `licitacion_informacion_legal` DISABLE KEYS */;
/*!40000 ALTER TABLE `licitacion_informacion_legal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_prioridad`
--

DROP TABLE IF EXISTS `licitacion_prioridad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_prioridad` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_licitacion_prioridad_estatus` bigint(20) NOT NULL,
  `iduserCreated` bigint(19) unsigned DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned DEFAULT NULL,
  `prioridad` varchar(76) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_prioridad_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_prioridad_users2_idx` (`iduserUpdated`),
  KEY `fk_licitacion_prioridad_licitacion_prioridad_estatus1_idx` (`id_licitacion_prioridad_estatus`),
  CONSTRAINT `fk_licitacion_prioridad_licitacion_prioridad_estatus1` FOREIGN KEY (`id_licitacion_prioridad_estatus`) REFERENCES `licitacion_prioridad_estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_prioridad_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_licitacion_prioridad_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_prioridad`
--

LOCK TABLES `licitacion_prioridad` WRITE;
/*!40000 ALTER TABLE `licitacion_prioridad` DISABLE KEYS */;
INSERT INTO `licitacion_prioridad` VALUES (1,1,1,1,'Alta','2022-07-21 00:54:01','2022-07-21 00:54:01'),(2,1,1,1,'Media','2022-07-21 00:54:01','2022-07-21 00:54:01'),(3,1,1,1,'Baja','2022-07-21 00:54:01','2022-07-21 00:54:01');
/*!40000 ALTER TABLE `licitacion_prioridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_prioridad_estatus`
--

DROP TABLE IF EXISTS `licitacion_prioridad_estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_prioridad_estatus` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `iduserCreated` bigint(19) unsigned DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned DEFAULT NULL,
  `estatus` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_prioridad_estatus_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_prioridad_estatus_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_licitacion_prioridad_estatus_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_prioridad_estatus_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_prioridad_estatus`
--

LOCK TABLES `licitacion_prioridad_estatus` WRITE;
/*!40000 ALTER TABLE `licitacion_prioridad_estatus` DISABLE KEYS */;
INSERT INTO `licitacion_prioridad_estatus` VALUES (1,1,1,'Alta','2022-07-21 00:54:01','2022-07-21 00:54:01'),(2,1,1,'Media','2022-07-21 00:54:01','2022-07-21 00:54:01'),(3,1,1,'Baja','2022-07-21 00:54:01','2022-07-21 00:54:01');
/*!40000 ALTER TABLE `licitacion_prioridad_estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_proposicion_economica`
--

DROP TABLE IF EXISTS `licitacion_proposicion_economica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_proposicion_economica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licitacion_id` bigint(19) unsigned NOT NULL,
  `segmento_id` int(11) NOT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `precio_unitario` decimal(15,2) DEFAULT NULL,
  `observaciones` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_proposicion_economica_licitaciones1_idx` (`licitacion_id`),
  KEY `fk_licitacion_proposicion_economica_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_proposicion_economica_users2_idx` (`iduserUpdated`),
  KEY `fk_licitacion_proposicion_economica_segmentos1_idx` (`segmento_id`),
  CONSTRAINT `fk_licitacion_proposicion_economica_licitaciones1` FOREIGN KEY (`licitacion_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_proposicion_economica_segmentos1` FOREIGN KEY (`segmento_id`) REFERENCES `segmentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_proposicion_economica_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_proposicion_economica_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_proposicion_economica`
--

LOCK TABLES `licitacion_proposicion_economica` WRITE;
/*!40000 ALTER TABLE `licitacion_proposicion_economica` DISABLE KEYS */;
INSERT INTO `licitacion_proposicion_economica` VALUES (26,13,1,'8',1500.00,NULL,'2022-08-02 23:12:13','2022-08-09 20:23:45',1,1),(27,13,5,'7',2800.00,NULL,'2022-08-02 23:12:13','2022-08-09 20:23:45',1,1),(35,13,6,'4',1700.00,NULL,'2022-08-03 03:56:16','2022-08-09 20:23:45',1,1),(38,15,1,'2',30000.00,NULL,'2022-08-26 03:33:44','2022-10-14 06:08:36',1,1),(39,15,7,'10',10000.00,NULL,'2022-08-26 03:33:44','2022-10-14 06:08:36',1,1),(40,15,5,'5',7500.00,NULL,'2022-10-14 06:07:00','2022-10-14 06:08:36',1,1),(41,16,1,'5',1700.00,NULL,'2023-01-02 20:39:11','2023-09-23 03:24:03',1,1),(42,16,5,'7',1500.00,NULL,'2023-01-02 20:39:11','2023-09-23 03:24:03',1,1),(44,17,1,'10',1450.00,NULL,'2023-01-02 21:08:24','2023-01-11 08:11:53',1,1),(45,17,5,'5',7500.00,NULL,'2023-01-02 21:08:24','2023-01-11 08:11:53',1,1),(46,23,7,'20',1700.00,NULL,'2023-05-09 04:18:52','2023-08-03 06:14:29',1,1),(47,23,8,'40',1500.00,NULL,'2023-05-09 04:18:52','2023-08-03 06:14:29',1,1),(48,22,8,NULL,NULL,NULL,'2023-05-10 05:47:52','2023-05-10 05:47:52',1,1),(49,16,7,'4',1300.00,NULL,'2023-09-23 03:23:29','2023-09-23 03:24:03',1,1);
/*!40000 ALTER TABLE `licitacion_proposicion_economica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_propuesta_cargafinal`
--

DROP TABLE IF EXISTS `licitacion_propuesta_cargafinal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_propuesta_cargafinal` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `licitaciones_id` bigint(19) unsigned NOT NULL,
  `num` varchar(45) DEFAULT NULL,
  `nombre_requerimiento` mediumtext DEFAULT NULL,
  `descripcion` mediumtext DEFAULT NULL,
  `obligatorio` varchar(45) DEFAULT NULL,
  `respuesta` varchar(45) DEFAULT NULL,
  `acciones` varchar(45) DEFAULT NULL,
  `archivo_propuesta` varchar(255) DEFAULT NULL,
  `seccion` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_propuesta_cargafinal_licitaciones1_idx` (`licitaciones_id`),
  KEY `fk_licitacion_propuesta_cargafinal_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_propuesta_cargafinal_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_licitacion_propuesta_cargafinal_licitaciones1` FOREIGN KEY (`licitaciones_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_propuesta_cargafinal_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_propuesta_cargafinal_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_propuesta_cargafinal`
--

LOCK TABLES `licitacion_propuesta_cargafinal` WRITE;
/*!40000 ALTER TABLE `licitacion_propuesta_cargafinal` DISABLE KEYS */;
INSERT INTO `licitacion_propuesta_cargafinal` VALUES (2,23,'1','ACREDITAMIENTO DE LA PERSONALIDAD JUR?DICA','ACREDITAMIENTO DE LA PERSONALIDAD JUR?DICA','SI',NULL,NULL,'1xLrBY9luGf44irKzBdWsH0Ediwrcya30ZHCvoX0.csv',1,NULL,NULL,1,1),(3,23,'3','ESCRITO DE NO ENCONTRARSE EN LOS SUPUESTOS DE LOS ART?CULOS 50 Y 60 DE LA LAASSP','ESCRITO DE NO ENCONTRARSE EN LOS SUPUESTOS DE LOS ART?CULOS 50 Y 60 DE LA LAASSP','SI',NULL,NULL,'4dyDqFh3VVAxYdnCOjW77TaFz3ivMsaaFif3zgHk.docx',1,NULL,NULL,1,1),(4,22,'1','Prueba','nuevo','si',NULL,NULL,'hSzZLT8ecE9vYwsFg0bpk0qyh4qzoEjcRj6ULF4i.csv',1,NULL,NULL,1,1),(5,22,'4','Fecha','ultimo registro','si',NULL,NULL,'YRjQpKRXttR181zn8K0kHqR8sPQupwYWp8DaRf1b.csv',2,NULL,NULL,1,1),(6,23,'2','DIRECCI?N DE CORREO ELECTR?NICO DEL LICITANTE','DIRECCI?N DE CORREO ELECTR?NICO DEL LICITANTE','SI',NULL,NULL,'4DZQii0dRWg7nkhXdj8sKLp0tvnHDOIfGodK8C5y.csv',2,NULL,NULL,1,1),(7,23,'1','prueba','ninguna','si','no',NULL,'iWLLIRdiT7mJDbvBCAZ3E1Ntl6q2btbqJ4rzoCnU.txt',3,NULL,NULL,1,1),(8,23,'8','verificacion','pendientes de realizar','si','na ','no','i4dgaA4UBZRdwJNukuPfqtq6ztuI0PLSSy4KOC3S.csv',3,NULL,NULL,1,1),(9,23,'4','carta factura','copia original','si','na','no','CXcnxLyWOsDvf3cgVUcF7inAi1wlEVKB8Qb1kT2I.csv',1,NULL,NULL,1,1),(10,23,'7','color unidad','de las unidades a comoprar','si','na ','no','e3TPB1G95lDuf36Ryr1l3NPJ6v7i37vBMjjX1bSl.csv',4,NULL,NULL,1,1);
/*!40000 ALTER TABLE `licitacion_propuesta_cargafinal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_propuesta_cargapreliminar`
--

DROP TABLE IF EXISTS `licitacion_propuesta_cargapreliminar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_propuesta_cargapreliminar` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `num` varchar(45) DEFAULT NULL,
  `nombre_requerimiento` mediumtext DEFAULT NULL,
  `descripcion` mediumtext DEFAULT NULL,
  `obligatorio` varchar(45) DEFAULT NULL,
  `respuesta` varchar(45) DEFAULT NULL,
  `acciones` varchar(45) DEFAULT NULL,
  `licitaciones_id` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_propuesta_cargapreliminar_licitaciones1_idx` (`licitaciones_id`),
  CONSTRAINT `fk_licitacion_propuesta_cargapreliminar_licitaciones1` FOREIGN KEY (`licitaciones_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_propuesta_cargapreliminar`
--

LOCK TABLES `licitacion_propuesta_cargapreliminar` WRITE;
/*!40000 ALTER TABLE `licitacion_propuesta_cargapreliminar` DISABLE KEYS */;
INSERT INTO `licitacion_propuesta_cargapreliminar` VALUES (24,'2','Nuevo','segundo','si',NULL,NULL,22),(25,'3','Junio','prueba tres','si',NULL,NULL,22),(29,'5','cotizacion','a color','si','ninguna','no',23);
/*!40000 ALTER TABLE `licitacion_propuesta_cargapreliminar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_propuesta_tecnica_administrativa`
--

DROP TABLE IF EXISTS `licitacion_propuesta_tecnica_administrativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_propuesta_tecnica_administrativa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `licitacion_id` bigint(19) unsigned NOT NULL,
  `documento` mediumtext DEFAULT NULL,
  `mime_type` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `licitacion_gestor_documentos_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_propuesta_tecnica_legal_licitaciones2_idx` (`licitacion_id`),
  KEY `fk_licitacion_propuesta_tecnica_administrativa_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_propuesta_tecnica_administrativa_users2_idx` (`iduserUpdated`),
  KEY `fk_licitacion_propuesta_tecnica_administrativa_licitacion_g_idx` (`licitacion_gestor_documentos_id`),
  CONSTRAINT `fk_licitacion_propuesta_tecnica_administrativa_licitacion_ges1` FOREIGN KEY (`licitacion_gestor_documentos_id`) REFERENCES `licitacion_gestor_documentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_propuesta_tecnica_administrativa_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_propuesta_tecnica_administrativa_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_propuesta_tecnica_legal_licitaciones2` FOREIGN KEY (`licitacion_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_propuesta_tecnica_administrativa`
--

LOCK TABLES `licitacion_propuesta_tecnica_administrativa` WRITE;
/*!40000 ALTER TABLE `licitacion_propuesta_tecnica_administrativa` DISABLE KEYS */;
INSERT INTO `licitacion_propuesta_tecnica_administrativa` VALUES (1,17,'','','2023-01-24 04:42:45','2023-01-24 04:42:45',1,1,2);
/*!40000 ALTER TABLE `licitacion_propuesta_tecnica_administrativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_propuesta_tecnica_financiera`
--

DROP TABLE IF EXISTS `licitacion_propuesta_tecnica_financiera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_propuesta_tecnica_financiera` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `licitacion_id` bigint(19) unsigned NOT NULL,
  `documento` mediumtext DEFAULT NULL,
  `mime_type` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `licitacion_gestor_documentos_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_propuesta_tecnica_fiscal_licitaciones2_idx` (`licitacion_id`),
  KEY `fk_licitacion_propuesta_tecnica_financiera_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_propuesta_tecnica_financiera_users2_idx` (`iduserUpdated`),
  KEY `fk_licitacion_propuesta_tecnica_financiera_licitacion_gesto_idx` (`licitacion_gestor_documentos_id`),
  CONSTRAINT `fk_licitacion_propuesta_tecnica_financiera_licitacion_gestor_1` FOREIGN KEY (`licitacion_gestor_documentos_id`) REFERENCES `licitacion_gestor_documentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_propuesta_tecnica_financiera_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_propuesta_tecnica_financiera_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_propuesta_tecnica_fiscal_licitaciones2` FOREIGN KEY (`licitacion_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_propuesta_tecnica_financiera`
--

LOCK TABLES `licitacion_propuesta_tecnica_financiera` WRITE;
/*!40000 ALTER TABLE `licitacion_propuesta_tecnica_financiera` DISABLE KEYS */;
INSERT INTO `licitacion_propuesta_tecnica_financiera` VALUES (1,17,'','','2023-01-24 05:09:23','2023-01-24 05:09:23',1,1,4);
/*!40000 ALTER TABLE `licitacion_propuesta_tecnica_financiera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_propuesta_tecnica_fiscal`
--

DROP TABLE IF EXISTS `licitacion_propuesta_tecnica_fiscal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_propuesta_tecnica_fiscal` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `licitacion_id` bigint(19) unsigned NOT NULL,
  `documento` mediumtext DEFAULT NULL,
  `mime_type` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `licitacion_gestor_documentos_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_propuesta_tecnica_fiscal_licitaciones1_idx` (`licitacion_id`),
  KEY `fk_licitacion_propuesta_tecnica_fiscal_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_propuesta_tecnica_fiscal_users2_idx` (`iduserUpdated`),
  KEY `fk_licitacion_propuesta_tecnica_fiscal_licitacion_gestor_do_idx` (`licitacion_gestor_documentos_id`),
  CONSTRAINT `fk_licitacion_propuesta_tecnica_fiscal_licitacion_gestor_docu1` FOREIGN KEY (`licitacion_gestor_documentos_id`) REFERENCES `licitacion_gestor_documentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_propuesta_tecnica_fiscal_licitaciones1` FOREIGN KEY (`licitacion_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_propuesta_tecnica_fiscal_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_propuesta_tecnica_fiscal_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_propuesta_tecnica_fiscal`
--

LOCK TABLES `licitacion_propuesta_tecnica_fiscal` WRITE;
/*!40000 ALTER TABLE `licitacion_propuesta_tecnica_fiscal` DISABLE KEYS */;
INSERT INTO `licitacion_propuesta_tecnica_fiscal` VALUES (1,17,'','','2023-01-24 05:06:29','2023-01-24 05:06:29',1,1,3);
/*!40000 ALTER TABLE `licitacion_propuesta_tecnica_fiscal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_propuesta_tecnica_legal`
--

DROP TABLE IF EXISTS `licitacion_propuesta_tecnica_legal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_propuesta_tecnica_legal` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `licitacion_id` bigint(19) unsigned NOT NULL,
  `documento` mediumtext DEFAULT NULL,
  `mime_type` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `licitacion_gestor_documentos_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_propuesta_tecnica_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_propuesta_tecnica_users2_idx` (`iduserUpdated`),
  KEY `fk_licitacion_propuesta_tecnica_legal_licitaciones1_idx` (`licitacion_id`),
  KEY `fk_licitacion_propuesta_tecnica_legal_licitacion_gestor_doc_idx` (`licitacion_gestor_documentos_id`),
  CONSTRAINT `fk_licitacion_propuesta_tecnica_legal_licitacion_gestor_docum1` FOREIGN KEY (`licitacion_gestor_documentos_id`) REFERENCES `licitacion_gestor_documentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_propuesta_tecnica_legal_licitaciones1` FOREIGN KEY (`licitacion_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_propuesta_tecnica_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_propuesta_tecnica_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_propuesta_tecnica_legal`
--

LOCK TABLES `licitacion_propuesta_tecnica_legal` WRITE;
/*!40000 ALTER TABLE `licitacion_propuesta_tecnica_legal` DISABLE KEYS */;
INSERT INTO `licitacion_propuesta_tecnica_legal` VALUES (1,17,'','','2023-01-24 04:40:46','2023-01-24 04:40:46',1,1,1);
/*!40000 ALTER TABLE `licitacion_propuesta_tecnica_legal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_propuesta_tecnica_otro`
--

DROP TABLE IF EXISTS `licitacion_propuesta_tecnica_otro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_propuesta_tecnica_otro` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `licitacion_id` bigint(19) unsigned NOT NULL,
  `licitacion_informacion_otro` mediumtext NOT NULL,
  `documento` mediumtext DEFAULT NULL,
  `mime_type` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_propuesta_tecnica_otros_licitaciones1_idx` (`licitacion_id`),
  KEY `fk_licitacion_propuesta_tecnica_otro_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_propuesta_tecnica_otro_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_licitacion_propuesta_tecnica_otro_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_propuesta_tecnica_otro_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_propuesta_tecnica_otros_licitaciones1` FOREIGN KEY (`licitacion_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_propuesta_tecnica_otro`
--

LOCK TABLES `licitacion_propuesta_tecnica_otro` WRITE;
/*!40000 ALTER TABLE `licitacion_propuesta_tecnica_otro` DISABLE KEYS */;
INSERT INTO `licitacion_propuesta_tecnica_otro` VALUES (1,17,'Nuevo','kTZHg5VPm4rADFb85JDPBDYN4XukRgctDLZUMjUG.pdf','application/pdf','2023-01-24 05:09:38','2023-01-24 05:09:38',1,1);
/*!40000 ALTER TABLE `licitacion_propuesta_tecnica_otro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_segmento`
--

DROP TABLE IF EXISTS `licitacion_segmento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_segmento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licitacion_id` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `observaciones` mediumtext DEFAULT NULL,
  `numero_sostenibilidad` varchar(255) DEFAULT NULL,
  `importe` decimal(15,2) DEFAULT NULL,
  `vigencia_fianza` date DEFAULT NULL,
  `afianzadoras_id` bigint(20) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_segmento_licitaciones1_idx` (`licitacion_id`),
  KEY `fk_licitacion_segmento_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_segmento_users2_idx` (`iduserUpdated`),
  KEY `fk_licitacion_segmento_afianzadoras1_idx` (`afianzadoras_id`),
  CONSTRAINT `fk_licitacion_segmento_afianzadoras1` FOREIGN KEY (`afianzadoras_id`) REFERENCES `afianzadoras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_segmento_licitaciones1` FOREIGN KEY (`licitacion_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_segmento_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitacion_segmento_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_segmento`
--

LOCK TABLES `licitacion_segmento` WRITE;
/*!40000 ALTER TABLE `licitacion_segmento` DISABLE KEYS */;
INSERT INTO `licitacion_segmento` VALUES (7,13,'2022-07-29 04:03:04','2022-08-09 20:29:29','Nuevas observaciones',NULL,NULL,NULL,0,1,1),(10,15,'2022-08-26 03:33:44','2022-10-14 06:08:36',NULL,NULL,NULL,NULL,0,1,1),(11,16,'2023-01-02 20:39:11','2023-09-23 03:24:03','no','10',15000.00,'2022-12-28',1,1,1),(12,17,'2023-01-02 21:08:24','2023-09-14 05:39:53',NULL,'5',100000.00,'2023-01-05',1,1,1),(13,17,'2023-01-02 21:13:41','2023-09-14 05:39:53',NULL,'5',100000.00,'2023-01-05',1,1,1),(14,22,'2023-02-08 02:47:28','2023-05-11 04:50:25',NULL,NULL,NULL,NULL,1,1,1),(15,23,'2023-05-09 04:18:34','2023-11-01 04:46:23','ninguna','654974',98700.00,'2023-09-03',1,1,1);
/*!40000 ALTER TABLE `licitacion_segmento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacion_status_proyecto`
--

DROP TABLE IF EXISTS `licitacion_status_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacion_status_proyecto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitacion_status_proyecto_users1_idx` (`iduserCreated`),
  KEY `fk_licitacion_status_proyecto_users2_idx` (`iduserUpdated`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacion_status_proyecto`
--

LOCK TABLES `licitacion_status_proyecto` WRITE;
/*!40000 ALTER TABLE `licitacion_status_proyecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `licitacion_status_proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitaciones`
--

DROP TABLE IF EXISTS `licitaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitaciones` (
  `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,
  `cliente` int(10) unsigned NOT NULL,
  `id_licitacion_estatus` bigint(20) NOT NULL,
  `id_licitacion_prioridad` bigint(20) NOT NULL,
  `folio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_servicio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folio_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empresa_dependencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_licitacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contratacion` int(11) NOT NULL DEFAULT 0,
  `fecha_visita` date DEFAULT NULL,
  `junta_aclaraciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apertura_proposiciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acto_fallo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `participacion_conjunta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publicacion_licitacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monto_ofertado` decimal(15,2) DEFAULT NULL,
  `monto_ganado` decimal(15,2) DEFAULT NULL,
  `monto_fianza` decimal(15,2) DEFAULT NULL,
  `porcentaje_efectividad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firma_entrega` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `tipo_documento` int(11) DEFAULT 0,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monto_fianza_liberada` decimal(15,2) DEFAULT NULL,
  `fecha_fianza` date DEFAULT NULL,
  `id_contrato` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_contrato` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `motivo_desactivar` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `sector` int(11) DEFAULT NULL,
  `tipo_partida` int(11) DEFAULT NULL,
  `fecha_final_servicios` date DEFAULT NULL,
  `numero_vehiculos` int(11) DEFAULT NULL,
  `tipo_contrato` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licitaciones_client1_idx` (`cliente`),
  KEY `fk_licitaciones_licitacion_estatus1_idx` (`id_licitacion_estatus`),
  KEY `fk_licitaciones_licitacion_prioridad1_idx` (`id_licitacion_prioridad`),
  KEY `fk_licitaciones_users1_idx` (`iduserCreated`),
  KEY `fk_licitaciones_users2_idx` (`iduserUpdated`),
  KEY `fk_licitaciones_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_licitaciones_client1` FOREIGN KEY (`cliente`) REFERENCES `client` (`id_cliente`),
  CONSTRAINT `fk_licitaciones_licitacion_estatus1` FOREIGN KEY (`id_licitacion_estatus`) REFERENCES `licitacion_estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitaciones_licitacion_prioridad1` FOREIGN KEY (`id_licitacion_prioridad`) REFERENCES `licitacion_prioridad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitaciones_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitaciones_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_licitaciones_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitaciones`
--

LOCK TABLES `licitaciones` WRITE;
/*!40000 ALTER TABLE `licitaciones` DISABLE KEYS */;
INSERT INTO `licitaciones` VALUES (13,4,2,1,'L00006','Prueba Licitacion',NULL,NULL,'1FH',2,'2022-07-15','2022-07-09','2022-07-14','2022-07-09','Prueba','2',50000.00,50000.00,10000.00,'6','2022-07-16','2022-07-02','2022-07-29',0,NULL,10000.00,NULL,NULL,NULL,1,NULL,1,1,0,NULL,NULL,NULL,0,'2022-08-11 23:34:05','2022-07-21 00:54:01'),(14,4,2,1,'L00007','Prueba Licitacion',NULL,NULL,'4',2,'2022-07-15','2022-07-31','2022-08-04','2022-08-07','Prueba','3',100000.00,90000.00,5000.00,'5','2022-07-29','2022-07-31','2022-08-04',0,NULL,NULL,NULL,NULL,NULL,1,NULL,1,1,0,NULL,NULL,NULL,0,'2023-01-02 21:45:41','2022-07-28 02:14:47'),(15,4,2,1,'L00008','Nueva licitacion',NULL,NULL,'4',2,'2022-07-21','2022-07-17','2022-08-05','2022-07-16','Prueba','2',10000.00,10000.00,10000.00,'6','2022-07-16','2022-07-24','2022-07-29',0,NULL,NULL,'2022-03-06',NULL,NULL,1,NULL,1,1,0,NULL,NULL,NULL,0,'2022-10-21 22:32:25','2022-07-28 21:34:39'),(16,2,2,1,'L00009','Prueba Licitacion',NULL,NULL,'4FER',1,'2022-11-12','2022-11-27','2022-11-25','2022-11-26','Prueba','3',1500000.00,5000000.00,10000.00,'1','2022-12-03','2022-11-13','2022-12-02',0,NULL,1000000.00,'2022-12-03',NULL,NULL,1,'El concurso ya no entra en planes de empresa',1,1,1,NULL,NULL,NULL,0,'2023-01-12 04:30:32','2022-11-12 05:40:08'),(17,2,1,1,'L00010','Prueba acto fallo',NULL,NULL,'1345',1,NULL,'2022-12-30',NULL,'2023-01-27',NULL,'1',50000.00,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,1,NULL,1,1,1,NULL,NULL,NULL,0,'2023-01-26 04:29:18','2023-01-02 20:52:29'),(22,2,1,1,'L00015','NUEVO',NULL,NULL,'PRU-NOT-1',1,NULL,NULL,NULL,'2023-01-26',NULL,'1',50000.00,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,1,NULL,1,1,0,0,NULL,NULL,1,'2023-05-10 05:47:44','2023-01-26 04:00:33'),(23,2,1,1,'L00017','FERNANDO PRUEBA',NULL,NULL,'4',1,'2023-05-05','2023-05-12','2023-05-14',NULL,NULL,'1',NULL,NULL,NULL,NULL,'2023-06-03','2023-05-14',NULL,0,NULL,NULL,NULL,NULL,NULL,1,NULL,1,1,1,1,'2023-05-19',10,1,'2023-08-03 06:13:49','2023-05-08 22:12:31');
/*!40000 ALTER TABLE `licitaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca_unidad`
--

DROP TABLE IF EXISTS `marca_unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca_unidad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_marca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_marca_unidad_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_marca_unidad_users1_idx` (`iduserCreated`),
  KEY `fk_marca_unidad_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_marca_unidad_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_marca_unidad_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_marca_unidad_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca_unidad`
--

LOCK TABLES `marca_unidad` WRITE;
/*!40000 ALTER TABLE `marca_unidad` DISABLE KEYS */;
INSERT INTO `marca_unidad` VALUES (1,'NISSAN',1,1,1,NULL,'2022-06-16 20:10:57'),(2,'VOLKSWAGEN',1,1,1,NULL,NULL),(3,'DODGE',1,1,1,NULL,NULL),(4,'KIA',1,1,1,NULL,NULL),(5,'TOYOTA',1,1,1,NULL,NULL),(16,'FORTON',1,1,1,'2022-09-14 21:13:58','2022-09-14 16:13:58'),(64,'FORD',1,1,1,'2022-09-14 22:13:33','2022-09-14 17:13:33'),(65,'SUZUKI',2,1,1,'2022-09-14 22:13:33','2022-11-11 20:56:28');
/*!40000 ALTER TABLE `marca_unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `conversations_id` bigint(20) NOT NULL,
  `user_id` bigint(19) unsigned NOT NULL,
  `message` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_messages_conversations1_idx` (`conversations_id`),
  KEY `fk_messages_users1_idx` (`user_id`),
  KEY `fk_messages_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_messages_conversations1` FOREIGN KEY (`conversations_id`) REFERENCES `conversations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,1,1,'hola','2023-10-04 23:07:39','2023-10-04 23:07:39',1),(2,1,1,'hola','2023-10-04 23:08:23','2023-10-04 23:08:23',1);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (5,'2014_10_12_000000_create_users_table',1),(6,'2014_10_12_100000_create_password_resets_table',1),(7,'2019_08_19_000000_create_failed_jobs_table',1),(8,'2019_12_14_000001_create_personal_access_tokens_table',1),(9,'2022_04_27_142908_create_unidad_table',2),(10,'2022_04_27_143122_create_complemento_unidad_table',3),(11,'2022_04_27_143157_create_foto_unidad_table',3),(12,'2022_04_27_143224_create_ubicacion_unidad_table',3),(13,'2022_04_27_143253_create_modelo_unidad_table',3),(14,'2022_04_27_143314_create_marca_unidad_table',3),(15,'2022_04_27_143337_create_aseguradora_unidad_table',3),(16,'2022_04_27_143404_create_status_unidad_table',3),(17,'2022_04_26_174046_create_municipio_table',4),(18,'2022_04_26_174115_create_estado_table',5),(19,'2022_04_26_174029_create_client_table',6),(20,'2022_04_28_180134_rename_udpated_at_in_ubicacion_unidad_table',7),(21,'2022_04_28_181118_rename_udpated_at_in_status_unidad_table',8),(22,'2022_04_28_182032_rename_udpated_at_in_modelo_unidad_table',9),(23,'2022_04_28_182641_rename_udpated_at_in_marca_unidad_table',10),(24,'2022_04_28_182820_rename_udpated_at_in_complemento_unidad_table',11),(25,'2022_04_28_182943_rename_udpated_at_in_aseguradora_unidad_table',12),(26,'2022_04_28_183029_rename_udpated_at_in_foto_unidad_table',13),(27,'2022_04_28_183120_rename_udpated_at_in_unidad_table',14),(28,'2022_04_28_184801_add_status_delete_to_status_unidad',15),(29,'2022_04_28_185126_add_status_delete_to_aseguradora_unidad',16),(30,'2022_04_28_185308_add_status_delete_to_marca_unidad',17),(31,'2022_04_28_185341_add_status_delete_to_modelo_unidad',18),(32,'2022_04_28_185417_add_status_delete_to_ubicacion_unidad',19),(33,'2022_04_28_185450_add_status_delete_to_unidad',20),(34,'2022_04_28_182418_update_cliente_table',21),(35,'2022_04_28_182808_update_municipio_table',21),(36,'2022_05_06_145323_create_emisores_table',22),(37,'2022_05_06_145600_create_tipo_contrato_table',23),(38,'2022_05_06_145732_create_fuente_proyecto_table',24),(39,'2022_05_06_150509_rename_udpated_at_in_emisores_table',25),(40,'2022_05_06_150602_rename_udpated_at_in_tipo_contrato_table',26),(41,'2022_05_06_150645_rename_udpated_at_in_fuente_proyecto_table',27),(42,'2022_05_06_174407_add_status_delete_to_cliente',28),(43,'2022_05_06_181108_create_proyectos_table',29),(44,'2022_05_06_211031_add_status_delete_to_municipio',30),(45,'2022_05_06_215913_add_status_delete_to_estado',31),(46,'2022_05_09_202503_create_tipo_documentos_licitaciones_table',32),(47,'2022_05_09_205434_rename_udpated_at_in_tipo_documentos_licitaciones_table',33),(48,'2022_05_11_151621_create_licitaciones_table',34),(49,'2022_05_11_152927_add_observaciones_to_licitaciones',35),(50,'2022_05_11_181713_create_documentos_licitaciones_table',36),(51,'2022_05_11_182735_add_tipo_documento_to_documentos_licitaciones',37),(52,'2022_05_13_173117_add_empresa_to_licitaciones',38),(53,'2022_05_16_152653_create_publicacion_licitacion_table',39),(54,'2022_05_16_154249_rename_udpated_at_in_publicacion_licitacion_table',40),(55,'2022_05_19_162557_create_unidades_presupuestos_table',41),(56,'2022_05_19_162858_create_presupuesto_licitacion_table',41),(57,'2022_05_19_164344_add_folio_num_to_presupuesto_licitacion',42),(58,'2022_05_19_171722_add_status_delete_to_presupuesto_licitacion',43),(59,'2022_05_19_183513_add_status_delete_to_users',44),(60,'2022_05_19_185615_create_roles_user_table',45),(61,'2022_05_19_194534_add_rol_to_users',46),(62,'2022_05_25_174653_create_permission_tables',47),(63,'2022_05_25_213912_add_modulo_permiso_to_permissions',48),(64,'2022_05_30_161729_create_tipo_contratacion_table',49),(65,'2022_05_30_181013_add_prioridad_to_licitaciones',50),(66,'2022_05_31_180309_create_pago_proyecto_table',51),(67,'2022_05_31_215040_add_id_estado_to_municipio',52),(68,'2022_06_01_214854_add_importe_general_to_proyectos',53),(69,'2022_06_03_210428_add_contrato_op_to_proyectos',54),(70,'2022_06_03_215547_add_factura_to_pago_proyecto',55),(71,'2022_06_06_172009_add_licitacion_id_to_proyectos',56),(72,'2022_06_10_170433_create_unidad_folio_table',57),(73,'2022_06_10_181954_update_unidad_table',57),(74,'2022_06_10_191156_update_unidad_table',57),(75,'2022_06_10_191416_update_unidad_table',57),(76,'2022_06_15_200601_add_status_delete_to_roles',58),(77,'2022_06_15_193637_create_licitacion_folio_table',59),(78,'2022_06_15_214743_update_licitacion_table',59),(79,'2022_06_29_190637_add_colonia_to_aseguradora_unidad',59),(80,'2022_06_30_180355_add_rfc_to_users',60),(81,'2022_07_01_192246_create_agencia_unidad_table',61),(82,'2022_07_01_193516_create_proveedores_table',62),(83,'2022_07_01_194714_add_status_delete_to_proveedores',63),(84,'2022_07_01_194824_add_status_delete_to_agencia_unidad',63),(85,'2022_07_05_172421_add_factura_compra_to_unidad',64),(86,'2022_07_05_192304_add_supervisor_proyecto_to_proyectos',65),(87,'2022_07_06_160600_create_proyecto_documento_table',66),(88,'2022_07_06_160600_create_proyecto_tipo_documento_table',66),(89,'2022_07_06_160601_add_foreign_keys_to_proyecto_documento_table',66),(90,'2022_07_06_160601_add_foreign_keys_to_proyecto_tipo_documento_table',66),(91,'2022_07_07_195435_add_fecha_contrato_to_proyectos',67),(92,'2022_07_11_152935_create_licitacion_status_proyecto_table',68),(93,'2022_07_11_155234_create_licitacion_status_proyecto_table',69),(94,'2022_07_11_155950_create_licitacion_status_proyecto_table',70),(95,'2022_07_11_173613_create_licitacion_estatus_table',0),(96,'2022_07_11_173614_add_foreign_keys_to_licitacion_estatus_table',0),(97,'2022_07_12_170632_create_licitacion_estatus_table',0),(98,'2022_07_12_170633_add_foreign_keys_to_licitacion_estatus_table',0),(99,'2022_07_12_171029_create_licitacion_estatus_table',0),(100,'2022_07_12_171029_create_licitaciones_table',0),(101,'2022_07_12_171030_add_foreign_keys_to_licitacion_estatus_table',0),(102,'2022_07_12_171030_add_foreign_keys_to_licitaciones_table',0);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(19) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(19) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelo_unidad`
--

DROP TABLE IF EXISTS `modelo_unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelo_unidad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_modelo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_modelo_unidad_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_modelo_unidad_users1_idx` (`iduserCreated`),
  KEY `fk_modelo_unidad_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_modelo_unidad_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_modelo_unidad_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_modelo_unidad_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelo_unidad`
--

LOCK TABLES `modelo_unidad` WRITE;
/*!40000 ALTER TABLE `modelo_unidad` DISABLE KEYS */;
INSERT INTO `modelo_unidad` VALUES (1,'Frontier',1,0,0,NULL,'2022-06-13 23:43:06'),(2,'Jetta',1,0,0,NULL,NULL),(3,'Ram 1500/2500',1,0,0,NULL,NULL),(4,'Versa',1,0,0,NULL,NULL),(5,'Forte',1,0,0,NULL,NULL),(6,'Charger',1,0,0,NULL,NULL),(8,'Pruebafer',1,0,0,'2022-04-28 01:16:43','2022-04-29 21:45:12'),(9,'Prueba',1,0,0,'2022-06-13 22:14:05','2022-06-13 17:14:05'),(25,'F-150',1,1,1,'2022-09-14 22:13:33','2022-09-14 17:13:33'),(26,'COROLLA',1,1,1,'2022-09-14 22:13:33','2022-09-14 17:13:33'),(27,'TIDA',1,1,1,'2022-09-14 22:13:33','2022-09-14 17:13:33'),(28,'MUSTANG',1,1,1,'2022-09-14 22:13:33','2022-09-14 17:13:33'),(29,'SWIFT',1,1,1,'2022-09-14 22:13:33','2022-09-14 17:13:33'),(30,'Altima',1,1,1,'2022-09-20 03:44:59','2022-09-19 22:44:59'),(42,'NISSAN',1,1,1,'2022-12-22 12:06:04','2022-12-22 06:06:04'),(49,'FUSION',1,1,1,'2023-09-12 04:00:16','2023-09-11 22:00:16');
/*!40000 ALTER TABLE `modelo_unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipio` (
  `id_municipio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `municipio_nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_estado` int(11) NOT NULL DEFAULT 0,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id_municipio`),
  UNIQUE KEY `municipio_municipio_nombre_unique` (`municipio_nombre`),
  KEY `fk_municipio_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_municipio_users1_idx` (`iduserCreated`),
  KEY `fk_municipio_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_municipio_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_municipio_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_municipio_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=447 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,'AGUASCALIENTES',1,1,'2022-06-21 03:22:21','2022-08-23 02:01:24',1,1),(2,'ASIENTOS',1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(3,'CALVILLO',1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(4,'COSIO',1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(5,'JESUS MARIA',1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(6,'PABELLON DE ARTEAGA',1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(7,'RINCON DE ROMOS',1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(8,'SAN JOSE DE GRACIA',1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(9,'TEPEZALA',1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(10,'EL LLANO',1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(11,'SAN FRANCISCO DE LOS ROMO',1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(12,'ENSENADA',2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(13,'MEXICALI',2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(14,'TECATE',2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(15,'TIJUANA',2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(16,'PLAYAS DE ROSARITO',2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(17,'SAN QUINTIN',2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(18,'SAN FELIPE',2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(19,'COMONDU',3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(20,'MULEGE',3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(21,'LA PAZ',3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(22,'LOS CABOS',3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(23,'LORETO',3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(24,'CALKINI',4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(25,'CAMPECHE',4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(26,'CARMEN',4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(27,'CHAMPOTON',4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(28,'HECELCHAKAN',4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(29,'HOPELCHEN',4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(30,'PALIZADA',4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(31,'TENABO',4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(32,'ESCARCEGA',4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(33,'CALAKMUL',4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(34,'CANDELARIA',4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(35,'SEYBAPLAYA',4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(36,'DZITBALCHE',4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(37,'ABASOLO',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(38,'ACU?A',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(39,'ALLENDE',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(40,'ARTEAGA',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(41,'CANDELA',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(42,'CASTA?OS',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(43,'CUATRO CIENEGAS',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(44,'ESCOBEDO',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(45,'FRANCISCO I. MADERO',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(46,'FRONTERA',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(47,'GENERAL CEPEDA',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(48,'GUERRERO',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(49,'HIDALGO',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(50,'JIMENEZ',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(51,'JUAREZ',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(52,'LAMADRID',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(53,'MATAMOROS',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(54,'MONCLOVA',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(55,'MORELOS',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(56,'MUZQUIZ',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(57,'NADADORES',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(58,'NAVA',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(59,'OCAMPO',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(60,'PARRAS',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(61,'PIEDRAS NEGRAS',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(62,'PROGRESO',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(63,'RAMOS ARIZPE',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(64,'SABINAS',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(65,'SACRAMENTO',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(66,'SALTILLO',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(67,'SAN BUENAVENTURA',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(68,'SAN JUAN DE SABINAS',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(69,'SAN PEDRO',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(70,'SIERRA MOJADA',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(71,'TORREON',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(72,'VIESCA',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(73,'VILLA UNION',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(74,'ZARAGOZA',5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(75,'ARMERIA',6,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(76,'COLIMA',6,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(77,'COMALA',6,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(78,'COQUIMATLAN',6,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(79,'CUAUHTEMOC',6,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(80,'IXTLAHUACAN',6,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(81,'MANZANILLO',6,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(82,'MINATITLAN',6,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(83,'TECOMAN',6,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(84,'VILLA DE ALVAREZ',6,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(85,'ACACOYAGUA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(86,'ACALA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(87,'ACAPETAHUA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(88,'ALTAMIRANO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(89,'AMATAN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(90,'AMATENANGO DE LA FRONTERA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(91,'AMATENANGO DEL VALLE',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(92,'ANGEL ALBINO CORZO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(93,'ARRIAGA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(94,'BEJUCAL DE OCAMPO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(95,'BELLA VISTA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(96,'BERRIOZABAL',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(97,'BOCHIL',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(98,'EL BOSQUE',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(99,'CACAHOATAN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(100,'CATAZAJA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(101,'CINTALAPA DE FIGUEROA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(102,'COAPILLA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(103,'COMITAN DE DOMINGUEZ',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(104,'LA CONCORDIA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(105,'COPAINALA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(106,'CHALCHIHUITAN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(107,'CHAMULA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(108,'CHANAL',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(109,'CHAPULTENANGO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(110,'CHENALHO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(111,'CHIAPA DE CORZO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(112,'CHIAPILLA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(113,'CHICOASEN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(114,'CHICOMUSELO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(115,'CHILON',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(116,'ESCUINTLA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(117,'FRANCISCO LEON',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(118,'FRONTERA COMALAPA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(119,'FRONTERA HIDALGO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(120,'LA GRANDEZA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(121,'HUEHUETAN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(122,'HUIXTAN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(123,'HUITIUPAN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(124,'HUIXTLA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(125,'LA INDEPENDENCIA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(126,'IXHUATAN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(127,'IXTACOMITAN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(128,'IXTAPA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(129,'IXTAPANGAJOYA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(130,'JIQUIPILAS',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(131,'JITOTOL',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(132,'JUAREZZ',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(133,'LARRAINZAR',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(134,'LA LIBERTAD',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(135,'MAPASTEPEC',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(136,'LAS MARGARITAS',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(137,'MAZAPA DE MADERO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(138,'MAZATAN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(139,'METAPA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(140,'MITONTIC',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(141,'MOTOZINTLA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(142,'NICOLAS RUIZ',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(143,'OCOSINGO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(144,'OCOTEPEC',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(145,'OCOZOCOAUTLA DE ESPINOSA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(146,'OSTUACAN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(147,'OSUMACINTA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(148,'OXCHUC',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(149,'PALENQUE',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(150,'PANTELHO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(151,'PANTEPEC',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(152,'PICHUCALCO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(153,'PIJIJIAPAN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(154,'EL PORVENIR',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(155,'VILLA COMALTITLAN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(156,'PUEBLO NUEVO SOLISTAHUACAN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(157,'RAYON',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(158,'REFORMA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(159,'LAS ROSAS',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(160,'SABANILLA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(161,'SALTO DE AGUA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(162,'SAN CRISTOBAL DE LAS CASAS',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(163,'SAN FERNANDO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(164,'SILTEPEC',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(165,'SIMOJOVEL',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(166,'SITALA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(167,'SOCOLTENANGO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(168,'SOLOSUCHIAPA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(169,'SOYALO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(170,'SUCHIAPA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(171,'SUCHIATE',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(172,'SUNUAPA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(173,'TAPACHULA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(174,'TAPALAPA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(175,'TAPILULA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(176,'TECPATAN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(177,'TENEJAPA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(178,'TEOPISCA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(179,'TILA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(180,'TONALA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(181,'TOTOLAPA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(182,'LA TRINITARIA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(183,'TUMBALA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(184,'TUXTLA GUTIERREZ',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(185,'TUXTLA CHICO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(186,'TUZANTAN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(187,'TZIMOL',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(188,'UNION JUAREZ',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(189,'VENUSTIANO CARRANZA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(190,'VILLA CORZO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(191,'VILLAFLORES',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(192,'YAJALON',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(193,'SAN LUCAS',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(194,'ZINACANTAN',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(195,'SAN JUAN CANCUC',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(196,'ALDAMA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(197,'BENEMERITO DE LAS AMERICAS',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(198,'MARAVILLA TENEJAPA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(199,'MARQUES DE COMILLAS',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(200,'MONTECRISTO DE GUERRERO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(201,'SAN ANDRES DURAZNAL',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(202,'SANTIAGO EL PINAR',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(203,'CAPITAN LUIS ANGEL VIDAL',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(204,'RINCON CHAMULA SAN PEDRO',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(205,'EL PARRAL',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(206,'EMILIANO ZAPATA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(207,'MEZCALAPA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(208,'HONDURAS DE LA SIERRA',7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(209,'AHUMADA',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(210,'ALDAMAa',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(212,'AQUILES SERDAN',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(213,'ASCENSION',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(214,'BACHINIVA',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(215,'BALLEZA',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(216,'BATOPILAS DE MANUEL GOMEZ MORIN',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(217,'BOCOYNA',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(218,'BUENAVENTURA',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(219,'CAMARGO',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(220,'CARICHI',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(221,'CASAS GRANDES',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(222,'CORONADO',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(223,'COYAME DEL SOTOL',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(224,'LA CRUZ',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(226,'CUSIHUIRIACHI',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(227,'CHIHUAHUA',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(228,'CHINIPAS',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(229,'DELICIAS',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(230,'DR. BELISARIO DOMINGUEZ',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(231,'GALEANA',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(232,'SANTA ISABEL',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(233,'GOMEZ FARIAS',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(234,'GRAN MORELOS',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(235,'GUACHOCHI',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(236,'GUADALUPE',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(237,'GUADALUPE Y CALVO',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(238,'GUAZAPARES',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(240,'HIDALGO DEL PARRAL',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(241,'HUEJOTITAN',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(242,'IGNACIO ZARAGOZA',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(243,'JANOS',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(246,'JULIMES',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(247,'LOPEZ',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(248,'MADERA',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(249,'MAGUARICHI',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(250,'MANUEL BENAVIDES',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(251,'MATACHI',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(253,'MEOQUI',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(255,'MORIS',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(256,'NAMIQUIPA',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(257,'NONOAVA',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(258,'NUEVO CASAS GRANDES',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(260,'OJINAGA',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(261,'PRAXEDIS G. GUERRERO',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(262,'RIVA PALACIO',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(263,'ROSALES',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(264,'ROSARIO',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(265,'SAN FRANCISCO DE BORJA',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(266,'SAN FRANCISCO DE CONCHOS',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(267,'SAN FRANCISCO DEL ORO',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(268,'SANTA BARBARA',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(269,'SATEVO',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(270,'SAUCILLO',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(271,'TEMOSACHIC',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(272,'EL TULE',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(273,'URIQUE',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(274,'URUACHI',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(275,'VALLE DE ZARAGOZA',8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(276,'AZCAPOTZALCO',9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(277,'COYOACAN',9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(278,'CUAJIMALPA DE MORELOS',9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(279,'GUSTAVO A. MADERO',9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(280,'IZTACALCO',9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(281,'IZTAPALAPA',9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(282,'LA MAGDALENA CONTRERAS',9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(283,'MILPA ALTA',9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(284,'ALVARO OBREGON',9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(285,'TLAHUAC',9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(286,'TLALPAN',9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(287,'XOCHIMILCO',9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(288,'BENITO JUAREZ',9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(290,'MIGUEL HIDALGO',9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(292,'CANATLAN',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(293,'CANELAS',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(294,'CONETO DE COMONFORT',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(295,'CUENCAME',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(296,'DURANGO',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(297,'GENERAL SIMON BOLIVAR',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(298,'GOMEZ PALACIO',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(299,'GUADALUPE VICTORIA',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(300,'GUANACEVI',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(302,'INDE',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(303,'LERDO',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(304,'MAPIMI',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(305,'MEZQUITAL',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(306,'NAZAS',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(307,'NOMBRE DE DIOS',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(309,'EL ORO',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(310,'OTAEZ',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(311,'PANUCO DE CORONADO',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(312,'PE?ON BLANCO',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(313,'POANAS',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(314,'PUEBLO NUEVO',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(315,'RODEO',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(316,'SAN BERNARDO',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(317,'SAN DIMAS',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(318,'SAN JUAN DE GUADALUPE',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(319,'SAN JUAN DEL RIO',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(320,'SAN LUIS DEL CORDERO',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(321,'SAN PEDRO DEL GALLO',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(322,'SANTA CLARA',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(323,'SANTIAGO PAPASQUIARO',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(324,'SUCHIL',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(325,'TAMAZULA',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(326,'TEPEHUANES',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(327,'TLAHUALILO',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(328,'TOPIA',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(329,'VICENTE GUERRERO',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(330,'NUEVO IDEAL',10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(332,'ACAMBARO',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(333,'SAN MIGUEL DE ALLENDE',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(334,'APASEO EL ALTO',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(335,'APASEO EL GRANDE',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(336,'ATARJEA',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(337,'CELAYA',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(338,'MANUEL DOBLADO',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(339,'COMONFORT',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(340,'CORONEO',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(341,'CORTAZAR',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(342,'CUERAMARO',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(343,'DOCTOR MORA',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(344,'DOLORES HIDALGO CUNA DE LA INDEPENDENCIA NACIONAL',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(345,'GUANAJUATO',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(346,'HUANIMARO',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(347,'IRAPUATO',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(348,'JARAL DEL PROGRESO',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(349,'JERECUARO',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(350,'LEON',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(351,'MOROLEON',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(353,'PENJAMO',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(355,'PURISIMA DEL RINCON',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(356,'ROMITA',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(357,'SALAMANCA',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(358,'SALVATIERRA',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(359,'SAN DIEGO DE LA UNION',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(361,'SAN FRANCISCO DEL RINCON',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(362,'SAN JOSE ITURBIDE',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(363,'SAN LUIS DE LA PAZ',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(364,'SANTA CATARINA',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(365,'SANTA CRUZ DE JUVENTINO ROSAS',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(366,'SANTIAGO MARAVATIO',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(367,'SILAO DE LA VICTORIA',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(368,'TARANDACUAO',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(369,'TARIMORO',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(370,'TIERRA BLANCA',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(371,'URIANGATO',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(372,'VALLE DE SANTIAGO',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(373,'VICTORIA',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(374,'VILLAGRAN',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(375,'XICHU',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(376,'YURIRIA',11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(377,'ACAPULCO DE JUAREZ',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(378,'AHUACUOTZINGO',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(379,'AJUCHITLAN DEL PROGRESO',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(380,'ALCOZAUCA DE GUERRERO',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(381,'ALPOYECA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(382,'APAXTLA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(383,'ARCELIA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(384,'ATENANGO DEL RIO',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(385,'ATLAMAJALCINGO DEL MONTE',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(386,'ATLIXTAC',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(387,'ATOYAC DE ALVAREZ',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(388,'AYUTLA DE LOS LIBRES',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(389,'AZOYU',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(391,'BUENAVISTA DE CUELLAR',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(392,'COAHUAYUTLA DE JOSE MARIA IZAZAGA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(393,'COCULA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(394,'COPALA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(395,'COPALILLO',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(396,'COPANATOYAC',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(397,'COYUCA DE BENITEZ',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(398,'COYUCA DE CATALAN',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(399,'CUAJINICUILAPA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(400,'CUALAC',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(401,'CUAUTEPEC',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(402,'CUETZALA DEL PROGRESO',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(403,'CUTZAMALA DE PINZON',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(404,'CHILAPA DE ALVAREZ',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(405,'CHILPANCINGO DE LOS BRAVO',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(406,'FLORENCIO VILLARREAL',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(407,'GENERAL CANUTO A. NERI',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(408,'GENERAL HELIODORO CASTILLO',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(409,'HUAMUXTITLAN',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(410,'HUITZUCO DE LOS FIGUEROA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(411,'IGUALA DE LA INDEPENDENCIA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(412,'IGUALAPA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(413,'IXCATEOPAN DE CUAUHTEMOC',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(414,'ZIHUATANEJO DE AZUETA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(415,'JUAN R. ESCUDERO',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(416,'LEONARDO BRAVO',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(417,'MALINALTEPEC',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(418,'MARTIR DE CUILAPAN',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(419,'METLATONOC',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(420,'MOCHITLAN',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(421,'OLINALA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(422,'OMETEPEC',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(423,'PEDRO ASCENCIO ALQUISIRAS',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(424,'PETATLAN',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(425,'PILCAYA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(426,'PUNGARABATO',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(427,'QUECHULTENANGO',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(428,'SAN LUIS ACATLAN',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(429,'SAN MARCOS',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(430,'SAN MIGUEL TOTOLAPAN',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(431,'TAXCO DE ALARCON',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(432,'TECOANAPA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(433,'TECPAN DE GALEANA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(434,'TELOLOAPAN',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(435,'TEPECOACUILCO DE TRUJANO',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(436,'TETIPAC',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(437,'TIXTLA DE GUERRERO',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(438,'TLACOACHISTLAHUACA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(439,'TLACOAPA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(440,'TLALCHAPA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(441,'TLALIXTAQUILLA DE MALDONADO',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(442,'TLAPA DE COMONFORT',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(443,'TLAPEHUALA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(444,'LA UNION DE ISIDORO MONTES DE OCA',12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,1),(446,'Prueba1',1,1,'2022-06-01 19:40:44','2022-06-01 19:40:44',1,1);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificaciones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `notificacion` mediumtext DEFAULT NULL,
  `fecha_notificacion` date DEFAULT NULL,
  `users_modifico` bigint(19) unsigned NOT NULL,
  `modulo_id` bigint(20) NOT NULL,
  `notificaciones_tipo_id` bigint(20) NOT NULL,
  `notificacion_estatus` bigint(20) NOT NULL,
  `users_permiso` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `notificaciones_usuario_id` bigint(20) DEFAULT NULL,
  `licitaciones_id` bigint(19) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notificaciones_notificaciones_modulo1_idx` (`modulo_id`),
  KEY `fk_notificaciones_users1_idx` (`users_modifico`),
  KEY `fk_notificaciones_notificaciones_tipo1_idx` (`notificaciones_tipo_id`),
  KEY `fk_notificaciones_notificaciones_estatus1_idx` (`notificacion_estatus`),
  KEY `fk_notificaciones_users2_idx` (`users_permiso`),
  KEY `fk_notificaciones_notificaciones_usuario1_idx` (`notificaciones_usuario_id`),
  KEY `fk_notificaciones_licitaciones1_idx` (`licitaciones_id`),
  CONSTRAINT `fk_notificaciones_licitaciones1` FOREIGN KEY (`licitaciones_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificaciones_notificaciones_estatus1` FOREIGN KEY (`notificacion_estatus`) REFERENCES `notificaciones_estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificaciones_notificaciones_modulo1` FOREIGN KEY (`modulo_id`) REFERENCES `notificaciones_modulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificaciones_notificaciones_tipo1` FOREIGN KEY (`notificaciones_tipo_id`) REFERENCES `notificaciones_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificaciones_notificaciones_usuario1` FOREIGN KEY (`notificaciones_usuario_id`) REFERENCES `notificaciones_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificaciones_users1` FOREIGN KEY (`users_modifico`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificaciones_users2` FOREIGN KEY (`users_permiso`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaciones`
--

LOCK TABLES `notificaciones` WRITE;
/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
INSERT INTO `notificaciones` VALUES (7,'El usuario Fernando1 se modifico','2022-11-03',14,1,2,2,1,'2022-11-04 05:13:40',4,NULL),(8,'El usuario Fernando1 se modifico','2022-11-03',14,1,2,2,2,'2022-11-04 05:13:40',4,NULL),(9,'El usuario Fernando1 se modifico','2022-11-03',14,1,2,2,7,'2022-11-04 05:13:40',4,NULL),(13,'El concurso NoPru-Not-1 fue creado','2023-01-25',1,2,2,2,1,'2023-01-26 04:03:10',NULL,22),(14,'El concurso NoPru-Not-1 fue creado','2023-01-25',1,2,2,2,2,'2023-01-26 04:03:10',NULL,22),(15,'El concurso NoPru-Not-1 fue creado','2023-01-25',1,2,2,2,7,'2023-01-26 04:03:10',NULL,22),(16,'El concurso No1345 fue creado','2023-01-25',1,2,2,2,1,'2023-01-26 04:29:18',NULL,17),(17,'El concurso No1345 fue creado','2023-01-25',1,2,2,2,2,'2023-01-26 04:29:18',NULL,17),(18,'El concurso No1345 fue creado','2023-01-25',1,2,2,2,7,'2023-01-26 04:29:18',NULL,17),(19,'El concurso NoPRU-NOT-1 fue creado','2023-05-09',1,2,2,2,1,'2023-05-10 05:47:44',NULL,22),(20,'El concurso NoPRU-NOT-1 fue creado','2023-05-09',1,2,2,2,2,'2023-05-10 05:47:44',NULL,22),(21,'El concurso NoPRU-NOT-1 fue creado','2023-05-09',1,2,2,2,7,'2023-05-10 05:47:44',NULL,22),(22,'El usuario admin se modifico','2023-07-25',1,1,2,2,1,'2023-07-25 22:58:34',5,NULL),(23,'El usuario admin se modifico','2023-07-25',1,1,2,2,2,'2023-07-25 22:58:34',5,NULL),(24,'El usuario admin se modifico','2023-07-25',1,1,2,2,7,'2023-07-25 22:58:34',5,NULL),(25,'El usuario Fernando1 se modifico','2023-08-14',2,1,2,2,1,'2023-08-15 00:14:42',6,NULL),(26,'El usuario Fernando1 se modifico','2023-08-14',2,1,2,2,2,'2023-08-15 00:14:42',6,NULL),(27,'El usuario Fernando1 se modifico','2023-08-14',2,1,2,2,7,'2023-08-15 00:14:42',6,NULL),(28,'El usuario FERNANDO1 se modifico','2023-08-14',2,1,2,2,1,'2023-08-15 00:16:16',7,NULL),(29,'El usuario FERNANDO1 se modifico','2023-08-14',2,1,2,2,2,'2023-08-15 00:16:16',7,NULL),(30,'El usuario FERNANDO1 se modifico','2023-08-14',2,1,2,2,7,'2023-08-15 00:16:16',7,NULL),(31,'El usuario FERNANDO se modifico','2023-09-11',19,1,2,2,1,'2023-09-12 04:18:01',8,NULL),(32,'El usuario FERNANDO se modifico','2023-09-11',19,1,2,2,2,'2023-09-12 04:18:01',8,NULL),(33,'El usuario FERNANDO se modifico','2023-09-11',19,1,2,2,7,'2023-09-12 04:18:01',8,NULL),(34,'El usuario FERNANDO se modifico','2023-09-11',19,1,2,2,19,'2023-09-12 04:18:01',8,NULL),(35,'El usuario FERNANDO se modifico','2023-09-11',19,1,2,2,1,'2023-09-12 04:18:07',9,NULL),(36,'El usuario FERNANDO se modifico','2023-09-11',19,1,2,2,2,'2023-09-12 04:18:07',9,NULL),(37,'El usuario FERNANDO se modifico','2023-09-11',19,1,2,2,7,'2023-09-12 04:18:07',9,NULL),(38,'El usuario FERNANDO se modifico','2023-09-11',19,1,2,2,19,'2023-09-12 04:18:07',9,NULL),(39,'El usuario FERNANDO se modifico','2023-09-11',19,1,2,2,1,'2023-09-12 04:18:14',10,NULL),(40,'El usuario FERNANDO se modifico','2023-09-11',19,1,2,2,2,'2023-09-12 04:18:14',10,NULL),(41,'El usuario FERNANDO se modifico','2023-09-11',19,1,2,2,7,'2023-09-12 04:18:14',10,NULL),(42,'El usuario FERNANDO se modifico','2023-09-11',19,1,2,2,19,'2023-09-12 04:18:14',10,NULL);
/*!40000 ALTER TABLE `notificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificaciones_estatus`
--

DROP TABLE IF EXISTS `notificaciones_estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificaciones_estatus` (
  `id` bigint(20) NOT NULL,
  `notificacion_estatus` varchar(45) DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notificaciones_estatus_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_notificaciones_estatus_users1_idx` (`iduserCreated`),
  KEY `fk_notificaciones_estatus_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_notificaciones_estatus_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificaciones_estatus_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificaciones_estatus_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaciones_estatus`
--

LOCK TABLES `notificaciones_estatus` WRITE;
/*!40000 ALTER TABLE `notificaciones_estatus` DISABLE KEYS */;
INSERT INTO `notificaciones_estatus` VALUES (1,'Visto',1,NULL,NULL,1,1),(2,'Pendiente',1,NULL,NULL,1,1);
/*!40000 ALTER TABLE `notificaciones_estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificaciones_modulo`
--

DROP TABLE IF EXISTS `notificaciones_modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificaciones_modulo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(255) DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notificaciones_modulo_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_notificaciones_modulo_users1_idx` (`iduserCreated`),
  KEY `fk_notificaciones_modulo_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_notificaciones_modulo_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificaciones_modulo_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificaciones_modulo_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaciones_modulo`
--

LOCK TABLES `notificaciones_modulo` WRITE;
/*!40000 ALTER TABLE `notificaciones_modulo` DISABLE KEYS */;
INSERT INTO `notificaciones_modulo` VALUES (1,'Usuarios',1,NULL,NULL,1,1),(2,'Concursos',1,NULL,NULL,1,1);
/*!40000 ALTER TABLE `notificaciones_modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificaciones_tipo`
--

DROP TABLE IF EXISTS `notificaciones_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificaciones_tipo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_notificacion` varchar(45) DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notificaciones_tipo_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_notificaciones_tipo_users1_idx` (`iduserCreated`),
  KEY `fk_notificaciones_tipo_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_notificaciones_tipo_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificaciones_tipo_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificaciones_tipo_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaciones_tipo`
--

LOCK TABLES `notificaciones_tipo` WRITE;
/*!40000 ALTER TABLE `notificaciones_tipo` DISABLE KEYS */;
INSERT INTO `notificaciones_tipo` VALUES (1,'Crear',1,NULL,NULL,1,1),(2,'Editar',1,NULL,NULL,1,1),(3,'Desactivar/Activar',1,NULL,NULL,1,1);
/*!40000 ALTER TABLE `notificaciones_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificaciones_usuario`
--

DROP TABLE IF EXISTS `notificaciones_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificaciones_usuario` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_ant` varchar(255) DEFAULT NULL,
  `email_ant` varchar(255) DEFAULT NULL,
  `rfc_ant` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `ubicacion_ant` varchar(255) DEFAULT NULL,
  `rol_ant` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaciones_usuario`
--

LOCK TABLES `notificaciones_usuario` WRITE;
/*!40000 ALTER TABLE `notificaciones_usuario` DISABLE KEYS */;
INSERT INTO `notificaciones_usuario` VALUES (4,'Fernando1','pruebarol@hotmail.com','JCR040721NU2453','5561185022','Segundo Piso','Supervisor de proyecto'),(5,'admin','admin@admin.com',NULL,'5566482',NULL,'Administrador'),(6,'Fernando1','fer@hotmail.com',NULL,NULL,NULL,'Administrador'),(7,'FERNANDO1','FER@HOTMAIL.COM',NULL,'5566482',NULL,'Administrador'),(8,'FERNANDO','FER123@HOTMAIL.COM','CGDGDFV4356547658','5561185022','PRUEBA','Administrador'),(9,'FERNANDO','FER123@HOTMAIL.COM','CGDGDFV4356547658','5561185022','PRUEBA','Administrador'),(10,'FERNANDO','FER123@HOTMAIL.COM','CGDGDFV4356547658','5561185022','PRUEBA','Administrador');
/*!40000 ALTER TABLE `notificaciones_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago_proyecto`
--

DROP TABLE IF EXISTS `pago_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pago_proyecto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_proyecto` int(11) NOT NULL DEFAULT 0,
  `licitacion_id` bigint(19) unsigned NOT NULL,
  `fecha_pago` date DEFAULT NULL,
  `monto` decimal(15,2) DEFAULT NULL,
  `factura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pago_proyecto_licitaciones1_idx` (`licitacion_id`),
  KEY `fk_pago_proyecto_users1_idx` (`iduserCreated`),
  KEY `fk_pago_proyecto_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_pago_proyecto_licitaciones1` FOREIGN KEY (`licitacion_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pago_proyecto_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pago_proyecto_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago_proyecto`
--

LOCK TABLES `pago_proyecto` WRITE;
/*!40000 ALTER TABLE `pago_proyecto` DISABLE KEYS */;
INSERT INTO `pago_proyecto` VALUES (13,32,13,'2022-09-01',10000.00,'TbOZ3rx9ZPA5srGIrU2NdDIiudeIVAfZhDMu0d7z.pdf',0,0,'2022-08-17 03:16:00','2022-08-17 03:16:00'),(14,33,13,'2022-09-02',2500.00,'XxeTteA98zGkt4I4vZk2SDgTqYzqikkFLmfcjmhx.pdf',0,0,'2022-08-17 04:01:11','2022-08-17 04:01:11'),(15,34,15,'2022-09-01',5000.00,'JY7Ev6Kg55F8YAMpjkmgkDJGW7q5RrfsxPcxtHEt.pdf',1,1,'2022-08-19 01:37:02','2022-08-19 01:37:02'),(16,36,14,'2022-11-04',1500.00,'R2HTCPmeHHg1Dba1OnPQ2Ygzz9KqgJXmTSWqq6aX.pdf',1,1,'2022-10-28 02:02:01','2022-10-28 02:02:01');
/*!40000 ALTER TABLE `pago_proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_names` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modulo_permiso` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'role-list','Listado de Roles','web',1,NULL,NULL),(2,'role-create','Crear Roles','web',1,NULL,NULL),(3,'role-edit','Editar Roles','web',1,NULL,NULL),(4,'role-delete','Desactivar Roles','web',1,NULL,NULL),(5,'usuario-list','Listado de Usuarios','web',2,NULL,NULL),(6,'usuario-create','Crear Usuarios','web',2,NULL,NULL),(7,'usuario-edit','Editar Usuarios','web',2,NULL,NULL),(8,'usuario-delete','Desactivar Usuarios','web',2,NULL,NULL),(9,'unidad-list','Listado de unidades','web',3,NULL,NULL),(10,'unidad-create','Crear Unidades','web',3,NULL,NULL),(11,'unidad-edit','Editar Unidades','web',3,NULL,NULL),(12,'unidad-delete','Desactivar Unidades','web',3,NULL,NULL),(13,'marca-list','Listado de Marcas','web',4,NULL,NULL),(14,'marca-create','Crear Marca','web',4,NULL,NULL),(15,'marca-edit','Editar Marca','web',4,NULL,NULL),(16,'marca-delete','Desacticar Marca','web',4,NULL,NULL),(17,'modelo-list','Lista de Modelos','web',5,NULL,NULL),(18,'modelo-create','Crear Modelo','web',5,NULL,NULL),(19,'modelo-edit','Editar Modelo','web',5,NULL,NULL),(20,'modelo-delete','Desactivar Modelo','web',5,NULL,NULL),(21,'patio-list','Listado de Patios','web',6,NULL,NULL),(22,'patio-create','Crear Patio','web',6,NULL,NULL),(23,'patio-edit','Editar Patio','web',6,NULL,NULL),(24,'patio-delete','Desactivar Patio','web',6,NULL,NULL),(25,'estatus-list','Listado de Estatus','web',7,NULL,NULL),(26,'estatus-create','Crear Estatus','web',7,NULL,NULL),(27,'estatus-edit','Editar Estatus','web',7,NULL,NULL),(28,'estatus-delete','Desactivar Estatus','web',7,NULL,NULL),(29,'aseguradora-list','Listado de Aseguradoras','web',8,NULL,NULL),(30,'aseguradora-create','Crear Aseguradora','web',8,NULL,NULL),(31,'aseguradora-edit','Editar Aseguradora','web',8,NULL,NULL),(32,'aseguradora-delete','Desactivar Aseguradora','web',8,NULL,NULL),(33,'cliente-list','Listado de Clientes','web',9,NULL,NULL),(34,'cliente-create','Crear Cliente','web',9,NULL,NULL),(35,'cliente-edit','Editar Cliente','web',9,NULL,NULL),(36,'cliente-delete','Desactivar Cliente','web',9,NULL,NULL),(37,'estado-list','Listado de Estados','web',10,NULL,NULL),(38,'estado-create','Crear Estado','web',10,NULL,NULL),(39,'estado-edit','Editar Estado','web',10,NULL,NULL),(40,'estado-delete','Desactivar Estado','web',10,NULL,NULL),(41,'municipio-list','Listado de Municipios','web',11,NULL,NULL),(42,'municipio-create','Crear Municipio','web',11,NULL,NULL),(43,'municipio-edit','Editar Municipio','web',11,NULL,NULL),(44,'municipio-delete','Desactivar Municipio','web',11,NULL,NULL),(45,'tipovehiculo-list','Listado de Tipos de Vehiculos','web',12,NULL,NULL),(46,'tipovehiculo-create','Crear Tipo de Vehiculo','web',12,NULL,NULL),(47,'tipovehiculo-edit','Editar Tipo de Vehiculo','web',12,NULL,NULL),(48,'tipovehiculo-delete','Desactivar Tipo de Vehiculo','web',12,NULL,NULL),(49,'agencia-list','Listado de Agencias','web',13,NULL,NULL),(50,'agencia-create','Crear Agencia','web',13,NULL,NULL),(51,'agencia-edit','Editar Agencia','web',13,NULL,NULL),(52,'agencia-delete','Desactivar Agencia','web',13,NULL,NULL),(53,'tdocumento-list','Listado de Tipos de Documentos','web',14,NULL,NULL),(54,'tdocumento-create','Crear Tipo de Documento','web',14,NULL,NULL),(55,'tdocumento-edit','Editar Tipo de Documento','web',14,NULL,NULL),(56,'tdocumento-delete','Desactivar Tipo de Documento','web',14,NULL,NULL),(57,'tasignacion-list','Listado de Tipo de Asignacion','web',15,NULL,NULL),(58,'tasignacion-create','Crear Tipo de Asignacion','web',15,NULL,NULL),(59,'tasignacion-edit','Editar Tipo de Asignacion','web',15,NULL,NULL),(60,'tasignacion-delete','Desactivar Tipo de Asignacion','web',15,NULL,NULL),(61,'asegmento-list','Listado de Segmentos','web',16,NULL,NULL),(62,'asegmento-create','Nuevo Segmento','web',16,NULL,NULL),(63,'asegmento-edit','Editar Segmento','web',16,NULL,NULL),(64,'asegmento-delete','Desactivar Segmento','web',16,NULL,NULL),(65,'astipovehiculo-list','Listado de Tipo de Vehiculos','web',17,NULL,NULL),(66,'astipovehiculo-create','Nuevo Tipo de Vehículo','web',17,NULL,NULL),(67,'astipovehiculo-edit','Editar Tipo de Vehículo','web',17,NULL,NULL),(68,'astipovehiculo-delete','Desactivar Tipo de Vehículo','web',17,NULL,NULL),(69,'aspuerta-list','Listado de Puertas','web',18,NULL,NULL),(70,'aspuerta-create','Nueva Puerta','web',18,NULL,NULL),(71,'aspuerta-edit','Editar Puerta','web',18,NULL,NULL),(72,'aspuerta-delete','Desactivar Puerta','web',18,NULL,NULL),(73,'ascarroceria-list','Listado de Carrocerias','web',19,NULL,NULL),(74,'ascarroceria-create','Nueva Carroceria','web',19,NULL,NULL),(75,'ascarroceria-edit','Ediar Carroceria','web',19,NULL,NULL),(76,'ascarroceria-delete','Desactivar Carroceria','web',19,NULL,NULL),(77,'asnumcilindros-list','Listado de Número de Cilindros','web',20,NULL,NULL),(78,'asnumcilindros-create','Nuevo Número de Cilindro','web',20,NULL,NULL),(79,'asnumcilindros-edit','Editar Número de Cilindro','web',20,NULL,NULL),(80,'asnumcilindros-delete','Desactivar Número de Cilindro','web',20,NULL,NULL),(81,'aspasajeros-list','Listado de Pasajeros','web',21,NULL,NULL),(82,'aspasajeros-create','Nuevo Pasajero','web',21,NULL,NULL),(83,'aspasajeros-edit','Editar Pasajero','web',21,NULL,NULL),(84,'aspasajeros-delete','Desactivar Pasajero','web',21,NULL,NULL),(85,'asmotor-list','Listado de Motores','web',22,NULL,NULL),(86,'asmotor-create','Nuevo Motor','web',22,NULL,NULL),(87,'asmotor-edit','Editar Motor','web',22,NULL,NULL),(88,'asmotor-delete','Desactivar Motor','web',22,NULL,NULL),(89,'asllantarefaccion-list','Listao de Llanta de Refacción','web',23,NULL,NULL),(90,'asllantarefaccion-create','Nueva  Llanta de Refacción','web',23,NULL,NULL),(91,'asllantarefaccion-edit','Editar  Llanta de Refacción','web',23,NULL,NULL),(92,'asllantarefaccion-delete','Desactivar  Llanta de Refacción','web',23,NULL,NULL),(93,'asespejoslaterales-list','Listado de Espejos Laterales','web',24,NULL,NULL),(94,'asespejoslaterales-create','Nuevo  Espejo Lateral','web',24,NULL,NULL),(95,'asespejoslaterales-edit','Editar Espejo Lateral','web',24,NULL,NULL),(96,'asespejoslaterales-delete','Desactivar Espejo Lateral','web',24,NULL,NULL),(97,'asaccesorios-list','Listado de Accesorios','web',25,NULL,NULL),(98,'asaccesorios-create','Nuevo Accesorio','web',25,NULL,NULL),(99,'asaccesorios-edit','Editar Accesorio','web',25,NULL,NULL),(100,'asaccesorios-delete','Desactivar Accesorio','web',25,NULL,NULL),(101,'aspotencia-list','Listado de Potencia','web',26,NULL,NULL),(102,'aspotencia-create','Nueva Potencia','web',26,NULL,NULL),(103,'aspotencia-edit','Editar Potencia','web',26,NULL,NULL),(104,'aspotencia-delete','Desactivar Potencia','web',26,NULL,NULL),(105,'astransmision-list','Listado de Transmisiones','web',27,NULL,NULL),(106,'astransmision-create','Nueva Transmisión','web',27,NULL,NULL),(107,'astransmision-edit','Editar Transmisión','web',27,NULL,NULL),(108,'astransmision-delete','Desactivar Transmisión','web',27,NULL,NULL),(109,'tablero-graficas','Graficas','web',28,NULL,NULL),(110,'tablero-notificaciones','Administrador de notificaciones','web',28,NULL,NULL),(111,'notificaion-crearusuario','Notificación Crear Usuario','web',2,NULL,NULL),(112,'notificacion-editarusuario','Notificación Editar Usuario','web',2,NULL,NULL),(113,'notificacion-desactivarusuario','Notificación Desactivar Usuario','web',2,NULL,NULL),(114,'concurso-list','Listado de Concursos','web',29,NULL,NULL),(115,'concurso-create','Nuevo Concurso','web',29,NULL,NULL),(116,'concurso-edit','Editar Concurso','web',29,NULL,NULL),(117,'concurso-delete','Desactivar Concurso','web',29,NULL,NULL),(118,'requisicion-list','Listado de Requisiciones','web',30,NULL,NULL),(119,'requisicion-create','Nueva Requisicón','web',30,NULL,NULL),(120,'requisicion-edit','Editar Requisición','web',30,NULL,NULL),(121,'requisicion-delete','Desactivar Requisición','web',30,NULL,NULL),(122,'cliunidad-list','Listado de Unidades','web',31,NULL,NULL),(123,'gestordoc-list','Listado de Documentos','web',32,NULL,NULL),(124,'mantenimiento-list','Listado de mantenimientos','web',33,NULL,NULL),(125,'mantenimiento-create','Nuevo Mantenimiento','web',33,NULL,NULL),(126,'mantenimiento-edit','Editar Mantenimiento','web',33,NULL,NULL),(127,'mantenimiento-delete','Desactivar Mantemiento','web',33,NULL,NULL),(128,'contratos-list','Listado de Contratos','web',34,NULL,NULL),(129,'contratos-edit','Editar Contrato','web',34,NULL,NULL),(130,'contratos-delete','Desactivar Contrato','web',34,NULL,NULL),(131,'finanzas-list','Listado de requisiciones','web',35,NULL,NULL),(132,'finanzas-create','Generar orden compra','web',35,NULL,NULL),(133,'concurso-proyecto','Crear contrato al concurso','web',29,NULL,NULL),(134,'concurso-propuestaeconomica','Crear propuesta económica','web',29,NULL,NULL),(135,'concurso-propuestatecnica','Crear propuesta tecnica','web',29,NULL,NULL),(136,'requisicion-envfinanzas','Eviar requisición a finanzas','web',30,NULL,NULL),(137,'gestordoc-create','Subir documentos','web',32,NULL,NULL),(138,'unidad-cargamasiva','Carga masiva','web',3,NULL,NULL),(139,'ordencompra-list','Listado de orden de compra','web',36,NULL,NULL),(140,'finanzas-back','Regresar requisición a dirección comercial','web',35,NULL,NULL),(141,'concurso-notconcursoganado','Notificación de concurso ganado','web',29,NULL,NULL),(142,'asignar-clientes','Asignar clientes al contrato','web',34,NULL,NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(19) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presupuesto_licitacion`
--

DROP TABLE IF EXISTS `presupuesto_licitacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presupuesto_licitacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_licitacion` int(11) NOT NULL DEFAULT 0,
  `folio_presupuesto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folio_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned DEFAULT NULL,
  `status_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presupuesto_licitacion`
--

LOCK TABLES `presupuesto_licitacion` WRITE;
/*!40000 ALTER TABLE `presupuesto_licitacion` DISABLE KEYS */;
INSERT INTO `presupuesto_licitacion` VALUES (1,5,'FP00001','1',1,1,0,'2022-06-16 02:18:27','2022-06-16 02:18:27');
/*!40000 ALTER TABLE `presupuesto_licitacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor_contacto`
--

DROP TABLE IF EXISTS `proveedor_contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor_contacto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `proveedores_id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proveedor_contacto_proveedores1_idx` (`proveedores_id`),
  KEY `fk_proveedor_contacto_users1_idx` (`iduserCreated`),
  KEY `fk_proveedor_contacto_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_proveedor_contacto_proveedores1` FOREIGN KEY (`proveedores_id`) REFERENCES `proveedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proveedor_contacto_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proveedor_contacto_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor_contacto`
--

LOCK TABLES `proveedor_contacto` WRITE;
/*!40000 ALTER TABLE `proveedor_contacto` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor_contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor_cuentas`
--

DROP TABLE IF EXISTS `proveedor_cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor_cuentas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `proveedores_id` int(10) unsigned NOT NULL,
  `banco` varchar(255) DEFAULT NULL,
  `cuenta` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proveedor_cuentas_users1_idx` (`iduserUpdated`),
  KEY `fk_proveedor_cuentas_users2_idx` (`iduserCreated`),
  KEY `fk_proveedor_cuentas_proveedores1_idx` (`proveedores_id`),
  CONSTRAINT `fk_proveedor_cuentas_proveedores1` FOREIGN KEY (`proveedores_id`) REFERENCES `proveedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proveedor_cuentas_users1` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proveedor_cuentas_users2` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor_cuentas`
--

LOCK TABLES `proveedor_cuentas` WRITE;
/*!40000 ALTER TABLE `proveedor_cuentas` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor_cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor_direccion`
--

DROP TABLE IF EXISTS `proveedor_direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor_direccion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `proveedores_id` int(10) unsigned NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proveedor_direccion_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_proveedor_direccion_users1_idx` (`iduserCreated`),
  KEY `fk_proveedor_direccion_users2_idx` (`iduserUpdated`),
  KEY `fk_proveedor_direccion_proveedores1_idx` (`proveedores_id`),
  CONSTRAINT `fk_proveedor_direccion_proveedores1` FOREIGN KEY (`proveedores_id`) REFERENCES `proveedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proveedor_direccion_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proveedor_direccion_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proveedor_direccion_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor_direccion`
--

LOCK TABLES `proveedor_direccion` WRITE;
/*!40000 ALTER TABLE `proveedor_direccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor_direccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor_tipo`
--

DROP TABLE IF EXISTS `proveedor_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor_tipo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proveedor_tipo_users1_idx` (`iduserCreated`),
  KEY `fk_proveedor_tipo_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_proveedor_tipo_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proveedor_tipo_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor_tipo`
--

LOCK TABLES `proveedor_tipo` WRITE;
/*!40000 ALTER TABLE `proveedor_tipo` DISABLE KEYS */;
INSERT INTO `proveedor_tipo` VALUES (1,'Agencia',NULL,NULL,1,1),(2,'Taller',NULL,NULL,1,1),(3,'Concesionaria',NULL,NULL,1,1);
/*!40000 ALTER TABLE `proveedor_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proveedor_tipo_id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `convenio` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giro_comercial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proveedores_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_proveedores_users1_idx` (`iduserCreated`),
  KEY `fk_proveedores_users2_idx` (`iduserUpdated`),
  KEY `fk_proveedores_proveedor_tipo1_idx` (`proveedor_tipo_id`),
  CONSTRAINT `fk_proveedores_proveedor_tipo1` FOREIGN KEY (`proveedor_tipo_id`) REFERENCES `proveedor_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proveedores_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proveedores_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proveedores_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (1,1,'SIAF','Coacalco Berriozabal','5561185022','Fernando Herrera','ferc@hotmail.com',NULL,'Convenio pendiente con el proveedor acerca de la compra de 20 unidades la siguiente tiene un descuento de 20%','vendedor',1,1,1,'2022-05-06 20:44:20','2023-08-02 12:05:39'),(2,1,'Prueba','Ecatepec','5566778899','Fernando H','admin@prueba.com',NULL,'Convenio pendiente con el proveedor acerca de la compra de 20 unidades la siguiente tiene un descuento de 10%','Nuevo',1,1,1,'2022-07-02 02:40:36','2023-08-02 12:05:48');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto_clientes`
--

DROP TABLE IF EXISTS `proyecto_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyecto_clientes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cliente_id` bigint(19) unsigned NOT NULL,
  `proyecto_id` int(10) unsigned NOT NULL,
  `licitacion_id` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proyecto_clientes_users1_idx` (`iduserCreated`),
  KEY `fk_proyecto_clientes_users2_idx` (`iduserUpdated`),
  KEY `fk_proyecto_clientes_proyectos1_idx` (`proyecto_id`),
  KEY `fk_proyecto_clientes_users3_idx` (`cliente_id`),
  KEY `fk_proyecto_clientes_licitaciones1_idx` (`licitacion_id`),
  CONSTRAINT `fk_proyecto_clientes_licitaciones1` FOREIGN KEY (`licitacion_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_clientes_proyectos1` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_clientes_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_clientes_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_clientes_users3` FOREIGN KEY (`cliente_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto_clientes`
--

LOCK TABLES `proyecto_clientes` WRITE;
/*!40000 ALTER TABLE `proyecto_clientes` DISABLE KEYS */;
INSERT INTO `proyecto_clientes` VALUES (9,19,38,16,'2023-09-14 05:32:24','2023-09-14 05:32:24',1,1),(13,2,38,16,'2023-09-20 22:05:45','2023-09-20 22:05:45',1,1),(14,21,38,16,'2023-09-22 23:41:53','2023-09-22 23:41:53',1,1);
/*!40000 ALTER TABLE `proyecto_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto_deductiva_pago`
--

DROP TABLE IF EXISTS `proyecto_deductiva_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyecto_deductiva_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pago_proyecto_id` int(10) unsigned NOT NULL,
  `proyecto_id` int(10) unsigned NOT NULL,
  `licitacion_id` bigint(19) unsigned NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `fecha_deductiva` varchar(45) DEFAULT NULL,
  `monto_deductiva` decimal(15,2) DEFAULT NULL,
  `deductiva_pago` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_delete` int(11) DEFAULT NULL,
  `proyecto_penalizaciones_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proyecto_deductiva_pago_pago_proyecto1_idx` (`pago_proyecto_id`),
  KEY `fk_proyecto_deductiva_pago_users1_idx` (`iduserCreated`),
  KEY `fk_proyecto_deductiva_pago_users2_idx` (`iduserUpdated`),
  KEY `fk_proyecto_deductiva_pago_proyectos1_idx` (`proyecto_id`),
  KEY `fk_proyecto_deductiva_pago_licitaciones1_idx` (`licitacion_id`),
  KEY `fk_proyecto_deductiva_pago_proyecto_penalizaciones1_idx` (`proyecto_penalizaciones_id`),
  CONSTRAINT `fk_proyecto_deductiva_pago_licitaciones1` FOREIGN KEY (`licitacion_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_deductiva_pago_pago_proyecto1` FOREIGN KEY (`pago_proyecto_id`) REFERENCES `pago_proyecto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_deductiva_pago_proyecto_penalizaciones1` FOREIGN KEY (`proyecto_penalizaciones_id`) REFERENCES `proyecto_penalizaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_deductiva_pago_proyectos1` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_deductiva_pago_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_deductiva_pago_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto_deductiva_pago`
--

LOCK TABLES `proyecto_deductiva_pago` WRITE;
/*!40000 ALTER TABLE `proyecto_deductiva_pago` DISABLE KEYS */;
INSERT INTO `proyecto_deductiva_pago` VALUES (8,13,33,13,1,1,'2022-09-02',150.00,'GVgciVAt7Adxv3Pmau7ks3KowR2H2h37h3mmR2KI.pdf','2022-08-20 01:27:42','2022-08-20 01:27:42',0,2);
/*!40000 ALTER TABLE `proyecto_deductiva_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto_documento`
--

DROP TABLE IF EXISTS `proyecto_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyecto_documento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_proyecto` int(10) unsigned NOT NULL,
  `id_proyecto_tipo_documento` bigint(20) NOT NULL,
  `licitacion_id` bigint(19) unsigned NOT NULL,
  `documento` text NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proyecto_documento_proyectos1_idx` (`id_proyecto`),
  KEY `fk_proyecto_documento_proyecto_tipo_documento1_idx` (`id_proyecto_tipo_documento`),
  KEY `fk_proyecto_documento_users1_idx` (`iduserCreated`),
  KEY `fk_proyecto_documento_users2_idx` (`iduserUpdated`),
  KEY `fk_proyecto_documento_licitaciones1_idx` (`licitacion_id`),
  CONSTRAINT `fk_proyecto_documento_licitaciones1` FOREIGN KEY (`licitacion_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_documento_proyecto_tipo_documento1` FOREIGN KEY (`id_proyecto_tipo_documento`) REFERENCES `proyecto_tipo_documento` (`id`),
  CONSTRAINT `fk_proyecto_documento_proyectos1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id`),
  CONSTRAINT `fk_proyecto_documento_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_proyecto_documento_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto_documento`
--

LOCK TABLES `proyecto_documento` WRITE;
/*!40000 ALTER TABLE `proyecto_documento` DISABLE KEYS */;
INSERT INTO `proyecto_documento` VALUES (6,32,1,13,'jR40rWVXUEQUwgMdgkZAwoCIId4dUh4XQ0670vuj.pdf','application/pdf','2022-08-11 23:14:31','2022-08-11 23:14:31',1,1),(7,32,1,13,'jE3Rw0a88VT6OclfSnBohJ9o5d4pAtSC28eYnSvj.pdf','application/pdf','2022-08-11 23:34:05','2022-08-11 23:34:05',1,1),(9,33,1,13,'ke69uTwukMQCXzicssIAOLIxCyu72higjoBXMesd.pdf','application/pdf','2022-08-15 21:38:30','2022-08-15 21:38:30',1,1),(10,33,1,13,'8B3me5rBEVPqNKyRL1dRsAw1zKyCPkutta5xucO2.pdf','application/pdf','2022-08-17 03:15:18','2022-08-17 03:15:18',1,1),(13,34,1,15,'hl6A3s6oJyogXc8Rq0Hp5MhS2zQ8XxcOSFV9wiIL.pdf','application/pdf','2022-08-19 01:27:21','2022-08-19 01:27:21',1,1),(14,35,1,15,'aPsRv4qxII2InbIl4rMcVDH9F1x0BuOGyrZfaOeP.pdf','application/pdf','2022-08-19 01:30:07','2022-08-19 01:30:07',1,1);
/*!40000 ALTER TABLE `proyecto_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto_folio`
--

DROP TABLE IF EXISTS `proyecto_folio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyecto_folio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folio` bigint(20) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto_folio`
--

LOCK TABLES `proyecto_folio` WRITE;
/*!40000 ALTER TABLE `proyecto_folio` DISABLE KEYS */;
INSERT INTO `proyecto_folio` VALUES (1,1,2022,'2022-07-19 22:58:34','2022-07-19 22:58:34'),(2,2,2022,'2022-07-19 23:04:01','2022-07-19 23:04:01'),(3,3,2022,'2022-07-19 23:04:55','2022-07-19 23:04:55'),(4,4,2022,'2022-07-20 01:00:08','2022-07-20 01:00:08'),(5,5,2022,'2022-07-20 01:22:44','2022-07-20 01:22:44'),(6,6,2022,'2022-07-20 01:25:17','2022-07-20 01:25:17'),(7,7,2022,'2022-07-20 01:26:15','2022-07-20 01:26:15'),(8,8,2022,'2022-07-28 01:53:56','2022-07-28 01:53:56'),(9,9,2022,'2022-08-10 00:53:50','2022-08-10 00:53:50'),(10,10,2022,'2022-08-10 00:54:24','2022-08-10 00:54:24'),(11,11,2022,'2022-08-11 23:00:34','2022-08-11 23:00:34'),(12,12,2022,'2022-08-11 23:03:03','2022-08-11 23:03:03'),(13,13,2022,'2022-08-11 23:03:12','2022-08-11 23:03:12'),(14,14,2022,'2022-08-11 23:03:32','2022-08-11 23:03:32'),(15,15,2022,'2022-08-11 23:03:45','2022-08-11 23:03:45'),(16,16,2022,'2022-08-11 23:08:48','2022-08-11 23:08:48'),(17,17,2022,'2022-08-11 23:08:53','2022-08-11 23:08:53'),(18,18,2022,'2022-08-11 23:09:33','2022-08-11 23:09:33'),(19,19,2022,'2022-08-11 23:10:11','2022-08-11 23:10:11'),(20,20,2022,'2022-08-11 23:10:15','2022-08-11 23:10:15'),(21,21,2022,'2022-08-11 23:14:27','2022-08-11 23:14:27'),(22,22,2022,'2022-08-11 23:14:31','2022-08-11 23:14:31'),(23,23,2022,'2022-08-11 23:33:59','2022-08-11 23:33:59'),(24,24,2022,'2022-08-11 23:34:05','2022-08-11 23:34:05'),(25,25,2022,'2022-08-19 01:27:21','2022-08-19 01:27:21'),(26,26,2022,'2022-08-19 01:29:06','2022-08-19 01:29:06'),(27,27,2022,'2022-09-20 03:02:22','2022-09-20 03:02:22'),(28,28,2022,'2022-09-27 00:59:40','2022-09-27 00:59:40'),(29,29,2022,'2022-11-12 05:42:21','2022-11-12 05:42:21'),(30,30,2022,'2022-11-12 05:43:18','2022-11-12 05:43:18'),(31,31,2023,'2023-01-02 21:44:26','2023-01-02 21:44:26'),(32,32,2023,'2023-01-02 21:45:41','2023-01-02 21:45:41'),(33,33,2023,'2023-01-12 04:30:32','2023-01-12 04:30:32');
/*!40000 ALTER TABLE `proyecto_folio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto_penalizaciones`
--

DROP TABLE IF EXISTS `proyecto_penalizaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyecto_penalizaciones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `penalizacion_deduccion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proyecto_penalizaciones_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_proyecto_penalizaciones_users1_idx` (`iduserCreated`),
  KEY `fk_proyecto_penalizaciones_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_proyecto_penalizaciones_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_penalizaciones_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_penalizaciones_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto_penalizaciones`
--

LOCK TABLES `proyecto_penalizaciones` WRITE;
/*!40000 ALTER TABLE `proyecto_penalizaciones` DISABLE KEYS */;
INSERT INTO `proyecto_penalizaciones` VALUES (1,'Entrega a destiempo de las unidades','2022-10-27 02:34:21','2022-10-27 02:51:22',1,1,1),(2,'Documentación de los vehículos (placas, tarjeta de circulación, póliza de seguro, verificación).','2022-10-27 02:40:44','2022-10-27 02:40:44',1,1,1),(3,'Falta de información del Supervisor y Ejecutivo de Cuenta (Nombre, cargo, teléfono, correo electrónico).','2022-10-27 02:40:52','2022-10-27 02:40:52',1,1,1),(4,'Falta de información del número de Call Center.','2022-10-27 02:41:03','2022-10-27 02:41:03',1,1,1),(5,'Falta de información de instalación de GPS.','2022-10-27 02:41:10','2022-10-27 02:41:10',1,1,1),(6,'Falta de información del Sistema Web (Programa de mantenimiento).','2022-10-27 02:41:18','2022-10-27 02:41:18',1,1,1),(7,'Formato de entrega del vehículo.','2022-10-27 02:41:25','2022-10-27 02:41:25',1,1,1);
/*!40000 ALTER TABLE `proyecto_penalizaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto_tipo_documento`
--

DROP TABLE IF EXISTS `proyecto_tipo_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyecto_tipo_documento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proyecto_tipo_documento_users1_idx` (`iduserCreated`),
  KEY `fk_proyecto_tipo_documento_users2_idx` (`iduserUpdated`),
  KEY `fk_proyecto_tipo_documento_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_proyecto_tipo_documento_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_tipo_documento_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_proyecto_tipo_documento_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto_tipo_documento`
--

LOCK TABLES `proyecto_tipo_documento` WRITE;
/*!40000 ALTER TABLE `proyecto_tipo_documento` DISABLE KEYS */;
INSERT INTO `proyecto_tipo_documento` VALUES (1,'deduccion','2022-05-06 22:03:37','2023-05-05 00:03:58',1,1,1),(2,'Penalización','2023-05-04 23:42:09','2023-05-04 23:42:09',1,1,1);
/*!40000 ALTER TABLE `proyecto_tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyectos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_emisor` int(10) unsigned NOT NULL,
  `id_cliente` int(10) unsigned NOT NULL,
  `no_folio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_contrato` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_contrato` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_servicio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_contrato` int(10) unsigned NOT NULL,
  `nombre_administrativo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo_administrativo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_administrativo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_responsable` int(11) DEFAULT NULL,
  `supervisor_proyecto` int(11) NOT NULL DEFAULT 0,
  `fuente_proyecto` int(10) unsigned NOT NULL,
  `firma_contrato` date DEFAULT NULL,
  `firma_inicio_vigencia` date DEFAULT NULL,
  `firma_final_vigencia` date DEFAULT NULL,
  `presupuesto_minimo` decimal(15,2) DEFAULT NULL,
  `presupuesto_maximo` decimal(15,2) DEFAULT NULL,
  `importe_general` decimal(15,2) DEFAULT NULL,
  `iva` decimal(15,2) DEFAULT NULL,
  `monto_fianza_liberada` decimal(15,2) DEFAULT NULL,
  `contrato_op` int(11) NOT NULL DEFAULT 0,
  `id_status` int(11) NOT NULL DEFAULT 0,
  `licitacion_id` bigint(19) unsigned NOT NULL,
  `contrato_complemento` int(11) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `motivo_desactivar` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proyectos_fuente_proyecto1_idx` (`fuente_proyecto`),
  KEY `fk_proyectos_emisores1_idx` (`id_emisor`),
  KEY `fk_proyectos_licitaciones1_idx` (`licitacion_id`),
  KEY `fk_proyectos_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_proyectos_client3_idx` (`id_cliente`),
  KEY `fk_proyectos_tipo_contratacion1_idx` (`tipo_contrato`),
  KEY `fk_proyectos_users2_idx` (`iduserCreated`),
  KEY `fk_proyectos_users1_idx` (`iduserUpdated`),
  CONSTRAINT `fk_proyectos_client3` FOREIGN KEY (`id_cliente`) REFERENCES `client` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyectos_emisores1` FOREIGN KEY (`id_emisor`) REFERENCES `emisores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyectos_fuente_proyecto1` FOREIGN KEY (`fuente_proyecto`) REFERENCES `fuente_proyecto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyectos_licitaciones1` FOREIGN KEY (`licitacion_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyectos_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyectos_tipo_contratacion1` FOREIGN KEY (`tipo_contrato`) REFERENCES `tipo_contratacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyectos_users1` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyectos_users2` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos`
--

LOCK TABLES `proyectos` WRITE;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
INSERT INTO `proyectos` VALUES (32,1,4,'C00022','12345F','CNN-12344','Prueba Licitacion',2,'Fer',NULL,'44',7,9,2,NULL,'2022-08-04','2022-12-21',154000.00,302000.00,17000.00,1000.00,NULL,0,0,13,1,1,NULL,1,1,'2022-08-11 23:14:31','2022-08-20 01:27:42'),(33,1,4,'C00024','Fr35654','CNN-44F234t','Prueba Licitacion',2,'Luis',NULL,NULL,7,10,1,NULL,'2022-08-06','2022-12-25',250900.00,350900.00,10000.00,150.00,NULL,1,0,13,2,1,NULL,1,1,'2022-08-11 23:34:05','2022-08-20 01:27:42'),(34,1,4,'C00025','CN-FP-2022','CN-FP-2022','Nueva licitacion',2,NULL,NULL,NULL,9,11,1,NULL,'2023-09-09','2023-12-26',NULL,NULL,200000.00,32000.00,NULL,1,0,15,1,1,NULL,1,1,'2022-08-19 01:27:21','2023-02-27 22:10:51'),(35,3,4,'C00026','CN-FFP-2022-2','CN-FFP-2022-2','Nueva licitacion',2,NULL,NULL,NULL,2,9,1,NULL,'2022-08-07','2022-12-03',NULL,NULL,250000.00,40000.00,NULL,1,0,15,2,1,NULL,1,1,'2022-08-19 01:29:06','2023-02-27 22:10:51'),(36,2,4,'C00027','Frt3234','CNN-F123','Prueba Licitacion',2,'Fernando','fer@hotmail.com','5561',2,9,2,NULL,'2022-09-01','2022-12-23',NULL,NULL,1000000.00,150000.00,NULL,1,0,14,1,1,NULL,1,1,'2022-09-20 03:02:22','2022-10-28 02:02:23'),(37,2,4,'C00028','CN-FP-2022','CNN-P-223','Prueba Licitacion',2,'Fernando','prueba44@gmail.com','5561185022',2,9,2,NULL,'2022-09-27','2022-12-29',1500000.00,150000.00,NULL,NULL,NULL,0,0,14,2,1,NULL,1,1,'2022-09-27 00:59:40','2022-10-28 02:02:23'),(38,1,2,'C00029','CN-FP-FF34t5','45Ferasg','Prueba Licitacion',1,'Fernando','fer@hotmail.com','556959191',10,10,1,NULL,'2022-11-26','2022-12-04',4000000.00,5000000.00,NULL,800000.00,NULL,0,0,16,1,1,'Desactivar contrato por fecha',1,1,'2022-11-12 05:42:21','2023-08-16 03:46:35'),(39,2,2,'C00030','FF-23454','FF-454','Prueba Licitacion',1,'Fernando','prueba@hotmail.com','528749781',9,9,1,NULL,'2022-11-06','2022-12-03',NULL,NULL,5000.00,800.00,NULL,1,0,16,2,1,NULL,1,1,'2022-11-12 05:43:18','2023-08-16 03:46:35'),(40,1,4,'C00032','F42','F1234H','Prueba Licitacion',2,NULL,NULL,NULL,NULL,0,1,NULL,'2023-01-02','2023-01-03',1500000.00,1800000.00,NULL,150000.00,NULL,0,0,14,2,1,NULL,1,1,'2023-01-02 21:45:41','2023-01-02 21:45:41'),(41,1,2,'C00033','1C','C1234','Prueba Licitacion',1,NULL,NULL,NULL,7,9,1,NULL,'2023-01-14','2023-01-22',25000.00,190000.00,150000.00,30400.00,NULL,1,0,16,2,1,NULL,1,1,'2023-01-12 04:30:32','2023-08-16 03:46:35');
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicacion_licitacion`
--

DROP TABLE IF EXISTS `publicacion_licitacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicacion_licitacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `publicacion_licitacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_delete` int(11) NOT NULL DEFAULT 0,
  `iduserCreated` bigint(19) unsigned DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicacion_licitacion`
--

LOCK TABLES `publicacion_licitacion` WRITE;
/*!40000 ALTER TABLE `publicacion_licitacion` DISABLE KEYS */;
INSERT INTO `publicacion_licitacion` VALUES (1,'COMPRANET',0,1,1,'2022-05-16 20:43:31','2022-05-16 15:43:31'),(2,'COMPRAMEX',0,1,1,'2022-05-16 20:44:12','2022-05-16 15:44:12'),(3,'INVITACION',0,1,1,'2022-05-16 20:44:19','2022-05-16 15:44:19'),(4,'INVITACION DGRM',0,1,1,'2022-05-16 20:44:29','2022-05-16 15:44:29'),(5,'INVITACION DIRECTA DE DGRM',0,1,1,'2022-05-16 20:44:38','2022-05-16 15:44:38'),(6,'PRUEBA',0,1,1,'2022-05-16 20:44:49','2022-06-17 20:54:27'),(7,NULL,1,1,1,'2023-01-03 04:17:16','2023-01-02 22:17:30');
/*!40000 ALTER TABLE `publicacion_licitacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion`
--

DROP TABLE IF EXISTS `requisicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `licitaciones_id` bigint(19) unsigned DEFAULT NULL,
  `requisicion_estatus_id` bigint(20) NOT NULL,
  `folio` varchar(255) DEFAULT NULL,
  `solicitante` bigint(19) unsigned NOT NULL,
  `id_area` bigint(20) NOT NULL,
  `fecha_entrega` varchar(255) DEFAULT NULL,
  `fecha_solicitud` timestamp NULL DEFAULT NULL,
  `motivo_finanzas` mediumtext DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `motivo_desactivar` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `visto_bueno_operaciones` int(11) DEFAULT NULL,
  `iduservistobueno` bigint(19) unsigned NOT NULL,
  `hora_vistobueno` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_users2_idx` (`iduserUpdated`),
  KEY `fk_requisicion_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_requisicion_requisicion_estatus1_idx` (`requisicion_estatus_id`),
  KEY `fk_requisicion_area_personal1_idx` (`id_area`),
  KEY `fk_requisicion_users3_idx` (`solicitante`),
  KEY `fk_requisicion_licitaciones1_idx` (`licitaciones_id`),
  KEY `fk_requisicion_users4_idx` (`iduservistobueno`),
  CONSTRAINT `fk_requisicion_area_personal1` FOREIGN KEY (`id_area`) REFERENCES `area_personal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_licitaciones1` FOREIGN KEY (`licitaciones_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_requisicion_estatus1` FOREIGN KEY (`requisicion_estatus_id`) REFERENCES `requisicion_estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_users3` FOREIGN KEY (`solicitante`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_users4` FOREIGN KEY (`iduservistobueno`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion`
--

LOCK TABLES `requisicion` WRITE;
/*!40000 ALTER TABLE `requisicion` DISABLE KEYS */;
INSERT INTO `requisicion` VALUES (11,NULL,4,'R00017',10,1,NULL,'2022-11-17 19:12:30','pendiente',1,NULL,'2022-12-07 03:11:47','2023-08-03 00:26:27',1,1,2,1,'2023-08-03 00:26:27'),(12,NULL,4,'R00018',10,1,NULL,'2022-11-17 19:12:30','no se encuentra',1,NULL,'2022-12-20 00:42:01','2022-12-23 00:54:12',1,1,1,0,NULL),(13,NULL,1,'R00020',10,1,NULL,'2023-02-11 22:02:41',NULL,1,NULL,'2023-01-04 04:03:15','2023-01-05 02:17:05',1,1,1,0,NULL),(14,NULL,1,'R00021',9,1,NULL,'2023-02-10 22:46:15',NULL,1,NULL,'2023-01-04 04:47:30','2023-01-04 04:47:30',1,1,1,0,NULL),(15,17,4,'R00022',9,1,NULL,'2023-01-30 21:42:20',NULL,1,NULL,'2023-01-31 03:42:34','2023-01-31 03:44:22',1,1,1,0,NULL),(16,22,7,'R00028',1,1,NULL,'2023-08-02 18:18:40','falta informacion',1,NULL,'2023-08-03 00:23:37','2023-10-18 03:49:06',1,1,NULL,1,NULL);
/*!40000 ALTER TABLE `requisicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_cfdi`
--

DROP TABLE IF EXISTS `requisicion_cfdi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_cfdi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uso_cfdi` varchar(255) DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_cfdi_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_requisicion_cfdi_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_cfdi_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_requisicion_cfdi_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_cfdi_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_cfdi_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_cfdi`
--

LOCK TABLES `requisicion_cfdi` WRITE;
/*!40000 ALTER TABLE `requisicion_cfdi` DISABLE KEYS */;
INSERT INTO `requisicion_cfdi` VALUES (1,'prueba',1,NULL,NULL,1,1);
/*!40000 ALTER TABLE `requisicion_cfdi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_cobertura`
--

DROP TABLE IF EXISTS `requisicion_cobertura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_cobertura` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` mediumtext DEFAULT NULL,
  `requisicion_tipo_transporte_id` bigint(20) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_cobertura_requisicion_tipo_transporte1_idx` (`requisicion_tipo_transporte_id`),
  KEY `fk_requisicion_cobertura_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_requisicion_cobertura_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_cobertura_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_requisicion_cobertura_requisicion_tipo_transporte1` FOREIGN KEY (`requisicion_tipo_transporte_id`) REFERENCES `requisicion_tipo_transporte` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_cobertura_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_cobertura_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_cobertura_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_cobertura`
--

LOCK TABLES `requisicion_cobertura` WRITE;
/*!40000 ALTER TABLE `requisicion_cobertura` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisicion_cobertura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_combustible`
--

DROP TABLE IF EXISTS `requisicion_combustible`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_combustible` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_combustible_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_requisicion_combustible_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_combustible_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_requisicion_combustible_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_combustible_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_combustible_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_combustible`
--

LOCK TABLES `requisicion_combustible` WRITE;
/*!40000 ALTER TABLE `requisicion_combustible` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisicion_combustible` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_documentos_compras`
--

DROP TABLE IF EXISTS `requisicion_documentos_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_documentos_compras` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(255) DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_documentos_compras_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_requisicion_documentos_compras_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_documentos_compras_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_requisicion_documentos_compras_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_documentos_compras_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_documentos_compras_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_documentos_compras`
--

LOCK TABLES `requisicion_documentos_compras` WRITE;
/*!40000 ALTER TABLE `requisicion_documentos_compras` DISABLE KEYS */;
INSERT INTO `requisicion_documentos_compras` VALUES (1,'Cotizacion',1,'2023-08-14 23:10:51','2023-08-15 00:06:13',1,1),(2,'Factura',1,'2023-08-15 00:06:30','2023-08-15 00:06:30',1,1);
/*!40000 ALTER TABLE `requisicion_documentos_compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_entidad_federativa`
--

DROP TABLE IF EXISTS `requisicion_entidad_federativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_entidad_federativa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_entidad_federativa_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_requisicion_entidad_federativa_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_entidad_federativa_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_requisicion_entidad_federativa_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_entidad_federativa_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_entidad_federativa_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_entidad_federativa`
--

LOCK TABLES `requisicion_entidad_federativa` WRITE;
/*!40000 ALTER TABLE `requisicion_entidad_federativa` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisicion_entidad_federativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_estatus`
--

DROP TABLE IF EXISTS `requisicion_estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_estatus` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estatus` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_estatus_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_estatus_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_requisicion_estatus_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_estatus_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_estatus`
--

LOCK TABLES `requisicion_estatus` WRITE;
/*!40000 ALTER TABLE `requisicion_estatus` DISABLE KEYS */;
INSERT INTO `requisicion_estatus` VALUES (1,'Captura',NULL,NULL,1,1),(2,'Enviado a finanzas',NULL,NULL,1,1),(3,'Recibida',NULL,NULL,1,1),(4,'Orden compra en proceso',NULL,NULL,1,1),(5,'Finalizado',NULL,NULL,1,1),(6,'Cancelado',NULL,NULL,1,1),(7,'Revision finanzas',NULL,NULL,1,1);
/*!40000 ALTER TABLE `requisicion_estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_folio`
--

DROP TABLE IF EXISTS `requisicion_folio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_folio` (
  `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,
  `folio` bigint(20) NOT NULL,
  `anio` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_folio`
--

LOCK TABLES `requisicion_folio` WRITE;
/*!40000 ALTER TABLE `requisicion_folio` DISABLE KEYS */;
INSERT INTO `requisicion_folio` VALUES (1,1,2022,'2022-11-12 03:40:41','2022-11-12 03:40:41'),(2,2,2022,'2022-11-12 03:42:16','2022-11-12 03:42:16'),(3,3,2022,'2022-11-12 04:14:46','2022-11-12 04:14:46'),(4,4,2022,'2022-11-17 01:23:33','2022-11-17 01:23:33'),(5,5,2022,'2022-11-17 01:26:36','2022-11-17 01:26:36'),(6,6,2022,'2022-11-17 03:16:09','2022-11-17 03:16:09'),(7,7,2022,'2022-11-17 03:16:29','2022-11-17 03:16:29'),(8,8,2022,'2022-11-17 03:18:45','2022-11-17 03:18:45'),(9,9,2022,'2022-11-17 04:20:38','2022-11-17 04:20:38'),(10,10,2022,'2022-11-24 21:28:09','2022-11-24 21:28:09'),(11,11,2022,'2022-11-24 21:28:18','2022-11-24 21:28:18'),(12,12,2022,'2022-12-03 03:47:43','2022-12-03 03:47:43'),(13,13,2022,'2022-12-03 03:48:33','2022-12-03 03:48:33'),(14,14,2022,'2022-12-03 03:50:40','2022-12-03 03:50:40'),(15,15,2022,'2022-12-03 03:51:27','2022-12-03 03:51:27'),(16,16,2022,'2022-12-07 03:01:58','2022-12-07 03:01:58'),(17,17,2022,'2022-12-07 03:11:47','2022-12-07 03:11:47'),(18,18,2022,'2022-12-20 00:42:01','2022-12-20 00:42:01'),(19,19,2022,'2022-12-23 00:32:17','2022-12-23 00:32:17'),(20,20,2023,'2023-01-04 04:03:15','2023-01-04 04:03:15'),(21,21,2023,'2023-01-04 04:47:30','2023-01-04 04:47:30'),(22,22,2023,'2023-01-31 03:42:34','2023-01-31 03:42:34'),(23,23,2023,'2023-08-03 00:18:48','2023-08-03 00:18:48'),(24,24,2023,'2023-08-03 00:19:38','2023-08-03 00:19:38'),(25,25,2023,'2023-08-03 00:20:27','2023-08-03 00:20:27'),(26,26,2023,'2023-08-03 00:22:09','2023-08-03 00:22:09'),(27,27,2023,'2023-08-03 00:22:39','2023-08-03 00:22:39'),(28,28,2023,'2023-08-03 00:23:37','2023-08-03 00:23:37');
/*!40000 ALTER TABLE `requisicion_folio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_forma_pago`
--

DROP TABLE IF EXISTS `requisicion_forma_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_forma_pago` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `forma_pago` varchar(255) DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_forma_pago_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_forma_pago_users2_idx` (`iduserUpdated`),
  KEY `fk_requisicion_forma_pago_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_requisicion_forma_pago_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_forma_pago_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_forma_pago_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_forma_pago`
--

LOCK TABLES `requisicion_forma_pago` WRITE;
/*!40000 ALTER TABLE `requisicion_forma_pago` DISABLE KEYS */;
INSERT INTO `requisicion_forma_pago` VALUES (1,'Efectivo',1,1,1,NULL,NULL),(2,'Cheques',1,1,1,NULL,NULL),(3,'Tarjeta de débito',1,1,1,NULL,NULL),(4,'Tarjetas de crédito',1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `requisicion_forma_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_grupo`
--

DROP TABLE IF EXISTS `requisicion_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_grupo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` mediumtext DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_grupo_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_requisicion_grupo_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_grupo_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_requisicion_grupo_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_grupo_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_grupo_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_grupo`
--

LOCK TABLES `requisicion_grupo` WRITE;
/*!40000 ALTER TABLE `requisicion_grupo` DISABLE KEYS */;
INSERT INTO `requisicion_grupo` VALUES (1,'Patrulla',1,'2023-10-18 03:51:45','2023-10-18 03:51:45',1,1),(2,'Ambulancia',1,'2023-10-18 03:52:16','2023-10-18 03:52:16',1,1);
/*!40000 ALTER TABLE `requisicion_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_metodo_pago`
--

DROP TABLE IF EXISTS `requisicion_metodo_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_metodo_pago` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) DEFAULT NULL,
  `metodo_pago` varchar(255) DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_metodo_pago_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_metodo_pago_users2_idx` (`iduserUpdated`),
  KEY `fk_requisicion_metodo_pago_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_requisicion_metodo_pago_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_metodo_pago_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_metodo_pago_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_metodo_pago`
--

LOCK TABLES `requisicion_metodo_pago` WRITE;
/*!40000 ALTER TABLE `requisicion_metodo_pago` DISABLE KEYS */;
INSERT INTO `requisicion_metodo_pago` VALUES (1,'01','Efectivo',1,1,1,NULL,NULL),(2,'02','Cheque nominativo',1,1,1,NULL,NULL),(3,'03','Transferencia electrónica de fondos',1,1,1,NULL,NULL),(4,'04','Tarjeta de crédito',1,1,1,NULL,NULL),(5,'05','Prueba',1,1,1,'2022-12-10 04:20:35','2022-12-10 05:11:47');
/*!40000 ALTER TABLE `requisicion_metodo_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_orden_compra`
--

DROP TABLE IF EXISTS `requisicion_orden_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_orden_compra` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `requisicion_id` bigint(20) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_orden_compra_requisicion1_idx` (`requisicion_id`),
  KEY `fk_requisicion_orden_compra_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_orden_compra_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_requisicion_orden_compra_requisicion1` FOREIGN KEY (`requisicion_id`) REFERENCES `requisicion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_orden_compra_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_orden_compra_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_orden_compra`
--

LOCK TABLES `requisicion_orden_compra` WRITE;
/*!40000 ALTER TABLE `requisicion_orden_compra` DISABLE KEYS */;
INSERT INTO `requisicion_orden_compra` VALUES (7,11,1,1,'2022-12-20 00:42:44','2022-12-20 00:42:44'),(9,12,1,1,'2022-12-23 00:54:12','2022-12-23 00:54:12'),(10,15,1,1,'2023-01-31 03:44:22','2023-01-31 03:44:22');
/*!40000 ALTER TABLE `requisicion_orden_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_orden_partida`
--

DROP TABLE IF EXISTS `requisicion_orden_partida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_orden_partida` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cantidad` varchar(255) DEFAULT NULL,
  `requisicion_partida_id` bigint(20) NOT NULL,
  `requisicion_orden_proveedor_id` bigint(20) NOT NULL,
  `segmentos_id` int(11) NOT NULL,
  `orden_compra_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_orden_partida_requisicion_partida1_idx` (`requisicion_partida_id`),
  KEY `fk_requisicion_orden_partida_requisicion_orden_proveedor1_idx` (`requisicion_orden_proveedor_id`),
  KEY `fk_requisicion_orden_partida_segmentos1_idx` (`segmentos_id`),
  KEY `fk_requisicion_orden_partida_requisicion_orden_compra1_idx` (`orden_compra_id`),
  CONSTRAINT `fk_requisicion_orden_partida_requisicion_orden_compra1` FOREIGN KEY (`orden_compra_id`) REFERENCES `requisicion_orden_compra` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_orden_partida_requisicion_orden_proveedor1` FOREIGN KEY (`requisicion_orden_proveedor_id`) REFERENCES `requisicion_orden_proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_orden_partida_requisicion_partida1` FOREIGN KEY (`requisicion_partida_id`) REFERENCES `requisicion_partida` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_orden_partida_segmentos1` FOREIGN KEY (`segmentos_id`) REFERENCES `segmentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_orden_partida`
--

LOCK TABLES `requisicion_orden_partida` WRITE;
/*!40000 ALTER TABLE `requisicion_orden_partida` DISABLE KEYS */;
INSERT INTO `requisicion_orden_partida` VALUES (21,'6',10,15,1,7),(23,'10',14,17,1,9),(24,'5',15,17,8,9),(25,'5',24,18,1,10),(26,'1',25,18,5,10),(27,'5',12,19,5,7),(30,'2',14,21,1,9),(31,'2',15,21,8,9);
/*!40000 ALTER TABLE `requisicion_orden_partida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_orden_proveedor`
--

DROP TABLE IF EXISTS `requisicion_orden_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_orden_proveedor` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `orden_compra_id` bigint(20) NOT NULL,
  `proveedores_id` int(10) unsigned NOT NULL,
  `forma_pago_id` bigint(20) NOT NULL,
  `metodo_pago_id` bigint(20) NOT NULL,
  `uso_cfdi` mediumtext DEFAULT NULL,
  `precio_unitario` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_orden_proveedor_requisicion_orden_compra1_idx` (`orden_compra_id`),
  KEY `fk_requisicion_orden_proveedor_requisicion_forma_pago1_idx` (`forma_pago_id`),
  KEY `fk_requisicion_orden_proveedor_requisicion_metodo_pago1_idx` (`metodo_pago_id`),
  KEY `fk_requisicion_orden_proveedor_proveedores1_idx` (`proveedores_id`),
  CONSTRAINT `fk_requisicion_orden_proveedor_proveedores1` FOREIGN KEY (`proveedores_id`) REFERENCES `proveedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_orden_proveedor_requisicion_forma_pago1` FOREIGN KEY (`forma_pago_id`) REFERENCES `requisicion_forma_pago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_orden_proveedor_requisicion_metodo_pago1` FOREIGN KEY (`metodo_pago_id`) REFERENCES `requisicion_metodo_pago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_orden_proveedor_requisicion_orden_compra1` FOREIGN KEY (`orden_compra_id`) REFERENCES `requisicion_orden_compra` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_orden_proveedor`
--

LOCK TABLES `requisicion_orden_proveedor` WRITE;
/*!40000 ALTER TABLE `requisicion_orden_proveedor` DISABLE KEYS */;
INSERT INTO `requisicion_orden_proveedor` VALUES (15,7,1,1,1,'1',500000.00,'2022-12-20 00:42:44','2022-12-20 00:42:44'),(17,9,1,1,1,'1',250000.00,'2022-12-23 00:54:12','2022-12-23 00:54:12'),(18,10,1,1,1,'prueba',300000.00,'2023-01-31 03:46:08','2023-01-31 03:46:08'),(19,7,1,1,1,'prueba',450000.00,'2023-08-02 12:12:57','2023-08-02 12:12:57'),(21,9,1,1,1,'prueba',600000.00,'2023-08-31 04:23:53','2023-08-31 04:23:53');
/*!40000 ALTER TABLE `requisicion_orden_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_partida`
--

DROP TABLE IF EXISTS `requisicion_partida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_partida` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `requisicion_id` bigint(20) NOT NULL,
  `requisicion_partida_estatus_id` bigint(20) NOT NULL,
  `segmentos_id` int(11) NOT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `precio_unitario` decimal(15,2) DEFAULT NULL,
  `cantidad_orden` varchar(255) DEFAULT NULL,
  `observaciones` mediumtext DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `orden_estatus` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_partida_requisicion1_idx` (`requisicion_id`),
  KEY `fk_requisicion_partida_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_partida_users2_idx` (`iduserUpdated`),
  KEY `fk_requisicion_partida_requisicion_partida_estatus1_idx` (`requisicion_partida_estatus_id`),
  KEY `fk_requisicion_partida_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_requisicion_partida_segmentos1_idx` (`segmentos_id`),
  CONSTRAINT `fk_requisicion_partida_requisicion1` FOREIGN KEY (`requisicion_id`) REFERENCES `requisicion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_requisicion_partida_estatus1` FOREIGN KEY (`requisicion_partida_estatus_id`) REFERENCES `requisicion_partida_estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_segmentos1` FOREIGN KEY (`segmentos_id`) REFERENCES `segmentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_partida`
--

LOCK TABLES `requisicion_partida` WRITE;
/*!40000 ALTER TABLE `requisicion_partida` DISABLE KEYS */;
INSERT INTO `requisicion_partida` VALUES (10,11,1,1,'12',NULL,'6','ninguna',1,0,'2022-12-07 03:11:47','2022-12-20 00:42:44',1,1),(11,11,1,7,'5',NULL,'5','no',2,0,'2022-12-07 03:49:25','2022-12-07 03:49:32',1,1),(12,11,1,5,'20',NULL,'15','no',1,0,'2022-12-08 03:33:34','2023-08-02 12:12:57',1,1),(13,11,1,6,'7',NULL,'7','no',1,0,'2022-12-08 03:33:34','2022-12-17 02:10:54',1,1),(14,12,1,1,'20',NULL,'8','no',1,0,'2022-12-20 00:42:01','2023-08-31 04:23:53',1,1),(15,12,1,8,'15',NULL,'8','no',1,0,'2022-12-20 00:42:01','2023-08-31 04:23:53',1,1),(16,13,1,1,'20',NULL,'20','Ninguna',1,0,'2023-01-04 04:03:15','2023-01-04 04:03:15',1,1),(17,13,1,8,'10',NULL,'10','No',1,0,'2023-01-04 04:03:15','2023-01-04 04:03:15',1,1),(18,13,1,6,'15',NULL,'15','ninguna',1,0,'2023-01-04 04:04:33','2023-01-04 04:04:33',1,1),(19,13,1,1,'10',NULL,'10','No',1,0,'2023-01-04 04:10:53','2023-01-04 04:10:53',1,1),(20,14,1,5,'50',NULL,'50','no',1,0,'2023-01-04 04:47:30','2023-01-04 04:47:30',1,1),(21,14,1,7,'30',NULL,'30','no',1,0,'2023-01-04 04:47:30','2023-01-04 04:47:30',1,1),(22,13,1,8,'30',NULL,'30','No',1,0,'2023-01-05 02:17:05','2023-01-05 02:17:05',1,1),(23,13,1,5,'20',NULL,'20','Ninguno',1,0,'2023-01-05 02:17:05','2023-01-05 02:17:05',1,1),(24,15,1,1,'10',1450.00,'5','',1,0,'2023-01-31 03:42:34','2023-08-17 00:23:20',1,1),(25,15,1,5,'5',7500.00,'4','',1,0,'2023-01-31 03:42:34','2023-08-17 00:23:10',1,1),(26,16,1,8,'40',NULL,NULL,'',1,0,'2023-08-03 00:23:37','2023-08-03 00:23:37',1,1);
/*!40000 ALTER TABLE `requisicion_partida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_partida_aseguramiento`
--

DROP TABLE IF EXISTS `requisicion_partida_aseguramiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_partida_aseguramiento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `requisicion_partida_id` bigint(20) NOT NULL,
  `requisicion_cobertura_id` bigint(20) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `vigencia` varchar(255) DEFAULT NULL,
  `observaciones` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_partida_aseguramiento_requisicion_partida1_idx` (`requisicion_partida_id`),
  KEY `fk_requisicion_partida_aseguramiento_requisicion_cobertura1_idx` (`requisicion_cobertura_id`),
  KEY `fk_requisicion_partida_aseguramiento_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_requisicion_partida_aseguramiento_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_partida_aseguramiento_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_requisicion_partida_aseguramiento_requisicion_cobertura1` FOREIGN KEY (`requisicion_cobertura_id`) REFERENCES `requisicion_cobertura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_aseguramiento_requisicion_partida1` FOREIGN KEY (`requisicion_partida_id`) REFERENCES `requisicion_partida` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_aseguramiento_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_aseguramiento_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_aseguramiento_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_partida_aseguramiento`
--

LOCK TABLES `requisicion_partida_aseguramiento` WRITE;
/*!40000 ALTER TABLE `requisicion_partida_aseguramiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisicion_partida_aseguramiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_partida_emplacamiento`
--

DROP TABLE IF EXISTS `requisicion_partida_emplacamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_partida_emplacamiento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `requisicion_partida_id` bigint(20) NOT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `requisicion_entidad_federativa_id` bigint(20) NOT NULL,
  `requisicion_tipo_placas_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_partida_emplacamiento_requisicion_tipo_placa_idx` (`requisicion_tipo_placas_id`),
  KEY `fk_requisicion_partida_emplacamiento_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_partida_emplacamiento_users2_idx` (`iduserUpdated`),
  KEY `fk_requisicion_partida_emplacamiento_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_requisicion_partida_emplacamiento_requisicion_entidad_fe_idx` (`requisicion_entidad_federativa_id`),
  KEY `fk_requisicion_partida_emplacamiento_requisicion_partida1_idx` (`requisicion_partida_id`),
  CONSTRAINT `fk_requisicion_partida_emplacamiento_requisicion_entidad_fede1` FOREIGN KEY (`requisicion_entidad_federativa_id`) REFERENCES `requisicion_entidad_federativa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_emplacamiento_requisicion_partida1` FOREIGN KEY (`requisicion_partida_id`) REFERENCES `requisicion_partida` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_emplacamiento_requisicion_tipo_placas1` FOREIGN KEY (`requisicion_tipo_placas_id`) REFERENCES `requisicion_tipo_placas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_emplacamiento_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_emplacamiento_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_emplacamiento_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_partida_emplacamiento`
--

LOCK TABLES `requisicion_partida_emplacamiento` WRITE;
/*!40000 ALTER TABLE `requisicion_partida_emplacamiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisicion_partida_emplacamiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_partida_equipamiento`
--

DROP TABLE IF EXISTS `requisicion_partida_equipamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_partida_equipamiento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `requisicion_partida_id` bigint(20) NOT NULL,
  `requisicion_subgrupo_id` bigint(20) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `observaciones` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_partida_equipamiento_requisicion_partida1_idx` (`requisicion_partida_id`),
  KEY `fk_requisicion_partida_equipamiento_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_requisicion_partida_equipamiento_requisicion_subgrupo1_idx` (`requisicion_subgrupo_id`),
  KEY `fk_requisicion_partida_equipamiento_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_partida_equipamiento_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_requisicion_partida_equipamiento_requisicion_partida1` FOREIGN KEY (`requisicion_partida_id`) REFERENCES `requisicion_partida` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_equipamiento_requisicion_subgrupo1` FOREIGN KEY (`requisicion_subgrupo_id`) REFERENCES `requisicion_subgrupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_equipamiento_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_equipamiento_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_equipamiento_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_partida_equipamiento`
--

LOCK TABLES `requisicion_partida_equipamiento` WRITE;
/*!40000 ALTER TABLE `requisicion_partida_equipamiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisicion_partida_equipamiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_partida_estatus`
--

DROP TABLE IF EXISTS `requisicion_partida_estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_partida_estatus` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estatus` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_partida_estatus_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_partida_estatus_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_requisicion_partida_estatus_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_estatus_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_partida_estatus`
--

LOCK TABLES `requisicion_partida_estatus` WRITE;
/*!40000 ALTER TABLE `requisicion_partida_estatus` DISABLE KEYS */;
INSERT INTO `requisicion_partida_estatus` VALUES (1,'Pendiente',NULL,NULL,1,1),(2,'Activo',NULL,NULL,1,1);
/*!40000 ALTER TABLE `requisicion_partida_estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_partida_lugar_entrega`
--

DROP TABLE IF EXISTS `requisicion_partida_lugar_entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_partida_lugar_entrega` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `requisicion_partida_id` bigint(20) NOT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `fecha_entrega` varchar(255) DEFAULT NULL,
  `requisicion_entidad_federativa_id` bigint(20) NOT NULL,
  `municipio` varchar(255) DEFAULT NULL,
  `localidad` varchar(255) DEFAULT NULL,
  `requisicion_combustible_id` bigint(20) NOT NULL,
  `observaciones` mediumtext DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_partida_lugar_entrega_requisicion_combustibl_idx` (`requisicion_combustible_id`),
  KEY `fk_requisicion_partida_lugar_entrega_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_partida_lugar_entrega_users2_idx` (`iduserUpdated`),
  KEY `fk_requisicion_partida_lugar_entrega_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_requisicion_partida_lugar_entrega_requisicion_entidad_fe_idx` (`requisicion_entidad_federativa_id`),
  KEY `fk_requisicion_partida_lugar_entrega_requisicion_partida1_idx` (`requisicion_partida_id`),
  CONSTRAINT `fk_requisicion_partida_lugar_entrega_requisicion_combustible1` FOREIGN KEY (`requisicion_combustible_id`) REFERENCES `requisicion_combustible` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_lugar_entrega_requisicion_entidad_fede1` FOREIGN KEY (`requisicion_entidad_federativa_id`) REFERENCES `requisicion_entidad_federativa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_lugar_entrega_requisicion_partida1` FOREIGN KEY (`requisicion_partida_id`) REFERENCES `requisicion_partida` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_lugar_entrega_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_lugar_entrega_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_partida_lugar_entrega_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_partida_lugar_entrega`
--

LOCK TABLES `requisicion_partida_lugar_entrega` WRITE;
/*!40000 ALTER TABLE `requisicion_partida_lugar_entrega` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisicion_partida_lugar_entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_subgrupo`
--

DROP TABLE IF EXISTS `requisicion_subgrupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_subgrupo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` mediumtext DEFAULT NULL,
  `requisicion_grupo_id` bigint(20) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_subgrupo_requisicion_grupo1_idx` (`requisicion_grupo_id`),
  KEY `fk_requisicion_subgrupo_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_requisicion_subgrupo_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_subgrupo_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_requisicion_subgrupo_requisicion_grupo1` FOREIGN KEY (`requisicion_grupo_id`) REFERENCES `requisicion_grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_subgrupo_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_subgrupo_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_subgrupo_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_subgrupo`
--

LOCK TABLES `requisicion_subgrupo` WRITE;
/*!40000 ALTER TABLE `requisicion_subgrupo` DISABLE KEYS */;
INSERT INTO `requisicion_subgrupo` VALUES (1,'Torreta',1,1,'2023-10-18 03:51:57','2023-10-18 03:51:57',1,1),(2,'Radio',1,1,'2023-10-18 03:52:03','2023-10-18 03:52:03',1,1),(3,'camilla',2,1,'2023-10-18 03:52:24','2023-10-18 03:52:24',1,1);
/*!40000 ALTER TABLE `requisicion_subgrupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_tipo_placas`
--

DROP TABLE IF EXISTS `requisicion_tipo_placas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_tipo_placas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` mediumtext DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_tipo_placas_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_requisicion_tipo_placas_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_tipo_placas_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_requisicion_tipo_placas_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_tipo_placas_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_tipo_placas_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_tipo_placas`
--

LOCK TABLES `requisicion_tipo_placas` WRITE;
/*!40000 ALTER TABLE `requisicion_tipo_placas` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisicion_tipo_placas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicion_tipo_transporte`
--

DROP TABLE IF EXISTS `requisicion_tipo_transporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_tipo_transporte` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` mediumtext DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisicion_tipo_transporte_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_requisicion_tipo_transporte_users1_idx` (`iduserCreated`),
  KEY `fk_requisicion_tipo_transporte_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_requisicion_tipo_transporte_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_tipo_transporte_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicion_tipo_transporte_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicion_tipo_transporte`
--

LOCK TABLES `requisicion_tipo_transporte` WRITE;
/*!40000 ALTER TABLE `requisicion_tipo_transporte` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisicion_tipo_transporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(19) unsigned NOT NULL,
  `role_id` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,4),(1,7),(1,8),(1,10),(2,4),(2,7),(2,8),(2,10),(3,4),(3,7),(3,8),(3,10),(4,4),(4,8),(4,10),(5,4),(5,7),(5,10),(6,4),(6,10),(7,4),(7,10),(8,4),(8,10),(9,4),(9,9),(9,13),(10,4),(10,9),(10,13),(11,4),(11,9),(11,13),(12,4),(12,9),(12,13),(13,4),(13,9),(13,13),(14,4),(14,9),(14,13),(15,4),(15,9),(15,13),(16,4),(16,9),(16,13),(17,4),(17,9),(17,13),(18,4),(18,9),(18,13),(19,4),(19,9),(19,13),(20,4),(20,9),(20,13),(21,4),(21,13),(22,4),(22,13),(23,4),(23,13),(24,4),(24,13),(25,4),(25,9),(25,13),(26,4),(26,9),(26,13),(27,4),(27,9),(27,13),(28,4),(28,9),(28,13),(29,4),(29,9),(29,13),(30,4),(30,9),(30,13),(31,4),(31,9),(31,13),(32,4),(32,9),(32,13),(33,4),(33,11),(34,4),(34,11),(35,4),(35,11),(36,4),(36,11),(37,4),(37,11),(38,4),(38,11),(39,4),(39,11),(40,4),(40,11),(41,4),(41,11),(42,4),(42,11),(43,4),(43,11),(44,4),(44,11),(45,4),(45,13),(46,4),(46,13),(47,4),(47,13),(48,4),(48,13),(49,4),(49,13),(50,4),(50,13),(51,4),(51,13),(52,4),(52,13),(53,4),(53,13),(54,4),(54,13),(55,4),(55,13),(56,4),(56,13),(57,4),(57,13),(58,4),(58,13),(59,4),(59,13),(60,4),(60,13),(61,4),(61,11),(62,4),(62,11),(63,4),(63,11),(64,4),(64,11),(65,4),(65,11),(66,4),(66,11),(67,4),(67,11),(68,4),(68,11),(69,4),(69,11),(70,4),(70,11),(71,4),(71,11),(72,4),(72,11),(73,4),(73,11),(74,4),(74,11),(75,4),(75,11),(76,4),(76,11),(77,4),(77,11),(78,4),(78,11),(79,4),(79,11),(80,4),(80,11),(81,4),(81,11),(82,4),(82,11),(83,4),(83,11),(84,4),(84,11),(85,4),(85,11),(86,4),(86,11),(87,4),(87,11),(88,4),(88,11),(89,4),(89,11),(90,4),(90,11),(91,4),(91,11),(92,4),(92,11),(93,4),(93,11),(94,4),(94,11),(95,4),(95,11),(96,4),(96,11),(97,4),(97,11),(98,4),(98,11),(99,4),(99,11),(100,4),(100,11),(101,4),(101,11),(102,4),(102,11),(103,4),(103,11),(104,4),(104,11),(105,4),(105,11),(106,4),(106,11),(107,4),(107,11),(108,4),(108,11),(109,11),(109,12),(109,13),(110,4),(111,4),(112,4),(113,4),(114,4),(114,11),(115,4),(115,11),(116,4),(116,11),(117,4),(117,11),(118,4),(118,11),(119,4),(119,11),(120,4),(120,11),(121,4),(121,11),(122,4),(122,11),(123,4),(123,11),(124,4),(124,13),(125,4),(125,13),(126,4),(126,13),(127,4),(127,13),(128,4),(128,12),(129,4),(129,12),(130,4),(130,12),(131,4),(132,4),(133,4),(134,4),(135,4),(136,4),(137,4),(138,4),(139,4),(140,4),(141,4),(142,4);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_delete` int(11) NOT NULL DEFAULT 0,
  `color_menu` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (4,'Administrador','web',0,'#ff881a','2022-05-25 23:42:56','2023-08-16 03:49:42'),(7,'Ventas','web',0,'#fd3f3f','2022-05-27 21:30:01','2022-10-07 02:05:20'),(8,'Juridico','web',0,'#ff6161','2022-06-16 03:42:04','2022-06-16 03:42:20'),(9,'Supervisor de proyecto','web',0,'#99ffaa','2022-07-06 00:20:39','2022-10-07 02:06:03'),(10,'Ejecutivo de cuenta','web',0,'#ff6161','2022-07-07 02:49:43','2022-07-07 02:49:43'),(11,'DireccionComercial','web',0,'#000000','2022-11-08 05:07:01','2022-11-08 05:08:51'),(12,'Direccion Contratos','web',0,NULL,'2022-11-08 05:09:27','2022-11-08 05:09:27'),(13,'Direccion Operaciones','web',0,NULL,'2022-11-08 05:11:26','2022-11-08 05:11:26');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_user`
--

DROP TABLE IF EXISTS `roles_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_delete` int(11) NOT NULL DEFAULT 0,
  `iduserCreated` bigint(19) unsigned DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_user`
--

LOCK TABLES `roles_user` WRITE;
/*!40000 ALTER TABLE `roles_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_accesorios`
--

DROP TABLE IF EXISTS `segmento_accesorios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_accesorios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accesorios` mediumtext NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_accesorios_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_accesorios_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_accesorios_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_accesorios_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_accesorios_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_accesorios_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_accesorios`
--

LOCK TABLES `segmento_accesorios` WRITE;
/*!40000 ALTER TABLE `segmento_accesorios` DISABLE KEYS */;
INSERT INTO `segmento_accesorios` VALUES (1,'Herramienta menor',1,'2022-07-21 00:54:01','2022-07-26 21:38:04',1,1),(2,'Extintor',1,'2022-07-21 00:54:01','2022-07-26 21:31:20',1,1),(3,'Gato',1,'2022-07-21 00:54:01','2022-07-21 00:54:01',1,1),(4,'Cables pasa corriente',1,'2022-07-21 00:54:01','2022-07-21 00:54:01',1,1),(5,'Llave de birlos',1,'2022-07-21 00:54:01','2022-07-21 00:54:01',1,1);
/*!40000 ALTER TABLE `segmento_accesorios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_blindaje`
--

DROP TABLE IF EXISTS `segmento_blindaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_blindaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blindaje` varchar(255) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_blindaje_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_blindaje_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_blindaje_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_blindaje_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_blindaje_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_blindaje_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_blindaje`
--

LOCK TABLES `segmento_blindaje` WRITE;
/*!40000 ALTER TABLE `segmento_blindaje` DISABLE KEYS */;
INSERT INTO `segmento_blindaje` VALUES (1,'NIJ-IIIA',1,'2022-07-21 00:54:01','2022-07-21 00:54:01',1,1),(2,'B6',1,'2022-07-30 02:28:10','2022-07-30 02:37:30',1,1);
/*!40000 ALTER TABLE `segmento_blindaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_capacidad`
--

DROP TABLE IF EXISTS `segmento_capacidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_capacidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `capacidad` varchar(255) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_capacidad_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_capacidad_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_capacidad_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_capacidad_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_capacidad_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_capacidad_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_capacidad`
--

LOCK TABLES `segmento_capacidad` WRITE;
/*!40000 ALTER TABLE `segmento_capacidad` DISABLE KEYS */;
INSERT INTO `segmento_capacidad` VALUES (1,'15 Toneladas',1,'2022-07-21 00:54:01','2022-07-21 00:54:01',1,1),(2,'3 Toneladas',1,'2022-07-30 02:47:16','2022-07-30 02:57:02',1,1);
/*!40000 ALTER TABLE `segmento_capacidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_carroceria`
--

DROP TABLE IF EXISTS `segmento_carroceria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_carroceria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carroceria` varchar(255) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_carroceria_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_carroceria_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_carroceria_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_carroceria_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_carroceria_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_carroceria_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_carroceria`
--

LOCK TABLES `segmento_carroceria` WRITE;
/*!40000 ALTER TABLE `segmento_carroceria` DISABLE KEYS */;
INSERT INTO `segmento_carroceria` VALUES (1,'Basico',1,'2022-07-22 03:04:28','2022-07-22 03:20:36',1,1),(2,'Mediano',1,'2022-07-22 03:04:39','2022-07-22 03:04:39',1,1),(3,'Grande',1,'2022-07-22 03:05:14','2022-07-22 03:05:14',1,1);
/*!40000 ALTER TABLE `segmento_carroceria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_cilindro`
--

DROP TABLE IF EXISTS `segmento_cilindro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_cilindro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cilindro` varchar(255) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_cilindro_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_cilindro_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_cilindro_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_cilindro_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_cilindro_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_cilindro_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_cilindro`
--

LOCK TABLES `segmento_cilindro` WRITE;
/*!40000 ALTER TABLE `segmento_cilindro` DISABLE KEYS */;
INSERT INTO `segmento_cilindro` VALUES (1,'Cil',1,'2022-07-22 21:19:08','2022-07-22 21:31:25',1,1);
/*!40000 ALTER TABLE `segmento_cilindro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_direccion`
--

DROP TABLE IF EXISTS `segmento_direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_direccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `direccion` varchar(255) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_direccion_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_direccion_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_direccion_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_direccion_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_direccion_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_direccion_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_direccion`
--

LOCK TABLES `segmento_direccion` WRITE;
/*!40000 ALTER TABLE `segmento_direccion` DISABLE KEYS */;
INSERT INTO `segmento_direccion` VALUES (1,'Asistida',1,'2022-07-21 00:54:01','2022-07-30 01:21:06',1,1),(2,'Opcional',1,'2022-07-30 01:17:01','2022-07-30 01:27:59',1,1);
/*!40000 ALTER TABLE `segmento_direccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_en_inventario`
--

DROP TABLE IF EXISTS `segmento_en_inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_en_inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `en_inventario` varchar(255) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_en_inventario_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_en_inventario_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_en_inventario_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_en_inventario_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_en_inventario_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_en_inventario_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_en_inventario`
--

LOCK TABLES `segmento_en_inventario` WRITE;
/*!40000 ALTER TABLE `segmento_en_inventario` DISABLE KEYS */;
INSERT INTO `segmento_en_inventario` VALUES (1,'Si',1,'2022-07-21 00:54:01','2022-08-02 00:01:17',1,1),(2,'No',1,'2022-08-01 23:58:02','2022-08-02 00:08:51',1,1);
/*!40000 ALTER TABLE `segmento_en_inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_espejos_laterales`
--

DROP TABLE IF EXISTS `segmento_espejos_laterales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_espejos_laterales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `espejos_laterales` varchar(255) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_espejos_laterales_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_espejos_laterales_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_espejos_laterales_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_espejos_laterales_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_espejos_laterales_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_espejos_laterales_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_espejos_laterales`
--

LOCK TABLES `segmento_espejos_laterales` WRITE;
/*!40000 ALTER TABLE `segmento_espejos_laterales` DISABLE KEYS */;
INSERT INTO `segmento_espejos_laterales` VALUES (1,'Derecho',1,'2022-07-25 22:03:36','2022-07-25 22:37:37',1,1),(2,'Izquierdo',1,'2022-07-25 22:03:44','2022-07-25 22:03:44',1,1);
/*!40000 ALTER TABLE `segmento_espejos_laterales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_gps`
--

DROP TABLE IF EXISTS `segmento_gps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_gps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gps` varchar(255) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_gps_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_gps_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_gps_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_gps_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_gps_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_gps_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_gps`
--

LOCK TABLES `segmento_gps` WRITE;
/*!40000 ALTER TABLE `segmento_gps` DISABLE KEYS */;
INSERT INTO `segmento_gps` VALUES (1,'Si',1,'2022-07-21 00:54:01','2022-08-01 23:41:04',1,1),(2,'No',1,'2022-08-01 23:36:57','2022-08-01 23:47:32',1,1);
/*!40000 ALTER TABLE `segmento_gps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_llanta_refaccion`
--

DROP TABLE IF EXISTS `segmento_llanta_refaccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_llanta_refaccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `llanta_refaccion` varchar(45) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_llanta_refaccion_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_llanta_refaccion_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_llanta_refaccion_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_llanta_refaccion_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_llanta_refaccion_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_llanta_refaccion_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_llanta_refaccion`
--

LOCK TABLES `segmento_llanta_refaccion` WRITE;
/*!40000 ALTER TABLE `segmento_llanta_refaccion` DISABLE KEYS */;
INSERT INTO `segmento_llanta_refaccion` VALUES (1,'Si',1,'2022-07-25 21:38:16','2022-07-25 21:42:20',1,1),(2,'No',1,'2022-07-25 21:42:27','2022-07-25 21:51:00',1,1);
/*!40000 ALTER TABLE `segmento_llanta_refaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_motor`
--

DROP TABLE IF EXISTS `segmento_motor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_motor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motor` varchar(255) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_motor_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_motor_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_motor_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_motor_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_motor_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_motor_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_motor`
--

LOCK TABLES `segmento_motor` WRITE;
/*!40000 ALTER TABLE `segmento_motor` DISABLE KEYS */;
INSERT INTO `segmento_motor` VALUES (1,'Gasolina',1,'2022-07-22 22:05:18','2022-07-22 22:09:14',1,1),(2,'Diesel',1,'2022-07-22 22:09:21','2022-07-22 22:16:14',1,1);
/*!40000 ALTER TABLE `segmento_motor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_no_cilindro`
--

DROP TABLE IF EXISTS `segmento_no_cilindro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_no_cilindro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_cilindro` int(11) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_no_cilindro_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_no_cilindro_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_no_cilindro_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_no_cilindro_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_no_cilindro_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_no_cilindro_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_no_cilindro`
--

LOCK TABLES `segmento_no_cilindro` WRITE;
/*!40000 ALTER TABLE `segmento_no_cilindro` DISABLE KEYS */;
INSERT INTO `segmento_no_cilindro` VALUES (1,4,1,'2022-07-22 03:36:29','2022-07-22 21:06:56',1,1),(2,6,1,'2022-07-22 03:36:37','2022-07-22 03:36:37',1,1);
/*!40000 ALTER TABLE `segmento_no_cilindro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_pasajero`
--

DROP TABLE IF EXISTS `segmento_pasajero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_pasajero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `segmento_pasajerocol` int(11) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_pasajero_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_pasajero_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_pasajero_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_pasajero_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_pasajero_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_pasajero_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_pasajero`
--

LOCK TABLES `segmento_pasajero` WRITE;
/*!40000 ALTER TABLE `segmento_pasajero` DISABLE KEYS */;
INSERT INTO `segmento_pasajero` VALUES (1,5,1,'2022-07-22 21:42:59','2022-07-22 21:53:50',1,1),(2,7,1,'2022-07-22 21:43:07','2022-07-22 21:43:07',1,1);
/*!40000 ALTER TABLE `segmento_pasajero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_potencia`
--

DROP TABLE IF EXISTS `segmento_potencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_potencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `potencia` varchar(255) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_potencia_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_potencia_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_potencia_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_potencia_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_potencia_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_potencia_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_potencia`
--

LOCK TABLES `segmento_potencia` WRITE;
/*!40000 ALTER TABLE `segmento_potencia` DISABLE KEYS */;
INSERT INTO `segmento_potencia` VALUES (1,'90HP',1,'2022-07-21 00:54:01','2022-07-26 22:09:03',1,1),(2,'116 Hp',1,'2022-07-26 21:52:46','2022-07-26 21:52:46',1,1),(3,'176 Hp',1,'2022-07-26 21:53:00','2022-07-26 21:53:00',1,1);
/*!40000 ALTER TABLE `segmento_potencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_puerta`
--

DROP TABLE IF EXISTS `segmento_puerta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_puerta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `puertas` int(11) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_puerta_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_puerta_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_puerta_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_puerta_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_puerta_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_puerta_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_puerta`
--

LOCK TABLES `segmento_puerta` WRITE;
/*!40000 ALTER TABLE `segmento_puerta` DISABLE KEYS */;
INSERT INTO `segmento_puerta` VALUES (1,2,1,'2022-07-21 21:41:31','2022-07-22 03:20:56',1,1),(2,4,1,'2022-07-21 21:41:37','2022-07-21 21:41:37',1,1);
/*!40000 ALTER TABLE `segmento_puerta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_radio`
--

DROP TABLE IF EXISTS `segmento_radio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_radio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `radio` varchar(45) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_radio_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_radio_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_radio_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_radio_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_radio_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_radio_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_radio`
--

LOCK TABLES `segmento_radio` WRITE;
/*!40000 ALTER TABLE `segmento_radio` DISABLE KEYS */;
INSERT INTO `segmento_radio` VALUES (1,'Si',1,'2022-07-21 00:54:01','2022-07-30 01:04:54',1,1),(2,'No',1,'2022-07-30 00:53:00','2022-07-30 00:53:00',1,1);
/*!40000 ALTER TABLE `segmento_radio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_tipo_vehiculo`
--

DROP TABLE IF EXISTS `segmento_tipo_vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_tipo_vehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_vehiculo` varchar(255) DEFAULT NULL,
  `status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_tipo_vehiculo_siaf_status1_idx` (`status_delete`),
  KEY `fk_segmento_tipo_vehiculo_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_tipo_vehiculo_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_segmento_tipo_vehiculo_siaf_status2` FOREIGN KEY (`status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_tipo_vehiculo_users3` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_tipo_vehiculo_users4` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_tipo_vehiculo`
--

LOCK TABLES `segmento_tipo_vehiculo` WRITE;
/*!40000 ALTER TABLE `segmento_tipo_vehiculo` DISABLE KEYS */;
INSERT INTO `segmento_tipo_vehiculo` VALUES (7,'Sedán Básico',1,'2022-08-20 02:13:20','2022-12-07 02:51:23',1,1),(8,'Suv-5 pasajeros',1,'2022-11-17 02:11:30','2022-12-07 02:51:29',1,1);
/*!40000 ALTER TABLE `segmento_tipo_vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmento_transmision`
--

DROP TABLE IF EXISTS `segmento_transmision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmento_transmision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transmision` varchar(255) NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmento_transmision_users1_idx` (`iduserCreated`),
  KEY `fk_segmento_transmision_users2_idx` (`iduserUpdated`),
  KEY `fk_segmento_transmision_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmento_transmision_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_transmision_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmento_transmision_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmento_transmision`
--

LOCK TABLES `segmento_transmision` WRITE;
/*!40000 ALTER TABLE `segmento_transmision` DISABLE KEYS */;
INSERT INTO `segmento_transmision` VALUES (1,'Manual',1,'2022-07-21 00:54:01','2022-07-26 22:51:09',1,1),(2,'Automatica',1,'2022-07-21 00:54:01','2022-07-21 00:54:01',1,1);
/*!40000 ALTER TABLE `segmento_transmision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmentos`
--

DROP TABLE IF EXISTS `segmentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_status_delete` int(11) NOT NULL,
  `tipo_vehiculo_id` int(11) NOT NULL,
  `puerta_id` int(11) NOT NULL,
  `carroceria_id` int(11) NOT NULL,
  `no_cilindro_id` int(11) NOT NULL,
  `cilindro_id` int(11) NOT NULL,
  `pasajero_id` int(11) NOT NULL,
  `motor_id` int(11) NOT NULL,
  `capacidad_id` int(11) DEFAULT NULL,
  `llanta_refaccion_id` int(11) NOT NULL,
  `potencia_id` int(11) DEFAULT NULL,
  `transmision_id` int(11) NOT NULL,
  `gps_id` int(11) DEFAULT NULL,
  `radio_id` int(11) DEFAULT NULL,
  `direccion_id` int(11) DEFAULT NULL,
  `blindaje_id` int(11) DEFAULT NULL,
  `en_inventario_id` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `espejos_laterales` varchar(45) DEFAULT NULL,
  `accesorios` varchar(45) DEFAULT NULL,
  `motivo_desactivar` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_segmentos_segmento_tipo_vehiculo1_idx` (`tipo_vehiculo_id`),
  KEY `fk_segmentos_segmento_puerta1_idx` (`puerta_id`),
  KEY `fk_segmentos_segmento_carroceria1_idx` (`carroceria_id`),
  KEY `fk_segmentos_segmento_no_cilindro1_idx` (`no_cilindro_id`),
  KEY `fk_segmentos_segmento_cilindro1_idx` (`cilindro_id`),
  KEY `fk_segmentos_segmento_pasajero1_idx` (`pasajero_id`),
  KEY `fk_segmentos_segmento_motor1_idx` (`motor_id`),
  KEY `fk_segmentos_segmento_capacidad1_idx` (`capacidad_id`),
  KEY `fk_segmentos_segmento_llanta_refaccion1_idx` (`llanta_refaccion_id`),
  KEY `fk_segmentos_segmento_potencia1_idx` (`potencia_id`),
  KEY `fk_segmentos_segmento_transmision1_idx` (`transmision_id`),
  KEY `fk_segmentos_segmento_gps1_idx` (`gps_id`),
  KEY `fk_segmentos_segmento_radio1_idx` (`radio_id`),
  KEY `fk_segmentos_segmento_direccion1_idx` (`direccion_id`),
  KEY `fk_segmentos_segmento_blindaje1_idx` (`blindaje_id`),
  KEY `fk_segmentos_segmento_en_inventario1_idx` (`en_inventario_id`),
  KEY `fk_segmentos_users1_idx` (`iduserCreated`),
  KEY `fk_segmentos_users2_idx` (`iduserUpdated`),
  KEY `fk_segmentos_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_segmentos_segmento_blindaje1` FOREIGN KEY (`blindaje_id`) REFERENCES `segmento_blindaje` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_segmento_capacidad1` FOREIGN KEY (`capacidad_id`) REFERENCES `segmento_capacidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_segmento_carroceria1` FOREIGN KEY (`carroceria_id`) REFERENCES `segmento_carroceria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_segmento_cilindro1` FOREIGN KEY (`cilindro_id`) REFERENCES `segmento_cilindro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_segmento_direccion1` FOREIGN KEY (`direccion_id`) REFERENCES `segmento_direccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_segmento_en_inventario1` FOREIGN KEY (`en_inventario_id`) REFERENCES `segmento_en_inventario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_segmento_gps1` FOREIGN KEY (`gps_id`) REFERENCES `segmento_gps` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_segmento_llanta_refaccion1` FOREIGN KEY (`llanta_refaccion_id`) REFERENCES `segmento_llanta_refaccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_segmento_motor1` FOREIGN KEY (`motor_id`) REFERENCES `segmento_motor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_segmento_no_cilindro1` FOREIGN KEY (`no_cilindro_id`) REFERENCES `segmento_no_cilindro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_segmento_pasajero1` FOREIGN KEY (`pasajero_id`) REFERENCES `segmento_pasajero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_segmento_potencia1` FOREIGN KEY (`potencia_id`) REFERENCES `segmento_potencia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_segmento_puerta1` FOREIGN KEY (`puerta_id`) REFERENCES `segmento_puerta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_segmento_radio1` FOREIGN KEY (`radio_id`) REFERENCES `segmento_radio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_segmento_tipo_vehiculo1` FOREIGN KEY (`tipo_vehiculo_id`) REFERENCES `segmento_tipo_vehiculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_segmento_transmision1` FOREIGN KEY (`transmision_id`) REFERENCES `segmento_transmision` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_segmentos_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmentos`
--

LOCK TABLES `segmentos` WRITE;
/*!40000 ALTER TABLE `segmentos` DISABLE KEYS */;
INSERT INTO `segmentos` VALUES (1,1,7,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'2022-07-21 00:54:01','2022-08-20 02:53:02','1,2','1,2',NULL),(5,1,7,1,2,1,1,1,2,1,2,2,2,2,1,1,1,1,1,1,'2022-07-26 02:21:20','2022-07-26 02:21:20','1,2','1,2,4',NULL),(6,1,7,2,2,2,1,2,2,1,2,2,2,2,1,2,2,1,1,1,'2022-07-26 03:28:07','2022-07-26 03:38:48','1,2','1,2',NULL),(7,1,7,2,3,2,1,1,1,1,1,2,1,1,1,1,1,1,1,1,'2022-07-27 02:29:01','2022-07-27 02:29:01','1,2','1,3,4,5',NULL),(8,1,7,2,3,2,1,1,1,1,1,3,2,1,1,1,1,1,1,1,'2022-10-21 22:05:32','2022-10-21 22:05:32','1,2','3,4,5',NULL),(9,1,7,1,2,1,1,1,1,1,1,2,1,1,2,2,1,1,1,1,'2022-10-21 22:08:21','2022-12-02 03:57:47','1,2','2,5','Segmento no cumple con requisitos');
/*!40000 ALTER TABLE `segmentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siaf_status`
--

DROP TABLE IF EXISTS `siaf_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siaf_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estatus` int(11) DEFAULT NULL,
  `descripcion` varchar(95) DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_siaf_status_users1_idx` (`iduserCreated`),
  KEY `fk_siaf_status_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_siaf_status_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_siaf_status_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siaf_status`
--

LOCK TABLES `siaf_status` WRITE;
/*!40000 ALTER TABLE `siaf_status` DISABLE KEYS */;
INSERT INTO `siaf_status` VALUES (1,1,'Activo',1,1,'2022-08-02 23:20:03','2022-08-02 23:20:03'),(2,2,'Inactivo',1,1,'2022-08-02 23:20:03','2022-08-02 23:20:03');
/*!40000 ALTER TABLE `siaf_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_unidad`
--

DROP TABLE IF EXISTS `status_unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_unidad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_status_unidad_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_status_unidad_users1_idx` (`iduserCreated`),
  KEY `fk_status_unidad_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_status_unidad_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_status_unidad_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_status_unidad_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_unidad`
--

LOCK TABLES `status_unidad` WRITE;
/*!40000 ALTER TABLE `status_unidad` DISABLE KEYS */;
INSERT INTO `status_unidad` VALUES (1,'VENTA/RENTA',1,1,1,NULL,NULL),(2,'EN PATIO',1,1,1,NULL,NULL),(3,'Prueba1',1,1,1,'2022-04-28 01:26:42','2022-04-29 21:19:18'),(4,'Prueba',1,1,1,'2022-06-17 01:47:15','2022-06-16 20:59:34');
/*!40000 ALTER TABLE `status_unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taller`
--

DROP TABLE IF EXISTS `taller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taller` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `users_id` bigint(19) unsigned DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` mediumtext DEFAULT NULL,
  `codigo_postal` varchar(255) DEFAULT NULL,
  `referencia` mediumtext DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_taller_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_taller_users1_idx` (`iduserCreated`),
  KEY `fk_taller_users2_idx` (`iduserUpdated`),
  KEY `fk_taller_users3_idx` (`users_id`),
  CONSTRAINT `fk_taller_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_users3` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taller`
--

LOCK TABLES `taller` WRITE;
/*!40000 ALTER TABLE `taller` DISABLE KEYS */;
/*!40000 ALTER TABLE `taller` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taller_pago_servicio`
--

DROP TABLE IF EXISTS `taller_pago_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taller_pago_servicio` (
  `id` bigint(20) NOT NULL,
  `taller_solicitud_id` bigint(20) NOT NULL,
  `pagado` tinyint(4) DEFAULT NULL,
  `fecha_solicitud` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_taller_pago_servicio_users1_idx` (`iduserCreated`),
  KEY `fk_taller_pago_servicio_users2_idx` (`iduserUpdated`),
  KEY `fk_taller_pago_servicio_taller_solicitud1_idx` (`taller_solicitud_id`),
  KEY `fk_taller_pago_servicio_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_taller_pago_servicio_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_pago_servicio_taller_solicitud1` FOREIGN KEY (`taller_solicitud_id`) REFERENCES `taller_solicitud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_pago_servicio_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_pago_servicio_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taller_pago_servicio`
--

LOCK TABLES `taller_pago_servicio` WRITE;
/*!40000 ALTER TABLE `taller_pago_servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `taller_pago_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taller_solicitud`
--

DROP TABLE IF EXISTS `taller_solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taller_solicitud` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `taller_tipo_solicitud_id` bigint(20) DEFAULT NULL,
  `unidad_id` int(10) unsigned NOT NULL,
  `taller_solicitud_estado_id` bigint(20) NOT NULL,
  `taller_id` bigint(20) NOT NULL,
  `proveedores_id` int(10) unsigned DEFAULT NULL,
  `proveedor_cuentas_id` bigint(20) DEFAULT NULL,
  `proveedor_direccion_id` bigint(20) DEFAULT NULL,
  `tipo_solicitud` varchar(255) DEFAULT NULL,
  `fecha_solicitud` timestamp NULL DEFAULT NULL,
  `fecha_cita` timestamp NULL DEFAULT NULL,
  `kilometraje` varchar(255) DEFAULT NULL,
  `observaciones` mediumtext DEFAULT NULL,
  `domicilio` mediumtext DEFAULT NULL,
  `codigo_postal` varchar(255) DEFAULT NULL,
  `concepto` mediumtext DEFAULT NULL,
  `descripcion_falla` mediumtext DEFAULT NULL,
  `importe` varchar(255) DEFAULT NULL,
  `traslado` tinyint(4) DEFAULT NULL,
  `diagnostico` mediumtext DEFAULT NULL,
  `cotizacion` varchar(255) DEFAULT NULL,
  `tiempo_reparacion` varchar(255) DEFAULT NULL,
  `pagado` tinyint(4) DEFAULT NULL,
  `terminado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_taller_solicitud_taller_tipo_solicitud1_idx` (`taller_tipo_solicitud_id`),
  KEY `fk_taller_solicitud_unidad1_idx` (`unidad_id`),
  KEY `fk_taller_solicitud_users1_idx` (`iduserCreated`),
  KEY `fk_taller_solicitud_users2_idx` (`iduserUpdated`),
  KEY `fk_taller_solicitud_taller_solicitud_estado1_idx` (`taller_solicitud_estado_id`),
  KEY `fk_taller_solicitud_proveedores1_idx` (`proveedores_id`),
  KEY `fk_taller_solicitud_proveedor_cuentas1_idx` (`proveedor_cuentas_id`),
  KEY `fk_taller_solicitud_proveedor_direccion1_idx` (`proveedor_direccion_id`),
  KEY `fk_taller_solicitud_taller1_idx` (`taller_id`),
  CONSTRAINT `fk_taller_solicitud_proveedor_cuentas1` FOREIGN KEY (`proveedor_cuentas_id`) REFERENCES `proveedor_cuentas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_solicitud_proveedor_direccion1` FOREIGN KEY (`proveedor_direccion_id`) REFERENCES `proveedor_direccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_solicitud_proveedores1` FOREIGN KEY (`proveedores_id`) REFERENCES `proveedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_solicitud_taller1` FOREIGN KEY (`taller_id`) REFERENCES `taller` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_solicitud_taller_solicitud_estado1` FOREIGN KEY (`taller_solicitud_estado_id`) REFERENCES `taller_solicitud_estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_solicitud_taller_tipo_solicitud1` FOREIGN KEY (`taller_tipo_solicitud_id`) REFERENCES `taller_tipo_solicitud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_solicitud_unidad1` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_solicitud_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_solicitud_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taller_solicitud`
--

LOCK TABLES `taller_solicitud` WRITE;
/*!40000 ALTER TABLE `taller_solicitud` DISABLE KEYS */;
INSERT INTO `taller_solicitud` VALUES (1,1,80,1,0,NULL,NULL,NULL,NULL,'2022-11-12 04:21:13',NULL,'21','Prueba','Coacalco','55712','Paso de corriente',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-12 04:21:13','2022-11-12 04:21:13',1,1),(2,1,97,1,0,NULL,NULL,NULL,NULL,'2023-02-27 22:12:45',NULL,'10000','Requiere cambio de llantas','Coacalco','55712','Cambio de llantas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-02-27 22:12:45','2023-02-27 22:12:45',1,1);
/*!40000 ALTER TABLE `taller_solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taller_solicitud_documento`
--

DROP TABLE IF EXISTS `taller_solicitud_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taller_solicitud_documento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `taller_solicitud_id` bigint(20) NOT NULL,
  `taller_solicitud_tipo_documento_id` bigint(20) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `documento` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL DEFAULT 1,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_taller_solicitud_documentos_users1_idx` (`iduserCreated`),
  KEY `fk_taller_solicitud_documentos_users2_idx` (`iduserUpdated`),
  KEY `fk_taller_solicitud_documento_taller_solicitud_tipo_documen_idx` (`taller_solicitud_tipo_documento_id`),
  KEY `fk_taller_solicitud_documento_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_taller_solicitud_documento_taller_solicitud1_idx` (`taller_solicitud_id`),
  CONSTRAINT `fk_taller_solicitud_documento_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_solicitud_documento_taller_solicitud1` FOREIGN KEY (`taller_solicitud_id`) REFERENCES `taller_solicitud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_solicitud_documento_taller_solicitud_tipo_documento1` FOREIGN KEY (`taller_solicitud_tipo_documento_id`) REFERENCES `taller_solicitud_tipo_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_solicitud_documentos_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_solicitud_documentos_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taller_solicitud_documento`
--

LOCK TABLES `taller_solicitud_documento` WRITE;
/*!40000 ALTER TABLE `taller_solicitud_documento` DISABLE KEYS */;
/*!40000 ALTER TABLE `taller_solicitud_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taller_solicitud_estado`
--

DROP TABLE IF EXISTS `taller_solicitud_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taller_solicitud_estado` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taller_solicitud_estado`
--

LOCK TABLES `taller_solicitud_estado` WRITE;
/*!40000 ALTER TABLE `taller_solicitud_estado` DISABLE KEYS */;
INSERT INTO `taller_solicitud_estado` VALUES (1,'Pendiente',NULL,NULL),(2,'Activo',NULL,NULL);
/*!40000 ALTER TABLE `taller_solicitud_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taller_solicitud_tipo_documento`
--

DROP TABLE IF EXISTS `taller_solicitud_tipo_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taller_solicitud_tipo_documento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_taller_solicitud_tipo_documento_users1_idx` (`iduserCreated`),
  KEY `fk_taller_solicitud_tipo_documento_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_taller_solicitud_tipo_documento_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_solicitud_tipo_documento_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taller_solicitud_tipo_documento`
--

LOCK TABLES `taller_solicitud_tipo_documento` WRITE;
/*!40000 ALTER TABLE `taller_solicitud_tipo_documento` DISABLE KEYS */;
/*!40000 ALTER TABLE `taller_solicitud_tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taller_tipo_solicitud`
--

DROP TABLE IF EXISTS `taller_tipo_solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taller_tipo_solicitud` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_taller_tipo_solicitud_users1_idx` (`iduserCreated`),
  KEY `fk_taller_tipo_solicitud_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_taller_tipo_solicitud_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_taller_tipo_solicitud_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taller_tipo_solicitud`
--

LOCK TABLES `taller_tipo_solicitud` WRITE;
/*!40000 ALTER TABLE `taller_tipo_solicitud` DISABLE KEYS */;
INSERT INTO `taller_tipo_solicitud` VALUES (1,'Preventivo',NULL,NULL,1,1);
/*!40000 ALTER TABLE `taller_tipo_solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_contratacion`
--

DROP TABLE IF EXISTS `tipo_contratacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_contratacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_contratacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipo_contratacion_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_tipo_contratacion_users1_idx` (`iduserCreated`),
  KEY `fk_tipo_contratacion_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_tipo_contratacion_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipo_contratacion_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipo_contratacion_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_contratacion`
--

LOCK TABLES `tipo_contratacion` WRITE;
/*!40000 ALTER TABLE `tipo_contratacion` DISABLE KEYS */;
INSERT INTO `tipo_contratacion` VALUES (1,'Adjudicación directa',1,1,1,'2022-05-30 22:22:31','2022-05-30 22:22:31'),(2,'Invitación a cuando menos tres personas',1,1,1,'2022-05-30 22:22:55','2022-05-30 22:22:55'),(3,'LIcitacion publica',1,1,1,'2022-05-30 22:23:09','2022-05-30 22:42:44'),(4,'Prueba1',1,1,1,'2022-06-18 02:06:50','2022-06-18 02:11:53');
/*!40000 ALTER TABLE `tipo_contratacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_contrato`
--

DROP TABLE IF EXISTS `tipo_contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_contrato` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_contrato` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_delete` int(11) NOT NULL DEFAULT 0,
  `iduserCreated` bigint(19) unsigned DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_contrato`
--

LOCK TABLES `tipo_contrato` WRITE;
/*!40000 ALTER TABLE `tipo_contrato` DISABLE KEYS */;
INSERT INTO `tipo_contrato` VALUES (1,'ARRENDAMIENTO',0,1,1,'2022-05-06 21:36:28','2022-06-17 22:07:01'),(2,'MANTENIMIENTO',0,1,1,'2022-05-06 21:39:06','2022-05-06 16:39:06'),(3,'ADQUISICIÓN',0,1,1,'2022-05-06 21:39:12','2022-06-17 22:03:07'),(4,'Prueba1',1,1,1,'2022-05-06 21:39:24','2022-05-06 16:54:18');
/*!40000 ALTER TABLE `tipo_contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_documentos_licitaciones`
--

DROP TABLE IF EXISTS `tipo_documentos_licitaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_documentos_licitaciones` (
  `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,
  `documento_licitacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipo_documentos_licitaciones_users1_idx` (`iduserCreated`),
  KEY `fk_tipo_documentos_licitaciones_users2_idx` (`iduserUpdated`),
  KEY `fk_tipo_documentos_licitaciones_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_tipo_documentos_licitaciones_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipo_documentos_licitaciones_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipo_documentos_licitaciones_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_documentos_licitaciones`
--

LOCK TABLES `tipo_documentos_licitaciones` WRITE;
/*!40000 ALTER TABLE `tipo_documentos_licitaciones` DISABLE KEYS */;
INSERT INTO `tipo_documentos_licitaciones` VALUES (1,'CONVOCATORIA',1,1,1,'2022-05-10 01:55:15','2022-11-11 21:01:20'),(2,'BASES',1,1,1,'2022-05-10 01:55:29','2022-05-09 20:55:29'),(3,'JUNTA DE ACLARACIÓN',1,1,1,'2022-05-10 01:55:40','2022-05-09 20:55:40'),(4,'ANEXO TÉCNICO',1,1,1,'2022-05-10 01:55:49','2022-05-09 20:55:49'),(5,'Pruebas',1,1,1,'2022-05-10 01:56:03','2022-06-17 20:32:38');
/*!40000 ALTER TABLE `tipo_documentos_licitaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'cliente','CLIENTE'),(2,'taller','TALLER'),(3,'ejecutivo','EJECUTIVO');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicacion_unidad`
--

DROP TABLE IF EXISTS `ubicacion_unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubicacion_unidad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ubicacion_unidad_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_ubicacion_unidad_users1_idx` (`iduserCreated`),
  KEY `fk_ubicacion_unidad_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_ubicacion_unidad_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ubicacion_unidad_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ubicacion_unidad_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicacion_unidad`
--

LOCK TABLES `ubicacion_unidad` WRITE;
/*!40000 ALTER TABLE `ubicacion_unidad` DISABLE KEYS */;
INSERT INTO `ubicacion_unidad` VALUES (1,'ECATEPEC',1,0,0,NULL,NULL),(2,'CDMX',1,0,0,'2022-04-28 01:21:55','2022-04-27 20:21:55'),(3,'prueba1',1,0,0,'2022-04-28 22:54:50','2022-04-29 21:32:17'),(4,'Fernando1',0,0,0,'2022-06-17 01:23:31','2022-06-16 20:36:40');
/*!40000 ALTER TABLE `ubicacion_unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad`
--

DROP TABLE IF EXISTS `unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `folio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_marca` int(10) unsigned DEFAULT NULL,
  `id_modelo` int(10) unsigned DEFAULT NULL,
  `id_vehiculo_tipo` bigint(20) NOT NULL,
  `unidad_year` int(11) DEFAULT NULL,
  `no_serie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `factura_compra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_factura` date DEFAULT NULL,
  `clave_vehicular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `importe_iva` decimal(15,2) DEFAULT NULL,
  `placa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transmision` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_tarjeta_circulacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_poliza_seguro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_vencimiento_poliza` date DEFAULT NULL,
  `id_aseguradora` int(10) unsigned DEFAULT NULL,
  `numero_inventario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidad_asignacion_id` bigint(20) NOT NULL,
  `licitaciones_id` bigint(19) unsigned DEFAULT NULL,
  `proyectos_id` int(10) unsigned DEFAULT NULL,
  `id_ubicacion` int(10) unsigned DEFAULT NULL,
  `licitacion_propuesta_economica_id` int(11) DEFAULT NULL,
  `cliente_id` bigint(19) unsigned DEFAULT NULL,
  `id_tipo_asignacion` bigint(20) NOT NULL,
  `fecha_asignacion` date DEFAULT NULL,
  `id_status` int(10) unsigned NOT NULL,
  `id_status_delete` int(11) NOT NULL,
  `numero_economico` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivo_desactivar` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus_pagado` int(11) DEFAULT NULL,
  `forma_compra` int(11) DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unidad_requisicion_estatus_id` bigint(20) NOT NULL,
  `requisicion_partida_id` bigint(20) DEFAULT NULL,
  `requisicion_id` bigint(20) DEFAULT NULL,
  `orden_compra_id` bigint(20) NOT NULL,
  `requisicion_id_ordencompra` bigint(20) NOT NULL,
  `requisicion_orden_proveedor_id` bigint(20) NOT NULL,
  `op_equipamiento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unidad_folio_unique` (`folio`),
  UNIQUE KEY `unidad_no_serie_unique` (`no_serie`),
  KEY `fk_unidad_ubicacion_unidad1_idx` (`id_ubicacion`),
  KEY `fk_unidad_marca_unidad1_idx` (`id_marca`),
  KEY `fk_unidad_modelo_unidad1_idx` (`id_modelo`),
  KEY `fk_unidad_aseguradora_unidad1_idx` (`id_aseguradora`),
  KEY `fk_unidad_status_unidad1_idx` (`id_status`),
  KEY `fk_unidad_users1_idx` (`iduserCreated`),
  KEY `fk_unidad_users2_idx` (`iduserUpdated`),
  KEY `fk_unidad_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_unidad_unidad_asignacion1_idx` (`unidad_asignacion_id`),
  KEY `fk_unidad_proyectos1_idx` (`proyectos_id`),
  KEY `fk_unidad_unidad_vehiculo_tipo1_idx` (`id_vehiculo_tipo`),
  KEY `fk_unidad_unidad_tipo_asignacion1_idx` (`id_tipo_asignacion`),
  KEY `fk_unidad_licitaciones1_idx` (`licitaciones_id`),
  KEY `fk_unidad_unidad_requisicion_estatus1_idx` (`unidad_requisicion_estatus_id`),
  KEY `fk_unidad_requisicion_partida1_idx` (`requisicion_partida_id`),
  KEY `fk_unidad_requisicion1_idx` (`requisicion_id`),
  KEY `fk_unidad_requisicion_orden_compra1_idx` (`orden_compra_id`),
  KEY `fk_unidad_requisicion2_idx` (`requisicion_id_ordencompra`),
  KEY `fk_unidad_requisicion_orden_proveedor1_idx` (`requisicion_orden_proveedor_id`),
  KEY `fk_unidad_licitacion_proposicion_economica1_idx` (`licitacion_propuesta_economica_id`),
  KEY `fk_unidad_users3_idx` (`cliente_id`),
  CONSTRAINT `fk_unidad_aseguradora_unidad1` FOREIGN KEY (`id_aseguradora`) REFERENCES `aseguradora_unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_licitacion_proposicion_economica1` FOREIGN KEY (`licitacion_propuesta_economica_id`) REFERENCES `licitacion_proposicion_economica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_licitaciones1` FOREIGN KEY (`licitaciones_id`) REFERENCES `licitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_marca_unidad1` FOREIGN KEY (`id_marca`) REFERENCES `marca_unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_modelo_unidad1` FOREIGN KEY (`id_modelo`) REFERENCES `modelo_unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_proyectos1` FOREIGN KEY (`proyectos_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_requisicion1` FOREIGN KEY (`requisicion_id`) REFERENCES `requisicion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_requisicion2` FOREIGN KEY (`requisicion_id_ordencompra`) REFERENCES `requisicion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_requisicion_orden_compra1` FOREIGN KEY (`orden_compra_id`) REFERENCES `requisicion_orden_compra` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_requisicion_orden_proveedor1` FOREIGN KEY (`requisicion_orden_proveedor_id`) REFERENCES `requisicion_orden_proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_requisicion_partida1` FOREIGN KEY (`requisicion_partida_id`) REFERENCES `requisicion_partida` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_status_unidad1` FOREIGN KEY (`id_status`) REFERENCES `status_unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_ubicacion_unidad1` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion_unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_unidad_asignacion1` FOREIGN KEY (`unidad_asignacion_id`) REFERENCES `unidad_asignacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_unidad_requisicion_estatus1` FOREIGN KEY (`unidad_requisicion_estatus_id`) REFERENCES `unidad_requisicion_estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_unidad_tipo_asignacion1` FOREIGN KEY (`id_tipo_asignacion`) REFERENCES `unidad_tipo_asignacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_unidad_vehiculo_tipo1` FOREIGN KEY (`id_vehiculo_tipo`) REFERENCES `unidad_vehiculo_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_users3` FOREIGN KEY (`cliente_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad`
--

LOCK TABLES `unidad` WRITE;
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
INSERT INTO `unidad` VALUES (1,'E00001','2022-02-26',2,1,1,2022,'3NGAD33A6NK812818','87654356789',NULL,'ND',450000.00,'ND','AUTOMATICO','ND','1','2015-03-06',1,'E00001','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,'2022-07-06 00:17:10','2023-09-06 03:57:36',1,0,0,9,12,17,0),(2,'E00002','2022-02-26',1,1,0,2022,'3N6AD33AXNK812224',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00002','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(3,'E00003','2022-02-26',1,1,0,2022,'3N6AD33AXNK812420',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00003','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(4,'E00004','2022-02-26',1,1,0,2022,'3N6AD33AONK812605',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00004','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(5,'E00005','2022-02-26',1,1,0,2022,'3N6AD33A2NK812573',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00005','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(6,'E00006','2022-02-26',1,1,0,2022,'3N6AD33A3NK812226',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00006','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(7,'E00007','2022-02-26',1,1,0,2022,'3N6AD33A7NK812245',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00007','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(8,'E00008','2022-02-26',1,1,0,2022,'3N6AD33A3NK812372',NULL,NULL,NULL,NULL,'fer','ESTANDAR','','',NULL,1,'E00008','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(9,'E00009','2022-02-26',1,1,0,2022,'3N6AD33A0NK812488','ffff',NULL,NULL,NULL,'ND','ESTANDAR','345678',NULL,'1970-01-01',1,'E00009','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,'2022-08-05 03:06:28',1,0,0,9,12,17,0),(10,'E00010','2022-02-26',1,1,0,2022,'3N6AD33A0NK812426',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00010','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(11,'E00011','2022-02-26',1,1,0,2022,'3N6AD33A7NK812259',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00011','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(12,'E00012','2022-02-26',1,1,0,2022,'3N6AD33A9NK812585',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00012','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(13,'E00013','2022-02-26',1,1,0,2022,'3N6AD33A9NK812649',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00013','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(14,'E00014','2022-02-26',1,1,0,2022,'3N6AD33AXNK812725',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00014','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(15,'E00015','2022-02-26',1,1,0,2022,'3N6AD33AXNK812272',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00015','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(16,'E00016','2022-02-26',1,1,0,2022,'3N6AD33AXNK812840',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00016','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(17,'E00017','2022-02-26',1,1,0,2022,'3N6AD33A9NK812652',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00017','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(18,'E00018','2022-02-26',1,1,0,2022,'3N6AD33A8NK812402',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00018','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(19,'E00019','2022-02-26',1,1,0,2022,'3N6AD33AXNK812109',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00019','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(20,'E00020','2022-02-26',1,1,0,2022,'3N6AD33A8NK812352',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00020','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(21,'E00021','2022-02-26',1,1,0,2022,'3N6AD33A9NK812439',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00021','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(22,'E00022','2022-02-26',1,1,0,2022,'3N6AD33A9NK812635',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00022','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(23,'E00023','2022-02-26',1,1,0,2022,'3N6AD33A9NK812487',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00023','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(24,'E00024','2022-02-26',1,1,0,2022,'3N6AD33A9NK812571',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00024','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(25,'E00025','2022-02-26',1,1,0,2022,'3N6AD33A2NK812735',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00025','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(26,'E00026','2022-02-26',1,1,0,2022,'3N6AD33A1NK812757',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00026','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(27,'E00027','2022-02-26',1,1,0,2022,'3N6AD33A2NK812279',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00027','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(28,'E00028','2022-02-26',1,1,0,2022,'3N6AD33A1NK812791',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00028','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(29,'E00029','2022-02-26',1,1,0,2022,'3N6AD33A1NK812421',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00029','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(30,'E00030','2022-02-26',1,1,0,2022,'3N6AD33A8NK812321',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00030','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(31,'E00031','2022-02-26',1,1,0,2022,'3N6AD33A7NK812441',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00031','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(32,'E00032','2022-02-26',1,1,0,2022,'3N6AD33A8NK812142',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00032','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(33,'E00033','2022-02-26',1,1,0,2022,'3N6AD33A9NK812375',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00033','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(34,'E00034','2022-02-26',1,1,0,2022,'3N6AD33A5NK812163',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00034','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(35,'E00035','2022-02-26',1,1,0,2022,'3N6AD33A0NK814631',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00035','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(36,'E00036','2022-02-26',1,1,0,2022,'3N6AD33A5NK812440',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00036','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(37,'E00037','2022-02-26',1,1,0,2022,'3N6AD33A4NK812350',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00037','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(38,'E00038','2022-02-26',1,1,3,2022,'3N6AD33A7NK812598','ND',NULL,NULL,NULL,'ND','ESTANDAR','ND',NULL,'1970-01-01',1,'E00038','BLANCO',1,NULL,32,NULL,NULL,NULL,0,'2022-09-06',1,1,NULL,NULL,0,0,1,1,NULL,'2022-09-06 20:36:50',1,0,0,9,12,17,0),(39,'E00039','2022-02-26',1,1,0,2022,'3N6AD33A8NK812822',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00039','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(40,'E00040','2022-02-26',1,1,0,2022,'3N6AD33A8NK812223',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00040','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(41,'E00041','2022-02-26',1,1,0,2022,'3N6AD33A7NK812701',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00041','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(42,'E00042','2022-02-26',1,1,0,2022,'3N6AD33A1NK812273',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00042','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(43,'E00043','2022-02-26',1,1,0,2022,'3N6AD33A9NK812215',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00043','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(44,'E00044','2022-02-26',1,1,0,2022,'3N6AD33A9NK812540',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00044','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(45,'E00045','2022-02-26',1,1,0,2022,'3N6AD33A8NK812450',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00045','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(46,'E00046','2022-02-26',1,1,0,2022,'3N6AD33A9NK812750',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00046','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(47,'E00047','2022-02-26',1,1,0,2022,'3N6AD43AXNK812210',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00047','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(48,'E00048','2022-02-26',1,1,0,2022,'3N6AD33A5NK812244',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00048','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(49,'E00049','2022-02-26',1,1,0,2022,'3N6AD33A6NK812043',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00049','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(50,'E00050','2022-02-26',1,1,0,2022,'3N6AD33A3NK812663',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00050','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(51,'E00051','2022-02-26',1,1,1,2022,'3N6AD33AXNK812787','ND',NULL,'ND',450000.00,'ND','ESTANDAR','264874',NULL,'1970-01-01',1,'E00051','BLANCO',1,13,32,NULL,NULL,NULL,1,'2022-11-25',1,1,NULL,NULL,0,0,1,1,NULL,'2022-11-24 22:12:22',1,0,0,9,12,17,0),(52,'E00052','2022-02-26',1,1,0,2022,'3N6AD33AXNK812451',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00052','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(53,'E00053','2022-02-26',1,1,0,2022,'3N6AD33A0NK812250',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00053','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(54,'E00054','2022-02-26',1,1,0,2022,'3N6AD33AXNK812370',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00054','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(55,'E00055','2022-02-26',1,1,0,2022,'3N6AD33AXNK812076',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00055','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(56,'E00056','2022-02-26',1,1,0,2022,'3N6AD33A9NK812599',NULL,NULL,NULL,NULL,'','ESTANDAR','','',NULL,1,'E00056','BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,NULL,NULL,1,0,0,9,12,17,0),(59,'E00058',NULL,1,1,0,2029,'3NGAD33A6NK812818F3er',NULL,NULL,NULL,NULL,'ND','ESTANDAR','345678',NULL,'2022-06-12',1,NULL,'BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,'2022-06-25 01:30:03','2022-06-25 01:30:03',1,0,0,9,12,17,0),(60,'E00061',NULL,1,1,0,2029,'Fer prueba',NULL,NULL,NULL,NULL,'ND','AUTOMATICO','345678',NULL,'2022-06-03',1,NULL,'BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,'2022-06-25 01:33:12','2022-06-25 01:33:12',1,0,0,9,12,17,0),(61,'E00062',NULL,1,1,1,2028,'4321f','ffff',NULL,NULL,NULL,'ND','ESTANDAR','345678F',NULL,'1970-01-01',1,NULL,'BLANCO',1,NULL,33,NULL,NULL,NULL,0,'2022-09-28',1,1,NULL,NULL,0,0,1,1,'2022-08-04 20:46:42','2022-09-07 02:10:18',1,0,0,9,12,17,0),(62,'E00063',NULL,1,1,0,2030,'fffff','ffff',NULL,NULL,NULL,'ffff','ESTANDAR','345678',NULL,'1970-01-01',1,NULL,'BLANCO',0,NULL,NULL,NULL,NULL,NULL,0,NULL,1,1,NULL,NULL,0,0,1,1,'2022-08-04 20:48:31','2022-08-04 21:14:24',1,0,0,9,12,17,0),(65,'E00066',NULL,2,3,2,2029,'3NGAD33A6NK8128rfe','ffffr4',NULL,NULL,NULL,'ND','ESTANDAR','345678e43',NULL,'1970-01-01',NULL,NULL,'BLANCO',1,16,38,NULL,41,19,1,'2023-09-30',2,1,NULL,NULL,0,0,1,1,'2022-08-05 02:30:59','2023-09-25 07:45:00',2,10,11,9,12,17,0),(66,'E00067',NULL,1,1,3,2029,'3NGAD33A6NK812818Ffdf','ffffref',NULL,NULL,NULL,'ND','ESTANDAR','345678',NULL,'1970-01-01',NULL,NULL,'BLANCO',1,16,38,NULL,42,19,1,'2023-09-30',1,1,NULL,NULL,0,0,1,1,'2022-08-06 00:31:30','2023-09-25 07:50:41',2,13,11,9,12,17,0),(67,'E00072',NULL,1,4,3,2029,'3NGAD33A6NK81281800','ND',NULL,NULL,NULL,'ND','ESTANDAR','ND',NULL,NULL,NULL,NULL,'BLANCO',1,NULL,32,NULL,NULL,NULL,0,'2022-09-06',2,1,NULL,NULL,0,0,1,1,'2022-09-05 22:11:39','2022-09-05 22:11:39',1,0,0,9,12,17,0),(68,'E00073',NULL,1,4,3,2029,'3NGAD33A6NK81281846000','ND',NULL,NULL,NULL,'ND','ESTANDAR','ND',NULL,NULL,NULL,NULL,'BLANCO',1,NULL,32,NULL,NULL,NULL,0,'2022-09-06',2,1,NULL,NULL,0,0,1,1,'2022-09-05 22:13:10','2022-09-05 22:13:10',1,0,0,9,12,17,0),(69,'E00074',NULL,1,4,3,2027,'3NGAD33A6NK81111','ND',NULL,NULL,NULL,'ND','ESTANDAR','ND',NULL,'1970-01-01',NULL,NULL,'BLANCO',1,NULL,32,NULL,NULL,NULL,0,'2022-09-06',1,1,NULL,NULL,0,0,1,1,'2022-09-05 22:14:33','2022-09-07 02:09:28',1,0,0,9,12,17,0),(70,'E00075',NULL,1,4,3,2024,'3N6AD33AXNK812333','ND',NULL,NULL,NULL,'ffff','ESTANDAR','ND',NULL,'1970-01-01',NULL,NULL,'BLANCO',1,16,38,NULL,42,21,1,'2023-09-30',1,1,NULL,NULL,0,0,1,1,'2022-09-05 22:17:18','2023-09-25 08:06:57',2,NULL,NULL,9,12,17,0),(71,'E00076',NULL,64,25,1,2016,'1FTEW1C86GFA05870','U812233',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLANCO',1,NULL,32,NULL,NULL,NULL,2,'2022-11-19',1,1,NULL,NULL,0,0,1,1,'2022-09-14 22:13:33','2022-09-14 22:13:33',1,0,0,9,12,17,0),(72,'E00077',NULL,5,26,4,2022,'FTEVt4353467','U819192',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ROJO',1,NULL,32,NULL,NULL,NULL,2,'2022-11-19',1,1,NULL,NULL,0,0,1,1,'2022-09-14 22:13:33','2022-09-14 22:13:33',1,0,0,9,12,17,0),(73,'E00078',NULL,5,26,4,2022,'FTEVt4353654','U885522',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'GRIS',1,NULL,32,NULL,NULL,NULL,2,'2022-11-19',1,1,NULL,NULL,0,0,1,1,'2022-09-14 22:13:33','2022-09-14 22:13:33',1,0,0,9,12,17,0),(74,'E00079',NULL,1,4,4,2022,'FTEVt4353876','U556688',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLANCO',1,NULL,32,NULL,NULL,NULL,2,'2022-11-19',1,1,NULL,NULL,0,0,1,1,'2022-09-14 22:13:33','2022-09-14 22:13:33',1,0,0,9,12,17,0),(75,'E00080',NULL,1,27,4,2022,'FTEVt4353111','U122233',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLANCO',1,NULL,32,NULL,NULL,NULL,2,'2022-11-19',1,1,NULL,NULL,0,0,1,1,'2022-09-14 22:13:33','2022-09-14 22:13:33',1,0,0,9,12,17,0),(76,'E00081',NULL,64,28,4,2022,'FTEVt4353222','U657597',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ROJO',2,NULL,NULL,NULL,NULL,NULL,2,'2022-11-19',2,1,NULL,NULL,0,0,1,1,'2022-09-14 22:13:33','2022-09-14 22:13:33',1,0,0,9,12,17,0),(77,'E00082',NULL,64,25,1,2022,'FTEVt4353333','U647197',NULL,'ND',NULL,'ND','ESTANDAR','ND',NULL,'1970-01-01',NULL,NULL,'BLANCO',2,NULL,NULL,1,NULL,NULL,2,'2022-11-19',2,1,NULL,NULL,0,0,1,1,'2022-09-14 22:13:33','2023-10-05 22:48:35',1,NULL,NULL,9,12,17,1),(78,'E00083',NULL,65,29,5,2022,'FTEVt4353444','U412365','2022-10-05','ND',520000.00,'ND','ESTANDAR','ND',NULL,'1970-01-01',NULL,NULL,'AMARILLO',2,NULL,NULL,1,NULL,NULL,2,'2022-11-19',2,1,NULL,NULL,0,0,1,1,'2022-09-14 22:13:33','2022-09-19 22:35:16',1,0,0,9,12,17,0),(79,'E00084',NULL,64,28,6,2016,'1FTEW1354678','U8122335','2022-11-19','1024561510',409363.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLANCO',1,13,32,NULL,NULL,NULL,2,'2022-11-19',1,1,NULL,NULL,0,0,1,1,'2022-09-20 02:41:32','2022-09-20 02:41:32',1,0,0,9,12,17,0),(80,'E00085',NULL,1,30,4,2022,'NIS2334fd','U556688','2022-11-19','6543210457',409363.50,'1234568fdg','ESTANDAR','24782',NULL,'1970-01-01',NULL,NULL,'BLANCO',1,13,32,NULL,NULL,NULL,2,'2022-11-19',1,1,'4727478494',NULL,0,0,1,1,'2022-09-20 03:44:59','2022-11-12 04:57:01',1,0,0,9,12,17,0),(81,'E00086',NULL,2,2,4,2025,'524687hfdise','4294',NULL,'ND',450000.00,'Feth984','AUTOMATICO','24678464',NULL,NULL,NULL,NULL,'BLANCO',1,13,32,NULL,NULL,NULL,1,'2022-12-02',1,1,NULL,NULL,0,0,1,1,'2022-11-24 21:57:30','2022-11-24 21:57:30',1,0,0,9,12,17,0),(82,'E00087',NULL,1,1,2,2022,'2848744','ND',NULL,'26748',250000.00,'ND','ESTANDAR','52487',NULL,'1970-01-01',NULL,NULL,'BLANCO',1,13,33,NULL,NULL,NULL,2,'2022-12-30',1,1,NULL,NULL,0,0,1,1,'2022-11-24 22:04:13','2022-11-25 03:20:57',1,0,0,9,12,17,0),(83,'E00088',NULL,2,2,3,2022,'77777','ND',NULL,'ND',250000.00,'ND','AUTOMATICO','2947487',NULL,NULL,NULL,NULL,'BLANCO',1,13,32,NULL,NULL,NULL,1,'2022-12-10',1,1,NULL,NULL,0,0,1,1,'2022-11-24 22:06:07','2022-11-24 22:06:07',1,0,0,9,12,17,0),(84,'E00089',NULL,1,2,3,2022,'519814154','1',NULL,'ND',350000.00,'ND','ESTANDAR','5248748',NULL,NULL,NULL,NULL,'BLANCO',1,13,32,NULL,NULL,NULL,1,'2022-12-10',1,1,NULL,'El auto tuve un accidente',0,0,1,1,'2022-11-24 22:08:17','2022-12-06 01:32:54',1,0,0,9,12,17,0),(87,'E00090',NULL,1,42,18,2022,'IAMS690517','20/07/1900','2022-02-13','5889',12.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'NEGRO',2,NULL,32,1,NULL,NULL,1,'2022-02-13',2,1,NULL,NULL,0,0,1,1,'2022-12-22 12:06:04','2022-12-22 12:06:04',1,0,0,9,12,17,0),(90,'E00091',NULL,64,25,1,2016,'1FTEW1C86GF1','U812233','2022-11-19','1021510',409363.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLANCO',1,NULL,32,NULL,NULL,NULL,1,'2022-12-23',1,1,NULL,NULL,0,0,1,1,'2022-12-22 12:27:04','2022-12-22 12:27:04',1,0,0,9,12,17,0),(91,'E00092',NULL,5,26,4,2022,'FTEVt43534672','U819192','2022-11-19','321456',409363.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ROJO',1,NULL,32,NULL,NULL,NULL,1,'2022-12-23',1,1,NULL,NULL,0,0,1,1,'2022-12-22 12:27:04','2022-12-22 12:27:04',1,0,0,9,12,17,0),(92,'E00093',NULL,5,26,4,2022,'FTEVt43536543','U885522','2022-11-19','123456',409363.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'GRIS',1,NULL,32,NULL,NULL,NULL,1,'2022-12-23',1,1,NULL,NULL,0,0,1,1,'2022-12-22 12:27:04','2022-12-22 12:27:04',1,0,0,9,12,17,0),(93,'E00094',NULL,1,4,4,2022,'FTEVt43538764','U556688','2022-11-19','6543210',409363.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLANCO',1,NULL,32,NULL,NULL,NULL,1,'2022-12-23',1,1,NULL,NULL,0,0,1,1,'2022-12-22 12:27:04','2022-12-22 12:27:04',1,0,0,9,12,17,0),(94,'E00095',NULL,1,27,4,2022,'FTEVt43531115','U122233','2022-11-19','5564185022',409363.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLANCO',1,NULL,32,NULL,NULL,NULL,1,'2022-12-23',1,1,NULL,NULL,0,0,1,1,'2022-12-22 12:27:04','2022-12-22 12:27:04',1,0,0,9,12,17,0),(95,'E00096',NULL,64,28,4,2022,'FTEVt43532226','U657597','2022-11-19','66225511',409363.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ROJO',2,NULL,NULL,NULL,NULL,NULL,1,'2022-12-23',2,1,NULL,NULL,0,0,1,1,'2022-12-22 12:27:04','2022-12-22 12:27:04',1,0,0,9,12,17,0),(96,'E00097',NULL,64,25,1,2022,'FTEVt43533337','U647197','2022-11-19','65117265',409363.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLANCO',2,NULL,NULL,1,NULL,NULL,1,'2022-12-23',2,1,NULL,NULL,0,0,1,1,'2022-12-22 12:27:04','2022-12-22 12:27:04',1,0,0,9,12,17,0),(97,'E00098',NULL,3,1,5,2022,'FTEVt43534448','U412365','2022-11-19','98741949',409363.00,'5678','ESTANDAR','67543',NULL,'1970-01-01',NULL,NULL,'AMARILLO',1,15,34,NULL,NULL,NULL,1,'2023-06-08',2,1,NULL,NULL,0,0,1,1,'2022-12-22 12:27:04','2023-02-27 22:11:22',1,0,0,9,12,17,0),(99,'E00099',NULL,64,49,1,2013,'FER457570','ND','2022-02-13',NULL,150000.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLANCO',1,NULL,NULL,NULL,NULL,NULL,1,'2023-09-11',2,1,NULL,NULL,1,1,1,1,'2023-09-12 04:00:17','2023-09-20 22:30:45',1,NULL,NULL,9,12,21,0),(100,'E00100',NULL,1,2,1,2023,'FER768786','ND','2023-09-16','ND',409363.50,'ND','ESTANDAR','ND',NULL,'1970-01-01',NULL,NULL,'BLANCO',2,NULL,NULL,1,NULL,NULL,1,'2023-09-11',2,1,'1',NULL,1,0,1,1,'2023-09-12 04:00:17','2023-09-14 04:36:31',1,NULL,NULL,9,12,21,0),(101,'E00101',NULL,64,49,4,2013,'PRU457570','ND','2022-02-13','54756887',150000.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLANCO',1,NULL,NULL,1,NULL,NULL,1,'2023-09-11',2,1,NULL,NULL,1,0,1,1,'2023-09-14 05:22:01','2023-09-14 05:22:01',1,NULL,NULL,10,15,18,0),(102,'E00102',NULL,64,49,4,2013,'PRU768786','ND','2022-02-13','76878087',30000.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLANCO',1,NULL,NULL,1,NULL,NULL,1,'2023-09-11',2,1,NULL,NULL,1,0,1,1,'2023-09-14 05:22:01','2023-09-14 05:22:01',1,NULL,NULL,10,15,18,0);
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_asignacion`
--

DROP TABLE IF EXISTS `unidad_asignacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_asignacion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `asignacion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_unidad_asignacion_users1_idx` (`iduserCreated`),
  KEY `fk_unidad_asignacion_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_unidad_asignacion_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_asignacion_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_asignacion`
--

LOCK TABLES `unidad_asignacion` WRITE;
/*!40000 ALTER TABLE `unidad_asignacion` DISABLE KEYS */;
INSERT INTO `unidad_asignacion` VALUES (1,'Por Contrato','2022-07-06 01:10:48','2022-07-06 01:10:48',1,1),(2,'Patio','2022-07-06 01:10:48','2022-07-06 01:10:48',1,1);
/*!40000 ALTER TABLE `unidad_asignacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_documento`
--

DROP TABLE IF EXISTS `unidad_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_documento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_unidad` int(10) unsigned NOT NULL,
  `id_unidad_tipo_documento` bigint(20) NOT NULL,
  `documento` text NOT NULL,
  `mime_type` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_unidad_documento_unidad1_idx` (`id_unidad`),
  KEY `fk_unidad_documento_unidad_tipo_documento1_idx` (`id_unidad_tipo_documento`),
  KEY `fk_unidad_documento_users1_idx` (`iduserCreated`),
  KEY `fk_unidad_documento_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_unidad_documento_unidad1` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_documento_unidad_tipo_documento1` FOREIGN KEY (`id_unidad_tipo_documento`) REFERENCES `unidad_tipo_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_documento_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_documento_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_documento`
--

LOCK TABLES `unidad_documento` WRITE;
/*!40000 ALTER TABLE `unidad_documento` DISABLE KEYS */;
INSERT INTO `unidad_documento` VALUES (3,66,1,'9drwu9SrNLVLPxhSmjXDK7g8sRnOzVkrHfYfI9uS.pdf','application/pdf','2022-08-06 01:13:34','2022-08-06 01:13:34',1,1),(4,1,1,'K5UkbATJASigb458QMC47p9cNviI1Vzr7kmEIiLi.pdf','application/pdf','2023-09-06 03:56:58','2023-09-06 03:56:58',1,1);
/*!40000 ALTER TABLE `unidad_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_equipamiento`
--

DROP TABLE IF EXISTS `unidad_equipamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_equipamiento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `unidad_id` int(10) unsigned NOT NULL,
  `equipamiento` mediumtext DEFAULT NULL,
  `fotografia_equipamiento` mediumtext DEFAULT NULL,
  `factura` mediumtext DEFAULT NULL,
  `fecha_factura` date DEFAULT NULL,
  `monto` decimal(15,2) DEFAULT NULL,
  `equipamiento_pendiente` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_unidad_equipamiento_unidad1_idx` (`unidad_id`),
  KEY `fk_unidad_equipamiento_users1_idx` (`iduserCreated`),
  KEY `fk_unidad_equipamiento_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_unidad_equipamiento_unidad1` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_equipamiento_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_equipamiento_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_equipamiento`
--

LOCK TABLES `unidad_equipamiento` WRITE;
/*!40000 ALTER TABLE `unidad_equipamiento` DISABLE KEYS */;
INSERT INTO `unidad_equipamiento` VALUES (1,77,'tumb burro','XgQfUJdeoxndTBzX0ddEzuA0VR5Al1AGZTE93uEo.jpg',NULL,NULL,NULL,1,'2023-10-31 02:19:41','2023-10-31 23:53:05',1,1),(3,77,'torreta',NULL,NULL,NULL,NULL,0,'2023-10-31 02:19:41','2023-10-31 02:19:41',1,1),(4,77,'blindaje',NULL,NULL,NULL,NULL,0,'2023-10-31 02:19:41','2023-10-31 02:19:41',1,1),(5,77,'no',NULL,NULL,NULL,NULL,0,'2023-10-31 02:19:41','2023-10-31 02:19:41',1,1);
/*!40000 ALTER TABLE `unidad_equipamiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_folio`
--

DROP TABLE IF EXISTS `unidad_folio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_folio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `folio` bigint(20) NOT NULL,
  `anio` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_folio`
--

LOCK TABLES `unidad_folio` WRITE;
/*!40000 ALTER TABLE `unidad_folio` DISABLE KEYS */;
INSERT INTO `unidad_folio` VALUES (1,1,2022,'2022-06-24 21:42:03','2022-06-24 21:42:03'),(2,2,2022,'2022-06-24 21:43:05','2022-06-24 21:43:05'),(3,3,2022,'2022-06-24 21:43:56','2022-06-24 21:43:56'),(4,56,2022,'2022-06-24 21:45:26','2022-06-24 21:45:26'),(5,57,2022,'2022-06-24 21:46:56','2022-06-24 21:46:56'),(6,58,2022,'2022-06-24 21:47:09','2022-06-24 21:47:09'),(7,59,2022,'2022-06-25 01:31:31','2022-06-25 01:31:31'),(8,60,2022,'2022-06-25 01:33:04','2022-06-25 01:33:04'),(9,61,2022,'2022-06-25 01:33:12','2022-06-25 01:33:12'),(10,62,2022,'2022-08-04 20:46:42','2022-08-04 20:46:42'),(11,63,2022,'2022-08-04 20:48:31','2022-08-04 20:48:31'),(12,64,2022,'2022-08-05 02:29:30','2022-08-05 02:29:30'),(13,65,2022,'2022-08-05 02:29:41','2022-08-05 02:29:41'),(14,66,2022,'2022-08-05 02:30:58','2022-08-05 02:30:58'),(15,67,2022,'2022-08-06 00:31:30','2022-08-06 00:31:30'),(16,68,2022,'2022-09-05 21:55:03','2022-09-05 21:55:03'),(17,69,2022,'2022-09-05 22:05:56','2022-09-05 22:05:56'),(18,70,2022,'2022-09-05 22:08:18','2022-09-05 22:08:18'),(19,71,2022,'2022-09-05 22:08:58','2022-09-05 22:08:58'),(20,72,2022,'2022-09-05 22:11:39','2022-09-05 22:11:39'),(21,73,2022,'2022-09-05 22:13:10','2022-09-05 22:13:10'),(22,74,2022,'2022-09-05 22:14:33','2022-09-05 22:14:33'),(23,75,2022,'2022-09-05 22:17:18','2022-09-05 22:17:18'),(28,76,2022,'2022-09-14 22:13:33','2022-09-14 22:13:33'),(29,77,2022,'2022-09-14 22:13:33','2022-09-14 22:13:33'),(30,78,2022,'2022-09-14 22:13:33','2022-09-14 22:13:33'),(31,79,2022,'2022-09-14 22:13:33','2022-09-14 22:13:33'),(32,80,2022,'2022-09-14 22:13:33','2022-09-14 22:13:33'),(33,81,2022,'2022-09-14 22:13:33','2022-09-14 22:13:33'),(34,82,2022,'2022-09-14 22:13:33','2022-09-14 22:13:33'),(35,83,2022,'2022-09-14 22:13:33','2022-09-14 22:13:33'),(36,84,2022,'2022-09-20 02:41:32','2022-09-20 02:41:32'),(37,85,2022,'2022-09-20 03:44:59','2022-09-20 03:44:59'),(38,86,2022,'2022-11-24 21:57:30','2022-11-24 21:57:30'),(39,87,2022,'2022-11-24 22:04:13','2022-11-24 22:04:13'),(40,88,2022,'2022-11-24 22:06:07','2022-11-24 22:06:07'),(41,89,2022,'2022-11-24 22:08:17','2022-11-24 22:08:17'),(48,90,2022,'2022-12-22 12:06:04','2022-12-22 12:06:04'),(51,91,2022,'2022-12-22 12:27:04','2022-12-22 12:27:04'),(52,92,2022,'2022-12-22 12:27:04','2022-12-22 12:27:04'),(53,93,2022,'2022-12-22 12:27:04','2022-12-22 12:27:04'),(54,94,2022,'2022-12-22 12:27:04','2022-12-22 12:27:04'),(55,95,2022,'2022-12-22 12:27:04','2022-12-22 12:27:04'),(56,96,2022,'2022-12-22 12:27:04','2022-12-22 12:27:04'),(57,97,2022,'2022-12-22 12:27:04','2022-12-22 12:27:04'),(58,98,2022,'2022-12-22 12:27:04','2022-12-22 12:27:04'),(64,99,2023,'2023-09-12 04:00:17','2023-09-12 04:00:17'),(65,100,2023,'2023-09-12 04:00:17','2023-09-12 04:00:17'),(66,101,2023,'2023-09-14 05:22:01','2023-09-14 05:22:01'),(67,102,2023,'2023-09-14 05:22:01','2023-09-14 05:22:01');
/*!40000 ALTER TABLE `unidad_folio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_fotografia`
--

DROP TABLE IF EXISTS `unidad_fotografia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_fotografia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unidad_id` int(10) unsigned NOT NULL,
  `fotografia` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_unidad_fotografia_unidad1_idx` (`unidad_id`),
  KEY `fk_unidad_fotografia_users1_idx` (`iduserCreated`),
  KEY `fk_unidad_fotografia_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_unidad_fotografia_unidad1` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_fotografia_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_fotografia_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_fotografia`
--

LOCK TABLES `unidad_fotografia` WRITE;
/*!40000 ALTER TABLE `unidad_fotografia` DISABLE KEYS */;
INSERT INTO `unidad_fotografia` VALUES (3,66,'k8GXqI1fXlWdOLg9JGwiQSA16NuD6UjxyJeSdt08.jpg','2022-08-06 03:45:28','2022-08-06 03:45:28',1,1),(4,66,'mdPDnTYubFrkpvsDNLEAuW6vydqZgPQMclGSqNWM.jpg','2022-08-06 03:45:40','2022-08-06 03:45:40',1,1),(5,97,'CiWTfviKE8aOrAf7SlxI5YyOsX1GtxEAjtDKhi3j.jpg','2023-02-24 22:53:07','2023-02-24 22:53:07',1,1),(6,97,'f3mre1eQUQF6dP3vCSwlRbqt2wrEMrmkKo5qzci9.jpg','2023-02-24 22:53:07','2023-02-24 22:53:07',1,1),(7,97,'03cJkU2B2GUja02oaPqctEt0tf3OiWY8YAojbprO.jpg','2023-02-24 22:53:07','2023-02-24 22:53:07',1,1),(8,77,'CfJl48B4ebuikGySgL06nBGsCFDAiSEHfhsCL49B.png','2023-10-05 22:48:36','2023-10-05 22:48:36',1,1),(9,77,'d6ztDLU3OEo2trKhtFybiK29tMhUJJJMdVl7fms6.jpg','2023-10-05 22:48:36','2023-10-05 22:48:36',1,1);
/*!40000 ALTER TABLE `unidad_fotografia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_info_gps`
--

DROP TABLE IF EXISTS `unidad_info_gps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_info_gps` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `unidad_id` int(10) unsigned NOT NULL,
  `numero_gps` varchar(255) DEFAULT NULL,
  `marca_gps` varchar(255) DEFAULT NULL,
  `modelo_gps` varchar(255) DEFAULT NULL,
  `fecha_instalacion` date DEFAULT NULL,
  `info_proveedor` varchar(255) DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_unidad_info_gps_unidad1_idx` (`unidad_id`),
  KEY `fk_unidad_info_gps_users1_idx` (`iduserCreated`),
  KEY `fk_unidad_info_gps_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_unidad_info_gps_unidad1` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_info_gps_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_info_gps_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_info_gps`
--

LOCK TABLES `unidad_info_gps` WRITE;
/*!40000 ALTER TABLE `unidad_info_gps` DISABLE KEYS */;
INSERT INTO `unidad_info_gps` VALUES (1,97,'23454675','prueba1','prueba','2023-03-01','prueba',1,1,'2023-03-29 03:45:24','2023-03-29 03:51:16');
/*!40000 ALTER TABLE `unidad_info_gps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_info_seguro`
--

DROP TABLE IF EXISTS `unidad_info_seguro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_info_seguro` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `unidad_id` int(10) unsigned NOT NULL,
  `nombre_titular` varchar(255) DEFAULT NULL,
  `direccion_titular` varchar(255) DEFAULT NULL,
  `numero_poliza` varchar(255) DEFAULT NULL,
  `unidad_tipo_cobertura_id` bigint(20) NOT NULL,
  `fecha_cobertura` date DEFAULT NULL,
  `fecha_final_cobertura` date DEFAULT NULL,
  `limites_cobertura` varchar(255) DEFAULT NULL,
  `email_titutlar` varchar(255) DEFAULT NULL,
  `telefono_titular` varchar(50) DEFAULT NULL,
  `nombre_compania` varchar(255) DEFAULT NULL,
  `telefono_compania` varchar(50) DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_unidad_info_seguro_unidad1_idx` (`unidad_id`),
  KEY `fk_unidad_info_seguro_users1_idx` (`iduserCreated`),
  KEY `fk_unidad_info_seguro_users2_idx` (`iduserUpdated`),
  KEY `fk_unidad_info_seguro_unidad_tipo_cobertura1_idx` (`unidad_tipo_cobertura_id`),
  CONSTRAINT `fk_unidad_info_seguro_unidad1` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_info_seguro_unidad_tipo_cobertura1` FOREIGN KEY (`unidad_tipo_cobertura_id`) REFERENCES `unidad_tipo_cobertura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_info_seguro_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_info_seguro_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_info_seguro`
--

LOCK TABLES `unidad_info_seguro` WRITE;
/*!40000 ALTER TABLE `unidad_info_seguro` DISABLE KEYS */;
INSERT INTO `unidad_info_seguro` VALUES (1,97,'Prueba seguro','Mz4 Lt60 Higueras','324567',1,'2023-03-01','2023-04-01','prueba','pechufer44@gmail.com','5544855502','Fernando','5588885522',1,1,'2023-03-29 01:41:24','2023-03-29 03:50:37');
/*!40000 ALTER TABLE `unidad_info_seguro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_movimientos`
--

DROP TABLE IF EXISTS `unidad_movimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_movimientos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `unidad_id` int(10) unsigned NOT NULL,
  `asignacion_id` bigint(20) NOT NULL,
  `proyectos_id` int(10) unsigned DEFAULT NULL,
  `licitacion_id` int(11) DEFAULT NULL,
  `ubicacion_id` int(10) unsigned DEFAULT NULL,
  `tipo_asignacion_id` bigint(20) NOT NULL,
  `fecha_asignacion` date DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_unidad_movimientos_unidad1_idx` (`unidad_id`),
  KEY `fk_unidad_movimientos_unidad_asignacion1_idx` (`asignacion_id`),
  KEY `fk_unidad_movimientos_unidad_tipo_asignacion1_idx` (`tipo_asignacion_id`),
  KEY `fk_unidad_movimientos_users1_idx` (`iduserCreated`),
  KEY `fk_unidad_movimientos_users2_idx` (`iduserUpdated`),
  KEY `fk_unidad_movimientos_proyectos1_idx` (`proyectos_id`),
  KEY `fk_unidad_movimientos_ubicacion_unidad1_idx` (`ubicacion_id`),
  CONSTRAINT `fk_unidad_movimientos_proyectos1` FOREIGN KEY (`proyectos_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_movimientos_ubicacion_unidad1` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicacion_unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_movimientos_unidad1` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_movimientos_unidad_asignacion1` FOREIGN KEY (`asignacion_id`) REFERENCES `unidad_asignacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_movimientos_unidad_tipo_asignacion1` FOREIGN KEY (`tipo_asignacion_id`) REFERENCES `unidad_tipo_asignacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_movimientos_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_movimientos_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_movimientos`
--

LOCK TABLES `unidad_movimientos` WRITE;
/*!40000 ALTER TABLE `unidad_movimientos` DISABLE KEYS */;
INSERT INTO `unidad_movimientos` VALUES (1,70,0,32,NULL,NULL,0,'2022-09-06','2022-10-07',NULL,'2022-09-07 01:21:04',0,0),(42,70,0,NULL,NULL,NULL,0,'2022-09-12','2022-10-07','2022-09-06 04:01:49','2022-09-07 01:21:04',0,0),(43,70,0,NULL,NULL,NULL,0,'2022-09-18','2022-10-07','2022-09-06 04:02:00','2022-09-07 01:21:04',0,0),(44,70,0,32,NULL,NULL,0,'2022-09-26','2022-10-07','2022-09-06 04:02:10','2022-09-07 01:21:04',0,0),(45,70,0,34,NULL,NULL,0,'2022-10-06','2022-10-07','2022-09-06 04:02:21','2022-09-07 01:21:04',0,0),(46,38,0,32,NULL,NULL,0,'2022-09-06',NULL,'2022-09-06 20:36:50','2022-09-06 20:36:50',0,0),(47,70,0,NULL,NULL,NULL,0,'2022-10-07',NULL,'2022-09-07 01:21:04','2022-09-07 01:21:04',0,0),(48,69,0,33,NULL,NULL,0,'2022-09-06','2022-09-06','2022-09-07 02:08:16','2022-09-07 02:09:28',0,0),(49,69,0,32,NULL,NULL,0,'2022-09-06','2022-09-06','2022-09-07 02:09:06','2022-09-07 02:09:28',0,0),(50,69,0,33,NULL,NULL,0,'2022-09-06','2022-09-06','2022-09-07 02:09:18','2022-09-07 02:09:28',0,0),(51,69,0,32,NULL,NULL,0,'2022-09-06',NULL,'2022-09-07 02:09:28','2022-09-07 02:09:28',0,0),(52,61,0,33,NULL,NULL,0,'2022-09-28',NULL,'2022-09-07 02:10:18','2022-09-07 02:10:18',0,0),(53,66,0,NULL,NULL,NULL,0,'2022-09-06',NULL,'2022-09-07 02:11:17','2022-09-07 02:11:17',0,0),(54,65,0,NULL,NULL,NULL,0,'2022-09-07',NULL,'2022-09-07 02:11:39','2022-09-07 02:11:39',0,0),(55,78,2,NULL,NULL,1,2,'2022-11-19',NULL,'2022-09-19 22:33:15','2022-09-19 22:33:15',1,1),(56,80,1,32,NULL,NULL,2,'2022-11-19',NULL,'2022-10-21 21:47:53','2022-10-21 21:47:53',1,1),(57,83,1,32,13,NULL,1,'2022-12-10',NULL,'2022-11-24 22:06:07','2022-11-24 22:06:07',1,1),(58,84,1,32,13,NULL,1,'2022-12-10',NULL,'2022-11-24 22:08:17','2022-11-24 22:08:17',1,1),(59,51,1,32,13,NULL,1,'2022-11-25',NULL,'2022-11-24 22:12:22','2022-11-24 22:12:22',1,1),(60,82,1,33,13,NULL,2,'2022-12-30',NULL,'2022-11-25 03:20:57','2022-11-25 03:20:57',1,1),(61,97,2,NULL,NULL,1,1,'2022-12-23','2023-06-08','2023-02-24 22:53:06','2023-02-27 22:11:22',1,1),(62,97,1,34,15,NULL,1,'2023-06-08',NULL,'2023-02-27 22:11:22','2023-02-27 22:11:22',1,1);
/*!40000 ALTER TABLE `unidad_movimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_requisicion_estatus`
--

DROP TABLE IF EXISTS `unidad_requisicion_estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_requisicion_estatus` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estatus_unidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_requisicion_estatus`
--

LOCK TABLES `unidad_requisicion_estatus` WRITE;
/*!40000 ALTER TABLE `unidad_requisicion_estatus` DISABLE KEYS */;
INSERT INTO `unidad_requisicion_estatus` VALUES (1,0),(2,0);
/*!40000 ALTER TABLE `unidad_requisicion_estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_tipo_asignacion`
--

DROP TABLE IF EXISTS `unidad_tipo_asignacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_tipo_asignacion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_asignacion` varchar(255) DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_unidad_tipo_asignacion_users1_idx` (`iduserCreated`),
  KEY `fk_unidad_tipo_asignacion_users2_idx` (`iduserUpdated`),
  KEY `fk_unidad_tipo_asignacion_siaf_status1_idx` (`id_status_delete`),
  CONSTRAINT `fk_unidad_tipo_asignacion_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_tipo_asignacion_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_tipo_asignacion_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_tipo_asignacion`
--

LOCK TABLES `unidad_tipo_asignacion` WRITE;
/*!40000 ALTER TABLE `unidad_tipo_asignacion` DISABLE KEYS */;
INSERT INTO `unidad_tipo_asignacion` VALUES (1,'Base',1,'2022-08-31 02:18:18','2022-08-31 02:29:49',1,1),(2,'Sustituto',1,'2022-08-31 02:30:15','2022-08-31 02:30:15',1,1),(3,'Cortesia',1,'2022-08-31 02:30:23','2022-08-31 02:30:23',1,1),(4,'Robo total',1,'2022-08-31 02:30:33','2022-08-31 02:41:36',1,1);
/*!40000 ALTER TABLE `unidad_tipo_asignacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_tipo_cobertura`
--

DROP TABLE IF EXISTS `unidad_tipo_cobertura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_tipo_cobertura` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_cobertura` varchar(255) DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_unidad_tipo_cobertura_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_unidad_tipo_cobertura_users1_idx` (`iduserCreated`),
  KEY `fk_unidad_tipo_cobertura_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_unidad_tipo_cobertura_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_tipo_cobertura_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_tipo_cobertura_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_tipo_cobertura`
--

LOCK TABLES `unidad_tipo_cobertura` WRITE;
/*!40000 ALTER TABLE `unidad_tipo_cobertura` DISABLE KEYS */;
INSERT INTO `unidad_tipo_cobertura` VALUES (1,'Responsabilidad civil',1,1,1,NULL,NULL),(2,'Cobertura Total',1,1,1,NULL,NULL),(3,'Cobertura de colisión',1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `unidad_tipo_cobertura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_tipo_documento`
--

DROP TABLE IF EXISTS `unidad_tipo_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_tipo_documento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_unidad_tipo_documento_estatus` bigint(20) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_unidad_tipo_documento_unidad_tipo_documento_estatus1_idx` (`id_unidad_tipo_documento_estatus`),
  KEY `fk_unidad_tipo_documento_users1_idx` (`iduserCreated`),
  KEY `fk_unidad_tipo_documento_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_unidad_tipo_documento_unidad_tipo_documento_estatus1` FOREIGN KEY (`id_unidad_tipo_documento_estatus`) REFERENCES `unidad_tipo_documento_estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_tipo_documento_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_tipo_documento_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_tipo_documento`
--

LOCK TABLES `unidad_tipo_documento` WRITE;
/*!40000 ALTER TABLE `unidad_tipo_documento` DISABLE KEYS */;
INSERT INTO `unidad_tipo_documento` VALUES (1,1,' Verificacion','2022-08-02 23:20:03','2022-08-02 23:20:03',1,1),(2,1,'Tenencia','2022-08-04 03:08:02','2022-08-04 03:20:10',1,1);
/*!40000 ALTER TABLE `unidad_tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_tipo_documento_estatus`
--

DROP TABLE IF EXISTS `unidad_tipo_documento_estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_tipo_documento_estatus` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estatus` varchar(75) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_unidad_tipo_documento_estatus_users1_idx` (`iduserCreated`),
  KEY `fk_unidad_tipo_documento_estatus_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_unidad_tipo_documento_estatus_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_tipo_documento_estatus_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_tipo_documento_estatus`
--

LOCK TABLES `unidad_tipo_documento_estatus` WRITE;
/*!40000 ALTER TABLE `unidad_tipo_documento_estatus` DISABLE KEYS */;
INSERT INTO `unidad_tipo_documento_estatus` VALUES (1,'1','2022-08-02 23:20:03','2022-08-02 23:20:03',1,1),(2,'2','2022-08-02 23:20:03','2022-08-02 23:20:03',1,1);
/*!40000 ALTER TABLE `unidad_tipo_documento_estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_vehiculo_tipo`
--

DROP TABLE IF EXISTS `unidad_vehiculo_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_vehiculo_tipo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `vehiculo_tipo` varchar(255) DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_unidad_vehiculo_tipo_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_unidad_vehiculo_tipo_users1_idx` (`iduserCreated`),
  KEY `fk_unidad_vehiculo_tipo_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_unidad_vehiculo_tipo_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_vehiculo_tipo_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_vehiculo_tipo_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_vehiculo_tipo`
--

LOCK TABLES `unidad_vehiculo_tipo` WRITE;
/*!40000 ALTER TABLE `unidad_vehiculo_tipo` DISABLE KEYS */;
INSERT INTO `unidad_vehiculo_tipo` VALUES (1,'PICKUP',1,1,1,'2022-09-03 02:26:25','2022-09-03 02:41:06'),(2,'Ram1500CrewCabSLTTrabajo/V68ATX4X2',1,1,1,'2022-09-03 02:26:35','2022-09-03 02:26:35'),(3,'SUV',1,1,1,'2022-09-03 02:27:01','2022-09-03 02:27:01'),(4,'SEDAN MEDIANO',1,1,1,'2022-09-14 22:13:33','2022-09-14 22:13:33'),(5,'Hatchback',1,1,1,'2022-09-14 22:13:33','2022-09-14 22:13:33'),(6,'SEDAN',1,1,1,'2022-09-20 02:41:32','2022-09-20 02:41:32'),(18,'CARROZA',1,1,1,'2022-12-22 12:06:04','2022-12-22 12:06:04');
/*!40000 ALTER TABLE `unidad_vehiculo_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidades_presupuestos`
--

DROP TABLE IF EXISTS `unidades_presupuestos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidades_presupuestos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_licitacion` int(11) NOT NULL DEFAULT 0,
  `id_presupuesto` int(11) NOT NULL DEFAULT 0,
  `id_unidad` int(11) NOT NULL DEFAULT 0,
  `iduserCreated` bigint(19) unsigned DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidades_presupuestos`
--

LOCK TABLES `unidades_presupuestos` WRITE;
/*!40000 ALTER TABLE `unidades_presupuestos` DISABLE KEYS */;
INSERT INTO `unidades_presupuestos` VALUES (1,5,1,1,1,1,'2022-06-16 02:18:27','2022-06-16 02:18:27'),(2,5,1,3,1,1,'2022-06-16 02:18:27','2022-06-16 02:18:27'),(3,5,1,4,1,1,'2022-06-16 02:18:27','2022-06-16 02:18:27'),(4,5,1,5,1,1,'2022-06-16 02:18:27','2022-06-16 02:18:27');
/*!40000 ALTER TABLE `unidades_presupuestos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_usuario_id` bigint(20) DEFAULT NULL,
  `area_personal_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(95) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivo_desactivar` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status_delete` int(11) NOT NULL,
  `estatus_asignacion` int(11) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `fk_users_siaf_status1_idx` (`id_status_delete`),
  KEY `fk_users_area_personal1_idx` (`area_personal_id`),
  KEY `fk_users_tipo_usuario1_idx` (`tipo_usuario_id`),
  CONSTRAINT `fk_users_area_personal1` FOREIGN KEY (`area_personal_id`) REFERENCES `area_personal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_siaf_status1` FOREIGN KEY (`id_status_delete`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_tipo_usuario1` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,1,'ADMIN','ADMIN@ADMIN.COM','2022-07-06 00:20:56','$2y$10$JYfiZdUV6qc1/qWaVjm9qexoCgh.grghnr2NckA5cTvhImTR/Yg.2',NULL,'5566482',NULL,'p73tfV86C6gCUoaHBanXbaIvoXNezZ3sGXJWES7c.jpg',NULL,NULL,1,1,4,'2023-07-25 22:58:34','2023-07-25 22:58:34'),(2,1,1,'FERNANDO1','FER@HOTMAIL.COM',NULL,'$2y$10$I/aikALL8IMOeZjvju1bTeAHWSZJg50iQPJEll9PfT4haaE2lNjwC','CGDGDFV435654','5566482',NULL,NULL,NULL,NULL,1,2,4,'2023-09-14 00:54:05','2023-09-20 22:05:45'),(7,NULL,0,'jetvan','jetvan@admin.com',NULL,'$2y$10$WH.mRH34cjULCk.UJiDk2eWcRb4G/BQnFamBTW2ejVkyPfPwR1Qve',NULL,NULL,NULL,NULL,NULL,NULL,1,1,4,'2022-05-25 23:42:56','2022-05-25 23:42:56'),(9,NULL,0,'Juan Perez','juan@hotmail.com',NULL,'$2y$10$9nQKpZBUHRMahAwTCogYFOPqtUGlDVl0oNU3gUN4JUaGVAK95FOiC',NULL,'55648502',NULL,NULL,NULL,NULL,1,1,9,'2022-07-06 00:21:29','2022-07-06 00:21:29'),(10,NULL,0,'Fernando Herrera','ferh@hotmail.com',NULL,'$2y$10$BXpKTL6I9IJR1xJzXmbAZuO4XrfmB0tbrHf8iLDyJX1P7pAj9lPXm','CGDGDFV4356','556118502','Segundo Piso3',NULL,NULL,NULL,1,1,9,'2022-07-06 00:20:56','2022-07-06 00:20:56'),(11,NULL,0,'Marisol','marisol@jetvan.com',NULL,'$2y$10$UsKRjj7GXd/oZs5x8vXzH.UpjLeJjVmobVblwoor3bSl/gLKMlbm2','RAU16060DU734','556485201','Segundo Piso',NULL,NULL,NULL,1,1,9,'2022-09-01 23:23:03','2022-09-01 23:23:03'),(12,NULL,0,'Fernando Pr','fer@p.com',NULL,'$2y$10$DriuFzBphUANhjeZcCdp1.ZU9Kz8Tl6iPWKOMQofS2x9gi/MGAKh6','CGDGDFV4356456','5561185022',NULL,NULL,NULL,NULL,2,1,7,'2022-08-24 02:50:40','2022-08-24 02:50:40'),(14,NULL,0,'Fernando','pruebarol@hotmail.com',NULL,'$2y$10$UqvjMwgx9TZFroc4/YVeWu5YF6q7GwV7Y0VNB7JG7rKf3Y9ZxBV1m','JCR040721NU2453','5561185022','Segundo Piso',NULL,NULL,NULL,1,1,9,'2022-11-04 05:13:40','2022-11-04 05:13:40'),(15,NULL,0,'Direccion Comercial','direccion@comerial.com',NULL,'$2y$10$wRxDOzwh4ZzqbtWtsEUQh.fgC6Oal9R2JlFTdOnNhWcB8q.EKWWd6','JCR040721NU24356','68989654','Prueba',NULL,NULL,NULL,1,1,11,'2022-11-08 05:07:56','2022-11-08 05:07:56'),(16,NULL,0,'Direccion Contratos','direccion@contratos.com',NULL,'$2y$10$5Yvk/wFImEvy4MIKxPX.ruvnBzcYNhzwO1q7xu/KLT9ZfCGKdpxoy','JCR040721NU232','248748','Prueba',NULL,NULL,NULL,1,1,12,'2022-11-08 05:10:04','2022-11-08 05:10:04'),(17,NULL,0,'Direccion operaciones','direccion@operaciones.com',NULL,'$2y$10$H5U1XUhO9cdWobiyIUxGBe3CG3BO4t3.P7W81ddsZq3EMobbCRawq','JCR040721NU287','98248','Prueba',NULL,'numero 17',NULL,1,1,13,'2022-11-08 05:11:59','2022-12-01 04:55:41'),(19,1,1,'FERNANDO','FER123@HOTMAIL.COM',NULL,'$2y$10$hrkwrpa3AE7Kl.Mha2wGD.4BcUPGlRBSRtMaPi99Caxr/5yQi0A8O','CGDGDFV4356547658','5561185022','PRUEBA','hyhN3IZ98FcQTbjctoy81fGc5WZ6yqjS6NGg8yc1.jpg',NULL,NULL,1,2,4,'2023-09-14 00:55:03','2023-09-25 09:43:38'),(20,1,2,'PRUEBA CLIENTE 1','PRUEBA1C@HOTMAIL.COM',NULL,'$2y$10$DWi4lKD6WOWwhIccAMMXa.XY6tQE0JRNLqXMB6vNfrDPwIsymyfnK','CGDGDFV4356PC1','55448855','PRUEBA',NULL,NULL,NULL,1,1,7,'2023-09-13 23:48:17','2023-09-13 23:48:17'),(21,1,2,'PRUEBA CLIENTE 2','PRUEBAC2@HOTMAIL.COM',NULL,'$2y$10$Ztb40y9gS74v4MnvwkZNKe7RatwC6nilOQok0OGsH7sPMs9Unt4AW','CGDGDFV4356PC2','55448855','PRUEBA',NULL,NULL,NULL,1,2,7,'2023-09-14 01:02:20','2023-09-22 23:41:53'),(22,1,1,'PRUEBA CLIENTE','PRUEBAC3@HOTMAIL.COM',NULL,'$2y$10$uiy4yETSfpc3zQhAC8oUCuFzBdlTpXa9F0aSWHWCKDS1yKFFkQgWa','CGDGDFV4356PC3','55448877','PRUEBA',NULL,NULL,NULL,1,1,7,'2023-09-13 23:50:05','2023-09-20 02:00:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-15 19:12:45
