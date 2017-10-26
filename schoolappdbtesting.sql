-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2017 at 09:19 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolappdbtesting`
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

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `SLNO` int(11) NOT NULL,
  `AdminEmail` varchar(256) NOT NULL,
  `UserId` varchar(256) NOT NULL,
  `Password` varchar(234) NOT NULL,
  `Role` enum('Admin','Sub-Admin') NOT NULL,
  `Status` enum('Active','Inactive') NOT NULL,
  `Lastupdated` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`SLNO`, `AdminEmail`, `UserId`, `Password`, `Role`, `Status`, `Lastupdated`) VALUES
(1, 'prasanth@mailinator.com', 'subadmin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Sub-Admin', 'Active', '121211121'),
(3, 'sudhaker@mailinator.com', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin', 'Active', '1508481320');

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
(1, 1, 1, '1508749394'),
(2, 1, 2, '1508749394'),
(3, 1, 3, '1508749394');

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
(1, 1, 1, 1, '1', '1'),
(2, 2, 1, 1, '3', '2'),
(3, 2, 1, 2, '1', '2');

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
(1, 'Power Bill', '985', 'TSPSC', '2017-10-25', '1508907319');

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
(1, 1, 1, 1, '1508749422'),
(2, 2, 1, 2, '1508750085');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `DepartId` int(10) NOT NULL,
  `Department` varchar(234) NOT NULL,
  `LastUpdated` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 5, 1, 1, 1, '2017-09-18', '10:0:00', '2017-2018', '1508920309'),
(3, 5, 1, 1, 2, '2017-09-19', '10:0:00', '2017-2018', '1508920388'),
(4, 5, 1, 1, 3, '2017-09-22', '11:0:00', '2017-2018', '1508920408'),
(5, 5, 1, 2, 1, '2017-09-18', '11:0:00', '2017-2018', '1508920431'),
(6, 5, 1, 2, 2, '2017-09-19', '2:00:00', '2017-2018', '1508920450'),
(7, 5, 1, 2, 3, '2017-09-21', '2:00:00', '2017-2018', '1508920470'),
(8, 2, 1, 1, 1, '2017-08-02', '11:0:00', '2017-2018', '1508920795'),
(9, 2, 1, 2, 1, '2017-08-02', '2:00:00', '2017-2018', '1508920813'),
(10, 2, 1, 1, 2, '2017-08-04', '2:10:00', '2017-2018', '1508920836'),
(11, 2, 1, 2, 2, '2017-08-04', '10:3:00', '2017-2018', '1508920853'),
(12, 2, 1, 1, 3, '2017-08-08', '10:3:00', '2017-2018', '1508920872'),
(13, 2, 1, 2, 3, '2017-08-08', '2:30:00', '2017-2018', '1508920890'),
(14, 1, 1, 1, 1, '2017-07-26', '10:0:00', '2017-2018', '1508920921'),
(15, 1, 1, 2, 1, '2017-07-26', '3:00:00', '2017-2018', '1508920932'),
(16, 1, 1, 2, 2, '2017-07-27', '10:0:00', '2017-2018', '1508920945'),
(17, 1, 1, 1, 2, '2017-07-27', '2:30:00', '2017-2018', '1508920964'),
(18, 1, 1, 1, 3, '2017-07-28', '2:30:00', '2017-2018', '1508920974'),
(19, 1, 1, 2, 3, '2017-07-28', '11:0:00', '2017-2018', '1508920985');

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
(1, 1, 'f', '1508585624');

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

-- --------------------------------------------------------

--
-- Table structure for table `holidaylist`
--

CREATE TABLE `holidaylist` (
  `HolidayId` int(11) NOT NULL,
  `HolidayFor` text NOT NULL,
  `HolidayOn` date NOT NULL,
  `AcademicYear` varchar(234) NOT NULL,
  `LastUpdated` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holidaylist`
--

INSERT INTO `holidaylist` (`HolidayId`, `HolidayFor`, `HolidayOn`, `AcademicYear`, `LastUpdated`) VALUES
(2, 'Dipawalli', '2017-10-19', '2017-2018', '1508828393'),
(3, 'Second Satuarday', '2017-10-14', '2017-2018', '1508828589'),
(4, 'Dusheera', '2017-09-30', '2017-2018', '1508828618'),
(6, 'Second Satuarday', '2017-09-09', '2017-2018', '1508828945'),
(11, 'Dusheera Holidays', '2017-09-25', '2017-2018', '1508828988'),
(12, 'Dusheera Holidays', '2017-09-26', '2017-2018', '1508828993'),
(14, 'Dusheera Holidays', '2017-09-27', '2017-2018', '1508829001'),
(15, 'Dusheera Holidays', '2017-09-28', '2017-2018', '1508829004'),
(16, 'Dusheera Holidays', '2017-09-29', '2017-2018', '1508829008');

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
(1, 1, 'f', '1508585624');

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
(1, '05', 'May', 'May', '2017-05-23'),
(2, '06', 'June', 'Jun', '2017-06-13'),
(3, '07', 'July', 'Jul', '2017-07-23'),
(4, '08', 'August', 'Aug', '2017-08-13'),
(5, '09', 'September', 'Sep', '2017-09-13'),
(6, '10', 'October', 'Oct', '2017-10-13'),
(7, '11', 'November', 'Nov', '2017-11-13'),
(8, '12', 'December', 'Dec', '2017-12-13'),
(9, '01', 'January', 'Jan', '2017-01-13'),
(10, '02', 'February', 'Feb', '2017-02-13'),
(11, '03', 'March', 'Mar', '2017-03-13'),
(12, '04', 'April', 'Apr', '2017-04-13');

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
(1, 'Nursery', '1508484044');

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
  `AcademicYear` varchar(253) NOT NULL,
  `Lastupdated` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parentdetails`
--

INSERT INTO `parentdetails` (`ParentId`, `StudentId`, `MotherName`, `FatherName`, `MotherHighestDegree`, `FatherHighestDegree`, `MotherOccupation`, `FatherOccupation`, `ContactNumber1`, `ContactNumber2`, `Address`, `AcademicYear`, `Lastupdated`) VALUES
(1, 1, 'Mother', 'Father', 'graduation', 'graduation', 'Home maker', 'LIC', '9638524569', '8498081693', 'Address gos here', '2017-2018', '1508585576'),
(2, 2, 'Mother', 'Father', 'Grad', 'Grad', 'Home Maker', 'JOB', '9854869859', '8498081693', 'Address goes here', '2017-2018', '1508585748'),
(3, 3, 'Mother', 'Father', 'Das', 'dfds', 'dsfds', 'sdf', '7895648965', '9985296396', 'Address goes here', '2017-2018', '1508585795');

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

-- --------------------------------------------------------

--
-- Stand-in structure for view `scheduleinfo`
--
CREATE TABLE `scheduleinfo` (
`ExamSchedueId` int(11)
,`ExamId` int(11)
,`ClassName` int(11)
,`ClassSection` int(11)
,`ExamSchedule` date
,`ScheduledTime` varchar(245)
,`Exam` text
,`SubjectName` varchar(256)
);

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
(1, 1, '2017-2018', '550', '', '', '6300', '1508847172');

-- --------------------------------------------------------

--
-- Table structure for table `schoolinfo`
--

CREATE TABLE `schoolinfo` (
  `SchoolId` int(11) NOT NULL,
  `SchoolName` varchar(256) NOT NULL,
  `SchoolLogo` varchar(252) NOT NULL,
  `LastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolinfo`
--

INSERT INTO `schoolinfo` (`SchoolId`, `SchoolName`, `SchoolLogo`, `LastUpdated`) VALUES
(1, 'School Name', '1508481320students-profile-icon.jpg', '2017-10-20 12:05:20');

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
(1, 1, 'A', '1508484051'),
(2, 1, 'B', '1508750066');

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
(1, 1, 'vidhya', 'Teaching', 'Teacher', 'Active', '1508749409'),
(2, 2, 'Parveen', 'Teaching', 'Teacher', 'Active', '1508749552');

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

-- --------------------------------------------------------

--
-- Stand-in structure for view `stdinfo`
--
CREATE TABLE `stdinfo` (
`StudentId` int(11)
,`Student` varchar(491)
,`ClassName` varchar(234)
,`SLNO` int(11)
,`SectionId` int(11)
,`Section` varchar(256)
,`AcademicYear` varchar(245)
);

-- --------------------------------------------------------

--
-- Table structure for table `studentactivities`
--

CREATE TABLE `studentactivities` (
  `ActivityId` int(11) NOT NULL,
  `ClassSlno` int(11) NOT NULL,
  `ClassSection` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `ActivityDate` date NOT NULL,
  `ActivityTitle` text NOT NULL,
  `AcademicYear` varchar(223) NOT NULL,
  `Lastupdated` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 1, 1, 'Present', '2017-10-02', '2017-2018', '1508906720'),
(2, 1, 1, 2, 'Absent', '2017-10-02', '2017-2018', '1508906720'),
(3, 1, 1, 3, 'Present', '2017-10-02', '2017-2018', '1508906720'),
(4, 1, 1, 1, 'Present', '2017-10-03', '2017-2018', '1508906720'),
(5, 1, 1, 2, 'Absent', '2017-10-03', '2017-2018', '1508906720'),
(6, 1, 1, 3, 'Present', '2017-10-03', '2017-2018', '1508906720'),
(7, 1, 1, 1, 'Present', '2017-10-04', '2017-2018', '1508906720'),
(8, 1, 1, 2, 'Absent', '2017-10-04', '2017-2018', '1508906720'),
(9, 1, 1, 3, 'Present', '2017-10-04', '2017-2018', '1508906720'),
(10, 1, 1, 1, 'Present', '2017-10-05', '2017-2018', '1508906720'),
(11, 1, 1, 2, 'Absent', '2017-10-05', '2017-2018', '1508906720'),
(12, 1, 1, 3, 'Present', '2017-10-05', '2017-2018', '1508906720'),
(13, 1, 1, 1, 'Present', '2017-10-06', '2017-2018', '1508906720'),
(14, 1, 1, 2, 'Absent', '2017-10-06', '2017-2018', '1508906720'),
(15, 1, 1, 3, 'Present', '2017-10-06', '2017-2018', '1508906720'),
(16, 1, 1, 1, 'Present', '2017-10-07', '2017-2018', '1508906720'),
(17, 1, 1, 2, 'Absent', '2017-10-07', '2017-2018', '1508906720'),
(18, 1, 1, 3, 'Present', '2017-10-07', '2017-2018', '1508906720'),
(19, 1, 1, 1, 'Present', '2017-10-09', '2017-2018', '1508906720'),
(20, 1, 1, 2, 'Absent', '2017-10-09', '2017-2018', '1508906720'),
(21, 1, 1, 3, 'Present', '2017-10-09', '2017-2018', '1508906720'),
(22, 1, 1, 1, 'Present', '2017-10-10', '2017-2018', '1508906720'),
(23, 1, 1, 2, 'Absent', '2017-10-10', '2017-2018', '1508906720'),
(24, 1, 1, 3, 'Present', '2017-10-10', '2017-2018', '1508906720'),
(25, 1, 1, 1, 'Present', '2017-10-11', '2017-2018', '1508906720'),
(26, 1, 1, 2, 'Absent', '2017-10-11', '2017-2018', '1508906720'),
(27, 1, 1, 3, 'Present', '2017-10-11', '2017-2018', '1508906720'),
(28, 1, 1, 1, 'Present', '2017-10-12', '2017-2018', '1508906720'),
(29, 1, 1, 2, 'Absent', '2017-10-12', '2017-2018', '1508906720'),
(30, 1, 1, 3, 'Present', '2017-10-12', '2017-2018', '1508906720'),
(31, 1, 1, 1, 'Present', '2017-10-13', '2017-2018', '1508906720'),
(32, 1, 1, 2, 'Absent', '2017-10-13', '2017-2018', '1508906720'),
(33, 1, 1, 3, 'Present', '2017-10-13', '2017-2018', '1508906720'),
(34, 1, 1, 1, 'Present', '2017-10-14', '2017-2018', '1508906720'),
(35, 1, 1, 2, 'Absent', '2017-10-14', '2017-2018', '1508906720'),
(36, 1, 1, 3, 'Present', '2017-10-14', '2017-2018', '1508906720'),
(37, 1, 1, 1, 'Present', '2017-10-16', '2017-2018', '1508906720'),
(38, 1, 1, 2, 'Absent', '2017-10-16', '2017-2018', '1508906720'),
(39, 1, 1, 3, 'Present', '2017-10-16', '2017-2018', '1508906720'),
(40, 1, 1, 1, 'Present', '2017-10-17', '2017-2018', '1508906720'),
(41, 1, 1, 2, 'Absent', '2017-10-17', '2017-2018', '1508906720'),
(42, 1, 1, 3, 'Present', '2017-10-17', '2017-2018', '1508906720'),
(43, 1, 1, 1, 'Present', '2017-10-18', '2017-2018', '1508906720'),
(44, 1, 1, 2, 'Absent', '2017-10-18', '2017-2018', '1508906720'),
(45, 1, 1, 3, 'Present', '2017-10-18', '2017-2018', '1508906720'),
(46, 1, 1, 1, 'Present', '2017-10-19', '2017-2018', '1508906720'),
(47, 1, 1, 2, 'Absent', '2017-10-19', '2017-2018', '1508906720'),
(48, 1, 1, 3, 'Present', '2017-10-19', '2017-2018', '1508906720'),
(49, 1, 1, 1, 'Present', '2017-10-20', '2017-2018', '1508906720'),
(50, 1, 1, 2, 'Absent', '2017-10-20', '2017-2018', '1508906720'),
(51, 1, 1, 3, 'Present', '2017-10-20', '2017-2018', '1508906720'),
(52, 1, 1, 1, 'Present', '2017-10-21', '2017-2018', '1508906720'),
(53, 1, 1, 2, 'Absent', '2017-10-21', '2017-2018', '1508906720'),
(54, 1, 1, 3, 'Present', '2017-10-21', '2017-2018', '1508906720'),
(55, 1, 1, 1, 'Present', '2017-10-23', '2017-2018', '1508906720'),
(56, 1, 1, 2, 'Absent', '2017-10-23', '2017-2018', '1508906720'),
(57, 1, 1, 3, 'Present', '2017-10-23', '2017-2018', '1508906720'),
(58, 1, 1, 1, 'Present', '2017-09-01', '2017-2018', '1508906720'),
(59, 1, 1, 2, 'Absent', '2017-09-01', '2017-2018', '1508906720'),
(60, 1, 1, 3, 'Present', '2017-09-01', '2017-2018', '1508906720'),
(61, 1, 1, 1, 'Present', '2017-09-02', '2017-2018', '1508906720'),
(62, 1, 1, 2, 'Absent', '2017-09-02', '2017-2018', '1508906720'),
(63, 1, 1, 1, 'Present', '2017-09-04', '2017-2018', '1508906720'),
(64, 1, 1, 2, 'Absent', '2017-09-04', '2017-2018', '1508906720'),
(65, 1, 1, 3, 'Present', '2017-09-04', '2017-2018', '1508906720'),
(66, 1, 1, 1, 'Present', '2017-09-05', '2017-2018', '1508906720'),
(67, 1, 1, 2, 'Absent', '2017-09-05', '2017-2018', '1508906720'),
(68, 1, 1, 3, 'Present', '2017-09-05', '2017-2018', '1508906720'),
(69, 1, 1, 1, 'Present', '2017-09-06', '2017-2018', '1508906720'),
(70, 1, 1, 2, 'Absent', '2017-09-06', '2017-2018', '1508906720'),
(71, 1, 1, 3, 'Present', '2017-09-06', '2017-2018', '1508906720'),
(72, 1, 1, 1, 'Present', '2017-09-07', '2017-2018', '1508906720'),
(73, 1, 1, 2, 'Absent', '2017-09-07', '2017-2018', '1508906720'),
(74, 1, 1, 3, 'Present', '2017-09-07', '2017-2018', '1508906720'),
(75, 1, 1, 1, 'Present', '2017-09-08', '2017-2018', '1508906720'),
(76, 1, 1, 2, 'Absent', '2017-09-08', '2017-2018', '1508906720'),
(77, 1, 1, 3, 'Present', '2017-09-08', '2017-2018', '1508906720'),
(78, 1, 1, 1, 'Present', '2017-09-09', '2017-2018', '1508906720'),
(79, 1, 1, 2, 'Absent', '2017-09-09', '2017-2018', '1508906720'),
(80, 1, 1, 3, 'Present', '2017-09-09', '2017-2018', '1508906720'),
(81, 1, 1, 1, 'Present', '2017-09-11', '2017-2018', '1508906720'),
(82, 1, 1, 2, 'Absent', '2017-09-11', '2017-2018', '1508906720'),
(83, 1, 1, 3, 'Present', '2017-09-11', '2017-2018', '1508906720'),
(84, 1, 1, 1, 'Present', '2017-09-12', '2017-2018', '1508906720'),
(85, 1, 1, 2, 'Absent', '2017-09-12', '2017-2018', '1508906720'),
(86, 1, 1, 3, 'Present', '2017-09-12', '2017-2018', '1508906720'),
(87, 1, 1, 1, 'Present', '2017-09-13', '2017-2018', '1508906720'),
(88, 1, 1, 2, 'Absent', '2017-09-13', '2017-2018', '1508906720'),
(89, 1, 1, 3, 'Present', '2017-09-13', '2017-2018', '1508906720'),
(90, 1, 1, 1, 'Present', '2017-09-14', '2017-2018', '1508906720'),
(91, 1, 1, 2, 'Absent', '2017-09-14', '2017-2018', '1508906720'),
(92, 1, 1, 3, 'Present', '2017-09-14', '2017-2018', '1508906720'),
(93, 1, 1, 1, 'Present', '2017-09-15', '2017-2018', '1508906720'),
(94, 1, 1, 2, 'Absent', '2017-09-15', '2017-2018', '1508906720'),
(95, 1, 1, 3, 'Present', '2017-09-15', '2017-2018', '1508906720'),
(96, 1, 1, 1, 'Present', '2017-09-16', '2017-2018', '1508906720'),
(97, 1, 1, 2, 'Absent', '2017-09-16', '2017-2018', '1508906720'),
(98, 1, 1, 3, 'Present', '2017-09-16', '2017-2018', '1508906720'),
(99, 1, 1, 1, 'Present', '2017-09-18', '2017-2018', '1508906720'),
(100, 1, 1, 2, 'Absent', '2017-09-18', '2017-2018', '1508906720'),
(101, 1, 1, 3, 'Present', '2017-09-18', '2017-2018', '1508906720'),
(102, 1, 1, 1, 'Present', '2017-09-19', '2017-2018', '1508906720'),
(103, 1, 1, 2, 'Absent', '2017-09-19', '2017-2018', '1508906720'),
(104, 1, 1, 3, 'Present', '2017-09-19', '2017-2018', '1508906720'),
(105, 1, 1, 1, 'Present', '2017-09-20', '2017-2018', '1508906720'),
(106, 1, 1, 2, 'Absent', '2017-09-20', '2017-2018', '1508906720'),
(107, 1, 1, 3, 'Present', '2017-09-20', '2017-2018', '1508906720'),
(108, 1, 1, 1, 'Present', '2017-09-21', '2017-2018', '1508906720'),
(109, 1, 1, 2, 'Absent', '2017-09-21', '2017-2018', '1508906720'),
(110, 1, 1, 3, 'Present', '2017-09-21', '2017-2018', '1508906720'),
(111, 1, 1, 1, 'Present', '2017-09-22', '2017-2018', '1508906720'),
(112, 1, 1, 2, 'Absent', '2017-09-22', '2017-2018', '1508906720'),
(113, 1, 1, 3, 'Present', '2017-09-22', '2017-2018', '1508906720'),
(114, 1, 1, 1, 'Present', '2017-09-23', '2017-2018', '1508906720'),
(115, 1, 1, 2, 'Absent', '2017-09-23', '2017-2018', '1508906720'),
(116, 1, 1, 3, 'Present', '2017-09-23', '2017-2018', '1508906720'),
(117, 1, 1, 1, 'Present', '2017-09-25', '2017-2018', '1508906720'),
(118, 1, 1, 2, 'Absent', '2017-09-25', '2017-2018', '1508906720'),
(119, 1, 1, 3, 'Present', '2017-09-25', '2017-2018', '1508906720'),
(120, 1, 1, 1, 'Present', '2017-09-26', '2017-2018', '1508906720'),
(121, 1, 1, 2, 'Absent', '2017-09-26', '2017-2018', '1508906720'),
(122, 1, 1, 3, 'Present', '2017-09-26', '2017-2018', '1508906720'),
(123, 1, 1, 1, 'Present', '2017-09-27', '2017-2018', '1508906720'),
(124, 1, 1, 2, 'Absent', '2017-09-27', '2017-2018', '1508906720'),
(125, 1, 1, 3, 'Present', '2017-09-27', '2017-2018', '1508906720'),
(126, 1, 1, 1, 'Present', '2017-09-28', '2017-2018', '1508906720'),
(127, 1, 1, 2, 'Absent', '2017-09-28', '2017-2018', '1508906720'),
(128, 1, 1, 3, 'Present', '2017-09-28', '2017-2018', '1508906720'),
(129, 1, 1, 1, 'Present', '2017-09-29', '2017-2018', '1508906720'),
(130, 1, 1, 2, 'Absent', '2017-09-29', '2017-2018', '1508906720'),
(131, 1, 1, 3, 'Present', '2017-09-29', '2017-2018', '1508906720'),
(132, 1, 1, 1, 'Present', '2017-08-01', '2017-2018', '1508906720'),
(133, 1, 1, 2, 'Absent', '2017-08-01', '2017-2018', '1508906720'),
(134, 1, 1, 3, 'Present', '2017-08-01', '2017-2018', '1508906720'),
(135, 1, 1, 1, 'Present', '2017-08-02', '2017-2018', '1508906720'),
(136, 1, 1, 2, 'Absent', '2017-08-02', '2017-2018', '1508906720'),
(137, 1, 1, 3, 'Present', '2017-08-02', '2017-2018', '1508906720'),
(138, 1, 1, 1, 'Present', '2017-08-03', '2017-2018', '1508906720'),
(139, 1, 1, 2, 'Absent', '2017-08-03', '2017-2018', '1508906720'),
(140, 1, 1, 3, 'Present', '2017-08-03', '2017-2018', '1508906720'),
(141, 1, 1, 1, 'Present', '2017-08-04', '2017-2018', '1508906720'),
(142, 1, 1, 2, 'Absent', '2017-08-04', '2017-2018', '1508906720'),
(143, 1, 1, 3, 'Present', '2017-08-04', '2017-2018', '1508906720'),
(144, 1, 1, 1, 'Present', '2017-08-05', '2017-2018', '1508906720'),
(145, 1, 1, 2, 'Absent', '2017-08-05', '2017-2018', '1508906720'),
(146, 1, 1, 3, 'Present', '2017-08-05', '2017-2018', '1508906720'),
(147, 1, 1, 1, 'Present', '2017-08-07', '2017-2018', '1508906720'),
(148, 1, 1, 2, 'Absent', '2017-08-07', '2017-2018', '1508906720'),
(149, 1, 1, 3, 'Present', '2017-08-07', '2017-2018', '1508906720'),
(150, 1, 1, 1, 'Present', '2017-08-08', '2017-2018', '1508906720'),
(151, 1, 1, 2, 'Absent', '2017-08-08', '2017-2018', '1508906720'),
(152, 1, 1, 3, 'Present', '2017-08-08', '2017-2018', '1508906720'),
(153, 1, 1, 1, 'Present', '2017-08-09', '2017-2018', '1508906720'),
(154, 1, 1, 2, 'Absent', '2017-08-09', '2017-2018', '1508906720'),
(155, 1, 1, 3, 'Present', '2017-08-09', '2017-2018', '1508906720'),
(156, 1, 1, 1, 'Present', '2017-08-10', '2017-2018', '1508906720'),
(157, 1, 1, 2, 'Absent', '2017-08-10', '2017-2018', '1508906720'),
(158, 1, 1, 3, 'Present', '2017-08-10', '2017-2018', '1508906720'),
(159, 1, 1, 1, 'Present', '2017-08-11', '2017-2018', '1508906720'),
(160, 1, 1, 2, 'Absent', '2017-08-11', '2017-2018', '1508906720'),
(161, 1, 1, 3, 'Present', '2017-08-11', '2017-2018', '1508906720'),
(162, 1, 1, 1, 'Present', '2017-08-12', '2017-2018', '1508906720'),
(163, 1, 1, 2, 'Absent', '2017-08-12', '2017-2018', '1508906720'),
(164, 1, 1, 3, 'Present', '2017-08-12', '2017-2018', '1508906720'),
(165, 1, 1, 1, 'Present', '2017-08-14', '2017-2018', '1508906720'),
(166, 1, 1, 2, 'Absent', '2017-08-14', '2017-2018', '1508906720'),
(167, 1, 1, 3, 'Present', '2017-08-14', '2017-2018', '1508906720'),
(168, 1, 1, 1, 'Present', '2017-08-15', '2017-2018', '1508906720'),
(169, 1, 1, 2, 'Absent', '2017-08-15', '2017-2018', '1508906720'),
(170, 1, 1, 3, 'Present', '2017-08-15', '2017-2018', '1508906720'),
(171, 1, 1, 1, 'Present', '2017-08-16', '2017-2018', '1508906720'),
(172, 1, 1, 2, 'Absent', '2017-08-16', '2017-2018', '1508906720'),
(173, 1, 1, 3, 'Present', '2017-08-16', '2017-2018', '1508906720'),
(174, 1, 1, 1, 'Present', '2017-08-17', '2017-2018', '1508906720'),
(175, 1, 1, 2, 'Absent', '2017-08-17', '2017-2018', '1508906720'),
(176, 1, 1, 3, 'Present', '2017-08-17', '2017-2018', '1508906720'),
(177, 1, 1, 1, 'Present', '2017-08-18', '2017-2018', '1508906720'),
(178, 1, 1, 2, 'Absent', '2017-08-18', '2017-2018', '1508906720'),
(179, 1, 1, 3, 'Present', '2017-08-18', '2017-2018', '1508906720'),
(180, 1, 1, 1, 'Present', '2017-08-19', '2017-2018', '1508906720'),
(181, 1, 1, 2, 'Absent', '2017-08-19', '2017-2018', '1508906720'),
(182, 1, 1, 3, 'Present', '2017-08-19', '2017-2018', '1508906720'),
(183, 1, 1, 1, 'Present', '2017-08-21', '2017-2018', '1508906720'),
(184, 1, 1, 2, 'Absent', '2017-08-21', '2017-2018', '1508906720'),
(185, 1, 1, 3, 'Present', '2017-08-21', '2017-2018', '1508906720'),
(186, 1, 1, 1, 'Present', '2017-08-22', '2017-2018', '1508906720'),
(187, 1, 1, 2, 'Absent', '2017-08-22', '2017-2018', '1508906720'),
(188, 1, 1, 3, 'Present', '2017-08-22', '2017-2018', '1508906720'),
(189, 1, 1, 1, 'Present', '2017-08-23', '2017-2018', '1508906720'),
(190, 1, 1, 2, 'Absent', '2017-08-23', '2017-2018', '1508906720'),
(191, 1, 1, 3, 'Present', '2017-08-23', '2017-2018', '1508906720'),
(192, 1, 1, 1, 'Present', '2017-08-24', '2017-2018', '1508906720'),
(193, 1, 1, 2, 'Absent', '2017-08-24', '2017-2018', '1508906720'),
(194, 1, 1, 3, 'Present', '2017-08-24', '2017-2018', '1508906720'),
(195, 1, 1, 1, 'Present', '2017-08-25', '2017-2018', '1508906720'),
(196, 1, 1, 2, 'Absent', '2017-08-25', '2017-2018', '1508906720'),
(197, 1, 1, 3, 'Present', '2017-08-25', '2017-2018', '1508906720'),
(198, 1, 1, 1, 'Present', '2017-08-26', '2017-2018', '1508906720'),
(199, 1, 1, 2, 'Absent', '2017-08-26', '2017-2018', '1508906720'),
(200, 1, 1, 3, 'Present', '2017-08-26', '2017-2018', '1508906720'),
(201, 1, 1, 1, 'Present', '2017-08-28', '2017-2018', '1508906720'),
(202, 1, 1, 2, 'Absent', '2017-08-28', '2017-2018', '1508906720'),
(203, 1, 1, 3, 'Present', '2017-08-28', '2017-2018', '1508906720'),
(204, 1, 1, 1, 'Present', '2017-08-29', '2017-2018', '1508906720'),
(205, 1, 1, 2, 'Absent', '2017-08-29', '2017-2018', '1508906720'),
(206, 1, 1, 3, 'Present', '2017-08-29', '2017-2018', '1508906720'),
(207, 1, 1, 1, 'Present', '2017-08-30', '2017-2018', '1508906720'),
(208, 1, 1, 2, 'Absent', '2017-08-30', '2017-2018', '1508906720'),
(209, 1, 1, 3, 'Present', '2017-08-30', '2017-2018', '1508906720'),
(210, 1, 1, 1, 'Present', '2017-08-31', '2017-2018', '1508906720'),
(211, 1, 1, 2, 'Absent', '2017-08-31', '2017-2018', '1508906720'),
(212, 1, 1, 3, 'Present', '2017-08-31', '2017-2018', '1508906720'),
(213, 1, 1, 1, 'Present', '2017-07-01', '2017-2018', '1508906720'),
(214, 1, 1, 2, 'Absent', '2017-07-01', '2017-2018', '1508906720'),
(215, 1, 1, 3, 'Present', '2017-07-01', '2017-2018', '1508906720'),
(216, 1, 1, 1, 'Present', '2017-07-03', '2017-2018', '1508906720'),
(217, 1, 1, 2, 'Absent', '2017-07-03', '2017-2018', '1508906720'),
(218, 1, 1, 3, 'Present', '2017-07-03', '2017-2018', '1508906720'),
(219, 1, 1, 1, 'Present', '2017-07-04', '2017-2018', '1508906720'),
(220, 1, 1, 2, 'Absent', '2017-07-04', '2017-2018', '1508906720'),
(221, 1, 1, 3, 'Present', '2017-07-04', '2017-2018', '1508906720'),
(222, 1, 1, 1, 'Present', '2017-07-05', '2017-2018', '1508906720'),
(223, 1, 1, 2, 'Absent', '2017-07-05', '2017-2018', '1508906720'),
(224, 1, 1, 3, 'Present', '2017-07-05', '2017-2018', '1508906720'),
(225, 1, 1, 1, 'Present', '2017-07-06', '2017-2018', '1508906720'),
(226, 1, 1, 2, 'Absent', '2017-07-06', '2017-2018', '1508906720'),
(227, 1, 1, 3, 'Present', '2017-07-06', '2017-2018', '1508906720'),
(228, 1, 1, 1, 'Present', '2017-07-07', '2017-2018', '1508906720'),
(229, 1, 1, 2, 'Absent', '2017-07-07', '2017-2018', '1508906720'),
(230, 1, 1, 3, 'Present', '2017-07-07', '2017-2018', '1508906720'),
(231, 1, 1, 1, 'Present', '2017-07-08', '2017-2018', '1508906720'),
(232, 1, 1, 2, 'Absent', '2017-07-08', '2017-2018', '1508906720'),
(233, 1, 1, 3, 'Present', '2017-07-08', '2017-2018', '1508906720'),
(234, 1, 1, 1, 'Present', '2017-07-10', '2017-2018', '1508906720'),
(235, 1, 1, 2, 'Absent', '2017-07-10', '2017-2018', '1508906720'),
(236, 1, 1, 3, 'Present', '2017-07-10', '2017-2018', '1508906720'),
(237, 1, 1, 1, 'Present', '2017-07-11', '2017-2018', '1508906720'),
(238, 1, 1, 2, 'Absent', '2017-07-11', '2017-2018', '1508906720'),
(239, 1, 1, 3, 'Present', '2017-07-11', '2017-2018', '1508906720'),
(240, 1, 1, 1, 'Present', '2017-07-12', '2017-2018', '1508906720'),
(241, 1, 1, 2, 'Absent', '2017-07-12', '2017-2018', '1508906720'),
(242, 1, 1, 3, 'Present', '2017-07-12', '2017-2018', '1508906720'),
(243, 1, 1, 1, 'Present', '2017-07-13', '2017-2018', '1508906720'),
(244, 1, 1, 2, 'Absent', '2017-07-13', '2017-2018', '1508906720'),
(245, 1, 1, 3, 'Present', '2017-07-13', '2017-2018', '1508906720'),
(246, 1, 1, 1, 'Present', '2017-07-14', '2017-2018', '1508906720'),
(247, 1, 1, 2, 'Absent', '2017-07-14', '2017-2018', '1508906720'),
(248, 1, 1, 3, 'Present', '2017-07-14', '2017-2018', '1508906720'),
(249, 1, 1, 1, 'Present', '2017-07-15', '2017-2018', '1508906720'),
(250, 1, 1, 2, 'Absent', '2017-07-15', '2017-2018', '1508906720'),
(251, 1, 1, 3, 'Present', '2017-07-15', '2017-2018', '1508906720'),
(252, 1, 1, 1, 'Present', '2017-07-17', '2017-2018', '1508906720'),
(253, 1, 1, 2, 'Absent', '2017-07-17', '2017-2018', '1508906720'),
(254, 1, 1, 3, 'Present', '2017-07-17', '2017-2018', '1508906720'),
(255, 1, 1, 1, 'Present', '2017-07-18', '2017-2018', '1508906720'),
(256, 1, 1, 2, 'Absent', '2017-07-18', '2017-2018', '1508906720'),
(257, 1, 1, 3, 'Present', '2017-07-18', '2017-2018', '1508906720'),
(258, 1, 1, 1, 'Present', '2017-07-19', '2017-2018', '1508906720'),
(259, 1, 1, 2, 'Absent', '2017-07-19', '2017-2018', '1508906720'),
(260, 1, 1, 3, 'Present', '2017-07-19', '2017-2018', '1508906720'),
(261, 1, 1, 1, 'Present', '2017-07-20', '2017-2018', '1508906720'),
(262, 1, 1, 2, 'Absent', '2017-07-20', '2017-2018', '1508906720'),
(263, 1, 1, 3, 'Present', '2017-07-20', '2017-2018', '1508906720'),
(264, 1, 1, 1, 'Present', '2017-07-21', '2017-2018', '1508906720'),
(265, 1, 1, 2, 'Absent', '2017-07-21', '2017-2018', '1508906720'),
(266, 1, 1, 3, 'Present', '2017-07-21', '2017-2018', '1508906720'),
(267, 1, 1, 1, 'Present', '2017-07-22', '2017-2018', '1508906720'),
(268, 1, 1, 2, 'Absent', '2017-07-22', '2017-2018', '1508906720'),
(269, 1, 1, 3, 'Present', '2017-07-22', '2017-2018', '1508906720'),
(270, 1, 1, 1, 'Present', '2017-07-24', '2017-2018', '1508906720'),
(271, 1, 1, 2, 'Absent', '2017-07-24', '2017-2018', '1508906720'),
(272, 1, 1, 3, 'Present', '2017-07-24', '2017-2018', '1508906720'),
(273, 1, 1, 1, 'Present', '2017-07-25', '2017-2018', '1508906720'),
(274, 1, 1, 2, 'Absent', '2017-07-25', '2017-2018', '1508906720'),
(275, 1, 1, 3, 'Present', '2017-07-25', '2017-2018', '1508906720'),
(276, 1, 1, 1, 'Present', '2017-07-26', '2017-2018', '1508906720'),
(277, 1, 1, 2, 'Absent', '2017-07-26', '2017-2018', '1508906720'),
(278, 1, 1, 3, 'Present', '2017-07-26', '2017-2018', '1508906720'),
(279, 1, 1, 1, 'Present', '2017-07-27', '2017-2018', '1508906720'),
(280, 1, 1, 2, 'Absent', '2017-07-27', '2017-2018', '1508906720'),
(281, 1, 1, 3, 'Present', '2017-07-27', '2017-2018', '1508906720'),
(282, 1, 1, 1, 'Present', '2017-07-28', '2017-2018', '1508906720'),
(283, 1, 1, 2, 'Absent', '2017-07-28', '2017-2018', '1508906720'),
(284, 1, 1, 3, 'Present', '2017-07-28', '2017-2018', '1508906720'),
(285, 1, 1, 1, 'Present', '2017-07-29', '2017-2018', '1508906720'),
(286, 1, 1, 2, 'Absent', '2017-07-29', '2017-2018', '1508906720'),
(287, 1, 1, 3, 'Present', '2017-07-29', '2017-2018', '1508906720'),
(288, 1, 1, 1, 'Present', '2017-07-31', '2017-2018', '1508906720'),
(289, 1, 1, 2, 'Absent', '2017-07-31', '2017-2018', '1508906720'),
(290, 1, 1, 3, 'Present', '2017-07-31', '2017-2018', '1508906720'),
(291, 1, 1, 1, 'Present', '2017-06-01', '2017-2018', '1508906720'),
(292, 1, 1, 2, 'Absent', '2017-06-01', '2017-2018', '1508906720'),
(293, 1, 1, 3, 'Present', '2017-06-01', '2017-2018', '1508906720'),
(294, 1, 1, 1, 'Present', '2017-06-02', '2017-2018', '1508906720'),
(295, 1, 1, 2, 'Absent', '2017-06-02', '2017-2018', '1508906720'),
(296, 1, 1, 3, 'Present', '2017-06-02', '2017-2018', '1508906720'),
(297, 1, 1, 1, 'Present', '2017-06-03', '2017-2018', '1508906720'),
(298, 1, 1, 2, 'Absent', '2017-06-03', '2017-2018', '1508906720'),
(299, 1, 1, 3, 'Present', '2017-06-03', '2017-2018', '1508906720'),
(300, 1, 1, 1, 'Present', '2017-06-05', '2017-2018', '1508906720'),
(301, 1, 1, 2, 'Absent', '2017-06-05', '2017-2018', '1508906720'),
(302, 1, 1, 3, 'Present', '2017-06-05', '2017-2018', '1508906720'),
(303, 1, 1, 1, 'Present', '2017-06-06', '2017-2018', '1508906720'),
(304, 1, 1, 2, 'Absent', '2017-06-06', '2017-2018', '1508906720'),
(305, 1, 1, 3, 'Present', '2017-06-06', '2017-2018', '1508906720'),
(306, 1, 1, 1, 'Present', '2017-06-07', '2017-2018', '1508906720'),
(307, 1, 1, 2, 'Absent', '2017-06-07', '2017-2018', '1508906720'),
(308, 1, 1, 3, 'Present', '2017-06-07', '2017-2018', '1508906720'),
(309, 1, 1, 1, 'Present', '2017-06-08', '2017-2018', '1508906720'),
(310, 1, 1, 2, 'Absent', '2017-06-08', '2017-2018', '1508906720'),
(311, 1, 1, 3, 'Present', '2017-06-08', '2017-2018', '1508906720'),
(312, 1, 1, 1, 'Present', '2017-06-09', '2017-2018', '1508906720'),
(313, 1, 1, 2, 'Absent', '2017-06-09', '2017-2018', '1508906720'),
(314, 1, 1, 3, 'Present', '2017-06-09', '2017-2018', '1508906720'),
(315, 1, 1, 1, 'Present', '2017-06-10', '2017-2018', '1508906720'),
(316, 1, 1, 2, 'Absent', '2017-06-10', '2017-2018', '1508906720'),
(317, 1, 1, 3, 'Present', '2017-06-10', '2017-2018', '1508906720'),
(318, 1, 1, 1, 'Present', '2017-06-12', '2017-2018', '1508906720'),
(319, 1, 1, 2, 'Absent', '2017-06-12', '2017-2018', '1508906720'),
(320, 1, 1, 3, 'Present', '2017-06-12', '2017-2018', '1508906720'),
(321, 1, 1, 1, 'Present', '2017-06-13', '2017-2018', '1508906720'),
(322, 1, 1, 2, 'Absent', '2017-06-13', '2017-2018', '1508906720'),
(323, 1, 1, 3, 'Present', '2017-06-13', '2017-2018', '1508906720'),
(324, 1, 1, 1, 'Present', '2017-06-14', '2017-2018', '1508906720'),
(325, 1, 1, 2, 'Absent', '2017-06-14', '2017-2018', '1508906720'),
(326, 1, 1, 3, 'Present', '2017-06-14', '2017-2018', '1508906720'),
(327, 1, 1, 1, 'Present', '2017-06-15', '2017-2018', '1508906720'),
(328, 1, 1, 2, 'Absent', '2017-06-15', '2017-2018', '1508906720'),
(329, 1, 1, 3, 'Present', '2017-06-15', '2017-2018', '1508906720'),
(330, 1, 1, 1, 'Present', '2017-06-16', '2017-2018', '1508906720'),
(331, 1, 1, 2, 'Absent', '2017-06-16', '2017-2018', '1508906720'),
(332, 1, 1, 3, 'Present', '2017-06-16', '2017-2018', '1508906720'),
(333, 1, 1, 1, 'Present', '2017-06-17', '2017-2018', '1508906720'),
(334, 1, 1, 2, 'Absent', '2017-06-17', '2017-2018', '1508906720'),
(335, 1, 1, 3, 'Present', '2017-06-17', '2017-2018', '1508906720'),
(336, 1, 1, 1, 'Present', '2017-06-19', '2017-2018', '1508906720'),
(337, 1, 1, 2, 'Absent', '2017-06-19', '2017-2018', '1508906720'),
(338, 1, 1, 3, 'Present', '2017-06-19', '2017-2018', '1508906720'),
(339, 1, 1, 1, 'Present', '2017-06-20', '2017-2018', '1508906720'),
(340, 1, 1, 2, 'Absent', '2017-06-20', '2017-2018', '1508906720'),
(341, 1, 1, 3, 'Present', '2017-06-20', '2017-2018', '1508906720'),
(342, 1, 1, 1, 'Present', '2017-06-21', '2017-2018', '1508906720'),
(343, 1, 1, 2, 'Absent', '2017-06-21', '2017-2018', '1508906720'),
(344, 1, 1, 3, 'Present', '2017-06-21', '2017-2018', '1508906720'),
(345, 1, 1, 1, 'Present', '2017-06-22', '2017-2018', '1508906720'),
(346, 1, 1, 2, 'Absent', '2017-06-22', '2017-2018', '1508906720'),
(347, 1, 1, 3, 'Present', '2017-06-22', '2017-2018', '1508906720'),
(348, 1, 1, 1, 'Present', '2017-06-23', '2017-2018', '1508906720'),
(349, 1, 1, 2, 'Absent', '2017-06-23', '2017-2018', '1508906720'),
(350, 1, 1, 3, 'Present', '2017-06-23', '2017-2018', '1508906720'),
(351, 1, 1, 1, 'Present', '2017-06-24', '2017-2018', '1508906720'),
(352, 1, 1, 2, 'Absent', '2017-06-24', '2017-2018', '1508906720'),
(353, 1, 1, 3, 'Present', '2017-06-24', '2017-2018', '1508906720'),
(354, 1, 1, 1, 'Present', '2017-06-26', '2017-2018', '1508906720'),
(355, 1, 1, 2, 'Absent', '2017-06-26', '2017-2018', '1508906720'),
(356, 1, 1, 3, 'Present', '2017-06-26', '2017-2018', '1508906720'),
(357, 1, 1, 1, 'Present', '2017-06-27', '2017-2018', '1508906720'),
(358, 1, 1, 2, 'Absent', '2017-06-27', '2017-2018', '1508906720'),
(359, 1, 1, 3, 'Present', '2017-06-27', '2017-2018', '1508906720'),
(360, 1, 1, 1, 'Present', '2017-06-28', '2017-2018', '1508906720'),
(361, 1, 1, 2, 'Absent', '2017-06-28', '2017-2018', '1508906720'),
(362, 1, 1, 3, 'Present', '2017-06-28', '2017-2018', '1508906720'),
(363, 1, 1, 1, 'Present', '2017-06-29', '2017-2018', '1508906720'),
(364, 1, 1, 2, 'Absent', '2017-06-29', '2017-2018', '1508906720'),
(365, 1, 1, 3, 'Present', '2017-06-29', '2017-2018', '1508906720'),
(366, 1, 1, 1, 'Present', '2017-06-30', '2017-2018', '1508906720'),
(367, 1, 1, 2, 'Absent', '2017-06-30', '2017-2018', '1508906720'),
(368, 1, 1, 3, 'Present', '2017-06-30', '2017-2018', '1508906720'),
(369, 1, 1, 1, 'Present', '2017-05-01', '2017-2018', '1508906720'),
(370, 1, 1, 2, 'Absent', '2017-05-01', '2017-2018', '1508906720'),
(371, 1, 1, 3, 'Present', '2017-05-01', '2017-2018', '1508906720'),
(372, 1, 1, 1, 'Present', '2017-05-02', '2017-2018', '1508906720'),
(373, 1, 1, 2, 'Absent', '2017-05-02', '2017-2018', '1508906720'),
(374, 1, 1, 3, 'Present', '2017-05-02', '2017-2018', '1508906720'),
(375, 1, 1, 1, 'Present', '2017-05-03', '2017-2018', '1508906720'),
(376, 1, 1, 2, 'Absent', '2017-05-03', '2017-2018', '1508906720'),
(377, 1, 1, 3, 'Present', '2017-05-03', '2017-2018', '1508906720'),
(378, 1, 1, 1, 'Present', '2017-05-04', '2017-2018', '1508906720'),
(379, 1, 1, 2, 'Absent', '2017-05-04', '2017-2018', '1508906720'),
(380, 1, 1, 3, 'Present', '2017-05-04', '2017-2018', '1508906720'),
(381, 1, 1, 1, 'Present', '2017-05-05', '2017-2018', '1508906720'),
(382, 1, 1, 2, 'Absent', '2017-05-05', '2017-2018', '1508906720'),
(383, 1, 1, 3, 'Present', '2017-05-05', '2017-2018', '1508906720'),
(384, 1, 1, 1, 'Present', '2017-05-06', '2017-2018', '1508906720'),
(385, 1, 1, 2, 'Absent', '2017-05-06', '2017-2018', '1508906720'),
(386, 1, 1, 3, 'Present', '2017-05-06', '2017-2018', '1508906720'),
(387, 1, 1, 1, 'Present', '2017-05-08', '2017-2018', '1508906720'),
(388, 1, 1, 2, 'Absent', '2017-05-08', '2017-2018', '1508906720'),
(389, 1, 1, 3, 'Present', '2017-05-08', '2017-2018', '1508906720'),
(390, 1, 1, 1, 'Present', '2017-05-09', '2017-2018', '1508906720'),
(391, 1, 1, 2, 'Absent', '2017-05-09', '2017-2018', '1508906720'),
(392, 1, 1, 3, 'Present', '2017-05-09', '2017-2018', '1508906720'),
(393, 1, 1, 1, 'Present', '2017-05-10', '2017-2018', '1508906720'),
(394, 1, 1, 2, 'Absent', '2017-05-10', '2017-2018', '1508906720'),
(395, 1, 1, 3, 'Present', '2017-05-10', '2017-2018', '1508906720'),
(396, 1, 1, 1, 'Present', '2017-05-11', '2017-2018', '1508906720'),
(397, 1, 1, 2, 'Absent', '2017-05-11', '2017-2018', '1508906720'),
(398, 1, 1, 3, 'Present', '2017-05-11', '2017-2018', '1508906720'),
(399, 1, 1, 1, 'Present', '2017-05-12', '2017-2018', '1508906720'),
(400, 1, 1, 2, 'Absent', '2017-05-12', '2017-2018', '1508906720'),
(401, 1, 1, 3, 'Present', '2017-05-12', '2017-2018', '1508906720'),
(402, 1, 1, 1, 'Present', '2017-05-13', '2017-2018', '1508906720'),
(403, 1, 1, 2, 'Absent', '2017-05-13', '2017-2018', '1508906720'),
(404, 1, 1, 3, 'Present', '2017-05-13', '2017-2018', '1508906720'),
(405, 1, 1, 1, 'Present', '2017-05-15', '2017-2018', '1508906720'),
(406, 1, 1, 2, 'Absent', '2017-05-15', '2017-2018', '1508906720'),
(407, 1, 1, 3, 'Present', '2017-05-15', '2017-2018', '1508906720'),
(408, 1, 1, 1, 'Present', '2017-05-16', '2017-2018', '1508906720'),
(409, 1, 1, 2, 'Absent', '2017-05-16', '2017-2018', '1508906720'),
(410, 1, 1, 3, 'Present', '2017-05-16', '2017-2018', '1508906720'),
(411, 1, 1, 1, 'Present', '2017-05-17', '2017-2018', '1508906720'),
(412, 1, 1, 2, 'Absent', '2017-05-17', '2017-2018', '1508906720'),
(413, 1, 1, 3, 'Present', '2017-05-17', '2017-2018', '1508906720'),
(414, 1, 1, 1, 'Present', '2017-05-18', '2017-2018', '1508906720'),
(415, 1, 1, 2, 'Absent', '2017-05-18', '2017-2018', '1508906720'),
(416, 1, 1, 3, 'Present', '2017-05-18', '2017-2018', '1508906720'),
(417, 1, 1, 1, 'Present', '2017-05-19', '2017-2018', '1508906720'),
(418, 1, 1, 2, 'Absent', '2017-05-19', '2017-2018', '1508906720'),
(419, 1, 1, 3, 'Present', '2017-05-19', '2017-2018', '1508906720'),
(420, 1, 1, 1, 'Present', '2017-05-20', '2017-2018', '1508906720'),
(421, 1, 1, 2, 'Absent', '2017-05-20', '2017-2018', '1508906720'),
(422, 1, 1, 3, 'Present', '2017-05-20', '2017-2018', '1508906720'),
(423, 1, 1, 1, 'Present', '2017-05-22', '2017-2018', '1508906720'),
(424, 1, 1, 2, 'Absent', '2017-05-22', '2017-2018', '1508906720'),
(425, 1, 1, 3, 'Present', '2017-05-22', '2017-2018', '1508906720'),
(426, 1, 1, 1, 'Present', '2017-05-23', '2017-2018', '1508906720'),
(427, 1, 1, 2, 'Absent', '2017-05-23', '2017-2018', '1508906720'),
(428, 1, 1, 3, 'Present', '2017-05-23', '2017-2018', '1508906720'),
(429, 1, 1, 1, 'Present', '2017-05-24', '2017-2018', '1508906720'),
(430, 1, 1, 2, 'Absent', '2017-05-24', '2017-2018', '1508906720'),
(431, 1, 1, 3, 'Present', '2017-05-24', '2017-2018', '1508906720'),
(432, 1, 1, 1, 'Present', '2017-05-25', '2017-2018', '1508906720'),
(433, 1, 1, 2, 'Absent', '2017-05-25', '2017-2018', '1508906720'),
(434, 1, 1, 3, 'Present', '2017-05-25', '2017-2018', '1508906720'),
(435, 1, 1, 1, 'Present', '2017-05-26', '2017-2018', '1508906720'),
(436, 1, 1, 2, 'Absent', '2017-05-26', '2017-2018', '1508906720'),
(437, 1, 1, 3, 'Present', '2017-05-26', '2017-2018', '1508906720'),
(438, 1, 1, 1, 'Present', '2017-05-27', '2017-2018', '1508906720'),
(439, 1, 1, 2, 'Absent', '2017-05-27', '2017-2018', '1508906720'),
(440, 1, 1, 3, 'Present', '2017-05-27', '2017-2018', '1508906720'),
(441, 1, 1, 1, 'Present', '2017-05-29', '2017-2018', '1508906720'),
(442, 1, 1, 2, 'Absent', '2017-05-29', '2017-2018', '1508906720'),
(443, 1, 1, 3, 'Present', '2017-05-29', '2017-2018', '1508906720'),
(444, 1, 1, 1, 'Present', '2017-05-30', '2017-2018', '1508906720'),
(445, 1, 1, 2, 'Absent', '2017-05-30', '2017-2018', '1508906720'),
(446, 1, 1, 3, 'Present', '2017-05-30', '2017-2018', '1508906720'),
(447, 1, 1, 1, 'Present', '2017-05-31', '2017-2018', '1508906720'),
(448, 1, 1, 2, 'Absent', '2017-05-31', '2017-2018', '1508906720'),
(449, 1, 1, 3, 'Present', '2017-05-31', '2017-2018', '1508906720'),
(450, 1, 1, 1, 'Present', '2017-10-24', '2017-2018', '1508906720'),
(451, 1, 1, 2, 'Absent', '2017-10-24', '2017-2018', '1508906720'),
(452, 1, 1, 3, 'Present', '2017-10-24', '2017-2018', '1508906720'),
(462, 1, 2, 4, 'Present', '2017-10-02', '2017-2018', '1508906732'),
(463, 1, 2, 5, 'Absent', '2017-10-02', '2017-2018', '1508906732'),
(464, 1, 2, 6, 'Present', '2017-10-02', '2017-2018', '1508906732'),
(465, 1, 2, 7, 'Present', '2017-10-02', '2017-2018', '1508906732'),
(466, 1, 2, 4, 'Present', '2017-10-03', '2017-2018', '1508906732'),
(467, 1, 2, 5, 'Absent', '2017-10-03', '2017-2018', '1508906732'),
(468, 1, 2, 6, 'Present', '2017-10-03', '2017-2018', '1508906732'),
(469, 1, 2, 7, 'Present', '2017-10-03', '2017-2018', '1508906732'),
(470, 1, 2, 4, 'Present', '2017-10-04', '2017-2018', '1508906732'),
(471, 1, 2, 5, 'Absent', '2017-10-04', '2017-2018', '1508906732'),
(472, 1, 2, 6, 'Present', '2017-10-04', '2017-2018', '1508906732'),
(473, 1, 2, 7, 'Present', '2017-10-04', '2017-2018', '1508906732'),
(474, 1, 2, 4, 'Present', '2017-10-05', '2017-2018', '1508906732'),
(475, 1, 2, 5, 'Absent', '2017-10-05', '2017-2018', '1508906732'),
(476, 1, 2, 6, 'Present', '2017-10-05', '2017-2018', '1508906732'),
(477, 1, 2, 7, 'Present', '2017-10-05', '2017-2018', '1508906732'),
(478, 1, 2, 4, 'Present', '2017-10-06', '2017-2018', '1508906732'),
(479, 1, 2, 5, 'Absent', '2017-10-06', '2017-2018', '1508906732'),
(480, 1, 2, 6, 'Present', '2017-10-06', '2017-2018', '1508906732'),
(481, 1, 2, 7, 'Present', '2017-10-06', '2017-2018', '1508906732'),
(482, 1, 2, 4, 'Present', '2017-10-07', '2017-2018', '1508906732'),
(483, 1, 2, 5, 'Absent', '2017-10-07', '2017-2018', '1508906732'),
(484, 1, 2, 6, 'Present', '2017-10-07', '2017-2018', '1508906732'),
(485, 1, 2, 7, 'Present', '2017-10-07', '2017-2018', '1508906732'),
(486, 1, 2, 4, 'Present', '2017-10-09', '2017-2018', '1508906732'),
(487, 1, 2, 5, 'Absent', '2017-10-09', '2017-2018', '1508906732'),
(488, 1, 2, 6, 'Present', '2017-10-09', '2017-2018', '1508906732'),
(489, 1, 2, 7, 'Present', '2017-10-09', '2017-2018', '1508906732'),
(490, 1, 2, 4, 'Present', '2017-10-10', '2017-2018', '1508906732'),
(491, 1, 2, 5, 'Absent', '2017-10-10', '2017-2018', '1508906732'),
(492, 1, 2, 6, 'Present', '2017-10-10', '2017-2018', '1508906732'),
(493, 1, 2, 7, 'Present', '2017-10-10', '2017-2018', '1508906732'),
(494, 1, 2, 4, 'Present', '2017-10-11', '2017-2018', '1508906732'),
(495, 1, 2, 5, 'Absent', '2017-10-11', '2017-2018', '1508906732'),
(496, 1, 2, 6, 'Present', '2017-10-11', '2017-2018', '1508906732'),
(497, 1, 2, 7, 'Present', '2017-10-11', '2017-2018', '1508906732'),
(498, 1, 2, 4, 'Present', '2017-10-12', '2017-2018', '1508906732'),
(499, 1, 2, 5, 'Absent', '2017-10-12', '2017-2018', '1508906732'),
(500, 1, 2, 6, 'Present', '2017-10-12', '2017-2018', '1508906732'),
(501, 1, 2, 7, 'Present', '2017-10-12', '2017-2018', '1508906732'),
(502, 1, 2, 4, 'Present', '2017-10-13', '2017-2018', '1508906732'),
(503, 1, 2, 5, 'Absent', '2017-10-13', '2017-2018', '1508906732'),
(504, 1, 2, 6, 'Present', '2017-10-13', '2017-2018', '1508906732'),
(505, 1, 2, 7, 'Present', '2017-10-13', '2017-2018', '1508906732'),
(506, 1, 2, 4, 'Present', '2017-10-14', '2017-2018', '1508906732'),
(507, 1, 2, 5, 'Absent', '2017-10-14', '2017-2018', '1508906732'),
(508, 1, 2, 6, 'Present', '2017-10-14', '2017-2018', '1508906732'),
(509, 1, 2, 7, 'Present', '2017-10-14', '2017-2018', '1508906732'),
(510, 1, 2, 4, 'Present', '2017-10-16', '2017-2018', '1508906732'),
(511, 1, 2, 5, 'Absent', '2017-10-16', '2017-2018', '1508906732'),
(512, 1, 2, 6, 'Present', '2017-10-16', '2017-2018', '1508906732'),
(513, 1, 2, 7, 'Present', '2017-10-16', '2017-2018', '1508906732'),
(514, 1, 2, 4, 'Present', '2017-10-17', '2017-2018', '1508906732'),
(515, 1, 2, 5, 'Absent', '2017-10-17', '2017-2018', '1508906732'),
(516, 1, 2, 6, 'Present', '2017-10-17', '2017-2018', '1508906732'),
(517, 1, 2, 7, 'Present', '2017-10-17', '2017-2018', '1508906732'),
(518, 1, 2, 4, 'Present', '2017-10-18', '2017-2018', '1508906732'),
(519, 1, 2, 5, 'Absent', '2017-10-18', '2017-2018', '1508906732'),
(520, 1, 2, 6, 'Present', '2017-10-18', '2017-2018', '1508906732'),
(521, 1, 2, 7, 'Present', '2017-10-18', '2017-2018', '1508906732'),
(522, 1, 2, 4, 'Present', '2017-10-19', '2017-2018', '1508906732'),
(523, 1, 2, 5, 'Absent', '2017-10-19', '2017-2018', '1508906732'),
(524, 1, 2, 6, 'Present', '2017-10-19', '2017-2018', '1508906732'),
(525, 1, 2, 7, 'Present', '2017-10-19', '2017-2018', '1508906732'),
(526, 1, 2, 4, 'Present', '2017-10-20', '2017-2018', '1508906732'),
(527, 1, 2, 5, 'Absent', '2017-10-20', '2017-2018', '1508906732'),
(528, 1, 2, 6, 'Present', '2017-10-20', '2017-2018', '1508906732'),
(529, 1, 2, 7, 'Present', '2017-10-20', '2017-2018', '1508906732'),
(530, 1, 2, 4, 'Present', '2017-10-21', '2017-2018', '1508906732'),
(531, 1, 2, 5, 'Absent', '2017-10-21', '2017-2018', '1508906732'),
(532, 1, 2, 6, 'Present', '2017-10-21', '2017-2018', '1508906732'),
(533, 1, 2, 7, 'Present', '2017-10-21', '2017-2018', '1508906732'),
(534, 1, 2, 4, 'Present', '2017-10-23', '2017-2018', '1508906732'),
(535, 1, 2, 5, 'Absent', '2017-10-23', '2017-2018', '1508906732'),
(536, 1, 2, 6, 'Present', '2017-10-23', '2017-2018', '1508906732'),
(537, 1, 2, 7, 'Present', '2017-10-23', '2017-2018', '1508906732'),
(538, 1, 2, 4, 'Present', '2017-10-24', '2017-2018', '1508906732'),
(539, 1, 2, 5, 'Absent', '2017-10-24', '2017-2018', '1508906732'),
(540, 1, 2, 6, 'Present', '2017-10-24', '2017-2018', '1508906732'),
(541, 1, 2, 7, 'Present', '2017-10-24', '2017-2018', '1508906732'),
(542, 1, 2, 4, 'Present', '2017-09-01', '2017-2018', '1508906732'),
(543, 1, 2, 5, 'Absent', '2017-09-01', '2017-2018', '1508906732'),
(544, 1, 2, 6, 'Present', '2017-09-01', '2017-2018', '1508906732'),
(545, 1, 2, 7, 'Present', '2017-09-01', '2017-2018', '1508906732'),
(546, 1, 2, 4, 'Present', '2017-09-02', '2017-2018', '1508906732'),
(547, 1, 2, 5, 'Absent', '2017-09-02', '2017-2018', '1508906732'),
(548, 1, 2, 6, 'Present', '2017-09-02', '2017-2018', '1508906732'),
(549, 1, 2, 7, 'Present', '2017-09-02', '2017-2018', '1508906732'),
(550, 1, 2, 4, 'Present', '2017-09-04', '2017-2018', '1508906732'),
(551, 1, 2, 5, 'Absent', '2017-09-04', '2017-2018', '1508906732'),
(552, 1, 2, 6, 'Present', '2017-09-04', '2017-2018', '1508906732'),
(553, 1, 2, 7, 'Present', '2017-09-04', '2017-2018', '1508906732'),
(554, 1, 2, 4, 'Present', '2017-09-05', '2017-2018', '1508906732'),
(555, 1, 2, 5, 'Absent', '2017-09-05', '2017-2018', '1508906732'),
(556, 1, 2, 6, 'Present', '2017-09-05', '2017-2018', '1508906732'),
(557, 1, 2, 7, 'Present', '2017-09-05', '2017-2018', '1508906732'),
(558, 1, 2, 4, 'Present', '2017-09-06', '2017-2018', '1508906732'),
(559, 1, 2, 5, 'Absent', '2017-09-06', '2017-2018', '1508906732'),
(560, 1, 2, 6, 'Present', '2017-09-06', '2017-2018', '1508906732'),
(561, 1, 2, 7, 'Present', '2017-09-06', '2017-2018', '1508906732'),
(562, 1, 2, 4, 'Present', '2017-09-07', '2017-2018', '1508906732'),
(563, 1, 2, 5, 'Absent', '2017-09-07', '2017-2018', '1508906732'),
(564, 1, 2, 6, 'Present', '2017-09-07', '2017-2018', '1508906732'),
(565, 1, 2, 7, 'Present', '2017-09-07', '2017-2018', '1508906732'),
(566, 1, 2, 4, 'Present', '2017-09-08', '2017-2018', '1508906732'),
(567, 1, 2, 5, 'Absent', '2017-09-08', '2017-2018', '1508906732'),
(568, 1, 2, 6, 'Present', '2017-09-08', '2017-2018', '1508906732'),
(569, 1, 2, 7, 'Present', '2017-09-08', '2017-2018', '1508906732'),
(570, 1, 2, 4, 'Present', '2017-09-09', '2017-2018', '1508906732'),
(571, 1, 2, 5, 'Absent', '2017-09-09', '2017-2018', '1508906732'),
(572, 1, 2, 6, 'Present', '2017-09-09', '2017-2018', '1508906732'),
(573, 1, 2, 7, 'Present', '2017-09-09', '2017-2018', '1508906732'),
(574, 1, 2, 4, 'Present', '2017-09-11', '2017-2018', '1508906732'),
(575, 1, 2, 5, 'Absent', '2017-09-11', '2017-2018', '1508906732'),
(576, 1, 2, 6, 'Present', '2017-09-11', '2017-2018', '1508906732'),
(577, 1, 2, 7, 'Present', '2017-09-11', '2017-2018', '1508906732'),
(578, 1, 2, 4, 'Present', '2017-09-12', '2017-2018', '1508906732'),
(579, 1, 2, 5, 'Absent', '2017-09-12', '2017-2018', '1508906732'),
(580, 1, 2, 6, 'Present', '2017-09-12', '2017-2018', '1508906732'),
(581, 1, 2, 7, 'Present', '2017-09-12', '2017-2018', '1508906732'),
(582, 1, 2, 4, 'Present', '2017-09-13', '2017-2018', '1508906732'),
(583, 1, 2, 5, 'Absent', '2017-09-13', '2017-2018', '1508906732'),
(584, 1, 2, 6, 'Present', '2017-09-13', '2017-2018', '1508906732'),
(585, 1, 2, 7, 'Present', '2017-09-13', '2017-2018', '1508906732'),
(586, 1, 2, 4, 'Present', '2017-09-14', '2017-2018', '1508906732'),
(587, 1, 2, 5, 'Absent', '2017-09-14', '2017-2018', '1508906732'),
(588, 1, 2, 6, 'Present', '2017-09-14', '2017-2018', '1508906732'),
(589, 1, 2, 7, 'Present', '2017-09-14', '2017-2018', '1508906732'),
(590, 1, 2, 4, 'Present', '2017-09-15', '2017-2018', '1508906732'),
(591, 1, 2, 5, 'Absent', '2017-09-15', '2017-2018', '1508906732'),
(592, 1, 2, 6, 'Present', '2017-09-15', '2017-2018', '1508906732'),
(593, 1, 2, 7, 'Present', '2017-09-15', '2017-2018', '1508906732'),
(594, 1, 2, 4, 'Present', '2017-09-16', '2017-2018', '1508906732'),
(595, 1, 2, 5, 'Absent', '2017-09-16', '2017-2018', '1508906732'),
(596, 1, 2, 6, 'Present', '2017-09-16', '2017-2018', '1508906732'),
(597, 1, 2, 7, 'Present', '2017-09-16', '2017-2018', '1508906732'),
(598, 1, 2, 4, 'Present', '2017-09-18', '2017-2018', '1508906732'),
(599, 1, 2, 5, 'Absent', '2017-09-18', '2017-2018', '1508906732'),
(600, 1, 2, 6, 'Present', '2017-09-18', '2017-2018', '1508906732'),
(601, 1, 2, 7, 'Present', '2017-09-18', '2017-2018', '1508906732'),
(602, 1, 2, 4, 'Present', '2017-09-19', '2017-2018', '1508906732'),
(603, 1, 2, 5, 'Absent', '2017-09-19', '2017-2018', '1508906732'),
(604, 1, 2, 6, 'Present', '2017-09-19', '2017-2018', '1508906732'),
(605, 1, 2, 7, 'Present', '2017-09-19', '2017-2018', '1508906732'),
(606, 1, 2, 4, 'Present', '2017-09-20', '2017-2018', '1508906732'),
(607, 1, 2, 5, 'Absent', '2017-09-20', '2017-2018', '1508906732'),
(608, 1, 2, 6, 'Present', '2017-09-20', '2017-2018', '1508906732'),
(609, 1, 2, 7, 'Present', '2017-09-20', '2017-2018', '1508906732'),
(610, 1, 2, 4, 'Present', '2017-09-21', '2017-2018', '1508906732'),
(611, 1, 2, 5, 'Absent', '2017-09-21', '2017-2018', '1508906732'),
(612, 1, 2, 6, 'Present', '2017-09-21', '2017-2018', '1508906732'),
(613, 1, 2, 7, 'Present', '2017-09-21', '2017-2018', '1508906732'),
(614, 1, 2, 4, 'Present', '2017-09-22', '2017-2018', '1508906732'),
(615, 1, 2, 5, 'Absent', '2017-09-22', '2017-2018', '1508906732'),
(616, 1, 2, 6, 'Present', '2017-09-22', '2017-2018', '1508906732'),
(617, 1, 2, 7, 'Present', '2017-09-22', '2017-2018', '1508906732'),
(618, 1, 2, 4, 'Present', '2017-09-23', '2017-2018', '1508906732'),
(619, 1, 2, 5, 'Absent', '2017-09-23', '2017-2018', '1508906732'),
(620, 1, 2, 6, 'Present', '2017-09-23', '2017-2018', '1508906732'),
(621, 1, 2, 7, 'Present', '2017-09-23', '2017-2018', '1508906732'),
(622, 1, 2, 4, 'Present', '2017-09-25', '2017-2018', '1508906732'),
(623, 1, 2, 5, 'Absent', '2017-09-25', '2017-2018', '1508906732'),
(624, 1, 2, 6, 'Present', '2017-09-25', '2017-2018', '1508906732'),
(625, 1, 2, 7, 'Present', '2017-09-25', '2017-2018', '1508906732'),
(626, 1, 2, 4, 'Present', '2017-09-26', '2017-2018', '1508906732'),
(627, 1, 2, 5, 'Absent', '2017-09-26', '2017-2018', '1508906732'),
(628, 1, 2, 6, 'Present', '2017-09-26', '2017-2018', '1508906732'),
(629, 1, 2, 7, 'Present', '2017-09-26', '2017-2018', '1508906732'),
(630, 1, 2, 4, 'Present', '2017-09-27', '2017-2018', '1508906732'),
(631, 1, 2, 5, 'Absent', '2017-09-27', '2017-2018', '1508906732'),
(632, 1, 2, 6, 'Present', '2017-09-27', '2017-2018', '1508906732'),
(633, 1, 2, 7, 'Present', '2017-09-27', '2017-2018', '1508906732'),
(634, 1, 2, 4, 'Present', '2017-09-28', '2017-2018', '1508906732'),
(635, 1, 2, 5, 'Absent', '2017-09-28', '2017-2018', '1508906732'),
(636, 1, 2, 6, 'Present', '2017-09-28', '2017-2018', '1508906732'),
(637, 1, 2, 7, 'Present', '2017-09-28', '2017-2018', '1508906732'),
(638, 1, 2, 4, 'Present', '2017-09-29', '2017-2018', '1508906732'),
(639, 1, 2, 5, 'Absent', '2017-09-29', '2017-2018', '1508906732'),
(640, 1, 2, 6, 'Present', '2017-09-29', '2017-2018', '1508906732'),
(641, 1, 2, 7, 'Present', '2017-09-29', '2017-2018', '1508906732'),
(642, 1, 2, 4, 'Present', '2017-09-30', '2017-2018', '1508906732'),
(643, 1, 2, 5, 'Absent', '2017-09-30', '2017-2018', '1508906732'),
(644, 1, 2, 6, 'Present', '2017-09-30', '2017-2018', '1508906732'),
(645, 1, 2, 7, 'Present', '2017-09-30', '2017-2018', '1508906732'),
(646, 1, 2, 4, 'Present', '2017-08-07', '2017-2018', '1508906732'),
(647, 1, 2, 5, 'Absent', '2017-08-07', '2017-2018', '1508906732'),
(648, 1, 2, 6, 'Present', '2017-08-07', '2017-2018', '1508906732'),
(649, 1, 2, 7, 'Present', '2017-08-07', '2017-2018', '1508906732'),
(650, 1, 2, 4, 'Present', '2017-08-08', '2017-2018', '1508906732'),
(651, 1, 2, 5, 'Absent', '2017-08-08', '2017-2018', '1508906732'),
(652, 1, 2, 6, 'Present', '2017-08-08', '2017-2018', '1508906732'),
(653, 1, 2, 7, 'Present', '2017-08-08', '2017-2018', '1508906732'),
(654, 1, 2, 4, 'Present', '2017-08-09', '2017-2018', '1508906732'),
(655, 1, 2, 5, 'Absent', '2017-08-09', '2017-2018', '1508906732'),
(656, 1, 2, 6, 'Present', '2017-08-09', '2017-2018', '1508906732'),
(657, 1, 2, 7, 'Present', '2017-08-09', '2017-2018', '1508906732'),
(658, 1, 2, 4, 'Present', '2017-08-10', '2017-2018', '1508906732'),
(659, 1, 2, 5, 'Absent', '2017-08-10', '2017-2018', '1508906732'),
(660, 1, 2, 6, 'Present', '2017-08-10', '2017-2018', '1508906732'),
(661, 1, 2, 7, 'Present', '2017-08-10', '2017-2018', '1508906732'),
(662, 1, 2, 4, 'Present', '2017-08-11', '2017-2018', '1508906732'),
(663, 1, 2, 5, 'Absent', '2017-08-11', '2017-2018', '1508906732'),
(664, 1, 2, 6, 'Present', '2017-08-11', '2017-2018', '1508906732'),
(665, 1, 2, 7, 'Present', '2017-08-11', '2017-2018', '1508906732'),
(666, 1, 2, 4, 'Present', '2017-08-12', '2017-2018', '1508906732'),
(667, 1, 2, 5, 'Absent', '2017-08-12', '2017-2018', '1508906732'),
(668, 1, 2, 6, 'Present', '2017-08-12', '2017-2018', '1508906732'),
(669, 1, 2, 7, 'Present', '2017-08-12', '2017-2018', '1508906732'),
(670, 1, 2, 4, 'Present', '2017-08-14', '2017-2018', '1508906732'),
(671, 1, 2, 5, 'Absent', '2017-08-14', '2017-2018', '1508906732'),
(672, 1, 2, 6, 'Present', '2017-08-14', '2017-2018', '1508906732'),
(673, 1, 2, 7, 'Present', '2017-08-14', '2017-2018', '1508906732'),
(674, 1, 2, 4, 'Present', '2017-08-15', '2017-2018', '1508906732'),
(675, 1, 2, 5, 'Absent', '2017-08-15', '2017-2018', '1508906732'),
(676, 1, 2, 6, 'Present', '2017-08-15', '2017-2018', '1508906732'),
(677, 1, 2, 7, 'Present', '2017-08-15', '2017-2018', '1508906732'),
(678, 1, 2, 4, 'Present', '2017-08-16', '2017-2018', '1508906732'),
(679, 1, 2, 5, 'Absent', '2017-08-16', '2017-2018', '1508906732'),
(680, 1, 2, 6, 'Present', '2017-08-16', '2017-2018', '1508906732'),
(681, 1, 2, 7, 'Present', '2017-08-16', '2017-2018', '1508906732'),
(682, 1, 2, 4, 'Present', '2017-08-17', '2017-2018', '1508906732'),
(683, 1, 2, 5, 'Absent', '2017-08-17', '2017-2018', '1508906732'),
(684, 1, 2, 6, 'Present', '2017-08-17', '2017-2018', '1508906732'),
(685, 1, 2, 7, 'Present', '2017-08-17', '2017-2018', '1508906732'),
(686, 1, 2, 4, 'Present', '2017-08-18', '2017-2018', '1508906732'),
(687, 1, 2, 5, 'Absent', '2017-08-18', '2017-2018', '1508906732'),
(688, 1, 2, 6, 'Present', '2017-08-18', '2017-2018', '1508906732'),
(689, 1, 2, 7, 'Present', '2017-08-18', '2017-2018', '1508906732'),
(690, 1, 2, 4, 'Present', '2017-08-19', '2017-2018', '1508906732'),
(691, 1, 2, 5, 'Absent', '2017-08-19', '2017-2018', '1508906732'),
(692, 1, 2, 6, 'Present', '2017-08-19', '2017-2018', '1508906732'),
(693, 1, 2, 7, 'Present', '2017-08-19', '2017-2018', '1508906732'),
(694, 1, 2, 4, 'Present', '2017-08-21', '2017-2018', '1508906732'),
(695, 1, 2, 5, 'Absent', '2017-08-21', '2017-2018', '1508906732'),
(696, 1, 2, 6, 'Present', '2017-08-21', '2017-2018', '1508906732'),
(697, 1, 2, 7, 'Present', '2017-08-21', '2017-2018', '1508906732'),
(698, 1, 2, 4, 'Present', '2017-08-22', '2017-2018', '1508906732'),
(699, 1, 2, 5, 'Absent', '2017-08-22', '2017-2018', '1508906732'),
(700, 1, 2, 6, 'Present', '2017-08-22', '2017-2018', '1508906732'),
(701, 1, 2, 7, 'Present', '2017-08-22', '2017-2018', '1508906732'),
(702, 1, 2, 4, 'Present', '2017-08-23', '2017-2018', '1508906732'),
(703, 1, 2, 5, 'Absent', '2017-08-23', '2017-2018', '1508906732'),
(704, 1, 2, 6, 'Present', '2017-08-23', '2017-2018', '1508906732'),
(705, 1, 2, 7, 'Present', '2017-08-23', '2017-2018', '1508906732'),
(706, 1, 2, 4, 'Present', '2017-08-24', '2017-2018', '1508906732'),
(707, 1, 2, 5, 'Absent', '2017-08-24', '2017-2018', '1508906732'),
(708, 1, 2, 6, 'Present', '2017-08-24', '2017-2018', '1508906732'),
(709, 1, 2, 7, 'Present', '2017-08-24', '2017-2018', '1508906732'),
(710, 1, 2, 4, 'Present', '2017-08-25', '2017-2018', '1508906732'),
(711, 1, 2, 5, 'Absent', '2017-08-25', '2017-2018', '1508906732'),
(712, 1, 2, 6, 'Present', '2017-08-25', '2017-2018', '1508906732'),
(713, 1, 2, 7, 'Present', '2017-08-25', '2017-2018', '1508906732'),
(714, 1, 2, 4, 'Present', '2017-08-26', '2017-2018', '1508906732'),
(715, 1, 2, 5, 'Absent', '2017-08-26', '2017-2018', '1508906732'),
(716, 1, 2, 6, 'Present', '2017-08-26', '2017-2018', '1508906732'),
(717, 1, 2, 7, 'Present', '2017-08-26', '2017-2018', '1508906732'),
(718, 1, 2, 4, 'Present', '2017-08-28', '2017-2018', '1508906732'),
(719, 1, 2, 5, 'Absent', '2017-08-28', '2017-2018', '1508906732'),
(720, 1, 2, 6, 'Present', '2017-08-28', '2017-2018', '1508906732'),
(721, 1, 2, 7, 'Present', '2017-08-28', '2017-2018', '1508906732'),
(722, 1, 2, 4, 'Present', '2017-08-29', '2017-2018', '1508906732'),
(723, 1, 2, 5, 'Absent', '2017-08-29', '2017-2018', '1508906732'),
(724, 1, 2, 6, 'Present', '2017-08-29', '2017-2018', '1508906732'),
(725, 1, 2, 7, 'Present', '2017-08-29', '2017-2018', '1508906732'),
(726, 1, 2, 4, 'Present', '2017-08-30', '2017-2018', '1508906732'),
(727, 1, 2, 5, 'Absent', '2017-08-30', '2017-2018', '1508906732'),
(728, 1, 2, 6, 'Present', '2017-08-30', '2017-2018', '1508906732'),
(729, 1, 2, 7, 'Present', '2017-08-30', '2017-2018', '1508906732'),
(730, 1, 2, 4, 'Present', '2017-08-31', '2017-2018', '1508906732'),
(731, 1, 2, 5, 'Absent', '2017-08-31', '2017-2018', '1508906732'),
(732, 1, 2, 6, 'Present', '2017-08-31', '2017-2018', '1508906732'),
(733, 1, 2, 7, 'Present', '2017-08-31', '2017-2018', '1508906732'),
(734, 1, 2, 4, 'Present', '2017-07-01', '2017-2018', '1508906732'),
(735, 1, 2, 5, 'Absent', '2017-07-01', '2017-2018', '1508906732'),
(736, 1, 2, 6, 'Present', '2017-07-01', '2017-2018', '1508906732'),
(737, 1, 2, 7, 'Present', '2017-07-01', '2017-2018', '1508906732'),
(738, 1, 2, 4, 'Present', '2017-07-03', '2017-2018', '1508906732'),
(739, 1, 2, 5, 'Absent', '2017-07-03', '2017-2018', '1508906732'),
(740, 1, 2, 6, 'Present', '2017-07-03', '2017-2018', '1508906732'),
(741, 1, 2, 7, 'Present', '2017-07-03', '2017-2018', '1508906732'),
(742, 1, 2, 4, 'Present', '2017-07-04', '2017-2018', '1508906732'),
(743, 1, 2, 5, 'Absent', '2017-07-04', '2017-2018', '1508906732'),
(744, 1, 2, 6, 'Present', '2017-07-04', '2017-2018', '1508906732'),
(745, 1, 2, 7, 'Present', '2017-07-04', '2017-2018', '1508906732'),
(746, 1, 2, 4, 'Present', '2017-07-05', '2017-2018', '1508906732'),
(747, 1, 2, 5, 'Absent', '2017-07-05', '2017-2018', '1508906732'),
(748, 1, 2, 6, 'Present', '2017-07-05', '2017-2018', '1508906732'),
(749, 1, 2, 7, 'Present', '2017-07-05', '2017-2018', '1508906732'),
(750, 1, 2, 4, 'Present', '2017-07-06', '2017-2018', '1508906732'),
(751, 1, 2, 5, 'Absent', '2017-07-06', '2017-2018', '1508906732'),
(752, 1, 2, 6, 'Present', '2017-07-06', '2017-2018', '1508906732'),
(753, 1, 2, 7, 'Present', '2017-07-06', '2017-2018', '1508906732'),
(754, 1, 2, 4, 'Present', '2017-07-07', '2017-2018', '1508906732'),
(755, 1, 2, 5, 'Absent', '2017-07-07', '2017-2018', '1508906732'),
(756, 1, 2, 6, 'Present', '2017-07-07', '2017-2018', '1508906732'),
(757, 1, 2, 7, 'Present', '2017-07-07', '2017-2018', '1508906732'),
(758, 1, 2, 4, 'Present', '2017-07-08', '2017-2018', '1508906732'),
(759, 1, 2, 5, 'Absent', '2017-07-08', '2017-2018', '1508906732'),
(760, 1, 2, 6, 'Present', '2017-07-08', '2017-2018', '1508906732'),
(761, 1, 2, 7, 'Present', '2017-07-08', '2017-2018', '1508906732'),
(762, 1, 2, 4, 'Present', '2017-07-10', '2017-2018', '1508906732'),
(763, 1, 2, 5, 'Absent', '2017-07-10', '2017-2018', '1508906732'),
(764, 1, 2, 6, 'Present', '2017-07-10', '2017-2018', '1508906732'),
(765, 1, 2, 7, 'Present', '2017-07-10', '2017-2018', '1508906732'),
(766, 1, 2, 4, 'Present', '2017-07-11', '2017-2018', '1508906732'),
(767, 1, 2, 5, 'Absent', '2017-07-11', '2017-2018', '1508906732'),
(768, 1, 2, 6, 'Present', '2017-07-11', '2017-2018', '1508906732'),
(769, 1, 2, 7, 'Present', '2017-07-11', '2017-2018', '1508906732');
INSERT INTO `studentattendance` (`AttendanceId`, `ClassId`, `SectionId`, `StudentId`, `PresentAbsent`, `AttendanceOn`, `AcademicYear`, `LastUpdated`) VALUES
(770, 1, 2, 4, 'Present', '2017-07-12', '2017-2018', '1508906732'),
(771, 1, 2, 5, 'Absent', '2017-07-12', '2017-2018', '1508906732'),
(772, 1, 2, 6, 'Present', '2017-07-12', '2017-2018', '1508906732'),
(773, 1, 2, 7, 'Present', '2017-07-12', '2017-2018', '1508906732'),
(774, 1, 2, 4, 'Present', '2017-07-13', '2017-2018', '1508906732'),
(775, 1, 2, 5, 'Absent', '2017-07-13', '2017-2018', '1508906732'),
(776, 1, 2, 6, 'Present', '2017-07-13', '2017-2018', '1508906732'),
(777, 1, 2, 7, 'Present', '2017-07-13', '2017-2018', '1508906732'),
(778, 1, 2, 4, 'Present', '2017-07-14', '2017-2018', '1508906732'),
(779, 1, 2, 5, 'Absent', '2017-07-14', '2017-2018', '1508906732'),
(780, 1, 2, 6, 'Present', '2017-07-14', '2017-2018', '1508906732'),
(781, 1, 2, 7, 'Present', '2017-07-14', '2017-2018', '1508906732'),
(782, 1, 2, 4, 'Present', '2017-07-15', '2017-2018', '1508906732'),
(783, 1, 2, 5, 'Absent', '2017-07-15', '2017-2018', '1508906732'),
(784, 1, 2, 6, 'Present', '2017-07-15', '2017-2018', '1508906732'),
(785, 1, 2, 7, 'Present', '2017-07-15', '2017-2018', '1508906732'),
(786, 1, 2, 4, 'Present', '2017-07-17', '2017-2018', '1508906732'),
(787, 1, 2, 5, 'Absent', '2017-07-17', '2017-2018', '1508906732'),
(788, 1, 2, 6, 'Present', '2017-07-17', '2017-2018', '1508906732'),
(789, 1, 2, 7, 'Present', '2017-07-17', '2017-2018', '1508906732'),
(790, 1, 2, 4, 'Present', '2017-07-18', '2017-2018', '1508906732'),
(791, 1, 2, 5, 'Absent', '2017-07-18', '2017-2018', '1508906732'),
(792, 1, 2, 6, 'Present', '2017-07-18', '2017-2018', '1508906732'),
(793, 1, 2, 7, 'Present', '2017-07-18', '2017-2018', '1508906732'),
(794, 1, 2, 4, 'Present', '2017-07-19', '2017-2018', '1508906732'),
(795, 1, 2, 5, 'Absent', '2017-07-19', '2017-2018', '1508906732'),
(796, 1, 2, 6, 'Present', '2017-07-19', '2017-2018', '1508906732'),
(797, 1, 2, 7, 'Present', '2017-07-19', '2017-2018', '1508906732'),
(798, 1, 2, 4, 'Present', '2017-07-20', '2017-2018', '1508906732'),
(799, 1, 2, 5, 'Absent', '2017-07-20', '2017-2018', '1508906732'),
(800, 1, 2, 6, 'Present', '2017-07-20', '2017-2018', '1508906732'),
(801, 1, 2, 7, 'Present', '2017-07-20', '2017-2018', '1508906732'),
(802, 1, 2, 4, 'Present', '2017-07-21', '2017-2018', '1508906732'),
(803, 1, 2, 5, 'Absent', '2017-07-21', '2017-2018', '1508906732'),
(804, 1, 2, 6, 'Present', '2017-07-21', '2017-2018', '1508906732'),
(805, 1, 2, 7, 'Present', '2017-07-21', '2017-2018', '1508906732'),
(806, 1, 2, 4, 'Present', '2017-07-22', '2017-2018', '1508906732'),
(807, 1, 2, 5, 'Absent', '2017-07-22', '2017-2018', '1508906732'),
(808, 1, 2, 6, 'Present', '2017-07-22', '2017-2018', '1508906732'),
(809, 1, 2, 7, 'Present', '2017-07-22', '2017-2018', '1508906732'),
(810, 1, 2, 4, 'Present', '2017-07-24', '2017-2018', '1508906732'),
(811, 1, 2, 5, 'Absent', '2017-07-24', '2017-2018', '1508906732'),
(812, 1, 2, 6, 'Present', '2017-07-24', '2017-2018', '1508906732'),
(813, 1, 2, 7, 'Present', '2017-07-24', '2017-2018', '1508906732'),
(814, 1, 2, 4, 'Present', '2017-07-25', '2017-2018', '1508906732'),
(815, 1, 2, 5, 'Absent', '2017-07-25', '2017-2018', '1508906732'),
(816, 1, 2, 6, 'Present', '2017-07-25', '2017-2018', '1508906732'),
(817, 1, 2, 7, 'Present', '2017-07-25', '2017-2018', '1508906732'),
(818, 1, 2, 4, 'Present', '2017-07-26', '2017-2018', '1508906732'),
(819, 1, 2, 5, 'Absent', '2017-07-26', '2017-2018', '1508906732'),
(820, 1, 2, 6, 'Present', '2017-07-26', '2017-2018', '1508906732'),
(821, 1, 2, 7, 'Present', '2017-07-26', '2017-2018', '1508906732'),
(822, 1, 2, 4, 'Present', '2017-07-27', '2017-2018', '1508906732'),
(823, 1, 2, 5, 'Absent', '2017-07-27', '2017-2018', '1508906732'),
(824, 1, 2, 6, 'Present', '2017-07-27', '2017-2018', '1508906732'),
(825, 1, 2, 7, 'Present', '2017-07-27', '2017-2018', '1508906732'),
(826, 1, 2, 4, 'Present', '2017-07-28', '2017-2018', '1508906732'),
(827, 1, 2, 5, 'Absent', '2017-07-28', '2017-2018', '1508906732'),
(828, 1, 2, 6, 'Present', '2017-07-28', '2017-2018', '1508906732'),
(829, 1, 2, 7, 'Present', '2017-07-28', '2017-2018', '1508906732'),
(830, 1, 2, 4, 'Present', '2017-07-29', '2017-2018', '1508906732'),
(831, 1, 2, 5, 'Absent', '2017-07-29', '2017-2018', '1508906732'),
(832, 1, 2, 6, 'Present', '2017-07-29', '2017-2018', '1508906732'),
(833, 1, 2, 7, 'Present', '2017-07-29', '2017-2018', '1508906732'),
(834, 1, 2, 4, 'Present', '2017-07-31', '2017-2018', '1508906732'),
(835, 1, 2, 5, 'Absent', '2017-07-31', '2017-2018', '1508906732'),
(836, 1, 2, 6, 'Present', '2017-07-31', '2017-2018', '1508906732'),
(837, 1, 2, 7, 'Present', '2017-07-31', '2017-2018', '1508906732'),
(838, 1, 2, 4, 'Present', '2017-06-01', '2017-2018', '1508906732'),
(839, 1, 2, 5, 'Absent', '2017-06-01', '2017-2018', '1508906732'),
(840, 1, 2, 6, 'Present', '2017-06-01', '2017-2018', '1508906732'),
(841, 1, 2, 7, 'Present', '2017-06-01', '2017-2018', '1508906732'),
(842, 1, 2, 4, 'Present', '2017-06-02', '2017-2018', '1508906732'),
(843, 1, 2, 5, 'Absent', '2017-06-02', '2017-2018', '1508906732'),
(844, 1, 2, 6, 'Present', '2017-06-02', '2017-2018', '1508906732'),
(845, 1, 2, 7, 'Present', '2017-06-02', '2017-2018', '1508906732'),
(846, 1, 2, 4, 'Present', '2017-06-03', '2017-2018', '1508906732'),
(847, 1, 2, 5, 'Absent', '2017-06-03', '2017-2018', '1508906732'),
(848, 1, 2, 6, 'Present', '2017-06-03', '2017-2018', '1508906732'),
(849, 1, 2, 7, 'Present', '2017-06-03', '2017-2018', '1508906732'),
(850, 1, 2, 4, 'Present', '2017-06-05', '2017-2018', '1508906732'),
(851, 1, 2, 5, 'Absent', '2017-06-05', '2017-2018', '1508906732'),
(852, 1, 2, 6, 'Present', '2017-06-05', '2017-2018', '1508906732'),
(853, 1, 2, 7, 'Present', '2017-06-05', '2017-2018', '1508906732'),
(854, 1, 2, 4, 'Present', '2017-06-06', '2017-2018', '1508906732'),
(855, 1, 2, 5, 'Absent', '2017-06-06', '2017-2018', '1508906732'),
(856, 1, 2, 6, 'Present', '2017-06-06', '2017-2018', '1508906732'),
(857, 1, 2, 7, 'Present', '2017-06-06', '2017-2018', '1508906732'),
(858, 1, 2, 4, 'Present', '2017-06-07', '2017-2018', '1508906732'),
(859, 1, 2, 5, 'Absent', '2017-06-07', '2017-2018', '1508906732'),
(860, 1, 2, 6, 'Present', '2017-06-07', '2017-2018', '1508906732'),
(861, 1, 2, 7, 'Present', '2017-06-07', '2017-2018', '1508906732'),
(862, 1, 2, 4, 'Present', '2017-06-08', '2017-2018', '1508906732'),
(863, 1, 2, 5, 'Absent', '2017-06-08', '2017-2018', '1508906732'),
(864, 1, 2, 6, 'Present', '2017-06-08', '2017-2018', '1508906732'),
(865, 1, 2, 7, 'Present', '2017-06-08', '2017-2018', '1508906732'),
(866, 1, 2, 4, 'Present', '2017-06-09', '2017-2018', '1508906732'),
(867, 1, 2, 5, 'Absent', '2017-06-09', '2017-2018', '1508906732'),
(868, 1, 2, 6, 'Present', '2017-06-09', '2017-2018', '1508906732'),
(869, 1, 2, 7, 'Present', '2017-06-09', '2017-2018', '1508906732'),
(870, 1, 2, 4, 'Present', '2017-06-10', '2017-2018', '1508906732'),
(871, 1, 2, 5, 'Absent', '2017-06-10', '2017-2018', '1508906732'),
(872, 1, 2, 6, 'Present', '2017-06-10', '2017-2018', '1508906732'),
(873, 1, 2, 7, 'Present', '2017-06-10', '2017-2018', '1508906732'),
(874, 1, 2, 4, 'Present', '2017-06-12', '2017-2018', '1508906732'),
(875, 1, 2, 5, 'Absent', '2017-06-12', '2017-2018', '1508906732'),
(876, 1, 2, 6, 'Present', '2017-06-12', '2017-2018', '1508906732'),
(877, 1, 2, 7, 'Present', '2017-06-12', '2017-2018', '1508906732'),
(878, 1, 2, 4, 'Present', '2017-06-13', '2017-2018', '1508906732'),
(879, 1, 2, 5, 'Absent', '2017-06-13', '2017-2018', '1508906732'),
(880, 1, 2, 6, 'Present', '2017-06-13', '2017-2018', '1508906732'),
(881, 1, 2, 7, 'Present', '2017-06-13', '2017-2018', '1508906732'),
(882, 1, 2, 4, 'Present', '2017-06-14', '2017-2018', '1508906732'),
(883, 1, 2, 5, 'Absent', '2017-06-14', '2017-2018', '1508906732'),
(884, 1, 2, 6, 'Present', '2017-06-14', '2017-2018', '1508906732'),
(885, 1, 2, 7, 'Present', '2017-06-14', '2017-2018', '1508906732'),
(886, 1, 2, 4, 'Present', '2017-06-15', '2017-2018', '1508906732'),
(887, 1, 2, 5, 'Absent', '2017-06-15', '2017-2018', '1508906732'),
(888, 1, 2, 6, 'Present', '2017-06-15', '2017-2018', '1508906732'),
(889, 1, 2, 7, 'Present', '2017-06-15', '2017-2018', '1508906732'),
(890, 1, 2, 4, 'Present', '2017-06-16', '2017-2018', '1508906732'),
(891, 1, 2, 5, 'Absent', '2017-06-16', '2017-2018', '1508906732'),
(892, 1, 2, 6, 'Present', '2017-06-16', '2017-2018', '1508906732'),
(893, 1, 2, 7, 'Present', '2017-06-16', '2017-2018', '1508906732'),
(894, 1, 2, 4, 'Present', '2017-06-17', '2017-2018', '1508906732'),
(895, 1, 2, 5, 'Absent', '2017-06-17', '2017-2018', '1508906732'),
(896, 1, 2, 6, 'Present', '2017-06-17', '2017-2018', '1508906732'),
(897, 1, 2, 7, 'Present', '2017-06-17', '2017-2018', '1508906732'),
(898, 1, 2, 4, 'Present', '2017-06-19', '2017-2018', '1508906732'),
(899, 1, 2, 5, 'Absent', '2017-06-19', '2017-2018', '1508906732'),
(900, 1, 2, 6, 'Present', '2017-06-19', '2017-2018', '1508906732'),
(901, 1, 2, 7, 'Present', '2017-06-19', '2017-2018', '1508906732'),
(902, 1, 2, 4, 'Present', '2017-06-20', '2017-2018', '1508906732'),
(903, 1, 2, 5, 'Absent', '2017-06-20', '2017-2018', '1508906732'),
(904, 1, 2, 6, 'Present', '2017-06-20', '2017-2018', '1508906732'),
(905, 1, 2, 7, 'Present', '2017-06-20', '2017-2018', '1508906732'),
(906, 1, 2, 4, 'Present', '2017-06-21', '2017-2018', '1508906732'),
(907, 1, 2, 5, 'Absent', '2017-06-21', '2017-2018', '1508906732'),
(908, 1, 2, 6, 'Present', '2017-06-21', '2017-2018', '1508906732'),
(909, 1, 2, 7, 'Present', '2017-06-21', '2017-2018', '1508906732'),
(910, 1, 2, 4, 'Present', '2017-06-22', '2017-2018', '1508906732'),
(911, 1, 2, 5, 'Absent', '2017-06-22', '2017-2018', '1508906732'),
(912, 1, 2, 6, 'Present', '2017-06-22', '2017-2018', '1508906732'),
(913, 1, 2, 7, 'Present', '2017-06-22', '2017-2018', '1508906732'),
(914, 1, 2, 4, 'Present', '2017-06-23', '2017-2018', '1508906732'),
(915, 1, 2, 5, 'Absent', '2017-06-23', '2017-2018', '1508906732'),
(916, 1, 2, 6, 'Present', '2017-06-23', '2017-2018', '1508906732'),
(917, 1, 2, 7, 'Present', '2017-06-23', '2017-2018', '1508906732'),
(918, 1, 2, 4, 'Present', '2017-06-24', '2017-2018', '1508906732'),
(919, 1, 2, 5, 'Absent', '2017-06-24', '2017-2018', '1508906732'),
(920, 1, 2, 6, 'Present', '2017-06-24', '2017-2018', '1508906732'),
(921, 1, 2, 7, 'Present', '2017-06-24', '2017-2018', '1508906732'),
(922, 1, 2, 4, 'Present', '2017-06-26', '2017-2018', '1508906732'),
(923, 1, 2, 5, 'Absent', '2017-06-26', '2017-2018', '1508906732'),
(924, 1, 2, 6, 'Present', '2017-06-26', '2017-2018', '1508906732'),
(925, 1, 2, 7, 'Present', '2017-06-26', '2017-2018', '1508906732'),
(926, 1, 2, 4, 'Present', '2017-06-27', '2017-2018', '1508906732'),
(927, 1, 2, 5, 'Absent', '2017-06-27', '2017-2018', '1508906732'),
(928, 1, 2, 6, 'Present', '2017-06-27', '2017-2018', '1508906732'),
(929, 1, 2, 7, 'Present', '2017-06-27', '2017-2018', '1508906732'),
(930, 1, 2, 4, 'Present', '2017-06-28', '2017-2018', '1508906732'),
(931, 1, 2, 5, 'Absent', '2017-06-28', '2017-2018', '1508906732'),
(932, 1, 2, 6, 'Present', '2017-06-28', '2017-2018', '1508906732'),
(933, 1, 2, 7, 'Present', '2017-06-28', '2017-2018', '1508906732'),
(934, 1, 2, 4, 'Present', '2017-06-29', '2017-2018', '1508906732'),
(935, 1, 2, 5, 'Absent', '2017-06-29', '2017-2018', '1508906732'),
(936, 1, 2, 6, 'Present', '2017-06-29', '2017-2018', '1508906732'),
(937, 1, 2, 7, 'Present', '2017-06-29', '2017-2018', '1508906732'),
(938, 1, 2, 4, 'Present', '2017-06-30', '2017-2018', '1508906732'),
(939, 1, 2, 5, 'Absent', '2017-06-30', '2017-2018', '1508906732'),
(940, 1, 2, 6, 'Present', '2017-06-30', '2017-2018', '1508906732'),
(941, 1, 2, 7, 'Present', '2017-06-30', '2017-2018', '1508906732'),
(942, 1, 2, 4, 'Present', '2017-05-01', '2017-2018', '1508906732'),
(943, 1, 2, 5, 'Absent', '2017-05-01', '2017-2018', '1508906732'),
(944, 1, 2, 6, 'Present', '2017-05-01', '2017-2018', '1508906732'),
(945, 1, 2, 7, 'Present', '2017-05-01', '2017-2018', '1508906732'),
(946, 1, 2, 4, 'Present', '2017-05-02', '2017-2018', '1508906732'),
(947, 1, 2, 5, 'Absent', '2017-05-02', '2017-2018', '1508906732'),
(948, 1, 2, 6, 'Present', '2017-05-02', '2017-2018', '1508906732'),
(949, 1, 2, 7, 'Present', '2017-05-02', '2017-2018', '1508906732'),
(950, 1, 2, 4, 'Present', '2017-05-03', '2017-2018', '1508906732'),
(951, 1, 2, 5, 'Absent', '2017-05-03', '2017-2018', '1508906732'),
(952, 1, 2, 6, 'Present', '2017-05-03', '2017-2018', '1508906732'),
(953, 1, 2, 7, 'Present', '2017-05-03', '2017-2018', '1508906732'),
(954, 1, 2, 4, 'Present', '2017-05-04', '2017-2018', '1508906732'),
(955, 1, 2, 5, 'Absent', '2017-05-04', '2017-2018', '1508906732'),
(956, 1, 2, 6, 'Present', '2017-05-04', '2017-2018', '1508906732'),
(957, 1, 2, 7, 'Present', '2017-05-04', '2017-2018', '1508906732'),
(958, 1, 2, 4, 'Present', '2017-05-05', '2017-2018', '1508906732'),
(959, 1, 2, 5, 'Absent', '2017-05-05', '2017-2018', '1508906732'),
(960, 1, 2, 6, 'Present', '2017-05-05', '2017-2018', '1508906732'),
(961, 1, 2, 7, 'Present', '2017-05-05', '2017-2018', '1508906732'),
(962, 1, 2, 4, 'Present', '2017-05-06', '2017-2018', '1508906732'),
(963, 1, 2, 5, 'Absent', '2017-05-06', '2017-2018', '1508906732'),
(964, 1, 2, 6, 'Present', '2017-05-06', '2017-2018', '1508906732'),
(965, 1, 2, 7, 'Present', '2017-05-06', '2017-2018', '1508906732'),
(966, 1, 2, 4, 'Present', '2017-05-08', '2017-2018', '1508906732'),
(967, 1, 2, 5, 'Absent', '2017-05-08', '2017-2018', '1508906732'),
(968, 1, 2, 6, 'Present', '2017-05-08', '2017-2018', '1508906732'),
(969, 1, 2, 7, 'Present', '2017-05-08', '2017-2018', '1508906732'),
(970, 1, 2, 4, 'Present', '2017-05-09', '2017-2018', '1508906732'),
(971, 1, 2, 5, 'Absent', '2017-05-09', '2017-2018', '1508906732'),
(972, 1, 2, 6, 'Present', '2017-05-09', '2017-2018', '1508906732'),
(973, 1, 2, 7, 'Present', '2017-05-09', '2017-2018', '1508906732'),
(974, 1, 2, 4, 'Present', '2017-05-10', '2017-2018', '1508906732'),
(975, 1, 2, 5, 'Absent', '2017-05-10', '2017-2018', '1508906732'),
(976, 1, 2, 6, 'Present', '2017-05-10', '2017-2018', '1508906732'),
(977, 1, 2, 7, 'Present', '2017-05-10', '2017-2018', '1508906732'),
(978, 1, 2, 4, 'Present', '2017-05-11', '2017-2018', '1508906732'),
(979, 1, 2, 5, 'Absent', '2017-05-11', '2017-2018', '1508906732'),
(980, 1, 2, 6, 'Present', '2017-05-11', '2017-2018', '1508906732'),
(981, 1, 2, 7, 'Present', '2017-05-11', '2017-2018', '1508906732'),
(982, 1, 2, 4, 'Present', '2017-05-12', '2017-2018', '1508906732'),
(983, 1, 2, 5, 'Absent', '2017-05-12', '2017-2018', '1508906732'),
(984, 1, 2, 6, 'Present', '2017-05-12', '2017-2018', '1508906732'),
(985, 1, 2, 7, 'Present', '2017-05-12', '2017-2018', '1508906732'),
(986, 1, 2, 4, 'Present', '2017-05-13', '2017-2018', '1508906732'),
(987, 1, 2, 5, 'Absent', '2017-05-13', '2017-2018', '1508906732'),
(988, 1, 2, 6, 'Present', '2017-05-13', '2017-2018', '1508906732'),
(989, 1, 2, 7, 'Present', '2017-05-13', '2017-2018', '1508906732'),
(990, 1, 2, 4, 'Present', '2017-05-15', '2017-2018', '1508906732'),
(991, 1, 2, 5, 'Absent', '2017-05-15', '2017-2018', '1508906732'),
(992, 1, 2, 6, 'Present', '2017-05-15', '2017-2018', '1508906732'),
(993, 1, 2, 7, 'Present', '2017-05-15', '2017-2018', '1508906732'),
(994, 1, 2, 4, 'Present', '2017-05-16', '2017-2018', '1508906732'),
(995, 1, 2, 5, 'Absent', '2017-05-16', '2017-2018', '1508906732'),
(996, 1, 2, 6, 'Present', '2017-05-16', '2017-2018', '1508906732'),
(997, 1, 2, 7, 'Present', '2017-05-16', '2017-2018', '1508906732'),
(998, 1, 2, 4, 'Present', '2017-05-17', '2017-2018', '1508906732'),
(999, 1, 2, 5, 'Absent', '2017-05-17', '2017-2018', '1508906732'),
(1000, 1, 2, 6, 'Present', '2017-05-17', '2017-2018', '1508906732'),
(1001, 1, 2, 7, 'Present', '2017-05-17', '2017-2018', '1508906732'),
(1002, 1, 2, 4, 'Present', '2017-05-18', '2017-2018', '1508906732'),
(1003, 1, 2, 5, 'Absent', '2017-05-18', '2017-2018', '1508906732'),
(1004, 1, 2, 6, 'Present', '2017-05-18', '2017-2018', '1508906732'),
(1005, 1, 2, 7, 'Present', '2017-05-18', '2017-2018', '1508906732'),
(1006, 1, 2, 4, 'Present', '2017-05-19', '2017-2018', '1508906732'),
(1007, 1, 2, 5, 'Absent', '2017-05-19', '2017-2018', '1508906732'),
(1008, 1, 2, 6, 'Present', '2017-05-19', '2017-2018', '1508906732'),
(1009, 1, 2, 7, 'Present', '2017-05-19', '2017-2018', '1508906732'),
(1010, 1, 2, 4, 'Present', '2017-05-20', '2017-2018', '1508906732'),
(1011, 1, 2, 5, 'Absent', '2017-05-20', '2017-2018', '1508906732'),
(1012, 1, 2, 6, 'Present', '2017-05-20', '2017-2018', '1508906732'),
(1013, 1, 2, 7, 'Present', '2017-05-20', '2017-2018', '1508906732'),
(1014, 1, 2, 4, 'Present', '2017-05-22', '2017-2018', '1508906732'),
(1015, 1, 2, 5, 'Absent', '2017-05-22', '2017-2018', '1508906732'),
(1016, 1, 2, 6, 'Present', '2017-05-22', '2017-2018', '1508906732'),
(1017, 1, 2, 7, 'Present', '2017-05-22', '2017-2018', '1508906732'),
(1018, 1, 2, 4, 'Present', '2017-05-23', '2017-2018', '1508906732'),
(1019, 1, 2, 5, 'Absent', '2017-05-23', '2017-2018', '1508906732'),
(1020, 1, 2, 6, 'Present', '2017-05-23', '2017-2018', '1508906732'),
(1021, 1, 2, 7, 'Present', '2017-05-23', '2017-2018', '1508906732'),
(1022, 1, 2, 4, 'Present', '2017-05-24', '2017-2018', '1508906732'),
(1023, 1, 2, 5, 'Absent', '2017-05-24', '2017-2018', '1508906732'),
(1024, 1, 2, 6, 'Present', '2017-05-24', '2017-2018', '1508906732'),
(1025, 1, 2, 7, 'Present', '2017-05-24', '2017-2018', '1508906732'),
(1026, 1, 2, 4, 'Present', '2017-05-25', '2017-2018', '1508906732'),
(1027, 1, 2, 5, 'Absent', '2017-05-25', '2017-2018', '1508906732'),
(1028, 1, 2, 6, 'Present', '2017-05-25', '2017-2018', '1508906732'),
(1029, 1, 2, 7, 'Present', '2017-05-25', '2017-2018', '1508906732'),
(1030, 1, 2, 4, 'Present', '2017-05-26', '2017-2018', '1508906732'),
(1031, 1, 2, 5, 'Absent', '2017-05-26', '2017-2018', '1508906732'),
(1032, 1, 2, 6, 'Present', '2017-05-26', '2017-2018', '1508906732'),
(1033, 1, 2, 7, 'Present', '2017-05-26', '2017-2018', '1508906732'),
(1034, 1, 2, 4, 'Present', '2017-05-27', '2017-2018', '1508906732'),
(1035, 1, 2, 5, 'Absent', '2017-05-27', '2017-2018', '1508906732'),
(1036, 1, 2, 6, 'Present', '2017-05-27', '2017-2018', '1508906732'),
(1037, 1, 2, 7, 'Present', '2017-05-27', '2017-2018', '1508906732'),
(1038, 1, 2, 4, 'Present', '2017-05-29', '2017-2018', '1508906732'),
(1039, 1, 2, 5, 'Absent', '2017-05-29', '2017-2018', '1508906732'),
(1040, 1, 2, 6, 'Present', '2017-05-29', '2017-2018', '1508906732'),
(1041, 1, 2, 7, 'Present', '2017-05-29', '2017-2018', '1508906732'),
(1042, 1, 2, 4, 'Present', '2017-05-30', '2017-2018', '1508906732'),
(1043, 1, 2, 5, 'Absent', '2017-05-30', '2017-2018', '1508906732'),
(1044, 1, 2, 6, 'Present', '2017-05-30', '2017-2018', '1508906732'),
(1045, 1, 2, 7, 'Present', '2017-05-30', '2017-2018', '1508906732'),
(1046, 1, 2, 4, 'Present', '2017-05-31', '2017-2018', '1508906732'),
(1047, 1, 2, 5, 'Absent', '2017-05-31', '2017-2018', '1508906732'),
(1048, 1, 2, 6, 'Present', '2017-05-31', '2017-2018', '1508906732'),
(1049, 1, 2, 7, 'Present', '2017-05-31', '2017-2018', '1508906732'),
(1050, 1, 1, 1, 'Present', '2017-10-25', '2017-2018', '1508906720'),
(1051, 1, 1, 2, 'Absent', '2017-10-25', '2017-2018', '1508906720'),
(1052, 1, 1, 3, 'Present', '2017-10-25', '2017-2018', '1508906720'),
(1053, 1, 2, 4, 'Present', '2017-10-25', '2017-2018', '1508906732'),
(1054, 1, 2, 5, 'Absent', '2017-10-25', '2017-2018', '1508906732'),
(1055, 1, 2, 6, 'Present', '2017-10-25', '2017-2018', '1508906732'),
(1056, 1, 2, 7, 'Present', '2017-10-25', '2017-2018', '1508906732'),
(1057, 1, 1, 1, 'Present', '2017-10-26', '2017-2018', '1508993525'),
(1058, 1, 1, 2, 'Present', '2017-10-26', '2017-2018', '1508993525'),
(1059, 1, 1, 3, 'Present', '2017-10-26', '2017-2018', '1508993525'),
(1060, 1, 2, 4, 'Present', '2017-10-26', '2017-2018', '1508993529'),
(1061, 1, 2, 5, 'Present', '2017-10-26', '2017-2018', '1508993529'),
(1062, 1, 2, 6, 'Present', '2017-10-26', '2017-2018', '1508993529'),
(1063, 1, 2, 7, 'Present', '2017-10-26', '2017-2018', '1508993529');

-- --------------------------------------------------------

--
-- Stand-in structure for view `studentexams`
--
CREATE TABLE `studentexams` (
`Student` varchar(491)
,`StudentId` int(11)
,`AcademicYear` varchar(245)
,`ClassName` varchar(234)
,`SLNO` int(11)
,`Section` varchar(256)
,`SectionId` int(11)
,`Exam` text
,`ExamSchedueId` int(11)
,`ExamId` int(11)
,`SubjectName` varchar(256)
,`ExamSchedule` date
);

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
(1, 1, 'f', '1508585624');

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
(1, 'Student1', 'f', '', '2013-09-30', 'B-ve', '001', 1, 1, '2017-2018', '5f4dcc3b5aa765d61d8327deb882cf99', '1508585624'),
(2, 'Student2', '', '', '0000-00-00', '', '002', 1, 1, '2017-2018', '5f4dcc3b5aa765d61d8327deb882cf99', '1508585344'),
(3, 'Student3', '', '', '0000-00-00', '', '003', 1, 1, '2017-2018', '5f4dcc3b5aa765d61d8327deb882cf99', '1508585344'),
(4, 'Prjay', '', '', '0000-00-00', '', '001', 1, 2, '2017-2018', '5f4dcc3b5aa765d61d8327deb882cf99', '1508841642'),
(5, 'Lavkush', '', '', '0000-00-00', '', '002', 1, 2, '2017-2018', '5f4dcc3b5aa765d61d8327deb882cf99', '1508841642'),
(6, 'Maneesha', '', '', '0000-00-00', '', '003', 1, 2, '2017-2018', '5f4dcc3b5aa765d61d8327deb882cf99', '1508841642'),
(7, 'Narender', '', '', '0000-00-00', '', '004', 1, 2, '2017-2018', '5f4dcc3b5aa765d61d8327deb882cf99', '1508841642');

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
(1, 'Hindi', '1508749381'),
(2, 'Telugu', '1508749381'),
(3, 'English', '1508749381'),
(4, 'Maths', '1508749381'),
(5, 'Science', '1508749381'),
(6, 'Social', '1508749381');

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
(1, 'vidhya', '', '1508749409'),
(2, 'Parveen', '', '1508749552');

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
(1, 1, 'N', '2017-10-02', '2017-2018', '12121211'),
(2, 2, 'Y', '2017-10-02', '2017-2018', '32322'),
(3, 1, 'N', '2017-10-03', '2017-2018', '12121211'),
(4, 2, 'Y', '2017-10-03', '2017-2018', '32322'),
(5, 1, 'N', '2017-10-04', '2017-2018', '12121211'),
(6, 2, 'Y', '2017-10-04', '2017-2018', '32322'),
(7, 1, 'N', '2017-10-05', '2017-2018', '12121211'),
(8, 2, 'Y', '2017-10-05', '2017-2018', '32322'),
(9, 1, 'Y', '2017-10-06', '2017-2018', '12121211'),
(10, 2, 'Y', '2017-10-06', '2017-2018', '32322'),
(11, 1, 'N', '2017-10-07', '2017-2018', '12121211'),
(12, 2, 'Y', '2017-10-07', '2017-2018', '32322'),
(13, 1, 'Y', '2017-10-09', '2017-2018', '12121211'),
(14, 2, 'N', '2017-10-09', '2017-2018', '32322'),
(15, 1, 'Y', '2017-10-10', '2017-2018', '12121211'),
(16, 2, 'Y', '2017-10-10', '2017-2018', '32322'),
(17, 1, 'Y', '2017-10-11', '2017-2018', '12121211'),
(18, 2, 'N', '2017-10-11', '2017-2018', '32322'),
(19, 1, 'N', '2017-10-12', '2017-2018', '12121211'),
(20, 2, 'N', '2017-10-12', '2017-2018', '32322'),
(21, 1, 'N', '2017-10-13', '2017-2018', '12121211'),
(22, 2, 'N', '2017-10-13', '2017-2018', '32322'),
(23, 1, 'N', '2017-10-14', '2017-2018', '12121211'),
(24, 2, 'Y', '2017-10-14', '2017-2018', '32322'),
(25, 1, 'N', '2017-10-16', '2017-2018', '12121211'),
(26, 2, 'N', '2017-10-16', '2017-2018', '32322'),
(27, 1, 'N', '2017-10-17', '2017-2018', '12121211'),
(28, 2, 'Y', '2017-10-17', '2017-2018', '32322'),
(29, 1, 'N', '2017-10-18', '2017-2018', '12121211'),
(30, 2, 'Y', '2017-10-18', '2017-2018', '32322'),
(31, 1, 'N', '2017-10-19', '2017-2018', '12121211'),
(32, 2, 'N', '2017-10-19', '2017-2018', '32322'),
(33, 1, 'Y', '2017-10-20', '2017-2018', '12121211'),
(34, 2, 'N', '2017-10-20', '2017-2018', '32322'),
(35, 1, 'Y', '2017-10-21', '2017-2018', '12121211'),
(36, 2, 'Y', '2017-10-21', '2017-2018', '32322'),
(37, 1, 'N', '2017-10-23', '2017-2018', '12121211'),
(38, 2, 'Y', '2017-10-23', '2017-2018', '32322'),
(53, 1, 'N', '2017-09-01', '2017-2018', '12121211'),
(54, 2, 'Y', '2017-09-01', '2017-2018', '32322'),
(55, 1, 'Y', '2017-09-02', '2017-2018', '12121211'),
(56, 2, 'N', '2017-09-02', '2017-2018', '32322'),
(57, 1, 'N', '2017-09-05', '2017-2018', '12121211'),
(58, 2, 'N', '2017-09-05', '2017-2018', '32322'),
(59, 1, 'N', '2017-09-06', '2017-2018', '12121211'),
(60, 2, 'N', '2017-09-06', '2017-2018', '32322'),
(61, 1, 'N', '2017-09-07', '2017-2018', '12121211'),
(62, 2, 'Y', '2017-09-07', '2017-2018', '32322'),
(63, 1, 'N', '2017-09-08', '2017-2018', '12121211'),
(64, 2, 'Y', '2017-09-08', '2017-2018', '32322'),
(65, 1, 'N', '2017-09-09', '2017-2018', '12121211'),
(66, 2, 'N', '2017-09-09', '2017-2018', '32322'),
(67, 1, 'N', '2017-09-11', '2017-2018', '12121211'),
(68, 2, 'Y', '2017-09-11', '2017-2018', '32322'),
(69, 1, 'N', '2017-09-12', '2017-2018', '12121211'),
(70, 2, 'N', '2017-09-12', '2017-2018', '32322'),
(71, 1, 'Y', '2017-09-13', '2017-2018', '12121211'),
(72, 2, 'N', '2017-09-13', '2017-2018', '32322'),
(73, 1, 'Y', '2017-09-14', '2017-2018', '12121211'),
(74, 2, 'N', '2017-09-14', '2017-2018', '32322'),
(75, 1, 'N', '2017-09-15', '2017-2018', '12121211'),
(76, 2, 'Y', '2017-09-15', '2017-2018', '32322'),
(77, 1, 'Y', '2017-09-16', '2017-2018', '12121211'),
(78, 2, 'N', '2017-09-16', '2017-2018', '32322'),
(79, 1, 'Y', '2017-09-18', '2017-2018', '12121211'),
(80, 2, 'Y', '2017-09-18', '2017-2018', '32322'),
(81, 1, 'N', '2017-09-19', '2017-2018', '12121211'),
(82, 2, 'N', '2017-09-19', '2017-2018', '32322'),
(83, 1, 'Y', '2017-09-20', '2017-2018', '12121211'),
(84, 2, 'N', '2017-09-20', '2017-2018', '32322'),
(85, 1, 'Y', '2017-09-21', '2017-2018', '12121211'),
(86, 2, 'Y', '2017-09-21', '2017-2018', '32322'),
(87, 1, 'Y', '2017-09-22', '2017-2018', '12121211'),
(88, 2, 'N', '2017-09-22', '2017-2018', '32322'),
(89, 1, 'N', '2017-09-23', '2017-2018', '12121211'),
(90, 2, 'N', '2017-09-23', '2017-2018', '32322'),
(91, 1, 'Y', '2017-09-25', '2017-2018', '12121211'),
(92, 2, 'Y', '2017-09-25', '2017-2018', '32322'),
(93, 1, 'N', '2017-09-26', '2017-2018', '12121211'),
(94, 2, 'Y', '2017-09-26', '2017-2018', '32322'),
(95, 1, 'Y', '2017-09-27', '2017-2018', '12121211'),
(96, 2, 'Y', '2017-09-27', '2017-2018', '32322'),
(97, 1, 'Y', '2017-09-28', '2017-2018', '12121211'),
(98, 2, 'Y', '2017-09-28', '2017-2018', '32322'),
(99, 1, 'Y', '2017-09-29', '2017-2018', '12121211'),
(100, 2, 'N', '2017-09-29', '2017-2018', '32322'),
(101, 1, 'Y', '2017-09-30', '2017-2018', '12121211'),
(102, 2, 'Y', '2017-09-30', '2017-2018', '32322'),
(103, 1, 'Y', '2017-08-01', '2017-2018', '12121211'),
(104, 2, 'Y', '2017-08-01', '2017-2018', '32322'),
(105, 1, 'Y', '2017-08-02', '2017-2018', '12121211'),
(106, 2, 'N', '2017-08-02', '2017-2018', '32322'),
(107, 1, 'Y', '2017-08-03', '2017-2018', '12121211'),
(108, 2, 'N', '2017-08-03', '2017-2018', '32322'),
(109, 1, 'Y', '2017-08-04', '2017-2018', '12121211'),
(110, 2, 'N', '2017-08-04', '2017-2018', '32322'),
(111, 1, 'Y', '2017-08-05', '2017-2018', '12121211'),
(112, 2, 'Y', '2017-08-05', '2017-2018', '32322'),
(113, 1, 'N', '2017-08-07', '2017-2018', '12121211'),
(114, 2, 'Y', '2017-08-07', '2017-2018', '32322'),
(115, 1, 'Y', '2017-08-08', '2017-2018', '12121211'),
(116, 2, 'N', '2017-08-08', '2017-2018', '32322'),
(117, 1, 'N', '2017-08-09', '2017-2018', '12121211'),
(118, 2, 'N', '2017-08-09', '2017-2018', '32322'),
(119, 1, 'N', '2017-08-10', '2017-2018', '12121211'),
(120, 2, 'N', '2017-08-10', '2017-2018', '32322'),
(121, 1, 'Y', '2017-08-11', '2017-2018', '12121211'),
(122, 2, 'N', '2017-08-11', '2017-2018', '32322'),
(123, 1, 'N', '2017-08-12', '2017-2018', '12121211'),
(124, 2, 'Y', '2017-08-12', '2017-2018', '32322'),
(125, 1, 'Y', '2017-08-14', '2017-2018', '12121211'),
(126, 2, 'N', '2017-08-14', '2017-2018', '32322'),
(127, 1, 'Y', '2017-08-15', '2017-2018', '12121211'),
(128, 2, 'N', '2017-08-15', '2017-2018', '32322'),
(129, 1, 'Y', '2017-08-16', '2017-2018', '12121211'),
(130, 2, 'N', '2017-08-16', '2017-2018', '32322'),
(131, 1, 'Y', '2017-08-17', '2017-2018', '12121211'),
(132, 2, 'Y', '2017-08-17', '2017-2018', '32322'),
(133, 1, 'N', '2017-08-18', '2017-2018', '12121211'),
(134, 2, 'N', '2017-08-18', '2017-2018', '32322'),
(135, 1, 'N', '2017-08-19', '2017-2018', '12121211'),
(136, 2, 'N', '2017-08-19', '2017-2018', '32322'),
(137, 1, 'N', '2017-08-21', '2017-2018', '12121211'),
(138, 2, 'Y', '2017-08-21', '2017-2018', '32322'),
(139, 1, 'N', '2017-08-22', '2017-2018', '12121211'),
(140, 2, 'N', '2017-08-22', '2017-2018', '32322'),
(141, 1, 'N', '2017-08-23', '2017-2018', '12121211'),
(142, 2, 'Y', '2017-08-23', '2017-2018', '32322'),
(143, 1, 'Y', '2017-08-24', '2017-2018', '12121211'),
(144, 2, 'Y', '2017-08-24', '2017-2018', '32322'),
(145, 1, 'Y', '2017-08-25', '2017-2018', '12121211'),
(146, 2, 'Y', '2017-08-25', '2017-2018', '32322'),
(147, 1, 'Y', '2017-08-26', '2017-2018', '12121211'),
(148, 2, 'N', '2017-08-26', '2017-2018', '32322'),
(149, 1, 'Y', '2017-08-28', '2017-2018', '12121211'),
(150, 2, 'N', '2017-08-28', '2017-2018', '32322'),
(151, 1, 'Y', '2017-08-29', '2017-2018', '12121211'),
(152, 2, 'Y', '2017-08-29', '2017-2018', '32322'),
(153, 1, 'N', '2017-08-30', '2017-2018', '12121211'),
(154, 2, 'N', '2017-08-30', '2017-2018', '32322'),
(155, 1, 'Y', '2017-08-31', '2017-2018', '12121211'),
(156, 2, 'Y', '2017-08-31', '2017-2018', '32322'),
(157, 1, 'Y', '2017-07-01', '2017-2018', '12121211'),
(158, 2, 'N', '2017-07-01', '2017-2018', '32322'),
(159, 1, 'Y', '2017-07-03', '2017-2018', '12121211'),
(160, 2, 'Y', '2017-07-03', '2017-2018', '32322'),
(161, 1, 'N', '2017-07-04', '2017-2018', '12121211'),
(162, 2, 'N', '2017-07-04', '2017-2018', '32322'),
(163, 1, 'N', '2017-07-05', '2017-2018', '12121211'),
(164, 2, 'N', '2017-07-05', '2017-2018', '32322'),
(165, 1, 'Y', '2017-07-06', '2017-2018', '12121211'),
(166, 2, 'Y', '2017-07-06', '2017-2018', '32322'),
(167, 1, 'Y', '2017-07-07', '2017-2018', '12121211'),
(168, 2, 'Y', '2017-07-07', '2017-2018', '32322'),
(169, 1, 'N', '2017-07-08', '2017-2018', '12121211'),
(170, 2, 'N', '2017-07-08', '2017-2018', '32322'),
(171, 1, 'N', '2017-07-10', '2017-2018', '12121211'),
(172, 2, 'N', '2017-07-10', '2017-2018', '32322'),
(173, 1, 'Y', '2017-07-11', '2017-2018', '12121211'),
(174, 2, 'Y', '2017-07-11', '2017-2018', '32322'),
(175, 1, 'N', '2017-07-12', '2017-2018', '12121211'),
(176, 2, 'N', '2017-07-12', '2017-2018', '32322'),
(177, 1, 'Y', '2017-07-13', '2017-2018', '12121211'),
(178, 2, 'N', '2017-07-13', '2017-2018', '32322'),
(179, 1, 'N', '2017-07-14', '2017-2018', '12121211'),
(180, 2, 'Y', '2017-07-14', '2017-2018', '32322'),
(181, 1, 'Y', '2017-07-15', '2017-2018', '12121211'),
(182, 2, 'Y', '2017-07-15', '2017-2018', '32322'),
(183, 1, 'Y', '2017-07-17', '2017-2018', '12121211'),
(184, 2, 'N', '2017-07-17', '2017-2018', '32322'),
(185, 1, 'N', '2017-07-18', '2017-2018', '12121211'),
(186, 2, 'N', '2017-07-18', '2017-2018', '32322'),
(187, 1, 'Y', '2017-07-19', '2017-2018', '12121211'),
(188, 2, 'Y', '2017-07-19', '2017-2018', '32322'),
(189, 1, 'N', '2017-07-20', '2017-2018', '12121211'),
(190, 2, 'N', '2017-07-20', '2017-2018', '32322'),
(191, 1, 'N', '2017-07-21', '2017-2018', '12121211'),
(192, 2, 'N', '2017-07-21', '2017-2018', '32322'),
(193, 1, 'N', '2017-07-22', '2017-2018', '12121211'),
(194, 2, 'N', '2017-07-22', '2017-2018', '32322'),
(195, 1, 'Y', '2017-07-24', '2017-2018', '12121211'),
(196, 2, 'N', '2017-07-24', '2017-2018', '32322'),
(197, 1, 'Y', '2017-07-25', '2017-2018', '12121211'),
(198, 2, 'N', '2017-07-25', '2017-2018', '32322'),
(199, 1, 'N', '2017-07-26', '2017-2018', '12121211'),
(200, 2, 'Y', '2017-07-26', '2017-2018', '32322'),
(201, 1, 'N', '2017-07-27', '2017-2018', '12121211'),
(202, 2, 'Y', '2017-07-27', '2017-2018', '32322'),
(203, 1, 'N', '2017-07-28', '2017-2018', '12121211'),
(204, 2, 'Y', '2017-07-28', '2017-2018', '32322'),
(205, 1, 'N', '2017-07-29', '2017-2018', '12121211'),
(206, 2, 'Y', '2017-07-29', '2017-2018', '32322'),
(207, 1, 'N', '2017-07-31', '2017-2018', '12121211'),
(208, 2, 'N', '2017-07-31', '2017-2018', '32322'),
(209, 1, 'N', '2017-06-01', '2017-2018', '12121211'),
(210, 2, 'Y', '2017-06-01', '2017-2018', '32322'),
(211, 1, 'Y', '2017-06-02', '2017-2018', '12121211'),
(212, 2, 'N', '2017-06-02', '2017-2018', '32322'),
(213, 1, 'N', '2017-06-03', '2017-2018', '12121211'),
(214, 2, 'Y', '2017-06-03', '2017-2018', '32322'),
(215, 1, 'N', '2017-06-05', '2017-2018', '12121211'),
(216, 2, 'Y', '2017-06-05', '2017-2018', '32322'),
(217, 1, 'Y', '2017-06-06', '2017-2018', '12121211'),
(218, 2, 'N', '2017-06-06', '2017-2018', '32322'),
(219, 1, 'Y', '2017-06-07', '2017-2018', '12121211'),
(220, 2, 'Y', '2017-06-07', '2017-2018', '32322'),
(221, 1, 'N', '2017-06-08', '2017-2018', '12121211'),
(222, 2, 'N', '2017-06-08', '2017-2018', '32322'),
(223, 1, 'N', '2017-06-09', '2017-2018', '12121211'),
(224, 2, 'N', '2017-06-09', '2017-2018', '32322'),
(225, 1, 'Y', '2017-06-10', '2017-2018', '12121211'),
(226, 2, 'N', '2017-06-10', '2017-2018', '32322'),
(227, 1, 'Y', '2017-06-12', '2017-2018', '12121211'),
(228, 2, 'N', '2017-06-12', '2017-2018', '32322'),
(229, 1, 'Y', '2017-06-13', '2017-2018', '12121211'),
(230, 2, 'Y', '2017-06-13', '2017-2018', '32322'),
(231, 1, 'Y', '2017-06-14', '2017-2018', '12121211'),
(232, 2, 'Y', '2017-06-14', '2017-2018', '32322'),
(233, 1, 'N', '2017-06-15', '2017-2018', '12121211'),
(234, 2, 'N', '2017-06-15', '2017-2018', '32322'),
(235, 1, 'Y', '2017-06-16', '2017-2018', '12121211'),
(236, 2, 'Y', '2017-06-16', '2017-2018', '32322'),
(237, 1, 'N', '2017-06-17', '2017-2018', '12121211'),
(238, 2, 'Y', '2017-06-17', '2017-2018', '32322'),
(239, 1, 'N', '2017-06-19', '2017-2018', '12121211'),
(240, 2, 'Y', '2017-06-19', '2017-2018', '32322'),
(241, 1, 'N', '2017-06-20', '2017-2018', '12121211'),
(242, 2, 'Y', '2017-06-20', '2017-2018', '32322'),
(243, 1, 'Y', '2017-06-21', '2017-2018', '12121211'),
(244, 2, 'Y', '2017-06-21', '2017-2018', '32322'),
(245, 1, 'Y', '2017-06-22', '2017-2018', '12121211'),
(246, 2, 'N', '2017-06-22', '2017-2018', '32322'),
(247, 1, 'Y', '2017-06-23', '2017-2018', '12121211'),
(248, 2, 'N', '2017-06-23', '2017-2018', '32322'),
(249, 1, 'Y', '2017-06-24', '2017-2018', '12121211'),
(250, 2, 'Y', '2017-06-24', '2017-2018', '32322'),
(251, 1, 'Y', '2017-06-26', '2017-2018', '12121211'),
(252, 2, 'N', '2017-06-26', '2017-2018', '32322'),
(253, 1, 'N', '2017-06-27', '2017-2018', '12121211'),
(254, 2, 'N', '2017-06-27', '2017-2018', '32322'),
(255, 1, 'N', '2017-06-28', '2017-2018', '12121211'),
(256, 2, 'N', '2017-06-28', '2017-2018', '32322'),
(257, 1, 'N', '2017-06-29', '2017-2018', '12121211'),
(258, 2, 'N', '2017-06-29', '2017-2018', '32322'),
(259, 1, 'Y', '2017-06-30', '2017-2018', '12121211'),
(260, 2, 'N', '2017-06-30', '2017-2018', '32322'),
(261, 1, 'Y', '2017-05-01', '2017-2018', '12121211'),
(262, 2, 'Y', '2017-05-01', '2017-2018', '32322'),
(263, 1, 'Y', '2017-05-02', '2017-2018', '12121211'),
(264, 2, 'Y', '2017-05-02', '2017-2018', '32322'),
(265, 1, 'Y', '2017-05-03', '2017-2018', '12121211'),
(266, 2, 'N', '2017-05-03', '2017-2018', '32322'),
(267, 1, 'Y', '2017-05-04', '2017-2018', '12121211'),
(268, 2, 'Y', '2017-05-04', '2017-2018', '32322'),
(269, 1, 'Y', '2017-05-05', '2017-2018', '12121211'),
(270, 2, 'Y', '2017-05-05', '2017-2018', '32322'),
(271, 1, 'N', '2017-05-06', '2017-2018', '12121211'),
(272, 2, 'N', '2017-05-06', '2017-2018', '32322'),
(273, 1, 'Y', '2017-05-08', '2017-2018', '12121211'),
(274, 2, 'Y', '2017-05-08', '2017-2018', '32322'),
(275, 1, 'Y', '2017-05-09', '2017-2018', '12121211'),
(276, 2, 'N', '2017-05-09', '2017-2018', '32322'),
(277, 1, 'N', '2017-05-10', '2017-2018', '12121211'),
(278, 2, 'Y', '2017-05-10', '2017-2018', '32322'),
(279, 1, 'Y', '2017-05-11', '2017-2018', '12121211'),
(280, 2, 'N', '2017-05-11', '2017-2018', '32322'),
(281, 1, 'Y', '2017-05-12', '2017-2018', '12121211'),
(282, 2, 'Y', '2017-05-12', '2017-2018', '32322'),
(283, 1, 'Y', '2017-05-13', '2017-2018', '12121211'),
(284, 2, 'Y', '2017-05-13', '2017-2018', '32322'),
(285, 1, 'N', '2017-05-15', '2017-2018', '12121211'),
(286, 2, 'Y', '2017-05-15', '2017-2018', '32322'),
(287, 1, 'Y', '2017-05-16', '2017-2018', '12121211'),
(288, 2, 'Y', '2017-05-16', '2017-2018', '32322'),
(289, 1, 'N', '2017-05-17', '2017-2018', '12121211'),
(290, 2, 'N', '2017-05-17', '2017-2018', '32322'),
(291, 1, 'Y', '2017-05-18', '2017-2018', '12121211'),
(292, 2, 'Y', '2017-05-18', '2017-2018', '32322'),
(293, 1, 'N', '2017-05-19', '2017-2018', '12121211'),
(294, 2, 'N', '2017-05-19', '2017-2018', '32322'),
(295, 1, 'N', '2017-05-20', '2017-2018', '12121211'),
(296, 2, 'N', '2017-05-20', '2017-2018', '32322'),
(297, 1, 'Y', '2017-05-22', '2017-2018', '12121211'),
(298, 2, 'N', '2017-05-22', '2017-2018', '32322'),
(299, 1, 'N', '2017-05-23', '2017-2018', '12121211'),
(300, 2, 'Y', '2017-05-23', '2017-2018', '32322'),
(301, 1, 'N', '2017-05-24', '2017-2018', '12121211'),
(302, 2, 'Y', '2017-05-24', '2017-2018', '32322'),
(303, 1, 'N', '2017-05-25', '2017-2018', '12121211'),
(304, 2, 'N', '2017-05-25', '2017-2018', '32322'),
(305, 1, 'Y', '2017-05-26', '2017-2018', '12121211'),
(306, 2, 'N', '2017-05-26', '2017-2018', '32322'),
(307, 1, 'Y', '2017-05-27', '2017-2018', '12121211'),
(308, 2, 'Y', '2017-05-27', '2017-2018', '32322'),
(309, 1, 'N', '2017-05-29', '2017-2018', '12121211'),
(310, 2, 'N', '2017-05-29', '2017-2018', '32322'),
(311, 1, 'N', '2017-05-30', '2017-2018', '12121211'),
(312, 2, 'Y', '2017-05-30', '2017-2018', '32322'),
(313, 1, 'N', '2017-05-31', '2017-2018', '12121211'),
(314, 2, 'Y', '2017-05-31', '2017-2018', '32322'),
(315, 2, 'Y', '2017-10-24', '2017-2018', '1508833467'),
(316, 1, 'Y', '2017-10-24', '2017-2018', '1508833467'),
(317, 2, 'Y', '2017-10-25', '2017-2018', '1508906647'),
(318, 1, 'N', '2017-10-25', '2017-2018', '1508906650');

-- --------------------------------------------------------

--
-- Table structure for table `teacherattendanceprincipal`
--

CREATE TABLE `teacherattendanceprincipal` (
  `SLNO` int(11) NOT NULL,
  `AttendanceFor` date NOT NULL,
  `Academicyear` varchar(234) NOT NULL,
  `Lastupdated` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherattendanceprincipal`
--

INSERT INTO `teacherattendanceprincipal` (`SLNO`, `AttendanceFor`, `Academicyear`, `Lastupdated`) VALUES
(1, '2017-10-24', '2017-2018', '1508839125');

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
(1, 1, '9963948526', '9949821653', 'vidhya.j@mailinator.com', '', 'Address goes here', '1508749528', '2017-10-23 14:35:28'),
(2, 2, '7412589635', '9658963256', 'parven.sk@mailinator.com', '', 'Address', '1508749629', '2017-10-23 14:37:09');

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
(1, 1, 'J', 'Vidhya', 'Married', '', '1992-11-09', '2013-05-09', 'resources/teachers-profile-pics/vidhya/1508749479avatar3.png', '1508749506'),
(2, 2, 'SK', 'Parveen', 'UnMarried', '', '1992-10-06', '2017-10-23', 'resources/teachers-profile-pics/Parveen/1508749587avatar1.png', '1508749609');

-- --------------------------------------------------------

--
-- Table structure for table `uploadpaths`
--

CREATE TABLE `uploadpaths` (
  `SLNO` int(12) NOT NULL,
  `UploadFor` varchar(245) NOT NULL,
  `Path` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Power Bill', 'TSPSC', 'Adi Narayana', 'Adinarayana@tspsc.com', '9638569896', '', 'Address Goes Here', 'Active', '1508907300');

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
(1, 'Unit-I', '123456987'),
(2, 'Unit-II', '12569788'),
(3, 'Unit-III', '123456987'),
(4, 'Unit-IV', '12569788'),
(5, 'Quaterly', '123456987'),
(6, 'Halfyearly', '12569788'),
(7, 'Annual', '12569788');

-- --------------------------------------------------------

--
-- Structure for view `scheduleinfo`
--
DROP TABLE IF EXISTS `scheduleinfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `scheduleinfo`  AS  select `sch`.`ExamSchedueId` AS `ExamSchedueId`,`sch`.`Exam` AS `ExamId`,`sch`.`ClassName` AS `ClassName`,`sch`.`ClassSection` AS `ClassSection`,`sch`.`ExamSchedule` AS `ExamSchedule`,`sch`.`ScheduledTime` AS `ScheduledTime`,`exm`.`Exam` AS `Exam`,`sub`.`SubjectName` AS `SubjectName` from ((`examschedules` `sch` join `whichexam` `exm` on((`exm`.`ExamId` = `sch`.`Exam`))) join `subjects` `sub` on((`sub`.`SubjectId` = `sch`.`Subject`))) order by `sch`.`Exam`,`sch`.`ClassName`,`sch`.`ClassSection`,`sch`.`Subject` ;

-- --------------------------------------------------------

--
-- Structure for view `stdinfo`
--
DROP TABLE IF EXISTS `stdinfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stdinfo`  AS  select `std`.`StudentId` AS `StudentId`,concat(`std`.`Student`,' ',`std`.`LastName`) AS `Student`,`cls`.`ClassName` AS `ClassName`,`cls`.`SLNO` AS `SLNO`,`sec`.`SectionId` AS `SectionId`,`sec`.`Section` AS `Section`,`std`.`AcademicYear` AS `AcademicYear` from ((`students` `std` join `newclass` `cls` on((`cls`.`SLNO` = `std`.`ClassName`))) join `sections` `sec` on((`sec`.`SectionId` = `std`.`ClassSection`))) order by `std`.`ClassName`,`std`.`ClassSection`,`std`.`Student` ;

-- --------------------------------------------------------

--
-- Structure for view `studentexams`
--
DROP TABLE IF EXISTS `studentexams`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `studentexams`  AS  select `std`.`Student` AS `Student`,`std`.`StudentId` AS `StudentId`,`std`.`AcademicYear` AS `AcademicYear`,`std`.`ClassName` AS `ClassName`,`std`.`SLNO` AS `SLNO`,`std`.`Section` AS `Section`,`std`.`SectionId` AS `SectionId`,`sch`.`Exam` AS `Exam`,`sch`.`ExamSchedueId` AS `ExamSchedueId`,`sch`.`ExamId` AS `ExamId`,`sch`.`SubjectName` AS `SubjectName`,`sch`.`ExamSchedule` AS `ExamSchedule` from (`stdinfo` `std` join `scheduleinfo` `sch` on(((`sch`.`ClassName` = `std`.`SLNO`) and (`sch`.`ClassSection` = `std`.`SectionId`)))) ;

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
-- Indexes for table `holidaylist`
--
ALTER TABLE `holidaylist`
  ADD PRIMARY KEY (`HolidayId`);

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
-- Indexes for table `schoolinfo`
--
ALTER TABLE `schoolinfo`
  ADD PRIMARY KEY (`SchoolId`);

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
-- Indexes for table `teacherattendanceprincipal`
--
ALTER TABLE `teacherattendanceprincipal`
  ADD PRIMARY KEY (`SLNO`);

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
  MODIFY `ActivityPicId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `allocatedmarks`
--
ALTER TABLE `allocatedmarks`
  MODIFY `AllocatedId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assignedsubjects`
--
ALTER TABLE `assignedsubjects`
  MODIFY `AssignedId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `assignstdroute`
--
ALTER TABLE `assignstdroute`
  MODIFY `AssignedId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assignteachers`
--
ALTER TABLE `assignteachers`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `BillId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `celebrations`
--
ALTER TABLE `celebrations`
  MODIFY `CelebId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classteachers`
--
ALTER TABLE `classteachers`
  MODIFY `ClassteacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `DepartId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `examschedules`
--
ALTER TABLE `examschedules`
  MODIFY `ExamSchedueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `extracircularactivities`
--
ALTER TABLE `extracircularactivities`
  MODIFY `ExtracActId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feecollection`
--
ALTER TABLE `feecollection`
  MODIFY `FeeCollectionId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feetranasactiondetails`
--
ALTER TABLE `feetranasactiondetails`
  MODIFY `TransId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `holidaylist`
--
ALTER TABLE `holidaylist`
  MODIFY `HolidayId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `HomeworkId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `identificationmarks`
--
ALTER TABLE `identificationmarks`
  MODIFY `Markid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `monthsname`
--
ALTER TABLE `monthsname`
  MODIFY `MonthId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `newclass`
--
ALTER TABLE `newclass`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `NotificationId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parentdetails`
--
ALTER TABLE `parentdetails`
  MODIFY `ParentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `RouteId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schoolfee`
--
ALTER TABLE `schoolfee`
  MODIFY `FeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schoolinfo`
--
ALTER TABLE `schoolinfo`
  MODIFY `SchoolId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `SectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staffdetails`
--
ALTER TABLE `staffdetails`
  MODIFY `StaffDetailId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studentactivities`
--
ALTER TABLE `studentactivities`
  MODIFY `ActivityId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studentattendance`
--
ALTER TABLE `studentattendance`
  MODIFY `AttendanceId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1064;
--
-- AUTO_INCREMENT for table `studenthobbies`
--
ALTER TABLE `studenthobbies`
  MODIFY `HobbyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `SubjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `TeacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teacherattendance`
--
ALTER TABLE `teacherattendance`
  MODIFY `AttendanceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;
--
-- AUTO_INCREMENT for table `teacherattendanceprincipal`
--
ALTER TABLE `teacherattendanceprincipal`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teachercontactdetails`
--
ALTER TABLE `teachercontactdetails`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teacherpersonaldetails`
--
ALTER TABLE `teacherpersonaldetails`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uploadpaths`
--
ALTER TABLE `uploadpaths`
  MODIFY `SLNO` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `VechileId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `VendorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `whichexam`
--
ALTER TABLE `whichexam`
  MODIFY `ExamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
