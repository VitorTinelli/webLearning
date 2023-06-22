-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 22/06/2023 às 20h14min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `industria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `cod` int(5) NOT NULL AUTO_INCREMENT,
  `datapedido` date NOT NULL,
  `codfunc` int(5) NOT NULL,
  `codcli` int(5) NOT NULL,
  `codprod` int(5) NOT NULL,
  `quantidade` int(5) NOT NULL,
  `preco` float(8,2) NOT NULL,
  PRIMARY KEY (`cod`),
  KEY `codcli` (`codcli`),
  KEY `codfunc` (`codfunc`),
  KEY `codprod` (`codprod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`cod`, `datapedido`, `codfunc`, `codcli`, `codprod`, `quantidade`, `preco`) VALUES
(1, '2023-05-15', 1, 1, 4, 5, 3.00),
(2, '2023-05-15', 2, 2, 2, 10, 30.00),
(3, '2023-05-16', 1, 1, 3, 10, 2.00),
(4, '2023-05-16', 2, 2, 5, 5, 3.00),
(6, '2023-06-07', 4, 3, 4, 30, 2.50);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`codfunc`) REFERENCES `funcionarios` (`cod`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`codprod`) REFERENCES `produtos` (`cod`),
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`codcli`) REFERENCES `clientes` (`cod`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
