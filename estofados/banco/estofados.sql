-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 04/05/2023 às 22h25min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `estofados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `almofadas`
--

CREATE TABLE IF NOT EXISTS `almofadas` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `medida` varchar(20) NOT NULL,
  `peso` varchar(20) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `tecido` varchar(30) NOT NULL,
  `cor` varchar(30) NOT NULL,
  `enchimento` varchar(30) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pufe`
--

CREATE TABLE IF NOT EXISTS `pufe` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `medida` varchar(30) NOT NULL,
  `peso` varchar(30) NOT NULL,
  `estrutura` varchar(30) NOT NULL,
  `espuma` varchar(30) NOT NULL,
  `tecido` varchar(30) NOT NULL,
  `cor` varchar(30) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sofas`
--

CREATE TABLE IF NOT EXISTS `sofas` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `medida` varchar(30) NOT NULL,
  `peso` varchar(30) NOT NULL,
  `estrutura` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `espuma` varchar(30) NOT NULL,
  `tecido` varchar(30) NOT NULL,
  `cor` varchar(30) NOT NULL,
  `foto1` varchar(30) NOT NULL,
  `foto2` varchar(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
