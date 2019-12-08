create user 'painel_user'@'localhost' IDENTIFIED BY 'painel_pass';
create database painel_db;
grant all privileges on painel_db.* to 'painel_user'@'localhost';
use painel_db;

create table users(
    cod smallint primary key auto_increment,
    nick varchar(30) unique not null,
    mail varchar(50) unique null,
    password varchar(64) not null,
    img varchar(30) default 'avatar.svg' not null,
    data_create timestamp not null
);

create table annotations(
    cod smallint primary key auto_increment,
    cod_user smallint not null,
    mesg varchar(400) not null,
    data_post timestamp not null,
    constraint fk_cod_user foreign key (cod_user) references users ( cod )
);