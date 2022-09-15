-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Dez-2021 às 22:58
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estoque_veiculos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `controleunidades`
--

CREATE TABLE `controleunidades` (
  `placa` varchar(7) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(60) NOT NULL,
  `ano` year(4) NOT NULL,
  `cor` varchar(30) NOT NULL,
  `km` bigint(6) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `controleunidades`
--

INSERT INTO `controleunidades` (`placa`, `marca`, `modelo`, `ano`, `cor`, `km`, `status`) VALUES
('PQI65I4', 'TOYOTA', '4RUNNER', 2019, 'VERMELHA', 20000, 'V');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `controleunidades`
--
ALTER TABLE `controleunidades`
  ADD PRIMARY KEY (`placa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
