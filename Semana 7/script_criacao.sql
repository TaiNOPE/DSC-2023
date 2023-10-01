DROP DATABASE biblioteca;
CREATE DATABASE biblioteca;
USE biblioteca;


CREATE TABLE administrador(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR(300) NOT NULL, 
    login VARCHAR(32) NOT NULL, 
    senha VARCHAR(256) NOT NULL, 
    nivel_acesso INT NOT NULL DEFAULT -1)
;


CREATE TABLE bibliotecario(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR(300) NOT NULL, 
    login VARCHAR(32) NOT NULL, 
    senha VARCHAR(256) NOT NULL, 
    cpf VARCHAR(11) NOT NULL, 
    nivel_acesso INT NOT NULL DEFAULT -1)
;


CREATE TABLE usuario(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR(300) NOT NULL, 
    login VARCHAR(32) NOT NULL, 
    senha VARCHAR(256) NOT NULL, 
    cpf VARCHAR(11) NOT NULL, 
    endereco VARCHAR(512) NOT NULL, 
    nivel_acesso INT NOT NULL DEFAULT -1)
;


CREATE TABLE editora(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR(400)
);


CREATE TABLE livro(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    id_editora INT, titulo VARCHAR(300), 
    autor VARCHAR(512), 
    data_publicacao DATE, 
    volume INT(30), 
    edicao INT(30), 
    quant_paginas INT(30), 
    categorias VARCHAR(30), 
    serie INT(30), 
    colecao VARCHAR(30), 
    numero_colecao INT(30), 
    isbn VARCHAR(30), 
    cdd VARCHAR(30), 
    cdu VARCHAR(30), 
    FOREIGN KEY (id_editora) REFERENCES editora(id)
);


CREATE TABLE emprestimo(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    id_bibliotecario INT NOT NULL, 
    id_leitor INT NOT NULL, 
    id_livro INT NOT NULL, 
    data_emprestimo DATE NOT NULL, 
    data_devolucao DATE NOT NULL, 
    FOREIGN KEY (id_bibliotecario) REFERENCES usuario(id), 
    FOREIGN KEY (id_leitor) REFERENCES usuario(id), 
    FOREIGN KEY (id_livro) REFERENCES livro(id)
);


CREATE TABLE renovacao(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    id_emprestimo INT NOT NULL, 
    data_renovacao DATE NOT NULL, 
    FOREIGN KEY (id_emprestimo) REFERENCES emprestimo(id)
);


CREATE TABLE notificao(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    id_leitor INT NOT NULL, 
    conteudo VARCHAR(2048) DEFAULT "Mensagem não definida", 
    FOREIGN KEY (id_leitor) REFERENCES usuario(id)
);


CREATE TABLE ticket_suporte(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    id_leitor INT NOT NULL, 
    data_criacao DATE NOT NULL, 
    id_bibliotecario int, 
    resolvido boolean DEFAULT 0, 
    FOREIGN KEY (id_leitor) REFERENCES usuario(id), 
    FOREIGN KEY (id_bibliotecario) REFERENCES bibliotecario(id)
);


CREATE TABLE comprovante_renovacao(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    id_leitor INT NOT NULL, 
    id_emprestimo INT NOT NULL, 
    data_renovacao DATE NOT NULL, 
    FOREIGN KEY (id_leitor) REFERENCES usuario(id), 
    FOREIGN KEY (id_emprestimo) REFERENCES emprestimo(id)
)