CREATE TABLE `user` (
  `username` varchar(55) NOT NULL,
  `password` varchar(125) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
);

CREATE TABLE `product` (
  `name` varchar(55) NOT NULL,
  `qtd` int NOT NULL,
  `price` float,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
);
