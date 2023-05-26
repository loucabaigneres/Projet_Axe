-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2023 at 07:31 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `axe`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int NOT NULL,
  `post_author_id` int DEFAULT NULL,
  `post_content` text COLLATE utf8mb4_general_ci NOT NULL,
  `post_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_author_id`, `post_content`, `post_tag`, `post_pic`, `post_date`) VALUES
(562, 44, 'Test Action', 'tag-1', '', '2023-05-25 15:21:33'),
(563, 44, 'Test Animation', 'tag-2', '', '2023-05-25 15:21:40'),
(564, 44, 'Test Aventure', 'tag-3', '', '2023-05-25 15:21:47'),
(565, 44, 'Test Comédie', 'tag-4', '', '2023-05-25 15:22:34'),
(566, 44, 'Test Drame', 'tag-5', '', '2023-05-25 15:22:49'),
(567, 44, 'Test Fantastique', 'tag-6', '', '2023-05-25 15:24:01'),
(569, 44, 'Test Horreur', 'tag-7', '', '2023-05-25 15:24:40'),
(570, 44, 'Test Policier', 'tag-8', '', '2023-05-25 15:24:46'),
(571, 44, 'Test Science-fiction', 'tag-9', '', '2023-05-25 15:24:53'),
(572, 44, 'Test Old-school', 'tag-10', '', '2023-05-25 15:25:03'),
(573, 44, 'TEST', 'tag-2', '646fc26b404c8_top-des-quartier-a-visiter-a-Paris-Quartier-du-Marais-1024x683.jpg', '2023-05-25 22:17:47'),
(574, 50, 'test Rami', 'tag-2', '', '2023-05-26 00:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_nickname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `user_mail` text COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` text COLLATE utf8mb4_general_ci NOT NULL,
  `user_pic` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_nickname`, `user_mail`, `user_password`, `user_pic`) VALUES
(44, 'Yani', 'yani', 'yani@yani', '$argon2id$v=19$m=65536,t=4,p=1$WU9OdnJqNTFOdzE4N1c5bw$BYOecemMoc46LSvdjrNJ12r3yNlyBqP6I4imF0OYaX4', 'https://cdn.discordapp.com/attachments/1110593626280558642/1111552311823695985/pp_yani.jpg'),
(45, 'Allia', 'allia', 'allia@allia', '$argon2id$v=19$m=65536,t=4,p=1$SjZjSVloNThQTWdyOFQ4Yg$epfNgWIEw2ohMaGLLWtqvO8teqKFyaWgogd3oA5NYhQ', 'allia'),
(46, 'Louca', 'louca', 'louca@louca', '$argon2id$v=19$m=65536,t=4,p=1$OEdMZlBqdy5GMjJHUVdFaw$ziX+tSFKgrWroYc7ZPD8QQR66XYPWc9CvQdfagigQVY', 'louca'),
(48, 'Moons', 'moons', 'moons@moons', '$argon2id$v=19$m=65536,t=4,p=1$aDBaYWdVTGJBT0d1LzM2aA$R0nsh1sk4knAD41QXPshlfQ9VMHZJZwmmnI41evruEg', 'https://cdn.discordapp.com/attachments/1100132239293022240/1111428301253259335/moons.jpg'),
(49, 'Victor', 'victor', 'victor@victor', '$argon2id$v=19$m=65536,t=4,p=1$akprT1hsak1Nd2JVM1Y2MA$KFRWqJvWwNqlRb2uWEW49tNyGIkDFpV6LkMdrCKFObU', 'victor'),
(50, 'Rami', 'rami', 'rami@rami', '$argon2id$v=19$m=65536,t=4,p=1$QVQ2S2s5NjRnT0ZucFFtNQ$qDTi06lpdvadCSO9x7y1jZxnUtXS5PpzAHEAgKJvMSQ', 'https://cdn.discordapp.com/attachments/808701155306766357/1110704500563529818/Screenshot_20230331-141706.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `postLinkUser` (`post_author_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=578;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `postLinkUser` FOREIGN KEY (`post_author_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
