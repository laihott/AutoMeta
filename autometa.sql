-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2019 at 03:18 PM
-- Server version: 10.3.13-MariaDB-2
-- PHP Version: 7.2.19-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autometa`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `picture_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `keyword`, `picture_id`, `user_id`) VALUES
(1, 'dog', 1, 5286),
(2, 'dog', 2, 5286),
(3, 'dog', 4, 5286),
(4, 'cat', 5, 5286),
(5, 'female', 6, 5286),
(6, 'dog', 3, 5286),
(7, 'female', 7, 5286),
(8, 'male', 8, 5286),
(9, 'male', 9, 5286);

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `keyword_id` int(11) NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`keyword_id`, `keyword`) VALUES
(15, 'Cheerleader'),
(6, 'Child'),
(4, 'adult '),
(48, 'africa  '),
(1, 'age '),
(44, 'airplane  '),
(49, 'america  '),
(47, 'asia  '),
(8, 'attorney'),
(9, 'audience'),
(10, 'author'),
(5, 'baby '),
(25, 'bear  '),
(53, 'beverge'),
(42, 'bicycle  '),
(28, 'bird  '),
(11, 'bishop'),
(12, 'blacksmith]'),
(43, 'boat  '),
(13, 'bride'),
(45, 'buildings  '),
(26, 'camel  '),
(14, 'cantor'),
(40, 'car  '),
(24, 'cat  '),
(16, 'chef '),
(50, 'clothing  '),
(17, 'clown'),
(18, 'coach '),
(19, 'competitor'),
(20, 'concessionaire'),
(27, 'cow  '),
(21, 'cowboy '),
(23, 'dog'),
(46, 'europe  '),
(3, 'female'),
(22, 'fish  '),
(52, 'food  '),
(30, 'grass  '),
(31, 'leaves  '),
(32, 'lichen  '),
(2, 'male '),
(33, 'moss  '),
(41, 'motorbike  '),
(34, 'seaweed  '),
(35, 'shrub  '),
(38, 'sports  '),
(7, 'teenager'),
(36, 'thistle  '),
(37, 'tree  '),
(39, 'weather  '),
(51, 'wedding  '),
(29, 'wolf  ');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `picture_id` int(11) NOT NULL,
  `picturename` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`picture_id`, `picturename`, `location`) VALUES
(1, 'golden.jpeg', ''),
(2, 'dog.jpeg', ''),
(3, 'golden2.jpg', ''),
(4, 'hauva.gif', 'desktop'),
(5, 'elain.jpeg', ''),
(6, 'keira.jpeg', ''),
(7, 'marvel.jpg', ''),
(8, 'male.png', ''),
(9, '', 'https://youtu.be/av5JD1dfj_c.com');

-- --------------------------------------------------------

--
-- Table structure for table `testi`
--

CREATE TABLE `testi` (
  `id` int(11) NOT NULL,
  `imgname` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testi`
--

INSERT INTO `testi` (`id`, `imgname`, `location`, `keyword`) VALUES
(79, 'img_snow_wide.jpg', 'gallery/', 'snowmountainssky'),
(80, 'img_nature_wide.jpg', 'gallery/', 'forestrocktreesky'),
(81, 'img_mountains.jpg', 'gallery/', 'mountainsforestlaketreesky'),
(82, 'img_5terre.jpg', 'gallery/', 'citysearockpeoplesky'),
(83, 'img_nature_wide.jpg', 'gallery/', 'kwd'),
(84, 'Image0029.jpg', 'gallery/', 'kwd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(255) DEFAULT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `verified`, `token`, `user_type`, `password`) VALUES
(5297, 'admin', '', 1, 'b7c3de6878c86bf470934f28ff5c8198c53f0406b47d0790a0ba7e34cf15f3fea1e5db0a35e3bffdbf352b690cedc1aa9b01', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(5314, 'unverified', 'unverified@unverified', 0, '6b67d35aa4f654011f76bf2124638213acc11fc8a49b88f0c25e98f972213f83b0eb0c6bb0d88c7aea7045864848bfc5017b', 'user', '202cb962ac59075b964b07152d234b70'),
(5315, 'forgottenpass', 'forgottenpass@forgottenpass', 1, 'd9649d7044b8b3736d4e4c599909c3f0a3a25fecdaa72c08489e5f86e7647adf98b19aa4ee9a424d1d665f394022e674d44a', 'user', '202cb962ac59075b964b07152d234b70'),
(5316, 'added1', 'added1@added', 0, '9289f554fdba1012f2f91d6913d424f1fd65224863da38656407a7dace75f3c237bc525ab4cab7b6eaaf68cf8dbc6094db49', 'user', '202cb962ac59075b964b07152d234b70'),
(5318, 'added', 'a@1', 0, '3db7f303142691194934f4cb9b3118f6c07e79ab34fab990f602ad0e86149b1c1244c6296bd6661ec1d2f75304dbc3cb1486', 'user', '202cb962ac59075b964b07152d234b70'),
(5319, 'tommi', 't.laiho@gmail.com', 1, '69bf55347fc7f46f6a2cad72d9df7c795764a58d49f17f548c1a46d4f3f3aa81bd0fa473fe605c82189192b981929055b6e0', 'user', '68053af2923e00204c3ca7c6a3150cf7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `testi`
--
ALTER TABLE `testi`
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
-- AUTO_INCREMENT for table `testi`
--
ALTER TABLE `testi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5321;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
