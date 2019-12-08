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

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `users`
  (`name`, `password`)
VALUES
  ('mauricio', '$2y$10$mi1WF5tk5aorEacvdQ/10ey2N2i8LK5vITBqJSkwTd2PmK.D5w8C6'),
  ('rafael', '$2y$10$DZ9/u5folHyhyUVryhH1mOD6itGQxoon.YvHAMQH8j8t//b8TtTZ6');
