-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 04:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignments2`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `comentswdetail`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `comentswdetail`;
CREATE TABLE `comentswdetail` (
`ConsumerUserName` varchar(30)
,`Comment` text
,`Create_at` date
,`VideoId` int(11)
,`CommentId` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `consumer`
--

DROP TABLE IF EXISTS `consumer`;
CREATE TABLE `consumer` (
  `ConsumerId` int(5) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `ConsumerUserName` varchar(30) NOT NULL,
  `ConsumerPassword` varchar(100) NOT NULL,
  `Phone_Number` varchar(50) DEFAULT '',
  `ZipCode` varchar(50) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`ConsumerId`, `Email`, `ConsumerUserName`, `ConsumerPassword`, `Phone_Number`, `ZipCode`) VALUES
(1, 'azizimran72@gmail.com', 'Muhammad Naeem', '123', '', ''),
(2, 'naeem@assersoft.com', 'Kashif Ali', '12345', '', ''),
(3, 'fads@gmail.com', 'dsfasd', '123', '', ''),
(4, 'asdf@gmail.com', 'adsf', 'd41d8cd98f', '1w21', '50400'),
(5, 'an@gmail.com', 'an', '21232f297a57a5a743894a0e4a801fc3', '123232', '50400');

-- --------------------------------------------------------

--
-- Table structure for table `creator`
--

DROP TABLE IF EXISTS `creator`;
CREATE TABLE `creator` (
  `CreatorId` int(10) NOT NULL,
  `CreatorName` varchar(20) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `creator`
--

INSERT INTO `creator` (`CreatorId`, `CreatorName`, `Password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'dfas', '900150983cd24fb0d6963f7d28e17f72');

-- --------------------------------------------------------

--
-- Table structure for table `creatorcomments`
--

DROP TABLE IF EXISTS `creatorcomments`;
CREATE TABLE `creatorcomments` (
  `CommentId` int(11) NOT NULL,
  `VideoId` int(11) NOT NULL,
  `Create_at` date NOT NULL,
  `UserId` int(11) NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creatorcomments`
--

INSERT INTO `creatorcomments` (`CommentId`, `VideoId`, `Create_at`, `UserId`, `Comment`) VALUES
(1, 1, '2025-01-09', 1, 'First creatorComments'),
(2, 2, '0000-00-00', 1, 'asfasdf'),
(3, 2, '0000-00-00', 1, 'hello\n'),
(4, 2, '0000-00-00', 1, 'new comment'),
(5, 1, '2025-01-11', 5, 'fasdf'),
(6, 1, '2025-01-11', 5, 'wah wah'),
(7, 1, '2025-01-11', 5, 'dfasd'),
(8, 1, '2025-01-11', 5, 'agb'),
(9, 1, '2025-01-11', 5, 'adfad'),
(10, 1, '2025-01-11', 5, 'adsfasdf'),
(11, 1, '2025-01-11', 5, 'adsfasdf'),
(12, 1, '2025-01-11', 5, 'hello\n'),
(13, 1, '2025-01-11', 5, 'g\n'),
(14, 1, '2025-01-11', 5, 'fdsfa'),
(15, 1, '2025-01-11', 5, 'fasd'),
(16, 1, '2025-01-11', 5, 'hello\n');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `VideosId` int(11) NOT NULL,
  `UploadDate` datetime NOT NULL,
  `VideosSource` varchar(1012) NOT NULL,
  `VideoTitle` varchar(1012) NOT NULL,
  `VideoTags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`VideosId`, `UploadDate`, `VideosSource`, `VideoTitle`, `VideoTags`) VALUES
(1, '0000-00-00 00:00:00', 'videoplayback (3).mp4', 'Second Title', '#Second'),
(2, '0000-00-00 00:00:00', 'videoplayback (2).mp4', 'Third Title', '#Third,#Value3'),
(3, '0000-00-00 00:00:00', 'videoplayback (1).mp4', 'FourthTitle', '#Fourth,#FourthValue'),
(4, '0000-00-00 00:00:00', 'videoplayback (4).mp4', 'First Title', '#First,#1st,#Value1'),
(5, '0000-00-00 00:00:00', 'videoplayback (2).mp4', 'Latest Video', '#lates'),
(6, '0000-00-00 00:00:00', 'videoplayback (4).mp4', 'asd', '#dsfasd');

-- --------------------------------------------------------

--
-- Structure for view `comentswdetail`
--
DROP TABLE IF EXISTS `comentswdetail`;

DROP VIEW IF EXISTS `comentswdetail`;
CREATE   VIEW `comentswdetail`  AS SELECT `consumer`.`ConsumerUserName` AS `ConsumerUserName`, `creatorcomments`.`Comment` AS `Comment`, `creatorcomments`.`Create_at` AS `Create_at`, `creatorcomments`.`VideoId` AS `VideoId`, `creatorcomments`.`CommentId` AS `CommentId` FROM (`creatorcomments` join `consumer` on(`creatorcomments`.`UserId` = `consumer`.`ConsumerId`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consumer`
--
ALTER TABLE `consumer`
  ADD PRIMARY KEY (`ConsumerId`);

--
-- Indexes for table `creator`
--
ALTER TABLE `creator`
  ADD PRIMARY KEY (`CreatorId`);

--
-- Indexes for table `creatorcomments`
--
ALTER TABLE `creatorcomments`
  ADD PRIMARY KEY (`CommentId`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`VideosId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consumer`
--
ALTER TABLE `consumer`
  MODIFY `ConsumerId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `creator`
--
ALTER TABLE `creator`
  MODIFY `CreatorId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `creatorcomments`
--
ALTER TABLE `creatorcomments`
  MODIFY `CommentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `VideosId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
