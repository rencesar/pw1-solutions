DROP DATABASE IF EXISTS user;
CREATE DATABASE user;
USE user;

DROP TABLE IF EXISTS `info`;
CREATE TABLE `info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `idade` varchar(5)  NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `info`
  (`name`, `idade`,`password`)
VALUES
  ('Karol', '20','123');

INSERT INTO `info`
  (`name`, `idade`,`password`)
VALUES
  ('Henrique', '11','1234');

