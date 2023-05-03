-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 03/05/2023 às 20h22min
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
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `materias`
--

INSERT INTO `materias` (`codigo`, `data`, `hora`, `codregiao`, `codcat`, `codcolunista`, `chamada`, `resumo`, `materia`, `fotochamada`, `foto1`, `foto2`) VALUES
(2, '2023-04-26', '16:45:00', 1, 2, 1, ' Flamengo: a trajetória no Campeonato Brasileiro 2023', 'Com um elenco estrelado e um técnico renomado, o Flamengo é um dos favoritos ao título e promete faz', 'O Flamengo é um dos times mais populares do Brasil, com uma torcida apaixonada e uma história repleta de glórias. Em 2023, o time rubro-negro entra em campo novamente em busca do título do Campeonato Brasileiro, a principal competição do futebol brasileiro.\r\n\r\nCom um elenco estrelado, o Flamengo tem grandes chances de levantar o troféu ao final da temporada. O time conta com jogadores de alto nível em todas as posições, como o goleiro Diego Alves, os zagueiros Diego Carlos e Éder Militão, os meias Everton Ribeiro e Gerson, e o atacante Gabigol, artilheiro do Brasileirão nas últimas duas temporadas.\r\n\r\nAlém disso, o Flamengo conta com um técnico renomado no comando. Renato Gaúcho, ex-jogador e ídolo do Grêmio, assumiu o comando técnico do Flamengo no início da temporada e já mostrou que tem um estilo de jogo ofensivo e envolvente, que tem agradado a torcida.\r\n\r\nO Flamengo vem se preparando intensamente para o Campeonato Brasileiro, disputando também outras competições como a Copa Libertadores e a Copa do Brasil. O time tem se mostrado forte e competitivo em todas as partidas, demonstrando que está pronto para enfrentar os principais adversários da competição.\r\n\r\nOs jogos do Flamengo costumam ser um espetáculo à parte, com um futebol vistoso e envolvente que atrai a atenção de todos os amantes do esporte. A torcida rubro-negra é conhecida por ser uma das mais apaixonadas e fiéis do país, sempre apoiando o time nas arquibancadas e nas redes sociais.\r\n\r\nO Campeonato Brasileiro 2023 promete ser uma das edições mais emocionantes dos últimos anos, com vários times de alto nível disputando o título. Mas o Flamengo está determinado a conquistar mais um troféu para sua vasta galeria de conquistas e, com o elenco e o técnico que possui, é um dos favoritos ao título.\r\n\r\nA torcida rubro-negra está confiante e animada para acompanhar mais uma grande campanha do Flamengo no Campeonato Brasileiro. E, com certeza, não faltarão emoções e grandes jogos ao longo da temporada.', 'fotos/d2448f73ceddc8ad6991ea1872552971.jpg', 'fotos/41c6345b6e3a6816e758bc199a32f247.jpg', 'fotos/069a18881c2427023b59f966642aa5fb.png'),
(3, '2023-04-27', '14:22:00', 2, 1, 3, 'A perspectiva de crescimento econômico da China para a década de 2020', 'As principais tendências atuais e os desafios que a economia chinesa enfrenta.', 'Nos últimos anos, a China tem se consolidado como uma potência econômica global. Desde a adoção de políticas de abertura econômica no final dos anos 1970, a economia chinesa tem crescido em um ritmo impressionante. De fato, desde 2010, a China tem sido a principal responsável pelo crescimento econômico global.\r\n\r\nMas como será o crescimento econômico da China na década de 2020? Para entender isso, é preciso analisar as tendências atuais e os desafios que a economia chinesa enfrenta.\r\n\r\nTendências atuais\r\n\r\nAtualmente, a China é a segunda maior economia do mundo, atrás apenas dos Estados Unidos. A economia chinesa tem crescido a uma taxa média de 6% ao ano na última década, um ritmo que é considerado saudável para um país com a dimensão e a complexidade da China.\r\n\r\nA pandemia de Covid-19 afetou a economia chinesa em 2020, mas a recuperação foi rápida e vigorosa. Em 2021, o crescimento econômico da China deve superar 8%, impulsionado principalmente pela demanda doméstica.\r\n\r\nDesafios\r\n\r\nApesar das perspectivas positivas para a economia chinesa, existem desafios importantes que podem afetar o crescimento no longo prazo.\r\n\r\nO envelhecimento da população é um desses desafios. A política de filho único, adotada na década de 1980, resultou em uma queda na taxa de natalidade na China. Como resultado, a população chinesa está envelhecendo rapidamente, o que pode afetar o crescimento econômico no longo prazo.\r\n\r\nOutro desafio é a tensão comercial com os Estados Unidos. A guerra comercial iniciada em 2018 afetou negativamente as exportações chinesas, mas a assinatura do acordo de fase 1 em janeiro de 2020 trouxe alívio temporário. No entanto, as tensões continuam, e a China precisa diversificar sua base de exportação para reduzir a dependência dos Estados Unidos.\r\n\r\nPor fim, a China também enfrenta desafios ambientais e sociais. A poluição do ar e da água é um problema grave em muitas cidades chinesas, e a desigualdade social também é uma preocupação crescente.\r\n\r\nPerspectivas para a década de 2020\r\n\r\nApesar dos desafios, as perspectivas para a economia chinesa na década de 2020 são positivas. O governo chinês tem adotado medidas para promover o crescimento econômico, incluindo o estímulo fiscal e a abertura de novos setores para investimentos estrangeiros.', 'fotos/424848c81799ee4d3f0108c660dcbf29.jpg', 'fotos/604874f9b73a5b471352f7fb25924b42.jpeg', 'fotos/d786c1dafac5e458cdb0d2aa05e1cd64.jpg'),
(5, '2023-04-20', '20:25:00', 3, 1, 2, 'Problemas Econômicos dos Estados Unidos: Dificuldades e Desafios em Meio à Pandemia', 'Os Estados Unidos, uma das maiores potências econômicas do mundo, têm enfrentado uma série de desafi', 'Os Estados Unidos têm uma das maiores e mais avançadas economias do mundo, mas isso não significa que não enfrentem problemas econômicos. Nos últimos anos, a economia americana tem enfrentado uma série de desafios que incluem desigualdade crescente, instabilidade financeira, mudanças tecnológicas e, mais recentemente, a pandemia de COVID-19.\r\n\r\nA pandemia de COVID-19 teve um impacto significativo na economia dos Estados Unidos. Milhões de pessoas perderam seus empregos e muitas empresas foram obrigadas a fechar as portas. O desemprego disparou e o país entrou em recessão. Para combater a recessão, o governo americano aprovou um pacote de estímulo de US $ 1,9 trilhão, que incluiu pagamentos diretos aos americanos, ajuda a empresas e fundos para acelerar a distribuição de vacinas.\r\n\r\nNo entanto, apesar desses esforços, a economia americana ainda enfrenta muitos desafios. A desigualdade econômica continua a crescer, com a riqueza cada vez mais concentrada nas mãos de uma pequena elite. Além disso, a mudança tecnológica está transformando a natureza do trabalho e ameaçando empregos em setores tradicionais, como varejo e manufatura.\r\n\r\nOutro problema é a dívida pública americana, que ultrapassou US $ 28 trilhões no início de 2021. Isso pode limitar a capacidade do governo americano de estimular a economia no futuro e aumentar a vulnerabilidade do país a choques econômicos externos.\r\n\r\nApesar desses desafios, os Estados Unidos ainda têm muitos pontos fortes em sua economia. A inovação tecnológica continua a impulsionar o crescimento em setores como tecnologia, energia renovável e cuidados de saúde. Além disso, o país tem uma forte infraestrutura e mão de obra altamente qualificada.\r\n\r\nEm resumo, os problemas econômicos dos Estados Unidos são complexos e desafiadores. A pandemia de COVID-19 só ampliou esses desafios, mas a economia americana ainda tem muitos pontos fortes. O governo e os líderes empresariais precisam trabalhar juntos para abordar esses desafios e garantir um futuro próspero para todos os americanos.', 'fotos/95a5d17b3ce7e67d3f6ee028f5ad61a0.jpg', 'fotos/adc2c265046e88dcbeeba4d4c3fde53c.jpg', 'fotos/ddfec6b62764c00257c7892390ab28ae.jpg');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`codregiao`) REFERENCES `regiao` (`codigo`),
  ADD CONSTRAINT `materias_ibfk_2` FOREIGN KEY (`codcat`) REFERENCES `categorias` (`codigo`),
  ADD CONSTRAINT `materias_ibfk_3` FOREIGN KEY (`codcolunista`) REFERENCES `colunistas` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
