-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 01:35 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outdoor`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` int(11) NOT NULL,
  `action_title` varchar(111) NOT NULL,
  `action_slug` varchar(111) NOT NULL,
  `class` varchar(100) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `action_title`, `action_slug`, `class`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Add', 'add', 'info', NULL, '2021-01-18 09:43:54', '2021-01-18 09:43:54'),
(2, 'Edit', 'edit', 'info', 'fas fa-pencil-alt', '2021-01-18 09:43:54', '2021-01-18 09:43:54'),
(3, 'Delete', 'delete', 'danger', 'fas fa-trash', '2021-01-18 09:44:32', '2021-01-18 09:44:32'),
(4, 'View', 'view', 'info', 'fas fa-eye', '2021-01-18 09:44:32', '2021-01-18 09:44:32'),
(5, 'Export', 'export', 'info', NULL, '2021-01-18 11:04:06', '2021-01-18 11:04:06'),
(6, 'Import', 'import', 'info', NULL, '2021-01-18 11:04:06', '2021-01-18 11:04:06'),
(8, 'Status', 'status', 'success', NULL, '2021-02-12 10:56:40', '2021-02-12 10:56:40'),
(9, 'Reset Password', 'password', 'primary', 'fas fa-key', '2021-02-23 04:47:04', '2021-02-23 04:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `additional_images`
--

CREATE TABLE `additional_images` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `additional_images`
--

INSERT INTO `additional_images` (`id`, `page_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '2068_1628162048.jpg', '2021-08-05 11:14:08', '2021-08-05 11:14:08'),
(2, 1, '3951_1628162048.jpg', '2021-08-05 11:14:08', '2021-08-05 11:14:08'),
(3, 1, '4036_1628162048.jpg', '2021-08-05 11:14:08', '2021-08-05 11:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `action_id` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `file_type` varchar(100) DEFAULT 'Image' COMMENT 'Image,Video',
  `file` varchar(255) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `description`, `file_type`, `file`, `status`, `created_at`, `updated_at`) VALUES
(15, 'We have your ideas in mind and aim to be innovative and creative in all of our bespoke designs.', 'Video', '8252_1638528221.mp4', 1, '2021-08-31 10:23:47', '2021-12-03 23:13:44'),
(16, 'We have your ideas in mind and aim to be innovative and creative in all of our bespoke designs.', 'Image', '8300_1630406762.jpg', 0, '2021-08-31 10:46:02', '2021-09-08 22:28:33'),
(17, 'We have your ideas in mind and aim to be innovative and creative in all of our bespoke designs.', 'Image', '3275_1630407599.jpg', 0, '2021-08-31 23:29:59', '2021-09-08 22:28:34'),
(18, 'We have your ideas in mind and aim to be innovative and creative in all of our bespoke designs.', 'Image', '7031_1630407609.jpg', 0, '2021-08-31 23:30:09', '2021-09-08 22:28:37'),
(19, 'We have your ideas in mind and aim to be innovative and creative in all of our bespoke designs.', 'Image', '2007_1630407619.jpg', 0, '2021-08-31 23:30:19', '2021-09-08 22:28:39'),
(20, 'We have your ideas in mind and aim to be innovative and creative in all of our bespoke designs.', 'Image', '9618_1630407630.jpeg', 0, '2021-08-31 23:30:30', '2021-09-08 22:28:41'),
(21, 'We have your ideas in mind and aim to be innovative and creative in all of our bespoke designs.', 'Image', '5119_1630407639.jpg', 0, '2021-08-31 23:30:39', '2021-09-08 22:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand_slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `brand_slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Mackey1', 'mackey1', '4050_1639375946.jpg', 1, '2021-12-13 06:12:26', '2021-12-22 08:04:01'),
(17, 'Equisential', 'equisential', '3476_1639376239.jpg', 1, '2021-12-13 06:17:19', '2021-12-13 06:17:19'),
(29, 'demo', 'demo', '2396_1640160328.png', 1, '2021-12-22 08:05:28', '2021-12-22 08:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `cart_id` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` float NOT NULL,
  `coupon_code` varchar(100) DEFAULT NULL,
  `coupon_amount` float DEFAULT NULL,
  `shipping_method` varchar(100) DEFAULT NULL,
  `shipping_price` float NOT NULL DEFAULT 0,
  `tax_amount` float NOT NULL,
  `total` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `session_id`, `cart_id`, `product_id`, `size`, `color`, `price`, `quantity`, `sub_total`, `coupon_code`, `coupon_amount`, `shipping_method`, `shipping_price`, `tax_amount`, `total`, `created_at`, `updated_at`) VALUES
(11, 'd7gzfSLkNplCpTb2q5VBsLQJp67RdTR39cV5IC3U', '1MHQDOCT', 16, '1kg', 'pink', 120, 2, 240, '', 0, 'Free', 0, 24, 264, '2021-07-07 10:59:43', '2021-07-07 12:09:13'),
(12, 'e6dNi3H8efjU1YhIPQOHhTnxAmdrjEQ9UeCJIQqC', 'JF33QY6O', 16, '2kg', 'black', 122, 1, 122, '', 0, 'Free', 0, 12.2, 134.2, '2021-07-08 04:31:14', '2021-07-08 05:34:59'),
(17, 'ZsAUVckNksYNin9sdvcAX84dqQFIvqhHf7vXZMGa', 'RZDXJ90U', 16, '2kg', 'black', 142.8, 1, 142.8, '', 0, NULL, 200, 14.28, 157.08, '2021-07-08 10:29:06', '2021-07-08 10:29:12'),
(19, 'j8Xyw8yUg0wN095t1isjjlo7GugodALCMAPrwH7b', '23O2DFNE', 17, '', '', 123, 1, 123, '', 0, NULL, 200, 12.3, 135.3, '2021-07-09 00:57:34', '2021-07-09 00:58:17'),
(20, 'j8Xyw8yUg0wN095t1isjjlo7GugodALCMAPrwH7b', '23O2DFNE', 16, '1kg', 'pink', 122.4, 4, 489.6, '', 0, NULL, 44.99, 48.96, 538.56, '2021-07-09 00:58:12', '2021-07-09 00:58:29'),
(23, 'snIJtQjrWFBNo6A9GsDYqarRYvcGXgcjlNUBpaEi', '3LH2MHD4', 17, '', '', 123, 1, 123, NULL, NULL, NULL, 0, 12.3, 135.3, '2021-07-09 01:12:16', '2021-07-09 01:12:16'),
(24, 't8pZaEux6gOSgwMXTkteag9okcRC5IPqSt7z8viI', 'Z5YCQUPZ', 16, '1kg', 'pink', 122.4, 1, 122.4, '', 0, NULL, 200, 12.24, 134.64, '2021-07-09 17:20:38', '2021-07-09 17:20:43'),
(32, 'UzYmTBg8Z3SvytCGgnHX0RgAgH4ncTHAOMzxZVrz', 'A12IMPZO', 16, '1kg', 'pink', 122.4, 1, 122.4, '', 0, NULL, 20, 12.24, 134.64, '2021-07-12 22:51:32', '2021-07-12 22:51:45'),
(33, 'bHWHKLRk2mHp4JtQIr6gGVYSlxJ5nTSt9HdFpMIp', 'K2B0MJAI', 16, '1kg', 'pink', 122.4, 1, 122.4, '', 0, NULL, 20, 12.24, 134.64, '2021-07-13 00:23:09', '2021-07-13 00:23:17'),
(34, 'dkJBfPByMerih6k9s0EdWfTn3Gv8ll4uH8wCdI4Z', 'U8U0JCGT', 17, '', '', 123, 1, 123, '', 0, NULL, 20, 12.3, 135.3, '2021-07-13 17:31:55', '2021-07-13 17:31:59'),
(35, 'yum7Y29cXvPZe7Q2rRumnqevE59LrX8T94BRHXcw', 'LH2P7BWE', 16, '1kg', 'pink', 122.4, 1, 122.4, '', 0, NULL, 20, 0, 122.4, '2021-07-13 19:41:08', '2021-07-13 19:54:24'),
(41, 'CU84HmoCc4QYl3pxxLlT97VY2laSH8ujfRIcM9RR', 'UWWKDD7E', 19, '32', 'black', 138, 1, 138, '', 0, NULL, 20, 0, 138, '2021-07-14 02:09:15', '2021-07-14 02:09:18'),
(42, 'F2x5RbdAhqkNPzYcUGpB5cRz81uXpquKaaZSHndn', 'MO75XRAX', 16, '1kg', 'pink', 122.4, 1, 122.4, '', 0, NULL, 20, 0, 122.4, '2021-07-14 17:48:28', '2021-07-14 17:48:32'),
(43, 'oa2OTIsfbIThc9lexA1xWceXwRirraOr6Qh76HFP', 'DAM6BOER', 16, '2kg', 'black', 142.8, 1, 142.8, '', 0, NULL, 20, 0, 142.8, '2021-12-10 20:12:27', '2021-12-10 20:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Outdoor kitchens', 'Our luxurious and efficient awnings allow our clients to make use of their Outdoor Kitchens all year round.', '6663_1628231242.jpg', 1, '2021-08-06 06:27:23', '2021-08-06 06:28:21'),
(2, 'Outdoor Structures', 'We use innovative design and meticulous attention to detail to ensure that our projects match our client\'s exact specific requirements.', '5295_1629722232.jpg', 1, '2021-08-06 06:28:40', '2021-08-24 01:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `contact_no`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(8, 'Vikas Nagar', 'vikas.nagar@commediait.com', '8755883873', 'This is test mail', 'djsncjsdncj sdajkcvn kjidas cnklji dasncvklj dasklj vnkljdnsvkljdnas vkljn daskljvndkljsn vkljdnas vklj dnasvkljn dkljs vnkljdsn vkljdnskljv ndkljs vnkljdasn', '2021-08-07 23:06:52', '2021-08-07 23:06:52'),
(9, 'Maggie Comerford', 'margaretcomerford@gmail.com', '0862358716', 'Price List', 'Can you please send me on a price list', '2021-11-01 10:06:53', '2021-11-01 10:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(39, '1208_1628751139.jpg', 1, '2021-08-12 19:22:19', '2021-08-12 19:22:19'),
(41, '4617_1628766425.jpeg', 1, '2021-08-12 23:37:05', '2021-08-12 23:37:05'),
(42, '5418_1628766562.jpeg', 1, '2021-08-12 23:39:22', '2021-08-12 23:39:22'),
(43, '3589_1628766580.jpeg', 1, '2021-08-12 23:39:40', '2021-08-12 23:39:40'),
(44, '2367_1628766595.jpeg', 1, '2021-08-12 23:39:56', '2021-08-12 23:39:56'),
(45, '9098_1628766607.jpeg', 1, '2021-08-12 23:40:07', '2021-08-12 23:40:07'),
(46, '4007_1628766620.jpeg', 1, '2021-08-12 23:40:20', '2021-08-12 23:40:20'),
(48, '4282_1628766669.jpeg', 1, '2021-08-12 23:41:09', '2021-08-12 23:41:09'),
(49, '9911_1628766691.jpeg', 1, '2021-08-12 23:41:31', '2021-08-12 23:41:31'),
(50, '6813_1628766705.jpeg', 1, '2021-08-12 23:41:45', '2021-08-12 23:41:45'),
(51, '9570_1628766728.jpeg', 1, '2021-08-12 23:42:08', '2021-08-12 23:42:08'),
(52, '9301_1628766752.jpeg', 1, '2021-08-12 23:42:32', '2021-08-12 23:42:32'),
(53, '1324_1628766775.jpeg', 1, '2021-08-12 23:42:56', '2021-08-12 23:42:56'),
(54, '1946_1628766853.jpeg', 1, '2021-08-12 23:44:14', '2021-08-12 23:44:14'),
(55, '1330_1628766908.jpeg', 1, '2021-08-12 23:45:08', '2021-08-12 23:45:08'),
(56, '6340_1628767420.jpeg', 1, '2021-08-12 23:53:40', '2021-08-12 23:53:40'),
(57, '6752_1628767448.jpeg', 1, '2021-08-12 23:54:08', '2021-08-12 23:54:08'),
(58, '3939_1628767469.jpeg', 1, '2021-08-12 23:54:29', '2021-08-12 23:54:29'),
(59, '8190_1628767565.jpeg', 1, '2021-08-12 23:56:05', '2021-08-12 23:56:05'),
(60, '5819_1628767604.jpeg', 1, '2021-08-12 23:56:44', '2021-08-12 23:56:44'),
(61, '7101_1628767619.jpeg', 1, '2021-08-12 23:56:59', '2021-08-12 23:56:59'),
(62, '8317_1628767634.jpeg', 1, '2021-08-12 23:57:14', '2021-08-12 23:57:14'),
(63, '6901_1628767677.jpeg', 1, '2021-08-12 23:57:57', '2021-08-12 23:57:57'),
(64, '1423_1628767705.jpeg', 1, '2021-08-12 23:58:25', '2021-08-12 23:58:25'),
(65, '1333_1628767725.jpeg', 1, '2021-08-12 23:58:45', '2021-08-12 23:58:45'),
(66, '4669_1628768182.jpeg', 1, '2021-08-13 00:06:23', '2021-08-13 00:06:23'),
(67, '9880_1630254567.jpg', 1, '2021-08-30 04:59:27', '2021-08-30 04:59:27'),
(68, '5837_1630254567.jpg', 1, '2021-08-30 04:59:27', '2021-08-30 04:59:27'),
(69, '8231_1630254567.jpg', 1, '2021-08-30 04:59:27', '2021-08-30 04:59:27'),
(70, '7080_1630254567.jpg', 1, '2021-08-30 04:59:27', '2021-08-30 04:59:27'),
(71, '4484_1630254567.jpg', 1, '2021-08-30 04:59:28', '2021-08-30 04:59:28'),
(72, '1167_1630254568.jpg', 1, '2021-08-30 04:59:28', '2021-08-30 04:59:28'),
(73, '9295_1630254568.jpg', 1, '2021-08-30 04:59:28', '2021-08-30 04:59:28'),
(74, '2403_1630254568.jpg', 1, '2021-08-30 04:59:28', '2021-08-30 04:59:28'),
(75, '1415_1630254568.jpeg', 1, '2021-08-30 04:59:28', '2021-08-30 04:59:28'),
(76, '6771_1630254568.jpeg', 1, '2021-08-30 04:59:28', '2021-08-30 04:59:28'),
(77, '5363_1630254568.jpeg', 1, '2021-08-30 04:59:28', '2021-08-30 04:59:28'),
(78, '3959_1630254568.jpeg', 1, '2021-08-30 04:59:29', '2021-08-30 04:59:29'),
(79, '9438_1630254569.jpeg', 1, '2021-08-30 04:59:29', '2021-08-30 04:59:29'),
(80, '5908_1630254569.jpeg', 1, '2021-08-30 04:59:29', '2021-08-30 04:59:29'),
(81, '9827_1630254569.jpeg', 1, '2021-08-30 04:59:29', '2021-08-30 04:59:29'),
(82, '4786_1630254569.jpg', 1, '2021-08-30 04:59:29', '2021-08-30 04:59:29'),
(83, '5051_1630254569.jpg', 1, '2021-08-30 04:59:29', '2021-08-30 04:59:29'),
(84, '8274_1630254569.jpg', 1, '2021-08-30 04:59:29', '2021-08-30 04:59:29'),
(85, '9405_1630254569.jpg', 1, '2021-08-30 04:59:29', '2021-08-30 04:59:29'),
(86, '4510_1630254569.jpg', 1, '2021-08-30 04:59:29', '2021-08-30 04:59:29'),
(87, '2891_1634547013.jpeg', 1, '2021-10-18 21:20:13', '2021-10-18 21:20:13'),
(88, '6677_1634547013.jpeg', 1, '2021-10-18 21:20:13', '2021-10-18 21:20:13'),
(89, '7643_1634547013.jpeg', 1, '2021-10-18 21:20:13', '2021-10-18 21:20:13'),
(90, '1828_1634547013.jpeg', 1, '2021-10-18 21:20:13', '2021-10-18 21:20:13'),
(91, '2056_1634547013.jpeg', 1, '2021-10-18 21:20:13', '2021-10-18 21:20:13'),
(92, '5986_1634547013.jpeg', 1, '2021-10-18 21:20:13', '2021-10-18 21:20:13'),
(93, '4728_1634547013.jpeg', 1, '2021-10-18 21:20:13', '2021-10-18 21:20:13'),
(94, '1902_1634547013.jpeg', 1, '2021-10-18 21:20:13', '2021-10-18 21:20:13'),
(95, '4601_1634547013.jpeg', 1, '2021-10-18 21:20:13', '2021-10-18 21:20:13'),
(96, '6767_1634547013.jpeg', 1, '2021-10-18 21:20:13', '2021-10-18 21:20:13'),
(97, '8953_1636629982.jpg', 1, '2021-11-11 23:56:22', '2021-11-11 23:56:22'),
(98, '7216_1636629982.jpg', 1, '2021-11-11 23:56:22', '2021-11-11 23:56:22'),
(99, '4889_1636629982.jpg', 1, '2021-11-11 23:56:22', '2021-11-11 23:56:22'),
(100, '9371_1636630035.jpg', 1, '2021-11-11 23:57:15', '2021-11-11 23:57:15'),
(101, '4057_1636630035.jpg', 1, '2021-11-11 23:57:15', '2021-11-11 23:57:15'),
(102, '1157_1636630035.jpg', 1, '2021-11-11 23:57:15', '2021-11-11 23:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `item_price` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `order_id`, `item_name`, `item_price`, `quantity`) VALUES
(4, 3, 'product2', 20, 2),
(35, 23, 'Product1', 39, 1),
(36, 24, 'Product1', 39, 1),
(37, 25, 'Product1', 39, 1),
(38, 26, 'Product1', 39, 1),
(39, 27, 'Product1', 39, 1),
(40, 28, 'Product1', 39, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mailing_lists`
--

CREATE TABLE `mailing_lists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mailing_lists`
--

INSERT INTO `mailing_lists` (`id`, `name`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vikas Nagar', 'vikas.nagar@commediait.com', 1, '2021-08-06 10:05:35', '2021-08-06 10:06:04'),
(2, 'Santosh Kumar', 'santosh.kumar@commediait.com', 1, '2021-08-06 10:05:51', '2021-08-06 10:06:01'),
(3, 'Ankit', 'ankit.kumar@commediait.com', 1, '2021-08-07 09:33:13', '2021-08-07 09:33:13'),
(4, 'Conor O Brien', 'conorob@gmail.com', 1, '2021-09-10 10:47:10', '2021-09-10 10:47:10'),
(5, 'Carmel Bracken', 'CarmelBracken@designwise.ie', 1, '2021-09-11 21:26:43', '2021-09-11 21:26:43'),
(6, 'John Delaney', 'jngdelaney@gmail.com', 1, '2021-10-04 23:19:35', '2021-10-04 23:19:35'),
(7, 'Owen Chubb', 'owenchubb@gmail.com', 1, '2021-10-12 10:40:52', '2021-10-12 10:40:52'),
(8, 'Barry O Neill', 'barryjohnoneill@gmail.com', 1, '2021-11-28 04:30:22', '2021-11-28 04:30:22'),
(9, 'Paul Roche', 'jamespaulroche@gmail.com', 1, '2021-12-17 22:19:28', '2021-12-17 22:19:28');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `billing_first_name` varchar(200) NOT NULL,
  `billing_last_name` varchar(200) NOT NULL,
  `billing_email` varchar(200) NOT NULL,
  `billing_phone` varchar(200) NOT NULL,
  `billing_country` varchar(200) NOT NULL,
  `billing_city` varchar(200) NOT NULL,
  `billing_address` text NOT NULL,
  `amount` varchar(255) NOT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT 1,
  `charge_id` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `collect` tinyint(1) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `billing_first_name`, `billing_last_name`, `billing_email`, `billing_phone`, `billing_country`, `billing_city`, `billing_address`, `amount`, `order_status`, `charge_id`, `order_id`, `transaction_id`, `collect`, `payment_status`, `created_at`, `updated_at`) VALUES
(3, 'Lalit', 'jaiswal', 'lalit.graffersid.com', '1234567890', '+91', 'india', 'indore', '20', 1, 'lalit1234567890', 'lalit1234567890', 'lalit1234567890', NULL, 'succeeded', '2020-04-17 16:31:46', '2020-04-17 09:31:46'),
(22, 'Lalit', 'jaiswal', 'lalit.jaiswal@graffersid.com', '01234567890', '+353', 'indore', 'indore', '3900', 1, 'cUTQGZNYLJqgmcbN1Lgh9lQWkw0jNzhOmFk20bFe', '61CAFD1666CD5682902944', 'cUTQGZNYLJqgmcbN1Lgh9lQWkw0jNzhOmFk20bFe', NULL, 'Succeeded', '2021-12-28 12:03:34', '2021-12-28 17:33:34'),
(23, 'Lalit', 'jaiswal', 'lalit.jaiswal@graffersid.com', '01234567890', '+353', 'indore', 'indore', '3900', 1, 'cUTQGZNYLJqgmcbN1Lgh9lQWkw0jNzhOmFk20bFe', '61CAFD51474A9760458210', 'cUTQGZNYLJqgmcbN1Lgh9lQWkw0jNzhOmFk20bFe', NULL, 'Succeeded', '2021-12-28 12:04:33', '2021-12-28 17:34:33'),
(24, 'Lalit', 'jaiswal', 'lalit.jaiswal@graffersid.com', '01234567890', '+353', 'indore', 'indore', '3900', 1, 'cUTQGZNYLJqgmcbN1Lgh9lQWkw0jNzhOmFk20bFe', '61CAFDF691206349551229', 'cUTQGZNYLJqgmcbN1Lgh9lQWkw0jNzhOmFk20bFe', NULL, 'Succeeded', '2021-12-28 12:07:18', '2021-12-28 17:37:18'),
(25, 'Lalit', 'jaiswal', 'lalit.jaiswal@graffersid.com', '01234567890', '+353', 'indore', 'indore', '3900', 1, 'cUTQGZNYLJqgmcbN1Lgh9lQWkw0jNzhOmFk20bFe', '61CAFE366ACAF237435881', 'cUTQGZNYLJqgmcbN1Lgh9lQWkw0jNzhOmFk20bFe', NULL, 'Succeeded', '2021-12-28 12:08:22', '2021-12-28 17:38:22'),
(26, 'Lalit', 'jaiswal', 'lalit.jaiswal@graffersid.com', '01234567890', '+353', 'indore', 'indore', '3900', 1, 'cUTQGZNYLJqgmcbN1Lgh9lQWkw0jNzhOmFk20bFe', '61CAFF37B4B64835136348', 'cUTQGZNYLJqgmcbN1Lgh9lQWkw0jNzhOmFk20bFe', NULL, 'Succeeded', '2021-12-28 12:12:39', '2021-12-28 17:42:39'),
(27, 'Lalit', 'jaiswal', 'lalit.jaiswal@graffersid.com', '01234567890', '+353', 'indore', 'indore', '3900', 1, 'cUTQGZNYLJqgmcbN1Lgh9lQWkw0jNzhOmFk20bFe', '61CAFF7F204AB063075474', 'cUTQGZNYLJqgmcbN1Lgh9lQWkw0jNzhOmFk20bFe', NULL, 'Succeeded', '2021-12-28 12:13:51', '2021-12-28 17:43:51'),
(28, 'testttt', 'testttt', 'test@gmail.com', '01234567890', '+353', 'indore', 'indore', '3900', 1, '3cHqcfbiHaw05ppz8lEkdzZxBEXmcbGR2DXsGF6D', '61CB01B4B5BCE840580139', '3cHqcfbiHaw05ppz8lEkdzZxBEXmcbGR2DXsGF6D', NULL, 'Succeeded', '2021-12-28 12:23:16', '2021-12-28 17:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `status` int(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `title`, `description`, `featured_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ABOUT US', 'About Us', '<p class=\"abt-text abt-margin\" style=\"color: rgb(43, 43, 43); font-size: 16px; line-height: 27px; font-family: sec; letter-spacing: 0.7px;\">Outdoor structures was established in 2015 by Micheal Dermody and Patrick O\'Malley. We have over 20 years of extensive hard landscaping experience but in the last 4 have taken a new direction and delved into creating bespoke Outdoor structures and glass houses.<br><br>We use innovative design and meticulous attention to detail to ensure that our projects match our client\'s exact specific requirements.</p><p class=\"abt-text\" style=\"margin-top: 10px; color: rgb(43, 43, 43); font-size: 16px; line-height: 27px; font-family: sec; letter-spacing: 0.7px;\">Our products provide extra outdoor space for every garden type. Many of our projects include full kitchen fit outs and glass house production. We have your ideas in mind and aim to be innovative and creative in all of our bespoke designs. Why not make the most of your outdoor area with a tailor made structure.<br><br>From outdoor living areas to glass rooms, we can completely transform your garden.</p>', '7883_1630325877.jpg', 1, '2021-08-05 11:14:08', '2021-08-31 00:47:57'),
(2, 'Privacy Policy', 'Privacy Policy', '<h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><p class=\"abt-text abt-margin\" style=\"color: rgb(43, 43, 43); font-size: 16px; line-height: 27px; font-family: sec; letter-spacing: 0.7px; font-weight: 400;\">Outdoor structures was established in 2015 by directors Michael Dermody and Patrick O\'Malley. We have over 20 years of extensive hard landscaping experience but in the last 4 have taken a new direction and delved into creating bespoke Outdoor structures and glass houses.<br><br>We use innovative design and meticulous attention to detail to ensure that our projects match our client\'s exact specific requirements.</p><p class=\"abt-text\" style=\"margin-top: 10px; color: rgb(43, 43, 43); font-size: 16px; line-height: 27px; font-family: sec; letter-spacing: 0.7px; font-weight: 400;\">Our products provide extra outdoor space for every garden type. Many of our projects include full kitchen fit outs and glass house production. We have your ideas in mind and aim to be innovative and creative in all of our bespoke designs. Why not make the most of your outdoor area with a tailor made structure.<br><br>From outdoor living areas to glass rooms, we can completely transform your garden.</p></h3>', '9180_1629900596.jpg', 1, '2021-08-07 09:14:08', '2021-08-26 02:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pcategories`
--

CREATE TABLE `pcategories` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pcategories`
--

INSERT INTO `pcategories` (`id`, `brand_id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(9, 11, 'Horse Feed', '7157_1640179188.jpeg', 1, '2021-07-07 06:22:09', '2021-12-22 13:19:49'),
(10, 11, 'Dog Feed', '4155_1640179195.jpeg', 1, '2021-07-07 06:23:38', '2021-12-22 13:19:56'),
(11, 11, 'Supplements', '9826_1640179239.jpg', 1, '2021-07-07 06:24:03', '2021-12-22 13:20:39'),
(52, 29, 'democat', '6945_1640179251.jpg', 1, '2021-12-22 09:26:36', '2021-12-22 13:20:51'),
(53, 29, 'demo3', '6881_1640179259.jpeg', 1, '2021-12-22 09:27:32', '2021-12-22 13:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `variants` int(4) NOT NULL DEFAULT 0,
  `sizes` varchar(255) DEFAULT NULL,
  `colors` varchar(255) DEFAULT NULL,
  `prices` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `order_no` int(11) DEFAULT NULL,
  `status` int(4) NOT NULL DEFAULT 1,
  `vat` float NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `title`, `title_slug`, `description`, `variants`, `sizes`, `colors`, `prices`, `price`, `weight`, `image`, `order_no`, `status`, `vat`, `created_at`, `updated_at`) VALUES
(25, 11, 9, 'Product2', 'product2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0, '', '', '', 23, NULL, NULL, 2, 1, 0, '2021-12-22 14:32:45', '2021-12-28 08:19:18'),
(26, 11, 9, 'Product1', 'product1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0, '', '', '', 39, NULL, NULL, 1, 1, 0, '2021-12-22 14:46:14', '2021-12-28 08:19:04'),
(27, 11, 9, 'product3', 'product3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0, '', '', '', 32, NULL, NULL, 3, 1, 0, '2021-12-23 05:46:56', '2021-12-28 08:19:30'),
(28, 11, 9, 'product4', 'product4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, '', '', '', 20, NULL, NULL, 4, 1, 0, '2021-12-23 13:23:40', '2021-12-28 08:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(14, 9, '9110_1625298761.png', '2021-07-03 07:52:41', '2021-07-03 07:52:41'),
(15, 23, '5209_1625298808.gif', '2021-07-03 07:53:29', '2021-07-03 07:53:29'),
(16, 6, '9117_1625316006.png', '2021-07-03 12:40:06', '2021-07-03 12:40:06'),
(17, 7, '9458_1625316043.gif', '2021-07-03 12:40:44', '2021-07-03 12:40:44'),
(18, 7, '3496_1625316044.png', '2021-07-03 12:40:44', '2021-07-03 12:40:44'),
(19, 8, '1500_1625317143.png', '2021-07-03 12:59:03', '2021-07-03 12:59:03'),
(20, 9, '2521_1625461272.png', '2021-07-05 05:01:12', '2021-07-05 05:01:12'),
(21, 10, '4098_1625488015.png', '2021-07-05 12:26:55', '2021-07-05 12:26:55'),
(22, 11, '4098_1625488015.png', '2021-07-06 06:59:26', '2021-07-06 06:59:26'),
(23, 12, '4098_1625488015.png', '2021-07-06 07:22:23', '2021-07-06 07:22:23'),
(24, 13, '4098_1625488015.png', '2021-07-06 07:22:23', '2021-07-06 07:22:23'),
(25, 13, '4098_1625488015.png', '2021-07-06 07:22:23', '2021-07-06 07:22:23'),
(26, 13, '4098_1625488015.png', '2021-07-06 07:22:23', '2021-07-06 07:22:23'),
(27, 13, '4098_1625488015.png', '2021-07-06 07:22:23', '2021-07-06 07:22:23'),
(28, 14, '4098_1625488015.png', '2021-07-06 07:49:11', '2021-07-06 07:49:11'),
(29, 15, '4098_1625488015.png', '2021-07-06 07:49:11', '2021-07-06 07:49:11'),
(30, 15, '4098_1625488015.png', '2021-07-06 07:49:11', '2021-07-06 07:49:11'),
(31, 15, '4098_1625488015.png', '2021-07-06 07:49:11', '2021-07-06 07:49:11'),
(32, 15, '4098_1625488015.png', '2021-07-06 07:49:11', '2021-07-06 07:49:11'),
(33, 16, '6788_1625650975.jpg', '2021-07-07 09:42:55', '2021-07-07 09:42:55'),
(34, 17, '1668_1625651062.jpg', '2021-07-07 09:44:22', '2021-07-07 09:44:22'),
(35, 18, '2129_1626075731.jpg', '2021-07-12 20:12:11', '2021-07-12 20:12:11'),
(36, 18, '1438_1626075731.png', '2021-07-12 20:12:11', '2021-07-12 20:12:11'),
(37, 18, '7611_1626075731.png', '2021-07-12 20:12:11', '2021-07-12 20:12:11'),
(38, 19, '7571_1626082329.png', '2021-07-12 22:02:09', '2021-07-12 22:02:09'),
(41, 23, '2196_1640174688.jpeg', '2021-12-22 12:04:51', '2021-12-22 12:04:51'),
(42, 24, '7611_1640175172.jpeg', '2021-12-22 12:12:55', '2021-12-22 12:12:55'),
(43, 25, '2390_1640183565.jpg', '2021-12-22 14:32:45', '2021-12-22 14:32:45'),
(44, 26, '8597_1640184374.jpg', '2021-12-22 14:46:14', '2021-12-22 14:46:14'),
(45, 27, '8866_1640238416.jpeg', '2021-12-23 05:46:57', '2021-12-23 05:46:57'),
(48, 28, '5362_1640679650.jpg', '2021-12-28 08:20:52', '2021-12-28 08:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `category_id`, `title`, `short_description`, `long_description`, `featured_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 'Outdoor Kitchens', 'We use innovative design and meticulous attention to detail to ensure that our projects match our client\'s exact specific requirements.', '<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 25px; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">We have over 20 years of extensive hard landscaping experience but in the last 4 have taken a new direction and delved into creating bespoke Kitchens Outdoors. We use innovative design and meticulous attention to detail to ensure that our projects match our client’s exact specific requirements.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 25px; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">Our luxurious and efficient awnings allow our clients to make use of their Outdoor Kitchens all year round. Our Kitchens are fully galvanised - so say goodbye to rust, your kitchen&nbsp;can be topped with materials such as porcelain, marble and other options. We can make our Outdoor Kitchens waterproof if required. We can also supply&nbsp;barbeques and outdoor fires.&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 25px; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">This allows you to enjoy your garden space with a contemporary kitchen in all seasons. Outdoor fires have become a huge trend of late, we can incorporate these into any of our fitted Outdoor Kitchens.</p>', '4682_1631099658.jpeg', 1, '2021-08-06 07:00:13', '2021-09-08 23:45:46'),
(2, 9, 'Outdoor Structures', 'We use innovative design and meticulous attention to detail to ensure that our projects match our client\'s exact specific requirements.', '<p class=\"abt-text abt-margin\" style=\"color: rgb(43, 43, 43); font-size: 16px; line-height: 27px; font-family: sec; letter-spacing: 0.7px;\">Outdoor structures was established in 2015 by directors Michael Dermody and Patrick Oâ€™Malley. We have over 20 years of extensive hard landscaping experience but in the last 4 have taken a new direction and delved into creating bespoke Outdoor structures and glass houses.<br><br>We use innovative design and meticulous attention to detail to ensure that our projects match our clientâ€™s exact specific requirements.</p><p class=\"abt-text\" style=\"margin-top: 10px; color: rgb(43, 43, 43); font-size: 16px; line-height: 27px; font-family: sec; letter-spacing: 0.7px;\">Our products provide extra outdoor space for every garden type. Many of our projects include full kitchen fit outs and glass house production. We have your ideas in mind and aim to be innovative and creative in all of our bespoke designs. Why not make the most of your outdoor area with a tailor made structure.<br><br>From outdoor living areas to glass rooms, we can completely transform your garden.</p>', '4119_1631099896.jpg', 1, '2021-08-06 07:06:53', '2021-09-08 23:48:16'),
(3, 1, 'Outdoor Kitchens', 'We use innovative design and meticulous attention to detail to ensure that our projects match our client\'s exact specific requirements.', '<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 25px; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">We have over 20 years of extensive hard landscaping experience but in the last 4 have taken a new direction and delved into creating bespoke Kitchens Outdoors. We use innovative design and meticulous attention to detail to ensure that our projects match our client’s exact specific requirements.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 25px; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">Our luxurious and efficient awnings allow our clients to make use of their Outdoor Kitchens all year round. Our Kitchens are fully galvanised - so say goodbye to rust, your kitchen&nbsp;can be topped with materials such as porcelain, marble and other options. We can make our Outdoor Kitchens waterproof if required. We can also supply&nbsp;barbeques and outdoor fires.&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 25px; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">This allows you to enjoy your garden space with a contemporary kitchen in all seasons. Outdoor fires have become a huge trend of late, we can incorporate these into any of our fitted Outdoor Kitchens.</p>', '7278_1640179105.jpg', 1, '2021-12-22 13:18:25', '2021-12-22 13:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '8216_1628233213.jpg', '2021-08-06 07:00:13', '2021-08-06 07:00:13'),
(8, 2, '2896_1628233614.jpg', '2021-08-06 07:06:54', '2021-08-06 07:06:54'),
(10, 1, '9640_1631099735.jpeg', '2021-09-08 23:45:36', '2021-09-08 23:45:36'),
(11, 1, '2513_1631099736.jpeg', '2021-09-08 23:45:36', '2021-09-08 23:45:36'),
(12, 1, '2960_1631099736.jpeg', '2021-09-08 23:45:36', '2021-09-08 23:45:36'),
(13, 1, '6012_1631099736.jpeg', '2021-09-08 23:45:36', '2021-09-08 23:45:36'),
(14, 1, '8341_1631099736.jpeg', '2021-09-08 23:45:36', '2021-09-08 23:45:36'),
(15, 1, '1642_1631099736.jpeg', '2021-09-08 23:45:36', '2021-09-08 23:45:36'),
(16, 1, '3738_1631099736.jpeg', '2021-09-08 23:45:36', '2021-09-08 23:45:36'),
(17, 2, '9508_1631099861.jpg', '2021-09-08 23:47:41', '2021-09-08 23:47:41'),
(18, 2, '2846_1631099861.jpg', '2021-09-08 23:47:41', '2021-09-08 23:47:41'),
(19, 2, '2652_1631099861.jpg', '2021-09-08 23:47:41', '2021-09-08 23:47:41'),
(20, 2, '1125_1631099861.jpg', '2021-09-08 23:47:42', '2021-09-08 23:47:42'),
(21, 2, '7203_1631099862.jpg', '2021-09-08 23:47:42', '2021-09-08 23:47:42'),
(22, 2, '2845_1631099862.jpg', '2021-09-08 23:47:42', '2021-09-08 23:47:42'),
(23, 2, '1609_1631099862.jpg', '2021-09-08 23:47:42', '2021-09-08 23:47:42'),
(24, 2, '2033_1631099862.jpg', '2021-09-08 23:47:45', '2021-09-08 23:47:45'),
(25, 2, '1370_1631099865.jpg', '2021-09-08 23:47:46', '2021-09-08 23:47:46'),
(26, 2, '2994_1634544595.jpeg', '2021-10-18 20:39:55', '2021-10-18 20:39:55'),
(27, 2, '5629_1634544595.jpeg', '2021-10-18 20:39:55', '2021-10-18 20:39:55'),
(28, 2, '8507_1634544595.jpeg', '2021-10-18 20:39:55', '2021-10-18 20:39:55'),
(29, 2, '1127_1634544595.jpeg', '2021-10-18 20:39:56', '2021-10-18 20:39:56'),
(30, 2, '6262_1634544596.jpeg', '2021-10-18 20:39:56', '2021-10-18 20:39:56'),
(31, 2, '6144_1634544596.jpeg', '2021-10-18 20:39:56', '2021-10-18 20:39:56'),
(32, 2, '5712_1634544596.jpeg', '2021-10-18 20:39:56', '2021-10-18 20:39:56'),
(33, 2, '2838_1634544596.jpeg', '2021-10-18 20:39:56', '2021-10-18 20:39:56'),
(34, 2, '8631_1634544596.jpeg', '2021-10-18 20:39:57', '2021-10-18 20:39:57'),
(35, 3, '9965_1640179105.jpeg', '2021-12-22 13:18:26', '2021-12-22 13:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `action_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `name_slug` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `section_id`, `action_id`, `name`, `name_slug`, `url`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, '1,2,3', 'Actions', 'actions', 'actions.index', 1, '2021-02-12 04:48:53', '2021-02-23 00:35:50'),
(2, 1, '1,2,3', 'Sections', 'sections', 'sections.index', 2, '2021-02-12 04:49:49', '2021-02-23 00:35:56'),
(3, 1, '1,2,3', 'Roles', 'roles', 'roles.index', 3, '2021-02-12 04:50:11', '2021-02-23 00:35:58'),
(20, 12, '1,2,3,8', 'Gallery', 'gallery', 'gallery.index', 3, '2021-03-09 10:40:47', '2021-03-09 10:40:47'),
(23, 13, '4,3', 'Contacts', 'contacts', 'contacts.index', 1, '2021-03-16 05:49:55', '2021-03-16 05:49:55'),
(26, 12, '2,8', 'Pages', 'pages', 'pages.index', 2, '2021-08-05 10:28:53', '2021-08-07 23:44:35'),
(27, 14, '1,2,3,8', 'Services', 'services', 'services.index', 0, '2021-08-05 12:13:57', '2021-08-05 12:13:57'),
(28, 15, '2,8', 'Categories', 'categories', 'categories.index', 0, '2021-08-06 06:24:01', '2021-08-07 06:00:39'),
(29, 15, '1,2,3,8', 'Projects', 'projects', 'projects.index', 0, '2021-08-06 06:32:18', '2021-08-06 06:32:18'),
(30, 12, '1,2,3,8', 'Testimonials', 'testimonials', 'testimonials.index', 4, '2021-08-06 08:49:01', '2021-08-06 08:49:01'),
(31, 16, '1,2,3,8', 'Mailing List', 'mailing_list', 'mailing_list.index', 4, '2021-08-06 09:34:12', '2021-08-06 09:34:12'),
(33, 12, '1,2,3,8', 'Banners', 'banners', 'banners.index', 1, '2021-08-07 09:58:03', '2021-08-07 09:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `section_title` varchar(200) NOT NULL,
  `section_slug` varchar(200) NOT NULL,
  `section_order` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_title`, `section_slug`, `section_order`, `created_at`, `updated_at`) VALUES
(1, 'Modules', 'modules', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Pages Management', 'pages-management', 2, '2021-03-09 16:10:25', '2021-03-20 11:56:58'),
(13, 'Website Enquiry', 'website-enquiry', 6, '2021-03-16 11:01:20', '2021-03-16 11:01:20'),
(14, 'Service Management', 'service-management', 3, '2021-08-05 17:28:04', '2021-08-05 17:28:04'),
(15, 'Projects Management', 'projects-management', 4, '2021-08-05 17:28:18', '2021-08-05 17:28:18'),
(16, 'Newsletter', 'newsletter', 5, '2021-08-06 15:08:11', '2021-08-06 15:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `featured_image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Outdoor Kitchens', '<p style=\"color: rgb(43, 43, 43); font-family: sec; font-size: 16px; letter-spacing: 0.7px;\">We use innovative design and meticulous attention to detail to ensure that our projects match our client\'s exact specific requirements.</p><p style=\"color: rgb(43, 43, 43); font-family: sec; font-size: 16px; letter-spacing: 0.7px;\">Our luxurious and efficient awnings allow our clients to make use of their Outdoor Kitchens all year round. Our Kitchens are fully galvanised - so say goodbye to rust, your kitchen can be topped with materials such as porcelain, marble and other options. We can make our Outdoor Kitchens waterproof if required. We can also supply barbeques and outdoor fires.</p><p style=\"color: rgb(43, 43, 43); font-family: sec; font-size: 16px; letter-spacing: 0.7px;\">This allows you to enjoy your garden space with a contemporary kitchen in all seasons. Outdoor fires have become a huge trend of late, we can incorporate these into any of our fitted Outdoor Kitchens.</p>', '5628_1629986143.jpg', 1, '2021-08-06 04:59:06', '2021-08-27 02:25:43'),
(3, 'Outdoor Structures', '<p style=\"color: rgb(43, 43, 43); font-family: sec; font-size: 16px; letter-spacing: 0.7px;\">Our Outdoor Structures can completely transform your outside space and can elevate even the smallest garden into a space for all to enjoy. We stock a wide range of<span style=\"letter-spacing: 0.7px;\">&nbsp;awnings, gazebos and glass structures that ensure you can use your garden all year round. These waterproof and rust-resistant structures will turn your outside space into a unique and exciting area to relax and enjoy.</span></p><p style=\"color: rgb(43, 43, 43); font-family: sec; font-size: 16px; letter-spacing: 0.7px;\"><span style=\"letter-spacing: 0.7px;\">Taking your ideas on board and working together along with our design team we aim to keep you in touch every step of the way to guarantee that everyone is happy with the finished result.&nbsp;</span></p>', '7311_1629722155.jpg', 1, '2021-08-06 04:59:44', '2021-08-24 01:05:55'),
(4, 'Garden Designs', '<p>Because we focus so heavily on delivering a high end product, we\'ve found that our customers need to visualise and have a first impression of what the final product will look like, so we offer a Design service including 3D images and CAD drawings, always working alongside the customer to be able to meet his needs.</p><p>Contact us on sales@outdoorkitchen.ie for more information.</p><p><br></p><p style=\"margin: 1.5em 0px 0px; padding: 0px; font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 1.2;\"><br></p><p style=\"margin: 1.5em 0px 0px; padding: 0px; font-family: Arial, Helvetica, sans-serif; font-size: 20px;\"><br></p>', '4186_1636629752.jpg', 1, '2021-08-30 05:14:06', '2021-11-11 23:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `service_images`
--

CREATE TABLE `service_images` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_images`
--

INSERT INTO `service_images` (`id`, `service_id`, `image`, `created_at`, `updated_at`) VALUES
(5, 2, '2140_1628225946.jpg', '2021-08-06 04:59:07', '2021-08-06 04:59:07'),
(13, 2, '5997_1628750965.jpg', '2021-08-12 19:19:25', '2021-08-12 19:19:25'),
(14, 2, '4328_1628750965.jpg', '2021-08-12 19:19:25', '2021-08-12 19:19:25'),
(15, 2, '7127_1628750965.jpg', '2021-08-12 19:19:25', '2021-08-12 19:19:25'),
(16, 2, '8033_1628750965.jpg', '2021-08-12 19:19:30', '2021-08-12 19:19:30'),
(17, 2, '9984_1628750970.jpg', '2021-08-12 19:19:30', '2021-08-12 19:19:30'),
(20, 3, '6752_1628751676.jpg', '2021-08-12 19:31:16', '2021-08-12 19:31:16'),
(21, 3, '3839_1628751676.jpg', '2021-08-12 19:31:16', '2021-08-12 19:31:16'),
(22, 3, '5779_1628751676.jpg', '2021-08-12 19:31:16', '2021-08-12 19:31:16'),
(23, 3, '3119_1629212709.png', '2021-08-18 03:35:10', '2021-08-18 03:35:10'),
(24, 3, '4214_1629212710.png', '2021-08-18 03:35:10', '2021-08-18 03:35:10'),
(27, 3, '2694_1629212710.png', '2021-08-18 03:35:11', '2021-08-18 03:35:11'),
(28, 3, '5013_1629212711.png', '2021-08-18 03:35:11', '2021-08-18 03:35:11'),
(29, 3, '2580_1629212711.png', '2021-08-18 03:35:11', '2021-08-18 03:35:11'),
(30, 3, '2321_1629212711.png', '2021-08-18 03:35:12', '2021-08-18 03:35:12'),
(31, 2, '7040_1630254177.jpeg', '2021-08-30 04:52:57', '2021-08-30 04:52:57'),
(32, 2, '2625_1630254177.jpeg', '2021-08-30 04:52:59', '2021-08-30 04:52:59'),
(33, 2, '2080_1630254179.jpeg', '2021-08-30 04:52:59', '2021-08-30 04:52:59'),
(34, 2, '1731_1630254179.jpeg', '2021-08-30 04:53:00', '2021-08-30 04:53:00'),
(35, 2, '4227_1630254180.jpeg', '2021-08-30 04:53:00', '2021-08-30 04:53:00'),
(36, 2, '5463_1630254180.jpg', '2021-08-30 04:53:00', '2021-08-30 04:53:00'),
(37, 2, '5773_1630254180.jpg', '2021-08-30 04:53:03', '2021-08-30 04:53:03'),
(38, 2, '9793_1630254183.jpg', '2021-08-30 04:53:03', '2021-08-30 04:53:03'),
(39, 2, '6715_1630254183.jpeg', '2021-08-30 04:53:03', '2021-08-30 04:53:03'),
(40, 2, '4966_1630254183.jpeg', '2021-08-30 04:53:04', '2021-08-30 04:53:04'),
(41, 2, '5272_1630254184.jpeg', '2021-08-30 04:53:04', '2021-08-30 04:53:04'),
(42, 2, '1480_1630254184.jpeg', '2021-08-30 04:53:04', '2021-08-30 04:53:04'),
(43, 3, '1454_1630254427.jpg', '2021-08-30 04:57:10', '2021-08-30 04:57:10'),
(44, 3, '7608_1630254430.jpg', '2021-08-30 04:57:10', '2021-08-30 04:57:10'),
(45, 3, '1316_1630254430.jpg', '2021-08-30 04:57:10', '2021-08-30 04:57:10'),
(46, 3, '6179_1630254430.jpg', '2021-08-30 04:57:11', '2021-08-30 04:57:11'),
(47, 3, '5067_1630254431.jpg', '2021-08-30 04:57:11', '2021-08-30 04:57:11'),
(48, 3, '5208_1630254431.jpg', '2021-08-30 04:57:12', '2021-08-30 04:57:12'),
(49, 3, '2703_1630254432.jpg', '2021-08-30 04:57:12', '2021-08-30 04:57:12'),
(50, 3, '1579_1630254432.jpg', '2021-08-30 04:57:12', '2021-08-30 04:57:12'),
(51, 4, '3739_1630255446.jpg', '2021-08-30 05:14:07', '2021-08-30 05:14:07'),
(52, 4, '1306_1630255447.jpg', '2021-08-30 05:14:07', '2021-08-30 05:14:07'),
(56, 4, '3820_1630255447.png', '2021-08-30 05:14:07', '2021-08-30 05:14:07'),
(58, 4, '6531_1636629752.jpg', '2021-11-11 23:52:32', '2021-11-11 23:52:32'),
(59, 4, '6344_1636629752.jpg', '2021-11-11 23:52:32', '2021-11-11 23:52:32'),
(60, 4, '8223_1636629752.jpg', '2021-11-11 23:52:32', '2021-11-11 23:52:32'),
(61, 4, '5807_1636629752.jpg', '2021-11-11 23:52:32', '2021-11-11 23:52:32'),
(62, 4, '9825_1636629818.jpg', '2021-11-11 23:53:38', '2021-11-11 23:53:38'),
(63, 4, '4782_1636629818.jpg', '2021-11-11 23:53:38', '2021-11-11 23:53:38'),
(64, 4, '3454_1636629818.jpg', '2021-11-11 23:53:38', '2021-11-11 23:53:38'),
(65, 4, '8231_1636629818.jpg', '2021-11-11 23:53:38', '2021-11-11 23:53:38'),
(66, 4, '9526_1636629818.jpg', '2021-11-11 23:53:38', '2021-11-11 23:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `instagram_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name_1` varchar(255) NOT NULL,
  `phone_1` varchar(255) NOT NULL,
  `name_2` varchar(255) NOT NULL,
  `phone_2` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `facebook_link`, `instagram_link`, `twitter_link`, `linkedin_link`, `address`, `email`, `name_1`, `phone_1`, `name_2`, `phone_2`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/', 'https://www.instagram.com/outdoorkitchen.ie/', 'dvdsvdsv', 'sdvsdvd', 'Drumbawn, Newtown Mount Kennedy, Co Wicklow, Ireland.', 'sales@outdoorkitchen.ie', 'Micheal Dermody', '+353 87 919 7581', 'Patrick O\'Malley', '+353 87 145 8666', '2021-03-20 09:21:03', '2021-08-26 02:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Yvonne Kearns, Bsc Surveying (Quantity Surveyor)', 'Over the last few years I have had the pleasure of tendering work to and engaging Outdoor Structures on a number of building projects.\r\nBoth Patrick and Mick have a hands on approach and if an issue arises then they are problem solver\'s not problem makers! \r\nTheir work is fairly priced and reasonable and they put in every effort to ensure a project is delivered on time, with no reduction in the quality of the work.\r\nCovering all area\'s of construction, their work is completed to an exceptionally high standard.\r\nI would have no reservation in recommending Outdoor Kitchens.\r\nYvonne Kearns, Bsc Surveying (Quantity Surveyor)', 1, '2021-08-06 09:15:15', '2021-08-26 02:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin,sub_admin,user',
  `account_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Office,Service,Account',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `account_type`, `name`, `email`, `mobile`, `password`, `remember_token`, `status`, `lat`, `lng`, `device_id`, `fcm_token`, `is_deleted`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'admin', 'admin@gmail.com', NULL, '$2y$10$m.ZzMzbG21B6vHIUYqe5bOCKPOdDbnC3nYWBUA4pdye5w9FSFk4KW', NULL, '1', NULL, NULL, NULL, NULL, 'N', '2021-12-28 17:53:59', '2021-01-18 03:37:04', '2021-12-28 12:23:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `additional_images`
--
ALTER TABLE `additional_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailing_lists`
--
ALTER TABLE `mailing_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `pcategories`
--
ALTER TABLE `pcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_images`
--
ALTER TABLE `service_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `additional_images`
--
ALTER TABLE `additional_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `mailing_lists`
--
ALTER TABLE `mailing_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pcategories`
--
ALTER TABLE `pcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_images`
--
ALTER TABLE `service_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
