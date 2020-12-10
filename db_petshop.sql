-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Nov-2020 às 11:47
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_petshop`
--
CREATE DATABASE IF NOT EXISTS `db_petshop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_petshop`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `animais`
--

CREATE TABLE `animais` (
  `Id` int(4) NOT NULL,
  `Nome` varchar(15) NOT NULL,
  `Tipo` varchar(8) NOT NULL,
  `Raca` varchar(25) NOT NULL,
  `CorP` varchar(10) NOT NULL,
  `Nasc` date NOT NULL,
  `Sexo` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `animais`
--

INSERT INTO `animais` (`Id`, `Nome`, `Tipo`, `Raca`, `CorP`, `Nasc`, `Sexo`) VALUES
(1, 'Bidu', 'Cachorro', 'Vira-Lata', 'Preto', '2012-01-08', 'Macho'),
(2, 'Mingau', 'Gato', 'Ragamuffin', 'Branco', '2002-10-30', 'Macho'),
(3, 'Echo', 'Réptil', 'Iguana', 'Verde', '2018-07-12', 'Fêmea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animais`
--
ALTER TABLE `animais`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animais`
--
ALTER TABLE `animais`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
