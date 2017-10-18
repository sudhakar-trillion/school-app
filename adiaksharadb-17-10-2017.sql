-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2017 at 07:03 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adiaksharadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitypics`
--

CREATE TABLE `activitypics` (
  `ActivityPicId` int(11) NOT NULL,
  `ActivityId` int(11) NOT NULL,
  `Picture` varchar(234) NOT NULL,
  `Addedon` date NOT NULL,
  `Lastupdate` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activitypics`
--

INSERT INTO `activitypics` (`ActivityPicId`, `ActivityId`, `Picture`, `Addedon`, `Lastupdate`) VALUES
(2, 1, 'resources/event-pics//1495706415_banana-kakae.jpg', '2017-05-25', '1495706415'),
(4, 2, 'resources/event-pics//1495709321_origin.png', '2017-05-25', '1495709321'),
(6, 2, 'resources/event-pics//1495709321_reached-destination.png', '2017-05-25', '1495709321'),
(7, 1, 'resources/event-pics//1495789921_ladies-finger.jpg', '2017-05-25', '1495789921'),
(8, 1, 'resources/event-pics//1495789921_carrot.jpg', '2017-05-25', '1495789921'),
(9, 3, 'resources/event-pics//1495806037_Chrysanthemum.jpg', '2017-05-26', '1495806037'),
(10, 3, 'resources/event-pics//1495806037_Desert.jpg', '2017-05-26', '1495806037'),
(11, 3, 'resources/event-pics//1495806037_Hydrangeas.jpg', '2017-05-26', '1495806037'),
(12, 3, 'resources/event-pics//1495806037_Penguins.jpg', '2017-05-26', '1495806037'),
(13, 3, 'resources/event-pics//1495806037_Tulips.jpg', '2017-05-26', '1495806037'),
(14, 3, 'resources/event-pics//1495806163_Tulips.jpg', '2017-05-26', '1495806163'),
(15, 4, 'resources/event-pics//1495866752_student-finger-painting2.jpg', '2017-04-20', '1495866752'),
(16, 4, 'resources/event-pics//1495866752_painting-easel.jpg', '2017-04-20', '1495866752'),
(17, 4, 'resources/event-pics//1495866752_painting-ground.jpg', '2017-04-20', '1495866752'),
(18, 4, 'resources/event-pics//1495866752_acrylic-wash-background.jpg', '2017-04-20', '1495866752'),
(19, 4, 'resources/event-pics//1495866752_Jill.png', '2017-04-20', '1495866752'),
(20, 4, 'resources/event-pics//1495866752_images.jpg', '2017-04-20', '1495866752'),
(21, 5, 'resources/event-pics//1495866785_Pat.png', '2017-04-30', '1495866785'),
(22, 5, 'resources/event-pics//1495866785_Pat-C.png', '2017-04-30', '1495866785'),
(23, 5, 'resources/event-pics//1495866785_P3242193.JPG', '2017-04-30', '1495866785'),
(24, 5, 'resources/event-pics//1495866785_Landscape-049.jpg', '2017-04-30', '1495866785'),
(25, 5, 'resources/event-pics//1495866785_9779ce512c2d062e6e3fd8c6aaa0806b.jpg', '2017-04-30', '1495866785'),
(26, 6, 'resources/event-pics//1495866963_horse.jpg', '2017-03-23', '1495866963'),
(27, 6, 'resources/event-pics//1495866963_myboat.jpg', '2017-03-23', '1495866963'),
(28, 6, 'resources/event-pics//1495866963_alone.jpg', '2017-03-23', '1495866963'),
(29, 6, 'resources/event-pics//1495866963_snow.jpg', '2017-03-23', '1495866963'),
(30, 7, 'resources/event-pics//1507034428_1024x1024.jpg', '2017-10-03', '1507034428'),
(31, 7, 'resources/event-pics//1507034428_20170426_AnchorHocking_Banner_1920x1080_v5final.jpg', '2017-10-03', '1507034428'),
(32, 7, 'resources/event-pics//1507034428_closeup-alcohol-cold-sunny-beverage_1232-3870.jpg', '2017-10-03', '1507034428'),
(33, 7, 'resources/event-pics//1507034428_hanging-bottle-lamp.jpg', '2017-10-03', '1507034428'),
(34, 7, 'resources/event-pics//1507034428_Homepage-Banner1.jpg', '2017-10-03', '1507034428'),
(35, 7, 'resources/event-pics//1507034428_Homepage-Banner2.jpg', '2017-10-03', '1507034428'),
(36, 8, 'resources/event-pics//1507110355_banner1.png', '2017-10-01', '1507110355'),
(37, 8, 'resources/event-pics//1507110355_festive-touch.jpg', '2017-10-01', '1507110355'),
(38, 8, 'resources/event-pics//1507110355_hange-lamp.jpg', '2017-10-01', '1507110355'),
(39, 8, 'resources/event-pics//1507110355_homedecor-banner.jpg', '2017-10-01', '1507110355');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `SLNO` int(11) NOT NULL,
  `UserId` varchar(256) NOT NULL,
  `Password` varchar(234) NOT NULL,
  `Role` enum('Admin','Sub-Admin') NOT NULL,
  `Status` enum('Active','Inactive') NOT NULL,
  `Lastupdated` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`SLNO`, `UserId`, `Password`, `Role`, `Status`, `Lastupdated`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin', 'Active', '123456987');

-- --------------------------------------------------------

--
-- Stand-in structure for view `allmonths`
--
CREATE TABLE `allmonths` (
`MonthName` varchar(123)
);

-- --------------------------------------------------------

--
-- Table structure for table `allocatedmarks`
--

CREATE TABLE `allocatedmarks` (
  `AllocatedId` int(11) NOT NULL,
  `ExamSchedueId` int(11) NOT NULL,
  `Student` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `SectionId` int(11) NOT NULL,
  `TeacherId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `ExamId` int(11) NOT NULL,
  `TotalMarks` int(11) NOT NULL,
  `SecuredMarks` int(11) NOT NULL,
  `ExamConductedOn` datetime NOT NULL,
  `AcademicYear` varchar(123) NOT NULL,
  `LastUpdated` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocatedmarks`
--

INSERT INTO `allocatedmarks` (`AllocatedId`, `ExamSchedueId`, `Student`, `ClassId`, `SectionId`, `TeacherId`, `SubjectId`, `ExamId`, `TotalMarks`, `SecuredMarks`, `ExamConductedOn`, `AcademicYear`, `LastUpdated`) VALUES
(31, 1, 1, 1, 1, 4, 10, 1, 50, 42, '2017-10-04 02:27:00', '2017-2018', '1508133891'),
(32, 1, 6, 1, 1, 4, 10, 1, 50, 45, '2017-10-04 02:27:00', '2017-2018', '1507853778'),
(33, 1, 7, 1, 1, 4, 10, 1, 50, 45, '2017-10-04 02:27:00', '2017-2018', '1507853781'),
(34, 1, 8, 1, 1, 4, 10, 1, 50, 36, '2017-10-04 02:27:00', '2017-2018', '1507853786'),
(35, 1, 18, 1, 1, 4, 10, 1, 50, 39, '2017-10-04 02:27:00', '2017-2018', '1507853796'),
(36, 2, 1, 1, 1, 4, 11, 1, 50, 39, '2017-10-04 04:00:00', '2017-2018', '1507853811'),
(37, 2, 6, 1, 1, 4, 11, 1, 50, 39, '2017-10-04 04:00:00', '2017-2018', '1507853813'),
(38, 2, 7, 1, 1, 4, 11, 1, 50, 39, '2017-10-04 04:00:00', '2017-2018', '1507853816'),
(39, 2, 8, 1, 1, 4, 11, 1, 50, 45, '2017-10-04 04:00:00', '2017-2018', '1507853820'),
(40, 2, 18, 1, 1, 4, 11, 1, 50, 41, '2017-10-04 04:00:00', '2017-2018', '1507853826'),
(41, 3, 1, 1, 1, 4, 12, 1, 50, 42, '2017-10-04 11:03:00', '2017-2018', '1507853842'),
(42, 3, 6, 1, 1, 4, 12, 1, 50, 42, '2017-10-04 11:03:00', '2017-2018', '1507853846'),
(43, 3, 7, 1, 1, 4, 12, 1, 50, 41, '2017-10-04 11:03:00', '2017-2018', '1507853850'),
(44, 3, 8, 1, 1, 4, 12, 1, 50, 39, '2017-10-04 11:03:00', '2017-2018', '1507853856'),
(45, 3, 9, 1, 1, 4, 12, 1, 50, 46, '2017-10-04 11:03:00', '2017-2018', '1507853861'),
(46, 3, 18, 1, 1, 4, 12, 1, 50, 48, '2017-10-04 11:03:00', '2017-2018', '1507853871'),
(47, 5, 1, 1, 1, 4, 13, 1, 50, 42, '2017-10-04 12:00:00', '2017-2018', '1507853878'),
(48, 5, 18, 1, 1, 4, 13, 1, 50, 42, '2017-10-04 12:00:00', '2017-2018', '1507853881'),
(49, 5, 9, 1, 1, 4, 13, 1, 50, 42, '2017-10-04 12:00:00', '2017-2018', '1507853884'),
(50, 5, 6, 1, 1, 4, 13, 1, 50, 43, '2017-10-04 12:00:00', '2017-2018', '1507853888'),
(53, 5, 7, 1, 1, 4, 13, 1, 50, 43, '2017-10-04 12:00:00', '2017-2018', '1507854131'),
(54, 5, 8, 1, 1, 4, 13, 1, 50, 43, '2017-10-04 12:00:00', '2017-2018', '1507854134'),
(55, 4, 1, 1, 1, 4, 22, 1, 50, 48, '2017-10-04 10:00:00', '2017-2018', '1507854166'),
(56, 4, 6, 1, 1, 4, 22, 1, 50, 46, '2017-10-04 10:00:00', '2017-2018', '1507854170'),
(57, 4, 7, 1, 1, 4, 22, 1, 50, 42, '2017-10-04 10:00:00', '2017-2018', '1507854174'),
(58, 4, 8, 1, 1, 4, 22, 1, 50, 42, '2017-10-04 10:00:00', '2017-2018', '1507854176'),
(59, 4, 9, 1, 1, 4, 22, 1, 50, 44, '2017-10-04 10:00:00', '2017-2018', '1507854180'),
(60, 4, 18, 1, 1, 4, 22, 1, 50, 48, '2017-10-04 10:00:00', '2017-2018', '1507854185'),
(61, 2, 9, 1, 1, 4, 11, 1, 50, 48, '2017-10-04 04:00:00', '2017-2018', '1507854223'),
(62, 1, 9, 1, 1, 4, 10, 1, 50, 42, '2017-10-04 02:27:00', '2017-2018', '1507854429'),
(63, 1, 1, 1, 1, 4, 10, 1, 50, 38, '2017-04-10 02:27:00', '2017-2018', '1507855524'),
(64, 16, 12, 1, 2, 1, 10, 1, 50, 38, '2017-04-10 10:03:00', '2017-2018', '1507855542'),
(65, 16, 13, 1, 2, 1, 10, 1, 50, 42, '2017-04-10 10:03:00', '2017-2018', '1507855581'),
(66, 16, 16, 1, 2, 1, 10, 1, 50, 42, '2017-04-10 10:03:00', '2017-2018', '1507855584'),
(67, 16, 17, 1, 2, 1, 10, 1, 50, 43, '2017-04-10 10:03:00', '2017-2018', '1507855588'),
(68, 6, 1, 1, 1, 4, 10, 2, 50, 43, '2017-10-06 10:00:00', '2017-2018', '1507855790');

-- --------------------------------------------------------

--
-- Table structure for table `assignedsubjects`
--

CREATE TABLE `assignedsubjects` (
  `AssignedId` int(11) NOT NULL,
  `ClassSlno` int(11) NOT NULL,
  `SubjectAssigned` int(11) NOT NULL,
  `Lastupdated` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignedsubjects`
--

INSERT INTO `assignedsubjects` (`AssignedId`, `ClassSlno`, `SubjectAssigned`, `Lastupdated`) VALUES
(1, 1, 10, '1495605731'),
(2, 1, 11, '1495605731'),
(3, 1, 12, '1495605731'),
(4, 1, 13, '1495605731'),
(5, 1, 22, '1495605731'),
(6, 2, 10, '1495617108'),
(7, 2, 11, '1495617108'),
(8, 2, 12, '1495617108'),
(9, 2, 13, '1495617108'),
(10, 2, 22, '1495617108'),
(12, 3, 10, '1495606163'),
(13, 3, 11, '1495606163'),
(14, 3, 12, '1495606163'),
(15, 3, 15, '1495606163'),
(16, 3, 17, '1495606163'),
(17, 3, 22, '1495606163'),
(18, 3, 23, '1495606163'),
(19, 3, 24, '1495606163'),
(26, 2, 23, '1495617108'),
(27, 4, 10, '1495617589'),
(28, 4, 11, '1495617589'),
(29, 4, 12, '1495617589'),
(30, 4, 15, '1495617589'),
(31, 4, 17, '1495617589'),
(32, 4, 22, '1495617589'),
(33, 11, 25, '1507031780'),
(34, 11, 26, '1507031780'),
(35, 11, 24, '1507031780');

-- --------------------------------------------------------

--
-- Table structure for table `assignstdroute`
--

CREATE TABLE `assignstdroute` (
  `AssignedId` int(10) NOT NULL,
  `StudentId` int(10) NOT NULL,
  `ClassId` int(10) NOT NULL,
  `SectionId` int(10) NOT NULL,
  `RouteId` int(10) NOT NULL,
  `LastUpdated` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignstdroute`
--

INSERT INTO `assignstdroute` (`AssignedId`, `StudentId`, `ClassId`, `SectionId`, `RouteId`, `LastUpdated`) VALUES
(4, 7, 1, 1, 3, '1500898669'),
(5, 6, 1, 1, 2, '1500900209'),
(6, 18, 1, 1, 4, '1500900419'),
(7, 12, 1, 2, 2, '1500900443'),
(8, 16, 1, 2, 1, '1500900456'),
(9, 13, 1, 2, 3, '1500901178'),
(10, 8, 1, 1, 1, '1500903064'),
(11, 1, 1, 1, 5, '1500903079'),
(13, 11, 2, 3, 5, '1500903149'),
(14, 10, 2, 3, 4, '1500903154');

-- --------------------------------------------------------

--
-- Table structure for table `assignteachers`
--

CREATE TABLE `assignteachers` (
  `SLNO` int(11) NOT NULL,
  `TeacherId` int(11) NOT NULL,
  `ClassSlno` int(11) NOT NULL,
  `Section` int(11) NOT NULL,
  `Subject` varchar(245) NOT NULL,
  `Lastupdated` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignteachers`
--

INSERT INTO `assignteachers` (`SLNO`, `TeacherId`, `ClassSlno`, `Section`, `Subject`, `Lastupdated`) VALUES
(1, 4, 4, 8, '11', '4'),
(2, 4, 4, 8, '15', '4'),
(3, 4, 1, 1, '10', '4'),
(4, 4, 1, 1, '13', '1495884211'),
(5, 6, 1, 1, '22', '6'),
(6, 3, 4, 9, '15', '1495447264'),
(7, 3, 4, 9, '17', '3'),
(8, 3, 4, 9, '22', '1495447256'),
(9, 3, 4, 9, '22', '1495447264'),
(14, 7, 5, 13, '15', '7'),
(15, 7, 5, 13, '22', '7'),
(16, 8, 3, 5, '10', '8'),
(17, 8, 3, 5, '13', '8'),
(18, 8, 3, 5, '24', '1507032175'),
(19, 8, 2, 3, '10', '8'),
(20, 6, 3, 5, '11', '6'),
(21, 5, 4, 9, '12', '5'),
(22, 3, 6, 8, '22', '3'),
(23, 2, 7, 8, '10', '2'),
(24, 1, 9, 8, '10', '1'),
(25, 1, 1, 2, '10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `BillId` int(12) NOT NULL,
  `BillFor` varchar(234) NOT NULL,
  `BillAmount` varchar(234) NOT NULL,
  `PaidTo` varchar(234) NOT NULL,
  `BillDate` date NOT NULL,
  `LastUpdated` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`BillId`, `BillFor`, `BillAmount`, `PaidTo`, `BillDate`, `LastUpdated`) VALUES
(3, 'Power', '15630', 'TSED', '2017-07-14', '1500033360'),
(4, 'Water-Supply', '15630', 'Manjeera Jall', '2017-07-14', '1500351932'),
(5, 'Bags Supplier', '1520', 'Rao Bags', '2017-07-14', '1500033465'),
(6, 'Shoe Maker', '1500', 'Test Company', '2017-07-14', '1500033485'),
(7, 'Uniform Supplier', '25000', 'Karteek Creations', '2017-07-14', '1500033516'),
(8, 'Bags Supplier', '15562', 'Prime-bags', '2017-07-18', '1500286204'),
(9, 'Vendor Title', '1500', 'Vendor Company', '2017-10-03', '1507034983'),
(10, 'Vendor Title', '1500', 'Vendor Company', '2017-10-03', '1507034984'),
(11, 'Vendor Title', '1200', 'Vendor Company', '2017-10-02', '1507035095'),
(12, 'Vendor Title', '150', 'Vendor Company', '2017-10-04', '1507110632');

-- --------------------------------------------------------

--
-- Table structure for table `celebrations`
--

CREATE TABLE `celebrations` (
  `CelebId` int(11) NOT NULL,
  `Celebration_Date` date NOT NULL,
  `Celebration_Text` text NOT NULL,
  `Lastupdated` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `celebrations`
--

INSERT INTO `celebrations` (`CelebId`, `Celebration_Date`, `Celebration_Text`, `Lastupdated`) VALUES
(3, '2017-06-02', 'Telangana formation day', '1496302802'),
(4, '2017-06-23', 'Ramzan Iftar party', '1496320967'),
(5, '2017-07-10', 'Sunil gavaskar birthday celebration', '1496307414'),
(6, '2017-08-15', 'Independence celebration', '1496307430'),
(7, '2017-07-24', 'Chairman birthday celebrations', '1496321007'),
(8, '2018-01-26', 'Republic day celebrations', '1496309471'),
(9, '2017-12-25', 'Christmas celebrations', '1496309484'),
(10, '2017-09-05', 'Teacher s day celebration', '1496312464'),
(11, '2017-11-13', 'CEO birthday celebrations', '1496313946'),
(12, '2017-10-02', 'Mahatma Gandhi Jayanthi celebration', '1496321116'),
(13, '2017-06-12', 'some celebration', '1496323339'),
(14, '2017-08-28', 'sample-celebration', '1500373062'),
(15, '2017-10-17', 'Pre Diwali celebrations', '1507110506');

-- --------------------------------------------------------

--
-- Table structure for table `classteachers`
--

CREATE TABLE `classteachers` (
  `ClassteacherId` int(11) NOT NULL,
  `TeacherId` int(11) NOT NULL,
  `ClassSlno` int(11) NOT NULL,
  `Section` int(11) NOT NULL,
  `Lastupdated` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classteachers`
--

INSERT INTO `classteachers` (`ClassteacherId`, `TeacherId`, `ClassSlno`, `Section`, `Lastupdated`) VALUES
(1, 7, 5, 13, '1495883471'),
(3, 4, 1, 1, '1495884211'),
(4, 8, 2, 3, '1507711463'),
(5, 6, 3, 5, '1507711484'),
(6, 5, 4, 9, '1507711503'),
(7, 3, 6, 8, '1507711523'),
(8, 2, 7, 8, '1507711551'),
(10, 1, 1, 2, '1507854589');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `DepartId` int(10) NOT NULL,
  `Department` varchar(234) NOT NULL,
  `LastUpdated` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`DepartId`, `Department`, `LastUpdated`) VALUES
(1, 'Housekeeping', '1500448007'),
(2, 'Transportation', '1500448015'),
(3, 'Watchman', '1500447957');

-- --------------------------------------------------------

--
-- Table structure for table `examschedules`
--

CREATE TABLE `examschedules` (
  `ExamSchedueId` int(11) NOT NULL,
  `Exam` int(11) NOT NULL,
  `ClassName` int(11) NOT NULL,
  `ClassSection` int(11) NOT NULL,
  `Subject` int(11) NOT NULL,
  `ExamSchedule` date NOT NULL,
  `ScheduledTime` varchar(245) NOT NULL,
  `AcademicYear` varchar(245) NOT NULL,
  `LastUpdated` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examschedules`
--

INSERT INTO `examschedules` (`ExamSchedueId`, `Exam`, `ClassName`, `ClassSection`, `Subject`, `ExamSchedule`, `ScheduledTime`, `AcademicYear`, `LastUpdated`) VALUES
(1, 1, 1, 1, 10, '2017-04-10', '2:27:00', '2017-2018', '1507855201'),
(2, 1, 1, 1, 11, '2017-10-04', '4:00:00', '2017-2018', '1507798712'),
(3, 1, 1, 1, 12, '2017-10-04', '11:3:00', '2017-2018', '1507798966'),
(4, 1, 1, 1, 22, '2017-10-04', '10:0:00', '2017-2018', '1507798980'),
(5, 1, 1, 1, 13, '2017-10-04', '12:0:00', '2017-2018', '1507799008'),
(6, 2, 1, 1, 10, '2017-10-06', '10:0:00', '2017-2018', '1507799050'),
(7, 2, 1, 1, 11, '2017-10-06', '1:30:00', '2017-2018', '1507799082'),
(8, 2, 1, 1, 12, '2017-10-07', '10:0:00', '2017-2018', '1507799105'),
(9, 2, 1, 1, 13, '2017-10-07', '2:35:00', '2017-2018', '1507799150'),
(10, 2, 1, 1, 22, '2017-10-07', '3:30:00', '2017-2018', '1507799170'),
(11, 5, 1, 1, 10, '2017-10-09', '10:0:00', '2017-2018', '1507799209'),
(12, 5, 1, 1, 11, '2017-10-09', '2:00:00', '2017-2018', '1507799224'),
(13, 5, 1, 1, 12, '2017-10-10', '10:0:00', '2017-2018', '1507799239'),
(14, 5, 1, 1, 13, '2017-10-10', '2:30:00', '2017-2018', '1507799250'),
(15, 5, 1, 1, 22, '2017-10-11', '10:0:00', '2017-2018', '1507799266'),
(16, 1, 1, 2, 10, '2017-04-10', '10:3:00', '2017-2018', '1507855230'),
(17, 1, 1, 2, 11, '2017-04-10', '1:00:00', '2017-2018', '1507855378'),
(18, 1, 1, 2, 12, '2017-10-05', '9:30:00', '2017-2018', '1507854702'),
(19, 1, 1, 2, 13, '2017-10-05', '1:30:00', '2017-2018', '1507854726'),
(20, 1, 1, 2, 22, '2017-10-05', '3:30:00', '2017-2018', '1507854741');

-- --------------------------------------------------------

--
-- Table structure for table `extracircularactivities`
--

CREATE TABLE `extracircularactivities` (
  `ExtracActId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `ExtraActivity` text NOT NULL,
  `Lastupdated` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extracircularactivities`
--

INSERT INTO `extracircularactivities` (`ExtracActId`, `StudentId`, `ExtraActivity`, `Lastupdated`) VALUES
(1, 1, 'Activity-one', '1508239098'),
(2, 1, 'Activity-two', '1508239098'),
(3, 1, 'A newer one', '1508239098'),
(5, 6, 'Activity', '1500611092'),
(6, 6, 'Test activity', '1500611092'),
(7, 7, 'Martial arts', '1500611758'),
(8, 8, 'Activity', '1500612285'),
(9, 9, 'Acty', '1500612426'),
(10, 10, 'Activity', '1500612643');

-- --------------------------------------------------------

--
-- Table structure for table `feecollection`
--

CREATE TABLE `feecollection` (
  `FeeCollectionId` int(10) NOT NULL,
  `StudentId` int(10) NOT NULL,
  `ClassId` int(10) NOT NULL,
  `SectionId` int(10) NOT NULL,
  `Month` date NOT NULL,
  `AcademicYear` varchar(256) NOT NULL,
  `ActualFee` varchar(256) NOT NULL,
  `Paid` varchar(256) NOT NULL,
  `Due` varchar(256) NOT NULL,
  `PaidOn` datetime NOT NULL,
  `LastUpdated` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feecollection`
--

INSERT INTO `feecollection` (`FeeCollectionId`, `StudentId`, `ClassId`, `SectionId`, `Month`, `AcademicYear`, `ActualFee`, `Paid`, `Due`, `PaidOn`, `LastUpdated`) VALUES
(1, 1, 1, 1, '2017-07-01', '2017-2018', '1200', '1200', '0', '2017-08-31 17:42:32', '1504181552'),
(2, 1, 1, 1, '2017-06-20', '2017-2018', '1200', '1200', '0', '2017-08-31 17:46:21', '1504181781'),
(3, 1, 1, 1, '2017-08-31', '2017-2018', '1200', '1200', '0', '2017-08-31 17:47:23', '1504181843'),
(15, 1, 1, 1, '2017-09-05', '2017-2018', '1200', '350', '850', '2017-10-05 14:14:43', '1507193083'),
(17, 1, 1, 1, '2017-09-05', '2017-2018', '1200', '150', '700', '2017-10-05 14:17:48', '1507193268'),
(18, 1, 1, 1, '2017-10-05', '2017-2018', '1200', '500', '700', '2017-10-05 14:38:40', '1507194520'),
(21, 1, 1, 1, '2017-10-05', '2017-2018', '1200', '200', '300', '2017-10-05 14:52:41', '1507195361');

-- --------------------------------------------------------

--
-- Table structure for table `feetranasactiondetails`
--

CREATE TABLE `feetranasactiondetails` (
  `TransId` int(10) NOT NULL,
  `FeeCollectionId` int(10) NOT NULL,
  `CardNo` varchar(256) NOT NULL,
  `TransactionId` varchar(256) NOT NULL,
  `PaidAmount` varchar(256) NOT NULL,
  `MmpTransaction` varchar(256) NOT NULL,
  `PaidOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feetranasactiondetails`
--

INSERT INTO `feetranasactiondetails` (`TransId`, `FeeCollectionId`, `CardNo`, `TransactionId`, `PaidAmount`, `MmpTransaction`, `PaidOn`) VALUES
(1, 1, '424242XXXXXX4242', '0117243225372', '1200.00', '100000218124', '2017-08-31 17:42:32'),
(2, 2, '424242XXXXXX4242', '0117243225373', '1200.00', '100000218125', '2017-08-31 17:46:21'),
(3, 3, '424242XXXXXX4242', '0117243225375', '1200.00', '100000218129', '2017-08-31 17:47:23'),
(4, 4, '424242XXXXXX4242', '0117244225454', '1200.00', '100000218319', '2017-09-01 12:08:53'),
(5, 5, '424242XXXXXX4242', '0117244225456', '1200.00', '100000218324', '2017-09-01 12:10:05'),
(15, 15, '424242XXXXXX4242', '0117278228874', '350.00', '100000344089', '2017-10-05 14:14:43'),
(17, 17, '424242XXXXXX4242', '0117278228879', '150.00', '100000344094', '2017-10-05 14:17:48'),
(18, 18, '424242XXXXXX4242', '0117278228882', '500.00', '100000344111', '2017-10-05 14:38:40'),
(20, 20, '424242XXXXXX4242', '0117278228884', '200.00', '100000344115', '2017-10-05 14:51:10'),
(21, 21, '424242XXXXXX4242', '0117278228885', '200.00', '100000344119', '2017-10-05 14:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `homeworks`
--

CREATE TABLE `homeworks` (
  `HomeworkId` int(11) NOT NULL,
  `ClassSlno` int(11) NOT NULL,
  `ClassSection` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `HomeWorkOn` date NOT NULL,
  `HomeWork` text NOT NULL,
  `Status` enum('Assigned','Completed') NOT NULL,
  `Comments` text NOT NULL,
  `Lastupdated` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homeworks`
--

INSERT INTO `homeworks` (`HomeworkId`, `ClassSlno`, `ClassSection`, `StudentId`, `SubjectId`, `HomeWorkOn`, `HomeWork`, `Status`, `Comments`, `Lastupdated`) VALUES
(1, 1, 1, 1, 10, '2017-05-24', 'A test home work', 'Assigned', '', '1495623676'),
(2, 1, 1, 1, 1, '2017-05-24', 'Test home work for hindi subject', 'Assigned', '', '1495694816'),
(3, 1, 1, 1, 13, '2017-05-24', 'Test work in Environmental science', 'Assigned', '', '1495623830'),
(4, 2, 3, 10, 10, '2017-05-24', 'It is a long established fact that a reader will be', 'Assigned', '', '1495695897'),
(5, 2, 3, 10, 10, '2017-05-24', 'It is a long established fact that a reader.', 'Assigned', '', '1495695886'),
(6, 1, 1, 7, 11, '2017-05-25', 'Test home work goes here', 'Assigned', '', '1495694849'),
(7, 1, 2, 12, 11, '2017-05-25', 'asdsa', 'Assigned', '', '1495695266'),
(8, 1, 1, 1, 10, '2017-10-03', 'testing home work goes here', 'Completed', 'Test comment goes here', '1507034356'),
(9, 1, 1, 1, 10, '2017-10-04', 'Test home work for', 'Assigned', '', '1507114385');

-- --------------------------------------------------------

--
-- Table structure for table `identificationmarks`
--

CREATE TABLE `identificationmarks` (
  `Markid` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `IdentificationMark` text NOT NULL,
  `Lastupdated` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identificationmarks`
--

INSERT INTO `identificationmarks` (`Markid`, `StudentId`, `IdentificationMark`, `Lastupdated`) VALUES
(1, 1, 'A  mole on the left hand', '1508239098'),
(2, 1, 'sfsdf', '1508239098'),
(7, 6, 'mole on left knee', '1500611092'),
(9, 7, 'mole on left chin', '1500611758'),
(10, 8, 'Identification', '1500612285'),
(11, 9, 'marks', '1500612426'),
(12, 10, 'Mark', '1500612643');

-- --------------------------------------------------------

--
-- Table structure for table `monthsname`
--

CREATE TABLE `monthsname` (
  `MonthId` int(11) NOT NULL,
  `MonthNumber` varchar(123) NOT NULL,
  `MonthName` varchar(123) NOT NULL,
  `MonthShortName` varchar(123) NOT NULL,
  `MNTHnaam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monthsname`
--

INSERT INTO `monthsname` (`MonthId`, `MonthNumber`, `MonthName`, `MonthShortName`, `MNTHnaam`) VALUES
(1, '06', 'June', 'Jun', '2017-06-14'),
(2, '07', 'July', 'Jul', '2017-07-12'),
(3, '08', 'August', 'Aug', '2017-08-18'),
(4, '09', 'September', 'Sep', '2017-09-06'),
(5, '10', 'October', 'Oct', '2017-10-04'),
(6, '11', 'November', 'Nov', '2017-11-01'),
(7, '12', 'December', 'Dec', '2017-12-14'),
(8, '01', 'January', 'Jan', '2017-01-10'),
(9, '02', 'February', 'Feb', '2017-02-10'),
(10, '03', 'March', 'Mar', '2017-03-10'),
(11, '04', 'April', 'Apr', '2017-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `newclass`
--

CREATE TABLE `newclass` (
  `SLNO` int(11) NOT NULL,
  `ClassName` varchar(234) NOT NULL,
  `Lastupdated` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newclass`
--

INSERT INTO `newclass` (`SLNO`, `ClassName`, `Lastupdated`) VALUES
(1, 'Class-I', '1494925921'),
(2, 'Class-II', '1494925921'),
(3, 'Class-III', '1494925921'),
(4, 'Class-IV', '1494925921'),
(5, 'Class-V', '1494925921'),
(6, 'Class-VI', '1494925921'),
(7, 'Class-VII', '1494925921'),
(8, 'Class-VIII', '1494925921'),
(9, 'Class-IX', '1494925921'),
(10, 'Class-X', '1507029545'),
(11, 'Test-Class', '1507029665');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `NotificationId` int(11) NOT NULL,
  `ClassName` int(11) NOT NULL,
  `ClassSection` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `NotificationTitle` text NOT NULL,
  `Notification` text NOT NULL,
  `AddedOn` datetime NOT NULL,
  `AcademicYear` varchar(256) NOT NULL,
  `AddedBy` enum('Parent','Admin') NOT NULL,
  `LastUpdated` varchar(256) NOT NULL,
  `Status` enum('Unread','Read','Closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`NotificationId`, `ClassName`, `ClassSection`, `StudentId`, `NotificationTitle`, `Notification`, `AddedOn`, `AcademicYear`, `AddedBy`, `LastUpdated`, `Status`) VALUES
(1, 1, 1, 1, 'Fee Notification', 'Dear Parent,Kindly, pay the pending fee.', '2017-10-17 18:13:29', '2017-2018', 'Admin', '1508244617', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `parentdetails`
--

CREATE TABLE `parentdetails` (
  `ParentId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `MotherName` varchar(256) NOT NULL,
  `FatherName` varchar(256) NOT NULL,
  `MotherHighestDegree` varchar(256) NOT NULL,
  `FatherHighestDegree` varchar(256) NOT NULL,
  `MotherOccupation` varchar(256) NOT NULL,
  `FatherOccupation` varchar(256) NOT NULL,
  `ContactNumber1` varchar(256) NOT NULL,
  `ContactNumber2` varchar(256) NOT NULL,
  `Address` text NOT NULL,
  `Lastupdated` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parentdetails`
--

INSERT INTO `parentdetails` (`ParentId`, `StudentId`, `MotherName`, `FatherName`, `MotherHighestDegree`, `FatherHighestDegree`, `MotherOccupation`, `FatherOccupation`, `ContactNumber1`, `ContactNumber2`, `Address`, `Lastupdated`) VALUES
(1, 1, 'mother', 'father', 'Hdegree', 'Hdegree', 'Oc', 'Occu', '8499032661', '8498081693', 'address goes here', '1504246714'),
(2, 6, 'Mother Name', 'Father', 'Graduation', 'MBA', 'Home Maker', 'Hr.', '9985698569', '8499658978', 'Address goes here', '1500610077'),
(3, 7, 'Praneetha', 'Praveen', 'Graduation', 'Graduatation', 'Home maker', 'Software employee', '9985698745', '8456987459', '3/10 B-N road east andheri, mumbai', '1500611693'),
(4, 8, 'Anitha', 'Veeresh', 'Graduation', 'MBA', 'Faculty', 'Business', '8569745896', '9963589569', '6-109, 7G Amritha colony, Hyderabad', '1500612246'),
(5, 10, 'Katti keerthana', 'Katti naresh', 'Graduation', 'Graduation', 'Home maker', 'Business', '9966584589', '6658956874', 'Address goes here', '1500612612'),
(6, 11, 'S lalitha', 'S mahesh', 'graduation', 'MSC', 'Home maker', 'Faculty', '9956884525', '7032588400', 'Address goes here', '1500612743'),
(7, 18, 'mother', 'Naveen', 'Graduation', 'Graduation', 'Home Maker', 'Business', '9984589689', '8455698556', 'Address goes here', '1504173356');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `RouteId` int(10) NOT NULL,
  `RouteNumber` int(10) NOT NULL,
  `Routes` text NOT NULL,
  `LastUpdated` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`RouteId`, `RouteNumber`, `Routes`, `LastUpdated`) VALUES
(1, 1, 'dest1,dest2,dest3', '1500871910'),
(2, 2, 'dest6,dest7', '1500871942'),
(3, 3, 'asdf,fret,polk', '1500874233'),
(4, 4, 'pol,iokl', '1500874365'),
(5, 5, 'tyhn,kiuyh,lopk', '1500874373');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `SLNO` int(11) NOT NULL,
  `StaffId` int(11) NOT NULL,
  `StaffType` enum('Teaching','Non-Teaching') NOT NULL,
  `Month` int(11) NOT NULL,
  `AcademicYear` varchar(243) NOT NULL,
  `WhichYear` varchar(123) NOT NULL,
  `Salary` varchar(243) NOT NULL,
  `LastUpdated` varchar(243) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`SLNO`, `StaffId`, `StaffType`, `Month`, `AcademicYear`, `WhichYear`, `Salary`, `LastUpdated`) VALUES
(1, 1, 'Teaching', 1, '2017-2018', '2017', '5000', '1498728562'),
(2, 2, 'Teaching', 1, '2017-2018', '2017', '5500', '1498655604'),
(3, 3, 'Teaching', 1, '2017-2018', '2017', '5500', '1498655619'),
(4, 4, 'Teaching', 1, '2017-2018', '2017', '6000', '1498655636'),
(5, 5, 'Teaching', 1, '2017-2018', '2017', '6500', '1498655682'),
(6, 8, 'Non-Teaching', 1, '2017-2018', '2017', '2125', '1498725614'),
(7, 18, 'Teaching', 9, '2017-2018', '2017', '16500', '1507035190');

-- --------------------------------------------------------

--
-- Table structure for table `schoolfee`
--

CREATE TABLE `schoolfee` (
  `FeeId` int(11) NOT NULL,
  `Class` int(11) NOT NULL,
  `AcademicYear` varchar(256) NOT NULL,
  `MonthlyFee` varchar(245) NOT NULL,
  `QuarterlyFee` varchar(256) NOT NULL,
  `HalfyearlyFee` varchar(256) NOT NULL,
  `AnnualFee` varchar(245) NOT NULL,
  `Lastupdated` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolfee`
--

INSERT INTO `schoolfee` (`FeeId`, `Class`, `AcademicYear`, `MonthlyFee`, `QuarterlyFee`, `HalfyearlyFee`, `AnnualFee`, `Lastupdated`) VALUES
(1, 1, '2017-2018', '1200', '', '', '13000', '1495456188'),
(2, 2, '2017-2018', '1500', '', '', '15000', '1495451688'),
(3, 3, '2017-2018', '1800', '', '', '20000', '1495451834'),
(4, 4, '2017-2018', '2000', '6000', '23000', '33000', '1495451926'),
(5, 5, '2017-2018', '2300', '', '', '27000', '1501223802'),
(6, 6, '2017-2018', '2500', '', '', '30000', '1501223828'),
(7, 7, '2017-2018', '2700', '', '', '32000', '1501223859'),
(8, 8, '2017-2018', '3000', '', '', '36000', '1501223872'),
(9, 9, '2017-2018', '3300', '', '', '39000', '1501223895'),
(10, 10, '2017-2018', '4500', '', '', '54000', '1501223908'),
(11, 11, '2017-2018', '2500', '', '', '30000', '1507033225');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `SectionId` int(11) NOT NULL,
  `ClassSlno` int(11) NOT NULL,
  `Section` varchar(256) NOT NULL,
  `Lastupdated` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`SectionId`, `ClassSlno`, `Section`, `Lastupdated`) VALUES
(1, 1, 'A', '1495015388'),
(2, 1, 'B', '1495009791'),
(3, 2, 'A', '1495009813'),
(4, 2, 'B', '1495009846'),
(5, 3, 'A', '1495009949'),
(6, 3, 'B', '1495009976'),
(7, 3, 'C', '1495009982'),
(8, 4, 'A', '1495009989'),
(9, 4, 'B', '1495009996'),
(10, 4, 'C', '1495010041'),
(11, 4, 'D', '1495010050'),
(12, 4, 'E', '1495010056'),
(13, 5, 'A', '1495883239'),
(14, 11, 'A', '1507031142');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffId` int(11) NOT NULL,
  `TeacherId` int(12) NOT NULL,
  `StaffName` varchar(256) NOT NULL,
  `Category` enum('Teaching','Nonteaching') NOT NULL,
  `StaffDepartment` varchar(123) NOT NULL DEFAULT 'Teacher',
  `Status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `LastUpdated` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffId`, `TeacherId`, `StaffName`, `Category`, `StaffDepartment`, `Status`, `LastUpdated`) VALUES
(1, 2, 'sammy', 'Teaching', 'Teacher', 'Active', '123456987'),
(2, 6, 'Uday', 'Teaching', 'Teacher', 'Active', '458789'),
(3, 5, 'bhaskar', 'Teaching', 'Teacher', 'Active', '1236589'),
(4, 4, 'vidhya', 'Teaching', 'Teacher', 'Active', '236589'),
(5, 3, 'george', 'Teaching', 'Teacher', 'Active', '125698'),
(6, 1, 'Sam', 'Teaching', 'Teacher', 'Active', '125698'),
(7, 7, 'Rohan', 'Teaching', 'Teacher', 'Active', '1256987'),
(8, 0, 'Prasad', 'Nonteaching', 'Transportation', 'Active', '1500449155'),
(10, 0, 'Lakshmi', 'Nonteaching', 'Housekeeping', 'Active', '1500449354'),
(14, 0, 'kareem', 'Nonteaching', 'Watchman', 'Active', '1500449350'),
(15, 0, 'venkatesh', 'Nonteaching', 'Transportation', 'Active', '1500449344'),
(16, 0, 'driver2', 'Nonteaching', 'Transportation', 'Active', '1500874415'),
(17, 0, 'driver4', 'Nonteaching', 'Transportation', 'Active', '1500874421'),
(18, 8, 'Praveen', 'Teaching', 'Teacher', 'Active', '1507031839'),
(19, 0, 'Non-Teaching-Staff', 'Nonteaching', 'Housekeeping', 'Active', '1507035519');

-- --------------------------------------------------------

--
-- Table structure for table `staffdetails`
--

CREATE TABLE `staffdetails` (
  `StaffDetailId` int(10) NOT NULL,
  `StaffId` int(10) NOT NULL,
  `ContactNumber` varchar(245) NOT NULL,
  `ContactAddress` text NOT NULL,
  `LastUpdated` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffdetails`
--

INSERT INTO `staffdetails` (`StaffDetailId`, `StaffId`, `ContactNumber`, `ContactAddress`, `LastUpdated`) VALUES
(1, 8, '8489658963', 'Adsdress goes here', '1500879635'),
(2, 15, '7032658965', 'Address goes here', '1507109771'),
(3, 16, '9849562365', 'Address goes here', '1500879834'),
(4, 17, '9908456989', 'address will goes here', '1500879857'),
(5, 19, '9638521569', 'Address goes here', '1507035561');

-- --------------------------------------------------------

--
-- Table structure for table `studentactivities`
--

CREATE TABLE `studentactivities` (
  `ActivityId` int(11) NOT NULL,
  `ClassSlno` int(11) NOT NULL,
  `ClassSection` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `ActivityTitle` text NOT NULL,
  `ActivityDate` date NOT NULL,
  `AcademicYear` varchar(223) NOT NULL,
  `Lastupdated` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentactivities`
--

INSERT INTO `studentactivities` (`ActivityId`, `ClassSlno`, `ClassSection`, `StudentId`, `ActivityTitle`, `ActivityDate`, `AcademicYear`, `Lastupdated`) VALUES
(1, 1, 1, 1, 'Event title', '2017-05-25', '2017-2018', '1508246378'),
(2, 1, 1, 6, 'Sample event title', '2017-05-25', '2017-2018', '1508246382'),
(3, 1, 1, 1, 'Test event two', '2017-05-26', '2017-2018', '1508246387'),
(4, 1, 1, 1, 'Painting event', '2017-04-20', '2017-2018', '1508246396'),
(5, 1, 1, 1, 'Forest Paiting', '2017-04-30', '2017-2018', '1508246393'),
(6, 1, 1, 1, 'March-Paiting-event', '2017-03-23', '2017-2018', '1508246390'),
(7, 1, 1, 1, 'Test Activity', '2017-10-03', '2017-2018', '1508246360'),
(8, 1, 1, 1, 'Test activity', '2017-10-01', '2017-2018', '1508246375');

-- --------------------------------------------------------

--
-- Table structure for table `studentattendance`
--

CREATE TABLE `studentattendance` (
  `AttendanceId` int(10) NOT NULL,
  `ClassId` int(10) NOT NULL,
  `SectionId` int(10) NOT NULL,
  `StudentId` int(10) NOT NULL,
  `PresentAbsent` enum('N/A','Present','Absent') NOT NULL,
  `AttendanceOn` date NOT NULL,
  `AcademicYear` varchar(256) NOT NULL,
  `LastUpdated` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentattendance`
--

INSERT INTO `studentattendance` (`AttendanceId`, `ClassId`, `SectionId`, `StudentId`, `PresentAbsent`, `AttendanceOn`, `AcademicYear`, `LastUpdated`) VALUES
(1, 1, 1, 1, 'Present', '2017-07-21', '2017-2018', '1508144869'),
(2, 1, 1, 6, 'Absent', '2017-07-21', '2017-2018', '1508144869'),
(3, 1, 1, 7, 'Absent', '2017-07-21', '2017-2018', '1508144869'),
(4, 1, 1, 8, 'Present', '2017-07-21', '2017-2018', '1508144869'),
(5, 1, 1, 9, 'Present', '2017-07-21', '2017-2018', '1508144869'),
(6, 1, 1, 18, 'Present', '2017-07-21', '2017-2018', '1508144869'),
(7, 1, 1, 1, 'Present', '2017-07-24', '2017-2018', '1508144869'),
(8, 1, 1, 6, 'Absent', '2017-07-24', '2017-2018', '1508144869'),
(9, 1, 1, 7, 'Absent', '2017-07-24', '2017-2018', '1508144869'),
(10, 1, 1, 8, 'Present', '2017-07-24', '2017-2018', '1508144869'),
(11, 1, 1, 9, 'Present', '2017-07-24', '2017-2018', '1508144869'),
(12, 1, 1, 18, 'Present', '2017-07-24', '2017-2018', '1508144869'),
(13, 2, 3, 10, 'Present', '2017-07-24', '2017-2018', '1507209072'),
(14, 2, 3, 11, 'Absent', '2017-07-24', '2017-2018', '1507209072'),
(15, 1, 2, 12, 'Present', '2017-07-24', '2017-2018', '1508145056'),
(16, 1, 2, 13, 'Present', '2017-07-24', '2017-2018', '1508145056'),
(17, 1, 2, 16, 'Present', '2017-07-24', '2017-2018', '1508145056'),
(18, 1, 2, 17, 'Present', '2017-07-24', '2017-2018', '1508145056'),
(19, 11, 14, 22, 'Present', '2017-10-03', '2017-2018', '1507033730'),
(20, 11, 14, 23, 'Absent', '2017-10-03', '2017-2018', '1507033730'),
(21, 1, 1, 1, 'Present', '2017-10-03', '2017-2018', '1508144869'),
(22, 1, 1, 6, 'Absent', '2017-10-03', '2017-2018', '1508144869'),
(23, 1, 1, 7, 'Absent', '2017-10-03', '2017-2018', '1508144869'),
(24, 1, 1, 8, 'Present', '2017-10-03', '2017-2018', '1508144869'),
(25, 1, 1, 9, 'Present', '2017-10-03', '2017-2018', '1508144869'),
(26, 1, 1, 18, 'Present', '2017-10-03', '2017-2018', '1508144869'),
(27, 1, 1, 1, 'Present', '2017-10-04', '2017-2018', '1508144869'),
(28, 1, 1, 6, 'Absent', '2017-10-04', '2017-2018', '1508144869'),
(29, 1, 1, 7, 'Absent', '2017-10-04', '2017-2018', '1508144869'),
(30, 1, 1, 8, 'Present', '2017-10-04', '2017-2018', '1508144869'),
(31, 1, 1, 9, 'Present', '2017-10-04', '2017-2018', '1508144869'),
(32, 1, 1, 18, 'Present', '2017-10-04', '2017-2018', '1508144869'),
(33, 1, 2, 12, 'Present', '2017-10-04', '2017-2018', '1508145056'),
(34, 1, 2, 13, 'Present', '2017-10-04', '2017-2018', '1508145056'),
(35, 1, 2, 16, 'Present', '2017-10-04', '2017-2018', '1508145056'),
(36, 1, 2, 17, 'Present', '2017-10-04', '2017-2018', '1508145056'),
(37, 2, 3, 10, 'Present', '2017-10-04', '2017-2018', '1507209072'),
(38, 2, 3, 11, 'Absent', '2017-10-04', '2017-2018', '1507209072'),
(39, 4, 10, 14, 'Present', '2017-10-04', '2017-2018', '1507110305'),
(40, 4, 10, 15, 'Present', '2017-10-04', '2017-2018', '1507110305'),
(59, 1, 1, 1, 'Present', '2017-10-05', '2017-2018', '1508144869'),
(60, 1, 1, 6, 'Absent', '2017-10-05', '2017-2018', '1508144869'),
(61, 1, 1, 7, 'Absent', '2017-10-05', '2017-2018', '1508144869'),
(62, 1, 1, 8, 'Present', '2017-10-05', '2017-2018', '1508144869'),
(63, 1, 1, 9, 'Present', '2017-10-05', '2017-2018', '1508144869'),
(64, 1, 1, 18, 'Present', '2017-10-05', '2017-2018', '1508144869'),
(65, 1, 1, 1, 'Present', '2017-10-16', '2017-2018', '1508144869'),
(66, 1, 1, 6, 'Absent', '2017-10-16', '2017-2018', '1508144869'),
(67, 1, 1, 7, 'Absent', '2017-10-16', '2017-2018', '1508144869'),
(68, 1, 1, 8, 'Present', '2017-10-16', '2017-2018', '1508144869'),
(69, 1, 1, 9, 'Present', '2017-10-16', '2017-2018', '1508144869'),
(70, 1, 1, 18, 'Present', '2017-10-16', '2017-2018', '1508144869'),
(71, 1, 1, 1, 'Present', '2017-10-14', '2017-2018', '1508144869'),
(72, 1, 1, 6, 'Absent', '2017-10-14', '2017-2018', '1508144869'),
(73, 1, 1, 7, 'Absent', '2017-10-14', '2017-2018', '1508144869'),
(74, 1, 1, 8, 'Present', '2017-10-14', '2017-2018', '1508144869'),
(75, 1, 1, 9, 'Present', '2017-10-14', '2017-2018', '1508144869'),
(76, 1, 1, 18, 'Present', '2017-10-14', '2017-2018', '1508144869'),
(77, 1, 1, 1, 'Present', '2017-10-13', '2017-2018', '1508144869'),
(78, 1, 1, 6, 'Absent', '2017-10-13', '2017-2018', '1508144869'),
(79, 1, 1, 7, 'Absent', '2017-10-13', '2017-2018', '1508144869'),
(80, 1, 1, 8, 'Present', '2017-10-13', '2017-2018', '1508144869'),
(81, 1, 1, 9, 'Present', '2017-10-13', '2017-2018', '1508144869'),
(82, 1, 1, 18, 'Present', '2017-10-13', '2017-2018', '1508144869'),
(83, 1, 1, 1, 'Present', '2017-10-12', '2017-2018', '1508144869'),
(84, 1, 1, 6, 'Absent', '2017-10-12', '2017-2018', '1508144869'),
(85, 1, 1, 7, 'Absent', '2017-10-12', '2017-2018', '1508144869'),
(86, 1, 1, 8, 'Present', '2017-10-12', '2017-2018', '1508144869'),
(87, 1, 1, 9, 'Present', '2017-10-12', '2017-2018', '1508144869'),
(88, 1, 1, 18, 'Present', '2017-10-12', '2017-2018', '1508144869'),
(89, 1, 1, 1, 'Present', '2017-10-11', '2017-2018', '1508144869'),
(90, 1, 1, 6, 'Absent', '2017-10-11', '2017-2018', '1508144869'),
(91, 1, 1, 7, 'Absent', '2017-10-11', '2017-2018', '1508144869'),
(92, 1, 1, 8, 'Present', '2017-10-11', '2017-2018', '1508144869'),
(93, 1, 1, 9, 'Present', '2017-10-11', '2017-2018', '1508144869'),
(94, 1, 1, 18, 'Present', '2017-10-11', '2017-2018', '1508144869'),
(95, 1, 1, 1, 'Present', '2017-10-10', '2017-2018', '1508144869'),
(96, 1, 1, 6, 'Absent', '2017-10-10', '2017-2018', '1508144869'),
(97, 1, 1, 7, 'Absent', '2017-10-10', '2017-2018', '1508144869'),
(98, 1, 1, 8, 'Present', '2017-10-10', '2017-2018', '1508144869'),
(99, 1, 1, 9, 'Present', '2017-10-10', '2017-2018', '1508144869'),
(100, 1, 1, 18, 'Present', '2017-10-10', '2017-2018', '1508144869'),
(101, 1, 1, 1, 'Present', '2017-10-09', '2017-2018', '1508144869'),
(102, 1, 1, 6, 'Absent', '2017-10-09', '2017-2018', '1508144869'),
(103, 1, 1, 7, 'Absent', '2017-10-09', '2017-2018', '1508144869'),
(104, 1, 1, 8, 'Present', '2017-10-09', '2017-2018', '1508144869'),
(105, 1, 1, 9, 'Present', '2017-10-09', '2017-2018', '1508144869'),
(106, 1, 1, 18, 'Present', '2017-10-09', '2017-2018', '1508144869'),
(107, 1, 1, 1, 'Present', '2017-10-07', '2017-2018', '1508144869'),
(108, 1, 1, 6, 'Absent', '2017-10-07', '2017-2018', '1508144869'),
(109, 1, 1, 7, 'Absent', '2017-10-07', '2017-2018', '1508144869'),
(110, 1, 1, 8, 'Present', '2017-10-07', '2017-2018', '1508144869'),
(111, 1, 1, 9, 'Present', '2017-10-07', '2017-2018', '1508144869'),
(112, 1, 1, 18, 'Present', '2017-10-07', '2017-2018', '1508144869'),
(113, 1, 1, 1, 'Present', '2017-10-06', '2017-2018', '1508144869'),
(114, 1, 1, 6, 'Absent', '2017-10-06', '2017-2018', '1508144869'),
(115, 1, 1, 7, 'Absent', '2017-10-06', '2017-2018', '1508144869'),
(116, 1, 1, 8, 'Present', '2017-10-06', '2017-2018', '1508144869'),
(117, 1, 1, 9, 'Present', '2017-10-06', '2017-2018', '1508144869'),
(118, 1, 1, 18, 'Present', '2017-10-06', '2017-2018', '1508144869'),
(119, 1, 1, 1, 'Present', '2017-10-02', '2017-2018', '1508144869'),
(120, 1, 1, 6, 'Absent', '2017-10-02', '2017-2018', '1508144869'),
(121, 1, 1, 7, 'Absent', '2017-10-02', '2017-2018', '1508144869'),
(122, 1, 1, 8, 'Present', '2017-10-02', '2017-2018', '1508144869'),
(123, 1, 1, 9, 'Present', '2017-10-02', '2017-2018', '1508144869'),
(124, 1, 1, 18, 'Present', '2017-10-02', '2017-2018', '1508144869'),
(125, 1, 2, 12, 'Present', '2017-10-16', '2017-2018', '1508145056'),
(126, 1, 2, 13, 'Present', '2017-10-16', '2017-2018', '1508145056'),
(127, 1, 2, 16, 'Present', '2017-10-16', '2017-2018', '1508145056'),
(128, 1, 2, 17, 'Present', '2017-10-16', '2017-2018', '1508145056'),
(129, 1, 1, 1, 'Present', '2017-10-18', '2017-2018', '1508303048'),
(130, 1, 1, 6, 'Present', '2017-10-18', '2017-2018', '1508303048'),
(131, 1, 1, 7, 'Present', '2017-10-18', '2017-2018', '1508303048'),
(132, 1, 1, 8, 'Present', '2017-10-18', '2017-2018', '1508303048'),
(133, 1, 1, 9, 'Present', '2017-10-18', '2017-2018', '1508303048'),
(134, 1, 1, 18, 'Present', '2017-10-18', '2017-2018', '1508303048');

-- --------------------------------------------------------

--
-- Table structure for table `studenthobbies`
--

CREATE TABLE `studenthobbies` (
  `HobbyId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `Hobby` text NOT NULL,
  `Lastupdated` varchar(235) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studenthobbies`
--

INSERT INTO `studenthobbies` (`HobbyId`, `StudentId`, `Hobby`, `Lastupdated`) VALUES
(1, 1, 'Playing outside games', '1508239098'),
(4, 1, 'Watching cartoon', '1508239098'),
(5, 1, 'test one', '1508239098'),
(11, 6, 'Playing chess', '1500611092'),
(12, 6, 'watching movies', '1500611092'),
(13, 7, 'Reading books', '1500611758'),
(14, 8, 'Hobby', '1500612285'),
(15, 9, 'Hobby', '1500612426'),
(16, 10, 'Hobby', '1500612643');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentId` int(11) NOT NULL,
  `Student` varchar(245) NOT NULL,
  `LastName` varchar(245) NOT NULL,
  `ProfileIPic` varchar(245) NOT NULL,
  `DOB` date NOT NULL,
  `BloodGroup` varchar(254) NOT NULL,
  `Roll` varchar(123) NOT NULL,
  `ClassName` int(11) NOT NULL,
  `ClassSection` int(11) NOT NULL,
  `AcademicYear` varchar(245) NOT NULL,
  `ParentPassword` varchar(256) NOT NULL,
  `Lastupdated` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentId`, `Student`, `LastName`, `ProfileIPic`, `DOB`, `BloodGroup`, `Roll`, `ClassName`, `ClassSection`, `AcademicYear`, `ParentPassword`, `Lastupdated`) VALUES
(1, 'Raheem', 'Mohd', 'resources/studentspics/2017-2018/Class-I/Section-A/Student-1.jpg?1500556147', '2011-10-17', 'B +ve', '001', 1, 1, '2017-2018', '5f4dcc3b5aa765d61d8327deb882cf99', '1508239098'),
(6, 'Kiran', 'k', 'resources/studentspics/2017-2018/Class-I/Section-A/Student-6.jpg?1500610111', '0000-00-00', 'a+', '002', 1, 1, '2017-2018', '5f4dcc3b5aa765d61d8327deb882cf99', '1500611092'),
(7, 'Maneesh', 'l', 'resources/studentspics/2017-2018/Class-I/Section-A/Student-7.jpg?1500611712', '0000-00-00', 'B-ve', '003', 1, 1, '2017-2018', '5f4dcc3b5aa765d61d8327deb882cf99', '1500611758'),
(8, 'Praveen', 'g', 'resources/studentspics/2017-2018/Class-I/Section-A/Student-8.jpg?1500612261', '0000-00-00', '0+ve', '004', 1, 1, '2017-2018', '5f4dcc3b5aa765d61d8327deb882cf99', '1500612285'),
(9, 'Manasa', 'N', 'resources/studentspics/2017-2018/Class-I/Section-A/Student-9.jpg?1500612400', '0000-00-00', 'O-ve', '005', 1, 1, '2017-2018', '5f4dcc3b5aa765d61d8327deb882cf99', '1500612426'),
(10, 'Keerthi Katta', 'k', 'resources/studentspics/2017-2018/Class-II/Section-A/Student-10.jpg?1500612625', '0000-00-00', 'O-ve', '001', 2, 3, '2017-2018', '5f4dcc3b5aa765d61d8327deb882cf99', '1500612643'),
(11, 'Praneeth Sombi', '', 'resources/studentspics/2017-2018/Class-II/Section-A/Student-11.jpg?1500612762', '0000-00-00', '', '002', 2, 3, '2017-2018', '5f4dcc3b5aa765d61d8327deb882cf99', '1500612762'),
(12, 'Uttej Parika', '', '', '0000-00-00', '', '001', 1, 2, '2017-2018', '', '1495110328'),
(13, 'Maneesh Unmuk', '', '', '0000-00-00', '', '002', 1, 2, '2017-2018', '', '1495110328'),
(14, 'Prahalad', '', '', '0000-00-00', '', '001', 4, 10, '2017-2018', '', '1495436982'),
(15, 'Keerthi', '', '', '0000-00-00', '', '002', 4, 10, '2017-2018', '', '1495436982'),
(16, 'Jai', '', '', '0000-00-00', '', '005', 1, 2, '2017-2018', 'f01bbf48ab8746a32194bed7de291037', '1499074306'),
(17, 'James', '', '', '0000-00-00', '', '006', 1, 2, '2017-2018', 'f675f57f57c2ee6ad414347d998f863b', '1499074306'),
(18, 'Pranay', '', '', '0000-00-00', '', '006', 1, 1, '2017-2018', '5f4dcc3b5aa765d61d8327deb882cf99', '1500616869'),
(19, 'Maneesh', '', '', '0000-00-00', '', '001', 5, 13, '2017-2018', '571785cbd6641bfc9e6d2cfb87050ba3', '1507032385'),
(20, 'Ranveer', '', '', '0000-00-00', '', '002', 5, 13, '2017-2018', '6e9c55db6e37b1e68d49a15402574cde', '1507032385'),
(21, 'Pradeep', '', '', '0000-00-00', '', '003', 5, 13, '2017-2018', '1f87d0b3d817ca49732093e3c2b4fb9a', '1507032385'),
(22, 'Javeed', '', '', '0000-00-00', '', '001', 11, 14, '2017-2018', '0271058b4f6bdf8940ba320651170517', '1507033644'),
(23, 'Maneesh', '', '', '0000-00-00', '', '002', 11, 14, '2017-2018', '85bde208c52242cd8aae79235b72f12d', '1507033644');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `SubjectId` int(11) NOT NULL,
  `SubjectName` varchar(256) NOT NULL,
  `Lastupdate` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SubjectId`, `SubjectName`, `Lastupdate`) VALUES
(10, 'English', '1495445507'),
(11, 'Hindi', '1495445507'),
(12, 'Telugu', '1495445507'),
(13, 'Environmental Science', '1495445880'),
(14, 'Physics', '1495445880'),
(15, 'Science', '1495445880'),
(16, 'Chesmistry', '1495445896'),
(17, 'Social', '1495460123'),
(18, 'Geography', '1495445896'),
(19, 'History', '1495445907'),
(20, 'Civics', '1495445907'),
(21, 'Economics', '1495445907'),
(22, 'Mathematics', '1495460439'),
(23, 'Sanskrit', '1495606045'),
(24, 'Iq', '1495606045'),
(25, 'Test-subject3', '1507031493'),
(26, 'Test-subject2', '1507031445');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `TeacherId` int(11) NOT NULL,
  `TeacherName` varchar(245) NOT NULL,
  `LoginPassword` varchar(256) NOT NULL,
  `Lastupdate` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TeacherId`, `TeacherName`, `LoginPassword`, `Lastupdate`) VALUES
(1, 'Sam', '', '1495019825'),
(2, 'sammy', '5f4dcc3b5aa765d61d8327deb882cf99', '1495019746'),
(3, 'George', '', '1507031941'),
(4, 'vidhya', '', '1495019800'),
(5, 'bhaskar', '', '1495019793'),
(6, 'Uday', '5f4dcc3b5aa765d61d8327deb882cf99', '1495019781'),
(7, 'Rohan', '', '1495883248'),
(8, 'Praveen', '', '1507031839');

-- --------------------------------------------------------

--
-- Table structure for table `teacherattendance`
--

CREATE TABLE `teacherattendance` (
  `AttendanceId` int(11) NOT NULL,
  `TeacherId` int(11) NOT NULL,
  `Present` enum('Y','N') NOT NULL,
  `AttendanceFor` date NOT NULL,
  `AcademicYear` varchar(256) NOT NULL,
  `LastUpdated` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherattendance`
--

INSERT INTO `teacherattendance` (`AttendanceId`, `TeacherId`, `Present`, `AttendanceFor`, `AcademicYear`, `LastUpdated`) VALUES
(1, 5, 'N', '2017-10-11', '2017-2018', '1507718272'),
(2, 3, 'Y', '2017-10-11', '2017-2018', '1507718261'),
(3, 8, 'Y', '2017-10-11', '2017-2018', '1507718261'),
(4, 7, 'N', '2017-10-11', '2017-2018', '1507718270'),
(5, 1, 'Y', '2017-10-11', '2017-2018', '1507718261'),
(6, 2, 'Y', '2017-10-11', '2017-2018', '1507718261'),
(7, 6, 'Y', '2017-10-11', '2017-2018', '1507718261'),
(8, 4, 'Y', '2017-10-11', '2017-2018', '1507718261'),
(9, 5, 'Y', '2017-10-16', '2017-2018', '1508134624'),
(10, 3, 'N', '2017-10-16', '2017-2018', '1508134759'),
(11, 8, 'Y', '2017-10-16', '2017-2018', '1508134624'),
(12, 7, 'N', '2017-10-16', '2017-2018', '1508134642'),
(13, 1, 'Y', '2017-10-16', '2017-2018', '1508134624'),
(14, 2, 'Y', '2017-10-16', '2017-2018', '1508134624'),
(15, 6, 'Y', '2017-10-16', '2017-2018', '1508134624'),
(16, 4, 'Y', '2017-10-16', '2017-2018', '1508134624'),
(17, 5, 'Y', '2017-10-17', '2017-2018', '1508219049'),
(18, 3, 'Y', '2017-10-17', '2017-2018', '1508219049'),
(19, 8, 'Y', '2017-10-17', '2017-2018', '1508219049'),
(20, 7, 'Y', '2017-10-17', '2017-2018', '1508219049'),
(21, 1, 'Y', '2017-10-17', '2017-2018', '1508219049'),
(22, 2, 'Y', '2017-10-17', '2017-2018', '1508219049'),
(23, 6, 'Y', '2017-10-17', '2017-2018', '1508219049'),
(24, 4, 'Y', '2017-10-17', '2017-2018', '1508219049'),
(25, 5, 'Y', '2017-10-02', '2017-2018', '1506923063'),
(26, 3, 'Y', '2017-10-02', '2017-2018', '1506923063'),
(27, 8, 'Y', '2017-10-02', '2017-2018', '1506923063'),
(28, 7, 'Y', '2017-10-02', '2017-2018', '1506923063'),
(29, 1, 'Y', '2017-10-02', '2017-2018', '1506923063'),
(30, 2, 'Y', '2017-10-02', '2017-2018', '1506923063'),
(31, 6, 'Y', '2017-10-02', '2017-2018', '1506923063'),
(32, 4, 'Y', '2017-10-02', '2017-2018', '1506923063'),
(33, 5, 'Y', '2017-10-03', '2017-2018', '1507009472'),
(34, 3, 'Y', '2017-10-03', '2017-2018', '1507009472'),
(35, 8, 'Y', '2017-10-03', '2017-2018', '1507009472'),
(36, 7, 'N', '2017-10-03', '2017-2018', '1507009475'),
(37, 1, 'Y', '2017-10-03', '2017-2018', '1507009472'),
(38, 2, 'Y', '2017-10-03', '2017-2018', '1507009472'),
(39, 6, 'Y', '2017-10-03', '2017-2018', '1507009472'),
(40, 4, 'Y', '2017-10-03', '2017-2018', '1507009472'),
(41, 5, 'Y', '2017-10-04', '2017-2018', '1507095887'),
(42, 3, 'Y', '2017-10-04', '2017-2018', '1507095887'),
(43, 8, 'N', '2017-10-04', '2017-2018', '1507095890'),
(44, 7, 'Y', '2017-10-04', '2017-2018', '1507095887'),
(45, 1, 'Y', '2017-10-04', '2017-2018', '1507095887'),
(46, 2, 'Y', '2017-10-04', '2017-2018', '1507095887'),
(47, 6, 'Y', '2017-10-04', '2017-2018', '1507095887'),
(48, 4, 'Y', '2017-10-04', '2017-2018', '1507095887'),
(49, 5, 'Y', '2017-10-05', '2017-2018', '1507182299'),
(50, 3, 'Y', '2017-10-05', '2017-2018', '1507182299'),
(51, 8, 'Y', '2017-10-05', '2017-2018', '1507182299'),
(52, 7, 'Y', '2017-10-05', '2017-2018', '1507182299'),
(53, 1, 'Y', '2017-10-05', '2017-2018', '1507182299'),
(54, 2, 'Y', '2017-10-05', '2017-2018', '1507182299'),
(55, 6, 'Y', '2017-10-05', '2017-2018', '1507182299'),
(56, 4, 'Y', '2017-10-05', '2017-2018', '1507182299'),
(57, 5, 'Y', '2017-10-06', '2017-2018', '1507268708'),
(58, 3, 'Y', '2017-10-06', '2017-2018', '1507268708'),
(59, 8, 'Y', '2017-10-06', '2017-2018', '1507268708'),
(60, 7, 'Y', '2017-10-06', '2017-2018', '1507268708'),
(61, 1, 'Y', '2017-10-06', '2017-2018', '1507268708'),
(62, 2, 'Y', '2017-10-06', '2017-2018', '1507268708'),
(63, 6, 'Y', '2017-10-06', '2017-2018', '1507268708'),
(64, 4, 'Y', '2017-10-06', '2017-2018', '1507268708'),
(65, 5, 'Y', '2017-10-07', '2017-2018', '1507355116'),
(66, 3, 'Y', '2017-10-07', '2017-2018', '1507355116'),
(67, 8, 'Y', '2017-10-07', '2017-2018', '1507355116'),
(68, 7, 'Y', '2017-10-07', '2017-2018', '1507355116'),
(69, 1, 'Y', '2017-10-07', '2017-2018', '1507355116'),
(70, 2, 'Y', '2017-10-07', '2017-2018', '1507355116'),
(71, 6, 'Y', '2017-10-07', '2017-2018', '1507355116'),
(72, 4, 'Y', '2017-10-07', '2017-2018', '1507355116'),
(73, 5, 'Y', '2017-10-09', '2017-2018', '1507527924'),
(74, 3, 'Y', '2017-10-09', '2017-2018', '1507527924'),
(75, 8, 'Y', '2017-10-09', '2017-2018', '1507527924'),
(76, 7, 'Y', '2017-10-09', '2017-2018', '1507527924'),
(77, 1, 'Y', '2017-10-09', '2017-2018', '1507527924'),
(78, 2, 'Y', '2017-10-09', '2017-2018', '1507527924'),
(79, 6, 'Y', '2017-10-09', '2017-2018', '1507527924'),
(80, 4, 'Y', '2017-10-09', '2017-2018', '1507527924'),
(81, 5, 'Y', '2017-10-10', '2017-2018', '1507614335'),
(82, 3, 'Y', '2017-10-10', '2017-2018', '1507614335'),
(83, 8, 'Y', '2017-10-10', '2017-2018', '1507614335'),
(84, 7, 'Y', '2017-10-10', '2017-2018', '1507614335'),
(85, 1, 'Y', '2017-10-10', '2017-2018', '1507614335'),
(86, 2, 'Y', '2017-10-10', '2017-2018', '1507614335'),
(87, 6, 'Y', '2017-10-10', '2017-2018', '1507614335'),
(88, 4, 'Y', '2017-10-10', '2017-2018', '1507614335'),
(89, 5, 'Y', '2017-10-12', '2017-2018', '1507787157'),
(90, 3, 'Y', '2017-10-12', '2017-2018', '1507787157'),
(91, 8, 'Y', '2017-10-12', '2017-2018', '1507787157'),
(92, 7, 'Y', '2017-10-12', '2017-2018', '1507787157'),
(93, 1, 'Y', '2017-10-12', '2017-2018', '1507787157'),
(94, 2, 'Y', '2017-10-12', '2017-2018', '1507787157'),
(95, 6, 'Y', '2017-10-12', '2017-2018', '1507787157'),
(96, 4, 'Y', '2017-10-12', '2017-2018', '1507787157'),
(97, 5, 'Y', '2017-10-13', '2017-2018', '1507873564'),
(98, 3, 'Y', '2017-10-13', '2017-2018', '1507873564'),
(99, 8, 'Y', '2017-10-13', '2017-2018', '1507873564'),
(100, 7, 'Y', '2017-10-13', '2017-2018', '1507873564'),
(101, 1, 'Y', '2017-10-13', '2017-2018', '1507873564'),
(102, 2, 'Y', '2017-10-13', '2017-2018', '1507873564'),
(103, 6, 'Y', '2017-10-13', '2017-2018', '1507873564'),
(104, 4, 'Y', '2017-10-13', '2017-2018', '1507873564'),
(105, 5, 'Y', '2017-10-14', '2017-2018', '1507959971'),
(106, 3, 'Y', '2017-10-14', '2017-2018', '1507959971'),
(107, 8, 'Y', '2017-10-14', '2017-2018', '1507959971'),
(108, 7, 'Y', '2017-10-14', '2017-2018', '1507959971'),
(109, 1, 'Y', '2017-10-14', '2017-2018', '1507959971'),
(110, 2, 'Y', '2017-10-14', '2017-2018', '1507959971'),
(111, 6, 'Y', '2017-10-14', '2017-2018', '1507959971'),
(112, 4, 'Y', '2017-10-14', '2017-2018', '1507959971'),
(113, 5, 'Y', '2017-09-01', '2017-2018', '1504244793'),
(114, 3, 'Y', '2017-09-01', '2017-2018', '1504244793'),
(115, 8, 'Y', '2017-09-01', '2017-2018', '1504244793'),
(116, 7, 'Y', '2017-09-01', '2017-2018', '1504244793'),
(117, 1, 'Y', '2017-09-01', '2017-2018', '1504244793'),
(118, 2, 'Y', '2017-09-01', '2017-2018', '1504244793'),
(119, 6, 'Y', '2017-09-01', '2017-2018', '1504244793'),
(120, 4, 'Y', '2017-09-01', '2017-2018', '1504244793'),
(121, 5, 'Y', '2017-09-02', '2017-2018', '1504331201'),
(122, 3, 'Y', '2017-09-02', '2017-2018', '1504331201'),
(123, 8, 'Y', '2017-09-02', '2017-2018', '1504331201'),
(124, 7, 'Y', '2017-09-02', '2017-2018', '1504331201'),
(125, 1, 'Y', '2017-09-02', '2017-2018', '1504331201'),
(126, 2, 'Y', '2017-09-02', '2017-2018', '1504331201'),
(127, 6, 'Y', '2017-09-02', '2017-2018', '1504331201'),
(128, 4, 'Y', '2017-09-02', '2017-2018', '1504331201'),
(129, 5, 'Y', '2017-09-04', '2017-2018', '1504504008'),
(130, 3, 'Y', '2017-09-04', '2017-2018', '1504504008'),
(131, 8, 'Y', '2017-09-04', '2017-2018', '1504504008'),
(132, 7, 'Y', '2017-09-04', '2017-2018', '1504504008'),
(133, 1, 'Y', '2017-09-04', '2017-2018', '1504504008'),
(134, 2, 'Y', '2017-09-04', '2017-2018', '1504504008'),
(135, 6, 'Y', '2017-09-04', '2017-2018', '1504504008'),
(136, 4, 'Y', '2017-09-04', '2017-2018', '1504504008'),
(137, 5, 'Y', '2017-09-05', '2017-2018', '1504590493'),
(138, 3, 'Y', '2017-09-05', '2017-2018', '1504590493'),
(139, 8, 'Y', '2017-09-05', '2017-2018', '1504590493'),
(140, 7, 'Y', '2017-09-05', '2017-2018', '1504590493'),
(141, 1, 'Y', '2017-09-05', '2017-2018', '1504590493'),
(142, 2, 'Y', '2017-09-05', '2017-2018', '1504590493'),
(143, 6, 'Y', '2017-09-05', '2017-2018', '1504590493'),
(144, 4, 'Y', '2017-09-05', '2017-2018', '1504590493'),
(145, 5, 'Y', '2017-09-06', '2017-2018', '1504676907'),
(146, 3, 'Y', '2017-09-06', '2017-2018', '1504676907'),
(147, 8, 'Y', '2017-09-06', '2017-2018', '1504676907'),
(148, 7, 'Y', '2017-09-06', '2017-2018', '1504676907'),
(149, 1, 'Y', '2017-09-06', '2017-2018', '1504676907'),
(150, 2, 'Y', '2017-09-06', '2017-2018', '1504676907'),
(151, 6, 'Y', '2017-09-06', '2017-2018', '1504676907'),
(152, 4, 'Y', '2017-09-06', '2017-2018', '1504676907'),
(153, 5, 'Y', '2017-09-07', '2017-2018', '1504763316'),
(154, 3, 'Y', '2017-09-07', '2017-2018', '1504763316'),
(155, 8, 'Y', '2017-09-07', '2017-2018', '1504763316'),
(156, 7, 'Y', '2017-09-07', '2017-2018', '1504763316'),
(157, 1, 'Y', '2017-09-07', '2017-2018', '1504763316'),
(158, 2, 'Y', '2017-09-07', '2017-2018', '1504763316'),
(159, 6, 'Y', '2017-09-07', '2017-2018', '1504763316'),
(160, 4, 'Y', '2017-09-07', '2017-2018', '1504763316'),
(161, 5, 'Y', '2017-09-08', '2017-2018', '1504849724'),
(162, 3, 'Y', '2017-09-08', '2017-2018', '1504849724'),
(163, 8, 'Y', '2017-09-08', '2017-2018', '1504849724'),
(164, 7, 'Y', '2017-09-08', '2017-2018', '1504849724'),
(165, 1, 'Y', '2017-09-08', '2017-2018', '1504849724'),
(166, 2, 'Y', '2017-09-08', '2017-2018', '1504849724'),
(167, 6, 'Y', '2017-09-08', '2017-2018', '1504849724'),
(168, 4, 'Y', '2017-09-08', '2017-2018', '1504849724'),
(169, 5, 'Y', '2017-09-09', '2017-2018', '1504936133'),
(170, 3, 'Y', '2017-09-09', '2017-2018', '1504936133'),
(171, 8, 'Y', '2017-09-09', '2017-2018', '1504936133'),
(172, 7, 'Y', '2017-09-09', '2017-2018', '1504936133'),
(173, 1, 'Y', '2017-09-09', '2017-2018', '1504936133'),
(174, 2, 'Y', '2017-09-09', '2017-2018', '1504936133'),
(175, 6, 'Y', '2017-09-09', '2017-2018', '1504936133'),
(176, 4, 'Y', '2017-09-09', '2017-2018', '1504936133'),
(177, 5, 'Y', '2017-09-11', '2017-2018', '1505108942'),
(178, 3, 'Y', '2017-09-11', '2017-2018', '1505108942'),
(179, 8, 'Y', '2017-09-11', '2017-2018', '1505108942'),
(180, 7, 'Y', '2017-09-11', '2017-2018', '1505108942'),
(181, 1, 'Y', '2017-09-11', '2017-2018', '1505108942'),
(182, 2, 'Y', '2017-09-11', '2017-2018', '1505108942'),
(183, 6, 'Y', '2017-09-11', '2017-2018', '1505108942'),
(184, 4, 'Y', '2017-09-11', '2017-2018', '1505108942'),
(185, 5, 'Y', '2017-09-12', '2017-2018', '1505195348'),
(186, 3, 'Y', '2017-09-12', '2017-2018', '1505195348'),
(187, 8, 'Y', '2017-09-12', '2017-2018', '1505195348'),
(188, 7, 'Y', '2017-09-12', '2017-2018', '1505195348'),
(189, 1, 'Y', '2017-09-12', '2017-2018', '1505195348'),
(190, 2, 'Y', '2017-09-12', '2017-2018', '1505195348'),
(191, 6, 'Y', '2017-09-12', '2017-2018', '1505195348'),
(192, 4, 'Y', '2017-09-12', '2017-2018', '1505195348'),
(193, 5, 'Y', '2017-09-13', '2017-2018', '1505281756'),
(194, 3, 'Y', '2017-09-13', '2017-2018', '1505281756'),
(195, 8, 'Y', '2017-09-13', '2017-2018', '1505281756'),
(196, 7, 'Y', '2017-09-13', '2017-2018', '1505281756'),
(197, 1, 'Y', '2017-09-13', '2017-2018', '1505281756'),
(198, 2, 'Y', '2017-09-13', '2017-2018', '1505281756'),
(199, 6, 'Y', '2017-09-13', '2017-2018', '1505281756'),
(200, 4, 'Y', '2017-09-13', '2017-2018', '1505281756'),
(201, 5, 'Y', '2017-09-14', '2017-2018', '1505368162'),
(202, 3, 'Y', '2017-09-14', '2017-2018', '1505368162'),
(203, 8, 'Y', '2017-09-14', '2017-2018', '1505368162'),
(204, 7, 'Y', '2017-09-14', '2017-2018', '1505368162'),
(205, 1, 'Y', '2017-09-14', '2017-2018', '1505368162'),
(206, 2, 'Y', '2017-09-14', '2017-2018', '1505368162'),
(207, 6, 'Y', '2017-09-14', '2017-2018', '1505368162'),
(208, 4, 'Y', '2017-09-14', '2017-2018', '1505368162'),
(209, 5, 'Y', '2017-09-15', '2017-2018', '1505454568'),
(210, 3, 'Y', '2017-09-15', '2017-2018', '1505454568'),
(211, 8, 'Y', '2017-09-15', '2017-2018', '1505454568'),
(212, 7, 'Y', '2017-09-15', '2017-2018', '1505454568'),
(213, 1, 'Y', '2017-09-15', '2017-2018', '1505454568'),
(214, 2, 'Y', '2017-09-15', '2017-2018', '1505454568'),
(215, 6, 'Y', '2017-09-15', '2017-2018', '1505454568'),
(216, 4, 'Y', '2017-09-15', '2017-2018', '1505454568'),
(217, 5, 'Y', '2017-09-16', '2017-2018', '1505540974'),
(218, 3, 'Y', '2017-09-16', '2017-2018', '1505540974'),
(219, 8, 'Y', '2017-09-16', '2017-2018', '1505540974'),
(220, 7, 'Y', '2017-09-16', '2017-2018', '1505540974'),
(221, 1, 'Y', '2017-09-16', '2017-2018', '1505540974'),
(222, 2, 'Y', '2017-09-16', '2017-2018', '1505540974'),
(223, 6, 'Y', '2017-09-16', '2017-2018', '1505540974'),
(224, 4, 'Y', '2017-09-16', '2017-2018', '1505540974'),
(225, 5, 'Y', '2017-08-01', '2017-2018', '1501566850'),
(226, 3, 'Y', '2017-08-01', '2017-2018', '1501566850'),
(227, 8, 'Y', '2017-08-01', '2017-2018', '1501566850'),
(228, 7, 'N', '2017-08-01', '2017-2018', '1501566854'),
(229, 1, 'Y', '2017-08-01', '2017-2018', '1501566850'),
(230, 2, 'Y', '2017-08-01', '2017-2018', '1501566850'),
(231, 6, 'Y', '2017-08-01', '2017-2018', '1501566850'),
(232, 4, 'Y', '2017-08-01', '2017-2018', '1501566850'),
(233, 5, 'Y', '2017-08-02', '2017-2018', '1501655085'),
(234, 3, 'Y', '2017-08-02', '2017-2018', '1501655085'),
(235, 8, 'Y', '2017-08-02', '2017-2018', '1501655085'),
(236, 7, 'Y', '2017-08-02', '2017-2018', '1501655085'),
(237, 1, 'N', '2017-08-02', '2017-2018', '1501655088'),
(238, 2, 'Y', '2017-08-02', '2017-2018', '1501655085'),
(239, 6, 'Y', '2017-08-02', '2017-2018', '1501655085'),
(240, 4, 'N', '2017-08-02', '2017-2018', '1501655092'),
(241, 5, 'Y', '2017-08-03', '2017-2018', '1501741503'),
(242, 3, 'Y', '2017-08-03', '2017-2018', '1501741503'),
(243, 8, 'Y', '2017-08-03', '2017-2018', '1501741503'),
(244, 7, 'Y', '2017-08-03', '2017-2018', '1501741503'),
(245, 1, 'Y', '2017-08-03', '2017-2018', '1501741503'),
(246, 2, 'Y', '2017-08-03', '2017-2018', '1501741503'),
(247, 6, 'Y', '2017-08-03', '2017-2018', '1501741503'),
(248, 4, 'Y', '2017-08-03', '2017-2018', '1501741503'),
(249, 5, 'N', '2017-08-04', '2017-2018', '1501827913'),
(250, 3, 'Y', '2017-08-04', '2017-2018', '1501827910'),
(251, 8, 'Y', '2017-08-04', '2017-2018', '1501827910'),
(252, 7, 'N', '2017-08-04', '2017-2018', '1501827915'),
(253, 1, 'Y', '2017-08-04', '2017-2018', '1501827910'),
(254, 2, 'Y', '2017-08-04', '2017-2018', '1501827910'),
(255, 6, 'Y', '2017-08-04', '2017-2018', '1501827910'),
(256, 4, 'N', '2017-08-04', '2017-2018', '1501827912'),
(257, 5, 'N', '2017-08-05', '2017-2018', '1501914337'),
(258, 3, 'Y', '2017-08-05', '2017-2018', '1501914331'),
(259, 8, 'Y', '2017-08-05', '2017-2018', '1501914331'),
(260, 7, 'N', '2017-08-05', '2017-2018', '1501914335'),
(261, 1, 'Y', '2017-08-05', '2017-2018', '1501914331'),
(262, 2, 'Y', '2017-08-05', '2017-2018', '1501914331'),
(263, 6, 'Y', '2017-08-05', '2017-2018', '1501914331'),
(264, 4, 'N', '2017-08-05', '2017-2018', '1501914333'),
(265, 5, 'Y', '2017-08-07', '2017-2018', '1502087145'),
(266, 3, 'Y', '2017-08-07', '2017-2018', '1502087145'),
(267, 8, 'N', '2017-08-07', '2017-2018', '1502087150'),
(268, 7, 'Y', '2017-08-07', '2017-2018', '1502087145'),
(269, 1, 'Y', '2017-08-07', '2017-2018', '1502087145'),
(270, 2, 'N', '2017-08-07', '2017-2018', '1502087151'),
(271, 6, 'Y', '2017-08-07', '2017-2018', '1502087145'),
(272, 4, 'Y', '2017-08-07', '2017-2018', '1502087145'),
(273, 5, 'Y', '2017-08-08', '2017-2018', '1502173564'),
(274, 3, 'N', '2017-08-08', '2017-2018', '1502173569'),
(275, 8, 'Y', '2017-08-08', '2017-2018', '1502173564'),
(276, 7, 'Y', '2017-08-08', '2017-2018', '1502173564'),
(277, 1, 'N', '2017-08-08', '2017-2018', '1502173568'),
(278, 2, 'Y', '2017-08-08', '2017-2018', '1502173564'),
(279, 6, 'Y', '2017-08-08', '2017-2018', '1502173564'),
(280, 4, 'Y', '2017-08-08', '2017-2018', '1502173564'),
(281, 5, 'Y', '2017-08-09', '2017-2018', '1502259975'),
(282, 3, 'Y', '2017-08-09', '2017-2018', '1502259975'),
(283, 8, 'N', '2017-08-09', '2017-2018', '1502259978'),
(284, 7, 'Y', '2017-08-09', '2017-2018', '1502259975'),
(285, 1, 'Y', '2017-08-09', '2017-2018', '1502259975'),
(286, 2, 'Y', '2017-08-09', '2017-2018', '1502259975'),
(287, 6, 'Y', '2017-08-09', '2017-2018', '1502259975'),
(288, 4, 'Y', '2017-08-09', '2017-2018', '1502259975'),
(289, 5, 'Y', '2017-08-10', '2017-2018', '1502346389'),
(290, 3, 'Y', '2017-08-10', '2017-2018', '1502346389'),
(291, 8, 'Y', '2017-08-10', '2017-2018', '1502346389'),
(292, 7, 'Y', '2017-08-10', '2017-2018', '1502346389'),
(293, 1, 'N', '2017-08-10', '2017-2018', '1502346394'),
(294, 2, 'Y', '2017-08-10', '2017-2018', '1502346389'),
(295, 6, 'N', '2017-08-10', '2017-2018', '1502346396'),
(296, 4, 'Y', '2017-08-10', '2017-2018', '1502346389');

-- --------------------------------------------------------

--
-- Table structure for table `teachercontactdetails`
--

CREATE TABLE `teachercontactdetails` (
  `SLNO` int(11) NOT NULL,
  `TeacherId` int(11) NOT NULL,
  `ContactNumber` varchar(256) NOT NULL,
  `AlternateNumber` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Landmark` varchar(256) NOT NULL,
  `Address` text NOT NULL,
  `Lastupdated` varchar(256) NOT NULL,
  `LastupdatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachercontactdetails`
--

INSERT INTO `teachercontactdetails` (`SLNO`, `TeacherId`, `ContactNumber`, `AlternateNumber`, `Email`, `Landmark`, `Address`, `Lastupdated`, `LastupdatedOn`) VALUES
(1, 4, '9908181818', '1234569870', 'vidhya.j@gmail.com', 'Near temple town', 'Address goes here', '1507705064', '2017-10-11 12:27:44'),
(2, 5, '9963854589', '', 'bhaskar.b@gmail.com', '', 'Address goes here', '1507710912', '2017-10-11 14:05:12'),
(3, 3, '9638524589', '', 'joseph.george@gmail.com', '', 'Address goes here', '1507709818', '2017-10-11 13:46:58'),
(4, 8, '9856485965', '', 'praveen.s@gmail.com', '', 'Address geos here', '1507709850', '2017-10-11 13:47:30'),
(5, 7, '7589624589', '', 'rohan.rahul@gmail.com', '', 'Address goes here', '1507710956', '2017-10-11 14:05:56'),
(6, 1, '965894589', '8458965896', 'sam.sony@gmail.com', '', 'Address goes here', '1507710979', '2017-10-11 14:06:19'),
(7, 2, '9632589789', '', 'sammy@gmail.com', '', 'Address goes here', '1507710998', '2017-10-11 14:06:38'),
(8, 6, '954845869', '8458478469', 'uday1987@gmail.com', '', 'Address goes here', '1507711029', '2017-10-11 14:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `teacherpersonaldetails`
--

CREATE TABLE `teacherpersonaldetails` (
  `SLNO` int(11) NOT NULL,
  `TeacherId` int(11) NOT NULL,
  `SurName` varchar(256) NOT NULL,
  `LastName` varchar(256) NOT NULL,
  `MaritialStatus` varchar(256) NOT NULL,
  `Spouse` varchar(256) NOT NULL,
  `DOB` date NOT NULL,
  `DOA` date NOT NULL,
  `ProfilePic` varchar(256) NOT NULL,
  `LastUpdated` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherpersonaldetails`
--

INSERT INTO `teacherpersonaldetails` (`SLNO`, `TeacherId`, `SurName`, `LastName`, `MaritialStatus`, `Spouse`, `DOB`, `DOA`, `ProfilePic`, `LastUpdated`) VALUES
(2, 4, 'J', 'Vidhya', 'Married', '', '1991-10-16', '0000-00-00', 'resources/teachers-profile-pics/vidhya/1507640228avatar1.png', '1507706832'),
(3, 8, 'S', 'Praveen', 'UnMarried', '', '1988-05-18', '0000-00-00', 'resources/teachers-profile-pics/Praveen/15077064651239-img.jpg', '1507706465'),
(4, 1, 'Sam', 'Sony', 'Married', '', '1997-06-19', '2016-04-27', 'resources/teachers-profile-pics/Sam/1507706701avatar1.png', '1507706701'),
(5, 7, '', '', '', '', '0000-00-00', '0000-00-00', 'resources/teachers-profile-pics/Rohan/1507706716avatar.png', ''),
(6, 5, '', '', '', '', '0000-00-00', '0000-00-00', 'resources/teachers-profile-pics/bhaskar/1507706932avatar5.png', '1507706932'),
(7, 6, '', '', '', '', '0000-00-00', '0000-00-00', 'resources/teachers-profile-pics/Uday/1507706966profile-pic.jpg', ''),
(8, 2, '', '', '', '', '0000-00-00', '0000-00-00', 'resources/teachers-profile-pics/sammy/15077069791225-img.jpg', ''),
(9, 3, '', '', '', '', '0000-00-00', '0000-00-00', 'resources/teachers-profile-pics/George/15077069981226-img.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `uploadpaths`
--

CREATE TABLE `uploadpaths` (
  `SLNO` int(12) NOT NULL,
  `UploadFor` varchar(245) NOT NULL,
  `Path` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploadpaths`
--

INSERT INTO `uploadpaths` (`SLNO`, `UploadFor`, `Path`) VALUES
(3, 'event-pic-path', 'resources/event-pics/');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `VechileId` int(10) NOT NULL,
  `VechileNumber` varchar(256) NOT NULL,
  `VehicleRoute` int(11) NOT NULL,
  `Driver` int(10) NOT NULL,
  `LastUpdated` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`VechileId`, `VechileNumber`, `VehicleRoute`, `Driver`, `LastUpdated`) VALUES
(1, 'TS09AD5684', 1, 8, '1500877037'),
(4, 'TS09UI3487', 2, 15, '1500874154'),
(5, 'AP90OP4536', 4, 17, '1500874566'),
(6, 'TS90ML9065', 3, 16, '1500874698'),
(7, 'TSNJ90UJ8979', 5, 17, '1500962068');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `VendorId` int(11) NOT NULL,
  `Title` text NOT NULL,
  `CompanyName` varchar(234) NOT NULL,
  `ContactPerson` varchar(234) NOT NULL,
  `ContactEmail` varchar(234) NOT NULL,
  `Mobile1` varchar(234) NOT NULL,
  `Mobile2` varchar(234) NOT NULL,
  `Address` text NOT NULL,
  `Status` enum('Active','Inactive') NOT NULL,
  `Lastupdated` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`VendorId`, `Title`, `CompanyName`, `ContactPerson`, `ContactEmail`, `Mobile1`, `Mobile2`, `Address`, `Status`, `Lastupdated`) VALUES
(1, 'Testtitle', 'Test Company', 'Person', 'Email@mail.com', '9963568974', '8499056987', 'Address Goes Here', 'Active', '1498103644'),
(3, 'Shoe Maker', 'Test Company One', 'Prasad', 'Prasad@mailinator.com', '9936984556', '', 'Address Goes Here', 'Inactive', '1498037120'),
(4, 'Shoe Maker', 'Test Company Three', 'Raheem', 'Raheem@mailinator.com', '88856987458', '', 'Dsfdsfs', 'Inactive', '1498052082'),
(5, 'Bags Supplier', 'Prime-bags', 'Pramodh', 'Pramodh@mailinator.com', '998745896', '213658974', 'Address Goes Her E', 'Active', '1498103720'),
(6, 'Bags Supplier', 'Rao Bags', 'Rao', 'Rao.raj@mailinator.com', '7845878965', '5469784589', 'Address', 'Active', '1498103774'),
(7, 'Uniform Supplier', 'Karteek Creations', 'Karthik', 'Karthik@mailinator.com', '1236547890', '01236589745', 'Address Goes Here', 'Active', '1498103826'),
(8, 'Stationary Supplier', 'Raghavendra Stationary', 'Raghu', 'Raghava@mailinator.com', '632569874', '4568795698', 'Address Here', 'Active', '1498120108'),
(9, 'Marketing', 'Mallik Enterprises', 'Mallik', 'Mallik@mailinator.com', '568745896', '456987458', 'Address Goes Here', 'Active', '1498120235'),
(10, 'Event Mangament', 'James Bell', 'James', 'James@mailinator.com', '8547856985', '5698748596', 'Address Goes Here', 'Active', '1498120664'),
(11, 'Power', 'TSED', 'Govt Person', 'Tspower@mailinator.com', '0405698456', '', 'Address', 'Active', '1500439372'),
(12, 'Water-Supply', 'Manjeera Jall', 'Govt Jall', 'Manjeerajall@mailinator.com', '04089658696', '', 'Address Goes Here', 'Active', '1500439345'),
(13, 'Vendor Title', 'Vendor Company', 'Vendor', 'Vendor@mailinator.com', '9963568956', '9965895698', 'Vendor Address Goes Here', 'Inactive', '1507034564');

-- --------------------------------------------------------

--
-- Table structure for table `whichexam`
--

CREATE TABLE `whichexam` (
  `ExamId` int(11) NOT NULL,
  `Exam` text NOT NULL,
  `Lastupdated` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `whichexam`
--

INSERT INTO `whichexam` (`ExamId`, `Exam`, `Lastupdated`) VALUES
(1, 'Unti-I', '12365547896'),
(2, 'Unit-II', '45879658'),
(3, 'Unti-III', '12365547896'),
(4, 'Unit-IV', '45879658'),
(5, 'Quarterly', '12365547896'),
(6, 'HalfYearly', '45879658'),
(7, 'Annual', '45879658'),
(8, 'Assignment', '45879658');

-- --------------------------------------------------------

--
-- Structure for view `allmonths`
--
DROP TABLE IF EXISTS `allmonths`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allmonths`  AS  select `mn`.`MonthName` AS `MonthName` from (`monthsname` `mn` left join `studentattendance` `std` on((month(`std`.`AttendanceOn`) = `mn`.`MonthNumber`))) group by `mn`.`MonthName` order by `mn`.`MonthId` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitypics`
--
ALTER TABLE `activitypics`
  ADD PRIMARY KEY (`ActivityPicId`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`SLNO`);

--
-- Indexes for table `allocatedmarks`
--
ALTER TABLE `allocatedmarks`
  ADD PRIMARY KEY (`AllocatedId`);

--
-- Indexes for table `assignedsubjects`
--
ALTER TABLE `assignedsubjects`
  ADD PRIMARY KEY (`AssignedId`);

--
-- Indexes for table `assignstdroute`
--
ALTER TABLE `assignstdroute`
  ADD PRIMARY KEY (`AssignedId`);

--
-- Indexes for table `assignteachers`
--
ALTER TABLE `assignteachers`
  ADD PRIMARY KEY (`SLNO`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`BillId`);

--
-- Indexes for table `celebrations`
--
ALTER TABLE `celebrations`
  ADD PRIMARY KEY (`CelebId`);

--
-- Indexes for table `classteachers`
--
ALTER TABLE `classteachers`
  ADD PRIMARY KEY (`ClassteacherId`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`DepartId`);

--
-- Indexes for table `examschedules`
--
ALTER TABLE `examschedules`
  ADD PRIMARY KEY (`ExamSchedueId`);

--
-- Indexes for table `extracircularactivities`
--
ALTER TABLE `extracircularactivities`
  ADD PRIMARY KEY (`ExtracActId`);

--
-- Indexes for table `feecollection`
--
ALTER TABLE `feecollection`
  ADD PRIMARY KEY (`FeeCollectionId`);

--
-- Indexes for table `feetranasactiondetails`
--
ALTER TABLE `feetranasactiondetails`
  ADD PRIMARY KEY (`TransId`);

--
-- Indexes for table `homeworks`
--
ALTER TABLE `homeworks`
  ADD PRIMARY KEY (`HomeworkId`);

--
-- Indexes for table `identificationmarks`
--
ALTER TABLE `identificationmarks`
  ADD PRIMARY KEY (`Markid`);

--
-- Indexes for table `monthsname`
--
ALTER TABLE `monthsname`
  ADD PRIMARY KEY (`MonthId`);

--
-- Indexes for table `newclass`
--
ALTER TABLE `newclass`
  ADD PRIMARY KEY (`SLNO`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`NotificationId`);

--
-- Indexes for table `parentdetails`
--
ALTER TABLE `parentdetails`
  ADD PRIMARY KEY (`ParentId`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`RouteId`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`SLNO`);

--
-- Indexes for table `schoolfee`
--
ALTER TABLE `schoolfee`
  ADD PRIMARY KEY (`FeeId`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`SectionId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffId`);

--
-- Indexes for table `staffdetails`
--
ALTER TABLE `staffdetails`
  ADD PRIMARY KEY (`StaffDetailId`);

--
-- Indexes for table `studentactivities`
--
ALTER TABLE `studentactivities`
  ADD PRIMARY KEY (`ActivityId`);

--
-- Indexes for table `studentattendance`
--
ALTER TABLE `studentattendance`
  ADD PRIMARY KEY (`AttendanceId`);

--
-- Indexes for table `studenthobbies`
--
ALTER TABLE `studenthobbies`
  ADD PRIMARY KEY (`HobbyId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`SubjectId`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`TeacherId`);

--
-- Indexes for table `teacherattendance`
--
ALTER TABLE `teacherattendance`
  ADD PRIMARY KEY (`AttendanceId`);

--
-- Indexes for table `teachercontactdetails`
--
ALTER TABLE `teachercontactdetails`
  ADD PRIMARY KEY (`SLNO`);

--
-- Indexes for table `teacherpersonaldetails`
--
ALTER TABLE `teacherpersonaldetails`
  ADD PRIMARY KEY (`SLNO`);

--
-- Indexes for table `uploadpaths`
--
ALTER TABLE `uploadpaths`
  ADD PRIMARY KEY (`SLNO`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`VechileId`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`VendorId`);

--
-- Indexes for table `whichexam`
--
ALTER TABLE `whichexam`
  ADD PRIMARY KEY (`ExamId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitypics`
--
ALTER TABLE `activitypics`
  MODIFY `ActivityPicId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `allocatedmarks`
--
ALTER TABLE `allocatedmarks`
  MODIFY `AllocatedId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `assignedsubjects`
--
ALTER TABLE `assignedsubjects`
  MODIFY `AssignedId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `assignstdroute`
--
ALTER TABLE `assignstdroute`
  MODIFY `AssignedId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `assignteachers`
--
ALTER TABLE `assignteachers`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `BillId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `celebrations`
--
ALTER TABLE `celebrations`
  MODIFY `CelebId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `classteachers`
--
ALTER TABLE `classteachers`
  MODIFY `ClassteacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `DepartId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `examschedules`
--
ALTER TABLE `examschedules`
  MODIFY `ExamSchedueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `extracircularactivities`
--
ALTER TABLE `extracircularactivities`
  MODIFY `ExtracActId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `feecollection`
--
ALTER TABLE `feecollection`
  MODIFY `FeeCollectionId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `feetranasactiondetails`
--
ALTER TABLE `feetranasactiondetails`
  MODIFY `TransId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `HomeworkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `identificationmarks`
--
ALTER TABLE `identificationmarks`
  MODIFY `Markid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `monthsname`
--
ALTER TABLE `monthsname`
  MODIFY `MonthId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `newclass`
--
ALTER TABLE `newclass`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `NotificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parentdetails`
--
ALTER TABLE `parentdetails`
  MODIFY `ParentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `RouteId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `schoolfee`
--
ALTER TABLE `schoolfee`
  MODIFY `FeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `SectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `staffdetails`
--
ALTER TABLE `staffdetails`
  MODIFY `StaffDetailId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `studentactivities`
--
ALTER TABLE `studentactivities`
  MODIFY `ActivityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `studentattendance`
--
ALTER TABLE `studentattendance`
  MODIFY `AttendanceId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `studenthobbies`
--
ALTER TABLE `studenthobbies`
  MODIFY `HobbyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `SubjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `TeacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `teacherattendance`
--
ALTER TABLE `teacherattendance`
  MODIFY `AttendanceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;
--
-- AUTO_INCREMENT for table `teachercontactdetails`
--
ALTER TABLE `teachercontactdetails`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `teacherpersonaldetails`
--
ALTER TABLE `teacherpersonaldetails`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `uploadpaths`
--
ALTER TABLE `uploadpaths`
  MODIFY `SLNO` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `VechileId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `VendorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `whichexam`
--
ALTER TABLE `whichexam`
  MODIFY `ExamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
