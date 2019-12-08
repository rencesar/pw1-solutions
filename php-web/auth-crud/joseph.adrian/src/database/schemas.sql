DROP DATABASE IF EXISTS authcrud;
CREATE DATABASE authcrud;
USE authcrud;

DROP TABLE IF EXISTS `gato`;
CREATE TABLE `gato` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `pelagem` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `gato`
  (`nome`, `pelagem`)
VALUES
  ('Any', 'Sólida');

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `usuarios`
  (`nome`, `senha`)
VALUES
  ('joseph@example.com', '12345'),
  ('adrian@example.com', '54321');