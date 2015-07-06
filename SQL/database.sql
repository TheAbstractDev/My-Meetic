-- MySQL dump 10.13  Distrib 5.5.38, for osx10.6 (i386)
--
-- Host: localhost    Database: meetic
-- ------------------------------------------------------
-- Server version	5.5.38

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `age`
--

DROP TABLE IF EXISTS `age`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `age` (
  `id_age` int(11) NOT NULL AUTO_INCREMENT,
  `age` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_age`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `age`
--

LOCK TABLES `age` WRITE;
/*!40000 ALTER TABLE `age` DISABLE KEYS */;
INSERT INTO `age` VALUES (1,'18-25'),(2,'25-35'),(3,'35-45'),(4,'45+');
/*!40000 ALTER TABLE `age` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre`
--

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` VALUES (1,'Homme'),(2,'Femme');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img`
--

DROP TABLE IF EXISTS `img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img`
--

LOCK TABLES `img` WRITE;
/*!40000 ALTER TABLE `img` DISABLE KEYS */;
INSERT INTO `img` VALUES (15,2,'../src/avatar/2.jpg'),(19,20,'../src/avatar/20.jpg'),(20,21,'../src/avatar/21.jpg'),(21,22,'../src/avatar/22.jpg'),(22,2,'../src/avatar/2.jpg'),(23,22,'../src/img/no_user.jpg'),(24,20,'../src/img/no_user.jpg'),(25,21,'../src/img/no_user.jpg'),(26,2,'../src/avatar/2.jpg'),(27,2,'../src/avatar/2.jpg'),(28,2,'../src/avatar/2.jpg'),(29,24,'../src/avatar/24.jpg'),(30,2,'../src/avatar/2.jpg'),(31,2,'../src/avatar/2.jpg'),(32,2,'../src/avatar/2.jpg'),(33,2,'../src/avatar/2.jpg'),(34,2,'../src/avatar/2.jpg'),(35,2,'../src/img/no_user.jpg'),(36,2,'../src/img/no_user.jpg'),(37,2,'../src/img/no_user.jpg'),(38,2,'../src/img/no_user.jpg'),(39,23,'../src/img/no_user.jpg'),(40,19,'../src/img/no_user.jpg'),(41,19,'../src/img/no_user.jpg'),(42,2,'../src/img/no_user.jpg'),(43,2,'../src/img/no_user.jpg'),(44,2,'../src/img/no_user.jpg'),(45,2,'../src/img/no_user.jpg');
/*!40000 ALTER TABLE `img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inbox`
--

DROP TABLE IF EXISTS `inbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inbox` (
  `id_msg` int(11) NOT NULL AUTO_INCREMENT,
  `id_from_user` int(11) DEFAULT NULL,
  `id_to_user` int(11) DEFAULT NULL,
  `content` varchar(140) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_msg`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inbox`
--

LOCK TABLES `inbox` WRITE;
/*!40000 ALTER TABLE `inbox` DISABLE KEYS */;
INSERT INTO `inbox` VALUES (15,2,19,'test','2015-02-01 21:14:50'),(16,2,20,'je veux un 20','2015-02-01 21:34:58');
/*!40000 ALTER TABLE `inbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_user`
--

DROP TABLE IF EXISTS `info_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `info_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pref_sexu` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `origines` varchar(255) DEFAULT NULL,
  `couleur_yeux` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_user`
--

LOCK TABLES `info_user` WRITE;
/*!40000 ALTER TABLE `info_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `info_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `login` varchar(40) DEFAULT NULL,
  `pwd` varchar(40) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `sexe` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `img` int(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Beors','Sofiane','1996-05-11','kidd_soso','40bd001563085fc35165329ea1ff5c5ecbdbbeef','theabstractdev@gmail.com','Paris',NULL,'54b90e2826b91',1,1),(19,'Gama','Omb','1995-09-15','ogama','40bd001563085fc35165329ea1ff5c5ecbdbbeef','sofiane.beors@gmail.com','massyv',NULL,'54c65e17f2d78',1,1),(20,'Desloges','Matthias','1985-01-01','MD','40bd001563085fc35165329ea1ff5c5ecbdbbeef','sofiane.beors@gmail.com','paris',NULL,'54c667dc8cd97',1,1),(21,'Dassonville','Gustave','1992-01-01','gus','40bd001563085fc35165329ea1ff5c5ecbdbbeef','sofiane.beors@gmail.com','frankfort',NULL,'54c668f4d7a5a',1,1),(22,'Bart','Louis','1991-01-01','simpson','40bd001563085fc35165329ea1ff5c5ecbdbbeef','sofiane.beors@gmail.com','alsace land',NULL,'54c66ac963df8',1,1),(23,'Pade','Marie','1991-08-05','papillon','40bd001563085fc35165329ea1ff5c5ecbdbbeef','sofiane.beors@gmail.com','pierrefite',NULL,'54c67047885fc',1,0),(24,'zaplat','maxime','0000-00-00','zaplatate','40bd001563085fc35165329ea1ff5c5ecbdbbeef','sofiane.beors@gmail.com','avignon',NULL,'54c76c6b5738e',1,1),(26,'lol','lol','1990-05-04','lol','40bd001563085fc35165329ea1ff5c5ecbdbbeef','sofiane.beors@gmail.com','lol',NULL,'54c8a14630599',0,0);
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

-- Dump completed on 2015-02-01 23:10:21
