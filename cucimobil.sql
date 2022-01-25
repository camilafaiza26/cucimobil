-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 03:01 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cucimobil`
--

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
-- Table structure for table `jenis_mobils`
--

CREATE TABLE `jenis_mobils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_mobils`
--

INSERT INTO `jenis_mobils` (`id`, `nama_jenis`, `created_at`, `updated_at`) VALUES
(1, 'Sedan', '2021-12-14 17:00:00', '2021-12-13 17:00:00'),
(2, 'Mini bus', '2022-01-14 09:33:31', '2022-01-14 09:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `layanans`
--

CREATE TABLE `layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_layanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_id` bigint(20) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanans`
--

INSERT INTO `layanans` (`id`, `nama_layanan`, `jenis_id`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Cuci luar', 2, 250000, '2022-01-20 17:00:00', '2022-01-20 17:00:00'),
(2, 'Mengeringkan', 1, 70000, '2022-01-20 22:53:24', '2022-01-20 22:53:24'),
(3, 'Cuci Dalam', 2, 900000, '2022-01-21 02:07:33', '2022-01-21 02:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_paket`
--

CREATE TABLE `layanan_paket` (
  `id_detail_paket` bigint(20) UNSIGNED NOT NULL,
  `layanan_id` bigint(20) UNSIGNED NOT NULL,
  `paket_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanan_paket`
--

INSERT INTO `layanan_paket` (`id_detail_paket`, `layanan_id`, `paket_id`, `created_at`, `updated_at`) VALUES
(14, 1, 7, NULL, NULL),
(15, 3, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mereks`
--

CREATE TABLE `mereks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_merek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mereks`
--

INSERT INTO `mereks` (`id`, `nama_merek`, `created_at`, `updated_at`) VALUES
(1, 'Toyota', '2022-01-20 22:44:16', '2022-01-20 22:44:24'),
(2, 'Honda', '2022-01-20 22:44:31', '2022-01-20 22:44:31');

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2020_09_26_202453_create_sessions_table', 1),
(13, '2021_12_20_143636_create_pelanggans_table', 2),
(14, '2021_12_20_143800_create_jenis_mobils_table', 2),
(15, '2021_12_20_143844_create_layanans_table', 2),
(16, '2021_12_20_143913_create_pakets_table', 3),
(18, '2021_12_20_144415_create_pemesanas_table', 4),
(22, '2022_01_21_054140_create_mereks_table', 5),
(23, '2022_01_21_054207_create_layanans_table', 5),
(24, '2022_01_21_054226_create_pakets_table', 5),
(25, '2022_01_21_054255_create_detail_pakets_table', 5),
(26, '2022_01_21_054316_create_pemesanans_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pakets`
--

CREATE TABLE `pakets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskon` int(11) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pakets`
--

INSERT INTO `pakets` (`id`, `nama_paket`, `diskon`, `harga_paket`, `created_at`, `updated_at`) VALUES
(7, 'Paket CWA', 50, 575000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('camilafaizam@gmail.com', '$2y$10$9sFlRfLsyujvm3pfQauS2eR1xyTzjwXuYxKURSBtPfrapm1No6GFO', '2022-01-21 04:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama`, `nohp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Camila Faiza M', '08373883838', 'Jl.Batuang Taba no 14 rt01 rw03', '2021-12-23 07:43:18', '2021-12-23 07:48:06'),
(2, 'Saras', '08373883838', 'Jl. Saras', '2021-12-23 16:59:07', '2021-12-23 16:59:07'),
(3, 'Lala', '08373883838', 'Jl. Hai', '2021-12-23 18:37:16', '2021-12-23 18:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanans`
--

CREATE TABLE `pemesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `paket_id` bigint(20) UNSIGNED NOT NULL,
  `merek_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plat` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `status_bayar` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanans`
--

INSERT INTO `pemesanans` (`id`, `pelanggan_id`, `paket_id`, `merek_id`, `user_id`, `plat`, `tanggal_pemesanan`, `status_bayar`, `created_at`, `updated_at`) VALUES
(3, 1, 7, 1, 1, 'BA1847QI', '2022-01-21', 1, '2022-01-21 13:53:48', '2022-01-21 13:53:48'),
(4, 3, 7, 1, 1, 'BA1821SI', '2022-01-22', 1, '2022-01-22 02:39:50', '2022-01-22 02:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('07fUVtirSQTL0I2YQz6UJeX07Uw2iSi0tmCiRHke', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiRWJraWhqemtMWXFwSmNQOEdoTmhyVEl2T2ZURHQ0S2t6OHhndEJBaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sYXBvcmFuYnVsYW5hbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCR2cGxjZ2pkdUwxeS5aUmwuMGJWcEYuU2VlN0xlUm1Iei53clJSUTZDTENOajVwZHNia3MuLiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkdnBsY2dqZHVMMXkuWlJsLjBiVnBGLlNlZTdMZVJtSHoud3JSUlE2Q0xDTmo1cGRzYmtzLi4iO3M6NToiYWxlcnQiO2E6MDp7fX0=', 1643119028);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDirectur` tinyint(1) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `nohp`, `alamat`, `isDirectur`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'direktur', 'direktur@gmail.com', 'direktur26', '08123456789', 'Andalas', 1, NULL, '$2y$10$vplcgjduL1y.ZRl.0bVpF.See7LeRmHz.wrRRQ6CLCNj5pdsbks..', NULL, NULL, 'McDcBNjlpSo2tILqhDCMKeGMfQp1x4RMNHmtfF39co9iNoF6g864e0hGRVC2', NULL, 'profile-photos/HPc6ecwziwZqXLG0oZxOaWzUEN6KtN2k1lIOZuuV.png', '2021-12-19 14:59:36', '2022-01-16 11:37:15'),
(2, 'Saras', 'saras@gmail.com', 'saras02', '08373883838', 'Jl. Gatau', 0, NULL, '$2y$10$zVLXk.Yev66Nn2VRyqxWQuyuDt2pUfBhS8RPbG2zA.VYuTos7Ukkq', NULL, NULL, NULL, NULL, NULL, '2021-12-20 06:52:45', '2022-01-19 10:43:54'),
(3, 'Camila Faiza', 'camilafaizam@gmail.com', 'camilafaizams', '08373883838', 'Jl.Batuang Taba no 14 rt01 rw03', 0, NULL, '$2y$10$kR8aOr3f0VIEb2I./B5/jeDJFVLfq04xvh89vyROK1LtXUpznEyaC', NULL, NULL, NULL, NULL, NULL, '2021-12-20 07:02:52', '2021-12-20 07:10:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_mobils`
--
ALTER TABLE `jenis_mobils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanans`
--
ALTER TABLE `layanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layanans_jenis_id_index` (`jenis_id`);

--
-- Indexes for table `layanan_paket`
--
ALTER TABLE `layanan_paket`
  ADD PRIMARY KEY (`id_detail_paket`),
  ADD KEY `detail_pakets_layanan_id_index` (`layanan_id`),
  ADD KEY `detail_pakets_paket_id_index` (`paket_id`);

--
-- Indexes for table `mereks`
--
ALTER TABLE `mereks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakets`
--
ALTER TABLE `pakets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanans_pelanggan_id_index` (`pelanggan_id`),
  ADD KEY `pemesanans_paket_id_index` (`paket_id`),
  ADD KEY `pemesanans_merek_id_index` (`merek_id`),
  ADD KEY `pemesanans_user_id_index` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_mobils`
--
ALTER TABLE `jenis_mobils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `layanans`
--
ALTER TABLE `layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `layanan_paket`
--
ALTER TABLE `layanan_paket`
  MODIFY `id_detail_paket` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mereks`
--
ALTER TABLE `mereks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pakets`
--
ALTER TABLE `pakets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemesanans`
--
ALTER TABLE `pemesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `layanans`
--
ALTER TABLE `layanans`
  ADD CONSTRAINT `layanans_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_mobils` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `layanan_paket`
--
ALTER TABLE `layanan_paket`
  ADD CONSTRAINT `detail_pakets_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `layanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pakets_paket_id_foreign` FOREIGN KEY (`paket_id`) REFERENCES `pakets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD CONSTRAINT `pemesanans_merek_id_foreign` FOREIGN KEY (`merek_id`) REFERENCES `mereks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanans_paket_id_foreign` FOREIGN KEY (`paket_id`) REFERENCES `pakets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanans_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
