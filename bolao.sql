-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Dez-2015 às 16:07
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bolao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aposta`
--

CREATE TABLE IF NOT EXISTS `aposta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_confronto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `placar_casa` int(11) NOT NULL,
  `placar_visitante` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_confronto` (`id_confronto`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `confronto`
--

CREATE TABLE IF NOT EXISTS `confronto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `id_time_casa` int(11) NOT NULL,
  `id_time_visitante` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `placar_casa` int(11) DEFAULT NULL,
  `placar_visitante` int(11) DEFAULT NULL,
  `vencedor` int(11) DEFAULT NULL,
  `empate` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_grupo` (`id_grupo`),
  KEY `id_time_casa` (`id_time_casa`),
  KEY `id_time_visitante` (`id_time_visitante`),
  KEY `vencedor` (`vencedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Extraindo dados da tabela `confronto`
--

INSERT INTO `confronto` (`id`, `id_grupo`, `id_time_casa`, `id_time_visitante`, `data`, `placar_casa`, `placar_visitante`, `vencedor`, `empate`) VALUES
(53, 11, 44, 43, '2016-01-30 18:00:00', NULL, NULL, 35, 0),
(54, 12, 41, 35, '2015-01-31 16:00:00', NULL, NULL, 35, 0),
(55, 12, 39, 36, '2016-02-01 20:30:00', NULL, NULL, 35, 0),
(56, 11, 40, 38, '2016-02-01 20:30:00', NULL, NULL, 35, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id`, `nome`) VALUES
(11, 'A1'),
(12, 'A2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_time`
--

CREATE TABLE IF NOT EXISTS `grupo_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `id_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_grupo` (`id_grupo`),
  KEY `id_time` (`id_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Extraindo dados da tabela `grupo_time`
--

INSERT INTO `grupo_time` (`id`, `id_grupo`, `id_time`) VALUES
(43, 11, 37),
(44, 11, 40),
(45, 11, 38),
(46, 11, 43),
(47, 11, 44),
(48, 12, 35),
(49, 12, 36),
(50, 12, 39),
(51, 12, 41),
(52, 12, 42);

-- --------------------------------------------------------

--
-- Estrutura da tabela `poke`
--

CREATE TABLE IF NOT EXISTS `poke` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `pego` tinyint(1) NOT NULL,
  `onde` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Extraindo dados da tabela `poke`
--

INSERT INTO `poke` (`id`, `nome`, `foto`, `numero`, `pego`, `onde`) VALUES
(1, 'Starly', '396.png', 396, 0, 'filho do Staravia'),
(2, 'Staraptor', '398.png', 398, 0, 'Evoluir Staravia 34'),
(3, 'Kricketot', '401.png', 401, 0, 'Transferir'),
(4, 'Kricketune', '402.png', 402, 0, 'Transferir ou evolui o Kricketot 10'),
(5, 'Shinx', '403.png', 403, 0, 'Breed Luxio'),
(6, 'Luxio', '404.png', 404, 0, 'Friend Safari'),
(7, 'Luxray', '405.png', 405, 0, 'Evolve Luxio 30'),
(8, 'Budew', '406.png', 406, 0, 'Route 4'),
(9, 'Roserade', '407.png', 407, 0, 'Evolve Roselia Shiny Stone'),
(10, 'Cranidos', '408.png', 408, 0, 'Revive Skull Fossil'),
(11, 'Rampardos', '409.png', 409, 0, 'Evolve Cranidos'),
(12, 'Shieldon', '410.png', 410, 0, 'Revive Armor Fossil'),
(13, 'Bastiodon', '411.png', 411, 0, 'Evolve Shieldon 30'),
(14, 'Wormadam', '413.png', 413, 0, 'Evolve Burmy Femea 20'),
(15, 'Mothim', '414.png', 414, 0, 'Evolve Burmy Macho 20'),
(16, 'Combee', '415.png', 415, 0, 'Route 4 Friend Safari'),
(17, 'Vespiquen', '416.png', 416, 0, 'Evolve Combee Femea 21'),
(18, 'Buizel', '418.png', 418, 0, 'Breed Floatzel'),
(19, 'Cherubi', '420.png', 420, 0, 'Transfer required'),
(20, 'Cherrim', '421.png', 421, 0, 'Transfer required'),
(21, 'Shellos', '422.png', 422, 0, 'Breed Gastrodon'),
(22, 'Gastrodon', '423.png', 423, 0, 'Friend Safari'),
(23, 'Ambipom', '424.png', 424, 0, 'Evolve Aipom att Double Hit'),
(24, 'Drifblim', '426.png', 426, 0, 'Evolve Drifloon 28 Friend Safari'),
(25, 'Buneary', '427.png', 427, 0, 'Transfer required'),
(26, 'Lopunny', '428.png', 428, 0, 'Transfer required'),
(27, 'Mismagius', '429.png', 429, 0, 'Transfer required ou  Dusk Stone'),
(28, 'Honchkrow', '430.png', 430, 0, 'Evolve Murkrow Dusk Stone'),
(29, 'Glameow', '431.png', 431, 0, 'Transfer required'),
(30, 'Purugly', '432.png', 432, 0, 'Envolve Glameow 38'),
(31, 'Chingling', '433.png', 433, 0, 'Route 11, Reflection Cave'),
(32, 'Skuntank', '435.png', 435, 0, 'Evolve Stunky 34'),
(33, 'Bronzor', '436.png', 436, 0, 'Breed Bronzor'),
(34, 'Bronzong', '437.png', 437, 0, 'Friend Safari'),
(35, 'Bonsly', '438.png', 438, 0, 'Breed Sudowoodo com Rock Incense'),
(36, 'Mime Jr.', '439.png', 439, 0, 'Reflection Cave breed Mr Mine com Odd Incense'),
(37, 'Happiny', '440.png', 440, 0, 'Breed Chansey Com Luck Incense'),
(38, 'Spiritomb', '442.png', 442, 0, 'Friend Safari'),
(39, 'Garchomp', '445.png', 445, 0, 'Evolve Gabite 48'),
(40, 'Munchlax', '446.png', 446, 0, 'Breed Snorlax Full Incesne'),
(41, 'Hippowdon', '450.png', 450, 0, 'Evolve Hippopotas 34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontos`
--

CREATE TABLE IF NOT EXISTS `pontos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(11) NOT NULL,
  `pontos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `pontos`
--

INSERT INTO `pontos` (`id`, `tipo`, `pontos`) VALUES
(1, 'exato', 3),
(2, 'vitoria', 2),
(3, 'exato8', 5),
(4, 'vitoria8', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rank`
--

CREATE TABLE IF NOT EXISTS `rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `id_aposta` int(11) NOT NULL,
  `id_ponto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_aposta` (`id_aposta`),
  KEY `id_ponto` (`id_ponto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `escudo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Extraindo dados da tabela `time`
--

INSERT INTO `time` (`id`, `nome`, `escudo`) VALUES
(35, 'Águia de Marabá', 'aguia_maraba.png'),
(36, 'Cametá', 'cameta30.png'),
(37, 'Independente', 'independente_de_tucurui30.png'),
(38, 'Paragominas', 'paragominas-30.png'),
(39, 'Parauapebas', 'Pareupebas_30.png'),
(40, 'Paysandu', 'paysandu_30x30.png'),
(41, 'Remo', 'REmo-30.png'),
(42, 'São Francisco', 'SaoFrancisco_30_1.png'),
(43, 'São Raimundo', 'saoraimundo_30.png'),
(44, 'Tapajós', 'Tapajos-30.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_inquilino2_idx` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Diego', 'UbTsosYG5ASD31p6NRGcJg8_b1toetJm', '$2y$13$RSGLaCKSfOovLClIGwqF4eeyWAX.XfjJx8DbmBH5sgNECGbvQvBk6', NULL, 'dieos2@gmail.com', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'emmelycosta', 'DMqkZIbpxnQobOcAl980n7Gq4oQ2_yKJ', '$2y$13$wah3R7q3j6yYYxzf1HZm4eyb0giXQdyIQfjgoy1YWyelatlf0I.se', NULL, 'emmelymartins@gmail.com', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'guilhermemartins', '02MfqgQs4Ytw-V1aXbo3apgiJo7zOGCD', '$2y$13$WVfFVedkdYKScPJ72ly1EO1P6B8/AH57blwqeiaepmqimYQ6po2lK', NULL, 'guilherme@gmail.com', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'eunildeoliveira', 'kdoJkDBqd3fOos_zt4EG81dv0MrY3JTs', '$2y$13$0eXgOZ0xHrqCtyXb2E.ycOb0NCACbMGm4xq0DPga9IkYRNGoAvf0q', NULL, 'eunilde@gmail.com', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aposta`
--
ALTER TABLE `aposta`
  ADD CONSTRAINT `aposta_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `aposta_ibfk_1` FOREIGN KEY (`id_confronto`) REFERENCES `confronto` (`id`);

--
-- Limitadores para a tabela `confronto`
--
ALTER TABLE `confronto`
  ADD CONSTRAINT `confronto_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `confronto_ibfk_2` FOREIGN KEY (`id_time_casa`) REFERENCES `time` (`id`),
  ADD CONSTRAINT `confronto_ibfk_3` FOREIGN KEY (`id_time_visitante`) REFERENCES `time` (`id`),
  ADD CONSTRAINT `confronto_ibfk_4` FOREIGN KEY (`vencedor`) REFERENCES `time` (`id`);

--
-- Limitadores para a tabela `grupo_time`
--
ALTER TABLE `grupo_time`
  ADD CONSTRAINT `grupo_time_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `grupo_time_ibfk_2` FOREIGN KEY (`id_time`) REFERENCES `time` (`id`);

--
-- Limitadores para a tabela `rank`
--
ALTER TABLE `rank`
  ADD CONSTRAINT `rank_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `rank_ibfk_2` FOREIGN KEY (`id_aposta`) REFERENCES `aposta` (`id`),
  ADD CONSTRAINT `rank_ibfk_3` FOREIGN KEY (`id_ponto`) REFERENCES `pontos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
