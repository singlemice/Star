-- MySQL dump 10.13  Distrib 5.5.12, for Win32 (x86)
--
-- Host: localhost    Database: Star
-- ------------------------------------------------------
-- Server version	5.5.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bill` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `R_ID` varchar(60) NOT NULL,
  `BILL_NO` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `IND_Bill` (`BILL_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='帐单表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill`
--

LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
/*!40000 ALTER TABLE `bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certificate`
--

DROP TABLE IF EXISTS `certificate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certificate` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) NOT NULL COMMENT '明细ID',
  `r_timestamp` varchar(40) NOT NULL COMMENT '明细时间戳',
  `r_flag` int(11) NOT NULL COMMENT '数据类型标志:0支付明细 1工时明细 2监考费',
  `c_no` varchar(40) NOT NULL DEFAULT '000000000' COMMENT '单据编号',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificate`
--

LOCK TABLES `certificate` WRITE;
/*!40000 ALTER TABLE `certificate` DISABLE KEYS */;
/*!40000 ALTER TABLE `certificate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `lesson` varchar(40) NOT NULL,
  `month` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES (1,'','一月'),(2,'2222','一月'),(3,'ewe','三月');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(20) DEFAULT NULL,
  `course` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'四月','4.25阳光财险'),(2,'一月','4.9期货'),(3,'二月','4.23人事干部开班'),(4,'三月','4.24华夏银行'),(5,'四月','4.25课酬'),(6,'四月','4.25阳光财险');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'远程教育中心');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fee`
--

DROP TABLE IF EXISTS `fee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fee` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `teacher` varchar(40) NOT NULL,
  `fee` double DEFAULT '0',
  `month` varchar(20) DEFAULT NULL,
  `lesson` varchar(40) DEFAULT NULL,
  `owner` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fee`
--

LOCK TABLES `fee` WRITE;
/*!40000 ALTER TABLE `fee` DISABLE KEYS */;
INSERT INTO `fee` VALUES (1,'李华燕',22233,'2012-02-01','English',NULL),(2,'程云',23323,'2012-02-01','English',NULL),(3,'秦怀建',12212,'2012-02-01','Math',NULL),(4,'秦怀建',12212,'2012-02-01','English',NULL),(5,'伍毅秀',221221,'2012-02-01','OCP',NULL),(6,'石庆芬',1221,'2012-03-01','OCP',NULL),(7,'李征',12212,'2012-04-01','OCA',NULL),(8,'方芳',12212,'2012-05-01','OCA',NULL),(9,'秦怀建',12212,'2012-05-01','OCP',NULL),(10,'伍毅秀',1221221,'2012-03-01','OCP',NULL),(11,'石庆芬',1221221,'2012-04-01','OCP',NULL),(12,'李征',12212,'2012-05-01','OCA',NULL),(13,'方芳',12212,'2012-05-01','OCP',NULL),(14,'山鹰',100,'2012-02-01','二月计算机监考',NULL),(15,'秀秀',100,'2012-02-01','二月计算机监考',NULL),(16,'PP',100,'2012-02-01','二月计算机监考',NULL),(17,'小白',100,'2012-02-01','二月计算机监考',NULL),(18,'猫米',100,'2012-02-01','二月计算机监考',NULL),(19,'山鹰',100,'2012-03-01','三月计算机监考',NULL),(20,'小白',100,'2012-03-01','三月计算机监考',NULL),(21,'秀秀',100,'2012-03-01','三月计算机监考',NULL),(22,'PP',100,'2012-04-01','四月计算机监考',NULL),(23,'猫米',100,'2012-04-01','四月计算机监考',NULL),(24,'小白',100,'2012-04-01','四月计算机监考',NULL),(25,'PP',100,'2012-05-01','四月计算机监考',NULL),(26,'猫米',100,'2012-05-01','五月计算机监考',NULL),(27,'秀秀',100,'2012-05-01','五月计算机监考',NULL),(28,'秀秀',150,'2012-02-01','二月英语测试',NULL),(29,'猫米',150,'2012-02-01','二月英语测试',NULL),(30,'PP',150,'2012-02-01','二月英语测试',NULL),(31,'小白',110,'2012-03-01','三月数学测试',NULL),(32,'山鹰',120,'2012-03-01','三月数学测试',NULL);
/*!40000 ALTER TABLE `fee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fee_type`
--

DROP TABLE IF EXISTS `fee_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fee_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) DEFAULT NULL,
  `Value` varchar(20) DEFAULT NULL,
  `Remark` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fee_type`
--

LOCK TABLES `fee_type` WRITE;
/*!40000 ALTER TABLE `fee_type` DISABLE KEYS */;
INSERT INTO `fee_type` VALUES (1,'劳务费','LWF',''),(2,'监考费','JKF',''),(3,'课酬','KC','');
/*!40000 ALTER TABLE `fee_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `function`
--

DROP TABLE IF EXISTS `function`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `function` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Function` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `function`
--

LOCK TABLES `function` WRITE;
/*!40000 ALTER TABLE `function` DISABLE KEYS */;
/*!40000 ALTER TABLE `function` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pay_detail`
--

DROP TABLE IF EXISTS `pay_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay_detail` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pay_type` varchar(40) DEFAULT NULL COMMENT '类型',
  `pay_date` datetime DEFAULT NULL COMMENT '录入时间',
  `pay_part` varchar(40) DEFAULT NULL COMMENT '部门',
  `pay_project` varchar(100) DEFAULT NULL COMMENT '项目名称',
  `pay_content` varchar(200) DEFAULT NULL COMMENT '内容摘要',
  `pay_num` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '金额',
  `pay_creator` varchar(40) DEFAULT NULL COMMENT '建表人',
  `pay_sign` varchar(40) DEFAULT NULL COMMENT '签字',
  `pay_month` varchar(20) DEFAULT NULL COMMENT '日期',
  `pay_remarks` varchar(80) DEFAULT NULL COMMENT '备注',
  `pay_state` varchar(20) DEFAULT NULL COMMENT '支付状态 0未支付  1支付',
  `owner` varchar(40) NOT NULL,
  `timestamp` varchar(40) NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay_detail`
--

LOCK TABLES `pay_detail` WRITE;
/*!40000 ALTER TABLE `pay_detail` DISABLE KEYS */;
INSERT INTO `pay_detail` VALUES (1,NULL,'2012-02-04 11:07:31',NULL,NULL,NULL,10000.01,NULL,NULL,NULL,NULL,NULL,'','2012-02-25 18:51:36'),(2,'12345','2012-02-04 11:07:31','继教院',' asdf','wefb',12345.00,'12345','2345tygf','四月','sdfv','0','','2012-02-25 18:51:36'),(3,NULL,'2012-02-04 11:07:31','继教院',' asdf','wefb',12345.00,'12345','2345tygf','一月','sdfv','未结','','2012-02-25 18:51:36'),(4,'报销单','2012-02-04 11:07:31','继教院',' asdf','wefb',12345.00,'12345','2345tygf','一月','sdfv145','0','','2012-02-25 18:51:36'),(5,NULL,'2012-02-04 11:07:31','继教院',' asdf','wefb',12345444.00,'12345','2345tygf','一月','sdfv','1','','2012-02-25 18:51:36'),(6,NULL,'2012-02-04 11:07:31','继教院','qwer','qwert',12345678.00,'1234','213','五月','wer','未结','','2012-02-25 18:51:36'),(7,NULL,'2012-02-04 11:07:31','继教院','adsfsdf','asdfsdfa',12345678.00,'sdf','sad','一月','asdf99','0','','2012-02-25 18:51:36'),(8,'报销单','2012-02-04 11:07:31','继教院','dfgl;\'c','3456',6578.00,'567890-','iop[','一月','jk','1','','2012-02-25 18:51:36'),(9,NULL,'2012-02-04 11:07:31','继教院','dfgl;\'\"','3456',65789.00,'567890-','iop[','五月','jkl','0','','2012-02-25 18:51:36'),(10,'支票','2012-02-04 11:07:31','继教院','qqq','123123123\'',12345678.00,'234\'','12345','六月','1234','0','','2012-02-25 18:51:36'),(11,'支票','2012-02-04 11:07:31','继教院','sdf','123456',12345.00,'1','1234','三月','12','1','','2012-02-25 18:51:36'),(12,'支票','2012-02-04 11:07:31','继教院','12345','12345',2345.00,'3456','3456','一月','3456','1','','2012-02-25 18:51:36'),(13,'支票','2012-02-04 11:07:31','继教院','453678','6776',57896.00,'689','8697','一月','698','1','','2012-02-25 18:51:36'),(14,NULL,'2012-02-04 11:07:31',NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,'','2012-02-25 18:51:36'),(15,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,'','2012-02-25 18:51:36'),(16,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,'','2012-02-25 18:51:36'),(17,'网教','2012-02-04 11:51:58','奥鹏','计算机','test测试\'',12.00,'star',NULL,'5','sadf','0','','2012-02-25 18:51:36'),(18,'报销单','2012-02-04 12:43:24','奥鹏','this is a test','sdfadfs',123.00,'234',NULL,'二月','asdf','0','','2012-02-25 18:51:36'),(19,'报销单','2012-02-04 13:59:41','1231','1213','12312',3123.00,'123',NULL,'六月','12312321','0','','2012-02-25 18:51:36'),(20,'aaa','2012-02-04 14:25:08','123','123','123',123123.00,'123123',NULL,'四月','1231323','0','','2012-02-25 18:51:36'),(21,'aaa','2012-02-04 14:25:51','123','123','123',123123.00,'123123',NULL,'四月','1231323','0','','2012-02-25 18:51:36'),(22,'支票','2012-02-13 10:29:39','继教院','全国计算机等级考试','上缴市考办考试费4453人',200289.00,'龙翠',NULL,'一月','支票2222','1','','2012-02-25 18:51:36'),(23,'支票','2012-02-13 10:30:39','继教院','全国计算机等级考试','上缴市考办考试费4453人',200289.00,'龙翠',NULL,'2011-01-07','支票','1','','2012-02-25 18:51:36'),(24,'另用单','2012-02-13 10:30:39','继教院','其他','2010年全年快递邮寄费',120.00,'龙翠',NULL,'2011-01-07','现金','1','','2012-02-25 18:51:36'),(25,'报销单','2012-02-13 10:30:39','继教院','会计继续教育','招生劳务（个人10*10、钢材5*10）',150.00,'伍毅秀',NULL,'一月','现金68666','1','','2012-02-25 18:51:36'),(26,'报销单','2012-02-13 10:30:39','继教院','会计从业','国资委基础班（8*200）',1600.00,'伍毅秀',NULL,'2011-01-07','现金','1','','2012-02-25 18:51:36'),(27,'报销单','2012-02-13 10:30:39','继教院','普通话','通用技校培训课酬12*40',480.00,'李华燕',NULL,'2011-01-07','现金','1','','2012-02-25 18:51:36'),(28,'报销单','2012-02-13 10:30:39','继教院','普通话','普通话劳务350及特师手语培训劳务800',1150.10,'李华燕',NULL,'2011-01-07','现金','1','','2012-02-25 18:51:36'),(29,'报销单','2012-02-13 10:30:39','继教院','天安保险','考试软件机房费1800+400，坐支250为监考费',250.00,'王普查',NULL,'2011-01-07','现金','1','','2012-02-25 18:51:36'),(30,'另用单','2012-02-13 10:30:39','继教院','其他','晓庄办公室门头写真费',120.00,'李华燕',NULL,'2011-01-07','现金','1','','2012-02-25 18:51:36'),(31,'报销单','2012-02-13 10:30:39','继教院','外语','新概念（720）、四级课酬（1280）',2000.00,'程云',NULL,'2011-01-07','二月转账','0','','2012-02-25 18:51:36'),(32,'另用单','2012-02-13 10:30:39','继教院','AP考试','杭州开考务会',3063.00,'贾静',NULL,'2011-01-07','现金','1','','2012-02-25 18:51:36'),(33,'报销单','2012-02-13 10:30:39','继教院','会计从业','国资委基础班（4*200）',800.00,'伍毅秀',NULL,'2011-02-14','二月转账','0','','2012-02-25 18:51:36'),(34,'2011-01-07','2011-01-07 00:00:00','继教院','全国计算机等级考试','上缴市考办考试费4453人',200289.00,'龙翠',NULL,NULL,'支票','1','','2012-02-25 18:51:36'),(35,'2011-01-07','2011-01-07 00:00:00','继教院','其他','2010年全年快递邮寄费',120.00,'龙翠',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(36,'2011-01-07','2011-01-07 00:00:00','继教院','会计继续教育','招生劳务（个人10*10、钢材5*10）',150.00,'伍毅秀',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(37,'2011-01-07','2011-01-07 00:00:00','继教院','会计从业','国资委基础班（8*200）',1600.00,'伍毅秀',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(38,'2011-01-07','2011-01-07 00:00:00','继教院','普通话','通用技校培训课酬12*40',480.00,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(39,'2011-01-07','2011-01-07 00:00:00','继教院','普通话','普通话劳务350及特师手语培训劳务800',1150.10,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(40,'2011-01-07','2011-01-07 00:00:00','继教院','天安保险','考试软件机房费1800+400，坐支250为监考费',250.00,'王普查',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(41,'2011-01-07','2011-01-07 00:00:00','继教院','其他','晓庄办公室门头写真费',120.00,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(42,'2011-01-07','2011-01-07 00:00:00','继教院','外语','新概念（720）、四级课酬（1280）',2000.00,'程云',NULL,NULL,'二月转账','0','','2012-02-25 18:51:36'),(43,'2011-01-07','2011-01-07 00:00:00','继教院','AP考试','杭州开考务会',3063.00,'贾静',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(44,'2011-02-14','2011-02-14 00:00:00','继教院','会计从业','国资委基础班（4*200）',800.00,'伍毅秀',NULL,NULL,'二月转账','0','','2012-02-25 18:51:36'),(45,'2011-01-07','2011-01-07 00:00:00','继教院','全国计算机等级考试','上缴市考办考试费4453人',200289.00,'龙翠',NULL,NULL,'支票','1','','2012-02-25 18:51:36'),(46,'2011-01-07','2011-01-07 00:00:00','继教院','其他','2010年全年快递邮寄费',120.00,'龙翠',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(47,'2011-01-07','2011-01-07 00:00:00','继教院','会计继续教育','招生劳务（个人10*10、钢材5*10）',150.00,'伍毅秀',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(48,'2011-01-07','2011-01-07 00:00:00','继教院','会计从业','国资委基础班（8*200）',1600.00,'伍毅秀',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(49,'2011-01-07','2011-01-07 00:00:00','继教院','普通话','通用技校培训课酬12*40',480.00,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(50,'2011-01-07','2011-01-07 00:00:00','继教院','普通话','普通话劳务350及特师手语培训劳务800',1150.10,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(51,'2011-01-07','2011-01-07 00:00:00','继教院','天安保险','考试软件机房费1800+400，坐支250为监考费',250.00,'王普查',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(52,'2011-01-07','2011-01-07 00:00:00','继教院','其他','晓庄办公室门头写真费',120.00,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(53,'2011-01-07','2011-01-07 00:00:00','继教院','外语','新概念（720）、四级课酬（1280）',2000.00,'程云',NULL,NULL,'二月转账','0','','2012-02-25 18:51:36'),(54,'2011-01-07','2011-01-07 00:00:00','继教院','AP考试','杭州开考务会',3063.00,'贾静',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(55,'2011-02-14','2011-02-14 00:00:00','继教院','会计从业','国资委基础班（4*200）',800.00,'伍毅秀',NULL,NULL,'二月转账','0','','2012-02-25 18:51:36'),(56,'支票','2011-01-07 00:00:00','继教院','全国计算机等级考试','上缴市考办考试费4453人',200289.00,'龙翠',NULL,NULL,'支票','1','','2012-02-25 18:51:36'),(57,'另用单','2011-01-07 00:00:00','继教院','其他','2010年全年快递邮寄费',120.00,'龙翠',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(58,'报销单','2011-01-07 00:00:00','继教院','会计继续教育','招生劳务（个人10*10、钢材5*10）',150.00,'伍毅秀LO',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(59,'报销单','2011-01-07 00:00:00','继教院','会计从业','国资委基础班（8*200）',1600.00,'伍毅秀',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(60,'报销单','2011-01-07 00:00:00','继教院','普通话','通用技校培训课酬12*40',480.00,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(61,'报销单','2011-01-07 00:00:00','继教院','普通话','普通话劳务350及特师手语培训劳务800',1150.10,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(62,'报销单','2011-01-07 00:00:00','继教院','天安保险','考试软件机房费1800+400，坐支250为监考费',250.00,'王普查',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(63,'另用单','2011-01-07 00:00:00','继教院','其他','晓庄办公室门头写真费',120.00,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(64,'报销单','2011-01-07 00:00:00','继教院','外语','新概念（720）、四级课酬（1280）',2000.00,'程云',NULL,NULL,'二月转账','0','','2012-02-25 18:51:36'),(65,'另用单','2011-01-07 00:00:00','继教院','AP考试','杭州开考务会',3063.00,'贾静',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(66,'报销单','2011-02-14 00:00:00','继教院','会计从业','国资委基础班（4*200）',800.00,'伍毅秀',NULL,NULL,'二月转账','0','','2012-02-25 18:51:36'),(67,'支票','2011-01-07 00:00:00','继教院','全国计算机等级考试','上缴市考办考试费4453人',200289.00,'龙翠',NULL,NULL,'支票','1','','2012-02-25 18:51:36'),(68,'另用单','2011-01-07 00:00:00','继教院','其他','2010年全年快递邮寄费',120.00,'龙翠',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(69,'报销单','2011-01-07 00:00:00','继教院','会计继续教育','招生劳务（个人10*10、钢材5*10）',150.00,'伍毅秀LO',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(70,'报销单','2011-01-07 00:00:00','继教院','会计从业','国资委基础班（8*200）',1600.00,'伍毅秀',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(71,'报销单','2011-01-07 00:00:00','继教院','普通话','通用技校培训课酬12*40',480.00,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(72,'报销单','2011-01-07 00:00:00','继教院','普通话','普通话劳务350及特师手语培训劳务800',1150.10,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(73,'报销单','2011-01-07 00:00:00','继教院','天安保险','考试软件机房费1800+400，坐支250为监考费',250.00,'王普查',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(74,'另用单','2011-01-07 00:00:00','继教院','其他','晓庄办公室门头写真费',120.00,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(75,'报销单','2011-01-07 00:00:00','继教院','外语','新概念（720）、四级课酬（1280）',2000.00,'程云',NULL,NULL,'二月转账','0','','2012-02-25 18:51:36'),(76,'另用单','2011-01-07 00:00:00','继教院','AP考试','杭州开考务会',3063.00,'贾静',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(77,'报销单','2011-02-14 00:00:00','继教院','会计从业','国资委基础班（4*200）',800.00,'伍毅秀',NULL,NULL,'二月转账','0','','2012-02-25 18:51:36'),(78,'支票','2011-01-07 00:00:00','继教院','全国计算机等级考试','上缴市考办考试费4453人',200289.00,'龙翠',NULL,NULL,'支票','1','','2012-02-25 18:51:36'),(79,'另用单','2011-01-07 00:00:00','继教院','其他','2010年全年快递邮寄费',120.00,'龙翠',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(80,'报销单','2011-01-07 00:00:00','继教院','会计继续教育','招生劳务（个人10*10、钢材5*10）',150.00,'伍毅秀LO',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(81,'报销单','2011-01-07 00:00:00','继教院','会计从业','国资委基础班（8*200）',1600.00,'伍毅秀',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(82,'报销单','2011-01-07 00:00:00','继教院','普通话','通用技校培训课酬12*40',480.00,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(83,'报销单','2011-01-07 00:00:00','继教院','普通话','普通话劳务350及特师手语培训劳务800',1150.10,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(84,'报销单','2011-01-07 00:00:00','继教院','天安保险','考试软件机房费1800+400，坐支250为监考费',250.00,'王普查',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(85,'另用单','2011-01-07 00:00:00','继教院','其他','晓庄办公室门头写真费',120.00,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(86,'报销单','2011-01-07 00:00:00','继教院','外语','新概念（720）、四级课酬（1280）',2000.00,'程云',NULL,NULL,'二月转账','0','','2012-02-25 18:51:36'),(87,'另用单','2011-01-07 00:00:00','继教院','AP考试','杭州开考务会',3063.00,'贾静',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(88,'报销单','2011-02-14 00:00:00','继教院','会计从业','国资委基础班（4*200）',800.00,'伍毅秀',NULL,NULL,'二月转账','0','','2012-02-25 18:51:36'),(89,'支票','2011-01-07 00:00:00','继教院','全国计算机等级考试','上缴市考办考试费4453人',200289.00,'龙翠',NULL,NULL,'支票','1','','2012-02-25 18:51:36'),(90,'另用单','2011-01-07 00:00:00','继教院','其他','2010年全年快递邮寄费',120.00,'龙翠',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(91,'报销单','2011-01-07 00:00:00','继教院','会计继续教育','招生劳务（个人10*10、钢材5*10）',150.00,'伍毅秀LO',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(92,'报销单','2011-01-07 00:00:00','继教院','会计从业','国资委基础班（8*200）',1600.00,'伍毅秀',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(93,'报销单','2011-01-07 00:00:00','继教院','普通话','通用技校培训课酬12*40',480.00,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(94,'报销单','2011-01-07 00:00:00','继教院','普通话','普通话劳务350及特师手语培训劳务800',1150.10,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(95,'报销单','2011-01-07 00:00:00','继教院','天安保险','考试软件机房费1800+400，坐支250为监考费',250.00,'王普查',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(96,'另用单','2011-01-07 00:00:00','继教院','其他','晓庄办公室门头写真费',120.00,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(97,'报销单','2011-01-07 00:00:00','继教院','外语','新概念（720）、四级课酬（1280）',2000.00,'程云',NULL,NULL,'二月转账','0','','2012-02-25 18:51:36'),(98,'另用单','2011-01-07 00:00:00','继教院','AP考试','杭州开考务会',3063.00,'贾静',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(99,'报销单','2011-02-14 00:00:00','继教院','会计从业','国资委基础班（4*200）',800.00,'伍毅秀',NULL,NULL,'二月转账','0','','2012-02-25 18:51:36'),(100,'支票','2011-01-07 00:00:00','继教院','全国计算机等级考试','上缴市考办考试费4453人',200289.00,'龙翠',NULL,NULL,'支票','1','','2012-02-25 18:51:36'),(101,'另用单','2011-01-07 00:00:00','继教院','其他','2010年全年快递邮寄费',120.00,'龙翠',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(102,'报销单','2011-01-07 00:00:00','继教院','会计继续教育','招生劳务（个人10*10、钢材5*10）',150.00,'伍毅秀LO',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(103,'报销单','2011-01-07 00:00:00','继教院','会计从业','国资委基础班（8*200）',1600.00,'伍毅秀',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(104,'报销单','2011-01-07 00:00:00','继教院','普通话','通用技校培训课酬12*40',480.00,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(105,'报销单','2011-01-07 00:00:00','继教院','普通话','普通话劳务350及特师手语培训劳务800',1150.10,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(106,'报销单','2011-01-07 00:00:00','继教院','天安保险','考试软件机房费1800+400，坐支250为监考费',250.00,'王普查',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(107,'另用单','2011-01-07 00:00:00','继教院','其他','晓庄办公室门头写真费',120.00,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(108,'报销单','2011-01-07 00:00:00','继教院','外语','新概念（720）、四级课酬（1280）',2000.00,'程云',NULL,NULL,'二月转账','0','','2012-02-25 18:51:36'),(109,'另用单','2011-01-07 00:00:00','继教院','AP考试','杭州开考务会',3063.00,'贾静',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(110,'报销单','2011-02-14 00:00:00','继教院','会计从业','国资委基础班（4*200）',800.00,'伍毅秀',NULL,NULL,'二月转账','0','','2012-02-25 18:51:36'),(111,'支票','2011-01-07 00:00:00','继教院','全国计算机等级考试','上缴市考办考试费4453人',200289.00,'龙翠',NULL,NULL,'支票','1','','2012-02-25 18:51:36'),(112,'另用单','2011-01-07 00:00:00','继教院','其他','2010年全年快递邮寄费',120.00,'龙翠',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(113,'报销单','2011-01-07 00:00:00','继教院','会计继续教育','招生劳务（个人10*10、钢材5*10）',150.00,'伍毅秀LO',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(114,'报销单','2011-01-07 00:00:00','继教院','会计从业','国资委基础班（8*200）',1600.00,'伍毅秀',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(115,'报销单','2011-01-07 00:00:00','继教院','普通话','通用技校培训课酬12*40',480.00,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(116,'报销单','2011-01-07 00:00:00','继教院','普通话','普通话劳务350及特师手语培训劳务800',1150.10,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(117,'报销单','2011-01-07 00:00:00','继教院','天安保险','考试软件机房费1800+400，坐支250为监考费',250.00,'王普查',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(118,'另用单','2011-01-07 00:00:00','继教院','其他','晓庄办公室门头写真费',120.00,'李华燕',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(119,'报销单','2011-01-07 00:00:00','继教院','外语','新概念（720）、四级课酬（1280）',2000.00,'程云',NULL,NULL,'二月转账','0','','2012-02-25 18:51:36'),(120,'另用单','2011-01-07 00:00:00','继教院','AP考试','杭州开考务会',3063.00,'贾静',NULL,NULL,'现金','1','','2012-02-25 18:51:36'),(121,'报销单','2011-02-14 00:00:00','继教院','会计从业','国资委基础班（4*200）',800.00,'伍毅秀',NULL,NULL,'二月转账','0','','2012-02-25 18:51:36'),(122,'111','2012-02-19 18:13:40','1222','123122','12212',122112.00,'11',NULL,'','222','0','','2012-02-19 00:00:00'),(123,'111','2012-02-19 18:14:42','11122','1221','12331',12313.00,'123',NULL,'','123213','1','','2012-02-19 00:00:00'),(124,'12212','2012-02-19 18:16:10','123123','12','123',123123.00,'123453',NULL,'','123123','0','李洪超','2012-02-19 00:00:00'),(125,'aaa','2012-02-19 18:22:29','123123','asdf11','1212',112.00,'21',NULL,'','123','1','李洪超','2012-02-19 00:00:00'),(126,'aaa','2012-02-19 18:22:47','123123','asdf11','1212',112.00,'21',NULL,'','123','1','李洪超','2012-02-19 00:00:00'),(127,'aaa','2012-02-19 18:28:12','123123','project','qqqq',123.00,'qqqq',NULL,'','qwwqw','1','李洪超','2012-02-19 00:00:00');
/*!40000 ALTER TABLE `pay_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_item`
--

DROP TABLE IF EXISTS `project_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_item` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `project` varchar(80) DEFAULT NULL,
  `remark` varchar(20) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_item`
--

LOCK TABLES `project_item` WRITE;
/*!40000 ALTER TABLE `project_item` DISABLE KEYS */;
INSERT INTO `project_item` VALUES (3,'远程教育',NULL),(13,'人力资源',''),(14,'会计从业',''),(15,'干部培训','');
/*!40000 ALTER TABLE `project_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Role` varchar(20) NOT NULL,
  `code` varchar(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'管理员','0000'),(2,'内勤','0100'),(3,'普通用户','0010'),(4,'其它','0001'),(6,'报表','0011');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `teacher` varchar(20) NOT NULL,
  `remark` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES (1,'秦怀建',NULL),(2,'吴忠麟',NULL),(3,'贾静',NULL),(4,'龙翠',NULL),(5,'李华燕',NULL),(6,'伍毅秀',NULL),(7,'石庆芬',NULL),(8,'王普查',NULL),(9,'程云',NULL),(10,'杜智琳',NULL),(11,'倪晓兰',NULL),(12,'李征',NULL),(13,'呙欣',NULL),(14,'黄亚楠',NULL),(15,'陆灵玲',NULL),(16,'何媛',NULL),(17,'方芳',NULL),(18,'陶陵珺',NULL),(19,'李胜男',NULL),(20,'高静',NULL),(21,'葛丽华',NULL),(22,'吴云云',NULL),(23,'徐锡娜',NULL),(24,'张林珍',NULL),(25,'许晓彤',NULL),(26,'魏勇钢',NULL),(27,'高洋',NULL),(28,'张无忌',NULL),(29,'张芸',NULL),(30,'杨蔚',NULL),(31,'杨晓祥',NULL),(32,'李磊',NULL),(33,'陈卓',NULL),(34,'刘俊杰',NULL),(35,'彭涛',NULL),(36,'徐兴江',NULL),(37,'王宏超',NULL),(44,'张老师',NULL),(45,'李老师',NULL),(46,'王老师',NULL),(47,'aaa',NULL);
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload`
--

DROP TABLE IF EXISTS `upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upload` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(80) NOT NULL,
  `path` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL,
  `owner` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload`
--

LOCK TABLES `upload` WRITE;
/*!40000 ALTER TABLE `upload` DISABLE KEYS */;
/*!40000 ALTER TABLE `upload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL,
  `passwd` varchar(40) DEFAULT NULL,
  `role` int(11) DEFAULT '0',
  `realname` varchar(40) NOT NULL,
  `department` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'admin','21232f297a57a5a743894a0e4a801fc3',1,'李洪超',1),(3,'aaa','47bce5c74f589f4867dbd57e9ca9f808',3,'aaa',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `working`
--

DROP TABLE IF EXISTS `working`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `working` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL COMMENT '付款日期',
  `project` varchar(40) DEFAULT NULL,
  `fee_type` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL COMMENT '姓名',
  `workload` float NOT NULL DEFAULT '0' COMMENT '工作量',
  `cost` float NOT NULL DEFAULT '0' COMMENT '费用标准',
  `Subsidy` float NOT NULL DEFAULT '0' COMMENT '补贴',
  `num` float NOT NULL COMMENT '金额',
  `payment` varchar(20) DEFAULT NULL COMMENT '结帐方式',
  `working` varchar(400) DEFAULT NULL,
  `remark` varchar(400) DEFAULT NULL COMMENT '备注',
  `First` time DEFAULT NULL,
  `Last` time DEFAULT NULL,
  `owner` int(11) NOT NULL,
  `timeflag` varchar(20) DEFAULT NULL,
  `billno` varchar(20) DEFAULT NULL,
  `is_print` tinyint(4) DEFAULT '0',
  `payCreator` varchar(40) DEFAULT NULL,
  `manual_num` float DEFAULT '0' COMMENT '手工金额',
  `invalid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `IND_Owner` (`owner`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `working`
--

LOCK TABLES `working` WRITE;
/*!40000 ALTER TABLE `working` DISABLE KEYS */;
INSERT INTO `working` VALUES (1,'2012-02-08 00:00:00',NULL,NULL,'star',10,20,12,1200,'现金','qewsfsfdsfs\'',NULL,NULL,NULL,2,NULL,'',0,NULL,0,0),(2,'2012-02-08 09:55:16',NULL,NULL,'star',10,20,12,1200,'现金','qewsfsfdsfs\'',NULL,NULL,NULL,2,NULL,'',0,NULL,0,0),(3,'2012-02-08 11:20:53','test',NULL,'冰镇牛奶',10,20,12,1200,'银行转帐','234',NULL,NULL,NULL,2,NULL,'',0,NULL,0,0),(4,'2012-02-08 11:24:09','test',NULL,'冰镇牛奶',10,20,12,1200,'银行转帐','123456','123123',NULL,NULL,2,NULL,'',0,NULL,0,0),(5,'2012-01-11 00:00:00','Computer',NULL,'赵卉',20,10,0,200,'','会计继续教育招生劳务（个人）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(6,'2012-01-11 00:00:00','Computer',NULL,'赵卉',20,10,0,200,'','会计继续教育招生劳务（个人）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(7,'2012-01-11 00:00:00','Test',NULL,'杨涛',24,10,0,240,'','会计继续教育招生劳务（南京银行）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(8,'2012-01-11 00:00:00','AAA',NULL,'张军',4,100,0,400,'','会计继续教育课酬（新街口）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(9,'2012-01-11 00:00:00','CCC',NULL,'曲钰',0,0,0,2000,'','劳务费','',NULL,NULL,2,NULL,'',0,NULL,0,0),(10,'2012-01-11 00:00:00','C',NULL,'徐瑶',0,0,0,1000,'转账','学生实习费（2011年12月）','南京银行',NULL,NULL,2,NULL,'',0,NULL,0,0),(11,'2012-01-11 00:00:00','Computer',NULL,'赵卉',20,10,0,200,'','会计继续教育招生劳务（个人）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(12,'2012-01-11 00:00:00','Test',NULL,'杨涛',24,10,0,240,'','会计继续教育招生劳务（南京银行）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(13,'2012-01-11 00:00:00','AAA',NULL,'张军',4,100,0,400,'','会计继续教育课酬（新街口）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(14,'2012-01-11 00:00:00','CCC',NULL,'曲钰',0,0,0,2000,'','劳务费','',NULL,NULL,2,NULL,'',0,NULL,0,0),(15,'2012-01-11 00:00:00','C',NULL,'徐瑶',0,0,0,1000,'转账','学生实习费（2011年12月）','南京银行',NULL,NULL,2,NULL,'',0,NULL,0,0),(16,'2012-01-11 00:00:00','Computer',NULL,'赵卉',20,10,0,200,'','会计继续教育招生劳务（个人）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(17,'2012-01-11 00:00:00','Test',NULL,'杨涛',24,10,0,240,'','会计继续教育招生劳务（南京银行）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(18,'2012-01-11 00:00:00','AAA',NULL,'张军',4,100,0,400,'','会计继续教育课酬（新街口）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(19,'2012-01-11 00:00:00','CCC',NULL,'曲钰',0,0,0,2000,'','劳务费','',NULL,NULL,2,NULL,'',0,NULL,0,0),(20,'2012-01-11 00:00:00','C',NULL,'徐瑶',0,0,0,1000,'转账','学生实习费（2011年12月）','南京银行',NULL,NULL,2,NULL,'',0,NULL,0,0),(21,'2012-01-11 00:00:00','Computer',NULL,'赵卉',20,10,0,200,'','会计继续教育招生劳务（个人）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(22,'2012-01-11 00:00:00','Test',NULL,'杨涛',24,10,0,240,'','会计继续教育招生劳务（南京银行）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(23,'2012-01-11 00:00:00','AAA',NULL,'张军',4,100,0,400,'','会计继续教育课酬（新街口）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(24,'2012-01-11 00:00:00','CCC',NULL,'曲钰',0,0,0,2000,'','劳务费','',NULL,NULL,2,NULL,'',0,NULL,0,0),(25,'2012-01-11 00:00:00','C',NULL,'徐瑶',0,0,0,1000,'转账','学生实习费（2011年12月）','南京银行',NULL,NULL,2,NULL,'',0,NULL,0,0),(26,'2012-01-11 00:00:00','Computer',NULL,'赵卉',20,10,0,200,'','会计继续教育招生劳务（个人）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(27,'2012-01-11 00:00:00','Test',NULL,'杨涛',24,10,0,240,'','会计继续教育招生劳务（南京银行）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(28,'2012-01-11 00:00:00','AAA',NULL,'张军',4,100,0,400,'','会计继续教育课酬（新街口）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(29,'2012-01-11 00:00:00','CCC',NULL,'曲钰',0,0,0,2000,'','劳务费','',NULL,NULL,2,NULL,'',0,NULL,0,0),(30,'2012-01-11 00:00:00','C',NULL,'徐瑶',0,0,0,1000,'转账','学生实习费（2011年12月）','南京银行',NULL,NULL,2,NULL,'',0,NULL,0,0),(31,'2012-01-11 00:00:00','Computer',NULL,'赵卉',20,10,0,200,'','会计继续教育招生劳务（个人）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(32,'2012-01-11 00:00:00','Test',NULL,'杨涛',24,10,0,240,'','会计继续教育招生劳务（南京银行）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(33,'2012-01-11 00:00:00','AAA',NULL,'张军',4,100,0,400,'','会计继续教育课酬（新街口）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(34,'2012-01-11 00:00:00','CCC',NULL,'曲钰',0,0,0,2000,'','劳务费','',NULL,NULL,2,NULL,'',0,NULL,0,0),(35,'2012-01-11 00:00:00','C',NULL,'徐瑶',0,0,0,1000,'转账','学生实习费（2011年12月）','南京银行',NULL,NULL,2,NULL,'',0,NULL,0,0),(36,'2012-01-11 00:00:00','Computer',NULL,'赵卉',20,10,0,200,'','会计继续教育招生劳务（个人）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(37,'2012-01-11 00:00:00','Test',NULL,'杨涛',24,10,0,240,'','会计继续教育招生劳务（南京银行）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(38,'2012-01-11 00:00:00','AAA',NULL,'张军',4,100,0,400,'','会计继续教育课酬（新街口）','',NULL,NULL,2,NULL,'',0,NULL,0,0),(39,'2012-01-11 00:00:00','CCC',NULL,'曲钰',0,0,0,2000,'','劳务费','',NULL,NULL,2,NULL,'',0,NULL,0,0),(40,'2012-01-11 00:00:00','C',NULL,'徐瑶',0,0,0,1000,'转账','学生实习费（2011年12月）','南京银行',NULL,NULL,2,NULL,'',0,NULL,0,0),(41,'2012-03-10 18:35:38','qw',NULL,'qw',0,0,0,0,'','','',NULL,NULL,1,'1331375721473','',0,NULL,0,0),(42,'2012-03-10 19:44:42','qw',NULL,'qw',0,0,0,0,'','','',NULL,NULL,1,'1331379882042','',0,NULL,0,0),(43,'2012-03-10 19:44:55','qw',NULL,'qw22',0,0,0,10,'','','',NULL,NULL,1,'1331379895021','',0,NULL,0,0),(44,'2012-03-10 19:45:32','qw',NULL,'qw',0,0,0,0,'','','',NULL,NULL,1,'1331379932669','',0,NULL,0,0),(45,'2012-03-10 19:48:04','22',NULL,'23',0,0,0,0,'','23','',NULL,NULL,1,'1331380084409','',0,NULL,0,0),(46,'2012-03-10 20:11:27','11',NULL,'12',0,0,0,1110,'','121212122','',NULL,NULL,1,'1331381487389','',0,NULL,0,0),(47,'2012-03-10 20:13:32','锻炼',NULL,'锉',0,0,0,0,'','铝合金','',NULL,NULL,1,'1331381612302','',0,NULL,0,0),(48,'2012-03-10 20:17:50','asdf',NULL,'asdf',0,0,0,0,'','asdf','',NULL,NULL,1,'1331381870598','',0,NULL,0,0),(49,'2012-03-10 20:18:38','asdf',NULL,'sdf',0,0,0,0,'','asdf','',NULL,NULL,1,'1331381918409','',0,NULL,0,0),(50,'2012-03-10 20:19:36','qwe',NULL,'qwe',0,0,0,0,'','qwe','',NULL,NULL,1,'1331381976424','2012031200106',0,NULL,0,0),(51,'2012-03-10 20:20:18','asd',NULL,'asd',0,0,0,0,'','asd','',NULL,NULL,1,'1331382018366','2012031200106',0,NULL,0,0),(52,'2012-03-10 20:21:18','qwe',NULL,'we',0,0,0,0,'','qwe','',NULL,NULL,1,'1331382078045','2012031200106',0,NULL,0,0),(53,'2012-03-10 20:22:06','qwe',NULL,'qwe',0,0,0,0,'','qwe','',NULL,NULL,1,'1331382125977','2012031200106',0,NULL,0,0),(54,'2012-03-10 20:22:49','qwe',NULL,'q',0,0,0,0,'','qwe','',NULL,NULL,1,'1331382169671','2012031200106',0,NULL,0,0),(55,'2012-03-10 20:23:20','qwe',NULL,'qe',0,0,0,0,'','qwe','',NULL,NULL,1,'1331382200131','',0,NULL,0,0),(56,'2012-03-10 20:23:45','qwe',NULL,'qwe',0,0,0,0,'','qwe','',NULL,NULL,1,'1331382225067','',0,NULL,0,0),(57,'2012-03-10 20:26:13','qwe',NULL,'qwe',0,0,0,0,'','qwe','',NULL,NULL,1,'1331382373567','',0,NULL,0,0),(58,'2012-03-10 20:26:23','qwe',NULL,'qwe',0,0,0,0,'','qwe','',NULL,NULL,1,'1331382383561','',0,NULL,0,0),(59,'2012-03-10 20:27:55','ssdddfdf',NULL,'ewq',0,0,0,0,'','wert','',NULL,NULL,1,'1331382475800','',0,NULL,0,0),(60,'2012-03-10 20:29:19','asd',NULL,'asd',0,0,0,0,'','asd','',NULL,NULL,1,'1331382559105','',0,NULL,0,0),(61,'2012-03-10 21:20:13','asdf',NULL,'safd',0,0,0,0,'另用单','asdf','',NULL,NULL,1,'1331385613680','',0,NULL,0,0),(62,'2012-03-10 21:23:33','asdf',NULL,'safd',0,0,0,0,'另用单','asdf','',NULL,NULL,1,'1331385813402','',0,'asdf',0,0),(63,'2012-03-10 21:28:49','asdf',NULL,'asdf',0,0,0,0,'银行转帐','sadfhgjk','asdf',NULL,NULL,1,'1331386129830','',0,'asfd',0,0),(64,'2012-03-11 18:08:36','qw',NULL,'qw',0,0,0,0,'银行转帐','qw','qw',NULL,NULL,1,'1331460516325','',0,'qw',0,0),(65,'2012-03-11 18:10:09','asfd',NULL,'asdf',0,0,0,0,'银行转帐','asfd','asdf',NULL,NULL,1,'1331460609696','',0,'asdf',0,0),(66,'2012-03-11 18:11:34','qw',NULL,'qw',0,0,0,0,'银行转帐','qw','qw',NULL,NULL,1,'1331460694247','',0,'qw',0,0),(67,'2012-03-11 18:13:02','as',NULL,'as',0,0,0,0,'银行转帐','as','as',NULL,NULL,1,'1331460779845','',0,'as',0,0),(68,'2012-03-11 18:24:31','qw',NULL,'qw',0,0,0,0,'银行转帐','qw','qw',NULL,NULL,1,'1331461470392','',0,'qw',0,0),(69,'2012-03-11 18:27:40','as',NULL,'as',0,0,0,0,'现金','as','as',NULL,NULL,1,'1331461659597','',0,'as',0,0),(70,'2012-03-11 18:28:34','qw',NULL,'qw',0,0,0,0,'银行转帐','qw','qw',NULL,NULL,1,'1331461714153','',0,'qw',0,0),(71,'2012-03-11 18:36:28','asdf',NULL,'asdf',0,0,0,0,'银行转帐','asdf','asdf',NULL,NULL,1,'1331462188662','',0,'asdf',0,0),(72,'2012-03-11 18:37:12','asdf',NULL,'asdf',0,0,0,0,'银行转帐','asdf','asdf',NULL,NULL,1,'1331462232358','',0,'asdf',0,0),(73,'2012-03-11 18:38:08','aw',NULL,'asd',0,0,0,0,'银行转帐','asd','asd',NULL,NULL,1,'1331462288519','',0,'asd',0,0),(74,'2012-03-11 18:40:11','asdf',NULL,'asfd',0,0,0,0,'银行转帐','asdf','asdf',NULL,NULL,1,'1331462411530','',0,'sdf',0,0),(75,'2012-03-11 18:41:34','we',NULL,'we',0,0,0,0,'银行转帐','we','we',NULL,NULL,1,'1331462493891','',0,'we',0,0),(76,'2012-03-11 18:45:39','qwe',NULL,'we',0,0,0,0,'银行转帐','qwe','qwe',NULL,NULL,1,'1331462738897','',0,'qwe',0,0),(77,'2012-03-11 18:46:28','qwe',NULL,'wer',0,0,0,0,'银行转帐','qwqe','wer',NULL,NULL,1,'1331462788821','',0,'wer',0,0),(78,'2012-03-11 18:50:21','qwe',NULL,'qwe',0,0,0,0,'另用单','qwe','',NULL,NULL,1,'1331463021512','',0,'qwe',0,0),(79,'2012-03-11 18:51:22','qw',NULL,'qw',0,0,0,0,'银行转帐','qw','qw',NULL,NULL,1,'1331463082629','',0,'qw',0,0),(80,'2012-03-11 18:53:07','qwe',NULL,'qweqwe',0,0,0,0,'银行转帐','we','qwe',NULL,NULL,1,'1331463187186','',0,'qwe',0,0),(81,'2012-03-11 18:54:09','qwe',NULL,'qwe',0,0,0,0,'银行转帐','qwe','',NULL,NULL,1,'1331463249281','',0,'qwe',0,0),(82,'2012-03-11 18:54:14','qwe',NULL,'qwe',0,0,0,0,'银行转帐','qwe','',NULL,NULL,1,'1331463254575','',0,'qwe',0,0),(83,'2012-03-11 18:59:29','qw',NULL,'qw',0,0,0,0,'银行转帐','qw','qw',NULL,NULL,1,'1331463569481','',0,'qw',0,1),(84,'2012-03-11 19:00:50','qwe',NULL,'qwe',0,0,0,0,'银行转帐','qwe','qwe',NULL,NULL,1,'1331463650117','',0,'qwe',0,0),(85,'2012-03-11 19:03:22','wer',NULL,'er',0,0,0,0,'银行转帐','wer','wer',NULL,NULL,1,'1331463802900','',0,'wer',0,0),(86,'2012-03-11 19:04:10','awd',NULL,'awd',0,0,0,0,'银行转帐','awd','',NULL,NULL,1,'1331463850552','2012031100103',0,'adw',0,0),(87,'2012-03-11 19:05:50','adw',NULL,'dw',0,0,0,0,'银行转帐','adw','',NULL,NULL,1,'1331463950411','2012031100103',0,'adw',0,0),(88,'2012-03-11 19:08:40','qwe',NULL,'qwe',0,0,0,0,'银行转帐','we','qwe',NULL,NULL,1,'1331464119938','2012031100103',0,'qwe',0,1),(89,'2012-03-11 19:13:28','qw',NULL,'qw',0,0,0,0,'银行转帐','qw','qw',NULL,NULL,1,'1331464407988','2012031100103',0,'qw',0,0),(90,'2012-03-11 19:14:47','qw',NULL,'qw',0,0,0,0,'银行转帐','qw','qw',NULL,NULL,1,'1331464487690','2012031100103',0,'qw',0,0),(91,'2012-03-11 19:16:00','qwe',NULL,'we',0,0,0,0,'银行转帐','qwe','qwe',NULL,NULL,1,'1331464559933','2012031100102',0,'qwe',0,0),(92,'2012-03-11 19:38:35','qw',NULL,'qw',0,0,0,0,'银行转帐','qw','qw',NULL,NULL,1,'1331465915448','2012031100102',0,'qw',0,0),(93,'2012-03-11 19:40:04','qqww',NULL,'wre',0,0,0,0,'现金','qqq','qwer',NULL,NULL,1,'1331466005901','2012031100101',0,'qwer',0,1),(94,'2012-03-11 19:43:30','qw',NULL,'qw',0,0,0,0,'银行转帐','qw','qw',NULL,NULL,1,'1331466212568','2012031100101',0,'qw',0,1),(95,'2012-03-11 19:49:31','12',NULL,'123',0,0,0,0,'银行转帐','123','123',NULL,NULL,1,'1331466572113','2012031100104',1,'123',0,0),(96,'2012-03-11 19:52:36','qwe',NULL,'qwe',0,0,0,0,'银行转帐','qwe','qwe',NULL,NULL,1,'1331466756261','2012031200105',0,'qwe',0,0),(97,'2012-03-16 19:46:44','asdf',NULL,'asdf',0,0,0,0,'银行转帐','asdf','asdf',NULL,NULL,1,'1331898404207',NULL,0,'asdf',0,1),(98,'2012-03-17 20:16:58','远程教育',NULL,'adsf',0,0,0,0,'现金','adf','adfs',NULL,NULL,1,'1331986617937',NULL,0,'adf',0,1),(99,'2012-03-17 20:20:48','远程教育',NULL,'asdf',0,0,0,0,'银行转帐','asdf','asdf',NULL,NULL,1,'1331986848255',NULL,0,'adsf',0,1),(100,'2012-03-17 20:22:11','aaa','课酬','qqw',0,0,0,0,'支票','ss','qwe',NULL,NULL,1,'1331986931319',NULL,0,'qwe',0,0),(101,'2012-03-24 15:06:56','会计从业','课酬','王老师',10,150,200,1710,'现金','会计培训','',NULL,NULL,1,'1332572816255','2012032400107',0,'星光',10,0);
/*!40000 ALTER TABLE `working` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-03-24 17:16:22
