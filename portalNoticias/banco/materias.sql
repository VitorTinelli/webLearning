-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 05/04/2023 às 19h51min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `portal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `codigo` int(5) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `codregiao` int(5) NOT NULL,
  `codcat` int(5) NOT NULL,
  `codcolunista` int(5) NOT NULL,
  `chamada` varchar(100) NOT NULL,
  `resumo` varchar(100) NOT NULL,
  `materia` longtext NOT NULL,
  `fotochamada` varchar(100) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codregiao` (`codregiao`),
  KEY `codcat` (`codcat`),
  KEY `codcolunista` (`codcolunista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_3` FOREIGN KEY (`codcolunista`) REFERENCES `colunistas` (`codigo`),
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`codregiao`) REFERENCES `regiao` (`codigo`),
  ADD CONSTRAINT `materias_ibfk_2` FOREIGN KEY (`codcat`) REFERENCES `categorias` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
