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
/*Table structure for table `m_pekerjaan` */

CREATE TABLE `m_pekerjaan` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `PEKERJAAN` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `m_pekerjaan` */

insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (1,'Belum/Tidak Bekerja');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (2,'Mengurus Rumah Tangga');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (3,'Pelajar/Mahasiswa');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (4,'Pensiunan');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (5,'Pegawai Negeri Sipil (PNS)');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (6,'Tentara Nasional Indonesia');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (7,'Kepolisian RI');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (8,'Perdagangan');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (9,'Petani/Pekebun');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (10,'Peternak');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (11,'Nelayan/Perikanan');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (12,'Industri');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (13,'Konstruksi');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (14,'Transportasi');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (15,'Karyawan Swasta');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (16,'Karyawan BUMN');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (17,'Karyawan BUMD');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (18,'Karyawan Honorer');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (19,'Buruh Harian Lepas');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (20,'Buruh Tani/Perkebunan');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (21,'Buruh Nelayan/Perikanan');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (22,'Buruh Peternakan');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (23,'Pembantu Rumah Tangga');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (24,'Tukang Cukur');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (25,'Tukang Listrik');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (26,'Tukang Batu');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (27,'Tukang Kayu');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (28,'Tukang Sol Sepatu');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (29,'Tukang Las/Pandai Besi');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (30,'Tukang Jahit');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (31,'Tukang Gigi');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (32,'Penata Rias');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (33,'Penata Busana');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (34,'Penata Rambut');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (35,'Mekanik');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (36,'Seniman');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (37,'Tabib');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (38,'Paraji');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (39,'Perancang Busana');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (40,'Penterjemah');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (41,'Imam Mesjid');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (42,'Pendeta');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (43,'Pastor');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (44,'Wartawan');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (45,'Ustadz/Mubaligh');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (46,'Juru Masak');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (47,'Promotor Acara');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (48,'Anggota DPR-RI');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (49,'Anggota DPD');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (50,'Anggota BPK');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (51,'Presiden');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (52,'Wakil Presiden');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (53,'Anggota Mahkamah Konstitusi');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (54,'Anggota Kabinet/Kementerian');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (55,'Duta Besar');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (56,'Gubernur');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (57,'Wakil Gubernur');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (58,'Bupati');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (59,'Wakil Bupati');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (60,'Walikota');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (61,'Wakil Walikota');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (62,'Anggota DPRD Provinsi');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (63,'Anggota DPRD Kabupaten/Kota');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (64,'Dosen');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (65,'Guru');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (66,'Pilot');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (67,'Pengacara');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (68,'Notaris');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (69,'Arsitek');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (70,'Akuntan');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (71,'Konsultan');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (72,'Dokter');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (73,'Bidan');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (74,'Perawat');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (75,'Apoteker');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (76,'Psikiater/Psikolog');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (77,'Penyiar Televisi');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (78,'Penyiar Radio');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (79,'Pelaut');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (80,'Peneliti');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (81,'Sopir');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (82,'Pialang');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (83,'Paranormal');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (84,'Pedagang');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (85,'Perangkat Desa');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (86,'Kepala Desa');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (87,'Biarawati');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (88,'Wiraswasta');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (89,'Lainnya');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (90,'Anggota DPRD');
insert  into `m_pekerjaan`(`ID`,`PEKERJAAN`) values (91,'Mubalig');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
