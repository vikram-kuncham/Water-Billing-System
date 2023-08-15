-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2020 at 10:52 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sourcecodester_wbsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `owners_id` int(10) NOT NULL,
  `prev` varchar(20) NOT NULL,
  `pres` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `owners_id`, `prev`, `pres`, `price`, `date`) VALUES
(1, 1, '56', '78', '10', '16/02/04 03:28:20'),
(2, 1, '78', '67', '10', '16/02/04 03:42:03'),
(3, 1, '67', '67', '0', '16/02/04 03:52:51'),
(4, 1, '67', '80', '130', '16/02/04 03:53:44'),
(5, 1, '80', '100', '200', '16/02/04 03:54:19'),
(6, 1, '100', '500', '4000', '16/02/04 08:15:33'),
(7, 2, '122', '500', '3780', '18/09/11 14:23:49'),
(8, 3, '100', '01', '990', '18/09/17 16:18:21'),
(9, 1, '500', '600', '1000', '20/10/28 22:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(10) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `mi` varchar(2) NOT NULL,
  `address` varchar(60) NOT NULL,
  `contact` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `lname`, `fname`, `mi`, `address`, `contact`) VALUES
(1, 'Eda', 'kimei', '90', 'Mbinga', '0654100235'),
(2, 'Den', 'Harry', '22', 'espn', '7515396522'),
(3, 'demo', 'demo', '54', 'demo', '5454542222'),
(4, 'walker', 'Paul', '22', 'demo address', '8521479645'),
(5, 'kent', 'Clark', '63', 'npp', '852541000'),
(6, 'rella', 'Ava', '52', 'demo address', '8524796320'),
(7, 'Gadot', 'Isabella', '26', 'espp', '5552121200'),
(8, 'stone', 'Emma', '22', 'np', '3020201050'),
(9, 'payne', 'Liam', '10', 'eps', '2021555550'),
(10, 'Paul', 'Logan', '36', 'Demo', '0255585429'),
(11, 'william', 'James', '26', 'demoo', '359518522'),
(12, 'mamoa', 'Jason', '36', 'esss', '7520003600'),
(13, 'Holland', 'Tom', '31', 'demo address', '2225558889'),
(14, 'Matthew', 'John', '22', 'npo', '8520258410'),
(15, 'Doe', 'Henry', '25', 'pop', '7182934565'),
(16, 'Jackson', 'Samuel', '23', 'sm', '8051590000');

-- --------------------------------------------------------

--
-- Table structure for table `tempo_bill`
--

CREATE TABLE `tempo_bill` (
  `id` int(11) NOT NULL,
  `Prev` varchar(40) NOT NULL,
  `Client` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempo_bill`
--

INSERT INTO `tempo_bill` (`id`, `Prev`, `Client`) VALUES
(1, '600', 'kimei'),
(2, '500', 'Harry'),
(3, '01', 'demo'),
(4, '166', 'Paul'),
(5, '230', 'Clark'),
(6, '300', 'Ava'),
(7, '106', 'Isabella'),
(8, '200', 'Emma'),
(9, '100', 'Liam'),
(10, '366', 'Logan'),
(11, '250', 'James'),
(12, '500', 'Jason'),
(13, '120', 'Tom'),
(14, '99', 'John'),
(15, '320', 'Henry'),
(16, '323', 'Samuel'),
(17, '11', 'sa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`) VALUES
(4, 'admin', 'admin', 'Harry Den'),
(8, 'demo', 'demo', 'demo user'),
(9, 'markden', 'code0', 'Mark Den'),
(10, 'christine', 'code0', 'Christine Grey');

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE `user_levels` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `userlevel` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_levels`
--

INSERT INTO `user_levels` (`id`, `username`, `password`, `userlevel`) VALUES
(1, 'admin', 'admin', '1'),
(2, 'user2', 'user2', '2'),
(3, 'user3', 'user3', '3'),
(4, 'user4', 'user4', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempo_bill`
--
ALTER TABLE `tempo_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tempo_bill`
--
ALTER TABLE `tempo_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

create TABLE FEEDBACK ( OWNERS_ID INT (10) NOT NULL, FEEDBACK VARCHAR(300));
INSERT INTO `feedback` (`OWNERS_ID`, `FEEDBACK`) VALUES (1, 'EVERY THING IS FINE KEEP IT UP');
INSERT INTO `feedback` (`OWNERS_ID`, `FEEDBACK`) VALUES (3, 'BEST BILLING EXPERIENCE EVER');
INSERT INTO `feedback` (`OWNERS_ID`, `FEEDBACK`) VALUES (5, 'NEED TO BE IMPROVED BUT OK');
INSERT INTO `feedback` (`OWNERS_ID`, `FEEDBACK`) VALUES (10, 'NOT BAD');
INSERT INTO `feedback` (`OWNERS_ID`, `FEEDBACK`) VALUES (12, 'NICE');

create TABLE WALLET ( OWNERS_ID INT, BALANCE BIGINT(10), CONSTRAINT WP PRIMARY KEY (OWNERS_ID));
INSERT INTO `wallet` (`OWNERS_ID`, `BALANCE`) VALUES ('1', 1200000);
INSERT INTO `wallet` (`OWNERS_ID`, `BALANCE`) VALUES ('2', 1300000);
INSERT INTO `wallet` (`OWNERS_ID`, `BALANCE`) VALUES ('3',1400000 );
INSERT INTO `wallet` (`OWNERS_ID`, `BALANCE`) VALUES ('4', 1500000);
INSERT INTO `wallet` (`OWNERS_ID`, `BALANCE`) VALUES ('5', 9000000);
INSERT INTO `wallet` (`OWNERS_ID`, `BALANCE`) VALUES ('6',8000000 );
INSERT INTO `wallet` (`OWNERS_ID`, `BALANCE`) VALUES ('9',7000000 );
INSERT INTO `wallet` (`OWNERS_ID`, `BALANCE`) VALUES ('10',450000 );
INSERT INTO `wallet` (`OWNERS_ID`, `BALANCE`) VALUES ('11', 3500000);
INSERT INTO `wallet` (`OWNERS_ID`, `BALANCE`) VALUES ('12', 2500000);
INSERT INTO `wallet` (`OWNERS_ID`, `BALANCE`) VALUES ('13',6000000 );
INSERT INTO `wallet` (`OWNERS_ID`, `BALANCE`) VALUES ('14',5000000 );
INSERT INTO `wallet` (`OWNERS_ID`, `BALANCE`) VALUES ('15', 4000000);
INSERT INTO `wallet` (`OWNERS_ID`, `BALANCE`) VALUES ('16', 3000000);
INSERT INTO `wallet` (`OWNERS_ID`, `BALANCE`) VALUES ('18', 3500000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
