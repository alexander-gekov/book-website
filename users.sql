-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: studmysql01.fhict.local
-- Generation Time: Apr 02, 2020 at 07:19 PM
-- Server version: 5.7.26-log
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbi426537`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` enum('MALE','FEMALE','OTHER') DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `date_of_start` date DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `role` enum('MANAGER','ADMINISTRATOR','EMPLOYEE') DEFAULT NULL,
  `employeed` tinyint(1) DEFAULT NULL,
  `department` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `date_of_birth`, `address`, `gender`, `phone`, `date_of_start`, `username`, `password`, `email`, `salary`, `role`, `employeed`, `department`) VALUES
(3, 'Georgi', 'Vladov', '1975-03-11', 'Sofia, BG', 'MALE', '886789098', '2020-01-07', 'georgivladov', 'georgivladov', 'georgivladov@abv.bg', 1400, 'ADMINISTRATOR', 1, 5),
(44, 'Zaykaa', 'd', '2000-02-01', 'gr 26', 'OTHER', '31 478965268', '2020-01-24', 'zayka', 'zayka', 'abc@hjkm.nl', 180.71, 'MANAGER', 1, 1),
(94, 'Emilia', 'Emilia', '2000-01-01', 'Emilia', 'FEMALE', 'Emilia', '2020-01-01', 'Emilia', 'Emilia', 'Emilia', 200, 'MANAGER', 1, 3),
(95, 'Georgi', 'Georgi', '2000-01-01', 'Georgi', 'MALE', 'Georgi', '2020-01-01', 'Georgi', 'Georgi', 'Georgi', 200, 'MANAGER', 1, 3),
(96, 'Misho', 'Georgi', '2000-01-01', 'Georgi', 'MALE', 'Georgi', '2020-01-01', 'Misho', 'Georgi', 'Georgi', 200, 'MANAGER', 1, 3),
(97, 'Cveti', 'Georgi', '2000-01-01', 'Georgi', 'FEMALE', 'Georgi', '2020-01-01', 'Cveti', 'Georgi', 'Georgi', 200, 'MANAGER', 1, 3),
(98, 'Pesho', 'Georgi', '2000-01-01', 'Georgi', 'FEMALE', 'Georgi', '2020-01-01', 'Pesho', 'Georgi', 'Georgi', 200, 'MANAGER', 1, 4),
(99, 'Bobi', 'Georgi', '2000-01-01', 'Georgi', 'FEMALE', 'Georgi', '2020-01-01', 'Bobi', 'Georgi', 'Georgi', 200, 'MANAGER', 1, 4),
(100, 'Dimaka', 'Georgi', '2000-01-01', 'Georgi', 'FEMALE', 'Georgi', '2020-01-01', 'Dimaka', 'Georgi', 'Georgi', 200, 'EMPLOYEE', 1, 4),
(101, 'Gomezz', 'Georgi', '2000-01-01', 'Georgi', 'MALE', 'Georgi', '2020-01-01', 'Gomez', 'Georgi', 'Georgi', 200, 'EMPLOYEE', 1, 2),
(102, 'Marinela', 'Georgi', '2000-01-01', 'Georgi', 'FEMALE', 'Georgi', '2020-01-01', 'Marinela', 'Georgi', 'Georgi', 200, 'EMPLOYEE', 1, 2),
(103, 'Miro', 'Georgi', '2000-01-01', 'Georgi', 'FEMALE', 'Georgi', '2020-01-01', 'Miro', 'Georgi', 'Georgi', 200, 'EMPLOYEE', 1, 2),
(104, 'Evgenii', 'Georgi', '2000-01-01', 'Georgi', 'FEMALE', 'Georgi', '2020-01-01', 'Evgenii', 'Georgi', 'Georgi', 200, 'EMPLOYEE', 1, 2),
(105, 'Stefan', 'Georgi', '2000-01-01', 'Georgi', 'FEMALE', 'Georgi', '2020-01-01', 'Stefan', 'Georgi', 'Georgi', 200, 'EMPLOYEE', 1, 2),
(106, 'Ivan', 'Georgi', '2000-01-01', 'Georgi', 'FEMALE', 'Georgi', '2020-01-01', 'Ivan', 'Georgi', 'Georgi', 200, 'EMPLOYEE', 1, 1),
(107, 'Leo', 'Georgi', '2000-01-01', 'Georgi', 'MALE', 'Georgi', '2020-01-01', 'leo', 'Georgi', 'Georgi', 200, 'MANAGER', 1, 1),
(108, 'Nikol', 'Georgi', '2000-01-01', 'Georgi', 'MALE', 'Georgi', '2020-01-01', 'Nikol', 'Georgi', 'Georgi', 200, 'EMPLOYEE', 1, 1),
(111, 'Petur', 'Hristov', '1994-06-25', 'Sofia123', 'OTHER', '06444555333', '2020-07-27', 'petko21', '1234', 'petur@petur.com', 1000, 'ADMINISTRATOR', 1, 5),
(124, 'Aylin', 'Osmanova', '2000-06-01', 'Eindhoven, NL', 'FEMALE', '+31 602158974', '2020-03-24', 'aylin', 'aylin', 'a.osmanova@fhict.nl', 1780, 'MANAGER', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department` (`department`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`department`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
