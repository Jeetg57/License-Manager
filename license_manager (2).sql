-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2020 at 06:58 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `license_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `id` int(11) NOT NULL,
  `device_name` varchar(100) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id`, `device_name`, `owner_id`) VALUES
(5, 'Dell KB001', 4),
(6, 'Dell KB002', 4),
(7, 'HP Inspiron 3660', 4),
(8, 'khushi', 5),
(9, 'khushi', 5);

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `id` int(11) NOT NULL,
  `license_type` varchar(100) DEFAULT NULL,
  `license_name` varchar(100) DEFAULT NULL,
  `license_code` varchar(150) DEFAULT NULL,
  `device_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`id`, `license_type`, `license_name`, `license_code`, `device_id`) VALUES
(5, 'Hardware', 'Windows', 'îaËYY_;PRP¿BäÝ‘uáVÒD¦å+ÆRëÅ&Ì8', 5),
(8, 'Software', 'Windows', 'îaËYY_;PRP¿BäÝ‘¥}íùÝnŽsE,š…Í', 1),
(9, 'Software', 'Windows', 'îaËYY_;PRP¿BäÝ‘¥}íùÝnŽsE,š…Í', 10);

-- --------------------------------------------------------

--
-- Table structure for table `otpstore`
--

CREATE TABLE `otpstore` (
  `id` int(11) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `is_expired` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otpstore`
--

INSERT INTO `otpstore` (`id`, `otp`, `is_expired`, `create_at`) VALUES
(1, '4754', 1, '2020-03-28 13:41:48'),
(2, '7173', 1, '2020-03-28 13:43:06'),
(3, '7112', 1, '2020-03-28 13:43:52'),
(4, '2850', 1, '2020-03-28 13:46:22'),
(5, '1420', 1, '2020-03-28 13:47:26'),
(6, '4344', 1, '2020-03-28 13:54:49'),
(7, '1317', 1, '2020-03-28 13:57:02'),
(8, '6662', 1, '2020-03-28 13:57:34'),
(9, '9088', 1, '2020-03-28 13:59:00'),
(10, '8031', 1, '2020-03-28 14:00:20'),
(11, '4976', 1, '2020-03-28 14:01:31'),
(12, '2311', 1, '2020-03-28 14:02:15'),
(13, '1610', 1, '2020-03-28 14:03:31'),
(14, '4707', 1, '2020-03-28 14:06:08'),
(15, '4719', 1, '2020-03-28 14:15:18'),
(16, '2728', 1, '2020-03-28 14:18:24'),
(17, '8612', 1, '2020-03-28 14:25:58'),
(18, '9583', 1, '2020-03-28 15:45:06'),
(19, '35636e7158', 0, '2020-03-28 15:48:54'),
(20, '2566', 1, '2020-03-28 16:30:27'),
(21, '9033', 1, '2020-03-28 16:42:44'),
(22, '1372', 1, '2020-03-29 18:12:57'),
(23, '6338', 1, '2020-03-29 18:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `usercards`
--

CREATE TABLE `usercards` (
  `id` int(11) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `cvv` varchar(100) NOT NULL,
  `card_type` varchar(20) DEFAULT NULL,
  `expiry` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercards`
--

INSERT INTO `usercards` (`id`, `card_number`, `cvv`, `card_type`, `expiry`, `user_id`) VALUES
(2, 'ãšˆÀº+øäRW9BNáÎ', 'Wi\0èäªÎá“\ZÜ-šl¶', 'MasterCard', '10/21', 4),
(3, '|¬¯#>ÊH]f™ Á:', 'N%iJ\rµà]ÐçÃ-', 'MasterCard', '9/20', 4),
(4, 'czJ›4YVhrpÝ_‹@q‰%ÆÓ£}Õ‹ÃÏÛøã', 'Tè©lýÕkí«Šù«‚Ô§	', 'MasterCard', '01/22', 4),
(6, '¼Ü§ gêüe9S•€.+¿‰', 'Tè©lýÕkí«Šù«‚Ô§	', 'MasterCard', '09/23', 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `userlicenses`
-- (See below for the actual view)
--
CREATE TABLE `userlicenses` (
`device_name` varchar(100)
,`owner_id` int(11)
,`id` int(11)
,`license_type` varchar(100)
,`license_name` varchar(100)
,`license_code` varchar(150)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'jeetg57', '273f7bf9b08dda847b072a4ccd6d8ac85b006fa1a8ff99b591c1ed2e0b0c0431', 'jeetg57@gmail.com', '2020-03-19 19:15:49'),
(2, 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', '0', '2020-03-19 19:37:54'),
(3, 'jeetg5712', '273f7bf9b08dda847b072a4ccd6d8ac85b006fa1a8ff99b591c1ed2e0b0c0431', '799698998', '2020-03-27 16:14:59'),
(4, 'jeetg99', '273f7bf9b08dda847b072a4ccd6d8ac85b006fa1a8ff99b591c1ed2e0b0c0431', 'jeetg99@live.com', '2020-03-28 15:50:23'),
(5, 'kgupta', '3f05b17dce798541abe791b235c2109abcefdfe56ed0005ffeca21868bf13964', 'kgupta@usiu.ac.ke', '2020-03-28 18:36:02');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_cards`
-- (See below for the actual view)
--
CREATE TABLE `user_cards` (
`username` varchar(50)
,`id` int(11)
,`card_number` varchar(100)
,`cvv` varchar(100)
,`card_type` varchar(20)
,`expiry` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `userlicenses`
--
DROP TABLE IF EXISTS `userlicenses`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userlicenses`  AS  select `device`.`device_name` AS `device_name`,`device`.`owner_id` AS `owner_id`,`license`.`id` AS `id`,`license`.`license_type` AS `license_type`,`license`.`license_name` AS `license_name`,`license`.`license_code` AS `license_code` from (`device` join `license`) where (`license`.`device_id` = `device`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `user_cards`
--
DROP TABLE IF EXISTS `user_cards`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_cards`  AS  select `users`.`username` AS `username`,`usercards`.`id` AS `id`,`usercards`.`card_number` AS `card_number`,`usercards`.`cvv` AS `cvv`,`usercards`.`card_type` AS `card_type`,`usercards`.`expiry` AS `expiry` from (`users` join `usercards`) where (`usercards`.`user_id` = `users`.`id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otpstore`
--
ALTER TABLE `otpstore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercards`
--
ALTER TABLE `usercards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cards` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `otpstore`
--
ALTER TABLE `otpstore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `usercards`
--
ALTER TABLE `usercards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `device_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `license`
--
ALTER TABLE `license`
  ADD CONSTRAINT `license_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `device` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
