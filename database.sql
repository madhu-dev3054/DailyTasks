-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2026 at 03:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(3, 'abc', 'abc@gmail.com', 'abc', '2026-05-16 12:44:54'),
(4, 'jkl', 'jkl@gmail.com', 'jkl', '2026-05-16 12:45:32'),
(5, 'asdf', 'asdf@gmail.com', 'asdf', '2026-05-16 12:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `due_date` datetime DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `status`, `user_id`, `created_at`, `due_date`, `completed_at`) VALUES
(43, 'lear php', 'I want to complet php in 1 month', 'Pending', 54, '2026-05-16 13:27:14', '2026-06-16 00:00:00', NULL),
(44, 'Buy Groceries', 'Purchase vegetables, fruits, milk, and other daily household items from the market.', 'Pending', 54, '2026-05-16 13:46:26', '2026-05-17 05:29:00', NULL),
(45, 'Complete College Assignment', 'Finish the pending computer science assignment before submission deadline.', 'Completed', 54, '2026-05-16 13:47:19', '2026-05-16 23:21:00', NULL),
(46, 'Attend Online Class', 'Join the scheduled online lecture and complete class notes properly.', 'Pending', 55, '2026-05-16 13:49:54', '2026-05-18 07:30:00', NULL),
(47, 'Workout for 30 Minutes', 'Perform daily exercise and stretching to stay healthy and active.', 'Pending', 55, '2026-05-16 13:50:55', '2026-06-16 05:00:00', NULL),
(48, 'Clean Study Table', 'Organize books, laptop, and notes to maintain a clean workspace.', 'Pending', 56, '2026-05-16 13:53:57', '2026-05-17 09:10:00', NULL),
(49, 'Pay Electricity Bill', 'Check and pay the monthly electricity bill before due date.', 'Completed', 56, '2026-05-16 13:54:28', '2026-05-22 21:26:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT 0,
  `verification_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `profile_photo`, `email_verified`, `verification_token`, `email`) VALUES
(55, 'abc', '$2y$10$XcaMl0IhIORkivCDdpLHC.Fom10wgEeoQOy9KvTt3MJUbE9p50MSm', 'Screenshot 2023-10-03 000533.png', 0, NULL, 'abc@gmail.com'),
(56, 'xyz', '$2y$10$GjI4P/V37gmsiRGScDgJ9egyDYywN3TRXQgjUp/c9Gizdn/IfThju', NULL, 0, NULL, 'xyz@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
