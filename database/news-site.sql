-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2025 at 04:03 PM
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
-- Database: `news-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(71, 'Music', 1),
(70, 'Health & Fitness', 1),
(69, 'Recipe', 2),
(65, 'Fashion', 3),
(66, 'Gadgets', 2),
(67, 'Lifestyle', 3),
(68, 'Travel', 13);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(50, 'Fashion Outfit Ideas From the Biggest Instagram Influencers', 'We woke reasonably late following the feast and free flowing wine the night before. After gathering ourselves and our packs, we headed down to our homestay family’s small dining room for breakfast.\r\n\r\nRefreshingly, what was expected of her was the same thing that was expected of Lara Stone: to take a beautiful picture.\r\n\r\nWe were making our way to the Rila Mountains, where we were visiting the Rila Monastery where we enjoyed scrambled eggs, toast, mekitsi, local jam and peppermint tea.', '65', '09 Dec, 2024', 24, '23-768x512.webp'),
(51, 'Style Spy: Fashion Model Goes Casual in Faux Furr and Plaid', 'We woke reasonably late following the feast and free flowing wine the night before. After gathering ourselves and our packs, we headed down to our homestay family’s small dining room for breakfast.\r\n\r\nRefreshingly, what was expected of her was the same thing that was expected of Lara Stone: to take a beautiful picture.\r\n\r\nWe were making our way to the Rila Mountains, where we were visiting the Rila Monastery where we enjoyed scrambled eggs, toast, mekitsi, local jam and peppermint tea.', '65', '09 Dec, 2024', 24, '22-696x465.jpg.webp'),
(52, 'What to Wear on Gala Night? We Asked the Biggest Names!', 'We woke reasonably late following the feast and free flowing wine the night before. After gathering ourselves and our packs, we headed down to our homestay family’s small dining room for breakfast.\r\n\r\nRefreshingly, what was expected of her was the same thing that was expected of Lara Stone: to take a beautiful picture.\r\n\r\nWe were making our way to the Rila Mountains, where we were visiting the Rila Monastery where we enjoyed scrambled eggs, toast, mekitsi, local jam and peppermint tea.', '65', '09 Dec, 2024', 24, '20-696x464.jpg.webp'),
(53, 'Snapdragon Super Chip Mounted on the Latest Photo Cameras', 'We woke reasonably late following the feast and free flowing wine the night before. After gathering ourselves and our packs, we headed down to our homestay family’s small dining room for breakfast.\r\n\r\nRefreshingly, what was expected of her was the same thing that was expected of Lara Stone: to take a beautiful picture.\r\n\r\nWe were making our way to the Rila Mountains, where we were visiting the Rila Monastery where we enjoyed scrambled eggs, toast, mekitsi, local jam and peppermint tea.', '66', '09 Dec, 2024', 24, '29-696x464.jpg.webp'),
(54, 'Game Changing Virtual Reality Console Hits the Market', 'We woke reasonably late following the feast and free flowing wine the night before. After gathering ourselves and our packs, we headed down to our homestay family’s small dining room for breakfast.\r\n\r\nRefreshingly, what was expected of her was the same thing that was expected of Lara Stone: to take a beautiful picture.\r\n\r\nWe were making our way to the Rila Mountains, where we were visiting the Rila Monastery where we enjoyed scrambled eggs, toast, mekitsi, local jam and peppermint tea.', '66', '09 Dec, 2024', 24, '28.jpg'),
(55, 'WordPress News Magazine Charts the Most Chic and Fashionable Women of New York City', 'We woke reasonably late following the feast and free flowing wine the night before. After gathering ourselves and our packs, we headed down to our homestay family’s small dining room for breakfast.\r\n\r\nRefreshingly, what was expected of her was the same thing that was expected of Lara Stone: to take a beautiful picture.\r\n\r\nWe were making our way to the Rila Mountains, where we were visiting the Rila Monastery where we enjoyed scrambled eggs, toast, mekitsi, local jam and peppermint tea.', '71', '09 Dec, 2024', 24, 'h104-696x464.jpg.webp'),
(56, 'How to Burn Calories with Pleasant Activities', 'We woke reasonably late following the feast and free flowing wine the night before. After gathering ourselves and our packs, we headed down to our homestay family’s small dining room for breakfast.\r\n\r\nRefreshingly, what was expected of her was the same thing that was expected of Lara Stone: to take a beautiful picture.\r\n\r\nWe were making our way to the Rila Mountains, where we were visiting the Rila Monastery where we enjoyed scrambled eggs, toast, mekitsi, local jam and peppermint tea.', '70', '09 Dec, 2024', 24, '61-696x464.jpg.webp'),
(57, 'KTM Marchetti Signs with Larranaga and Zanotti for Next Season', 'We woke reasonably late following the feast and free flowing wine the night before. After gathering ourselves and our packs, we headed down to our homestay family’s small dining room for breakfast. You are good.\r\n\r\nRefreshingly, what was expected of her was the same thing that was expected of Lara Stone: to take a beautiful picture.\r\n\r\nWe were making our way to the Rila Mountains, where we were visiting the Rila Monastery where we enjoyed scrambled eggs, toast, mekitsi, local jam and peppermint tea.\r\n\r\n', '69', '09 Dec, 2024', 24, '97.jpg'),
(58, 'Motivational Songs to Have a Successful Workout', 'We woke reasonably late following the feast and free flowing wine the night before. After gathering ourselves and our packs, we headed down to our homestay family’s small dining room for breakfast.\r\n\r\nRefreshingly, what was expected of her was the same thing that was expected of Lara Stone: to take a beautiful picture.\r\n\r\nWe were making our way to the Rila Mountains, where we were visiting the Rila Monastery where we enjoyed scrambled eggs, toast, mekitsi, local jam and peppermint tea.\r\n\r\n', '67', '09 Dec, 2024', 24, '62.jpg'),
(59, 'Are you Ready? Complete Recap of the Streer Rally Action Shootout ', 'We woke reasonably late following the feast and free flowing wine the night before. After gathering ourselves and our packs, we headed down to our homestay family’s small dining room for breakfast.\r\n\r\nRefreshingly, what was expected of her was the same thing that was expected of Lara Stone: to take a beautiful picture.\r\n\r\nWe were making our way to the Rila Mountains, where we were visiting the Rila Monastery where we enjoyed scrambled eggs, toast, mekitsi, local jam and peppermint tea.\r\n\r\n', '68', '09 Dec, 2024', 24, 'girl2.jpg.webp'),
(60, 'Modern and colorful style of caricatures created by AI Action', 'A Digital Revolution\r\nAI-driven caricature creation represents a digital revolution. Artists and enthusiasts now have access to sophisticated tools that can generate caricatures with remarkable precision, bringing fresh life to this traditional art form.', '67', '10 Dec, 2024', 25, 'Untitled-3-1024x797.webp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(24, 'Rasel', 'Sheikh', 'rasel', 'd515518a1715bae5fbfc59d2458de532', 1),
(25, 'Saifullah ', 'Jony', 'jony', '924c0b8f054133bb9605822fdb96cba7', 0),
(28, 'Sujon', 'Ahmed', 'sujon', '730056bfa3536c8c6f7e70e896963d61', 0),
(29, 'Rupa ', 'Khatun', 'rupa', '8c14af8a19c4b0d77a4fc68ac3dfafb0', 1),
(30, 'Naim', 'Molla', 'naim', '7538d4dcba3305622d94579666135c31', 0),
(31, 'Rashidul', 'Sikdar', 'rashidul', '0aaddaf5c4363d990c2bd881278ed178', 0),
(32, 'Rabbi', 'Molla', 'rabbi', 'b702d22b624670eeb449ae15c367f063', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
