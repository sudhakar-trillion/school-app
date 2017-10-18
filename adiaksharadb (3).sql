-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2017 at 05:47 AM
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
(29, 6, 'resources/event-pics//1495866963_snow.jpg', '2017-03-23', '1495866963');

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
(1, 'admin', 'a76701dcf2c803cb22cb2fabc6c927d6', 'Admin', 'Active', '123456987');

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
(32, 4, 22, '1495617589');

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
(15, 7, 5, 13, '22', '7');

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
(13, '2017-06-12', 'some celebration', '1496323339');

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
(3, 4, 1, 1, '1495884211');

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
(10, 1, 3, 6, 15, '2017-06-20', '5:51:00', '2017-2018', '1497444486'),
(11, 1, 2, 3, 11, '2017-06-20', '6:33:00', '2017-2018', '1497444613'),
(12, 1, 2, 3, 23, '2017-06-13', '6:58:00', '2017-2018', '1497446902'),
(13, 1, 2, 4, 13, '2017-06-13', '6:59:00', '2017-2018', '1497446957');

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
(1, 1, 'Activity-one', '1495434073'),
(2, 1, 'Activity-two', '1495434073'),
(3, 1, 'A newer one', '1495434073');

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
  `Lastupdated` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homeworks`
--

INSERT INTO `homeworks` (`HomeworkId`, `ClassSlno`, `ClassSection`, `StudentId`, `SubjectId`, `HomeWorkOn`, `HomeWork`, `Status`, `Lastupdated`) VALUES
(1, 1, 1, 1, 10, '2017-05-24', 'A test home work', 'Assigned', '1495623676'),
(2, 1, 1, 1, 1, '2017-05-24', 'Test home work for hindi subject', 'Assigned', '1495694816'),
(3, 1, 1, 1, 13, '2017-05-24', 'Test work in Environmental science', 'Assigned', '1495623830'),
(4, 2, 3, 10, 10, '2017-05-24', 'It is a long established fact that a reader will be', 'Assigned', '1495695897'),
(5, 2, 3, 10, 10, '2017-05-24', 'It is a long established fact that a reader.', 'Assigned', '1495695886'),
(6, 1, 1, 7, 11, '2017-05-25', 'Test home work goes here', 'Assigned', '1495694849'),
(7, 1, 2, 12, 11, '2017-05-25', 'asdsa', 'Assigned', '1495695266');

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
(1, 1, 'A  mole on the left hand', '1495434073');

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
(10, 'Class-X', '1494926032');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `NotificationId` int(11) NOT NULL,
  `ClassName` int(11) NOT NULL,
  `ClassSection` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `Notification` text NOT NULL,
  `AddedOn` datetime NOT NULL,
  `AddedBy` enum('Parent','Admin') NOT NULL,
  `LastUpdated` varchar(256) NOT NULL,
  `Status` enum('Unread','Read','Closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`NotificationId`, `ClassName`, `ClassSection`, `StudentId`, `Notification`, `AddedOn`, `AddedBy`, `LastUpdated`, `Status`) VALUES
(1, 1, 1, 1, 'A sample notification will goes  here', '2017-05-23 12:04:55', 'Admin', '1495527404', 'Read'),
(2, 1, 2, 12, 'A sample one', '2017-05-23 12:06:27', 'Admin', '1495521387', 'Unread'),
(3, 2, 3, 10, 'Another sampe notification', '2017-05-23 12:08:02', 'Admin', '1495521482', 'Unread'),
(4, 2, 3, 11, 'New notification goes here', '2017-05-23 12:08:34', 'Admin', '1495521514', 'Unread'),
(5, 1, 1, 1, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.', '2017-05-22 15:24:23', 'Admin', '1495533263', 'Read'),
(6, 1, 1, 1, 'Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.', '2017-05-23 15:24:40', 'Admin', '1495533280', 'Read'),
(7, 0, 0, 1, 'Test notification by parent', '2017-05-23 18:37:06', 'Parent', '1495544826', 'Unread');

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
(1, 1, 'mother', 'father', 'Hdegree', 'Hdegree', 'Oc', 'Occu', '9963945071', '9963945071', 'address goes here', '1495270037');

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
(4, 4, '2017-2018', '2000', '6000', '23000', '33000', '1495451926');

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
(13, 5, 'A', '1495883239');

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
  `Lastupdated` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentactivities`
--

INSERT INTO `studentactivities` (`ActivityId`, `ClassSlno`, `ClassSection`, `StudentId`, `ActivityTitle`, `ActivityDate`, `Lastupdated`) VALUES
(1, 1, 1, 1, 'Event title', '2017-05-25', '1495789921'),
(2, 1, 1, 6, 'Sample event title', '2017-05-25', '1495709321'),
(3, 1, 1, 1, 'Test event two', '2017-05-26', '1495806163'),
(4, 1, 1, 1, 'Painting event', '2017-04-20', '1495866752'),
(5, 1, 1, 1, 'Forest Paiting', '2017-04-30', '1495866785'),
(6, 1, 1, 1, 'March-Paiting-event', '2017-03-23', '1495866963');

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
(1, 1, 'Playing outside games', '1495434073'),
(4, 1, 'Watching cartoon', '1495434073'),
(5, 1, 'test one', '1495434073');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentId` int(11) NOT NULL,
  `Student` varchar(245) NOT NULL,
  `LastName` varchar(245) NOT NULL,
  `ProfileIPic` varchar(245) NOT NULL,
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

INSERT INTO `students` (`StudentId`, `Student`, `LastName`, `ProfileIPic`, `BloodGroup`, `Roll`, `ClassName`, `ClassSection`, `AcademicYear`, `ParentPassword`, `Lastupdated`) VALUES
(1, 'Raheem', 'Mohd', 'resources/studentspics/2017-2018/Class-I/Section-A/Student-1.jpg', 'B +ve', '001', 1, 1, '2017-2018', '5f4dcc3b5aa765d61d8327deb882cf99', '1495803313'),
(6, 'Kiran', '', '', '', '002', 1, 1, '2017-2018', '', '1495110074'),
(7, 'Maneesh', '', '', '', '003', 1, 1, '2017-2018', '', '1495110074'),
(8, 'Praveen', '', '', '', '004', 1, 1, '2017-2018', '', '1495175324'),
(9, 'Manasa', '', '', '', '005', 1, 1, '2017-2018', '', '1495436861'),
(10, 'Keerthi Katta', '', '', '', '001', 2, 3, '2017-2018', '', '1495110283'),
(11, 'Praneeth Sombi', '', '', '', '002', 2, 3, '2017-2018', '', '1495110283'),
(12, 'Uttej Parika', '', '', '', '001', 1, 2, '2017-2018', '', '1495110328'),
(13, 'Maneesh Unmuk', '', '', '', '002', 1, 2, '2017-2018', '', '1495110328'),
(14, 'Prahalad', '', '', '', '001', 4, 10, '2016-2017', '', '1495436982'),
(15, 'Keerthi', '', '', '', '002', 4, 10, '2016-2017', '', '1495436982');

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
(24, 'Iq', '1495606045');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `TeacherId` int(11) NOT NULL,
  `TeacherName` varchar(245) NOT NULL,
  `Lastupdate` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TeacherId`, `TeacherName`, `Lastupdate`) VALUES
(1, 'Sam', '1495019825'),
(2, 'sammy', '1495019746'),
(3, 'george', '1495019810'),
(4, 'vidhya', '1495019800'),
(5, 'bhaskar', '1495019793'),
(6, 'Uday', '1495019781'),
(7, 'Rohan', '1495883248');

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
-- Indexes for table `assignedsubjects`
--
ALTER TABLE `assignedsubjects`
  ADD PRIMARY KEY (`AssignedId`);

--
-- Indexes for table `assignteachers`
--
ALTER TABLE `assignteachers`
  ADD PRIMARY KEY (`SLNO`);

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
-- Indexes for table `studentactivities`
--
ALTER TABLE `studentactivities`
  ADD PRIMARY KEY (`ActivityId`);

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
-- Indexes for table `uploadpaths`
--
ALTER TABLE `uploadpaths`
  ADD PRIMARY KEY (`SLNO`);

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
  MODIFY `ActivityPicId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assignedsubjects`
--
ALTER TABLE `assignedsubjects`
  MODIFY `AssignedId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `assignteachers`
--
ALTER TABLE `assignteachers`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `celebrations`
--
ALTER TABLE `celebrations`
  MODIFY `CelebId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `classteachers`
--
ALTER TABLE `classteachers`
  MODIFY `ClassteacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `examschedules`
--
ALTER TABLE `examschedules`
  MODIFY `ExamSchedueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `extracircularactivities`
--
ALTER TABLE `extracircularactivities`
  MODIFY `ExtracActId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `HomeworkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `identificationmarks`
--
ALTER TABLE `identificationmarks`
  MODIFY `Markid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `newclass`
--
ALTER TABLE `newclass`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `NotificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `parentdetails`
--
ALTER TABLE `parentdetails`
  MODIFY `ParentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schoolfee`
--
ALTER TABLE `schoolfee`
  MODIFY `FeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `SectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `studentactivities`
--
ALTER TABLE `studentactivities`
  MODIFY `ActivityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `studenthobbies`
--
ALTER TABLE `studenthobbies`
  MODIFY `HobbyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `SubjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `TeacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `uploadpaths`
--
ALTER TABLE `uploadpaths`
  MODIFY `SLNO` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `whichexam`
--
ALTER TABLE `whichexam`
  MODIFY `ExamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
