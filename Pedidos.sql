CREATE SCHEMA pedidos;

CREATE TABLE estado (
idestado INT AUTO_INCREMENT,
uf VARCHAR(2),
nome_estado VARCHAR(45),
PRIMARY KEY (idestado)
);

CREATE TABLE cidade(
idcidade INT AUTO_INCREMENT,
idestado INT,
nome_cidade VARCHAR(45),
PRIMARY KEY (idcidade),
FOREIGN KEY (idestado) REFERENCES estado(idestado) ON UPDATE CASCADE 
);

CREATE TABLE endereco (
idendereco INT AUTO_INCREMENT,
idcidade INT,
nome_endereco VARCHAR(95),
PRIMARY KEY (idendereco),
FOREIGN KEY (idcidade) REFERENCES cidade(idcidade) ON UPDATE CASCADE
);

CREATE TABLE cliente (
idcliente INT AUTO_INCREMENT,
nome_cliente VARCHAR(45),
usuario VARCHAR(20),
cpf VARCHAR(11),
data_nascimento DATE,
email VARCHAR(45),
telefone VARCHAR(15),
senha VARCHAR(60),
idendereco INT,
PRIMARY KEY (idcliente),
FOREIGN KEY (idendereco) REFERENCES endereco(idendereco) ON UPDATE CASCADE
);


