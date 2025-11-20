/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - db_simplecrud
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_simplecrud` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_simplecrud`;

/*Table structure for table `tb_customer` */

DROP TABLE IF EXISTS `tb_customer`;

CREATE TABLE `tb_customer` (
  `id_cstmr` int NOT NULL AUTO_INCREMENT,
  `ktp_cstmr` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `nama_cstmr` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobil` char(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status_pembayaran` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_cstmr`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_customer` */

insert  into `tb_customer`(`id_cstmr`,`ktp_cstmr`,`nama_cstmr`,`alamat`,`telp`,`email`,`mobil`,`tgl_sewa`,`tgl_kembali`,`status_pembayaran`) values 
(19,'245920140003','Nopal','Denpasar','0812309876','Arwi@gmail.com','DR 0001 EA','2000-03-12','3000-03-12',1),
(20,'245920140058','Made Paramasura','kupang','087784078923','longor@gmail.com','ST 0009 PP','0007-06-04','0007-06-07',1),
(21,'123450987','I Gede Dena Yaspita Adi Putra','Batanghari','09876598','gededena@gmail.com','PA 0003 AB','0006-05-12','0567-04-23',2);

/*Table structure for table `tb_mobil` */

DROP TABLE IF EXISTS `tb_mobil`;

CREATE TABLE `tb_mobil` (
  `kode_mobil` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mobil` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`kode_mobil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_mobil` */

insert  into `tb_mobil`(`kode_mobil`,`nama_mobil`) values 
('B 0006 MN','Hiace'),
('DK 0002 EB','Xenia'),
('DR 0001 EA','Avanza'),
('DR 5617 EI','Celerio'),
('EA 0005 OP','Jazz'),
('H 0004 UI','Brio'),
('MR 0008 YY','Fortuner'),
('NN 0007 BM','Grand Max'),
('PA 0003 AB','Xpander'),
('ST 0009 PP','Pajero Sport');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
