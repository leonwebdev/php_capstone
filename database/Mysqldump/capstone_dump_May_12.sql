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
-- Table structure for table `categories`
--
USE capstone;
DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Event',0,'2022-05-11 09:08:52','2022-05-11 09:08:52'),(2,'Favorite',0,'2022-05-11 09:08:52','2022-05-11 09:08:52'),(3,'Photographs',0,'2022-05-11 09:08:52','2022-05-11 09:08:52'),(4,'Digest',0,'2022-05-11 09:08:52','2022-05-11 09:08:52'),(5,'Tips',0,'2022-05-11 09:08:52','2022-05-11 09:08:52');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

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

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `authorid` bigint(20) NOT NULL,
  `summary` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categoryid` bigint(20) NOT NULL,
  `status` enum('draft','hidden','post') DEFAULT 'draft',
  `allow_comment` tinyint(1) NOT NULL DEFAULT 1,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_post_user` (`authorid`),
  KEY `fk_post_category` (`categoryid`),
  CONSTRAINT `fk_post_category` FOREIGN KEY (`categoryid`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_user` FOREIGN KEY (`authorid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'A tip to plant roses',1,'A good concise suggestion on how to plant your roses in spring.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','1.jpg',5,'post',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(2,'Some pictures of my garden',2,'I took some photos of my lovely little garden this morning.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','2.jpg',3,'post',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(3,'Local event about planting',1,'There will be a seasonal meeting event in Polo Park this weekend.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','3.jpg',1,'post',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(4,'Beautiful tulip farm scenery',1,'I visited a gorgeous tulip farm to share a beautiful picture.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','4.jpg',3,'post',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(5,'How to fertilize your flowers',1,'My friends told me some practical strategies on fertilization.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','5.jpg',5,'post',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(6,'Join the Plants Fair in July',2,'Facinaty Co. will hold a Plants Fair this July in Winnipeg.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','6.jpg',1,'post',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(7,'A good book to share',1,'Recently, I read a book about gardening which I found it quite interesting.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','7.jpg',4,'post',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(8,'I watched a youtube video',1,'The person in this video owned a super large garden behind his house.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','8.jpg',2,'post',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(9,'My friend John sent me a nice picture',1,'He took a vacation in Hawaii, there are some special local species.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','9.jpg',2,'post',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(10,'A monthly review on my flowers',1,'In April, my flowers grew quit good and pictures for share.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','10.jpg',3,'post',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(11,'Some practical tactics on watering',2,'Lots of people said they don\'t know how to water flowers.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','11.jpg',5,'post',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(12,'Nice flower pattern on dishes',1,'Medieval people left precious antique for us to appreciate.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','12.jpg',2,'post',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(13,'Article to share for best sunlight',1,'Acknowledgements you must pay attention to for optimal sunlight.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','13.jpg',4,'post',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(14,'Different colors from dawn to dusk',2,'I found some species\' color will change during the whole day.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','14.jpg',2,'post',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(15,'A brand new conference to attend',1,'Ottawa government will hold a global conference about plants in August.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','15.jpg',1,'post',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(16,'Some plants can serve as cuisine',2,'Do you know some plants are delicious enough to serve as food?','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','16.jpg',1,'post',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(17,'Flowers can be used to dye cloth',1,'I read a book recently about techniques to dye cloth with flowers.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','17.jpg',4,'post',0,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(18,'Three species to bloom the whole year',1,'These species can bloom even during Christmas in Northern Hemisphere.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','18.jpg',5,'post',0,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(19,'Precious species only bloom at night',1,'Very interesting species that they only bloom at night.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','19.jpg',2,'hidden',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52'),(20,'Not only bees can pollen',1,'Some other animals or insects also can.','<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>\n<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>','20.jpg',4,'draft',1,0,'2022-05-11 09:08:52','2022-05-11 09:08:52','2022-05-11 09:08:52');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` char(7) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `subscribe_to_newsletter` tinyint(4) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Lihang','Yao','123 Good Street','Winnipeg','R3C 5W7','Manitoba','Canada','123-123-1234','admin@gardener.com','$2y$10$ZzSz5O1q/3Zit9njCr4LNOnYV6BDcbbWPWPrQcmc1mzp8R0EqwNwG',1,0,0,'2022-05-11 09:08:52','2022-05-11 09:08:52'),(2,'Chris','Brown','73 Nice Street','Ottawa','R3G 9W3','Ontario','Canada','125-521-1764','chris@gardener.com','$2y$10$ZzSz5O1q/3Zit9njCr4LNOnYV6BDcbbWPWPrQcmc1mzp8R0EqwNwG',0,0,0,'2022-05-11 09:08:52','2022-05-11 09:08:52'),(3,'Jack','Smith','68 Mary Ave','Calgary','D3E 7F5','Alberta','Canada','159-874-3258','jack@gardener.com','$2y$10$ZzSz5O1q/3Zit9njCr4LNOnYV6BDcbbWPWPrQcmc1mzp8R0EqwNwG',0,0,0,'2022-05-11 09:08:52','2022-05-11 09:08:52'),(4,'adsaasd','asdasdasd','asdasdsadas','dasdasdsadas','a5a5a5','acfdfdf','asfasdasd','789-456-7896','admisssn@gardener.com','$2y$10$87zWt6nyOpOnNxp7GQC6gumiaSwu2U7bsUdE/xhaCyO8wGCgp6sFa',0,1,0,'2022-05-11 11:54:51','2022-05-11 11:54:51');
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

-- Dump completed on 2022-05-12 14:23:38

UPDATE `comments` SET `deleted` = 0;