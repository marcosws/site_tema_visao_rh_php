
/* exclui as tabelas se existir, mesmo com chave estrangeira */
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS usuarios, vagas, curriculos, mensagens;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE usuarios(
id_usuario INT NOT NULL AUTO_INCREMENT,
nome VARCHAR(150),
login VARCHAR(100),
senha VARCHAR(100),
PRIMARY KEY (id_usuario)
);

CREATE TABLE vagas(
id_vagas INTEGER PRIMARY KEY AUTO_INCREMENT,
titulo VARCHAR(100),
descricao TEXT,
id_usuario INTEGER
);

CREATE TABLE curriculos(
id_curriculo INTEGER PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(100),
cpf VARCHAR(12),
email VARCHAR(60)
curriculo VARCHAR(256);
);

CREATE TABLE mensagens(
id_mensagem INTEGER PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(100),
assunto VARCHAR(100),
email VARCHAR(60),
mensagem TEXT
);

ALTER TABLE vagas ADD CONSTRAINT fk_usuarios
FOREIGN KEY (id_usuario) 
REFERENCES usuarios(id_usuario) 
ON UPDATE NO ACTION 
ON DELETE NO ACTION;

INSERT INTO usuarios(nome, login, senha) VALUES('Visão RH','adm','adm');

INSERT INTO vagas(titulo, descricao, id_usuario) VALUES('Programador PHP','atuar no desenvolvimento',1);
INSERT INTO vagas(titulo, descricao, id_usuario) VALUES('Programador NET','atuar no desenvolvimento',1);
