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
  `fa_icon` varchar(100) NOT NULL,
  `sort_order` tinyint(4) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `module` */

insert  into `module`(`module_id`,`module_name`,`fa_icon`,`sort_order`) values (1,'admin','fa-pie-chart',3),(2,'role_and_permissions','fa-book',4),(3,'users','fa-users',4),(8,'settings','fa-cogs',13),(9,'dashboard','fa-dashboard',1),(11,'invoicing_system','fa-files-o',9),(13,'language_setting','fa-language',14),(14,'locations','fa-map-pin',11),(15,'widgets','fa-th',19),(16,'charts','fa-line-chart',17),(17,'ui_elements','fa-tree',18),(18,'forms','fa-edit',20),(19,'tables','fa-table',21),(21,'mailbox','fa-envelope-o',23),(22,'pages','fa-book',24),(23,'extras','fa-plus-square-o',25),(25,'profile','fa-user',2),(26,'activity_log','fa-flag-o',11);

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

insert  into `module_access`(`id`,`user_role`,`module_id`,`sub_module_id`,`operation`) values (1,1,0,NULL,'view'),(2,1,0,NULL,'add'),(3,1,0,NULL,'edit'),(5,1,0,NULL,'access'),(6,1,0,NULL,'change_status'),(7,1,0,NULL,'access'),(8,1,0,NULL,'view'),(9,1,0,NULL,'add'),(10,1,0,NULL,'edit'),(11,1,0,NULL,'access'),(27,2,0,NULL,'access'),(28,2,0,NULL,'access'),(29,2,0,NULL,'view'),(34,2,0,NULL,'access'),(35,2,0,NULL,'access'),(36,2,0,NULL,'access'),(37,2,0,NULL,'access'),(38,2,0,NULL,'access'),(39,2,0,NULL,'access'),(40,2,0,NULL,'access'),(41,2,0,NULL,'access'),(42,2,0,NULL,'access'),(43,2,0,NULL,'view'),(44,2,0,NULL,'add'),(45,2,0,NULL,'edit'),(46,2,0,NULL,'change_status'),(47,2,0,NULL,'access'),(48,2,0,NULL,'access'),(49,2,0,NULL,'access'),(50,2,0,NULL,'access'),(51,2,0,NULL,'access'),(52,2,0,NULL,'access'),(53,2,0,NULL,'access'),(59,1,0,NULL,'view'),(60,1,0,NULL,'change_status'),(61,1,0,NULL,'view'),(62,1,0,NULL,'change_status'),(63,1,0,NULL,'access'),(65,1,0,NULL,'view'),(66,1,0,NULL,'index_3'),(67,1,0,NULL,'access'),(68,1,0,NULL,'delete'),(69,1,0,NULL,'add'),(70,1,0,NULL,'access'),(71,1,0,NULL,'edit'),(72,1,0,NULL,'edit'),(73,1,0,NULL,'delete'),(74,1,0,NULL,'add'),(75,1,0,NULL,'access'),(76,1,0,NULL,'delete'),(77,1,0,NULL,'access'),(78,1,0,NULL,'access'),(79,1,0,NULL,'access'),(80,1,0,NULL,'access'),(81,1,0,NULL,'access'),(82,1,0,NULL,'access'),(83,1,0,NULL,'access'),(84,1,0,NULL,'access'),(85,1,0,NULL,'access'),(86,1,0,NULL,'access'),(87,1,0,NULL,'access'),(88,1,0,NULL,'access'),(89,1,0,NULL,'access'),(90,1,0,NULL,'access'),(91,5,0,NULL,'view'),(96,5,0,NULL,'access'),(101,5,0,NULL,'add'),(102,5,0,NULL,'change_status'),(103,5,0,NULL,'access'),(107,1,0,NULL,'index_2');

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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

/*Data for the table `sub_module` */

insert  into `sub_module`(`sub_module_id`,`module_id`,`sub_module_name`,`link`,`sort_order`,`operation`) values (2,2,'module_setting','module',1,NULL),(3,2,'role_and_permissions','',2,NULL),(4,1,'add_new_admin','add',2,NULL),(6,1,'admin_list','add',1,NULL),(26,9,'dashboard_v1','',1,NULL),(27,9,'dashboard_v2','index_2',2,NULL),(28,9,'dashboard_v3','index_3',3,NULL),(30,3,'users_list','',1,NULL),(31,3,'add_new_user','add',2,NULL),(32,10,'simple_datatable','simple_datatable',1,NULL),(33,10,'ajax_datatable','ajax_datatable',2,NULL),(34,10,'pagination','pagination',3,NULL),(35,10,'advance_search','advance_search',4,NULL),(36,10,'file_upload','file_upload',5,NULL),(37,11,'invoice_list','',1,NULL),(38,11,'add_new_invoice','add',2,NULL),(39,12,'serverside_join','',1,NULL),(40,12,'simple_join','simple',2,NULL),(41,14,'country','',1,NULL),(42,14,'state','state',2,NULL),(43,14,'city','city',3,NULL),(44,16,'charts_js','chartjs',1,NULL),(45,16,'charts_flot','flot',2,NULL),(46,16,'charts_inline','inline',3,NULL),(47,17,'general','general',1,NULL),(48,17,'icons','icons',2,NULL),(49,17,'buttons','buttons',3,NULL),(50,18,'general_elements','general',1,NULL),(51,18,'advanced_elements','advanced',2,NULL),(52,18,'editors','editors',3,NULL),(53,19,'simple_tables','simple',1,NULL),(54,19,'data_tables','data',2,NULL),(55,21,'inbox','inbox',1,NULL),(56,21,'compose','compose',2,NULL),(57,21,'read','read_mail',3,NULL),(58,22,'invoice','invoice',1,NULL),(59,22,'profile','profile',2,NULL),(60,22,'login','login',3,NULL),(61,22,'register','register',4,NULL),(62,22,'lock_screen','Lockscreen',4,NULL),(63,23,'error_404','error404',1,NULL),(64,23,'error_500','error500',2,NULL),(65,23,'blank_page','blank',3,NULL),(66,23,'starter_page','starter',4,NULL),(67,8,'general_settings','',1,NULL),(68,8,'email_template_settings','email_templates',2,NULL),(69,25,'view_profile','',1,NULL),(70,25,'change_password','change_pwd',2,NULL),(71,10,'multiple_files_upload','multi_file_upload',6,NULL),(72,10,'dynamic_charts','charts',7,NULL),(73,10,'locations','locations',8,NULL);

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
