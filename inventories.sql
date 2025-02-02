-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2025 at 09:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_tracker_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `name`, `quantity`, `price`, `slug`, `last_updated`, `status`, `deleted`) VALUES
(2, 'Apple', 12, 0.49, 'Apples1738529618', '2025-02-02 20:53:59', 'In stock', NULL),
(3, 'Banana', 5, 0.79, 'Banana1738529632', '2025-02-02 20:53:52', 'Low stock', NULL),
(4, 'Big TV', 11, 200.00, 'Big-TV1738529664', '2025-02-02 20:54:24', 'In stock', NULL),
(5, 'Small TV', 0, 100.00, 'Small-TV1738529682', '2025-02-02 20:54:42', 'Out of stock', NULL),
(6, 'Chips', 3, 1.34, 'Chips1738529700', '2025-02-02 20:55:00', 'Low stock', NULL),
(7, 'Pepperoni Pizza', 0, 2.50, 'Pepperoni-Pizza1738529715', '2025-02-02 20:55:15', 'Out of stock', NULL),
(8, 'Dog Food', 15, 30.00, 'Dog-Food1738529757', '2025-02-02 20:55:57', 'In stock', NULL),
(9, 'Cat Food', 0, 20.00, 'Cat-Food1738529782', '2025-02-02 20:56:22', 'Out of stock', NULL),
(10, 'Baby Food', 8, 4.68, 'Baby-Food1738529806', '2025-02-02 20:56:46', 'Low stock', NULL),
(11, 'Salad Dressing', 30, 1.50, 'Salad-Dressing1738529838', '2025-02-02 20:57:18', 'In stock', NULL),
(12, 'Chicken Breast', 2, 6.50, 'Chicken-Breast1738529919', '2025-02-02 20:58:43', 'Low stock', '2025-02-02 20:58:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
