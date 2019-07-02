-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 06:56 PM
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
  `car_id` int(11) NOT NULL,
  `booked_from` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `booked_to` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `total` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `brand_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `engine_id` int(10) UNSIGNED NOT NULL,
  `manufacture_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `brand_id`, `model_id`, `engine_id`, `manufacture_year`) VALUES
(1, 1, 2, 3, 2007),
(2, 1, 3, 1, 2010),
(3, 3, 9, 3, 1995),
(4, 4, 13, 7, 2012);

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
(4, 7);

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
(1, 'Petrol', 'Manual gearbox'),
(2, 'Petrol', 'Automatic transmission'),
(3, 'Diesel', 'Manual gearbox'),
(4, 'Petrol', 'Semi-automatic'),
(5, 'Electric', 'Manual gearbox'),
(6, 'Electric', 'Semi-automatic'),
(7, 'Natural Gas', 'Manual gearbox'),
(8, 'Hydrogen', 'Automatic transmission');

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
  `rent_interval` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `car_brand_id` (`brand_id`),
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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `engine`
--
ALTER TABLE `engine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_brand_id` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
