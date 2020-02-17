# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.40)
# Database: igo
# Generation Time: 2020-02-17 09:46:31 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table buddy
# ------------------------------------------------------------

DROP TABLE IF EXISTS `buddy`;

CREATE TABLE `buddy` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `buddy_id` int(11) NOT NULL,
  `traveller_id` int(11) DEFAULT NULL,
  `cart_id` smallint(3) NOT NULL,
  `status` smallint(3) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table cart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `buddy_id` int(11) DEFAULT NULL,
  `payment_id` varchar(17) DEFAULT NULL,
  `service_id` int(11) NOT NULL,
  `service_title` varchar(123) NOT NULL DEFAULT '',
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `pax` smallint(2) DEFAULT NULL,
  `male` smallint(3) DEFAULT NULL,
  `female` smallint(3) DEFAULT NULL,
  `infant` smallint(3) DEFAULT NULL,
  `pickup_location` varchar(321) DEFAULT NULL,
  `specific_place` varchar(321) DEFAULT NULL,
  `duration` double(6,2) NOT NULL,
  `charge` double(8,2) unsigned NOT NULL,
  `date` int(12) NOT NULL,
  `start_time` int(12) NOT NULL,
  `end_time` int(12) NOT NULL,
  `status` smallint(2) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;

INSERT INTO `cart` (`id`, `user_id`, `buddy_id`, `payment_id`, `service_id`, `service_title`, `country_id`, `state_id`, `pax`, `male`, `female`, `infant`, `pickup_location`, `specific_place`, `duration`, `charge`, `date`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`)
VALUES
	(1,1,NULL,NULL,4,'Batik chanting experience',1,1,NULL,NULL,NULL,NULL,NULL,NULL,6.50,318.50,1562860800,1562875200,1562898600,0,1562343267,1562343267),
	(2,1,NULL,NULL,2,'Local cuisine incl. street hawker food',1,2,NULL,NULL,NULL,NULL,NULL,NULL,3.00,147.00,1563465600,1563480000,1563490800,0,1562343622,1562343622),
	(3,1,NULL,NULL,1,'Historical Place',1,3,NULL,NULL,NULL,NULL,NULL,NULL,3.00,147.00,1562774400,1562781600,1562792400,0,1562343987,1562343987),
	(4,1,NULL,NULL,3,'Night-life',1,4,NULL,NULL,NULL,NULL,NULL,NULL,12.50,612.50,1562774400,1562779800,1562824800,0,1562568165,1562568165),
	(5,1,NULL,NULL,1,'Historical Place',1,5,NULL,NULL,NULL,NULL,NULL,NULL,8.00,392.00,1562688000,1562693400,1562722200,0,1562629647,1562629647),
	(6,1,NULL,NULL,2,'Local cuisine incl. street hawker food',1,6,NULL,NULL,NULL,NULL,NULL,NULL,7.50,367.50,1562688000,1562693400,1562720400,0,1562630252,1562630252),
	(7,1,NULL,NULL,1,'Historical Place',1,7,NULL,NULL,NULL,NULL,NULL,NULL,7.50,367.50,1562688000,1562695200,1562722200,0,1562630382,1562630382),
	(8,1,NULL,NULL,1,'Historical Place',1,8,NULL,NULL,NULL,NULL,NULL,NULL,7.50,367.50,1562688000,1562695200,1562722200,0,1562630445,1562630445),
	(9,1,NULL,NULL,1,'Historical Place',1,9,NULL,NULL,NULL,NULL,NULL,NULL,7.50,367.50,1562688000,1562695200,1562722200,0,1562630729,1562630729),
	(10,1,NULL,NULL,5,'Halal travel (place, food, etc)',1,15,NULL,NULL,NULL,NULL,NULL,NULL,18.50,906.50,1562774400,1562781600,1562848200,0,NULL,NULL),
	(11,1,NULL,NULL,5,'Halal travel (place, food, etc)',1,15,NULL,NULL,NULL,NULL,NULL,NULL,17.50,857.50,1562688000,1562697000,1562760000,0,NULL,NULL),
	(12,2,NULL,NULL,1,'Historical Place',1,3,NULL,NULL,NULL,NULL,NULL,NULL,19.50,955.50,1562688000,1562697000,1562767200,0,NULL,NULL),
	(13,1,NULL,NULL,4,'Batik chanting experience',1,11,NULL,NULL,NULL,NULL,NULL,NULL,6.50,318.50,1562860800,1562875200,1562898600,1,1562343267,1562343267),
	(14,2,NULL,NULL,2,'Local cuisine incl. street hawker food',1,12,NULL,NULL,NULL,NULL,NULL,NULL,3.00,147.00,1563465600,1563480000,1563490800,0,1562343622,1562343622),
	(15,1,NULL,NULL,1,'Historical Place',1,13,NULL,NULL,NULL,NULL,NULL,NULL,3.00,147.00,1562774400,1562781600,1562792400,0,1562343987,1562343987),
	(16,1,NULL,NULL,3,'Night-life',1,14,NULL,NULL,NULL,NULL,NULL,NULL,12.50,612.50,1562774400,1562779800,1562824800,0,1562568165,1562568165),
	(17,1,NULL,NULL,1,'Historical Place',1,15,NULL,NULL,NULL,NULL,NULL,NULL,8.00,392.00,1562688000,1562693400,1562722200,0,1562629647,1562629647),
	(18,1,NULL,NULL,2,'Local cuisine incl. street hawker food',1,1,NULL,NULL,NULL,NULL,NULL,NULL,7.50,367.50,1562688000,1562693400,1562720400,0,1562630252,1562630252),
	(19,1,NULL,NULL,1,'Historical Place',1,2,NULL,NULL,NULL,NULL,NULL,NULL,7.50,367.50,1562688000,1562695200,1562722200,0,1562630382,1562630382),
	(20,1,NULL,NULL,1,'Historical Place',1,2,NULL,NULL,NULL,NULL,NULL,NULL,7.50,367.50,1562688000,1562695200,1562722200,0,1562630445,1562630445);

/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table country
# ------------------------------------------------------------

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(321) NOT NULL DEFAULT '',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;

INSERT INTO `country` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'MALAYSIA',1554860142,1554860142);

/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;

INSERT INTO `migration` (`version`, `apply_time`)
VALUES
	('m000000_000000_base',1550569529),
	('m130524_201442_init',1550569532);

/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table payment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `payment_id` varchar(17) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL,
  `cart_id` varchar(123) NOT NULL DEFAULT '',
  `buddy_id` varchar(123) DEFAULT NULL,
  `status` smallint(3) DEFAULT '0',
  `amount` double(10,2) DEFAULT '0.00',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payment_id` (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table profile
# ------------------------------------------------------------

DROP TABLE IF EXISTS `profile`;

CREATE TABLE `profile` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `avatar` varchar(123) DEFAULT NULL,
  `website` varchar(123) DEFAULT NULL,
  `address` text,
  `postcode` int(6) unsigned DEFAULT NULL,
  `city` varchar(123) DEFAULT NULL,
  `state` varchar(123) DEFAULT NULL,
  `country` varchar(123) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `id_no` varchar(25) NOT NULL,
  `gender` int(11) NOT NULL,
  `dob` varchar(25) NOT NULL,
  `language` varchar(25) NOT NULL,
  `about_me` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `others` varchar(255) DEFAULT NULL,
  `identity_card` varchar(123) DEFAULT NULL,
  `license` varchar(123) DEFAULT NULL,
  `insurance` varchar(123) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;

INSERT INTO `profile` (`id`, `user_id`, `avatar`, `website`, `address`, `postcode`, `city`, `state`, `country`, `created_at`, `updated_at`, `id_no`, `gender`, `dob`, `language`, `about_me`, `status`, `others`, `identity_card`, `license`, `insurance`)
VALUES
	(15,1,'/uploads/avatar/1_20190507.jpg','bbb.koila.koi','No 117 Jalan Vista 2/12 Taman Desa Vista\r\nBandar Baru Salak Tinggi',43900,'Sepang','11','Malaysia',1551796049,1557200833,'12345667890',1,'04/22/2019','','Im a boy',10,NULL,NULL,NULL,NULL),
	(16,2,'/uploads/avatar/2_20190521.jpg',NULL,'ini alamat saya,\r\njalan jalan cari makan\r\nrumah no 2, ',21312,'angsana','1','Malaysia',1555903403,1558422941,'A102020000',2,'04/15/1992','Bahasa Melayu','About elementum tincidunt massa, a pulvinar leo ultricies ut. Ut fringilla lectus tellusimp imperdiet molestie est. Dell viverra cursus nibh volutpat at.',10,'About elementum tincidunt massa, a pulvinar leo ultricies ut. Ut fringilla lectus tellusimp imperdiet molestie est. Dell viverra cursus nibh volutpat at.','/uploads/profile/2_identity_card.jpg',NULL,NULL),
	(17,3,'/uploads/avatar/3_20190512.png',NULL,'Subang Jaya',47600,'Subang Jaya','12','Malaysia',1555952236,1558231584,'970426-11-5065',1,'04/26/1990','English, Malay','I love water sports and hiking. Join me in beautiful islands and mountains in Malaysia',10,'','/uploads/profile/3_identity_card.pages',NULL,NULL),
	(18,10,'/uploads/avatar/10_20190429.jpg',NULL,'seri mutiara, setia alam',40170,'shah alam','12','Malaysia',1556514275,1557713958,'870305565061',1,'03/05/1987','English,malay','Runner organiser',10,NULL,NULL,NULL,NULL),
	(19,11,'/uploads/avatar/11_20190429.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1556519353,1556519353,'',0,'','','',0,NULL,NULL,NULL,NULL),
	(20,12,'/uploads/avatar/12_20190429.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1556519747,1556519747,'',0,'','','',0,NULL,NULL,NULL,NULL),
	(21,13,'/uploads/avatar/13_20190429.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1556520011,1556520011,'',0,'','','',0,NULL,NULL,NULL,NULL),
	(22,14,'/uploads/avatar/14_20190429.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1556520187,1556520187,'',0,'','','',0,NULL,NULL,NULL,NULL),
	(23,15,'/uploads/avatar/15_20190429.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1556520358,1556520358,'',0,'','','',0,NULL,NULL,NULL,NULL),
	(24,16,'/uploads/avatar/16_20190429.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1556520496,1556520496,'',0,'','','',0,NULL,NULL,NULL,NULL),
	(25,17,'/uploads/avatar/17_20190429.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1556520696,1556520696,'',0,'','','',0,NULL,NULL,NULL,NULL),
	(26,18,'/uploads/avatar/18_20190429.jpg',NULL,'KAMPUNG PAYA JAWA TENGAH',34500,'BUKIT TINGGI','10','Malaysia',1556520854,1556694900,'871102-09-0987',1,'04/29/1967','English, BM, Mandarin','I am able to design a great personalised vacation and customised to your need',10,NULL,NULL,NULL,NULL),
	(27,19,'/uploads/avatar/19_20190429.jpg',NULL,'1234567 QWASDFGHJ',12300,'SIMPANG','14','Malaysia',1556521071,1556696159,'900304-09-1231',1,'04/06/2002','ENGLISH, Arabic & Malay','I am all into Halal travel\r\n',10,NULL,NULL,NULL,NULL),
	(28,20,'/uploads/avatar/20_20190429.jpg',NULL,'12 KG TOK GAJAH MELAKA',20100,'MELAKA','14','Malaysia',1556521234,1556521278,'900107-07-9001',1,'04/07/1969','CHINESE','LOVE TO EAT',10,NULL,NULL,NULL,NULL),
	(29,21,'/uploads/avatar/21_20190429.jpg',NULL,'12 JALAN LOKE YU ',23400,'SELANGOT','14','Malaysia',1556521522,1556521562,'980102-02-9012',1,'04/20/2019','ENHLISH','LOVE ACTING',10,NULL,NULL,NULL,NULL),
	(30,22,'/uploads/avatar/22_20190430.jpg',NULL,'12 lorong 45 kh selatam',45600,'kl','11','Malaysia',1556521664,1556591149,'670987-09-9871',1,'04/13/2019','e=bi','mee',10,NULL,NULL,NULL,NULL),
	(31,23,'/uploads/avatar/23_20190429.jpg',NULL,'45 lorong kewa jalan simpang',25666,'jiytra','13','Malaysia',1556521766,1556521810,'8716-13-0331',1,'11/14/2019','bm','humble huggable',10,NULL,NULL,NULL,NULL),
	(32,24,'/uploads/avatar/24_20190429.jpg',NULL,'kg parit jawa tengah',12300,'teeeeee','14','Malaysia',1556521923,1556521975,'871002-04-0987',1,'11/12/1998','bi','entrepreneur',10,NULL,NULL,NULL,NULL),
	(33,25,'/uploads/avatar/25_20190429.jpg',NULL,'jalan tengah kota lama',34788,'ppppp','8','Malaysia',1556522059,1556522097,'789045-87-0984',1,'09/18/2019','bm','introvert',10,NULL,NULL,NULL,NULL),
	(34,26,'/uploads/avatar/26_20190501.jpeg',NULL,'LORONG KEKWA',67999,'WEEE','13','Malaysia',1556522197,1556694381,'7809023-12-1245',1,'04/27/2019','BM','Able to provide interesting, adventurous and memorable visits around Malaysia',10,NULL,NULL,NULL,NULL),
	(35,27,'/uploads/avatar/27_20190429.jpg',NULL,'LORONG CENDANA',34000,'TAIPING','8','Malaysia',1556522373,1556522439,'890101-01-5111',1,'01/01/1989','BM','LIKE TO HIKING',10,NULL,NULL,NULL,NULL),
	(36,28,'/uploads/avatar/28_20190429.jpg',NULL,'KANMPUNG PADUKA SETIA',67800,'MELAAKA','11','Malaysia',1556522521,1556522561,'9903-09-1254',1,'04/18/2001','BI','NOTHING',10,NULL,NULL,NULL,NULL),
	(37,29,'/uploads/avatar/29_20190430.jpg',NULL,'TAMNA TERAITA',55980,'AYER KEROH','5','Malaysia',1556522665,1556591253,'789040-01-8765',1,'04/10/2007','BM','ACTOR',10,NULL,NULL,NULL,NULL),
	(38,30,'/uploads/avatar/30_20190430.jpg',NULL,'FLAT TERATAI PELANGI',22455,'PONNN','15','Malaysia',1556522820,1556591333,'897507-87-3490',1,'04/06/1927','BM','NOTHING',10,NULL,NULL,NULL,NULL),
	(39,31,'/uploads/avatar/31_20190429.jpg',NULL,'RUMAH BERTINGKAT ',8755,'APETU','13','Malaysia',1556522941,1556522982,'678904-97-9908',1,'04/07/2016','BM','KELANTANESE',10,NULL,NULL,NULL,NULL),
	(40,32,'/uploads/avatar/32_20190429.jpg',NULL,'KANMPUNG KERAMAT',56777,'PULAI','12','Malaysia',1556523097,1556523138,'678908-09-2376',1,'04/03/2004','BI','SMILE ALWAYS',10,NULL,NULL,NULL,NULL),
	(41,33,'/uploads/avatar/33_20190429.jpg',NULL,'KG PANDAN JAYA',80000,'AMPANG','9','Malaysia',1556523205,1556523244,'952109-75-0952',1,'04/13/2019','B,M','GAMERS',10,NULL,NULL,NULL,NULL),
	(42,34,'/uploads/avatar/34_20190429.jpg',NULL,'12 KAMPUNG ULU KERNA',44677,'JAWA','14','Malaysia',1556523326,1556523363,'678905-09-3211',1,'04/20/2019','BM','SELFIES ADDICTED',10,NULL,NULL,NULL,NULL),
	(43,35,'/uploads/avatar/35_20190429.jpg',NULL,'KG PANTAI TIMUR',44876,'DENGGG','16','Malaysia',1556523423,1556523456,'879089-09-0421',1,'04/27/2019','CHINESE','TRAVELEL',10,NULL,NULL,NULL,NULL),
	(44,47,'/uploads/avatar/47_20190521.jpg',NULL,'Shah Alam',41700,'Shah Alam','12','Malaysia',1556592171,1558427430,'020125015523',1,'01/25/2002','English, BM, Mandarin','Customised Tour to suit your needs',10,'',NULL,NULL,NULL),
	(45,7,'/uploads/avatar/7_20190430.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1556592856,1556592856,'',0,'','','',0,NULL,NULL,NULL,NULL),
	(46,6,'/uploads/avatar/6_20190430.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1556594815,1556594815,'',0,'','','',0,NULL,NULL,NULL,NULL),
	(47,48,'/uploads/avatar/48_20190502.jpg',NULL,'No 45 Jalan USJ 14/1B',47630,'Subang Jaya','12','Malaysia',1556757394,1556757480,'760623-07-5052',2,'06/23/1976','Bahasa Melayu , English ','Hiking ',10,NULL,NULL,NULL,NULL),
	(48,49,'/uploads/avatar/49_20190503.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1556844094,1556844094,'',0,'','','',0,NULL,NULL,NULL,NULL),
	(49,50,NULL,NULL,'-',46100,'pj','12','Malaysia',1556855163,1556855163,'810519135062',2,'','English, Bahasa Malaysia','-',10,NULL,NULL,NULL,NULL),
	(50,55,NULL,NULL,'293, Jalan Anggerik 2, Lorong Anggerik 9, Bandar Sunggala',71050,'Port Dickson','5','Malaysia',1557630422,1557671980,'880419055130',2,'04/19/1988','Bahasa Melayu, English','Love to travel ',10,NULL,NULL,NULL,NULL),
	(51,56,'/uploads/avatar/56_20190512.jpg',NULL,'Shah Alam, Selangor',41700,'Shah Alam','12','Malaysia',1557630661,1557631073,'020125015523',1,'01/25/2002','English, Malay, Arabic, M','I am fun, friendly and able to make your journey a memorable one',10,NULL,NULL,NULL,NULL),
	(52,61,'/uploads/avatar/61_20190513.jpeg',NULL,'-',0,'Kota Bharu','3','Malaysia',1557711994,1557713096,'850327-05-5304',2,'03/27/1985','English,malay','-',10,NULL,NULL,NULL,NULL),
	(53,59,NULL,NULL,'Melaka',0,'Melaka','4','Malaysia',1557713747,1557713747,'950909-14-5172',2,'09/09/1995','English,malay','-',10,NULL,NULL,NULL,NULL),
	(54,57,NULL,NULL,'-',0,'Klang','12','Malaysia',1557713855,1557713855,'951016-10-6373',1,'10/16/1995','English,malay','-',10,NULL,NULL,NULL,NULL),
	(55,58,NULL,NULL,'-',0,'Melaka','4','Malaysia',1557714043,1557714043,'941227-14-5172',1,'12/27/1994','English,malay','-',10,NULL,NULL,NULL,NULL),
	(56,60,NULL,NULL,'-',0,'Kepong','14','Malaysia',1557714222,1557714232,'950112-08-6137',1,'01/12/1995','English,malay','-',10,NULL,NULL,NULL,NULL),
	(57,62,NULL,NULL,'-',40170,'shah alam','12','Malaysia',1557714337,1557714337,'920422-01-5635',1,'04/22/1992','English,malay','-',10,NULL,NULL,NULL,NULL),
	(58,64,NULL,NULL,'Datok keramat KL\r\n',54000,'Kuala lumpur','14','Malaysia',1557919393,1557919393,'700505-01-6073',1,'05/05/2019','English, malay','I love travelling',10,NULL,NULL,NULL,NULL),
	(59,66,'/uploads/avatar/66_20190519.jpg',NULL,'52A,  Ecohill 1/3N, Setia Ecohill',43500,'Semenyih','12','Malaysia',1558184357,1558227324,'700420-10-6248',2,'20 /4/1970','Bahasa Malaysia, English ','I\'m Siti, 49 years old. I\'m ex ',10,NULL,NULL,NULL,NULL),
	(60,54,'/uploads/avatar/54_20190519.png',NULL,NULL,NULL,NULL,NULL,NULL,1558231646,1558231646,'',0,'','','',0,NULL,NULL,NULL,NULL),
	(61,68,'/uploads/avatar/68_20190521.jpg',NULL,'B-65 Mutiara Height, Jalan Hajjah Rehmah',11600,'Georgetown','7','Malaysia',1558318831,1558414000,'751220075467',1,'12/20/1975','English, Arabic, Malays, ','Experienced Travel Guide in Malaysia',10,'PSV license available',NULL,NULL,NULL),
	(62,69,'/uploads/avatar/69_20190520.jpg',NULL,'D-10-12 PELANGI DAMANSARA APARTMENT\r\nPESIARAN SURIAN, MUTIARA DAMANSARA',47800,'PETALING JAYA','12','Malaysia',1558327863,1558328810,'690126-10-6304',2,'01/26/1969','English and Bahasa Malays','Hi my name is Freda and I have been travelling a lot around the region and europe and like the idea of introducing the city of Kuala Lumpur from a local\'s perspective. I\'m enthusiastic about this city I called home. I create a tour around the city and pla',10,'','/uploads/profile/69_identity_card.jpg','/uploads/profile/69_license.jpg','/uploads/profile/69_insurance.jpg'),
	(63,71,NULL,NULL,'lot1400 kampung padang lalang',7000,'langkawi','2','Malaysia',1558336926,1558336926,'820429075747',1,'04/29/1982','bahasa melayu dan inggeri','peminat rekreasi',10,'',NULL,NULL,NULL);

/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table reference
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reference`;

CREATE TABLE `reference` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference` varchar(12) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `reference` WRITE;
/*!40000 ALTER TABLE `reference` DISABLE KEYS */;

INSERT INTO `reference` (`id`, `reference`, `user_id`, `created_at`, `updated_at`)
VALUES
	(6,'J1E7O7',56,1556638318,1557630395),
	(7,'C3G1F8',3,1556671699,1557587105),
	(8,'V3U8H5',10,1556671998,1557588962),
	(9,'L4D7K1',68,1557361857,1558318650),
	(10,'C4C8B5',49,1557361872,1558433860),
	(11,'H5N8P1',69,1557361889,1558326097),
	(12,'P4A7L9',48,1557361898,1557587085),
	(13,'S3M5H7',NULL,1557588647,1557588647),
	(14,'W0H4Z3',NULL,1557588653,1557588653),
	(15,'N4W2G4',NULL,1558411085,1558411085);

/*!40000 ALTER TABLE `reference` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(123) NOT NULL DEFAULT '',
  `description` text,
  `price` double(11,2) DEFAULT '0.00',
  `image_file` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '10',
  `created_at` int(11) DEFAULT '10',
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;

INSERT INTO `services` (`id`, `title`, `description`, `price`, `image_file`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'Historical Place','Historic site or Heritage site is an official location where pieces of political, military, cultural, or social history have been preserved due to their cultural heritage value. Historic sites are usually protected by law, and many have been recognized with the official national historic site status.',0.00,'uploads/image_file/services/1_Historical Palace.png',10,1556546222,1557361524),
	(2,'Local cuisine incl. street hawker food','Local cuisine incl. street hawker food',0.00,'uploads/image_file/services/2_Local cuisine incl. street hawker food.png',10,1556546679,1556546679),
	(3,'Night-life','Night-life where most of locals hang-out',0.00,'uploads/image_file/services/3_Night live.png',10,1556546705,1557361609),
	(4,'Batik chanting experience','Batik chanting experience',0.00,'uploads/image_file/services/4_Batik chanting experience.png',10,1556546722,1556546722),
	(5,'Halal travel (place, food, etc)','Halal travel (place, food, etc)',0.00,'uploads/image_file/services/5_Halal travel (place_food_etc).png',10,1556546739,1556546739),
	(6,'Women & ladies traveller (only for women)','Women & ladies traveller (only for women)',0.00,'uploads/image_file/services/6_Women & ladies traveller (only for women).png',10,1556546757,1556546757),
	(7,'Local museum, zoo and/or park','Local museum, zoo and/or park',0.00,'uploads/image_file/services/7_Local_museum_zoo_and_or_park.png',10,1556546777,1556547365),
	(8,'Entertainment places','Entertainment places',0.00,'uploads/image_file/services/8_Entertainment_places.png',10,1556546792,1556547380),
	(9,'Experience river cruise explorer','Experience river cruise explorer',0.00,'uploads/image_file/services/9_Experience_river_cruise_explorer.png',10,1556547405,1556547405),
	(10,'Water rafting','Water rafting',0.00,'uploads/image_file/services/10_Water_rafting.png',10,1556547423,1556547423),
	(11,'Island hopping','Island hopping',0.00,'uploads/image_file/services/11_Island_hopping.png',10,1556547453,1556547453),
	(12,'Scuba diving','Scuba diving',0.00,'uploads/image_file/services/12_Scuba_diving.png',10,1556547473,1556547473),
	(13,'Beach','Beach',0.00,'uploads/image_file/services/13_Beach.png',10,1556547490,1556547490),
	(14,'Hiking','Hiking',0.00,'uploads/image_file/services/14_Hiking.png',10,1556547504,1556547504),
	(15,'Cave explore','Cave explore',0.00,'uploads/image_file/services/15_Cave_explore.png',10,1556547520,1556547520),
	(16,'Camping','Camping',0.00,'uploads/image_file/services/16_Camping.png',10,1556547536,1556547536),
	(17,'Fishing trip (fun fishing) & snorkerling','Fishing trip (fun fishing) & snorkerling',0.00,'uploads/image_file/services/17_Fishing_trip_(fun_fishing)_&_snorkerling.png',10,1556547552,1556547552),
	(18,'Visit orang asli','Visit orang asli',0.00,'uploads/image_file/services/18_Visit_orang_asli.png',10,1556547569,1556547569),
	(19,'4x4 extreme','4x4 extreme',0.00,'uploads/image_file/services/19_4x5_extreme.png',10,1556547587,1556613393),
	(20,'Fright night','Fright night',0.00,'uploads/image_file/services/20_Fright_night.png',10,1556547606,1556547606),
	(21,'Turtle sanctuary','Turtle sanctuary',0.00,'uploads/image_file/services/21_Turtle_sanctuary.png',10,1556547621,1556547636),
	(22,'Golf tour','Golf tour',0.00,'uploads/image_file/services/22_Golf_tour.png',10,1556547655,1556547655),
	(23,'Charter drive with driver only (CD tour) + waiting minimum  4 hours tour','Charter drive with driver only (CD tour) + waiting minimum  4 hours tour',0.00,'uploads/image_file/services/23_Charter_drive_with_driver_only_(CD_tour)_+_waiting_minimum__4_hours_tour.png',10,1556547678,1556547678),
	(24,'Business visit & arrangement','Business visit & arrangement',0.00,'uploads/image_file/services/24_Business_visit_&_arrangement.png',10,1556547693,1556547693),
	(25,'Government program (assistance)','Government program (assistance)',0.00,'uploads/image_file/services/25_Government_program_(assistance).png',10,1556547720,1556547720);

/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table state
# ------------------------------------------------------------

DROP TABLE IF EXISTS `state`;

CREATE TABLE `state` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `name` varchar(321) NOT NULL DEFAULT '',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;

INSERT INTO `state` (`id`, `country_id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,1,'Johor Darul Ta\'zim',1554860278,1554860278),
	(2,1,'Kedah Darul Aman',1554860308,1554860308),
	(3,1,'Kelantan Darul Naim',1554860323,1554860323),
	(4,1,'Melaka',1554860345,1554860345),
	(5,1,'Negeri Sembilan Darul Khusus',1554860358,1554860358),
	(6,1,'Pahang Darul Makmur',1554860374,1554860374),
	(7,1,'Pulau Pinang',1554860393,1554860393),
	(8,1,'Perak Darul Ridzuan',1554860405,1554860405),
	(9,1,'Perlis Indera Kayangan',1554860417,1554860417),
	(10,1,'Sabah',1554860427,1554860427),
	(11,1,'Sarawak',1554860436,1554860436),
	(12,1,'Selangor Darul Ehsan',1554860446,1554860446),
	(13,1,'Terengganu Darul Iman',1554860459,1554860459),
	(14,1,'Kuala Lumpur',1554860677,1554860677),
	(15,1,'Labuan',1554860686,1554860686),
	(16,1,'Putrajaya',1554860698,1554860698);

/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table state_service
# ------------------------------------------------------------

DROP TABLE IF EXISTS `state_service`;

CREATE TABLE `state_service` (
  `id` int(21) unsigned NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_service_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `state_service` WRITE;
/*!40000 ALTER TABLE `state_service` DISABLE KEYS */;

INSERT INTO `state_service` (`id`, `state_id`, `service_id`, `user_id`, `user_service_id`, `created_at`, `updated_at`)
VALUES
	(3,1,2,2,1,1555903188,1555903188),
	(4,2,2,2,1,1555903188,1555903188),
	(5,4,2,2,1,1555903188,1555903188),
	(6,6,2,2,1,1555903188,1555903188),
	(10,3,5,4,4,1555985049,1555985049),
	(11,5,5,4,4,1555985049,1555985049),
	(12,7,5,4,4,1555985049,1555985049),
	(13,8,5,4,4,1555985049,1555985049),
	(15,13,2,5,5,1556108104,1556108104),
	(16,12,5,10,6,1556514151,1556514151),
	(17,14,5,10,6,1556514151,1556514151),
	(19,12,2,11,7,1556519385,1556519385),
	(20,3,3,12,8,1556519870,1556519870),
	(21,1,4,13,9,1556520106,1556520106),
	(22,10,5,14,10,1556520278,1556520278),
	(23,2,5,15,11,1556520426,1556520426),
	(24,9,3,16,12,1556520626,1556520626),
	(25,3,2,17,13,1556520783,1556520783),
	(27,11,5,22,18,1556521712,1556521712),
	(28,7,4,23,19,1556521823,1556521823),
	(29,15,5,24,20,1556521987,1556521987),
	(31,8,2,27,23,1556522451,1556522451),
	(32,3,4,28,24,1556522571,1556522571),
	(33,2,2,28,25,1556522587,1556522587),
	(34,14,5,30,27,1556522869,1556522869),
	(35,1,4,31,28,1556522990,1556522990),
	(36,1,5,33,30,1556523252,1556523252),
	(37,1,3,34,31,1556523374,1556523374),
	(39,1,1,47,34,1556592260,1556592260),
	(40,4,1,47,34,1556592260,1556592260),
	(41,12,1,47,34,1556592260,1556592260),
	(44,12,3,10,36,1556622936,1556622936),
	(45,14,3,10,36,1556622936,1556622936),
	(46,16,3,10,36,1556622936,1556622936),
	(47,14,8,10,37,1556622955,1556622955),
	(48,10,11,10,38,1556622989,1556622989),
	(49,13,11,10,38,1556622989,1556622989),
	(50,5,13,10,39,1556623014,1556623014),
	(51,12,24,10,40,1556623057,1556623057),
	(52,14,24,10,40,1556623057,1556623057),
	(53,16,24,10,40,1556623057,1556623057),
	(54,12,25,10,41,1556623078,1556623078),
	(55,14,25,10,41,1556623078,1556623078),
	(56,16,25,10,41,1556623078,1556623078),
	(57,5,2,10,35,1556623131,1556623131),
	(58,12,2,10,35,1556623132,1556623132),
	(59,14,2,10,35,1556623132,1556623132),
	(60,1,1,1,42,1556644091,1556644091),
	(61,2,1,1,42,1556644091,1556644091),
	(62,3,1,1,42,1556644091,1556644091),
	(63,4,1,1,42,1556644091,1556644091),
	(64,7,4,26,22,1556694414,1556694414),
	(65,5,2,26,43,1556694509,1556694509),
	(66,10,2,26,43,1556694509,1556694509),
	(67,11,2,26,43,1556694509,1556694509),
	(68,3,8,26,44,1556694543,1556694543),
	(69,6,8,26,44,1556694543,1556694543),
	(75,5,9,18,47,1556695514,1556695514),
	(76,7,9,18,47,1556695514,1556695514),
	(77,9,9,18,47,1556695514,1556695514),
	(82,3,5,19,48,1556696319,1556696319),
	(83,5,5,19,48,1556696319,1556696319),
	(84,6,5,19,48,1556696319,1556696319),
	(85,10,5,19,48,1556696319,1556696319),
	(86,14,5,19,48,1556696319,1556696319),
	(87,16,5,19,48,1556696319,1556696319),
	(92,1,3,3,3,1556696464,1556696464),
	(93,10,3,3,3,1556696464,1556696464),
	(100,5,3,18,46,1556696756,1556696756),
	(101,7,3,18,46,1556696756,1556696756),
	(102,10,3,18,46,1556696756,1556696756),
	(103,1,4,18,14,1556696801,1556696801),
	(104,2,4,18,14,1556696801,1556696801),
	(105,3,4,18,14,1556696801,1556696801),
	(106,4,4,18,14,1556696801,1556696801),
	(107,5,4,18,14,1556696801,1556696801),
	(108,8,4,18,14,1556696801,1556696801),
	(109,12,4,18,14,1556696801,1556696801),
	(110,2,5,18,45,1556696825,1556696825),
	(111,3,5,18,45,1556696825,1556696825),
	(112,5,5,18,45,1556696825,1556696825),
	(113,6,5,18,45,1556696825,1556696825),
	(114,14,6,48,50,1556758251,1556758251),
	(115,16,6,48,50,1556758251,1556758251),
	(116,8,10,48,51,1556758272,1556758272),
	(117,14,10,48,51,1556758272,1556758272),
	(118,16,10,48,51,1556758272,1556758272),
	(119,12,14,48,52,1556758294,1556758294),
	(120,14,14,48,52,1556758294,1556758294),
	(121,16,14,48,52,1556758294,1556758294),
	(122,3,5,49,53,1556844221,1556844221),
	(130,2,1,56,56,1557630720,1557630720),
	(131,6,1,56,56,1557630720,1557630720),
	(132,7,1,56,56,1557630720,1557630720),
	(133,14,1,56,56,1557630720,1557630720),
	(134,16,1,56,56,1557630720,1557630720),
	(135,3,3,56,57,1557630759,1557630759),
	(136,5,3,56,57,1557630759,1557630759),
	(137,7,3,56,57,1557630759,1557630759),
	(138,8,3,56,57,1557630759,1557630759),
	(139,14,3,56,57,1557630759,1557630759),
	(140,2,5,56,58,1557630803,1557630803),
	(141,3,5,56,58,1557630803,1557630803),
	(142,5,5,56,58,1557630803,1557630803),
	(143,9,5,56,58,1557630803,1557630803),
	(144,10,5,56,58,1557630803,1557630803),
	(145,14,5,56,58,1557630803,1557630803),
	(146,1,24,56,59,1557630852,1557630852),
	(147,2,24,56,59,1557630852,1557630852),
	(148,3,24,56,59,1557630852,1557630852),
	(149,4,24,56,59,1557630852,1557630852),
	(150,5,24,56,59,1557630852,1557630852),
	(151,6,24,56,59,1557630852,1557630852),
	(152,7,24,56,59,1557630852,1557630852),
	(153,8,24,56,59,1557630852,1557630852),
	(154,14,24,56,59,1557630852,1557630852),
	(155,16,24,56,59,1557630852,1557630852),
	(162,4,1,55,61,1557672143,1557672143),
	(163,5,1,55,61,1557672143,1557672143),
	(164,14,1,55,61,1557672143,1557672143),
	(165,4,2,55,62,1557672168,1557672168),
	(166,5,2,55,62,1557672168,1557672168),
	(167,12,2,55,62,1557672168,1557672168),
	(168,14,2,55,62,1557672168,1557672168),
	(169,4,3,55,63,1557672193,1557672193),
	(170,5,3,55,63,1557672193,1557672193),
	(171,12,3,55,63,1557672193,1557672193),
	(172,14,3,55,63,1557672193,1557672193),
	(173,16,3,55,63,1557672193,1557672193),
	(174,4,5,55,64,1557672219,1557672219),
	(175,5,5,55,64,1557672219,1557672219),
	(176,12,5,55,64,1557672219,1557672219),
	(177,14,5,55,64,1557672219,1557672219),
	(178,4,6,55,65,1557672247,1557672247),
	(179,5,6,55,65,1557672247,1557672247),
	(180,7,6,55,65,1557672247,1557672247),
	(181,9,6,55,65,1557672247,1557672247),
	(182,12,6,55,65,1557672247,1557672247),
	(183,14,6,55,65,1557672247,1557672247),
	(184,16,6,55,65,1557672247,1557672247),
	(185,4,13,55,66,1557672273,1557672273),
	(186,5,13,55,66,1557672273,1557672273),
	(187,12,13,55,66,1557672273,1557672273),
	(188,14,13,55,66,1557672273,1557672273),
	(189,4,25,55,67,1557672312,1557672312),
	(190,5,25,55,67,1557672312,1557672312),
	(191,12,25,55,67,1557672312,1557672312),
	(192,14,25,55,67,1557672312,1557672312),
	(193,16,25,55,67,1557672312,1557672312),
	(194,4,24,55,68,1557713330,1557713330),
	(195,5,24,55,68,1557713330,1557713330),
	(196,14,24,55,68,1557713330,1557713330),
	(197,1,2,3,2,1558230892,1558230892),
	(198,4,2,3,2,1558230892,1558230892),
	(199,5,2,3,2,1558230892,1558230892),
	(200,6,2,3,2,1558230892,1558230892),
	(201,12,2,3,2,1558230892,1558230892),
	(202,14,2,3,2,1558230892,1558230892),
	(206,12,9,3,60,1558230942,1558230942),
	(207,1,5,3,54,1558231090,1558231090),
	(208,12,5,3,54,1558231090,1558231090),
	(209,14,5,3,54,1558231090,1558231090),
	(210,13,4,3,69,1558231159,1558231159),
	(211,12,24,3,70,1558231329,1558231329),
	(212,14,24,3,70,1558231329,1558231329),
	(219,1,1,3,49,1558232156,1558232156),
	(220,4,1,3,49,1558232156,1558232156),
	(221,6,1,3,49,1558232156,1558232156),
	(222,9,1,3,49,1558232156,1558232156),
	(223,10,1,3,49,1558232156,1558232156),
	(224,12,1,3,49,1558232156,1558232156),
	(226,14,1,69,71,1558328893,1558328893),
	(236,2,1,2,33,1558423433,1558423433),
	(237,6,2,47,72,1558425941,1558425941),
	(238,5,3,47,73,1558426614,1558426614),
	(239,6,11,47,74,1558426774,1558426774),
	(240,3,4,47,75,1558426850,1558426850);

/*!40000 ALTER TABLE `state_service` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(16) COLLATE utf8_unicode_ci DEFAULT '',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `user_status` smallint(6) DEFAULT '0',
  `reference_code` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `ic_passport` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `phone`, `status`, `user_status`, `reference_code`, `ic_passport`, `created_at`, `updated_at`)
VALUES
	(1,'Hafiz bin Baharudin','M8JsBUFtUdbLyInH0f_2NQloVMD6VyJg','$2y$13$B2g2kPVt5e6zbExA4jj15.3jrcnRv.U.BdW3IiNw3cYRXZf6j6yEi',NULL,'koihafiz@gmail.com','0125469823',10,11,'',NULL,1550826922,1550826922),
	(2,'Siti Aishah','2bp_R4S6fm5zTvM2hD_nAUYXMvfsN5Wp','$2y$13$mpFhx/1BZ7T3gPea9D3AOebuYPmTp.Un8G9dtUGZgc/55qCBmlaBi',NULL,'aishahhashimbaki@gmail.com','0133201019',10,11,'',NULL,1555749088,1558417304),
	(3,'Faheem Zulkifli','al8Rd9lbfjVRiqBdUp6c5iWPK5qeP1jC','$2y$13$Hp7xHterWLmc0QmSk7wfgOa3E3IGB3DjnIx/Lma1H9.obvLaniraa','x4UdLVQezgp_bB5h0WVyNyzjpnkndPJC_1557632845','muhammad.nafisah@yahoo.com','133641631',10,1,'MB:C3G1F8',NULL,1555911567,1557641124),
	(6,'Siti Shamsiah','oSueBMb9fjF9sjnd-JSHlu_KLIVZd6fw','$2y$13$TNJ0pgvgEtFdnRtPBFtNWuVol.U/wK63SA7afz0fUpkGF8dfO15dy',NULL,'sham@gmail.com','',10,0,'NRC001',NULL,1556157750,1556157750),
	(7,'amira farhana','isZhLaSXPmk2rHi3gfdfeXUkhHk4nEVz','$2y$13$ahMQAvQ1KP2/d5I2yModUeQpwn5OsNcyH7Q1KZhkELwX9y8WnNAw.',NULL,'amirafarhana@gmail.com','',10,0,'NRC001',NULL,1556506386,1556506386),
	(10,'Azrie Azmi','0Tx4vVLZSsehX-Yx3gSbzZ7M2zLECxVS','$2y$13$19MgXTd6hL7w.o47hkrDeuyl5eGNMaR3v1F9uvSvv2dyEGtZ.vJGy',NULL,'azrieazmi53@gmail.com','0193031173',10,1,'MB:V3U8H5',NULL,1556514040,1557713958),
	(12,'ADIB YUSUF','lsvolMb1dSXuYKaxW1w88DJPSzW8b1CI','$2y$13$QtpYYScgeLpXswgiKRjJJOErPX1FexZ8lD6V6llvlg8LHF3ogAlWq',NULL,'hsnizayati@yes.my','',10,0,'NRC001',NULL,1556519696,1556519696),
	(13,'Adibah Mahmud','v2INwHqa5Ze8FvjEsl5GD_hf68AR7F-k','$2y$13$6cnIT9QBhL7JwKt8SeaJn.FOrX9.OBY0Kmd2aTL9kqU8D2mawOzsu',NULL,'zamzie6770@gmail.com','',10,0,'NRC001',NULL,1556519975,1556519975),
	(14,'Affandhi Muhammad','7YnsxzyFWWhAcTuu5MakXNz71A7rvi3R','$2y$13$FCYa2MrrJ2QbEAut2A0.mO2NLItu5PKZpC2YaAMnqY0egWRT8Un7O',NULL,'zubaidahosman1970@gmail.com','',10,0,'NRC001',NULL,1556520172,1556520172),
	(15,'Ahmad Aizuddin Saadin','qAvMvMKOZBUwrst_OpuqMf4ms-_NJ-Pc','$2y$13$WUtbdbMHJNplFOECq4kJyO1jfMBQs3LPM4.oZLRLb9aqrRR9SUW4a',NULL,'roziemieda@gmail.com','',10,0,'NRC001',NULL,1556520341,1556520341),
	(16,'Ahmad Faiz bin Ahmad Fauzi','NUapc3bBayW-BD5zvwLj5Bf7v2NwZtep','$2y$13$6R2YGxZ93yNSgUswNQV0QOX81x6sKpoSROs5VvNPlRyGGC8HlQMKC',NULL,'izandy1670@gmail.com','',10,0,'NRC001',NULL,1556520474,1556520474),
	(17,'Ahmad Farisol bin Sadikin','nn8B-0oT4RSYYXkotEHFczcBTdm_IB70','$2y$13$OrxhYdANb9Waiv38YxbyMeeLq2DSBi0DGONhfgJ1oTJAvAucpcERq',NULL,'noorizamabdullah@yahoo.com','',10,0,'NRC001',NULL,1556520681,1556520681),
	(18,'Ahmad Kamil Ithnin','KLWMl7HhpE2vD_LEj1cPuzIFHnxIWG1O','$2y$13$h5s.XXIG94IlSCWV./31fuRi8vYO32IRGSya4UXEDHmDR1LuL2Z.y',NULL,'masitah.idrus@gmail.com','',10,0,'NRC001',NULL,1556520833,1556520833),
	(19,'Ahmad Safuan Umanullah','VJT55-Iha5egNWptUz5EAKBZB49RWAE1','$2y$13$dXoJUZFrq0ts.lTDHab8oOFNkU.PizwxX8bxxMnOMu0eBul3DmjCO',NULL,'marisa_amilia@yahoo.com','',10,0,'NRC001',NULL,1556521054,1556521054),
	(20,'Ali Noor Ahza','zXXcAoYW1fOOaBj2RKOKUs-RdmlB_eiT','$2y$13$K21CZ.LqE6.sluDoaGsRaePepfJWd5kTuSz844wEvW/IIwSGmnm0W',NULL,'muhammad.nafisah21@yahoo.com','',10,0,'NRC001',NULL,1556521215,1556521215),
	(23,'Aminudin Ahmad Alimudin','svM8u8dN73HLWwtFK2nexUAI-MfpUxPk','$2y$13$PkZHiD.U6oeSm9LRAXJRCeUvKYlINEZSFw999lg6HhLIGKdXxAPt6',NULL,'ikraambrsb@gmail.com','',10,0,'NRC001',NULL,1556521752,1556521752),
	(30,'BALQIS BINTI AYUB','EZl__wOSokBRXiFr_ArApgfPHpXcwRGV','$2y$13$QMSIrihEC4V.b0i8DgkH5.LOTyVpgrkrQ1Yng13/tns53NEkcEa.2',NULL,'zulaikham@yahoo.com','',10,0,'NRC001',NULL,1556522787,1556522787),
	(33,'Edward Larry','-_nYCMYRICYxNPSpJxor2xI_YLjtQK7k','$2y$13$NE7Xweu.B8z6LFqVOTyWJuuY4avi6gvPAdfZ9lWS7C2RVh7qrd5l6',NULL,'diana.zulkifli2004@gmail.com','',10,0,'NRC001',NULL,1556523192,1556523192),
	(34,'Fadhil Ahmad Bakri','bdFZ9Iym2I5XyNotHoS8EdCnLPpcdn0g','$2y$13$akzi5U4We2dtHvJmfKspQudFnwGr74kJpHfYSW1Uf/Pu7LE9.JyNS',NULL,'sarahemilyzul@gmail.com','',10,0,'NRC001',NULL,1556523309,1556523309),
	(46,'Ainur Mardiah','HFEPjLNwZGBjHLnJEWjEhW9m_-J4uNGy','$2y$13$kULnpKvHsMUUw6XWeGTyaullVuCe5Md0pUsQsSpaxKCya/SQmD41O',NULL,'ainur@gmail.com','',10,0,'NRC001',NULL,1556555335,1556555335),
	(47,'Irfan MH','qPrjn-v3qsejXgG0jvcQQ7WefhaJ6oVX','$2y$13$MpKj0EyisRrQ3E0LJTvLqOEaAn8FpJ4q.Mcl3Lp4CZ9.20UJUHUT6',NULL,'harisdoc7@gmail.com','',10,11,'',NULL,1556592000,1557629830),
	(48,'Diana Radzi','D-9Tckd060LUfjRq0xn_XekE4Gc6ap22','$2y$13$DIk3ql7fyfZKS1nVn6IeP.1LsZF5nW2chtHc/2O/UzXQGfK0KZQ5q',NULL,'dianaradzi@yahoo.com','01111281411',10,1,'MB:P4A7L9',NULL,1556756948,1557587085),
	(49,'Ahmad munir','u_AuWp2H6AlnlRI29OsxfCWxWD5YS6-F','$2y$13$4C3X3bskPyVkiJHgBd1XWOzUuzoZGknE1y0Ti57iaF6j8fvNr671y',NULL,'muntakiyearoo@gmail.com','0199400101 ',10,1,'MB:C4C8B5',NULL,1556843772,1558433860),
	(50,'edna safawi','AQzQenxISiD3nP_9gJmZI1l_Lak0Br_a','$2y$13$l6u5/Alh.8.VTriUSWm2vuKYR8iAJkJpzlfYrHSF5HA2kmoRqnYjW',NULL,'edna.safawi@yahoo.co.uk','0128888105',10,0,'NRC001',NULL,1556855082,1556855082),
	(54,'Mohd rozi bin mohamed kamalro','nW8UdbCJpALuaVWomdI8487nxM0NXZxv','$2y$13$mS0S5vlN7AYdShiJJ.1PnegrSDtJNjbNrnnvC4J3ergbPY/kpQFzS',NULL,'mohdrozi94@gmail.com','0148345400',10,2,'SMB:C3G1F8',NULL,1557624852,1557624852),
	(55,'Maznira binti Miswan','cj1bLm-aOESnRy114zNHhX5coChgGPuH','$2y$13$DGeIbvz16JmSPEoLZS8v2u5jPPxE4Et1p0xkw519bpssc/F3i26M2',NULL,'maznira.miswan@gmail.com','0176979616',10,2,'SMB:C3G1F8',NULL,1557630203,1557630203),
	(56,'Hanis Irfan','JdsV2fsdGCfAyZc8aD1yxW1r6-rnJ7Vv','$2y$13$EnupAvB1.Y.Pz5vS3ZWbPu4MYx.M5dTn9hWRHdvNkM2w.a21kHH9u',NULL,'techpaten@gmail.com','0123043899',10,1,'MB:J1E7O7',NULL,1557630395,1557630395),
	(57,'MUHAMMAD AMIRUL SHAZAD BINN SHAHIDAN','_3B8t2sdyBMeMm-kwxhBQv6J41j3oeQe','$2y$13$GLPY9dzMrFXO475CFmbFjOvbYN4q56cNxESdoE/II2okuy1AUlOIe',NULL,'mirulclevan@gmail.com','01126513351',10,2,'SMB:V3U8H5',NULL,1557711327,1557711327),
	(58,'MUHAMMAD NAIM BIN ABU BAKAR','5HqrzPJjjWxzh5K8Xw5Be6PU73X-0PaL','$2y$13$NwwfnAx1k4Wv0tPLXkB2uOFWbEU1FyxZRbUe.hNC51SeDsp4HF/yq',NULL,'muhammadnaimburn@yahoo.com','+6018-7684169',10,2,'SMB:V3U8H5',NULL,1557711427,1557711427),
	(59,'NUR FAZIRA BINTI NOOR AZMI','YI-iYttdrZmLhkIuSFb1PdrDLpeYo1k7','$2y$13$pLMcZnrcBwJ.xhL20LLmy.rDd/9DSq0YiMl9zy8avIbl8CudZh4Ea',NULL,'faziraazmi@gmail.com','+6018-7684129',10,2,'SMB:V3U8H5',NULL,1557711620,1557711620),
	(60,'MUHAMMAD IKMAL HAKIMI BIN AMIRUL AZHAR','yWei2u8hkQP3ziQA96kKFT6OiURpY9gd','$2y$13$fFSZOBkqSxllcBC5FI94n.t7y3rQFIcGVG3/TOIFG5gZZ0Ft2tjvC',NULL,'ikmalhakimi51@gmail.com','+601135476315',10,2,'SMB:V3U8H5',NULL,1557711827,1557711827),
	(61,'NUR AIMI AMALINA A\'AINAA BINTI HUSSAIN','qIDQdeuErJa4MX40symQX0MWpU-kSEht','$2y$13$D1lU3od5.KCRKTWlpKtaSuxDlsAblU6IsxtOcgSqYRDkgISRhgRAC',NULL,'aainaa_fwz@yahoo.com','+60179141126',10,2,'SMB:V3U8H5',NULL,1557711910,1557711910),
	(62,'MOHAMAD FAIZZUDIN BIN RAZALI','uP8v2JFt9b5IcXoc-7U1DDwO-ffJ4LKP','$2y$13$sfdM6UIwJhctAt74K4JCa.CdEctYo3aT/UpCNW1oEb9E4pwy14F1.',NULL,'faizzudin705@gmail.com','+6013-3775992',10,2,'SMB:V3U8H5',NULL,1557712192,1557712192),
	(63,'ROSE SHALIZA ABDUL MOKHTI','_dvWMtXltox7ZUCSVzHt9y_JhUC_RcRR','$2y$13$v8M2EvmKTaEm/SXD7wByJ.bkaGp5Br8QmNrGOKRhRrt3uMIM4qPku',NULL,'adique_rs@yahoo.com','+60126570187',10,2,'SMB:C3G1F8',NULL,1557796721,1557796721),
	(64,'Faris salih','tTG6soJeeMuhQymUjwiP8Bk1z7IJxcAp','$2y$13$COuhEo1RAEIXdF.PvCVOLuchFQwm25TngBjQGm2X0wdRIXkLjJA0m',NULL,'ccfaris@gmail.com','0105663253',10,2,'SMB:C3G1F8',NULL,1557919079,1558411052),
	(65,'Mohammad Suhaimi','azxsDDmmv_Fehrg1FAftB1SwnVQZgSdj','$2y$13$go8TufizmMc6XKmiSTH12.GvK4xttGRhGDnkQuLmcXnOGy1jDEnja',NULL,'send2mosu@yahoo.com','0123456789',10,2,'SMB:C3G1F8',NULL,1558146312,1558146312),
	(66,'Siti Norhairiza Binti Dari@Jauhari','d8vXpBfmhsEnepH6_u7633cZFjLuHE_x','$2y$13$Q0bGQMDsDwDwKTYt6/phqOU3M3s0Rdd.UtFvwitFvtAuvxGMlH556',NULL,'hairizajauhari@gmail.com','0193223002',10,2,'SMB:C3G1F8',NULL,1558183546,1558183546),
	(67,'Mohd Fahmi Bin Amron','FY2lYKEDTsaGZEJsvPLaQ69zogj1SBuZ','$2y$13$XotVM91vpXBLXXMhyBTvNugOZgq6XvhUASWhw9ziXOtidPSimghP6',NULL,'mohdfahmi1202@gmail.com','0125580807',10,2,'SMB:C3G1F8',NULL,1558287185,1558287185),
	(68,'Hardie Ahmad','JyuWmxk7IQOyxRiVUltL1oFEQ-boyBo_','$2y$13$aWpo4fbGUyCg0Fz843KJmOiRImAinF829yFEi40RlQUpJhNhlgD3a',NULL,'hardie.ahmad@yahoo.com','0195938090',10,1,'MB:L4D7K1',NULL,1558318650,1558318650),
	(69,'Faridahanim Zainuddin','mFjTuN_1UgUv82P0rLi62Sf27ZHLgelN','$2y$13$vKs4TAMRY.NKe3Bq5Xn.necH7ASWOTCBDcvxFAIIPMrfpHK973w9a',NULL,'aribizone@gmail.com','0134886304',10,1,'MB:H5N8P1',NULL,1558326097,1558326097),
	(70,'Aziz @ Azizan','3e8Au7IcluZpAeGy3homYXf7y6Ncv6mA','$2y$13$HI1QYxj/84Bea50JzuQIq.XWCwatROkehqf6cvHA8zHd5YBDkxtjm',NULL,'azizanokb@gmail.com','+601119454632',10,0,'NRC001',NULL,1558329578,1558329578),
	(71,'Marzuki Bin Muhamad','rvW19qKMXvBangj6o1fAGQ6vfyZtTdio','$2y$13$H/efbmhTndKGZXPcQQEyM.HCcCJloqC2ROiCK4wHmxtVUYKWIwdf6',NULL,'naturelangkawi@gmail.com','0194585747',10,2,'SMB:J1E7O7',NULL,1558336781,1558336781),
	(72,'MAZIAH BINTI SILEK','2QgFbvqDWU6EeOSRsRMpf6Gad4V495sI','$2y$13$rUFdd/fgaBgyyx1kHk3U/OvftWEZJCgkOOEG2RFgAT6I75T9Av2m6',NULL,'maz_mdib@yahoo.com','013 9337756',10,2,'SMB:C3G1F8',NULL,1558414712,1558414712);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_service
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_service`;

CREATE TABLE `user_service` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `img1` varchar(123) DEFAULT NULL,
  `img2` varchar(123) DEFAULT NULL,
  `img3` varchar(123) DEFAULT NULL,
  `img4` varchar(123) DEFAULT NULL,
  `img5` varchar(123) DEFAULT NULL,
  `img6` varchar(123) DEFAULT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`user_id`,`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_service` WRITE;
/*!40000 ALTER TABLE `user_service` DISABLE KEYS */;

INSERT INTO `user_service` (`id`, `user_id`, `service_id`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `description`, `created_at`, `updated_at`)
VALUES
	(1,2,2,NULL,NULL,NULL,NULL,NULL,NULL,'lai lai lai lai',1555903179,1555903179),
	(2,3,2,'/uploads/services/3_1_fishing.png',NULL,NULL,NULL,NULL,NULL,'Local cuisine at the best places',1555952373,1556696437),
	(3,3,3,'/uploads/services/3_1_scuba.png',NULL,NULL,NULL,NULL,NULL,'Happening area around Malaysia',1555952496,1556696464),
	(4,4,5,NULL,NULL,NULL,NULL,NULL,NULL,'Runaway bride',1555985049,1555985049),
	(5,5,2,'/uploads/services/5_1_fishing.png','/uploads/services/5_2_fishing.png',NULL,NULL,NULL,NULL,'Fishing by the Lake Of Terengganu',1556108078,1556108078),
	(6,10,5,NULL,NULL,NULL,NULL,NULL,NULL,'',1556514134,1556514134),
	(7,11,2,NULL,NULL,NULL,NULL,NULL,NULL,'LOVE THE SEA',1556519290,1556519290),
	(8,12,3,NULL,NULL,NULL,NULL,NULL,NULL,'love it',1556519870,1556519870),
	(9,13,4,NULL,NULL,NULL,NULL,NULL,NULL,'LOVE THE NATURE',1556520106,1556520106),
	(10,14,5,NULL,NULL,NULL,NULL,NULL,NULL,'LOVE THE PACE OF RUNNING',1556520278,1556520278),
	(11,15,5,NULL,NULL,NULL,NULL,NULL,NULL,'RUNNING IS MY PASSION',1556520426,1556520426),
	(12,16,3,NULL,NULL,NULL,NULL,NULL,NULL,'LOVE IT',1556520626,1556520626),
	(13,17,2,NULL,NULL,NULL,NULL,NULL,NULL,'LOVE TO SEE THE FISH',1556520783,1556520783),
	(14,18,4,'/uploads/services/18_1_batikchantingexperience.jpg','/uploads/services/18_2_batikchantingexperience.jpg',NULL,NULL,NULL,NULL,'Meet our local batik chanting with the most friendly villagers',1556520996,1556696801),
	(15,19,4,NULL,NULL,NULL,NULL,NULL,NULL,'LOVW',1556521133,1556521133),
	(16,20,2,NULL,NULL,NULL,NULL,NULL,NULL,'FISH',1556521288,1556521288),
	(17,21,3,NULL,NULL,NULL,NULL,NULL,NULL,'NONE',1556521573,1556521573),
	(18,22,5,NULL,NULL,NULL,NULL,NULL,NULL,'yes',1556521712,1556521712),
	(19,23,4,NULL,NULL,NULL,NULL,NULL,NULL,'yes',1556521823,1556521823),
	(20,24,5,NULL,NULL,NULL,NULL,NULL,NULL,'pace 1',1556521987,1556521987),
	(21,25,3,NULL,NULL,NULL,NULL,NULL,NULL,'yes',1556522106,1556522106),
	(22,26,4,NULL,NULL,NULL,NULL,NULL,NULL,'Great experience with locals',1556522239,1556694414),
	(23,27,2,NULL,NULL,NULL,NULL,NULL,NULL,'YES',1556522451,1556522451),
	(24,28,4,NULL,NULL,NULL,NULL,NULL,NULL,'TAK',1556522571,1556522571),
	(25,28,2,NULL,NULL,NULL,NULL,NULL,NULL,'YES',1556522587,1556522587),
	(26,29,2,NULL,NULL,NULL,NULL,NULL,NULL,'YE',1556522726,1556522726),
	(27,30,5,NULL,NULL,NULL,NULL,NULL,NULL,'YE',1556522869,1556522869),
	(28,31,4,NULL,NULL,NULL,NULL,NULL,NULL,'YA',1556522990,1556522990),
	(29,32,3,NULL,NULL,NULL,NULL,NULL,NULL,'YA',1556523147,1556523147),
	(30,33,5,NULL,NULL,NULL,NULL,NULL,NULL,'YE',1556523252,1556523252),
	(31,34,3,NULL,NULL,NULL,NULL,NULL,NULL,'YE',1556523374,1556523374),
	(32,35,5,NULL,NULL,NULL,NULL,NULL,NULL,'NOI',1556523465,1556523465),
	(33,2,1,'/uploads/services/2_1_historicalpalace.jpg','/uploads/services/2_2_historicalpalace.jpg','/uploads/services/2_3_historicalpalace.jpg','/uploads/services/2_4_historicalplace.jpg','/uploads/services/2_5_historicalplace.jpg','/uploads/services/2_6_historicalplace.jpg','best view historical place like building, nature',1556555991,1558423346),
	(34,47,1,NULL,NULL,NULL,NULL,NULL,NULL,'I will bring you all over historical areas',1556592260,1556592260),
	(35,10,2,NULL,NULL,NULL,NULL,NULL,NULL,'',1556622907,1556622907),
	(36,10,3,NULL,NULL,NULL,NULL,NULL,NULL,'',1556622936,1556622936),
	(37,10,8,NULL,NULL,NULL,NULL,NULL,NULL,'',1556622955,1556622955),
	(38,10,11,NULL,NULL,NULL,NULL,NULL,NULL,'',1556622989,1556622989),
	(39,10,13,NULL,NULL,NULL,NULL,NULL,NULL,'',1556623014,1556623014),
	(40,10,24,NULL,NULL,NULL,NULL,NULL,NULL,'',1556623057,1556623057),
	(41,10,25,NULL,NULL,NULL,NULL,NULL,NULL,'',1556623078,1556623078),
	(42,1,1,'/uploads/services/1_1_historicalpalace.png',NULL,NULL,NULL,NULL,NULL,'Historical Palace\r\nHistorical Palace',1556644091,1556644091),
	(43,26,2,NULL,NULL,NULL,NULL,NULL,NULL,'Local dishes at the best areas',1556694509,1556694509),
	(44,26,8,NULL,NULL,NULL,NULL,NULL,NULL,'Will ensure you will be entertain',1556694543,1556694543),
	(45,18,5,'/uploads/services/18_1_halaltravel(place,food,etc).jpg','/uploads/services/18_2_halaltravel(place,food,etc).jpg','/uploads/services/18_3_halaltravel(place,food,etc).jpg','/uploads/services/18_4_halaltravel(place,food,etc).jpg',NULL,NULL,'for those who interested for halal places, Mosque and everything related to islamic locations',1556695126,1556695594),
	(46,18,3,'/uploads/services/18_1_nightlive.jpg',NULL,NULL,NULL,NULL,NULL,'If you are restless at night, let me take you around the most happening places for relaxation ',1556695479,1556696756),
	(47,18,9,NULL,NULL,NULL,NULL,NULL,NULL,'We have the best river cruise in the world',1556695514,1556695514),
	(48,19,5,'/uploads/services/19_1_halaltravel(place,food,etc).jpg',NULL,NULL,NULL,NULL,NULL,'You can be sure that it is all about Halal food, Halal places and Halal products around our country',1556696319,1556696319),
	(49,3,1,'/uploads/services/3_1_historicalplace.png',NULL,NULL,NULL,NULL,NULL,'Historical places that will make you remember our country',1556696528,1558232156),
	(50,48,6,NULL,NULL,NULL,NULL,NULL,NULL,'',1556758251,1556758251),
	(51,48,10,NULL,NULL,NULL,NULL,NULL,NULL,'',1556758272,1556758272),
	(52,48,14,NULL,NULL,NULL,NULL,NULL,NULL,'',1556758294,1556758294),
	(53,49,5,NULL,NULL,NULL,NULL,NULL,NULL,'Get special food in kelantan... ',1556844221,1556844221),
	(54,3,5,'/uploads/services/3_1_halaltravel(place,food,etc).png',NULL,NULL,NULL,NULL,NULL,'Anywhere in Klang Valley',1556992579,1558231090),
	(56,56,1,NULL,NULL,NULL,NULL,NULL,NULL,'Many beautiful places available in Malaysia',1557630690,1557630720),
	(57,56,3,NULL,NULL,NULL,NULL,NULL,NULL,'Nightlife in Malaysia is something to remember',1557630759,1557630759),
	(58,56,5,NULL,NULL,NULL,NULL,NULL,NULL,'If you need Halal travel experience, i am the man',1557630803,1557630803),
	(59,56,24,NULL,NULL,NULL,NULL,NULL,NULL,'I am able to support you for business visit in Malaysia',1557630852,1557630852),
	(60,3,9,NULL,NULL,NULL,NULL,NULL,NULL,'',1557641257,1557641257),
	(61,55,1,NULL,NULL,NULL,NULL,NULL,NULL,'',1557672143,1557672143),
	(62,55,2,NULL,NULL,NULL,NULL,NULL,NULL,'',1557672168,1557672168),
	(63,55,3,NULL,NULL,NULL,NULL,NULL,NULL,'',1557672193,1557672193),
	(64,55,5,NULL,NULL,NULL,NULL,NULL,NULL,'',1557672219,1557672219),
	(65,55,6,NULL,NULL,NULL,NULL,NULL,NULL,'',1557672247,1557672247),
	(66,55,13,NULL,NULL,NULL,NULL,NULL,NULL,'',1557672273,1557672273),
	(67,55,25,NULL,NULL,NULL,NULL,NULL,NULL,'',1557672312,1557672312),
	(68,55,24,NULL,NULL,NULL,NULL,NULL,NULL,'',1557713330,1557713330),
	(69,3,4,NULL,NULL,NULL,NULL,NULL,NULL,'I will bring you to the traditional batik chanting experience in a village!',1558231159,1558231159),
	(70,3,24,NULL,NULL,NULL,NULL,NULL,NULL,'I will provide chauffeur service to your meeting destinations',1558231328,1558231328),
	(71,69,1,'/uploads/services/69_1_historicalplace.jpg','/uploads/services/69_2_historicalplace.jpg','/uploads/services/69_3_historicalplace.jpg','/uploads/services/69_4_historicalplace.jpg','/uploads/services/69_5_historicalplace.jpg',NULL,'A day city tour in Kuala Lumpur',1558328733,1558328733),
	(72,47,2,'/uploads/services/47_1_localcuisineincl.streethawkerfood.jpg',NULL,NULL,NULL,NULL,NULL,'',1558425941,1558425941),
	(73,47,3,'/uploads/services/47_1_night-life.jpg',NULL,NULL,NULL,NULL,NULL,'',1558426614,1558426614),
	(74,47,11,'/uploads/services/47_1_islandhopping.jpg',NULL,NULL,NULL,NULL,NULL,'',1558426774,1558426774),
	(75,47,4,'/uploads/services/47_1_batikchantingexperience.jpg',NULL,NULL,NULL,NULL,NULL,'',1558426850,1558426850);

/*!40000 ALTER TABLE `user_service` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
