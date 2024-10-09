-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 01:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpanel_app_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `gps_id` bigint(20) NOT NULL,
  `sim_number` int(11) NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `tariff_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `full_name`, `phone_number`, `gps_id`, `sim_number`, `status_id`, `tariff_id`, `created_at`, `updated_at`) VALUES
(1, 'Alex Handol', 111111111, 7801116408, 111111111, 2, 2, '2024-10-04 14:19:23', '2024-10-04 14:20:34'),
(2, 'Mike Kerr', 587485962, 7301018338, 547562315, 2, 2, '2024-10-09 01:59:25', '2024-10-09 01:59:25'),
(3, 'Benjamin Evans', 596784512, 5057989599, 598678877, 2, 2, '2024-10-09 01:59:47', '2024-10-09 01:59:47'),
(4, 'Billy Sheehan', 547898945, 7301067024, 533254478, 2, 2, '2024-10-09 02:00:10', '2024-10-09 02:00:10'),
(5, 'Steve Morse', 569787451, 7301056608, 566987451, 2, 1, '2024-10-09 02:00:43', '2024-10-09 02:00:43'),
(6, 'Steve Vai', 597841231, 7301056608, 589784512, 2, 2, '2024-10-09 02:01:05', '2024-10-09 02:01:05'),
(7, 'Ian Gillan', 522314502, 9171854711, 547124578, 2, 2, '2024-10-09 02:01:37', '2024-10-09 02:01:37'),
(8, 'Roger Glover', 522001133, 9171920241, 599885514, 2, 2, '2024-10-09 02:02:19', '2024-10-09 02:02:19'),
(9, 'Ian Paice', 511445063, 7301067195, 511443277, 2, 2, '2024-10-09 02:03:44', '2024-10-09 02:03:44'),
(10, 'Ritchie Blackmore', 571043015, 9172172311, 522222809, 2, 1, '2024-10-09 02:05:44', '2024-10-09 02:05:44'),
(11, 'David Coverdale', 558447711, 9171287619, 511109640, 2, 1, '2024-10-09 02:06:41', '2024-10-09 02:06:41'),
(12, 'John Lord', 595430303, 9171288121, 595738577, 2, 1, '2024-10-09 02:07:22', '2024-10-09 02:07:22'),
(13, 'თორნიკე ამირხანაშვილი', 555252228, 9171702333, 599459772, 2, 1, '2024-10-09 04:51:22', '2024-10-09 04:51:22'),
(14, 'ნინა ბელეცკი', 597022701, 7301018408, 595055330, 2, 2, '2024-10-09 04:51:38', '2024-10-09 04:51:38'),
(15, 'ლევან ცომაია', 555907778, 9171854482, 551907778, 2, 2, '2024-10-09 04:51:56', '2024-10-09 04:51:56'),
(16, 'ალეკო მორჩაძე', 574171711, 9171855106, 598891410, 2, 2, '2024-10-09 04:52:18', '2024-10-09 04:52:18'),
(17, 'გიორგი აფციაური', 591211001, 7801105979, 595651017, 2, 2, '2024-10-09 04:58:08', '2024-10-09 04:58:08'),
(18, 'ალექს უბირია', 568788878, 9171920358, 511109931, 2, 1, '2024-10-09 04:58:29', '2024-10-09 04:58:29'),
(19, 'კახა მარღია', 568679570, 9171920566, 599693176, 2, 2, '2024-10-09 04:58:55', '2024-10-09 04:58:55'),
(20, 'სერგო ბარსეგიან', 599037501, 7301032727, 591902317, 2, 2, '2024-10-09 04:59:18', '2024-10-09 04:59:18'),
(21, 'მიხეილ მახარაძე', 579007067, 9171920217, 591152373, 2, 2, '2024-10-09 04:59:35', '2024-10-09 04:59:35'),
(22, 'გიგა ტყემალაძე', 592061556, 7301032732, 599016187, 2, 2, '2024-10-09 04:59:55', '2024-10-09 04:59:55'),
(23, 'დანიელ ნოზაძე', 568380044, 9171919463, 551533641, 2, 2, '2024-10-09 05:00:16', '2024-10-09 05:00:16'),
(24, 'ნათია მემანიშვილი', 577282399, 7301056585, 599800434, 2, 2, '2024-10-09 05:02:16', '2024-10-09 05:02:16'),
(25, 'ალექსანდრ ბელოვ', 595765584, 7301056587, 591228528, 2, 1, '2024-10-09 05:02:37', '2024-10-09 05:02:37'),
(26, 'მამუკა ჯაფარიძე', 577773634, 5056934190, 511778634, 2, 2, '2024-10-09 05:02:55', '2024-10-09 05:02:55'),
(27, 'ელხან ანაგიევი', 568080594, 9172172329, 599551601, 2, 2, '2024-10-09 05:03:16', '2024-10-09 05:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2024_10_04_051941_create_statuses_table', 1),
(26, '2024_10_04_051942_create_tariffs_table', 1),
(27, '2024_10_04_051943_create_accounts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Active', NULL, NULL),
(2, 'Passive', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tariffs`
--

CREATE TABLE `tariffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tariff_name` varchar(50) NOT NULL,
  `tariff_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tariffs`
--

INSERT INTO `tariffs` (`id`, `tariff_name`, `tariff_price`, `created_at`, `updated_at`) VALUES
(1, 'Econom Tracker', 7.00, NULL, NULL),
(2, 'Standart Tracker', 10.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_status_id_foreign` (`status_id`),
  ADD KEY `accounts_tariff_id_foreign` (`tariff_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tariffs`
--
ALTER TABLE `tariffs`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tariffs`
--
ALTER TABLE `tariffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `accounts_tariff_id_foreign` FOREIGN KEY (`tariff_id`) REFERENCES `tariffs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
