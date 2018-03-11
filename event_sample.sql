-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 08:27 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_webwut`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `orgID` int(11) NOT NULL,
  `eventName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 NOT NULL,
  `eventDetail` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 NOT NULL,
  `age` int(11) NOT NULL,
  `gender` char(1) NOT NULL,
  `price` int(11) NOT NULL,
  `currentCapacity` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `indoorName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 NOT NULL,
  `type` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 NOT NULL,
  `surveyLink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 NOT NULL,
  `thumbnailPath` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `date`, `orgID`, `eventName`, `eventDetail`, `age`, `gender`, `price`, `currentCapacity`, `capacity`, `indoorName`, `location`, `type`, `surveyLink`, `thumbnailPath`) VALUES
(1, '2018-03-08 11:00:00', 3, 'Hello World', 'Detaill', 12, 'a', 100, 56, 100, 'IName', 'TownLoc', 'Science', 'someLink', '1.png'),
(7, '2018-03-23 14:00:00', 3, 'da', 'Test', 0, 'm', 0, 0, 6, 'สารสนเทศ', 'อาคารสารสนเทศ Khwaeng Lat Yao, Khet Chatuchak, Krung Thep Maha Nakhon 10220, Thailand', 'business', 'DSA', 'event-6-org-3.jpg'),
(8, '2018-03-16 00:00:00', 3, 'Testto', 'Detail', 100, 'm', 0, 0, 1, 'โรงบาลวิภา', '51/3 Thanon Ngam Wong Wan, Khwaeng Lat Yao, Khet Chatuchak, Krung Thep Maha Nakhon 10900, Thailand', 'communit', 'Form', 'event-8-org-3.jpg'),
(19, '2018-03-12 01:59:00', 3, 'TestAA', 'da', -1, 'm', 0, 0, 12, 'dsa', 'ตึกพักชายที่ 14 Khwaeng Lat Yao, Khet Chatuchak, Krung Thep Maha Nakhon 10220, Thailand', 'business', 'dsa', 'org-3-Costa Rican Frog.jpg'),
(20, '2018-03-13 13:00:00', 3, 'Hmmm', 'ROCK', -1, 'a', 0, 0, 9, 'พันธุ์', '50 จักรพันธุ์ Khwaeng Lat Yao, Khet Chatuchak, Krung Thep Maha Nakhon 10900, Thailand', 'music', 'da', 'org-3-2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `event_user_id_fk` (`orgID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_user_id_fk` FOREIGN KEY (`orgID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
