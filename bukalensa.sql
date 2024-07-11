/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.5-10.1.16-MariaDB : Database - bukalensa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bukalensa` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bukalensa`;

/*Table structure for table `komen` */

DROP TABLE IF EXISTS `komen`;

CREATE TABLE `komen` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_usaha` varchar(50) DEFAULT NULL,
  `id_pengguna` varchar(50) DEFAULT NULL,
  `komen` text,
  `rating` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `komen` */

insert  into `komen`(`id`,`id_usaha`,`id_pengguna`,`komen`,`rating`) values (1,'WellyFotografi','april','Terimakasih sudah melayani saya dengan baik',1),(2,'WellyFotografi','april','Terimakasih sudah melayani saya dengan ramah',5),(3,'WellyFotografi','Himmy','Terimakasih sudah melayani saya dengan baik',2),(4,'Bagus Fotografi Kediri','Himmy','Terimakasih sudah melayani saya dengan ramah\r\n',1),(5,'Bagus Fotografi Kediri','Himmy','Terimakasih sudah melayani saya dengan ramah',1),(6,'Bagus Fotografi Kediri','Himmy','Terimakasih sudah melayani saya dengan baik',0),(7,'Bagus Fotografi Kediri','Himmy','Terimakasih sudah melayani saya dengan nyaman',3),(8,'Bagus Fotografi Kediri','Himmy','Terimakasih sudah melayani saya dengan ramah',5),(9,'Bagus Fotografi Kediri','bambang','Pnedapat bu Elyya',4);

/*Table structure for table `kota` */

DROP TABLE IF EXISTS `kota`;

CREATE TABLE `kota` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

/*Data for the table `kota` */

insert  into `kota`(`id`,`nama_kota`) values (1,'KEDIRI'),(2,'JOMBANG'),(3,'MALANG'),(4,'JOGJAKARTA'),(5,'TULUNGAGUNG'),(6,'SURABAYA'),(7,'BANDUNG'),(8,'MADIUN'),(9,'MOJOKERTO'),(10,'BLITAR'),(11,'PASURUAN'),(12,'PROBOLINGGO'),(13,'PACITAN'),(14,'PONOROGO'),(15,'TRENGGALEK'),(16,'JEMBER'),(17,'BANYUWANGI'),(18,'SITUBONDO'),(19,'PASURUAN'),(20,'SIDOARJO'),(21,'MAGETAN'),(22,'NGAWI'),(23,'BOJONEGORO'),(24,'TUBAN'),(25,'LAMONGAN'),(26,'GRESIK'),(27,'BANGKALAN'),(28,'SAMPANG'),(29,'PAMEKASAN'),(30,'BATU'),(31,'CILACAP'),(32,'BANYUMAS'),(33,'PURBALINGGA'),(34,'BANJARNEGARA'),(35,'KEBUMEN'),(36,'PURWOREJO'),(37,'WONOSOBO'),(38,'MAGELANG'),(39,'BOYOLALI'),(40,'KLATEN'),(41,'SUKOHARJO'),(42,'WONOGIRI'),(43,'KARANGANYAR'),(44,'SRAGEN'),(45,'GROBOGAN'),(46,'BLORA'),(47,'REMBANG'),(48,'PATI'),(49,'KUDUS'),(50,'JEPARA'),(51,'DEMAK'),(52,'SEMARANG'),(53,'TEMANGGUNG'),(54,'KENDAL'),(55,'BATANG'),(56,'PEKALONGAN'),(57,'PEMALANG'),(58,'TEGAL'),(59,'BREBES'),(60,'MAGELANG'),(61,'SURAKARTA'),(62,'SALATIGA'),(63,'SEMARANG'),(64,'BOGOR'),(65,'SUKABUMI'),(66,'CIANJUR'),(67,'GARUT'),(68,'TASIKMALAYA'),(69,'CIAMIS'),(70,'KUNINGAN'),(71,'CIREBON'),(72,'MAJALENGKA'),(73,'SUMEDANG'),(74,'INDRAMAYU'),(75,'SUBANG'),(76,'PURWAKARTA'),(77,'KARAWANG'),(78,'BEKASI'),(79,'BANDUNG BARAT'),(80,'PANGANDARAN'),(81,'BOGOR'),(82,'SUKABUMI'),(83,'DEPOK'),(84,'CIMAHI'),(85,'BANJAR'),(86,'KEDIRI');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `paket` */

DROP TABLE IF EXISTS `paket`;

CREATE TABLE `paket` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_usaha` varchar(255) DEFAULT NULL,
  `nama_paket` varchar(255) DEFAULT NULL,
  `harga` int(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `paket` */

insert  into `paket`(`id`,`id_usaha`,`nama_paket`,`harga`,`deskripsi`,`created_at`,`updated_at`) values (4,'9','Liburan irit',500000,'1 Hari kerja dan 200x Foto',NULL,NULL),(5,'9','Liburan nyaman',1000000,'3 Hari Kerja dan 400x Foto',NULL,NULL),(6,'9','Liburan panjang',2000000,'7 Hari Kerja dan 1400x Foto',NULL,NULL),(7,'10','Wisata anak',600000,'250x Foto dan 1 Hari kerja',NULL,NULL),(8,'10','Wisata keluarga',1000000,'500x foto 3 hari kerja',NULL,NULL),(9,'10','Wisata perusahaan/sekolah',2000000,'1000x foto 7 hari kerja',NULL,NULL),(10,'Bagus Fotografi',NULL,500000,'AA',NULL,NULL),(11,'Bagus Fotografi','COBA 2',50000000,'ASASA',NULL,NULL),(12,'9','coba 3',7000000,'DEWA',NULL,NULL),(13,'12','Liburan iri',2000000,'gg',NULL,NULL),(14,'13','Liburan irit',500000,'coba',NULL,NULL),(15,'11','suka suka',750000,'suka suka gue',NULL,NULL),(16,'11','hore',1100000,'hore hore bergembira',NULL,NULL),(17,'17','Siti liburan',500000,'20x Foto',NULL,NULL),(18,'17','Siti jalan-jalan',1000000,'40x Foto',NULL,NULL),(19,'17','Siti Having Fun',1500000,'100x Foto',NULL,NULL);

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `id_pengguna` int(12) NOT NULL AUTO_INCREMENT,
  `id_level` int(12) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `kota_asal` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `pengguna` */

insert  into `pengguna`(`id_pengguna`,`id_level`,`nama`,`kota_asal`,`username`,`password`,`created_at`,`updated_at`) values (1,1,'furqon','Kediri','furqon@gmail.com','$2y$10$OvD2wvXd4Wh2IIZcq9pQZe/u8NMxBYylCDyghey223wtPSapz7X6O','2019-05-20 16:00:41','2019-05-20 16:00:41'),(2,2,'Bagus','Kediri','bagus@gmail.com','$2y$10$0MvII88CeBywYuWJFFRiEOCKiurmjuCjddifvJCXOMCeya./eGksO','2019-05-28 08:39:40','2019-05-28 08:39:40'),(3,3,'Himmy','Malang','himmy@gmail.com','$2y$10$kwIeZHh6ud.Sh96W16DaVuMG4B7cuDd3L9toS4sv8K1mVU3asH/u.','2019-05-28 08:40:37','2019-05-28 08:40:37'),(4,2,'Welly','Kediri','welly@gmail.com','$2y$10$0MvII88CeBywYuWJFFRiEOCKiurmjuCjddifvJCXOMCeya./eGksO','2019-05-28 08:40:37','2019-05-28 08:40:37'),(5,2,'Reza','Kediri','reza@gmail.com','$2y$10$0MvII88CeBywYuWJFFRiEOCKiurmjuCjddifvJCXOMCeya./eGksO',NULL,NULL),(6,3,'Avin','Malang','avin@gmail.com','$2y$10$0MvII88CeBywYuWJFFRiEOCKiurmjuCjddifvJCXOMCeya./eGksO',NULL,NULL),(7,3,'Aditya','Batam','aditya@gmail.com','aditya',NULL,NULL),(8,2,'pelapak','Kediri','pelapak@gmail.com','$2y$10$c8aC3av8j23kxazyrON8f.PP1jBNhSACwnb1praQL202EpBJVQFFS','2019-06-05 14:25:15','2019-06-05 14:25:15'),(9,2,'pelapak2','Malang','pelapak2@gmail.com','$2y$10$O9JE6WAivzA4MpN65.pSCe72Y8yu9cRWmWay3tBHWcSx.DVGUweIC','2019-06-10 20:15:00','2019-06-10 20:15:00'),(10,3,'Yona','Kediri','yona@gmail.con','$2y$10$0aGyQuOyIaYS8rUOshBYdeW3b4A.p5w17lMnBidu9ASOGq/hfbOXi','2019-06-11 13:03:16','2019-06-11 13:03:16'),(11,2,'siti','Kediri','siti@gmail.com','$2y$10$nuiTmTrcrkPZhf37nehFzuD.PIs/0cCt2SYDeBN2X9OsKIRinHK5K','2019-06-12 03:47:12','2019-06-12 03:47:12'),(16,3,'herry','Kediri','herry@gmail.com','$2y$10$.6sfyFfGDC2chsa1Jy0ScOMZgJjehDw4ri8LJsH6MKyxVMrhknpea','2019-06-12 05:43:14','2019-06-12 05:43:14'),(18,3,'yuda','Kediri','yuda@gmail.com','$2y$10$cwm3Ar6WMd.enUSvDUM7VOiZmtK.1T6N0rcal21Z7zDMFwtmhHZ5m','2019-06-12 06:42:17','2019-06-12 06:42:17'),(19,2,'didit','Kediri','didit@gmail.com','$2y$10$CZgCyJ1lCtHtmSPaNUyLDOYilleIUcuoEgBSdRplRy6JonlMj6xTm','2019-06-12 08:39:59','2019-06-12 08:39:59'),(20,3,'bambang','Kediri','bambang@gmail.com','$2y$10$jV60XErcwutruY4ypMKeRuIShD8S8.c8lRlok1J0OIhVLwUemm/wi','2019-06-12 08:40:53','2019-06-12 08:40:53');

/*Table structure for table `saldo` */

DROP TABLE IF EXISTS `saldo`;

CREATE TABLE `saldo` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(12) DEFAULT NULL,
  `total` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `saldo` */

insert  into `saldo`(`id`,`id_pengguna`,`total`) values (1,3,4850000),(2,2,16300000),(5,4,5720000),(6,5,5000000),(7,6,4460000),(8,7,5000000),(9,10,500000),(10,18,0),(11,19,0),(12,20,-680000);

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `status` */

insert  into `status`(`id`,`status`) values (1,'Proses'),(2,'Batal'),(3,'Selesai');

/*Table structure for table `top_up` */

DROP TABLE IF EXISTS `top_up`;

CREATE TABLE `top_up` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `id_pengguna` int(12) DEFAULT NULL,
  `pembayaran` varchar(255) DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `top_up` */

insert  into `top_up`(`id`,`tanggal`,`id_pengguna`,`pembayaran`,`kode`,`jumlah`) values (27,'2019-06-10',2,'Alfamart','1373610306','1.500.000,00'),(28,'2019-06-10',2,'Indomaret','1373610306','1.000.000,00'),(29,'2019-06-10',2,'Indomaret','1373610306','1.000.000,00'),(30,'2019-06-10',2,'Bank BNI','1373610306','1.500.000,00'),(31,'2019-06-10',2,'Bank BNI','1373610306','1.500.000,00'),(32,'2019-06-10',2,'Bank BNI','667675285','1.500.000,00'),(33,'2019-06-10',2,'Bank BRI','904853921','500.000,00'),(34,'2019-06-10',2,'Indomaret','Bagus','2.000.000,00'),(35,'2019-06-11',9,'Indomaret','378481591','100000000'),(36,'2019-06-11',9,'Alfamart','1767310394','1500000'),(37,'2019-06-11',2,'Bank BRI','192619423','5000000'),(38,'2019-06-11',3,'Indomaret','186343439','1000000'),(39,'2019-06-11',10,'Indomaret','2142777227','500000'),(40,'2019-06-12',20,'Indomaret','936414142','500000');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_transaksi` int(12) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` varchar(50) DEFAULT NULL,
  `tanggal_pesan` date DEFAULT NULL,
  `id_pelapak` int(12) DEFAULT NULL,
  `id_usaha` varchar(50) DEFAULT NULL,
  `tanggal_hunting` date DEFAULT NULL,
  `deskripsi` text,
  `paket` int(12) DEFAULT NULL,
  `harga` int(255) DEFAULT NULL,
  `status` enum('1','2','3') DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_pelanggan` (`id_pelanggan`),
  KEY `id_pelapak` (`id_pelapak`),
  KEY `id_usaha` (`id_usaha`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id_transaksi`,`id_pelanggan`,`tanggal_pesan`,`id_pelapak`,`id_usaha`,`tanggal_hunting`,`deskripsi`,`paket`,`harga`,`status`) values (1,'Himmy','2019-05-28',2,'Bagus Fotografi','2019-05-30','Ayok Hunting',5,1000000,'2'),(2,'Himmy','2019-05-29',2,'Bagus Fotografi','2019-05-31','MAS TOLONG FOTO YANG BAGUS',4,500000,'3'),(3,'Himmy','2019-05-29',2,'Bagus Fotografi','2019-05-31','aaaaa',6,2000000,'3'),(4,'Reza','2019-05-29',2,'Bagus Fotografi','2019-05-31','aasas',5,300000,'3'),(12,'Himmy','2019-06-02',2,'Bagus Fotografi','2019-06-29','AAAA',5,37037033,'3'),(13,'Himmy','2019-06-02',4,'WellyFotografi','2019-07-24','welly',7,600000,'3'),(15,'Himmy','2019-06-11',2,'Bagus Fotografi Kediri','2019-06-19','mas tolong/...',4,500000,'3'),(16,'Himmy','2019-06-11',5,'RezaFotografi','2019-06-29','MAS TOLONG ES TEH',15,225000,'3'),(17,'Himmy','2019-06-11',5,'RezaFotografi','2019-06-29','mas pesen es teh 2',15,225000,'3'),(18,'Himmy','2019-06-11',2,'Bagus Fotografi Kediri','2019-06-29','YONA',4,1666667,'3'),(19,'Himmy','2019-06-12',11,'SITI FOTOGRAFI','2019-06-29','coba',17,150000,'3'),(20,'Avin','2019-06-12',2,'Bagus Fotografi Kediri','2019-06-29','aaaa',5,300000,'3'),(21,'Avin','2019-06-12',4,'WellyFotografi','2019-06-14','asasas',8,300000,'3'),(22,'Avin','2019-06-12',11,'SITI FOTOGRAFI','2019-06-26','COBA',18,300000,'3'),(23,'Avin','2019-06-12',4,'WellyFotografi','2019-06-25','yona 2',7,180000,'2'),(24,'bambang','2019-06-12',2,'Bagus Fotografi Kediri','2019-06-05','bu ellya',5,300000,'2'),(25,'bambang','2019-06-12',2,'Bagus Fotografi Kediri','2019-06-14','Pesanan Bu ellya',5,1000000,'3'),(26,'bambang','2019-06-12',4,'WellyFotografi','2019-06-20','Pesanan kedua Bu Ellya',7,180000,'1');

/*Table structure for table `upload` */

DROP TABLE IF EXISTS `upload`;

CREATE TABLE `upload` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_trx` int(12) DEFAULT NULL,
  `id_usaha` varchar(50) DEFAULT NULL,
  `id_pelanggan` varchar(50) DEFAULT NULL,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `foto4` varchar(255) DEFAULT NULL,
  `foto5` varchar(255) DEFAULT NULL,
  `foto6` varchar(255) DEFAULT NULL,
  `foto7` varchar(255) DEFAULT NULL,
  `foto8` varchar(255) DEFAULT NULL,
  `foto9` varchar(255) DEFAULT NULL,
  `foto10` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `upload` */

insert  into `upload`(`id`,`id_trx`,`id_usaha`,`id_pelanggan`,`foto1`,`foto2`,`foto3`,`foto4`,`foto5`,`foto6`,`foto7`,`foto8`,`foto9`,`foto10`) values (8,12,'Bagus Fotografi','Himmy','878420204.jpg','294771065.jpg','43538507.jpg','43538507.jpg',NULL,NULL,NULL,NULL,NULL,NULL),(9,12,'Bagus Fotografi','Himmy','294771065.jpg','294771065.jpg','294771065.jpg','294771065.jpg',NULL,NULL,NULL,NULL,NULL,NULL),(10,4,'Bagus Fotografi','Reza','43538507.jpg','120620604.jpg','265201010.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,15,'Bagus Fotografi Kediri','Himmy','445192467.jpg','946454645.jpg','186593096.jpg','958848071.jpg',NULL,NULL,NULL,NULL,NULL,NULL),(12,12,'Bagus Fotografi','Himmy','914568405.png','620069307.jpg','924602827.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,22,'SITI FOTOGRAFI','Avin','559330791.jpg','377521791.jpg','672260248.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,23,'WellyFotografi','Avin','68722765.jpg','105988747.jpg','478702284.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,25,'Bagus Fotografi Kediri','bambang','986675572.jpg','201272058.jpg','847647127.jpg','281034226.jpg',NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `usaha` */

DROP TABLE IF EXISTS `usaha`;

CREATE TABLE `usaha` (
  `id_usaha` int(12) NOT NULL AUTO_INCREMENT,
  `id_pelapak` int(12) DEFAULT NULL,
  `id_paket` int(12) DEFAULT NULL,
  `nama_usaha` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `foto1` varchar(50) DEFAULT NULL,
  `foto2` varchar(50) DEFAULT NULL,
  `foto3` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id_usaha`),
  KEY `id_pelapak` (`id_pelapak`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `usaha` */

insert  into `usaha`(`id_usaha`,`id_pelapak`,`id_paket`,`nama_usaha`,`kota`,`foto1`,`foto2`,`foto3`,`deskripsi`) values (9,2,9,'Bagus Fotografi Kediri','Kediri','55228998.jpg','700591398.jpg','68408755.jpg','Bagus Fotografi adalah usaha yang berdiri pada tanggal 27 Desembr 2017. Usaha ini didirikan oleh Bagus Hadi Prabowo, kepuasan customer adalah hal utama bagi kami. Silahkan pesan dan mari bersenang-senang'),(10,4,10,'WellyFotografi','Malang','190181524.jpg','510969652.jpg','797723536.jpg','Welly Fotografi adalah usaha yang berdiri pada tanggal 27 Desembr 2017. Usaha ini didirikan oleh Bagus Hadi Prabowo, kepuasan customer adalah hal utama bagi kami. Silahkan pesan dan mari bersenang-senang'),(11,5,11,'RezaFotografi','Jogjakarta','129364435.jpg','245555193.jpg','751371114.jpg','Reza Fotografi adalah usaha yang berdiri pada tanggal 27 Desembr 2017. Usaha ini didirikan oleh Bagus Hadi Prabowo, kepuasan customer adalah hal utama bagi kami. Silahkan pesan dan mari bersenang-senang'),(17,11,17,'SITI FOTOGRAFI','KEDIRI','539843235.jpg','956163222.jpg','751371114.jpg','siti'),(20,19,NULL,'DIDIT FOTOGAFI','17','374656552.jpg','972568380.jpg','347615682.jpg','DIDIT COBA FOTOGRAFI'),(21,19,NULL,'DIDIT 2','23','87828225.jpg','736601986.jpg','878319871.jpg','COBA SAJA');

/*Table structure for table `user_level` */

DROP TABLE IF EXISTS `user_level`;

CREATE TABLE `user_level` (
  `ID` int(12) NOT NULL,
  `level` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_level` */

insert  into `user_level`(`ID`,`level`) values (1,'admin'),(2,'pelapak'),(3,'pelanggan');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*Table structure for table `wisata` */

DROP TABLE IF EXISTS `wisata`;

CREATE TABLE `wisata` (
  `id_wisata` int(12) NOT NULL AUTO_INCREMENT,
  `id_kota` int(12) DEFAULT NULL,
  `nama_wisata` varbinary(255) DEFAULT NULL,
  PRIMARY KEY (`id_wisata`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `wisata` */

insert  into `wisata`(`id_wisata`,`id_kota`,`nama_wisata`) values (1,1,'GUNUNG KELUD'),(2,1,'GUNUNG KLOTOK'),(4,1,'gumul'),(5,1,'DHOLO'),(6,7,'SAUNG ANGKLUNG UDJO'),(7,4,'TEBING BREKSI'),(8,4,'PRAMBANAN'),(9,3,'JATIM PARK 3');

/* Trigger structure for table `pengguna` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tambahsaldo` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tambahsaldo` AFTER INSERT ON `pengguna` FOR EACH ROW insert into saldo VALUES('AUTO_INCREMENT',new.id_pengguna,'0') */$$


DELIMITER ;

/*Table structure for table `wisatakota` */

DROP TABLE IF EXISTS `wisatakota`;

/*!50001 DROP VIEW IF EXISTS `wisatakota` */;
/*!50001 DROP TABLE IF EXISTS `wisatakota` */;

/*!50001 CREATE TABLE  `wisatakota`(
 `id_wisata` int(12) ,
 `id_kota` int(12) ,
 `nama_wisata` varbinary(255) ,
 `id` int(12) ,
 `nama_kota` varchar(255) 
)*/;

/*View structure for view wisatakota */

/*!50001 DROP TABLE IF EXISTS `wisatakota` */;
/*!50001 DROP VIEW IF EXISTS `wisatakota` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `wisatakota` AS (select `w`.`id_wisata` AS `id_wisata`,`w`.`id_kota` AS `id_kota`,`w`.`nama_wisata` AS `nama_wisata`,`k`.`id` AS `id`,`k`.`nama_kota` AS `nama_kota` from (`wisata` `w` join `kota` `k` on((`k`.`id` = `w`.`id_kota`)))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
