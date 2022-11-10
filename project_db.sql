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

/*Table structure for table `ci_admin` */

DROP TABLE IF EXISTS `ci_admin`;

CREATE TABLE `ci_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_role_id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `image` varchar(300) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_verify` tinyint(4) NOT NULL DEFAULT 1,
  `is_admin` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `is_supper` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `ci_admin` */

insert  into `ci_admin`(`admin_id`,`admin_role_id`,`username`,`firstname`,`lastname`,`email`,`mobile_no`,`image`,`password`,`last_login`,`is_verify`,`is_admin`,`is_active`,`is_supper`,`token`,`password_reset_code`,`last_ip`,`created_at`,`updated_at`) values (25,5,'admin','Admin','User','admin@gmail.com','544354353','','$2y$10$KyH0L.rMhaXWkMh/ZoN1.e44FOzEak.KzZoUjQdIGiuVJtuKa9z0y','2019-01-09 00:00:00',1,1,1,0,'','','','2018-03-19 00:00:00','2022-02-16 00:00:00'),(26,3,'bush','jorge','bush','bush@gmail.com','5446546545665','1c576d254c9f8a23c9243702bdb45a11.png','$2y$10$qlAzDhBEqkKwP3OykqA7N.ZQk6T67fxD9RHfdv3zToxa9Mtwu9C/e','2018-11-01 09:46:23',1,1,1,0,'','','','2018-03-19 00:00:00','2019-01-26 02:01:11'),(27,5,'schoo43543','rewr','erew','erew@dfsfs','ewre43543','','0a7eab610f12cb73aa0a4aa7c0acf691','2019-01-02 00:00:00',1,1,1,0,'','','','2018-03-18 00:00:00','2019-01-16 23:33:26'),(31,1,'superadmin','Nauman','Ahmed','naumanahmedcs@gmail.com','123456','','$2y$10$cOTKTWhWOrWzDXldeXZKf.uxdCZLyYfftM8mSz3z63dBaTPJSXytO','0000-00-00 00:00:00',1,1,1,1,'','','','2019-01-16 06:01:58','2019-07-16 09:07:37'),(32,4,'John','Smitt','Johan','johnsmith@gmail.com','46545566554865','','$2y$10$ssWS29aK1NV8hmiFxysfgekC3txWQIH/IFPk8BcDLPtpaAwzYwbXu','0000-00-00 00:00:00',1,1,1,0,'','','','2019-07-15 08:07:34','2019-11-25 00:00:00'),(34,2,'techesprit','Zain','Khan','officialarea423@gmail.com','','','$2y$10$kpCJH6qL64tW30YIDqt0LeM8D23c5DAUqp8aXzaC2tDjKn.qeNVLe','0000-00-00 00:00:00',0,1,1,0,'b3967a0e938dc2a6340e258630febd5a','','','2019-11-26 00:00:00','2019-11-26 00:00:00'),(38,5,'user','username','userlast','user@email.com','0922222222','','$2y$10$93ip8RphF3kIE205AwLk2O3A0HAYzkGKzdMkxtG9v5kmOXow4Acv6','0000-00-00 00:00:00',1,1,1,0,'','','','2022-02-16 00:00:00','2022-02-16 00:00:00'),(39,5,'aaaaaaaa','aaaaaaaa','sssss','aaaaa@aaa.cj','342342324','','$2y$10$Mmqg5W2Gg7vCTPAg0ThiOuT6ojp8jrFCjlC8U7.bKtkc7SYyRP3Ku','0000-00-00 00:00:00',0,1,1,0,'b3e3e393c77e35a4a3f3cbd1e429b5dc','','','2022-02-16 00:00:00','2022-02-16 00:00:00');

/*Table structure for table `ci_users` */

DROP TABLE IF EXISTS `ci_users`;

CREATE TABLE `ci_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `is_verify` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

/*Data for the table `ci_users` */

insert  into `ci_users`(`user_id`,`username`,`firstname`,`lastname`,`password`,`user_role`,`is_active`,`is_verify`,`token`,`password_reset_code`,`last_ip`,`created_at`,`updated_at`) values (1,'admin','Arnel','Arellano','21232f297a57a5a743894a0e4a801fc3',1,1,1,'N/A','N/A','N/A','2022-10-16 18:18:05','2022-10-16 18:18:09');

/*Table structure for table `module` */

DROP TABLE IF EXISTS `module`;

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) NOT NULL,
  `controller_name` varchar(200) DEFAULT NULL,
  `fa_icon` varchar(100) NOT NULL,
  `sort_order` tinyint(4) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

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
  KEY `RoleId` (`user_role`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

/*Data for the table `module_access` */

insert  into `module_access`(`id`,`user_role`,`module_id`,`sub_module_id`,`operation`) values (1,1,1,1,'access'),(2,1,1,2,'add'),(3,1,2,3,'acess'),(5,1,2,4,'add'),(6,1,0,NULL,'change_status'),(7,1,0,NULL,'access'),(8,1,0,NULL,'view'),(9,1,0,NULL,'add'),(10,1,0,NULL,'edit');

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
  KEY `Parent Module ID` (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

/*Data for the table `sub_module` */

insert  into `sub_module`(`sub_module_id`,`module_id`,`sub_module_name`,`link`,`sort_order`,`operation`) values (1,1,'Users List','users_index',1,'access'),(2,1,'Add New User','add_users',1,'add'),(3,2,'Module Setting','module_index',1,NULL),(4,2,'Roles & Permissions','roles_index',2,NULL),(26,9,'dashboard_v1','',1,NULL),(27,9,'dashboard_v2','index_2',2,NULL),(28,9,'dashboard_v3','index_3',3,NULL),(67,8,'general_settings','',1,NULL),(68,8,'email_template_settings','email_templates',2,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `user_roles` */

insert  into `user_roles`(`id`,`roles`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'Super Admin',0,'2018-03-15 12:48:04',0,'2018-03-17 12:53:16'),(2,'Admin',0,'2018-03-15 12:53:19',0,'2019-01-26 08:27:34'),(3,'Accountant',0,'2018-03-15 01:46:54',0,'2019-01-26 02:17:38'),(4,'Operator',0,'2018-03-16 05:52:45',0,'2019-01-26 02:17:52'),(5,'User',0,'2022-02-16 08:32:16',0,'2022-02-16 08:32:36'),(6,'up trty ew ',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
