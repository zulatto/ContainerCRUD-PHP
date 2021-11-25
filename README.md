# MoveContainer

Repositório criado com finalidade de atender ao teste prático oferecido pela empresa T2S

Teste consiste em um CRUD de container, um log com suas movimentações e um relatório contedo,
a quantidade de movimentação agrupadas por nome de cliente e tipo de movimentação.

Tecnologias usadas
- PHP
- Mysql 

Frameworks
- Bootstrap 4.3

IDE
- Visual Studio Code

DATABASE

CREATE TABLE container (
cd int primary auto_increment not null,
cliente varchar(200) not null,
container varchar(11) not null,
type int not null,
state int not null,
category int not null,
active tinyint not null DEFAULT 1
);

CREATE TABLE movecontainer (
nmContainer varchar(11) not null,
tipoMovimentacao varchar(50) not null,
startDate datetime not null,
endDate datetime not null,
nowDate timestamp not null default current_timestamp() ON UPDATE current_timestamp()
);
