-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2020 at 09:49 AM
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
-- Database: `tweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `password_hash`) VALUES
(1, 'Itg', 'itg', 'itg', '$2y$10$k06vPLRKPXWearRRNtJoKee1casRkfcCsVqVJL4rhNlb0UqmWpc7u');

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE `domains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `database_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_database` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_database` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_domain` date NOT NULL,
  `end_domain` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`id`, `name`, `domain_name`, `host_name`, `database_name`, `password_database`, `user_database`, `start_domain`, `end_domain`, `created_at`, `updated_at`) VALUES
(1, 'web1', 'www.web1.com', 'localhost', 'web1', '12345678', 'root', '2019-12-13', '2019-12-27', '2019-12-12 17:00:00', '2019-12-12 17:00:00'),
(2, 'web2', 'www.web2.com', 'localhost', 'web2', '12345678', 'root', '2019-12-13', '2020-12-13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `route_name` varchar(100) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `is_sub` int(4) NOT NULL DEFAULT 0,
  `manage_sub` int(11) NOT NULL,
  `frontend` int(4) NOT NULL,
  `backend` int(4) NOT NULL,
  `list` int(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `route_name`, `table_name`, `is_sub`, `manage_sub`, `frontend`, `backend`, `list`, `created_at`, `updated_at`) VALUES
(1, 'หน้าหลัก', '/', 'defaults', 0, 0, 1, 0, 1, '2019-12-14 00:29:39', '2020-01-23 09:56:04'),
(2, 'ข้อมูลรูปภาพ', 'catalog', 'catalogs', 1, 1, 1, 1, 4, '2019-12-14 10:51:56', '2020-01-20 02:31:08'),
(3, 'ข้อมูล Module', 'module', 'modules', 0, 0, 0, 1, 2, '2019-12-14 10:51:56', '2019-12-14 08:00:56'),
(4, 'ข้อมูลจัดซื้อจัดจ้าง', 'purchase', 'purchases', 1, 1, 1, 1, 5, '2019-12-14 10:51:56', '2019-12-14 08:00:56'),
(5, 'ข้อมูล Youtube', 'youtube', 'youtubes', 0, 0, 1, 1, 6, '2019-12-14 10:51:56', '2020-01-23 09:59:47'),
(6, 'ข้อมูลจัดการเอง', 'content', 'contents', 1, 0, 1, 1, 7, '2019-12-14 00:29:39', '2020-01-10 06:37:34'),
(7, 'ข้อมูลเจ้าหน้าที่', 'officer', 'officers', 1, 1, 1, 1, 8, '2020-01-11 09:36:43', '2020-01-11 09:37:36'),
(8, 'เมนู', 'menu', 'menus', 1, 1, 0, 1, 3, '2020-01-17 09:03:08', '2020-01-17 09:08:53'),
(9, 'ข้อมูลไฟล์เอกสาร', 'document', 'documents', 1, 1, 1, 1, 9, '2019-12-14 10:51:56', '2020-01-23 10:01:12'),
(10, 'ผู้ใช้งานระบบ', 'user', 'users', 0, 0, 0, 1, 10, '2020-01-24 01:51:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `domain_id` int(4) NOT NULL,
  `module_id` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `domain_id`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-01-24 02:00:18', '2020-01-24 02:00:18'),
(2, 1, 2, '2020-01-24 02:00:18', '2020-01-24 02:00:18'),
(3, 1, 3, '2020-01-24 02:00:18', '2020-01-24 02:00:18'),
(4, 1, 4, '2020-01-24 02:00:18', '2020-01-24 02:00:18'),
(5, 1, 5, '2020-01-24 02:00:18', '2020-01-24 02:00:18'),
(6, 1, 6, '2020-01-24 02:00:18', '2020-01-24 02:00:18'),
(7, 1, 7, '2020-01-24 02:00:18', '2020-01-24 02:00:18'),
(8, 1, 8, '2020-01-24 02:00:18', '2020-01-24 02:00:18'),
(9, 1, 9, '2020-01-24 02:00:18', '2020-01-24 02:00:18'),
(10, 1, 10, '2020-01-24 02:00:18', '2020-01-24 02:00:18');

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
(1, 'manage web', 'manage web', 'manage web');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `domains`
--
ALTER TABLE `domains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
