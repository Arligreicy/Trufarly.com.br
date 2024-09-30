DROP DATABASE IF EXISTS trufarly;
CREATE DATABASE trufarly;
USE trufarly;

USE trufarly;
DROP TABLE IF EXISTS status_trufa;
CREATE TABLE  status_trufa(
	id_status_trufa INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	descritivo VARCHAR(20) UNIQUE
);

USE trufarly;
INSERT INTO status_trufa (descritivo) VALUES 
("Ativo"),
("Inativo");

USE trufarly;
DROP TABLE IF EXISTS categorias;
CREATE TABLE categorias(
  id_categoria INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  descritivo VARCHAR(40) UNIQUE NOT NULL,
  STATUS ENUM("Ativo", "Inativo") DEFAULT "Ativo"
);

USE trufarly;
INSERT INTO categorias (descritivo) VALUES
("Chocolate ao leite"),
("Chocolate branco"),
("Chocolate meio amargo");

USE trufarly;
DROP TABLE IF EXISTS trufas;
CREATE TABLE trufas(
	id_trufa INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	descritivo VARCHAR(40) NOT NULL,
	sabor VARCHAR(40) NOT NULL,
	img VARCHAR(100) NOT NULL,
	qtd_estoque INT NOT NULL DEFAULT 0,
	preco DECIMAL(4,2) NOT NULL,
  
	id_categoria INT NOT NULL,
	FOREIGN KEY (id_categoria) REFERENCES categorias (id_categoria),
  
	id_status_trufa INT NOT NULL DEFAULT 1,
	FOREIGN KEY (id_status_trufa) REFERENCES status_trufa (id_status_trufa)
);

USE trufarly;
INSERT INTO trufas (descritivo, sabor, img, qtd_estoque, preco,id_categoria) VALUES
("Trufa de Chocolate ao Leite", "Brigadeiro","3por10.png.jpg", 99, 3.50, 1),
("Trufa de Chocolate ao Leite", "Tradicional", "3por10.png.jpg", 99, 3.50, 1),
("Trufa de Chocolate ao Leite", "Ninho com Nutella", "ninhocomnutella.jpg", 99, 3.50, 1),
("Trufa de Chocolate ao Leite", "Casadinho", "casadinho.jpg", 99, 3.50, 1),
("Trufa de Chocolate Branco", "Brigadeiro", "negresco.jpg", 99, 3.50, 3),
("Trufa de Chocolate Branco", "Tradicional", "negresco.jpg", 99, 3.50, 3),
("Trufa de Chocolate Branco", "Ninho com Nutella", "negresco.jpg", 99, 3.50, 3),
("Trufa de Chocolate Branco", "Casadinho", "negresco.jpg", 99, 3.50, 3),
("Trufa de Chocolate Meio Amargo", "Brigadeiro", "3por10.png.jpg", 99, 3.50, 2),
("Trufa de Chocolate Meio Amargo", "Tradicional", "3por10.png.jpg", 99, 3.50, 2),
("Trufa de Chocolate Meio Amargo", "Ninho com Nutella", "ninhocomnutella.jpg", 99, 3.50, 2),
("Trufa de Chocolate Meio Amargo", "Casadinho", "casadinho.jpg", 99, 3.50, 2);

USE trufarly;
DROP TABLE IF EXISTS status_usuarios;
CREATE TABLE  status_usuarios(
	id_status_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	descritivo VARCHAR(20) UNIQUE
);

USE trufarly;
INSERT INTO status_usuarios (descritivo) VALUES 
("Ativo"),
("Inativo");

USE trufarly;
DROP TABLE IF EXISTS tipos_usuarios;
CREATE TABLE  tipos_usuarios(
	id_tipo_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	descritivo VARCHAR(20) UNIQUE
);

USE trufarly;
INSERT INTO tipos_usuarios (descritivo) VALUES 
("Administrador"),
("Usuário"),
("Cliente");

USE trufarly;
DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios(
	id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	img_perfil VARCHAR(40) DEFAULT NULL,
	nome VARCHAR(40) NOT NULL,
	sexo ENUM("M", "F", "O"),
	datan DATE,
	cpf_cnpj VARCHAR(20) UNIQUE,
	email VARCHAR(100) UNIQUE NOT NULL,
	PASSWORD VARCHAR(128) NOT NULL,
  
	id_tipo_usuario INT NOT NULL DEFAULT 2,
	FOREIGN KEY (id_tipo_usuario) REFERENCES tipos_usuarios (id_tipo_usuario),
  
	id_status_usuario INT NOT NULL DEFAULT 1,
	FOREIGN KEY (id_status_usuario) REFERENCES status_usuarios (id_status_usuario)
);


#password: ($2y$10$djtr.z1wBlEBtMpEip3u1ulPa7S3JeQPG6rh5qbsKYX9eAPFHtrQW) => senha1234
USE trufarly;
INSERT INTO usuarios (img_perfil, nome, sexo, datan, cpf_cnpj, email, PASSWORD, id_tipo_usuario, id_status_usuario) VALUES
("arligreicy@gmail.com.jpeg","Arligreicy Castro Silva", "F", "0000-00-00", "XX.XXX.XXX/XXXX-X1", "arligreicy@gmail.com", "$2y$10$djtr.z1wBlEBtMpEip3u1ulPa7S3JeQPG6rh5qbsKYX9eAPFHtrQW", 1, 1),
("kauan@gmail.com.jpg","Kauan Gomes Fernandes", "M", "2003-06-13", "XX.XXX.XXX/XXXX-X2", "kauan@gmail.com", "$2y$10$djtr.z1wBlEBtMpEip3u1ulPa7S3JeQPG6rh5qbsKYX9eAPFHtrQW", 2, 1);

USE trufarly;
DROP TABLE IF EXISTS telefones;
CREATE TABLE  telefones(
	id_telefone INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	ddd INT(3) NOT NULL,
	numero VARCHAR(20),
	
	id_usuario INT NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario)
);

USE trufarly;
INSERT INTO telefones (ddd, numero, id_usuario) VALUES 
(14, "XXXX-XXX1", 1),
(14, "XXXX-XXX2", 2);

USE trufarly;
DROP TABLE IF EXISTS enderecos;
CREATE TABLE  enderecos(
	id_endereco INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	descritivo VARCHAR(100),
	cep VARCHAR(9) NOT NULL,
	numero VARCHAR(20),
	complemento VARCHAR(100),
	
	id_usuario INT NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario)
);

USE trufarly;
INSERT INTO enderecos (id_usuario, descritivo, cep, numero, complemento) VALUES
(1,"Rua Sonho de Valsa","17104-879", "20", "Casa Amarela"),
(2,"Rua Calda de Chocolate","17104-985", "54", "Ao lado da escola");

USE trufarly;
DROP TABLE IF EXISTS formas_pagamento;
CREATE TABLE  formas_pagamento(
	id_fp INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	descritivo VARCHAR(20) UNIQUE
);

USE trufarly;
INSERT INTO formas_pagamento (descritivo) VALUES 
("Parcelado"),
("Avista");

USE trufarly;
DROP TABLE IF EXISTS status_pedidos;
CREATE TABLE  status_pedidos(
	id_status_pedido INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	descritivo VARCHAR(20) UNIQUE
);

USE trufarly;
INSERT INTO status_pedidos (descritivo) VALUES 
("Pedente"),
("Concluido"),
("A caminho"),
("Entrege");


USE trufarly;
DROP TABLE IF EXISTS pedidos;
CREATE TABLE  pedidos(
	id_pedido INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	data_venda DATE DEFAULT CURRENT_DATE,
	valor_total DECIMAL(8, 2) NOT NULL DEFAULT 00.00,
	
	id_endereco INT NOT NULL,
	FOREIGN KEY (id_endereco) REFERENCES enderecos (id_endereco),
	
	id_fp INT NOT NULL,
	FOREIGN KEY (id_fp) REFERENCES formas_pagamento (id_fp),
	
	id_usuario INT NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario),
	
	id_status_pedido INT NOT NULL DEFAULT 1,
	FOREIGN KEY (id_status_pedido) REFERENCES status_pedidos (id_status_pedido)
);

USE trufarly;
INSERT INTO pedidos (data_venda, valor_total, id_endereco,  id_fp, id_usuario) VALUES 
(DEFAULT, 28.00, 2, 1, 2);

USE trufarly;
DROP TABLE IF EXISTS itens;
CREATE TABLE  itens(
	id_iten INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	qtd_trufa INT(99) NOT NULL,
	valor_unit DECIMAL(4,2) NOT NULL,
	
	id_pedido INT NOT NULL,
	FOREIGN KEY (id_pedido) REFERENCES pedidos (id_pedido),
	
	id_trufa INT NOT NULL,
	FOREIGN KEY (id_trufa) REFERENCES trufas (id_trufa)
);

USE trufarly;
INSERT INTO itens (qtd_trufa, valor_unit, id_pedido, id_trufa) VALUES 
(2, 7.00, 1, 1),
(2, 7.00, 1, 2),
(2, 7.00, 1, 3),
(2, 7.00, 1, 4);

#QUERY(S)
/*
SELECT t.id_trufa 'idtrufa', t.descritivo 'descritivo', t.sabor 'sabor', t.img 'img', t.qtd_estoque, t.preco, c.descritivo 'categoria' 
FROM trufas t 
INNER JOIN categorias c 
ON(t.id_categoria=c.id_categoria)
ORDER BY t.id_trufa;
*/

/*
SELECT t.id_trufa 'idtrufa', t.descritivo 'descritivo', t.sabor 'sabor', t.img 'img', t.qtd_estoque, t.preco, c.descritivo 'categoria' 
FROM trufas t 
INNER JOIN categorias c 
ON(t.id_categoria=c.id_categoria)
INNER JOIN status_trufa sf
ON(t.id_status_trufa=sf.id_status_trufa)
WHERE sf.descritivo = 'ativo' AND c.status = 'ativo'
ORDER BY t.id_trufa;
*/

#SELECT email from usuarios where email = ?;
#SELECT password FROM usuarios WHERE email = ?;
#SELECT id_usuario "idUsuario", nome, email, id_tipo_usuario "idTipoUsuario", id_status_usuario "idStatusUsuario" from usuarios where email = ?
#SELECT * FROM categorias where status = "Ativo";


#SELECT id_usuario , nome, email, id_tipo_usuario, id_status_usuario 
#from usuarios 
#where email = "kauan@gmail.com"

#SELECT * FROM trufas WHERE id_trufa = ?