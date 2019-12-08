CREATE DATABASE academico;
USE academico;

CREATE TABLE aluno (
	  id int NOT NULL AUTO_INCREMENT,
	  nome varchar(100) NOT NULL,
	  email varchar(100) NOT NULL,
	  senha varchar(100) NOT NULL,
	  PRIMARY KEY (id)
	);

INSERT INTO aluno
  (nome, email, senha)
VALUES
  ('Gabriel', 'estudante1@academico.ifpb.edu.br', '123'),
  ('Maria', 'estudante2@academico.ifpb.edu.br', '123');

DROP DATABASE academico;