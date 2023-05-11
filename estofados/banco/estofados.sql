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

-- --------------------------------------------------------

--
-- Estrutura da tabela `sofas`
--

CREATE TABLE IF NOT EXISTS `sofas` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
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
  `foto1` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `sofas`
--

INSERT INTO `sofas` (`codigo`, `nome`, `descricao`, `preco`, `medida`, `peso`, `estrutura`, `modelo`, `espuma`, `tecido`, `cor`, `foto1`) VALUES
(1, 'Sofá Fixo Linho Premium Orgânico', 'O sofá Orgânico tem todas as qualidades que você procura no móvel que é a estrela da sala de estar. ', 7000, '2,04m x 0,95m x 0,95m', '64,3kg', 'Eucalipto 100% tratado de refl', 'Premium', 'D-33', 'Linho', 'Cinza', 'fotos/8257fa61b6a6d59359e3095e8d62456d.png'),
(2, 'Sofá Fixo Linho Madison', 'Não é ótimo ter um cantinho aconchegante para esticar as pernas depois de um dia cansativo? Que tal ', 3699.9, '2,00m x 0,96m x 0,76m', '56kg', 'Eucalipto tratado com carinho', 'Madison', 'Espuma D-26', 'Linho', 'Grafite', 'fotos/db7585027939aeb5e18d0be4df185b3c.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
