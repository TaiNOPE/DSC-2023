-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07-Nov-2023 às 05:31
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca_dsc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `author` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `isVisible` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `isVisible`) VALUES
(57, 'wgygd', 'ysd', 0),
(56, 'sdwertgwerg', '4ghegb', 0),
(55, 'sdwertgwerg', '4ghegb', 0),
(54, 'sdwertgwerg', '4ghegb', 0),
(53, 'sdwertgwerg', '4ghegb', 0),
(52, 'sdwertgwerg', '4ghegb', 0),
(51, 'sdwertgwerg', '4ghegb', 1),
(50, 'sdwertgwerg', '4ghegb', 1),
(49, 'sdwertgwerg', '4ghegb', 0),
(48, 'sdwertgwerg', '4ghegb', 0),
(47, 'sdwertgwerg', '4ghegb', 0),
(46, 'sdwertgwerg', '4ghegb', 1),
(45, 'sdwertgwerg', '4ghegb', 1),
(44, 'sdwertgwerg', '4ghegb', 1),
(43, 'sdwertgwerg', '4ghegb', 0),
(40, 'sdwertgwerg', '4ghegb', 1),
(41, 'sdwertgwerg', '4ghegb', 1),
(42, 'sdwertgwerg', '4ghegb', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `book_loans`
--

DROP TABLE IF EXISTS `book_loans`;
CREATE TABLE IF NOT EXISTS `book_loans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_bibliotecario` int NOT NULL,
  `id_leitor` int NOT NULL,
  `id_livro` int NOT NULL,
  `data_emprestimo` date NOT NULL,
  `data_devolucao` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_bibliotecario` (`id_bibliotecario`),
  KEY `id_leitor` (`id_leitor`),
  KEY `id_livro` (`id_livro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `book_loan_renewals`
--

DROP TABLE IF EXISTS `book_loan_renewals`;
CREATE TABLE IF NOT EXISTS `book_loan_renewals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_emprestimo` int NOT NULL,
  `data_renovacao` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_emprestimo` (`id_emprestimo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) NOT NULL,
  `login` varchar(32) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nivel_acesso` int NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
