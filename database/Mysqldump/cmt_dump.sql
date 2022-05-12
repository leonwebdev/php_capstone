-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: capstone
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

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
-- Table structure for table `comments`
--
USE capstone;
DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `postid` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `content` text DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_comment_post` (`postid`),
  KEY `fk_comment_user` (`userid`),
  CONSTRAINT `fk_comment_post` FOREIGN KEY (`postid`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comment_user` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,1,'<p>Lorem ipsum dolor sit amet coisicing elita posuere turpis.</p>',0,'2022-05-11 09:08:52','2022-05-11 09:08:52'),(2,1,1,'<p>Lorem ipsum dolor sit amet coisicing elita posuere turpis.</p>',1,'2022-05-11 09:08:52','2022-05-11 22:49:02'),(3,1,2,'<p>Lorem ipsum dolor sit amet coisicing elita posuere turpis.</p>',1,'2022-05-11 09:08:52','2022-05-11 10:56:25'),(4,2,1,'<p>Lorem ipsum dolor sit amet coisicing elita posuere turpis.</p>',0,'2022-05-11 09:08:52','2022-05-11 09:08:52'),(5,2,2,'<p>Lorem ipsum dolor sit amet coisicing elita posuere turpis.</p>',1,'2022-05-11 09:08:52','2022-05-11 10:56:26'),(6,3,1,'<p>Lorem ipsum dolor sit amet coisicing elita posuere turpis.</p>',0,'2022-05-11 09:08:52','2022-05-11 09:08:52'),(7,4,2,'<p>Lorem ipsum dolor sit amet coisicing elita posuere turpis.</p>',1,'2022-05-11 09:08:52','2022-05-11 11:54:09'),(8,5,1,'<p>Lorem ipsum dolor sit amet coisicing elita posuere turpis.</p>',1,'2022-05-11 09:08:52','2022-05-12 01:06:10'),(9,6,2,'<p>Lorem ipsum dolor sit amet coisicing elita posuere turpis.</p>',1,'2022-05-11 09:08:52','2022-05-11 11:54:08'),(10,7,1,'<p>Lorem ipsum dolor sit amet coisicing elita posuere turpis.</p>',0,'2022-05-11 09:08:52','2022-05-11 09:08:52'),(11,8,2,'<p>Lorem ipsum dolor sit amet coisicing elita posuere turpis.</p>',1,'2022-05-11 09:08:52','2022-05-11 11:54:08'),(12,9,1,'<p>Lorem ipsum dolor sit amet coisicing elita posuere turpis.</p>',0,'2022-05-11 09:08:52','2022-05-11 09:08:52'),(13,10,2,'<p>Lorem ipsum dolor sit amet coisicing elita posuere turpis.</p>',1,'2022-05-11 09:08:52','2022-05-11 11:54:10'),(14,11,1,'<p>Lorem ipsum dolor sit amet coisicing elita posuere turpis.</p>',0,'2022-05-11 09:08:52','2022-05-11 09:08:52'),(15,12,2,'<p>Lorem ipsum dolor sit amet coisicing elita posuere turpis.</p>',1,'2022-05-11 09:08:52','2022-05-11 11:54:06'),(16,1,1,'41345  1451435  4514325  sdfaf  efe  rf',0,'2022-05-11 09:09:53','2022-05-11 09:09:53'),(17,1,4,'hfghfghfghfhg',1,'2022-05-11 11:55:17','2022-05-11 11:56:01'),(18,1,4,'412412341234231',1,'2022-05-11 11:55:57','2022-05-11 11:55:59'),(19,1,4,'sdsfdsf  dsfd  sdf  asdf  adsf',1,'2022-05-11 12:10:06','2022-05-11 12:33:13'),(20,1,4,'aaasasasasas  asdas  as  das  das  das  d',1,'2022-05-11 12:32:47','2022-05-11 12:33:19'),(21,2,1,'ellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!    Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.',1,'2022-05-11 22:53:27','2022-05-11 22:55:58'),(22,9,1,', feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!    Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.',0,'2022-05-11 23:32:07','2022-05-11 23:32:07'),(23,7,1,', feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!    Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.',1,'2022-05-11 23:32:17','2022-05-12 01:51:23'),(24,5,1,', feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!    Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.',1,'2022-05-11 23:33:35','2022-05-12 01:51:03'),(25,7,1,', feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!    Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.',1,'2022-05-11 23:34:26','2022-05-12 01:51:12'),(26,17,1,'fsfdsd   ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!    Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit e',0,'2022-05-12 00:10:23','2022-05-12 00:10:23'),(27,11,1,'t amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!    Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augu',0,'2022-05-12 00:41:11','2022-05-12 00:41:11'),(28,6,2,'Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et a',0,'2022-05-12 00:41:43','2022-05-12 00:41:43'),(29,13,2,'e, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectet',0,'2022-05-12 00:41:55','2022-05-12 00:41:55'),(30,10,2,'icies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!',0,'2022-05-12 00:42:12','2022-05-12 00:42:12'),(31,5,1,'dolores animi modi veritatis sed nihil debitis consequatur quibusdam! Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue',1,'2022-05-12 01:09:02','2022-05-12 01:51:08'),(32,4,1,'met consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!    Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egest',0,'2022-05-12 01:09:39','2022-05-12 01:09:39'),(33,6,1,'olor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!    Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vesti',0,'2022-05-12 11:39:33','2022-05-12 11:39:33');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-12 14:17:43

UPDATE `comments` SET `deleted` = 0;