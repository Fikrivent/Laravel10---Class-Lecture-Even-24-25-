-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2025 at 08:40 AM
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
-- Database: `myresto`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`, `image`, `deleted_at`) VALUES
(1, NULL, NULL, 'Appetizer', 'appetizer.jpeg', NULL),
(2, NULL, '2025-05-14 00:59:21', 'Main Course', 'main_course.jpg', '2025-05-14 00:59:21'),
(3, NULL, NULL, 'Snacks', '', NULL),
(4, NULL, NULL, 'Dessert', '', NULL),
(5, NULL, NULL, 'Coffee', '', NULL),
(6, NULL, '2025-06-04 00:48:14', 'Non-Coffee', '', '2025-06-04 00:48:14'),
(7, NULL, '2025-06-04 00:47:32', 'Healthy Juice', '', '2025-06-04 00:47:32'),
(8, '2025-05-07 00:02:28', '2025-05-14 00:54:15', 'Kategori Baru 1 - Updated', NULL, '2025-05-14 00:54:15'),
(9, '2025-05-07 00:17:49', '2025-05-14 00:53:53', 'Kategori Baru 2', NULL, '2025-05-14 00:53:53'),
(12, '2025-05-20 23:35:22', '2025-05-21 00:56:22', 'category with modal edited no reload 2', NULL, '2025-05-21 00:56:22');

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
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `nutrition_facts` text NOT NULL,
  `description` text NOT NULL,
  `price` double(8,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `created_at`, `updated_at`, `name`, `nutrition_facts`, `description`, `price`, `category_id`) VALUES
(1, NULL, NULL, 'Nasi Merah dengan Ayam Panggang Kecap', 'Kalori: 400-550 kkal\n                                Protein: 30-40 gram\n                                Lemak: 15-25 gram\n                                Karbohidrat: 50-70 gram\n                                Serat: 5-8 gram', 'Nikmati hidangan sehat dan lezat dengan Nasi Merah yang kaya serat, dipadukan dengan Ayam Panggang Kecap yang manis gurih dan Tumis Kangkung yang segar. Kombinasi sempurna untuk santapan yang bergizi.', 28000.00, 2);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_03_04_050812_create_categories_table', 1),
(6, '2025_03_05_065914_create_foods_table', 1),
(7, '2025_03_05_071357_update_foods_table', 2),
(8, '2025_03_05_071647_update_categories_table', 3),
(9, '2025_03_05_072338_update_foods_table', 4),
(10, '2025_04_16_064332_update2_category_table', 5),
(11, '2025_05_14_075044__add_soft_delete_category_table', 6),
(12, '2025_05_25_044316_create_table_dmcustomers', 7),
(13, '2025_05_25_044322_create_table_dmorders', 7),
(14, '2025_05_25_073528_create_orderfood_table', 7);

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
-- Table structure for table `table_dmorderfood`
--

CREATE TABLE `table_dmorderfood` (
  `food_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_dmorders`
--

CREATE TABLE `table_dmorders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_order` varchar(1000) NOT NULL,
  `kode_promo` varchar(1000) DEFAULT NULL,
  `total_orders_rp` double(8,2) NOT NULL,
  `num_of_items` int(11) NOT NULL,
  `tanggal_order` datetime DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `tanggal_jadi_member` datetime DEFAULT NULL,
  `status_member` enum('silver','gold','platinum') NOT NULL DEFAULT 'silver',
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `dob`, `tanggal_jadi_member`, `status_member`, `role`) VALUES
(1, 'Dr. Triston Bednar MD', 'estevan.howell@example.org', '2025-03-05 01:05:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kTCXiGpI1X', '2025-03-05 01:05:17', '2025-03-05 01:05:17', NULL, NULL, 'silver', ''),
(2, 'Miss Annabel Zieme', 'colleen.okeefe@example.net', '2025-03-05 01:05:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6i49ukjGxZ', '2025-03-05 01:05:17', '2025-03-05 01:05:17', NULL, NULL, 'silver', ''),
(3, 'Felicia Bauch', 'jenkins.javon@example.org', '2025-03-05 01:05:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ItqYaRRlLO', '2025-03-05 01:05:17', '2025-03-05 01:05:17', NULL, NULL, 'silver', ''),
(4, 'Marion Maggio', 'wunsch.osborne@example.com', '2025-03-05 01:05:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'w1M2u95uqb', '2025-03-05 01:05:17', '2025-03-05 01:05:17', NULL, NULL, 'silver', ''),
(5, 'Maria Dicki I', 'roberts.nathanael@example.com', '2025-03-05 01:05:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AVIlxKgaXM', '2025-03-05 01:05:17', '2025-03-05 01:05:17', NULL, NULL, 'silver', ''),
(6, 'Mandy Mueller V', 'ahamill@example.com', '2025-03-05 01:05:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9IB95Oes7U', '2025-03-05 01:05:17', '2025-03-05 01:05:17', NULL, NULL, 'silver', ''),
(7, 'Bartholome Botsford DDS', 'cole.vicky@example.org', '2025-03-05 01:05:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xHc9n9AwDd', '2025-03-05 01:05:17', '2025-03-05 01:05:17', NULL, NULL, 'silver', ''),
(8, 'Stefanie Schinner DVM', 'dubuque.emilie@example.net', '2025-03-05 01:05:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ESRbxcx4My', '2025-03-05 01:05:17', '2025-03-05 01:05:17', NULL, NULL, 'silver', ''),
(9, 'Jensen Powlowski', 'monserrate.wiegand@example.org', '2025-03-05 01:05:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vqfgbEpqyZ', '2025-03-05 01:05:17', '2025-03-05 01:05:17', NULL, NULL, 'silver', ''),
(10, 'Mrs. Sabryna Ondricka', 'jarrell23@example.net', '2025-03-05 01:05:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ujtku4EVCj', '2025-03-05 01:05:17', '2025-03-05 01:05:17', NULL, NULL, 'silver', ''),
(11, 'Fikri', 'fikribaharuddin@gmail.com', NULL, '$2y$10$SDjvU4JYj0b.dgY9IeG5V.fgPO5QRBJ/JD/JBP/vdFSMwIbAk/Pjy', NULL, '2025-06-03 23:54:39', '2025-06-03 23:54:39', NULL, NULL, 'silver', ''),
(12, 'Spiderman', 'peter@jawa.com', NULL, '$2y$10$m06BhvZv3gbNPrtYRx22GOJw/3rKotwht6sffMBo7ufC6pbRyu0fi', NULL, '2025-06-04 00:19:02', '2025-06-04 00:19:02', NULL, NULL, 'silver', 'manager'),
(13, 'admin', 'admin@me.com', NULL, '$2y$10$hSq3cIUEA/aRydWklP87p.vDhcQq5WcfoCFiKqhCw5ApTEuuPAAO2', NULL, '2025-06-04 00:23:44', '2025-06-04 00:23:44', NULL, NULL, 'silver', 'manager'),
(14, 'pegawai', 'pegawai@me.com', NULL, '$2y$10$A22NmKZStuy64Sd4AxjoLeBtCcLCPLYruHnv50REcFJvabDfzKfry', NULL, '2025-06-04 00:24:31', '2025-06-04 00:24:31', NULL, NULL, 'silver', 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foods_category_id_foreign` (`category_id`);

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
-- Indexes for table `table_dmorderfood`
--
ALTER TABLE `table_dmorderfood`
  ADD PRIMARY KEY (`food_id`,`order_id`),
  ADD KEY `orderfood_order_id` (`order_id`);

--
-- Indexes for table `table_dmorders`
--
ALTER TABLE `table_dmorders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_customer_id` (`customer_id`),
  ADD KEY `order_staff_id` (`staff_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_dmorders`
--
ALTER TABLE `table_dmorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `table_dmorderfood`
--
ALTER TABLE `table_dmorderfood`
  ADD CONSTRAINT `orderfood_food_id` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`),
  ADD CONSTRAINT `orderfood_order_id` FOREIGN KEY (`order_id`) REFERENCES `table_dmorders` (`id`);

--
-- Constraints for table `table_dmorders`
--
ALTER TABLE `table_dmorders`
  ADD CONSTRAINT `order_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_staff_id` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
