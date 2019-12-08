DROP TABLE IF EXISTS Pokemon_Trainer;
DROP TABLE IF EXISTS Trainer;
DROP TABLE IF EXISTS Pokemon;

-- CREATE TYPE gen AS ENUM ('F', 'M');

CREATE TABLE Trainer (
  	id_trainer   SERIAL PRIMARY KEY,
  	name         varchar(100) NOT NULL,
  	gender       gen NOT NULL,
  	email        varchar(100) NOT NULL,
	password     varchar(100) NOT NULL
);


-- usar insert_poke.php para povoar Pokemon, em App/Db/Pokemon
CREATE TABLE Pokemon (
  	id_pokemon  int PRIMARY KEY,
  	name        varchar(100) NOT NULL,
	hp 			int NOT NULL,
	ataque		int NOT NULL,
	defesa		int NOT NULL,
	spAtaque	int NOT NULL,
	spDefesa	int NOT NULL,
	velocidade	int NOT NULL,
  	min_img     bytea,
	max_img     bytea,
	gray_img    bytea
);

CREATE TABLE Pokemon_Trainer (
	id_trainer int REFERENCES Trainer (id_trainer) ON UPDATE CASCADE ON DELETE CASCADE,
  	id_pokemon int REFERENCES Pokemon (id_pokemon) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT Pokemon_Trainer_pkey PRIMARY KEY (id_trainer, id_pokemon)
);

