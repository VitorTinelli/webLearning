-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 30/03/2023 às 20h59min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `revenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelos`
--

CREATE TABLE IF NOT EXISTS `modelos` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `codmarca` int(5) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codmarca` (`codmarca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modelos`
--

INSERT INTO `modelos` (`codigo`, `nome`, `codmarca`) VALUES
(1, 'Saveiro', 2),
(2, 'XC60', 1),
(3, 'Spin', 2);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `modelos_ibfk_1` FOREIGN KEY (`codmarca`) REFERENCES `marcas` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
