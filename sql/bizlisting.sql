-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 05, 2019 at 03:49 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bizlisting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(45) DEFAULT NULL,
  `firestname` varchar(45) DEFAULT NULL,
  `address` varchar(145) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `super` int(11) DEFAULT '0',
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `lastname`, `firestname`, `address`, `tel`, `email`, `username`, `password`, `super`) VALUES
(1, 'zhang', 'lie', '2030 pie-ix', '(514)222-3333', 'super@test.ca', 'super', 'super', 1),
(2, 'Dominique', 'Kpoghomou', '2130 pie-ix', '(514)222-3333', 'admin@test.ca', 'admin', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `annonceproduct`
--

DROP TABLE IF EXISTS `annonceproduct`;
CREATE TABLE IF NOT EXISTS `annonceproduct` (
  `idannonce` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `idbizUser` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idproduct` int(11) NOT NULL,
  PRIMARY KEY (`idannonce`,`idproduct`),
  KEY `fk_annonceProduct_bizUser1_idx` (`idbizUser`),
  KEY `fk_annonceProduct_user1_idx` (`iduser`),
  KEY `fk_annonceProduct_product1_idx` (`idproduct`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `annonceservice`
--

DROP TABLE IF EXISTS `annonceservice`;
CREATE TABLE IF NOT EXISTS `annonceservice` (
  `idannonce` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `idbizUser` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idservice` int(11) NOT NULL,
  PRIMARY KEY (`idannonce`,`idservice`),
  KEY `fk_annonceService_bizUser2_idx` (`idbizUser`),
  KEY `fk_annonceService_user1_idx` (`iduser`),
  KEY `fk_annonceService_service1_idx` (`idservice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bizuser`
--

DROP TABLE IF EXISTS `bizuser`;
CREATE TABLE IF NOT EXISTS `bizuser` (
  `idbizUser` int(11) NOT NULL AUTO_INCREMENT,
  `bizName` varchar(45) DEFAULT NULL,
  `address` varchar(145) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `website` varchar(145) DEFAULT NULL,
  `facebook` varchar(145) DEFAULT NULL,
  `logo` varchar(45) DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `ownerFirstname` varchar(45) DEFAULT NULL,
  `ownerLastname` varchar(45) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `modifierTime` datetime DEFAULT NULL,
  PRIMARY KEY (`idbizUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bizuser`
--

INSERT INTO `bizuser` (`idbizUser`, `bizName`, `address`, `tel`, `email`, `website`, `facebook`, `logo`, `photo`, `ownerFirstname`, `ownerLastname`, `createTime`, `modifierTime`) VALUES
(1, 'magasin1', '1234 main st', '(514)222-3333', 'magasin@test.ca', 'www.test.ca/magasin', 'www.facebook.ca/magasin', NULL, NULL, 'owner', 'magasin', '2019-11-05 10:35:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `idcategory` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `idcomment` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(45) DEFAULT NULL,
  `comment` varchar(645) DEFAULT NULL,
  `annonceProduct_idannonce` int(11) DEFAULT NULL,
  `annonceService_idannonce` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcomment`),
  KEY `fk_comment_annonceProduct1_idx` (`annonceProduct_idannonce`),
  KEY `fk_comment_annonceService1_idx` (`annonceService_idannonce`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

DROP TABLE IF EXISTS `inbox`;
CREATE TABLE IF NOT EXISTS `inbox` (
  `idinbox` int(11) NOT NULL AUTO_INCREMENT,
  `idadmin` int(11) DEFAULT NULL,
  `idmessage` int(11) NOT NULL,
  `idbizUser` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idinbox`,`idmessage`),
  KEY `fk_inbox_admin1_idx` (`idadmin`),
  KEY `fk_inbox_message1_idx` (`idmessage`),
  KEY `fk_inbox_bizUser1_idx` (`idbizUser`),
  KEY `fk_inbox_user1_idx` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `idmessage` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(145) DEFAULT NULL,
  `content` varchar(1045) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idmessage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `idorder` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `annonceService_idannonce` int(11) DEFAULT NULL,
  `annonceProduct_idannonce` int(11) DEFAULT NULL,
  PRIMARY KEY (`idorder`,`iduser`),
  KEY `fk_order_user1_idx` (`iduser`),
  KEY `fk_order_annonceService1_idx` (`annonceService_idannonce`),
  KEY `fk_order_annonceProduct1_idx` (`annonceProduct_idannonce`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

DROP TABLE IF EXISTS `outbox`;
CREATE TABLE IF NOT EXISTS `outbox` (
  `idoutbox` int(11) NOT NULL AUTO_INCREMENT,
  `idadmin` int(11) DEFAULT NULL,
  `idmessage` int(11) NOT NULL,
  `idbizUser` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idoutbox`,`idmessage`),
  KEY `fk_outbox_admin1_idx` (`idadmin`),
  KEY `fk_outbox_message1_idx` (`idmessage`),
  KEY `fk_outbox_bizUser1_idx` (`idbizUser`),
  KEY `fk_outbox_user1_idx` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `idproduct` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `description` varchar(1045) DEFAULT NULL,
  `photo` varchar(145) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idbizUser` int(11) DEFAULT NULL,
  `idsubCategory` int(11) NOT NULL,
  PRIMARY KEY (`idproduct`,`idsubCategory`),
  KEY `fk_product_user1_idx` (`iduser`),
  KEY `fk_product_bizUser1_idx` (`idbizUser`),
  KEY `fk_product_subCategory1_idx` (`idsubCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `idservice` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `photo` varchar(145) DEFAULT NULL,
  `hourRate` varchar(45) DEFAULT NULL,
  `description` varchar(1045) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idbizUser` int(11) DEFAULT NULL,
  `idsubCategory` int(11) NOT NULL,
  PRIMARY KEY (`idservice`,`idsubCategory`),
  KEY `fk_service_user1_idx` (`iduser`),
  KEY `fk_service_bizUser1_idx` (`idbizUser`),
  KEY `fk_service_subCategory1_idx` (`idsubCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `idsubCategory` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `idcategory` int(11) NOT NULL,
  PRIMARY KEY (`idsubCategory`,`idcategory`),
  KEY `fk_subCategory_category_idx` (`idcategory`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `address` varchar(145) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `modifyTime` datetime DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `firstname`, `lastname`, `address`, `tel`, `email`, `username`, `password`, `createTime`, `modifyTime`) VALUES
(1, 'user', 'user', '2130 pie-ix', '(514)222-3333', 'user@test.ca', 'user', 'user', '2019-11-05 10:35:00', NULL),
(2, 'user1', 'user1', '2130 pie-ix', '(514)333-4456', 'user1@test.ca', 'user1', 'user1', '2019-11-05 10:37:00', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annonceproduct`
--
ALTER TABLE `annonceproduct`
  ADD CONSTRAINT `fk_annonceProduct_bizUser1` FOREIGN KEY (`idbizUser`) REFERENCES `bizuser` (`idbizUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_annonceProduct_product1` FOREIGN KEY (`idproduct`) REFERENCES `product` (`idproduct`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_annonceProduct_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `annonceservice`
--
ALTER TABLE `annonceservice`
  ADD CONSTRAINT `fk_annonceService_bizUser2` FOREIGN KEY (`idbizUser`) REFERENCES `bizuser` (`idbizUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_annonceService_service1` FOREIGN KEY (`idservice`) REFERENCES `service` (`idservice`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_annonceService_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_annonceProduct1` FOREIGN KEY (`annonceProduct_idannonce`) REFERENCES `annonceproduct` (`idannonce`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_annonceService1` FOREIGN KEY (`annonceService_idannonce`) REFERENCES `annonceservice` (`idannonce`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inbox`
--
ALTER TABLE `inbox`
  ADD CONSTRAINT `fk_inbox_admin1` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`idadmin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inbox_bizUser1` FOREIGN KEY (`idbizUser`) REFERENCES `bizuser` (`idbizUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inbox_message1` FOREIGN KEY (`idmessage`) REFERENCES `message` (`idmessage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inbox_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_annonceProduct1` FOREIGN KEY (`annonceProduct_idannonce`) REFERENCES `annonceproduct` (`idannonce`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_annonceService1` FOREIGN KEY (`annonceService_idannonce`) REFERENCES `annonceservice` (`idannonce`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `outbox`
--
ALTER TABLE `outbox`
  ADD CONSTRAINT `fk_outbox_admin1` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`idadmin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_outbox_bizUser1` FOREIGN KEY (`idbizUser`) REFERENCES `bizuser` (`idbizUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_outbox_message1` FOREIGN KEY (`idmessage`) REFERENCES `message` (`idmessage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_outbox_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_bizUser1` FOREIGN KEY (`idbizUser`) REFERENCES `bizuser` (`idbizUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_subCategory1` FOREIGN KEY (`idsubCategory`) REFERENCES `subcategory` (`idsubCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `fk_service_bizUser1` FOREIGN KEY (`idbizUser`) REFERENCES `bizuser` (`idbizUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_service_subCategory1` FOREIGN KEY (`idsubCategory`) REFERENCES `subcategory` (`idsubCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_service_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `fk_subCategory_category` FOREIGN KEY (`idcategory`) REFERENCES `category` (`idcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
