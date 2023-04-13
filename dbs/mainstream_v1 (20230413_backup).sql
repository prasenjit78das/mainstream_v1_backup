-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 01:44 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mainstream_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `mast_node`
--

CREATE TABLE `mast_node` (
  `nodid` int(5) NOT NULL COMMENT 'Node ID',
  `nodnm` varchar(30) NOT NULL COMMENT 'Node Name',
  `ntpid` int(5) NOT NULL COMMENT 'Node Type Id',
  `pndid` int(5) NOT NULL COMMENT 'Parent Node Id',
  `descr` varchar(50) DEFAULT NULL COMMENT 'Description',
  `addrs` varchar(200) DEFAULT NULL COMMENT 'Address',
  `gstin` varchar(25) DEFAULT NULL COMMENT 'GSTIN Details',
  `bnkdtl` varchar(50) DEFAULT NULL COMMENT 'Bank Details',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Node Master';

--
-- Dumping data for table `mast_node`
--

INSERT INTO `mast_node` (`nodid`, `nodnm`, `ntpid`, `pndid`, `descr`, `addrs`, `gstin`, `bnkdtl`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'mageba India', 1, 0, '', '', '', '', 'PDAS', '2023-03-08 09:41:57', 'PDAS', '2023-04-07 06:41:12', 'N'),
(2, 'HO', 1, 1, 'werwer', 'sdfsd', 'xcvxc', 'rtrt', 'PDAS', '2023-03-08 09:42:39', 'PDAS', '2023-04-03 19:31:21', 'N'),
(3, 'Unit 1', 2, 1, '', '', '', '', 'PDAS', '2023-03-08 09:42:54', 'PDAS', '2023-04-07 06:43:58', 'N'),
(7, 'Accounts', 3, 2, '', '', '', '', 'PDAS', '2023-04-03 23:03:17', 'PDAS', '2023-04-07 06:42:20', 'N'),
(9, 'Procurement', 3, 2, '', '', '', '', 'PDAS', '2023-04-07 10:12:44', NULL, NULL, 'N'),
(10, 'Sales', 3, 2, '', '', '', '', 'PDAS', '2023-04-07 10:13:02', NULL, NULL, 'N'),
(11, 'HR', 3, 2, '', '', '', '', 'PDAS', '2023-04-07 10:13:10', NULL, NULL, 'N'),
(12, 'Unit 3', 2, 1, '', '', '', '', 'PDAS', '2023-04-07 10:13:34', NULL, NULL, 'N'),
(13, 'Unit 4', 2, 1, '', '', '', '', 'PDAS', '2023-04-07 10:13:49', NULL, NULL, 'N'),
(14, 'Store', 3, 3, '', '', '', '', 'PDAS', '2023-04-07 10:14:22', NULL, NULL, 'N'),
(15, 'QA/QC', 3, 3, '', '', '', '', 'PDAS', '2023-04-07 10:14:46', NULL, NULL, 'N'),
(16, 'Production', 3, 3, '', '', '', '', 'PDAS', '2023-04-07 10:15:15', NULL, NULL, 'N'),
(17, 'Production', 3, 12, '', '', '', '', 'PDAS', '2023-04-07 10:15:27', NULL, NULL, 'N'),
(18, 'Production', 3, 13, '', '', '', '', 'PDAS', '2023-04-07 10:15:40', NULL, NULL, 'N'),
(19, 'Store', 3, 12, '', '', '', '', 'PDAS', '2023-04-07 10:17:18', NULL, NULL, 'N'),
(20, 'Store', 3, 13, '', '', '', '', 'PDAS', '2023-04-07 10:17:29', NULL, NULL, 'N'),
(21, 'QA/QC', 3, 12, '', '', '', '', 'PDAS', '2023-04-07 10:19:16', NULL, NULL, 'N'),
(22, 'QA/QC', 3, 13, '', '', '', '', 'PDAS', '2023-04-07 10:19:51', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `mast_nodtyp`
--

CREATE TABLE `mast_nodtyp` (
  `ntpid` int(5) NOT NULL COMMENT 'Node Type ID',
  `ntpnm` varchar(30) NOT NULL COMMENT 'Node Type Name',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Node Type Master';

--
-- Dumping data for table `mast_nodtyp`
--

INSERT INTO `mast_nodtyp` (`ntpid`, `ntpnm`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'Office', 'PDAS', '2023-03-08 09:37:55', NULL, NULL, 'N'),
(2, 'Factory', 'PDAS', '2023-03-08 09:37:55', NULL, NULL, 'N'),
(3, 'Department', 'PDAS', '2023-03-08 09:37:55', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_bank`
--

CREATE TABLE `n_mast_bank` (
  `bnkid` int(5) NOT NULL COMMENT 'Bank ID',
  `bnknm` varchar(30) NOT NULL COMMENT 'Bank Name',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Bank Master';

--
-- Dumping data for table `n_mast_bank`
--

INSERT INTO `n_mast_bank` (`bnkid`, `bnknm`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'HDFC', 'PDAS', '2023-03-27 16:18:11', NULL, NULL, 'N'),
(2, 'ICICI', 'PDAS', '2023-03-27 16:18:11', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_bdlgrp`
--

CREATE TABLE `n_mast_bdlgrp` (
  `blgid` int(5) NOT NULL COMMENT 'Blood Group ID',
  `blgnm` varchar(30) NOT NULL COMMENT 'Blood Group Name',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Blood Group Master';

--
-- Dumping data for table `n_mast_bdlgrp`
--

INSERT INTO `n_mast_bdlgrp` (`blgid`, `blgnm`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'A+', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(2, 'A-', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(3, 'B+', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(4, 'B-', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(5, 'O+', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(6, 'O-', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(7, 'AB+', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(8, 'AB-', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_city`
--

CREATE TABLE `n_mast_city` (
  `ctyid` int(5) NOT NULL COMMENT 'City ID',
  `ctynm` varchar(30) NOT NULL COMMENT 'City Name',
  `cntid` int(5) NOT NULL COMMENT 'Country ID',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='City Master';

--
-- Dumping data for table `n_mast_city`
--

INSERT INTO `n_mast_city` (`ctyid`, `ctynm`, `cntid`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'Delhi', 1, 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(2, 'Kolkata', 1, 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(3, 'Mumbai', 1, 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(4, 'Chennai', 1, 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_country`
--

CREATE TABLE `n_mast_country` (
  `cntid` int(5) NOT NULL COMMENT 'Country ID',
  `cntnm` varchar(30) NOT NULL COMMENT 'Country Name',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Country Master';

--
-- Dumping data for table `n_mast_country`
--

INSERT INTO `n_mast_country` (`cntid`, `cntnm`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'India', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(2, 'USA', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(3, 'South Africa', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_designation`
--

CREATE TABLE `n_mast_designation` (
  `desigid` int(5) NOT NULL COMMENT 'Role ID',
  `designm` varchar(30) NOT NULL COMMENT 'Role Name',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Role Master';

--
-- Dumping data for table `n_mast_designation`
--

INSERT INTO `n_mast_designation` (`desigid`, `designm`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'HOD', 'PDAS', '2023-04-07 11:35:21', 'PDAS', '2023-04-07 08:06:40', 'N'),
(2, 'Manager', 'PDAS', '2023-04-07 11:36:25', NULL, NULL, 'N'),
(3, 'Accountant', 'PDAS', '2023-04-07 11:37:25', NULL, NULL, 'N'),
(4, 'Account Executive', 'PDAS', '2023-04-07 11:37:49', NULL, NULL, 'N'),
(7, 'Production Manager', 'PDAS', '2023-04-07 11:46:41', NULL, NULL, 'N'),
(8, 'Production Executive', 'PDAS', '2023-04-07 11:47:24', NULL, NULL, 'N'),
(9, 'QA/QC Manager', 'PDAS', '2023-04-07 11:48:07', NULL, NULL, 'N'),
(10, 'QA/QC Executive', 'PDAS', '2023-04-07 11:48:43', NULL, NULL, 'N'),
(11, 'Executive', 'PDAS', '2023-04-07 12:35:38', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_desk`
--

CREATE TABLE `n_mast_desk` (
  `dskid` int(5) NOT NULL COMMENT 'Desk ID',
  `dsknm` varchar(50) NOT NULL COMMENT 'Desk Name',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Desk Master';

--
-- Dumping data for table `n_mast_desk`
--

INSERT INTO `n_mast_desk` (`dskid`, `dsknm`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'D1', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(2, 'D2', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_emp`
--

CREATE TABLE `n_mast_emp` (
  `empid` int(5) NOT NULL COMMENT 'Bank ID',
  `ftnam` varchar(50) NOT NULL COMMENT 'First Name',
  `mdnam` varchar(50) DEFAULT NULL COMMENT 'Middle Name',
  `ltnam` varchar(50) DEFAULT NULL COMMENT 'Last name',
  `genid` int(1) NOT NULL COMMENT 'Gender ID',
  `dob` date NOT NULL COMMENT 'Date of Birth',
  `mlsid` int(1) NOT NULL COMMENT 'Marital Status',
  `blgid` int(1) DEFAULT NULL COMMENT 'Blood Group',
  `pemail` varchar(50) DEFAULT NULL COMMENT 'Personal Email ID',
  `prcont` varchar(12) DEFAULT NULL COMMENT 'Personal Contact Number',
  `phlnk` varchar(80) DEFAULT NULL COMMENT 'Photo upload Link',
  `pnnum` varchar(12) DEFAULT NULL COMMENT 'PAN Number',
  `pndlnk` varchar(80) DEFAULT NULL COMMENT 'PAN Document Link',
  `adnum` varchar(12) DEFAULT NULL COMMENT 'Aadhar Number',
  `addlnk` varchar(80) DEFAULT NULL COMMENT 'Aadhar Document Link',
  `ppnum` varchar(12) DEFAULT NULL COMMENT 'Passport Number',
  `ppdlnk` varchar(80) DEFAULT NULL COMMENT 'Passport Document Link',
  `cadd1` varchar(50) DEFAULT NULL COMMENT 'Current address line1',
  `cadd2` varchar(50) DEFAULT NULL COMMENT 'Current address line2',
  `ctown` int(5) DEFAULT NULL COMMENT 'City/Town/Village(Current address)',
  `cpncd` varchar(10) DEFAULT NULL COMMENT 'Pin Code (Current address)',
  `cstt` int(5) DEFAULT NULL COMMENT 'State (Current Address)',
  `ccntr` int(5) DEFAULT NULL COMMENT 'Country (Current Address)',
  `padd1` varchar(50) DEFAULT NULL COMMENT 'Permanent address line1',
  `padd2` varchar(50) DEFAULT NULL COMMENT 'Permanent address line2',
  `ptown` int(5) DEFAULT NULL COMMENT 'City/Town/Village(Permanent address)',
  `ppncd` int(10) DEFAULT NULL COMMENT 'Pin Code (Permanent address)',
  `pstt` int(5) DEFAULT NULL COMMENT 'State (Permanent Address)',
  `pcntr` int(5) DEFAULT NULL COMMENT 'Country (Permanent Address)',
  `fanam` varchar(50) DEFAULT NULL COMMENT 'Father Name',
  `nxfkin` varchar(50) DEFAULT NULL COMMENT 'Next to Kin',
  `facont` varchar(15) DEFAULT NULL COMMENT 'Contact Number of Next to Kin',
  `dofjn` date NOT NULL COMMENT 'Date of Joining',
  `dsgid` int(1) DEFAULT NULL COMMENT 'Designation',
  `oemail` varchar(50) DEFAULT NULL COMMENT 'Email ID',
  `grdid` int(1) NOT NULL COMMENT 'Grade',
  `dptid` int(1) DEFAULT NULL COMMENT 'Department',
  `buid` int(5) DEFAULT NULL,
  `ofcont` varchar(12) DEFAULT NULL COMMENT 'Contact Number official',
  `typid` int(1) NOT NULL COMMENT 'Type',
  `rpmng` int(1) DEFAULT NULL COMMENT 'Reporting Manager',
  `dskid` int(1) DEFAULT NULL COMMENT 'Desk',
  `sftid` int(1) DEFAULT NULL COMMENT 'Shift',
  `vacci` int(1) DEFAULT NULL COMMENT 'Vaccination',
  `esino` varchar(25) DEFAULT NULL COMMENT 'ESINo',
  `epfno` varchar(25) DEFAULT NULL COMMENT 'EPFNo',
  `bnkid` int(1) DEFAULT NULL COMMENT 'Bank',
  `pfnum` varchar(25) DEFAULT NULL COMMENT 'PF no',
  `insap` int(1) DEFAULT NULL COMMENT 'Insurance Applicable',
  `mdlno` varchar(30) DEFAULT NULL COMMENT 'Mediclame Number',
  `apsts` int(1) DEFAULT NULL COMMENT 'Approval Status',
  `stats` int(1) DEFAULT NULL COMMENT 'Status',
  `cdnrs` varchar(100) DEFAULT NULL COMMENT 'Checking Denial Reason',
  `adnrs` varchar(100) DEFAULT NULL COMMENT 'Approval Denial Reason',
  `otdoc` varchar(100) DEFAULT NULL COMMENT 'Certificates & Other Documents upload Link',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Employee Master';

--
-- Dumping data for table `n_mast_emp`
--

INSERT INTO `n_mast_emp` (`empid`, `ftnam`, `mdnam`, `ltnam`, `genid`, `dob`, `mlsid`, `blgid`, `pemail`, `prcont`, `phlnk`, `pnnum`, `pndlnk`, `adnum`, `addlnk`, `ppnum`, `ppdlnk`, `cadd1`, `cadd2`, `ctown`, `cpncd`, `cstt`, `ccntr`, `padd1`, `padd2`, `ptown`, `ppncd`, `pstt`, `pcntr`, `fanam`, `nxfkin`, `facont`, `dofjn`, `dsgid`, `oemail`, `grdid`, `dptid`, `buid`, `ofcont`, `typid`, `rpmng`, `dskid`, `sftid`, `vacci`, `esino`, `epfno`, `bnkid`, `pfnum`, `insap`, `mdlno`, `apsts`, `stats`, `cdnrs`, `adnrs`, `otdoc`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'Prasenjit', '', 'Das', 1, '0000-00-00', 1, 0, 'fdgfdg@gmail.com', '6637474', '', '1234567890', '../uploads/1_pan.pdf', '', '', '', '', 'addres1', '', 2, '700345', 3, 1, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'pdas@mageba.in', 5, 0, NULL, '9433821449', 2, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '../uploads/1_other_doc.pdf', 'PDAS', '0000-00-00 00:00:00', 'PDAS', '05-04-2023 07:25', 'N'),
(2, 'Chinmoy ', '', 'Ghosh', 1, '0000-00-00', 1, 0, 'Sacacv@gamil.com', '2322342', '../../uploads/2_photo.png', '1234567890', '../../uploads/2_pan.pdf', '1234567', '../../uploads/2_aadhar.pdf', '123213asdaf', '../../uploads/2_passport.pdf', '2342', '', 2, '70203', 3, 1, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 4, 'cghosh@mageba.in', 1, 1, NULL, '9836474800', 2, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '../../uploads/2_other_doc.pdf', 'PDAS', '0000-00-00 00:00:00', 'PDAS', '05-04-2023 09:52', 'N'),
(3, 'Kathakali', '', 'Gupta', 1, '0000-00-00', 1, 5, 'abcd@gmail.com', '121314356', '', '', '', '', '', '', '', '30, Jhowtala Road', '', 2, '700019', 3, 1, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'kgupta@mageba.in', 1, 0, NULL, '9836837737', 2, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', 'PDAS', '0000-00-00 00:00:00', 'PDAS', '27-03-2023 13:58', 'N'),
(4, 'Meghana', '', 'Dayananda', 1, '0000-00-00', 1, 5, 'sujoy@gmail.com', '343546788', '', '', '', '', '', '', '', 'Short Road 1', '', 2, '700012', 3, 1, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'mdayananda@mageba.in', 4, 0, NULL, '9986833310', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', 'PDAS', '0000-00-00 00:00:00', 'PDAS', '27-03-2023 14:28', 'N'),
(5, 'Santanu ', '', 'Adhikary', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sadhikary@mageba.in', 4, 0, NULL, '9836416633', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(6, 'Dipankar', '', 'Choudhury', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'dchoudhury@mageba.in', 4, 0, NULL, '9830072732', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(7, 'Santanu', '', 'Majumdar', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'smajumdar@mageba.in', 4, 0, NULL, '9836833313', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(8, 'Jayanti', '', 'Mitra', 2, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'jmitra@mageba.in', 4, 0, NULL, '9830065183', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(9, 'Agamoni', '', 'Das', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '2023-04-12', 11, 'adas@mageba.in', 4, 10, 2, '9836433305', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', 'PDAS', '2023-04-13 04:30:13', 'N'),
(10, 'Sunip', '', 'Barman', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'snbarman@mageba.in', 4, 0, NULL, '8697742889', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(11, 'Sayanti', '', 'Mukherjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'symukherjee@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(12, 'Sattwik', '', 'Kar', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sakar@mageba.in', 4, 0, NULL, '7331125891', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(13, 'Pratik', '', 'Sen', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'psen@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(14, 'Anjan', '', 'Mukherjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'anmukherjee@mageba.in', 4, 0, NULL, '9874033310', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(15, 'Udayan', '', 'Banerjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'ubanerjee@mageba.in', 4, 0, NULL, '03322900250-', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(16, 'Shibnath', '', 'Lahiri', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'slahiri@mageba.in', 4, 0, NULL, '9836433306', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(17, 'Litan', '', 'Mridha', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'lmridha@mageba.in', 4, 0, NULL, '9830010282', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(18, 'Amartya', '', 'Ghosh', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'amghosh@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(19, 'Shibsankar', '', 'Karmakar', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'skarmakar@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(20, 'Supriya', '', 'Chatterjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'schatterjee@mageba.in', 4, 0, NULL, '9836794226', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(21, 'Subhankar', '', 'Sinha Chowdhury', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sschowdhury@mageba.in', 4, 0, NULL, '033 2653 081', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(22, 'Suranjan', '', 'Sadhukhan', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'ssadhukhan@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(23, 'Arko', '', 'Dasgupta', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'ardasgupta@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(24, 'Pintu', '', 'Dutta', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'pdutta@mageba.in', 4, 0, NULL, '9836403366', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(25, 'Arijit', '', 'Sinha', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'asinha@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(26, 'Sagar', '', 'Majumdar', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'msagar@mageba.in', 4, 0, NULL, '9674541951', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(27, 'Asis', '', 'Mukherjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'amukherjee@mageba.in', 4, 0, NULL, '9836433393', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(28, 'Krishnan', '', 'Ganesh', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'kganesh@mageba.in', 4, 0, NULL, '9874075262', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(29, 'Rajat', '', 'Shubra De', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'rde@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(30, 'Supriyo', '', 'Ghosh', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sghosh@mageba.in', 4, 0, NULL, '033 2653 081', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(31, 'Debojyoti', '', 'Ghatak', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'dghatak@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(32, 'Ayanangshu', '', 'Chatterjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'achatterjee@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(33, 'Dipankar', '', 'Mondal', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'dmondal@mageba.in', 4, 0, NULL, '9874033312', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(34, 'Kartick', '', 'Chatterjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'kchatterjee@mageba.in', 4, 0, NULL, '9836433303', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(35, 'Sreejita', '', 'Bose', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sbose@mageba.in', 4, 0, NULL, '9073387445', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(36, 'Raja', '', 'Basu', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'rbasu@mageba.in', 4, 0, NULL, '8961096046', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(37, 'Gopal', '', 'Bairagi', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'gbairagi@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(38, 'Goutam', '', 'Sinha', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'gsinha@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(39, 'Sanjoy', '', 'Bhattacharyay', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sbhattacharyay@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(40, 'Divya Prakash', '', 'Bengani', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'dpbengani@mageba.in', 4, 0, NULL, '033 2653 000', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(41, 'Chandramani', '', 'Rana', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'crana@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(42, 'Gouranga', '', 'Banerjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'gbanerjee@mageba.in', 4, 0, NULL, '9836474600', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(43, 'Kintu', '', 'Mondal', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'kmondal@mageba.in', 4, 0, NULL, 'na', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(44, 'Sudipta', '', 'Banerjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sbanerjee@mageba.in', 4, 0, NULL, '03322900250-', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(45, 'Shamik', '', 'Chowdhury', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'schowdhury@mageba.in', 4, 0, NULL, '8910822571', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(46, 'Subhendu', '', 'Roy', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sroy@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(47, 'Subhra', '', 'Maiti', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'smaiti@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(48, 'Debasis', '', 'De', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'dede@mageba.in', 4, 0, NULL, '9073387446', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(49, 'Sudipta', '', 'Mukherjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'smukherjee@mageba.in', 4, 0, NULL, '033 2653 081', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(50, 'Guest', '', 'Auditors', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'audit@abcd.com', 4, 0, NULL, '9836409988', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(51, 'Subhankar', '', 'Mondal', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'smondal@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(52, 'Riju', '', 'Sonkar', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'rsonkar@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(53, 'Asis', '', 'Das', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'asdas@mageba.in', 4, 0, NULL, '9836474100', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(54, 'Manik', '', 'Sarkar', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(55, 'Biswarup', '', 'Seal', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '033 2653 081', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(56, 'Srikanta', '', 'Dash', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'srdash@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(57, 'Tirthankar', '', 'Bose', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(58, 'Rajkumar ', '', 'Naskar', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'rnaskar@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(59, 'Ashit', '', 'Chakraborty', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(60, 'Arijit ', '', 'Ghosh', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'arghosh@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(61, 'Auditing', '', 'Auditor', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(62, 'Sourav', '', 'Samanta', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(63, 'Sanchita', '', 'Hazra', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'shazra@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(64, 'Likhon', '', 'Biswas', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '033 2653 081', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(65, 'Prashanta', '', 'Saha', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'psaha@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(66, 'Nishikanta', '', 'Bera', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'nbera@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(67, 'Anirban', '', 'Ghosh', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'anghosh@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(68, 'Atanu', '', 'Nandi', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'anandi@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(69, 'Amrita', '', 'Paul', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'apaul@mageba.in', 4, 0, NULL, '9836474600', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(70, 'Arko Sankar', '', 'Bhattacharjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'asbhattacharjee@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(71, 'Test', '', 'Test', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '9073910853', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(72, 'Kleidi', '', 'Islami', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'kislami@mageba.ch', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(73, 'Samit', '', 'Das', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sdas@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(74, 'Saumya', '', 'Banerjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sabanerjee@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(75, 'Ashif', '', 'Sahid', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'asahid@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(76, 'Rahul', '', 'Pandit', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'rpandit@mageba.in', 4, 0, NULL, '9073910851', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(77, 'Subhradip', '', 'Ghosh', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(78, 'Ratan', '', 'Bera', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(79, 'Uday', '', 'Jana', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '9874095433', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(80, 'Alok', '', 'Majumdar', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(81, 'Rajib', '', 'Chakraborty', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'rchakraborty@mageba.in', 4, 0, NULL, '9836433304', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(82, 'Shinjan ', '', 'Sanyal', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'ssanyal@mageba.in', 4, 0, NULL, '9836474744', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(83, 'Debashmita', '', 'Saha', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'dsaha@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(84, 'IT', '', 'Stock', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '9073910854', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(85, 'Shayari', '', 'Bhattacharya', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'shbhattacharya@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(86, 'Suhas', '', 'Biswas', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '9073387447', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(87, 'Binoy Kumar', '', 'Chongdar', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'bkchongdar@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(88, 'Sanjoy', '', 'Paul', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'spaul@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(89, 'Bappaditya', '', 'Ghosh', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'bghosh@mageba.in', 4, 0, NULL, '3326537122', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(90, 'Anupam', '', 'Sadhukhan', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'asadhukhan@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(91, 'Debashis', '', 'Das', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'ddas@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(92, 'Tonmoy', '', 'Chatterjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'tchatterjee@mageba.in', 4, 0, NULL, '8334088891', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(93, 'Sumit', '', 'Saha', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'ssaha@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(94, 'Debayan', '', 'Das', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'dedas@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(95, 'MD', '', 'Ahmer', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'mahmer@mageba.in', 4, 0, NULL, '9836433308', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(96, 'Pranabesh', '', 'Mukhopadhyay', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'pmukhopadhyay@mageba.in', 4, 0, NULL, '8697982144', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(97, 'Tanmoy', '', 'Chongdar', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'tchongdar@mageba.in', 4, 0, NULL, '9650807554', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(98, 'Debjit', '', 'Dolui', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'ddolui@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(99, 'Arnab', '', 'Ghorui', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'arghorui@mageba.in', 4, 0, NULL, '033 2653 081', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(100, 'Swayambhu', '', 'Mukherjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'swmukherjee@mageba.in', 4, 0, NULL, '03322900250-', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(101, 'Krishanu', '', 'Sarkar', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'ksarkar@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(102, 'Amit Kumar', '', 'Mohanta', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'amohanta@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(103, 'Amitava', '', 'Das', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'amdas@mageba.in', 4, 0, NULL, '8335034068', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(104, 'Mrinmoy', '', 'Swarnakar', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'mswarnakar@mageba.in', 4, 0, NULL, '8335034068', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(105, 'Subhrodeep', '', 'Das', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sudas@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(106, 'Chandan', '', 'Das', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'cdas@mageba.in', 4, 0, NULL, '9836422662', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(107, 'Devjit', '', 'Sinha', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'dsinha@mageba.in', 4, 0, NULL, '8335034063', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(108, 'Sreeja', '', 'mageba', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sreeja@mageba.in', 4, 0, NULL, '9836403322', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(109, 'Imazuddin', '', 'Mallick', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'imallick@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(110, 'Partha', '', 'Chakraborty', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'pchakraborty@mageba.in', 4, 0, NULL, '6292211246', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(111, 'Sarthak', '', 'Mandal', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'smandal@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(112, 'Amal Kumar', '', 'Patra', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'apatra@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(113, 'Tanmoy', '', 'Das', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'tdas@mageba.in', 4, 0, NULL, '6292211244', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(114, 'Vikash', '', 'Raj', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'vraj@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(115, 'Subhankar', '', 'Raha', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sraha@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(116, 'Goutam', '', 'Mondal', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '03322900250-', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(117, 'Pradip', '', 'Mondal', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(118, 'Madhab', '', 'Gayen', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(119, 'Sanjoy', '', 'Shit', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '3326707346', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(120, 'Shambhu', '', 'Mondal', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '3326707346', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(121, 'Ayanangshu', '', 'Chatterjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '03322900250-', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(122, 'Sambhunath', '', 'Malik', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(123, 'Sovanlal', '', 'Samanta', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(124, 'Sk Mustake', '', 'Ali', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(125, 'Suvendu', '', 'Roy', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '033 2653 081', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(126, 'Rajat', '', 'Das', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(127, 'Nikhil', '', 'Chakraborty', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(128, 'Gourab Kumar', '', 'Samanta', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(129, 'Kishor', '', 'Bhowmick', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(130, 'Subir', '', 'Ghorui', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sughorui@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(131, 'Subir', '', 'Das', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(132, 'S', '', 'Tushar', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(133, 'Suman', '', 'Majee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(134, 'Jyotish', '', 'Prasad Sah', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '3326707346', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(135, 'Sanjoy', '', 'Bose', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(136, 'Sanjoy', '', 'Adhikari', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(137, 'Mijanur', '', 'Mandal', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(138, 'Subhankar', '', 'Manna', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(139, 'Anshuman', '', 'Chakraborty', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'anchakraborty@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(140, 'Nidhi', '', 'Chindaliya', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'nchindaliya@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(141, 'HO', '', 'Store', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(142, 'U1', '', 'Store', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(143, 'U3', '', 'Store', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(144, 'U4', '', 'Store', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(145, 'Ritankar', '', 'Banik', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'rbanik@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(146, 'Antu', '', 'Acharya', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'aacharya@mageba.in', 4, 0, NULL, '8100359788', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(147, 'Joy Kumar', '', 'Dey', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'jdey@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(148, 'Sudhanshu Kumar ', '', 'Singh', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'susingh@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(149, 'Ritam', '', 'Chatterjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'richatterjee@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(150, 'Shiladitya', '', 'Biswas', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sbiswas@mageba.in', 4, 0, NULL, '6292273994', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(151, 'Ratul', '', 'Das', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'radas@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(152, 'Subrata', '', 'Datta', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(153, 'Sanjib', '', 'Ghorai', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'saghorai@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(154, 'Saptarshi ', '', 'Maiti', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, '', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(155, 'Md. Mursalin', '', 'Ansari', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'mansari@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(156, 'Abhijit', '', 'Maiti', 1, '2023-04-03', 1, 5, 'saddasfds@trtdt.t', '65777', '', '', '', '', '', '', '', 'fdsdfgsfdg', 'sfdsdfgd', 1, '234325435', 1, 1, '', '', 0, 0, 0, 0, '', '', '', '2023-04-24', 4, 'abc@mageba.in', 4, 18, 3, '2324543534', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', 'PDAS', '2023-04-08 15:20:18', 'N'),
(157, 'Narendranath ', '', 'Bala', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'rsonkar@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(158, 'Souvik ', '', 'Khan', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'rsonkar@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(159, 'Koushik', '', 'Dhar', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'kdhar@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(160, 'Sanchita', '', 'Dey', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sdey@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(161, 'Bipin', '', 'Tiwari', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'btiwari@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(162, 'Swarnabha', '', 'Acharyya', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sacharyya@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(163, 'Supratim', '', 'Mondal', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'sumondal@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(164, 'Satyendra Nath', '', 'Ghosh', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'snghosh@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(165, 'Supratik', '', 'Gangopadhyay', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'iamsupratikg@gmail.com', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(166, 'Souvik', '', 'Ghosh', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'soghosh@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N'),
(167, 'Unmesh', '', 'Banerjee', 1, '0000-00-00', 1, 5, '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 'unbanerjee@mageba.in', 4, 0, NULL, '', 1, 0, 0, 0, 0, '', '', 0, '', 0, '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', '', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_empuserrole`
--

CREATE TABLE `n_mast_empuserrole` (
  `eurid` int(5) NOT NULL COMMENT 'Emp_User_Role ID',
  `empid` int(5) NOT NULL COMMENT 'Employee ID',
  `user_id` int(5) NOT NULL COMMENT 'User ID',
  `rolid` int(5) NOT NULL COMMENT 'Role ID',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted? N=NO Y=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Emp_User_Role Masters';

--
-- Dumping data for table `n_mast_empuserrole`
--

INSERT INTO `n_mast_empuserrole` (`eurid`, `empid`, `user_id`, `rolid`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 156, 0, 1, 'PDAS', '2023-04-08 18:18:11', NULL, NULL, 'N'),
(2, 9, 0, 2, 'PDAS', '2023-04-08 18:19:19', NULL, NULL, 'Y'),
(5, 18, 0, 1, 'PDAS', '2023-04-08 18:21:55', NULL, NULL, 'N'),
(6, 18, 0, 3, 'PDAS', '2023-04-08 18:22:18', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_gender`
--

CREATE TABLE `n_mast_gender` (
  `genid` int(5) NOT NULL COMMENT 'Gender ID',
  `gennm` varchar(30) NOT NULL COMMENT 'Gender Name',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Gender Master';

--
-- Dumping data for table `n_mast_gender`
--

INSERT INTO `n_mast_gender` (`genid`, `gennm`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'Male', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(2, 'Female', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(3, 'Other', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_grade`
--

CREATE TABLE `n_mast_grade` (
  `grdid` int(5) NOT NULL COMMENT 'Grade ID',
  `grdnm` varchar(30) NOT NULL COMMENT 'Grade Name',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Grade Master';

--
-- Dumping data for table `n_mast_grade`
--

INSERT INTO `n_mast_grade` (`grdid`, `grdnm`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'H', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(2, 'M3', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(3, 'M2', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(4, 'M1', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(5, 'L1', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(6, 'L2', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_map_menu_role`
--

CREATE TABLE `n_mast_map_menu_role` (
  `rowid` int(5) NOT NULL COMMENT 'ID',
  `nodid` int(5) NOT NULL COMMENT 'Node ID',
  `depid` int(5) DEFAULT NULL,
  `modid` int(5) NOT NULL COMMENT 'Module ID',
  `rolid` int(5) NOT NULL COMMENT 'Role ID',
  `menid` int(5) NOT NULL COMMENT 'Menu ID',
  `mennm` varchar(30) NOT NULL COMMENT 'Menu Name',
  `pgacs` int(1) NOT NULL DEFAULT 0 COMMENT 'Page Access ?',
  `adacs` int(1) NOT NULL DEFAULT 0 COMMENT 'Add Access ?',
  `viacs` int(1) NOT NULL DEFAULT 0 COMMENT 'View Access ?',
  `edacs` int(1) NOT NULL DEFAULT 0 COMMENT 'Edit Access ?',
  `dlacs` int(1) NOT NULL DEFAULT 0 COMMENT 'Delete Access ?',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Map Menus n Roles';

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_marlsts`
--

CREATE TABLE `n_mast_marlsts` (
  `mlsid` int(5) NOT NULL COMMENT 'Marital Status ID',
  `mlsnm` varchar(30) NOT NULL COMMENT 'Marital Status Name',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Marital Status Master';

--
-- Dumping data for table `n_mast_marlsts`
--

INSERT INTO `n_mast_marlsts` (`mlsid`, `mlsnm`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'Married', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(2, 'Unmarried', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_menu`
--

CREATE TABLE `n_mast_menu` (
  `menid` int(5) NOT NULL COMMENT 'Menu ID',
  `modid` int(5) NOT NULL COMMENT 'Module ID',
  `mennm` varchar(30) NOT NULL COMMENT 'Menu Name',
  `pnmid` int(5) NOT NULL COMMENT 'Parent Menu ID',
  `aspnm` varchar(100) NOT NULL COMMENT 'Associated Page Name',
  `fsusr` int(5) NOT NULL COMMENT 'For Super User ?',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Menu Master';

--
-- Dumping data for table `n_mast_menu`
--

INSERT INTO `n_mast_menu` (`menid`, `modid`, `mennm`, `pnmid`, `aspnm`, `fsusr`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 0, 'Main Menu', 0, '', 0, '', '2023-04-12 13:58:40', NULL, NULL, 'N'),
(2, 14, 'Accounts', 1, '', 0, 'PDAS', '2023-04-12 13:59:04', NULL, NULL, 'N'),
(3, 20, 'Assets', 1, '', 0, 'PDAS', '2023-04-12 14:57:42', NULL, NULL, 'N'),
(5, 14, 'Create', 2, '', 0, 'PDAS', '2023-04-12 14:58:29', NULL, NULL, 'N'),
(6, 20, 'Search', 3, '', 0, 'PDAS', '2023-04-12 15:01:28', NULL, NULL, 'N'),
(7, 20, 'Create', 3, '', 0, 'PDAS', '2023-04-12 15:01:49', NULL, NULL, 'N'),
(8, 14, 'Authorize', 2, '', 0, 'PDAS', '2023-04-12 15:02:11', NULL, NULL, 'N'),
(9, 23, 'Administration', 1, '', 0, 'PDAS', '2023-04-12 15:02:54', NULL, NULL, 'N'),
(10, 23, 'Create', 9, '', 0, 'PDAS', '2023-04-12 15:04:07', NULL, NULL, 'N'),
(11, 20, 'Authorize', 3, '', 0, 'PDAS', '2023-04-12 15:04:31', NULL, NULL, 'N'),
(12, 13, 'Procurement', 1, '../test.php', 0, 'PDAS', '2023-04-12 15:21:02', NULL, NULL, 'N'),
(13, 13, 'Indent', 12, '', 0, 'PDAS', '2023-04-12 15:21:30', NULL, NULL, 'N'),
(14, 13, 'Purchase Request', 12, '', 0, 'PDAS', '2023-04-12 15:21:45', NULL, NULL, 'N'),
(15, 13, 'Request for Quote', 12, '', 0, 'PDAS', '2023-04-12 15:22:07', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_module`
--

CREATE TABLE `n_mast_module` (
  `modid` int(5) NOT NULL COMMENT 'Module ID',
  `modnm` varchar(30) NOT NULL COMMENT 'Module Name',
  `isact` int(1) NOT NULL DEFAULT 1 COMMENT 'Is Active',
  `fsusr` int(1) NOT NULL DEFAULT 0 COMMENT 'For Super User ?',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Module Master';

--
-- Dumping data for table `n_mast_module`
--

INSERT INTO `n_mast_module` (`modid`, `modnm`, `isact`, `fsusr`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'Master and Configuration Data ', 1, 0, '', '0000-00-00 00:00:00', '', '', 'N'),
(2, 'User Management', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(3, 'Utility and Helpers', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(4, 'Customer Relationship Manageme', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(5, 'Project Document Binder?', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(6, 'Production Planner', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(7, 'Production and Shop Floor Mana', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(8, 'Drawing Submission Request', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(9, 'Drawing Controller', 1, 0, 'PDAS', '0000-00-00 00:00:00', 'PDAS', '08-03-2023 14:23', 'N'),
(10, 'Correspondence (Letters, MoM, ', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(11, 'Document Management System', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(12, 'Vouchers', 1, 0, 'PDAS', '0000-00-00 00:00:00', 'PDAS', '2023-04-07 08:02:04', 'N'),
(13, 'Procurement', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(14, 'Accounts', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(15, 'IT', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(16, 'Human Resources', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(17, 'Employee Self Service', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(18, 'Quality Control & Test Laborat', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(19, 'Safety', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(20, 'Assets', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(21, 'Maintenance', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(22, 'Transport', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(23, 'Administration', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(24, 'Analytics', 1, 0, 'PDAS', '0000-00-00 00:00:00', 'PDAS', '08-03-2023 14:36', 'N'),
(25, 'Reports', 1, 0, 'PDAS', '0000-00-00 00:00:00', NULL, NULL, 'N'),
(26, 'Dashboard', 1, 0, '', '0000-00-00 00:00:00', '', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_role`
--

CREATE TABLE `n_mast_role` (
  `rolid` int(5) NOT NULL COMMENT 'Role ID',
  `rolnm` varchar(30) NOT NULL COMMENT 'Role Name',
  `nodid` int(5) NOT NULL COMMENT 'Node ID',
  `modid` int(5) NOT NULL COMMENT 'Module ID',
  `rptto` int(5) NOT NULL COMMENT 'Report to Role Name',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Role Master';

--
-- Dumping data for table `n_mast_role`
--

INSERT INTO `n_mast_role` (`rolid`, `rolnm`, `nodid`, `modid`, `rptto`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'HOD', 2, 14, 1, 'PDAS', '2023-04-07 11:35:21', 'PDAS', '2023-04-07 08:06:40', 'N'),
(2, 'Manager', 2, 14, 1, 'PDAS', '2023-04-07 11:36:25', NULL, NULL, 'N'),
(3, 'Accountant', 2, 14, 2, 'PDAS', '2023-04-07 11:37:25', NULL, NULL, 'N'),
(4, 'Account Executive', 2, 14, 2, 'PDAS', '2023-04-07 11:37:49', NULL, NULL, 'N'),
(5, 'HOD', 3, 13, 0, 'PDAS', '2023-04-07 11:42:39', NULL, NULL, 'N'),
(6, 'Manager', 3, 13, 5, 'PDAS', '2023-04-07 11:44:58', NULL, NULL, 'N'),
(7, 'Production Manager', 3, 13, 6, 'PDAS', '2023-04-07 11:46:41', NULL, NULL, 'N'),
(8, 'Production Executive', 3, 13, 7, 'PDAS', '2023-04-07 11:47:24', NULL, NULL, 'N'),
(9, 'QA/QC Manager', 3, 13, 6, 'PDAS', '2023-04-07 11:48:07', NULL, NULL, 'N'),
(10, 'QA/QC Executive', 3, 13, 9, 'PDAS', '2023-04-07 11:48:43', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_role_name`
--

CREATE TABLE `n_mast_role_name` (
  `rolid` int(5) NOT NULL COMMENT 'Designation ID',
  `rolnm` varchar(30) NOT NULL COMMENT 'Designation Name',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted? N=NO Y=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Designation Master';

--
-- Dumping data for table `n_mast_role_name`
--

INSERT INTO `n_mast_role_name` (`rolid`, `rolnm`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'HOD', 'PDAS', '2023-04-07 16:54:07', NULL, NULL, 'N'),
(2, 'Manager', 'PDAS', '2023-04-07 16:54:21', NULL, NULL, 'N'),
(3, 'Staff', 'PDAS', '2023-04-07 16:54:29', NULL, NULL, 'N'),
(4, 'Super User', 'PDAS', '2023-04-07 16:54:41', NULL, NULL, 'N'),
(8, 'Test Role 1', 'PDAS', '2023-04-08 11:32:48', 'PDAS', '2023-04-08 08:29:39', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_shift`
--

CREATE TABLE `n_mast_shift` (
  `sftid` int(5) NOT NULL COMMENT 'Shift ID',
  `sftnm` varchar(30) NOT NULL COMMENT 'Shift Name',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Shift Master';

--
-- Dumping data for table `n_mast_shift`
--

INSERT INTO `n_mast_shift` (`sftid`, `sftnm`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'Day', 'PDAS', '2023-03-27 16:18:11', NULL, NULL, 'N'),
(2, 'Night', 'PDAS', '2023-03-27 16:18:11', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_state`
--

CREATE TABLE `n_mast_state` (
  `staid` int(5) NOT NULL COMMENT 'State ID',
  `stanm` varchar(30) NOT NULL COMMENT 'State Name',
  `cntid` int(5) NOT NULL COMMENT 'Country ID',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='State Master';

--
-- Dumping data for table `n_mast_state`
--

INSERT INTO `n_mast_state` (`staid`, `stanm`, `cntid`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'Assam', 1, 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(2, 'Bihar', 1, 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(3, 'West Bengal', 1, 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_template`
--

CREATE TABLE `n_mast_template` (
  `temid` int(5) NOT NULL COMMENT 'Template ID',
  `temnm` varchar(30) NOT NULL COMMENT 'Template Name',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted? N=NO Y=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table Template for Masters';

--
-- Dumping data for table `n_mast_template`
--

INSERT INTO `n_mast_template` (`temid`, `temnm`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'Template1', 'PDAS', '2023-04-07 15:36:49', NULL, NULL, 'Y'),
(4, 'Template3', 'PDAS', '2023-04-07 15:37:18', 'PDAS', '2023-04-07 12:20:49', 'Y'),
(5, 'Name355', 'PDAS', '2023-04-07 15:54:38', 'PDAS', '2023-04-08 13:04:30', 'N'),
(10, 'Name22', 'PDAS', '2023-04-07 15:56:04', 'PDAS', '2023-04-08 13:04:02', 'N'),
(11, 'Askn name', 'PDAS', '2023-04-07 15:56:14', NULL, NULL, 'N'),
(12, 'Temp2', 'PDAS', '2023-04-08 12:55:53', 'PDAS', '2023-04-08 12:55:44', 'N'),
(13, 'X-men2', 'PDAS', '2023-04-08 16:26:05', 'PDAS', '2023-04-08 12:56:11', 'N'),
(14, 'Lost name', 'PDAS', '2023-04-08 16:29:19', NULL, NULL, 'N'),
(15, 'record2', 'PDAS', '2023-04-08 16:32:38', NULL, NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_type`
--

CREATE TABLE `n_mast_type` (
  `typid` int(5) NOT NULL COMMENT 'Type ID',
  `typnm` varchar(30) NOT NULL COMMENT 'Type Name',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted N=NO Y=YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Type Master';

--
-- Dumping data for table `n_mast_type`
--

INSERT INTO `n_mast_type` (`typid`, `typnm`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'Provisional', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N'),
(2, 'Permanent', 'PDAS', '2023-03-27 16:18:10', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `n_mast_user`
--

CREATE TABLE `n_mast_user` (
  `user_id` int(5) NOT NULL COMMENT 'User ID',
  `user_nm` varchar(30) NOT NULL COMMENT 'User Name',
  `user_pwd` varchar(30) NOT NULL COMMENT 'User Password',
  `empid` int(5) NOT NULL COMMENT 'Employee Id',
  `exprdt` date NOT NULL COMMENT 'Password Expiry Date',
  `dev1_id` varchar(15) DEFAULT NULL COMMENT 'Device #1 ID (chkbid of old module)',
  `dev2_id` varchar(15) DEFAULT NULL COMMENT 'Device #2 ID (chkbid of old module)',
  `crtby` varchar(5) NOT NULL COMMENT 'Created By',
  `crton` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
  `updby` varchar(5) DEFAULT NULL COMMENT 'Updated By',
  `updon` varchar(50) DEFAULT NULL COMMENT 'Updated On',
  `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted? N=NO Y=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='User Masters';

--
-- Dumping data for table `n_mast_user`
--

INSERT INTO `n_mast_user` (`user_id`, `user_nm`, `user_pwd`, `empid`, `exprdt`, `dev1_id`, `dev2_id`, `crtby`, `crton`, `updby`, `updon`, `isdel`) VALUES
(1, 'adas', 'trtu', 9, '1970-01-01', '', '', 'PDAS', '2023-04-08 16:44:14', NULL, NULL, 'N'),
(2, 'adfdg', 'werwqer', 80, '1970-01-01', '', '', 'PDAS', '2023-04-08 16:44:25', NULL, NULL, 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mast_node`
--
ALTER TABLE `mast_node`
  ADD PRIMARY KEY (`nodid`),
  ADD KEY `ntpid` (`ntpid`);

--
-- Indexes for table `mast_nodtyp`
--
ALTER TABLE `mast_nodtyp`
  ADD PRIMARY KEY (`ntpid`),
  ADD UNIQUE KEY `ntpnm` (`ntpnm`);

--
-- Indexes for table `n_mast_bank`
--
ALTER TABLE `n_mast_bank`
  ADD PRIMARY KEY (`bnkid`);

--
-- Indexes for table `n_mast_bdlgrp`
--
ALTER TABLE `n_mast_bdlgrp`
  ADD PRIMARY KEY (`blgid`);

--
-- Indexes for table `n_mast_city`
--
ALTER TABLE `n_mast_city`
  ADD PRIMARY KEY (`ctyid`),
  ADD KEY `cntid` (`cntid`);

--
-- Indexes for table `n_mast_country`
--
ALTER TABLE `n_mast_country`
  ADD PRIMARY KEY (`cntid`);

--
-- Indexes for table `n_mast_designation`
--
ALTER TABLE `n_mast_designation`
  ADD PRIMARY KEY (`desigid`);

--
-- Indexes for table `n_mast_desk`
--
ALTER TABLE `n_mast_desk`
  ADD PRIMARY KEY (`dskid`);

--
-- Indexes for table `n_mast_emp`
--
ALTER TABLE `n_mast_emp`
  ADD PRIMARY KEY (`empid`),
  ADD KEY `fk_genid` (`genid`),
  ADD KEY `fk_mlsid` (`mlsid`),
  ADD KEY `fk_grdid` (`grdid`),
  ADD KEY `fk_typid` (`typid`);

--
-- Indexes for table `n_mast_empuserrole`
--
ALTER TABLE `n_mast_empuserrole`
  ADD PRIMARY KEY (`eurid`),
  ADD UNIQUE KEY `unq_role_empid` (`empid`,`rolid`),
  ADD KEY `fkeur_rolid` (`rolid`);

--
-- Indexes for table `n_mast_gender`
--
ALTER TABLE `n_mast_gender`
  ADD PRIMARY KEY (`genid`);

--
-- Indexes for table `n_mast_grade`
--
ALTER TABLE `n_mast_grade`
  ADD PRIMARY KEY (`grdid`);

--
-- Indexes for table `n_mast_map_menu_role`
--
ALTER TABLE `n_mast_map_menu_role`
  ADD PRIMARY KEY (`rowid`),
  ADD KEY `nodid` (`nodid`),
  ADD KEY `modid` (`modid`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `menid` (`menid`);

--
-- Indexes for table `n_mast_marlsts`
--
ALTER TABLE `n_mast_marlsts`
  ADD PRIMARY KEY (`mlsid`);

--
-- Indexes for table `n_mast_menu`
--
ALTER TABLE `n_mast_menu`
  ADD PRIMARY KEY (`menid`);

--
-- Indexes for table `n_mast_module`
--
ALTER TABLE `n_mast_module`
  ADD PRIMARY KEY (`modid`),
  ADD UNIQUE KEY `modnm` (`modnm`);

--
-- Indexes for table `n_mast_role`
--
ALTER TABLE `n_mast_role`
  ADD PRIMARY KEY (`rolid`),
  ADD UNIQUE KEY `unq_rl` (`rolnm`,`nodid`,`modid`),
  ADD KEY `modid` (`modid`),
  ADD KEY `nodid` (`nodid`);

--
-- Indexes for table `n_mast_role_name`
--
ALTER TABLE `n_mast_role_name`
  ADD PRIMARY KEY (`rolid`),
  ADD UNIQUE KEY `designm` (`rolnm`);

--
-- Indexes for table `n_mast_shift`
--
ALTER TABLE `n_mast_shift`
  ADD PRIMARY KEY (`sftid`);

--
-- Indexes for table `n_mast_state`
--
ALTER TABLE `n_mast_state`
  ADD PRIMARY KEY (`staid`),
  ADD KEY `cntid` (`cntid`);

--
-- Indexes for table `n_mast_template`
--
ALTER TABLE `n_mast_template`
  ADD PRIMARY KEY (`temid`),
  ADD UNIQUE KEY `temnm` (`temnm`);

--
-- Indexes for table `n_mast_type`
--
ALTER TABLE `n_mast_type`
  ADD PRIMARY KEY (`typid`);

--
-- Indexes for table `n_mast_user`
--
ALTER TABLE `n_mast_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_nm` (`user_nm`),
  ADD UNIQUE KEY `unq_user_nm_empid` (`user_nm`,`empid`),
  ADD KEY `fk_empid` (`empid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mast_node`
--
ALTER TABLE `mast_node`
  MODIFY `nodid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Node ID', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mast_nodtyp`
--
ALTER TABLE `mast_nodtyp`
  MODIFY `ntpid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Node Type ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `n_mast_bank`
--
ALTER TABLE `n_mast_bank`
  MODIFY `bnkid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Bank ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `n_mast_bdlgrp`
--
ALTER TABLE `n_mast_bdlgrp`
  MODIFY `blgid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Blood Group ID', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `n_mast_city`
--
ALTER TABLE `n_mast_city`
  MODIFY `ctyid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'City ID', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `n_mast_country`
--
ALTER TABLE `n_mast_country`
  MODIFY `cntid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Country ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `n_mast_designation`
--
ALTER TABLE `n_mast_designation`
  MODIFY `desigid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Role ID', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `n_mast_desk`
--
ALTER TABLE `n_mast_desk`
  MODIFY `dskid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Desk ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `n_mast_emp`
--
ALTER TABLE `n_mast_emp`
  MODIFY `empid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Bank ID', AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `n_mast_empuserrole`
--
ALTER TABLE `n_mast_empuserrole`
  MODIFY `eurid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Emp_User_Role ID', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `n_mast_gender`
--
ALTER TABLE `n_mast_gender`
  MODIFY `genid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Gender ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `n_mast_grade`
--
ALTER TABLE `n_mast_grade`
  MODIFY `grdid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Grade ID', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `n_mast_map_menu_role`
--
ALTER TABLE `n_mast_map_menu_role`
  MODIFY `rowid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- AUTO_INCREMENT for table `n_mast_marlsts`
--
ALTER TABLE `n_mast_marlsts`
  MODIFY `mlsid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Marital Status ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `n_mast_menu`
--
ALTER TABLE `n_mast_menu`
  MODIFY `menid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Menu ID', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `n_mast_module`
--
ALTER TABLE `n_mast_module`
  MODIFY `modid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Module ID', AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `n_mast_role`
--
ALTER TABLE `n_mast_role`
  MODIFY `rolid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Role ID', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `n_mast_role_name`
--
ALTER TABLE `n_mast_role_name`
  MODIFY `rolid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Designation ID', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `n_mast_shift`
--
ALTER TABLE `n_mast_shift`
  MODIFY `sftid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Shift ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `n_mast_state`
--
ALTER TABLE `n_mast_state`
  MODIFY `staid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'State ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `n_mast_template`
--
ALTER TABLE `n_mast_template`
  MODIFY `temid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Template ID', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `n_mast_type`
--
ALTER TABLE `n_mast_type`
  MODIFY `typid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Type ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `n_mast_user`
--
ALTER TABLE `n_mast_user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'User ID', AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mast_node`
--
ALTER TABLE `mast_node`
  ADD CONSTRAINT `mast_node_ibfk_1` FOREIGN KEY (`ntpid`) REFERENCES `mast_nodtyp` (`ntpid`);

--
-- Constraints for table `n_mast_city`
--
ALTER TABLE `n_mast_city`
  ADD CONSTRAINT `n_mast_city_ibfk_1` FOREIGN KEY (`cntid`) REFERENCES `n_mast_country` (`cntid`);

--
-- Constraints for table `n_mast_emp`
--
ALTER TABLE `n_mast_emp`
  ADD CONSTRAINT `fk_genid` FOREIGN KEY (`genid`) REFERENCES `n_mast_gender` (`genid`),
  ADD CONSTRAINT `fk_grdid` FOREIGN KEY (`grdid`) REFERENCES `n_mast_grade` (`grdid`),
  ADD CONSTRAINT `fk_mlsid` FOREIGN KEY (`mlsid`) REFERENCES `n_mast_marlsts` (`mlsid`),
  ADD CONSTRAINT `fk_typid` FOREIGN KEY (`typid`) REFERENCES `n_mast_type` (`typid`);

--
-- Constraints for table `n_mast_empuserrole`
--
ALTER TABLE `n_mast_empuserrole`
  ADD CONSTRAINT `fkeur_empid` FOREIGN KEY (`empid`) REFERENCES `n_mast_emp` (`empid`),
  ADD CONSTRAINT `fkeur_rolid` FOREIGN KEY (`rolid`) REFERENCES `n_mast_role_name` (`rolid`);

--
-- Constraints for table `n_mast_map_menu_role`
--
ALTER TABLE `n_mast_map_menu_role`
  ADD CONSTRAINT `n_mast_map_menu_role_ibfk_1` FOREIGN KEY (`nodid`) REFERENCES `mast_node` (`nodid`),
  ADD CONSTRAINT `n_mast_map_menu_role_ibfk_2` FOREIGN KEY (`modid`) REFERENCES `n_mast_module` (`modid`),
  ADD CONSTRAINT `n_mast_map_menu_role_ibfk_3` FOREIGN KEY (`rolid`) REFERENCES `n_mast_role` (`rolid`),
  ADD CONSTRAINT `n_mast_map_menu_role_ibfk_4` FOREIGN KEY (`menid`) REFERENCES `n_mast_menu` (`menid`);

--
-- Constraints for table `n_mast_role`
--
ALTER TABLE `n_mast_role`
  ADD CONSTRAINT `n_mast_role_ibfk_1` FOREIGN KEY (`modid`) REFERENCES `n_mast_module` (`modid`),
  ADD CONSTRAINT `n_mast_role_ibfk_2` FOREIGN KEY (`nodid`) REFERENCES `mast_node` (`nodid`);

--
-- Constraints for table `n_mast_state`
--
ALTER TABLE `n_mast_state`
  ADD CONSTRAINT `n_mast_state_ibfk_1` FOREIGN KEY (`cntid`) REFERENCES `n_mast_country` (`cntid`);

--
-- Constraints for table `n_mast_user`
--
ALTER TABLE `n_mast_user`
  ADD CONSTRAINT `fk_empid` FOREIGN KEY (`empid`) REFERENCES `n_mast_emp` (`empid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
