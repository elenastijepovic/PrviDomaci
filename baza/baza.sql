/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.17-MariaDB : Database - clanarine
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`clanarine` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `clanarine`;

/*Table structure for table `membership` */

DROP TABLE IF EXISTS `membership`;

CREATE TABLE `membership` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nameSurname` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `membershipType` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `trainerId` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk1Trainer` (`trainerId`),
  CONSTRAINT `fk1Trainer` FOREIGN KEY (`trainerId`) REFERENCES `trainer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

/*Data for the table `membership` */

insert  into `membership`(`id`,`nameSurname`,`email`,`telephone`,`membershipType`,`date`,`trainerId`) values 
(12,'Klijent','klfiewfow','fjewofjoiw','Group','2021-09-22',2),
(13,'Klijent','klfiewfow','fjewofjoiw','Group','2021-09-07',2),
(16,'Ne treba','dasfaf','123456789','Group','2021-09-28',2),
(19,'Test Klijent','testKlijent@gmail.com','0638022388','Individual','2021-09-15',2),
(20,'Test Klijent','dsadad','d0626155','Individual','2021-09-15',13);

/*Table structure for table `trainer` */

DROP TABLE IF EXISTS `trainer`;

CREATE TABLE `trainer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nameSurname` varchar(100) DEFAULT NULL,
  `specialization` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `trainer` */

insert  into `trainer`(`id`,`nameSurname`,`specialization`) values 
(1,'Novi Trener','Grupni'),
(2,'Nikola Neki','Personalni'),
(13,'Milan','AliExpress'),
(14,'Testing','Individual');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
