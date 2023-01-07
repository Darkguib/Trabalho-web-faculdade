use coisasemprestadas;

create table usuarios(
idUser int NOT NULL auto_increment, 
nome varchar(200) NOT NULL,
email varchar(200) NOT NULL,
senha varchar(40) NOT NULL,
sexo int NOT NULL,
dataNascimento date NOT NULL,
telefone varchar(14),
newsletter int NOT NULL,
PRIMARY KEY (idUser)
);

create table itens(
id int NOT NULL auto_increment,
nomeitem varchar(100) NOT NULL,
tipoitem varchar(100) NOT NULL,
outro varchar(100),
idUser int NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (idUser) references usuarios(idUser)
);

create table itensEmprestados(
id int NOT NULL auto_increment,
idItem int NOT NULL,
dataDevolucao date NOT NULL,
dataEmprestado date NOT NULL,
nomepessoa varchar(100) NOT NULL,
idUser int NOT NULL,
tempoDevolver int NOT NULL,
nomeitem varchar(100),
PRIMARY KEY (id),
FOREIGN KEY(idUser) references usuarios(idUser)
);

create table devolvido(
id int NOT NULL auto_increment,
idUSer int NOT NULL,
nomeitem varchar(100) NOT NULL,
dataDevolvido date NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY(idUser) REFERENCES usuarios(idUser)
);

select * from itens;
select * from itensEmprestados;
select * from usuarios;
select * from devolvido;

drop table devolvido;

