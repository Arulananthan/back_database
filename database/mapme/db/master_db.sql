-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2018 at 11:19 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--
DROP DATABASE IF EXISTS `test`;
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `database`
--

DROP TABLE IF EXISTS `database`;
CREATE TABLE `database` (
  `id` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `function` varchar(255) NOT NULL,
  `query` varchar(255) NOT NULL,
  `creater_name` varchar(255) NOT NULL,
  `db_name` varchar(255) NOT NULL,
  `added_date` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `database`
--

INSERT INTO `database` (`id`, `table_name`, `function`, `query`, `creater_name`, `db_name`, `added_date`) VALUES
(1, 'arul', 'create', 'CREATE TABLE IF NOT EXISTS `arul` (\n	  `id` int(11) NOT NULL,\n	  `alumini_id` int(11) NOT NULL,\n	  `alumini_userid` varchar(55) NOT NULL,\n	  `job` varchar(55) NOT NULL,\n	  `status` int(11) NOT NULL\n	) ENGINE=InnoDB DEFAULT CHARSET=latin1;', 'arul', 'test', '2018-06-15 13:26:01.390777'),
(2, 'ajay', 'create', 'CREATE TABLE IF NOT EXISTS `ajay` (\n	  `id` int(11) NOT NULL,\n	  `alumini_id` int(11) NOT NULL,\n	  `alumini_userid` varchar(55) NOT NULL,\n	  `job` varchar(55) NOT NULL,\n	  `status` int(11) NOT NULL\n	) ENGINE=InnoDB DEFAULT CHARSET=latin1;', 'arul', 'test', '2018-06-16 09:45:56.682702'),
(3, 'ajay', 'alter', 'ALTER TABLE `ajay` DROP `status`;', 'arul', 'test', '2018-06-16 09:50:23.934702'),
(4, 'arul', 'alter', 'ALTER TABLE `arul` DROP `status`;', 'arul', 'test1,test2,test3', '2018-06-16 10:01:33.000000'),
(5, 'as', 'asas', 'ALTER TABLE `ajay` ADD `dosb` DATE NOT NULL AFTER `alumini_id`;', 'arul', 'test1,test2,test3', '2018-06-16 10:05:45.000000');

-- --------------------------------------------------------

--
-- Table structure for table `db_log`
--

DROP TABLE IF EXISTS `db_log`;
CREATE TABLE `db_log` (
  `id` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `function` varchar(255) NOT NULL,
  `query` varchar(500) NOT NULL,
  `creater_name` varchar(255) NOT NULL,
  `db_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `added_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_log`
--

INSERT INTO `db_log` (`id`, `table_name`, `function`, `query`, `creater_name`, `db_name`, `status`, `added_date`) VALUES
(1, 'table3', 'CREATE', 'CREATE TABLE IF NOT EXISTS `table3` (\n	  `id` int(11) NOT NULL,\n	  `alumini_id` int(11) NOT NULL,\n	  `alumini_userid` varchar(55) NOT NULL,\n	  `job` varchar(55) NOT NULL,\n	  `status` int(11) NOT NULL\n	) ENGINE=InnoDB DEFAULT CHARSET=latin1', 'arul', 'test', 0, '2018-07-04 09:13:52.868767'),
(2, 'table3', 'CREATE', '\nCREATE TABLE IF NOT EXISTS `table4` (\n	  `id` int(11) NOT NULL,\n	  `alumini_id` int(11) NOT NULL,\n	  `alumini_userid` varchar(55) NOT NULL,\n	  `job` varchar(55) NOT NULL,\n	  `status` int(11) NOT NULL\n	) ENGINE=InnoDB DEFAULT CHARSET=latin1', 'arul', 'test', 0, '2018-07-04 09:13:52.980767'),
(3, 'table3', 'CREATE', '\nCREATE TABLE IF NOT EXISTS `table5` (\n	  `id` int(11) NOT NULL,\n	  `alumini_id` int(11) NOT NULL,\n	  `alumini_userid` varchar(55) NOT NULL,\n	  `job` varchar(55) NOT NULL,\n	  `status` int(11) NOT NULL\n	) ENGINE=InnoDB DEFAULT CHARSET=latin1', 'arul', 'test', 0, '2018-07-04 09:13:53.172767');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

DROP TABLE IF EXISTS `demo`;
CREATE TABLE `demo` (
  `id` int(11) NOT NULL,
  `alumini_id` int(11) NOT NULL,
  `alumini_userid` varchar(55) NOT NULL,
  `job` varchar(55) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

DROP TABLE IF EXISTS `table1`;
CREATE TABLE `table1` (
  `id` int(11) NOT NULL,
  `alumini_userid` varchar(55) NOT NULL,
  `job` varchar(55) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table2`
--

DROP TABLE IF EXISTS `table2`;
CREATE TABLE `table2` (
  `id` int(11) NOT NULL,
  `alumini_id` int(11) NOT NULL,
  `alumini_userid` varchar(55) NOT NULL,
  `job` varchar(55) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table3`
--

DROP TABLE IF EXISTS `table3`;
CREATE TABLE `table3` (
  `id` int(11) NOT NULL,
  `alumini_id` int(11) NOT NULL,
  `alumini_userid` varchar(55) NOT NULL,
  `job` varchar(55) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table4`
--

DROP TABLE IF EXISTS `table4`;
CREATE TABLE `table4` (
  `id` int(11) NOT NULL,
  `alumini_id` int(11) NOT NULL,
  `alumini_userid` varchar(55) NOT NULL,
  `job` varchar(55) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table5`
--

DROP TABLE IF EXISTS `table5`;
CREATE TABLE `table5` (
  `id` int(11) NOT NULL,
  `alumini_id` int(11) NOT NULL,
  `alumini_userid` varchar(55) NOT NULL,
  `job` varchar(55) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `database`
--
ALTER TABLE `database`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_log`
--
ALTER TABLE `db_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table2`
--
ALTER TABLE `table2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table3`
--
ALTER TABLE `table3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table4`
--
ALTER TABLE `table4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table5`
--
ALTER TABLE `table5`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `database`
--
ALTER TABLE `database`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `db_log`
--
ALTER TABLE `db_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table2`
--
ALTER TABLE `table2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table3`
--
ALTER TABLE `table3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table4`
--
ALTER TABLE `table4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table5`
--
ALTER TABLE `table5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
