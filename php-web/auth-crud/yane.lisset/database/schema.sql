
CREATE TABLE `songs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `music` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `users` (
    `id` int NOT NULL AUTO_INCREMENT,
    `username` varchar(100) NOT NULL,
    `password` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
);

INSERT INTO `songs`
  (`name`, `music`)
VALUES
  ('balthazar', 'listen up');

INSERT INTO `songs`
  (`name`, `music`)
VALUES
  ('the marias', 'ruthless');

INSERT INTO `songs`
  (`name`, `music`)
VALUES
  ('mgmt', 'time to pretend');

INSERT INTO `songs`
  (`name`, `music`)
VALUES
  ('rem', 'uberlin');

INSERT INTO `users`
  (`username`, `password`)
VALUES
  ('adm', 'adm');


