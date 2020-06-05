-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2020 at 09:13 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coaching`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `subcategory` varchar(100) NOT NULL,
  `assignment_descp` varchar(500) NOT NULL,
  `assign_file` varchar(200) NOT NULL,
  `file_extension` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `class`, `category`, `subcategory`, `assignment_descp`, `assign_file`, `file_extension`, `date`) VALUES
(3, 'Entrance', 'JEE', 'physics', 'This is a new sample assignment', '9d7a2c527137b10bff5f3b6ec3bb499a.pdf', 'pdf', '2020-05-10 18:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `class10`
--

CREATE TABLE `class10` (
  `id` int(6) UNSIGNED NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `subcategory` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class10`
--

INSERT INTO `class10` (`id`, `category`, `price`, `subcategory`) VALUES
(1, 'regular class', '10000', '_maths_social science'),
(2, 'distance mode', '5000', '_maths_english');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`) VALUES
(1, 'Entrance'),
(3, 'Class 10');

-- --------------------------------------------------------

--
-- Table structure for table `crousel`
--

CREATE TABLE `crousel` (
  `id` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `file_extension` varchar(200) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crousel`
--

INSERT INTO `crousel` (`id`, `img`, `file_extension`, `date`) VALUES
(3, '87279f2fba9e232c2579b65cd5641a1b.jpg', 'jpg', '2020-05-10 17:16:23'),
(4, '6945e99a6996861e6c37a702a5200097.jpg', 'jpg', '2020-05-10 17:16:30'),
(5, '09df4225f82dd564a6e944831af331bc.jpg', 'jpg', '2020-05-10 17:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `doubt_answers`
--

CREATE TABLE `doubt_answers` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `subcategory` varchar(200) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `answer_img` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doubt_answers`
--

INSERT INTO `doubt_answers` (`id`, `message_id`, `user_id`, `category`, `subcategory`, `answer`, `answer_img`, `date`) VALUES
(1, 1, 'explore.mohd.arif8810@gmail.com', 'Class 10', 'regular class', 'Hello this is sample answer', '323443982e17d6f92d1754261e87585a.jpg', '2020-05-15 12:10:04'),
(2, 1, 'explore.mohd.arif8810@gmail.com', 'Class 10', 'regular class', 'sdnsmdsm ', 'cb203672083c33d713a02015406fe366.jpg', '2020-05-15 12:12:39'),
(3, 2, 'Irshadmd039@gmail.com', 'Class 10', 'regular class', 'hello', '', '2020-05-15 12:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `entrance`
--

CREATE TABLE `entrance` (
  `id` int(6) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `subcategory` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entrance`
--

INSERT INTO `entrance` (`id`, `category`, `price`, `subcategory`) VALUES
(1, 'JEE', '1000', '_physics_chemistry_maths');

-- --------------------------------------------------------

--
-- Table structure for table `mcqquestions`
--

CREATE TABLE `mcqquestions` (
  `id` int(6) UNSIGNED NOT NULL,
  `class` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `subcategory` varchar(100) NOT NULL,
  `test_type` varchar(100) DEFAULT NULL,
  `test_time` varchar(50) DEFAULT NULL,
  `test_name` varchar(100) DEFAULT NULL,
  `test_descp` varchar(500) DEFAULT NULL,
  `question` varchar(500) DEFAULT NULL,
  `question_img` varchar(100) DEFAULT NULL,
  `option1` varchar(100) DEFAULT NULL,
  `option2` varchar(100) DEFAULT NULL,
  `option3` varchar(100) DEFAULT NULL,
  `option4` varchar(100) DEFAULT NULL,
  `op1_img` varchar(50) DEFAULT NULL,
  `op2_img` varchar(50) DEFAULT NULL,
  `op3_img` varchar(50) DEFAULT NULL,
  `op4_img` varchar(50) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mcqquestions`
--

INSERT INTO `mcqquestions` (`id`, `class`, `category`, `subcategory`, `test_type`, `test_time`, `test_name`, `test_descp`, `question`, `question_img`, `option1`, `option2`, `option3`, `option4`, `op1_img`, `op2_img`, `op3_img`, `op4_img`, `answer`, `date`) VALUES
(1, 'Entrance', 'JEE', 'physics', NULL, NULL, 'class test', 'this is new test example description', 'acsbns', '89625df2761a35ddeb76d9c22fca6f7b.png', '', '', '', '', '89fc4d9c03985ab083b922fcf21df0ca.png', '816d79b9a962a57c360678c6ca2f86e2.png', 'e3098717ec148c8e5519054fe2394ca9.png', 'c2cc225d667f5ba454c4e0af23eea823.png', 'a', '2020-05-13 14:40:21'),
(2, 'Entrance', 'JEE', 'physics', NULL, NULL, '', '', 'sdjadk', '', 'skdjsk', 'sdjk', 'sdsjk', 'sdks', '', '', '', '', 'a', '2020-05-20 00:35:01'),
(3, 'Entrance', 'JEE', 'physics', NULL, NULL, '', 'jsjjzjskxj', '', '', '', '', '', '', '', '', '', '', 'a', '2020-05-20 00:37:11'),
(4, 'Entrance', 'JEE', 'physics', NULL, NULL, 'scnxmcn', 'scnsm', '', '', '', '', '', '', '', '', '', '', 'a', '2020-05-20 00:38:32'),
(5, 'Entrance', 'JEE', 'physics', NULL, NULL, 'class test', 'hell', '', '', '', '', '', '', '', '', '', '', 'a', '2020-05-20 00:49:17'),
(6, 'Entrance', 'JEE', 'physics', NULL, NULL, 'hello', 'hello then', '', '', '', '', '', '', '', '', '', '', 'a', '2020-05-20 00:49:43'),
(7, 'Entrance', 'JEE', 'physics', NULL, NULL, 'class test', 'hello last test', '', '', '', '', '', '', '', '', '', '', 'a', '2020-05-20 00:58:54'),
(8, 'Entrance', 'JEE', 'physics', NULL, NULL, 'msmdnmn', 'xmmns', '', '', '', '', '', '', '', '', '', '', 'a', '2020-05-20 00:59:20'),
(9, 'Entrance', 'JEE', 'physics', 'testseries', '', 'class test', 'testing now', 'abc', '', 'an', 'asn', 'sdn', 'asn', '', '', '', '', 'b', '2020-05-21 23:46:46'),
(10, 'Entrance', 'JEE', 'physics', 'testmcq', '2', 'scnxmcn', 'hell', 'dsn', '', 'nksn', 'nsmn', 'nmms', 'sfn', '', '', '', '', 'c', '2020-05-21 23:47:29'),
(11, 'Entrance', 'JEE', 'physics', 'testmcq', '23', 'class test', 'check', 'testq', '', '', '', '', '', '', '', '', '', 'a', '2020-05-22 12:55:20'),
(12, 'Entrance', 'JEE', 'physics', 'testseries', '20', 'class test', 'hello', 'sc', '', 'sd', 'd', 'd', 'd', '', '', '', '', 'a', '2020-05-22 12:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `message_image` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `subcategory` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'notresolved',
  `permission` varchar(200) NOT NULL DEFAULT 'disabled',
  `sentat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `message_image`, `user_id`, `category`, `subcategory`, `status`, `permission`, `sentat`) VALUES
(1, 'Developers', 'http://www.digitalcatnyx.store/api/doubts/IMG-20200512-WA0098.jpg', 'explore.mohd.arif8810@gmail.com', 'Class 10', 'regular class', 'resolved', 'enabled', '2020-05-20 19:57:54'),
(2, 'hello testing this is a sample message! Working perfectly .', 'http://www.digitalcatnyx.store/api/doubts/IMG-20200512-WA0098.jpg', 'Irshadmd039@gmail.com', 'Class 10', 'regular class', 'resolved', 'disabled', '2020-05-20 19:57:44'),
(3, 'Hello testing1', '', 'irshadmd039@gmail.com', 'Entrance', 'JEE', 'notresolved', 'enabled', '2020-05-21 16:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `class` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `announcement` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `class`, `category`, `announcement`, `date`) VALUES
(1, 'Entrance', 'JEE', 'hello new ', '2020-06-05 16:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `login` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `subcategory` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created`, `login`, `category`, `subcategory`, `price`) VALUES
(1, 'Irshad', 'iamirshad@gmail.com', '12345', '2020-05-16 16:10:29', 'true', 'Class 10', 'regular class', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `subcategory` varchar(100) NOT NULL,
  `video_descp` varchar(500) NOT NULL,
  `video_file` varchar(200) NOT NULL,
  `file_extension` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `class`, `category`, `subcategory`, `video_descp`, `video_file`, `file_extension`, `date`) VALUES
(4, 'Entrance', 'JEE', 'physics', 'this is video', '0e78c8162c8f3e2d7684e341ba31e68d.mp4', 'mp4', '2020-05-10 17:26:13'),
(6, 'Entrance', 'JEE', 'physics', 'This is new sample video', '1072d90ff14b88f16974d85a28ae095c.mp4', 'mp4', '2020-05-10 17:55:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class10`
--
ALTER TABLE `class10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crousel`
--
ALTER TABLE `crousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doubt_answers`
--
ALTER TABLE `doubt_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entrance`
--
ALTER TABLE `entrance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcqquestions`
--
ALTER TABLE `mcqquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
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
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class10`
--
ALTER TABLE `class10`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crousel`
--
ALTER TABLE `crousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doubt_answers`
--
ALTER TABLE `doubt_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `entrance`
--
ALTER TABLE `entrance`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mcqquestions`
--
ALTER TABLE `mcqquestions`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
