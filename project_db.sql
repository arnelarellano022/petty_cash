/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.14-MariaDB : Database - project_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`project_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `project_db`;

/*Table structure for table `ci_users` */

DROP TABLE IF EXISTS `ci_users`;

CREATE TABLE `ci_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verify` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `token` varchar(255) DEFAULT NULL,
  `password_reset_code` varchar(255) DEFAULT NULL,
  `last_ip` varchar(30) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `ci_users` */

insert  into `ci_users`(`user_id`,`username`,`firstname`,`lastname`,`password`,`user_role`,`is_active`,`is_verify`,`status`,`token`,`password_reset_code`,`last_ip`,`created_at`,`updated_at`) values (1,'admin','Arnel','Arellano','21232f297a57a5a743894a0e4a801fc3',1,1,1,1,'N/A','N/A','N/A','2022-10-16 18:18:05','2022-10-16 18:18:09'),(3,'user','Arnel ','Arellano','ee11cbb19052e40b07aac0ca060c23ee',2,1,1,1,NULL,NULL,NULL,'2022-11-13 06:14:22','2022-11-13 06:14:22'),(4,'marketing','try','try','81dc9bdb52d04dc20036dbd8313ed055',5,1,1,1,NULL,NULL,NULL,'2022-11-13 06:32:28','2022-11-13 06:32:28'),(5,'aarellano','Arnel','Arellano','81dc9bdb52d04dc20036dbd8313ed055',3,1,1,1,NULL,NULL,NULL,'2022-11-14 19:25:01','2022-11-14 19:25:01');

/*Table structure for table `module` */

DROP TABLE IF EXISTS `module`;

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) NOT NULL,
  `controller_name` varchar(200) DEFAULT NULL,
  `fa_icon` varchar(100) NOT NULL,
  `sort_order` tinyint(4) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `module` */

insert  into `module`(`module_id`,`module_name`,`controller_name`,`fa_icon`,`sort_order`) values (1,'Users','Users','fa-users',1),(2,'Role and Permissions','Roles','fa-book',2),(3,'Settings','Settings','fa-cogs',3);

/*Table structure for table `module_access` */

DROP TABLE IF EXISTS `module_access`;

CREATE TABLE `module_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` int(5) NOT NULL,
  `module_id` int(5) NOT NULL,
  `sub_module_id` int(5) DEFAULT NULL,
  `operation` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `RoleId` (`user_role`),
  KEY `FK-Module` (`module_id`),
  KEY `FK-SubModule` (`sub_module_id`),
  CONSTRAINT `FK-Module` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK-Roles` FOREIGN KEY (`user_role`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK-SubModule` FOREIGN KEY (`sub_module_id`) REFERENCES `sub_module` (`sub_module_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `module_access` */

insert  into `module_access`(`id`,`user_role`,`module_id`,`sub_module_id`,`operation`) values (1,1,1,1,'access'),(2,1,1,2,'access'),(3,1,2,3,'access'),(4,1,2,4,'access'),(5,1,3,5,'access'),(6,1,3,6,'access');

/*Table structure for table `sub_module` */

DROP TABLE IF EXISTS `sub_module`;

CREATE TABLE `sub_module` (
  `sub_module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `sub_module_name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `operation` text DEFAULT NULL,
  PRIMARY KEY (`sub_module_id`),
  KEY `Parent Module ID` (`module_id`),
  CONSTRAINT `FK-Module-ID` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

/*Data for the table `sub_module` */

insert  into `sub_module`(`sub_module_id`,`module_id`,`sub_module_name`,`link`,`sort_order`,`operation`) values (1,1,'Users List','users_index',1,'access|add|edit|delete'),(2,1,'Add New User','add_users',2,'access|add|edit|delete'),(3,2,'Module Setting','module_index',3,'access|add|edit|delete'),(4,2,'Roles & Permissions','roles_index',4,'access|add|edit|delete'),(5,3,'General Settings','settings_index',5,'access'),(6,3,'Email Template Settings','email_index',6,'access');

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roles` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created_by` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `user_roles` */

insert  into `user_roles`(`id`,`roles`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'Admin',0,'2018-03-15 12:48:04',0,'2018-03-17 12:53:16'),(2,'User',0,'2018-03-15 12:53:19',0,'2019-01-26 08:27:34'),(3,'Accountant',0,'2018-03-15 01:46:54',0,'2019-01-26 02:17:38'),(4,'Operator',0,'2018-03-16 05:52:45',0,'2019-01-26 02:17:52'),(5,'Marketing',0,'2022-02-16 08:32:16',0,'2022-02-16 08:32:36'),(6,'up trty ew ',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
