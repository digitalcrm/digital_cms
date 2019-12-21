-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2019 at 08:35 AM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'profile.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` bigint(191) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `picture`, `remember_token`, `mobile`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Admin1', 'admin@mail.com', NULL, '$2y$10$bBkI9.j6sP6/YSMMKSaV/.4JsXP.hhLHVVi7f12Okm/ywvFcASnYa', '/uploads/admin/1574605324.png', 'VQcVGyFCve3hxDLi5YXdtHYI4lvoIL7O4UOXjRM7jmmp2oB2cdUqBrQWzWny', 8755789008, 'Delhi Shalimar baagh', NULL, '2019-11-25 00:47:19'),
(2, 'Newadmin', 'admin@admin.com', NULL, '$2y$10$bBkI9.j6sP6/YSMMKSaV/.4JsXP.hhLHVVi7f12Okm/ywvFcASnYa', '/uploads/admin/1576308526.jpg', NULL, 7890231456, NULL, NULL, '2019-12-14 01:58:46'),
(4, 'Superadmin', 'info@admin.com', NULL, '$2y$10$bBkI9.j6sP6/YSMMKSaV/.4JsXP.hhLHVVi7f12Okm/ywvFcASnYa', '/uploads/admin/1576310059.jpg', NULL, NULL, NULL, NULL, '2019-12-14 02:24:19'),
(6, 'Digital', 'crm@mail.com', NULL, '$2y$10$bBkI9.j6sP6/YSMMKSaV/.4JsXP.hhLHVVi7f12Okm/ywvFcASnYa', '/uploads/admin/1576312725.jpg', NULL, NULL, NULL, NULL, '2019-12-14 03:08:45');

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_16_104114_create_admin_table', 2),
(8, '2019_11_25_111734_add_deleted_at_column_to_users', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('digitalcrm@mail.com', '$2y$10$RNBllGcAfdtvHhw4XuBugurp9cX34zMldBr9YeRsEfBT2mNMgOiWm', '2019-11-18 00:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'profile.png',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `middlename`, `lastname`, `picture`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Neeraj', NULL, NULL, 'profile.png', 'nick@mail.com', NULL, '$2y$10$JFRiYUlSiwax0hi7KC3sUu8eQsIuiSezvQBuW1Pu.h2cisGGImNgu', 0, NULL, '2019-11-16 05:23:32', '2019-11-27 00:34:07', NULL),
(2, 'digital', NULL, NULL, 'profile.png', 'digitalcrm@mail.com', '2019-11-19 03:42:29', '$2y$10$8En97.OFDNWFzEWmqd57xuoI/NyRwOQ2EZuLdvx.fKPAyoYIELTWO', 1, NULL, '2019-11-16 06:10:10', '2019-11-27 00:34:07', NULL),
(3, 'user1', NULL, NULL, 'profile.png', 'user@gmail.com', '2019-11-19 07:01:41', '$2y$10$KnZarHwpiYh7K03oXCoxrO1uVdfp7Kda4Lr6X6PX1i4vOCmT.QPOi', 1, NULL, '2019-11-18 06:42:27', '2019-11-27 00:34:07', NULL),
(4, 'User2', NULL, NULL, 'profile.png', 'user@mail.com', NULL, '$2y$10$WX/z0zkx1HjEJMRwMlgfseLZGqoZ0.E3Bp8giwP6HrSbhgK1gFOP2', 0, NULL, '2019-11-19 04:57:35', '2019-11-27 00:34:07', NULL),
(5, 'User3', NULL, NULL, 'profile.png', 'user3@mail.com', NULL, '$2y$10$zD17kb8GndNNrc12XsvOc.YlE5QVrhsZjZg2xdHJrMVI/NvQ5ysd.', 0, NULL, '2019-11-19 05:00:06', '2019-11-27 00:34:07', NULL),
(6, 'user4', NULL, NULL, 'profile.png', 'user4@mail.com', '2019-11-19 05:01:37', '$2y$10$tp2WW52C5jx8xOv6q8hQbewKwQD0P7Y0.2y2c8itRwI65eNUQca6m', 1, NULL, '2019-11-19 05:01:27', '2019-11-27 00:34:07', NULL),
(7, 'User5', NULL, NULL, 'profile.png', 'user5@mail.com', '2019-11-19 06:01:23', '$2y$10$iQOyM7CMucPWaQSZ/mVmXO/o7Fu5/QEeKgc/l6zRQrjBPSDoUqnpW', 0, NULL, '2019-11-19 06:01:14', '2019-12-20 07:47:31', '2019-12-20 07:47:31'),
(8, 'NewUser', NULL, NULL, 'profile.png', 'usernew@mail.com', '2019-11-21 02:43:33', '$2y$10$BwlFcXGCakCc115OvG76XO75moY9/Yx0Zyba6m/20oGE/dWcIem..', 1, NULL, '2019-11-21 02:43:04', '2019-11-27 00:34:07', NULL),
(9, 'Paul', 'mid', 'walker', '/uploads/user/1574507026.jpg', 'user6@mail.com', '2019-11-21 07:43:28', '$2y$10$uefK/BsIt4o35ocjcLhUK.UQudEUsCSVOjrqkIoeXWw9TcJhjqUxS', 1, NULL, '2019-11-21 07:42:56', '2019-12-16 00:07:22', NULL),
(10, 'Mahendra', NULL, 'Bahubali', '/uploads/user/1574606543.jpg', 'makedigital@mail.com', '2019-11-24 09:07:55', '$2y$10$PzVCQYfatk9q0V/44o.0reUrcs6GrSfuZnKfRaN4qU1exr2UN2H8S', 1, NULL, '2019-11-24 09:07:41', '2019-12-16 00:07:26', NULL),
(11, 'Bhallaladeva', NULL, 'King of Mahishmati', '/uploads/user/1574607277.jpg', 'dev@mail.com', '2019-11-24 09:22:49', '$2y$10$0GaseRs20ddHJbtHl2N5BuB8DzZjV34GVI7jqTIW7c6lGQ3Ar4pom', 0, 'SVHQOnykkWNKlp7ePdylLYTusS3CYP798KgOITzFXvgk8AWn8etuytLqoUpE', '2019-11-24 09:22:28', '2019-12-16 00:07:10', NULL),
(12, 'date', NULL, NULL, 'profile.png', 'date@mail.com', '2019-11-24 09:43:10', '$2y$10$.UVvze9UdJtJmqFXRqsVCOXL2qYs2WYUpElJ568ViQ2ILsl.5OhZG', 1, NULL, '2019-11-24 09:42:41', '2019-11-27 00:34:41', '2019-11-27 00:34:41'),
(13, 'hello', 'singh', 'mail', 'profile.png', 'hello@mail.com', '2019-11-24 09:51:13', '$2y$10$8En97.OFDNWFzEWmqd57xuoI/NyRwOQ2EZuLdvx.fKPAyoYIELTWO', 1, NULL, '2019-11-24 15:18:39', '2019-11-27 00:34:38', '2019-11-27 00:34:38'),
(14, 'user10', NULL, NULL, 'profile.png', 'user10@mail.com', NULL, '$2y$10$wtRRHZcVbbf76nendrkS2On7gK6je6/G4UYZZflHY5c8bOyJq/JUO', 1, NULL, '2019-12-20 07:29:19', '2019-12-20 07:44:29', '2019-12-20 07:44:29'),
(15, 'Nick10005', NULL, NULL, 'profile.png', 'nick12@info.com', NULL, '$2y$10$y4Ry6Oz2R7sqcwnvG81G/.QKXByYbVOYx1XC7yvJhj1458yAr.l0W', 1, NULL, '2019-12-20 07:30:27', '2019-12-20 07:30:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
