create database mockup_db;
use mockup_db;

create table usuarios (
    id int primary key auto_increment,
    name varchar(120) not null,
    email varchar(120) not null,
    cpf varchar(20) not null,
    password varchar(255) not null,
    data_nasc date not null,
    cargo enum('funcionario','adm') not null    
);

INSERT INTO usuarios (name, password, email, cpf, data_nasc, cargo) VALUES ('admin','mockup123@', 'admin@gmail.com', '000.000.000-00', '2000-05-23', 'adm');

INSERT INTO usuarios (name, password, email, cpf, data_nasc, cargo) VALUES ('funcionario','funcionario123', 'funcionario@gmail.com', '111.111.111-11', '2000-05-24', 'funcionario');