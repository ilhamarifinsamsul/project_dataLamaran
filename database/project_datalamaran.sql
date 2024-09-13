-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2024 at 04:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_datalamaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(11, '2024-09-04-034014', 'App\\Database\\Migrations\\TbRole', 'default', 'App', 1726016474, 1),
(12, '2024-09-04-034216', 'App\\Database\\Migrations\\TbUsers', 'default', 'App', 1726016474, 1),
(13, '2024-09-05-023216', 'App\\Database\\Migrations\\TbStatus', 'default', 'App', 1726016474, 1),
(14, '2024-09-05-023404', 'App\\Database\\Migrations\\TbPortal', 'default', 'App', 1726016474, 1),
(15, '2024-09-05-024300', 'App\\Database\\Migrations\\TbLamaran', 'default', 'App', 1726016474, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lamaran`
--

CREATE TABLE `tb_lamaran` (
  `id` int(11) UNSIGNED NOT NULL,
  `perusahaan` varchar(256) NOT NULL,
  `posisi` varchar(256) NOT NULL,
  `alamat_perusahaan` varchar(256) NOT NULL,
  `tanggal` date NOT NULL,
  `portal_id` int(11) UNSIGNED NOT NULL,
  `status_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_lamaran`
--

INSERT INTO `tb_lamaran` (`id`, `perusahaan`, `posisi`, `alamat_perusahaan`, `tanggal`, `portal_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'PT. TKG SUBANG', 'IT Support', 'SUBANG', '2024-09-11', 2, 6, NULL, NULL),
(2, 'PT. MAYORA TBK', 'Project Officer', 'SUBANG', '2024-09-11', 3, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_portal`
--

CREATE TABLE `tb_portal` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_portal` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_portal`
--

INSERT INTO `tb_portal` (`id`, `nama_portal`, `created_at`, `updated_at`) VALUES
(1, 'Email', '2024-09-05 14:15:00', '2024-09-05 14:15:00'),
(2, 'Google Form', '2024-09-05 14:15:00', '2024-09-05 14:15:00'),
(3, 'LinkedIn', '2024-09-05 14:15:00', '2024-09-05 14:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'jobseeker');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id`, `nama_status`) VALUES
(1, 'Apply'),
(2, 'Psikotest'),
(3, 'Interview HR'),
(4, 'Interview User'),
(5, 'MCU'),
(6, 'Joined');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `nama_lengkap`, `email`, `password`, `alamat`, `no_hp`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin Sistem Informasi', 'iadmin@gmail.com', '$2y$10$wapWNLa2SEKupas0uvJxu.AC9dvTq/o4dkPL8i5kbENUqvepePBcK', 'Subang', '087699525330', 1, '2024-09-05 14:15:00', '2024-09-05 14:15:00'),
(2, 'ilham', 'Ilham Arifin', 'ilham@gmail.com', '$2y$10$AhQpnZuhhqHEnC92bF8Ay.7wySj4oabmwoRyB1.wZLTZG2vDRSJJG', 'Subang', '089699525330', 2, '2024-09-05 14:15:00', '2024-09-05 14:15:00'),
(3, 'ahmad', 'Ahmad Sugianto', 'ahmad@gmail.com', '$2y$10$1TJrgD12CeBze48Esf9YS.ki9Tt8rKAtFLeHcvrbIVJNFuBRp2XH.', 'Subang', '0888899887', 2, NULL, NULL),
(6, 'cita', 'Cita Sari', 'cita@email.com', '$2y$10$j8K/eYUJgGEvAGhTg1ETneEZL.Im7.AlkTKNMWm1SNEGvTfYSTxxe', 'Subang', '0888778876', 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lamaran`
--
ALTER TABLE `tb_lamaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_lamaran_portal_id_foreign` (`portal_id`),
  ADD KEY `tb_lamaran_status_id_foreign` (`status_id`);

--
-- Indexes for table `tb_portal`
--
ALTER TABLE `tb_portal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `tb_users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_lamaran`
--
ALTER TABLE `tb_lamaran`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_portal`
--
ALTER TABLE `tb_portal`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_lamaran`
--
ALTER TABLE `tb_lamaran`
  ADD CONSTRAINT `tb_lamaran_portal_id_foreign` FOREIGN KEY (`portal_id`) REFERENCES `tb_portal` (`id`),
  ADD CONSTRAINT `tb_lamaran_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `tb_status` (`id`);

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
