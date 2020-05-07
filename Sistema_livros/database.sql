create database sistemadelivros;
use sistemadelivros;

CREATE TABLE LIVROS(
    idlivro int NOT NULL AUTO_INCREMENT,
    titulo varchar(50) NOT NULL,
    autor varchar(50) NOT NULL,
    editora varchar(50) NOT NULL,
    quantidade_pagina int NOT NULL,
    descricao varchar(250) NOT NULL,
    ano int NOT NULL,
    PRIMARY KEY(idlivro)
);