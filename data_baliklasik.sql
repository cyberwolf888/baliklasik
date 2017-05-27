-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2017 at 12:37 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_baliklasik`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `title`, `deskripsi`, `created_at`, `updated_at`) VALUES
(6, 'gallery/gallery0a202d40a16d6ab468cbe085e3b5a6c3.jpg', 'Nice Wedding', 'asdas ', '2017-01-16 22:29:36', '2017-01-16 22:29:36'),
(7, 'gallery/829735d716120b8d98413e5f0fc7c3e6.jpg', 'Perfect Wedding', 'asdaqwe', '2017-01-16 22:31:27', '2017-01-16 22:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `nama`, `harga`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 'Kursi', 3000, 'unit', '2017-01-22 06:48:47', '2017-01-22 06:48:48'),
(2, 'Tenda', 500000, 'set', '2017-01-23 23:47:31', '2017-01-23 23:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(255) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `alamat` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `user_id`, `nama`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 3, 'Hendra Wijaya', '82247464193', 'Jalan Raya Pemogan No.18A\r\nkantor kamarmurah.com', '2017-01-16 06:25:45', '2017-01-16 06:25:45'),
(2, 5, 'bedebah awesome', '08573736374', 'Jalan Bedebah', '2017-01-17 20:50:21', '2017-01-18 20:38:37'),
(3, 6, 'Bedebah Member', '08485949', 'Jalan Wisnu Marga Belayu No 19', '2017-03-22 20:19:11', '2017-03-22 20:19:11'),
(4, 7, 'Test Member', '0858493783', 'Jalan Denpasar', '2017-03-22 20:36:43', '2017-03-22 20:36:43'),
(5, 8, 'Member', '082247464196', 'Jalan Wisnu Marga Belayu No 19', '2017-05-27 01:18:16', '2017-05-27 01:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_01_06_083215_entrust_setup_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `nama`, `harga`, `status`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Paket Wedding Hemat', 45000000, 1, 'Paket paling hemat yang ada di Bali. Siahkan pilih paket ini jika anda merasa sangat miskin dan tidak punya uang.', '2017-01-11 21:57:32', '2017-01-16 20:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `paket_detail`
--

CREATE TABLE `paket_detail` (
  `id` int(11) NOT NULL,
  `paket_id` int(11) DEFAULT NULL,
  `value` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_detail`
--

INSERT INTO `paket_detail` (`id`, `paket_id`, `value`, `created_at`, `updated_at`) VALUES
(24, 1, '400 Porsi Paket A', '2017-01-16 20:55:32', '2017-01-16 20:55:32'),
(25, 1, '400 Porsi Welcom Dring', '2017-01-16 20:55:32', '2017-01-16 20:55:32'),
(26, 1, 'Rias Agung/Eropa', '2017-01-16 20:55:32', '2017-01-16 20:55:32'),
(27, 1, 'Photo Pre Wedding', '2017-01-16 20:55:32', '2017-01-16 20:55:32'),
(28, 1, 'Dekorasi', '2017-01-16 20:55:32', '2017-01-16 20:55:32'),
(29, 1, 'Kue Pengantin', '2017-01-16 20:55:32', '2017-01-16 20:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  `image` text,
  `total_transfer` int(11) DEFAULT NULL,
  `date_transfer` date DEFAULT NULL,
  `bank` int(1) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `transaksi_id`, `image`, `total_transfer`, `date_transfer`, `bank`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '26fa7c7af9f103f8415c30c2c836c36f.jpg', 22000000, '2017-01-22', 1, 2, 0, '2017-01-21 22:34:39', '2017-01-24 01:29:57'),
(2, 1, '44b9bb63c052367e1fcc21986f8cea02.jpg', 20000000, '2017-01-24', 2, 2, 2, '2017-01-21 22:42:01', '2017-01-24 01:29:24'),
(3, 4, 'a49af314de556236c85bd74bb3428dc1.jpg', 20000000, '2017-03-23', 2, 2, 2, '2017-03-22 20:26:46', '2017-03-22 20:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'User Administrator', 'User is allowed to manage and edit other users', '2017-01-06 00:47:36', '2017-01-06 00:47:36'),
(2, 'member', 'User Member', 'User is allowed to manage and edit wedding plan', '2017-01-06 00:50:52', '2017-01-06 00:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(3, 2),
(4, 1),
(5, 2),
(6, 2),
(7, 2),
(8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `alamat` text,
  `wedding_date` date DEFAULT NULL,
  `tinggi_pria` int(11) DEFAULT NULL,
  `tinggi_wanita` int(11) DEFAULT NULL,
  `berat_pria` int(11) DEFAULT NULL,
  `berat_wanita` int(11) DEFAULT NULL,
  `ukuran_pria` varchar(5) DEFAULT NULL,
  `ukuran_wanita` varchar(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `transaksi_id`, `item`, `qty`, `harga`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 'Paket Wedding Hemat', 1, 45000000, 45000000, '2017-01-17 21:46:21', '2017-01-17 21:46:21'),
(2, 2, 'Paket Wedding Hemat', 1, 45000000, 45000000, '2017-01-19 19:43:00', '2017-01-19 19:43:00'),
(3, 1, 'Kursi', 200, 3000, 600000, '2017-01-22 22:36:56', '2017-01-22 22:36:56'),
(4, 3, 'Paket Wedding Hemat', 1, 45000000, 45000000, '2017-01-25 23:37:05', '2017-01-25 23:37:05'),
(5, 4, 'Paket Wedding Hemat', 1, 45000000, 45000000, '2017-03-22 20:26:22', '2017-03-22 20:26:22'),
(6, 5, 'Paket Wedding Hemat', 1, 45000000, 45000000, '2017-05-27 02:21:49', '2017-05-27 02:21:49'),
(7, 6, 'Paket Wedding Hemat', 1, 45000000, 45000000, '2017-05-27 02:24:30', '2017-05-27 02:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@mail.com', '$2y$10$vNsWSJXaQ.9ZiJRLpzJiYO48pS1I3M630cMBu1x08TiubZGUj1DEq', 'GCtJ1qzigYPzZ7nrVIMht08ilBBtnzJXjDeeMLxwiIfcF38jXo6AGHlpTlml', 1, 1, '2016-12-09 00:00:14', '2017-03-22 20:14:32'),
(3, 'Hendra Wijaya', 'hendra', 'wijaya.imd@gmail.com', '$2y$10$DfaLAfG23BFtFVrg91EB0.Kf8CIyp6C.BzTGf0Oj3n.4qZByzhDzG', 'hguVdEUSjG35gjAM6ugh6IFvPckqaDJbOV0hLFHbv5Unypg8yeib2m1b3fPq', 1, 2, '2017-01-16 06:25:45', '2017-01-18 19:21:12'),
(4, 'Admin Bedebah', 'bedebah', 'admin2@mail.com', '$2y$10$nnHz..lPFiCe3wITQff1e.WzaeVdXje1hbUjJq0GsMV/EjrmOAuge', NULL, 1, 1, '2017-01-16 20:47:55', '2017-03-22 20:40:18'),
(5, 'bedebah awesome', 'awesome', 'bedebah@mail.com', '$2y$10$B7W5KvwINS0OT9diTmXMAe0hvuGzAqk4ctHS/odU9ydl6..J5Na92', 'hKV12m1ws2CLwjunzKBiuc39n1IxqpOIdIQtl44HOIshbdRMTkUEGraVRxfm', 1, 2, '2017-01-17 20:50:21', '2017-01-26 20:06:03'),
(6, 'Bedebah Member', 'member888', 'master@mail.com', '$2y$10$DfaLAfG23BFtFVrg91EB0.Kf8CIyp6C.BzTGf0Oj3n.4qZByzhDzG', 'Eu32iySTtd5UUlh8JuTJdoToSABxvrt7iRkAK5o1g8KuWLISDKKTG2Z4d4Me', 1, 2, '2017-03-22 20:19:11', '2017-03-22 20:31:52'),
(7, 'Test Member', 'testmember888', 'memberas@mailc.com', '$2y$10$YrWfXWBDrkcjOoVDrzgiK.DzWv7RiP/5YdHKHIDBe3GsFzZ9CrxZ6', NULL, 1, 2, '2017-03-22 20:36:43', '2017-03-22 20:37:06'),
(8, 'Member', 'member', 'member@mail.com', '$2y$10$8E4OtM/5EVybe2RGXMlYJ.r5U6iOf2d0bLLJjzWRX7NMcLD70qpVe', 'B7mdCQFDbFktFmUJsCsYOXZYyeTxIIGmnDqbAS7RhGQNpzphDAtk48RrKhBB', 1, 2, '2017-05-27 01:18:16', '2017-05-27 02:25:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_detail`
--
ALTER TABLE `paket_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
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
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `paket_detail`
--
ALTER TABLE `paket_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
