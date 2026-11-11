-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2026 at 12:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalin`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_days` int(10) UNSIGNED NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `status` enum('pending','approved','rejected','completed','cancelled') NOT NULL DEFAULT 'pending',
  `notes` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `vehicle_id`, `start_date`, `end_date`, `total_days`, `total_price`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2026-11-14', '2026-11-16', 3, '255000.00', 'approved', 'Mohon konfirmasi penyewaan.', '2026-11-11 23:15:53', '2026-11-11 23:44:10'),
(2, 3, 3, '2026-11-17', '2026-11-19', 3, '1050000.00', 'approved', 'Untuk perjalanan keluarga.', '2026-11-11 23:15:53', '2026-11-11 23:15:53'),
(3, 4, 2, '2026-11-07', '2026-11-09', 3, '300000.00', 'completed', 'Penyewaan sudah selesai.', '2026-11-11 23:15:53', '2026-11-11 23:15:53'),
(4, 5, 4, '2026-11-12', '2026-11-13', 2, '600000.00', 'approved', 'Pinjam 1 hari', '2026-11-11 23:42:11', '2026-11-11 23:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(150) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@rentalin.test', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2uheWG/igi.', 'admin', NULL, '2026-11-11 23:05:51', '2026-11-11 23:05:51'),
(2, 'Budi Santoso', 'budi@gmail.com', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2uheWG/igi.', 'user', NULL, '2026-11-11 23:15:52', '2026-11-11 23:15:52'),
(3, 'Andi Wijaya', 'andi@gmail.com', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2uheWG/igi.', 'user', NULL, '2026-11-11 23:15:52', '2026-11-11 23:15:52'),
(4, 'Putri Maharani', 'putri@gmail.com', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2uheWG/igi.', 'user', NULL, '2026-11-11 23:15:52', '2026-11-11 23:15:52'),
(5, 'Rama', 'ramagm841@gmail.com', '081234567890', NULL, '$2y$10$h.JnubtapGOAQDqrM8bdM.NaYjSopnE7k/C7Rc/TVPy7C9l96epMa', 'user', NULL, '2026-11-11 23:41:36', '2026-11-11 23:41:36'),
(6, 'Caesar', 'caesarramandhika@gmail.com', '098765432120', NULL, '$2y$10$uVluoxCjWWI7XKNxQrbso.Ha1qet7kBQGPpYKOAbxc8BnaSfzV2QS', 'admin', NULL, '2026-11-11 23:43:34', '2026-11-11 23:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `type` enum('motor','mobil') NOT NULL,
  `year` smallint(6) DEFAULT NULL,
  `plate_number` varchar(20) NOT NULL,
  `price_per_day` decimal(12,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `status` enum('available','unavailable') NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `brand`, `type`, `year`, `plate_number`, `price_per_day`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Honda Vario 160', 'Honda', 'motor', 2023, 'DK 1234 ABC', '85000.00', 'Motor matic untuk mobilitas harian.', 'https://radartasik.disway.id/upload/ad66a4d53a26e0cec0f495802e4215ea.jpg', 'available', '2026-11-11 23:05:51', '2026-11-11 23:05:51'),
(2, 'Yamaha NMAX', 'Yamaha', 'motor', 2022, 'DK 2345 DEF', '100000.00', 'Motor nyaman untuk perjalanan.', 'https://www.yamaha-motor.co.jp/mc/lineup/nmax/img/nmax_price_2022.jpg', 'available', '2026-11-11 23:05:51', '2026-11-11 23:05:51'),
(3, 'Toyota Avanza', 'Toyota', 'mobil', 2021, 'DK 3456 GHI', '350000.00', 'Mobil keluarga.', 'https://www.autopediame.com/storage/images/Toyota/%D8%AA%D9%88%D9%8A%D9%88%D8%AA%D8%A7%20%D8%A7%D9%81%D8%A7%D9%86%D8%B2%D8%A7%201.jpg', 'available', '2026-11-11 23:05:51', '2026-11-11 23:05:51'),
(4, 'Honda Brio', 'Honda', 'mobil', 2022, 'DK 4567 JKL', '300000.00', 'Mobil city car nyaman dan irit bahan bakar.', 'https://img3.icarcdn.com/45417861/gallery_mobil-bekas-carmudi-honda-brio-satya-e-hatchback-indonesia_f7cb6773-a6f7-4362-9d4d-635b26ecaf33.jpeg?smia=xTM', 'available', '2026-11-11 23:15:52', '2026-11-11 23:15:52'),
(5, 'Toyota Innova Reborn', 'Toyota', 'mobil', 2021, 'DK 5678 MNO', '500000.00', 'Mobil keluarga dengan kabin luas.', 'https://thumb.katadata.co.id/frontend/thumbnail/2025/10/14/zigi-68ee4a67b5553-innova-reborn_910_512.jpg', 'available', '2026-11-11 23:15:52', '2026-11-11 23:15:52'),
(6, 'Honda Scoopy', 'Honda', 'motor', 2023, 'DK 6789 PQR', '75000.00', 'Motor matic bergaya retro untuk perjalanan harian.', 'https://media.doanhnghiepvn.vn/Images/Uploaded/Share/2022/11/06/a39honda-scoopy-2023.jpg', 'available', '2026-11-11 23:15:52', '2026-11-11 23:15:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`,`start_date`,`end_date`);

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
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plate_number` (`plate_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
