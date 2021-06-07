-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 07:13 PM
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
(1, 'Rashid', 'Images/Categories/XfqCIjWDqImGRYRhcB2XzyWbubUBhlpPKfKd29HR.png', 'No', 1, '2021-06-03 11:52:46'),
(2, 'adsfdsfsd23123123', 'Images/Categories/zEvCkBsi14AcGeUjmBCoaGrJzIcyOsv39zKnSCER.png', 'Yes', 1, '2021-06-03 11:57:37'),
(3, 'Rashid', 'Images/Categories/z2D7UKx7LgjkvISjc2phVxGRDNWFpeHwvmfwY7oG.png', 'No', 1, '2021-06-03 11:57:47'),
(4, 'asdf', 'Images/Categories/xSSN5mALC8kMZkkpSQ3jlYfIKPeCO4k7qJ7AbYkI.png', 'No', 1, '2021-06-03 11:57:52'),
(5, 'adsf', NULL, 'Yes', 1, '2021-06-03 11:58:00'),
(6, 'dsfdaf', 'Images/Categories/iTZ6VzFOkq04nO3vPeQMxGN8mnYXSBsNKNivMJ6U.png', 'No', 1, '2021-06-03 11:58:03'),
(7, 'dsfsdaf', NULL, 'No', 1, '2021-06-03 11:58:07'),
(8, 'dssdf', NULL, 'No', 1, '2021-06-03 11:58:11'),
(9, 'sdafasdf', NULL, 'No', 1, '2021-06-03 11:58:16'),
(10, 'dsfsadf', NULL, 'No', 1, '2021-06-03 11:58:20'),
(11, 'dsafsadf', NULL, 'No', 1, '2021-06-03 11:58:27'),
(12, 'adsf', 'Images/Categories/WkYvLPeLhR8mCQpD116HHdAj7SATicNwePRvL8xj.png', 'No', 1, '2021-06-03 12:07:36'),
(13, 'adsf', 'Images/Categories/w7MkN0dq7Ix7Vj04HrjaJQq7ypti9Tn6xOCgntxP.jpg', 'No', 7, '2021-06-03 16:40:01'),
(14, 'Rashid', 'Images/Categories/eUXG5dPpt8HBUewmHRmWShHPr27EpZfwiATyeZXD.png', 'No', 7, '2021-06-05 17:29:00');

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
(1, 'Osama', 'Aijaz Abbasi', 'rashid@digitalsquare.us', '45101-1156318-1', '03313817104', 'dsafsadf\r\nsdfsdaf', 'dsfds', 'Images/Customers/WZpphSaNJnYQHcnfbf9OeP5C9dQdYICWiUcJYXGf.png', 'Inactive', 'Yes', 1, '2021-06-01 17:59:55'),
(2, 'adsf', 'Aijaz', 'rashid@digitalsquare.us', '45101-1156318-1', '03313817104', 'dsafsadf\r\nsdfsdaf', 'dfdsf', 'Images/Customers/5AwAJhTy8c8m3HqGKsofsNR9m0DllC5v3g9FuWix.png', 'Inactive', 'Yes', 1, '2021-06-01 18:02:17'),
(3, 'Bilal', 'Aijaz Abbasi', 'rashid@digitalsquare.us', '45101-1156318-1', '0331381710', 'dsafsadf\r\nsdfsdaf', 'sdfdsaf', 'Images/Customers/Xo5WqdwqT7PLLYLEI5ywvvqyzuurakKbqhYdX4rD.png', 'Inactive', 'Yes', 7, '2021-06-02 12:24:57'),
(4, 'adsf', 'Aijaz', 'rashid@digitalsquare.us', '45101-1156318-1', '03313817104', 'dsafsadf\r\nsdfsdaf', NULL, 'Images/Customers/Pq0lnDCyE9p5BCSMWAkK6wa0UIp4TDKJw7hOz0vd.png', 'Inactive', 'Yes', 1, '2021-06-02 13:25:09'),
(5, 'Rashid', 'Aijaz Abbasi', 'rashidabbasi17@gmail.com', '4510111563181', '(033)138-1710', 'dsafsadf\r\nsdfsdaf', 'daf', 'Images/Customers/PBRt6P9tHZ5k9nIKHijWteIaLPRrHotsD4KUgWfC.png', 'Inactive', 'No', 1, '2021-06-02 13:26:31'),
(6, 'asdf', 'Aijaz', 'rashidabbasi17@gmail.com', '45101-1156318-1', '03313817104', NULL, NULL, NULL, 'Active', 'No', 7, '2021-06-02 13:33:31'),
(7, 'Uzair', 'Ali', 'rashid@digitalsquare.us', '45101-1156318-1', '03313817104', 'dsafsadf\r\nsdfsdaf', NULL, NULL, 'Active', 'No', 8, '2021-06-02 13:40:24'),
(8, 'Rashid', 'Uzair', 'rashid@digitalsquare.us', '45101-1156318-1', '03313817104', 'dsafsadf\r\nsdfsdaf', 'sdfsdfsdf', 'Images/Customers/9IYSLbJvEbAC4gRAfXDvefDbTWijrtcN8T0iP093.png', 'Inactive', 'No', 1, '2021-06-02 15:56:04'),
(9, 'Rashid', 'Uzair', 'rashid@digitalsquare.us', '45101-1156318-1', '03313817104', 'dsafsadf\r\nsdfsdaf', 'fgdsfgd', 'Images/Customers/tjvy4H46Cfn7YndY4qnfqXAs7VXsNNd5zQXGwAIP.png', 'Active', 'Yes', 1, '2021-06-02 15:57:14'),
(10, 'adsf', 'Aijaz Abbasi', 'rashid@digitalsquare.us', '4510111563181', '03313817104', 'dsafsadf\r\nsdfsdaf', NULL, 'Images/Customers/fCgNZGiDFrkOKm4vwzo8tJvKeFiU48oWh4QhfAA6.png', 'Active', 'Yes', 1, '2021-06-02 16:42:30');

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
(11, 'Osama', 5, 'Active', 1, 'Yes', '2021-06-04 15:25:06');

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
(6, 'Bat', 4, NULL, '2001', '2008', 'on', NULL, 100, 0, 1000, 1300, 'Images/Products/4bqEWBBSsvpRz0PnQkyYUvwVISWVE5zUA9qq936y.png', 1, 'Active', 'No', '2021-06-04 12:17:08'),
(7, 'ball', 4, NULL, NULL, NULL, NULL, NULL, 100, 0, 100, 150, NULL, 1, 'Active', 'No', '2021-06-05 13:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_sales`
--

CREATE TABLE `product_sales` (
  `product_sale_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sales`
--

INSERT INTO `product_sales` (`product_sale_id`, `sale_id`, `product_id`, `price`, `date`) VALUES
(1, 1, 6, 20000, '2021-06-05 10:35:52'),
(2, 1, 6, 30000, '2021-06-05 11:41:41'),
(3, 1, 7, 150, '2021-06-05 13:12:30'),
(4, 1, 6, 200, '2021-06-05 14:06:05'),
(5, 1, 7, 500, '2021-06-05 14:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `status` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `customer_id`, `receiver_id`, `total`, `status`, `is_deleted`, `user_id`, `date`) VALUES
(1, 7, 8, 50000, 'Completed', 'No', 1, '2021-06-05 15:03:11');

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
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `image`, `role`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Basil', 'basil@gmail.com', NULL, '$2y$10$8UVo3SVELC2yc5N09EtcvOAXstHmJ1sCKHDE3UOtQ72WP/eQsT.1u', NULL, NULL, NULL, NULL, NULL, '2021-05-28 13:21:42', '2021-05-28 05:42:58', '2021-05-28 05:42:58'),
(6, 'Rashid', 'rashid@digitalsquare.us', NULL, '$2y$10$zhlevY1T.7ScGcb01tgg0.KrxYGiCiiVV/mdk1cxaUw3etQDsgp0m', NULL, '03313817104', NULL, 'User', 'Active', '2021-06-01 12:08:03', '2021-06-01 07:08:03', '2021-06-01 07:08:03'),
(7, 'adsf', 'rashidabbasi17@gmail.com', NULL, '$2y$10$RKbPW.wXLT2T2zvlJFcDJuG33sIkQP..eH8Y.BTEKoqOySiq0sWGS', NULL, '03313817104', NULL, 'User', 'Active', '2021-06-01 12:26:39', '2021-06-01 07:26:39', '2021-06-01 07:26:39'),
(8, 'Kamran Arshad', 'kamranarshad@gmail.com', NULL, '$2y$10$lHzqYZM9X1EoGkulPMbUW.9dRakOGvzUZH0py1YAy0o28trb5kUQe', NULL, '03313817104', NULL, 'User', 'Active', '2021-06-02 13:39:29', '2021-06-02 08:39:29', '2021-06-02 08:39:29');

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_sales`
--
ALTER TABLE `product_sales`
  MODIFY `product_sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
