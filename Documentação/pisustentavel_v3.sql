-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2018 at 01:26 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pisustentavel`
--

-- --------------------------------------------------------

--
-- Table structure for table `acesso`
--

CREATE TABLE `acesso` (
  `id_usu` int(11) NOT NULL,
  `nm_usu` varchar(50) COLLATE utf8_bin NOT NULL,
  `login_usu` varchar(20) COLLATE utf8_bin NOT NULL,
  `senha_usu` varchar(12) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cad_empresas`
--

CREATE TABLE `cad_empresas` (
  `id_empresa` int(11) NOT NULL,
  `nm_empresa` varchar(50) COLLATE utf8_bin NOT NULL,
  `tp_residuo_empresa` int(11) NOT NULL,
  `segm_residuo` int(11) NOT NULL,
  `tel_empresa` varchar(14) COLLATE utf8_bin NOT NULL,
  `email_empresa` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cad_empresas`
--

INSERT INTO `cad_empresas` (`id_empresa`, `nm_empresa`, `tp_residuo_empresa`, `segm_residuo`, `tel_empresa`, `email_empresa`) VALUES
(1, 'Recilean', 10, 1, '00-1111-5555', 'recilean_teste_@gmail.com'),
(2, 'Reciglass', 5, 1, '22-9999-3333', 'reciglas_teste21@gmail.com'),
(3, 'Coleta Hospitalar', 2, 2, '22-8888-7777', 'coeltahospitalar_teste321@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `consumo_agua`
--

CREATE TABLE `consumo_agua` (
  `id_agua` int(11) NOT NULL,
  `nm_empresa_agua` varchar(20) COLLATE utf8_bin NOT NULL,
  `data_leitura` date NOT NULL,
  `m3_agua` decimal(10,2) NOT NULL,
  `vl_agua` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `consumo_agua`
--

INSERT INTO `consumo_agua` (`id_agua`, `nm_empresa_agua`, `data_leitura`, `m3_agua`, `vl_agua`) VALUES
(1, 'DMAE', '2018-07-01', '300.20', '30.02'),
(2, 'DMAE', '2018-08-01', '320.40', '32.04'),
(3, 'DMAE', '2018-09-01', '380.90', '38.09');

-- --------------------------------------------------------

--
-- Table structure for table `consumo_energia`
--

CREATE TABLE `consumo_energia` (
  `id_energia` int(11) NOT NULL,
  `nm_empresa_energia` varchar(25) COLLATE utf8_bin NOT NULL,
  `data_leitura` date NOT NULL,
  `kw_h` decimal(10,2) NOT NULL,
  `vl_energia` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `controle_residuos`
--

CREATE TABLE `controle_residuos` (
  `id_controle` int(11) NOT NULL,
  `nm_residuo` varchar(25) COLLATE utf8_bin NOT NULL,
  `tp_residuo` int(11) NOT NULL,
  `residuo_perigoso` varchar(5) COLLATE utf8_bin NOT NULL,
  `peso_residuo` decimal(10,2) NOT NULL,
  `data_pesagem` date NOT NULL,
  `destino_residuo` varchar(20) COLLATE utf8_bin NOT NULL,
  `residuo_reciclavel` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `controle_residuos`
--

INSERT INTO `controle_residuos` (`id_controle`, `nm_residuo`, `tp_residuo`, `residuo_perigoso`, `peso_residuo`, `data_pesagem`, `destino_residuo`, `residuo_reciclavel`) VALUES
(1, 'Oleo', 10, 'nao', '100.50', '2018-09-05', 'Doacao', 'sim'),
(2, 'Oleo', 10, 'nao', '250.60', '2018-09-06', 'Doacao', 'sim'),
(3, 'Seringa', 2, 'sim', '50.80', '2018-09-05', 'Lixo Hospitalar', 'nao'),
(4, 'Seringa', 2, 'sim', '60.70', '2018-09-06', 'Lixo Hospitalar', 'nao'),
(5, 'Garrafa', 5, 'nao', '8.60', '2018-09-26', 'Reciclagem', 'sim');

-- --------------------------------------------------------

--
-- Table structure for table `segm_residuos`
--

CREATE TABLE `segm_residuos` (
  `id_segm` int(11) NOT NULL,
  `nm_segm` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `segm_residuos`
--

INSERT INTO `segm_residuos` (`id_segm`, `nm_segm`) VALUES
(1, 'Reciclagem'),
(2, 'Lixo Hospitalar'),
(3, 'Lixo Comum');

-- --------------------------------------------------------

--
-- Table structure for table `tp_residuos`
--

CREATE TABLE `tp_residuos` (
  `id_residuo` int(11) NOT NULL,
  `desc_residuo` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tp_residuos`
--

INSERT INTO `tp_residuos` (`id_residuo`, `desc_residuo`) VALUES
(1, 'Organico'),
(2, 'Biologico'),
(3, 'Papel'),
(4, 'Metal'),
(5, 'Vidro'),
(6, 'Plastico'),
(7, 'Quimico'),
(8, 'Radioativo'),
(9, 'Pilha'),
(10, 'Oleo vegetal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`id_usu`);

--
-- Indexes for table `cad_empresas`
--
ALTER TABLE `cad_empresas`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `tp_residuo_empresa` (`tp_residuo_empresa`),
  ADD KEY `segm_residuo` (`segm_residuo`);

--
-- Indexes for table `consumo_agua`
--
ALTER TABLE `consumo_agua`
  ADD PRIMARY KEY (`id_agua`);

--
-- Indexes for table `consumo_energia`
--
ALTER TABLE `consumo_energia`
  ADD PRIMARY KEY (`id_energia`);

--
-- Indexes for table `controle_residuos`
--
ALTER TABLE `controle_residuos`
  ADD PRIMARY KEY (`id_controle`),
  ADD KEY `tp_residuo` (`tp_residuo`);

--
-- Indexes for table `segm_residuos`
--
ALTER TABLE `segm_residuos`
  ADD PRIMARY KEY (`id_segm`);

--
-- Indexes for table `tp_residuos`
--
ALTER TABLE `tp_residuos`
  ADD PRIMARY KEY (`id_residuo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acesso`
--
ALTER TABLE `acesso`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cad_empresas`
--
ALTER TABLE `cad_empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `consumo_agua`
--
ALTER TABLE `consumo_agua`
  MODIFY `id_agua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `consumo_energia`
--
ALTER TABLE `consumo_energia`
  MODIFY `id_energia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `controle_residuos`
--
ALTER TABLE `controle_residuos`
  MODIFY `id_controle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `segm_residuos`
--
ALTER TABLE `segm_residuos`
  MODIFY `id_segm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tp_residuos`
--
ALTER TABLE `tp_residuos`
  MODIFY `id_residuo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cad_empresas`
--
ALTER TABLE `cad_empresas`
  ADD CONSTRAINT `cad_empresas_ibfk_1` FOREIGN KEY (`tp_residuo_empresa`) REFERENCES `tp_residuos` (`id_residuo`),
  ADD CONSTRAINT `cad_empresas_ibfk_2` FOREIGN KEY (`tp_residuo_empresa`) REFERENCES `tp_residuos` (`id_residuo`),
  ADD CONSTRAINT `cad_empresas_ibfk_3` FOREIGN KEY (`segm_residuo`) REFERENCES `segm_residuos` (`id_segm`);

--
-- Constraints for table `controle_residuos`
--
ALTER TABLE `controle_residuos`
  ADD CONSTRAINT `controle_residuos_ibfk_1` FOREIGN KEY (`tp_residuo`) REFERENCES `tp_residuos` (`id_residuo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
