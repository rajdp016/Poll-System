-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2016 at 06:10 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `username` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`username`, `message`) VALUES
('Kamalpreet', 'when the exam should be ?'),
('Kamalpreet', 'when the exam should be ?'),
('Lovepreet', 'hii   what u  think'),
('Lovepreet', 'exam should be on monday or tuesday?'),
('Lovepreet', 'hii   what u  think'),
('Lovepreet', 'hii   what u  think'),
('Lovepreet', 'exam should be on monday or tuesday?'),
('Lovepreet', 'exam should be on monday or tuesday?'),
('Lovepreet', 'exam should be on monday or tuesday?'),
('Lovepreet', 'hii   what u  think'),
('Lovepreet', 'hii   what u  think'),
('Lovepreet', 'exam should be on monday or tuesday?'),
('Lovepreet', 'hii   what u  think'),
('Lovepreet', 'when the exam should be ?'),
('sethi', 'hello whats up????');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
