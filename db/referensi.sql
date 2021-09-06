/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.20 : Database - ci4login
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `m_referensi` */

CREATE TABLE `m_referensi` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `REFERENSI` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `m_referensi` */

insert  into `m_referensi`(`ID`,`REFERENSI`) values (1,'AGAMA');
insert  into `m_referensi`(`ID`,`REFERENSI`) values (2,'PEKERJAAN');
insert  into `m_referensi`(`ID`,`REFERENSI`) values (3,'PENDIDIKAN');
insert  into `m_referensi`(`ID`,`REFERENSI`) values (4,'TEST');
insert  into `m_referensi`(`ID`,`REFERENSI`) values (6,'SDFSDF');
insert  into `m_referensi`(`ID`,`REFERENSI`) values (9,'INI REFdfsdf');

/*Table structure for table `m_referensi_detail` */

CREATE TABLE `m_referensi_detail` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_REFERENSI` smallint DEFAULT NULL,
  `DESKRIPSI` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `m_referensi_detail` */

insert  into `m_referensi_detail`(`ID`,`ID_REFERENSI`,`DESKRIPSI`) values (1,1,'ISLAM');
insert  into `m_referensi_detail`(`ID`,`ID_REFERENSI`,`DESKRIPSI`) values (2,1,'KRISTEN');
insert  into `m_referensi_detail`(`ID`,`ID_REFERENSI`,`DESKRIPSI`) values (3,1,'PROTESTAN');
insert  into `m_referensi_detail`(`ID`,`ID_REFERENSI`,`DESKRIPSI`) values (4,NULL,NULL);
insert  into `m_referensi_detail`(`ID`,`ID_REFERENSI`,`DESKRIPSI`) values (5,NULL,NULL);
insert  into `m_referensi_detail`(`ID`,`ID_REFERENSI`,`DESKRIPSI`) values (6,NULL,NULL);
insert  into `m_referensi_detail`(`ID`,`ID_REFERENSI`,`DESKRIPSI`) values (7,NULL,NULL);
insert  into `m_referensi_detail`(`ID`,`ID_REFERENSI`,`DESKRIPSI`) values (8,NULL,NULL);
insert  into `m_referensi_detail`(`ID`,`ID_REFERENSI`,`DESKRIPSI`) values (9,NULL,'prosetan');
insert  into `m_referensi_detail`(`ID`,`ID_REFERENSI`,`DESKRIPSI`) values (10,NULL,'PROSETAN');
insert  into `m_referensi_detail`(`ID`,`ID_REFERENSI`,`DESKRIPSI`) values (11,NULL,'sdfsd');
insert  into `m_referensi_detail`(`ID`,`ID_REFERENSI`,`DESKRIPSI`) values (12,1,'SDFAF');
insert  into `m_referensi_detail`(`ID`,`ID_REFERENSI`,`DESKRIPSI`) values (13,1,'dfsdf');
insert  into `m_referensi_detail`(`ID`,`ID_REFERENSI`,`DESKRIPSI`) values (14,1,'sdfdsf');
insert  into `m_referensi_detail`(`ID`,`ID_REFERENSI`,`DESKRIPSI`) values (15,1,'sdfdsfsdfsdf');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
