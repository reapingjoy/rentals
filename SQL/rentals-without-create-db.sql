-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2019 at 02:41 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentals`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_id` int(11) UNSIGNED NOT NULL,
  `booked_from` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `booked_to` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `total` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `car_id`, `booked_from`, `booked_to`, `total`) VALUES
(14, 1, '2019-07-04 21:00:00', '2019-07-18 21:00:00', '176.00'),
(15, 19, '2019-07-23 21:00:00', '2019-07-29 21:00:00', '90.00'),
(16, 16, '2019-07-09 21:00:00', '2019-07-24 21:00:00', '192.00'),
(17, 18, '2019-07-25 21:00:00', '2019-09-24 21:00:00', '704.00'),
(18, 4, '2019-07-04 21:00:00', '2019-07-23 21:00:00', '224.00'),
(19, 3, '2019-08-31 21:00:00', '2019-09-17 21:00:00', '208.00'),
(20, 15, '2019-07-16 21:00:00', '2019-08-30 21:00:00', '528.00'),
(21, 2, '2019-07-09 21:00:00', '2019-08-19 21:00:00', '480.00'),
(22, 24, '2019-07-24 21:00:00', '2019-11-19 22:00:00', '1360.00'),
(23, 18, '2019-07-18 21:00:00', '2019-07-24 21:00:00', '90.00'),
(24, 31, '2019-07-04 21:00:00', '2019-07-24 21:00:00', '240.00'),
(25, 14, '2019-07-04 21:00:00', '2019-07-07 21:00:00', '40.00');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`) VALUES
(1, 'Audi'),
(2, 'BMW'),
(3, 'Volkswagen'),
(4, 'Mercedes-Benz'),
(5, 'Aston Martin'),
(6, 'Fiat');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `engine_id` int(10) UNSIGNED NOT NULL,
  `manufacture_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `model_id`, `engine_id`, `manufacture_year`) VALUES
(1, 2, 3, 2007),
(2, 3, 1, 2010),
(3, 9, 3, 1995),
(4, 13, 7, 2012),
(5, 2, 6, 2018),
(6, 2, 5, 2001),
(7, 7, 3, 2011),
(8, 9, 8, 2005),
(9, 12, 3, 2011),
(10, 15, 1, 2005),
(11, 15, 1, 2005),
(12, 4, 8, 2005),
(13, 10, 8, 2005),
(14, 5, 6, 2011),
(15, 7, 8, 2005),
(16, 7, 8, 2005),
(17, 7, 8, 2005),
(18, 2, 6, 2011),
(19, 2, 6, 2011),
(20, 2, 6, 2011),
(21, 11, 7, 2005),
(24, 19, 1, 2019),
(26, 18, 6, 2006),
(27, 11, 7, 2011),
(28, 19, 5, 2011),
(29, 16, 7, 2019),
(30, 12, 1, 2005),
(31, 22, 8, 2019),
(32, 11, 6, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `car_feature`
--

CREATE TABLE `car_feature` (
  `car_id` int(10) UNSIGNED NOT NULL,
  `feature_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_feature`
--

INSERT INTO `car_feature` (`car_id`, `feature_id`) VALUES
(1, 1),
(1, 6),
(1, 4),
(1, 11),
(1, 8),
(1, 12),
(2, 10),
(2, 9),
(2, 2),
(2, 5),
(3, 6),
(3, 1),
(4, 5),
(4, 11),
(4, 4),
(4, 7),
(8, 1),
(8, 3),
(8, 6),
(8, 9),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(10, 7),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(11, 7),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 5),
(12, 6),
(12, 7),
(12, 8),
(12, 9),
(12, 10),
(12, 11),
(12, 12),
(13, 1),
(13, 5),
(13, 6),
(14, 1),
(14, 2),
(14, 4),
(14, 8),
(15, 5),
(15, 9),
(16, 5),
(16, 9),
(17, 5),
(17, 9),
(24, 1),
(24, 5),
(24, 7),
(24, 10),
(26, 3),
(26, 6),
(27, 4),
(27, 7),
(27, 10),
(28, 4),
(28, 7),
(28, 10),
(29, 1),
(29, 9),
(30, 1),
(30, 12),
(31, 2),
(31, 7),
(32, 1),
(32, 2),
(32, 3),
(32, 4);

-- --------------------------------------------------------

--
-- Table structure for table `engine`
--

CREATE TABLE `engine` (
  `id` int(10) UNSIGNED NOT NULL,
  `fuel_type` varchar(100) NOT NULL,
  `transmission` enum('Manual gearbox','Semi-automatic','Automatic transmission','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `engine`
--

INSERT INTO `engine` (`id`, `fuel_type`, `transmission`) VALUES
(3, 'Diesel', 'Manual gearbox'),
(5, 'Electric', 'Manual gearbox'),
(6, 'Electric', 'Semi-automatic'),
(8, 'Hydrogen', 'Automatic transmission'),
(7, 'Natural Gas', 'Manual gearbox'),
(1, 'Petrol', 'Manual gearbox'),
(4, 'Petrol', 'Semi-automatic'),
(2, 'Petrol', 'Automatic transmission');

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `id` int(10) UNSIGNED NOT NULL,
  `feature_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`id`, `feature_name`) VALUES
(1, 'ABS'),
(2, 'Traction control'),
(3, 'Night vision assist'),
(4, 'Immobilizer'),
(5, 'Four wheel drive'),
(6, 'Alarm system'),
(7, 'Cargo barrier'),
(8, 'Speed limit control system'),
(9, 'Fog lamp'),
(10, 'Distance warning system'),
(11, 'Keyless central locking'),
(12, 'Tyre pressure monitoring');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `model_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `brand_id`, `model_name`) VALUES
(1, 1, 'A4 Allroad'),
(2, 1, 'Q7'),
(3, 1, 'quattro'),
(4, 1, 'RS7'),
(5, 2, '550 Gran Turismo'),
(6, 2, '520'),
(7, 2, 'X5 M'),
(8, 2, 'X6 M50'),
(9, 3, 'Golf'),
(10, 3, 'Lupo'),
(11, 3, 'Caddy'),
(12, 3, 'Polo'),
(13, 4, 'CLC 180'),
(14, 4, 'CL 600'),
(15, 4, 'CE 320'),
(16, 4, 'G 280'),
(17, 5, 'DB9'),
(18, 5, 'Vanquish'),
(19, 5, 'V8 Vantage'),
(20, 5, 'Cygnet'),
(21, 6, 'Coupe'),
(22, 6, 'Fiorino'),
(23, 6, 'Marea'),
(24, 6, 'Punto');

-- --------------------------------------------------------

--
-- Table structure for table `price_plan`
--

CREATE TABLE `price_plan` (
  `id` int(10) UNSIGNED NOT NULL,
  `rent_interval_start` smallint(5) UNSIGNED NOT NULL,
  `rent_interval_end` smallint(5) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `price_plan`
--

INSERT INTO `price_plan` (`id`, `rent_interval_start`, `rent_interval_end`, `price`) VALUES
(1, 1, 3, 20),
(2, 4, 7, 18),
(3, 8, 365, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booked_from` (`booked_from`),
  ADD KEY `booked_to` (`booked_to`),
  ADD KEY `booking_car_id` (`car_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_model_id` (`model_id`),
  ADD KEY `car_engine_id` (`engine_id`);

--
-- Indexes for table `car_feature`
--
ALTER TABLE `car_feature`
  ADD KEY `cf_car_id` (`car_id`),
  ADD KEY `cf_feature_id` (`feature_id`);

--
-- Indexes for table `engine`
--
ALTER TABLE `engine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fuel_type` (`fuel_type`,`transmission`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `price_plan`
--
ALTER TABLE `price_plan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `engine`
--
ALTER TABLE `engine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `price_plan`
--
ALTER TABLE `price_plan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_car_id` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_engine_id` FOREIGN KEY (`engine_id`) REFERENCES `engine` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `car_model_id` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `car_feature`
--
ALTER TABLE `car_feature`
  ADD CONSTRAINT `cf_car_id` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cf_feature_id` FOREIGN KEY (`feature_id`) REFERENCES `feature` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `brand_id` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
