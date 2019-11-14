-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 01:28 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cliente_servidor`
--

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `ID` int(11) NOT NULL,
  `TIPO_DOCUMENTO` int(11) NOT NULL,
  `NUMERO_DOCUMENTO` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `PRIMER_NOMBRE` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `SEGUNDO_NOMBRE` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `PRIMER_APELLIDO` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `SEGUNDO_APELLIDO` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `CORREO_ELECTRONICO` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `AVATAR` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'URI al archivo de imagen',
  `FECHA_CREACION` datetime NOT NULL,
  `FECHA_ACTUALIZACION` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`ID`, `TIPO_DOCUMENTO`, `NUMERO_DOCUMENTO`, `PRIMER_NOMBRE`, `SEGUNDO_NOMBRE`, `PRIMER_APELLIDO`, `SEGUNDO_APELLIDO`, `FECHA_NACIMIENTO`, `CORREO_ELECTRONICO`, `AVATAR`, `FECHA_CREACION`, `FECHA_ACTUALIZACION`) VALUES
(1, 1, '0987264542', 'SEBASTIAN', 'JOHAN', 'GOMEZ', 'DUSSAN', '1986-09-13', 'nassud@gmail.com', '', '2019-11-05 00:00:00', '0000-00-00 00:00:00'),
(2, 1, '123456789', 'FULANITO', 'NN', 'NIEVES', 'HUERFANO', '2019-11-05', 'fulanito@fulanos.net', '', '2019-11-05 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
