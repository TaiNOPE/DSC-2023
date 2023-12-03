DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(1024) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`)
);

INSERT INTO `admins` (`id`, `cpf`, `name`, `birth_date`, `address`, `phone`, `email`, `password`, `active`) VALUES
(3, '0000', 'Fulano de Tal', '2023-12-12', 'dsfbiydsfbyibsi', '40028922', 'sudnfdsuf@mfdsi.com', '0000', 1);

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `author` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `year` smallint UNSIGNED DEFAULT NULL,
  `volume` smallint UNSIGNED DEFAULT NULL,
  `edition` smallint UNSIGNED DEFAULT NULL,
  `series` varchar(1024) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `collection` varchar(1024) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `collection_number` smallint UNSIGNED DEFAULT NULL,
  `isbn` int UNSIGNED DEFAULT NULL,
  `isVisible` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
);

INSERT INTO `books` (`id`, `title`, `author`, `year`, `volume`, `edition`, `series`, `collection`, `collection_number`, `isbn`, `isVisible`) VALUES
(1, 'teste 1', 'teste autor', 2005, 12, 1, 'teste serie', 'colecao teste', 4, 999181, 1),
(2, 'livro n sei', 'teste autor', 2019, 1, 1, 'teste', 'teste colecao', 90, 99118822, 1),
(3, 'tetse 2', 'teste autor', 2019, 1, 1, 'teste', 'teste colecao', 90, 99118822, 1),
(6, 'asdasd', 'asdasdas', 0, 0, 0, '', '', 0, 12344, 1),
(7, 'teste n sei oq ', 'dddddddd', 0, 0, 0, '', '', 0, 12344, 1),
(8, 'asdasd', 'asdasdas', 0, 0, 0, '', '', 0, 12344, 1),
(9, 'asdasd', 'asdasdas', 0, 0, 0, '', '', 0, 12344, 1),
(10, 'asdasd', 'asdasdas', 0, 0, 0, '', '', 0, 12344, 1),
(15, '', '', 0, 0, 0, '', '', 0, 0, 1),
(16, '', '', 0, 0, 0, '', '', 0, 0, 1);

DROP TABLE IF EXISTS `book_loans`;
CREATE TABLE IF NOT EXISTS `book_loans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `librarian_id` int NOT NULL,
  `reader_id` int NOT NULL,
  `book_id` int NOT NULL,
  `loan_date` date NOT NULL,
  `return_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_bibliotecario` (`librarian_id`),
  KEY `id_leitor` (`reader_id`),
  KEY `id_livro` (`book_id`)
);

DROP TABLE IF EXISTS `book_loan_renewals`;
CREATE TABLE IF NOT EXISTS `book_loan_renewals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_emprestimo` int NOT NULL,
  `data_renovacao` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_emprestimo` (`id_emprestimo`)
);

DROP TABLE IF EXISTS `librarians`;
CREATE TABLE IF NOT EXISTS `librarians` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(1024) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`)
);

INSERT INTO `librarians` (`id`, `cpf`, `name`, `birth_date`, `address`, `phone`, `email`, `password`, `active`) VALUES
(3, '1111', 'N sei', '1912-12-11', 'fdbfdfdg', '2342342', 'dwsfwwgwer@fdsf.com', '0000', 1);

DROP TABLE IF EXISTS `readers`;
CREATE TABLE IF NOT EXISTS `readers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(1024) COLLATE utf8mb4_general_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(1024) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(512) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(512) COLLATE utf8mb4_general_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`)
);

INSERT INTO `readers` (`id`, `cpf`, `name`, `birth_date`, `address`, `phone`, `email`, `password`, `active`) VALUES
(3, '3333', 'aaaaaaaaa', '2023-12-13', 'egwesdfvwsfwe', '789789789', 'koitrnmghb@pgej.fmigfdb', '0000', 1),
(4, '', '', '0000-00-00', '', '', '', '', 1),
(5, '123123', 'teste', '2023-12-06', '123123', '123123', '123123', '1', 1),
(7, 'tyjtyuy', 'teste', '2023-12-06', '', '1', '', '1', 1);
COMMIT;