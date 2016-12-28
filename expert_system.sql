-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2016 at 06:37 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expert_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `expert_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `expert_id`) VALUES
(2, 'Software Company One', 'Address One', 4),
(6, 'Software Company Two', 'Address Two', 4),
(7, 'Software Company Three', 'Address Three', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ides`
--

CREATE TABLE `ides` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ides`
--

INSERT INTO `ides` (`id`, `name`) VALUES
(1, 'Eclipse'),
(2, 'NetBeans'),
(3, 'Sublime Text 2'),
(4, 'Sublime Text 3'),
(5, 'PhpStorm'),
(6, 'JCreator'),
(7, 'JBuilder'),
(8, 'Microsoft Visual Studio'),
(9, 'R Studio'),
(10, 'Zend Studio'),
(11, 'Notepad++'),
(12, 'CodeBlocks'),
(13, 'CodeLite'),
(14, 'Komodo IDE'),
(15, 'MonoDevelop'),
(16, 'C-Free'),
(17, 'Lazarus');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `experience`, `salary`, `company_id`) VALUES
(15, 'Senior Java Developer', '36', '4000', 2),
(19, 'Junior PHP Developer', '12', '1000', 2),
(20, 'Junior Frontend Developer', '12', '800', 2),
(21, 'Senior C# Developer', '36', '4200', 2),
(22, 'Senior PHP Developer', '24', '2500', 6),
(23, 'Trainee PHP Developer', '1', '400', 6),
(24, 'Senior Javascript Developer', '36', '3500', 7),
(25, 'Senior C/C++ Developer', '36', '4000', 7);

-- --------------------------------------------------------

--
-- Table structure for table `position_ides`
--

CREATE TABLE `position_ides` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `ide_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position_ides`
--

INSERT INTO `position_ides` (`id`, `position_id`, `ide_id`) VALUES
(2, 15, 1),
(3, 15, 7),
(4, 15, 6),
(5, 15, 2),
(13, 19, 5),
(14, 19, 10),
(15, 20, 2),
(16, 20, 11),
(17, 20, 3),
(18, 20, 4),
(19, 21, 8),
(20, 21, 2),
(21, 22, 2),
(22, 22, 5),
(23, 23, 11),
(24, 24, 2),
(25, 24, 11),
(26, 24, 3),
(27, 25, 12),
(28, 25, 1),
(29, 25, 8),
(30, 25, 11);

-- --------------------------------------------------------

--
-- Table structure for table `position_program_languages`
--

CREATE TABLE `position_program_languages` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `position_program_language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position_program_languages`
--

INSERT INTO `position_program_languages` (`id`, `position_id`, `position_program_language_id`) VALUES
(3, 15, 11),
(4, 15, 9),
(5, 15, 2),
(6, 15, 6),
(7, 15, 19),
(8, 15, 21),
(9, 15, 18),
(22, 19, 19),
(23, 19, 1),
(24, 20, 11),
(25, 20, 9),
(26, 20, 6),
(27, 21, 3),
(28, 21, 19),
(29, 21, 21),
(30, 21, 18),
(31, 21, 10),
(32, 22, 11),
(33, 22, 9),
(34, 22, 6),
(35, 22, 19),
(36, 22, 1),
(37, 23, 1),
(38, 24, 11),
(39, 24, 9),
(40, 24, 6),
(41, 24, 10),
(42, 25, 5),
(43, 25, 4),
(44, 25, 19),
(45, 25, 21),
(46, 25, 18);

-- --------------------------------------------------------

--
-- Table structure for table `position_technology`
--

CREATE TABLE `position_technology` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position_technology`
--

INSERT INTO `position_technology` (`id`, `position_id`, `technology_id`) VALUES
(3, 15, 3),
(4, 15, 18),
(5, 15, 23),
(6, 15, 17),
(7, 15, 20),
(8, 15, 22),
(9, 15, 16),
(10, 15, 21),
(11, 15, 19),
(12, 15, 2),
(13, 15, 11),
(14, 15, 10),
(15, 15, 13),
(16, 15, 12),
(17, 15, 15),
(18, 15, 14),
(26, 19, 11),
(27, 20, 3),
(28, 20, 2),
(29, 20, 13),
(30, 20, 12),
(31, 20, 15),
(32, 21, 13),
(33, 21, 12),
(34, 21, 15),
(35, 22, 6),
(36, 22, 2),
(37, 22, 1),
(38, 22, 11),
(39, 23, 2),
(40, 24, 3),
(41, 24, 2),
(42, 24, 11),
(43, 24, 12),
(44, 24, 15),
(45, 25, 11);

-- --------------------------------------------------------

--
-- Table structure for table `program_languages`
--

CREATE TABLE `program_languages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `program_languages`
--

INSERT INTO `program_languages` (`id`, `name`) VALUES
(1, 'PHP'),
(2, 'JAVA'),
(3, 'C#'),
(4, 'C++'),
(5, 'C'),
(6, 'Javascript'),
(7, 'Delphi'),
(8, 'Fortran'),
(9, 'HTML'),
(10, 'XML'),
(11, 'CSS'),
(12, 'Haskell'),
(13, 'Python'),
(14, 'Perl'),
(15, 'Ruby'),
(16, 'Lisp'),
(17, 'J#'),
(18, 'SQL'),
(19, 'MySQL'),
(20, 'MongoDB'),
(21, 'Oracle DB');

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `name`) VALUES
(1, 'Laravel'),
(2, 'Jquery'),
(3, 'Bootstrap'),
(4, 'Zend Framework 2'),
(5, 'Zend Framework'),
(6, 'Codeigniter'),
(7, 'Wordpress'),
(8, 'Wii2'),
(9, 'Symphony'),
(10, 'Spring'),
(11, 'Linux'),
(12, 'Windows 7'),
(13, 'Windows 10'),
(14, 'Windows XP'),
(15, 'Windows 8'),
(16, 'Java Servlet API'),
(17, 'Java Message Service API'),
(18, 'Java API for XML Processing'),
(19, 'JDBC API'),
(20, 'Java Persistence API'),
(21, 'JavaBeans Activation Framework'),
(22, 'Java SE'),
(23, 'Java EE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `role` enum('expert','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `salary`, `experience`, `role`) VALUES
(1, 'Моника', 'Спасова', 'monika_ms@abv.bg', '$2y$10$FuCJCMScQX.njWxTE2vexekTbM4VpjGFaCadQXHqfR8Vr4evIhSFC', '1500', '12', 'user'),
(2, 'monika', 'spasova', 'monikaspasova1@gmail.com', '$2y$10$FSG0Zz2Lmezr9ge92g0Iruj9BjUYtRyvAL0LZGuRT9fOZpTB5u8I2', '', '', 'expert'),
(3, 'ivan', 'nenkov', 'voknen@abv.bg', '$2y$10$waZErQj1IYIBGxxc7W6os.0tpbArgojMCXcUSlDfqL5Jn5Ul9tVW2', '1500', '12', 'user'),
(4, 'ivan', 'nenkov', 'voknen@gmail.com', '$2y$10$sPhOKrEHiVWNbLZ1CP6y8O4Al4i48yuZYC8QkCNl5R5x.ZPR39oSy', '', '', 'expert'),
(5, 'ivan', 'nenkov', 'tochno_taka_e@abv.bg', '$2y$10$y5qrg7CMInCewCO5f18EOO03s/oq/gEs8EQml7Kl96Dt.Z9Mw2JCy', '', '', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_ides`
--

CREATE TABLE `user_ides` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ide_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_ides`
--

INSERT INTO `user_ides` (`id`, `user_id`, `ide_id`) VALUES
(24, 1, 12),
(25, 1, 1),
(26, 1, 2),
(27, 1, 11),
(28, 1, 9),
(29, 1, 3),
(30, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_program_languages`
--

CREATE TABLE `user_program_languages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `program_language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_program_languages`
--

INSERT INTO `user_program_languages` (`id`, `user_id`, `program_language_id`) VALUES
(25, 1, 4),
(26, 1, 11),
(27, 1, 12),
(28, 1, 9),
(29, 1, 2),
(30, 1, 6),
(31, 1, 19),
(32, 1, 1),
(33, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_technologies`
--

CREATE TABLE `user_technologies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_technologies`
--

INSERT INTO `user_technologies` (`id`, `user_id`, `technology_id`) VALUES
(24, 1, 3),
(25, 1, 2),
(26, 1, 1),
(27, 1, 11),
(28, 1, 13),
(29, 1, 12),
(30, 1, 15),
(31, 3, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expert_id` (`expert_id`);

--
-- Indexes for table `ides`
--
ALTER TABLE `ides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `position_ides`
--
ALTER TABLE `position_ides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `ide_id` (`ide_id`);

--
-- Indexes for table `position_program_languages`
--
ALTER TABLE `position_program_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `position_program_language_id` (`position_program_language_id`);

--
-- Indexes for table `position_technology`
--
ALTER TABLE `position_technology`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `technology_id` (`technology_id`);

--
-- Indexes for table `program_languages`
--
ALTER TABLE `program_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_ides`
--
ALTER TABLE `user_ides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ide_id` (`ide_id`);

--
-- Indexes for table `user_program_languages`
--
ALTER TABLE `user_program_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `program_language_id` (`program_language_id`);

--
-- Indexes for table `user_technologies`
--
ALTER TABLE `user_technologies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `technology_id` (`technology_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ides`
--
ALTER TABLE `ides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `position_ides`
--
ALTER TABLE `position_ides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `position_program_languages`
--
ALTER TABLE `position_program_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `position_technology`
--
ALTER TABLE `position_technology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `program_languages`
--
ALTER TABLE `program_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_ides`
--
ALTER TABLE `user_ides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `user_program_languages`
--
ALTER TABLE `user_program_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user_technologies`
--
ALTER TABLE `user_technologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`expert_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `position_ides`
--
ALTER TABLE `position_ides`
  ADD CONSTRAINT `position_ides_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `position_ides_ibfk_2` FOREIGN KEY (`ide_id`) REFERENCES `ides` (`id`);

--
-- Constraints for table `position_program_languages`
--
ALTER TABLE `position_program_languages`
  ADD CONSTRAINT `position_program_languages_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `position_program_languages_ibfk_2` FOREIGN KEY (`position_program_language_id`) REFERENCES `program_languages` (`id`);

--
-- Constraints for table `position_technology`
--
ALTER TABLE `position_technology`
  ADD CONSTRAINT `position_technology_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `position_technology_ibfk_2` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`);

--
-- Constraints for table `user_ides`
--
ALTER TABLE `user_ides`
  ADD CONSTRAINT `user_ides_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_ides_ibfk_2` FOREIGN KEY (`ide_id`) REFERENCES `ides` (`id`);

--
-- Constraints for table `user_program_languages`
--
ALTER TABLE `user_program_languages`
  ADD CONSTRAINT `user_program_languages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_program_languages_ibfk_2` FOREIGN KEY (`program_language_id`) REFERENCES `program_languages` (`id`);

--
-- Constraints for table `user_technologies`
--
ALTER TABLE `user_technologies`
  ADD CONSTRAINT `user_technologies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_technologies_ibfk_2` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
