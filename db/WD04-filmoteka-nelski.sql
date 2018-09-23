-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 23, 2018 at 03:09 PM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WD04-filmoteka-nelski`
--

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `genre` text NOT NULL,
  `year` int(11) NOT NULL,
  `description` text NOT NULL,
  `photo` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `title`, `genre`, `year`, `description`, `photo`) VALUES
(1, 'Облачный атлас', 'драма', 2012, 'Шесть историй — пять реинкарнаций, происходящих в разное время, тесно переплетаются между собой…', ''),
(14, 'Пианист', 'драма', 2002, 'Фильм снят по автобиографии Владислава Шпильмана, одного из лучших пианистов Польши 30-х годов прошлого века. Главный герой фильма — Владек — занимается искусством до тех пор, пока территорию Польши не занимают нацисты. Жизнь всех евреев меняется: их помещают в Варшавское гетто, запрещают работать, унижают, заставляют носить отличительные повязки, а через некоторое время отправляют в концлагерь.', ''),
(15, 'Призрак', 'триллер, драма', 2009, '', ''),
(16, 'Пиджак', 'детектив', 2005, '', ''),
(17, 'Академия смерти', 'драма', 2004, '', ''),
(18, 'Песня для изгоя', 'драма', 2003, '', ''),
(19, 'Сто дней после детства', 'драма, мелодрама', 1975, '', ''),
(22, 'Белый олеандр', 'драма', 2002, '', ''),
(23, 'Читая мысли', 'триллер, детектив', 2005, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
