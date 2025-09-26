-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2025 at 05:14 PM
-- Server version: 8.0.42-0ubuntu0.20.04.1
-- PHP Version: 7.4.3-4ubuntu2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tFriends`
--

CREATE TABLE `tFriends` (
  `user_id` int NOT NULL,
  `friend_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tUser`
--

CREATE TABLE `tUser` (
  `user_id` int NOT NULL,
  `name` varchar(55) NOT NULL,
  `email_id` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tUser`
--

INSERT INTO `tUser` (`user_id`, `name`, `email_id`, `password`, `address`, `phone`) VALUES
(1, 'Jeya', 'jeya@cloudnix.com', '$2y$10$yVRzXv3ZCGesHRzm3SuG3OIjcNbFGKVGguIBfftQXBcYyPFxzUan.', 'Dindigul', '6369688413'),
(2, 'Siva', 'sivakrishna@cloudnix.com', '$2y$10$GEKe.nRmgkmLT/89buf5WOU.2xC/6tKqre2rq1xKtWl69BaBP/Sge', 'Andra Pradesh', '9865554312'),
(3, 'Samprit', 'samprit@cloudnix.com', '$2y$10$YjN1a2vtuoJoqtoOX2ZIFOXnBQv5utOCGIVAxxmq.s9y1S0wLfWki', 'Karnataka', '9898121243');

-- --------------------------------------------------------

--
-- Table structure for table `tWall`
--

CREATE TABLE `tWall` (
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `posting_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `post` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tWall`
--

INSERT INTO `tWall` (`post_id`, `user_id`, `posting_date`, `post`) VALUES
(1, 1, '2025-09-24 17:14:32', 'Hello Everyone...!'),
(2, 2, '2025-09-24 17:42:47', 'Hello...!'),
(3, 2, '2025-09-24 17:48:59', 'hii'),
(4, 3, '2025-09-24 18:08:35', 'Hello guys..!'),
(8, 1, '2025-09-25 10:13:29', 'HIi'),
(9, 2, '2025-09-25 15:15:34', 'Hii'),
(10, 2, '2025-09-25 15:16:09', 'Hello'),
(11, 2, '2025-09-25 15:17:28', 'Hello everyone!'),
(12, 1, '2025-09-25 15:23:35', 'Hello!'),
(13, 1, '2025-09-25 15:49:59', 'hello'),
(14, 1, '2025-09-26 09:39:51', 'Hellooooo'),
(15, 1, '2025-09-26 10:02:00', 'hello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tFriends`
--
ALTER TABLE `tFriends`
  ADD PRIMARY KEY (`user_id`,`friend_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indexes for table `tUser`
--
ALTER TABLE `tUser`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `tWall`
--
ALTER TABLE `tWall`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tUser`
--
ALTER TABLE `tUser`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tWall`
--
ALTER TABLE `tWall`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tFriends`
--
ALTER TABLE `tFriends`
  ADD CONSTRAINT `tFriends_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tUser` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tFriends_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `tUser` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `tWall`
--
ALTER TABLE `tWall`
  ADD CONSTRAINT `tWall_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tUser` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
