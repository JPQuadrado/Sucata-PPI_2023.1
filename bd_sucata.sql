CREATE DATABASE  IF NOT EXISTS `sucata` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sucata`;
-- MySQL dump 10.13  Distrib 8.0.35, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: sucata
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cooperativa`
--

DROP TABLE IF EXISTS `cooperativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cooperativa` (
  `cooperativa_id` int NOT NULL AUTO_INCREMENT,
  `cooperativa_name` varchar(50) NOT NULL,
  `cooperativa_cnpj` varchar(50) NOT NULL,
  `cooperativa_cep` varchar(50) NOT NULL,
  `cooperativa_bairro` varchar(50) NOT NULL,
  `cooperativa_logradouro` varchar(50) NOT NULL,
  `cooperativa_localidade` varchar(50) NOT NULL,
  `cooperativa_uf` varchar(2) NOT NULL,
  `cooperativa_complemento` varchar(50) NOT NULL,
  `cooperativa_tel` varchar(50) NOT NULL,
  `vidro` tinyint(1) NOT NULL,
  `bateria` tinyint(1) NOT NULL,
  `metal` tinyint(1) NOT NULL,
  `papel` tinyint(1) NOT NULL,
  `plastico` tinyint(1) NOT NULL,
  PRIMARY KEY (`cooperativa_id`),
  UNIQUE KEY `cooperativa_cnpj` (`cooperativa_cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cooperativa`
--

LOCK TABLES `cooperativa` WRITE;
/*!40000 ALTER TABLE `cooperativa` DISABLE KEYS */;
INSERT INTO `cooperativa` VALUES (1,'Cooperativa CBM','11.057.020/0001-00','38413-111','Planalto','Avenida Indaiá','Uberlândia','MG','1578','(34) 00000-0007',0,0,1,1,1),(2,'Vidros e Baterias Coleta','21.057.159/0001-27','38413-146','Planalto','Avenida Imbaúba','Uberlândia','MG','2000','(34) 00000-0048',1,1,0,0,0),(3,'Franca Reciclagem','22.010.035/0841-01','38413-246','Planalto','Trevo Ivo Alves Pereira','Uberlândia','MG','977','(34) 97481-2535',1,1,1,1,1),(4,'Cooperativa Região Sé','22.030.470/1201-74','01001-001','Sé','Praça da Sé','São Paulo','SP','20','(34) 96712-2235',1,1,1,1,1);
/*!40000 ALTER TABLE `cooperativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ponto`
--

DROP TABLE IF EXISTS `ponto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ponto` (
  `ponto_id` int NOT NULL AUTO_INCREMENT,
  `ponto_nome` varchar(50) NOT NULL,
  `ponto_cep` varchar(50) NOT NULL,
  `ponto_uf` varchar(50) NOT NULL,
  `ponto_localidade` varchar(50) NOT NULL,
  `ponto_complemento` varchar(50) NOT NULL,
  `ponto_logradouro` varchar(50) NOT NULL,
  `ponto_bairro` varchar(50) NOT NULL,
  `vidro` tinyint(1) NOT NULL,
  `bateria` tinyint(1) NOT NULL,
  `metal` tinyint(1) NOT NULL,
  `papel` tinyint(1) NOT NULL,
  `plastico` tinyint(1) NOT NULL,
  `cooperativa_id` int NOT NULL,
  PRIMARY KEY (`ponto_id`),
  KEY `cooperativa_id` (`cooperativa_id`),
  CONSTRAINT `ponto_ibfk_1` FOREIGN KEY (`cooperativa_id`) REFERENCES `cooperativa` (`cooperativa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ponto`
--

LOCK TABLES `ponto` WRITE;
/*!40000 ALTER TABLE `ponto` DISABLE KEYS */;
INSERT INTO `ponto` VALUES (1,'Terminal Planalto','38413-303','MG','Uberlândia','650','Rua Joaquim Leal de Camargos','Chácaras Tubalina e Quartel',1,1,0,0,0,2),(2,'Clube GRESSU','38413-146','MG','Uberlândia','1574','Avenida Imbaúba','Planalto',1,0,0,0,0,2),(3,'Bar do Tico','38413-161','MG','Uberlândia','111','Rua Dezesseis','Planalto',0,0,0,1,1,1),(5,'Americanas Jardim Patricia','38414-073','MG','Uberlândia','1930','Avenida José Fonseca e Silva','Jardim Patrícia',1,1,1,1,1,3),(6,'Papelaria Alcione','38414-386','MG','Uberlândia','1950','Rua Alcione Zago','Luizote de Freitas',0,0,0,1,0,3),(7,'Regis Discos','38414-356','MG','Uberlândia','58','Rua Ângelo Zago','Luizote de Freitas',0,1,1,0,1,3),(8,'Academia da Cerveja','38414-256','MG','Uberlândia','46','Rua Calil Abrão','Luizote de Freitas',1,0,1,0,1,3),(10,'Restaurante do Bob','01002-010','SP','São Paulo','874','Praça do Patriarca','Sé',1,0,0,0,1,4),(11,'Escritório Regional de Viagens','01002-902','SP','São Paulo','7489','Rua Direita','Sé',1,1,1,1,1,4),(12,'NewTech Computadores','01002-902','SP','São Paulo','587','Rua Direita','Sé',0,1,1,0,0,4);
/*!40000 ALTER TABLE `ponto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_cep` varchar(50) NOT NULL,
  `user_logradouro` varchar(50) NOT NULL,
  `user_bairro` varchar(50) NOT NULL,
  `user_localidade` varchar(50) NOT NULL,
  `user_uf` varchar(2) NOT NULL,
  `user_complemento` varchar(50) NOT NULL,
  `user_cpf` varchar(50) NOT NULL,
  `user_tel` varchar(50) NOT NULL,
  `user_photo` blob,
  `cooperativa_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_cpf` (`user_cpf`),
  KEY `cooperativa_id` (`cooperativa_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`cooperativa_id`) REFERENCES `cooperativa` (`cooperativa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'andresa@gmail.com','123','Andressa Vieira','38413-222','Rua do Borracheiro','Planalto','Uberlândia','MG','800','111.111.111-25','(34) 98745-2235',NULL,1),(2,'brundof@gmail.com','123','Bruno Ferreira','38413-204','Rua do Cinegrafista','Planalto','Uberlândia','MG','648','111.222.111-00','(34) 98745-2235',NULL,1),(7,'flaviam@gmail.com','123','Flavia Miranda','38413-225','Rua José de Paula Galvão','Planalto','Uberlândia','MG','600','023.222.111-04','(34) 98745-2203',NULL,2),(8,'mariam@gmail.com','123','Maria Miranda','38413-195','Rua do Carteiro','Planalto','Uberlândia','MG','600','023.225.111-05','(34) 98745-2205',NULL,2),(9,'kevinm@gmail.com','123','Kevin Moura','38414-366','Rua Agenor Bino','Luizote de Freitas','Uberlândia','MG','5748','154.856.741-25','(34) 99995-4158',NULL,3),(10,'carlaa@gmail.com','123','Carla Andrade','38414-364','Rua Eduardo de Almeida Machado','Luizote de Freitas','Uberlândia','MG','574','254.856.741-25','(34) 98995-4158',NULL,3),(11,'vitoriau@gmail.com','123','Vitoria Uchoa','38414-304','Rua Albacis Cavalcanti','Luizote de Freitas','Uberlândia','MG','100','021.846.741-30','(34) 94758-4158',NULL,3),(12,'alexvt@gmail.com','123','Alex Victor Teixeira','01002-000','Rua Direita','Sé','São Paulo','SP','847','041.588.264-57','(11) 95388-5248',NULL,4),(13,'paulovt@gmail.com','123','Paulo Victor Teixeira','01002-000','Rua Direita','Sé','São Paulo','SP','657','051.588.300-57','(11) 95388-5248',NULL,4);
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

-- Dump completed on 2023-11-19 14:07:16
