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
-- Estrutura da tabela `automoveis`
--

CREATE TABLE IF NOT EXISTS `automoveis` (
  `codigo` int(5) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `codmodelo` int(5) NOT NULL,
  `codcategoria` int(5) NOT NULL,
  `ano` int(4) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `localizacao` varchar(50) NOT NULL,
  `combustivel` varchar(50) NOT NULL,
  `opcionais` varchar(50) NOT NULL,
  `valor` float(10,2) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  `foto3` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codmodelo` (`codmodelo`),
  KEY `codcategoria` (`codcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `automoveis`
--

INSERT INTO `automoveis` (`codigo`, `descricao`, `codmodelo`, `codcategoria`, `ano`, `cor`, `placa`, `localizacao`, `combustivel`, `opcionais`, `valor`, `foto1`, `foto2`, `foto3`) VALUES
(1, 'Carro novo', 2, 2, 2021, 'Preto', 'ASCM234', 'Ararangua', 'Gasolina', 'Ar condicionado', 350000.00, 'fotos/1a82e0b0ee967d8331bbb37d58a17fab.jpeg', 'fotos/16a491142118afb94898e7ee34a2a9a7.jpeg', 'fotos/926654c0988e8f8a82ea4de5532f5f29.jpeg'),
(2, 'Usado', 1, 3, 2017, 'Preto', 'ABZD914', 'Criciuma', 'Gasolina', 'Limpador de vidro', 600000.00, 'fotos/0da1a3195bc2f44d7bee5029255a5b04.jpg', 'fotos/c2a9055640849ac0606c5f95e78e4192.jpg', 'fotos/9fa7dea9fa7fb17f3e4b1054672d8545.jpg'),
(3, 'Carro bom', 3, 4, 2013, 'Branca', 'ASCA234', 'Criciuma', 'Diesel', 'Caixas de som ', 342000.00, 'fotos/e8d5bdf9098914a7db95344b9c1341de.jpg', 'fotos/7c74cf4dbb7324d8194d9d6833d8481b.jpg', 'fotos/5e073a39ded704abfb34f2020d5131a6.jpg'),
(4, 'Esportivo confia', 1, 1, 1976, 'Prata', 'ABCD985', 'Morro da Fumaca', 'Diesel', 'Pneu furado', 100000.00, 'fotos/95cca61fb961349f15f1624eeca106be.jpg', 'fotos/bd4ce84ce303ac5cb5983ef7732fdd62.jpg', 'fotos/62dcbaddc94f53746110976e9af08bea.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`codigo`, `nome`) VALUES
(1, 'Sedan'),
(2, 'SUV'),
(3, 'Importados'),
(4, 'Esportivos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`codigo`, `nome`) VALUES
(1, 'Volvo '),
(2, 'Chevrolet');

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
-- Restrições para a tabela `automoveis`
--
ALTER TABLE `automoveis`
  ADD CONSTRAINT `automoveis_ibfk_1` FOREIGN KEY (`codmodelo`) REFERENCES `modelos` (`codigo`),
  ADD CONSTRAINT `automoveis_ibfk_2` FOREIGN KEY (`codcategoria`) REFERENCES `categorias` (`codigo`);

--
-- Restrições para a tabela `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `modelos_ibfk_1` FOREIGN KEY (`codmarca`) REFERENCES `marcas` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
