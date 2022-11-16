CREATE SCHEMA pedidos;

CREATE TABLE estado (
idestado INT AUTO_INCREMENT,
uf VARCHAR(2),
PRIMARY KEY (idestado)
);

INSERT INTO estado (uf) VALUES ('RO');
INSERT INTO estado (uf) VALUES ('AC');
INSERT INTO estado (uf) VALUES ('AM');
INSERT INTO estado (uf) VALUES ('AM');
INSERT INTO estado (uf) VALUES ('RR');
INSERT INTO estado (uf) VALUES ('PA');
INSERT INTO estado (uf) VALUES ('AP');
INSERT INTO estado (uf) VALUES ('TO');
INSERT INTO estado (uf) VALUES ('MA');
INSERT INTO estado (uf) VALUES ('PI');
INSERT INTO estado (uf) VALUES ('CE');
INSERT INTO estado (uf) VALUES ('RN');
INSERT INTO estado (uf) VALUES ('PB');
INSERT INTO estado (uf) VALUES ('PE');
INSERT INTO estado (uf) VALUES ('AL');
INSERT INTO estado (uf) VALUES ('SE');
INSERT INTO estado (uf) VALUES ('BA');
INSERT INTO estado (uf) VALUES ('MG');
INSERT INTO estado (uf) VALUES ('ES');
INSERT INTO estado (uf) VALUES ('RJ');
INSERT INTO estado (uf) VALUES ('SP');
INSERT INTO estado (uf) VALUES ('PR');
INSERT INTO estado (uf) VALUES ('SC');
INSERT INTO estado (uf) VALUES ('RS');
INSERT INTO estado (uf) VALUES ('MS');
INSERT INTO estado (uf) VALUES ('MT');
INSERT INTO estado (uf) VALUES ('GO');
INSERT INTO estado (uf) VALUES ('DF');

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
cpf VARCHAR(11),
data_nascimento DATE,
email VARCHAR(45),
telefone VARCHAR(15),
senha VARCHAR(60),
idendereco INT,
PRIMARY KEY (idcliente),
FOREIGN KEY (idendereco) REFERENCES endereco(idendereco) ON UPDATE CASCADE
);


