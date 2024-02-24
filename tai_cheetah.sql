-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2024 at 09:42 AM
-- Server version: 10.3.36-MariaDB-0+deb10u2
-- PHP Version: 7.3.31-1~deb10u5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tai_cheetah`
--

-- --------------------------------------------------------

--
-- Table structure for table `autorisation`
--

CREATE TABLE `autorisation` (
  `droit` varchar(1000) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `id_fichier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fichier`
--

CREATE TABLE `fichier` (
  `nom` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL,
  `id_precedent` int(11) NOT NULL,
  `data` blob NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `nom` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `mdp` varchar(1000) NOT NULL,
  `id_organisation` int(11) NOT NULL,
  `statue` binary(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projet`
--

CREATE TABLE `projet` (
  `nom` varchar(1000) NOT NULL,
  `id` int(11) NOT NULL,
  `id_organisation` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autorisation`
--
ALTER TABLE `autorisation`
  ADD KEY `id_profil` (`id_profil`,`id_fichier`),
  ADD KEY `id_fichier` (`id_fichier`);

--
-- Indexes for table `fichier`
--
ALTER TABLE `fichier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_projet` (`id_projet`,`id_precedent`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_organisation` (`id_organisation`);

--
-- Indexes for table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_organisation` (`id_organisation`),
  ADD KEY `id_profil` (`id_profil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fichier`
--
ALTER TABLE `fichier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `autorisation`
--
ALTER TABLE `autorisation`
  ADD CONSTRAINT `autorisation_ibfk_1` FOREIGN KEY (`id_fichier`) REFERENCES `fichier` (`id`);

--
-- Constraints for table `fichier`
--
ALTER TABLE `fichier`
  ADD CONSTRAINT `fichier_ibfk_1` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id`);

--
-- Constraints for table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `profil_ibfk_1` FOREIGN KEY (`id`) REFERENCES `autorisation` (`id_profil`),
  ADD CONSTRAINT `profil_ibfk_2` FOREIGN KEY (`id_organisation`) REFERENCES `organisation` (`id`);

--
-- Constraints for table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`id_organisation`) REFERENCES `organisation` (`id`),
  ADD CONSTRAINT `projet_ibfk_2` FOREIGN KEY (`id_profil`) REFERENCES `profil` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
