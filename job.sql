-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 11:26 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `a_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(200) NOT NULL DEFAULT -1,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`a_id`, `user_id`, `first_name`, `last_name`, `email`, `image`, `resume`, `skills`, `created_at`, `updated_at`) VALUES
(1, 1, 'Md. Mominul', 'Islam', 'mominulmanikcse13@gmail.com', '1564181016.jpg', '1564181160.pdf', 'manik', '2019-07-25 12:36:06', '2019-07-25 12:36:06'),
(2, 9, 'Md. Abdullah', 'Manik', 'abdullah@gmail.com', NULL, NULL, NULL, '2019-07-27 03:03:12', '2019-07-27 03:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `appliedjobs`
--

CREATE TABLE `appliedjobs` (
  `appliedjob_id` bigint(20) UNSIGNED NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliedjobs`
--

INSERT INTO `appliedjobs` (`appliedjob_id`, `applicant_id`, `company_id`, `job_id`, `created_at`, `updated_at`) VALUES
(1, '1', '3', '1', '2019-07-26 07:37:47', '2019-07-26 07:37:47'),
(2, '1', '3', '2', '2019-07-26 07:40:24', '2019-07-26 07:40:24'),
(3, '1', '3', '3', '2019-07-26 07:41:38', '2019-07-26 07:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `c_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(200) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bussiness_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`c_id`, `user_id`, `first_name`, `last_name`, `email`, `bussiness_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Adbur', 'Rahim', 'admin@com', 'Namespace IT', '2019-07-25 12:36:45', '2019-07-25 12:36:45'),
(3, 8, 'Abdur', 'Khalek', 'demo@hospital1.com', 'Namespace IT', '2019-07-25 14:13:38', '2019-07-25 14:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `jobdetails`
--

CREATE TABLE `jobdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobdetails`
--

INSERT INTO `jobdetails` (`id`, `company_id`, `job_title`, `job_description`, `salary`, `job_location`, `country`, `created_at`, `updated_at`) VALUES
(1, '3', 'Junior Software Engineer', 'We`re looking for 30 fresh software engineers for our team. We`re looking for 30 fresh software engineers for our team. We`re looking for 30 fresh software engineers for our team. We`re looking for 30 fresh software engineers for our team.', '30000', 'Dhaka', 'Bangladesh', '2019-07-25 15:44:45', '2019-07-25 15:44:45'),
(2, '3', 'Software Engineer', 'We`re looking for 30 fresh software engineers for our team. We`re looking for 30 fresh software engineers for our team. We`re looking for 30 fresh software engineers for our team. We`re looking for 30 fresh software engineers for our team.', '40000', 'Dhaka', 'Bangladesh', '2019-07-25 15:46:16', '2019-07-25 15:46:16'),
(3, '3', 'Senior Software Engineer', 'We`re looking for 30 fresh software engineers for our team.We`re looking for 30 fresh software engineers for our team.We`re looking for 30 fresh software engineers for our team.We`re looking for 30 fresh software engineers for our team.', '60000', 'Dhaka', 'Bangladesh', '2019-07-25 15:48:54', '2019-07-25 15:48:54'),
(6, '1', 'Junior Software Engineer', 'Graduation from Computer Science and Engineering. Graduation from Computer Science and Engineering. Graduation from Computer Science and Engineering', '30000', 'Dhaka', 'Bangladesh', '2019-07-27 00:39:02', '2019-07-27 02:24:51');

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
(3, '2019_07_25_064524_create_company_table', 1),
(4, '2019_07_25_064616_create_applicant_table', 1),
(5, '2019_07_25_064705_create_jobdetails_table', 1),
(6, '2019_07_25_064750_create_appliedjob_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md. MominulIslam', 'mominulmanikcse13@gmail.com', 'applicant', NULL, '$2y$10$ic59exG.LPq24PyAFxedjuQD19GeBCxfHuk2Ggy7qevbuW9UEvJ9y', NULL, '2019-07-25 12:36:06', '2019-07-25 12:36:06'),
(2, 'AdburRahim', 'admin@com', 'company', NULL, '$2y$10$XUe7U8zu/740rj1MWLTlx.NqFULoOb8v.QfFVFyhnYbeClSjcADv6', NULL, '2019-07-25 12:36:46', '2019-07-25 12:36:46'),
(4, 'AbdurKhalek', 'demo@hospital.com', 'company', NULL, '$2y$10$d991G5rbUpt1ano4679D0OIoqkkRMO0ErjGTQ12omqEgJdC21j6uq', NULL, '2019-07-25 14:02:19', '2019-07-25 14:02:19'),
(8, 'AbdurKhalek', 'demo@hospital1.com', 'company', NULL, '$2y$10$vMm/frdKGfgK4ImeltRI8u0scwEMcATUfjO9tQ4.Ok0g/eHXr5PfG', NULL, '2019-07-25 14:13:38', '2019-07-25 14:13:38'),
(9, 'Md. AbdullahManik', 'abdullah@gmail.com', 'applicant', NULL, '$2y$10$RKSZXOGzDdD8GStTwJ/WreA5Pli93RWA/v3kj3QeF2O5IqGSYLAE2', NULL, '2019-07-27 03:03:11', '2019-07-27 03:03:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `applicants_email_unique` (`email`);

--
-- Indexes for table `appliedjobs`
--
ALTER TABLE `appliedjobs`
  ADD PRIMARY KEY (`appliedjob_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

--
-- Indexes for table `jobdetails`
--
ALTER TABLE `jobdetails`
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
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `a_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appliedjobs`
--
ALTER TABLE `appliedjobs`
  MODIFY `appliedjob_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `c_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobdetails`
--
ALTER TABLE `jobdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
