-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 07:21 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gharsewa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'safalkoirala92@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `problem` varchar(200) NOT NULL,
  `requests` tinyint(1) NOT NULL,
  `bookings` int(2) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `rating` int(2) NOT NULL,
  `review` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `user_id`, `staff_id`, `date`, `time`, `problem`, `requests`, `bookings`, `flag`, `rating`, `review`) VALUES
(13, 9, 10, '2020-12-02', '23:11', 'fix lights', 1, 1, 1, 4, 'did a good job'),
(15, 9, 10, '2020-12-04', '14:34', 'fix lights', 1, 1, 1, 3, 'good'),
(22, 9, 12, '2021-01-18', '', 'testing cancel', 1, 3, 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(2) NOT NULL,
  `services` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `services`) VALUES
(7, 'electrician'),
(8, 'carpenter'),
(9, 'cleaner'),
(10, 'moving helpers'),
(20, 'painter'),
(21, 'plumber');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `experience` int(2) NOT NULL,
  `postalcode` int(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `contact`, `occupation`, `address`, `email`, `password`, `experience`, `postalcode`, `image`) VALUES
(10, 'sergio', '9803400639', 'electrician', 'lokanthali', 'sergio@gmail.com', '3bffa4ebdf4874e506c2b12405796aa5', 5, 44570, '517503.png'),
(11, 'bob', '1234567890', 'painter', 'putalisadak', 'bob@gmail.com', '9f9d51bc70ef21ca5c14f307980a29d8', 2, 44573, '212834.jpg'),
(12, 'leo', '2147483647', 'electrician', 'lokanthali ', 'leo@gmail.com', '0f759dd1ea6c4c76cedc299039ca4f23', 5, 44570, '335487.png'),
(13, 'isco', '987650021', 'electrician', 'lokanthali ', 'isco@gmail.com', '66943afc80ff82eb4707bcdb45349ac5', 5, 44570, '30653.png'),
(14, 'watson', '9856231470', 'electrician', 'lokanthali ', 'watson@gmail.com', '4190908d675abc6c2e3931c01c92a6ca', 3, 44570, '436938.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `postalcode` int(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `contact`, `address`, `email`, `password`, `postalcode`, `image`) VALUES
(9, 'pablo', '1234567890', 'lokanthali', 'safalkoirala92@gmail.com', '7e4b64eb65e34fdfad79e623c44abd94', 44570, '384409.png'),
(10, 'salah', '9865417023', 'putalisadak', 'salah@gmail.com', '2a07e3ff3df21b226d0cd044d4a7cc83', 44573, '914971.png'),
(14, 'safal', '9803409858', 'lokanthali', 'safal@gmail.com', 'b41468c0225d4ccedc00f1d7beacb739', 44570, '479063.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
