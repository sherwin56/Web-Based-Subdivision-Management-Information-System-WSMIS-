-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2024 at 11:35 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20981518_db_barangay`
--
CREATE DATABASE IF NOT EXISTS `id20981518_db_barangay` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id20981518_db_barangay`;

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `platform` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `position_id`, `firstname`, `lastname`, `photo`, `platform`) VALUES
(39, 15, 'Crystal Jeanne', 'Ginete', '', 'I will do my best for our community'),
(40, 15, 'Gerald', 'Chico', '', 'I will do my best for our community'),
(41, 16, 'Sherwin', 'Recto', '', 'I will do my best for our community'),
(42, 17, 'Jeff', 'Hlide', '', 'I will do my best for our community'),
(43, 18, 'Steven', 'Buscay', '', 'I will do my best for our community'),
(44, 19, 'Henry', 'Canlas', '', 'I will do my best for our community'),
(45, 18, 'Emelyn', 'Mayuga', '1.jpg', 'To maintain peace in order at subdivision');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `max_vote` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `description`, `max_vote`, `priority`) VALUES
(15, 'President', 1, 1),
(16, 'Vice President', 1, 2),
(17, 'Secretary', 1, 3),
(18, 'Treasurer', 1, 4),
(19, 'Auditor', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `name`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(36, 'Crystal Ginete', 'Birthday Party', 'Crystal Ginete Birthday Party', '2024-07-29 13:00:00', '2024-07-29 17:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblactivity`
--

CREATE TABLE `tblactivity` (
  `id` int(11) NOT NULL,
  `dateofactivity` date NOT NULL,
  `activity` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblactivity`
--

INSERT INTO `tblactivity` (`id`, `dateofactivity`, `activity`, `description`) VALUES
(18, '2024-03-16', 'Meeting', 'Meeting March 20, 2024 2:00PM at the Clubhouse'),
(19, '2024-05-09', 'Church Schedule Sunday', '8am Schedule '),
(20, '2024-05-09', 'Church Schedule Sunday', '10am Schedule ');

-- --------------------------------------------------------

--
-- Table structure for table `tblactivityphoto`
--

CREATE TABLE `tblactivityphoto` (
  `id` int(11) NOT NULL,
  `activityid` int(11) NOT NULL,
  `filename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblactivityphoto`
--

INSERT INTO `tblactivityphoto` (`id`, `activityid`, `filename`) VALUES
(18, 7, '1485255503893ChibiMaker.jpg'),
(19, 7, '1485255504014dental.jpg'),
(20, 7, '1485255504108images.jpg'),
(21, 8, '1485255608251dfxfxfxdfxfxfxdf.png'),
(22, 8, '1485255608315easy-nail-art-designs-for-beginners-youtube.jpg'),
(23, 8, '1485255608404Easy-Winter-Nail-Art-Tutorials-2013-2014-For-Beginners-Learners-10.jpg'),
(24, 8, '1485255608513motherboard.png'),
(25, 9, '148525575293111041019_1012143402147589_9043399646875097729_n.jpg'),
(26, 9, '1485255753089bg.PNG'),
(32, 10, '148526764905211041019_1012143402147589_9043399646875097729_n.jpg'),
(38, 11, '1485530620716user2.jpg'),
(39, 16, '1710552461001eagle.jpg'),
(40, 17, '1710552814187WWW.YIFY-TORRENTS.COM.jpg'),
(41, 18, '1710560606933426721536_709903537968892_1352226922142557539_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblblotter`
--

CREATE TABLE `tblblotter` (
  `id` int(11) NOT NULL,
  `yearRecorded` varchar(4) NOT NULL,
  `dateRecorded` date NOT NULL,
  `complainant` text NOT NULL,
  `cage` int(11) NOT NULL,
  `caddress` text NOT NULL,
  `ccontact` varchar(200) NOT NULL,
  `personToComplain` text NOT NULL,
  `page` int(11) NOT NULL,
  `paddress` text NOT NULL,
  `pcontact` varchar(200) NOT NULL,
  `complaint` text NOT NULL,
  `actionTaken` varchar(50) NOT NULL,
  `sStatus` varchar(50) NOT NULL,
  `locationOfIncidence` text NOT NULL,
  `recordedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblblotter`
--

INSERT INTO `tblblotter` (`id`, `yearRecorded`, `dateRecorded`, `complainant`, `cage`, `caddress`, `ccontact`, `personToComplain`, `page`, `paddress`, `pcontact`, `complaint`, `actionTaken`, `sStatus`, `locationOfIncidence`, `recordedby`) VALUES
(13, '2024', '2024-04-08', 'Nunez, Jefferson', 37, 'Blk B4 Lot 8', '0', '39', 34, 'Blk B4 Lot 2', '968574659', 'Fist Fight', '1st Option', 'Pending', 'House of The Complainee', 'admin'),
(15, '2024', '2024-04-26', 'Quebec, Philip Cruz', 21, 'Blk C6 Lot 2', '09472957362', '42', 24, 'Blk C2 Lot 1', '0959486730684', 'Loud noise', '1st Option', 'Unsolved', 'House of the Complainee', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblbuilding`
--

CREATE TABLE `tblbuilding` (
  `id` int(50) NOT NULL,
  `permit_no` int(50) NOT NULL,
  `ownername` varchar(200) NOT NULL,
  `projecttype` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `payment` varchar(100) NOT NULL,
  `ref_no` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `req_type` varchar(200) NOT NULL,
  `residentid` int(50) NOT NULL,
  `amount` int(100) NOT NULL,
  `balance` int(100) NOT NULL,
  `seen` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblbuilding`
--

INSERT INTO `tblbuilding` (`id`, `permit_no`, `ownername`, `projecttype`, `address`, `date`, `payment`, `ref_no`, `status`, `req_type`, `residentid`, `amount`, `balance`, `seen`) VALUES
(11, 11, 'Ginete, Crystal Jeanne ', 'tt', 'tt', '2024-04-07', 'Cash', '0', 'Approved', 'Construction Bond', 43, 600, 400, 0),
(12, 12, 'Ginete, Crystal Jeanne ', 'uu', 'uu', '2024-04-23', 'Cash', '0', 'Approved', 'Construction Bond', 43, 2486, 0, 0),
(13, 13, 'Dela Cruz, John Castro', '2 Story House', 'Dasmarinas Cavite', '2024-04-20', 'Gcash', '66544566', 'Approved', 'Construction Bond', 0, 1000, 0, 0),
(14, 14, 'Ginete, Crystal Jeanne', 'Construction Bond', 'Blk 9 Lt20', '2024-04-10', 'Cash', '0', 'Approved', 'Construction Bond', 0, 100, 0, 0),
(15, 15, 'Manalo, Grace Gallano', '2 Story Mansion House', 'San Marino Classic Dasmarinas', '0000-00-00', 'Gcash', '2323939921329', 'Disapproved', 'Construction Bond', 53, 0, 0, 0),
(16, 16, '', 'Single Family Housee', 'Dasmarinas Cavite', '2024-04-23', 'Gcash', '544454354233', 'Approved', 'Construction Bond', 40, 500, 0, 0),
(17, 17, 'Quebec, Philip  Cruz', '2 Story Mansion House', 'San Marino Classic Dasmarinas', '2024-05-11', 'Cash', '0', 'Approved', 'Construction Bond', 39, 100, 0, 0),
(19, 19, 'Mayuga, Emelyn J', 'building ', 'blk a1 lot1', '2024-05-09', 'Cash', '0', 'Approved', 'Construction Bond', 71, 10000, 0, 0),
(20, 20, 'Mayuga, Emelyn J', 'ss', 'ss', '2024-05-09', 'Cash', '0', 'Approved', 'Construction Bond', 71, 10000, 0, 0),
(21, 21, 'Ginete, Crystal Jeanne ', 'Sample', 'Sample', '2024-07-29', 'Cash', '0', 'Approved', 'Construction Bond', 43, 100, 0, 0),
(22, 22, 'Ginete, Crystal Jeanne ', 'eee', 'eee', '2024-07-28', 'Cash', '0', 'Approved', 'Construction Bond', 43, 120, 0, 0),
(23, 23, 'Ginete, Crystal Jeanne ', 'nn', 'nn', '2024-07-29', 'Cash', '0', 'Approved', 'Construction Bond', 43, 1000, 0, 0),
(24, 24, 'Jacinto, Oliver', '4 Storey House', 'Dasmarinas Cavite', '2024-07-31', 'Gcash', '6423123153442', 'Approved', 'Construction Bond', 0, 1000, 0, 0),
(25, 25, 'Ginete, Crystal Jeanne ', 'Sample', 'Sample', '2024-07-29', 'Cash', '0', 'New', 'Construction Bond', 43, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblclearance`
--

CREATE TABLE `tblclearance` (
  `id` int(11) NOT NULL,
  `clearanceNo` int(11) NOT NULL,
  `residentid` int(11) NOT NULL,
  `findings` text NOT NULL,
  `purpose` text NOT NULL,
  `orNo` int(11) NOT NULL,
  `samount` int(11) NOT NULL,
  `dateRecorded` date NOT NULL,
  `recordedBy` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblclearance`
--

INSERT INTO `tblclearance` (`id`, `clearanceNo`, `residentid`, `findings`, `purpose`, `orNo`, `samount`, `dateRecorded`, `recordedBy`, `status`) VALUES
(8, 0, 11, '', 'asd', 0, 0, '2017-01-20', 'User1', 'New'),
(9, 1234, 15, 'asdada', 'local employment', 12, 3434, '2017-01-22', 'admin', 'Approved'),
(10, 123, 11, 'qwe', 'qwe', 213, 2123, '2017-01-24', 'admin', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tblhousehold`
--

CREATE TABLE `tblhousehold` (
  `id` int(11) NOT NULL,
  `householdno` int(11) NOT NULL,
  `zone` varchar(11) NOT NULL,
  `totalhouseholdmembers` int(2) NOT NULL,
  `headoffamily` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblhousehold`
--

INSERT INTO `tblhousehold` (`id`, `householdno`, `zone`, `totalhouseholdmembers`, `headoffamily`) VALUES
(3, 2, '2', 0, '12');

-- --------------------------------------------------------

--
-- Table structure for table `tblid`
--

CREATE TABLE `tblid` (
  `id` int(50) NOT NULL,
  `id_no` int(100) NOT NULL,
  `date` date NOT NULL,
  `fname` varchar(200) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `ref_no` varchar(200) NOT NULL,
  `residentid` int(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `req_type` varchar(100) NOT NULL,
  `seen` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblid`
--

INSERT INTO `tblid` (`id`, `id_no`, `date`, `fname`, `payment`, `ref_no`, `residentid`, `status`, `amount`, `req_type`, `seen`) VALUES
(4, 189, '2024-04-21', '', 'Gcash', '3434322', 41, 'Approved', 100, 'ID Application', 0),
(5, 190, '2024-04-22', '', 'Cash', '0', 36, 'Approved', 100, 'ID Application', 0),
(6, 191, '2024-04-22', '', 'Gcash', '12313322', 53, 'Approved', 100, 'ID Application', 0),
(7, 192, '2024-05-09', 'Mayuga, Emelyn J', 'Gcash', '435344534534', 71, 'Approved', 100, 'ID Applcation', 0),
(8, 0, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Cash', '0', 43, 'Disapproved', 0, 'ID Applcation', 0),
(9, 0, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Cash', '0', 43, 'Disapproved', 0, 'ID Applcation', 0),
(10, 10, '2024-07-29', '', 'Cash', '0', 66, 'Approved', 100, 'ID Application', 0),
(11, 11, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Cash', '0', 43, 'New', 0, 'ID Applcation', 1),
(12, 12, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Gcash', '77384748484', 43, 'New', 0, 'ID Applcation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblinquiries`
--

CREATE TABLE `tblinquiries` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `inquiry` varchar(1000) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE `tbllogs` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `logdate` datetime NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbllogs`
--

INSERT INTO `tbllogs` (`id`, `user`, `logdate`, `action`) VALUES
(2, 'asd', '2017-01-04 00:00:00', 'Added Resident namedjayjay, asd asd'),
(3, 'asd', '2017-01-04 19:13:40', 'Update Resident named Sample1, User1 Brgy1'),
(4, 'sad', '2017-01-05 13:22:10', 'Update Official named eliezer a. vacalares, jr.'),
(7, 'sad', '2017-01-05 13:54:40', 'Update Household Number 1'),
(8, 'sad', '2017-01-05 14:00:08', 'Update Blotter Request sda, as das'),
(9, 'sad', '2017-01-05 14:15:39', 'Update Clearance with clearance number of 123131'),
(10, 'sad', '2017-01-05 14:25:03', 'Update Permit with business name of asda'),
(11, 'sad', '2017-01-05 14:25:25', 'Update Resident named Sample1, User1 Brgy1'),
(12, 'Administrator', '2017-01-24 16:32:40', 'Added Permit with business name of hahaha'),
(13, 'Administrator', '2017-01-24 16:35:41', 'Added Clearance with clearance number of 123'),
(14, 'Administrator', '2017-01-24 18:43:35', 'Added Activity sad'),
(15, 'Administrator', '2017-01-24 18:45:49', 'Added Activity qwe'),
(16, 'Administrator', '2017-01-24 18:46:20', 'Added Activity ss'),
(17, 'Administrator', '2017-01-24 18:47:39', 'Added Activity e'),
(18, 'Administrator', '2017-01-24 18:55:20', 'Added Activity activity'),
(19, 'Administrator', '2017-01-24 18:58:23', 'Added Activity Activity'),
(20, 'Administrator', '2017-01-24 19:00:07', 'Added Activity activity'),
(21, 'Administrator', '2017-01-24 19:02:32', 'Added Activity Activity'),
(22, 'Administrator', '2017-01-24 19:04:54', 'Added Activity activity'),
(23, 'Administrator', '2017-01-24 19:08:40', 'Update Activity activity'),
(24, 'Administrator', '2017-01-27 23:23:40', 'Added Activity teets'),
(25, 'Administrator', '2017-01-27 23:24:14', 'Update Resident named Sample1, User1 Brgy1'),
(26, 'Administrator', '2017-01-27 23:25:10', 'Update Resident named sda, as das'),
(27, 'Administrator', '2017-01-30 10:45:13', 'Added Resident named 2, 2 2'),
(28, 'Administrator', '2017-01-30 10:45:54', 'Added Resident named 2, 2 2'),
(29, 'Administrator', '2017-02-06 08:58:23', 'Update Resident named sda, as das'),
(30, 'Administrator', '2017-02-06 09:00:14', 'Update Resident named sda, as das'),
(31, 'Administrator', '2017-02-06 09:03:57', 'Added Household Number 2'),
(32, 'Administrator', '2017-02-06 09:04:25', 'Added Household Number 2'),
(33, 'Administrator', '2023-06-01 21:16:50', 'Update Zone number '),
(34, 'Administrator', '2023-06-01 21:17:22', 'Update Zone number '),
(35, 'Administrator', '2023-06-06 00:14:58', 'Update Activity activity'),
(36, 'Administrator', '2023-06-17 00:35:16', 'Update Resident named sda, as das'),
(37, 'Administrator', '2023-09-06 09:33:27', 'Added Resident named nana, nana nana'),
(38, 'Administrator', '2023-09-06 09:39:46', 'Added Resident named lana, lana lana'),
(39, 'Administrator', '2023-09-06 09:46:22', 'Added Resident named lana, lana lana'),
(40, 'Administrator', '2023-09-06 09:47:35', 'Added Resident named lana, lana lana'),
(41, 'Administrator', '2023-09-06 09:48:38', 'Added Resident named lana, lana lana'),
(42, 'Administrator', '2023-09-06 09:49:08', 'Added Resident named lana, lana lana'),
(43, 'Administrator', '2023-09-06 09:53:58', 'Added Resident named lana,  '),
(44, 'Administrator', '2023-09-06 09:55:20', 'Added Resident named lana,  '),
(45, 'Administrator', '2023-09-06 10:52:05', 'Added Blotter Request by a, asd das'),
(46, 'Administrator', '2023-09-06 11:12:29', 'Added Permit with business name of 2'),
(47, 'Administrator', '2023-09-06 11:13:13', 'Added Resident named nana, nana nana'),
(48, 'Administrator', '2023-09-06 11:18:24', 'Added Resident named nana, nana nana'),
(49, 'Administrator', '2023-09-06 11:21:09', 'Added Resident named nana, nana nana'),
(50, 'Administrator', '2023-09-06 11:32:10', 'Added Official named 22'),
(51, 'Administrator', '2023-09-06 13:01:18', 'Added Resident named AA, AA AA'),
(52, 'Administrator', '2023-09-06 13:26:23', 'Added Resident named aa, aa aa'),
(53, 'Administrator', '2023-09-06 13:28:37', 'Added Resident named aa, aa aa'),
(54, 'Administrator', '2023-09-06 13:46:47', 'Added Resident named aa, aa aa'),
(55, 'Administrator', '2023-09-06 13:47:19', 'Added Resident named aa, aa aa'),
(56, 'Administrator', '2023-09-06 13:48:21', 'Added Resident named aa, aa aa'),
(57, 'Administrator', '2023-09-06 13:51:42', 'Added Resident named aa, aa aa'),
(58, 'Administrator', '2023-09-06 13:53:33', 'Added Resident named aa, aa aa'),
(59, 'Administrator', '2023-09-06 13:54:13', 'Added Resident named aa, aa aa'),
(60, 'Administrator', '2023-09-06 14:06:10', 'Added Resident named aa, aa aa'),
(61, 'Administrator', '2023-09-06 14:07:09', 'Added Resident named aa, aa aa'),
(62, 'Administrator', '2023-09-06 14:45:46', 'Added Official named rr'),
(63, 'Administrator', '2023-09-06 14:58:12', 'Added Official named Pabico, Cesar C.'),
(64, 'Administrator', '2023-09-06 14:58:31', 'Added Official named a'),
(65, 'Administrator', '2023-09-06 15:02:57', 'Added Official named aa'),
(66, 'Administrator', '2023-09-06 15:35:39', 'Added Official named a'),
(67, 'Administrator', '2023-09-06 15:35:44', 'Added Official named a'),
(68, 'Administrator', '2023-09-06 19:47:30', 'Added Official named a'),
(69, 'Administrator', '2023-09-06 19:47:39', 'Update Official named 0'),
(70, 'Administrator', '2023-09-06 19:56:14', 'Added Resident named f, f f'),
(71, 'Administrator', '2023-09-07 01:23:40', 'Added Official named Pabico, Cesar C.'),
(72, 'Administrator', '2023-09-07 01:42:42', 'Added Official named z'),
(73, 'Administrator', '2023-09-07 01:44:10', 'Added Official named 1'),
(74, 'Administrator', '2023-09-07 01:46:05', 'Update Official named 0'),
(75, 'Administrator', '2023-09-07 02:17:06', 'Added Activity Annoucement'),
(76, 'Administrator', '2023-09-07 02:17:21', 'Update Activity Announcement'),
(77, 'Administrator', '2023-09-07 02:19:55', 'Added Activity Announcement'),
(78, 'Administrator', '2023-09-07 02:35:48', 'Added Official named Sample, Sample'),
(79, 'Administrator', '2023-09-07 02:37:50', 'Added Official named Sample, Sample'),
(80, 'Administrator', '2023-09-07 02:58:16', 'Added Resident named aa, aa aa'),
(81, 'Administrator', '2023-09-07 03:13:20', 'Added Resident named A, A A'),
(82, 'Administrator', '2023-09-07 03:44:10', 'Added Resident named A, A A'),
(83, 'Administrator', '2023-09-07 03:45:20', 'Added Resident named kaka, kaka kaka'),
(84, 'Administrator', '2023-09-07 03:45:35', 'Added Resident named kaka, kaka kaka'),
(85, 'Administrator', '2023-09-07 03:46:24', 'Added Resident named kaka, kaka kaka'),
(86, 'Administrator', '2023-09-07 03:48:00', 'Added Resident named kaka, kaka kaka'),
(87, 'Administrator', '2023-09-07 04:05:19', 'Update Official named HOA President'),
(88, 'Administrator', '2023-09-07 04:06:10', 'Added Official named Pataray Jr., Benjamin T.'),
(89, 'Administrator', '2023-09-07 04:06:55', 'Added Official named Pataray Jr., Benjamin T.'),
(90, 'Administrator', '2023-09-07 04:07:34', 'Added Official named Pataray Jr., Benjamin T.'),
(91, 'Administrator', '2023-09-07 04:08:15', 'Added Official named Macalima, Jeana A.'),
(92, 'Administrator', '2023-09-07 04:08:59', 'Added Official named Diaz, Estelita A.'),
(93, 'Administrator', '2023-09-07 04:10:05', 'Added Official named Okabe, Glenda I'),
(94, 'Administrator', '2023-09-07 04:10:35', 'Added Official named Labasco, Bernie B.'),
(95, 'Administrator', '2023-09-07 04:11:22', 'Added Official named Antang, Mario Arlene S.'),
(96, 'Administrator', '2023-09-07 04:12:00', 'Added Official named Oronse, Meldred P.'),
(97, 'Administrator', '2023-09-07 04:12:39', 'Added Official named Gabijan, Dwight K. '),
(98, 'Administrator', '2023-09-07 04:38:37', 'Added Resident named ss, ss ss'),
(99, 'Administrator', '2023-09-07 04:46:45', 'Added Resident named ss, ss ss'),
(100, 'Administrator', '2023-09-07 04:47:43', 'Added Resident named a, a a'),
(101, 'Administrator', '2023-09-07 04:48:24', 'Added Resident named a, a a'),
(102, 'Administrator', '2023-09-07 04:48:32', 'Added Resident named a, a a'),
(103, 'Administrator', '2023-09-07 04:49:00', 'Added Resident named a, a a'),
(104, 'Administrator', '2023-09-07 04:49:14', 'Added Resident named a, a a'),
(105, 'Administrator', '2023-09-07 04:49:25', 'Added Resident named a, a a'),
(106, 'Administrator', '2023-09-07 04:49:43', 'Added Resident named a, a a'),
(107, 'Administrator', '2023-09-07 04:50:37', 'Added Resident named a, a a'),
(108, 'Administrator', '2023-09-07 04:54:23', 'Added Resident named a, a a'),
(109, 'Administrator', '2023-09-07 04:54:51', 'Added Resident named a, a a'),
(110, 'Administrator', '2023-09-07 04:57:25', 'Added Resident named a, a a'),
(111, 'Administrator', '2023-09-07 04:59:24', 'Update Resident named sda, as das'),
(112, 'Administrator', '2023-09-07 05:03:05', 'Update Resident named sda, as das'),
(113, 'Administrator', '2023-09-07 05:05:34', 'Update Resident named sda, as das'),
(114, 'Administrator', '2023-09-07 05:05:48', 'Update Resident named sdaaaa, as das'),
(115, 'Administrator', '2023-09-07 05:06:21', 'Added Resident named bb, bb bb'),
(116, 'Administrator', '2023-09-07 05:07:44', 'Added Resident named bb, bb bb'),
(117, 'Administrator', '2023-09-07 05:10:42', 'Added Resident named bb, bb bb'),
(118, 'Administrator', '2023-09-07 05:10:47', 'Added Resident named bb, bb bb'),
(119, 'Administrator', '2023-09-07 05:10:59', 'Added Resident named bb, bb bb'),
(120, 'Administrator', '2023-09-07 05:11:18', 'Added Resident named gg, gg gg'),
(121, 'Administrator', '2023-09-07 05:11:38', 'Added Resident named gg, gg gg'),
(122, 'Administrator', '2023-09-07 05:11:59', 'Added Resident named gg, gg gg'),
(123, 'Administrator', '2023-09-07 05:13:56', 'Added Resident named yy, yy yy'),
(124, 'Administrator', '2023-09-07 05:19:09', 'Added Resident named yy, yy yy'),
(125, 'Administrator', '2023-09-07 05:21:54', 'Update Resident named Roque, James Canete'),
(126, 'Administrator', '2023-09-07 05:22:30', 'Added Resident named a, a a'),
(127, 'Administrator', '2023-09-07 05:24:58', 'Added Resident named aa, aa aa'),
(128, 'Administrator', '2023-09-07 05:31:20', 'Added Resident named a, a a'),
(129, 'Administrator', '2023-09-07 05:32:42', 'Added Resident named a, a a'),
(130, 'Administrator', '2023-09-07 05:33:10', 'Added Resident named a, a a'),
(131, 'Administrator', '2023-09-07 05:33:27', 'Added Resident named a, a a'),
(132, 'Administrator', '2023-09-07 05:34:34', 'Added Resident named a, a a'),
(133, 'Administrator', '2023-09-07 05:36:22', 'Added Resident named a, a a'),
(134, 'Administrator', '2023-09-07 05:39:04', 'Added Resident named q, q q'),
(135, 'Administrator', '2023-09-07 05:39:32', 'Added Resident named q, q q'),
(136, 'Administrator', '2023-09-07 05:46:29', 'Added Resident named q, q q'),
(137, 'Administrator', '2023-09-07 05:46:43', 'Added Resident named q, q q'),
(138, 'Administrator', '2023-09-07 05:47:00', 'Added Resident named q, q q'),
(139, 'Administrator', '2023-09-07 05:48:17', 'Added Resident named q, q q'),
(140, 'Administrator', '2023-09-07 05:49:28', 'Added Resident named q, q q'),
(141, 'Administrator', '2023-09-07 05:55:38', 'Added Resident named a, a a'),
(142, 'Administrator', '2023-09-07 05:57:01', 'Update Resident named a, a a'),
(143, 'Administrator', '2023-09-07 05:57:19', 'Update Resident named a, a a'),
(144, 'Administrator', '2023-09-07 05:57:28', 'Update Resident named q, q q'),
(145, 'Administrator', '2023-09-07 06:05:01', 'Update Resident named a, a a'),
(146, 'Administrator', '2023-09-07 06:05:24', 'Update Resident named a, a a'),
(147, 'Administrator', '2023-09-07 06:06:29', 'Update Resident named a, a a'),
(148, 'Administrator', '2023-09-07 06:12:04', 'Update Resident named a, a a'),
(149, 'Administrator', '2023-09-07 06:19:34', 'Update Resident named Roque, James Canete'),
(150, 'Administrator', '2023-09-07 06:20:13', 'Update Resident named Roque, James Canete'),
(151, 'Administrator', '2023-09-07 06:20:17', 'Update Resident named Roque, James Canete'),
(152, 'Administrator', '2023-09-07 06:20:31', 'Update Resident named q, q q'),
(153, 'Administrator', '2023-09-07 06:21:38', 'Added Resident named v, v v'),
(154, 'Administrator', '2023-09-07 06:27:51', 'Update Resident named a, a a'),
(155, 'Administrator', '2023-09-07 06:28:39', 'Update Resident named a, a a'),
(156, 'Administrator', '2023-09-07 06:29:58', 'Update Resident named a, a a'),
(157, 'Administrator', '2023-09-07 06:30:09', 'Update Resident named q, q q'),
(158, 'Administrator', '2023-09-07 06:30:39', 'Added Resident named aa, aa aa'),
(159, 'Administrator', '2023-09-07 06:30:47', 'Update Resident named aa, aa aa'),
(160, 'Administrator', '2023-09-07 06:32:55', 'Added Resident named Braga, Mary Villa'),
(161, 'Administrator', '2023-09-07 06:35:49', 'Added Resident named Domingo, Benjamin Santos'),
(162, 'Administrator', '2023-09-07 06:38:09', 'Update Resident named Domingo, Benjamin Santos'),
(163, 'Administrator', '2023-09-07 06:38:28', 'Update Resident named Braga, Mary Villa'),
(164, 'Administrator', '2023-09-07 06:38:49', 'Update Resident named Roque, James Canete'),
(165, 'Administrator', '2023-09-07 06:41:14', 'Added Resident named Estrada, Mark Rivera'),
(166, 'Administrator', '2023-09-07 06:42:05', 'Update Resident named Estrada, Mark Rivera'),
(167, 'Administrator', '2023-09-07 06:42:29', 'Update Resident named Estrada, Mark Rivera'),
(168, 'Administrator', '2023-09-07 06:42:38', 'Update Resident named Estrada, Mark Rivera'),
(169, 'Administrator', '2023-09-07 06:42:48', 'Update Resident named Estrada, Mark Rivera'),
(170, 'Administrator', '2023-09-07 06:43:25', 'Update Blotter Request by a, asd das'),
(171, 'Administrator', '2023-09-07 06:45:43', 'Added Blotter Request by sss'),
(172, 'Administrator', '2023-09-07 06:45:57', 'Added Blotter Request by sss'),
(173, 'Administrator', '2023-09-07 06:46:08', 'Added Blotter Request by sss'),
(174, 'Administrator', '2023-09-07 06:46:27', 'Added Blotter Request by sss'),
(175, 'Administrator', '2023-09-07 06:46:47', 'Added Blotter Request by sss'),
(176, 'Administrator', '2023-09-07 06:49:38', 'Added Blotter Request by Roque, James Canete'),
(177, 'Administrator', '2023-09-07 07:27:05', 'Added Resident named Jacinto, Jane Tan'),
(178, 'Administrator', '2023-09-07 07:28:47', 'Added Resident named Gomez, Carlo '),
(179, 'Administrator', '2023-09-08 06:21:14', 'Added Resident named a, a a'),
(180, 'Administrator', '2023-09-08 06:21:36', 'Added Resident named a, a a'),
(181, 'Administrator', '2023-09-08 06:21:54', 'Added Resident named d, d d'),
(182, 'Administrator', '2023-09-08 06:22:13', 'Added Resident named d, d d'),
(183, 'Administrator', '2023-09-08 06:23:25', 'Added Resident named b, b b'),
(184, 'Administrator', '2023-09-08 15:16:28', 'Added Resident named a, a a'),
(185, 'Administrator', '2023-09-08 15:26:59', 'Added Resident named 1, 1 1'),
(186, 'Administrator', '2023-09-08 15:28:31', 'Added Resident named 1, 1 1'),
(187, 'Administrator', '2023-09-08 15:28:57', 'Added Resident named a, a a'),
(188, 'Administrator', '2023-09-08 15:29:05', 'Added Resident named a, a a'),
(189, 'Administrator', '2023-09-08 15:34:37', 'Added Resident named 1, 1 1'),
(190, 'Administrator', '2023-09-08 15:35:12', 'Added Resident named 1, 1 1'),
(191, 'Administrator', '2023-09-08 16:35:49', 'Update Resident named Jacinto, Jane Tan'),
(192, 'Administrator', '2023-09-08 16:35:49', 'Update Resident named Jacinto, Jane Tan'),
(193, 'Administrator', '2023-09-08 16:36:24', 'Added Resident named 1, 1 1'),
(194, 'Administrator', '2023-09-08 16:59:41', 'Added Resident named 2, 2 2'),
(195, 'Administrator', '2023-09-08 17:00:41', 'Update Resident named Domingo, Benjamin Santos'),
(196, 'Administrator', '2023-09-08 17:01:26', 'Added Resident named 1, 1 1'),
(197, 'Administrator', '2023-09-08 17:40:29', 'Added Resident named 1, 1 1'),
(198, 'Administrator', '2023-09-08 17:42:06', 'Added Resident named 1, 1 1'),
(199, 'Administrator', '2023-09-08 17:42:37', 'Added Resident named 1, 1 1'),
(200, 'Administrator', '2023-09-08 17:49:52', 'Added Resident named 1, 1 1'),
(201, 'Administrator', '2023-09-08 17:50:17', 'Added Resident named 1, 1 1'),
(202, 'Administrator', '2023-09-08 17:56:01', 'Added Resident named 1, 1 2'),
(203, 'Administrator', '2023-09-08 17:56:41', 'Added Resident named 1, 1 2'),
(204, 'Administrator', '2023-09-08 17:57:21', 'Added Resident named 2, 2 2'),
(205, 'Administrator', '2023-09-08 17:57:54', 'Added Resident named d, d d'),
(206, 'Administrator', '2023-09-08 17:58:05', 'Added Resident named d, d d'),
(207, 'Administrator', '2023-09-08 17:58:32', 'Update Resident named 1, 1 1'),
(208, 'Administrator', '2023-09-08 17:59:11', 'Added Resident named 1, 1 1'),
(209, 'Administrator', '2023-09-08 17:59:21', 'Added Resident named 1, 1 1'),
(210, 'Administrator', '2023-09-08 19:59:31', 'Added Resident named 1, 1 1'),
(211, 'Administrator', '2023-09-08 21:50:13', 'Added Resident named 2, 2 2'),
(212, 'Administrator', '2023-09-08 23:04:47', 'Update Resident named 1, 1 1'),
(213, 'Administrator', '2023-09-08 23:51:34', 'Added Resident named Gomez, Sheryl Santos'),
(214, 'Administrator', '2023-09-08 23:55:19', 'Added Resident named Cruz, James '),
(215, 'Administrator', '2023-09-09 00:04:31', 'Added Resident named Cinco, Tony '),
(216, 'Administrator', '2023-09-09 00:04:58', 'Update Resident named Cruz, James '),
(217, 'Administrator', '2023-09-09 00:05:18', 'Update Resident named Gomez, Sheryl Santos'),
(218, 'Administrator', '2023-09-09 00:11:01', 'Added Resident named Quebec, Philip  Cruz'),
(219, 'Administrator', '2023-09-09 01:21:43', 'Added Resident named Castañeda, Angelito '),
(220, 'Administrator', '2023-09-09 01:24:57', 'Added Resident named Rodriguez, Micaela Lim'),
(221, 'Administrator', '2023-09-09 01:29:18', 'Added Resident named Cabrera, Kailyn Atayde'),
(222, 'Administrator', '2023-09-09 01:34:16', 'Added Resident named Ginete, Crystal Jeanne '),
(223, 'Administrator', '2023-09-09 02:32:39', 'Added Resident named rosas, maryli f'),
(224, 'Administrator', '2023-09-09 02:36:51', 'Added Blotter Request by Quebec, Philip Cruz'),
(225, 'Administrator', '2023-09-09 02:36:57', 'Added Blotter Request by Quebec, Philip Cruz'),
(226, 'Administrator', '2023-09-09 02:37:56', 'Added Activity Try out beshie'),
(227, 'Administrator', '2024-03-12 06:11:19', 'Added Official named '),
(228, 'Administrator', '2024-03-13 02:53:01', 'Update Resident named Cinco, Tony '),
(229, 'Administrator', '2024-03-13 02:53:25', 'Update Resident named Cinco, Tony '),
(230, 'Administrator', '2024-03-15 13:10:19', 'Added Resident named BB, BB BB'),
(231, 'Administrator', '2024-03-15 13:12:31', 'Added Resident named BB, BB BB'),
(232, 'Administrator', '2024-03-15 13:13:15', 'Added Resident named BB, BB BB'),
(233, 'Administrator', '2024-03-15 13:13:55', 'Added Resident named BB, BB BB'),
(234, 'Administrator', '2024-03-15 13:14:29', 'Added Resident named BB, BB BB'),
(235, 'Administrator', '2024-03-15 13:15:03', 'Added Resident named BB, BB BB'),
(236, 'Administrator', '2024-03-15 13:15:30', 'Added Resident named BB, BB BB'),
(237, 'Administrator', '2024-03-15 13:16:00', 'Added Resident named BB, BB BB'),
(238, 'Administrator', '2024-03-15 13:16:33', 'Added Resident named BB, BB BB'),
(239, 'Administrator', '2024-03-15 13:16:59', 'Added Resident named BB, BB BB'),
(240, 'Administrator', '2024-03-15 13:17:29', 'Added Resident named BB, BB BB'),
(241, 'Administrator', '2024-03-15 13:17:57', 'Added Resident named BB, BB BB'),
(242, 'Administrator', '2024-03-15 13:18:49', 'Added Resident named BB, BB BB'),
(243, 'Administrator', '2024-03-15 13:25:59', 'Update Resident named CCC, C C'),
(244, 'Administrator', '2024-03-15 13:27:13', 'Added Resident named VV, VV VV'),
(245, 'Administrator', '2024-03-15 13:54:47', 'Update Resident named Gomez, Sheryl Santos'),
(246, 'Administrator', '2024-03-15 13:55:06', 'Update Resident named Cruz, James '),
(247, 'Administrator', '2024-03-15 13:58:22', 'Added Blotter Request by Cruz, James'),
(248, 'Administrator', '2024-03-15 14:04:48', 'Added Blotter Request by aa'),
(249, 'Administrator', '2024-03-15 14:05:10', 'Update Blotter Request by bb'),
(250, 'Administrator', '2024-03-15 14:08:05', 'Added Resident named nn, nn nn'),
(251, 'Administrator', '2024-03-15 14:08:39', 'Update Resident named vv, vv vv'),
(252, 'Administrator', '2024-03-15 14:08:58', 'Update Resident named nn, nn nn'),
(253, 'Administrator', '2024-03-15 14:10:32', 'Added Official named aa'),
(254, 'Administrator', '2024-03-15 14:10:43', 'Update Official named bb'),
(255, 'Administrator', '2024-03-15 14:14:29', 'Update Resident named Ginete, Crystal Jeanne '),
(256, 'Administrator', '2024-03-15 14:24:16', 'Update Resident named Cinco, Tony '),
(257, 'Administrator', '2024-03-15 14:25:13', 'Added Resident named bb, bb bb'),
(258, 'Administrator', '2024-03-15 14:25:45', 'Update Resident named cc, cc cc'),
(259, 'Administrator', '2024-03-15 14:29:11', 'Added Activity DD'),
(260, 'Administrator', '2024-03-15 14:30:12', 'Update Activity Announcement'),
(261, 'Administrator', '2024-03-16 01:27:40', 'Added Activity Test announcement'),
(262, 'Administrator', '2024-03-16 01:33:34', 'Added Activity Hello'),
(263, 'Administrator', '2024-03-16 02:03:44', 'Added Blotter Request by '),
(264, 'Administrator', '2024-03-16 02:04:01', 'Added Blotter Request by '),
(265, 'Administrator', '2024-03-16 02:04:12', 'Added Blotter Request by '),
(266, 'Administrator', '2024-03-16 02:31:02', 'Added Blotter Request by '),
(267, 'Administrator', '2024-03-16 02:31:07', 'Added Blotter Request by '),
(268, 'Administrator', '2024-03-16 02:31:16', 'Added Blotter Request by '),
(269, 'Administrator', '2024-03-16 02:31:20', 'Added Blotter Request by '),
(270, 'Administrator', '2024-03-16 02:32:05', 'Update Activity Hello'),
(271, 'Administrator', '2024-03-16 02:32:14', 'Added Activity '),
(272, 'Administrator', '2024-03-16 02:32:25', 'Added Activity '),
(273, 'Administrator', '2024-03-16 02:34:27', 'Added Blotter Request by aa'),
(274, 'Administrator', '2024-03-16 02:34:38', 'Added Blotter Request by aa'),
(275, 'Administrator', '2024-03-16 02:34:40', 'Added Blotter Request by aa'),
(276, 'Administrator', '2024-03-16 02:38:06', 'Added Blotter Request by aa'),
(277, 'Administrator', '2024-03-16 02:38:40', 'Update Blotter Request by aa'),
(278, 'Administrator', '2024-03-16 02:38:48', 'Update Blotter Request by aa'),
(279, 'Administrator', '2024-03-16 02:39:08', 'Added Official named '),
(280, 'Administrator', '2024-03-16 02:40:14', 'Update Official named HOA President'),
(281, 'Administrator', '2024-03-16 02:40:48', 'Update Official named HOA President'),
(282, 'Administrator', '2024-03-16 02:41:28', 'Update Official named HOA President'),
(283, 'Administrator', '2024-03-16 02:42:30', 'Update Official named HOA Vice President'),
(284, 'Administrator', '2024-03-16 02:42:37', 'Update Official named HOA President'),
(285, 'Administrator', '2024-03-16 03:27:23', 'Update Official named HOA President'),
(286, 'Administrator', '2024-03-16 03:27:33', 'Update Official named HOA Vice President'),
(287, 'Administrator', '2024-03-16 03:28:05', 'Update Official named HOA Secretary'),
(288, 'Administrator', '2024-03-16 03:43:26', 'Added Activity Meeting'),
(289, 'Administrator', '2024-03-16 03:49:37', 'Update Official named HOA Treasurer'),
(290, 'Administrator', '2024-03-16 03:50:00', 'Update Official named Maintenance Committee'),
(291, 'Administrator', '2024-03-16 03:50:22', 'Update Official named HOA Auditor'),
(292, 'Administrator', '2024-03-16 03:50:41', 'Update Official named HOA President'),
(293, 'Administrator', '2024-03-16 03:51:04', 'Update Official named Peace & Order'),
(294, 'Administrator', '2024-03-16 03:51:38', 'Update Official named Board of Director'),
(295, 'Administrator', '2024-03-16 03:51:57', 'Update Official named Legal Affairs Committee'),
(296, 'Administrator', '2024-03-26 20:09:05', 'Update Permit with permit number of 1022'),
(297, 'Administrator', '2024-03-31 12:06:31', 'Update Permit with permit number of 1021'),
(298, 'Administrator', '2024-03-31 12:21:36', 'Update Permit with permit number of 1022'),
(299, 'Administrator', '2024-03-31 12:23:00', 'Update Permit with permit number of 1022'),
(300, 'Administrator', '2024-03-31 12:23:49', 'Update Permit with permit number of 1023'),
(301, 'Administrator', '2024-03-31 12:24:38', 'Update Permit with permit number of 1023'),
(302, 'Administrator', '2024-03-31 12:24:43', 'Update Permit with permit number of 1023'),
(303, 'Administrator', '2024-03-31 14:54:22', 'Update Permit with permit number of 10'),
(304, 'Administrator', '2024-04-02 16:50:22', 'Added Blotter Request by aaa'),
(305, 'Administrator', '2024-04-02 16:50:33', 'Update Blotter Request by bbb'),
(306, 'Administrator', '2024-04-02 17:19:24', 'Update Permit with permit number of 1012'),
(307, 'Administrator', '2024-04-02 17:26:42', 'Update Permit with permit number of 1023'),
(308, 'Administrator', '2024-04-02 17:32:00', 'Added Resident named Nunez , Jefferson '),
(309, 'Administrator', '2024-04-02 18:02:10', 'Added Resident named Marquez, Nataniel Singco'),
(310, 'Administrator', '2024-04-02 18:04:47', 'Added Resident named Mariano, Juliana '),
(311, 'Administrator', '2024-04-02 18:08:27', 'Added Resident named Ylagan, Tanya '),
(312, 'Administrator', '2024-04-02 18:09:07', 'Update Resident named Cruz, James '),
(313, 'Administrator', '2024-04-02 18:09:25', 'Update Resident named Rodriguez, Micaela Lim'),
(314, 'Administrator', '2024-04-02 18:09:45', 'Update Resident named Gomez, Sheryl Santos'),
(315, 'Administrator', '2024-04-02 18:10:06', 'Update Resident named Ylagan, Tanya '),
(316, 'Administrator', '2024-04-02 18:10:19', 'Update Resident named Mariano, Juliana '),
(317, 'Administrator', '2024-04-02 18:10:26', 'Update Resident named Nunez , Jefferson '),
(318, 'Administrator', '2024-04-02 18:10:34', 'Update Resident named Rodriguez, Micaela Lim'),
(319, 'Administrator', '2024-04-02 18:10:43', 'Update Resident named Cruz, James '),
(320, 'Administrator', '2024-04-02 18:13:20', 'Added Resident named Manalo, Grace Gallano'),
(321, 'Administrator', '2024-04-02 18:16:11', 'Added Resident named Jacinto, Oliver '),
(322, 'Administrator', '2024-04-02 18:17:02', 'Update Official named HOA President'),
(323, 'Administrator', '2024-04-02 18:17:08', 'Update Official named HOA Vice President'),
(324, 'Administrator', '2024-04-02 18:17:13', 'Update Official named HOA Secretary'),
(325, 'Administrator', '2024-04-02 18:17:16', 'Update Official named Legal Affairs Committee'),
(326, 'Administrator', '2024-04-02 18:17:23', 'Update Official named Board of Director'),
(327, 'Administrator', '2024-04-02 18:17:28', 'Update Official named Peace & Order'),
(328, 'Administrator', '2024-04-02 18:17:34', 'Update Official named Maintenance Committee'),
(329, 'Administrator', '2024-04-02 18:17:39', 'Update Official named HOA Auditor'),
(330, 'Administrator', '2024-04-02 18:17:44', 'Update Official named HOA Treasurer'),
(331, 'Administrator', '2024-04-02 18:23:34', 'Added Blotter Request by Nunez, Jefferson'),
(332, 'Administrator', '2024-04-02 18:23:45', 'Added Blotter Request by Nunez, Jefferson'),
(333, 'Administrator', '2024-04-02 18:24:01', 'Added Blotter Request by a'),
(334, 'Administrator', '2024-04-02 18:24:32', 'Update Resident named Nunez, Jefferson '),
(335, 'Administrator', '2024-04-02 18:28:34', 'Added Blotter Request by Nunez, Jefferson'),
(336, 'Administrator', '2024-04-02 18:29:06', 'Added Blotter Request by Nunez, Jefferson'),
(337, 'Administrator', '2024-04-02 18:29:20', 'Added Blotter Request by '),
(338, 'Administrator', '2024-04-02 18:29:38', 'Added Blotter Request by '),
(339, 'Administrator', '2024-04-02 18:30:48', 'Added Blotter Request by Nunez, Jefferson'),
(340, 'Administrator', '2024-04-02 18:31:07', 'Added Blotter Request by Nunez, Jefferson'),
(341, 'Administrator', '2024-04-02 18:31:16', 'Update Blotter Request by Nunez, Jefferson'),
(342, 'Administrator', '2024-04-02 18:31:34', 'Update Blotter Request by Nunez, Jefferson'),
(343, 'Administrator', '2024-04-02 18:32:09', 'Update Blotter Request by Nunez, Jefferson'),
(344, 'Administrator', '2024-04-02 18:33:25', 'Update Blotter Request by Nunez, Jefferson'),
(345, 'Administrator', '2024-04-02 18:35:21', 'Update Blotter Request by Nunez, Jefferson'),
(346, 'Administrator', '2024-04-02 18:35:32', 'Update Blotter Request by Nunez, Jefferson'),
(347, 'Administrator', '2024-04-02 18:36:06', 'Update Blotter Request by Nunez, Jefferson'),
(348, 'Administrator', '2024-04-02 18:37:39', 'Update Blotter Request by Nunez, Jefferson'),
(349, 'Administrator', '2024-04-02 18:37:49', 'Update Blotter Request by Nunez, Jefferson'),
(350, 'Administrator', '2024-04-02 18:38:38', 'Update Blotter Request by Nunez, Jefferson'),
(351, 'Administrator', '2024-04-02 19:18:07', 'Update Permit with permit number of 1013'),
(352, 'Administrator', '2024-04-02 22:12:08', 'Update Car Sticker with sticker number of 291'),
(353, 'Administrator', '2024-04-02 22:40:06', 'Update Resident named Ylagan, Tanya '),
(354, 'Administrator', '2024-04-02 22:40:14', 'Update Resident named Ylagan, Tanya '),
(355, 'Administrator', '2024-04-02 22:47:09', 'Update Car Sticker with sticker number of 292'),
(356, 'Administrator', '2024-04-03 02:41:05', 'Added Resident named aa, aa aa'),
(357, 'Administrator', '2024-04-03 02:41:22', 'Added Resident named aa, aa aa'),
(358, 'Administrator', '2024-04-03 02:41:52', 'Added Resident named a, a '),
(359, 'Administrator', '2024-04-03 02:42:10', 'Update Resident named a, a '),
(360, 'Administrator', '2024-04-04 02:50:06', 'Update Resident named Ylagan, Tanya B'),
(361, 'Administrator', '2024-04-05 07:18:21', 'Update Resident named Ylagan, Tanya B'),
(362, 'Administrator', '2024-04-05 07:20:45', 'Added Resident named bvbv, bm mbm'),
(363, 'Administrator', '2024-04-05 13:20:16', 'Update Resident named Manalo, Grace Gallano'),
(364, 'Administrator', '2024-04-05 13:20:22', 'Update Resident named Manalo, Grace Gallano'),
(365, 'Administrator', '2024-04-05 13:21:05', 'Update Resident named Manalo, Grace Gallano'),
(366, 'Administrator', '2024-04-05 13:21:11', 'Update Resident named Manalo, Grace Gallano'),
(367, 'Administrator', '2024-04-05 14:06:42', 'Added Resident named qq, qq qq'),
(368, 'Administrator', '2024-04-05 14:07:01', 'Update Resident named qq, qq qq'),
(369, 'Administrator', '2024-04-05 14:52:42', 'Added Resident named QQ, QQ QQ'),
(370, 'Administrator', '2024-04-05 14:53:11', 'Update Resident named QQ, QQ QQ'),
(371, 'Administrator', '2024-04-05 14:53:51', 'Update Resident named QQ, QQ QQ'),
(372, 'Administrator', '2024-04-05 20:33:27', 'Update monthly due with monthly number of 21'),
(373, 'Administrator', '2024-04-05 20:33:46', 'Update monthly due with monthly number of 22'),
(374, 'Administrator', '2024-04-08 05:50:14', 'Added Blotter Request by Quebec, Philip Cruz'),
(375, 'Administrator', '2024-04-08 05:53:58', 'Added Blotter Request by Nunez, Jefferson'),
(376, 'Administrator', '2024-04-08 05:54:03', 'Added Blotter Request by Nunez, Jefferson'),
(377, 'Administrator', '2024-04-08 05:58:40', 'Added Blotter Request by Nunez, Jefferson'),
(378, 'Administrator', '2024-04-08 05:59:01', 'Update Blotter Request by Nunez, Jefferson'),
(379, 'Administrator', '2024-04-08 05:59:31', 'Update Resident named Rodriguez, Micaela Lim'),
(380, 'Administrator', '2024-04-08 06:00:04', 'Update Blotter Request by Nunez, Jefferson'),
(381, 'Administrator', '2024-04-08 06:00:18', 'Update Blotter Request by Nunez, Jefferson'),
(382, 'Administrator', '2024-04-08 06:00:47', 'Update Blotter Request by Nunez, Jefferson'),
(383, 'Administrator', '2024-04-08 06:00:58', 'Update Blotter Request by Nunez, Jefferson'),
(384, 'Administrator', '2024-04-16 20:29:18', 'Added Building Permit with permit number of 1099'),
(385, 'Administrator', '2024-04-16 20:42:17', 'Update monthly due with monthly number of 1012'),
(386, 'Administrator', '2024-04-16 20:45:16', 'Update monthly due with monthly number of 22'),
(387, 'Administrator', '2024-04-16 20:45:32', 'Update monthly due with monthly number of 1021'),
(388, 'Administrator', '2024-04-18 10:15:01', 'Added Memoradum with memo number of 1024'),
(389, 'Administrator', '2024-04-18 10:32:24', 'Update Permit with permit number of 199'),
(390, 'Administrator', '2024-04-18 18:16:53', 'Added Solicitation Form with solicit number of 200'),
(391, 'Administrator', '2024-04-18 18:17:20', 'Update Permit with permit number of 200'),
(392, 'Administrator', '2024-04-18 18:29:11', 'Update clubhouse reservation with reservation number of 2'),
(393, 'Administrator', '2024-04-18 18:30:36', 'Update clubhouse reservation with reservation number of 2'),
(394, 'Administrator', '2024-04-18 18:33:18', 'Update clubhouse reservation with reservation number of 3'),
(395, 'Administrator', '2024-04-18 18:37:36', 'Update clubhouse reservation with reservation number of 3'),
(396, 'Administrator', '2024-04-18 18:41:12', 'Update clubhouse reservation with reservation number of 3'),
(397, 'Administrator', '2024-04-18 18:41:22', 'Update clubhouse reservation with reservation number of 3'),
(398, 'Administrator', '2024-04-18 18:41:39', 'Update clubhouse reservation with reservation number of 3'),
(399, 'Administrator', '2024-04-20 10:25:32', 'Added Clubhouse Reservation with reserve number of 4'),
(400, 'Administrator', '2024-04-20 10:26:43', 'Added Clubhouse Reservation with reserve number of 4'),
(401, 'Administrator', '2024-04-21 10:12:21', 'Added Car Sticker with sticker number of 251'),
(402, 'Administrator', '2024-04-21 10:44:44', 'Added ID Application with ID number of 189'),
(403, 'Administrator', '2024-04-21 10:45:13', 'Added ID Application with ID number of 190'),
(404, 'Administrator', '2024-04-21 10:45:47', 'Added Monthly Due with monthly due number of 212'),
(405, 'Administrator', '2024-04-21 11:37:08', 'Update Resident named Manalo, Grace Gallano'),
(406, 'Administrator', '2024-04-21 11:37:15', 'Update Resident named Manalo, Grace Gallano'),
(407, 'Administrator', '2024-04-21 11:37:34', 'Update Resident named Manalo, Grace Gallano'),
(408, 'Administrator', '2024-04-21 11:38:22', 'Update Resident named Manalo, Grace Gallano'),
(409, 'Administrator', '2024-04-22 12:24:22', 'Added ID Application with ID number of 191'),
(410, 'Administrator', '2024-04-23 03:48:52', 'Added Resident named Ginete, Crystal Bacerdo'),
(411, 'Administrator', '2024-04-23 03:52:51', 'Added Building Permit with permit number of 256'),
(412, 'Administrator', '2024-04-23 03:54:51', 'Update Resident named Ginete, Crystal Jeanne '),
(413, 'Administrator', '2024-04-23 04:01:47', 'Added Car Sticker with sticker number of 252'),
(414, 'Administrator', '2024-04-23 04:06:51', 'Update Blotter Request by Nunez, Jefferson'),
(415, 'Administrator', '2024-04-23 15:06:24', 'Added Building Permit with permit number of 1100'),
(416, 'Administrator', '2024-04-25 19:15:42', 'Added Blotter Request by Gomez, Sheryl Santos'),
(417, 'Administrator', '2024-04-25 19:17:18', 'Added Blotter Request by Rodriguez, Micaela Lim'),
(418, 'Administrator', '2024-04-25 19:17:52', 'Added Blotter Request by Gomez, Sheryl Santos'),
(419, 'Administrator', '2024-04-25 19:19:53', 'Added Blotter Request by Gomez, Sheryl Santos'),
(420, 'Administrator', '2024-04-25 19:19:56', 'Added Blotter Request by Gomez, Sheryl Santos'),
(421, 'Administrator', '2024-04-25 19:20:38', 'Added Blotter Request by Gomez, Sheryl Santos'),
(422, 'Administrator', '2024-04-25 19:28:12', 'Added Blotter Request by Quebec, Philip Cruz'),
(423, 'Administrator', '2024-04-25 19:30:04', 'Added Blotter Request by '),
(424, 'Administrator', '2024-04-25 19:34:14', 'Update Blotter Request by Quebec, Philip Cruz'),
(425, 'Administrator', '2024-04-26 04:44:01', 'Added Blotter Request by Gomez, Sheryl Santos'),
(426, 'Administrator', '2024-04-26 04:44:27', 'Update Blotter Request by Quebec, Philip Cruz'),
(427, 'Administrator', '2024-05-06 13:39:20', 'Update Resident named Manalo, Grace Gallano'),
(428, 'Administrator', '2024-05-06 13:39:22', 'Update Resident named Manalo, Grace Gallano'),
(429, 'Administrator', '2024-05-08 13:51:18', 'Added Resident named aa, aa aa'),
(430, 'Administrator', '2024-05-08 13:51:47', 'Update Resident named aa, aa aa'),
(431, 'Administrator', '2024-05-08 13:57:54', 'Update Resident named Jacinto, Oliver '),
(432, 'Administrator', '2024-05-08 13:58:25', 'Update Resident named Cabrera, Kailyn Atayde'),
(433, 'Administrator', '2024-05-08 13:58:47', 'Update Resident named Rodriguez, Micaela Lim'),
(434, 'Administrator', '2024-05-08 13:59:28', 'Update Resident named Manalo, Chris Gallano'),
(435, 'Administrator', '2024-05-08 13:59:47', 'Update Resident named Nunez, Jefferson '),
(436, 'Administrator', '2024-05-08 14:00:04', 'Update Resident named Manalo, Chris Gallano'),
(437, 'Administrator', '2024-05-08 14:00:13', 'Update Resident named Gomez, Sheryl Santos'),
(438, 'Administrator', '2024-05-08 14:00:22', 'Update Resident named Ginete, Crystal Jeanne '),
(439, 'Administrator', '2024-05-08 14:00:37', 'Update Resident named Mariano, Juliana '),
(440, 'Administrator', '2024-05-08 14:01:06', 'Update Resident named Quebec, Philip  Cruz'),
(441, 'Administrator', '2024-05-08 17:37:57', 'Added Official named Quebec, Philip Cruz'),
(442, 'Administrator', '2024-05-09 02:51:49', 'Added Resident named Pabico, Cesar '),
(443, 'Administrator', '2024-05-09 02:52:11', 'Added Official named Pabico, Cesar'),
(444, 'Administrator', '2024-05-09 02:55:14', 'Added Resident named Pataray, Benjamin '),
(445, 'Administrator', '2024-05-09 02:55:37', 'Added Official named Pataray, Benjamin'),
(446, 'Administrator', '2024-05-09 02:57:18', 'Added Resident named Macalima, Jeana '),
(447, 'Administrator', '2024-05-09 02:57:43', 'Added Official named Macalima, Jeana'),
(448, 'Administrator', '2024-05-09 02:59:48', 'Added Resident named Diaz, Estelita '),
(449, 'Administrator', '2024-05-09 03:01:27', 'Added Resident named Okabe, Glenda '),
(450, 'Administrator', '2024-05-09 03:03:04', 'Added Resident named Labaso, Bernie '),
(451, 'Administrator', '2024-05-09 03:04:54', 'Added Resident named Antang, Mario '),
(452, 'Administrator', '2024-05-09 03:06:23', 'Added Resident named Koh, Rowena '),
(453, 'Administrator', '2024-05-09 03:07:58', 'Added Resident named Orense, Meldred '),
(454, 'Administrator', '2024-05-09 03:09:43', 'Added Resident named Gabijan, Dwight '),
(455, 'Administrator', '2024-05-09 03:10:09', 'Update Blotter Request by Nunez, Jefferson'),
(456, 'Administrator', '2024-05-09 03:10:57', 'Added Official named Diaz, Estelita'),
(457, 'Administrator', '2024-05-09 03:11:16', 'Added Official named Okabe, Glenda'),
(458, 'Administrator', '2024-05-09 03:11:57', 'Added Official named Labaso, Bernie'),
(459, 'Administrator', '2024-05-09 03:12:29', 'Update Official named HOA Secretary, Election Committe'),
(460, 'Administrator', '2024-05-09 03:13:06', 'Update Official named HOA Auditor, Audit & Inventory, Financial Mgt. Committe'),
(461, 'Administrator', '2024-05-09 03:13:11', 'Update Official named HOA Auditor, Audit & Inventory, Financial Mgt. Committe'),
(462, 'Administrator', '2024-05-09 03:13:29', 'Update Official named HOA Auditor, Audit & Inventory'),
(463, 'Administrator', '2024-05-09 03:14:00', 'Added Official named Antang, Mario'),
(464, 'Administrator', '2024-05-09 03:14:19', 'Added Official named Koh, Rowena'),
(465, 'Administrator', '2024-05-09 03:14:32', 'Update Official named HOA Auditor'),
(466, 'Administrator', '2024-05-09 03:14:37', 'Update Official named HOA Secretary'),
(467, 'Administrator', '2024-05-09 03:15:17', 'Added Official named Orense, Meldred'),
(468, 'Administrator', '2024-05-09 03:15:37', 'Added Official named Gabijan, Dwight'),
(469, 'Administrator', '2024-05-09 06:56:33', 'Added Resident named Mayuga, Emelyn J'),
(470, 'Administrator', '2024-05-09 06:57:10', 'Update Resident named Mayuga, Emelyn J'),
(471, 'Administrator', '2024-05-09 06:57:46', 'Update Resident named Mayuga, Emelyn J'),
(472, 'Administrator', '2024-05-09 06:58:15', 'Update Resident named Mayuga, Emelyn J'),
(473, 'Administrator', '2024-05-09 06:59:01', 'Update Resident named Mayuga, Emelyn J'),
(474, 'Administrator', '2024-05-09 07:01:09', 'Added Resident named Mayuga, Emelyn J'),
(475, 'Administrator', '2024-05-09 07:02:49', 'Added Resident named Mayuga, Emelyn J'),
(476, 'Administrator', '2024-05-09 07:04:02', 'Added Resident named Mayuga, Emelyn J'),
(477, 'Administrator', '2024-05-09 07:04:48', 'Added Resident named Mayuga, Emelyn J'),
(478, 'Administrator', '2024-05-09 07:05:22', 'Update Resident named Mayuga, Emelyn J'),
(479, 'Administrator', '2024-05-09 07:08:28', 'Update Permit with permit number of 192'),
(480, 'Administrator', '2024-05-09 07:10:48', 'Update Car Sticker with sticker number of 252'),
(481, 'Administrator', '2024-05-09 07:15:48', 'Update Official named HOA President'),
(482, 'Administrator', '2024-05-09 07:16:42', 'Update Permit with permit number of 19'),
(483, 'Administrator', '2024-05-09 07:25:11', 'Update Permit with permit number of 1025'),
(484, 'Administrator', '2024-05-09 07:26:03', 'Update Permit with permit number of 1025'),
(485, 'Administrator', '2024-05-09 07:30:26', 'Update Permit with permit number of 201'),
(486, 'Administrator', '2024-05-09 07:33:45', 'Update Resident named Mayuga, Emelyn J'),
(487, 'Administrator', '2024-05-09 07:39:15', 'Added Activity Church Schedule Sunday'),
(488, 'Administrator', '2024-05-09 07:39:22', 'Added Activity Church Schedule Sunday'),
(489, 'Administrator', '2024-05-09 07:40:17', 'Update Activity Church Schedule Sunday'),
(490, 'Administrator', '2024-07-15 02:29:30', 'Update monthly due with monthly number of 21'),
(491, 'Administrator', '2024-07-15 02:29:41', 'Update monthly due with monthly number of 212'),
(492, 'Administrator', '2024-07-16 08:14:53', 'Update monthly due with monthly number of 2'),
(493, 'Administrator', '2024-07-28 13:44:18', 'Added Monthly Due with monthly due number of 1'),
(494, 'Administrator', '2024-07-28 13:57:39', 'Update monthly due with monthly number of 212'),
(495, 'Administrator', '2024-07-28 14:32:06', 'Update monthly due with monthly number of 0'),
(496, 'Administrator', '2024-07-28 14:34:02', 'Update monthly due with monthly number of 0'),
(497, 'Administrator', '2024-07-28 15:11:12', 'Update Building Permit with permit number of 12345'),
(498, 'Administrator', '2024-07-28 15:12:06', 'Update Building Permit with permit number of 12345'),
(499, 'Administrator', '2024-07-28 15:12:57', 'Update Building Permit with permit number of 12345'),
(500, 'Administrator', '2024-07-28 15:13:37', 'Update Building Permit with permit number of 12345'),
(501, 'Administrator', '2024-07-28 15:51:22', 'Added Monthly Due with monthly due number of 11'),
(502, 'Administrator', '2024-07-28 16:04:41', 'Added Memoradum with memo number of '),
(503, 'Administrator', '2024-07-28 16:07:11', 'Added Memoradum with memo number of ');

-- --------------------------------------------------------

--
-- Table structure for table `tblmemo`
--

CREATE TABLE `tblmemo` (
  `id` int(50) NOT NULL,
  `memo_id` int(50) NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `ref_no` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `req_type` varchar(100) NOT NULL,
  `residentid` int(50) NOT NULL,
  `amount` int(100) NOT NULL,
  `seen` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblmemo`
--

INSERT INTO `tblmemo` (`id`, `memo_id`, `date`, `subject`, `fname`, `address`, `payment`, `ref_no`, `status`, `req_type`, `residentid`, `amount`, `seen`) VALUES
(3, 1023, '2024-04-06', 'Feeding Program Foundation', 'Ginete, Crystal Jeanne', 'Sample', 'Cash', '0', 'Approved', 'Memorandum', 43, 100, 0),
(4, 1024, '2024-04-20', 'General Assembly', 'Sean, Jake Sans', 'B32 L8', 'Gcash', '2323233', 'Approved', 'Memorandum', 0, 100, 0),
(5, 1025, '2024-05-09', 'sample', 'Mayuga, Emelyn J', '', 'Cash', '0', 'Approved', 'Memorandum', 71, 100, 0),
(6, 0, '0000-00-00', 'aaa', 'Ginete, Crystal Jeanne ', '', 'Gcash', '1111', 'Disapproved', 'Memorandum', 43, 0, 0),
(7, 0, '0000-00-00', 'bbb', 'Ginete, Crystal Jeanne ', '', 'Cash', '0', 'Disapproved', 'Memorandum', 43, 0, 0),
(8, 8, '2024-07-30', 'General Assembly', 'Gomez, Richard Cano', 'B32 L8', 'Cash', '0', 'Approved', 'Memorandum', 0, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblmonthly`
--

CREATE TABLE `tblmonthly` (
  `id` int(50) NOT NULL,
  `monthly_no` int(100) NOT NULL,
  `date` date NOT NULL,
  `fname` varchar(200) NOT NULL,
  `payment` varchar(200) NOT NULL,
  `ref_no` int(100) NOT NULL,
  `month` text NOT NULL,
  `amount` int(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `residentid` int(50) NOT NULL,
  `req_type` varchar(100) NOT NULL,
  `seen` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblmonthly`
--

INSERT INTO `tblmonthly` (`id`, `monthly_no`, `date`, `fname`, `payment`, `ref_no`, `month`, `amount`, `status`, `residentid`, `req_type`, `seen`) VALUES
(7, 1012, '2024-04-18', 'Ginete, Crystal Jeanne ', 'Cash', 0, '', 800, 'Disapproved', 43, 'Monthly Due', 0),
(8, 0, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Cash', 0, '', 0, 'Disapproved', 43, 'Monthly Due', 0),
(9, 212, '2024-05-31', '', 'Gcash', 2424242, '', 100, 'Disapproved', 50, 'Monthly Due', 0),
(10, 0, '0000-00-00', 'Mayuga, Emelyn J', 'Cash', 0, '', 0, 'Disapproved', 71, 'Monthly Due', 0),
(12, 0, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Gcash', 1111, 'February', 100, 'Approved', 43, 'Monthly Due', 0),
(15, 0, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Cash', 0, 'March', 0, 'Disapproved', 43, 'Monthly Due', 0),
(16, 0, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Cash', 0, 'March', 0, 'Disapproved', 43, 'Monthly Due', 0),
(18, 0, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Cash', 0, 'February', 0, 'Disapproved', 43, 'Monthly Due', 0),
(20, 0, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Gcash', 33333, 'April', 100, 'Approved', 43, 'Monthly Due', 0),
(21, 21, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Gcash', 999999, 'September', 7777, 'Approved', 43, 'Monthly Due', 0),
(22, 22, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Gcash', 88888, 'August', 100, 'Approved', 43, 'Monthly Due', 1),
(23, 23, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Cash', 0, 'May', 100, 'Approved', 43, 'Monthly Due', 0),
(24, 24, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Cash', 0, 'August', 0, 'New', 43, 'Monthly Due', 1),
(25, 25, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Cash', 0, 'October', 0, 'New', 43, 'Monthly Due', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblofficial`
--

CREATE TABLE `tblofficial` (
  `id` int(11) NOT NULL,
  `sPosition` varchar(50) NOT NULL,
  `completeName` text NOT NULL,
  `pcontact` varchar(20) NOT NULL,
  `paddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblofficial`
--

INSERT INTO `tblofficial` (`id`, `sPosition`, `completeName`, `pcontact`, `paddress`) VALUES
(16, 'HOA President', 'Recto, Sherwin', '09596847665', 'BLK D2 LOT5'),
(17, 'HOA Vice President', 'Pataray, Benjamin', '091234323434', 'BLK D1 LOT4'),
(18, 'HOA Secretary', 'Macalima, Jeana', '09598876483', 'BLK A1 LOT4'),
(19, 'HOA Treasurer', 'Diaz, Estelita', '09684436657', 'BLK B2 LOT2'),
(20, 'HOA Auditor', 'Okabe, Glenda', '0968775904890', 'BLK D2 LOT2'),
(21, 'Membership & Education, Maintenance Committee', 'Labaso, Bernie', '09665986794', 'BLK A1 LOT4'),
(22, 'Peace & Order Commitee', 'Antang, Mario', '09584457768', 'BLK D2 LOT1'),
(23, 'Development Services', 'Koh, Rowena', '09687759049', 'BLK D2 LOT3'),
(24, 'Livelihood Committee', 'Orense, Meldred', '09122233456', 'BLK B1 LOT3'),
(25, 'Legal Affairs Committee', 'Gabijan, Dwight', '09786995849', 'BLK D1 LOT3');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `id` int(11) NOT NULL,
  `blk&lot` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  `cdate` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_type` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payday` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpermit`
--

CREATE TABLE `tblpermit` (
  `id` int(11) NOT NULL,
  `residentid` int(11) NOT NULL,
  `businessName` text NOT NULL,
  `businessAddress` text NOT NULL,
  `typeOfBusiness` varchar(50) NOT NULL,
  `orNo` int(11) NOT NULL,
  `samount` int(11) NOT NULL,
  `dateRecorded` date NOT NULL,
  `recordedBy` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpermit`
--

INSERT INTO `tblpermit` (`id`, `residentid`, `businessName`, `businessAddress`, `typeOfBusiness`, `orNo`, `samount`, `dateRecorded`, `recordedBy`, `status`) VALUES
(1, 11, 'test', 'test', 'Option 2', 213, 2132131, '2016-10-15', '', 'Disapproved'),
(2, 11, 'asda', 'sdfs', 'Option 1', 43434, 45454, '2016-10-15', 'admin', 'Approved'),
(3, 11, '23', 'asda', 'Option 1', 342, 434543, '2016-10-15', 'admin', 'Approved'),
(4, 11, 'Business ', 'Address', 'Option 1', 0, 0, '2016-12-04', 'a', 'New'),
(5, 11, 'sa', 'sa', 'Option 1', 2, 12, '2017-01-20', 'a', 'Approved'),
(6, 11, 'sad', 'asd', 'Option 2', 0, 0, '2017-01-20', 'a', 'New'),
(7, 12, 'hahaha', 'hehe', 'Option 1', 1234, 1234, '2017-01-24', 'admin', 'Approved'),
(8, 13, '2', '2', 'Option 2', 2, 2, '2023-09-06', 'admin', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tblreserve`
--

CREATE TABLE `tblreserve` (
  `id` int(50) NOT NULL,
  `reserve_no` int(100) NOT NULL,
  `date` date NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `startdate` datetime NOT NULL,
  `payment` varchar(100) NOT NULL,
  `ref_no` varchar(200) NOT NULL,
  `amount` int(100) NOT NULL,
  `residentid` int(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `req_type` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `enddate` datetime NOT NULL,
  `seen` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblreserve`
--

INSERT INTO `tblreserve` (`id`, `reserve_no`, `date`, `fullname`, `startdate`, `payment`, `ref_no`, `amount`, `residentid`, `status`, `req_type`, `title`, `description`, `enddate`, `seen`) VALUES
(1, 2, '2024-04-06', 'Manalo, Grace Gallano', '2024-04-20 19:30:00', 'Gcash', '2342342', 1000, 53, 'Approved', 'Clubhouse Reservation', 'Bday Party', '20th birthday party ni bunso', '2024-04-20 21:00:00', 0),
(3, 3, '2024-04-07', 'Jacinto, Oliver ', '2024-04-20 08:30:00', 'Cash', '0', 2500, 54, 'Approved', 'Clubhouse Reservation', 'Free Check Up', 'Check up for senior citizens', '2024-04-20 11:00:00', 0),
(4, 4, '2024-04-20', 'Gomez, Richard Cano', '2024-04-21 18:30:00', 'Gcash', '324434', 1000, 0, 'Approved', 'Clubhouse Reservation', 'Debut', '18th birthday (color black theme)', '2024-04-21 21:30:00', 0),
(5, 0, '2024-05-09', 'Mayuga, Emelyn J', '2024-05-10 15:10:00', 'Cash', '0', 100, 71, 'Approved', 'Clubhouse Reservation', 'birthday', 'birthday', '2024-05-10 18:10:00', 0),
(6, 0, '2024-05-09', 'Ginete, Crystal Jeanne ', '2024-05-10 13:00:00', 'Cash', '0', 100, 43, 'Approved', 'Clubhouse Reservation', 'Debut', 'Debut', '2024-05-10 16:30:00', 0),
(7, 0, '2024-07-28', 'Ginete, Crystal Jeanne ', '2024-07-29 20:42:00', 'Cash', '0', 1200, 43, 'Approved', 'Clubhouse Reservation', 'aa', 'aa', '2024-07-30 08:42:00', 0),
(8, 0, '2024-07-28', 'Ginete, Crystal Jeanne ', '2024-07-28 22:57:00', 'Cash', '0', 11111, 43, 'Approved', 'Clubhouse Reservation', 'aaa', 'aaa', '2024-07-29 22:57:00', 0),
(9, 0, '2024-07-28', 'Ginete, Crystal Jeanne ', '2024-07-29 23:29:00', 'Cash', '0', 0, 43, 'New', 'Clubhouse Reservation', 'fff', 'fff', '2024-07-30 23:29:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblresident`
--

CREATE TABLE `tblresident` (
  `id` int(11) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `bdate` varchar(20) NOT NULL,
  `bplace` text NOT NULL,
  `age` int(11) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `totalhousehold` int(5) NOT NULL,
  `relationtohead` varchar(50) NOT NULL,
  `civilstatus` varchar(20) NOT NULL,
  `emailaddress` text NOT NULL,
  `moveindate` text NOT NULL,
  `gender` varchar(6) NOT NULL,
  `landOwnershipStatus` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblresident`
--

INSERT INTO `tblresident` (`id`, `lname`, `fname`, `mname`, `bdate`, `bplace`, `age`, `zone`, `totalhousehold`, `relationtohead`, `civilstatus`, `emailaddress`, `moveindate`, `gender`, `landOwnershipStatus`, `image`, `username`, `password`) VALUES
(36, 'Gomez', 'Sheryl', 'Santos', '1998-09-10', 'Dasmariñas City, Cavite', 25, 'BLK A1 LOT5', 5, '09573958372', 'Single', 'sheryl98@gmail.com', '2024-03-16', 'Female', 'Owned', 'default.png', 'Sheryl98', 'sheryl98'),
(39, 'Quebec', 'Philip ', 'Cruz', '2001-12-05', 'Dasmariñas City, Cavite', 22, 'BLK C1 LOT2', 3, '09472957362', 'Single', 'N/A', '2020-07-08', 'Male', 'Owned', 'default.png', 'philip01', 'philip01'),
(40, 'Castañeda', 'Angelito', '', '2003-01-21', 'Dasmarinas City, Cavite', 20, 'Blk D4 Lot 7', 4, '09596847592', 'Single', '@ngelito03@gmail.com', 'December 12, 2022', 'Male', 'Owned', 'default.png', 'angelito03', 'angelito03'),
(41, 'Rodriguez', 'Micaela', 'Lim', '1989-11-15', 'Dasmarinas City, Cavite', 34, 'BLK B1 LOT4', 5, '09685746595', 'Married', 'N/A', '2017-07-07', 'Female', 'Owned', 'default.png', 'micaela89', 'micaela89'),
(42, 'Cabrera', 'Kailyn', 'Atayde', '1999-02-18', 'Dasmarinas City, Cavite', 25, 'BLK C2 LOT1', 3, '0959486730684', 'Single', 'N/A', '2021-01-15', 'Male', 'Owned', 'default.png', 'kaiylin99', 'kaiylin99'),
(43, 'Ginete', 'Crystal Jeanne', '', '1999-07-06', 'Dasmarinas City, Cavite', 24, 'BLK B2 LOT5', 4, '09584966948', 'Single', 'crystaljeanne@gmail.com', '2024-03-16', 'Female', 'Owned', '1713844491222_1.jpg', 'crystal99', 'crystal99'),
(49, 'Nunez', 'Jefferson', '', '1987-03-11', 'Dasmarias City, Cavite', 37, 'BLK A1 LOT1', 5, '09563124578', 'Married', 'jefferson87@gmail.com ', '2015-08-01', 'Male', 'Owned', 'default.png', 'jefferson87', 'jefferson97'),
(50, 'Marquez', 'Nataniel', 'Singco', '2000-01-12', 'Dasmarinas City, Cavite', 24, 'Blk E3 Lot 7', 7, '09685768392', 'Single', 'nataniel20@gmail', '2018-03-07', 'Male', 'Owned', 'default.png', 'nataniel20', 'nataniel20'),
(51, 'Mariano', 'Juliana', '', '2002-08-16', 'Dasmarinas City, Cavite', 21, 'BLK C1 LOT3', 3, '09584769382', 'Single', 'juliana02@gmail.com', '2022-11-17', 'Female', 'Owned', 'default.png', 'juliana02', 'juliana02'),
(53, 'Manalo', 'Chris', 'Gallano', '1994-08-26', 'Dasmarinas City, Cavite', 29, 'BLK B1 LOT2', 3, '09584756654', 'Single', 'grace94@gmail.com', '2018-03-07', 'Male', 'Owned', '1713699501919_image (3).png', 'chris94', 'chris94'),
(54, 'Jacinto', 'Oliver', '', '1999-07-07', 'Dasmarinas City, Cavite', 24, 'BLK C2 LOT3', 6, '09884457394', 'Single', 'oliver99@gmail.com', '2022-11-01', 'Male', 'Tenant', 'default.png', 'oliver99', 'oliver99'),
(60, 'Pabico', 'Cesar', '', '1973-06-14', 'Dasmarinas City, Cavite', 50, 'BLK D2 LOT5', 5, '09596847665', 'Married', 'cesar73@gmail.com', '2014-03-04', 'Male', 'Owned', 'default.png', 'cesar73', 'cesar73'),
(61, 'Pataray', 'Benjamin', '', '1990-08-11', 'Dasmarinas City, Cavite', 33, 'BLK D1 LOT4', 6, '091234323434', 'Married', 'benjamin90@gmail.com', '2010-01-25', 'Male', 'Owned', 'default.png', 'benjamin90', 'benjamin90'),
(62, 'Macalima', 'Jeana', '', '1987-05-04', 'Dasmarinas City, Cavite', 37, 'BLK A1 LOT4', 3, '09598876483', 'Married', 'jeana87@gmail.com', '2019-11-14', '', 'Owned', 'default.png', 'jeana87', 'jeana87'),
(63, 'Diaz', 'Estelita', '', '1995-06-06', 'Dasmarinas City, Cavite', 28, 'BLK B2 LOT2', 6, '09684436657', 'Married', 'estelita95@gmail.com', '2015-02-03', 'Female', 'Owned', 'default.png', 'estelita95', 'estelita95'),
(64, 'Okabe', 'Glenda', '', '1990-10-23', 'Dasmarinas City, Cavite', 33, 'BLK D2 LOT2', 3, '0968775904890', 'Married', 'glenda90@gmail.com', '2018-05-06', 'Female', 'Owned', 'default.png', 'glenda90', 'glenda90'),
(65, 'Labaso', 'Bernie', '', '1995-12-14', 'Dasmarinas City, Cavite', 28, 'BLK A1 LOT4', 6, '09665986794', 'Single', 'bernie95@gmail.com', '2012-01-24', 'Male', 'Owned', 'default.png', 'bernie95', 'bernie95'),
(66, 'Antang', 'Mario', '', '1998-06-09', 'Dasmarinas City, Cavite', 25, 'BLK D2 LOT1', 4, '09584457768', 'Married', 'mario98@gmail.com', '2019-12-30', 'Female', 'Owned', 'default.png', 'mario98', 'mario98'),
(67, 'Koh', 'Rowena', '', '1989-01-09', 'Dasmarinas City, Cavite', 35, 'BLK D2 LOT3', 5, '09687759049', 'Married', 'rewena09@gmail.com', '2013-08-07', 'Female', 'Owned', 'default.png', 'rowena09', 'rowena09'),
(68, 'Orense', 'Meldred', '', '1995-11-23', 'Dasmarinas City, Cavite', 28, 'BLK B1 LOT3', 5, '09122233456', 'Single', 'melred95@gmail.com', '2016-01-12', 'Female', 'Owned', 'default.png', 'melred95', 'meldred95'),
(69, 'Gabijan', 'Dwight', '', '1997-06-17', 'Dasmarinas City, Cavite', 26, 'BLK D1 LOT3', 3, '09786995849', 'Single', 'dwight97@gmail.com', '2009-02-17', 'Male', 'Owned', 'default.png', 'dwight97', 'dwight97'),
(70, 'Mayuga', 'Emelyn', 'J', '1986-04-01', 'Dasmarinas Cavite', 38, 'BLK C2 LOT5', 4, '092648950432', 'Married', 'emelynmayuga@gmail.com', '2024-05-01', 'Female', 'Owned', '1715237940891_1.jpg', 'mayuga02', 'mayuga02'),
(71, 'Mayuga', 'Emelyn', 'J', '1998-05-07', 'Dasmarinas Cavite', 26, 'BLK B2 LOT1', 4, '092648950432', 'Married', 'emelynmayuga@gmail.com', '2007-01-30', 'Female', 'Tenant', '1715238322155_1.jpg', 'mayuga', 'mayuga');

-- --------------------------------------------------------

--
-- Table structure for table `tblsolicit`
--

CREATE TABLE `tblsolicit` (
  `id` int(50) NOT NULL,
  `solicit_no` int(50) NOT NULL,
  `project` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `payment` varchar(200) NOT NULL,
  `ref_no` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `req_type` varchar(100) NOT NULL,
  `residentid` int(50) NOT NULL,
  `amount` int(100) NOT NULL,
  `date` date NOT NULL,
  `seen` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblsolicit`
--

INSERT INTO `tblsolicit` (`id`, `solicit_no`, `project`, `fname`, `contact`, `payment`, `ref_no`, `status`, `req_type`, `residentid`, `amount`, `date`, `seen`) VALUES
(2, 199, 'Basketball 2024', 'Manalo, Grace Gallano', '09584756654', 'Gcash', '34223434', 'Approved', 'Solicitation', 53, 100, '2024-04-21', 0),
(3, 200, 'SK Basketball League', 'Gomez, Richard Cano', '09262659504', 'Gcash', '43243444', 'Approved', 'Solicitation', 0, 100, '2024-04-22', 0),
(4, 201, 'Solicitation Sample', 'Mayuga, Emelyn J', '092648950432', 'Cash', '0', 'Approved', 'Solicitation', 71, 100, '2024-05-09', 0),
(5, 0, 'ddd', 'Ginete, Crystal Jeanne ', '09584966948', 'Cash', '0', 'Disapproved', 'Solicitation', 43, 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstaff`
--

INSERT INTO `tblstaff` (`id`, `name`, `username`, `password`) VALUES
(1, 'sad', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblsticker`
--

CREATE TABLE `tblsticker` (
  `id` int(50) NOT NULL,
  `sticker_no` int(100) NOT NULL,
  `date` date NOT NULL,
  `fname` varchar(200) NOT NULL,
  `payment` varchar(200) NOT NULL,
  `ref_no` varchar(200) NOT NULL,
  `amount` int(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `residentid` int(50) NOT NULL,
  `req_type` varchar(100) NOT NULL,
  `seen` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblsticker`
--

INSERT INTO `tblsticker` (`id`, `sticker_no`, `date`, `fname`, `payment`, `ref_no`, `amount`, `status`, `residentid`, `req_type`, `seen`) VALUES
(5, 251, '2024-04-21', '', 'Gcash', '2342344', 150, 'Approved', 49, 'Car Sticker', 0),
(6, 252, '2024-04-23', '', 'Cash', '0', 150, 'Approved', 40, 'Car Sticker', 0),
(7, 252, '2024-05-09', 'Mayuga, Emelyn J', 'Gcash', '6756864676', 100, 'Approved', 71, 'Car Sticker', 0),
(8, 0, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Cash', '0', 0, 'Disapproved', 43, 'Car Sticker', 0),
(9, 0, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Cash', '0', 120, 'Approved', 43, 'Car Sticker', 0),
(10, 0, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Gcash', '5555', 300, 'Approved', 43, 'Car Sticker', 0),
(11, 11, '2024-07-29', '', 'Cash', '0', 100, 'Approved', 51, 'Car Sticker', 0),
(12, 12, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Cash', '0', 0, 'New', 43, 'Car Sticker', 1),
(13, 13, '0000-00-00', 'Ginete, Crystal Jeanne ', 'Cash', '0', 0, 'New', 43, 'Car Sticker', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tblzone`
--

CREATE TABLE `tblzone` (
  `id` int(5) NOT NULL,
  `zone` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblzone`
--

INSERT INTO `tblzone` (`id`, `zone`, `username`, `password`) VALUES
(2, '4', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `voters_id` int(100) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `voters_id`, `candidate_id`, `position_id`) VALUES
(124, 43, 39, 15),
(125, 43, 41, 16),
(126, 43, 42, 17),
(127, 43, 43, 18),
(128, 43, 44, 19),
(129, 37, 40, 15),
(130, 37, 41, 16),
(131, 37, 42, 17),
(132, 37, 43, 18),
(133, 37, 44, 19),
(134, 71, 39, 15),
(135, 71, 41, 16),
(136, 71, 42, 17),
(137, 71, 45, 18),
(138, 71, 44, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblactivity`
--
ALTER TABLE `tblactivity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblactivityphoto`
--
ALTER TABLE `tblactivityphoto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblblotter`
--
ALTER TABLE `tblblotter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbuilding`
--
ALTER TABLE `tblbuilding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblclearance`
--
ALTER TABLE `tblclearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblhousehold`
--
ALTER TABLE `tblhousehold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblid`
--
ALTER TABLE `tblid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblinquiries`
--
ALTER TABLE `tblinquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllogs`
--
ALTER TABLE `tbllogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmemo`
--
ALTER TABLE `tblmemo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmonthly`
--
ALTER TABLE `tblmonthly`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblofficial`
--
ALTER TABLE `tblofficial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpermit`
--
ALTER TABLE `tblpermit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreserve`
--
ALTER TABLE `tblreserve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresident`
--
ALTER TABLE `tblresident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsolicit`
--
ALTER TABLE `tblsolicit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsticker`
--
ALTER TABLE `tblsticker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblzone`
--
ALTER TABLE `tblzone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblactivity`
--
ALTER TABLE `tblactivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblactivityphoto`
--
ALTER TABLE `tblactivityphoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tblblotter`
--
ALTER TABLE `tblblotter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblbuilding`
--
ALTER TABLE `tblbuilding`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblclearance`
--
ALTER TABLE `tblclearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblhousehold`
--
ALTER TABLE `tblhousehold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblid`
--
ALTER TABLE `tblid`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblinquiries`
--
ALTER TABLE `tblinquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbllogs`
--
ALTER TABLE `tbllogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;

--
-- AUTO_INCREMENT for table `tblmemo`
--
ALTER TABLE `tblmemo`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblmonthly`
--
ALTER TABLE `tblmonthly`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblofficial`
--
ALTER TABLE `tblofficial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpermit`
--
ALTER TABLE `tblpermit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblreserve`
--
ALTER TABLE `tblreserve`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblresident`
--
ALTER TABLE `tblresident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tblsolicit`
--
ALTER TABLE `tblsolicit`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblsticker`
--
ALTER TABLE `tblsticker`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
