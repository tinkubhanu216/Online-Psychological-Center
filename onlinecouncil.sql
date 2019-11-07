-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 22, 2018 at 06:40 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlinecouncil`
--

-- --------------------------------------------------------

--
-- Table structure for table `acadamicsandhostel`
--

CREATE TABLE IF NOT EXISTS `acadamicsandhostel` (
  `studentid` varchar(10) NOT NULL,
  `department` varchar(10) NOT NULL,
  `yearandsem` varchar(15) NOT NULL,
  `blockandclass` varchar(20) NOT NULL,
  `hostelblockandroomno` varchar(20) NOT NULL,
  `roommate1id` varchar(10) NOT NULL,
  `roommate1name` varchar(50) NOT NULL,
  `roommate1class` varchar(20) NOT NULL,
  `roommate1mobile` bigint(20) NOT NULL,
  `roommate2id` varchar(10) NOT NULL,
  `roommate2name` varchar(50) NOT NULL,
  `roommate2class` varchar(20) NOT NULL,
  `roommate2mobile` bigint(20) NOT NULL,
  `roommate3id` varchar(10) NOT NULL,
  `roommate3name` varchar(50) NOT NULL,
  `roommate3class` varchar(20) NOT NULL,
  `roommate3mobile` bigint(20) NOT NULL,
  PRIMARY KEY (`studentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acadamicsandhostel`
--

INSERT INTO `acadamicsandhostel` (`studentid`, `department`, `yearandsem`, `blockandclass`, `hostelblockandroomno`, `roommate1id`, `roommate1name`, `roommate1class`, `roommate1mobile`, `roommate2id`, `roommate2name`, `roommate2class`, `roommate2mobile`, `roommate3id`, `roommate3name`, `roommate3class`, `roommate3mobile`) VALUES
('B141470', 'CSE', 'E-2/ Sem-2', 'AB2-208', 'BH1-S422', 'B141492', 'bhanuprasad', 'AB2-207', 7095107867, 'B141675', 'balasubramanyam', 'AB2-206', 7893977287, 'B141495', 'narendar', 'AB2-207', 7675983534),
('B141492', 'CSE', 'E-3/ Sem-2', 'AB2-207', 'BH1-S422', 'B141675', 'balasubramanyam', 'AB2-206', 7893977287, 'B141470', 'santosh gantyada', 'AB2-208', 9100351724, 'B141495', 'subramanyam geddada', 'AB1-003', 9553961988);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `studentid` varchar(10) NOT NULL,
  `problemid` int(11) NOT NULL,
  `referby` varchar(255) NOT NULL,
  `referto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `token` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(10) NOT NULL,
  `studentname` varchar(255) NOT NULL,
  `requestingdate` date NOT NULL,
  `requestingtime` time NOT NULL,
  `duration` int(11) NOT NULL,
  `allocateddate` date NOT NULL,
  `allocatedtime` time NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `time` datetime NOT NULL,
  `remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`token`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`token`, `studentid`, `studentname`, `requestingdate`, `requestingtime`, `duration`, `allocateddate`, `allocatedtime`, `status`, `time`, `remarks`) VALUES
(1, 'B141492', 'bhanu prasdh', '2018-12-18', '12:10:00', 10, '0000-00-00', '00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 'B141492', 'bhanu prasdh', '2018-12-18', '12:10:00', 10, '0000-00-00', '00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 'B141492', 'bhanu prasdh', '2018-12-20', '00:47:00', 30, '2018-12-19', '03:01:00', 'accepted', '2018-12-17 11:46:19', ''),
(4, 'B141492', 'bhanu prasdh', '2019-02-18', '03:03:00', 20, '2018-12-25', '03:03:00', 'accepted', '2018-12-17 14:02:06', ''),
(5, 'B141492', 'bhanu prasdh', '2018-12-26', '09:03:00', 30, '2018-12-27', '09:09:00', 'accepted', '2018-12-17 20:03:10', ''),
(6, 'B141492', 'bhanu prasdh', '2018-12-20', '22:03:00', 30, '2018-12-19', '10:07:00', 'accepted', '2018-12-18 09:02:52', 'text here');

-- --------------------------------------------------------

--
-- Table structure for table `counsellor`
--

CREATE TABLE IF NOT EXISTS `counsellor` (
  `counsellorid` varchar(10) NOT NULL,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(35) NOT NULL,
  `designation` varchar(40) NOT NULL,
  PRIMARY KEY (`counsellorid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counsellor`
--

INSERT INTO `counsellor` (`counsellorid`, `firstname`, `lastname`, `designation`) VALUES
('RST1234', 'nagalaxmi', 'g', 'designationn');

-- --------------------------------------------------------

--
-- Table structure for table `facultyrequests`
--

CREATE TABLE IF NOT EXISTS `facultyrequests` (
  `facultyid` varchar(10) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `studentname` varchar(255) NOT NULL,
  `blockandclass` varchar(30) NOT NULL,
  `problem` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultyrequests`
--

INSERT INTO `facultyrequests` (`facultyid`, `studentid`, `studentname`, `blockandclass`, `problem`, `description`, `status`) VALUES
('RST1492', 'B141492', 'bhanu prasda', 'AB2-207', 'pndhk fgdfbm h', 'b jbvc jd fjghjdbfm dd fggvb dbvvbfhjfvfn				\r\n			', 'pending'),
('RST1492', 'B141492', 'bhanu prasda', 'AB2-207', 'pndhk fgdfbm h', 'b jbvc jd fjghjdbfm dd fggvb dbvvbfhjfvfn				\r\n			', 'pending'),
('RST1492', 'B154561', 'bhau', 'AB2-207', 'bdjh', 'bdjhd', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE IF NOT EXISTS `family` (
  `studentid` varchar(10) NOT NULL,
  `fathername` varchar(35) NOT NULL,
  `fatherdesignation` varchar(30) NOT NULL,
  `fathermobile` bigint(20) NOT NULL,
  `mothername` varchar(35) NOT NULL,
  `motherdesignation` varchar(30) NOT NULL,
  `mothermobile` bigint(20) NOT NULL,
  `sibling1name` varchar(35) NOT NULL,
  `sibling1age` int(11) NOT NULL,
  `sibling1occupation` varchar(30) NOT NULL,
  `sibling2name` varchar(35) NOT NULL,
  `sibling2age` int(11) NOT NULL,
  `sibling2occupation` varchar(30) NOT NULL,
  `homemobile` bigint(20) NOT NULL,
  PRIMARY KEY (`studentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`studentid`, `fathername`, `fatherdesignation`, `fathermobile`, `mothername`, `motherdesignation`, `mothermobile`, `sibling1name`, `sibling1age`, `sibling1occupation`, `sibling2name`, `sibling2age`, `sibling2occupation`, `homemobile`) VALUES
('B141470', 'vallam Naidu', 'farmer', 9177369347, 'sureedamma', 'house wife', 9177369347, 'ramu', 25, 'labour', 'laxmi', 23, 'housewife', 8008763117),
('B141492', 'laxminarayana', 'farmer', 9951611826, 'jayamma', 'house wife', 9951611826, 'Divya bharathi thandra', 21, 'Student', '', 0, '', 9951611826);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `userid` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `password`, `usertype`) VALUES
('admin', 'admin', 'admin'),
('B141470', 'santhu', 'student'),
('B141492', 'bhanu', 'student'),
('RST1234', 'counsellor', 'counsellor'),
('RST1492', 'santhu', 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `studentid` varchar(10) NOT NULL,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(35) NOT NULL,
  `dateofbirth` varchar(20) NOT NULL,
  `placeofbirth` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `maritalstatus` varchar(20) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `localaddress` varchar(100) NOT NULL,
  `permanentaddress` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  PRIMARY KEY (`studentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `firstname`, `lastname`, `dateofbirth`, `placeofbirth`, `gender`, `age`, `email`, `maritalstatus`, `height`, `weight`, `localaddress`, `permanentaddress`, `mobile`) VALUES
('B141470', 'santosh', 'gantyada', '1999-04-06', 'ravada', 'Male', 20, 'santunari070@gmail.com', 'Single', 172, 61, 'Basara,Mudhole pinode:504107', 'ravada vill \r\nranasthalam mandal\r\nsrikakulam dist\r\npincode:532407\r\nkaapu veedhi', 9100351724),
('B141492', 'Bhanu prasadh', 'Thandra', '1998-10-26', 'kommai pally', 'Male', 20, 'tinkubhanu216@gmail.com', 'Single', 150, 52, 'H.NO:2-67,\r\nKommaipally vill,\r\nGundala Mandal,\r\nJangaon dist,\r\nTelangana,508101', 'Room No:BH1-S422,\r\nRGUKT Basar,\r\nNiraml,\r\nTelangana,504107', 7095107867);

-- --------------------------------------------------------

--
-- Table structure for table `studentproblems`
--

CREATE TABLE IF NOT EXISTS `studentproblems` (
  `problemid` int(11) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `paststatus` varchar(10) NOT NULL,
  `pastreason` varchar(100) NOT NULL,
  `pastplace` varchar(100) NOT NULL,
  `medication` varchar(10) NOT NULL,
  `medicationname` varchar(50) NOT NULL,
  `refername` varchar(50) NOT NULL,
  `problemrange` int(11) NOT NULL,
  `mentalhealthhistory` text NOT NULL,
  `familyhealthhistory` text NOT NULL,
  `problems` longtext NOT NULL,
  `situations` longtext NOT NULL,
  `speech` varchar(20) NOT NULL,
  `socialinteraction` varchar(20) NOT NULL,
  `eyecontact` varchar(20) NOT NULL,
  `sleep` varchar(20) NOT NULL,
  `document1path` varchar(100) NOT NULL,
  `time` datetime NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`problemid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentproblems`
--

INSERT INTO `studentproblems` (`problemid`, `studentid`, `paststatus`, `pastreason`, `pastplace`, `medication`, `medicationname`, `refername`, `problemrange`, `mentalhealthhistory`, `familyhealthhistory`, `problems`, `situations`, `speech`, `socialinteraction`, `eyecontact`, `sleep`, `document1path`, `time`, `status`) VALUES
(64656, 'B141492', 'Yes', 'gghjb', 'jghvjbv', 'Yes', 'bjbjhbj', 'santosh', 4, 'gkhb bgxdhj xd xghvbkjsx b mcxb jh', ' jhcx h xch', ' vjh cjvjhv', 'jh vjh', 'Normal', 'Dominating', 'Good', 'Abnormal', 'uploads/64656.pdf', '2018-12-17 20:01:34', 'accepted'),
(72495, 'B141492', 'No', 'bhj', 'bjh', 'No', 'jh', 'bjhbjh', 5, 'bjhb', 'hb', 'jhbh', 'bjb', 'Pressured', 'Appropriate', 'Good', 'Normal', 'uploads/72495.pdf', '2018-12-17 14:36:52', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE IF NOT EXISTS `suggestions` (
  `problemid` int(11) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `counsellorid` varchar(10) NOT NULL,
  `suggestion` longtext NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`problemid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`problemid`, `studentid`, `counsellorid`, `suggestion`, `time`) VALUES
(13460, 'B141470', 'RST1234', 'vfg cvhgv hgvh', '2018-12-16 18:02:00'),
(64656, 'B141492', 'RST1234', 'dbhjfbkjf jbvukb', '2018-12-17 20:06:10'),
(72495, 'B141492', 'RST1234', '					\r\n				bvghjvgvghj', '2018-12-17 14:47:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
