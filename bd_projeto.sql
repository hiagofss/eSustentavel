-- MySQL dump 10.13  Distrib 8.0.11, for Win64 (x86_64)
--
-- Host: localhost    Database: esustentavel
-- ------------------------------------------------------
-- Server version	8.0.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acesso`
--

DROP TABLE IF EXISTS `acesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `acesso` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nm_usu` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `login_usu` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `senha_usu` varchar(12) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acesso`
--

LOCK TABLES `acesso` WRITE;
/*!40000 ALTER TABLE `acesso` DISABLE KEYS */;
INSERT INTO `acesso` VALUES (1,'Adminstrador','admin','admin');
/*!40000 ALTER TABLE `acesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cad_empresas`
--

DROP TABLE IF EXISTS `cad_empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cad_empresas` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nm_empresa` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tp_residuo_empresa` int(11) NOT NULL,
  `segm_residuo` int(11) NOT NULL,
  `tel_empresa` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email_empresa` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_empresa`),
  KEY `tp_residuo_empresa` (`tp_residuo_empresa`),
  KEY `segm_residuo` (`segm_residuo`),
  CONSTRAINT `cad_empresas_ibfk_1` FOREIGN KEY (`tp_residuo_empresa`) REFERENCES `tp_residuos` (`id_residuo`),
  CONSTRAINT `cad_empresas_ibfk_2` FOREIGN KEY (`tp_residuo_empresa`) REFERENCES `tp_residuos` (`id_residuo`),
  CONSTRAINT `cad_empresas_ibfk_3` FOREIGN KEY (`segm_residuo`) REFERENCES `segm_residuos` (`id_segm`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_empresas`
--

LOCK TABLES `cad_empresas` WRITE;
/*!40000 ALTER TABLE `cad_empresas` DISABLE KEYS */;
INSERT INTO `cad_empresas` VALUES (1,'Recilean',10,1,'00-1111-5555','recilean_teste_@gmail.com'),(2,'Reciglass',5,1,'22-9999-3333','reciglas_teste21@gmail.com'),(3,'Coleta Hospitalar',2,2,'22-8888-7777','coeltahospitalar_teste321@gmail.com'),(4,'Reciclar',3,2,'0000000000','reciclar@gmail.com'),(5,'Teste',2,2,'1111111111111','teste@teste.com'),(6,'Recicladora',3,2,'19981547691','hiagofss98@gmail.com'),(7,'Recip',5,1,'1936623082','hiagofss98@gmail.com');
/*!40000 ALTER TABLE `cad_empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consumo_agua`
--

DROP TABLE IF EXISTS `consumo_agua`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `consumo_agua` (
  `id_agua` int(11) NOT NULL AUTO_INCREMENT,
  `nm_empresa_agua` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `data_leitura` date NOT NULL,
  `m3_agua` decimal(10,2) NOT NULL,
  `vl_agua` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_agua`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumo_agua`
--

LOCK TABLES `consumo_agua` WRITE;
/*!40000 ALTER TABLE `consumo_agua` DISABLE KEYS */;
INSERT INTO `consumo_agua` VALUES (1,'DMAE','2018-07-01',300.20,150.02),(2,'DMAE','2018-08-01',320.40,32.04),(3,'DMAE','2018-09-01',380.90,38.09),(4,'DMAE','2018-10-07',340.00,36.00),(5,'DMAE','2018-09-09',50.00,200.00),(6,'DMAE','2018-10-08',50.00,150.00);
/*!40000 ALTER TABLE `consumo_agua` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consumo_energia`
--

DROP TABLE IF EXISTS `consumo_energia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `consumo_energia` (
  `id_energia` int(11) NOT NULL AUTO_INCREMENT,
  `nm_empresa_energia` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `data_leitura` date NOT NULL,
  `kw_h` decimal(10,2) NOT NULL,
  `vl_energia` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_energia`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumo_energia`
--

LOCK TABLES `consumo_energia` WRITE;
/*!40000 ALTER TABLE `consumo_energia` DISABLE KEYS */;
INSERT INTO `consumo_energia` VALUES (1,'CPFL','2018-10-05',97.00,150.00),(2,'CPFL','2018-09-09',50.00,100.00),(3,'CPFL','2018-10-23',260.00,500.00),(4,'CPFL','2018-10-25',150.00,98.00);
/*!40000 ALTER TABLE `consumo_energia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `controle_residuos`
--

DROP TABLE IF EXISTS `controle_residuos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `controle_residuos` (
  `id_controle` int(11) NOT NULL AUTO_INCREMENT,
  `nm_residuo` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tp_residuo` int(11) NOT NULL,
  `residuo_perigoso` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `peso_residuo` decimal(10,2) NOT NULL,
  `data_pesagem` date NOT NULL,
  `destino_residuo` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `residuo_reciclavel` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_controle`),
  KEY `tp_residuo` (`tp_residuo`),
  CONSTRAINT `controle_residuos_ibfk_1` FOREIGN KEY (`tp_residuo`) REFERENCES `tp_residuos` (`id_residuo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controle_residuos`
--

LOCK TABLES `controle_residuos` WRITE;
/*!40000 ALTER TABLE `controle_residuos` DISABLE KEYS */;
INSERT INTO `controle_residuos` VALUES (1,'Oleo',10,'nao',500.00,'2018-09-05','Doacao','sim'),(2,'Oleo',10,'nao',250.60,'2018-09-06','Doacao','sim'),(3,'Seringa',2,'sim',50.80,'2018-09-05','Lixo Hospitalar','nao'),(4,'Seringa',2,'sim',60.70,'2018-09-06','Lixo Hospitalar','nao'),(5,'Garrafa',5,'nao',86.00,'2018-09-26','Reciclagem','sim'),(6,'Aluminio',2,'nao',50.00,'2018-09-26','Reciclagem','sim'),(10,'Caco de Vidro',5,'Sim',93.00,'2018-10-30','Reciclavel','Sim');
/*!40000 ALTER TABLE `controle_residuos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segm_residuos`
--

DROP TABLE IF EXISTS `segm_residuos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `segm_residuos` (
  `id_segm` int(11) NOT NULL AUTO_INCREMENT,
  `nm_segm` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_segm`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segm_residuos`
--

LOCK TABLES `segm_residuos` WRITE;
/*!40000 ALTER TABLE `segm_residuos` DISABLE KEYS */;
INSERT INTO `segm_residuos` VALUES (1,'Reciclagem'),(2,'Lixo Hospitalar'),(3,'Lixo Comum'),(4,'Lixo Radioativo');
/*!40000 ALTER TABLE `segm_residuos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tp_residuos`
--

DROP TABLE IF EXISTS `tp_residuos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tp_residuos` (
  `id_residuo` int(11) NOT NULL AUTO_INCREMENT,
  `desc_residuo` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_residuo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tp_residuos`
--

LOCK TABLES `tp_residuos` WRITE;
/*!40000 ALTER TABLE `tp_residuos` DISABLE KEYS */;
INSERT INTO `tp_residuos` VALUES (1,'Organico'),(2,'Biologico'),(3,'Papel'),(4,'Metal'),(5,'Vidro'),(6,'Plastico'),(7,'Quimico'),(8,'Radioativo'),(9,'Pilha'),(10,'Oleo vegetal'),(11,'Lixo Radioativo'),(12,'Hospitalar');
/*!40000 ALTER TABLE `tp_residuos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'esustentavel'
--

--
-- Dumping routines for database 'esustentavel'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-08 21:47:09
