-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2020 at 01:16 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-survey-harga`
--

-- --------------------------------------------------------

--
-- Table structure for table `commodity`
--

CREATE TABLE `commodity` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commodity`
--

INSERT INTO `commodity` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Beras', 'beras', '2020-07-03 12:04:08', '2020-07-03 12:04:08'),
(2, 'Minyak Goreng', 'minyak-goreng', '2020-07-03 12:05:10', '2020-07-03 12:05:10'),
(3, 'Telur Ayam', 'telur-ayam', '2020-07-03 12:08:45', '2020-07-03 12:08:45'),
(4, 'Cabai Merah Besar', 'cabai-merah-besar', '2020-07-03 12:09:59', '2020-07-03 12:09:59'),
(5, 'Gula Pasir', 'gula-pasir', '2020-07-04 02:36:49', '2020-07-04 02:36:49'),
(6, 'Bawang Merah', 'bawang-merah', '2020-07-04 04:54:23', '2020-07-04 04:54:23'),
(7, 'Bawang Putih', 'bawang-putih', '2020-07-04 05:18:20', '2020-07-04 05:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `commodity_markets`
--

CREATE TABLE `commodity_markets` (
  `id` int(11) NOT NULL,
  `id_commodity` int(11) NOT NULL,
  `id_market` int(11) NOT NULL,
  `surveyor` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `survey_date` datetime NOT NULL,
  `status` enum('unverified','pending','verified','') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commodity_markets`
--

INSERT INTO `commodity_markets` (`id`, `id_commodity`, `id_market`, `surveyor`, `price`, `survey_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'surveyor', 13000, '2020-06-30 00:00:00', 'verified', '2020-07-03 22:22:08', '2020-07-04 05:17:59'),
(2, 1, 2, 'surveyor', 12500, '2020-06-30 00:00:00', 'verified', '2020-07-03 22:23:22', '2020-07-04 01:40:36'),
(6, 3, 4, 'surveyor', 22000, '2020-07-03 14:58:03', 'unverified', '2020-07-04 02:45:40', '2020-07-04 02:45:40'),
(7, 3, 1, 'surveyor', 17000, '2020-07-02 00:00:00', 'unverified', '2020-07-04 02:56:04', '2020-07-04 02:56:04'),
(9, 4, 1, 'surveyor', 15000, '2020-06-30 00:00:00', 'unverified', '2020-07-04 04:53:28', '2020-07-04 04:53:28'),
(10, 1, 5, 'surveyor', 55000, '2020-06-26 00:00:00', 'unverified', '2020-07-04 05:18:57', '2020-07-04 05:18:57'),
(11, 7, 1, 'surveyor', 15000, '2020-06-30 00:00:00', 'unverified', '2020-07-04 05:20:10', '2020-07-04 05:20:10'),
(12, 7, 6, 'surveyor', 20000, '2020-06-30 00:00:00', 'unverified', '2020-07-04 05:20:37', '2020-07-04 05:20:37'),
(13, 5, 1, 'surveyor', 10000, '2020-06-30 00:00:00', 'unverified', '2020-07-04 05:59:08', '2020-07-04 05:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`id`, `name`, `slug`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Pasar Blimbing', 'pasar-blimbing', 'Jalan Bodobudur', '2020-07-03 14:20:10', '2020-07-03 14:20:10'),
(2, 'Pasar Gadang', 'pasar-gadang', 'Jalan Kolonel Sugiono', '2020-07-03 14:21:23', '2020-07-03 14:21:23'),
(3, 'Pasar Dinoyo', 'pasar-dinoyo', 'Jalan MT Haryono', '2020-07-03 14:22:51', '2020-07-03 14:22:51'),
(4, 'Pasar Mergan', 'pasar-mergan', 'Jalan Raya Langsep', '2020-07-03 14:24:53', '2020-07-03 14:24:53'),
(5, 'Pasar Rakyat Bareng', 'pasar-rakyat-bareng', 'Jalan Terusan Idjen', '2020-07-03 14:28:51', '2020-07-03 14:28:51'),
(6, 'Pasar Minggu Kota Malang', 'pasar-minggu-kota-malang', 'Jalan Tenes', '2020-07-04 01:21:24', '2020-07-04 01:21:24'),
(7, 'Pasar Besar', 'pasar-besar', 'Jalan Pasar Besar', '2020-07-04 02:39:03', '2020-07-04 02:39:03'),
(8, 'Pasar Pandanwangi', 'pasar-pandanwangi', 'Jalan LA Sucipto', '2020-07-04 04:55:07', '2020-07-04 04:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$argon2id$v=19$m=65536,t=4,p=1$bUM1QzU1UDRnbGw4N2wvSg$pOFi2yGekyCgpaemqN7UidcZ9G0jcaCQWoQT0gK6NS4', '1', '2020-07-03 11:14:02', '2020-07-03 11:14:02'),
(2, 'surveyor', '$argon2id$v=19$m=65536,t=4,p=1$VWR3b0RvYVR3QktWc2l5Zg$PWup564VhF6z635k6FE7pnJm5WjeWepCbcMqdb1UMA4', '2', '2020-07-03 11:16:16', '2020-07-03 11:16:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commodity`
--
ALTER TABLE `commodity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commodity_markets`
--
ALTER TABLE `commodity_markets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commodity`
--
ALTER TABLE `commodity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `commodity_markets`
--
ALTER TABLE `commodity_markets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `market`
--
ALTER TABLE `market`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
