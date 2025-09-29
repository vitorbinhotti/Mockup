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

INSERT INTO usuarios (name, password, email, cpf, data_nasc, cargo) VALUES ('admin','$2y$10$dFcd9CWxAwe.v2weZI7LGOHI2/Vu2Vb0rjPGB39.Bf8DAurlhwM/W', 'admin@gmail.com', '000.000.000-00', '2000-05-23', 'adm');