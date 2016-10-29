-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2016 at 09:43 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zeus`
--

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `title` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `title` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `encryption` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `encryption`) VALUES
(6, 10, '$2y$10$e84V2hFgqgrdZhz95urd8utT9EFFIeSF2d7LxnQkBmb0xczGld80K'),
(9, 28, '$2y$10$AQBkvky5Yknt6dZd8EZzAOKmwKiPoSg3fjMwzXwjJ/d71FylNJ2cq');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(72) NOT NULL,
  `email` varchar(64) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(120) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `joined` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `fullname`, `address`, `phonenumber`, `salt`, `joined`) VALUES
(16, '$2y$11$46RsuUBl/Av8MBlzkzpd1.tkTWSPx3bVHrSc8GmsqKLqCMvF52BY6', 'clarke.drago@gmail.com', 'Catherine Clarke-Drago', '37 CubicBirley StreetPrestonUnited KingdomPR1 2AQ', '07816411495', 'ã¤l¹@eüü0s“:]Ô­ûžL,œÜ¡ã.', '2016-01-07 04:02:17'),
(19, '$2y$11$iin7ReqwKFbUbcha1BEKNu82wZZN3vWL.m6d6UVSmfDcABBTulJz6', 'lew9999@hotmail.co.uk', 'Lewis Matthew Campbell', '22 Banastre Drive, Newton-Le-Willows, St Helens, United Kingdom, WA12 8BE', '+441925225172', 'Š)ûEê°(VÔmÈZÔ\n7+XÄH"ñ2,ø‹<í.¦0', '2016-01-11 00:24:10'),
(20, '$2y$11$adRVpJSCQgu.c4hfxpYXXei.0btIP5CcfYVr40jQyNa88kUpEET1W', 'insidific@outlook.com', 'Lewis Campbell', '22 Banastre Drive, Newton-Le-Willows, St Helens, United Kingdom, WA12 8BE', '+441925225172', 'iÔU¤”‚B¾sˆ_Æ–]ò¦)ã¦‘õ9²1þDð~', '2016-01-11 05:01:15'),
(28, '$2y$11$dztKbKMUTz5IQGnsaZeY0eLoyZJlDWY5QDbaC8uJBt4kwJ/hwMfEi', 'Lewismatthewcampbell@hotmail.co.uk', 'Lewis Campbell', '22 Banastre Drive, Newton-Le-Willows, St Helens, United Kingdom, WA12 8BE', '+441925225172', 'w;Jl£O>H@iìi—˜Òhw±fÿÚ+zèIŽVñk', '2016-01-11 05:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `user-id` int(11) NOT NULL,
  `program-id` int(11) NOT NULL,
  `channel-id` int(11) NOT NULL,
  `date/time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
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
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
