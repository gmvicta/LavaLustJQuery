-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2024 at 02:49 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `victa_glen_matthew`
--

-- --------------------------------------------------------

--
-- Table structure for table `gmv_users`
--

CREATE TABLE `gmv_users` (
  `id` int NOT NULL,
  `gmv_last_name` varchar(255) NOT NULL,
  `gmv_first_name` varchar(255) NOT NULL,
  `gmv_email` varchar(255) NOT NULL,
  `gmv_gender` varchar(255) NOT NULL,
  `gmv_address` varchar(255) NOT NULL,
  `gmv_status` varchar(10) NOT NULL DEFAULT 'pending',
  `gmv_verification_token` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gmv_users`
--

INSERT INTO `gmv_users` (`id`, `gmv_last_name`, `gmv_first_name`, `gmv_email`, `gmv_gender`, `gmv_address`, `gmv_status`, `gmv_verification_token`) VALUES
(13, 'Victa', 'Glen Matthew', 'glenvicta@gmail.com', 'Male', 'Calapan', 'pending', NULL),
(14, 'Admin', 'User', 'useradmin@admin.com', 'Other', '***************', 'pending', NULL),
(16, 'Aspi', 'John Rene', 'johnreneaspi@gmail.com', 'Male', 'San Teodoro', 'pending', NULL),
(17, 'Leynes', 'Rose Ericka', 'roseerickaleynes@gmail.com', 'Female', 'Calapan', 'pending', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gmv_users`
--
ALTER TABLE `gmv_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gmv_users`
--
ALTER TABLE `gmv_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
