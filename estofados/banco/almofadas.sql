-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 11/05/2023 às 22h26min
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
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `medida` varchar(20) NOT NULL,
  `conjunto` varchar(10) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `tecido` varchar(30) NOT NULL,
  `cor` varchar(30) NOT NULL,
  `enchimento` varchar(30) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `almofadas`
--

INSERT INTO `almofadas` (`codigo`, `nome`, `descricao`, `preco`, `medida`, `conjunto`, `modelo`, `tecido`, `cor`, `enchimento`, `foto1`) VALUES
(1, 'Almofada Lisa Verde Militar', 'Almofada decorativa na cor verde militar. Atenção apenas almofada avulsa', 99, '45cm x 45cm', 'Avulsa', 'Simples', 'Suede', 'Verde Militar', 'Fibra de silicone', 'fotos/cc2c5aebbf33a71f9906709271b1524c.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
