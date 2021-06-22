-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 08:16 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_product`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_deleted` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `image`, `is_deleted`, `user_id`, `date`) VALUES
(16, 'Uzair5', NULL, 'Yes', 1, '2021-06-19 12:51:40'),
(17, 'Rashid', NULL, 'No', 13, '2021-06-19 12:53:29'),
(19, 'Bilal', NULL, 'No', 1, '2021-06-19 14:21:28'),
(20, 'Osama', NULL, 'No', 16, '2021-06-19 15:34:52'),
(21, 'osama1', NULL, 'No', 17, '2021-06-19 15:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_deleted` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cnic` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `is_deleted` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `father_name`, `email`, `cnic`, `phone`, `address`, `description`, `image`, `status`, `is_deleted`, `user_id`, `date`) VALUES
(14, 'Uzair', 'dsfds', 'uzair@gmail.con', 'sdfas', '5453454', NULL, NULL, NULL, 'Active', 'No', 1, '2021-06-19 12:36:39'),
(15, 'Rashid', 'Aijaz Abbasi', 'rashid@digitalsquare.us', '4510111563181', '03313817104', 'dsafsadf\r\nsdfsdaf', NULL, NULL, 'Active', 'No', 13, '2021-06-19 12:36:57'),
(16, 'adf', 'Aijaz Abbasi', 'rashid@digitalsquare.us', '45101-1156318-1', '03313817104', NULL, NULL, NULL, 'Active', 'No', 14, '2021-06-19 12:39:07'),
(17, 'Rashid', 'Aijaz Abbasi', 'rashid@digitalsquare.us', '45101-1156318-1', '03313817104', 'dsafsadf\r\nsdfsdaf', NULL, NULL, 'Active', 'No', 16, '2021-06-22 11:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `discount_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `percent` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_deleted` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`discount_id`, `name`, `percent`, `status`, `user_id`, `is_deleted`, `date`) VALUES
(1, 'Summer Special Offer', 20, 'Active', 1, 'No', '2021-06-04 13:48:12'),
(2, 'Summer Special Offer', 20, 'Active', 1, 'No', '2021-06-04 13:49:50'),
(3, 'service-vectors', 10, 'Inactive', 1, 'No', '2021-06-04 13:53:33'),
(4, 'Summer Special Offer', 20, 'Active', 7, 'No', '2021-06-04 14:41:49'),
(5, 'Summer Special Offer', 20, 'Active', 7, 'No', '2021-06-04 14:41:58'),
(6, 'service-vector', 5, 'Active', 7, 'No', '2021-06-04 15:12:32'),
(7, 'Rashid', 45, 'Active', 7, 'No', '2021-06-04 15:13:12'),
(8, 'Rashid', 5, 'Active', 1, 'Yes', '2021-06-04 15:20:28'),
(9, 'Osama', 10, 'Active', 7, 'No', '2021-06-04 15:24:29'),
(10, 'Ali', 5, 'Active', 7, 'No', '2021-06-04 15:24:57'),
(11, 'Osama', 5, 'Active', 1, 'Yes', '2021-06-04 15:25:06'),
(12, 'adsf', 12, 'Active', 13, 'No', '2021-06-19 15:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `outlet_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `country_id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `is_featured` varchar(255) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `stock_sold` int(11) DEFAULT 0,
  `o_price` double NOT NULL,
  `s_price` double NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `category_id`, `description`, `model`, `year`, `is_featured`, `discount_id`, `stock`, `stock_sold`, `o_price`, `s_price`, `image`, `user_id`, `status`, `is_deleted`, `date`) VALUES
(11, 'Uzairdad', 16, 'dsfsd', NULL, NULL, NULL, 11, 3, 7, 1500, 1800, NULL, 1, 'Active', 'No', '2021-06-19 14:18:46'),
(12, 'Rashid Abbasi', 17, NULL, 'Echo', '2008', 'on', NULL, 46, 4, 1500, 3000, NULL, 1, 'Active', 'Yes', '2021-06-21 15:18:55'),
(13, 'Rashid', 19, NULL, 'Echo', '2008', 'on', 12, 10, 0, 30000, 35000, NULL, 1, 'Active', 'No', '2021-06-22 13:46:50'),
(14, 'Rashid 2', 19, NULL, 'Gamma', NULL, NULL, 8, 100, 0, 1500, 2000, NULL, 1, 'Active', 'No', '2021-06-22 13:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `product_sales`
--

CREATE TABLE `product_sales` (
  `product_sale_id` int(11) NOT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sales`
--

INSERT INTO `product_sales` (`product_sale_id`, `sale_id`, `product_id`, `quantity`, `price`, `date`) VALUES
(40, 22, 11, 6, 10800, '2021-06-19 15:47:11'),
(41, 23, 11, 12, 21600, '2021-06-21 18:12:18'),
(42, 24, 11, 3, 5400, '2021-06-21 18:15:15'),
(43, 25, 11, 7, 12600, '2021-06-22 10:48:59'),
(44, 26, 11, 2, 3600, '2021-06-22 10:49:49'),
(45, 27, 11, 1, 1800, '2021-06-22 10:50:25'),
(46, 28, 11, 2, 3600, '2021-06-22 10:52:01'),
(47, 29, 11, 2, 3600, '2021-06-22 10:52:21'),
(48, 30, 12, 1, 3000, '2021-06-22 13:20:47'),
(49, 31, 12, 2, 6000, '2021-06-22 13:21:13'),
(50, 31, 11, 1, 1800, '2021-06-22 13:21:13'),
(51, 33, 11, 1, 1800, '2021-06-22 13:25:28'),
(52, 33, 12, 1, 3000, '2021-06-22 13:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `role_description` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_description`, `date`) VALUES
(1, 'Super Admin', NULL, '2021-06-18 10:29:06'),
(2, 'Admin', NULL, '2021-06-18 10:29:06'),
(3, 'Manager', NULL, '2021-06-18 10:29:26'),
(4, 'User', NULL, '2021-06-18 10:29:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `role_user_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`role_user_id`, `role_id`, `user_id`, `date`) VALUES
(9, 4, 13, '2021-06-18 16:19:34'),
(10, 2, 1, '2021-06-18 16:49:59'),
(11, 3, 14, '2021-06-19 12:38:07'),
(12, 3, 15, '2021-06-19 12:44:20'),
(13, 2, 16, '2021-06-19 15:31:02'),
(14, 3, 17, '2021-06-19 15:33:27'),
(20, NULL, 25, '2021-06-21 11:17:43'),
(21, 1, 26, '2021-06-21 11:27:25'),
(22, 3, 27, '2021-06-21 15:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `is_deleted` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `customer_id`, `receiver_id`, `total`, `status`, `is_deleted`, `user_id`, `date`) VALUES
(22, NULL, NULL, 10800, 'Completed', 'No', 13, '2021-06-19 15:47:11'),
(23, NULL, NULL, 21600, 'Completed', 'No', 13, '2021-06-21 18:12:18'),
(24, 14, 15, 5400, 'Completed', 'No', 13, '2021-06-21 18:15:15'),
(25, NULL, NULL, 12600, 'Completed', 'No', 1, '2021-06-22 10:48:59'),
(26, NULL, NULL, 3600, 'Completed', 'No', 1, '2021-06-22 10:49:49'),
(27, NULL, NULL, 1800, 'Completed', 'No', 1, '2021-06-22 10:50:25'),
(28, NULL, NULL, 3600, 'Completed', 'No', 1, '2021-06-22 10:52:01'),
(29, NULL, NULL, 3600, 'Completed', 'No', 1, '2021-06-22 10:52:21'),
(30, NULL, NULL, 3000, 'Completed', 'No', 1, '2021-06-22 13:20:47'),
(31, NULL, NULL, 7800, 'Completed', 'No', 1, '2021-06-22 13:21:13'),
(32, NULL, NULL, 9600, 'Completed', 'No', 1, '2021-06-22 13:23:06'),
(33, NULL, NULL, 4800, 'Completed', 'No', 1, '2021-06-22 13:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shopkeepers`
--

CREATE TABLE `shopkeepers` (
  `shopkeeper_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `outlet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `image`, `parent_id`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Basil', 'basil@gmail.com', NULL, '$2y$10$8UVo3SVELC2yc5N09EtcvOAXstHmJ1sCKHDE3UOtQ72WP/eQsT.1u', 'V9vxJw0kmcYOg9rU3A3532eJYGiaXjuS9zof7iJ2acGgUZXgiN84JnLqJkuF', NULL, NULL, 1, 'Active', '2021-05-28 13:21:42', '2021-05-28 05:42:58', '2021-05-28 05:42:58'),
(6, 'Rashid', 'rashid@digitalsquare.us', NULL, '$2y$10$zhlevY1T.7ScGcb01tgg0.KrxYGiCiiVV/mdk1cxaUw3etQDsgp0m', NULL, '03313817104', NULL, 0, 'Active', '2021-06-01 12:08:03', '2021-06-01 07:08:03', '2021-06-01 07:08:03'),
(7, 'adsf', 'rashidabbasi17@gmail.com', NULL, '$2y$10$RKbPW.wXLT2T2zvlJFcDJuG33sIkQP..eH8Y.BTEKoqOySiq0sWGS', NULL, '03313817104', NULL, 7, 'Active', '2021-06-01 12:26:39', '2021-06-01 07:26:39', '2021-06-01 07:26:39'),
(8, 'Kamran Arshad', 'kamranarshad@gmail.com', NULL, '$2y$10$lHzqYZM9X1EoGkulPMbUW.9dRakOGvzUZH0py1YAy0o28trb5kUQe', NULL, '03313817104', NULL, 0, 'Active', '2021-06-02 13:39:29', '2021-06-02 08:39:29', '2021-06-02 08:39:29'),
(9, 'Uzair', 'uzair@gmail.con', NULL, '$2y$10$71dBJxZxWQ/v2CfF/Stb5O3ftAQvV0lhHARnQMnX6LbCkSLmSaKP6', NULL, '5453454', 'Users/Products/rTUKCIQEIMoRadxGHmx9KjFlOUogp3InT2McRz9T.png', 0, 'Active', '2021-06-18 13:03:40', '2021-06-18 08:03:40', '2021-06-18 08:03:40'),
(10, 'Bilal', 'bilal@gmail.com', NULL, '$2y$10$B3G93EowKmQ8T3j64Ab4A.b181EY4IqsLtDQDmYsX9VBX.MY9/gDa', NULL, '2123153', 'Users/Products/mlxDNccnsZjCvGBhB5VD86hVQ6VPLJaWa3jUkgHI.png', 0, 'Active', '2021-06-18 13:44:39', '2021-06-18 08:44:39', '2021-06-18 08:44:39'),
(11, 'Hello', 'hello@gmail.com', NULL, '$2y$10$PfqZaoQnXWgsIhpWp.yBS.rDbBx07mPPpo4Dw1/WDmdRM5yTnJtj6', NULL, '5453454', 'Users/Products/51oIkJg3CwKNc26MKKW8r8jvQKjFb1PrzluUaFSi.png', 1, 'Active', '2021-06-18 13:48:12', '2021-06-18 08:48:12', '2021-06-18 08:48:12'),
(12, 'osama', 'osama@mgail.com', NULL, '$2y$10$AOwPcC.457nQvFDEoH.gI.xF08SStOC0EqQ2yb6eZfOcKa65CLc6e', NULL, '134342341', NULL, 1, 'Active', '2021-06-18 15:31:27', '2021-06-18 10:31:27', '2021-06-18 10:31:27'),
(13, 'User', 'user@gmail.com', NULL, '$2y$10$0T97fpXEhlWv.QjFlrKLNOXdjdMGqJwx3elpadvI05PhERq69120G', NULL, '51534453', NULL, 1, 'Active', '2021-06-18 16:19:34', '2021-06-18 11:19:34', '2021-06-18 11:19:34'),
(14, 'user2 basil', 'user2@gmail.com', NULL, '$2y$10$qHlDoAeCrlCQJXDk1TN0s.Tv9xUz6rH3I0HB3m2DzIX0iHjhimtrS', NULL, '5453454', NULL, 1, 'Active', '2021-06-19 12:38:07', '2021-06-19 07:38:07', '2021-06-19 07:38:07'),
(15, 'user 3', 'user3@gmail,com', NULL, '$2y$10$lA84xsw/3J1aY.VBd0FiJeja9NVgmszj0Cs9vDq4wZQIPKj4tW50a', NULL, '03313817104', NULL, 14, 'Active', '2021-06-19 12:44:20', '2021-06-19 07:44:20', '2021-06-19 07:44:20'),
(16, 'Osama', 'osama@gmail.com', NULL, '$2y$10$KTEg3OdpSQqqZba8MQJloeuUOJsRhyNpTugOYy1qfRtUFq4tr0U7e', NULL, '54464', NULL, 16, 'Active', '2021-06-19 15:31:02', '2021-06-19 10:31:02', '2021-06-19 10:31:02'),
(17, 'Osama1', 'osama1@gmail.com', NULL, '$2y$10$nK5DGqrmq73Z3Qr5szCwsOQptoX65vy/DwoY/aRF/KAUlP5OrN4Wa', NULL, '03313817104', NULL, 16, 'Active', '2021-06-19 15:33:27', '2021-06-19 10:33:27', '2021-06-19 10:33:27'),
(25, 'Ali 2', 'ali@gmail.com', NULL, '$2y$10$h/OYgQPPisaljZKERo9gqOnCYmW1YuNnFvd/YJ76b9eam6FOPTPwi', NULL, '03313817104', NULL, 25, 'Active', '2021-06-21 11:17:43', NULL, NULL),
(26, 'Super Admin', 'superadmin@admin.com', NULL, '$2y$10$5f/S91uYWpFrIgxosdwM8uT03m/oADxjG0r0x1tixWpcA91DcSGzu', NULL, '03212297360', NULL, 26, 'Active', '2021-06-21 11:27:25', NULL, NULL),
(27, 'Manager', 'manager@gmail.com', NULL, '$2y$10$miudr9feMCMLSllratKt0OGeVv/D.wu8Kk0Rx9hj061UFgS6MiLki', NULL, '03313817104', NULL, 1, 'Active', '2021-06-21 15:34:56', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`discount_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`outlet_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `discount_id` (`discount_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD PRIMARY KEY (`product_sale_id`),
  ADD KEY `sale_id` (`sale_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`role_user_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `receiver_id` (`receiver_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `shopkeepers`
--
ALTER TABLE `shopkeepers`
  ADD PRIMARY KEY (`shopkeeper_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `outlet_id` (`outlet_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `outlet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_sales`
--
ALTER TABLE `product_sales`
  MODIFY `product_sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `role_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopkeepers`
--
ALTER TABLE `shopkeepers`
  MODIFY `shopkeeper_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `countries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `outlets`
--
ALTER TABLE `outlets`
  ADD CONSTRAINT `outlets_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`discount_id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD CONSTRAINT `product_sales_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`sale_id`),
  ADD CONSTRAINT `product_sales_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `shopkeepers`
--
ALTER TABLE `shopkeepers`
  ADD CONSTRAINT `shopkeepers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `shopkeepers_ibfk_2` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`outlet_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
