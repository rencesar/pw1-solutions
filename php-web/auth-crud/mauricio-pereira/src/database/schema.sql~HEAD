DROP DATABASE IF EXISTS computer;
CREATE DATABASE computer;
USE computer;

DROP TABLE IF EXISTS `host`;
CREATE TABLE `host` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `host`
  (`name`, `address`)
VALUES
  ('www.google.com', '216.58.222.100');

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `users`
  (`name`, `password`)
VALUES
  ('mauricio', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');

INSERT INTO `users`
  (`name`, `password`)
VALUES
  ('rafael', '0689211a62ca8488b19cf30dedf9059089477c004924026bf7e1095f49a21b80');
