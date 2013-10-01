-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 01/10/2013 às 02h34min
-- Versão do Servidor: 5.5.32
-- Versão do PHP: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `desafio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `concursos`
--

CREATE TABLE IF NOT EXISTS `concursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `inicio` date NOT NULL,
  `fim` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `ordem` int(11) NOT NULL,
  `concurso_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `concurso_id` (`concurso_id`),
  KEY `photos_ibfk_4` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `polls`
--

CREATE TABLE IF NOT EXISTS `polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) NOT NULL,
  `concurso_id` int(11) NOT NULL,
  `ra_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ra_id` (`ra_id`),
  KEY `photo_id` (`photo_id`),
  KEY `concurso_id` (`concurso_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ras`
--

CREATE TABLE IF NOT EXISTS `ras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ra` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ra` (`ra`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `ras`
--

INSERT INTO `ras` (`id`, `ra`) VALUES
(1, 1268015);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `hash_change_password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `role`, `created`, `modified`, `hash_change_password`) VALUES
(1, 'admin', '75cdb06b1e10ec1b49dd54fdb75427639c58802b', 'admin@admin.com', '', 'admin', '2013-09-29 15:24:11', '2013-09-29 15:24:11', ''),
(2, 'lucas', '75cdb06b1e10ec1b49dd54fdb75427639c58802b', 'lucasvs@outlook.com', '', 'author', '2013-09-29 20:52:13', '2013-09-29 20:52:13', '');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `photos_ibfk_3` FOREIGN KEY (`concurso_id`) REFERENCES `concursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `polls_ibfk_3` FOREIGN KEY (`ra_id`) REFERENCES `ras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `polls_ibfk_1` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `polls_ibfk_2` FOREIGN KEY (`concurso_id`) REFERENCES `concursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
