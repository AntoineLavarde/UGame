-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2022 at 11:45 PM
-- Server version: 8.0.30-0ubuntu0.22.04.1
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ugame`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `x_coordinate` int NOT NULL,
  `y_coordinate` int NOT NULL,
  `color` text NOT NULL,
  `industry_level` int NOT NULL DEFAULT '0',
  `energetic_plant_level` int NOT NULL DEFAULT '0',
  `canon_quantity` int NOT NULL DEFAULT '0',
  `offensive_troop_quantity` int NOT NULL DEFAULT '0',
  `logistic_troop_quantity` int NOT NULL DEFAULT '0',
  `energy` int NOT NULL DEFAULT '0',
  `industry` int NOT NULL DEFAULT '500'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `x_coordinate`, `y_coordinate`, `color`, `industry_level`, `energetic_plant_level`, `canon_quantity`, `offensive_troop_quantity`, `logistic_troop_quantity`, `energy`, `industry`) VALUES
(3, 'b', '$2y$10$dqb0GuLgNRTJYM4/L0MvTuHQvJkv8q0/v9tQrAFmVLGiaLQyrUwSG', 252, 343, '#1f5f05', 0, 1, 0, 0, 0, 371540, 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
