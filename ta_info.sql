-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2018 at 12:05 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `ta_users`
--

CREATE TABLE `ta_users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `labSection` int(11) DEFAULT NULL,
  `userAvail` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_users`
--

INSERT INTO `ta_users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`, `labSection`, `userAvail`) VALUES
(10, 'achin', 'asdf@h.com', '$2y$10$Qvzoae6GSae5jEY8bGekheWogAQvZcwr.YiObSnDxXFZmHM2sHuMa', 5, '100000000000000000100000000000000000000000000000,000100111000000000000000000000000000000000000000,000000000000111111111111111111111111111111000000,000000000000000000000000001111000000000000000000,000000000000000000000000000000000000111111000000,000000000000000000000000001100000000000000000000,000000000000000000000000000000000000000000100000'),
(11, 'drg', 'g@duke.edu', '$2y$10$.ZERCbp9gllm7UGT1CtS5uF4ItunCpd4U.74ELnwUs6k7GiMhVq3G', 5, '000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,      000000000000000000000000000000000110000000,00000,000000000000000000000000000000000000000000,00000,000000000000000000000000000000000000000000,00000,000000000000000000000000000000000000000000,00000,000000000000000000000000000000000000000000'),
(12, 'harryxu', 'harryxu2626@gmail.com', '$2y$10$cxiKR1dgyYhAWDgXqspCu.tIQhEG9vpBdc7JHeVrC4mDMOvAB27Cm', 1, '000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,     1111111111000000000000000000000000000000000,00000,000000000000000000000000000000000000000000,00000,000000000000000000000000000000000000000000,00000,000000000000000000000000000000000000000000,00000,000000000000000000000000000000000000000000'),
(13, 'benlu', 'achintyai@yahoo.com', '$2y$10$P.2n1tRyo6p7T9squyMtjuwy1lfJQUjhZ9HRwoGzpnew4xhQCDGa6', 3, '000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,      000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000'),
(14, 'asdf', 'asdf@asdf.com', '$2y$10$ZVDoAEJkMYPaTxEsucDpk.c9NREYsJ5lPXByy0HkZU7oOWfvOiEF6', 5, '000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000110000000,000000000000000000000000000000000000000000000000'),
(15, 'petek', 'peteksener9@gmail.com', '$2y$10$OlOYP0.kIe53WS9yyTJNE.qVxSnPZI4oj0UP6zNnv5DS91uVJ6EIO', 6, '000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000001101000'),
(16, 'drsaterbak', 'harryxu@live.hk', '$2y$10$ScEzFR3e9D6yCSnpCqZeku.gdaPRqOOr3niN7kluvvV3Bwav1/k6i', 2, '000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000001100100,000000000000000000000000000000000000000000000000'),
(17, 'obamabinladen', 'obama@imblack.org', '$2y$10$5IJjNobU2/eEPQ9NaMgb8.WrhKy1DyIw/9dYuR70ZiSmlIbtWggx.', 69, '000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000001111001100000000000000000000000000000000,000000000000000000000000000000000000000000000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ta_users`
--
ALTER TABLE `ta_users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ta_users`
--
ALTER TABLE `ta_users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
