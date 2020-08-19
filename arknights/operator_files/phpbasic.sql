-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2020 at 06:29 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpbasic`
--

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `codename` char(32) NOT NULL,
  `gender` tinyint(1) NOT NULL COMMENT '0 as female, 1 as male',
  `birthplace` varchar(20) NOT NULL,
  `race` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `rate` tinyint(1) NOT NULL COMMENT 'Rate of stars (1 to 6)',
  `infection_status` tinyint(1) NOT NULL COMMENT '0 as uninfected, 1 as infected'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id`, `image`, `name`, `codename`, `gender`, `birthplace`, `race`, `class`, `rate`, `infection_status`) VALUES
(1, '', 'Depp', 'Doctor', 1, 'World', 'Human', 'Admin', 0, 0),
(2, 'img/silverash_icefield.png', 'Enciodas Silverash', 'Silverash', 1, 'Kjerag', 'Feline', 'Guard', 6, 0),
(3, 'img/cliffheart_wwf.png', 'Encia Silverash', 'Cliffheart', 0, 'Kjerag', 'Feline', 'Specialist', 5, 1),
(4, 'img/chen_0011.png', 'Ch\'en Hui-chieh', 'Ch\'en', 0, 'Lungmen', 'Lung', 'Guard', 6, 0),
(5, 'img/aak_e2.png', '阿', 'Aak', 1, 'Lungmen', 'Feline', 'Specialist', 6, 0),
(6, 'img/eyjafjalla_e2.png', 'Eyjafjalla', 'Eyjafjalla', 0, 'Leithanien', 'Caprinae', 'Caster', 6, 1),
(7, 'img/texas_cambrian.png', 'Texas', 'Texas', 0, 'Columbia', 'Lupo', 'Vanguard', 5, 0),
(8, 'img/mayer_e2.png', 'Mayer', 'Mayer', 0, 'Columbia', 'Anaty', 'Supporter', 5, 0),
(9, 'img/mostima_epoque.png', 'Mostima', 'Mostima', 0, 'Laterano', 'Undisclosed', 'Caster', 6, 0),
(10, 'img/cuora_vitafield.png', 'Cuora', 'Cuora', 0, 'Undisclosed', 'Petram', 'Defender', 4, 1),
(11, 'img/gavial_epoque.png', 'Gavial', 'Gavial', 0, 'Undisclosed', 'Archosauria', 'Medic', 4, 1),
(12, 'img/savage_e2.png', 'Savage', 'Savage', 0, 'RIM Billiton', 'Cautus', 'Guard', 5, 0),
(13, 'img/hung_e2.png', '吽', 'Hung', 1, 'Lungmen', 'Perro', 'Defender', 5, 0),
(14, 'img/hellagur_e2.png', 'Hellagur', 'Hellagur', 1, 'Ursus', 'Liberi', 'Guard', 6, 1),
(17, 'img/astesia_e2.png', 'Astesia', 'Astesia', 0, 'Columbia', 'Liberi', 'Guard', 5, 1),
(47, 'bagpipe_e2.png', '', '...', 0, '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `codename` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
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
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
