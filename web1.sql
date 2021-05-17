-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2020 at 03:07 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web1`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `folder_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `type`, `table_name`, `folder_name`, `created_at`, `updated_at`) VALUES
(1, 'กิจกรรม', 'activity', 'tb_activitys', 'activity', '2019-12-16 09:29:10', '2019-12-16 09:29:10'),
(2, 'ภารกิจ', 'mission', 'tb_missions', 'mission', '2019-12-16 09:29:10', '2019-12-16 09:29:10'),
(3, 'ภารกิจ2\r\n', 'mission2', 'tb_missions', 'mission', '2019-12-16 09:29:10', '2019-12-16 09:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `name`, `type`, `detail`, `created_at`, `updated_at`) VALUES
(4, 'ประวัติเทศบาล', 'history', '<p style=\"text-align: center;\"><span style=\"text-decoration: underline;\"><strong><span style=\"font-family: \'TH Srisakdi\', sans-serif; font-size: 52pt;\">เทศบาลตำบลแม่โป่ง</span></strong></span></p>\n<p style=\"text-align: center;\"><img src=\"../upload/tiny/XDB0j20ultV415.png\" alt=\"\" width=\"400\" height=\"400\" /></p>\n<table style=\"border-collapse: collapse; width: 500px; margin-left: auto; margin-right: auto;\" border=\"1\">\n<tbody>\n<tr>\n<td style=\"width: 50%; text-align: center;\"><span style=\"font-family: \'TH Chakra Petch\', sans-serif; font-size: 48pt;\">รายละเอียด 1</span></td>\n<td style=\"width: 50%; text-align: center;\"><span style=\"font-family: \'TH Chakra Petch\', sans-serif; font-size: 48pt;\">รายละเอียด 1</span></td>\n</tr>\n<tr>\n<td style=\"width: 50%; text-align: center;\"><span style=\"font-family: \'TH Chakra Petch\', sans-serif; font-size: 48pt;\">รายละเอียด 2</span></td>\n<td style=\"width: 50%; text-align: center;\"><span style=\"font-family: \'TH Chakra Petch\', sans-serif; font-size: 48pt;\">รายละเอียด 2</span></td>\n</tr>\n</tbody>\n</table>\n<h3 style=\"text-align: center;\"><span style=\"text-decoration: underline;\"><span style=\"font-size: 24pt;\"><strong><span style=\"font-family: \'TH Kodchasal\', sans-serif;\">วิสัยทัศน์การพัฒนาเทศบาลตำบลแม่โป่ง</span></strong></span></span></h3>\n<h4 style=\"text-align: center;\"><span style=\"font-family: \'TH Kodchasal\', sans-serif; font-size: 18pt;\">&ldquo;สิ่งแวดล้อมสมดุล เพิ่มพูนรายได้ ภูมิใจแหล่งศึกษา ชาวประชาเป็นสุข&rdquo;</span></h4>\n<h4 style=\"text-align: center;\"><span style=\"font-family: \'TH Kodchasal\', sans-serif; font-size: 18pt;\">&nbsp; &nbsp; &nbsp;โดยมุ่งเน้นการบริหารจัดการสิ่งแวดล้อม ให้เกิดความสมดุลกับพื้นที่ ตำบลแม่โป่ง พัฒนาและเพิ่มรายได้แก่กลุ่มอาชีพและประชาชนส่งเสริม</span></h4>\n<h4 style=\"text-align: center;\"><span style=\"font-family: \'TH Kodchasal\', sans-serif; font-size: 18pt;\">การพัฒนาแหล่งศึกษาเรียนรู้ และส่งเสริมคุณภาพชีวิตโดยรวมของประชาชนอย่างมีคุณภาพและทั่วถึง</span><span style=\"font-family: \'TH Kodchasal\', sans-serif; font-size: 18pt;\">&nbsp;</span></h4>\n<h3 style=\"text-align: center;\"><span style=\"text-decoration: underline; font-size: 24pt;\"><strong><span style=\"font-family: \'TH Kodchasal\', sans-serif;\">พันธกิจ เทศบาลตำบลแม่โป่ง</span><span style=\"font-family: \'TH Kodchasal\', sans-serif;\">&nbsp;</span></strong></span></h3>\n<h4 style=\"text-align: left; padding-left: 40px;\"><span style=\"font-family: \'TH Kodchasal\', sans-serif; font-size: 18pt;\">1.คุ้มครองดูแลส่งเสริมป้องกันบำรุงรักษาทรัพยากรธรรมชาติและสิ่งแวดล้อม พัฒนาและปรับปรุงโครงสร้างพื้นฐาน</span></h4>\n<h4 style=\"text-align: left; padding-left: 40px;\"><span style=\"font-family: \'TH Kodchasal\', sans-serif; font-size: 18pt;\">2.ส่งเสริมพัฒนาการเกษตรกรรมอย่างมีประสิทธิภาพตามวิถีเศรษฐกิจพอเพียง ประกอบอาชีพของประชาชนเพื่อนำไปสู่เศรษฐกิจชุมชนยั่งยืน</span></h4>\n<h4 style=\"text-align: left; padding-left: 40px;\"><span style=\"font-family: \'TH Kodchasal\', sans-serif; font-size: 18pt;\">3.ส่งเสริมและสนับสนุนการศึกษา ศาสนา วัฒนธรรม นันทนาการ ศิลปะจารีตประเพณี และภูมิปัญญาท้องถิ่นโดยทั่วถึง</span></h4>\n<h4 style=\"text-align: left; padding-left: 40px;\"><span style=\"font-family: \'TH Kodchasal\', sans-serif; font-size: 18pt;\">4.สนับสนุนการจัดสวัสดิการชุมชน และส่งเสริมคุณภาพชีวิตประชาชนในชุมชน</span></h4>\n<h4 style=\"text-align: left; padding-left: 40px;\"><span style=\"font-family: \'TH Kodchasal\', sans-serif; font-size: 18pt;\">5.การป้องกันบรรเทาสาธารณภัยต่างๆในพื้นที่</span></h4>\n<h4 style=\"text-align: left; padding-left: 40px;\"><span style=\"font-family: \'TH Kodchasal\', sans-serif; font-size: 18pt;\">6.ส่งเสริม พัฒนา ระบบตามหลักธรรมาภิบาล</span></h4>\n<p style=\"text-align: center;\"><br /><br /></p>', '2019-12-16 01:53:33', '2020-01-18 08:15:44'),
(5, 'ทดสอบ 1', 'test', '<p style=\"text-align: center;\"><span style=\"font-family: \'TH Chakra Petch\', sans-serif; font-size: 48pt;\">ทดสอบ 1</span></p>', '2019-12-16 01:53:59', '2019-12-16 09:01:48'),
(6, 'ทดสอบ 2', 'test2', '<p style=\"text-align: center;\"><span style=\"font-family: \'TH Kodchasal\', sans-serif; font-size: 48pt;\">ทดสอบ 2</span></p>', '2019-12-16 01:54:08', '2019-12-16 09:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `folder_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `type`, `table_name`, `folder_name`, `created_at`, `updated_at`) VALUES
(1, 'เทศบัญญัติ', 'bylaw', 'document_sub', 'bylaw', '2019-12-17 17:00:00', '2019-12-17 01:45:34'),
(2, 'แผนพัฒนา', 'development', 'document_sub', 'development', '2019-12-17 17:00:00', '2019-12-17 01:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `document_sub`
--

CREATE TABLE `document_sub` (
  `id` int(11) NOT NULL,
  `document_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `status` int(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document_sub`
--

INSERT INTO `document_sub` (`id`, `document_id`, `name`, `detail`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'เทศบัญญัติ 1', 'รายละเอียด เทศบัญญัติ 1', 1, '2019-12-17 02:13:46', '2019-12-17 02:14:23'),
(2, 1, 'เทศบัญญัติ 2', 'รายละเอียด เทศบัญญัติ 2', 0, '2019-12-17 02:16:02', '2019-12-17 02:16:02'),
(4, 2, 'แผนพัฒนา 2', 'รายละเอียด แผนพัฒนา 2', 1, '2019-12-17 02:31:20', '2019-12-17 02:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `folder_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `type`, `table_name`, `folder_name`, `created_at`, `updated_at`) VALUES
(1, 'Top Menu', 'top', 'menus_top', 'menus_top', '2020-01-17 09:08:06', '2020-01-17 09:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `menus_top`
--

CREATE TABLE `menus_top` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sub` int(11) NOT NULL DEFAULT 0,
  `target` int(4) NOT NULL DEFAULT 0,
  `type` int(4) NOT NULL DEFAULT 0,
  `list` int(4) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus_top`
--

INSERT INTO `menus_top` (`id`, `name`, `url`, `sub`, `target`, `type`, `list`, `status`, `created_at`, `updated_at`) VALUES
(1, 'เกี่ยวกับหน่วยงาน', '/', 0, 0, 0, 1, 1, '2020-01-23 01:58:47', '2020-01-23 01:58:47'),
(2, 'กิจกรรม', 'catalog/activity', 1, 0, 0, 1, 1, '2020-01-23 02:46:51', '2020-01-23 03:18:04'),
(3, 'ภารกิจ', 'catalog/mission', 1, 0, 0, 2, 1, '2020-01-23 03:11:51', '2020-01-23 03:11:51'),
(4, 'ภารกิจ2', 'catalog/mission', 3, 0, 0, 1, 1, '2020-01-23 06:19:31', '2020-01-23 06:19:31'),
(5, 'แผนงานต่างๆ', '/', 0, 0, 0, 1, 1, '2020-01-23 01:58:47', '2020-01-23 01:58:47'),
(6, 'แผนงบประมาณ', 'catalog/activity', 5, 0, 0, 1, 1, '2020-01-23 02:46:51', '2020-01-23 03:18:04'),
(7, 'เทศบัญญัติ', 'https://www.dlt.go.th/site/chiangmai/m-photo/5437/', 5, 0, 1, 2, 1, '2020-01-23 03:11:51', '2020-01-23 06:54:53'),
(8, 'งบประมาณ 61', 'catalog/mission', 6, 0, 0, 1, 1, '2020-01-23 06:19:31', '2020-01-23 06:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `detail` text NOT NULL,
  `table_name` varchar(150) NOT NULL,
  `folder_name` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `name`, `type`, `detail`, `table_name`, `folder_name`, `created_at`, `updated_at`) VALUES
(1, 'ผู้บริหาร', 'executive', 'ผู้บริหาร', 'officer_sub', 'executive', '2020-01-11 09:46:43', '2020-01-11 09:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `officer_sub`
--

CREATE TABLE `officer_sub` (
  `id` int(11) NOT NULL,
  `officer_id` int(4) NOT NULL,
  `name` varchar(150) NOT NULL,
  `position` varchar(255) NOT NULL,
  `block` int(4) NOT NULL,
  `detail` text DEFAULT NULL,
  `list` int(4) NOT NULL,
  `status` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `officer_sub`
--

INSERT INTO `officer_sub` (`id`, `officer_id`, `name`, `position`, `block`, `detail`, `list`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'นายภัทรชัย ภักดีแก้ว', 'หัวหน้าฝ่ายอำนวยการ', 1, NULL, 1, 1, '2020-01-16 07:40:40', '2020-01-17 07:46:14'),
(2, 1, 'นายเอกพล จรบุรมณ์', 'เจ้าพนักงานทะเบียน', 2, NULL, 1, 1, '2020-01-16 07:44:11', '2020-01-17 07:46:31'),
(3, 1, 'นางสุพรรณี ชูศรีวาสน์', 'เจ้าพนักงานทะเบียน', 2, NULL, 2, 1, '2020-01-16 07:47:08', '2020-01-17 07:46:40'),
(4, 1, 'นางกันจนา พุดดี', 'นักประชาสัมพันธ์', 2, NULL, 3, 1, '2020-01-16 07:48:18', '2020-01-17 07:46:52'),
(5, 1, 'นางสาวรุ่งนภา โคตรุโร', 'เจ้าหน้าที่บริหารงานทั่วไป', 2, NULL, 4, 1, '2020-01-16 07:49:05', '2020-01-17 07:47:02'),
(6, 1, 'นางชนิกา เผ่าศิริ', 'นักพัฒนาชุมชน', 2, NULL, 5, 1, '2020-01-16 07:49:39', '2020-01-17 07:47:16'),
(7, 1, 'นางวราพร แสนขันธ์', 'นักพัฒนาชุมชน', 2, NULL, 6, 1, '2020-01-16 07:50:29', '2020-01-17 07:47:25'),
(8, 1, 'นางสาวทุเรียน แวงวรรณ', 'นักทรัพยากรบุคคล', 2, NULL, 7, 1, '2020-01-16 07:51:02', '2020-01-17 07:47:34'),
(9, 1, 'นางสาวอรพันธ์ วรวิเศษ', 'นิติกร', 2, NULL, 8, 1, '2020-01-16 07:51:44', '2020-01-17 07:47:47'),
(10, 1, 'จ่าเอกขรรค์ชัย ดุจประสงค์', 'เจ้าพนักงานป้องกันและบรรเทาสาธารณภัย', 3, NULL, 1, 1, '2020-01-16 07:54:00', '2020-01-17 07:47:57'),
(11, 1, 'นายประยุค แดนกาไสย์', 'เจ้าพนักงานป้องกันและบรรเทาสาธารณภัย', 3, NULL, 4, 1, '2020-01-16 07:56:00', '2020-01-17 07:48:06'),
(12, 1, 'นางสาววัชรา หันจรัส', 'ผู้ช่วยเจ้าพนักงานธุรการ', 3, NULL, 3, 1, '2020-01-16 07:58:29', '2020-01-17 07:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `table_name` varchar(150) NOT NULL,
  `folder_name` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `name`, `type`, `table_name`, `folder_name`, `created_at`, `updated_at`) VALUES
(1, 'ข่าวจัดซื้อจัดจ้าง', 'news', 'purchase_sub', 'purchase_news', '2020-01-09 02:04:41', '2020-01-09 02:04:41'),
(2, 'ประกาศราคากลาง', 'mid', 'purchase_sub', 'purchase_mid', '2020-01-09 02:04:41', '2020-01-09 02:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_sub`
--

CREATE TABLE `purchase_sub` (
  `id` int(11) NOT NULL,
  `purchase_id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text DEFAULT NULL,
  `status` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_sub`
--

INSERT INTO `purchase_sub` (`id`, `purchase_id`, `name`, `detail`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ประกวดราคาจ้างกำจัดขยะมูลฝอย ตามโครงการจัดเก็บขยะในพื้นที่ตำบลแม่สา เพื่อร่วมใจพัฒนาสิ่งแวดล้อม', 'ประกวดราคาจ้างกำจัดขยะมูลฝอย ตามโครงการจัดเก็บขยะในพื้นที่ตำบลแม่สา เพื่อร่วมใจพัฒนาสิ่งแวดล้อม ประจำปีงบประมาณ พ.ศ.2533 (ครั้งที่ 2 ) ด้วยวิธีประกวดราคาอิเล็กทรอนิกส์ (e-bidding)', 1, '2020-01-09 03:33:39', '2020-01-09 03:35:33'),
(2, 2, 'ประกาศผู้ชนะการเสนอราคา จ้างติดต้้งรางน้ำฝนแบบ ป.ปลา มาตรฐาน 6 นิ้ว ศูนย์พัฒนาเด็กเล็ก', 'ประกาศผู้ชนะการเสนอราคา จ้างติดต้้งรางน้ำฝนแบบ ป.ปลา มาตรฐาน 6 นิ้ว ศูนย์พัฒนาเด็กเล็ก', 1, '2020-01-09 03:58:01', '2020-01-09 08:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `name`, `name2`) VALUES
(1, 'web1', 'เทศบาล1', 'เทศบาล1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_activitys`
--

CREATE TABLE `tb_activitys` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `status` int(4) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_activitys`
--

INSERT INTO `tb_activitys` (`id`, `name`, `detail`, `status`, `created_at`, `updated_at`) VALUES
(1, 'กิจกรรม 1', 'รายละเอียด', 1, '2019-12-14 10:09:12', '2019-12-15 19:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_missions`
--

CREATE TABLE `tb_missions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `status` int(4) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_missions`
--

INSERT INTO `tb_missions` (`id`, `name`, `detail`, `status`, `created_at`, `updated_at`) VALUES
(3, 'mission 1', 'รายละเอียด 1', 1, '2019-12-16 02:09:20', '2020-01-18 09:59:53'),
(4, 'mission 2', 'รายละเอียด 2', 1, '2019-12-17 11:43:07', '2020-01-18 09:59:20'),
(5, 'mission 3', 'รายละเอียด 3', 1, '2019-12-17 11:43:28', '2020-01-11 02:29:42'),
(6, 'mission 4', 'รายละเอียด 4', 1, '2019-12-17 11:43:45', '2020-01-18 09:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `folder_name` varchar(100) NOT NULL,
  `master_id` int(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `file_name`, `table_name`, `folder_name`, `master_id`, `created_at`, `updated_at`) VALUES
(1, 'GaX73144fSSQ46.jpg', 'officer_sub', 'executive', 1, '2020-01-17 07:46:14', '2020-01-17 07:46:14'),
(2, '6HTCl31jgdYw46.jpg', 'officer_sub', 'executive', 2, '2020-01-17 07:46:31', '2020-01-17 07:46:31'),
(3, 'Q2Ijv409o7F946.jpg', 'officer_sub', 'executive', 3, '2020-01-17 07:46:40', '2020-01-17 07:46:40'),
(4, 'uUsXL52wXsab46.jpg', 'officer_sub', 'executive', 4, '2020-01-17 07:46:52', '2020-01-17 07:46:52'),
(5, 'DJbUD02hfEf747.jpg', 'officer_sub', 'executive', 5, '2020-01-17 07:47:02', '2020-01-17 07:47:02'),
(6, 'mgfUn16iI3ya47.jpg', 'officer_sub', 'executive', 6, '2020-01-17 07:47:16', '2020-01-17 07:47:16'),
(7, 'XRqPi25dwThf47.jpg', 'officer_sub', 'executive', 7, '2020-01-17 07:47:25', '2020-01-17 07:47:25'),
(8, 'UeVzb34SqOo447.jpg', 'officer_sub', 'executive', 8, '2020-01-17 07:47:34', '2020-01-17 07:47:34'),
(9, '5wXpp47tpvWm47.jpg', 'officer_sub', 'executive', 9, '2020-01-17 07:47:47', '2020-01-17 07:47:47'),
(10, 'MXsWV57noHSn47.jpg', 'officer_sub', 'executive', 10, '2020-01-17 07:47:57', '2020-01-17 07:47:57'),
(11, 'puswD06FGaWu48.jpg', 'officer_sub', 'executive', 11, '2020-01-17 07:48:06', '2020-01-17 07:48:06'),
(12, 'hQFrg19UixN449.jpg', 'officer_sub', 'executive', 12, '2020-01-17 07:49:19', '2020-01-17 07:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `password_hash`, `created_at`, `updated_at`) VALUES
(1, 'dew', 'dew', 'dew', '$2y$10$ELi4kJACrUkPCUf1dl2jaeYdhn9vobHd0XH3rF/ip5WRTpbA8mdR.', NULL, NULL),
(2, 'test', 'test', 'test', '$2y$10$PE00WqFu/Z8Hk7brC3I/uez5VYoomOg95k4n.7nOOX3mMnnlt5f6y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `youtubes`
--

CREATE TABLE `youtubes` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `detail` text DEFAULT NULL,
  `embed` text NOT NULL,
  `status` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `youtubes`
--

INSERT INTO `youtubes` (`id`, `name`, `detail`, `embed`, `status`, `created_at`, `updated_at`) VALUES
(1, 'หลักนิติธรรม', 'หลักนิติธรรม', 'Q0gvEthkwfo', 1, '2020-01-09 06:46:10', '2020-01-15 07:45:17'),
(2, 'พระราชบัญญัติข้อมูลข่าวสารของราชการ พ.ศ.2540', 'พระราชบัญญัติข้อมูลข่าวสารของราชการ พ.ศ.2540', '_12DERulSBI', 1, '2020-01-09 06:47:42', '2020-01-15 07:45:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_sub`
--
ALTER TABLE `document_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus_top`
--
ALTER TABLE `menus_top`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officer_sub`
--
ALTER TABLE `officer_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_sub`
--
ALTER TABLE `purchase_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_activitys`
--
ALTER TABLE `tb_activitys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_missions`
--
ALTER TABLE `tb_missions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtubes`
--
ALTER TABLE `youtubes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `document_sub`
--
ALTER TABLE `document_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus_top`
--
ALTER TABLE `menus_top`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `officer_sub`
--
ALTER TABLE `officer_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_sub`
--
ALTER TABLE `purchase_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_activitys`
--
ALTER TABLE `tb_activitys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_missions`
--
ALTER TABLE `tb_missions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `youtubes`
--
ALTER TABLE `youtubes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
