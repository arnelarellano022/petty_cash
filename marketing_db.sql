/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.14-MariaDB : Database - marketing_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`marketing_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `marketing_db`;

/*Table structure for table `admin_menu_main` */

DROP TABLE IF EXISTS `admin_menu_main`;

CREATE TABLE `admin_menu_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) DEFAULT NULL,
  `pri` int(11) DEFAULT NULL,
  `url_link` varchar(225) DEFAULT NULL,
  `act` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `admin_menu_main` */

insert  into `admin_menu_main`(`id`,`title`,`pri`,`url_link`,`act`) values (1,'Admin',1,NULL,1),(2,'Outlets',1,NULL,1),(3,'Distributor',1,NULL,1),(4,'Products',1,NULL,1);

/*Table structure for table `admin_menu_sub` */

DROP TABLE IF EXISTS `admin_menu_sub`;

CREATE TABLE `admin_menu_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) DEFAULT NULL,
  `pri` int(11) DEFAULT NULL,
  `url_link` varchar(225) DEFAULT NULL,
  `act` int(1) DEFAULT NULL,
  `main_menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

/*Data for the table `admin_menu_sub` */

insert  into `admin_menu_sub`(`id`,`title`,`pri`,`url_link`,`act`,`main_menu_id`) values (1,'Users',1,'users_index',1,1),(2,'Roles',1,'roles_index',1,1),(3,'Permission',1,'permission_index',1,1),(4,'Outlet List',1,'outlet_index',1,2),(5,'Distributor List',1,'distributors_index',1,3),(6,'Outlet Invoices',1,'outlet_invoice_index',1,2),(7,'Products List',1,'products_index',1,4);

/*Table structure for table `best_photos` */

DROP TABLE IF EXISTS `best_photos`;

CREATE TABLE `best_photos` (
  `best_pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_id` int(11) DEFAULT NULL,
  `photo_filename` varchar(70) DEFAULT NULL,
  `date_taken` date DEFAULT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`best_pic_id`),
  KEY `FK-best_photos` (`outlet_id`),
  CONSTRAINT `FK-best_photos` FOREIGN KEY (`outlet_id`) REFERENCES `outlet_info` (`outlet_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8mb4;

/*Data for the table `best_photos` */

/*Table structure for table `db_outlet_invoice_items` */

DROP TABLE IF EXISTS `db_outlet_invoice_items`;

CREATE TABLE `db_outlet_invoice_items` (
  `doii_id` int(11) NOT NULL AUTO_INCREMENT,
  `doi_invoice_no` varchar(30) NOT NULL,
  `sku` int(11) NOT NULL,
  `quantity` decimal(11,2) NOT NULL,
  PRIMARY KEY (`doii_id`),
  KEY `fk-db_outlet_invoice_items-doi_invoice_no` (`doi_invoice_no`),
  KEY `fk-db_outlet_invoice_items-sku` (`sku`),
  CONSTRAINT `fk-db_outlet_invoice_items-doi_invoice_no` FOREIGN KEY (`doi_invoice_no`) REFERENCES `db_outlet_invoices` (`invoice_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-db_outlet_invoice_items-sku` FOREIGN KEY (`sku`) REFERENCES `products` (`sku`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

/*Data for the table `db_outlet_invoice_items` */

/*Table structure for table `db_outlet_invoices` */

DROP TABLE IF EXISTS `db_outlet_invoices`;

CREATE TABLE `db_outlet_invoices` (
  `doi_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(30) NOT NULL,
  `invoice_date` date NOT NULL,
  `outlet` int(11) NOT NULL,
  `gross_amount` decimal(11,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(11,2) NOT NULL DEFAULT 0.00,
  `vat_amount` decimal(11,2) NOT NULL DEFAULT 0.00,
  `other_discount_amount` decimal(11,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`doi_id`),
  UNIQUE KEY `idx-db_outlet_invoices-invoice_no` (`invoice_no`),
  KEY `fk-db_outlet_invoices-outlet` (`outlet`),
  CONSTRAINT `fk-db_outlet_invoices-outlet` FOREIGN KEY (`outlet`) REFERENCES `outlet_info` (`outlet_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `db_outlet_invoices` */

/*Table structure for table `distributors` */

DROP TABLE IF EXISTS `distributors`;

CREATE TABLE `distributors` (
  `distributor_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`distributor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000000003 DEFAULT CHARSET=latin1;

/*Data for the table `distributors` */

/*Table structure for table `latest_photos` */

DROP TABLE IF EXISTS `latest_photos`;

CREATE TABLE `latest_photos` (
  `latest_pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_id` int(11) DEFAULT NULL,
  `photo_filename` varchar(70) DEFAULT NULL,
  `date_taken` date DEFAULT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`latest_pic_id`),
  KEY `FK-latest_photos` (`outlet_id`),
  CONSTRAINT `FK-latest_photos` FOREIGN KEY (`outlet_id`) REFERENCES `outlet_info` (`outlet_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4;

/*Data for the table `latest_photos` */

/*Table structure for table `outlet_carried_sku` */

DROP TABLE IF EXISTS `outlet_carried_sku`;

CREATE TABLE `outlet_carried_sku` (
  `carried_sku_id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_id` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `sku_confec` varchar(30) DEFAULT NULL,
  `sku_biscuit` varchar(30) DEFAULT NULL,
  `sku_choco` varchar(30) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`carried_sku_id`),
  KEY `FK-outlet_carried_sku` (`outlet_id`),
  CONSTRAINT `FK-outlet_carried_sku` FOREIGN KEY (`outlet_id`) REFERENCES `outlet_info` (`outlet_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;

/*Data for the table `outlet_carried_sku` */

/*Table structure for table `outlet_info` */

DROP TABLE IF EXISTS `outlet_info`;

CREATE TABLE `outlet_info` (
  `outlet_id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_code` varchar(50) DEFAULT NULL,
  `cust_type` int(1) DEFAULT NULL,
  `distributor` int(4) DEFAULT NULL,
  `account` varchar(80) DEFAULT NULL,
  `outlet` varchar(80) DEFAULT NULL,
  `s_address` varchar(120) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `region` varbinary(30) DEFAULT NULL,
  `island_grp` int(2) DEFAULT NULL,
  `s_type` int(2) DEFAULT NULL,
  `discount` varchar(20) DEFAULT NULL,
  `dc_fee` decimal(11,2) DEFAULT NULL,
  `samp_fee` decimal(11,2) DEFAULT 0.00,
  `list_fee` decimal(11,2) DEFAULT 0.00,
  `pay_terms` varchar(30) DEFAULT NULL,
  `col_day` int(1) DEFAULT NULL,
  `po_acct` int(30) DEFAULT NULL,
  `no_coc` int(30) DEFAULT NULL,
  `d_status` varchar(30) DEFAULT NULL,
  `s_hours` varchar(30) DEFAULT NULL,
  `s_manager` varchar(80) DEFAULT NULL,
  `s_supervisor` varchar(80) DEFAULT NULL,
  `purch_name` varchar(80) DEFAULT NULL,
  `tel_no` varchar(30) DEFAULT NULL,
  `profpic_filename` varchar(70) DEFAULT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`outlet_id`),
  KEY `FK-distributor` (`distributor`),
  CONSTRAINT `FK-distributor` FOREIGN KEY (`distributor`) REFERENCES `distributors` (`distributor_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `outlet_info` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `sku` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) NOT NULL,
  `description` varchar(250) NOT NULL,
  `sub_category` varchar(30) NOT NULL,
  PRIMARY KEY (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=2147483648 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `roles` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`id`,`roles`) values (1,'Administrator'),(21,'user'),(22,'Supermarket'),(23,'Marketing');

/*Table structure for table `user_info` */

DROP TABLE IF EXISTS `user_info`;

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_roles` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `user_info` */

insert  into `user_info`(`user_id`,`user_name`,`user_password`,`user_roles`,`created_at`,`updated_at`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','Administrator',NULL,NULL),(13,'user','ee11cbb19052e40b07aac0ca060c23ee','user','2020-08-24','2020-08-24'),(14,'marketing','81dc9bdb52d04dc20036dbd8313ed055','Marketing','2022-04-30','2022-04-30'),(15,'supermarket','81dc9bdb52d04dc20036dbd8313ed055','Supermarket','2022-04-30','2022-04-30');

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` varchar(30) NOT NULL,
  `main_menu_id` int(11) NOT NULL,
  `sub_menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

/*Data for the table `user_roles` */

insert  into `user_roles`(`id`,`user_role`,`main_menu_id`,`sub_menu_id`) values (1,'Administrator',1,1),(2,'Administrator',1,2),(3,'Administrator',1,3),(45,'Administrator',2,4),(46,'user',2,4),(47,'Administrator',3,5),(48,'Administrator',2,6),(49,'Administrator',4,7),(50,'Supermarket',2,4),(51,'Marketing',2,4),(52,'Marketing',2,6),(53,'Marketing',3,5),(54,'Marketing',4,7);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
