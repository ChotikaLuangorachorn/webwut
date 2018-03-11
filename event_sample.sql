-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 08:05 PM
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
  `capacity` int(11) NOT NULL,
  `indoorName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 NOT NULL,
  `type` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `date`, `orgID`, `eventName`, `eventDetail`, `age`, `gender`, `price`, `capacity`, `indoorName`, `location`, `type`) VALUES
(1, '2018-03-08 11:00:00', 3, 'Hello World', 'Detaill', 12, 'a', 100, 100, 'IName', 'TownLoc', 'sc'),
(7, '2018-03-23 14:00:00', 3, 'da', 'Test', -1, 'f', 0, 6, 'สารสนเทศ', 'อาคารสารสนเทศ Khwaeng Lat Yao, Khet Chatuchak, Krung Thep Maha Nakhon 10220, Thailand', 'bu'),
(8, '2018-03-16 00:00:00', 3, 'Testto', 'Detail', 100, 'm', 0, 1, 'โรงบาลวิภา', '51/3 Thanon Ngam Wong Wan, Khwaeng Lat Yao, Khet Chatuchak, Krung Thep Maha Nakhon 10900, Thailand', 'co'),
(19, '2018-03-12 01:59:00', 3, 'TestAA', 'da', -1, 'm', 0, 12, 'dsa', 'ตึกพักชายที่ 14 Khwaeng Lat Yao, Khet Chatuchak, Krung Thep Maha Nakhon 10220, Thailand', 'bu'),
(20, '2018-03-13 13:00:00', 3, 'Hmmm', 'ROCK', -1, 'a', 0, 9, 'พันธุ์', '50 จักรพันธุ์ Khwaeng Lat Yao, Khet Chatuchak, Krung Thep Maha Nakhon 10900, Thailand', 'mu'),
(21, '2018-03-16 00:00:00', 3, 'Seminar SA', 'Seminar about SA which will be holding in this friday in the morning.', -1, 'a', 0, 50, 'อาคารสารสนเทศ', 'อาคารสารสนเทศ Khwaeng Lat Yao, Khet Chatuchak, Krung Thep Maha Nakhon 10220, Thailand', 'ed'),
(22, '2018-03-17 19:00:00', 3, 'Seminar SE', 'Seminar about SE will be held on this Saturday night!', -1, 'a', 0, 55, 'SC45', 'อาคารวิทยาศาสตร์กายภาพ 45 ปี Khwaeng Lat Yao, Khet Chatuchak, Krung Thep Maha Nakhon 10220, Thailand', 'ed');

-- --------------------------------------------------------

--
-- Table structure for table `event_attendant`
--

CREATE TABLE `event_attendant` (
  `eventID` int(11) NOT NULL,
  `aID` int(11) NOT NULL,
  `flag` varchar(8) NOT NULL,
  `paymentID` int(11) NOT NULL,
  `qrCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_attendant`
--

INSERT INTO `event_attendant` (`eventID`, `aID`, `flag`, `paymentID`, `qrCode`) VALUES
(1, 1, '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `event_comment`
--

CREATE TABLE `event_comment` (
  `eventID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event_image`
--

CREATE TABLE `event_image` (
  `eventID` int(11) NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_image`
--

INSERT INTO `event_image` (`eventID`, `image`) VALUES
(1, '1.png'),
(7, 'event-6-org-3.jpg'),
(8, 'event-8-org-3.jpg'),
(19, 'org-3-Costa Rican Frog.jpg'),
(20, 'org-3-2.png'),
(21, 'holder-pic.png'),
(22, 'holder-pic.png');

-- --------------------------------------------------------

--
-- Table structure for table `event_survey_link`
--

CREATE TABLE `event_survey_link` (
  `eventID` int(11) NOT NULL,
  `surveyLink` varchar(255) CHARACTER SET utf32 COLLATE utf32_thai_520_w2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_survey_link`
--

INSERT INTO `event_survey_link` (`eventID`, `surveyLink`) VALUES
(1, 'someLink'),
(7, 'DSA'),
(8, 'Form'),
(19, 'dsa'),
(20, 'da'),
(21, ''),
(22, '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `evidence` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `evidence`) VALUES
(1, 'payment-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(320) NOT NULL,
  `phoneNo` char(10) DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`userID`, `firstName`, `lastName`, `email`, `phoneNo`, `image`) VALUES
(1, 'wi', 'chi', 'wiwadh.c@ku.th', '0830504393', 'profile-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `personal_message`
--

CREATE TABLE `personal_message` (
  `fromID` int(11) NOT NULL,
  `toID` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `filePath` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userID` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `role` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userID`, `password`, `role`) VALUES
(1, 'user', 'user', 'AT'),
(2, 'admin', 'admin', 'AD'),
(3, 'organizer', 'organizer', 'OR');

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
-- Indexes for table `event_attendant`
--
ALTER TABLE `event_attendant`
  ADD PRIMARY KEY (`eventID`,`aID`),
  ADD KEY `eventAttendant_user_id_fk` (`aID`),
  ADD KEY `event_attendant_payment_paymentID_fk` (`paymentID`);

--
-- Indexes for table `event_comment`
--
ALTER TABLE `event_comment`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `event_comment_user_id_fk` (`userID`);

--
-- Indexes for table `event_image`
--
ALTER TABLE `event_image`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `eventID` (`eventID`);

--
-- Indexes for table `event_survey_link`
--
ALTER TABLE `event_survey_link`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `personal_message`
--
ALTER TABLE `personal_message`
  ADD PRIMARY KEY (`fromID`,`toID`,`timestamp`) USING BTREE,
  ADD KEY `personalmessage_user_to_id_fk` (`toID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_user_id_fk` FOREIGN KEY (`orgID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_attendant`
--
ALTER TABLE `event_attendant`
  ADD CONSTRAINT `eventAttendant_event_eventID_fk` FOREIGN KEY (`eventID`) REFERENCES `event` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eventAttendant_user_id_fk` FOREIGN KEY (`aID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_attendant_payment_paymentID_fk` FOREIGN KEY (`paymentID`) REFERENCES `payment` (`paymentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_comment`
--
ALTER TABLE `event_comment`
  ADD CONSTRAINT `eventComment_event_eventID_fk` FOREIGN KEY (`eventID`) REFERENCES `event` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_comment_user_id_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_image`
--
ALTER TABLE `event_image`
  ADD CONSTRAINT `event_image_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `event` (`eventID`);

--
-- Constraints for table `event_survey_link`
--
ALTER TABLE `event_survey_link`
  ADD CONSTRAINT `event_survey_link_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `event` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD CONSTRAINT `personalinfo_user_id_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`id`);

--
-- Constraints for table `personal_message`
--
ALTER TABLE `personal_message`
  ADD CONSTRAINT `personalmessage_user_from_id_fk` FOREIGN KEY (`fromID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personalmessage_user_to_id_fk` FOREIGN KEY (`toID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
