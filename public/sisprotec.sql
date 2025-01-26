-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: sisprotec
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area_personal`
--

LOCK TABLES `area_personal` WRITE;
/*!40000 ALTER TABLE `area_personal` DISABLE KEYS */;
INSERT INTO `area_personal` VALUES (3,'Recursos Humanos',1,'2023-11-27 04:57:51','2023-11-27 04:57:51',1,1);
/*!40000 ALTER TABLE `area_personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(255) DEFAULT NULL,
  `nombre_cliente` varchar(255) DEFAULT NULL,
  `grupo` varchar(255) DEFAULT NULL,
  `dias_credito` varchar(45) DEFAULT NULL,
  `costo_estadia` decimal(15,2) DEFAULT NULL,
  `costo_km` decimal(15,2) DEFAULT NULL,
  `observaciones` mediumtext DEFAULT NULL,
  `siaf_status` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cliente_siaf_status1_idx` (`siaf_status`),
  KEY `fk_cliente_users1_idx` (`iduserCreated`),
  KEY `fk_cliente_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_cliente_siaf_status1` FOREIGN KEY (`siaf_status`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cliente_contacto_facturacion`
--

DROP TABLE IF EXISTS `cliente_contacto_facturacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_contacto_facturacion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cliente_id` bigint(20) NOT NULL,
  `nombre_contacto` varchar(255) DEFAULT NULL,
  `telefono_contacto` varchar(95) DEFAULT NULL,
  `email_contacto` varchar(45) DEFAULT NULL,
  `siaf_status` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cliente_contacto_facturacion_siaf_status1_idx` (`siaf_status`),
  KEY `fk_cliente_contacto_facturacion_users1_idx` (`iduserCreated`),
  KEY `fk_cliente_contacto_facturacion_users2_idx` (`iduserUpdated`),
  KEY `fk_cliente_contacto_facturacion_cliente1_idx` (`cliente_id`),
  CONSTRAINT `fk_cliente_contacto_facturacion_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_contacto_facturacion_siaf_status1` FOREIGN KEY (`siaf_status`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_contacto_facturacion_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_contacto_facturacion_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;


-- Table structure for table `cliente_contacto_operativo`
--

DROP TABLE IF EXISTS `cliente_contacto_operativo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_contacto_operativo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cliente_id` bigint(20) NOT NULL,
  `nombre_operativo` varchar(255) DEFAULT NULL,
  `telefono_operativo` varchar(255) DEFAULT NULL,
  `email_operativo` varchar(95) DEFAULT NULL,
  `siaf_status` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cliente_contacto_operativo_siaf_status1_idx` (`siaf_status`),
  KEY `fk_cliente_contacto_operativo_users1_idx` (`iduserCreated`),
  KEY `fk_cliente_contacto_operativo_users2_idx` (`iduserUpdated`),
  KEY `fk_cliente_contacto_operativo_cliente1_idx` (`cliente_id`),
  CONSTRAINT `fk_cliente_contacto_operativo_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_contacto_operativo_siaf_status1` FOREIGN KEY (`siaf_status`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_contacto_operativo_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_contacto_operativo_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;


-- Table structure for table `custodio`
--

DROP TABLE IF EXISTS `custodio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `custodio` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_custodio` varchar(255) DEFAULT NULL,
  `numero_telefono` varchar(45) DEFAULT NULL,
  `correo_electronico` varchar(95) DEFAULT NULL,
  `rfc` varchar(45) DEFAULT NULL,
  `curp` varchar(75) DEFAULT NULL,
  `base` varchar(255) DEFAULT NULL,
  `fotografia_custodio` varchar(255) DEFAULT NULL,
  `observaciones` mediumtext DEFAULT NULL,
  `op_vehiculo` int(11) DEFAULT NULL,
  `op_arma` int(11) DEFAULT NULL,
  `siaf_status` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_custodio_siaf_status1_idx` (`siaf_status`),
  KEY `fk_custodio_users1_idx` (`iduserCreated`),
  KEY `fk_custodio_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_custodio_siaf_status1` FOREIGN KEY (`siaf_status`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custodio_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custodio_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `custodio_doc_vehiculo`
--

DROP TABLE IF EXISTS `custodio_doc_vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `custodio_doc_vehiculo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `custodio_id` bigint(20) NOT NULL,
  `custodio_documentacion_vehiculo_id` bigint(20) NOT NULL,
  `documento` mediumtext DEFAULT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_custodio_doc_vehiculo_custodio1_idx` (`custodio_id`),
  KEY `fk_custodio_doc_vehiculo_custodio_documentacion_vehiculo1_idx` (`custodio_documentacion_vehiculo_id`),
  KEY `fk_custodio_doc_vehiculo_users1_idx` (`iduserCreated`),
  KEY `fk_custodio_doc_vehiculo_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_custodio_doc_vehiculo_custodio1` FOREIGN KEY (`custodio_id`) REFERENCES `custodio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custodio_doc_vehiculo_custodio_documentacion_vehiculo1` FOREIGN KEY (`custodio_documentacion_vehiculo_id`) REFERENCES `custodio_documentacion_vehiculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custodio_doc_vehiculo_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custodio_doc_vehiculo_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `custodio_documentacion`
--

DROP TABLE IF EXISTS `custodio_documentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `custodio_documentacion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(255) DEFAULT NULL,
  `siaf_status` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_custodio_documentacion_siaf_status1_idx` (`siaf_status`),
  KEY `fk_custodio_documentacion_users1_idx` (`iduserCreated`),
  KEY `fk_custodio_documentacion_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_custodio_documentacion_siaf_status1` FOREIGN KEY (`siaf_status`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custodio_documentacion_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custodio_documentacion_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `custodio_documentacion_vehiculo`
--

DROP TABLE IF EXISTS `custodio_documentacion_vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `custodio_documentacion_vehiculo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_documento_vehiculo` varchar(255) DEFAULT NULL,
  `siaf_status` int(11) NOT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_custodio_documentacion_vehiculo_siaf_status1_idx` (`siaf_status`),
  KEY `fk_custodio_documentacion_vehiculo_users1_idx` (`iduserCreated`),
  KEY `fk_custodio_documentacion_vehiculo_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_custodio_documentacion_vehiculo_siaf_status1` FOREIGN KEY (`siaf_status`) REFERENCES `siaf_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custodio_documentacion_vehiculo_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custodio_documentacion_vehiculo_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `custodio_documento`
--

DROP TABLE IF EXISTS `custodio_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `custodio_documento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `custodio_id` bigint(20) NOT NULL,
  `custodio_documentacion_id` bigint(20) NOT NULL,
  `documento` mediumtext DEFAULT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_custodio_documento_custodio1_idx` (`custodio_id`),
  KEY `fk_custodio_documento_users1_idx` (`iduserCreated`),
  KEY `fk_custodio_documento_users2_idx` (`iduserUpdated`),
  KEY `fk_custodio_documento_custodio_documentacion1_idx` (`custodio_documentacion_id`),
  CONSTRAINT `fk_custodio_documento_custodio1` FOREIGN KEY (`custodio_id`) REFERENCES `custodio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custodio_documento_custodio_documentacion1` FOREIGN KEY (`custodio_documentacion_id`) REFERENCES `custodio_documentacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custodio_documento_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custodio_documento_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `custodio_fotografia_vehiculo`
--

DROP TABLE IF EXISTS `custodio_fotografia_vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `custodio_fotografia_vehiculo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `custodio_id` bigint(20) NOT NULL,
  `fotografia` mediumtext DEFAULT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_custodio_fotografia_vehiculo_custodio1_idx` (`custodio_id`),
  KEY `fk_custodio_fotografia_vehiculo_users1_idx` (`iduserCreated`),
  KEY `fk_custodio_fotografia_vehiculo_users2_idx` (`iduserUpdated`),
  CONSTRAINT `fk_custodio_fotografia_vehiculo_custodio1` FOREIGN KEY (`custodio_id`) REFERENCES `custodio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custodio_fotografia_vehiculo_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custodio_fotografia_vehiculo_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;


-- Table structure for table `custodio_vehiculo`
--

DROP TABLE IF EXISTS `custodio_vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `custodio_vehiculo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `custodio_id` bigint(20) NOT NULL,
  `vehiculo` varchar(255) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `no_serie` varchar(95) DEFAULT NULL,
  `placa` varchar(95) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `gps` int(11) DEFAULT NULL,
  `no_gps` varchar(255) DEFAULT NULL,
  `observaciones` mediumtext DEFAULT NULL,
  `iduserCreated` bigint(19) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `iduserUpdated` bigint(19) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_custodio_vehiculo_users1_idx` (`iduserCreated`),
  KEY `fk_custodio_vehiculo_users2_idx` (`iduserUpdated`),
  KEY `fk_custodio_vehiculo_custodio1_idx` (`custodio_id`),
  CONSTRAINT `fk_custodio_vehiculo_custodio1` FOREIGN KEY (`custodio_id`) REFERENCES `custodio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custodio_vehiculo_users1` FOREIGN KEY (`iduserCreated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custodio_vehiculo_users2` FOREIGN KEY (`iduserUpdated`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;


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
INSERT INTO `permissions` VALUES (1,'role-list','Listado de Roles','web',1,NULL,NULL),(2,'role-create','Crear Roles','web',1,NULL,NULL),(3,'role-edit','Editar Roles','web',1,NULL,NULL),(4,'role-delete','Desactivar Roles','web',1,NULL,NULL),(5,'usuario-list','Listado de Usuarios','web',2,NULL,NULL),(6,'usuario-create','Crear Usuarios','web',2,NULL,NULL),(7,'usuario-edit','Editar Usuarios','web',2,NULL,NULL),(8,'usuario-delete','Desactivar Usuarios','web',2,NULL,NULL);
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
INSERT INTO `role_has_permissions` VALUES (1,4),(2,4),(3,4),(4,4),(5,4),(5,14),(6,4),(6,14),(7,4),(7,14),(8,4),(8,14);
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (4,'Administrador','web',0,'#787878','2022-05-26 05:42:56','2023-11-30 23:40:27'),(14,'Recursos Humanos','web',0,NULL,'2023-11-27 05:06:24','2023-11-27 05:06:24');
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
INSERT INTO `siaf_status` VALUES (1,1,'Activo',1,1,'2022-08-03 05:20:03','2022-08-03 05:20:03'),(2,2,'Inactivo',1,1,'2022-08-03 05:20:03','2022-08-03 05:20:03');
/*!40000 ALTER TABLE `siaf_status` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'cliente','CLIENTE'),(2,'taller','TALLER'),(3,'ejecutivo','EJECUTIVO'),(4,'usuario','USUARIO');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
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
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,4,3,'ADMIN','ADMIN@ADMIN.COM','2022-07-06 06:20:56','$2y$10$JYfiZdUV6qc1/qWaVjm9qexoCgh.grghnr2NckA5cTvhImTR/Yg.2',NULL,'5566482',NULL,'p73tfV86C6gCUoaHBanXbaIvoXNezZ3sGXJWES7c.jpg',NULL,NULL,1,1,4,'2023-11-30 23:56:26','2023-11-30 23:56:26');
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

-- Dump completed on 2024-01-07 15:50:24
