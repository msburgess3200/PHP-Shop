-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 08, 2016 at 08:15 PM
-- Server version: 5.6.28-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `michael_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `items` text NOT NULL,
  `qty` text NOT NULL,
  `date` int(11) NOT NULL,
  `prices` text NOT NULL,
  `amount` varchar(250) NOT NULL DEFAULT '0.00',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_id`, `userid`, `items`, `qty`, `date`, `prices`, `amount`, `status`) VALUES
(1, 1, 1, '[1,2]', '[8,2]', 1454378966, '[10.00,9.99]', '100.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` varchar(11) NOT NULL,
  `archive` int(1) NOT NULL,
  `enabled` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `archive`, `enabled`) VALUES
(1, 'Shoes', 'White', '10.00', 0, 1),
(2, 'Shoes2', 'Black', '9.99', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `company` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` varchar(2) NOT NULL,
  `zipcode` text NOT NULL,
  `countrycode` int(4) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` text NOT NULL,
  `created` int(11) NOT NULL,
  `lastloggedin` int(11) NOT NULL,
  `lastupdated` int(11) NOT NULL,
  `pageupdate` int(11) NOT NULL,
  `enabled` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `company`, `address`, `city`, `state`, `zipcode`, `countrycode`, `phone`, `username`, `password`, `email`, `created`, `lastloggedin`, `lastupdated`, `pageupdate`, `enabled`) VALUES
(1, 'Michael', 'Burgess', 'TSS3, INC.', '1521 Cushing Dr.', 'Tyler', 'TX', '75702', 1, '903-283-4376', 'michael.burgess', '3343703cac2ebe88de13b08d1c13b5cd', 'michael.burgess@tss3.us', 1454379507, 1454981930, 1454378966, 1454982760, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
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
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
