-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: COVAC
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ADMIN`
--

DROP TABLE IF EXISTS `ADMIN`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ADMIN` (
  `admin_id` varchar(200) NOT NULL,
  `admin_name` varchar(200) DEFAULT NULL,
  `admin_password` varchar(200) DEFAULT NULL,
  `admin_phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ADMIN`
--

LOCK TABLES `ADMIN` WRITE;
/*!40000 ALTER TABLE `ADMIN` DISABLE KEYS */;
INSERT INTO `ADMIN` VALUES ('varun29','Varun KC','123',1231231231);
/*!40000 ALTER TABLE `ADMIN` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HOSPITAL`
--

DROP TABLE IF EXISTS `HOSPITAL`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `HOSPITAL` (
  `hospital_id` int(11) NOT NULL,
  `hospital_name` varchar(100) DEFAULT NULL,
  `hospital_loc` varchar(100) DEFAULT NULL,
  `hospital_pin` int(11) DEFAULT NULL,
  PRIMARY KEY (`hospital_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HOSPITAL`
--

LOCK TABLES `HOSPITAL` WRITE;
/*!40000 ALTER TABLE `HOSPITAL` DISABLE KEYS */;
INSERT INTO `HOSPITAL` VALUES (1,'BrookeField Hospital','Bengaluru',560037),(2,'Kilpauk Hospital','Chennai',600025),(3,'Apollo Hospital','Chennai',600018);
/*!40000 ALTER TABLE `HOSPITAL` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `aadhar_number` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER`
--

LOCK TABLES `USER` WRITE;
/*!40000 ALTER TABLE `USER` DISABLE KEYS */;
INSERT INTO `USER` VALUES (1,'Varun','K C','name@example.com','123123',123123123,'2022-01-20','9876543210'),(2,'John','Smith','name@email.co.in','123',123213123,'2022-01-05','1231231231'),(3,'John','Doe','123@123.com','231',123431,'2022-01-06','1231231233'),(4,'Test','Alert','alert@a.com','123',123123,'2012-02-01','1231231232'),(5,'Hemanth','Kumar N','alert@g.com','123',654234685,'2001-01-01','1231231238'),(6,'Test','123','alert@a.com','123',7654323,'2001-12-01','9876543211');
/*!40000 ALTER TABLE `USER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER_VACCINATION_FIRST`
--

DROP TABLE IF EXISTS `USER_VACCINATION_FIRST`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER_VACCINATION_FIRST` (
  `user_id` int(11) NOT NULL,
  `dose_date` date DEFAULT NULL,
  `vaccinator_id` int(11) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `vaccinator_id` (`vaccinator_id`),
  KEY `hospital_id` (`hospital_id`),
  KEY `vaccine_id` (`vaccine_id`),
  CONSTRAINT `USER_VACCINATION_FIRST_ibfk_1` FOREIGN KEY (`vaccinator_id`) REFERENCES `VACCINATOR_DETAIL` (`emp_id`) ON DELETE SET NULL,
  CONSTRAINT `USER_VACCINATION_FIRST_ibfk_2` FOREIGN KEY (`hospital_id`) REFERENCES `HOSPITAL` (`hospital_id`) ON DELETE SET NULL,
  CONSTRAINT `USER_VACCINATION_FIRST_ibfk_3` FOREIGN KEY (`vaccine_id`) REFERENCES `VACCINE` (`vaccine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER_VACCINATION_FIRST`
--

LOCK TABLES `USER_VACCINATION_FIRST` WRITE;
/*!40000 ALTER TABLE `USER_VACCINATION_FIRST` DISABLE KEYS */;
INSERT INTO `USER_VACCINATION_FIRST` VALUES (1,'2022-01-20',1,3,1),(2,'2022-01-29',2,2,1),(4,'2022-01-31',1,3,1),(5,'2022-02-11',1,3,2);
/*!40000 ALTER TABLE `USER_VACCINATION_FIRST` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER updateVaccineDoseFirst AFTER UPDATE ON USER_VACCINATION_FIRST FOR EACH ROW UPDATE VACCINE_INVENTORY SET doses_available=doses_available-1, check_date = CURDATE() WHERE VACCINE_INVENTORY.hospital_id IN (SELECT hospital_id FROM USER_VACCINATION_FIRST WHERE VACCINE_INVENTORY.vaccine_id IN (SELECT vaccine_id FROM USER_VACCINATION_FIRST WHERE USER_VACCINATION_FIRST.vaccinator_id IS NOT NULL)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `USER_VACCINATION_SECOND`
--

DROP TABLE IF EXISTS `USER_VACCINATION_SECOND`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER_VACCINATION_SECOND` (
  `user_id` int(11) NOT NULL,
  `dose_date` date DEFAULT NULL,
  `vaccinator_id` int(11) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `vaccinator_id` (`vaccinator_id`),
  KEY `hospital_id` (`hospital_id`),
  KEY `vaccine_id` (`vaccine_id`),
  CONSTRAINT `USER_VACCINATION_SECOND_ibfk_1` FOREIGN KEY (`vaccinator_id`) REFERENCES `VACCINATOR_DETAIL` (`emp_id`) ON DELETE SET NULL,
  CONSTRAINT `USER_VACCINATION_SECOND_ibfk_2` FOREIGN KEY (`hospital_id`) REFERENCES `HOSPITAL` (`hospital_id`) ON DELETE SET NULL,
  CONSTRAINT `USER_VACCINATION_SECOND_ibfk_3` FOREIGN KEY (`vaccine_id`) REFERENCES `VACCINE` (`vaccine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER_VACCINATION_SECOND`
--

LOCK TABLES `USER_VACCINATION_SECOND` WRITE;
/*!40000 ALTER TABLE `USER_VACCINATION_SECOND` DISABLE KEYS */;
INSERT INTO `USER_VACCINATION_SECOND` VALUES (1,'2022-01-31',1,3,1),(2,'2022-02-25',1,3,1),(4,'2022-03-02',1,3,1);
/*!40000 ALTER TABLE `USER_VACCINATION_SECOND` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER updateVaccineDoseSecond AFTER UPDATE ON USER_VACCINATION_SECOND FOR EACH ROW UPDATE VACCINE_INVENTORY SET doses_available=doses_available-1, check_date = CURDATE() WHERE VACCINE_INVENTORY.hospital_id IN (SELECT hospital_id FROM USER_VACCINATION_SECOND WHERE VACCINE_INVENTORY.vaccine_id IN (SELECT vaccine_id FROM USER_VACCINATION_SECOND WHERE USER_VACCINATION_SECOND.vaccinator_id IS NOT NULL)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `VACCINATOR_DETAIL`
--

DROP TABLE IF EXISTS `VACCINATOR_DETAIL`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `VACCINATOR_DETAIL` (
  `emp_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `hospital_id` (`hospital_id`),
  CONSTRAINT `VACCINATOR_DETAIL_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `HOSPITAL` (`hospital_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VACCINATOR_DETAIL`
--

LOCK TABLES `VACCINATOR_DETAIL` WRITE;
/*!40000 ALTER TABLE `VACCINATOR_DETAIL` DISABLE KEYS */;
INSERT INTO `VACCINATOR_DETAIL` VALUES (1,'Vaccinator','One','123','name@email.in',3,'9876543121'),(2,'Vaccinator ','Two','123','123@123.com',2,'1231231235');
/*!40000 ALTER TABLE `VACCINATOR_DETAIL` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `VACCINE`
--

DROP TABLE IF EXISTS `VACCINE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `VACCINE` (
  `vaccine_id` int(11) NOT NULL,
  `vaccine_name` varchar(100) DEFAULT NULL,
  `dev_company` varchar(100) DEFAULT NULL,
  `time_for_sec_dose` int(11) DEFAULT NULL,
  PRIMARY KEY (`vaccine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VACCINE`
--

LOCK TABLES `VACCINE` WRITE;
/*!40000 ALTER TABLE `VACCINE` DISABLE KEYS */;
INSERT INTO `VACCINE` VALUES (1,'COVAXIN','Bharat BioTech',28),(2,'COVISHIELD','AstraZeneca',84);
/*!40000 ALTER TABLE `VACCINE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `VACCINE_INVENTORY`
--

DROP TABLE IF EXISTS `VACCINE_INVENTORY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `VACCINE_INVENTORY` (
  `vaccine_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `check_date` date DEFAULT NULL,
  `doses_available` int(11) DEFAULT NULL,
  PRIMARY KEY (`vaccine_id`,`hospital_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VACCINE_INVENTORY`
--

LOCK TABLES `VACCINE_INVENTORY` WRITE;
/*!40000 ALTER TABLE `VACCINE_INVENTORY` DISABLE KEYS */;
INSERT INTO `VACCINE_INVENTORY` VALUES (1,1,'2021-01-01',20),(1,2,'2022-02-03',17),(1,3,'2022-02-03',49),(2,3,'2022-02-03',99);
/*!40000 ALTER TABLE `VACCINE_INVENTORY` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-23  8:25:13
