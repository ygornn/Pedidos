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

CREATE TABLE tipoUsuario (
codigo INT NOT NULL AUTO_INCREMENT,
descricao VARCHAR(45),
PRIMARY KEY (codigo)
);

CREATE TABLE cliente (
codigo INT NOT NULL AUTO_INCREMENT,
nome_cliente VARCHAR(45),
usuario VARCHAR(20),
data_nascimento DATE,
email VARCHAR(45),
senha VARCHAR(60),
codigo_tipousuario INT,
idendereco INT,
PRIMARY KEY (codigo),
FOREIGN KEY (codigo_tipousuario) REFERENCES tipousuario(codigo) ON UPDATE CASCADE,
FOREIGN KEY (idendereco) REFERENCES endereco(idendereco) ON UPDATE CASCADE
);

 CREATE TABLE pizza (
 codigo INT NOT NULL AUTO_INCREMENT,
 sabor VARCHAR(45),
 valor DECIMAL(6,2),
 descricao VARCHAR(255),
 imagem VARCHAR(95),
 PRIMARY KEY (codigo)
 );

CREATE TABLE lanche (
 codigo INT NOT NULL AUTO_INCREMENT,
 sabor VARCHAR(45),
 valor DECIMAL(6,2),
 descricao VARCHAR(255),
 imagem VARCHAR(95),
 PRIMARY KEY (codigo)
 );

CREATE TABLE bebida (
 codigo INT NOT NULL AUTO_INCREMENT,
 sabor VARCHAR(45),
 valor DECIMAL(6,2),
 marca VARCHAR(255),
 imagem VARCHAR(95),
 PRIMARY KEY (codigo)
 );
 
CREATE TABLE pedido (
codigo INT NOT NULL AUTO_INCREMENT,
codigo_cliente INT,
hora DATETIME,
PRIMARY KEY (codigo),
FOREIGN KEY (codigo_cliente) REFERENCES cliente(codigo) ON UPDATE CASCADE 
);

CREATE TABLE pedido_pizza (
codigo_pedido INT NOT NULL,
codigo_pizza INT,
quantidade INT,
PRIMARY KEY(codigo_pedido, codigo_pizza),
FOREIGN KEY (codigo_pedido) REFERENCES pedido(codigo) ON UPDATE CASCADE,
FOREIGN KEY (codigo_pizza) REFERENCES pizza(codigo) ON UPDATE CASCADE
);

CREATE TABLE pedido_lanche (
codigo_pedido INT NOT NULL,
codigo_lanche INT,
quantidade INT,
PRIMARY KEY(codigo_pedido, codigo_lanche),
FOREIGN KEY (codigo_pedido) REFERENCES pedido(codigo) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (codigo_lanche) REFERENCES lanche(codigo) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE pedido_bebida (
codigo_pedido INT NOT NULL,
codigo_bebida INT,
quantidade INT,
PRIMARY KEY(codigo_pedido, codigo_bebida),
FOREIGN KEY (codigo_pedido) REFERENCES pedido(codigo) ON UPDATE CASCADE ,
FOREIGN KEY (codigo_bebida) REFERENCES bebida(codigo) ON UPDATE CASCADE 
);

SELECT pedido.codigo, nome_cliente, pizza.sabor as pizza, lanche.sabor as lanche, bebida.sabor as bebida, pedido_pizza.quantidade as p_qnt,
    pedido_lanche.quantidade as l_qnt, pedido_bebida.quantidade as b_qnt, hora,
    pizza.valor*pedido_pizza.quantidade + lanche.valor*pedido_lanche.quantidade + bebida.valor*pedido_bebida.quantidade as total
    FROM pedido JOIN cliente ON pedido.codigo_cliente = cliente.codigo JOIN pedido_pizza ON pedido.codigo=pedido_pizza.codigo_pedido
    JOIN pizza ON pedido_pizza.codigo_pizza = pizza.codigo JOIN pedido_lanche ON pedido.codigo=pedido_lanche.codigo_pedido
    JOIN lanche ON pedido_lanche.codigo_lanche = lanche.codigo JOIN pedido_bebida ON pedido.codigo=pedido_bebida.codigo_pedido
    JOIN bebida ON pedido_bebida.codigo_bebida = bebida.codigo;
    
SELECT * FROM pedido_bebida;
SELECT * FROM pedido_pizza; 
SELECT * FROM pedido_lanche;     

DROP TABLE pedido;
DROP TABLE pedido_pizza;
DROP TABLE pedido_lanche;
DROP TABLE pedido_bebida;