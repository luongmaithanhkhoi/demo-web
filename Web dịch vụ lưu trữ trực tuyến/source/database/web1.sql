-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 02:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
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
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `main_filename` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` int(11) NOT NULL DEFAULT 2,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `permission`, `password`) VALUES
(1, 'Admin', 'admin@admin.com', 1, '12345678'),
(10, 'customer1', 'thanhkhoi939@gmail.com', 2, '$2y$10$MggiivvXEV56o/adVnUJLeo/mm21q8qShBze1Vnw3wMvTaS4KRwAa'),
(11, 'customer2', 'admin@email.com', 2, '$2y$10$aN4sFBBeepDOn.g5geSDg.jO1ix6sV7gXdXh/r.wFqtfQZoNLukZy'),
(12, 'customer3', 'thanhkhoi9399@gmail.com', 2, '$2y$10$5jYNn/OvO5MooM0BfxHZZe.P4VRI8gU2Xw4E2iHYJjGiCiPNxR8J2'),
(13, 'customer4', 'thanhkhoi9393@gmail.com', 2, '$2y$10$9U2PVTNjEDM/1KeHOb4GieJrIW4h0M44f0rrhjx897rR9S5QpGcHG'),
(14, 'customer6', 'admin1@mail.com', 2, '$2y$10$W5zJikc9zMWVqbdZpwTD.e/1u/W.R7HD3E.ALB/x3hWUSqCi3c2/S'),
(15, 'customer21', 'thanhkhoi@gmail.com', 2, '$2y$10$nXgFAyHkTdRb3LyfxvJHl.rDCIrlLeUQMmJlsKLpOkaVuPQGzbWzq'),
(16, 'customer0', 'thanhkhoi99@gmail.com', 2, '1234567'),
(17, 'customer30', 'thanhkhoi19@gmail.com', 2, '1234567'),
(18, 'customer211', 'thanhkhoi909@gmail.com', 2, '12345678'),
(19, 'customer333', 'thanhkhoi9393333@gmail.com', 1, '12345678');

-- --------------------------------------------------------



--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
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
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
