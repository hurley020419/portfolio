-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 12:44 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_hamac`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `skillname` varchar(50) DEFAULT NULL,
  `skillper` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `skillname`, `skillper`) VALUES
(1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `aboutdes`
--

CREATE TABLE `aboutdes` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `des` text DEFAULT NULL,
  `des2` text DEFAULT NULL,
  `portfolio_background` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutdes`
--

INSERT INTO `aboutdes` (`id`, `filename`, `des`, `des2`, `portfolio_background`) VALUES
(1, 'DSCF3488.jpg', 'Hi i am Hurley Dave S. Hamac a web developer who specializes in the creation, maintenance, and improvement of websites and web applications. including coding, programming, and implementing functionality.', '\"I am a senior high school graduate in Information and Communications Technology (ICT) under the Technical-Vocational-Livelihood (TVL) Strand, and I hold a National Certificate Level 3 (NC3) in Animation. Currently, I am pursuing a college education at Western Mindanao State University (WMSU) in Zamboanga City, taking up a course in Information Technology (IT).\"', 'shunsuke-ono-UZcSjWT4F_I-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_num` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `mobile_num`, `address`) VALUES
(1, 'hurleydave@gmail.com', '091234567', 'New York, Zamboanga City');

-- --------------------------------------------------------

--
-- Table structure for table `displaycontent`
--

CREATE TABLE `displaycontent` (
  `id` int(11) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `display_skill` varchar(255) DEFAULT NULL,
  `display_skill2` varchar(255) DEFAULT NULL,
  `display_avail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `displaycontent`
--

INSERT INTO `displaycontent` (`id`, `display_name`, `display_skill`, `display_skill2`, `display_avail`) VALUES
(1, 'Hurley Dave S. Hamac', 'Web Designer', 'Web Developer', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(10) NOT NULL,
  `school` text NOT NULL,
  `edu` text NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `startyear` varchar(50) NOT NULL,
  `endyear` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `school`, `edu`, `course`, `startyear`, `endyear`) VALUES
(1, 'Western Mindanao State University', 'College', 'Bachelor of Science in Infomation Technology', '2018', '2024'),
(2, 'Comtech', 'Senior High', '', '2016', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `homephotos`
--

CREATE TABLE `homephotos` (
  `id` int(11) NOT NULL,
  `home_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homephotos`
--

INSERT INTO `homephotos` (`id`, `home_img`) VALUES
(1, 'DSCF3488.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `project_category` varchar(255) NOT NULL,
  `project_img` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `project_category`, `project_img`, `project_name`) VALUES
(1, 'Photography', 'DSCF3488.jpg', 'WMSU CCS Model');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `des` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `logo`, `name`, `des`) VALUES
(60, 'fa fa-desktop', 'Web Design', 'Maintain and improvement of websites and web applications. including coding, programming, and implementing functionality.');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` int(11) NOT NULL,
  `socialmedialogo` varchar(255) NOT NULL,
  `socialmedialink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `socialmedialogo`, `socialmedialink`) VALUES
(7, 'lni lni-instagram', 'https://www.instagram.com/hurleydave'),
(8, 'lni lni-github', 'https://www.github.com/hurleydave'),
(9, 'lni lni-facebook', 'https://www.facebook.com/hurleydave');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'hurleydave', '202cb962ac59075b964b07152d234b70', 'Hurley Dave');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aboutdes`
--
ALTER TABLE `aboutdes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `displaycontent`
--
ALTER TABLE `displaycontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homephotos`
--
ALTER TABLE `homephotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aboutdes`
--
ALTER TABLE `aboutdes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `displaycontent`
--
ALTER TABLE `displaycontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `homephotos`
--
ALTER TABLE `homephotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
