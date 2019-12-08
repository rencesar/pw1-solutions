# Servidor Lamp (Docker)

## Estrutura de arquivos
---

```sh
$ tree .
├── Dockerfile
├── docker-compose.yml
└── src
    └── 

```

## Criando LAMP

---

```bash
$ docker-compose up -d
$ docker-compose ps
$ curl -i http://localhost:8080/
$ docker-compose down
```

## Checking PHP

---

```sh
$ docker-compose exec web bash
$ php -i
$ php -m
```

## Running PHP code (Interactive shell)

---

```
$ docker run -it --rm --name php -v "$PWD":/usr/src/app -w /usr/src/app php:alpine php
$ alias php= 'docker run -it --rm --name php -v "$PWD":/usr/src/app -w /usr/src/app php:alpine php'
$ php -a
Interactive shell

php > $x = 10;
php > echo $x;
10
php > exit
```

## Connecting to Mysql

---

```
$ docker-compose exec mysql bash
# mysql -u root -p
mysql> SHOW DATABASES;
```

## Docker commands

---

- `docker exec -it <name> bash`
- `docker exec -it <name> bash`
- `docker ps`
- `docker-compose down`
- `docker-compose up -d`
- `docker-comppse ps`
- `docker-comppse exec <service> <command>`
