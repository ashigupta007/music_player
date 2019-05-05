-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2019 at 06:06 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `platicon`
--

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `song_id` varchar(15) NOT NULL,
  `song_name` varchar(40) NOT NULL,
  `artist` varchar(40) NOT NULL,
  `emotion_type` varchar(10) NOT NULL,
  `img_src` varchar(50) NOT NULL,
  `music_src` varchar(50) NOT NULL,
  `upload_time` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `song_name`, `artist`, `emotion_type`, `img_src`, `music_src`, `upload_time`) VALUES
('db00570cba06cde', 'gjsgjfa', 'kfalkfhkdhfe', 'happy', 'images/db00570cba06cde.jpeg', 'musics/db00570cba06cde.mp3', '1557047175'),
('df2ac4485827443', 'hglssd', 'jb,sdn,n', 'happy', 'images/df2ac4485827443.jpeg', 'musics/df2ac4485827443.mp3', '1557007758');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
