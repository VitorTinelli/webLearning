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
-- Estrutura da tabela `pufe`
--

CREATE TABLE IF NOT EXISTS `pufe` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `medida` varchar(30) NOT NULL,
  `peso` varchar(30) NOT NULL,
  `estrutura` varchar(30) NOT NULL,
  `espuma` varchar(30) NOT NULL,
  `tecido` varchar(30) NOT NULL,
  `cor` varchar(30) NOT NULL,
  `foto1` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `pufe`
--

INSERT INTO `pufe` (`codigo`, `nome`, `descricao`, `preco`, `medida`, `peso`, `estrutura`, `espuma`, `tecido`, `cor`, `foto1`) VALUES
(1, 'Baú Casal Pé de Cama Capitonê ', 'lém de moderno, o baú é super espaçoso, proporcionando mais opções de organização para seu quarto, i', 599.9, ' 1.40m x 43cm x 40cm ', '16 kg', 'Madeira Pinnus Elliotti', 'D-23', 'Suede', 'Marrom', 'fotos/27e09aebc3828efc63a7c44653feddb4.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
