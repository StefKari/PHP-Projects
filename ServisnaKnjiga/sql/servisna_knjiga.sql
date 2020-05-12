-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2020 at 01:14 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servisna_knjiga`
--
CREATE DATABASE IF NOT EXISTS `servisna_knjiga` DEFAULT CHARACTER SET utf8 COLLATE utf8_slovenian_ci;
USE `servisna_knjiga`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `brojSasije` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `registarskaOznaka` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `snagaMotora` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `kubikaza` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `godinaProizvodnje` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `models_id` int(10) UNSIGNED NOT NULL,
  `manufacturers_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brojSasije`, `registarskaOznaka`, `snagaMotora`, `kubikaza`, `godinaProizvodnje`, `models_id`, `manufacturers_id`, `users_id`) VALUES
(37, 'ABF234KGJ9056GF98', 'RA005Sk', '80KW', '120KS', '2005', 1, 1, 1),
(64, 'ASD567JNH345J234', 'BG120KJ', '120KW', '230KS', '2010', 9, 3, 2),
(88, 'HDJTK657KJ56KF56', 'BG009IK', '80KW', '120KS', '2019', 9, 3, 2),
(94, 'ASDF9876FG23JK678', 'BG009HJ', '90KW', '130KS', '2018', 8, 3, 1),
(98, 'PKIOF9876FG77JK90', 'KV005OL', '120KW', '230KS', '2018', 4, 2, 1),
(105, 'ASR456HJF567KL345', 'RA008AR', '90KW', '130KS', '2005', 6, 2, 2),
(119, 'PPR456HJF567KL234', 'RA005JK', '80KW', '105KS', '2005', 3, 1, 2),
(128, 'DFGR7856KMJ23K345', 'BG120LE', '85KW', '105KS', '2009', 7, 3, 3),
(131, 'BNGJ2903JKL345J6', 'BG150LE', '90KW', '130KS', '2018', 3, 1, 3),
(135, 'FGHT90JHYU37H1234', 'RA001OJ', '90KW', '135KS', '2017', 8, 3, 2),
(140, 'FGRY7845JU89JI367', 'KV001II', '80KW', '135KS', '2019', 1, 1, 2),
(141, 'SGDH567JGHU89HJK456', 'LE001EL', '90KW', '120KS', '2016', 3, 1, 1),
(142, 'ASHD789JDK09D89H45', 'KV009VK', '120KW', '180KS', '2019', 2, 1, 1),
(143, 'MNBF904KDKS23GH678', 'BG010BG', '120KW', '220KS', '2019', 4, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `car_services`
--

CREATE TABLE `car_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `car_services`
--

INSERT INTO `car_services` (`id`, `name`, `address`) VALUES
(1, 'Veliki servis', 'Makenzijeva'),
(2, 'Mali servis', 'Makenzijeva'),
(3, 'Redovni servis', 'Makenzijeva');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`) VALUES
(1, 'audi'),
(2, 'volswagen'),
(3, 'renault');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `manufacturers_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `name`, `manufacturers_id`) VALUES
(1, 'a4', 1),
(2, 'a6', 1),
(3, 'a8', 1),
(4, 'golf 5', 2),
(5, 'golf 6', 2),
(6, 'golf 8', 2),
(7, 'megan', 3),
(8, 'clio', 3),
(9, 'kadjar', 3);

-- --------------------------------------------------------

--
-- Table structure for table `repairs`
--

CREATE TABLE `repairs` (
  `id` int(10) UNSIGNED NOT NULL,
  `repair` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `distance` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `price` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `service_book_id` int(10) UNSIGNED NOT NULL,
  `car_services_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `repairs`
--

INSERT INTO `repairs` (`id`, `repair`, `date`, `distance`, `price`, `service_book_id`, `car_services_id`) VALUES
(1, 'menjac', '2019-12-15 23:00:00', '100km', '100e', 1, 1),
(2, 'svecice', '2019-12-15 23:00:00', '120km', '150e', 2, 1),
(3, 'pneumatici', '2019-12-10 23:00:00', '80km', '180e', 1, 1),
(4, 'farovi', '2019-12-11 23:00:00', '50km', '50e', 3, 2),
(5, 'sedista', '2019-12-13 23:00:00', '100km', '150e', 4, 1),
(6, 'zmigavci', '2019-12-08 23:00:00', '60km', '35e', 5, 2),
(7, 'volan', '2019-12-04 23:00:00', '50km', '120e', 6, 2),
(8, 'motor', '2019-12-08 23:00:00', '150km', '500e', 7, 1),
(9, 'retrovizor', '2019-12-04 23:00:00', '250km', '25e', 8, 2),
(10, 'felna', '2019-12-07 23:00:00', '130km', '80e', 8, 2),
(11, 'hladnjak', '2019-12-19 23:00:00', '90km', '60e', 10, 2),
(12, 'motor', '2020-01-01 23:00:00', '100km', '500e', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_book`
--

CREATE TABLE `service_book` (
  `id` int(10) UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `cars_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `service_book`
--

INSERT INTO `service_book` (`id`, `created`, `cars_id`) VALUES
(1, '2019-12-15 02:34:04', 37),
(2, '2019-12-15 02:48:02', 64),
(3, '2019-12-15 20:39:41', 94),
(4, '2019-12-15 20:40:13', 98),
(5, '2019-12-15 20:41:51', 88),
(6, '2019-12-15 20:45:51', 105),
(7, '2019-12-15 20:53:33', 119),
(8, '2019-12-15 20:58:56', 128),
(9, '2019-12-22 01:37:07', 135),
(10, '2019-12-22 19:27:26', 141),
(11, '2020-01-03 21:04:42', 143);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created`) VALUES
(1, 'Stef', 'MTIz', 'stef@gmail.com', '2019-12-15 01:41:39'),
(2, 'Kari', 'MTIzNDU=', 'kari@gmail.com', '2019-12-15 02:35:16'),
(3, 'Lestane', 'MTIz', 'lestane@gmail.com', '2019-12-15 20:54:30'),
(6, 'Pera', 'MTIzNDU=', 'pera@gmail.com', '2020-01-03 20:52:35'),
(7, 'Laza', 'MTIzNDU2', 'laza@gmail.com', '2020-01-03 20:56:00'),
(8, 'Mika', 'MTIzNDU=', 'mika@gmail.com', '2020-01-03 21:02:09'),
(9, 'Pedja', 'cGVkamE=', 'pedja@gmail.com', '2020-01-03 21:03:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cars_models1_idx` (`models_id`),
  ADD KEY `fk_cars_manufacturers1_idx` (`manufacturers_id`),
  ADD KEY `fk_cars_users1_idx` (`users_id`);

--
-- Indexes for table `car_services`
--
ALTER TABLE `car_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_models_manufacturers_idx` (`manufacturers_id`);

--
-- Indexes for table `repairs`
--
ALTER TABLE `repairs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_repairs_service_book1_idx` (`service_book_id`),
  ADD KEY `fk_repairs_car_services1_idx` (`car_services_id`);

--
-- Indexes for table `service_book`
--
ALTER TABLE `service_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_service_book_cars1_idx` (`cars_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `car_services`
--
ALTER TABLE `car_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `repairs`
--
ALTER TABLE `repairs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `service_book`
--
ALTER TABLE `service_book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `fk_cars_manufacturers1` FOREIGN KEY (`manufacturers_id`) REFERENCES `manufacturers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cars_models1` FOREIGN KEY (`models_id`) REFERENCES `models` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cars_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `fk_models_manufacturers` FOREIGN KEY (`manufacturers_id`) REFERENCES `manufacturers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `repairs`
--
ALTER TABLE `repairs`
  ADD CONSTRAINT `fk_repairs_car_services1` FOREIGN KEY (`car_services_id`) REFERENCES `car_services` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_repairs_service_book1` FOREIGN KEY (`service_book_id`) REFERENCES `service_book` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service_book`
--
ALTER TABLE `service_book`
  ADD CONSTRAINT `fk_service_book_cars1` FOREIGN KEY (`cars_id`) REFERENCES `cars` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
