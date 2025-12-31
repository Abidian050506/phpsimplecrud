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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_customer` */

insert  into `tb_customer`(`id_cstmr`,`ktp_cstmr`,`nama_cstmr`,`alamat`,`telp`,`email`,`mobil`,`tgl_sewa`,`tgl_kembali`,`status_pembayaran`) values 
(64,'245920140002','Naufal Putra Abidian','jalan tukad batanghari','082259245675','abidiannaufal450@gmail.com','DK 0002 EB','2025-12-30','2025-12-31',3),
(67,'1','I Gede Dena Yaspita Adi Putra','1','123','lel@gmail.com','PA 0003 AB','0001-11-11','0011-11-11',3);

/*Table structure for table `tb_mobil` */

DROP TABLE IF EXISTS `tb_mobil`;

CREATE TABLE `tb_mobil` (
  `kode_mobil` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mobil` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_mobil` double(17,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`kode_mobil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_mobil` */

insert  into `tb_mobil`(`kode_mobil`,`nama_mobil`,`harga_mobil`) values 
('B 0006 MN','Hiace',1000000.00),
('DK 0002 EB','Xenia',1000000.00),
('DR 0001 EA','Avanza',1000000.00),
('DR 5617 EI','Celerio',1000000.00),
('EA 0005 OP','Jazz',1000000.00),
('H 0004 UI','Brio',1000000.00),
('MR 0008 YY','Fortuner',1000000.00),
('NN 0007 BM','Grand Max',1000000.00),
('PA 0003 AB','Xpander',1000000.00),
('ST 0009 PP','Pajero Sport',1000000.00);

/*Table structure for table `tb_transaksi` */

DROP TABLE IF EXISTS `tb_transaksi`;

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int NOT NULL AUTO_INCREMENT,
  `id_cstmr` int NOT NULL,
  `kode_mobil` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `harga_mobil` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `kode_mobil` (`kode_mobil`),
  KEY `id_cstmr` (`id_cstmr`),
  CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`kode_mobil`) REFERENCES `tb_mobil` (`kode_mobil`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_transaksi` */

insert  into `tb_transaksi`(`id_transaksi`,`id_cstmr`,`kode_mobil`,`tgl_sewa`,`tgl_kembali`,`harga_mobil`) values 
(7,67,'PA 0003 AB','0001-11-11','0011-11-11','1000000.00');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint DEFAULT '0',
  `created_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`nama_user`,`email`,`no_telp`,`password`,`role`,`created_time`) values 
(1,'pal','abidian@gmail.com','111','$2y$10$wE5m9nR9lJv6s7J0m6xN3u6o8g9Q9R2sQ0r2BfY5p9oYy2m5o1s1e',0,'2025-12-24 09:57:00'),
(2,'nopal','abidiannaufal450@gmail.com','087846284634','$2y$10$oC.J3XziKSLyNEzbDcJVJu5Wbm9MvCFXssI.qMTfq2SXnxMKCzl.i',0,'2025-12-24 12:58:57'),
(3,'jawa','longor@gmail.com','123','$2y$10$3S8sc7Xl0PPWg31DAXgq7e/soIvygQ/YDsdo5G3RccCV/Lu9I1PVi',0,'2025-12-27 16:01:56');

/* Trigger structure for table `tb_customer` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `after_insert_customer_transaksi` */$$

/*!50003 CREATE */ /*!50003 TRIGGER `after_insert_customer_transaksi` AFTER INSERT ON `tb_customer` FOR EACH ROW BEGIN
	INSERT INTO tb_transaksi
        (id_cstmr, kode_mobil, tgl_sewa, tgl_kembali, harga_mobil)
    SELECT
        NEW.id_cstmr,
        NEW.mobil,
        NEW.tgl_sewa,
        NEW.tgl_kembali,
        m.harga_mobil
    FROM tb_mobil m
    WHERE m.kode_mobil = NEW.mobil;
    END */$$


DELIMITER ;

/* Trigger structure for table `tb_customer` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `after_update_customer_transaksi` */$$

/*!50003 CREATE */ /*!50003 TRIGGER `after_update_customer_transaksi` AFTER UPDATE ON `tb_customer` FOR EACH ROW BEGIN
	UPDATE tb_transaksi t
    JOIN tb_mobil m ON m.kode_mobil = NEW.mobil
    SET
        t.kode_mobil   = NEW.mobil,
        t.tgl_sewa     = NEW.tgl_sewa,
        t.tgl_kembali  = NEW.tgl_kembali,
        t.harga_mobil  = m.harga_mobil
    WHERE t.id_cstmr = NEW.id_cstmr;
    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
